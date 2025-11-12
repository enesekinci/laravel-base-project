@extends('layouts.porto')


@section('header')
    @include('porto.demo2.header')
@endsection

@section('footer')
    @include('porto.demo2.footer')
@endsection

@section('content')
<div class="container mt-2">
                <div class="row">
                    <div class="col-lg-3 mb-2 appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="200" data-animation-duration="1000">
                        <div class="side-menu-wrapper">
                            <h2 class="side-menu-title ls-10">Top Categories</h2>

                            <div class="side-menu-body mb-2 px-3 mx-3">
                                <ul class="side-menu pb-1">
                                    <li><a href="/porto/demo2-shop.html"><i class="icon-category-fashion"></i>Fashion</a></li>
                                    <li><a href="/porto/demo2-shop.html"><i
                                                class="icon-category-electronics"></i>Electronics</a></li>
                                    <li><a href="/porto/demo2-shop.html"><i class="icon-category-gifts"></i>Gifts</a></li>
                                    <li><a href="/porto/demo2-shop.html"><i class="icon-category-garden"></i>Home &amp;
                                            Garden</a></li>
                                    <li><a href="/porto/demo2-shop.html"><i class="icon-category-music"></i>Music</a></li>
                                    <li><a href="/porto/demo2-shop.html"><i class="icon-cat-sport"></i>Sports</a></li>
                                </ul>

                                <a href="#" class="btn btn-block btn-dark btn-lg px-0 ls-10">Huge Sale -
                                    <strong>70%</strong>
                                    Off</a>
                            </div>
                            <!-- End .side-menu-body -->
                        </div>
                        <!-- End .side-custom-menu -->
                    </div>
                    <!-- End .col-lg-3 -->

                    <div class="col-lg-9 mb-2 appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="400" data-animation-duration="1000">
                        <div class="home-slider owl-carousel owl-theme" data-owl-options="{
							'dots': true,
							'nav': false
						}">
                            <div class="home-slide home-slide1 banner banner-md-vw banner-sm-vw d-flex align-items-center">
                                <img class="slide-bg" style="background-color: #71b5da;" src="/porto/assets/images/demoes/demo2/slider/slide-1.jpg" width="835" height="415" alt="slider image">
                                <div class="banner-layer">
                                    <h4 class="text-white">Find the Boundaries. Push Through!</h4>
                                    <h2 class="text-white mb-0">Summer Sale</h2>
                                    <h3 class="text-white text-uppercase">30% Off</h3>
                                    <h5 class="text-white text-uppercase d-inline-flex ls-n-20 mb-0">Starting At <b class="coupon-sale-text text-secondary bg-white">$<em
                                                class="align-text-top">199</em>99</b></h5>
                                    <a href="/porto/demo2-shop.html" class="btn btn-dark">Get Yours!</a>
                                </div>
                                <!-- End .banner-layer -->
                            </div>
                            <!-- End .home-slide -->

                            <div class="home-slide home-slide2 banner banner-md-vw banner-sm-vw d-flex align-items-center">
                                <img class="slide-bg" style="background-color: #dadada;" src="/porto/assets/images/demoes/demo2/slider/slide-2.jpg" width="835" height="415" alt="slider image">
                                <div class="banner-layer text-uppercase">
                                    <h4>Over 200 products with discounts</h4>
                                    <h2>Great Deals</h2>
                                    <h5 class="d-inline-block mb-0 align-top mr-4 pr-3">Starting At
                                        <b>$<em>299</em>99</b>
                                    </h5>

                                    <a href="/porto/demo2-shop.html" class="btn btn-dark ls-10">Get Yours!</a>
                                </div>
                                <!-- End .banner-layer -->
                            </div>
                            <!-- End .home-slide -->

                            <div class=" home-slide home-slide3 banner banner-md-vw banner-sm-vw d-flex
                                        align-items-center">
                                <img class="slide-bg" src="/porto/assets/images/demoes/demo2/slider/slide-3.jpg" style="background-color: #ccc;" width="835" height="415" alt="home slider" />
                                <div class="banner-layer text-uppercase">
                                    <h4>Up to 70% off</h4>
                                    <h2>New Arrivals</h2>
                                    <h5 class="d-inline-block mb-0 align-top mr-4 pr-3">Starting At
                                        <b>$<em>299</em>99</b>
                                    </h5>
                                    <a href="/porto/demo2-shop.html" class="btn btn-dark">Get Yours!</a>
                                </div>
                                <!-- End .banner-layer -->
                            </div>
                            <!-- End .home-slide -->
                        </div>
                        <!-- End .home-slider -->
                    </div>
                    <!-- End .col-lg-9 -->
                </div>
                <!-- End .row -->

                <div class="info-boxes-container row row-joined mb-1 appear-animate" data-animation-name="fadeInUpShorter" data-animation-duration="1000">
                    <div class="info-box info-box-icon-left col-lg-4">
                        <i class="icon-shipping"></i>

                        <div class="info-box-content">
                            <h4>FREE SHIPPING &amp; RETURN</h4>
                            <p class="text-body">Free shipping on all orders over $99.</p>
                        </div>
                        <!-- End .info-box-content -->
                    </div>
                    <!-- End .info-box -->

                    <div class="info-box info-box-icon-left col-lg-4">
                        <i class="icon-money"></i>

                        <div class="info-box-content">
                            <h4>MONEY BACK GUARANTEE</h4>
                            <p class="text-body">100% money back guarantee</p>
                        </div>
                        <!-- End .info-box-content -->
                    </div>
                    <!-- End .info-box -->

                    <div class="info-box info-box-icon-left col-lg-4">
                        <i class="icon-support"></i>

                        <div class="info-box-content">
                            <h4>ONLINE SUPPORT 24/7</h4>
                            <p class="text-body">Lorem ipsum dolor sit amet.</p>
                        </div>
                        <!-- End .info-box-content -->
                    </div>
                    <!-- End .info-box -->
                </div>
                <!-- End .info-boxes-container -->

                <div class="banners-grid text-uppercase grid" data-grid-options="{
					'sortReorder': true
				}">
                    <div class="banner banner1 grid-item banner-md-vw w-25 w-md-100 text-transform-none w-xxs-100 appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="100" data-animation-duration="1000" data-md-order="1">
                        <figure>
                            <img src="/porto/assets/images/demoes/demo2/banners/banner-1.jpg" style="background-color: #ccc;" alt="banner">
                        </figure>

                        <div class="banner-layer banner-layer-middle text-right">
                            <h4 class="banner-layer-circle-item ml-auto mb-2 ls-0">40<sup>%<small
                                        class="ls-0">OFF</small></sup></h4>
                            <h5 class="m-b-3 ls-0"><del class="d-block m-b-2">$450</del>$270</h5>
                            <h4 class="m-b-1 ls-n-0">Watches</h4>
                            <h3 class="mb-0 ls-0">Mega Sale</h3>
                        </div>
                    </div>
                    <!-- End .banner -->

                    <div class="banner banner7 grid-item banner-md-vw w-50 w-md-100 order-lg-0 w-xxs-100 appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200" data-animation-duration="1000" data-md-order="3">
                        <figure>
                            <img src="/porto/assets/images/demoes/demo2/banners/banner-7.jpg" style="background-color: #444;" alt="banner">
                        </figure>

                        <div class="banner-layer banner-layer-middle d-flex align-items-end flex-column">
                            <h3 class="m-b-3 text-white text-right ls-0">Electronic<br>Deals</h3>

                            <div class="coupon-sale-content">
                                <h4 class="mb-1 coupon-sale-text bg-white d-block ls-n-10 text-transform-none">
                                    Exclusive COUPON
                                </h4>
                                <h5 class="coupon-sale-text text-white ls-n-10 p-0"><i class="ls-0">UP TO</i><b class="text-dark">$100</b> OFF</h5>
                                <a href="/porto/demo2-shop.html" class="btn btn-block btn-dark btn-black">Get Yours!</a>
                            </div>
                        </div>
                    </div>
                    <!-- End .banner -->

                    <div class="banner banner4 grid-item banner-md-vw w-25 w-md-100 w-xxs-100 appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="300" data-animation-duration="1000" data-md-order="7">
                        <figure>
                            <img src="/porto/assets/images/demoes/demo2/banners/banner-4.jpg" style="background-color: #444;" alt="banner">
                        </figure>
                        <div class="banner-layer banner-layer-middle text-right">
                            <h2 class="m-b-2 text-secondary ls-n-20">Flash Sale</h2>
                            <h3 class="m-b-1 ls-n-20">Top Brands<br>Summer Sunglasses</h3>
                            <h4 class="text-white ls-n-20">Starting<br>AT <sup>$</sup>199<sup>99</sup></h4>
                            <a href="/porto/demo2-shop.html" class="btn btn-light ls-10">View Sale</a>
                        </div>
                    </div>
                    <!-- End .banner -->

                    <div class="banner banner5 grid-item banner-md-vw text-center w-25 w-md-100 w-xxs-100 appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="400" data-animation-duration="1000" data-md-order="8">
                        <figure>
                            <img src="/porto/assets/images/demoes/demo2/banners/banner-5.jpg" style="background-color: #ccc;" alt="banner">
                        </figure>
                        <div class="banner-layer banner-layer-top">
                            <h4 class="heading-border">Amazing</h4>
                            <h3 class="ls-0 mb-1">Collection</h3>
                            <hr class="mb-1 mt-1">
                            <h5 class="pt-1">Check our discounts</h5>
                        </div>
                        <div class="banner-layer banner-layer-bottom">
                            <a href="/porto/demo2-shop.html" class="btn btn-dark">Shop Now!</a>
                        </div>
                    </div>
                    <!-- End .banner -->

                    <div class="banner banner2 grid-item banner-md-vw w-25 w-md-100 w-xxs-100 appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="500" data-animation-duration="1000" data-md-order="2">
                        <figure>
                            <img src="/porto/assets/images/demoes/demo2/banners/banner-2.jpg" style="background-color: #dce1e7;" alt="banner">
                        </figure>
                        <div class="banner-layer banner-layer-top text-right">
                            <h3 class="ls-0">Trending</h3>
                            <h2 class="m-b-3 ls-10 text-transform-none">Hot Sales</h2>
                            <h4 class="m-b-3 text-secondary ls-0">Starting at $99</h4>
                            <a href="/porto/demo2-shop.html" class="btn btn-dark ls-10">Buy Now!</a>
                        </div>
                    </div>
                    <!-- End .banner -->

                    <div class="banner banner8 grid-item banner-md-vw w-50 w-md-100 w-xxs-100 appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="600" data-animation-duration="1000" data-md-order="4">
                        <figure>
                            <img src="/porto/assets/images/demoes/demo2/banners/banner-8.jpg" style="background-color: #bd9c88;" alt="banner">
                        </figure>
                        <div class="banner-layer banner-layer-middle">
                            <h3 class="m-b-2 text-transform-none">Exclusive Shoes</h3>
                            <h4 class="m-b-3">50% Off</h4>
                            <a href="/porto/demo2-shop.html" class="btn btn-dark ls-10">Get Yours!</a>
                        </div>
                    </div>
                    <!-- End .banner -->

                    <div class="banner banner9 grid-item banner-md-vw text-center w-50 w-md-100 w-xxs-100 appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="700" data-animation-duration="1000" data-md-order="5">
                        <figure>
                            <img src="/porto/assets/images/demoes/demo2/banners/banner-9.jpg" style="background-color: #fff;" alt="banner">
                        </figure>
                        <div class="banner-layer banner-layer-middle banner-layer-left">
                            <h4 class="m-b-3 text-body">Check our discounts</h4>
                            <h3 class="text-nowrap">More than<span class="d-block mt-1 m-b-3">20 brands</span></h3>
                            <hr class="mt-0 mb-2">
                            <h5 class="coupon-sale-text ls-n-10 p-0 mb-0"><i class="ls-0">UP TO</i><b class="ls-n-0">$100</b> OFF
                            </h5>
                        </div>

                        <div class="banner-layer banner-layer-middle banner-layer-right text-center">
                            <a href="#" class="btn btn-dark">Check this sale!</a>
                        </div>
                    </div>
                    <!-- End .banner -->

                    <div class="banner banner3 grid-item banner-md-vw w-25 w-md-100 w-xxs-100 appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="800" data-animation-duration="1000" data-md-order="9">
                        <figure>
                            <img src="/porto/assets/images/demoes/demo2/banners/banner-3.jpg" style="background-color: #ccc;" alt="banner">
                        </figure>
                        <div class="banner-layer banner-layer-top text-center">
                            <h2 class="m-b-1">Top Brands</h2>
                            <h3 class="mb-1 pb-1">Smartphones</h3>
                            <h4 class="text-body">* limited time only</h4>
                        </div>
                        <div class="banner-layer banner-layer-bottom text-center">
                            <a href="/porto/demo2-shop.html" class="btn btn-secondary">Buy Now!</a>
                        </div>
                    </div>
                    <!-- End .banner -->

                    <div class="banner banner6 grid-item banner-md-vw w-25 w-md-100 w-xxs-100 appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="900" data-animation-duration="1000" data-md-order="6">
                        <figure>
                            <img src="/porto/assets/images/demoes/demo2/banners/banner-6.jpg" style="background-color: #ccc;" alt="banner">
                        </figure>
                        <div class="banner-layer banner-layer-middle text-center">
                            <h3 class="m-b-1 ls-0">Deal Promos</h3>
                            <h4 class="m-b-3 ls-0 text-body">Starting at $99</h4>
                            <a href="/porto/demo2-shop.html" class="btn btn-dark ls-10">Buy Now!</a>
                        </div>
                    </div>
                    <!-- End .banner -->

                    <div class="grid-col-sizer w-25" style="display: none;"></div>
                </div>
                <!-- End .banners-grid -->
            </div>
            <!-- End .container -->

            <div class="mb-1"></div>
            <!-- margin -->

            <div class="products-section section-bg-gray">
                <div class="container">
                    <h2 class="section-title appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200" data-animation-duration="1000">Featured Products</h2>
                    <div class="products-slider owl-carousel owl-theme dots-top dots-small">
                        <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200" data-animation-duration="1000">
                            <figure class="img-effect">
                                <a href="/porto/demo2-product.html">
                                    <img src="/porto/assets/images/demoes/demo2/products/product-1.jpg" width="265" height="265" alt="product" />
                                    <img src="/porto/assets/images/demoes/demo2/products/product-1-2.jpg" width="265" height="265" alt="product" />
                                </a>
                                <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                    <div class="product-label label-sale">27%</div>
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
                                        <a href="/porto/demo2-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo2-product.html">Blue High Hill</a>
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
                                    <span class="old-price">$59.00</span>
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200" data-animation-duration="1000">
                            <figure class="img-effect">
                                <a href=demo2-product.html>
                                    <img src="/porto/assets/images/demoes/demo2/products/product-2.jpg" width="265" height="265" alt="product" />
                                </a>
                                <div class="btn-icon-group">
                                    <a href="/porto/demo2-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo2-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo2-product.html">Brown Backpack</a>
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
                                    <span class="old-price">$59.00</span>
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200" data-animation-duration="1000">
                            <figure class="img-effect">
                                <a href="/porto/demo2-product.html">
                                    <img src="/porto/assets/images/demoes/demo2/products/product-3.jpg" width="265" height="265" alt="product" />
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
                                        <a href="/porto/demo2-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo2-product.html">Black Belt</a>
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
                                    <span class="old-price">$59.00</span>
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200" data-animation-duration="1000">
                            <figure class="img-effect">
                                <a href="/porto/demo2-product.html">
                                    <img src="/porto/assets/images/demoes/demo2/products/product-4.jpg" width="265" height="265" alt="product">
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
                                        <a href="/porto/demo2-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo2-product.html">High Hill Casual</a>
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
                                    <span class="old-price">$59.00</span>
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200" data-animation-duration="1000">
                            <figure class="img-effect">
                                <a href=demo2-product.html>
                                    <img src="/porto/assets/images/demoes/demo2/products/product-5.jpg" width="265" height="265" alt="product" />
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
                                        <a href="/porto/demo2-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo2-product.html">Travel Bag</a>
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

            <div class="brands-section mt-5 mb-5 appear-animate" data-animation-delay="200" data-animation-name="fadeIn" data-animation-duration="1000">
                <div class="container">
                    <div class="brands-slider owl-carousel owl-theme images-center" data-owl-options="{
                        'margin': 0
                    }">
                        <img src="/porto/assets/images/brands/small/brand1.png" width="140" height="60" alt="brand">
                        <img src="/porto/assets/images/brands/small/brand2.png" width="140" height="60" alt="brand">
                        <img src="/porto/assets/images/brands/small/brand3.png" width="140" height="60" alt="brand">
                        <img src="/porto/assets/images/brands/small/brand4.png" width="140" height="60" alt="brand">
                        <img src="/porto/assets/images/brands/small/brand5.png" width="140" height="60" alt="brand">
                        <img src="/porto/assets/images/brands/small/brand6.png" width="140" height="60" alt="brand">
                    </div>
                    <!-- End .brands-slider -->
                </div>
            </div>
@endsection

@push('styles')
    <style>
        .banners-grid .banner figure {
            position: relative;
            width: 100%;
            margin: 0;
            overflow: hidden;
        }
        .banners-grid .banner figure img {
            width: 100%;
            height: auto;
            display: block;
        }
        .banners-grid .banner {
            position: relative;
            overflow: hidden;
        }
    </style>
@endpush

@push('scripts')
    <script src="/porto/assets/js/optional/isotope.pkgd.min.js"></script>
@endpush
