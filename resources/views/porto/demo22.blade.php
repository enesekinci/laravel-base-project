@extends('layouts.porto')

@section('top-notice')
    @include('components.porto.top-notice-demo22')
@endsection

@section('footer')
    @include('components.porto.footer-demo22')
@endsection

@section('header')
    @include('components.porto.header-demo22')
@endsection

@section('content')
<section class="intro-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 mb-2">
                            <div class="home-slider slide-animate owl-carousel owl-theme custom-nav" data-owl-options="{
                                'loop': false
                            }">
                                <div class="home-slide home-slide-1 banner">
                                    <img class="slide-bg" src="/porto/assets/images/demoes/demo22/slider/home_slide1.jpg" alt="slider image" width="772" height="434">
                                    <div class="banner-layer banner-layer-middle banner-layer-right">
                                        <div class="appear-animate" data-animation-name="rotateInUpLeft">

                                            <h2 class="font1 ls-10 text-uppercase text-right m-b-4">Electronic<br>Deals
                                            </h2>
                                            <div class="coupon-sale-text">
                                                <h4 class="m-b-2 font1 d-block text-white bg-dark skew-box">Exclusive COUPON
                                                </h4>
                                                <h5 class="mb-0 font1 d-inline-block bg-dark skew-box"><i class="text-dark ls-0">UP
                                                        TO</i><b class="text-white">$100</b><sub class="text-dark">OFF</sub>
                                                </h5>
                                            </div>

                                            <a href="/porto/demo22-shop.html" class="btn btn-light btn-lg ls-10">View All
                                                Now</a>
                                        </div>
                                    </div>
                                    <div class="banner-layer banner-layer-bottom banner-layer-right">
                                        <p class="ls-0 mb-0">* Only 200 Available</p>
                                    </div>
                                </div>
                                <div class="home-slide home-slide-2 banner">
                                    <img class="slide-bg" src="/porto/assets/images/demoes/demo22/slider/home_slide2.jpg" alt="slider image" width="772" height="434">
                                    <div class="banner-layer banner-layer-middle banner-layer-left">
                                        <div class="appear-animate" data-animation-name="rotateInUpLeft">
                                            <h2 class="font1 ls-10 text-uppercase m-b-4">Top Brands
                                                <br>Smartphones</h2>
                                            <div class="coupon-sale-text d-flex flex-column align-items-start">
                                                <h4 class="m-b-2 font1 d-block text-uppercase text-white bg-dark skew-box">
                                                    Starting From
                                                </h4>
                                                <h5 class="mb-0 font1 d-inline-block bg-dark skew-box"><b class="text-white">$199</b>
                                                </h5>
                                            </div>

                                            <a href="/porto/demo22-shop.html" class="btn btn-light btn-lg ls-10">View All
                                                Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-2">
                            <div class="featured-products-slider owl-carousel owl-theme dot-inside dots-small">
                                <div class="product-default count-down">
                                    <h3 class="product-name">Flash Deals</h3>
                                    <figure>
                                        <a href="/porto/demo22-product.html">
                                            <img src="/porto/assets/images/demoes/demo22/products/featured-sale.jpg" width="217" height="217" alt="product">
                                        </a>
                                        <div class="label-group">
                                            <span class="product-label label-sale">- 34%</span>
                                        </div>
                                        <div class="product-countdown-container">
                                            <span class="product-countdown-title">offer ends in:</span>
                                            <div class="product-countdown countdown-compact" data-until="2021, 10, 5" data-compact="true">
                                            </div>
                                            <!-- End .product-countdown -->
                                        </div>
                                        <!-- End .product-countdown-container -->
                                    </figure>
                                    <div class="product-details">
                                        <h3 class="product-title">
                                            <a href="/porto/demo22-product.html">1080p Wifi IP Camera</a>
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
                                            <span class="old-price">$596.00</span>
                                            <span class="product-price">$299.00</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                                <div class="product-default count-down">
                                    <h3 class="product-name">Flash Deals</h3>
                                    <figure>
                                        <a href="/porto/demo22-product.html">
                                            <img src="/porto/assets/images/demoes/demo22/products/featured-sale-2.jpg" width="217" height="217" alt="product">
                                        </a>
                                        <div class="label-group">
                                            <span class="product-label label-sale">- 33%</span>
                                        </div>
                                        <div class="product-countdown-container">
                                            <span class="product-countdown-title">offer ends in: </span>
                                            <div class="product-countdown countdown-compact" data-until="2021, 10, 5" data-compact="true">
                                            </div>
                                            <!-- End .product-countdown -->
                                        </div>
                                        <!-- End .product-countdown-container -->
                                    </figure>
                                    <div class="product-details">
                                        <h3 class="product-title">
                                            <a href="/porto/demo22-product.html">HD Camera</a>
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
                                            <span class="old-price">$299.00</span>
                                            <span class="product-price">$199.00</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="container">
                <div class="info-boxes-container">
                    <div class="row m-0 divide-line">
                        <div class="info-box info-box-icon-left col-sm-6 col-lg-3">
                            <i class="icon-shipping text-primary"></i>

                            <div class="info-box-content">
                                <h4 class="font1 line-height-1 ls-10">FREE SHIPPING &amp; RETURN</h4>
                                <p class="font-weight-light">Free shipping on orders over $99.</p>
                            </div>
                            <!-- End .info-box-content -->
                        </div>
                        <!-- End .info-box -->
                        <div class="info-box info-box-icon-left col-sm-6 col-lg-3">
                            <i class="icon-money text-primary"></i>

                            <div class="info-box-content">
                                <h4 class="font1 line-height-1 ls-10">MONEY BACK GUARANTEE</h4>
                                <p class="font-weight-light">100% money back guarantee</p>
                            </div>
                            <!-- End .info-box-content -->
                        </div>
                        <!-- End .info-box -->
                        <div class="info-box info-box-icon-left col-sm-6 col-lg-3">
                            <i class="icon-support text-primary"></i>

                            <div class="info-box-content">
                                <h4 class="font1 line-height-1 ls-10">ONLINE SUPPORT 24/7</h4>
                                <p class="font-weight-light">Lorem ipsum dolor sit amet.</p>
                            </div>
                            <!-- End .info-box-content -->
                        </div>
                        <!-- End .info-box -->
                        <div class="info-box info-box-icon-left col-sm-6 col-lg-3">
                            <i class="icon-secure-payment text-primary"></i>

                            <div class="info-box-content">
                                <h4 class="font1 line-height-1 ls-10">SECURE PAYMENT</h4>
                                <p class="font-weight-light">Lorem Ipsum dolor sit amet.</p>
                            </div>
                            <!-- End .info-box-content -->
                        </div>
                        <!-- End .info-box -->
                    </div>
                </div>
            </div>

            <section class="most-viewed-products appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200">
                <div class="container">
                    <h2 class="section-title ls-n-10 pb-3 m-b-4">Most Viewed Products</h2>

                    <div class="row">
                        <div class="products-slider 5col owl-carousel owl-theme owl-nav-outisde show-nav-hover nav-image-center custom-nav" data-owl-options="{
                            'margin': 0,
                            'nav': true
                        }">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo22-product.html">
                                        <img src="/porto/assets/images/demoes/demo22/products/product-1.jpg" width="217" height="217" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                        View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo22-product.html">Smart Watches</a>
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
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo22-product.html">
                                        <img src="/porto/assets/images/demoes/demo22/products/product-2.jpg" width="217" height="217" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="/porto/demo22-product.html" class="btn-icon btn-add-cart"><i
                                                class="fa fa-arrow-right"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                        View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo22-product.html">Digital Camera 16x</a>
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
                                        <span class="product-price">$101.00 &ndash; $111.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo22-product.html">
                                        <img src="/porto/assets/images/demoes/demo22/products/product-3.jpg" width="217" height="217" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="/porto/demo22-product.html" class="btn-icon btn-add-cart"><i
                                                class="fa fa-arrow-right"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                        View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo22-product.html">Porto Extended Camera</a>
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
                                        <span class="product-price">$599.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo22-product.html">
                                        <img src="/porto/assets/images/demoes/demo22/products/product-4.jpg" width="217" height="217" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="/porto/demo22-product.html" class="btn-icon btn-add-cart"><i
                                                class="fa fa-arrow-right"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                        View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo22-product.html">Black Grey Headset</a>
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
                                        <span class="product-price">$39.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo22-product.html">
                                        <img src="/porto/assets/images/demoes/demo22/products/product-5.jpg" width="217" height="217" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                        View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo22-product.html">Battery Charger</a>
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
                                        <span class="product-price">$299.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo22-product.html">
                                        <img src="/porto/assets/images/demoes/demo22/products/product-6.jpg" width="217" height="217" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                        View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo22-product.html">Brown Bag</a>
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
                        </div>
                    </div>
                </div>
            </section>

            <section class="top-categories">
                <div class="container">
                    <div class="row m-b-3">
                        <div class="col-lg-6">
                            <div class="banner banner1 mb-2 appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="200" style="background-color: #f4f4f4;">
                                <figure>
                                    <img src="/porto/assets/images/demoes/demo22/banners/banner-1.jpg" alt="banner" width="700" height="236">
                                </figure>
                                <div class="banner-layer banner-layer-middle banner-layer-left">
                                    <h3 class="font1 ls-10 text-uppercase mb-0">Action<br>Cameras</h3>
                                </div>
                                <div class="banner-layer banner-layer-middle banner-layer-right">
                                    <div class="coupon-sale-text">
                                        <h4 class="font1 line-height-1 ls-10 text-white bg-primary skew-box m-b-2">
                                            Starting from</h4>
                                        <h5 class="d-inline-block font1 text-white bg-primary skew-box mb-0">$399<sub class="text-dark">$499</sub>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="banner banner2 mb-2 appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="200" style="background-color: #f4f4f4;">
                                <figure>
                                    <img src="/porto/assets/images/demoes/demo22/banners/banner-2.jpg" alt="banner" width="700" height="236">
                                </figure>
                                <div class="banner-layer banner-layer-middle banner-layer-left">
                                    <h3 class="font1 text-uppercase ls-10 mb-0">For all<br>styles</h3>
                                </div>
                                <div class="banner-layer banner-layer-middle banner-layer-right">
                                    <div class="coupon-sale-text">
                                        <h4 class="font1 line-height-1 ls-10 text-white bg-secondary skew-box m-b-2">
                                            Starting from</h4>
                                        <h5 class="d-inline-block font1 text-white bg-secondary skew-box mb-0">$199<sub class="text-dark">$299</sub>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h2 class="section-title line-height-1 ls-10 pb-4 mb-4">Top Categories</h2>

                    <div class="mb-2 appear-animate" data-animation-name="fadeIn" data-animation-delay="200">
                        <div class="categories-slider owl-carousel owl-theme" data-owl-options="{
                            'margin': 0,
                            'nav': false,
                            'responsive': {
                                '480': {
                                    'items': 3
                                },
                                '576': {
                                    'items': 4
                                },
                                '768': {
                                    'items': 5
                                },
                                '992': {
                                    'items': 6
                                },
                                '1200': {
                                    'items': 7
                                }
                            }
                        }">
                            <a href="/porto/demo22-shop.html">
                                <i class="icon-category-fashion"></i>
                                <span>Fashion</span>
                            </a>
                            <a href="/porto/demo22-shop.html">
                                <i class="icon-category-electronics"></i>
                                <span>Electronics</span>
                            </a>
                            <a href="/porto/demo22-shop.html">
                                <i class="icon-category-gifts"></i>
                                <span>Gifts</span>
                            </a>
                            <a href="/porto/demo22-shop.html">
                                <i class="icon-category-garden"></i>
                                <span>Garden</span>
                            </a>
                            <a href="/porto/demo22-shop.html">
                                <i class="icon-category-music"></i>
                                <span>Music</span>
                            </a>
                            <a href="/porto/demo22-shop.html">
                                <i class="icon-category-motors"></i>
                                <span>Motors</span>
                            </a>
                            <a href="/porto/demo22-shop.html">
                                <i class="icon-category-furniture"></i>
                                <span>Furniture</span>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <section class="best-sellers bg-gray appear-animate" data-animation-name="fadeIn" data-animation-delay="200">
                <div class="container">
                    <h2 class="section-title ls-n-10 pb-3 m-b-4">Best Sellers on Electronics</h2>

                    <div class="grid grid1">
                        <div class="grid-item col-md-8 col-lg-9 col-xl-5col-2 height-x2">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo22-product.html">
                                        <img src="/porto/assets/images/demoes/demo22/products/product-big-1.jpg" width="217" height="217" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                        View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo22-product.html">Smart Watches</a>
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
                        </div>
                        <div class="grid-item col-6 col-md-4 col-lg-3 col-xl-5col height-x1">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo22-product.html">
                                        <img src="/porto/assets/images/demoes/demo22/products/product-22.jpg" width="217" height="217" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-sale">-33%</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                        View</a>
                                    <div class="product-countdown-container">
                                        <span class="product-countdown-title">offer ends in: </span>
                                        <div class="product-countdown countdown-compact" data-until="2021, 10, 5" data-compact="true">
                                        </div>
                                        <!-- End .product-countdown -->
                                    </div>
                                    <!-- End .product-countdown-container -->
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo22-product.html">HD Camera</a>
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
                                        <span class="old-price">$299.00</span>
                                        <span class="product-price">$199.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                        </div>
                        <div class="grid-item col-6 col-md-4 col-lg-3 col-xl-5col height-x1">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo22-product.html">
                                        <img src="/porto/assets/images/demoes/demo22/products/product-21.jpg" width="217" height="217" alt="product">
                                    </a>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                        View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo22-product.html">Black Watches</a>
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
                                        <span class="old-price">$199.00</span>
                                        <span class="product-price">$129.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                        </div>
                        <div class="grid-item col-6 col-md-4 col-lg-3 col-xl-5col height-x1">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo22-product.html">
                                        <img src="/porto/assets/images/demoes/demo22/products/product-20.jpg" width="217" height="217" alt="product">
                                    </a>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                        View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo22-product.html">HD Camera</a>
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
                                        <span class="old-price">$199.00</span>
                                        <span class="product-price">$129.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                        </div>
                        <div class="grid-item col-6 col-md-4 col-lg-3 col-xl-5col height-x1">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo22-product.html">
                                        <img src="/porto/assets/images/demoes/demo22/products/product-23.jpg" width="217" height="217" alt="product">
                                    </a>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                        View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo22-product.html">Computer Mouse</a>
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
                        <div class="grid-item col-6 col-md-4 col-lg-3 col-xl-5col height-x1">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo22-product.html">
                                        <img src="/porto/assets/images/demoes/demo22/products/product-5.jpg" width="217" height="217" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                        View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo22-product.html">Battery Charger</a>
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
                                        <span class="product-price">$299.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                        </div>
                        <div class="grid-item col-6 col-md-4 col-lg-3 col-xl-5col height-x1">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo22-product.html">
                                        <img src="/porto/assets/images/demoes/demo22/products/product-11.jpg" width="217" height="217" alt="product">
                                    </a>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                        View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo22-product.html">Blue Gentle Shoes</a>
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
                                        <span class="product-price">$101.00 &ndash; $111.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                        </div>
                        <div class="grid-col-sizer col-1 col-xl-5col"></div>
                    </div>
                </div>
            </section>

            <section class="recent-products">
                <div class="container">
                    <div class="appear-animate" data-animation-name="fadeIn" data-animation-delay="200">
                        <h2 class="section-title ls-n-10 pb-3 m-b-4">Recent Products</h2>

                        <div class="row">
                            <div class="products-slider 5col owl-carousel owl-theme owl-nav-outisde show-nav-hover" data-owl-options="{
                            'margin': 0
                        }">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo22-product.html">
                                            <img src="/porto/assets/images/demoes/demo22/products/product-20.jpg" width="217" height="217" alt="product">
                                        </a>
                                        <div class="label-group">
                                            <div class="product-label label-sale">-35%</div>
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
                                                <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo22-product.html">HD Camera</a>
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
                                            <span class="old-price">$199.00</span>
                                            <span class="product-price">$129.00</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo22-product.html">
                                            <img src="/porto/assets/images/demoes/demo22/products/product-21.jpg" width="217" height="217" alt="product">
                                        </a>
                                        <div class="label-group">
                                            <div class="product-label label-sale">-35%</div>
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
                                                <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo22-product.html">Black Watches</a>
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
                                            <span class="old-price">$199.00</span>
                                            <span class="product-price">$129.00</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo22-product.html">
                                            <img src="/porto/assets/images/demoes/demo22/products/product-12.jpg" width="217" height="217" alt="product">
                                        </a>
                                        <div class="label-group">
                                            <div class="product-label label-sale">-89%</div>
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
                                                <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo22-product.html">USB Speaker</a>
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
                                            <span class="old-price">$596.00</span>
                                            <span class="product-price">$68.00</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo22-product.html">
                                            <img src="/porto/assets/images/demoes/demo22/products/product-17.jpg" width="217" height="217" alt="product">
                                        </a>
                                        <div class="label-group">
                                            <div class="product-label label-sale">-89%</div>
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
                                                <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo22-product.html">Classic Earphone</a>
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
                                            <span class="old-price">$596.00</span>
                                            <span class="product-price">$68.00</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo22-product.html">
                                            <img src="/porto/assets/images/demoes/demo22/products/product-10.jpg" width="217" height="217" alt="product">
                                        </a>
                                        <div class="label-group">
                                            <div class="product-label label-sale">-17%</div>
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
                                                <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo22-product.html">Bluetooth Speaker</a>
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
                                            <span class="old-price">$59.00</span>
                                            <span class="product-price">$49.00</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="banner banner3 bg-dark appear-animate" data-animation-name="fadeIn" data-animation-delay="200">
                        <div class="row m-0 no-gutters align-items-center">
                            <div class="col-md-6 col-lg-3 align-self-baseline">
                                <figure>
                                    <img src="/porto/assets/images/demoes/demo22/banners/banner-3.jpg" alt="image" width="380" height="136">
                                </figure>
                            </div>
                            <div class="col-md-6 col-lg-4 py-4 py-lg-5">
                                <div class="px-5 px-md-0">
                                    <h3 class="font1 text-uppercase m-b-2">Check new arrivals</h3>
                                    <h2 class="font1 ls-10 text-uppercase text-white mb-0">Explore Smartphones</h2>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 py-4 py-lg-5 d-flex justify-content-md-center">
                                <div class="px-5 px-md-0">
                                    <div class="coupon-sale-text d-flex flex-column align-items-start">
                                        <h4 class="m-b-2 font1 d-block text-dark bg-white skew-box">Exclusive COUPON
                                        </h4>
                                        <h5 class="mb-0 font1 d-inline-block bg-primary skew-box"><i class="text-white ls-0">UP
                                                TO</i><b class="text-white">$200</b><sub class="text-white">OFF</sub>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-2 py-4 py-lg-5">
                                <div class="px-5 px-md-0">
                                    <a href="/porto/demo22-shop.html" class="btn btn-dark font1 ls-10">View All Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="electronics-container appear-animate" data-animation-name="fadeIn" data-animation-delay="200">
                <div class="container">
                    <h2 class="section-title border-0 line-height-1 ls-n-10 m-b-4">Electronics</h2>

                    <div class="row no-gutters m-0 bg-gray">
                        <div class="col-md-5 col-lg-2">
                            <div class="category-lists d-flex flex-md-column flex-wrap">
                                <a href="#">3D Printer Kit</a>
                                <a href="#">Arduino Compatible Boards</a>
                                <a href="#">Digital Microscope</a>
                                <a href="#">Furniture</a>
                                <a href="#">IP Camera</a>
                                <a href="#">Toys</a>
                                <a href="#">TV Box</a>
                            </div>
                        </div>

                        <div class="col-md-7 col-lg-3 order-first order-md-0">
                            <div class="banner banner4 h-100" style="background-color: #f4f4f4;">
                                <figure class="h-100">
                                    <img class="h-100" src="/porto/assets/images/demoes/demo22/banners/banner-4.jpg" alt="baner" width="360" height="508">
                                </figure>
                                <div class="banner-layer banner-layer-top">
                                    <h3 class="font1 text-center text-uppercase">
                                        Electronic<br>deals
                                    </h3>
                                    <div class="coupon-sale-text d-flex flex-column align-items-start">
                                        <h4 class="m-b-2 font1 d-block text-white bg-dark skew-box">Exclusive COUPON
                                        </h4>
                                        <h5 class="mb-0 font1 d-inline-block bg-dark skew-box"><i class="text-dark ls-0">UP
                                                TO</i><b class="text-white">$100</b><sub class="text-dark">OFF</sub>
                                        </h5>
                                    </div>
                                </div>
                                <div class="banner-layer banner-layer-bottom">
                                    <a href="/porto/demo22-shop.html" class="btn btn-light">View All Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <div class="grid grid2">
                                <div class="grid-item col-md-8 height-x1">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo22-product.html">
                                                <img src="/porto/assets/images/demoes/demo22/products/product-10.jpg" width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-sale">-17%</div>
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
                                                    <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo22-product.html">Bluetooth Speaker</a>
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
                                                <span class="old-price">$59.00</span>
                                                <span class="product-price">$49.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                </div>
                                <div class="grid-item col-6 col-md-4 height-x2">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo22-product.html">
                                                <img src="/porto/assets/images/demoes/demo22/products/product-9.jpg" width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-sale">-17%</div>
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
                                                    <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo22-product.html">Laptop Case Bag</a>
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
                                                <span class="old-price">$1,999.00</span>
                                                <span class="product-price">$1,699.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                </div>
                                <div class="grid-item col-6 col-md-4 height-x1">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo22-product.html">
                                                <img src="/porto/assets/images/demoes/demo22/products/product-18.jpg" width="217" height="217" alt="product">
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
                                                    <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo22-product.html">Motor Cap</a>
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
                                                <span class="old-price">$199.00</span>
                                                <span class="product-price">$109.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                </div>
                                <div class="grid-item col-6 col-md-4 height-x1">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo22-product.html">
                                                <img src="/porto/assets/images/demoes/demo22/products/product-23.jpg" width="217" height="217" alt="product">
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
                                                    <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo22-product.html">Computer Mouse</a>
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
                                <div class="col-1 col-md-4 grid-col-sizer"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="mobile-phones-container appear-animate" data-animation-name="fadeIn" data-animation-delay="200">
                <div class="container">
                    <h2 class="section-title border-0 line-height-1 ls-n-10 m-b-4">Mobile Phones &amp; Accessories</h2>

                    <div class="row no-gutters m-0 bg-gray">
                        <div class="col-md-5 col-lg-2">
                            <div class="category-lists d-flex flex-md-column flex-wrap">
                                <a href="#">Motors</a>
                                <a href="#">Oneplus 6</a>
                                <a href="#">Power Bank</a>
                                <a href="#">Smart Watch</a>
                                <a href="#">Type-c Cable</a>
                                <a href="#">Xiaomi Mi A2</a>
                                <a href="#">Xiaomi Mi Band 3</a>
                            </div>
                        </div>

                        <div class="col-md-7 col-lg-3 order-first order-md-0">
                            <div class="banner banner5 h-100" style="background-color: #f4f4f4;">
                                <figure class="h-100">
                                    <img class="h-100" src="/porto/assets/images/demoes/demo22/banners/banner-5.jpg" alt="baner" width="360" height="508">
                                </figure>
                                <div class="banner-layer banner-layer-top">
                                    <h3 class="font1 text-center text-uppercase">
                                        Top Brands<br>Smartphones
                                    </h3>
                                    <div class="coupon-sale-text d-flex flex-column align-items-start">
                                        <h4 class="m-b-2 font1 d-block text-uppercase text-white bg-dark skew-box">
                                            Starting From</h4>
                                        <h5 class="mb-0 font1 d-inline-block bg-dark skew-box"><b class="text-white">$199</b>
                                        </h5>
                                    </div>
                                </div>
                                <div class="banner-layer banner-layer-bottom">
                                    <a href="/porto/demo22-shop.html" class="btn btn-primary">View All Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <div class="grid grid3">
                                <div class="grid-item col-md-8 height-x1">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo22-product.html">
                                                <img src="/porto/assets/images/demoes/demo22/products/product-12.jpg" width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-sale">-89%</div>
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
                                                    <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo22-product.html">USB Speaker</a>
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
                                                <span class="old-price">$596.00</span>
                                                <span class="product-price">$68.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                </div>
                                <div class="grid-item col-6 col-md-4 height-x2">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo22-product.html">
                                                <img src="/porto/assets/images/demoes/demo22/products/product-17.jpg" width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-sale">-89%</div>
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
                                                    <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo22-product.html">Classic Earphone</a>
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
                                                <span class="old-price">$596.00</span>
                                                <span class="product-price">$68.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                </div>
                                <div class="grid-item col-6 col-md-4 height-x1">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo22-product.html">
                                                <img src="/porto/assets/images/demoes/demo22/products/product-13.jpg" width="217" height="217" alt="product">
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
                                                    <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo22-product.html">Casual Blue Shoes</a>
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
                                                <span class="product-price">$101.00 &ndash; $108.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                </div>
                                <div class="grid-item col-6 col-md-4 height-x1">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo22-product.html">
                                                <img src="/porto/assets/images/demoes/demo22/products/product-11.jpg" width="217" height="217" alt="product">
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
                                                    <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo22-product.html">Blue Gentle Shoes</a>
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
                                                <span class="product-price">$101.00 &ndash; $111.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                </div>
                                <div class="col-1 col-md-4 grid-col-sizer"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="top-rated-products appear-animate" data-animation-name="fadeIn" data-animation-delay="200">
                <div class="container">
                    <h2 class="section-title ls-n-10 pb-3 m-b-4">Top Rated Products</h2>

                    <div class="row">
                        <div class="products-slider 5col owl-carousel owl-theme owl-nav-outisde show-nav-hover" data-owl-options="{
                            'margin': 0
                        }">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo22-product.html">
                                        <img src="/porto/assets/images/demoes/demo22/products/product-13.jpg" width="217" height="217" alt="product">
                                    </a>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                        View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo22-product.html">Casual Blue Shoes</a>
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
                                        <span class="product-price">$101.00 &ndash; $108.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo22-product.html">
                                        <img src="/porto/assets/images/demoes/demo22/products/product-22.jpg" width="217" height="217" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-sale">-33%</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                        View</a>
                                    <div class="product-countdown-container">
                                        <span class="product-countdown-title">offer ends in: </span>
                                        <div class="product-countdown countdown-compact" data-until="2021, 10, 5" data-compact="true">
                                        </div>
                                        <!-- End .product-countdown -->
                                    </div>
                                    <!-- End .product-countdown-container -->
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo22-product.html">HD Camera</a>
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
                                        <span class="old-price">$299.00</span>
                                        <span class="product-price">$199.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                            <div class="product-default inner-icon inner-quickview">
                                <figure>
                                    <a href="/porto/demo22-product.html">
                                        <img src="/porto/assets/images/demoes/demo22/products/product-4.jpg" width="217" height="217" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <span class="product-label label-sale">- 34%</span>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                        View</a>
                                    <div class="product-countdown-container">
                                        <span class="product-countdown-title">offer ends in:</span>
                                        <div class="product-countdown countdown-compact" data-until="2021, 10, 5" data-compact="true">
                                        </div>
                                        <!-- End .product-countdown -->
                                    </div>
                                    <!-- End .product-countdown-container -->
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo22-product.html">1080p Wifi IP Camera</a>
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
                                        <span class="old-price">$596.00</span>
                                        <span class="product-price">$299.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo22-product.html">
                                        <img src="/porto/assets/images/demoes/demo22/products/product-9.jpg" width="217" height="217" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-sale">-17%</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                        View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo22-product.html">Laptop Case Bag</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:90%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="old-price">$1,999.00</span>
                                        <span class="product-price">$1,699.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo22-product.html">
                                        <img src="/porto/assets/images/demoes/demo22/products/product-8.jpg" width="217" height="217" alt="product">
                                        <img src="/porto/assets/images/demoes/demo22/products/product-8-2.jpg" width="217" height="217" alt="product">
                                    </a>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                        View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo22-product.html">Black Shoes</a>
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
                                        <span class="product-price">$101.00 &ndash; $111.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo22-product.html">
                                        <img src="/porto/assets/images/demoes/demo22/products/product-big-1.jpg" width="217" height="217" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                        View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo22-product.html">Smart Watches</a>
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
                        </div>
                    </div>
                </div>
            </section>

            <section class="brands-section">
                <div class="container">
                    <h2 class="section-title line-height-1 ls-10 pb-4 mb-5 appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200" data-animation-duration="400">
                        Top Brands</h2>

                    <div class="brands-slider owl-carousel owl-theme images-center appear-animate" data-animation-name="fadeIn" data-animation-delay="400" data-owl-options="{
                        'margin': 30,
                        'responsive': {
                            '991': {
                                'items': 4
                            },
                            '1200': {
                                'items': 5
                            }
                        }
                    }">
                        <img src="/porto/assets/images/demoes/demo22/brands/brand1.png" width="200" height="50" alt="brand">
                        <img src="/porto/assets/images/demoes/demo22/brands/brand2.png" width="200" height="50" alt="brand">
                        <img src="/porto/assets/images/demoes/demo22/brands/brand3.png" width="200" height="50" alt="brand">
                        <img src="/porto/assets/images/demoes/demo22/brands/brand4.png" width="200" height="50" alt="brand">
                        <img src="/porto/assets/images/demoes/demo22/brands/brand5.png" width="200" height="50" alt="brand">
                    </div>
                    <!-- End .brands-slider -->
                </div>
            </section>
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
