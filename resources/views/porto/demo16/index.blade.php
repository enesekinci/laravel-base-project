@extends('layouts.porto')

@section('footer')
    @include('components.porto.demo16.footer')
@endsection


@section('header')
    @include('components.porto.demo16.header')
@endsection

@section('content')
<section class="section-1 large-banner section-bg bg-img bg-fixed  slide-animate" style="background-image: url(&quot;assets/images/demoes/demo16/bg-1.jpg&quot;); background-color: #dcdbd6;">
                <div class="container position-relative">
                    <div class="banner-layer banner-layer-middle float-right ml-auto text-right">
                        <h2 class="m-b-2 appear-animate" data-animation-delay=" 700" data-animation-name="splitRight">
                            New Season Shirts</h2>
                        <h3 class="text-uppercase rotated-upto-text mb-0 position-relative appear-animate" data-animation-name="blurIn" data-animation-duration="1200"><small>Up to</small>50% Off</h3>

                        <hr class="divider-short-thick">

                        <h5 class="text-uppercase d-inline-block mb-0 ls-n-20 pr-1 pt-2 appear-animate" data-animation-delay="1900" data-animation-duration="1200">Starting at
                            <span>$
                                <strong>39</strong>99</span>
                        </h5>
                        <a href="/porto/demo16-shop.html" class="btn btn-dark btn-xl btn-icon-right appear-animate" data-animation-delay="1900" data-animation-duration="1200" data-animation-name="fadeInUp" role="button">Shop Now
                            <i class="fas fa-long-arrow-alt-right"></i>
                        </a>
                    </div>
                    <!-- End .section-content -->
                </div>
                <!-- End .container -->
            </section>
            <!-- End .section-1 -->

            <section class="section-2 large-banner slider-left section-bg bg-img bg-fixed" style="background-image: url(&quot;assets/images/demoes/demo16/bg-2.jpg&quot;); background-color: #0188ca;">
                <div class="container position-relative">
                    <div class="banner-layer banner-layer-middle float-right ml-auto text-left">
                        <h2 class="m-b-2 text-white">Summer Fashion Hats</h2>
                        <h3 class="text-uppercase rotated-upto-text mb-0 position-relative text-white">
                            <small>Up to</small>50% Off</h3>

                        <hr class="divider-short-thick border-white">

                        <h5 class="text-uppercase d-inline-block mb-0 ls-n-20 pr-1 pt-2 text-white">Starting at
                            <span>$
                                <strong>39</strong>99</span>
                        </h5>
                        <a href="/porto/demo16-shop.html" class="btn btn-light btn-xl btn-icon-right" role="button">Shop Now
                            <i class="fas fa-long-arrow-alt-right"></i>
                        </a>
                    </div>
                    <!-- End .section-content -->
                </div>
                <!-- End .container -->
            </section>
            <!-- End .section-2 -->

            <section class="section-3 category-section d-block d-md-flex">
                <div class="col-md-6 col-12 banner banner-1 bg-img d-flex align-items-center appear-animate" data-animation-duration="1200" style="background-image: url(&quot;assets/images/demoes/demo16/banners/banner-1.jpg&quot;); animation-delay: 0ms; animation-duration: 1200ms; background-color: #dcdbd9;">
                    <div class="banner-content">
                        <h3 class="title">DRESSES
                            <br>COLLECTION</h3>
                        <p class="subtitle font2">Check out this week's hottest styles.</p>
                        <div class="mb-0">
                            <a href="/porto/demo16-shop.html" role="button" class="btn btn-primary btn-borders btn-lg btn-outline-dark btn-dark">
                                SHOP NOW
                            </a>
                        </div>
                    </div>
                    <!-- End .banner-content -->
                </div>
                <!-- End .banner -->

                <div class="col-md-6 col-12 banner banner-1 bg-img d-flex align-items-center appear-animate" data-animation-duration="1200" style="background-image: url(&quot;assets/images/demoes/demo16/banners/banner-2.jpg&quot;); animation-delay: 0ms; animation-duration: 1200ms;">
                    <div class="banner-content">
                        <h3 class="title">HANDBAGS
                            <br>COLLECTION</h3>
                        <p class="subtitle font2">Check out this week's hottest styles.</p>
                        <div class="mb-0">
                            <a href="/porto/demo16-shop.html" role="button" class="btn btn-primary btn-borders btn-lg btn-outline-dark btn-dark">
                                SHOP NOW
                            </a>
                        </div>
                    </div>
                    <!-- End .banner-content -->
                </div>
                <!-- End .banner -->
            </section>
            <!-- End .section-3 -->

            <section class="section-4 product-collection bg-fixed" style="background-image: url(&quot;assets/images/demoes/demo16/bg-3.jpg&quot;); background-color: #dcdbd9;">
                <div class="container text-center">
                    <div class="title-group">
                        <h2 class="text-white m-b-1">Styled Outfits</h2>
                        <h5 class="text-uppercase d-inline-block mb-0 ls-n-20 pt-2 text-white mb-4">Starting at
                            <span>$
                                <strong>29</strong>99</span>
                        </h5>
                    </div>
                    <!-- .End .title-group -->
                </div>
                <!-- End .container -->

                <div class="container">
                    <div class="products-slider owl-carousel owl-theme nav-image-center show-nav-hover nav-outer nav-white" data-owl-options="{
                            'dots': false,
                            'nav': true
                        }">
                        <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="/porto/demo16-product.html">
                                    <img src="/porto/assets/images/demoes/demo16/products/home/product-1.jpg" alt="product" width="400" height="400" />
                                    <img src="/porto/assets/images/demoes/demo16/products/home/product-7.jpg" alt="product" width="400" height="400" />
                                </a>

                                <div class="label-group">
                                    <span class="product-label label-hot">HOT</span>
                                </div>

                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart product-type-simple" data-toggle="modal" data-target="#addCartModal">
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
                                        <a href="/porto/demo16-shop.html" class="product-category">DRESS</a>,
                                        <a href="/porto/demo16-shop.html" class="product-category">OUTFITS</a>
                                    </div>

                                </div>

                                <h3 class="product-title"> <a href="/porto/demo16-product.html">Woman Black Blouse</a> </h3>

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
                                    <span class="product-price">$101.00 - $111.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <!-- End .product-default -->

                        <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="/porto/demo16-product.html">
                                    <img src="/porto/assets/images/demoes/demo16/products/home/product-3.jpg" alt="product" width="400" height="400" />
                                    <img src="/porto/assets/images/demoes/demo16/products/home/product-8.jpg" alt="product" width="400" height="400" />
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-hot">HOT</span>
                                </div>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart product-type-simple" data-toggle="modal" data-target="#addCartModal">
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
                                        <a href="/porto/demo16-shop.html" class="product-category">OUTFITS</a>,
                                        <a href="/porto/demo16-shop.html" class="product-category">TOYS</a>
                                    </div>


                                </div>
                                <h3 class="product-title"> <a href="/porto/demo16-product.html">Girl Outfit Style</a> </h3>
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
                                    <span class="product-price">$99.00 - $109.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <!-- End .product-default -->

                        <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="/porto/demo16-product.html">
                                    <img src="/porto/assets/images/demoes/demo16/products/home/product-2.jpg" alt="product" width="400" height="400" />
                                </a>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart product-type-simple" data-toggle="modal" data-target="#addCartModal">
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
                                        <a href="/porto/demo16-shop.html" class="product-category">OUTFITS</a>,
                                        <a href="/porto/demo16-shop.html" class="product-category">TOYS</a>
                                    </div>


                                </div>
                                <h3 class="product-title"> <a href="/porto/demo16-product.html">Proto Sports Shoes</a> </h3>
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
                                    <span class="product-price">$101.00 - $111.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <!-- End .product-default -->

                        <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="/porto/demo16-product.html">
                                    <img src="/porto/assets/images/demoes/demo16/products/home/product-4.jpg" alt="product" width="400" height="400" />
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-hot">HOT</span>
                                    <span class="product-label label-sale">-15%</span>
                                </div>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart product-type-simple" data-toggle="modal" data-target="#addCartModal">
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
                                        <a href="/porto/demo16-shop.html" class="product-category">OUTFITS</a>
                                    </div>


                                </div>
                                <h3 class="product-title"> <a href="/porto/demo16-product.html">Blue High Hill</a> </h3>
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
                        <!-- End .product-default -->

                        <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="/porto/demo16-product.html">
                                    <img src="/porto/assets/images/demoes/demo16/products/home/product-7.jpg" alt="product" width="400" height="400" />
                                    <img src="/porto/assets/images/demoes/demo16/products/home/product-6.jpg" alt="product" width="400" height="400" />
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-hot">HOT</span>
                                </div>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart product-type-simple" data-toggle="modal" data-target="#addCartModal">
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
                                        <a href="/porto/demo16-shop.html" class="product-category">CAPS</a>
                                        <a href="/porto/demo16-shop.html" class="product-category">OUTFITS</a>
                                        <a href="/porto/demo16-shop.html" class="product-category">WOMEN OUTFITS</a>
                                    </div>


                                </div>
                                <h3 class="product-title"> <a href="/porto/demo16-product.html">Fashion High Hill</a> </h3>
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
                        <!-- End .product-default -->
                    </div>
                    <!-- End .section-products-carousel -->
                </div>
                <!-- End .container -->
            </section>
            <!-- End .section-4 -->

            <section class="section-5 d-block d-md-flex">
                <div class="col-md-6 col-12 banner d-flex align-items-center appear-animate order-last bg-img bg-fixed bg-right" data-animation-duration="1200" style="background-image: url(&quot;assets/images/demoes/demo16/bg-4.jpg&quot;); animation-delay: 0ms; animation-duration: 1200ms; background-color: #dcdbd9;">
                    <div class="banner-content">
                        <h3 class="title">WOMEN'S
                            <br>CASUAL STYLE</h3>
                        <p class="subtitle">Check out this week's hottest styles.</p>
                        <div class="mb-0">
                            <a href="/porto/demo16-shop.html" role="button" class="btn btn-borders btn-lg btn-outline-dark btn-dark">
                                SHOP NOW
                            </a>
                        </div>
                    </div>
                    <!-- End .banner-content -->
                </div>
                <!-- End .banner -->

                <div class="col-md-6 col-12 product-part pb-4">
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
                                <a href="/porto/demo16-product.html">
                                    <img src="/porto/assets/images/demoes/demo16/products/home/product-13.jpg" alt="product" width="400" height="400" />
                                </a>

                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart product-type-simple" data-toggle="modal" data-target="#addCartModal">
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
                                        <a href="/porto/demo16-shop.html" class="product-category">CASUAL</a>,
                                        <a href="/porto/demo16-shop.html" class="product-category">DRESS</a>
                                    </div>

                                    <a href="#" class="btn-icon-wish">
                                        <i class="icon-heart"></i>
                                    </a>
                                </div>

                                <h3 class="product-title"> <a href="/porto/demo16-product.html" class="text-dark">Porto Sticky
                                        Info</a> </h3>

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
                                    <span class="product-price">$129.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <!-- End .product-default -->

                        <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="/porto/demo16-product.html">
                                    <img src="/porto/assets/images/demoes/demo16/products/home/product-14.jpg" alt="product" width="400" height="400" />
                                    <img src="/porto/assets/images/demoes/demo16/products/home/product-15.jpg" alt="product" width="400" height="400" />
                                </a>

                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart product-type-simple" data-toggle="modal" data-target="#addCartModal">
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
                                        <a href="/porto/demo16-shop.html" class="product-category">CASUAL</a>,
                                        <a href="/porto/demo16-shop.html" class="product-category">DRESS</a>
                                    </div>

                                    <a href="#" class="btn-icon-wish">
                                        <i class="icon-heart"></i>
                                    </a>
                                </div>

                                <h3 class="product-title"> <a href="/porto/demo16-product.html" class="text-dark">Product Full
                                        Width</a> </h3>

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
                                    <span class="product-price">$99.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <!-- End .product-default -->
                    </div>
                </div>
                <!-- End .col-md-6 -->
            </section>
            <!-- End .section-5 -->

            <section class="section-6 d-block d-md-flex">
                <div class="col-md-6 col-12 banner d-flex align-items-center appear-animate bg-img bg-fixed bg-left" data-animation-duration="1200" style="background-image: url(&quot;assets/images/demoes/demo16/bg-5.jpg&quot;); animation-delay: 0ms; animation-duration: 1200ms; background-color: #dcdbd9;">
                    <div class="banner-content ml-auto text-right">
                        <h3 class="title">WOMEN'S
                            <br>OUTFITS</h3>
                        <p class="subtitle">Check out this week's hottest styles.</p>
                        <div class="mb-0">
                            <a href="/porto/demo16-shop.html" role="button" class="btn btn-borders btn-lg btn-outline-dark btn-dark">
                                SHOP NOW
                            </a>
                        </div>
                    </div>
                    <!-- End .banner-content -->
                </div>
                <!-- End .banner -->

                <div class="col-md-6 col-12 product-part pb-3">
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
                                <a href="/porto/demo16-product.html">
                                    <img src="/porto/assets/images/demoes/demo16/products/home/product-15.jpg" alt="product" width="400" height="400" />
                                    <img src="/porto/assets/images/demoes/demo16/products/home/product-14.jpg" alt="product" width="400" height="400" />
                                </a>

                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart product-type-simple" data-toggle="modal" data-target="#addCartModal">
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
                                        <a href="/porto/demo16-shop.html" class="product-category">CAPS</a>,
                                        <a href="/porto/demo16-shop.html" class="product-category">OUTFITS</a>,
                                        <a href="/porto/demo16-shop.html" class="product-category">WOMEN OUTFITS</a>
                                    </div>

                                    <a href="#" class="btn-icon-wish">
                                        <i class="icon-heart"></i>
                                    </a>
                                </div>

                                <h3 class="product-title"> <a href="/porto/demo16-product.html" class="text-dark">Fashion High
                                        Hill</a> </h3>

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
                        <!-- End .product-default -->

                        <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="/porto/demo16-product.html">
                                    <img src="/porto/assets/images/demoes/demo16/products/home/product-16.jpg" alt="product" width="400" height="400" />
                                </a>

                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart product-type-simple" data-toggle="modal" data-target="#addCartModal">
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
                                        <a href="/porto/demo16-shop.html" class="product-category">OUTFITS</a>,
                                        <a href="/porto/demo16-shop.html" class="product-category">SHIRTS</a>,
                                        <a href="/porto/demo16-shop.html" class="product-category">WOMEN OUTFITS</a>
                                    </div>

                                    <a href="#" class="btn-icon-wish">
                                        <i class="icon-heart"></i>
                                    </a>
                                </div>

                                <h3 class="product-title"> <a href="/porto/demo16-product.html" class="text-dark">Summer High
                                        Hill</a> </h3>

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
                        <!-- End .product-default -->
                    </div>
                </div>
                <!-- End .col-md-6 -->
            </section>
            <!-- End .section-6 -->

            <section class="section-7 newsletter-section bg-image bg-fixed" style="background-image: url(&quot;assets/images/demoes/demo16/bg-6.jpg&quot;); background-color: #dcdbd9;">
                <div class="container d-flex justify-content-center">
                    <div class="col-md-10 col-xl-7 col-lg-8 p-0">
                        <div class="info-box icon-top text-center justify-content-center">
                            <div class="info-box-content">
                                <h2 class="ls-n-20 text-white">Subscribe to Our Newsletter</h2>
                                <p>Get all the latest information on events, sales and
                                    <br>offers. Sign up for newsletter:</p>
                            </div>
                            <!-- End .info-box-content -->
                        </div>
                        <!-- End .info-box -->

                        <form action="#" class="mb-0 d-flex newsletter-form">
                            <input type="email" class="form-control border-0" placeholder="Email address" size="40" required="">
                            <button type="submit" class="btn btn-dark bg-primary border-0">Subscribe</button>
                        </form>
                    </div>
                    <!-- End .col-md-10.col-xl-7.col-lg-8 -->
                </div>
                <!-- End container -->
            </section>
            <!-- End .section-7 -->

            <section class="section-8 large-banner slider-left section-bg bg-img bg-fixed" style="background-image: url(&quot;assets/images/demoes/demo16/bg-7.jpg&quot;); background-color: #dcdbd9;">
                <div class="container position-relative">
                    <div class="banner-layer banner-layer-middle float-right ml-auto text-left">
                        <h2 class="m-b-2 text-dark">New Season Sunglasses</h2>
                        <h3 class="text-uppercase rotated-upto-text mb-0 position-relative text-dark">
                            <small>Up to</small>50% Off</h3>

                        <hr class="divider-short-thick border-dark">

                        <h5 class="text-uppercase d-inline-block mb-0 ls-n-20 pr-1 pt-2 text-dark">Starting at
                            <span>$
                                <strong>39</strong>99</span>
                        </h5>
                        <a href="/porto/demo16-shop.html" class="btn btn-light btn-xl btn-icon-right" role="button">Shop Now
                            <i class="fas fa-long-arrow-alt-right"></i>
                        </a>
                    </div>
                    <!-- End .section-content -->
                </div>
                <!-- End .container -->
            </section>
            <!-- End .section-8 -->

            <section class="section-9 product-collection bg-fixed" style="background-image: url(&quot;assets/images/demoes/demo16/bg-8.jpg&quot;); background-color: #dcdbd9;">
                <div class="container text-center">
                    <div class="title-group">
                        <h2 class="text-white m-b-1">Sunglasses On Sale</h2>
                        <h5 class="text-uppercase d-inline-block mb-0 ls-n-20 pt-2 text-white mb-4">Starting at
                            <span>$
                                <strong>19</strong>99</span>
                        </h5>
                    </div>
                    <!-- .End .title-group -->
                </div>
                <!-- End .container -->

                <div class="container">
                    <div class="products-slider owl-carousel owl-theme nav-out nav-image-center" data-owl-options="{
                            'dots': false,
                            'nav': true
                        }">
                        <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="/porto/demo16-product.html">
                                    <img src="/porto/assets/images/demoes/demo16/products/home/product-9.jpg" alt="product" width="400" height="400" />
                                    <img src="/porto/assets/images/demoes/demo16/products/home/product-12.jpg" alt="product" width="400" height="400" />
                                </a>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart product-type-simple" data-toggle="modal" data-target="#addCartModal">
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
                                        <a href="/porto/demo16-shop.html" class="product-category">HEADPHONE</a>,
                                        <a href="/porto/demo16-shop.html" class="product-category">SUNGLASSES</a>
                                    </div>

                                    <a href="#" class="btn-icon-wish">
                                        <i class="icon-heart"></i>
                                    </a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo16-product.html">Dark Green Sunglasses</a> </h3>
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
                        <!-- End .product-default -->

                        <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="/porto/demo16-product.html">
                                    <img src="/porto/assets/images/demoes/demo16/products/home/product-10.jpg" alt="product" width="400" height="400" />
                                </a>

                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart product-type-simple" data-toggle="modal" data-target="#addCartModal">
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
                                        <a href="/porto/demo16-shop.html" class="product-category">HEADPHONE</a>,
                                        <a href="/porto/demo16-shop.html" class="product-category">SUNGLASSES</a>
                                    </div>

                                    <a href="#" class="btn-icon-wish">
                                        <i class="icon-heart"></i>
                                    </a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo16-product.html">Porto Golden Glasses</a> </h3>
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
                                    <span class="product-price">$101.00 - $111.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <!-- End .product-default -->

                        <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="/porto/demo16-product.html">
                                    <img src="/porto/assets/images/demoes/demo16/products/home/product-11.jpg" alt="product" width="400" height="400" />
                                    <img src="/porto/assets/images/demoes/demo16/products/home/product-9.jpg" alt="product" width="400" height="400" />
                                </a>

                                <div class="label-group">
                                    <span class="product-label label-hot">HOT</span>
                                </div>

                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart product-type-simple" data-toggle="modal" data-target="#addCartModal">
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
                                        <a href="/porto/demo16-shop.html" class="product-category">SUNGLASSES</a>,
                                        <a href="/porto/demo16-shop.html" class="product-category">TOYS</a>
                                    </div>

                                    <a href="#" class="btn-icon-wish">
                                        <i class="icon-heart"></i>
                                    </a>
                                </div>

                                <h3 class="product-title"> <a href="/porto/demo16-product.html">Women Black Sunglasses</a>
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
                        <!-- End .product-default -->

                        <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="/porto/demo16-product.html">
                                    <img src="/porto/assets/images/demoes/demo16/products/home/product-12.jpg" alt="product" width="400" height="400" />
                                    <img src="/porto/assets/images/demoes/demo16/products/home/product-10.jpg" alt="product" width="400" height="400" />
                                </a>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart product-type-simple" data-toggle="modal" data-target="#addCartModal">
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
                                        <a href="/porto/demo16-shop.html" class="product-category">SUNGLASSES</a>,
                                        <a href="/porto/demo16-shop.html" class="product-category">TOYS</a>,
                                    </div>

                                    <a href="#" class="btn-icon-wish">
                                        <i class="icon-heart"></i>
                                    </a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo16-product.html">Women Sunglasses</a> </h3>
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
                                    <span class="product-price">$55.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <!-- End .product-default -->
                    </div>
                    <!-- End .section-products-carousel -->
                </div>
                <!-- End .container -->
            </section>
            <!-- End .section-9 -->
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
