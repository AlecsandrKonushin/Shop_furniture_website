<template>
    <div class="product_gallery_section">
        <div v-if="product" class="container">
            <div class="row">
                <div class="product_d_info">
                    <div class="container">
                        <div class="row">
                            <div class="tab-content">
                                <div :class="['tab-pane', 'fade', 'active', 'show', { 'text-center': isPortrait }]"
                                     id="info" role="tabpanel">
                                    <div class="product_info__flex d-flex">
                                        <div class="product_info_thumb">
                                            <div class="mb-3 d-flex justify-content-center">
                                                <img style="height: 500px; width: auto; object-fit: contain;"
                                                     :src="`/storage/` + showImagePath" alt="" id="showImage">
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <div class="related_product_inner d-flex gap-2">
                                                    <div>
                                                        <a @click.prevent="showProductImage(product.preview_image)"
                                                           href="#">
                                                            <img style="height: 70px; width: auto;"
                                                                 :src="`/storage/` + product.preview_image" alt="">
                                                        </a>
                                                    </div>
                                                    <div v-if="product" v-for="image in product.product_images">
                                                        <a @click.prevent="showProductImage(image.file_path)" href="#">
                                                            <img style="height: 70px; width: auto;"
                                                                 :src="`/storage/` + image.file_path" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="product_info_content productinfo_text_flex justify-content-center d-flex">
                                            <form action="#">
                                                <div class="product_details_title">
                                                    <h2>{{ product.title }}</h2>
                                                </div>
                                                <div class="product_price_box mb-2">
                                                    <span class="current_price">{{ product.price }} руб</span>
                                                </div>
                                                <div v-if="product" class="widget_color pb-3">
                                                    <p class="mb-1">Выберите цвет</p>
                                                    <ul>
                                                        <li v-for="color in product.colors">
                                                            <a :class="{active: isSelectedColor(color.id)}"
                                                               @click.prevent="selectColor(color.id)"
                                                               :style="{background: '#' + color.color}"
                                                               href="#"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="product_details_right">
                                                    <div class="product_d_meta">
                                                        <span>
                                                            Категория: {{ product.category.title }}<br>
                                                            Количество: {{ product.count }}
                                                        </span>
                                                    </div>
                                                    <div
                                                        :class="['product_variant_quantity', 'd-flex', isPortrait ? 'justify-content-center' : 'align-items-center' ]">
                                                        <div class="pro-qty border">
                                                            <a @click.prevent="spendCountPurchases" href="#"
                                                               class="dec qty-btn">-</a>
                                                            <input min="1" max="100" type="text" :value="countPurchase">
                                                            <a @click.prevent="addCountPurchases" href="#"
                                                               class="inc qty-btn">+</a>
                                                        </div>
                                                        <button class="btn btn-link" type="submit">В корзину</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane justify-content-center d-flex" id="vendor" role="tabpanel">
                <div class="product_info_content col-8">
                    <h4 class="text-center">Описание</h4>
                    <p style="white-space: pre-line;">{{ product.description }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import {useRoute} from "vue-router";
import {inject, onMounted, onUnmounted, ref} from "vue";
import axios from "axios";

const scrollToElement = inject('scrollToElement')
const isPortrait = ref(false)

const route = useRoute()
const idProduct = route.params.id
const product = ref()
const showImagePath = ref()
const selectedColor = ref()
const countPurchase = ref()

onMounted(() => {
    checkOrientation()
    window.addEventListener('resize', checkOrientation);
    getProduct()
})

onUnmounted(() => {
    window.removeEventListener('resize', checkOrientation);
})

function checkOrientation() {
    isPortrait.value = window.innerWidth < window.innerHeight;
}

function getProduct() {
    axios.get(`/api/products/${idProduct}`)
        .then(res => {
            product.value = res.data
            selectedColor.value = product.value.colors[0].id
            countPurchase.value = 1
            showImagePath.value = product.value.preview_image
        })
        .catch(err => {
            console.log(err);
        })
}

function isSelectedColor(idColor) {
    return selectedColor.value === idColor;
}

function showProductImage(imagePath) {
    showImagePath.value = imagePath
    scrollToElement('showImage')
}

function selectColor(idColor) {
    selectedColor.value = idColor
}

function addCountPurchases() {
    countPurchase.value++

    if (countPurchase.value > product.value.count) {
        countPurchase.value = product.value.count
    }
}

function spendCountPurchases() {
    countPurchase.value--

    if (countPurchase.value < 1) {
        countPurchase.value = 1
    }
}


</script>

<style scoped>

</style>
