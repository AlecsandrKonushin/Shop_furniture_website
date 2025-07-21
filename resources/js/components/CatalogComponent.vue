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
                                        <li v-if="meta">
                                            <a :class="{ active: isSelectedCategory(0)}"
                                               @click.prevent="getAllProducts()"
                                               href="#">Все({{ meta.countProducts }})</a>
                                        </li>
                                        <li v-for="category in categories">
                                            <a :class="{ active: isSelectedCategory(category.id)}"
                                               @click.prevent="getProductsByCategory(category.id)"
                                               href="#">{{ category.title }}({{ category.products_count }})</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="shop_widget_list">
                                <div class="shop_widget_title">
                                    <h3>По цене</h3>
                                </div>
                                <div class="widget_proce_filter">
                                    <form action="#">
                                        <input type="text" id="amount">
                                        <div id="slider-range"
                                             class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                            <div class="ui-slider-range ui-corner-all ui-widget-header"
                                                 style="left: 0%; width: 100%;"></div>
                                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"
                                                  style="left: 0%;"></span><span tabindex="0"
                                                                                 class="ui-slider-handle ui-corner-all ui-state-default"
                                                                                 style="left: 100%;">
                                        </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
                                            <a @click.prevent="resetColors" class="" href="#">Сбросить цвета</a>
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
                                        <select v-model="sortOption" @change="getProducts">
                                            <option selected value="alpha_asc">По алфавиту (возрастание)</option>
                                            <option value="alpha_desc">По алфавиту (убывание)</option>
                                            <option value="price_asc">По цене (минимальная)</option>
                                            <option value="price_desc">По цене (максимальная)</option>
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
const meta = ref({
    countProducts: null,
    minPrice: null,
    maxPrice: null
})
const sortOption = ref('alpha_asc')
const currentCategoryId = ref()
const selectedColors = ref([])
const minPrice = ref()
const maxPrice = ref()
const page = ref(1)

onMounted(() => {
    getMetaProducts()
    getCategories()
    getColors()
})

function getMetaProducts() {
    axios.get('/api/products/metaProducts')
        .then(res => {
            meta.value = res.data
            minPrice.value = meta.value.minPrice
            maxPrice.value = meta.value.maxPrice

            changePriceSlider()
            getAllProducts()
        })
        .catch(err => {
            console.log(err);
        })
}

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
}

function getProducts() {
    axios.get('/api/products', {
        params: {
            page: page.value,
            category_id: currentCategoryId.value,
            colors: selectedColors.value,
            minPrice: minPrice.value,
            maxPrice: maxPrice.value,
            sortOption: sortOption.value
        }
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

function changePriceSlider() {
    if (meta.value) {
        $("#slider-range").slider({
            range: true,
            min: Number(meta.value.minPrice),
            max: Number(meta.value.maxPrice),
            values: [Number(meta.value.minPrice), Number(meta.value.maxPrice)],
            slide: function (event, ui) {
                $("#amount").val("" + ui.values[0] + " - " + ui.values[1]);
            },
            stop: function (event, ui) {
                minPrice.value = ui.values[0]
                maxPrice.value = ui.values[1]
                getProducts()
            }
        });

        const values = $("#slider-range").slider("values");
        $("#amount").val("" + values[0] + " - " + values[1]);
    }
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
