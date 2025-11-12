@extends('layouts.porto')

@section('top-notice')
    @include('porto.demo33.top-notice')
@endsection

@section('footer')
    @include('porto.demo33.footer')
@endsection


@section('header')
    @include('porto.demo33.header')
@endsection

@section('content')
<div class="container">
                <div class="home-slider-container" style="background-color: #dddbdc;">
                    <div class="home-slider loaded owl-carousel owl-theme show-nav-hover nav-large nav-outer no-loop"
                        data-owl-options="{
                            'loop': false,
                            'lazyLoad':false
                        }">
                        <div class="home-slide home-slide1 banner banner-md-vw-small banner-sm-vw-small appear-animate"
                            style="background-color: #dddbdc;">
                            <img class="slide-bg" src="/porto/assets/images/demoes/demo33/slider/slide-1.jpg"
                                alt="slider image" width="1120" height="475">
                            <div class="banner-layer banner-layer-middle">
                                <h2 class="ls-n-20 appear-animate" data-animation-name="fadeInLeftShorter"
                                    data-appear-animation-delay="1170">Spring / Summer Season</h2>
                                <h3 class="appear-animate" data-animation-name="fadeInLeftShorter"
                                    data-appear-animation-delay="1320">
                                    <em class="text-center ls-0">up
                                        <br>to</em>50% OFF</h3>
                                <h4 class="text-uppercase d-inline-block mb-0 align-top pt-2 appear-animate"
                                    data-animation-name="fadeInLeftShorter" data-appear-animation-delay="1500">Starting
                                    at
                                    <span class="text-primary">$
                                        <em>19</em>99</span>
                                </h4>
                                <a href="/porto/demo33-shop.html" class="btn btn-dark btn-outline btn-xl mt-1">Shop Now</a>
                            </div>
                            <!-- End .banner-layer -->
                        </div>
                        <!-- End .home-slide -->

                        <div class="home-slide home-slide2 banner banner-md-vw-small banner-sm-vw-small"
                            style="background-color: #dddbdc;">
                            <img class="slide-bg" src="/porto/assets/images/demoes/demo33/slider/slide-2.jpg"
                                alt="slider image" width="1120" height="475">
                            <div class="banner-layer banner-layer-middle banner-layer-right"
                                data-animation-name="fadeIn" data-appear-animation-delay="100">
                                <h2 class="mb-0 appear-animate" data-animation-name="fadeInLeftShorter"
                                    data-appear-animation-delay="1170">EXTRA</h2>
                                <h3 class="m-b-2 appear-animate" data-animation-name="fadeInLeftShorter"
                                    data-appear-animation-delay="1300">20% OFF</h3>
                                <h3 class="mb-2 off-category appear-animate" data-animation-name="fadeInLeftShorter"
                                    data-appear-animation-delay="1500">ACCESSORIES</h3>
                                <a href="/porto/demo33-shop.html" class="btn btn-block btn-dark appear-animate"
                                    data-animation-name="fadeInLeftShorter" data-appear-animation-delay="1600">Shop All
                                    Sale
                                </a>
                            </div>
                            <!-- End .banner-layer -->
                        </div>
                        <!-- End .home-slide -->
                    </div>
                    <!-- End .home-slider -->
                </div>
                <!-- End .home-slider-container -->

                <div class="brands-slider owl-carousel owl-theme images-center">
                    <img src="/porto/assets/images/brands/small/brand1.png" width="140" height="60" alt="brand">
                    <img src="/porto/assets/images/brands/small/brand2.png" width="140" height="60" alt="brand">
                    <img src="/porto/assets/images/brands/small/brand3.png" width="140" height="60" alt="brand">
                    <img src="/porto/assets/images/brands/small/brand4.png" width="140" height="60" alt="brand">
                    <img src="/porto/assets/images/brands/small/brand5.png" width="140" height="60" alt="brand">
                    <img src="/porto/assets/images/brands/small/brand6.png" class="lack-gap" width="140" height="60"
                        alt="brand">
                </div>
                <!-- End .brands-slider -->
            </div>
            <!-- End .container -->

            <div class="banners-section bg-gray">
                <div class="container mb-2">
                    <div class="banners-slider owl-carousel owl-theme">
                        <div class="banner banner-sm-vw-large appear-animate" data-animation-name="fadeInLeftShorter"
                            data-appear-animation-delay="1170">
                            <figure>
                                <img src="/porto/assets/images/demoes/demo33/banners/banner-1.jpg" alt="banner" width="380"
                                    height="380">
                            </figure>

                            <div class="banner-layer banner-layer-top">
                                <h3>Women's Bags &amp; Purses</h3>
                                <h4>
                                    <del class="">20%</del>
                                    <strong class="text-primary">30%</strong>
                                </h4>
                            </div>

                            <div class="banner-layer banner-layer-bottom">
                                <a href="/porto/demo33-shop.html" class="btn btn-dark btn-lg">Shop Now</a>
                            </div>
                            <!-- End .home-banner-content -->

                            <div class="banner-layer banner-layer-bottom banner-layer-right">
                                <img src="/porto/assets/images/demoes/demo33/banners/brand-1.jpg" width="67" height="21"
                                    alt="brand" class="banner-layer-vertical-item w-auto">
                            </div>
                        </div>
                        <!-- End .home-banner -->

                        <div class="banner banner-sm-vw-large text-center appear-animate"
                            data-animation-name="fadeInLeftShorter" data-appear-animation-delay="1370">
                            <figure>
                                <img src="/porto/assets/images/demoes/demo33/banners/banner-2.jpg" alt="banner" width="380"
                                    height="380">
                            </figure>

                            <div class="banner-layer banner-layer-top">
                                <h3>Women's Shoes</h3>
                            </div>

                            <div class="banner-layer banner-layer-circle">
                                <h4 class="banner-layer-circle-item bg-primary">40
                                    <sup>%</sup>
                                </h4>
                            </div>

                            <div class="banner-layer banner-layer-bottom">
                                <a href="/porto/demo33-shop.html" class="btn btn-dark btn-lg">Shop Now</a>
                            </div>
                            <!-- End .home-banner-content -->
                        </div>
                        <!-- End .home-banner -->

                        <div class="banner banner-sm-vw-large text-right appear-animate"
                            data-animation-name="fadeInLeftShorter" data-appear-animation-delay="1570">
                            <figure>
                                <img src="/porto/assets/images/demoes/demo33/banners/banner-3.jpg" alt="banner" width="380"
                                    height="380">
                            </figure>

                            <div class="banner-layer banner-layer-top">
                                <h3>Men's Leather Belt</h3>
                                <h4 class="right-text">
                                    <del>30%</del>
                                    <strong class="text-primary">50%</strong>
                                </h4>
                            </div>

                            <div class="banner-layer banner-layer-bottom">
                                <a href="/porto/demo33-shop.html" class="btn btn-dark btn-lg">Shop Now</a>
                            </div>
                            <!-- End .home-banner-content -->

                            <div class="banner-layer banner-layer-bottom banner-layer-left">
                                <img src="/porto/assets/images/demoes/demo33/banners/brand-3.jpg" width="70" height="18"
                                    alt="brand" class="banner-layer-vertical-item">
                            </div>
                        </div>
                        <!-- End .home-banner -->
                    </div>
                    <!-- End .banners-slider -->
                </div>
                <!-- End .container -->
            </div>

            <div class="section shop-section mb-3">
                <div class="container">
                    <h2 class="section-title appear-animate" data-animation-name="fadeInUpShorter"
                        data-animation-delay="200">Browse By Category</h2>

                    <div class="owl-carousel owl-theme nav-thick show-nav-hover nav-outer pb-2 mb-3" data-owl-options="{
                            'items': 2,
                            'margin': 20,
                            'dots': false,
                            'nav': true,
                            'responsive': {
                                '576': {
                                    'items': 3
                                },
                                '992': {
                                    'items': 4
                                }
                            }
                        }">
                        <div class="product-category content-center overlay-light appear-animate"
                            data-animation-name="fadeInUpShorter" data-animation-delay="400">
                            <a href="/porto/demo33-shop.html">
                                <figure>
                                    <img src="/porto/assets/images/demoes/demo33/categories/category-1.jpg" alt="category"
                                        width="300" height="300">
                                </figure>
                                <div class="category-content">
                                    <h3>Sunglasses</h3>
                                    <span>
                                        <mark class="count">22</mark> products</span>
                                </div>
                            </a>
                        </div>
                        <!-- End .product-category -->
                        <div class="product-category content-center overlay-light appear-animate"
                            data-animation-name="fadeInUpShorter" data-animation-delay="400">
                            <a href="/porto/demo33-shop.html">
                                <figure>
                                    <img src="/porto/assets/images/demoes/demo33/categories/category-2.jpg" alt="category"
                                        width="300" height="300">
                                </figure>
                                <div class="category-content">
                                    <h3>Bags</h3>
                                    <span>
                                        <mark class="count">22</mark> products</span>
                                </div>
                            </a>
                        </div>
                        <!-- End .product-category -->
                        <div class="product-category content-center overlay-light appear-animate"
                            data-animation-name="fadeInUpShorter" data-animation-delay="400">
                            <a href="/porto/demo33-shop.html">
                                <figure>
                                    <img src="/porto/assets/images/demoes/demo33/categories/category-3.jpg" alt="category"
                                        width="300" height="300">
                                </figure>
                                <div class="category-content">
                                    <h3>Shoes</h3>
                                    <span>
                                        <mark class="count">22</mark> products</span>
                                </div>
                            </a>
                        </div>
                        <!-- End .product-category -->
                        <div class="product-category content-center overlay-light appear-animate"
                            data-animation-name="fadeInUpShorter" data-animation-delay="400">
                            <a href="/porto/demo33-shop.html">
                                <figure>
                                    <img src="/porto/assets/images/demoes/demo33/categories/category-4.jpg" alt="category"
                                        width="300" height="300">
                                </figure>
                                <div class="category-content">
                                    <h3>Accessories</h3>
                                    <span>
                                        <mark class="count">22</mark> products</span>
                                </div>
                            </a>
                        </div>
                        <!-- End .product-category -->
                        <div class="product-category content-center overlay-light appear-animate"
                            data-animation-name="fadeInUpShorter" data-animation-delay="400">
                            <a href="/porto/demo33-shop.html">
                                <figure>
                                    <img src="/porto/assets/images/demoes/demo33/categories/category-1.jpg" alt="category"
                                        width="300" height="300">
                                </figure>
                                <div class="category-content">
                                    <h3>Sunglasses</h3>
                                    <span>
                                        <mark class="count">22</mark> products</span>
                                </div>
                            </a>
                        </div>
                        <!-- End .product-category -->
                    </div>

                    <h2 class="section-title appear-animate" data-animation-name="fadeInUpShorter"
                        data-animation-delay="200">Featured Products Grid</h2>

                    <div class="creative-grid grid">
                        <div class="product-default grid-item inner-quickview inner-icon inner-icon-inline overlay-dark w-50 grid-height-1 w-md-100 appear-animate"
                            data-animation-name="fadeInUpShorter" data-animation-delay="400">
                            <figure>
                                <a href="/porto/demo33-product.html">
                                    <img src="/porto/assets/images/demoes/demo33/products/grid/product-1.jpg" alt="product"
                                        width="576" height="576">
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-sale">27% Off</span>
                                </div>
                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-icon-wish">
                                        <i class="icon-heart"></i>
                                    </a>
                                    <button class="btn-icon btn-add-cart product-type-simple" data-toggle="modal"
                                        data-target="#addCartModal">
                                        <i class="icon-shopping-cart"></i>
                                    </button>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo33-shop.html" class="product-category">men</a>
                                    </div>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo33-product.html">Woman blouse</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$914.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>

                        <div class="product-default grid-item inner-quickview inner-icon inner-icon-inline overlay-dark w-25 grid-height-1 w-md-50 w-xs-100 appear-animate"
                            data-animation-name="fadeInUpShorter" data-animation-delay="400">
                            <figure>
                                <a href="/porto/demo33-product.html">
                                    <img src="/porto/assets/images/demoes/demo33/products/grid/product-2.jpg" alt="product"
                                        width="300" height="600">
                                </a>
                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-icon-wish">
                                        <i class="icon-heart"></i>
                                    </a>
                                    <button class="btn-icon btn-add-cart product-type-simple" data-toggle="modal"
                                        data-target="#addCartModal">
                                        <i class="icon-shopping-cart"></i>
                                    </button>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="/porto/demo33-shop.html" class="product-category">men</a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo33-product.html">Man Cloths</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$188.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>

                        <div class="product-default grid-item inner-quickview inner-icon inner-icon-inline overlay-dark w-25 grid-height-1-2 w-md-50 w-xs-100 appear-animate"
                            data-animation-name="fadeInUpShorter" data-animation-delay="400">
                            <figure>
                                <a href="/porto/demo33-product.html">
                                    <img src="/porto/assets/images/demoes/demo33/products/grid/product-3.jpg" alt="product"
                                        width="300" height="300">
                                    <img src="/porto/assets/images/demoes/demo33/products/grid/product-3-2.jpg" alt="product"
                                        width="300" height="300">
                                </a>
                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-icon-wish">
                                        <i class="icon-heart"></i>
                                    </a>
                                    <button class="btn-icon btn-add-cart product-type-simple" data-toggle="modal"
                                        data-target="#addCartModal">
                                        <i class="icon-shopping-cart"></i>
                                    </button>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="/porto/demo33-shop.html" class="product-category">men</a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo33-product.html">Man Belt</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$18.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>

                        <div class="product-default grid-item inner-quickview inner-icon inner-icon-inline overlay-dark w-25 grid-height-1-2 w-md-50 w-xs-100 appear-animate"
                            data-animation-name="fadeInUpShorter" data-animation-delay="400">
                            <figure>
                                <a href="/porto/demo33-product.html">
                                    <img src="/porto/assets/images/demoes/demo33/products/grid/product-4.jpg" alt="product"
                                        width="300" height="300">
                                </a>
                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-icon-wish">
                                        <i class="icon-heart"></i>
                                    </a>
                                    <button class="btn-icon btn-add-cart product-type-simple" data-toggle="modal"
                                        data-target="#addCartModal">
                                        <i class="icon-shopping-cart"></i>
                                    </button>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="/porto/demo33-shop.html" class="product-category">men</a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo33-product.html">Woman Bag</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$48.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="grid-col-sizer"></div>
                    </div>
                </div>
                <!-- End .container -->
            </div>
            <!-- End .section -->

            <div class="section bg-gray product-widgets-section">
                <div class="container">
                    <div class="row">
                        <!-- product 1 -->
                        <div class="col-lg-3 col-sm-6 pb-5 pb-md-0">
                            <h4 class="section-sub-title">Top Rated Products</h4>
                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="/porto/demo33-product.html">
                                        <img src="/porto/assets/images/demoes/demo33/products/thumbs/product-3.jpg" width="95"
                                            height="95" alt="product">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-title"> <a href="/porto/demo33-product.html">Sport Shoes</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">$399.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="/porto/demo33-product.html">
                                        <img src="/porto/assets/images/demoes/demo33/products/thumbs/product-2.jpg" width="95"
                                            height="95" alt="product">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-title"> <a href="/porto/demo33-product.html">Business Bag</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top">5.00</span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">$166.00 – $199.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="/porto/demo33-product.html">
                                        <img src="/porto/assets/images/demoes/demo33/products/thumbs/product-1.jpg" width="95"
                                            height="95" alt="product">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-title"> <a href="/porto/demo33-product.html">Men Clothes</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->
                                    <div class="price-box">
                                        <del class="old-price">$188.00</del>
                                        <span class="product-price">$108.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                        </div>
                        <!-- product 2 -->
                        <div class="col-lg-3 col-sm-6 pb-5 pb-md-0">
                            <h4 class="section-sub-title">Best Selling Products</h4>
                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="/porto/demo33-product.html">
                                        <img src="/porto/assets/images/demoes/demo33/products/thumbs/product-4.jpg" width="95"
                                            height="95" alt="product">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-title"> <a href="/porto/demo33-product.html">Fashion Watch</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top">5.00</span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->
                                    <div class="price-box">
                                        <del class="old-price">$199.00</del>
                                        <span class="product-price">$99.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="/porto/demo33-product.html">
                                        <img src="/porto/assets/images/demoes/demo33/products/thumbs/product-8.jpg" width="95"
                                            height="95" alt="product">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-title"> <a href="/porto/demo33-product.html">Brown Bag</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->
                                    <div class="price-box">
                                        <del class="old-price">$199.00</del>
                                        <span class="product-price">$99.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="/porto/demo33-product.html">
                                        <img src="/porto/assets/images/demoes/demo33/products/thumbs/product-10.jpg" width="95"
                                            height="95" alt="product">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-title"> <a href="/porto/demo33-product.html">Woman Bag</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top">5.00</span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">$299.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                        </div>
                        <!-- product 3 -->
                        <div class="col-lg-3 col-sm-6 pb-5 pb-md-0">
                            <h4 class="section-sub-title">Latest Products</h4>
                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="/porto/demo33-product.html">
                                        <img src="/porto/assets/images/demoes/demo33/products/thumbs/product-11.jpg" width="95"
                                            height="95" alt="product">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-title"> <a href="/porto/demo33-product.html">Sunglasses 1</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->
                                    <div class="price-box">
                                        <del class="old-price">$199.00</del>
                                        <span class="product-price">$99.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="/porto/demo33-product.html">
                                        <img src="/porto/assets/images/demoes/demo33/products/thumbs/product-8.jpg" width="95"
                                            height="95" alt="product">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-title"> <a href="/porto/demo33-product.html">Brown Bag</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top">5.00</span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->
                                    <div class="price-box">
                                        <del class="old-price">$199.00</del>
                                        <span class="product-price">$99.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="/porto/demo33-product.html">
                                        <img src="/porto/assets/images/demoes/demo33/products/thumbs/product-4.jpg" width="95"
                                            height="95" alt="product">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-title"> <a href="/porto/demo33-product.html">Fashion Watch</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->
                                    <div class="price-box">
                                        <del class="old-price">$199.00</del>
                                        <span class="product-price">$99.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                        </div>
                        <!-- banner -->
                        <div class="col-lg-3 col-sm-6 pb-5 pb-md-0">
                            <div class="banner text-center top-shoes-banner banner-sm-vw-large"
                                style="background-color: #28252c;">
                                <figure>
                                    <img src="/porto/assets/images/demoes/demo33/banners/banner-4.jpg" alt="banner" width="266"
                                        height="325">
                                </figure>

                                <div class="banner-layer banner-layer-middle">
                                    <h3 class="m-b-2">Top Shoes</h3>
                                    <h4 class="text-primary m-b-3">Summer Sale</h4>
                                    <a href="/porto/demo33-shop.html" class="btn btn-light btn-outline">Shop Now</a>
                                </div>
                                <!-- End .home-banner-content -->
                            </div>
                            <!-- End .home-banner -->
                        </div>
                    </div>
                    <!-- End .row -->
                </div>
            </div>
            <!-- End .section -->

            <div class="container">
                <div class="instagram-feed">
                    <div class="insta-items row">
                        <div class="insta-item overlay-dark col-lg-2 col-md-3 col-sm-4 col-6">
                            <figure>
                                <img src="/porto/assets/images/demoes/demo33/insta/1.jpg" width="170" height="161"
                                    alt="instagram">
                            </figure>
                            <a href="javascript:;">
                                <i class="icon-instagram"></i>
                            </a>
                        </div>
                        <div class="insta-item overlay-dark col-lg-2 col-md-3 col-sm-4 col-6">
                            <figure>
                                <img src="/porto/assets/images/demoes/demo33/insta/2.jpg" width="170" height="161"
                                    alt="instagram">
                            </figure>
                            <a href="javascript:;">
                                <i class="icon-instagram"></i>
                            </a>
                        </div>
                        <div class="insta-item overlay-dark col-lg-2 col-md-3 col-sm-4 col-6">
                            <figure>
                                <img src="/porto/assets/images/demoes/demo33/insta/3.jpg" width="170" height="161"
                                    alt="instagram">
                            </figure>
                            <a href="javascript:;">
                                <i class="icon-instagram"></i>
                            </a>
                        </div>
                        <div class="insta-item overlay-dark col-lg-2 col-md-3 col-sm-4 col-6">
                            <figure>
                                <img src="/porto/assets/images/demoes/demo33/insta/4.jpg" width="170" height="161"
                                    alt="instagram">
                            </figure>
                            <a href="javascript:;">
                                <i class="icon-instagram"></i>
                            </a>
                        </div>
                        <div class="insta-item overlay-dark col-lg-2 col-md-3 col-sm-4 col-6">
                            <figure>
                                <img src="/porto/assets/images/demoes/demo33/insta/5.jpg" width="170" height="161"
                                    alt="instagram">
                            </figure>
                            <a href="javascript:;">
                                <i class="icon-instagram"></i>
                            </a>
                        </div>
                        <div class="insta-item overlay-dark col-lg-2 col-md-3 col-sm-4 col-6">
                            <figure>
                                <img src="/porto/assets/images/demoes/demo33/insta/6.jpg" width="170" height="161"
                                    alt="instagram">
                            </figure>
                            <a href="javascript:;">
                                <i class="icon-instagram"></i>
                            </a>
                        </div>
                        <div class="insta-item overlay-dark col-lg-2 col-md-3 col-sm-4 col-6">
                            <figure>
                                <img src="/porto/assets/images/demoes/demo33/insta/7.jpg" width="170" height="161"
                                    alt="instagram">
                            </figure>
                            <a href="javascript:;">
                                <i class="icon-instagram"></i>
                            </a>
                        </div>
                        <div class="insta-item overlay-dark col-lg-2 col-md-3 col-sm-4 col-6">
                            <figure>
                                <img src="/porto/assets/images/demoes/demo33/insta/8.jpg" width="170" height="161"
                                    alt="instagram">
                            </figure>
                            <a href="javascript:;">
                                <i class="icon-instagram"></i>
                            </a>
                        </div>
                        <div class="insta-item overlay-dark col-lg-2 col-md-3 col-sm-4 col-6">
                            <figure>
                                <img src="/porto/assets/images/demoes/demo33/insta/9.jpg" width="170" height="161"
                                    alt="instagram">
                            </figure>
                            <a href="javascript:;">
                                <i class="icon-instagram"></i>
                            </a>
                        </div>
                        <div class="insta-item overlay-dark col-lg-2 col-md-3 col-sm-4 col-6">
                            <figure>
                                <img src="/porto/assets/images/demoes/demo33/insta/10.jpg" width="170" height="161"
                                    alt="instagram">
                            </figure>
                            <a href="javascript:;">
                                <i class="icon-instagram"></i>
                            </a>
                        </div>
                        <div class="insta-item overlay-dark col-lg-2 col-md-3 col-sm-4 col-6">
                            <figure>
                                <img src="/porto/assets/images/demoes/demo33/insta/11.jpg" width="170" height="161"
                                    alt="instagram">
                            </figure>
                            <a href="javascript:;">
                                <i class="icon-instagram"></i>
                            </a>
                        </div>
                        <div class="insta-item overlay-dark col-lg-2 col-md-3 col-sm-4 col-6">
                            <figure>
                                <img src="/porto/assets/images/demoes/demo33/insta/12.jpg" width="170" height="161"
                                    alt="instagram">
                            </figure>
                            <a href="javascript:;">
                                <i class="icon-instagram"></i>
                            </a>
                        </div>
                    </div>
                    <div class="instagram-feed-content">
                        <i class="icon-instagram"></i>
                        <h3 class="text-uppercase">Instagram</h3>
                        <p class="text">@portoecommerce</p>
                        <a href="#" class="btn btn-outline">Follow</a>
                    </div>
                    <!-- End .instagram-feed-content -->
                </div>
                <!-- End .instagram-feed -->

                <div class="newsletter-section mb-5">
                    <div class="info-box icon-top text-center justify-content-center">
                        <i class="far fa-envelope"></i>

                        <div class="info-box-content">
                            <h2>Subscribe to Our Newsletter</h2>
                            <p>Get all the latest information on Events, Sales and Offers.</p>
                        </div>
                        <!-- End .info-box-content -->
                    </div>
                    <!-- End .info-box -->

                    <div class="col-md-10 offset-xl-3 col-xl-6 offset-lg-2 col-lg-8 offset-md-1">
                        <form action="#" class="mb-0 d-flex newsletter-form">
                            <input type="email" class="form-control" placeholder="Enter Your E-mail Address..."
                                size="40" required>
                            <button type="submit" class="btn btn-dark">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End .container -->
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
