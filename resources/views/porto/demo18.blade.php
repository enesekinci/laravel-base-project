@extends('layouts.porto')

@section('footer')
    @include('components.porto.footer-demo18')
@endsection


@section('header')
    @include('components.porto.header-demo18')
@endsection

@section('content')
<section class="home-slider-container">
                <div class="home-slider owl-carousel with-dots-container" data-owl-options="{'nav': false}">
                    <div class="home-slide home-slide1 banner" style="background-color: #111">
                        <div class="slide-bg" src="/porto/assets/images/demoes/demo18/slider/home-slide-back.jpg"></div>
                        <!-- End .slide-bg !-->
                        <ul class="slide-bg scene" style="width: 100%; height: 100%;">
                            <li class="layer" data-depth="0.05"><img src="/porto/assets/images/demoes/demo18/slider/white-shoes.png" alt="" /></li>
                            <li class="layer" data-depth="0.06"><img style="position: absolute; top: 31%; left: 46.5%;" src="/porto/assets/images/demoes/demo18/slider/blurflake1.png" alt="" /></li>
                            <li class="layer" data-depth="0.07"><img class="animation-spin" style="position: absolute; top: 25%; left: 66%;" src="/porto/assets/images/demoes/demo18/slider/blurflake2.png" alt="" /></li>
                            <li class="layer" data-depth="0.10"><img class="animation-wave" style="position: absolute; top: 50%; left: 80%;" src="/porto/assets/images/demoes/demo18/slider/blurflake3.png" alt="" /></li>
                            <li class="layer" data-depth="0.15"><img style="position: absolute; top: 70%; left: 55%;" src="/porto/assets/images/demoes/demo18/slider/blurflake4.png" alt="" /></li>
                        </ul>
                        <div class="home-slide-content">
                            <h2 class="text-white text-transform-uppercase line-height-1">Spring / Summer Season</h2>
                            <h3 class="text-white d-inline-block line-height-1 ls-0 text-center">up<br /> to
                            </h3>
                            <h4 class="text-white text-uppercase line-height-1 d-inline-block">50% off</h4>
                            <div></div>
                            <h5 class="float-left text-white text-uppercase line-height-1 ls-n-20">Starting At</h5>
                            <h6 class="float-left coupon-sale-text line-height-1 ls-n-20 font-weight-bold text-secondary">
                                <sup>$</sup>19<sup>99</sup></h6>
                            <a href="/porto/demo18-shop.html" class="btn btn-light d-inline-block">Shop Now</a>
                        </div>
                        <!-- End .home-slide-content -->
                    </div>
                    <!-- End .home-slide -->

                    <div class="home-slide home-slide2 banner" style="background-color: #111;">
                        <div class="slide-bg" src="/porto/assets/images/demoes/demo18/slider/home-slide-back.jpg" style="transform: scaleX(-1);"></div>
                        <!-- End .slide-bg !-->
                        <ul class="slide-bg scene" style="width: 100%; height: 100%;">
                            <li class="layer" data-depth="0.05"><img src="/porto/assets/images/demoes/demo18/slider/ball2.png" alt="" /></li>
                            <li class="layer" data-depth="0.06"><img style="position: absolute; top: 70%; left: 42%;" src="/porto/assets/images/demoes/demo18/slider/blurflake1.png" alt="" /></li>
                            <li class="layer" data-depth="0.07"><img class="animation-spin" style="position: absolute; top: 25%; left: 45%;" src="/porto/assets/images/demoes/demo18/slider/blurflake2.png" alt="" /></li>
                            <li class="layer" data-depth="0.10"><img class="animation-wave" style="position: absolute; top: 49%; left: 21%;" src="/porto/assets/images/demoes/demo18/slider/blurflake3.png" alt="" /></li>
                            <li class="layer" data-depth="0.15"><img style="position: absolute; top: 25%; left: 23%;" src="/porto/assets/images/demoes/demo18/slider/blurflake4.png" alt="" /></li>
                        </ul>
                        <div class="home-slide-content">
                            <h2 class="text-white text-transform-uppercase line-height-1">Spring / Summer Season</h2>
                            <h3 class="text-white d-inline-block line-height-1 ls-0 text-center">up<br /> to
                            </h3>
                            <h4 class="text-white text-uppercase line-height-1 d-inline-block">50% off</h4>
                            <div></div>
                            <h5 class="float-left text-white text-uppercase line-height-1 ls-n-20">Starting At</h5>
                            <h6 class="float-left coupon-sale-text line-height-1 ls-n-20 font-weight-bold text-secondary">
                                <sup>$</sup>19<sup>99</sup></h6>
                            <a href="/porto/demo18-shop.html" class="btn btn-light d-inline-block">Shop Now</a>
                        </div>
                        <!-- End .home-slide-content -->
                    </div>
                    <!-- End .home-slide -->
                </div>
                <!-- End .home-slider -->

                <div class="home-slider-thumbs owl-dots">
                    <a href="#" class="owl-dot">
                        <img src="/porto/assets/images/demoes/demo18/slider/slide-1-thumb.jpg" alt="Slide Thumb">
                    </a>
                    <a href="#" class="owl-dot">
                        <img src="/porto/assets/images/demoes/demo18/slider/slide-2-thumb.jpg" alt="Slide Thumb">
                    </a>
                </div>
                <!-- End .home-slide-thumbs -->
            </section>
            <!-- End .home-slider-container -->

            <div class="products-filter-container bg-gray">
                <div class="container-fluid">
                    <div class="row align-items-lg-stretch">
                        <aside class="filter-sidebar col-lg-2">
                            <div class="sidebar-wrapper">
                                <h3 class="ls-n-10 text-uppercase text-primary">Sort By</h3>

                                <ul class="check-filter-list">
                                    <li><a href="#" class="active">All</a></li>
                                    <li><a href="#">Accessories</a></li>
                                    <li><a href="#">Electronics</a></li>
                                    <li><a href="#">Men</a></li>
                                    <li><a href="#">Shoes</a></li>
                                    <li><a href="#">Women</a></li>
                                </ul>
                            </div>
                            <!-- End .sidebar-wrapper -->
                        </aside>
                        <!-- End .col-lg-3 -->

                        <div class="col-lg-10">
                            <div class="row product-ajax-grid mb-2">
                                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                    <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeIn">
                                        <figure>
                                            <a href="/porto/demo18-product.html">
                                                <img src="/porto/assets/images/demoes/demo18/products/product-7.jpg" width="205" height="205" alt="product">
                                            </a>
                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo18-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo18-product.html">Backpack Sfs Responder</a>
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
                                                <span class="product-price">$185.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                </div>
                                <!-- End .col-lg-3 -->
                                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                    <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeIn">
                                        <figure>
                                            <a href="/porto/demo18-product.html">
                                                <img src="/porto/assets/images/demoes/demo18/products/product-15.jpg" width="205" height="205" alt="product">
                                            </a>
                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo18-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo18-product.html">Converse Chuck Quarter</a>
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
                                                <span class="product-price">$14.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                </div>
                                <!-- End .col-lg-3 -->
                                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                    <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeIn">
                                        <figure>
                                            <a href="/porto/demo18-product.html">
                                                <img src="/porto/assets/images/demoes/demo18/products/product-13.jpg" width="205" height="205" alt="product">
                                            </a>
                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo18-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo18-product.html">Football Vapor 24/7</a>
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
                                                <span class="product-price">$25.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                </div>
                                <!-- End .col-lg-3 -->
                                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                    <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeIn">
                                        <figure>
                                            <a href="/porto/demo18-product.html">
                                                <img src="/porto/assets/images/demoes/demo18/products/product-8.jpg" width="205" height="205" alt="product">
                                            </a>
                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo18-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo18-product.html">Hot Black Suits</a>
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
                                                <span class="product-price">$30.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                </div>
                                <!-- End .col-lg-3 -->
                                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                    <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeIn">
                                        <figure>
                                            <a href="/porto/demo18-product.html">
                                                <img src="/porto/assets/images/demoes/demo18/products/product-6.jpg" width="205" height="205" alt="product">
                                                <img src="/porto/assets/images/demoes/demo18/products/product-19.jpg" width="205" height="205" alt="product">
                                            </a>
                                            <div class="btn-icon-group">
                                                <a href="/porto/demo18-product.html" class="btn-icon btn-add-cart"><i
                                                        class="fa fa-arrow-right"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo18-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo18-product.html">Hyperadapt Shield Lite</a>
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
                                </div>
                                <!-- End .col-lg-3 -->
                                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                    <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeIn">
                                        <figure>
                                            <a href="/porto/demo18-product.html">
                                                <img src="/porto/assets/images/demoes/demo18/products/product-4.jpg" width="205" height="205" alt="product">
                                            </a>
                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo18-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo18-product.html">Hyperadapt Shield Lite Half-Zip</a>
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
                                                <span class="product-price">$299.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                </div>
                                <!-- End .col-lg-3 -->
                                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                    <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeIn">
                                        <figure>
                                            <a href="/porto/demo18-product.html">
                                                <img src="/porto/assets/images/demoes/demo18/products/product-19.jpg" width="205" height="205" alt="product">
                                                <img src="/porto/assets/images/demoes/demo18/products/product-10.jpg" width="205" height="205" alt="product">
                                            </a>
                                            <div class="btn-icon-group">
                                                <a href="/porto/demo18-product.html" class="btn-icon btn-add-cart"><i
                                                        class="fa fa-arrow-right"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo18-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo18-product.html">Jordan Flight</a>
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
                                                <span class="product-price">$99.00 - $109.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                </div>
                                <!-- End .col-lg-3 -->
                                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                    <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeIn">
                                        <figure>
                                            <a href="/porto/demo18-product.html">
                                                <img src="/porto/assets/images/demoes/demo18/products/product-11.jpg" width="205" height="205" alt="product">
                                            </a>
                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo18-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo18-product.html">Jordan Hyper Grip Ot</a>
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
                                                <span class="product-price">$50.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                </div>
                                <!-- End .col-lg-3 -->
                                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                    <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeIn">
                                        <figure>
                                            <a href="/porto/demo18-product.html">
                                                <img src="/porto/assets/images/demoes/demo18/products/product-9.jpg" width="205" height="205" alt="product">
                                            </a>
                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo18-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo18-product.html">Long-Length 2.0</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:20%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$22.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                </div>
                                <!-- End .col-lg-3 -->
                                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                    <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeIn">
                                        <figure>
                                            <a href="/porto/demo18-product.html">
                                                <img src="/porto/assets/images/demoes/demo18/products/product-16.jpg" width="205" height="205" alt="product">
                                            </a>
                                            <div class="btn-icon-group">
                                                <a href="/porto/demo18-product.html" class="btn-icon btn-add-cart"><i
                                                        class="fa fa-arrow-right"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo18-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo18-product.html">Man Black Pants</a>
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
                                                <span class="product-price">$89.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                </div>
                                <!-- End .col-lg-3 -->
                            </div>
                            <!-- End .row -->

                            <div class="product-more-container d-flex justify-content-center">
                                <a href="/porto/ajax/demo18-ajax-products.html" class="btn btn-outline-dark loadmore">Load
                                    More...</a>
                            </div>
                            <!-- End .product-more-container -->
                        </div>
                        <!-- End .col-lg-9 -->
                    </div>
                    <!-- End .row -->
                </div>
                <!-- End .container-fluid -->
            </div>
            <!-- End .produts-filter-container-->

            <section class="product-banner-section">
                <div class="banner" style="background-color: #111;">
                    <figure class="w-100 appear-animate" data-animation-name="fadeIn">
                        <img src="/porto/assets/images/demoes/demo18/product-section-slider/slide-1.jpg" alt="product banner">
                    </figure>
                    <div class="container-fluid">
                        <div class="position-relative h-100">
                            <div class="banner-layer banner-layer-middle">
                                <h3 class="text-white text-uppercase ls-n-25 m-b-4 appear-animate" data-animation-name="fadeInUpShorter" data-animation-duration="1000" data-animation-delay="200">Ultra Boost</h3>
                                <img class="m-b-4 appear-animate" data-animation-name="fadeInUpShorter" data-animation-duration="1000" data-animation-delay="400" src="/porto/assets/images/demoes/demo18/product-section-slider/img-1.png" alt="img" width="540" height="100">
                                <a href="/porto/demo18-shop.html" class="btn btn-light appear-animate" data-animation-name="fadeInUpShorter" data-animation-duration="1000" data-animation-delay="600">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End .product-banner-section -->

            <section class="product-slider-section bg-gray">
                <div class="container-fluid">
                    <h2 class="subtitle text-center text-uppercase mb-2 appear-animate" data-animation-name="fadeIn">
                        Featured products</h2>

                    <div class="featured-products owl-carousel owl-theme show-nav-hover nav-outer nav-image-center mb-3 appear-animate" data-owl-options="{ 
                        'dots': false, 
                        'nav': true, 
                        'margin': 20, 
                        'responsive': {
                            '992': {
                                'items': 4
                            },
                            '1200': {
                                'items': 6
                            }
                        } 
                    }" data-animation-name="fadeIn">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo18-product.html">
                                    <img src="/porto/assets/images/demoes/demo18/products/product-7.jpg" width="205" height="205" alt="product">
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
                                        <a href="/porto/demo18-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo18-product.html">Backpack Sfs Responder</a>
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
                                    <span class="product-price">$185.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo18-product.html">
                                    <img src="/porto/assets/images/demoes/demo18/products/product-15.jpg" width="205" height="205" alt="product">
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
                                        <a href="/porto/demo18-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo18-product.html">Converse Chuck Quarter</a>
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
                                    <span class="product-price">$14.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo18-product.html">
                                    <img src="/porto/assets/images/demoes/demo18/products/product-13.jpg" width="205" height="205" alt="product">
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
                                        <a href="/porto/demo18-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo18-product.html">Football Vapor 24/7</a>
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
                                    <span class="product-price">$25.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo18-product.html">
                                    <img src="/porto/assets/images/demoes/demo18/products/product-8.jpg" width="205" height="205" alt="product">
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
                                        <a href="/porto/demo18-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo18-product.html">Hot Black Suits</a>
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
                                    <span class="product-price">$30.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo18-product.html">
                                    <img src="/porto/assets/images/demoes/demo18/products/product-4.jpg" width="205" height="205" alt="product">
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
                                        <a href="/porto/demo18-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo18-product.html">Hyperadapt Shield Lite Half-Zip</a>
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
                                    <span class="product-price">$299.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo18-product.html">
                                    <img src="/porto/assets/images/demoes/demo18/products/product-19.jpg" width="205" height="205" alt="product">
                                    <img src="/porto/assets/images/demoes/demo18/products/product-10.jpg" width="205" height="205" alt="product">
                                </a>
                                <div class="btn-icon-group">
                                    <a href="/porto/demo18-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo18-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo18-product.html">Jordan Flight</a>
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
                                    <span class="product-price">$99.00 - $109.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo18-product.html">
                                    <img src="/porto/assets/images/demoes/demo18/products/product-11.jpg" width="205" height="205" alt="product">
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
                                        <a href="/porto/demo18-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo18-product.html">Jordan Hyper Grip Ot</a>
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
                                    <span class="product-price">$50.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo18-product.html">
                                    <img src="/porto/assets/images/demoes/demo18/products/product-9.jpg" width="205" height="205" alt="product">
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
                                        <a href="/porto/demo18-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo18-product.html">Long-Length 2.0</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:20%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$22.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo18-product.html">
                                    <img src="/porto/assets/images/demoes/demo18/products/product-16.jpg" width="205" height="205" alt="product">
                                </a>
                                <div class="btn-icon-group">
                                    <a href="/porto/demo18-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo18-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo18-product.html">Man Black Pants</a>
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
                                    <span class="product-price">$89.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>
                    <!-- End .featured-produts -->

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="banner appear-animate" data-animation-name="fadeInLeftShorter" style="background-color: #fff;">
                                <figure>
                                    <img src="/porto/assets/images/demoes/demo18/banners/banner1.jpg" alt="banner" width="873" height="151">
                                </figure>
                                <div class="banner-layer banner-layer-middle d-flex align-items-center justify-content-between">
                                    <div class="">
                                        <h4 class="mb-0">Summer Sale</h4>
                                        <h5 class="text-uppercase mb-0">20% off</h5>
                                    </div>
                                    <a href="/porto/demo18-shop.html" class="btn btn-dark">Shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="banner appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="400" style="background-color: #111;">
                                <figure>
                                    <img src="/porto/assets/images/demoes/demo18/banners/banner2.jpg" alt="banner" width="873" height="151">
                                </figure>
                                <div class="banner-layer banner-layer-middle d-flex align-items-center justify-content-between">
                                    <div class="">
                                        <h4 class="text-white mb-0">Flash Sale</h4>
                                        <h5 class="text-uppercase text-white mb-0">30% off</h5>
                                    </div>
                                    <a href="/porto/demo18-shop.html" class="btn btn-light">Shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End .container-fluid -->
            </section>

            <section class="explore-section d-flex align-items-center" data-parallax="{'speed': 1.8,  'enableOnMobile': true}" data-image-src="/porto/assets/images/demoes/demo18/bg-2.jpg" style="background-color: #111;">
                <div class="container-fluid text-center position-relative appear-animate" data-animation-name="fadeInUpShorter">
                    <h3 class="line-height-1 ls-n-25 text-white text-uppercase m-b-4">Explore the best of you</h3>
                    <a href="/porto/demo18-shop.html" class="btn btn-light">Shop Now</a>
                </div>
                <!-- End .container -->
            </section>
            <!-- End .explore-section -->

            <section class="feature-boxes-container">
                <div class="container-fluid appear-animate" data-animation-name="fadeInUpShorter">
                    <div class="row no-gaps m-0 ">
                        <div class="col-sm-6 col-lg-3">
                            <div class="feature-box feature-box-simple text-center mb-2">
                                <div class="feature-box-icon">
                                    <i class="icon-earphones-alt text-white"></i>
                                </div>

                                <div class="feature-box-content p-0">
                                    <h3 class="text-white">Customer Support</h3>
                                    <h5 class="line-height-1">Need Assistance?</h5>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                                </div>
                                <!-- End .feature-box-content -->
                            </div>
                            <!-- End .feature-box -->
                        </div>
                        <!-- End .col-sm-6.col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="feature-box feature-box-simple text-center mb-2">
                                <div class="feature-box-icon">
                                    <i class="icon-credit-card text-white"></i>
                                </div>

                                <div class="feature-box-content p-0">
                                    <h3 class="text-white">Secured Payment</h3>
                                    <h5 class="line-height-1">Safe &amp; Fast</h5>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapibus lacus. Lorem ipsum dolor sit amet.</p>
                                </div>
                                <!-- End .feature-box-content -->
                            </div>
                            <!-- End .feature-box -->
                        </div>
                        <!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="feature-box feature-box-simple text-center mb-2">
                                <div class="feature-box-icon">
                                    <i class="icon-action-undo text-white"></i>
                                </div>
                                <div class="feature-box-content p-0">
                                    <h3 class="text-capitalize text-white">Free Returns</h3>
                                    <h5 class="line-height-1">Easy &amp; Free</h5>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                                </div>
                                <!-- End .feature-box-content -->
                            </div>
                            <!-- End .feature-box -->
                        </div>
                        <!-- col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="feature-box feature-box-simple text-center mb-2">
                                <div class="feature-box-icon">
                                    <i class="icon-shipping text-white"></i>
                                </div>
                                <div class="feature-box-content p-0">
                                    <h3 class="text-white">Free Shipping</h3>
                                    <h5 class="line-height-1">Made To Help You</h5>

                                    <p>Porto has very powerful admin features to help customer to build their own shop in minutes without any special skills in web development.</p>
                                </div>
                                <!-- End .feature-box-content -->
                            </div>
                            <!-- End .feature-box -->
                        </div>
                        <!-- End .col-sm-6 col-lg-3 -->
                    </div>
                    <!-- End .row -->
                </div>
                <!-- End .container-->
            </section>
            <!-- End .feature-boxes-container -->
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
