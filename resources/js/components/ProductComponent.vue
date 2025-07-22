<template>
    <div class="product_gallery_section">
        <div v-if="product" class="container">
            <div class="row">
                <div class="product_d_info">
                    <div class="container">
                        <div class="row">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="info" role="tabpanel">
                                    <div class="product_info__flex d-flex">
                                        <div class="product_info_thumb">
                                            <div class="mb-3">
                                                <img :src="`/storage/` + product.preview_image" alt="">
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <div class="related_product_inner d-flex">
                                                    <div v-if="product" v-for="image in product.product_images"
                                                         class="ms-3">
                                                        <a href="#">
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
                                                    <div class="product_variant_quantity d-flex align-items-center">
                                                        <div class="pro-qty border">
                                                            <a href="#" class="dec qty-btn">-</a>
                                                            <input min="1" max="100" type="tex" value="1">
                                                            <a href="#" class="inc qty-btn">+</a>
                                                        </div>
                                                        <button class="btn btn-link" type="submit">add to cart</button>
                                                    </div>
                                                    <div class=" product_d_action">
                                                        <ul class="d-flex">
                                                            <li><a href="#" title="Add to wishlist"> <img src="" alt="">
                                                                Add to Wishlist <i
                                                                    class="ion-android-arrow-forward"></i></a></li>
                                                            <li><a href="#" title="Add to wishlist"><i
                                                                class="ion-android-arrow-back"></i> ADD TO COMPARE</a>
                                                            </li>
                                                        </ul>
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
import {onMounted, ref} from "vue";
import axios from "axios";

const route = useRoute()
const idProduct = route.params.id
const product = ref()
const selectedColor = ref()

onMounted(() => {
    getProduct()
})

function getProduct() {
    axios.get(`/api/products/${idProduct}`)
        .then(res => {
            product.value = res.data
            selectedColor.value = product.value.colors[0].id
        })
        .catch(err => {
            console.log(err);
        })
}

function isSelectedColor(idColor) {
    return selectedColor.value === idColor;
}

function selectColor(idColor) {
    selectedColor.value = idColor
}
</script>

<style scoped>

</style>
