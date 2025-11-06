@extends('layouts.porto')

@section('footer')
    @include('components.porto.demo38.footer')
@endsection


@section('header')
    @include('components.porto.demo38.header')
@endsection

@section('content')
<div class="home-slider slide-animate owl-carousel owl-theme show-nav-hover curve-style dot-inside mb-2" data-owl-options="{
                'loop': false,
                'nav': false,
                'dots': true
			}">
                <div class="home-slide home-slide1 banner">
                    <img class="slide-bg" src="/porto/assets/images/demoes/demo38/slider/slide-1.jpg" alt="slider image" style="background-color: #f4f4f4;">
                    <div class="container d-flex align-items-center">
                        <div class="banner-layer row align-items-center justify-content-center appear-animate mr-0 ml-0" data-animation-name="fadeInUpShorter" data-animation-delay="150">
                            <div class="col-lg-6 col-xl-6 col-md-12 p-0 content-left text-center text-md-left mb-6">
                                <h4 class="text-transform-none">Shop for our products at exclusive prices</h4>
                                <h3 class="text-transform-none">Infrared Thermometers</h3>
                                <h2 class="text-uppercase">70% Off</h2>
                                <a href="/porto/demo38-shop.html" class="btn btn-primary btn-lg appear-animate mr-0 ml-0" data-animation-name="fadeInUpShorter" data-animation-delay="200">Shop Now!</a>
                            </div>
                            <div class="col-md-6 col-xl-3 col-lg-3 col-sm-4 col-6 p-0 content-center appear-animate mr-0 ml-0" data-animation-name="fadeIn" data-animation-delay="700">
                                <p style="animation-delay: 800ms;" data-appear-animation="zoomIn" data-appear-animation-delay="800" class="appear-animation zoomIn appear-animation-visible"><img src="/porto/assets/images/demoes/demo38/slider/thermometer.png" alt="" width="85" height="85" data-plugin-float-element data-plugin-options="{'startPos': 'none', 'speed': 4, 'transition': true}">
                                </p>
                            </div>
                            <div class="col-lg-3 col-xl-3 col-md-12 col-sm-4 col-6 pr-0 content-right appear-animate mr-0 ml-0" data-animation-name="fadeInLeftShorter" data-animation-delay="280">
                                <img src="/porto/assets/images/demoes/demo38/slider/fda.png" class="w-auto mb-3" alt="Slider Thumb" />

                                <ul class="text-capitalize">
                                    <li><i class="fa fa-check"></i>Non-Contact Temperature Taking</li>
                                    <li><i class="fa fa-check"></i>Get Readings in Only 1 Second</li>
                                    <li><i class="fa fa-check"></i>Fever Alarm at 100°F</li>
                                </ul>

                                <span class="d-block">from <span class="old-price">$299.99</span></span>
                                <h5 class="d-inline-flex align-items-center mb-0">
                                    <span>to</span>
                                    <b class="coupon-sale-text text-white align-middle d-block"><sup>$</sup><em
                                            class="align-text-top">199</em><sup>99</sup></b>
                                </h5>
                            </div>
                        </div>
                        <!-- End .banner-layer -->
                    </div>
                </div>
                <!-- End .home-slide -->

                <div class="home-slide home-slide2 banner">
                    <img class="slide-bg" src="/porto/assets/images/demoes/demo38/slider/slide-2.jpg" alt="slider image">
                    <div class="container d-flex align-items-center justify-content-center">
                        <div class="banner-layer appear-animate mr-0 ml-0 " data-animation-name="fadeInUpShorter" data-animation-delay="150">
                            <h4 class="text-transform-none">Shop for our products at exclusive prices</h4>
                            <h3 class="text-transform-none">Pro Respirator Mask</h3>
                            <h2 class="text-uppercase">50% Off</h2>
                            <a href="/porto/demo38-shop.html" class="btn btn-primary btn-lg appear-animate mr-0 ml-0" data-animation-name="fadeInUpShorter" data-animation-delay="200">Shop Now!</a>
                        </div>
                        <!-- End .banner-layer -->
                    </div>
                </div>
                <!-- End .home-slide -->
            </div>
            <!-- End .home-slider -->

            <div class="feature-boxes-container container pt-2">
                <div class="row justify-content-center">
                    <div class="col-sm-6 col-lg-4 appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="500" data-animation-duration="1000">
                        <div class="feature-box feature-box-simple text-center">
                            <i class="icon-earphones-alt"></i>

                            <div class="feature-box-content p-0">
                                <h3 class="text-capitalize">Customer Support</h3>
                                <h5>Need Assistence?</h5>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                            <!-- End .feature-box-content -->
                        </div>
                        <!-- End .feature-box -->
                    </div>
                    <!-- End .col-lg-3 -->

                    <div class="col-sm-6 col-lg-4 appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200" data-animation-duration="1000">
                        <div class="feature-box feature-box-simple text-center">
                            <i class="icon-credit-card"></i>

                            <div class="feature-box-content p-0">
                                <h3 class="text-capitalize">Secure Payment</h3>
                                <h5>Safe & Fast</h5>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                            <!-- End .feature-box-content -->
                        </div>
                        <!-- End .feature-box -->
                    </div>
                    <!-- End .col-lg-3 -->

                    <div class="col-sm-6 col-lg-4 appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="500" data-animation-duration="1000">
                        <div class="feature-box feature-box-simple text-center">
                            <i class="icon-action-undo"></i>

                            <div class="feature-box-content p-0">
                                <h3 class="text-capitalize">Free Returns</h3>
                                <h5>Easy & Free</h5>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                            <!-- End .feature-box-content -->
                        </div>
                        <!-- End .feature-box -->
                    </div>
                    <!-- End .col-lg-3 -->
                </div>
            </div>
            <!-- End .row .feature-boxes-container-->

            <section class="products-container feautured-container">
                <div class="container">
                    <div class="heading text-uppercase text-center">
                        <h5 class="appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200">
                            EXCLUSIVE SELECTION</h5>
                        <h2 class="text-capitalize mb-0 appear-animate" data-animation-delay="300" data-animation-name="fadeInUpShorter">Featured Products
                        </h2>
                    </div>

                    <div class="products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center appear-animate" data-animation-delay="500" data-animation-name="fadeIn" data-owl-options="{
						'dots': true,
                        'nav': false
					}">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo38-product.html">
                                    <img src="/porto/assets/images/demoes/demo38/products/product-1.jpg" width="205" height="205" alt="product">
                                </a>

                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo38-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo38-product.html">Injection</a>
                                </h3>
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
                                    <span class="old-price">$90.00</span>
                                    <span class="product-price">$70.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo38-product.html">
                                    <img src="/porto/assets/images/demoes/demo38/products/product-2.jpg" width="205" height="205" alt="product">
                                </a>

                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo38-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo38-product.html">Tonometer V2</a>
                                </h3>
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
                                    <span class="old-price">$90.00</span>
                                    <span class="product-price">$70.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo38-product.html">
                                    <img src="/porto/assets/images/demoes/demo38/products/product-3.jpg" width="205" height="205" alt="product">
                                </a>

                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo38-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo38-product.html">Wheel Barrow</a>
                                </h3>
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
                                    <span class="old-price">$90.00</span>
                                    <span class="product-price">$70.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo38-product.html">
                                    <img src="/porto/assets/images/demoes/demo38/products/product-4.jpg" width="205" height="205" alt="product">
                                </a>

                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo38-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo38-product.html">M95 Mask</a>
                                </h3>
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
                                    <span class="old-price">$90.00</span>
                                    <span class="product-price">$70.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo38-product.html">
                                    <img src="/porto/assets/images/demoes/demo38/products/product-5.jpg" width="205" height="205" alt="product">
                                </a>

                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo38-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo38-product.html">Tonometer</a>
                                </h3>
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
                                    <span class="old-price">$90.00</span>
                                    <span class="product-price">$70.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo38-product.html">
                                    <img src="/porto/assets/images/demoes/demo38/products/product-6.jpg" width="205" height="205" alt="product">
                                </a>

                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo38-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo38-product.html">Oxygen Inhalation</a>
                                </h3>
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
                                    <span class="old-price">$90.00</span>
                                    <span class="product-price">$70.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>
                    <!-- End .featured-proucts -->

                    <div class="banner banner-big-sale mb-6 appear-animate" data-animation-delay="100" data-animation-name="fadeIn" style="background: #2A95CB center/cover url('/porto/assets/images/demoes/demo38/banners/banner.jpg');">
                        <div class="banner-content row align-items-center mx-0">
                            <div class="col-lg-8 col-md-9 d-flex justify-content-center justify-content-md-start flex-column flex-md-row">
                                <h2 class="text-dark text-uppercase text-center text-md-left ls-n-20 mb-md-0 px-md-4 appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="200">
                                    <b class="text-white d-inline-block mb-1 mb-md-0">Big Sale</b>
                                </h2>

                                <h3 class="text-center text-md-left appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="200">
                                    Delivering Covid19 Essentials
                                    <small class="d-block text-transform-none align-middle">HAND SANITIZER,
                                        INFRARED THERMOMETERS AND MORE…</small>
                                </h3>
                            </div>
                            <div class="col-lg-4 col-md-3 text-center text-md-left text-lg-right mt-2 mt-lg-0">
                                <a class="btn btn-light btn-primary btn-lg appear-animate" data-animation-name="fadeIn" data-animation-delay="150" href="/porto/demo38-shop.html">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="products-container new-products-container">
                <div class="container">
                    <div class="heading text-uppercase text-center">
                        <h5 class="appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200">
                            RECENTLY ARRIVED</h5>
                        <h2 class="text-capitalize mb-0 appear-animate" data-animation-delay="300" data-animation-name="fadeInUpShorter">New Arrivals</h2>
                    </div>

                    <div class="products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center appear-animate" data-animation-delay="500" data-animation-name="fadeIn" data-owl-options="{
						'dots': true,
                        'nav': false
					}">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo38-product.html">
                                    <img src="/porto/assets/images/demoes/demo38/products/product-7.jpg" width="205" height="205" alt="product">
                                </a>

                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo38-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo38-product.html">Thermometer</a>
                                </h3>
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
                                    <span class="old-price">$90.00</span>
                                    <span class="product-price">$70.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo38-product.html">
                                    <img src="/porto/assets/images/demoes/demo38/products/product-8.jpg" width="205" height="205" alt="product">
                                </a>

                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo38-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo38-product.html">CT Scanner</a>
                                </h3>
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
                                    <span class="old-price">$90.00</span>
                                    <span class="product-price">$70.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo38-product.html">
                                    <img src="/porto/assets/images/demoes/demo38/products/product-9.jpg" width="205" height="205" alt="product">
                                </a>

                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo38-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo38-product.html">Plaster-of-Paris bandage</a>
                                </h3>
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
                                    <span class="old-price">$90.00</span>
                                    <span class="product-price">$70.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo38-product.html">
                                    <img src="/porto/assets/images/demoes/demo38/products/product-10.jpg" width="205" height="205" alt="product">
                                </a>

                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo38-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo38-product.html">Bandage</a>
                                </h3>
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
                                    <span class="old-price">$90.00</span>
                                    <span class="product-price">$70.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo38-product.html">
                                    <img src="/porto/assets/images/demoes/demo38/products/product-11.jpg" width="205" height="205" alt="product">
                                </a>

                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo38-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo38-product.html">Medical Box</a>
                                </h3>
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
                                    <span class="old-price">$90.00</span>
                                    <span class="product-price">$70.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo38-product.html">
                                    <img src="/porto/assets/images/demoes/demo38/products/product-12.jpg" width="205" height="205" alt="product">
                                </a>

                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo38-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo38-product.html">Pulse Oximeter</a>
                                </h3>
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
                                    <span class="old-price">$90.00</span>
                                    <span class="product-price">$70.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>
                    <!-- End .featured-proucts -->
                </div>
            </section>

            <section class="category-container curve-style bg-primary position-relative" style="background-image: url(/porto/assets/images/demoes/demo38/banners/category-banner.jpg);">
                <div class="container appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200">
                    <div class="heading text-uppercase text-center">
                        <h5 class="text-white">DEPARTMENTS</h5>
                        <h2 class="text-capitalize text-white mb-0 appear-animate" data-animation-delay="100" data-animation-name="fadeIn">Browse Our Categories</h2>
                    </div>

                    <div class="categories-slider owl-carousel owl-theme show-nav-hover nav-outer" data-owl-options="{
                        'loop': false,
                        'nav': false,
                        'dots': true,
                        'responsive': {
                            '768': {
                                'items' : 4
                            },
                            '991': {
                                'items' : 5
                            },
                            '1200': {
                                'items' : 6
                            }
                        }
                    }">>
                        <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">
                            <a href="/porto/demo38-shop.html">
                                <figure>
                                    <img src="/porto/assets/images/demoes/demo38/categories/category-1.jpg" alt="category" width="280" height="240" />
                                </figure>
                                <div class="category-content">
                                    <h3>Gynecology</h3>
                                </div>
                            </a>
                        </div>

                        <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">
                            <a href="/porto/demo38-shop.html">
                                <figure>
                                    <img src="/porto/assets/images/demoes/demo38/categories/category-2.jpg" alt="category" width="220" height="220" />
                                </figure>
                                <div class="category-content">
                                    <h3>Hepatology</h3>
                                </div>
                            </a>
                        </div>

                        <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">
                            <a href="/porto/demo38-shop.html">
                                <figure>
                                    <img src="/porto/assets/images/demoes/demo38/categories/category-3.jpg" alt="category" width="220" height="220" />
                                </figure>
                                <div class="category-content">
                                    <h3>Respiratory</h3>
                                </div>
                            </a>
                        </div>

                        <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">
                            <a href="/porto/demo38-shop.html">
                                <figure>
                                    <img src="/porto/assets/images/demoes/demo38/categories/category-4.jpg" alt="category" width="220" height="220" />
                                </figure>
                                <div class="category-content">
                                    <h3>Cardiology</h3>
                                </div>
                            </a>
                        </div>

                        <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">
                            <a href="/porto/demo38-shop.html">
                                <figure>
                                    <img src="/porto/assets/images/demoes/demo38/categories/category-6.jpg" alt="category" width="220" height="220" />
                                </figure>
                                <div class="category-content">
                                    <h3>Gastroenterology</h3>
                                </div>
                            </a>
                        </div>

                        <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">
                            <a href="/porto/demo38-shop.html">
                                <figure>
                                    <img src="/porto/assets/images/demoes/demo38/categories/category-5.jpg" alt="category" width="220" height="220" />
                                </figure>
                                <div class="category-content">
                                    <h3>Dental Care</h3>
                                </div>
                            </a>
                        </div>

                        <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">
                            <a href="/porto/demo38-shop.html">
                                <figure>
                                    <img src="/porto/assets/images/demoes/demo38/categories/category-3.jpg" alt="category" width="220" height="220" />
                                </figure>
                                <div class="category-content">
                                    <h3>Respiratory</h3>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
                <!-- End .featured-proucts -->
            </section>

            <div class="container">
                <div class="product-widgets-container row pb-2">
                    <div class="col-lg-3 col-sm-6 pb-5 pb-md-0 appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="400">
                        <h4 class="section-sub-title">Featured</h4>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo38-product.html">
                                    <img src="/porto/assets/images/demoes/demo38/products/small/product-1.jpg" width="74" height="74" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/demo38-product.html">Medical Box</a> </h3>

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
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo38-product.html">
                                    <img src="/porto/assets/images/demoes/demo38/products/small/product-2.jpg" width="74" height="74" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/demo38-product.html">Pulse Oximeter</a> </h3>

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
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo38-product.html">
                                    <img src="/porto/assets/images/demoes/demo38/products/small/product-3.jpg" width="74" height="74" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/demo38-product.html">Wheel Barrow</a> </h3>

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
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 pb-5 pb-md-0 appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="200">
                        <h4 class="section-sub-title">Best Selling</h4>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo38-product.html">
                                    <img src="/porto/assets/images/demoes/demo38/products/small/product-4.jpg" width="74" height="74" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/demo38-product.html">Injection</a> </h3>

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
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo38-product.html">
                                    <img src="/porto/assets/images/demoes/demo38/products/small/product-5.jpg" width="74" height="74" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/demo38-product.html">Tonometer V2</a> </h3>

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
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo38-product.html">
                                    <img src="/porto/assets/images/demoes/demo38/products/small/product-3.jpg" width="74" height="74" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/demo38-product.html">Wheel Barrow</a> </h3>

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
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 pb-5 pb-md-0 appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="200">
                        <h4 class="section-sub-title">Latest</h4>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo38-product.html">
                                    <img src="/porto/assets/images/demoes/demo38/products/small/product-2.jpg" width="74" height="74" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/demo38-product.html">Pulse Oximeter</a> </h3>

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
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo38-product.html">
                                    <img src="/porto/assets/images/demoes/demo38/products/small/product-6.jpg" width="74" height="74" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/demo38-product.html">Medical Scissor</a> </h3>

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
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo38-product.html">
                                    <img src="/porto/assets/images/demoes/demo38/products/small/product-7.jpg" width="74" height="74" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/demo38-product.html">Pincette</a> </h3>

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
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 pb-5 pb-md-0 appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="400">
                        <h4 class="section-sub-title">Top Rated</h4>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo38-product.html">
                                    <img src="/porto/assets/images/demoes/demo38/products/small/product-8.jpg" width="74" height="74" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/demo38-product.html">Surgical Mask</a> </h3>

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
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo38-product.html">
                                    <img src="/porto/assets/images/demoes/demo38/products/small/product-9.jpg" width="74" height="74" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/demo38-product.html">CT Scanner</a> </h3>

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
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo38-product.html">
                                    <img src="/porto/assets/images/demoes/demo38/products/small/product-1.jpg" width="74" height="74" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/demo38-product.html">Medical Box</a> </h3>

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
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>
                </div>
                <!-- End .row -->

                <hr class="mt-4 m-b-5">

                <div class="blog-section media-with-zoom appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="250">
                    <div class="heading text-uppercase text-center">
                        <h5>OUR BLOG</h5>
                        <h2 class="text-transform-none mb-0 appear-animate" data-animation-delay="100" data-animation-name="fadeIn">Recent Articles and News</h2>
                        <p class="text-transform-none">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed imperdiet libero idnisl euis</p>
                    </div>

                    <div class="post-slider owl-carousel owl-theme mb-0" data-owl-options="{
                        'margin' : 20,
                        'nav' : false,
                        'dots' : false,
                        'loop' : false,
                        'responsive' : {
                            '576' : {
                                'items' : 2
                            },
                            '768' : {
                                'items' : 2
                            },
                            '992' : {
                                'items' : 3
                            }
                        }
                    }">
                        <article class="post">
                            <div class="post-box">
                                <div class="post-media">
                                    <a href="/porto/single.html">
                                        <img src="/porto/assets/images/demoes/demo38/blog/post-1.jpg" data-zoom-image="/porto/assets/images/demoes/demo38/blog/post-1.jpg" width="354" height="181" alt="Post">
                                    </a>

                                    <span class="prod-full-screen">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div>
                                <!-- End .post-media -->

                                <div class="post-body">
                                    <div class="post-meta">
                                        <span class="meta-date"><i class="far fa-calendar-alt"></i>December 1,
                                            2020</span>
                                        <span class="meta-author"><i class="far fa-user"></i>By <a href="#"
                                                title="Posts by John Doe" rel="author">John Doe</a></span>
                                        <span class="meta-comments"><i class="far fa-comments"></i><a href="#"
                                                title="Comment on Lorem ipsum dolor sit amet">0 Comments</a></span>
                                    </div>

                                    <h2 class="post-title">
                                        <a href="/porto/single.html">Lorem ipsum dolor sit amet</a>
                                    </h2>

                                    <div class="post-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi. Etiam non tellus sem. Aenean pretium convallis...</p>

                                        <a href="/porto/single.html" class="read-more">read more...</a>
                                    </div>
                                    <!-- End .post-content -->
                                </div>
                                <!-- End .post-body -->
                            </div>
                        </article>

                        <article class="post">
                            <div class="post-box">
                                <div class="post-media">
                                    <a href="/porto/single.html">
                                        <img src="/porto/assets/images/demoes/demo38/blog/post-2.jpg" data-zoom-image="/porto/assets/images/demoes/demo38/blog/post-2.jpg" width="354" height="181" alt="Post">
                                    </a>

                                    <span class="prod-full-screen">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div>
                                <!-- End .post-media -->

                                <div class="post-body">
                                    <div class="post-meta">
                                        <span class="meta-date"><i class="far fa-calendar-alt"></i>December 1,
                                            2020</span>
                                        <span class="meta-author"><i class="far fa-user"></i>By <a href="#"
                                                title="Posts by John Doe" rel="author">John Doe</a></span>
                                        <span class="meta-comments"><i class="far fa-comments"></i><a href="#"
                                                title="Comment on Lorem ipsum dolor sit amet">0 Comments</a></span>
                                    </div>

                                    <h2 class="post-title">
                                        <a href="/porto/single.html">Lorem ipsum dolor sit amet</a>
                                    </h2>

                                    <div class="post-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi. Etiam non tellus sem. Aenean pretium convallis...</p>

                                        <a href="/porto/single.html" class="read-more">read more...</a>
                                    </div>
                                    <!-- End .post-content -->
                                </div>
                                <!-- End .post-body -->
                            </div>
                        </article>

                        <article class="post">
                            <div class="post-box">
                                <div class="post-media">
                                    <a href="/porto/single.html">
                                        <img src="/porto/assets/images/demoes/demo38/blog/post-3.jpg" data-zoom-image="/porto/assets/images/demoes/demo38/blog/post-3.jpg" width="354" height="181" alt="Post">
                                    </a>

                                    <span class="prod-full-screen">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div>
                                <!-- End .post-media -->

                                <div class="post-body">
                                    <div class="post-meta">
                                        <span class="meta-date"><i class="far fa-calendar-alt"></i>December 1,
                                            2020</span>
                                        <span class="meta-author"><i class="far fa-user"></i>By <a href="#"
                                                title="Posts by John Doe" rel="author">John Doe</a></span>
                                        <span class="meta-comments"><i class="far fa-comments"></i><a href="#"
                                                title="Comment on Lorem ipsum dolor sit amet">0 Comments</a></span>
                                    </div>

                                    <h2 class="post-title">
                                        <a href="/porto/single.html">Lorem ipsum dolor sit amet</a>
                                    </h2>

                                    <div class="post-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi. Etiam non tellus sem. Aenean pretium convallis...</p>

                                        <a href="/porto/single.html" class="read-more">read more...</a>
                                    </div>
                                    <!-- End .post-content -->
                                </div>
                                <!-- End .post-body -->
                            </div>
                        </article>
                    </div>
                    <!-- End .owl-carousel -->
                </div>
                <!-- End .related-posts -->

                <hr class="mt-4 mb-0">

                <div class="partners-container appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="250">
                    <div class="owl-carousel owl-theme appear-animate" data-animation-name="fadeIn" data-animation-delay="100" data-toggle="owl" data-owl-options="{
                        'margin' : 0,
                        'nav' : false,
                        'dots' : false,
                        'loop' : false,
                        'items' : 2,
                        'responsive' : {
                            '576' : {
                                'items' : 3
                            },
                            '768' : {
                                'items' : 4
                            },
                            '992' : {
                                'items' : 5
                            },
                            '1200' : {
                                'items' : 6
                            }
                        }
                    }" data-appear-animation="fadeIn" data-appear-animation-delay="0" data-appear-animation-duration="1s">
                        <img src="/porto/assets/images/demoes/demo38/logos/logo1.png" alt="logo image" width="107" height="75">
                        <img src="/porto/assets/images/demoes/demo38/logos/logo2.png" alt="logo image" width="107" height="75">
                        <img src="/porto/assets/images/demoes/demo38/logos/logo3.png" alt="logo image" width="107" height="75">
                        <img src="/porto/assets/images/demoes/demo38/logos/logo4.png" alt="logo image" width="107" height="75">
                        <img src="/porto/assets/images/demoes/demo38/logos/logo5.png" alt="logo image" width="107" height="75">
                        <img src="/porto/assets/images/demoes/demo38/logos/logo6.png" alt="logo image" width="107" height="75">
                    </div>
                </div>
            </div>
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
