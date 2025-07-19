<script setup>

</script>

<template>
    <div>
        <header class="header_section header_other">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="main_header d-flex justify-content-between align-items-center">
                            <div class="header_logo">
                                <a class="sticky_none" href="#"><img src="" alt=""></a>
                            </div>
                            <!--main menu start-->
                            <div class="main_menu d-none d-lg-block">
                                <nav>
                                    <ul class="d-flex">
<!--                                        <li><a href="#">Home</a>-->
<!--                                            <ul class="sub_menu">-->
<!--                                                <li><a href="#">Home 1</a></li>-->
<!--                                                <li><a href="#">Home 2</a></li>-->
<!--                                            </ul>-->
<!--                                        </li>-->
<!--                                        <li><a href="#">Pages</a>-->
<!--                                            <ul class="sub_menu">-->
<!--                                                <li><a href="#">About Us</a></li>-->
<!--                                                <li><a href="#">Contact Us</a></li>-->
<!--                                            </ul>-->
<!--                                        </li>-->
                                        <li>
                                            <router-link to="/catalog">Каталог</router-link>
                                        </li>
<!--                                        <li><a href="#">Product</a></li>-->
                                        <li>
                                            <a href="/admin">Админка</a>
                                        </li>
<!--                                        <li><a href="contact.html">Contact Us</a></li>-->
                                    </ul>
                                </nav>
                            </div>
                            <!--main menu end-->
                            <div class="header__ridebar d-flex align-items-center">
                                <div class="header_account">
                                    <ul class="d-flex">
                                        <li class="header_search_btn"><a href="#"><img src=""
                                                                                       alt=""></a></li>
                                        <li class="shopping_cart"><a href="#"><img src=""
                                                                                   alt=""></a></li>
                                        <li class="account_link_menu"><a href="#"><img src=""
                                                                                       alt=""></a>
                                            <ul class="dropdown_account_link">
                                                <li><a href="">About Us</a></li>
                                                <li><a href="">Contact Us</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="canvas_open">
                                    <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <router-view />

        <!-- footer section start -->
        <footer class="footer_section footer_bg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="main_footer d-flex justify-content-between align-items-center">
                            <div class="footer_left">
                                <div class="footer_logo">
                                    <a href="index.html"><img src="" alt=""></a>
                                </div>
                                <div class="footer_social">
                                    <ul class="d-flex">
                                        <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                        <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                        <li><a href="#"><i class="ion-social-vimeo"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="footer_sidebar d-flex">
                                <div class="footer_widget_list">
                                    <div class="footer_widget_title">
                                        <h3>COMPANY</h3>
                                    </div>
                                    <div class="footer_menu">
                                        <ul>
                                            <li><a href="#">About Us</a></li>
                                            <li><a href="#">Help Center</a></li>
                                            <li><a href="#">Licenses</a></li>
                                            <li><a href="#">Market API</a></li>
                                            <li><a href="#">Site Map</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="footer_widget_list">
                                    <div class="footer_widget_title">
                                        <h3>MORE FROM US</h3>
                                    </div>
                                    <div class="footer_menu">
                                        <ul>
                                            <li><a href="#">Mobile and Layout Apps</a></li>
                                            <li><a href="#">Marketplace</a></li>
                                            <li><a href="#">About Vendors</a></li>
                                            <li><a href="#">Gift Vouchers</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="footer_widget_list">
                                    <div class="footer_widget_title">
                                        <h3>Userful Links</h3>
                                    </div>
                                    <div class="footer_menu">
                                        <ul>
                                            <li><a href="#">The Collections</a></li>
                                            <li><a href="#">Size Guide</a></li>
                                            <li><a href="#">Fashion Inspiration</a></li>
                                            <li><a href="#">Look Book</a></li>
                                            <li><a href="#">Instagram Shop</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="footer_widget_list">
                                    <div class="footer_widget_title">
                                        <h3>Sing up for newsletter</h3>
                                    </div>
                                    <div class="newsletter_subscribe">
                                        <form id="mc-form">
                                            <input id="mc-email" type="email" autocomplete="off"
                                                   placeholder="Email address... ">
                                            <button id="mc-submit">Subscribe</button>
                                        </form>
                                        <!-- mailchimp-alerts Start -->
                                        <div class="mailchimp-alerts text-centre">
                                            <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                            <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                            <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                                        </div><!-- mailchimp-alerts end -->
                                    </div>
                                    <div class="instagram_shop">
                                        <h3>instagram shop</h3>
                                        <div class="instagram_inner d-flex">
                                            <div class="instagram_img">
                                                <a href="#"><img src="" alt=""></a>
                                            </div>
                                            <div class="instagram_img">
                                                <a href="#"><img src="" alt=""></a>
                                            </div>
                                            <div class="instagram_img">
                                                <a href="#"><img src="" alt=""></a>
                                            </div>
                                            <div class="instagram_img">
                                                <a href="#"><img src="" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="footer_bottom">
                            <div class="copyright_right text-center">
                                <p>&copy; 2021 All rights reserved Made with <i class="ion-heart"></i> by <a
                                    href="https://hasthemes.com">HasThemes</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer section end -->
    </div>
</template>

<style scoped>

</style>
