@extends('layouts.porto')

@section('top-notice')
    @include('porto.demo12.top-notice')
@endsection

@section('footer')
    @include('porto.demo12.footer')
@endsection


@section('header')
    @include('porto.demo12.header-home')
@endsection

@section('content')
<section class="section-1 home-section position-relative">
                <div class="home-banner banner bg-img" style="background-image: url(/porto/assets/images/demoes/demo12/bg-1.jpg)">
                    <div class="banner-layer banner-layer-middle">
                        <h4 class="text-transform-none m-b-3">Find the Boundaries. Push Through!</h4>
                        <h2 class="text-transform-none mb-0">Summer Sale</h2>
                        <h3 class="m-b-3">70% Off</h3>
                        <h5 class="d-inline-block mb-0">
                            <span>Starting At</span>
                            <b class="coupon-sale-text text-white bg-secondary align-middle"><sup>$</sup>199<sup>99</sup></b>
                        </h5>
                        <a href="/porto/demo12-shop.html" class="btn btn-dark btn-lg ls-10">Shop Now!</a>
                    </div>
                    <!-- End .banner-layer -->
                </div>
                <!-- End .home-banner -->

                <div class="cat-section container position-absolute">
                    <div class="owl-carousel owl-theme" data-owl-options="{
						'items': 2,
						'dots': false,
						'nav': false,
						'margin': 20,
						'autoplay': false,
						'responsive': {
							'576': {
								'items': 3
							},
							'768': {
								'items': 4
							},
							'992': {
								'items': 5
							},
							'1200': {
								'items': 6
							}
						}
					}">
                        <a href="/porto/demo12-shop.html" class="btn btn-dark btn-lg">ACCESSORIES</a>
                        <a href="/porto/demo12-shop.html" class="btn btn-dark btn-lg">CAPS</a>
                        <a href="/porto/demo12-shop.html" class="btn btn-dark btn-lg">DRESS</a>
                        <a href="/porto/demo12-shop.html" class="btn btn-dark btn-lg">ELECTRONICS</a>
                        <a href="/porto/demo12-shop.html" class="btn btn-dark btn-lg">FASHION</a>
                        <a href="/porto/demo12-shop.html" class="btn btn-dark btn-lg">HEADPHONE</a>
                    </div>
                </div>
                <!-- End .cat-section -->
            </section>
            <!-- End .home-section -->

            <section class="section-2 banner-section appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200">
                <div class="banners-grid grid">
                    <div class="banner banner-1 grid-item">
                        <figure>
                            <img src="/porto/assets/images/demoes/demo12/banners/banner-1.jpg" style="background-color: #018cca;" alt="banner">
                        </figure>

                        <div class="banner-layer banner-layer-middle">
                            <div class="banner-layer banner-layer-middle">
                                <h4 class="text-transform-none text-white">Find the Boundaries. Push Through!</h4>
                                <h2 class="text-transform-none mb-0 text-white">Sunglasses</h2>
                                <h3 class="text-white">70% OFF</h3>
                                <h5 class="d-inline-block mb-0">
                                    <span class="text-white">Starting At</span>
                                    <b class="coupon-sale-text text-white bg-secondary"><sup>$</sup>199<sup>99</sup></b>
                                </h5>
                                <a href="/porto/demo12-shop.html" class="btn btn-dark btn-lg ls-10">Shop Now!</a>
                            </div>
                            <!-- End .banner-layer -->
                        </div>
                    </div>

                    <div class="banner banner-2 grid-item">
                        <figure>
                            <img src="/porto/assets/images/demoes/demo12/banners/banner-2.jpg" style="background-color: #333;" alt="banner">
                        </figure>

                        <div class="banner-layer banner-layer-middle d-flex align-items-end flex-column">
                            <h3 class="text-white text-right">ELECTRONIC<br>DEALS</h3>

                            <div class="coupon-sale-content">
                                <h4 class="coupon-sale-text bg-white d-block ext-transform-none mr-0 ls-0">Exclusive COUPON
                                </h4>
                                <h5 class="coupon-sale-text text-white ls-0 p-0"><i class="ls-0">UP TO</i><b class="text-dark">$100</b><sub>OFF</sub></h5>
                                <a href="#" class="btn btn-block btn-lg ls-10 text-white btn-dark">Get Yours!</a>
                            </div>
                        </div>
                    </div>

                    <div class="banner banner-3 grid-item">
                        <figure>
                            <img src="/porto/assets/images/demoes/demo12/banners/banner-3.jpg" style="background-color: #efefef;" alt="banner">
                        </figure>

                        <div class="banner-layer banner-layer-top text-center">
                            <h4 class="heading-border">AMAZING</h4>
                            <h3>COLLECTION</h3>
                            <hr class="mb-1 mt-1">
                            <h4 class="sub-title">CHECK OUR DISCOUNTS</h4>
                        </div>

                        <div class="banner-layer banner-layer-bottom d-flex justify-content-center">
                            <a href="/porto/demo12-shop.html" class="btn btn-dark ls-10 btn-lg">Shop Now!</a>
                        </div>
                    </div>

                    <div class="banner banner-4 grid-item">
                        <figure>
                            <img src="/porto/assets/images/demoes/demo12/banners/banner-4.jpg" style="background-color: #fba083;" alt="banner">
                        </figure>

                        <div class="banner-layer banner-layer-middle d-flex justify-content-between flex-wrap align-items-center">
                            <div class="banner-layer-left">
                                <h2 class="text-white">Outlet Selected Items</h2>
                                <h4 class="text-white ls-0"><b>BIG SALE UP TO</b></h4>
                            </div>

                            <div class="banner-layer-right">
                                <h3 class="text-white mb-0">80%<small class="d-inline-block text-center"><b>OFF</b></small></h3>
                            </div>
                        </div>
                    </div>

                    <div class="banner banner-5 grid-item">
                        <figure>
                            <img src="/porto/assets/images/demoes/demo12/banners/banner-5.jpg" style="background-color: #eee;" alt="banner">
                        </figure>

                        <div class="container">
                            <div class="row banner-layer-middle align-items-center position-absolute w-100">
                                <div class="mb-0 col-5">
                                    <h3 class="text-right mb-0">TOP ELECTRONIC<br>DEALS</h3>
                                </div>

                                <div class="mb-0 col-3 text-center">
                                    <a href="#" class="btn btn-lg ls-10 text-white btn-dark mb-xl-4 mb-0">VIEW SALE</a>
                                </div>

                                <div class="col-auto col-4">
                                    <div class="coupon-sale-content d-inline-flex flex-column">
                                        <h4 class="coupon-sale-text  ext-transform-none mr-0 ls-0 bg-dark text-white ml-0">
                                            Exclusive COUPON</h4>
                                        <h5 class="coupon-sale-text text-bottom ls-0 mb-0 ml-0"><i class="ls-0">UP
                                                TO</i><b class="bg-secondary text-white">$100</b><sub>OFF</sub></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="banner banner-6 grid-item">
                        <figure>
                            <img src="/porto/assets/images/demoes/demo12/banners/banner-6.jpg" style="background-color: #444;" alt="banner">
                        </figure>

                        <div class="banner-layer banner-layer-middle text-right">
                            <h2 class="m-b-2 text-secondary ls-n-20 font2">FLASH SALE</h2>
                            <h3 class="m-b-2 ls-n-20">TOP BRANDS<br>SUMMER SUNGLASSES</h3>
                            <h4 class="text-white ls-n-20 mb-3 pb-1">STARTING<br>AT <sup>$</sup>199<sup>99</sup></h4>
                            <a href="#" class="btn btn-light ls-10 btn-lg">VIEW SALE</a>
                        </div>
                    </div>

                    <div class="banner banner-7 grid-item">
                        <figure>
                            <img src="/porto/assets/images/demoes/demo12/banners/banner-7.jpg" style="background-color: #ccc;" alt="banner">
                        </figure>

                        <div class="banner-layer banner-layer-middle banner-layer-left">
                            <h4 class="text-body">CHECK OUR DISCOUNTS</h4>
                            <h3 class="text-nowrap">MORE THAN<span class="d-block">20 BRANDS</span></h3>
                            <hr class="mt-0 mb-2">
                            <h5 class="coupon-sale-text ls-10 p-0 mb-0 ml-3 font1 d-inline-flex align-items-center"><i class="ls-0">UP TO</i><b class="bg-dark text-white">$100</b> <span>OFF</span></h5>
                        </div>

                        <div class="banner-layer banner-layer-middle banner-layer-right text-center">
                            <div class="row mb-lg-4 mb-2">
                                <div class="col-4">
                                    <img src="/porto/assets/images/demoes/demo12/brands/brand-1.png" alt="brand">
                                </div>

                                <div class="col-4">
                                    <img src="/porto/assets/images/demoes/demo12/brands/brand-2.png" alt="brand">
                                </div>

                                <div class="col-4">
                                    <img src="/porto/assets/images/demoes/demo12/brands/brand-3.png" alt="brand">
                                </div>
                            </div>

                            <a href="#" class="btn btn-dark btn-black ls-10">Check The Sale</a>

                            <div class="row mt-lg-4 mt-2">
                                <div class="col-4">
                                    <img src="/porto/assets/images/demoes/demo12/brands/brand-4.png" alt="brand">
                                </div>

                                <div class="col-4">
                                    <img src="/porto/assets/images/demoes/demo12/brands/brand-5.png" alt="brand">
                                </div>

                                <div class="col-4">
                                    <img src="/porto/assets/images/demoes/demo12/brands/brand-6.png" alt="brand">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="banner banner-8 grid-item">
                        <figure>
                            <img src="/porto/assets/images/demoes/demo12/banners/banner-8.jpg" style="background-color: #eee;" alt="banner">
                        </figure>

                        <h6 class="banner-label left-label">50<small><sup>%</sup><sub>OFF</sub></small></h6>
                        <h6 class="banner-label right-label">70<small><sup>%</sup><sub>OFF</sub></small></h6>
                        <h6 class="banner-label bottom-label mb-0">30<small><sup>%</sup><sub>OFF</sub></small></h6>

                        <div class="banner-layer banner-layer-middle text-center">
                            <h3 class="m-b-2 ls-10">DEAL PROMOS</h3>
                            <h4 class="ls-10 text-body">STARTING AT $99</h4>
                            <a href="/porto/demo12-shop.html" class="btn btn-dark btn-black ls-10">SHOP NOW</a>
                        </div>
                    </div>

                    <div class="grid-item service-grid-1 service-grid">
                        <div class="feature-box mb-0 px-xl-5 feature-box-simple text-center d-flex flex-column">
                            <div class="feature-content m-auto">
                                <i class="icon-credit-card"></i>

                                <div class="feature-box-content p-0">
                                    <h3>SECURED PAYMENT</h3>
                                    <h5>Safe & Fast</h5>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapibus lacus.</p>
                                </div>
                                <!-- End .feature-box-content -->
                            </div>
                        </div>
                    </div>
                    <!-- End .feature-box -->

                    <div class="grid-item service-grid-2 service-grid">
                        <div class="feature-box mb-0 px-xl-5  feature-box-simple text-center d-flex flex-column">
                            <div class="feature-content m-auto">
                                <i class="icon-action-undo"></i>

                                <div class="feature-box-content p-0">
                                    <h3>FREE RETURNS</h3>
                                    <h5>Easy & Free</h5>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapibus lacus.</p>
                                </div>
                                <!-- End .feature-box-content -->
                            </div>
                        </div>
                        <!-- End .feature-box -->
                    </div>

                    <div class="grid-item service-grid-3 service-grid">
                        <div class="feature-box mb-0 px-xl-5 feature-box-simple text-center d-flex flex-column">
                            <div class="feature-content m-auto">
                                <i class="icon-shipping"></i>

                                <div class="feature-box-content p-0">
                                    <h3>FREE SHIPPING</h3>
                                    <h5>Orders Over $99</h5>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapibus lacus.</p>
                                </div>
                                <!-- End .feature-box-content -->
                            </div>
                        </div>
                        <!-- End .feature-box -->
                    </div>

                    <div class="grid-col-sizer p-0"></div>
                </div>
            </section>
            <!-- End .banner-section -->

            <section class="section-3 brand-section appear-animate" data-animation-delay="200">
                <h2 class="d-none">Brand Section</h2>

                <div class="container">
                    <div class="brands-slider image-center owl-carousel owl-theme" data-owl-options="{
						'margin': 0
					}">
                        <img src="/porto/assets/images/brands/small/brand1.png" width="140" height="160" alt="brand">
                        <img src="/porto/assets/images/brands/small/brand2.png" width="140" height="160" alt="brand">
                        <img src="/porto/assets/images/brands/small/brand3.png" width="140" height="160" alt="brand">
                        <img src="/porto/assets/images/brands/small/brand4.png" width="140" height="160" alt="brand">
                        <img src="/porto/assets/images/brands/small/brand5.png" width="140" height="160" alt="brand">
                        <img src="/porto/assets/images/brands/small/brand6.png" width="140" height="160" alt="brand">
                    </div>
                </div>
            </section>
            <!-- End .brand-section -->

            <section class="section-4 top-collection appear-animate" data-animation-delay="200">
                <h2 class="section-title text-center">TOP BRANDS COLLECTION</h2>

                <div class="container">
                    <div class="products-slider owl-carousel owl-theme" data-owl-options="{
						'items': 2,
						'dots': false,
						'responsive': {
                            '0': {
                                'items': 2,
                                'margin': 20
                            },
                            '480': {
                                'margin': 2
                            },
                            '992': {
                                'items': 4,
                                'margin': 2
                            },
							'1200': {
                                'items': 5,
                                'margin': 2
							}
						}
					}">
                        <div class="product-default">
                            <figure>
                                <a href="/porto/demo12-product.html">
                                    <img src="/porto/assets/images/demoes/demo12/products/home/product-1.jpg" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/demo12-product.html">Centered Vertical Zoom</a>
                                </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width: 0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">0</span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->

                                <div class="price-box">
                                    <span class="product-price">$35.00</span>
                                </div>
                                <!-- End .price-box -->

                                <div class="product-action">
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                    <a href="/porto/demo12-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i><span>SELECT
                                            OPTIONS</span></a>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                            class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <!-- End .product-default -->

                        <div class="product-default">
                            <figure>
                                <a href="/porto/demo12-product.html">
                                    <img src="/porto/assets/images/demoes/demo12/products/home/product-2.jpg" alt="product">
                                    <img src="/porto/assets/images/demoes/demo12/products/home/product-2-2.jpg" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/demo12-product.html">Product Extended</a> </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width: 0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">0</span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->

                                <div class="price-box">
                                    <span class="product-price">$39.00</span>
                                </div>
                                <!-- End .price-box -->

                                <div class="product-action">
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                    <a href="/porto/demo12-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i><span>SELECT
                                            OPTIONS</span></a>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                            class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <!-- End .product-default -->

                        <div class="product-default">
                            <figure>
                                <a href="/porto/demo12-product.html">
                                    <img src="/porto/assets/images/demoes/demo12/products/home/product-3.jpg" alt="product">
                                </a>

                                <div class="label-group">
                                    <span class="product-label label-sale">-13%</span>
                                </div>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/demo12-product.html">Speaker</a> </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width: 0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">0</span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->

                                <div class="price-box">
                                    <span class="old-price">$299.00</span>
                                    <span class="product-price">$259.00</span>
                                </div>
                                <!-- End .price-box -->

                                <div class="product-action">
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                            class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <!-- End .product-default -->

                        <div class="product-default">
                            <figure>
                                <a href="/porto/demo12-product.html">
                                    <img src="/porto/assets/images/demoes/demo12/products/home/product-4.jpg" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/demo12-product.html">Men Black Bag</a> </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width: 0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">0</span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->

                                <div class="price-box">
                                    <span class="product-price">$299.00</span>
                                </div>
                                <!-- End .price-box -->

                                <div class="product-action">
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                            class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <!-- End .product-default -->

                        <div class="product-default">
                            <figure>
                                <a href="/porto/demo12-product.html">
                                    <img src="/porto/assets/images/demoes/demo12/products/home/product-5.jpg" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/demo12-product.html">Men Gentle Watch</a> </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width: 0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">0</span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->

                                <div class="price-box">
                                    <span class="product-price">$299.00</span>
                                </div>
                                <!-- End .price-box -->

                                <div class="product-action">
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                            class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <!-- End .product-default -->
                    </div>
                </div>
            </section>
            <!-- End .top-collection -->

            <section class="section-5 sale-collection appear-animate" data-animation-delay="200">
                <h2 class="section-title text-center">SUMMER SALE - UP TO 70%</h2>

                <div class="container">
                    <div class="products-slider owl-carousel owl-theme" data-owl-options="{
						'items': 2,
						'dots': false,
						'responsive': {
                            '0': {
                                'items': 2,
                                'margin': 20
                            },
                            '480': {
                                'margin': 2
                            },
                            '992': {
                                'items': 4,
                                'margin': 2
                            },
							'1200': {
                                'items': 5,
                                'margin': 2
							}
						}
					}">
                        <div class="product-default">
                            <figure>
                                <a href="/porto/demo12-product.html">
                                    <img src="/porto/assets/images/demoes/demo12/products/home/product-6.jpg" alt="product">
                                </a>

                                <div class="label-group">
                                    <span class="product-label label-sale">-15%</span>
                                </div>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/demo12-product.html">Men Black Shoes</a> </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width: 0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">0</span>
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
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                            class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <!-- End .product-default -->

                        <div class="product-default">
                            <figure>
                                <a href="/porto/demo12-product.html">
                                    <img src="/porto/assets/images/demoes/demo12/products/home/product-7.jpg" alt="product">
                                    <img src="/porto/assets/images/demoes/demo12/products/home/product-5.jpg" alt="product">
                                </a>

                                <div class="label-group">
                                    <span class="product-label label-sale">-26%</span>
                                </div>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/demo12-product.html">Porto Black Watch</a> </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width: 0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">0</span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->

                                <div class="price-box">
                                    <span class="product-price">$29.00 - $39.00</span>
                                </div>
                                <!-- End .price-box -->

                                <div class="product-action">
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                    <a href="/porto/demo12-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i><span>SELECT
                                            OPTIONS</span></a>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                            class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <!-- End .product-default -->

                        <div class="product-default">
                            <figure>
                                <a href="/porto/demo12-product.html">
                                    <img src="/porto/assets/images/demoes/demo12/products/home/product-8.jpg" alt="product">
                                    <img src="/porto/assets/images/demoes/demo12/products/home/product-4.jpg" alt="product">
                                </a>

                                <div class="label-group">
                                    <span class="product-label label-sale">-34%</span>
                                </div>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/demo12-product.html">Porto Sports Shoes</a> </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width: 0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">0</span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->

                                <div class="price-box">
                                    <span class="product-price">$19.00 - $29.00</span>
                                </div>
                                <!-- End .price-box -->

                                <div class="product-action">
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                    <a href="/porto/demo12-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i><span>SELECT
                                            OPTIONS</span></a>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                            class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <!-- End .product-default -->

                        <div class="product-default">
                            <figure>
                                <a href="/porto/demo12-product.html">
                                    <img src="/porto/assets/images/demoes/demo12/products/home/product-3.jpg" alt="product">
                                </a>

                                <div class="label-group">
                                    <span class="product-label label-sale">-13%</span>
                                </div>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/demo12-product.html">Speaker</a> </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width: 0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">0</span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->

                                <div class="price-box">
                                    <span class="old-price">$299.00</span>
                                    <span class="product-price">$259.00</span>
                                </div>
                                <!-- End .price-box -->

                                <div class="product-action">
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                            class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <!-- End .product-default -->

                        <div class="product-default">
                            <figure>
                                <a href="/porto/demo12-product.html">
                                    <img src="/porto/assets/images/demoes/demo12/products/home/product-9.jpg" alt="product">
                                </a>

                                <div class="label-group">
                                    <span class="product-label label-sale">-13%</span>
                                </div>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/demo12-product.html">Woman Shoes</a> </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width: 0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">0</span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->

                                <div class="price-box">
                                    <span class="product-price">$88.00 - $111.00</span>
                                </div>
                                <!-- End .price-box -->

                                <div class="product-action">
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                    <a href="/porto/demo12-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i><span>SELECT
                                            OPTIONS</span></a>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                            class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <!-- End .product-default -->
                    </div>
                </div>
            </section>
            <!-- End .sale-collection -->

            <section class="section-6 small-products-collection appear-animate" data-animation-delay="200">
                <div class="container">
                    <div class="product-widgets-container row mb-2 pb-2">
                        <div class="col-lg-3 col-sm-6 pb-5 pb-lg-0">
                            <h4 class="section-sub-title m-b-3">Featured Products</h4>

                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="/porto/demo12-product.html">
                                        <img src="/porto/assets/images/demoes/demo12/products/small/product-1.jpg" alt="product">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-title"> <a href="/porto/demo12-product.html">Centered Vertical Zoom</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width: 0%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top">0</span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">$35.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>

                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="/porto/demo12-product.html">
                                        <img src="/porto/assets/images/demoes/demo12/products/small/product-3.jpg" alt="product">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-title"> <a href="/porto/demo12-product.html">Speaker</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width: 0%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top">0</span>
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

                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="/porto/demo12-product.html">
                                        <img src="/porto/assets/images/demoes/demo12/products/small/product-2.jpg" alt="product">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-title"> <a href="/porto/demo12-product.html">Product Extended</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width: 0%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top">0</span>
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

                        <div class="col-lg-3 col-sm-6 pb-5 pb-lg-0">
                            <h4 class="section-sub-title m-b-3">Best Selling Products</h4>

                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="/porto/demo12-product.html">
                                        <img src="/porto/assets/images/demoes/demo12/products/small/product-2.jpg" alt="product">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-title"> <a href="/porto/demo12-product.html">Product Extended</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width: 0%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top">0</span>
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

                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="/porto/demo12-product.html">
                                        <img src="/porto/assets/images/demoes/demo12/products/small/product-8.jpg" alt="product">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-title"> <a href="/porto/demo12-product.html">Porto Sports Shoes</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width: 0%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top">0</span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">$19.00 - $29.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>

                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="/porto/demo12-product.html">
                                        <img src="/porto/assets/images/demoes/demo12/products/small/product-11.jpg" alt="product">
                                        <img src="/porto/assets/images/demoes/demo12/products/small/product-4.jpg" alt="product">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-title"> <a href="/porto/demo12-product.html">Porto Black Bag</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width: 0%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top">0</span>
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
                        </div>

                        <div class="col-lg-3 col-sm-6 pb-5 pb-lg-0">
                            <h4 class="section-sub-title m-b-3">Latest Products</h4>

                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="/porto/demo12-product.html">
                                        <img src="/porto/assets/images/demoes/demo12/products/small/product-12.jpg" alt="product">
                                        <img src="/porto/assets/images/demoes/demo12/products/small/product-2.jpg" alt="product">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-title"> <a href="/porto/demo12-product.html">Product Brown Belt</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width: 0%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top">0</span>
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

                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="/porto/demo12-product.html">
                                        <img src="/porto/assets/images/demoes/demo12/products/small/product-1.jpg" alt="product">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-title"> <a href="/porto/demo12-product.html">Centered Vertical Zoom</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width: 0%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top">0</span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">$35.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>

                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="/porto/demo12-product.html">
                                        <img src="/porto/assets/images/demoes/demo12/products/small/product-11.jpg" alt="product">
                                        <img src="/porto/assets/images/demoes/demo12/products/small/product-4.jpg" alt="product">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-title"> <a href="/porto/demo12-product.html">Porto Black Bag</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width: 0%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top">0</span>
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
                        </div>

                        <div class="col-lg-3 col-sm-6 pb-5 pb-lg-0">
                            <h4 class="section-sub-title m-b-3">Top Rated Products</h4>

                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="/porto/demo12-product.html">
                                        <img src="/porto/assets/images/demoes/demo12/products/small/product-2.jpg" alt="product">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-title"> <a href="/porto/demo12-product.html">Product Extended</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width: 0%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top">0</span>
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

                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="/porto/demo12-product.html">
                                        <img src="/porto/assets/images/demoes/demo12/products/small/product-8.jpg" alt="product">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-title"> <a href="/porto/demo12-product.html">Porto Sports Shoes</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width: 0%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top">0</span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">$19.00 - $29.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>

                            <div class="product-default left-details product-widget">
                                <figure>
                                    <a href="/porto/demo12-product.html">
                                        <img src="/porto/assets/images/demoes/demo12/products/small/product-11.jpg" alt="product">
                                        <img src="/porto/assets/images/demoes/demo12/products/small/product-4.jpg" alt="product">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <h3 class="product-title"> <a href="/porto/demo12-product.html">Porto Black Bag</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width: 0%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top">0</span>
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
                        </div>
                    </div>
                    <!-- End .row -->
                </div>
            </section>
            <!-- End .small-products-collection -->
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    <script src="/porto/assets/js/optional/imagesloaded.pkgd.min.js"></script>
    <script src="/porto/assets/js/optional/isotope.pkgd.min.js"></script>
@endpush
