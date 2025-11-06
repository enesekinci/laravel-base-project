@extends('layouts.porto')

@section('top-notice')
    @include('components.porto.demo14.top-notice')
@endsection

@section('footer')
    @include('components.porto.demo14.footer')
@endsection

@section('header')
    @include('components.porto.demo14.header')
@endsection

@section('content')
<section class="home-slider owl-carousel owl-theme text-uppercase nav-big bg-gray" data-owl-options="{
					'loop': false
				}">
                <div class="home-slide home-slide1 banner">
                    <img class="slide-bg" src="/porto/assets/images/demoes/demo14/slider/slide-1.jpg" alt="slider image" width="1120" height="500" style="background-color: #eee;">
                    <div class="container">
                        <div class="banner-layer banner-layer-middle banner-layer-right">
                            <h4 class="text-capitalize m-b-3">Totally Wireless High-Performance</h4>
                            <h2 class="m-b-2">Select headphones</h2>
                            <h3 class="m-b-2">30% Off</h3>
                            <h5 class="d-inline-block pt-2 mb-1 pb-1 ls-n-20 align-middle">Starting AT
                                <b class="coupon-sale-text bg-secondary text-white d-inline-block align-sub">$
									<em class="align-middle">199</em>99</b>
                            </h5>
                            <a href="/porto/demo14-shop.html" class="btn btn-dark">Shop Now!</a>
                        </div>
                        <!-- End .banner-layer -->
                    </div>
                    <!-- End .container -->
                </div>
                <!-- End .home-slide -->

                <div class="home-slide home-slide2 banner">
                    <img class="slide-bg" src="/porto/assets/images/demoes/demo14/slider/slide-2.jpg" alt="slider image" width="1120" height="500" style="background-color: #eee;">

                    <div class="container">
                        <div class="banner-layer banner-layer-middle banner-layer-left">
                            <h4 class="mb-0">Extra</h4>
                            <h3 class="m-b-2">20% off</h3>
                            <h3 class="m-b-3 heading-border">Accessories</h3>
                            <h2 class="m-b-4">Drones on sale</h2>
                            <a href="/porto/demo14-shop.html" class="btn btn-block btn-dark">Shop All Sale</a>
                        </div>
                    </div>
                    <!-- End .container -->
                </div>
                <!-- End .home-slide -->
            </section>
            <!-- End .home-slider -->

            <div class="info-boxes-container bg-gray">
                <div class="container py-3">
                    <div class="info-boxes-slider owl-carousel owl-theme py-3" data-owl-options="{
							'dots': false,
							'margin': 20,
							'loop': false,
							'responsive': {
								'576': {
									'items': 2
								},
								'992': {
									'items': 3
								}
							}
						}">
                        <div class="info-box info-box-icon-left">
                            <i class="icon-shipping"></i>

                            <div class="info-box-content">
                                <h4 class="pb-1">FREE SHIPPING & RETURN</h4>
                                <p>Free shipping on all orders over $99</p>
                            </div>
                            <!-- End .info-box-content -->
                        </div>
                        <!-- End .info-box -->

                        <div class="info-box info-box-icon-left">
                            <i class="icon-money"></i>

                            <div class="info-box-content">
                                <h4 class="pb-1">MONEY BACK GUARANTEE</h4>
                                <p>100% money back guarantee</p>
                            </div>
                            <!-- End .info-box-content -->
                        </div>
                        <!-- End .info-box -->

                        <div class="info-box info-box-icon-left">
                            <i class="icon-support"></i>

                            <div class="info-box-content">
                                <h4 class="pb-1">ONLINE SUPPORT 24/7</h4>
                                <p>Lorem ipsum dolor sit amet.</p>
                            </div>
                            <!-- End .info-box-content -->
                        </div>
                        <!-- End .info-box -->
                    </div>
                    <!-- End .info-boxes-slider -->
                </div>
                <!-- End .container -->
            </div>
            <!-- End .info-boxes-container -->

            <div class="banners-section container mt-4">
                <div class="banners-slider owl-carousel owl-theme dots-mt-1" data-owl-options="{
						'loop': false,
						'nav': false,
						'margin': 20,
						'responsive': {
							'768': {
								'items': 3
							},
							'576': {
								'items': 2
							}
						}
					}">
                    <div class="banner">
                        <img src="/porto/assets/images/demoes/demo14/banners/banner1.jpg" width="360" height="280" alt="category banner">
                        <div class="banner-content bg-dark text-center">
                            <h5 class="m-b-1">
                                <a href="/porto/demo14-shop.html">Save Up To</a>
                            </h5>
                            <h4 class="text-white m-b-1">$100</h4>
                            <h5 class="text-white mb-0">on Porto Watch Series 5</h5>
                        </div>
                    </div>
                    <div class="banner">
                        <img src="/porto/assets/images/demoes/demo14/banners/banner2.jpg" width="360" height="280" alt="category banner">
                        <div class="banner-content bg-dark text-center">
                            <h5 class="m-b-1">
                                <a href="/porto/demo14-shop.html">Save Up To</a>
                            </h5>
                            <h4 class="text-white m-b-1">$80</h4>
                            <h5 class="text-white mb-0">on Porto Pods Professional</h5>
                        </div>
                    </div>
                    <div class="banner">
                        <img src="/porto/assets/images/demoes/demo14/banners/banner3.jpg" width="360" height="280" alt="category banner">
                        <div class="banner-content bg-dark text-center">
                            <h5 class="m-b-1">
                                <a href="/porto/demo14-shop.html">Save Up To</a>
                            </h5>
                            <h4 class="text-white m-b-1">$90</h4>
                            <h5 class="text-white mb-0">on Bluetooth Speaker</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="home-product-tabs product-slider-tab pt-5 pt-md-0">
                <div class="container">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="featured-products-tab" data-toggle="tab" href="#featured-products" role="tab" aria-controls="featured-products" aria-selected="true">Featured Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="latest-products-tab" data-toggle="tab" href="#latest-products" role="tab" aria-controls="latest-products" aria-selected="false">Latest Products</a>
                        </li>
                    </ul>
                    <div class="tab-content m-b-4">
                        <div class="tab-pane fade show active" id="featured-products" role="tabpanel" aria-labelledby="featured-products-tab">
                            <div class="tab-products-carousel owl-carousel owl-theme quantity-inputs show-nav-hover nav-outer nav-image-center" data-owl-options="{
									'loop': false
								}">
                                <!-- product 1 -->
                                <div class="product-default inner-quickview inner-icon quantity-input">
                                    <figure>
                                        <a href="/porto/demo14-product.html">
                                            <img src="/porto/assets/images/demoes/demo14/products/product-9.jpg" width="280" height="280" alt="product">
                                        </a>
                                        <div class="label-group">
                                            <span class="product-label label-hot">HOT</span>
                                            <span class="product-label label-sale">-30%</span>
                                        </div>
                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-icon-wish">
                                                <i class="icon-heart"></i>
                                            </a>
                                        </div>
                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-list">
                                            <a href="/porto/demo14-shop.html" class="product-category">headphone, trousers</a>
                                        </div>
                                        <h3 class="product-title"> <a href="/porto/demo14-product.html">Porto Evolution
												Headset</a> </h3>
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
                                        <div class="product-action">
                                            <a href="/porto/demo14-product.html" class="btn-icon btn-add-cart product-type-simple">
                                                <i class="fa fa-arrow-right"></i>SELECT OPTIONS</a>
                                        </div>
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                                <!-- product 2 -->
                                <div class="product-default inner-quickview inner-icon quantity-input">
                                    <figure>
                                        <a href="/porto/demo14-product.html">
                                            <img src="/porto/assets/images/demoes/demo14/products/product-5.jpg" width="280" height="280" alt="product">
                                            <img src="/porto/assets/images/demoes/demo14/products/product-5-2.jpg" width="280" height="280" alt="product">
                                        </a>
                                        <div class="label-group">
                                            <span class="product-label label-hot">HOT</span>
                                        </div>
                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-icon-wish">
                                                <i class="icon-heart"></i>
                                            </a>
                                        </div>
                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-list">
                                            <a href="/porto/demo14-shop.html" class="product-category">dress, shoes</a>
                                        </div>
                                        <h3 class="product-title"> <a href="/porto/demo14-product.html">Porto Evolution
												Headset</a> </h3>
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
                                            <a href="/porto/demo14-product.html" class="btn-icon btn-add-cart product-type-simple">
                                                <i class="fa fa-arrow-right"></i>SELECT OPTIONS</a>
                                        </div>
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                                <!-- product 3 -->
                                <div class="product-default inner-quickview inner-icon quantity-input">
                                    <figure>
                                        <a href="/porto/demo14-product.html">
                                            <img src="/porto/assets/images/demoes/demo14/products/product-6.jpg" width="280" height="280" alt="product">
                                        </a>
                                        <div class="label-group">
                                            <span class="product-label label-hot">HOT</span>
                                        </div>
                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-icon-wish">
                                                <i class="icon-heart"></i>
                                            </a>
                                        </div>
                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-list">
                                            <a href="/porto/demo14-shop.html" class="product-category">dress, shoes</a>
                                        </div>
                                        <h3 class="product-title"> <a href="/porto/demo14-product.html">Headphone Black</a>
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
                                        <div class="product-action">
                                            <div class="product-single-qty">
                                                <input class="horizontal-quantity form-control" type="text">
                                            </div>
                                            <!-- End .product-single-qty -->
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple" data-toggle="modal" data-target="#addCartModal">
                                                <i class="icon-shopping-cart"></i>ADD TO CART</a>
                                        </div>
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                                <!-- product 4 -->
                                <div class="product-default inner-quickview inner-icon quantity-input">
                                    <figure>
                                        <a href="/porto/demo14-product.html">
                                            <img src="/porto/assets/images/demoes/demo14/products/product-7.jpg" width="280" height="280" alt="product">
                                        </a>
                                        <div class="label-group">
                                            <span class="product-label label-hot">HOT</span>
                                            <span class="product-label label-sale">-30%</span>
                                        </div>
                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-icon-wish">
                                                <i class="icon-heart"></i>
                                            </a>
                                        </div>
                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-list">
                                            <a href="/porto/demo14-shop.html" class="product-category">dress, shoes</a>
                                        </div>
                                        <h3 class="product-title"> <a href="/porto/demo14-product.html">Headphone Black</a>
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
                                        <div class="product-action">
                                            <div class="product-single-qty">
                                                <input class="horizontal-quantity form-control" type="text">
                                            </div>
                                            <!-- End .product-single-qty -->
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple" data-toggle="modal" data-target="#addCartModal">
                                                <i class="icon-shopping-cart"></i>ADD TO CART</a>
                                        </div>
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                                <!-- product 5 -->
                                <div class="product-default inner-quickview inner-icon quantity-input">
                                    <figure>
                                        <a href="/porto/demo14-product.html">
                                            <img src="/porto/assets/images/demoes/demo14/products/product-8.jpg" width="280" height="280" alt="product">
                                        </a>
                                        <div class="label-group">
                                            <span class="product-label label-hot">HOT</span>
                                            <span class="product-label label-sale">-20%</span>
                                        </div>
                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-icon-wish">
                                                <i class="icon-heart"></i>
                                            </a>
                                        </div>
                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-list">
                                            <a href="/porto/demo14-shop.html" class="product-category">t-shirts, watches</a>
                                        </div>
                                        <h3 class="product-title"> <a href="/porto/demo14-product.html">Computer Mouse</a>
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
                                            <span class="product-price">$55.00</span>
                                        </div>
                                        <!-- End .price-box -->
                                        <div class="product-action">
                                            <div class="product-single-qty">
                                                <input class="horizontal-quantity form-control" type="text">
                                            </div>
                                            <!-- End .product-single-qty -->
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple" data-toggle="modal" data-target="#addCartModal">
                                                <i class="icon-shopping-cart"></i>ADD TO CART</a>
                                        </div>
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>
                            <!-- End .products-carousel -->
                        </div>
                        <!-- End .tab-pane -->
                        <div class="tab-pane fade" id="latest-products" role="tabpanel" aria-labelledby="latest-products-tab">
                            <div class="tab-products-carousel owl-carousel owl-theme quantity-inputs show-nav-hover nav-outer nav-image-center" data-owl-options="{
									'loop': false
								}">
                                <!-- product 1 -->
                                <div class="product-default inner-quickview inner-icon quantity-input">
                                    <figure>
                                        <a href="/porto/demo14-product.html">
                                            <img src="/porto/assets/images/demoes/demo14/products/product-8.jpg" width="280" height="280" alt="product">
                                        </a>
                                        <div class="label-group">
                                            <span class="product-label label-hot">HOT</span>
                                            <span class="product-label label-sale">-20%</span>
                                        </div>
                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-icon-wish">
                                                <i class="icon-heart"></i>
                                            </a>
                                        </div>
                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-list">
                                            <a href="/porto/demo14-shop.html" class="product-category">t-shirts, watches</a>
                                        </div>
                                        <h3 class="product-title"> <a href="/porto/demo14-product.html">Computer Mouse</a>
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
                                            <span class="product-price">$55.00</span>
                                        </div>
                                        <!-- End .price-box -->
                                        <div class="product-action">
                                            <div class="product-single-qty">
                                                <input class="horizontal-quantity form-control" type="text">
                                            </div>
                                            <!-- End .product-single-qty -->
                                            <button class="btn-icon btn-add-cart product-type-simple" data-toggle="modal" data-target="#addCartModal">
												<i class="icon-shopping-cart"></i>ADD TO CART</button>
                                        </div>
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                                <!-- product 2 -->
                                <div class="product-default inner-quickview inner-icon quantity-input">
                                    <figure>
                                        <a href="/porto/demo14-product.html">
                                            <img src="/porto/assets/images/demoes/demo14/products/product-5.jpg" width="280" height="280" alt="product">
                                            <img src="/porto/assets/images/demoes/demo14/products/product-5-2.jpg" width="280" height="280" alt="product">
                                        </a>
                                        <div class="label-group">
                                            <span class="product-label label-hot">HOT</span>
                                        </div>
                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-icon-wish">
                                                <i class="icon-heart"></i>
                                            </a>
                                        </div>
                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-list">
                                            <a href="/porto/demo14-shop.html" class="product-category">dress, shoes</a>
                                        </div>
                                        <h3 class="product-title"> <a href="/porto/demo14-product.html">Porto Evolution
												Headset</a> </h3>
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
                                            <a href="/porto/demo14-product.html" class="btn-icon btn-add-cart product-type-simple">
                                                <i class="fa fa-arrow-right"></i>SELECT OPTIONS</a>
                                        </div>
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                                <!-- product 3 -->
                                <div class="product-default inner-quickview inner-icon quantity-input">
                                    <figure>
                                        <a href="/porto/demo14-product.html">
                                            <img src="/porto/assets/images/demoes/demo14/products/product-6.jpg" width="280" height="280" alt="product">
                                        </a>
                                        <div class="label-group">
                                            <span class="product-label label-hot">HOT</span>
                                        </div>
                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-icon-wish">
                                                <i class="icon-heart"></i>
                                            </a>
                                        </div>
                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-list">
                                            <a href="/porto/demo14-shop.html" class="product-category">dress, shoes</a>
                                        </div>
                                        <h3 class="product-title"> <a href="/porto/demo14-product.html">Headphone Black</a>
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
                                        <div class="product-action">
                                            <div class="product-single-qty">
                                                <input class="horizontal-quantity form-control" type="text">
                                            </div>
                                            <!-- End .product-single-qty -->
                                            <button class="btn-icon btn-add-cart product-type-simple" data-toggle="modal" data-target="#addCartModal">
												<i class="icon-shopping-cart"></i>ADD TO CART</button>
                                        </div>
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                                <!-- product 4 -->
                                <div class="product-default inner-quickview inner-icon quantity-input">
                                    <figure>
                                        <a href="/porto/demo14-product.html">
                                            <img src="/porto/assets/images/demoes/demo14/products/product-7.jpg" width="280" height="280" alt="product">
                                        </a>
                                        <div class="label-group">
                                            <span class="product-label label-hot">HOT</span>
                                            <span class="product-label label-sale">-30%</span>
                                        </div>
                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-icon-wish">
                                                <i class="icon-heart"></i>
                                            </a>
                                        </div>
                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-list">
                                            <a href="/porto/demo14-shop.html" class="product-category">dress, shoes</a>
                                        </div>
                                        <h3 class="product-title"> <a href="/porto/demo14-product.html">Headphone Black</a>
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
                                        <div class="product-action">
                                            <div class="product-single-qty">
                                                <input class="horizontal-quantity form-control" type="text">
                                            </div>
                                            <!-- End .product-single-qty -->
                                            <button class="btn-icon btn-add-cart product-type-simple" data-toggle="modal" data-target="#addCartModal">
												<i class="icon-shopping-cart"></i>ADD TO CART</button>
                                        </div>
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                                <!-- product 5 -->
                                <div class="product-default inner-quickview inner-icon quantity-input">
                                    <figure>
                                        <a href="/porto/demo14-product.html">
                                            <img src="/porto/assets/images/demoes/demo14/products/product-9.jpg" width="280" height="280" alt="product">
                                        </a>
                                        <div class="label-group">
                                            <span class="product-label label-hot">HOT</span>
                                            <span class="product-label label-sale">-30%</span>
                                        </div>
                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-icon-wish">
                                                <i class="icon-heart"></i>
                                            </a>
                                        </div>
                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-list">
                                            <a href="/porto/demo14-shop.html" class="product-category">headphone, trousers</a>
                                        </div>
                                        <h3 class="product-title"> <a href="/porto/demo14-product.html">Porto Evolution
												Headset</a> </h3>
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
                                        <div class="product-action">
                                            <a href="/porto/demo14-product.html" class="btn-icon btn-add-cart product-type-simple">
                                                <i class="fa fa-arrow-right"></i>SELECT OPTIONS</a>
                                        </div>
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                            </div>
                            <!-- End .products-carousel -->
                        </div>
                        <!-- End .tab-pane -->
                    </div>
                    <!-- End .tab-content -->
                </div>
                <!-- End .container -->
            </div>
            <!-- End .home-product-tabs -->

            <div class="feature-boxes-container">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="feature-box mx-md-3 feature-box-simple text-center">
                                <i class="icon-earphones-alt"></i>

                                <div class="feature-box-content">
                                    <h3>Customer Support</h3>
                                    <h5>Need Assistance?</h5>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                                </div>
                                <!-- End .feature-box-content -->
                            </div>
                            <!-- End .feature-box -->
                        </div>
                        <!-- End .col-md-4 -->

                        <div class="col-md-4">
                            <div class="feature-box mx-md-3 feature-box-simple text-center">
                                <i class="icon-credit-card"></i>

                                <div class="feature-box-content">
                                    <h3>Secured Payment</h3>
                                    <h5>Safe &amp; Fast</h5>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapibus lacus. Lorem ipsum dolor sit amet.</p>
                                </div>
                                <!-- End .feature-box-content -->
                            </div>
                            <!-- End .feature-box -->
                        </div>
                        <!-- End .col-md-4 -->

                        <div class="col-md-4">
                            <div class="feature-box mx-md-3 feature-box-simple text-center">
                                <i class="icon-action-undo"></i>

                                <div class="feature-box-content">
                                    <h3>Returns</h3>
                                    <h5>Easy &amp; Free</h5>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                                </div>
                                <!-- End .feature-box-content -->
                            </div>
                            <!-- End .feature-box -->
                        </div>
                        <!-- End .col-md-4 -->
                    </div>
                    <!-- End .row -->
                </div>
                <!-- End .container -->
            </div>

            <div class="promo-section bg-gray" data-parallax="{'speed': 2, 'enableOnMobile': true}" data-image-src="/porto/assets/images/demoes/demo14/banners/promo-bg.png">
                <div class="promo-banner banner container text-uppercase">
                    <div class="banner-content row align-items-center text-center">
                        <div class="col-md-4 ml-xl-auto text-md-right left-text">
                            <h2 class="mb-md-0">Top electronic
                                <br>Deals</h2>
                        </div>
                        <div class="col-md-3 pb-4 pb-md-0">
                            <a href="#" class="btn btn-primary ls-10">View Sale</a>
                        </div>
                        <div class="col-md-4 mr-xl-auto text-md-left right-text">
                            <h4 class="mb-1 coupon-sale-text p-0 d-block text-transform-none">
                                <b class="bg-dark text-white font1">Exclusive COUPON</b>
                            </h4>
                            <h5 class="mb-2 coupon-sale-text ls-10 p-0">
                                <i class="ls-0">UP TO</i>
                                <b class="text-white bg-secondary">$100</b> OFF</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="brands-slider owl-carousel owl-theme images-center mt-4" data-owl-options="{
						'responsive': {
							'0': {
								'items': 1
							},
							'480': {
								'items': 2
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

                <hr class="mb-5">

                <div class="product-widgets row pt-1">
                    <div class="col-md-4 col-sm-6 pb-5">
                        <h4 class="section-sub-title text-uppercase">Top Rated Products</h4>
                        <!-- product-1 -->
                        <div class="product-default left-details product-widget mb-2">
                            <figure>
                                <a href="/porto/demo14-product.html">
                                    <img src="/porto/assets/images/demoes/demo14/products/small/1.jpg" width="175" height="175" alt="product">
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="/porto/demo14-shop.html" class="product-category">TOYS</a>,
                                    <a href="/porto/demo14-shop.html" class="product-category">WATCHES</a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo14-product.html">25 Acoustic Noise</a> </h3>
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
                        <!-- product-2 -->
                        <div class="product-default left-details product-widget mb-2">
                            <figure>
                                <a href="/porto/demo14-product.html">
                                    <img src="/porto/assets/images/demoes/demo14/products/small/2.jpg" width="175" height="175" alt="product">
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="/porto/demo14-shop.html" class="product-category">HEADPHONE</a>,
                                    <a href="/porto/demo14-shop.html" class="product-category">TROUSERS</a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo14-product.html">Porto Evolution Headset</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">5.00</span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$101.00 – $111.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <!-- product-3 -->
                        <div class="product-default left-details product-widget mb-2">
                            <figure>
                                <a href="/porto/demo14-product.html">
                                    <img src="/porto/assets/images/demoes/demo14/products/small/3.jpg" width="175" height="175" alt="product">
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="/porto/demo14-shop.html" class="product-category">TOYS</a>,
                                    <a href="/porto/demo14-shop.html" class="product-category">WAYCHES</a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo14-product.html">Porto Sticky info</a> </h3>
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
                                    <span class="product-price">$101.00 – $111.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 pb-5">
                        <h4 class="section-sub-title text-uppercase">Best Selling Products</h4>
                        <!-- product-4 -->
                        <div class="product-default left-details product-widget mb-2">
                            <figure>
                                <a href="/porto/demo14-product.html">
                                    <img src="/porto/assets/images/demoes/demo14/products/small/3.jpg" width="175" height="175" alt="product">
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="/porto/demo14-shop.html" class="product-category">TOYS</a>,
                                    <a href="/porto/demo14-shop.html" class="product-category">WAYCHES</a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo14-product.html">Porto Sticky info</a> </h3>
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
                                    <span class="product-price">$101.00 – $111.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <!-- product-5 -->
                        <div class="product-default left-details product-widget mb-2">
                            <figure>
                                <a href="/porto/demo14-product.html">
                                    <img src="/porto/assets/images/demoes/demo14/products/small/4.jpg" width="175" height="175" alt="product">
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="/porto/demo14-shop.html" class="product-category">HEADPHONE</a>,
                                    <a href="/porto/demo14-shop.html" class="product-category">WATCHES</a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo14-product.html">Porto Headset</a> </h3>
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
                                    <span class="product-price">$39.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <!-- product-6 -->
                        <div class="product-default left-details product-widget mb-2">
                            <figure>
                                <a href="/porto/demo14-product.html">
                                    <img src="/porto/assets/images/demoes/demo14/products/small/5.jpg" width="175" height="175" alt="product">
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="/porto/demo14-shop.html" class="product-category">TOYS</a>,
                                    <a href="/porto/demo14-shop.html" class="product-category">WATCHES</a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo14-product.html">Porto Both Sticky info</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">5.00</span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$101.00 – $108.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 pb-5">
                        <h4 class="section-sub-title text-uppercase">Latest Products</h4>
                        <!-- product-7 -->
                        <div class="product-default left-details product-widget mb-2">
                            <figure>
                                <a href="/porto/demo14-product.html">
                                    <img src="/porto/assets/images/demoes/demo14/products/small/6.jpg" width="175" height="175" alt="product">
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="/porto/demo14-shop.html" class="product-category">T-SHIRTS</a>,
                                    <a href="/porto/demo14-shop.html" class="product-category">WATCHES</a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo14-product.html">IdeaPad</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">5.00</span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->
                                <div class="price-box">
                                    <del class="old-price">$1,999.00</del>
                                    <span class="product-price">$1,699.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <!-- product-8 -->
                        <div class="product-default left-details product-widget mb-2">
                            <figure>
                                <a href="/porto/demo14-product.html">
                                    <img src="/porto/assets/images/demoes/demo14/products/small/5.jpg" width="175" height="175" alt="product">
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="/porto/demo14-shop.html" class="product-category">TOYS</a>,
                                    <a href="/porto/demo14-shop.html" class="product-category">WATCHES</a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo14-product.html">Porto Both Sticky info</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">5.00</span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$101.00 – $108.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <!-- product-9 -->
                        <div class="product-default left-details product-widget mb-2">
                            <figure>
                                <a href="/porto/demo14-product.html">
                                    <img src="/porto/assets/images/demoes/demo14/products/small/4.jpg" width="175" height="175" alt="product">
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="/porto/demo14-shop.html" class="product-category">HEADPHONE</a>,
                                    <a href="/porto/demo14-shop.html" class="product-category">WATCHES</a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo14-product.html">Porto Headset</a> </h3>
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
                                    <span class="product-price">$39.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>
                </div>
                <!-- End .product-widgets -->
            </div>
            <!-- End .container -->
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
