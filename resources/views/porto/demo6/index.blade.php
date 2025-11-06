@extends('layouts.porto')

@section('footer')
    @include('components.porto.demo6.footer')
@endsection


@section('header')
    @include('components.porto.demo6.header-home')
@endsection

@section('content')
<div class="home-slider-container">
                <div class="home-slider owl-carousel owl-theme dot-inside slide-animate" data-owl-options="{
                    'dots': true,
                    'nav': false
                }">
                    <div class="home-slide home-slide-1 banner banner-h-100 banner-md-vw-small">
                        <img class="slide-bg h-100" src="/porto/assets/images/demoes/demo6/slider/slide-1.jpg" style="background-color: #ccc;" width="1903" height="969" alt="Home Banner" />
                        <!-- End .slide-bg -->
                        <div class="banner-layer banner-layer-middle text-center">
                            <h2 class="text-center font3 font-weight-normal m-b-4 text-primary appear-animate" data-animation-duration="1200" data-animation-name="fadeIn">Summer Fashion Trends</h2>
                            <h3 class="text-center m-b-1 text-uppercase appear-animate" data-animation-delay="800" data-animation-duration="1200" data-animation-name="blurIn">big sale up to</h3>
                            <h3 class="text-center m-b-4 text-sale appear-animate" data-animation-delay="1600" data-animation-duration="1200" data-animation-name="fadeIn">80%<small>OFF</small></h3>
                            <h5 class="d-inline-block m-r-3 text-left text-uppercase appear-animate" data-animation-delay="2200" data-animation-duration="1200" data-animation-name="fadeIn">
                                Starting At</h5>
                            <h5 class="coupon-sale-text text-left text-light appear-animate" data-animation-delay="2200" data-animation-duration="1200" data-animation-name="fadeIn">
                                $<b>199</b>99</h5>
                            <div class="mb-0 p-t-2 appear-animate" data-animation-delay="2500" data-animation-name="fadeInUpShorter">
                                <a href="/porto/demo6-shop.html" class="btn btn-borders btn-xl btn-outline-dark ls-10">
                                    SHOP NOW
                                </a>
                            </div>
                        </div>
                        <!-- End .home-slide-content -->
                    </div>
                    <!-- End .home-slide -->
                    <div class="home-slide home-slide-2 banner banner-h-100 loaded banner-lg-vw">
                        <video class="w-100" autoplay="" loop muted>
                            <source src="/porto/assets/images/demoes/demo6/slider/slide-2.mp4" type="video/mp4" />
                            <source src="/porto/assets/images/demoes/demo6/slider/slide-2.webm" type="video/webm" />
                            <source src="/porto/assets/images/demoes/demo6/slider/slide-2.ogv" type="video/ogg" />
                            Your browser does not support HTML5 video.
                        </video>
                        <div class="banner-layer banner-layer-middle banner-layer-left appear-animate" data-animation-name="fadeIn" data-animation-duration="1200" data-animation-delay="200">
                            <h2 class="font3 font-weight-normal p-l-1 mb-0 ml-0">Summer Trends</h2>
                            <h3 class="mb-0 text-left text-uppercase">sale</h3>
                        </div>
                        <div class="banner-layer banner-layer-middle banner-layer-right appear-animate" data-animation-name="fadeIn" data-animation-duration="1200" data-animation-delay="400">
                            <h4 class="pl-2 font-weight-light mb-0 text-left text-uppercase">prices up to</h4>
                            <h3 class="mb-0 text-sale m-l-n-xs text-left text-uppercase">80%<small>OFF</small></h3>
                            <div class="mb-0 pl-2">
                                <a href="/porto/demo6-shop.html" class="btn btn-modern btn-xl btn-primary">
                                    SHOP NOW
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End .home-slider -->
            </div>
            <!-- End .home-slider-container -->

            <div class="banners-group">
                <div class="row m-0">
                    <div class="col-sm-6 col-xl-3 p-0 appear-animate" data-animation-delay="100" data-animation-duration="1200">
                        <div class="banner banner-1 banner-md-vw-small">
                            <a href="#">
                                <img src="/porto/assets/images/demoes/demo6/banners/banner-1.jpg" style="background-color: #add;" alt="banner" width="480" height="200" />
                            </a>
                            <div class="banner-layer banner-layer-right banner-layer-middle">
                                <h2 class="mb-0 text-right">TRENDING</h2>
                                <h3 class="m-b-3 text-right">Hat Sales</h3>
                                <h4 class="ls-10 m-b-3 text-right text-primary">STARTING AT $99</h4>
                                <div class="mb-0 text-right">
                                    <a href="/porto/demo6-shop.html" class="btn btn-modern btn-md btn-dark">
                                        Buy NOW!
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- End .banner -->
                    </div>
                    <!-- End .col-lg-3 -->

                    <div class="col-sm-6 col-xl-3 p-0 appear-animate" data-animation-delay="500" data-animation-duration="1200">
                        <div class="banner banner-2 banner-md-vw-small">
                            <a href="#">
                                <img src="/porto/assets/images/demoes/demo6/banners/banner-2.jpg" style="background-color: #444;" alt="banner" width="480" height="200" />
                            </a>
                            <div class="banner-layer banner-layer-right banner-layer-middle">
                                <h2 class="ls-n-20 m-b-2 text-right text-primary">FLASH SALE</h2>
                                <h3 class="ls-n-20 m-b-2 text-right">TOP BRANDS<br />SUMMER SUNGLASSES</h3>
                                <h4 class="font-weight-bold ls-n-20 m-b-3 text-right text-light">STARTING AT
                                    <sup>$</sup>199<sup>99</sup></h4>
                                <div class="mb-0 text-right">
                                    <a href="/porto/demo6-shop.html" class="btn btn-modern btn-md btn-light">
                                        View Sale
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- End .banner -->
                    </div>
                    <!-- End .col-lg-3 -->

                    <div class="col-sm-6 col-xl-3 p-0 appear-animate" data-animation-delay="900" data-animation-duration="1200">
                        <div class="banner banner-3 banner-md-vw-small">
                            <a href="#">
                                <img src="/porto/assets/images/demoes/demo6/banners/banner-3.jpg" style="background-color: #aaa;" alt="banner" width="480" height="200" />
                            </a>
                            <div class="banner-layer banner-layer-left banner-layer-middle">
                                <h2 class="m-b-1 font3 text-left">Exclusive Shoes</h2>
                                <h3 class="m-b-3 text-left">50% OFF</h3>
                                <div class="vc_btn3-container mb-0 vc_btn3-inline">
                                    <a href="/porto/demo6-shop.html" class="btn btn-modern btn-md btn-dark ls-10">
                                        Get Yours!
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- End .banner -->
                    </div>
                    <!-- End .col-lg-3 -->

                    <div class="col-sm-6 col-xl-3 p-0 appear-animate" data-animation-delay="1200" data-animation-duration="1200">
                        <div class="banner banner-4 banner-md-vw-small">
                            <a href="#">
                                <img src="/porto/assets/images/demoes/demo6/banners/banner-4.jpg" style="background-color: #eee;" alt="banner" width="480" height="200" />
                            </a>
                            <div class="row banner-layer banner-layer-middle align-items-center">
                                <div class="col-7">
                                    <h3 class="m-b-1 text-right">DEAL PROMOS</h3>
                                    <h4 class="mb-0 text-right ls-10">STARTING AT $99</h4>
                                </div>
                                <div class="col-5">
                                    <div class="mb-0">
                                        <a href="/porto/demo6-shop.html" class="btn btn-modern btn-md btn-dark">
                                            Shop Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End .banner -->
                    </div>
                    <!-- End .col-lg-3 -->
                </div>
                <!-- End .row -->
            </div>
            <!-- End .banners-group -->

            <div class="half-section">
                <div class="d-flex flex-wrap">
                    <div class="col-md-6 col-12 order-md-last half-img banner banner-md-vw-small banner-5 bg-img d-flex align-items-center appear-animate" data-animation-duration="1200" style="background-image: url('/porto/assets/images/demoes/demo6/bg-1.jpg');">
                        <div class="banner-content">
                            <h3 class="ls-n-10 m-b-3 text-left">WOMEN'S<br />COLLECTION</h3>
                            <p class="line-height-1 m-b-4 text-left">Check out this week's hottest styles.</p>
                            <div class="mb-0">
                                <a href="/porto/demo6-shop.html" class="btn btn-borders btn-lg btn-outline-dark ls-10">
                                    SHOP NOW
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End .col-md-6 -->
                    <div class="col-md-6 col-12 half-content d-flex align-items-center justify-content-center">
                        <div class="products-slider owl-carousel owl-theme" data-owl-options="{
                                'items': 2,
                                'nav': true,
                                'responsive' : {
                                    '576' : {
                                        'items' : 2
                                    },
                                    '992' : {
                                        'items' : 2
                                    }
                                }
                            }">
                            <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeInRightShorter">
                                <figure>
                                    <a href="/porto/demo6-product.html">
                                        <img src="/porto/assets/images/demoes/demo6/products/product-1.jpg" alt="product" width="400" height="400" />
                                    </a>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo6-shop.html" class="product-category">Albums</a>,
                                            <a href="/porto/demo6-shop.html" class="product-category">shoes</a>,
                                            <a href="/porto/demo6-shop.html" class="product-category">watches</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title"> <a href="/porto/demo6-product.html">Girl Black Blouse</a> </h3>
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
                                        <span class="product-price">$49.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                            <div class="product-default inner-quickview inner-icon appear-animate" data-animation-delay="500" data-animation-name="fadeInRightShorter">
                                <figure>
                                    <a href="/porto/demo6-product.html">
                                        <img src="/porto/assets/images/demoes/demo6/products/product-2.jpg" width="400" height="400" alt="product" />
                                    </a>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo6-shop.html" class="product-category">Albums</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title"> <a href="/porto/demo6-product.html">Porto White Girl Shirt</a>
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
                                        <span class="product-price">$101.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                        </div>
                        <!-- End .products-slider -->
                    </div>
                    <!-- End .col-md-6 -->
                </div>
                <!-- End .no-gutters -->
            </div>
            <!-- End .half-section -->
            <div class="half-section">
                <div class="d-flex flex-wrap">
                    <div class="col-md-6 col-12 half-img banner banner-md-vw-small xbanner banner-5 bg-img d-flex align-items-center justify-content-end" style="background-image: url('/porto/assets/images/demoes/demo6/bg-2.jpg');">
                        <div class="banner-content">
                            <h3 class="ls-n-10 m-b-3 text-right">MEN'S<br />COLLECTION</h3>
                            <p class="line-height-1 m-b-4 text-right">Check out this week's hottest styles.</p>
                            <div class="mb-0 text-right">
                                <a href="/porto/demo6-shop.html" class="btn btn-borders btn-lg btn-outline-dark">
                                    SHOP NOW
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End .col-md-6 -->
                    <div class="col-md-6 col-12 half-content d-flex align-items-center justify-content-center">
                        <div class="products-slider owl-carousel owl-theme" data-owl-options="{
                                'items': 2,
                                'nav': true,
                                'responsive' : {
                                    '576' : {
                                        'items' : 2
                                    },
                                    '992' : {
                                        'items' : 2
                                    }
                                }
                            }">
                            <div class="product-default inner-quickview inner-icon appear-animate">
                                <figure>
                                    <a href="/porto/demo6-product.html">
                                        <img src="/porto/assets/images/demoes/demo6/products/product-4.jpg" alt="product" width="400" height="400" />
                                        <img src="/porto/assets/images/demoes/demo6/products/product-3.jpg" alt="product" width="400" height="400" />
                                    </a>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo6-shop.html" class="product-category">Caps</a>,
                                            <a href="/porto/demo6-shop.html" class="product-category">shoes</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title"> <a href="/porto/demo6-product.html">Men White Shirt</a> </h3>
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
                                        <span class="product-price">$39.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                            <div class="product-default inner-quickview inner-icon appear-animate" data-animation-delay="500">
                                <figure>
                                    <a href="/porto/demo6-product.html">
                                        <img src="/porto/assets/images/demoes/demo6/products/product-3.jpg" width="400" height="400" alt="product" />
                                        <img src="/porto/assets/images/demoes/demo6/products/product-4.jpg" width="400" height="400" alt="product" />
                                    </a>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo6-shop.html" class="product-category">caps</a>,
                                            <a href="/porto/demo6-shop.html" class="product-category">shoes</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title"> <a href="/porto/demo6-product.html">Porto Sports Shirts</a>
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
                                        <span class="product-price">$101.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                        </div>
                        <!-- End .products-slider -->
                    </div>
                    <!-- End .col-md-6 -->
                </div>
                <!-- End .no-gutters -->
            </div>
            <!-- End .half-section -->

            <div class="container-fluid m-b-5 p-b-3">
                <div class="feature-boxes-container pb-3">
                    <div class="row mt-7 mb-1">
                        <div class="col-xl-3 col-sm-6 appear-animate" data-animation-delay="500" data-animation-name="fadeInRightShorter">
                            <div class="feature-box px-sm-5 px-md-5 mx-sm-5 mx-md-3 feature-box-simple feature-rounded text-center">
                                <i class="icon-earphones-alt bg-secondary text-white m-b-3"></i>

                                <div class="feature-box-content p-0">
                                    <h3 class="m-b-1">Customer Support</h3>
                                    <h5 class="font-weight-normal line-height-1 m-b-3">Need Assistance?</h5>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                                </div>
                                <!-- End .feature-box-content -->
                            </div>
                            <!-- End .feature-box -->
                        </div>
                        <!-- End .col-md-4 -->
                        <div class="col-xl-3 col-sm-6 appear-animate" data-animation-name="fadeInRightShorter">
                            <div class="feature-box px-sm-5 px-md-5 mx-sm-5 mx-md-3 feature-box-simple feature-rounded text-center">
                                <i class="icon-credit-card  bg-secondary text-white m-b-3"></i>

                                <div class="feature-box-content p-0">
                                    <h3 class="m-b-1">Secured Payment</h3>
                                    <h5 class="font-weight-normal line-height-1 m-b-3">Safe &amp; Fast</h5>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapibus lacus. Lorem ipsum dolor sit amet.</p>
                                </div>
                                <!-- End .feature-box-content -->
                            </div>
                            <!-- End .feature-box -->
                        </div>
                        <!-- End .col-md-4 -->
                        <div class="col-xl-3 col-sm-6 appear-animate" data-animation-name="fadeInLeftShorter">
                            <div class="feature-box px-sm-5 px-md-5 mx-sm-5 mx-md-3 feature-box-simple feature-rounded text-center">
                                <i class="icon-action-undo  bg-secondary text-white m-b-3"></i>

                                <div class="feature-box-content p-0">
                                    <h3 class="m-b-1">FREE RETURNS</h3>
                                    <h5 class="font-weight-normal line-height-1 m-b-3">Easy &amp; Free</h5>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                                </div>
                                <!-- End .feature-box-content -->
                            </div>
                            <!-- End .feature-box -->
                        </div>
                        <!-- End .col-md-4 -->
                        <div class="col-xl-3 col-sm-6 appear-animate" data-animation-delay="500" data-animation-name="fadeInLeftShorter">
                            <div class="feature-box px-sm-5 px-md-5 mx-sm-5 mx-md-3 feature-box-simple feature-rounded text-center">
                                <i class="icon-shipping bg-secondary text-white m-b-3"></i>

                                <div class="feature-box-content p-0">
                                    <h3 class="m-b-1">FREE SHIPPING</h3>
                                    <h5 class="font-weight-normal line-height-1 m-b-3">Orders Over $99</h5>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                                </div>
                                <!-- End .feature-box-content -->
                            </div>
                            <!-- End .feature-box -->
                        </div>
                        <!-- End .col-md-4 -->
                    </div>
                    <!-- End .feature-boxes-container.row -->
                </div>
                <div class="products-bottom appear-animate">
                    <div class="title-group text-center mb-2 mt-4 p-t-3">
                        <h2 class="section-title text-uppercase ls-n-10">Featured Products</h2>
                    </div>
                    <div class="featured-products owl-carousel owl-theme nav-outer show-nav-hover" data-owl-options="{
                        'dots': false,
                        'margin': 20,
                        'nav': true,
                        'navText': [ '<i class=icon-left-open-big>', '<i class=icon-right-open-big>' ],
                        'responsive' : {
                            '992' : {
                                'items' : 4
                            },
                            '1200': {
                                'items':5
                            }
                        }
                    }">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo6-product.html">
                                    <img src="/porto/assets/images/demoes/demo6/products/product-15.jpg" width="400" height="400" alt="product" />
                                    <img src="/porto/assets/images/demoes/demo6/products/product-15-2.jpg" width="400" height="400" alt="product" />
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
                                        <a href="/porto/demo6-shop.html" class="product-category">clothing</a>,
                                        <a href="/porto/demo6-shop.html" class="product-category">trousers</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo6-product.html">Black Gril Blouse</a> </h3>
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
                                    <span class="product-price">$149.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo6-product.html">
                                    <img src="/porto/assets/images/demoes/demo6/products/product-5.jpg" width="400" height="400" alt="product" />
                                    <img src="/porto/assets/images/demoes/demo6/products/product-5-2.jpg" width="400" height="400" alt="product" />
                                </a>
                                <div class="btn-icon-group">
                                    <a href="/porto/demo6-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo6-shop.html" class="product-category">headphone</a>,
                                        <a href="/porto/demo6-shop.html" class="product-category">trousers</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo6-product.html">Blue Jacket</a> </h3>
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
                                    <span class="product-price">$101.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo6-product.html">
                                    <img src="/porto/assets/images/demoes/demo6/products/product-1.jpg" width="400" height="400" alt="product" />
                                    <img src="/porto/assets/images/demoes/demo6/products/product-2.jpg" width="400" height="400" alt="product" />
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
                                        <a href="/porto/demo6-shop.html" class="product-category">headphone</a>,
                                        <a href="/porto/demo6-shop.html" class="product-category">trousers</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo6-product.html">Girl Black Blouse</a> </h3>
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
                                    <span class="product-price">$99.00 – $109.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo6-product.html">
                                    <img src="/porto/assets/images/demoes/demo6/products/product-9.jpg" width="400" height="400" alt="product" />
                                    <img src="/porto/assets/images/demoes/demo6/products/product-13.jpg" width="400" height="400" alt="product" />
                                </a>
                                <div class="btn-icon-group">
                                    <a href="/porto/demo6-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo6-shop.html" class="product-category">clothing</a>,
                                        <a href="/porto/demo6-shop.html" class="product-category">t-shirts</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo6-product.html">Men Black Jacket</a> </h3>
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
                                    <span class="product-price">$209.00 – $259.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo6-product.html">
                                    <img src="/porto/assets/images/demoes/demo6/products/product-16.jpg" width="400" height="400" alt="product" />
                                    <img src="/porto/assets/images/demoes/demo6/products/product-16-2.jpg" width="400" height="400" alt="product" />
                                </a>
                                <div class="btn-icon-group">
                                    <a href="/porto/demo6-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo6-shop.html" class="product-category">caps</a>,
                                        <a href="/porto/demo6-shop.html" class="product-category">shoes</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo6-product.html">Men Jacket</a> </h3>
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
                                    <span class="product-price">$101.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo6-product.html">
                                    <img src="/porto/assets/images/demoes/demo6/products/product-17.jpg" width="400" height="400" alt="product" />
                                    <img src="/porto/assets/images/demoes/demo6/products/product-12.jpg" width="400" height="400" alt="product" />
                                </a>
                                <div class="btn-icon-group">
                                    <a href="/porto/demo6-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo6-shop.html" class="product-category">caps</a>,
                                        <a href="/porto/demo6-shop.html" class="product-category">shoes</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo6-product.html">Men Long T-Shirt</a> </h3>
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
                                    <span class="product-price">$101.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>
                    <!-- End .featured-products -->
                </div>
            </div>
            <!-- End .container-fluid -->
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
