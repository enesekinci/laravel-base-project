@extends('layouts.porto')

@section('footer')
    @include('components.porto.demo9.footer')
@endsection


@section('header')
    @include('components.porto.demo9.header')
@endsection

@section('content')
<div class="container">
                <div class="row m-b-3">
                    <div class="home-slider-container col-lg-9 offset-lg-3">
                        <div class="home-slider owl-carousel owl-carousel-lazy owl-theme slide-animate" data-owl-options="{
                            'nav': false
                        }">
                            <div class="home-slide banner">
                                <a href="/porto/demo9-shop.html">
                                    <img class="slide-bg" src="/porto/assets/images/demoes/demo9/slider/slide-1.jpg" style="background-color: #ccc;" alt="banner" width="835" height="410" />
                                </a>
                                <div class="banner-layer slide-1 text-xl-right banner-layer-middle">
                                    <h4 class="text-xl-right slide-title appear-animate" data-animation-delay="100" data-animation-name="fadeInUpShorter">Find the Boundaries. Push Through!</h4>
                                    <h2 class="text-xl-right text-uppercase sub-title appear-animate" data-animation-delay="300" data-animation-name="fadeInUpShorter">Shoes Sale</h2>
                                    <div class="row">
                                        <div class="col-auto col-md-6 appear-animate" data-animation-delay="500" data-animation-name="fadeInRightShorter">
                                            <h3 class="sale-label line-height-1 mb-0 d-inline-block text-center">
                                                40<small><sup>%</sup><sub>OFF</sub></small></h3>
                                        </div>
                                        <div class="col-auto col-md-6 content-right appear-animate" data-animation-delay="700" data-animation-name="fadeInRightShorter">
                                            <h4 class="d-inline-block text-left text-uppercase line-height-1 d-inline-block">
                                                Starting At</h4>
                                            <h5 class="text-left coupon-sale-text">$<b>119</b>99</h5>
                                            <div class="mb-0">
                                                <a href="/porto/demo9-shop.html" class="btn btn-modern btn-md btn-dark">SHOP
                                                    NOW!
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="home-slide banner">
                                <a href="/porto/demo9-shop.html">
                                    <img class="slide-bg" src="/porto/assets/images/demoes/demo9/slider/slide-2.jpg" style="background-color: #444;" alt="banner" width="835" height="410" />
                                </a>
                                <div class="banner-layer slide-2 text-right banner-layer-middle">
                                    <div>
                                        <h2 class="text-right text-uppercase text-primary ls-n-20 m-b-2 appear-animate" data-animation-delay="100" data-animation-name="fadeInUpShorter">FLASH SALE
                                        </h2>
                                        <h4 class="text-right m-b-2 appear-animate" data-animation-delay="300" data-animation-name="fadeInUpShorter">TOP BRANDS<br>SUMMER SUNGLASSES
                                        </h4>
                                        <h3 class="text-right text-uppercase text-light ls-n-20 m-b-4 appear-animate" data-animation-delay="500" data-animation-name="fadeInUpShorter">
                                            STARTING<br>AT<sup class="pl-2 ml-1">$</sup>199<sup>99</sup></h3>
                                        <div class="pt-1">
                                            <a href="/porto/demo9-shop.html" class="btn btn-modern btn-lg btn-light appear-animate" data-animation-delay="700" data-animation-name="fadeInUpShorter">View
                                                Sale</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End .home-slider -->
                    </div>
                    <!-- End .col-lg-9 -->
                </div>
                <!-- End .row -->

                <section class="featured-products-section">
                    <h2 class="section-title title-decorate text-center d-flex align-items-center appear-animate" data-animation-delay="100" data-animation-duration="1500">Featured Products</h2>

                    <div class="owl-carousel owl-theme nav-image-center" data-owl-options="{
                            'margin': 20,
                            'dots': false,
                            'nav': true,
                            'loop': false,
                            'autoplay': false,
                            'responsive': {
                                '0': {
                                    'items': 2
                                },
                                '768': {
                                    'items': 3
                                },
                                '1200': {
                                    'items': 4
                                }
                            }
                        }">
                        <div class="product-default left-details">
                            <figure>
                                <a href="/porto/demo9-product.html">
                                    <img src="/porto/assets/images/demoes/demo9/products/product-1.jpg" alt="product" width="300" height="300">
                                    <img src="/porto/assets/images/demoes/demo9/products/product-1-hover.jpg" alt="product" width="300" height="300">
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-hot">HOT</span>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="/porto/demo9-shop.html" class="product-category">clothing</a>,
                                    <a href="/porto/demo9-shop.html" class="product-category">shoes</a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo9-product.html">Product Black Bag</a> </h3>
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
                                <div class="product-action">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                    <a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                            class="icon-heart"></i></a>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                            class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div>
                            <!-- End .product-details -->
                        </div>

                        <div class="product-default left-details">
                            <figure>
                                <a href="/porto/demo9-product.html">
                                    <img src="/porto/assets/images/demoes/demo9/products/product-2.jpg" alt="product" width="300" height="300">
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-hot">HOT</span>
                                    <span class="product-label label-sale">-28%</span>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="/porto/demo9-shop.html" class="product-category">shoes</a>,
                                    <a href="/porto/demo9-shop.html" class="product-category">toys</a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo9-product.html">Women Winter Shoes</a> </h3>
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
                                    <span class="product-price">$209.00 – $249.00</span>
                                </div>
                                <!-- End .price-box -->
                                <div class="product-action">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                    <a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                            class="icon-heart"></i></a>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                            class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div>
                            <!-- End .product-details -->
                        </div>

                        <div class="product-default left-details">
                            <figure>
                                <a href="/porto/demo9-product.html">
                                    <img src="/porto/assets/images/demoes/demo9/products/product-3.jpg" alt="product" width="300" height="300">
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-hot">HOT</span>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="/porto/demo9-shop.html" class="product-category">CLOTHING</a>,
                                    <a href="/porto/demo9-shop.html" class="product-category">shoes</a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo9-product.html">Women Black Bag</a> </h3>
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
                                <div class="product-action">
                                    <a href="/porto/demo9-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i><span>SELECT
                                            OPTIONS</span></a>
                                    <a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                            class="icon-heart"></i></a>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                            class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div>
                            <!-- End .product-details -->
                        </div>

                        <div class="product-default left-details">
                            <figure>
                                <a href="/porto/demo9-product.html">
                                    <img src="/porto/assets/images/demoes/demo9/products/product-10.jpg" alt="product" width="300" height="300">
                                    <img src="/porto/assets/images/demoes/demo9/products/product-10-2.jpg" alt="product" width="300" height="300">
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-hot">HOT</span>
                                    <span class="product-label label-sale">-15%</span>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="/porto/demo9-shop.html" class="product-category">T-shirts</a>,
                                    <a href="/porto/demo9-shop.html" class="product-category">Toys</a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo9-product.html">Women Bag</a> </h3>
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
                                <div class="product-action">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                    <a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                            class="icon-heart"></i></a>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                            class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>
                </section>


                <div class="home-products-container text-center">
                    <div class="row">
                        <div class="col-md-6 mb-2 appear-animate" data-animation-delay="200" data-animation-name="fadeIn">
                            <div class="home-products bg-gray p-y-5">
                                <h3 class="section-sub-title">BEST SELLERS PRODUCTS</h3>

                                <div class="owl-carousel owl-theme nav-image-center nav-thin nav-style-1" data-owl-options="{
                                    'dots': false,
                                    'nav': true,
                                    'loop': false,
                                    'autoplay': false,
                                    'responsive': {
                                        '480': {
                                            'items': 1
                                        },
                                        '768': {
                                            'items': 1
                                        }
                                    }
                                }">
                                    <div class="product-default pl-3 pr-3 pl-3 pr-3">
                                        <figure>
                                            <a href="/porto/demo9-product.html">
                                                <img src="/porto/assets/images/demoes/demo9/products/product-1.jpg" alt="product" width="300" height="300" />
                                            </a>
                                            <div class="label-group">
                                                <span class="product-label label-hot">HOT</span>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-list">
                                                <a href="/porto/demo9-shop.html" class="product-category">headphone</a>,
                                                <a href="/porto/demo9-shop.html" class="product-category">toys</a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo9-product.html">Women Bag</a>
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

                                    <div class="product-default pl-3 pr-3">
                                        <figure>
                                            <a href="/porto/demo9-product.html">
                                                <img src="/porto/assets/images/demoes/demo9/products/product-2.jpg" alt="product" width="300" height="300" />
                                            </a>
                                            <div class="label-group">
                                                <span class="product-label label-sale">-10%</span>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-list">
                                                <a href="/porto/demo9-shop.html" class="product-category">category</a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo9-product.html">Women Winter Shoes</a>
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
                                                <span class="product-price">$209.00 – $249.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>

                                    <div class="product-default pl-3 pr-3">
                                        <figure>
                                            <a href="/porto/demo9-product.html">
                                                <img src="/porto/assets/images/demoes/demo9/products/product-7.jpg" alt="product" width="300" height="300" />
                                            </a>
                                            <div class="label-group">
                                                <span class="product-label label-sale">-30%</span>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-list">
                                                <a href="/porto/demo9-shop.html" class="product-category">category</a>,
                                                <a href="/porto/demo9-shop.html" class="product-category">clothing</a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo9-product.html">Women Black Bag</a>
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
                            </div>
                        </div>
                        <!-- End .col-md-4 -->

                        <div class="col-md-6 mb-2 appear-animate" data-animation-delay="500" data-animation-name="fadeIn">
                            <div class="home-products bg-gray p-y-5">
                                <h3 class="section-sub-title">NEW ARRIVAL PRODUCTS</h3>

                                <div class="owl-carousel owl-theme nav-image-center nav-thin nav-style-1" data-owl-options="{
                                    'dots': false,
                                    'nav': true,
                                    'responsive': {
                                        '480': {
                                            'items': 1
                                        },
                                        '768': {
                                            'items': 1
                                        }
                                    }
                                }">
                                    <div class="product-default pl-3 pr-3 pl-3 pr-3">
                                        <figure>
                                            <a href="/porto/demo9-product.html">
                                                <img src="/porto/assets/images/demoes/demo9/products/product-2.jpg" alt="product" width="300" height="300" />
                                            </a>
                                            <div class="label-group">
                                                <span class="product-label label-hot">HOT</span>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-list">
                                                <a href="/porto/demo9-shop.html" class="product-category">headphone</a>,
                                                <a href="/porto/demo9-shop.html" class="product-category">toys</a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo9-product.html">Women Winter Shoes</a>
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

                                    <div class="product-default pl-3 pr-3">
                                        <figure>
                                            <a href="/porto/demo9-product.html">
                                                <img src="/porto/assets/images/demoes/demo9/products/product-9.jpg" alt="product" width="300" height="300" />
                                            </a>
                                            <div class="label-group">
                                                <span class="product-label label-sale">-10%</span>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-list">
                                                <a href="/porto/demo9-shop.html" class="product-category">category</a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo9-product.html">Black Women Underwear</a>
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
                                                <span class="product-price">$209.00 – $249.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>

                                    <div class="product-default pl-3 pr-3">
                                        <figure>
                                            <a href="/porto/demo9-product.html">
                                                <img src="/porto/assets/images/demoes/demo9/products/product-7.jpg" alt="product" width="300" height="300" />
                                            </a>
                                            <div class="label-group">
                                                <span class="product-label label-sale">-30%</span>
                                            </div>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-list">
                                                <a href="/porto/demo9-shop.html" class="product-category">category</a>,
                                                <a href="/porto/demo9-shop.html" class="product-category">clothing</a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo9-product.html">Women Black Bag</a>
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
                            </div>
                        </div>
                        <!-- End .col-md-4 -->
                    </div>
                    <!-- End .row -->
                </div>
                <!-- End .row.home-products -->

                <div class="mb-3"></div>
                <!-- margin -->

                <section class="fashion-products-section pb-2 appear-animate" data-animation-delay="100" data-animation-duration="1500">
                    <h2 class="section-title title-decorate text-center d-flex align-items-center">FASHION SELECTION
                    </h2>
                    <div class="owl-carousel owl-theme nav-image-center" data-owl-options="{
                        'margin': 20,
                        'dots': false,
                        'nav': true,
                        'loop': false,
                        'autoplay': false,
                        'responsive': {
                            '0': {
                                'items': 2
                            },
                            '768': {
                                'items': 3
                            },
                            '1200': {
                                'items': 4
                            }
                        }
                    }">
                        <div class="product-default left-details">
                            <figure>
                                <a href="/porto/demo9-product.html">
                                    <img src="/porto/assets/images/demoes/demo9/products/product-1.jpg" alt="product" width="300" height="300">
                                    <img src="/porto/assets/images/demoes/demo9/products/product-1-hover.jpg" alt="product" width="300" height="300">
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-hot">HOT</span>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="/porto/demo9-shop.html" class="product-category">clothing</a>,
                                    <a href="/porto/demo9-shop.html" class="product-category">shoes</a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo9-product.html">Product Black Bag</a> </h3>
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
                                <div class="product-action">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                    <a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                            class="icon-heart"></i></a>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                            class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div>
                            <!-- End .product-details -->
                        </div>

                        <div class="product-default left-details">
                            <figure>
                                <a href="/porto/demo9-product.html">
                                    <img src="/porto/assets/images/demoes/demo9/products/product-2.jpg" alt="product" width="300" height="300">
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-hot">HOT</span>
                                    <span class="product-label label-sale">-28%</span>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="/porto/demo9-shop.html" class="product-category">shoes</a>,
                                    <a href="/porto/demo9-shop.html" class="product-category">toys</a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo9-product.html">Women Winter Shoes</a> </h3>
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
                                    <span class="product-price">$209.00 – $249.00</span>
                                </div>
                                <!-- End .price-box -->
                                <div class="product-action">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                    <a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                            class="icon-heart"></i></a>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                            class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div>
                            <!-- End .product-details -->
                        </div>

                        <div class="product-default left-details">
                            <figure>
                                <a href="/porto/demo9-product.html">
                                    <img src="/porto/assets/images/demoes/demo9/products/product-3.jpg" alt="product" width="300" height="300">
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-hot">HOT</span>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="/porto/demo9-shop.html" class="product-category">CLOTHING</a>,
                                    <a href="/porto/demo9-shop.html" class="product-category">shoes</a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo9-product.html">Women Black Bag</a> </h3>
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
                                <div class="product-action">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                    <a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                            class="icon-heart"></i></a>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                            class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div>
                            <!-- End .product-details -->
                        </div>

                        <div class="product-default left-details">
                            <figure>
                                <a href="/porto/demo9-product.html">
                                    <img src="/porto/assets/images/demoes/demo9/products/product-10.jpg" alt="product" width="300" height="300">
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-hot">HOT</span>
                                    <span class="product-label label-sale">-15%</span>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="/porto/demo9-shop.html" class="product-category">T-shirts</a>,
                                    <a href="/porto/demo9-shop.html" class="product-category">Toys</a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo9-product.html">Women Bag</a> </h3>
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
                                <div class="product-action">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                    <a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                            class="icon-heart"></i></a>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                            class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>
                </section>

                <div class="m-b-1"></div>
                <!-- margin -->
                <div class="banner newsletter-banner bg-img appear-animate" style="background-image: url(/porto/assets/images/demoes/demo9/banners/banner.jpg)">
                    <div class="banner-content col-md-9 col-xl-6 col-lg-8 col-11 p-l-5 pr-0">
                        <h2 class="text-center ls-n-20 m-b-2 text-uppercase">subscribe to our newsletter</h2>
                        <h5 class="text-center text-body font-weight-normal m-b-3 p-x-4">Get all the latest information on events, sales and offers. Sign up for newsletter:</h5>
                        <div class="widget-newsletter">
                            <form action="#" class="d-flex justify-content-center mb-0">
                                <input type="email" class="form-control mb-1" placeholder="Email address" required />
                                <button class="btn btn-primary">subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="brands-section appear-animate p-y-5">
                    <div class="container">
                        <div class="brands-slider images-center owl-carousel owl-theme nav-pos-outside show-nav-hover appear-animate" data-owl-options="{
                                'margin': 0,
                                'loop': true,
                                'autoplay': true
                            }">
                            <img src="/porto/assets/images/brands/small/brand1.png" width="140" height="60" alt="logo" />
                            <img src="/porto/assets/images/brands/small/brand2.png" width="140" height="60" alt="logo" />
                            <img src="/porto/assets/images/brands/small/brand3.png" width="140" height="60" alt="logo" />
                            <img src="/porto/assets/images/brands/small/brand4.png" width="140" height="60" alt="logo" />
                            <img src="/porto/assets/images/brands/small/brand5.png" width="140" height="60" alt="logo" />
                            <img src="/porto/assets/images/brands/small/brand6.png" width="140" height="60" alt="logo" />
                        </div>
                        <!-- End .partners-carousel -->
                    </div>
                    <!-- End .container -->
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
