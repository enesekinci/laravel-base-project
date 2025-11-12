@extends('layouts.porto')

@section('footer')
    @include('porto.demo11.footer')
@endsection


@section('header')
    @include('porto.demo11.header')
@endsection

@section('content')
<div class="home-slider-container clearfix">
                <div class="home-slider slide-animate owl-carousel owl-theme show-nav-hover">
                    <div class="home-slide home-slide1 d-flex align-items-center banner">
                        <img class="slide-bg" src="/porto/assets/images/demoes/demo11/slider/slide-1.jpg" width="1920"
                            height="804" alt="banner" />
                        <!-- End .slide-bg -->
                        <div class="container">
                            <div class="banner-layer banner-layer-right float-right appear-animate"
                                data-animation-name="fadeInUpShorter">
                                <h2>New Season Dresses</h2>
                                <h3 class="text-uppercase rotated-upto-text mb-0"><small>Up to</small>50% off</h3>

                                <hr class="divider-short-thick">

                                <h5 class="text-uppercase d-inline-block mb-0 ls-n-20">Starting at
                                    <span>$<em>39</em>99</span></h5>
                                <a href="/porto/demo11-shop.html" class="btn btn-light btn-xl btn-icon-right"
                                    role="button">Shop
                                    Now <i class="fas fa-long-arrow-alt-right"></i></a>
                            </div><!-- End .banner-layer -->
                        </div>
                    </div><!-- End .home-slide -->

                    <div class="home-slide home-slide2 d-flex align-items-center banner">
                        <img class="slide-bg" src="/porto/assets/images/demoes/demo11/slider/slide-2.jpg" width="1920"
                            height="804" alt="banner" />
                        <!-- End .slide-bg -->
                        <div class="container">
                            <div class="banner-layer banner-layer-left float-left appear-animate"
                                data-animation-name="fadeInUpShorter">
                                <h2>New Season Hats</h2>
                                <h3 class="text-uppercase rotated-upto-text mb-0"><small>Up to</small>20% off</h3>

                                <hr class="divider-short-thick">

                                <h5 class="text-uppercase d-inline-block mb-0 ls-n-20">Starting at
                                    <span>$<em>19</em>99</span></h5>
                                <a href="/porto/demo11-shop.html" class="btn btn-light btn-xl btn-icon-right"
                                    role="button">Shop
                                    Now <i class="fas fa-long-arrow-alt-right"></i></a>
                            </div><!-- End .banner-layer -->
                        </div>
                    </div><!-- End .home-slide -->
                </div><!-- End .home-slider -->
            </div><!-- End .home-slider-container -->

            <div class="banners-container text-uppercase clear appear-animate" data-animation-name="fadeIn">
                <div class="container">
                    <div class="row row-joined">
                        <div class="banner col-md-4">
                            <div class="banner-content text-left">
                                <h3 class="banner-title mb-0">Sunglasses</h3>
                                <p>16 Products</p>
                                <hr class="divider-short-thick">

                                <a href="/porto/demo11-shop.html" class="btn">Shop now <i
                                        class="fas fa-long-arrow-alt-right"></i></a>
                            </div><!-- End .banner-content -->
                            <a href="#">
                                <img src="/porto/assets/images/demoes/demo11/banners/banner-1.jpg"
                                    style="background-color: #efefef;" alt="banner">
                            </a>
                        </div><!-- End .banner -->
                        <div class="banner col-md-4">
                            <div class="banner-content text-left">
                                <h3 class="banner-title m-b-1">Woman Shoes</h3>
                                <p>12 Products</p>
                                <hr class="divider-short-thick">

                                <a href="/porto/demo11-shop.html" class="btn">Shop now <i
                                        class="fas fa-long-arrow-alt-right"></i></a>
                            </div><!-- End .banner-content -->
                            <a href="#">
                                <img src="/porto/assets/images/demoes/demo11/banners/banner-2.jpg"
                                    style="background-color: #efefef;" alt="banner">
                            </a>
                        </div><!-- End .banner -->
                        <div class="banner col-md-4">
                            <div class="banner-content text-left">
                                <h3 class="banner-title m-b-1">Woman Bags</h3>
                                <p>38 Products</p>
                                <hr class="divider-short-thick">

                                <a href="/porto/demo11-shop.html" class="btn">Shop now <i
                                        class="fas fa-long-arrow-alt-right"></i></a>
                            </div><!-- End .banner-content -->
                            <a href="#">
                                <img src="/porto/assets/images/demoes/demo11/banners/banner-3.jpg"
                                    style="background-color: #efefef;" alt="banner">
                            </a>
                        </div><!-- End .banner -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .banners-container -->

            <div class="container mb-5">
                <div class="info-boxes-container appear-animate" data-animation-name="fadeIn">
                    <div class="row row-joined">
                        <div class="info-box info-box-icon-left col-lg-4">
                            <i class="icon-shipping"></i>

                            <div class="info-box-content">
                                <h4>FREE SHIPPING &amp; RETURN</h4>
                                <p>Free shipping on all orders over $99.</p>
                            </div><!-- End .info-box-content -->
                        </div><!-- End .info-box -->

                        <div class="info-box info-box-icon-left col-lg-4">
                            <i class="icon-money"></i>

                            <div class="info-box-content">
                                <h4>MONEY BACK GUARANTEE</h4>
                                <p>100% money back guarantee</p>
                            </div><!-- End .info-box-content -->
                        </div><!-- End .info-box -->

                        <div class="info-box info-box-icon-left col-lg-4">
                            <i class="icon-support"></i>

                            <div class="info-box-content">
                                <h4>ONLINE SUPPORT 24/7</h4>
                                <p>Lorem ipsum dolor sit amet.</p>
                            </div><!-- End .info-box-content -->
                        </div><!-- End .info-box -->
                    </div><!-- End .row -->
                </div><!-- End .info-boxes-container -->
            </div><!-- End .container -->

            <div class="container mb-4 mb-lg-6">
                <h2 class="section-title text-center appear-animate" data-animation-name="fadeInUpShorter"
                    data-animation-delay="200">Featured Products</h2>
                <p class="section-description text-center appear-animate" data-animation-name="fadeInUpShorter"
                    data-animation-delay="200">Amazing products added recently in our catalog</p>

                <div class="row product-ajax-grid appear-animate" data-animation-name="fadeInUpShorter"
                    data-animation-delay="400">
                    <div class="col-sm-3 col-6">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo11-product.html">
                                    <img src="/porto/assets/images/demoes/demo11/products/product-15.jpg" width="280"
                                        height="280" alt="product" />
                                    <img src="/porto/assets/images/demoes/demo11/products/product-15-2.jpg" width="280"
                                        height="280" alt="product" />
                                </a>
                                <div class="label-group">
                                    <div class="product-label label-sale">27%</div>
                                </div>
                                <div class="btn-icon-group">
                                    <a href="/porto/demo11-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo11-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo11-product.html">Women Fashion-Black</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="old-price">$90.00</span>
                                    <span class="product-price">$70.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div><!-- End .col-md-3 -->
                    <div class="col-sm-3 col-6">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo11-product.html">
                                    <img src="/porto/assets/images/demoes/demo11/products/product-16.jpg" width="280"
                                        height="280" alt="product" />
                                    <img src="/porto/assets/images/demoes/demo11/products/product-16-2.jpg" width="280"
                                        height="280" alt="product" />
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
                                        <a href="/porto/demo11-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo11-product.html">Men Glasses</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$60.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div><!-- End .col-md-3 -->
                    <div class="col-sm-3 col-6">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo11-product.html">
                                    <img src="/porto/assets/images/demoes/demo11/products/product-17.jpg" width="280"
                                        height="280" alt="product" />
                                    <img src="/porto/assets/images/demoes/demo11/products/product-17-2.jpg" width="280"
                                        height="280" alt="product" />
                                </a>
                                <div class="label-group">
                                    <div class="product-label label-sale">27%</div>
                                </div>
                                <div class="btn-icon-group">
                                    <a href="/porto/demo11-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo11-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo11-product.html">Ray Ban 5228</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="old-price">$75.00</span>
                                    <span class="product-price">$55.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div><!-- End .col-md-3 -->
                    <div class="col-sm-3 col-6">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo11-product.html">
                                    <img src="/porto/assets/images/demoes/demo11/products/product-18.jpg" width="280"
                                        height="280" alt="product" />
                                    <img src="/porto/assets/images/demoes/demo11/products/product-18-2.jpg" width="280"
                                        height="280" alt="product" />
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
                                        <a href="/porto/demo11-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo11-product.html">Masrinna Ankle Fashion</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="old-price">$60.00</span>
                                    <span class="product-price">$50.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div><!-- End .col-md-3 -->
                </div><!-- End .row -->

                <a class="btn btn-dark btn-lg btn-center loadmore" href="/porto/ajax/demo11-ajax-products.html">Load
                    More...</a>

                <hr class="mb-4 pb-1">

                <h2 class="section-title text-center appear-animate" data-animation-name="fadeIn"
                    data-animation-delay="100">Browse Categories</h2>
                <p class="section-description text-center appear-animate" data-animation-name="fadeIn"
                    data-animation-delay="100">Amazing categories with only top fashion products</p>

                <div class="owl-carousel owl-theme categories-slider content-center-bottom nav-outer appear-animate"
                    data-animation-name="fadeIn" data-animation-delay="100" data-owl-options="{
                    'nav': false,
                    'responsive': {
                        '0': {
                            'items': 1
                        },
                        '480': {
                            'items': 2
                        }
                    }
                }">
                    <div class="product-category">
                        <a href="/porto/demo11-shop.html">
                            <figure>
                                <img src="/porto/assets/images/demoes/demo11/categories/category-1.jpg" width="220"
                                    height="220" alt="Category" />
                            </figure>
                            <div class="category-content">
                                <h3>Bags</h3>
                            </div>
                        </a>
                    </div>
                    <div class="product-category">
                        <a href="/porto/demo11-shop.html">
                            <figure>
                                <img src="/porto/assets/images/demoes/demo11/categories/category-2.jpg" width="220"
                                    height="220" alt="Category" />
                            </figure>
                            <div class="category-content">
                                <h3>Hats</h3>
                            </div>
                        </a>
                    </div>
                    <div class="product-category">
                        <a href="/porto/demo11-shop.html">
                            <figure>
                                <img src="/porto/assets/images/demoes/demo11/categories/category-3.jpg" width="220"
                                    height="220" alt="Category" />
                            </figure>
                            <div class="category-content">
                                <h3>Jackets</h3>
                            </div>
                        </a>
                    </div>
                    <div class="product-category">
                        <a href="/porto/demo11-shop.html">
                            <figure>
                                <img src="/porto/assets/images/demoes/demo11/categories/category-4.jpg" width="220"
                                    height="220" alt="Category" />
                            </figure>
                            <div class="category-content">
                                <h3>Sunglasses</h3>
                            </div>
                        </a>
                    </div>
                    <div class="product-category">
                        <a href="/porto/demo11-shop.html">
                            <figure>
                                <img src="/porto/assets/images/demoes/demo11/categories/category-5.jpg" width="220"
                                    height="220" alt="Category" />
                            </figure>
                            <div class="category-content">
                                <h3>Shoes</h3>
                            </div>
                        </a>
                    </div>
                    <div class="product-category">
                        <a href="/porto/demo11-shop.html">
                            <figure>
                                <img src="/porto/assets/images/demoes/demo11/categories/category-1.jpg" width="220"
                                    height="220" alt="Category" />
                            </figure>
                            <div class="category-content">
                                <h3>Bags</h3>
                            </div>
                        </a>
                    </div>
                </div><!-- End .categories-slider -->
            </div><!-- End .container -->

            <div class="promo-section mb-5" data-parallax="{'speed': 1.5}"
                data-image-src="/porto/assets/images/demoes/demo11/banners/category-bg.jpg">
                <div class="promo-content">
                    <h2 class="m-b-1 appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200">
                        New Season Sale</h2>
                    <h3 class="mb-1 appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="400">40%
                        OFF</h3>
                    <hr class="divider-short-thick appear-animate" data-animation-name="fadeInUpShorter"
                        data-animation-delay="600">
                    <a href="/porto/demo11-shop.html" class="btn btn-light appear-animate"
                        data-animation-name="fadeInUpShorter" data-animation-delay="800">Shop Now <i
                            class="fas fa-long-arrow-alt-right ml-2 pl-1"></i></a>
                </div>
            </div><!-- End .promo-section -->

            <div class="container mb-2 mb-lg-4 appear-animate" data-animation-name="fadeIn" data-animation-delay="100">
                <h2 class="section-title text-center">Top Rated Products</h2>
                <p class="section-description text-center">Only the top rated products added recently in our
                    catalog</p>

                <div class="owl-carousel owl-theme pb-2 mb-2" data-owl-options="{
						'loop': false,
						'margin': 20,
						'autoHeight': true,
						'autoplay': false,
                        'items': 2,
                        'dots': false,
						'responsive': {
                            '0': {
								'items': 2
							},
							'576': {
								'items': 2
                            },
                            '768': {
								'items': 3
							}
						}
					}">
                    <div class="product-default inner-quickview inner-icon">
                        <figure>
                            <a href="/porto/demo11-product.html">
                                <img src="/porto/assets/images/demoes/demo11/products/product-19.jpg" width="380" height="380"
                                    alt="Product" />
                                <img src="/porto/assets/images/demoes/demo11/products/product-19-2.jpg" width="380"
                                    height="380" alt="Product" />
                            </a>
                            <div class="label-group">
                                <div class="product-label label-hot">HOT</div>
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
                                    <a href="/porto/demo11-shop.html" class="product-category">category</a>
                                </div>
                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                        class="icon-heart"></i></a>
                            </div>
                            <h3 class="product-title"> <a href="/porto/demo11-product.html">Product Brown Bag</a> </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div><!-- End .product-ratings -->
                            </div><!-- End .product-container -->
                            <div class="price-box">
                                <span class="old-price">$90.00</span>
                                <span class="product-price">$70.00</span>
                            </div><!-- End .price-box -->
                        </div><!-- End .product-details -->
                    </div>

                    <div class="product-default inner-quickview inner-icon">
                        <figure>
                            <a href="/porto/demo11-product.html">
                                <img src="/porto/assets/images/demoes/demo11/products/product-20.jpg" width="380" height="380"
                                    alt="Product" />
                                <img src="/porto/assets/images/demoes/demo11/products/product-20-2.jpg" width="380"
                                    height="380" alt="Product" />
                            </a>
                            <div class="btn-icon-group">
                                <a href="/porto/demo11-product.html" class="btn-icon btn-add-cart"><i
                                        class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                View</a>
                        </figure>
                        <div class="product-details">
                            <div class="category-wrap">
                                <div class="category-list">
                                    <a href="/porto/demo11-shop.html" class="product-category">category</a>
                                </div>
                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                        class="icon-heart"></i></a>
                            </div>
                            <h3 class="product-title"> <a href="/porto/demo11-product.html">Women Shoes</a> </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div><!-- End .product-ratings -->
                            </div><!-- End .product-container -->
                            <div class="price-box">
                                <span class="product-price">$60.00</span>
                            </div><!-- End .price-box -->
                        </div><!-- End .product-details -->
                    </div>

                    <div class="product-default inner-quickview inner-icon">
                        <figure>
                            <a href="/porto/demo11-product.html">
                                <img src="/porto/assets/images/demoes/demo11/products/product-21.jpg" width="380" height="380"
                                    alt="Product" />
                                <img src="/porto/assets/images/demoes/demo11/products/product-21-2.jpg" width="380"
                                    height="380" alt="Product" />
                            </a>
                            <div class="label-group">
                                <div class="product-label label-hot">HOT</div>
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
                                    <a href="/porto/demo11-shop.html" class="product-category">category</a>
                                </div>
                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                        class="icon-heart"></i></a>
                            </div>
                            <h3 class="product-title"> <a href="/porto/demo11-product.html">Women Dress</a> </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div><!-- End .product-ratings -->
                            </div><!-- End .product-container -->
                            <div class="price-box">
                                <span class="old-price">$75.00</span>
                                <span class="product-price">$55.00</span>
                            </div><!-- End .price-box -->
                        </div><!-- End .product-details -->
                    </div>
                </div>

                <hr class="mt-1 m-b-5">

                <div class="row">
                    <div class="col-md-4 pb-5 pb-md-0 appear-animate" data-animation-name="fadeIn"
                        data-animation-delay="200">
                        <h4 class="section-sub-title mb-2">Recently Added Products</h4>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo11-product.html">
                                    <img src="/porto/assets/images/demoes/demo11/products/small/product-1.jpg" width="68"
                                        height="69" alt="Product" />
                                    <img src="/porto/assets/images/demoes/demo11/products/small/product-1-2.jpg" width="68"
                                        height="69" alt="Product" />
                                </a>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/demo11-product.html">Product Short Name</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo11-product.html">
                                    <img src="/porto/assets/images/demoes/demo11/products/small/product-2.jpg" width="68"
                                        height="69" alt="Product" />
                                    <img src="/porto/assets/images/demoes/demo11/products/small/product-2-2.jpg" width="68"
                                        height="69" alt="Product" />
                                </a>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/demo11-product.html">Product Short Name</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">5.00</span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo11-product.html">
                                    <img src="/porto/assets/images/demoes/demo11/products/small/product-3.jpg" width="68"
                                        height="69" alt="Product" />
                                    <img src="/porto/assets/images/demoes/demo11/products/small/product-3-2.jpg" width="68"
                                        height="69" alt="Product" />
                                </a>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/demo11-product.html">Product Short Name</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div>
                    <div class="col-md-4 pb-5 pb-md-0 appear-animate" data-animation-name="fadeIn"
                        data-animation-delay="400">
                        <h4 class="section-sub-title mb-2">Best Selling Products</h4>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo11-product.html">
                                    <img src="/porto/assets/images/demoes/demo11/products/small/product-4.jpg" width="68"
                                        height="69" alt="Product" />
                                    <img src="/porto/assets/images/demoes/demo11/products/small/product-4-2.jpg" width="68"
                                        height="69" alt="Product" />
                                </a>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/demo11-product.html">Product Short Name</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">5.00</span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo11-product.html">
                                    <img src="/porto/assets/images/demoes/demo11/products/small/product-5.jpg" width="68"
                                        height="69" alt="Product" />
                                    <img src="/porto/assets/images/demoes/demo11/products/small/product-5-2.jpg" width="68"
                                        height="69" alt="Product" />
                                </a>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/demo11-product.html">Product Short Name</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo11-product.html">
                                    <img src="/porto/assets/images/demoes/demo11/products/small/product-6.jpg" width="68"
                                        height="69" alt="Product" />
                                    <img src="/porto/assets/images/demoes/demo11/products/small/product-6-2.jpg" width="68"
                                        height="69" alt="Product" />
                                </a>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/demo11-product.html">Product Short Name</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">5.00</span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div>
                    <div class="col-md-4 pb-5 pb-md-0 appear-animate" data-animation-name="fadeIn"
                        data-animation-delay="600">
                        <h4 class="section-sub-title mb-2">Featured Products</h4>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo11-product.html">
                                    <img src="/porto/assets/images/demoes/demo11/products/small/product-7.jpg" width="68"
                                        height="69" alt="Product" />
                                    <img src="/porto/assets/images/demoes/demo11/products/small/product-7-2.jpg" width="68"
                                        height="69" alt="Product" />
                                </a>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/demo11-product.html">Product Short Name</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo11-product.html">
                                    <img src="/porto/assets/images/demoes/demo11/products/small/product-8.jpg" width="68"
                                        height="69" alt="Product" />
                                    <img src="/porto/assets/images/demoes/demo11/products/small/product-8-2.jpg" width="68"
                                        height="69" alt="Product" />
                                </a>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/demo11-product.html">Product Short Name</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">5.00</span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo11-product.html">
                                    <img src="/porto/assets/images/demoes/demo11/products/small/product-9.jpg" width="68"
                                        height="69" alt="Product" />
                                    <img src="/porto/assets/images/demoes/demo11/products/small/product-9-2.jpg" width="68"
                                        height="69" alt="Product" />
                                </a>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/demo11-product.html">Product Short Name</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div>
                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="blog-section">
                <div class="container text-center">
                    <h2 class="section-title text-center appear-animate" data-animation-name="fadeInUpShorter"
                        data-animation-delay="200">FROM THE BLOG</h2>
                    <p class="section-description text-center mb-3 mb-lg-5 appear-animate"
                        data-animation-name="fadeInUpShorter" data-animation-delay="200">Only the latest news from us,
                        stay tuned.
                    </p>

                    <div class="owl-carousel owl-theme mb-4 pb-2 text-left appear-animate"
                        data-animation-name="fadeInUpShorter" data-animation-delay="500" data-owl-options="{
						'loop': false,
						'margin': 20,
						'autoHeight': true,
						'autoplay': false,
                        'items': 2,
                        'dots': false,
						'responsive': {
                            '0': {
								'items': 1
							},
							'576': {
								'items': 2
							}
						}
					}">
                        <article class="post">
                            <div class="post-media">
                                <a href="/porto/single.html">
                                    <img src="/porto/assets/images/demoes/demo11/blog/home/post-1.jpg" alt="Post" width="225"
                                        height="280">
                                </a>
                            </div><!-- End .post-media -->

                            <div class="post-body">
                                <h2 class="post-title">
                                    <a href="/porto/single.html">Fashion News</a>
                                </h2>
                                <div class="post-date">27-FEB-2018</div><!-- End .post-date -->
                                <div class="post-content">
                                    <p>Quisque elementum nibh at dolor pellentesque, a eleifend libero... </p>

                                    <a href="/porto/single.html" class="read-more">Read More<i
                                            class="fas fa-long-arrow-alt-right ml-1"></i></a>
                                </div><!-- End .post-content -->
                            </div><!-- End .post-body -->
                        </article><!-- End .post -->

                        <article class="post">
                            <div class="post-media">
                                <a href="/porto/single.html">
                                    <img src="/porto/assets/images/demoes/demo11/blog/home/post-2.jpg" alt="Post" width="225"
                                        height="280">
                                </a>
                            </div><!-- End .post-media -->

                            <div class="post-body">
                                <h2 class="post-title">
                                    <a href="/porto/single.html">Trends of Spring</a>
                                </h2>
                                <div class="post-date">27-FEB-2018</div><!-- End .post-date -->
                                <div class="post-content">
                                    <p>Quisque elementum nibh at dolor pellentesque, a eleifend libero... </p>

                                    <a href="/porto/single.html" class="read-more">Read More<i
                                            class="fas fa-long-arrow-alt-right ml-1"></i></a>
                                </div><!-- End .post-content -->
                            </div><!-- End .post-body -->
                        </article><!-- End .post -->

                        <article class="post">
                            <div class="post-media">
                                <a href="/porto/single.html">
                                    <img src="/porto/assets/images/demoes/demo11/blog/home/post-3.jpg" alt="Post" width="225"
                                        height="280">
                                </a>
                            </div><!-- End .post-media -->

                            <div class="post-body">
                                <h2 class="post-title">
                                    <a href="/porto/single.html">Women News</a>
                                </h2>
                                <div class="post-date">27-FEB-2018</div><!-- End .post-date -->
                                <div class="post-content">
                                    <p>Quisque elementum nibh at dolor pellentesque, a eleifend libero... </p>

                                    <a href="/porto/single.html" class="read-more">Read More<i
                                            class="fas fa-long-arrow-alt-right ml-1"></i></a>
                                </div><!-- End .post-content -->
                            </div><!-- End .post-body -->
                        </article><!-- End .post -->
                    </div>

                    <a class="btn btn-dark btn-lg appear-animate" data-animation-name="fadeInUpShorter"
                        data-animation-delay="700" href="/porto/blog.html">Our Blog</a>
                </div><!-- End .container -->
            </div><!-- End .blog-section -->

            <div class="brands-section appear-animate" data-animation-name="fadeIn" data-animation-delay="400">
                <div class="container">
                    <div class="brands-slider owl-carousel owl-theme images-center" data-owl-options="{
                        'loop': false,
                        'margin': 0
                    }">
                        <img src="/porto/assets/images/brands/small/brand1.png" width="140" height="60" alt="brand">
                        <img src="/porto/assets/images/brands/small/brand2.png" width="140" height="60" alt="brand">
                        <img src="/porto/assets/images/brands/small/brand3.png" width="140" height="60" alt="brand">
                        <img src="/porto/assets/images/brands/small/brand4.png" width="140" height="60" alt="brand">
                        <img src="/porto/assets/images/brands/small/brand5.png" width="140" height="60" alt="brand">
                        <img src="/porto/assets/images/brands/small/brand6.png" width="140" height="60" alt="brand">
                    </div><!-- End .brands-slider -->
                </div><!-- End. container-->
            </div><!-- End .brands-section -->
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
