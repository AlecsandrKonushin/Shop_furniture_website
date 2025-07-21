<template>

    <div class="page_search_box">
        <div class="search_close">
            <i class="ion-close-round"></i>
        </div>
        <form class="border-bottom" action="#">
            <input class="border-0" placeholder="Search products..." type="text">
            <button type="submit"><i class="icofont-search"></i></button>
        </form>
    </div>

    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content text-center">
                        <h2>Каталог</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="shop_page_section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="shop_page_inner d-flex ">
                        <div class="shop_sidebar_widget">
                            <div class="shop_widget_list categories">
                                <div class="shop_widget_title categories_title">
                                    <h3>Категории</h3>
                                </div>
                                <div v-if="categories" class="widget_categories">
                                    <ul>
                                        <li v-if="products">
                                            <a :class="{ active: isSelectedCategory(0)}"
                                               @click.prevent="getAllProducts()"
                                               href="#">Все({{ countProducts }})</a>
                                        </li>
                                        <li v-for="category in categories">
                                            <a :class="{ active: isSelectedCategory(category.id)}"
                                               @click.prevent="getProductsByCategory(category.id)"
                                               href="#">{{ category.title }}({{ category.products_count }})</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--                            <div class="shop_widget_list">-->
                            <!--                                <div class="shop_widget_title">-->
                            <!--                                    <h3>by prices</h3>-->
                            <!--                                </div>-->
                            <!--                                <div class="widget_proce_filter">-->
                            <!--                                    <form action="#">-->
                            <!--                                        <input type="text" id="amount">-->
                            <!--                                        <div id="slider-range"></div>-->
                            <!--                                        <button type="submit">Filter Price</button>-->
                            <!--                                    </form>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <div class="shop_widget_list">
                                <div class="shop_widget_title">
                                    <h3>По цветам</h3>
                                </div>
                                <div v-if="colors" class="widget_color pb-3">
                                    <ul>
                                        <li v-for="color in colors">
                                            <a :class="{active: isSelectedColor(color.id)}"
                                               @click.prevent="selectColor(color.id)"
                                               :style="{background: '#' + color.color}"
                                               href="#"></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="widget_categories">
                                    <ul>
                                        <li>
                                            <a @click.prevent="resetColors" class="" href="#">Сбросить цвет</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="shop_right_sidaber">
                            <div class="shop_top_bar d-flex justify-content-between">
                                <div class="shop_product_count">
                                </div>
                                <div class="shop_top_right d-flex">
                                    <div class="product_sorting">
                                        <select>
                                            <option selected value="1">Default Sorting</option>
                                            <option value="1">Default Sorting2</option>
                                            <option value="1">Default Sorting3</option>
                                            <option value="1">Default Sorting3</option>
                                        </select>
                                    </div>
                                    <div class="shop_filter">
                                        <select>
                                            <option selected value="1">Filter</option>
                                            <option value="1">Filter2</option>
                                            <option value="1">Filter3</option>
                                            <option value="1">Filter4</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="shop_gallery">
                                <div class="row">
                                    <div v-if="products" v-for="product in products" class="col-lg-4 col-md-4 col-sm-6">
                                        <article class="single_product h-100 d-flex flex-column">
                                            <figure>
                                                <div class="product_thumb"
                                                     style="height: 300px; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                                                    <a href="#"><img :src="`/storage/` + product.preview_image" alt=""></a>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4><a href="#">{{ product.title }}</a></h4>
                                                    <div class="price_box">
                                                        <span class="current_price">{{ product.price }} руб  </span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
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

const categories = ref([])
const colors = ref([])
const products = ref([])
const countProducts = ref()
const currentCategoryId = ref()
const selectedColors = ref([])
const page = ref(1)

onMounted(() => {
    countProducts.value = 8

    getCategories()
    getColors()
    getAllProducts()
})

function getCategories() {
    axios.get('/api/categories/withCount')
        .then((res) => {
            categories.value = res.data.data
        })
        .catch(err => {
            console.log(err)
        })
}

function getColors() {
    axios.get('/api/colors')
        .then(res => {
            colors.value = res.data
        })
        .catch(err => {
            console.log(err)
        })
}

function getAllProducts() {
    currentCategoryId.value = 0
    selectedColors.value = []

    getProducts()
}

function getProductsByCategory(idCategory) {
    currentCategoryId.value = idCategory

    getProducts()

    // axios.get('/api/products/withCategory', {params: {page: page.value, category_id: idCategory}})
    //     .then(res => {
    //         products.value = res.data.data
    //     })
    //     .catch(err => {
    //         console.log(err)
    //     })
}

function getProducts() {
    axios.get('/api/products', {
        params:
            {page: page.value, category_id: currentCategoryId.value, colors: selectedColors.value}
    })
        .then(res => {
            products.value = res.data.data
        })
        .catch(err =>
            console.log(err)
        )
}

function selectColor(idColor) {
    const indexColor = selectedColors.value.indexOf(idColor)

    if (indexColor === -1) {
        selectedColors.value.push(idColor)
    } else {
        selectedColors.value.splice(indexColor, 1)
    }

    getProducts()
}

function resetColors() {
    selectedColors.value = []
    getProducts()
}

function isSelectedCategory(idCategory) {
    return currentCategoryId.value === idCategory
}

function isSelectedColor(idColor) {
    return selectedColors.value.includes(idColor)
}

</script>
