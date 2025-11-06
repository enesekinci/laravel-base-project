@extends('layouts.porto')

@section('footer')
    @include('components.porto.footer-demo15')
@endsection


@section('header')
    @include('components.porto.header-demo15')
@endsection

@section('content')
<div class="container">
                <div class="home-slider owl-carousel owl-carousel-lazy owl-theme nav-pos-outside show-nav-hover slide-animate">
                    <div class="home-slide banner banner-md-vw-small">
                        <img class="slide-bg" src="/porto/assets/images/demoes/demo15/slider/slide-1.jpg" style="background-color: #efefef;" alt="banner" width="1120" height="445" />
                        <div class="banner-layer slide-1 banner-layer-left banner-layer-middle text-right">
                            <h4 class="m-b-3 text-right appear-animate" data-animation-delay="700" data-animation-name="splitRight">Luxury With Brands We Love</h4>
                            <h3 class="m-b-2 font3 text-right text-primary appear-animate" data-animation-name="blurIn" data-animation-duration="1200">Women's Lingerie</h3>
                            <h5 class="d-inline-block ls-n-20 m-r-3 p-t-3 text-left appear-animate" data-animation-delay="1900" data-animation-duration="1200" data-animation-name="fadeInLeft">STARTING AT</h5>
                            <h4 class="text-price ls-n-20 m-b-4 text-left float-right appear-animate" data-animation-delay="1900" data-animation-duration="1200" data-animation-name="fadeInUp">$
                                <b>199</b>99</h4>
                            <div class="clearfix"></div>
                            <div class="mb-0 appear-animate" data-animation-delay="2400" data-animation-name="fadeInUpShorter">
                                <a href="/porto/demo15-shop.html" class="btn btn-modern btn-lg btn-dark">Shop Now!</a>
                            </div>
                        </div>
                    </div>
                    <div class="home-slide banner banner-md-vw-small">
                        <img class="slide-bg" src="/porto/assets/images/demoes/demo15/slider/slide-2.jpg" style="background-color: #efefef;" alt="banner" width="1120" height="445" />
                        <div class="banner-layer slide-2 banner-layer-right banner-layer-middle">
                            <h4 class="m-b-3 appear-animate" data-animation-delay="700" data-animation-name="splitRight">Trending Items We Love</h4>
                            <h3 class="m-b-2 font3 text-primary appear-animate" data-animation-name="blurIn" data-animation-duration="1200">Women's Hats</h3>
                            <h5 class="ls-n-20 float-left m-r-3 p-t-3 appear-animate" data-animation-delay="1900" data-animation-duration="1200" data-animation-name="fadeInLeft">STARTING AT</h5>
                            <h4 class="ls-n-20 text-price m-b-4 appear-animate" data-animation-delay="1900" data-animation-duration="1200" data-animation-name="fadeInUp">$
                                <b>19</b>99</h4>
                            <div class="mb-0 appear-animate" data-animation-delay="2400" data-animation-name="fadeInUpShorter">
                                <a href="/porto/demo15-shop.html" class="btn btn-modern btn-lg btn-dark">Shop Now!</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End .home-slider -->
                <section class="service-box">
                    <div class="container">
                        <div class="info-boxes-container border-bottom mb-3">
                            <div class="row row-joined">
                                <div class="info-box col-sm-6 col-md-6 col-lg-3">
                                    <div class="info-box-icon-left w-100">
                                        <i class="icon-shipping"></i>
                                        <div class="info-box-content">
                                            <h4>FREE SHIPPING &amp; RETURN</h4>
                                        </div>
                                        <!-- End .info-box-content -->
                                    </div>
                                </div>
                                <!-- End .info-box -->
                                <div class="info-box col-sm-6 col-md-6 col-lg-3">
                                    <div class="info-box-icon-left w-100">
                                        <i class="icon-money"></i>
                                        <div class="info-box-content">
                                            <h4>MONEY BACK GUARANTEE</h4>
                                        </div>
                                        <!-- End .info-box-content -->
                                    </div>
                                </div>
                                <!-- End .info-box -->
                                <div class="info-box col-sm-6 col-md-6 col-lg-3">
                                    <div class="info-box-icon-left w-100">
                                        <i class="icon-support"></i>
                                        <div class="info-box-content">
                                            <h4>ONLINE SUPPORT 24/7</h4>
                                        </div>
                                        <!-- End .info-box-content -->
                                    </div>
                                </div>
                                <!-- End .info-box -->
                                <div class="info-box col-sm-6 col-md-6 col-lg-3">
                                    <div class="info-box-icon-left w-100">
                                        <i class="icon-secure-payment"></i>
                                        <div class="info-box-content">
                                            <h4>SECURE PAYMENT</h4>
                                        </div>
                                        <!-- End .info-box-content -->
                                    </div>
                                </div>
                                <!-- End .info-box -->
                            </div>
                            <!-- End .row -->
                        </div>
                        <!-- End .info-boxes-container -->
                    </div>
                </section>
                <section class="product-section">
                    <div class="row">
                        <aside class="sidebar-home col-lg-3 col-md-4 order-lg-first">
                            <div class="side-menu-wrapper m-b-3 border-0">
                                <h2 class="side-menu-title bg-primary text-white">
                                    <i class="fas fa-bars"></i>Shop By Category</h2>

                                <nav class="side-nav border border-top-0">
                                    <ul class="menu-vertical sf-arrows">
                                        <li>
                                            <a href="/porto/demo15-shop.html">Accessories</a>
                                        </li>
                                        <li>
                                            <a href="/porto/demo15-shop.html">Dress</a>
                                        </li>
                                        <li>
                                            <a href="/porto/demo15-shop.html">Electronics</a>
                                        </li>
                                        <li>
                                            <a href="/porto/demo15-shop.html">Fashion</a>
                                        </li>
                                        <li>
                                            <a href="/porto/demo15-shop.html">Headphone</a>
                                        </li>
                                        <li>
                                            <a href="/porto/demo15-shop.html">Trousers</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- End .side-menu-container -->
                            <div class="feature-boxes-container">
                                <div class="row mb-1">
                                    <div class="col-12 appear-animate" data-animation-name="fadeInUpShorter">
                                        <div class="feature-box m-b-5 mx-sm-5 mx-md-3 feature-box-simple text-center">
                                            <i class="icon-earphones-alt"></i>

                                            <div class="feature-box-content">
                                                <h3 class="mb-0">Customer Support</h3>
                                                <h5>Need Assistence?</h5>

                                                <p>Lorem ipsum dolor amet, consectetur.</p>
                                            </div>
                                            <!-- End .feature-box-content -->
                                        </div>
                                        <!-- End .feature-box -->
                                    </div>
                                    <!-- End .col-md-4 -->
                                    <div class="col-12 appear-animate" data-animation-delay="500" data-animation-name="fadeInUpShorter">
                                        <div class="feature-box m-b-5 mx-sm-5 mx-md-3 feature-box-simple text-center">
                                            <i class="icon-credit-card"></i>

                                            <div class="feature-box-content">
                                                <h3 class="mb-0">Secured Payment</h3>
                                                <h5>Safe &amp; Fast</h5>

                                                <p>Lorem ipsum dolor amet, consectetur.</p>
                                            </div>
                                            <!-- End .feature-box-content -->
                                        </div>
                                        <!-- End .feature-box -->
                                    </div>
                                    <!-- End .col-md-4 -->
                                    <div class="col-12 appear-animate" data-animation-delay="800" data-animation-name="fadeInUpShorter">
                                        <div class="feature-box m-b-5 mx-sm-5 mx-md-3 feature-box-simple text-center">
                                            <i class="icon-action-undo "></i>

                                            <div class="feature-box-content">
                                                <h3 class="mb-0">RETURNS</h3>
                                                <h5>Easy &amp; Free</h5>

                                                <p>Lorem ipsum dolor sit amet.</p>
                                            </div>
                                            <!-- End .feature-box-content -->
                                        </div>
                                        <!-- End .feature-box -->
                                    </div>
                                    <!-- End .col-md-4 -->
                                </div>
                                <!-- End .feature-boxes-container.row -->
                            </div>
                        </aside>
                        <!-- End .col-lg-3 -->
                        <div class="col-lg-9 col-md-8">
                            <h2 class="section-title ls-n-20 m-b-1 line-height-1 text-center appear-animate" data-animation-delay="100" data-animation-duration="1500">Recent Products</h2>
                            <h3 class="section-sub-title ls-n-20 font-weight-normal text-center appear-animate" data-animation-delay="100" data-animation-duration="1500">All our new arrivals in a exclusive brand selection</h3>
                            <div class="row">
                                <!-- product 1 -->
                                <div class="col-6 col-md-4">
                                    <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeInRightShorter">
                                        <figure>
                                            <a href="/porto/demo15-product.html">
                                                <img src="/porto/assets/images/demoes/demo15/products/product-1.jpg" alt="product" width="400" height="400">
                                            </a>
                                            <div class="label-group">
                                                <span class="product-label label-sale">-26%</span>
                                            </div>
                                            <div class="btn-icon-group">
                                                <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal">
                                                    <i class="icon-shopping-cart"></i>
                                                </button>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo15-shop.html" class="product-category">shoes</a>,
                                                    <a href="/porto/demo15-shop.html" class="product-category">toys</a>
                                                </div>
                                                <a href="#" class="btn-icon-wish">
                                                    <i class="icon-heart"></i>
                                                </a>
                                            </div>
                                            <h3 class="product-title"> <a href="/porto/demo15-product.html">Woman Red Bag</a>
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
                                                <span class="product-price">$29.00 – $39.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                </div>
                                <!-- End .col-lg-4 -->
                                <!-- product 2 -->
                                <div class="col-6 col-md-4">
                                    <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeInRightShorter">
                                        <figure>
                                            <a href="/porto/demo15-product.html">
                                                <img src="/porto/assets/images/demoes/demo15/products/product-2.jpg" alt="product" width="400" height="400" />
                                            </a>
                                            <div class="label-group">
                                                <span class="product-label label-sale">-30%</span>
                                            </div>
                                            <div class="btn-icon-group">
                                                <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal">
                                                    <i class="icon-shopping-cart"></i>
                                                </button>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo15-shop.html" class="product-category">dress</a>,
                                                    <a href="/porto/demo15-shop.html" class="product-category">toys</a>
                                                </div>
                                                <a href="#" class="btn-icon-wish">
                                                    <i class="icon-heart"></i>
                                                </a>
                                            </div>
                                            <h3 class="product-title"> <a href="/porto/demo15-product.html">Woman Black
                                                    Blouse</a> </h3>
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
                                                <span class="product-price">$129.00 – $185.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                </div>
                                <!-- End .col-lg-4 -->
                                <!-- product 3 -->
                                <div class="col-6 col-md-4">
                                    <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeInRightShorter">
                                        <figure>
                                            <a href="/porto/demo15-product.html">
                                                <img src="/porto/assets/images/demoes/demo15/products/product-5.jpg" alt="product" width="400" height="400" />
                                            </a>
                                            <div class="btn-icon-group">
                                                <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal">
                                                    <i class="icon-shopping-cart"></i>
                                                </button>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo15-shop.html" class="product-category">caps</a>,
                                                    <a href="/porto/demo15-shop.html" class="product-category">T-shirts</a>
                                                </div>
                                                <a href="#" class="btn-icon-wish">
                                                    <i class="icon-heart"></i>
                                                </a>
                                            </div>
                                            <h3 class="product-title"> <a href="/porto/demo15-product.html">White Cap</a> </h3>
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
                                                <span class="product-price">$88.00 – $108.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                </div>
                                <!-- End .col-lg-4 -->
                                <!-- product 4 -->
                                <div class="col-6 col-md-4">
                                    <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeInRightShorter">
                                        <figure>
                                            <a href="/porto/demo15-product.html">
                                                <img src="/porto/assets/images/demoes/demo15/products/product-4.jpg" alt="product" width="400" height="400" />
                                            </a>
                                            <div class="btn-icon-group">
                                                <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal">
                                                    <i class="icon-shopping-cart"></i>
                                                </button>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo15-shop.html" class="product-category">Dress</a>,
                                                    <a href="/porto/demo15-shop.html" class="product-category">T-shirts</a>
                                                </div>
                                                <a href="#" class="btn-icon-wish">
                                                    <i class="icon-heart"></i>
                                                </a>
                                            </div>
                                            <h3 class="product-title"> <a href="/porto/demo15-product.html">Woman Jacket</a>
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
                                                <span class="product-price">$199.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                </div>
                                <!-- End .col-lg-4 -->
                                <!-- product 5 -->
                                <div class="col-6 col-md-4">
                                    <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeInRightShorter">
                                        <figure>
                                            <a href="/porto/demo15-product.html">
                                                <img src="/porto/assets/images/demoes/demo15/products/product-3.jpg" alt="product" width="400" height="400" />
                                            </a>
                                            <div class="label-group">
                                                <span class="product-label label-sale">-13%</span>
                                            </div>
                                            <div class="btn-icon-group">
                                                <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal">
                                                    <i class="icon-shopping-cart"></i>
                                                </button>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo15-shop.html" class="product-category">Dress</a>,
                                                    <a href="/porto/demo15-shop.html" class="product-category">Trousers</a>
                                                </div>
                                                <a href="#" class="btn-icon-wish">
                                                    <i class="icon-heart"></i>
                                                </a>
                                            </div>
                                            <h3 class="product-title"> <a href="/porto/demo15-product.html">Porto Sticky
                                                    info</a> </h3>
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
                                                <span class="product-price">$399.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                </div>
                                <!-- End .col-lg-4 -->
                                <!-- product 6 -->
                                <div class="col-6 col-md-4">
                                    <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeInRightShorter">
                                        <figure>
                                            <a href="/porto/demo15-product.html">
                                                <img src="/porto/assets/images/demoes/demo15/products/product-6.jpg" alt="product" width="400" height="400" />
                                            </a>
                                            <div class="btn-icon-group">
                                                <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal">
                                                    <i class="icon-shopping-cart"></i>
                                                </button>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo15-shop.html" class="product-category">Headphone</a>,
                                                    <a href="/porto/demo15-shop.html" class="product-category">T-shirts</a>
                                                </div>
                                                <a href="#" class="btn-icon-wish">
                                                    <i class="icon-heart"></i>
                                                </a>
                                            </div>
                                            <h3 class="product-title"> <a href="/porto/demo15-product.html">Jeans Wear</a>
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
                                                <span class="product-price">$108.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                </div>
                                <!-- End .col-lg-4 -->
                            </div>
                            <!-- End .row -->
                        </div>
                    </div>
                </section>

                <section class="banner-container appear-animate">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="banner">
                                <img src="/porto/assets/images/demoes/demo15/banners/banner-1.jpg" width="360" height="250" style="background-color: #efefef;" alt="banner" />
                                <div class="banner-layer banner-layer-right banner-layer-middle text-right">
                                    <h3 class="m-b-1 font3 text-right text-primary">Orange</h3>
                                    <h5 class="ls-n-20 d-inline-block m-r-2 text-left">FROM</h5>
                                    <h4 class="ls-n-20 text-price float-right text-left">$
                                        <b>19</b>99</h4>
                                    <div class="mb-0 clearfix text-right">
                                        <a href="/porto/demo15-shop.html" class="btn btn-modern btn-sm btn-dark">Shop Now!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="banner">
                                <img src="/porto/assets/images/demoes/demo15/banners/banner-2.jpg" width="360" height="250" style="background-color: #efefef;" alt="banner" />
                                <div class="banner-layer banner-layer-right banner-layer-middle text-right">
                                    <h3 class="m-b-1 font3 text-right text-primary">White</h3>
                                    <h5 class="ls-n-20 d-inline-block m-r-2 text-left">FROM</h5>
                                    <h4 class="ls-n-20 text-price float-right text-left">$
                                        <b>29</b>99</h4>
                                    <div class="mb-0 clearfix text-right">
                                        <a href="/porto/demo15-shop.html" class="btn btn-modern btn-sm btn-dark">Shop Now!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="banner">
                                <img src="/porto/assets/images/demoes/demo15/banners/banner-3.jpg" width="360" height="250" style="background-color: #efefef;" alt="banner" />
                                <div class="banner-layer banner-layer-right banner-layer-middle text-right">
                                    <h3 class="m-b-1 font3 text-right text-primary">Black</h3>
                                    <h5 class="ls-n-20 d-inline-block m-r-2 text-left">FROM</h5>
                                    <h4 class="ls-n-20 text-price float-right text-left">$
                                        <b>39</b>99</h4>
                                    <div class="mb-0 clearfix text-right">
                                        <a href="/porto/demo15-shop.html" class="btn btn-modern btn-sm btn-dark">Shop Now!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="product-section-2 p-t-3 appear-animate" data-animation-delay="100" data-animation-duration="1500">
                    <h2 class="section-title ls-n-20 m-b-1 line-height-1 text-center appear-animate" data-animation-delay="100" data-animation-duration="1500">Products On Sale</h2>
                    <h3 class="section-sub-title ls-n-20 font-weight-normal text-center appear-animate" data-animation-delay="100" data-animation-duration="1500">All our sale products in a exclusive brand selection</h3>
                    <div class="products-slider owl-carousel owl-theme nav-center-images-only" data-owl-options="{
                            'items': 2,
                            'nav': false,
                            'dots': false,
                            'responsive' : {
                                '0' : {
                                    'items': 2
                                },
                                '576' : {
                                    'items': 3
                                },
                                '768': {
                                    'items': 4
                                },
                                '1200' : {
                                    'items': 6,
                                    'nav': true
                                }
                            }
                        }">
                        <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="/porto/demo15-product.html">
                                    <img src="/porto/assets/images/demoes/demo15/products/product-1.jpg" alt="product" width="400" height="400" />
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-sale">-15%</span>
                                </div>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal">
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
                                        <a href="/porto/demo15-shop.html" class="product-category">headphone</a>,
                                        <a href="/porto/demo15-shop.html" class="product-category">watches</a>
                                    </div>
                                    <a href="#" class="btn-icon-wish">
                                        <i class="icon-heart"></i>
                                    </a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo15-product.html">Fashion Watch</a> </h3>
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
                        <div class="product-default inner-quickview inner-icon appear-animate" data-animation-delay="200" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="/porto/demo15-product.html">
                                    <img src="/porto/assets/images/demoes/demo15/products/product-2.jpg" width="400" height="400" alt="product" />
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-sale">-13%</span>
                                </div>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal">
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
                                        <a href="/porto/demo15-shop.html" class="product-category">shoes</a>,
                                        <a href="/porto/demo15-shop.html" class="product-category">toys</a>
                                    </div>
                                    <a href="#" class="btn-icon-wish">
                                        <i class="icon-heart"></i>
                                    </a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo15-product.html">Men Shoes Black</a> </h3>
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
                                    <span class="old-price">$299.00</span>
                                    <span class="product-price">$259.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon appear-animate" data-animation-delay="400" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="/porto/demo15-product.html">
                                    <img src="/porto/assets/images/demoes/demo15/products/product-3.jpg" alt="product" width="400" height="400" />
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-sale">-13%</span>
                                </div>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal">
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
                                        <a href="/porto/demo15-shop.html" class="product-category">headphone</a>,
                                        <a href="/porto/demo15-shop.html" class="product-category">watches</a>
                                    </div>
                                    <a href="#" class="btn-icon-wish">
                                        <i class="icon-heart"></i>
                                    </a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo15-product.html">Men Watch</a> </h3>
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
                                    <span class="old-price">$299.00</span>
                                    <span class="product-price">$259.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon appear-animate" data-animation-delay="600" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="/porto/demo15-product.html">
                                    <img src="/porto/assets/images/demoes/demo15/products/product-4.jpg" width="400" height="400" alt="product" />
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-sale">-13%</span>
                                </div>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal">
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
                                        <a href="/porto/demo15-shop.html" class="product-category">caps</a>,
                                        <a href="/porto/demo15-shop.html" class="product-category">t-shirts</a>
                                    </div>
                                    <a href="#" class="btn-icon-wish">
                                        <i class="icon-heart"></i>
                                    </a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo15-product.html">White Cap</a> </h3>
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
                                    <span class="product-price">$88.00 – $108.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon appear-animate" data-animation-delay="800" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="/porto/demo15-product.html">
                                    <img src="/porto/assets/images/demoes/demo15/products/product-5.jpg" alt="product" width="400" height="400" />
                                </a>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal">
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
                                        <a href="/porto/demo15-shop.html" class="product-category">dress</a>,
                                        <a href="/porto/demo15-shop.html" class="product-category">toys</a>
                                    </div>
                                    <a href="#" class="btn-icon-wish">
                                        <i class="icon-heart"></i>
                                    </a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo15-product.html">Woman Black Blouse</a> </h3>
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
                                    <span class="product-price">$88.00 – $108.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon appear-animate" data-animation-delay="1000" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="/porto/demo15-product.html">
                                    <img src="/porto/assets/images/demoes/demo15/products/product-6.jpg" width="400" height="400" alt="product" />
                                </a>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal">
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
                                        <a href="/porto/demo15-shop.html" class="product-category">Shoes</a>,
                                        <a href="/porto/demo15-shop.html" class="product-category">Toys</a>
                                    </div>
                                    <a href="#" class="btn-icon-wish">
                                        <i class="icon-heart"></i>
                                    </a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo15-product.html">Woman Red Bag</a> </h3>
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
                                    <span class="product-price">$29.00 – $39.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>
                    <!-- End .products-slider -->

                </section>

                <section class="sale-banner m-t-3 appear-animate">
                    <div class="banner" style="background-color: #ffab8c;">
                        <img src="/porto/assets/images/demoes/demo15/banners/banner-4.jpg" width="1120" height="380" style="background-color: #fca383;" alt="banner" />
                        <div class="banner-layer banner-layer-middle banner-layer-left">
                            <h5 class="font-weight-normal m-b-3 font3 text-left">Outlet Selected Items</h5>
                            <h4 class="mb-0 text-left text-uppercase text-white">big sale up to</h4>
                            <h3 class="text-sale text-left text-white mb-0">80%
                                <small>OFF</small>
                            </h3>
                        </div>
                    </div>
                </section>

                <section class="product-section-3 p-t-3 appear-animate" data-animation-delay="100" data-animation-duration="1500">
                    <h2 class="section-title ls-n-20 m-b-1 line-height-1 text-center appear-animate" data-animation-delay="100" data-animation-duration="1500">Popular Products</h2>
                    <h3 class="section-sub-title ls-n-20 font-weight-normal m-b-4 text-center appear-animate" data-animation-delay="100" data-animation-duration="1500">All our popular products in a exclusive brand selection</h3>
                    <div class="products-slider owl-carousel owl-theme nav-pos-outside show-nav-hover nav-center-images-only" data-owl-options="{
                            'nav': false,
                            'dots': false,
                            'responsive' : {
                                '0' : {
                                    'items': 2
                                },
                                '576' : {
                                    'items': 3
                                },
                                '768': {
                                    'items': 4
                                },
                                '1200' : {
                                    'items': 6,
                                    'nav': true
                                }
                            }
                        }">
                        <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="/porto/demo15-product.html">
                                    <img src="/porto/assets/images/demoes/demo15/products/product-1.jpg" alt="product" width="400" height="400" />
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-sale">-15%</span>
                                </div>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal">
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
                                        <a href="/porto/demo15-shop.html" class="product-category">headphone</a>,
                                        <a href="/porto/demo15-shop.html" class="product-category">watches</a>
                                    </div>
                                    <a href="#" class="btn-icon-wish">
                                        <i class="icon-heart"></i>
                                    </a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo15-product.html">Fashion Watch</a> </h3>
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
                        <div class="product-default inner-quickview inner-icon appear-animate" data-animation-delay="200" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="/porto/demo15-product.html">
                                    <img src="/porto/assets/images/demoes/demo15/products/product-2.jpg" width="400" height="400" alt="product" />
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-sale">-13%</span>
                                </div>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal">
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
                                        <a href="/porto/demo15-shop.html" class="product-category">shoes</a>,
                                        <a href="/porto/demo15-shop.html" class="product-category">toys</a>
                                    </div>
                                    <a href="#" class="btn-icon-wish">
                                        <i class="icon-heart"></i>
                                    </a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo15-product.html">Men Shoes Black</a> </h3>
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
                                    <span class="old-price">$299.00</span>
                                    <span class="product-price">$259.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon appear-animate" data-animation-delay="400" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="/porto/demo15-product.html">
                                    <img src="/porto/assets/images/demoes/demo15/products/product-3.jpg" alt="product" width="400" height="400" />
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-sale">-13%</span>
                                </div>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal">
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
                                        <a href="/porto/demo15-shop.html" class="product-category">headphone</a>,
                                        <a href="/porto/demo15-shop.html" class="product-category">watches</a>
                                    </div>
                                    <a href="#" class="btn-icon-wish">
                                        <i class="icon-heart"></i>
                                    </a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo15-product.html">Men Watch</a> </h3>
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
                                    <span class="old-price">$299.00</span>
                                    <span class="product-price">$259.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon appear-animate" data-animation-delay="600" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="/porto/demo15-product.html">
                                    <img src="/porto/assets/images/demoes/demo15/products/product-4.jpg" width="400" height="400" alt="product" />
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-sale">-13%</span>
                                </div>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal">
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
                                        <a href="/porto/demo15-shop.html" class="product-category">caps</a>,
                                        <a href="/porto/demo15-shop.html" class="product-category">t-shirts</a>
                                    </div>
                                    <a href="#" class="btn-icon-wish">
                                        <i class="icon-heart"></i>
                                    </a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo15-product.html">White Cap</a> </h3>
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
                                    <span class="product-price">$88.00 – $108.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon appear-animate" data-animation-delay="800" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="/porto/demo15-product.html">
                                    <img src="/porto/assets/images/demoes/demo15/products/product-5.jpg" alt="product" width="400" height="400" />
                                </a>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal">
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
                                        <a href="/porto/demo15-shop.html" class="product-category">dress</a>,
                                        <a href="/porto/demo15-shop.html" class="product-category">toys</a>
                                    </div>
                                    <a href="#" class="btn-icon-wish">
                                        <i class="icon-heart"></i>
                                    </a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo15-product.html">Woman Black Blouse</a> </h3>
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
                                    <span class="product-price">$88.00 – $108.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon appear-animate" data-animation-delay="1000" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="/porto/demo15-product.html">
                                    <img src="/porto/assets/images/demoes/demo15/products/product-6.jpg" width="400" height="400" alt="product" />
                                </a>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal">
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
                                        <a href="/porto/demo15-shop.html" class="product-category">Shoes</a>,
                                        <a href="/porto/demo15-shop.html" class="product-category">Toys</a>
                                    </div>
                                    <a href="#" class="btn-icon-wish">
                                        <i class="icon-heart"></i>
                                    </a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo15-product.html">Woman Red Bag</a> </h3>
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
                                    <span class="product-price">$29.00 – $39.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo15-product.html">
                                    <img src="/porto/assets/images/demoes/demo15/products/product-1.jpg" alt="product" width="400" height="400" />
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-sale">-15%</span>
                                </div>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal">
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
                                        <a href="/porto/demo15-shop.html" class="product-category">headphone</a>,
                                        <a href="/porto/demo15-shop.html" class="product-category">watches</a>
                                    </div>
                                    <a href="#" class="btn-icon-wish">
                                        <i class="icon-heart"></i>
                                    </a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo15-product.html">Fashion Watch</a> </h3>
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
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo15-product.html">
                                    <img src="/porto/assets/images/demoes/demo15/products/product-2.jpg" width="400" height="400" alt="product" />
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-sale">-13%</span>
                                </div>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal">
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
                                        <a href="/porto/demo15-shop.html" class="product-category">shoes</a>,
                                        <a href="/porto/demo15-shop.html" class="product-category">toys</a>
                                    </div>
                                    <a href="#" class="btn-icon-wish">
                                        <i class="icon-heart"></i>
                                    </a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo15-product.html">Men Shoes Black</a> </h3>
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
                                    <span class="old-price">$299.00</span>
                                    <span class="product-price">$259.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>
                    <!-- End .products-slider -->
                </section>

                <div class="m-b-1"></div>
                <!-- margin -->
                <div class="newsletter-banner appear-animate">
                    <div class="d-flex flex-wrap">
                        <div class="col-md-6 px-3">
                            <h2 class="text-center ls-n-20 m-b-1 text-md-right">Subscribe To Our Newsletter</h2>
                            <h5 class="font-weight-normal text-center text-md-right">Get all the latest information on events, sales and offers.</h5>
                        </div>
                        <div class="col-md-5 widget-newsletter px-3">
                            <form action="#" class="d-flex justify-content-center mb-0">
                                <input type="email" class="form-control mb-0" placeholder="Email address" required />
                                <button class="btn btn-primary">subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>

                <section class="appear-animate p-y-5">
                    <h2 class="d-none">Our customers</h2>
                    <div class="container">
                        <div class="brands-slider owl-carousel owl-theme images-center mt-5" data-owl-options="{
                                'responsive': {
                                    '0': {
                                        'items': 2,
                                        'margin': 0
                                    },
                                    '576': {
                                        'items': 3
                                    },
                                    '992': {
                                        'items': 4
                                    }
                                }
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
                </section>
            </div>
            <!-- End .container -->
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
