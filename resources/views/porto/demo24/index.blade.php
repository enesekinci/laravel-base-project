@extends('layouts.porto')

@section('footer')
    @include('porto.demo24.footer')
@endsection


@section('header')
    @include('porto.demo24.header')
@endsection

@section('content')
<div class="intro-section mb-3">
                <div class="intro-slider slide-animate curved-border owl-carousel owl-theme nav-big" data-owl-options="{
                    'loop': false,
                    'nav': false,
                    'dots': false,
                    'navText': ['<i class=icon-angle-left></i>', '<i class=icon-angle-right></i>'],
                    'responsive': {
                        '992': {
                            'nav': true
                        }
                    }
                }">
                    <div class="intro-slide intro-slide-1" style="background-image: url('/porto/assets/images/demoes/demo24/slider/slide-1.jpg'); background-color: #d85c50;">
                        <div class="container">
                            <div class="product-default">
                                <figure>
                                    <img src="/porto/assets/images/demoes/demo24/products/product-1.jpg" alt="product" width="722" height="455">
                                </figure>
                                <div class="product-details">
                                    <div class="title-wrap">
                                        <h4 class="product-title"><a href="/porto/demo24-product.html">Portoblee &ndash;
                                                Responsive
                                                Theme</a></h4>
                                    </div>
                                    <div class="price-box">
                                        <span class="sale-text"><small>get yours now</small>SALE 34%</span>
                                        <div class="price-wrapper">
                                            <div class="old-price">$59</div>
                                            <div class="product-price">$39</div>
                                        </div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="/porto/demo24-product.html" class="btn-add-cart"><i
                                                class="fa fa-arrow-right"></i>Select Options</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="intro-slide intro-slide-2" style="background-image: url('/porto/assets/images/demoes/demo24/slider/slide-2.jpg'); background-color: #252a2e;">
                        <div class="container">
                            <div class="product-default">
                                <figure>
                                    <img src="/porto/assets/images/demoes/demo24/products/product-2.jpg" alt="product" width="722" height="455">
                                </figure>
                                <div class="product-details">
                                    <div class="title-wrap">
                                        <h4 class="product-title"><a href="/porto/demo24-product.html">Shoport &ndash;
                                                eCommerce Theme</a></h4>
                                    </div>
                                    <div class="price-box">
                                        <span class="sale-text"><small>get yours now</small>SALE 50%</span>
                                        <div class="price-wrapper">
                                            <div class="old-price">$399</div>
                                            <div class="product-price">$198</div>
                                        </div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="/porto/demo24-product.html" class="btn-add-cart"><i
                                                class="fa fa-arrow-right"></i>Select Options</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="feature-boxes-container mb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="feature-box feature-box-simple text-center mb-0 appear-animate" data-animation-name="fadeInUpShorter" data-display="150">
                                <div class="feature-box-icon">
                                    <img src="/porto/assets/images/demoes/demo24/icons/icon-1.png" alt="icon" width="45" height="45">
                                </div>

                                <div class="feature-box-content">
                                    <h3>Dedicated Service</h3>
                                    <p>Consult our specialists for help with an order, customization, or design advice.
                                    </p>

                                    <a href="#" class="btn btn-outline btn-round">Get in touch</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-box feature-box-simple text-center mb-0 appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="400">
                                <div class="feature-box-icon">
                                    <img src="/porto/assets/images/demoes/demo24/icons/icon-2.png" alt="icon" width="45" height="45">
                                </div>

                                <div class="feature-box-content">
                                    <h3>Money Back Guarantee</h3>
                                    <p>Consult our specialists for help with an order, customization, or design advice.
                                    </p>

                                    <a href="#" class="btn btn-outline btn-round">Get in touch</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-box feature-box-simple text-center mb-0 appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="650">
                                <div class="feature-box-icon">
                                    <img src="/porto/assets/images/demoes/demo24/icons/icon-3.png" alt="icon" width="45" height="45">
                                </div>

                                <div class="feature-box-content">
                                    <h3>Secure Payment</h3>
                                    <p>Consult our specialists for help with an order, customization, or design advice.
                                    </p>

                                    <a href="#" class="btn btn-outline btn-round">Get in touch</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shape-wrapper">
                    <img src="/porto/assets/images/demoes/demo24/shape1.png" alt="shape" width="129" height="408">
                </div>
            </div>

            <section class="featured-products-container curved-border bg-gray">
                <div class="container">
                    <h2 class="section-title mb-2">Featured Items</h2>

                    <div class="row">
                        <div class="featured-products owl-carousel owl-theme dots-small appear-animate" data-owl-options="{
                            'margin': 0,
                            'responsive': {
                                '0': {
                                    'items': 1
                                },
                                '576': {
                                    'items': 2
                                },
                                '1200': {
                                    'items': 3
                                }
                            }
                        }" data-animation-name="fadeIn" data-animation-delay="200">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo24-product.html">
                                        <img src="/porto/assets/images/demoes/demo24/products/product-3.jpg" width="217" height="217" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                        <div class="product-label label-sale">-17%</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="/porto/demo24-product.html" class="btn-icon btn-add-cart"><i
                                                class="fa fa-arrow-right"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                        View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo24-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo24-product.html">xPorto &ndash; Responsive HTML Template</a>
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
                                        <span class="old-price">$59</span>
                                        <span class="product-price">$49</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo24-product.html">
                                        <img src="/porto/assets/images/demoes/demo24/products/product-2.jpg" width="217" height="217" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                        <div class="product-label label-sale">-50%</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="/porto/demo24-product.html" class="btn-icon btn-add-cart"><i
                                                class="fa fa-arrow-right"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                        View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo24-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo24-product.html">Shoport &ndash; eCommerce Theme</a>
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
                                        <span class="old-price">$399</span>
                                        <span class="product-price">$198</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo24-product.html">
                                        <img src="/porto/assets/images/demoes/demo24/products/product-1.jpg" width="217" height="217" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                        <div class="product-label label-sale">-34%</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="/porto/demo24-product.html" class="btn-icon btn-add-cart"><i
                                                class="fa fa-arrow-right"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                        View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo24-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo24-product.html">Portoblee &ndash; Responsive Theme</a>
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
                                        <span class="old-price">$59</span>
                                        <span class="product-price">$39</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                        </div>
                    </div>

                    <hr>
                </div>

                <div class="banner-section appear-animate" data-animation-name="fadeIn" data-animation-delay="200">
                    <div class="container position-static">
                        <div class="banner banner1 bg-white position-static">
                            <div class="row no-gutters m-0 align-items-center">
                                <div class="col-md-5 col-xl-6 position-static">
                                    <div class="shape-wrapper">
                                        <img src="/porto/assets/images/demoes/demo24/shape2.png" alt="shape" width="129" height="408">
                                    </div>

                                    <img class="position-relative" src="/porto/assets/images/demoes/demo24/banners/banner-1.jpg" alt="banner" width="216" height="607">
                                </div>
                                <div class="col-md-7 col-xl-6 px-4 px-md-0">
                                    <div class="row align-items-center py-5">
                                        <div class="col-sm-6 col-lg-7 mb-4 mb-sm-0">
                                            <h2 class="mb-0">Meet Porto</h2>
                                            <p class="mb-0">The easier way to build your portfolio & showcase your work.</p>
                                        </div>
                                        <div class="col-sm-6 col-lg-5 text-sm-center">
                                            <a href="/porto/demo24-shop.html" class="btn btn-dark btn-round ls-0">Get Started
                                                <i class="fas fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="best-sellers">
                <div class="container">
                    <h2 class="section-title mb-2">Best Selling Items</h2>

                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeIn" data-animation-delay="200">
                                <figure>
                                    <a href="/porto/demo24-product.html">
                                        <img src="/porto/assets/images/demoes/demo24/products/product-1.jpg" width="217" height="217" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                        <div class="product-label label-sale">-34%</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="/porto/demo24-product.html" class="btn-icon btn-add-cart"><i
                                                class="fa fa-arrow-right"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                        View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo24-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo24-product.html">Portoblee &ndash; Responsive Theme</a>
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
                                        <span class="old-price">$59</span>
                                        <span class="product-price">$39</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeIn" data-animation-delay="200">
                                <figure>
                                    <a href="/porto/demo24-product.html">
                                        <img src="/porto/assets/images/demoes/demo24/products/product-4.jpg" width="217" height="217" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-sale">-34%</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="/porto/demo24-product.html" class="btn-icon btn-add-cart"><i
                                                class="fa fa-arrow-right"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                        View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo24-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo24-product.html">DUBLIN &ndash; HTML Temlate</a>
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
                                        <span class="old-price">$29</span>
                                        <span class="product-price">$19</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeIn" data-animation-delay="200">
                                <figure>
                                    <a href="/porto/demo24-product.html">
                                        <img src="/porto/assets/images/demoes/demo24/products/product-5.jpg" width="217" height="217" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-sale">-10%</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="/porto/demo24-product.html" class="btn-icon btn-add-cart"><i
                                                class="fa fa-arrow-right"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                        View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo24-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo24-product.html">PortoHUB &ndash; Magenta Theme</a>
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
                                        <span class="old-price">$99</span>
                                        <span class="product-price">$89</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeIn" data-animation-delay="200">
                                <figure>
                                    <a href="/porto/demo24-product.html">
                                        <img src="/porto/assets/images/demoes/demo24/products/product-6.jpg" width="217" height="217" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-sale">-10%</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="/porto/demo24-product.html" class="btn-icon btn-add-cart"><i
                                                class="fa fa-arrow-right"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                        View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo24-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo24-product.html">Portobe &ndash; Shopify Theme</a>
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
                                        <span class="old-price">$99</span>
                                        <span class="product-price">$89</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeIn" data-animation-delay="200">
                                <figure>
                                    <a href="/porto/demo24-product.html">
                                        <img src="/porto/assets/images/demoes/demo24/products/product-2.jpg" width="217" height="217" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                        <div class="product-label label-sale">-50%</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="/porto/demo24-product.html" class="btn-icon btn-add-cart"><i
                                                class="fa fa-arrow-right"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                        View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo24-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo24-product.html">Shoport &ndash; eCommerce Theme</a>
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
                                        <span class="old-price">$399</span>
                                        <span class="product-price">$198</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeIn" data-animation-delay="200">
                                <figure>
                                    <a href="/porto/demo24-product.html">
                                        <img src="/porto/assets/images/demoes/demo24/products/product-3.jpg" width="217" height="217" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                        <div class="product-label label-sale">-17%</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="/porto/demo24-product.html" class="btn-icon btn-add-cart"><i
                                                class="fa fa-arrow-right"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                        View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo24-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo24-product.html">xPorto &ndash; Responsive HTML Template</a>
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
                                        <span class="old-price">$59</span>
                                        <span class="product-price">$49</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                        </div>
                    </div>

                    <div class="view-more-container text-center">
                        <a href="/porto/demo24-shop.html" class="btn btn-round btn-view-more">View more</a>
                    </div>

                    <h3 class="section-sub-title heading-border ls-0 text-center text-uppercase">As featured at</h3>

                    <div class="brands-slider owl-carousel owl-theme appear-animate" data-owl-options="{
                        'loop': true,
                        'center': true,
                        'margin': 0,
                        'responsive': {
                            '768': {
                                'items': 3
                            },
                            '1200': {
                                'items': 7
                            }
                        }
                    }" data-animation-name="fadeIn" data-animation-delay="200">
                        <a href="#"><img src="/porto/assets/images/demoes/demo24/brands/brand-1.png" alt="brand" width="390" height="73"></a>
                        <a href="#"><img src="/porto/assets/images/demoes/demo24/brands/brand-2.png" alt="brand" width="390" height="73"></a>
                        <a href="#"><img src="/porto/assets/images/demoes/demo24/brands/brand-3.png" alt="brand" width="390" height="73"></a>
                        <a href="#"><img src="/porto/assets/images/demoes/demo24/brands/brand-4.png" alt="brand" width="390" height="73"></a>
                        <a href="#"><img src="/porto/assets/images/demoes/demo24/brands/brand-5.png" alt="brand" width="390" height="73"></a>
                        <a href="#"><img src="/porto/assets/images/demoes/demo24/brands/brand-6.png" alt="brand" width="390" height="73"></a>
                        <a href="#"><img src="/porto/assets/images/demoes/demo24/brands/brand-7.png" alt="brand" width="390" height="73"></a>
                    </div>
                </div>
            </section>

            <div class="testimonials-section bg-gray">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="testimonials-carousel owl-carousel owl-theme dots-inside dots-small mb-4 mb-lg-0 appear-animate" data-owl-options="{
                                'loop': false,
                                'dots': true,
                                'responsive': null
                            }" data-animation-name="fadeInRightShorter" data-animation-delay="200">
                                <div class="testimonial">
                                    <div class="testimonial-owner">
                                        <figure>
                                            <img src="/porto/assets/images/clients/client-3.jpg" alt="client" width="55" height="55">
                                        </figure>

                                        <div>
                                            <strong class="testimonial-title">John Smith</strong>
                                            <span>CEO &amp; Founder</span>
                                        </div>
                                    </div>

                                    <blockquote>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum molestie, massa ut semper egestas, ex ligula ifend neque, eget pharetra elit lectus ac ex.risus.
                                        </p>
                                    </blockquote>
                                </div>
                                <div class="testimonial">
                                    <div class="testimonial-owner">
                                        <figure>
                                            <img src="/porto/assets/images/clients/client-3.jpg" alt="client" width="55" height="55">
                                        </figure>

                                        <div>
                                            <strong class="testimonial-title">John Smith</strong>
                                            <span>CEO &amp; Founder</span>
                                        </div>
                                    </div>

                                    <blockquote>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum molestie, massa ut semper egestas, ex ligula ifend neque, eget pharetra elit lectus ac ex.risus.
                                        </p>
                                    </blockquote>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="widget news-widget">
                                <h3 class="widget-title ls-0 mt-0 m-b-4">Latest News</h3>

                                <div class="widget-content">
                                    <div class="row">
                                        <div class="owl-carousel owl-theme dots-small appear-animate" data-owl-options="{
                                        'loop': false,
                                        'items': 1,
                                        'responsive': {
                                            '576': {
                                                'items': 2
                                            }
                                        }
                                    }" data-animation-name="fadeInRightShorter" data-animation-delay="400">
                                            <article class="post">
                                                <div class="post-date">
                                                    <span>26- Feb -2018</span>
                                                </div>

                                                <div class="post-body">
                                                    <h2 class="post-title">
                                                        <a href="/porto/single.html">Post Format Standard</a>
                                                    </h2>
                                                    <div class="post-content">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi. Etiam non... </p>

                                                        <a href="/porto/single.html" class="read-more">read more <i
                                                                class="fas fa-angle-right"></i></a>
                                                    </div>
                                                </div>
                                            </article>
                                            <article class="post">
                                                <div class="post-date">
                                                    <span>26- Feb -2018</span>
                                                </div>
                                                <div class="post-body">
                                                    <h2 class="post-title">
                                                        <a href="/porto/single.html">Post Format Video</a>
                                                    </h2>
                                                    <div class="post-content">
                                                        <p>Leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with... </p>

                                                        <a href="/porto/single.html" class="read-more">read more <i
                                                                class="fas fa-angle-right"></i></a>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
