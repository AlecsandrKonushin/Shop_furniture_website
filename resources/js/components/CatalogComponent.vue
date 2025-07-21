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
                                        <li v-for="category in categories">
                                            <a href="#">{{ category.title }}({{ category.products_count }})</a>
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
                                    <h3>by colors</h3>
                                </div>
                                <div class="widget_color">
                                    <ul>
                                        <li><a class="color1" href="javascript:void(0)"></a></li>
                                        <li><a class="color2" href="javascript:void(0)"></a></li>
                                        <li><a class="color3" href="javascript:void(0)"></a></li>
                                        <li><a class="color4" href="javascript:void(0)"></a></li>
                                        <li><a class="color5" href="javascript:void(0)"></a></li>
                                        <li><a class="color6" href="javascript:void(0)"></a></li>
                                        <li><a class="color7" href="javascript:void(0)"></a></li>
                                    </ul>
                                </div>
                                <div class="widget_color_btn">
                                    <a href="#">FILTER COLOR</a>
                                </div>
                            </div>
                            <div class="shop_widget_list">
                                <div class="shop_widget_title">
                                    <h3>Tags cloud</h3>
                                </div>
                                <div class="widget_tags">
                                    <ul>
                                        <li><a href="#">FURNITURE</a></li>
                                        <li><a href="#">DECOR</a></li>
                                        <li><a href="#">INTERIOR</a></li>
                                        <li><a href="#">Bed room</a></li>
                                        <li><a href="#">Plants</a></li>
                                        <li><a href="#">bath room</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="shop_widget_thumb">
                                <img src="" alt="">
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
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a href="#"><img :src="`/storage/` + product.preview_image" alt=""></a>
<!--                                                    <div class="label_product">-->
<!--                                                        <span class="label_sale">Sale</span>-->
<!--                                                    </div>-->
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4><a href="#">{{ product.title }}</a></h4>
                                                    <div class="price_box">
<!--                                                        <span class="old_price">$399.99</span>-->
                                                        <span class="current_price">{{ product.price }} руб  </span>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </article>
                                    </div>
                                </div>
                            </div>
                            <div class="loding_bar">
                                <ul class="d-flex justify-content-center">
                                    <li><a href="#">01</a></li>
                                    <li><a href="#">02</a></li>
                                    <li><a href="#">03</a></li>
                                    <li><a href="#">04</a></li>
                                    <li><a href="#">...</a></li>
                                    <li><a href="#"><i class="ion-ios-arrow-right"></i></a></li>
                                </ul>
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

const categories = ref([]);
const products = ref([]);
const page = ref(1);

onMounted(() => {
    getCategories()
    getProducts()
})

function getCategories() {
    axios.get('/api/categories/withCount')
        .then((res) => {
            categories.value = res.data.data
        })
        .catch(err => {
            console.log(err);
        })
}

function getProducts() {
    axios.get('/api/products', {params: {page: page.value, category_id: 13}})
        .then(res => {
            products.value = res.data
        })
        .catch(err => {
            console.log(err);
        })
}

</script>
