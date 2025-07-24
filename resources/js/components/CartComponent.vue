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
                                    <div v-for="(product, index) in products" :key="index" class="d-flex justify-content-center">
                                        <div class="">
                                            <div class="">
                                                <img style="height: 200px; width: auto; object-fit: contain;"
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
                                                        <a :class="{active: isSelectedColor(product.meta.id, color.id)}"
                                                           @click.prevent="selectColor(product.meta.id ,color.id)"
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
                                                            <a @click.prevent="spendCountProduct(product.meta.id)"
                                                               href="#"
                                                               class="dec qty-btn">-</a>
                                                            <input min="1" max="100" type="text" :value="product.count" readonly>
                                                            <a @click.prevent="addCountProduct(product.meta.id)"
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
    } else {
        console.log('Logic not have products in cart')
    }
}

function selectColor(idProduct, idColor) {
    let product = getProductById(idProduct)

    if (product) {
        product.color = idColor;
        saveCart()
    }
}

function isSelectedColor(idProduct, idColor) {
    let product = getProductById(idProduct)

    if (product) {
        return product.color === idColor
    }

    return false
}

function spendCountProduct(idProduct) {
    let product = getProductById(idProduct)

    if (product) {
        if (product.count > 1) {
            product.count--
            saveCart()
        }
    }
}

function addCountProduct(idProduct) {
    let product = getProductById(idProduct)

    if (product) {
        if (product.count < product.meta.max_count) {
            product.count++
            saveCart()
        }
    }
}

function getProductById(idProduct) {
    return products.value.find(p => p.meta.id === idProduct)
}

function saveCart() {
    localStorage.removeItem('cart')
    let cartProducts = []

    products.value.forEach(prod => {
        let newProduct =
            {
                'id': prod.meta.id,
                'color': prod.color,
                'count': prod.count
            }

        cartProducts.push(newProduct)
    })

    localStorage.setItem('cart', JSON.stringify(cartProducts))

    console.log(localStorage.getItem('cart'));
}

</script>

<style scoped>

</style>
