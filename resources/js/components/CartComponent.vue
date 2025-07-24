<template>
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content text-center"><h2>Корзина</h2></div>
                </div>
            </div>
        </div>
    </div>
    <div class="product_gallery_section">
        <div v-if="products.length" class="container">
            <div class="row">
                <div class="product_d_info">
                    <div class="container">
                        <div class="row">
                            <div class="tab-content">
                                <div class="tab-pane active show" id="info" role="tabpanel">
                                    <div v-for="(product, index) in products" :key="index"
                                         class="d-flex justify-content-center mb-3">
                                        <div>
                                            <div>
                                                <img
                                                    style="height: 200px; width: 200px; object-fit: contain; display: block;"
                                                    :src="`/storage/` + product.meta.preview_image" alt=""
                                                    id="showImage">
                                            </div>
                                        </div>
                                        <div
                                            class="productinfo_text_flex d-flex flex-column justify-content-center">
                                            <div class="product_details_title">
                                                <h3>{{ product.meta.title }}</h3>
                                            </div>
                                            <div class="product_d_meta mb-4">
                                                <span>Категория: {{ product.meta.category.title }}</span>
                                            </div>
                                            <div class="widget_color pb-3">
                                                <p class="mb-1">Цвет</p>
                                                <ul>
                                                    <li v-for="color in product.meta.colors">
                                                        <a :class="{active: isSelectedColor(product.cartId, color.id)}"
                                                           @click.prevent="selectColor(product.cartId ,color.id)"
                                                           :style="{background: '#' + color.color}"
                                                           href="#"></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center gap-3">
                                            <div>
                                                <div class="product_price_box">
                                                <span style="font-size: 20px"
                                                      class="current_price">{{ product.meta.price }} руб</span>
                                                    <div class="product_d_meta">
                                                        <span>Цена за 1 шт.</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="product_details_right mt-0">
                                                    <div
                                                        class="product_variant_quantity d-flex">
                                                        <div class="pro-qty border">
                                                            <a @click.prevent="spendCountProduct(product.cartId)"
                                                               href="#"
                                                               class="dec qty-btn">-</a>
                                                            <input min="1" max="100" type="text" :value="product.count"
                                                                   readonly>
                                                            <a @click.prevent="addCountProduct(product.cartId)"
                                                               href="#"
                                                               class="inc qty-btn">+</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="product_price_box">
                                                <span style="font-size: 20px"
                                                      class="current_price">{{
                                                        product.meta.price * product.count
                                                    }} руб</span>
                                                    <div class="product_d_meta">
                                                        <span>Цена</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mini_cart_close">
                                            <a @click.prevent="removeProductFromCart(product.cartId)" href="#"><i
                                                class="ion-android-close"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="products.length === 0">
            <div class="tab-pane justify-content-center d-flex" id="vendor" role="tabpanel">
                <div class="product_info_content col-8">
                    <h4 class="text-center">Ваша корзина пуста</h4>
                    <p class="text-center product_price_box">
                        <router-link style="color: #AB6E35;" to="/catalog">Нажмите здесь</router-link>
                        , чтобы продолжить покупки
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>

import {onMounted, ref} from "vue";
import axios from "axios";

const products = ref([])
const colors = ref([])

onMounted(() => {
    getColors()
    getCartProducts()
})

function getColors() {
    axios.get('/api/colors')
        .then(res => {
            colors.value = res.data
        })
        .catch(err => {
            console.log(err);
        })
}

async function getCartProducts() {
    const cart = JSON.parse(localStorage.getItem('cart'));

    if (cart) {

        const productPromises = cart.map(async (productInCart) => {
            try {
                const res = await axios.get(`/api/products/cart/${productInCart.id}`)
                return {
                    'cartId': productInCart.cartId,
                    'meta': res.data,
                    'color': productInCart.color,
                    'count': productInCart.count
                }
            } catch (err) {
                console.error(err)
                return null;
            }
        })

        const results = await Promise.all(productPromises)
        products.value = results.filter(p => p !== null)
    }
}

function selectColor(cartId, idColor) {
    let product = getProductByCartId(cartId)

    if (product) {
        product.color = idColor;
        saveCart()
    }
}

function isSelectedColor(cartId, idColor) {
    let product = getProductByCartId(cartId)

    if (product) {
        return product.color === idColor
    }

    return false
}

function spendCountProduct(cartId) {
    let product = getProductByCartId(cartId)

    if (product) {
        if (product.count > 1) {
            product.count--
            saveCart()
        }
    }
}

function addCountProduct(cartId) {
    let product = getProductByCartId(cartId)

    if (product) {
        if (product.count < product.meta.max_count) {
            product.count++
            saveCart()
        }
    }
}

function removeProductFromCart(cartId) {
    products.value = products.value.filter(p => p.cartId !== cartId)
    saveCart()
}

function getProductByCartId(cartId) {

    return products.value.find(p => p.cartId === cartId)
}

function saveCart() {
    localStorage.removeItem('cart')
    let cartProducts = []

    products.value.forEach(prod => {
        let newProduct =
            {
                'cartId': prod.cartId,
                'id': prod.meta.id,
                'color': prod.color,
                'count': prod.count
            }

        cartProducts.push(newProduct)
    })

    localStorage.setItem('cart', JSON.stringify(cartProducts))
}

</script>

<style scoped>

</style>
