@extends('layouts.porto')

@section('top-notice')
    @include('components.porto.top-notice-demo42')
@endsection


@section('header')
    @include('components.porto.header-demo42')
@endsection

@section('footer')
    @include('components.porto.footer-demo42')
@endsection

@section('content')
<div class="intro-slider slide-animate owl-carousel owl-theme show-nav-hover nav-inside nav-big"
                data-owl-options="{
                'loop': false,
                'dots': false,
                'nav': true
			}">
                <div class="banner intro-slide1" style="background: url(/porto/assets/images/demoes/demo42/slider/slide1.jpg) rgb(255, 255, 255);
                min-height: 530px; background-position: right center; background-repeat: no-repeat;">
                    <div class="container">
                        <div class="wrapper">
                            <svg class="custom-svg-1" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 649 578">
                                <path fill="#FFF"
                                    d="M-225.5,154.7l358.45,456.96c7.71,9.83,21.92,11.54,31.75,3.84l456.96-358.45c9.83-7.71,11.54-21.92,3.84-31.75
                                    L267.05-231.66c-7.71-9.83-21.92-11.54-31.75-3.84l-456.96,358.45C-231.49,130.66-233.2,144.87-225.5,154.7z">
                                </path>
                                <path class="appear-animate appear-animate-svg" data-animation-name="customLineAnim"
                                    data-animation-duration="5000" fill="none" stroke="#222529" stroke-width="1.5"
                                    stroke-miterlimit="10"
                                    d="M416-21l202.27,292.91c5.42,7.85,3.63,18.59-4.05,24.25L198,603"
                                    style="animation-delay: 300ms; animation-duration: 5s;"></path>
                            </svg>
                        </div>
                        <div class="row h-100">
                            <div class="col-md-5 banner-media appear-animate d-none d-md-block"
                                data-animation-name="fadeInRightShorter">
                                <img src="/porto/assets/images/demoes/demo42/banner1.jpg" width="426" height="426"
                                    alt="banner" />
                                <div class="mark-deal"><i>%
                                        Deal</i></div>
                            </div>
                            <div class="col-md-7">
                                <div class="banner-content banner-layer-middle">
                                    <div class=" appear-animate" data-animation-name="fadeInLeftShorter"
                                        data-animation-delay="500">
                                        <div class="brand-logo px-3 mb-1">
                                            <img src="/porto/assets/images/demoes/demo42/new_brand3_light.png" width="140"
                                                height="60" alt="brand" />
                                        </div>
                                        <h3 class="banner-subtitle pt-1 mb-1">Ready-To-Mount Complete Wheels</h3>
                                        <h2 class="banner-title pb-1">Ultimate Winter Performance</h2>

                                        <ul class="info-list">
                                            <li><i class="far fa-check-circle"></i>
                                                <div class="porto-info-list-item-desc">Strong Snow Performance
                                                </div>
                                            </li>
                                            <li><i class="far fa-check-circle"></i>
                                                <div class="porto-info-list-item-desc">Excellent Braking Power
                                                </div>
                                            </li>
                                            <li><i class="far fa-check-circle"></i>
                                                <div class="porto-info-list-item-desc">Low Fuel Consumption
                                                </div>
                                            </li>
                                        </ul>
                                        <h5 class="text-price align-top align-left">
                                            Starting At $<strong class="font-weight-bold">799</strong></h5>
                                        <div class="banner-action">
                                            <a href="/porto/demo42-shop.html"
                                                class="btn btn-primary btn-rounded btn-icon-right" role="button">Shop
                                                Now
                                                <i class="fas fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner intro-slide2" style="background: url(/porto/assets/images/demoes/demo42/slider/slide2.jpg) rgb(255, 255, 255);
                min-height: 530px; background-position: left center; background-repeat: no-repeat;">
                    <div class="container">
                        <div class="wrapper">
                            <svg class="custom-svg-2" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 649 578">
                                <path fill="#FFF"
                                    d="M-225.5,154.7l358.45,456.96c7.71,9.83,21.92,11.54,31.75,3.84l456.96-358.45c9.83-7.71,11.54-21.92,3.84-31.75
                                    L267.05-231.66c-7.71-9.83-21.92-11.54-31.75-3.84l-456.96,358.45C-231.49,130.66-233.2,144.87-225.5,154.7z">
                                </path>
                                <path class="appear-animate appear-animate-svg" data-animation-name="customLineAnim"
                                    data-animation-duration="5000" fill="none" stroke="#222529" stroke-width="1.5"
                                    stroke-miterlimit="10"
                                    d="M416-21l202.27,292.91c5.42,7.85,3.63,18.59-4.05,24.25L198,603"
                                    style="animation-delay: 300ms; animation-duration: 5s;"></path>
                            </svg>
                        </div>
                        <div class="row h-100">
                            <div class="col-md-7">
                                <div class="banner-content banner-layer-middle text-right">
                                    <div class=" appear-animate" data-animation-name="fadeInRightShorter"
                                        data-animation-delay="500">
                                        <div class="brand-logo px-3 mb-1">
                                            <img src="/porto/assets/images/demoes/demo42/new_brand3_light.png" width="140"
                                                height="60" alt="brand" />
                                        </div>
                                        <h3 class="banner-subtitle pt-1 mb-1">Save Up To 30%</h3>
                                        <h2 class="banner-title pb-1">High Performance Brake Kit</h2>

                                        <h5 class="text-price align-top align-left">
                                            Starting At $<strong class="font-weight-bold">99</strong></h5>

                                        <ul class="info-list mr-0">
                                            <li><i class="far fa-check-circle"></i>
                                                <div class="porto-info-list-item-desc">Better Heat Dissipation
                                                </div>
                                            </li>
                                            <li><i class="far fa-check-circle"></i>
                                                <div class="porto-info-list-item-desc">Complete Bolt-On Kit
                                                </div>
                                            </li>
                                            <li><i class="far fa-check-circle"></i>
                                                <div class="porto-info-list-item-desc">Made in the USA
                                                </div>
                                            </li>
                                        </ul>

                                        <div class="banner-action">
                                            <a href="/porto/demo42-shop.html"
                                                class="btn btn-primary btn-rounded btn-icon-right" role="button">Shop
                                                Now
                                                <i class="fas fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 banner-media appear-animate d-none d-md-block"
                                data-animation-name="fadeInLeftShorter">
                                <img src="/porto/assets/images/demoes/demo42/banner2.jpg" width="504" height="347"
                                    alt="banner" />
                                <div class="mark-deal"><i>%
                                        Deal</i></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <section class="search-section" style="background-color: #f4f4f4;">
                <div class="container">
                    <div class="search-name d-lg-flex align-items-center appear-animate"
                        data-animation-name="fadeInUpShorter">
                        <h2 class="search-title"><i class="icon-business-book"></i>Add A Vehicle To
                            Find Exact Fit Parts:</h2>
                        <h4 class="search-info">Shop for your specific vehicle to find parts that fit.
                        </h4>
                    </div>
                    <div class="row search-form appear-animate" data-animation-name="fadeInUpShorter">
                        <div class="col-md-6 col-lg-3">
                            <div class="select-custom">
                                <select class="form-control mb-0">
                                    <option>By make</option>
                                    <option>Dolor</option>
                                    <option>Ipsum</option>
                                    <option>Lorem</option>
                                    <option>Sit</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="select-custom">
                                <select class="form-control mb-0">
                                    <option>By model</option>
                                    <option>Engine</option>
                                    <option>Motor</option>
                                    <option>Sound</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="select-custom">
                                <select class="form-control mb-0">
                                    <option>By product-year</option>
                                    <option>2018</option>
                                    <option>2019</option>
                                    <option>2020</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-2">
                            <a href="/porto/demo42-shop.html"
                                class="btn btn-borders btn-rounded btn-outline-primary ls-25 btn-block">Find
                                Auto Parts</a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="category-section container">
                <div class="d-lg-flex align-items-center appear-animate" data-animation-name="fadeInLeftShorter">
                    <h2 class="title title-underline divider">Shop Categories</h2>
                    <a href="/porto/demo42-shop.html" class="sicon-title">VIEW CATEGORIES<i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="owl-carousel owl-theme appear-animate" data-owl-options="{
                    'loop': false,
                    'dots': false,
                    'nav': true,
                    'responsive': {
                        '0': {
                            'items': 2
                        },
                        '576': {
                            'items': 3
                        },
                        '991': {
                            'items': 4
                        }
                    }
                }">
                    <div class="product-category">
                        <a href="/porto/demo42-shop.html">
                            <figure>
                                <img src="/porto/assets/images/demoes/demo42/category/cat1.jpg" alt="category" width="250"
                                    height="250">
                            </figure>
                        </a>
                        <div class="category-content">
                            <h3 class="category-title">Auto Parts</h3>
                            <ul class="sub-categories">
                                <li><a href="#">Batteries, Starting And Charging</a></li>
                                <li><a href="#">Brakes And Traction Control</a></li>
                                <li><a href="#">Climate Control</a></li>
                                <li><a href="#">Collision And Hardware</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-category">
                        <a href="/porto/demo42-shop.html">
                            <figure>
                                <img src="/porto/assets/images/demoes/demo42/category/cat2.jpg" alt="category" width="250"
                                    height="250">
                            </figure>
                        </a>
                        <div class="category-content">
                            <h3 class="category-title">Interior Accessories</h3>
                            <ul class="sub-categories">
                                <li><a href="#">Alarm And Security</a></li>
                                <li><a href="#">Dash Covers, Headliners And Visor</a></li>
                                <li><a href="#">Seat Covers And Seats Accessories</a></li>
                                <li><a href="#">Sun / Heat Protection</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-category">
                        <a href="/porto/demo42-shop.html">
                            <figure>
                                <img src="/porto/assets/images/demoes/demo42/category/cat3.jpg" alt="category" width="250"
                                    height="250">
                            </figure>
                        </a>
                        <div class="category-content">
                            <h3 class="category-title">External Accessories</h3>
                            <ul class="sub-categories">
                                <li><a href="#">Antenna Cables And Masts</a></li>
                                <li><a href="#">Decals And Graphics</a></li>
                                <li><a href="#">Exterior Lighting</a></li>
                                <li><a href="#">License Plate And Accessories</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-category">
                        <a href="/porto/demo42-shop.html">
                            <figure>
                                <img src="/porto/assets/images/demoes/demo42/category/cat4.jpg" alt="category" width="250"
                                    height="250">
                            </figure>
                        </a>
                        <div class="category-content">
                            <h3 class="category-title">Performance</h3>
                            <ul class="sub-categories">
                                <li><a href="#">Body, Suspension, And Steering</a></li>
                                <li><a href="#">Exhaust</a></li>
                                <li><a href="#">Fuel System</a></li>
                                <li><a href="#">Power Adders Components</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <section class="product-section1" style="background-color: #f4f4f4;">
                <div class="container">
                    <h2 class="title title-underline pb-1 appear-animate" data-animation-name="fadeInLeftShorter">Hot
                        Deals</h2>
                    <div class="owl-carousel owl-theme appear-animate" data-owl-options="{
                    'loop': false,
                    'dots': false,
                    'nav': true,
                    'margin': 20,
                    'responsive': {
                        '0': {
                            'items': 2
                        },
                        '576': {
                            'items': 4
                        },
                        '991': {
                            'items': 6
                        }
                    }
                }">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo42-product.html">
                                    <img src="/porto/assets/images/demoes/demo42/product/product1-300x300.jpg" width="300"
                                        height="300" alt="product">
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-sale">-13%</span>
                                </div>
                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="#">External Accessories</a>,
                                        <a href="#">Hot Deals</a>
                                    </div>
                                    <a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo42-product.html">Product Short Name</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <del class="old-price">$299.00</del>
                                    <span class="product-price">$259.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo42-product.html">
                                    <img src="/porto/assets/images/demoes/demo42/product/product2-300x300.jpg" width="300"
                                        height="300" alt="product">
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-sale">-13%</span>
                                </div>
                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="#">Hot Deals</a>,
                                        <a href="#">Interior Accessories</a>
                                    </div>
                                    <a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo42-product.html">Product Short Name</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <del class="old-price">$299.00</del>
                                    <span class="product-price">$259.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo42-product.html">
                                    <img src="/porto/assets/images/demoes/demo42/product/product3-300x300.jpg" width="300"
                                        height="300" alt="product">
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-sale">-35%</span>
                                </div>
                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="#">External Accessories</a>,
                                        <a href="#">Hot Deals</a>
                                    </div>
                                    <a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo42-product.html">Product Short Name</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <del class="old-price">$199.00</del>
                                    <span class="product-price">$129.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo42-product.html">
                                    <img src="/porto/assets/images/demoes/demo42/product/product4-300x300.jpg" width="300"
                                        height="300" alt="product">
                                </a>
                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="#">Hot Deals</a>,
                                        <a href="#">Sound & Video</a>
                                    </div>
                                    <a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo42-product.html">Product Short Name</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:60%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$199.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo42-product.html">
                                    <img src="/porto/assets/images/demoes/demo42/product/product5-300x300.jpg" width="300"
                                        height="300" alt="product">
                                </a>
                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="#">Hot Deals</a>,
                                        <a href="#">Steering Wheels</a>
                                    </div>
                                    <a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo42-product.html">Product Short Name</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$55.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo42-product.html">
                                    <img src="/porto/assets/images/demoes/demo42/product/product6-300x300.jpg" width="300"
                                        height="300" alt="product">
                                </a>
                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="#">Fluids & Chemicals</a>,
                                        <a href="#">Hot Deals</a>
                                    </div>
                                    <a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo42-product.html">Product Short Name</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$299.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div>
                </div>
            </section>
            <section class="product-section2 container">
                <div class="row">
                    <div class="col-md-4 appear-animate" data-animation-name="fadeInLeftShorter">
                        <h3 class="custom-title">Special Offers</h3>
                        <div class="owl-carousel owl-theme dots-simple">
                            <div class="banner banner1"
                                style="background: url(/porto/assets/images/demoes/demo42/banner/banner1.jpg) rgb(232, 127, 59);
                            background-position: center; background-size: cover; background-repeat: no-repeat; min-height: 40.2rem;">
                                <div class="banner-content banner-layer-middle position-absolute">

                                    <img src="/porto/assets/images/demoes/demo42/shop_brand1.png" width="232" height="28"
                                        alt="brand" />
                                    <h3 class="banner-subtitle text-uppercase text-white">Interior
                                        Accessories</h3>
                                    <h2 class="banner-title text-uppercase text-white font-weight-bold">
                                        Starting<br>At <sup>$</sup>99<sup>99</sup>
                                    </h2>
                                    <p class="banner-desc text-white">Start Shopping Right Now</p>
                                    <a href="#" class="btn btn-dark btn-rounded btn-icon-right ls-25" role="button">Shop
                                        Now
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="banner banner2"
                                style="background: url(/porto/assets/images/demoes/demo42/banner/banner2.jpg) rgb(83, 86, 91);
                            background-position: center; background-size: cover; background-repeat: no-repeat; min-height: 40.2rem;">
                                <div class="banner-content banner-layer-middle position-absolute">

                                    <img src="/porto/assets/images/demoes/demo42/shop_brand1.png" width="232" height="28"
                                        alt="brand" />
                                    <h3 class="banner-subtitle text-uppercase text-white">Interior
                                        Accessories</h3>
                                    <h2 class="banner-title text-uppercase text-white font-weight-bold">
                                        Starting<br>At <sup>$</sup>99<sup>99</sup>
                                    </h2>
                                    <p class="banner-desc text-white">Start Shopping Right Now</p>
                                    <a href="#" class="btn btn-primary btn-rounded btn-icon-right ls-25"
                                        role="button">Shop
                                        Now
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 appear-animate" data-animation-name="fadeInLeftShorter"
                        data-animation-delay="200">
                        <div class="d-lg-flex align-items-center">
                            <h3 class="custom-title divider">We Suggest</h3>
                            <a href="/porto/demo42-shop.html" class="sicon-title">VIEW ALL<i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo42-product.html">
                                    <img src="/porto/assets/images/demoes/demo42/product/product7-300x300.jpg" width="95"
                                        height="95" alt="product">
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="/porto/category.html">Interior Accessories</a>
                                </div>
                                <h3 class="product-title">
                                    <a href="#">Product Short Name</a>
                                </h3>
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
                                    <span class="product-price">$129.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo42-product.html">
                                    <img src="/porto/assets/images/demoes/demo42/product/product8-300x300.jpg" width="95"
                                        height="95" alt="product">
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="/porto/category.html">Auto Parts</a>
                                </div>
                                <h3 class="product-title">
                                    <a href="#">Product Short Name</a>
                                </h3>
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
                                    <span class="product-price">$288.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo42-product.html">
                                    <img src="/porto/assets/images/demoes/demo42/product/product9-300x300.jpg" width="95"
                                        height="95" alt="product">
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="/porto/category.html">Interior Accessories</a>
                                </div>
                                <h3 class="product-title">
                                    <a href="#">Product Short Name</a>
                                </h3>
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
                                    <del class="old-price">$299.00</del>
                                    <span class="product-price">$259.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>
                    <div class="col-md-4 appear-animate" data-animation-name="fadeInLeftShorter"
                        data-animation-delay="400">
                        <div class="d-lg-flex align-items-center">
                            <h3 class="custom-title divider">Customer Favorites</h3>
                            <a href="/porto/demo42-shop.html" class="sicon-title">VIEW ALL<i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo42-product.html">
                                    <img src="/porto/assets/images/demoes/demo42/product/product10-300x300.jpg" width="95"
                                        height="95" alt="product">
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="/porto/category.html">Performance</a>
                                </div>
                                <h3 class="product-title">
                                    <a href="#">Product Short Name</a>
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
                                    <span class="product-price">$488.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo42-product.html">
                                    <img src="/porto/assets/images/demoes/demo42/product/product11-300x300.jpg" width="95"
                                        height="95" alt="product">
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="/porto/category.html">Sound & Video</a>
                                </div>
                                <h3 class="product-title">
                                    <a href="#">Product Short Name</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
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
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo42-product.html">
                                    <img src="/porto/assets/images/demoes/demo42/product/product12-300x300.jpg" width="95"
                                        height="95" alt="product">
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="/porto/category.html">Hot Deals</a>,
                                    <a href="/porto/category.html">Steering Wheels</a>
                                </div>
                                <h3 class="product-title">
                                    <a href="#">Product Short Name</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$55.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>
                </div>
            </section>
            <section class="brand-section appear-animate" style="background-color: #f4f4f4;">
                <div class="container">
                    <h2 class="title title-underline pb-1 appear-animate" data-animation-name="fadeInLeftShorter">Shop
                        By
                        Brand</h2>
                    <div class="owl-carousel owl-theme nav-big nav-outer appear-animate" data-owl-options="{
                    'loop': false,
                    'dots': false,
                    'nav': true,
                    'margin': 20,
                    'responsive': {
                        '0': {
                            'items': 1
                        },
                        '750': {
                            'items': 2
                        }
                    }
                }">
                        <div class="brand-box">
                            <div class="brand-name">
                                <h3>Shop Ron Jones:</h3>
                                <img src="/porto/assets/images/demoes/demo42/new_brand2.png" width="140" height="60"
                                    alt="brand" />
                            </div>
                            <div class="shop-products owl-carousel owl-theme dots-simple" data-owl-options="{
                                'loop': false,
                                'dots': true,
                                'nav': false,
                                'items': 2,
                                'margin': 30
                            }">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo42-product.html">
                                            <img src="/porto/assets/images/demoes/demo42/product/product10-300x300.jpg"
                                                width="300" height="300" alt="product">
                                        </a>
                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick
                                            View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="#">Performance</a>
                                            </div>
                                            <a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo42-product.html">Product Short Name</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$488.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo42-product.html">
                                            <img src="/porto/assets/images/demoes/demo42/product/product13-300x300.jpg"
                                                width="300" height="300" alt="product">
                                        </a>
                                        <div class="label-group">
                                            <span class="product-label label-sale">-17%</span>
                                        </div>
                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick
                                            View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="#">Auto Parts</a>
                                            </div>
                                            <a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo42-product.html">Product Short Name</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <del class="old-price">$59.00</del>
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo42-product.html">
                                            <img src="/porto/assets/images/demoes/demo42/product/product6-300x300.jpg"
                                                width="300" height="300" alt="product">
                                        </a>
                                        <div class="label-group">
                                            <span class="product-label label-sale">-35%</span>
                                        </div>
                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick
                                            View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="#">External Accessories</a>
                                                <a href="#">Hot Deals</a>
                                            </div>
                                            <a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo42-product.html">Product Short Name</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:0%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <del class="old-price">$199.00</del>
                                            <span class="product-price">$129.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>
                        </div>
                        <div class="brand-box">
                            <div class="brand-name">
                                <h3>Shop Golden Grid:</h3>
                                <img src="/porto/assets/images/demoes/demo42/new_brand3.png" width="140" height="60"
                                    alt="brand" />
                            </div>
                            <div class="shop-products owl-carousel owl-theme dots-simple" data-owl-options="{
                                'loop': false,
                                'dots': true,
                                'nav': false,
                                'items': 2,
                                'margin': 30
                            }">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo42-product.html">
                                            <img src="/porto/assets/images/demoes/demo42/product/product3-300x300.jpg"
                                                width="300" height="300" alt="product">
                                        </a>
                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick
                                            View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="#">Hot Deals</a>,
                                                <a href="#">Steering Wheels</a>
                                            </div>
                                            <a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo42-product.html">Product Short Name</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$55.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo42-product.html">
                                            <img src="/porto/assets/images/demoes/demo42/product/product14-300x300.jpg"
                                                width="300" height="300" alt="product">
                                        </a>
                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick
                                            View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="#">Lanterns & lighting</a>
                                            </div>
                                            <a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo42-product.html">Product Short Name</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:0%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$299.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo42-product.html">
                                            <img src="/porto/assets/images/demoes/demo42/product/product6-300x300.jpg"
                                                width="300" height="300" alt="product">
                                        </a>
                                        <div class="label-group">
                                            <span class="product-label label-sale">-35%</span>
                                        </div>
                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick
                                            View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="#">External Accessories</a>,
                                                <a href="#">Hot Deals</a>
                                            </div>
                                            <a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo42-product.html">Product Short Name</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:0%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <del class="old-price">$199.00</del>
                                            <span class="product-price">$129.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>
                        </div>
                        <div class="brand-box">
                            <div class="brand-name">
                                <h3>Shop David Smith:</h3>
                                <img src="/porto/assets/images/demoes/demo42/new_brand1.png" width="140" height="60"
                                    alt="brand" />
                            </div>
                            <div class="shop-products owl-carousel owl-theme dots-simple" data-owl-options="{
                                'loop': false,
                                'dots': true,
                                'nav': false,
                                'items': 2,
                                'margin': 30
                            }">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo42-product.html">
                                            <img src="/porto/assets/images/demoes/demo42/product/product11-300x300.jpg"
                                                width="300" height="300" alt="product">
                                        </a>
                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick
                                            View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="#">Sound & Video</a>
                                            </div>
                                            <a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo42-product.html">Product Short Name</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$299.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo42-product.html">
                                            <img src="/porto/assets/images/demoes/demo42/product/product6-300x300.jpg"
                                                width="300" height="300" alt="product">
                                        </a>
                                        <div class="label-group">
                                            <span class="product-label label-sale">-35%</span>
                                        </div>
                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick
                                            View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="#">External Accessories</a>,
                                                <a href="#">Hot Deals</a>
                                            </div>
                                            <a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo42-product.html">Product Short Name</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:0%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <del class="old-price">$199.00</del>
                                            <span class="product-price">$129.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo42-product.html">
                                            <img src="/porto/assets/images/demoes/demo42/product/product7-300x300.jpg"
                                                width="300" height="300" alt="product">
                                        </a>
                                        <div class="label-group">
                                            <span class="product-label label-hot">HOT</span>
                                            <span class="product-label label-sale">-35%</span>
                                        </div>
                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick
                                            View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="#">Interior Accessories</a>
                                            </div>
                                            <a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo42-product.html">Product Short Name</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:0%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <del class="old-price">$199.00</del>
                                            <span class="product-price">$129.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="call-section appear-animate" style="background-color: #212529;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <h4 class="text-white text-uppercase">looking for help to
                                find auto parts?</h4>
                            <h2 class="text-white">Best Auto Parts Downtown Los Angeles CA</h2>
                            <h3>Call Us or Drop Us a Message Through Our Contact Form</h3>
                        </div>
                        <div class="col-lg-5 call-action">
                            <div class="d-inline-flex align-items-center text-left divider">
                                <i class="icon-phone-1 text-white mr-2"></i>
                                <h6 class="pt-1 line-height-1 text-uppercase text-white">Call us now<a href="tel:#"
                                        class="d-block text-white ls-10 pt-2">+123 5678 890</a></h6>
                            </div>
                            <a href="/porto/contact.html" class="btn btn-borders btn-rounded btn-outline-white ls-25">Send Us a
                                Message</a>
                        </div>
                    </div>
                </div>
                <svg class="custom-svg-3 appear-animate" data-animation-name="fadeIn" version="1.1"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 649 578">
                    <path fill="#f26100"
                        d="M-225.5,154.7l358.45,456.96c7.71,9.83,21.92,11.54,31.75,3.84l456.96-358.45c9.83-7.71,11.54-21.92,3.84-31.75
                        L267.05-231.66c-7.71-9.83-21.92-11.54-31.75-3.84l-456.96,358.45C-231.49,130.66-233.2,144.87-225.5,154.7z">
                    </path>
                    <path class="appear-animate appear-animate-svg" data-animation-name="customLineAnim"
                        data-animation-delay="300" data-animation-duration="5000" fill="none" stroke="#FFF"
                        stroke-width="1.5" stroke-miterlimit="10"
                        d="M416-21l202.27,292.91c5.42,7.85,3.63,18.59-4.05,24.25L198,603"></path>
                </svg>
            </section>
            <section class="product-section1 recently">
                <div class="container">
                    <h2 class="title title-underline pb-1 appear-animate" data-animation-name="fadeInLeftShorter">
                        Recently Arrived</h2>
                    <div class="owl-carousel owl-theme appear-animate" data-owl-options="{
                    'loop': false,
                    'dots': false,
                    'nav': true,
                    'margin': 20,
                    'responsive': {
                        '0': {
                            'items': 2
                        },
                        '576': {
                            'items': 4
                        },
                        '991': {
                            'items': 6
                        }
                    }
                }">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo42-product.html">
                                    <img src="/porto/assets/images/demoes/demo42/product/product4-300x300.jpg" width="300"
                                        height="300" alt="product">
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-sale">-13%</span>
                                </div>
                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="#">Hot Deals</a>,
                                        <a href="#">Interior Accessories</a>
                                    </div>
                                    <a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo42-product.html">Product Short Name</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <del class="old-price">$299.00</del>
                                    <span class="product-price">$259.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo42-product.html">
                                    <img src="/porto/assets/images/demoes/demo42/product/product1-300x300.jpg" width="300"
                                        height="300" alt="product">
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-sale">-13%</span>
                                </div>
                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="#">External Accessories</a>,
                                        <a href="#">Hot Deals</a>
                                    </div>
                                    <a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo42-product.html">Product Short Name</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <del class="old-price">$299.00</del>
                                    <span class="product-price">$259.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo42-product.html">
                                    <img src="/porto/assets/images/demoes/demo42/product/product15-300x300.jpg" width="300"
                                        height="300" alt="product">
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-sale">-13%</span>
                                </div>
                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="#">Interior Accessories</a>
                                    </div>
                                    <a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo42-product.html">Product Short Name</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <del class="old-price">$299.00</del>
                                    <span class="product-price">$259.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo42-product.html">
                                    <img src="/porto/assets/images/demoes/demo42/product/product11-300x300.jpg" width="300"
                                        height="300" alt="product">
                                </a>
                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="#">Sound & Video</a>
                                    </div>
                                    <a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo42-product.html">Product Short Name</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$299.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo42-product.html">
                                    <img src="/porto/assets/images/demoes/demo42/product/product14-300x300.jpg" width="300"
                                        height="300" alt="product">
                                </a>
                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="#">Lanterns & lighting</a>
                                    </div>
                                    <a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo42-product.html">Product Short Name</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$55.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo42-product.html">
                                    <img src="/porto/assets/images/demoes/demo42/product/product7-300x300.jpg" width="300"
                                        height="300" alt="product">
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-hot">HOT</span>
                                    <span class="product-label label-sale">-35%</span>
                                </div>
                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="#">Interior Accessories</a>
                                    </div>
                                    <a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo42-product.html">Product Short Name</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$299.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div>
                </div>
            </section>
            <section class="subcats-section container">
                <div class="row">
                    <div class="col-md-4 part-item appear-animate" data-animation-name="fadeInLeftShorter">
                        <h3>Popular Parts:</h3>
                        <ul class="list-unstyled mb-0">
                            <li><a href="#">Brake Pads &amp; Shoes</a></li>
                            <li><a href="#">Brake Rotors</a></li>
                            <li><a href="#">Alternators</a></li>
                            <li><a href="#">Water Pumps</a></li>
                            <li><a class="show-action" href="#">Show All</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 part-item appear-animate" data-animation-name="fadeInLeftShorter"
                        data-animation-delay="200">
                        <h3>Popular Makes:</h3>
                        <ul class="list-unstyled mb-0">
                            <li><a href="#">Ford Parts</a></li>
                            <li><a href="#">Chevrolet Parts</a></li>
                            <li><a href="#">Honda Parts</a></li>
                            <li><a href="#">Dodge Parts</a></li>
                            <li><a class="show-action" href="#">Show All</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 part-item appear-animate" data-animation-name="fadeInLeftShorter"
                        data-animation-delay="400">
                        <h3>Routine Parts:</h3>
                        <ul class="list-unstyled mb-0">
                            <li><a href="#">Spark Plugs</a></li>
                            <li><a href="#">Car Batteries</a></li>
                            <li><a href="#">Oil Filters</a></li>
                            <li><a href="#">Motor Oil</a></li>
                            <li><a class="show-action" href="#">Show All</a></li>
                        </ul>
                    </div>

                </div>
            </section>
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
