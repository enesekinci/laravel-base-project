@extends('layouts.porto')

@section('footer')
    @include('components.porto.footer-demo32')
@endsection


@section('header')
    @include('components.porto.header-demo32')
@endsection

@section('content')
<div class="top-slider owl-carousel owl-theme slide-animate show-nav-hover" data-toggle="owl"
                data-owl-options="{
                'items' : 1,
                'margin' : 0,
                'nav': true,
                'navText': [ '<i class=icon-left-open-big>', '<i class=icon-right-open-big>' ],
                'dots': false
            }">
                <div class="home-slide home-slide1"
                    style="background-image: url('/porto/assets/images/demoes/demo32/slider/home_slider1.jpg'); background-position: 60%;">
                    <div class="slide-content content-left">
                        <div class="divide-txt mb-0 appear-animate" data-animation-name="fadeInUpShorter"
                            data-animation-delay="100">
                            <span class="font2">New Brown Collection</span>
                        </div>
                        <h2 class="appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="300">
                            Summer Sale</h2>
                        <h3 class=" appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="500">30%
                            OFF</h3>
                        <div class="image-info-group appear-animate" data-animation-name="fadeInUpShorter"
                            data-animation-delay="700">
                            <h5>STARTING AT <span><sup>$</sup>39<sup>99</sup></span></h5>
                            <a href="/porto/demo32-shop.html" class="btn">GET YOURS!</a>
                        </div>
                    </div>
                </div>
                <div class="home-slide home-slide2"
                    style="background-image: url('/porto/assets/images/demoes/demo32/slider/home_slider2.jpg');">
                    <div class="slide-content content-right">
                        <div class="divide-txt no-txt appear-animate" data-animation-name="fadeInUpShorter"
                            data-animation-delay="100">
                            <div class="divide-line"></div>
                        </div>
                        <h2 class="appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="300">
                            Must Have</h2>
                        <h3 class="appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="500">
                            SANDALS</h3>
                        <div class="image-info-group appear-animate" data-animation-name="fadeInUpShorter"
                            data-animation-delay="700">
                            <h5>STARTING AT <span><sup>$</sup>19<sup>99</sup></span></h5>
                            <a href="/porto/demo32-shop.html" class="btn">GET YOURS!</a>
                        </div>
                    </div>
                </div>
            </div>

<div class="container">
                <section class="featured-section text-center appear-animate" data-animation-name="fadeIn"
                    data-animation-delay="100">
                    <div class="section-title">
                        <div class="divide-txt">
                            <div class="divide-line"></div>
                            <span><strong>Featured</strong> Products</span>
                            <div class="divide-line"></div>
                        </div>
                        <h3 class="section-subtitle">Amazing products added recently in our catalog</h3>
                    </div>

                    <div class="row text-left product-ajax-grid">
                        <div class="col-6 col-md-3">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo32-product.html">
                                        <img src="/porto/assets/images/demoes/demo32/products/product-4.jpg" width="265"
                                            height="265" alt="Product" />
                                    </a>

                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart"
                                            class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                        title="Quick View">Quick View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo32-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title"> <a href="/porto/demo32-product.html">Light Brown Shoes</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="old-price">$59.00</span>
                                        <span class="product-price">$49.00</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo32-product.html">
                                        <img src="/porto/assets/images/demoes/demo32/products/product-5.jpg" width="265"
                                            height="265" alt="Product" />
                                    </a>

                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart"
                                            class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                        title="Quick View">Quick View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo32-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title"> <a href="/porto/demo32-product.html">Brown Shoes</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="old-price">$59.00</span>
                                        <span class="product-price">$49.00</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo32-product.html">
                                        <img src="/porto/assets/images/demoes/demo32/products/product-8.jpg" width="265"
                                            height="265" alt="Product" />
                                    </a>

                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart"
                                            class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                        title="Quick View">Quick View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo32-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title"> <a href="/porto/demo32-product.html">Yellow Men Shoes</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="old-price">$59.00</span>
                                        <span class="product-price">$49.00</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo32-product.html">
                                        <img src="/porto/assets/images/demoes/demo32/products/product-12.jpg" width="265"
                                            height="265" alt="Product" />
                                    </a>

                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart"
                                            class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                        title="Quick View">Quick View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo32-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title"> <a href="/porto/demo32-product.html">Black Shoes</a> </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="old-price">$59.00</span>
                                        <span class="product-price">$49.00</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                    </div>
                </section>

                <section class="category-section text-center appear-animate" data-animation-name="fadeIn"
                    data-animation-delay="100">
                    <div class="section-title">
                        <div class="divide-txt">
                            <div class="divide-line"></div>
                            <span><strong>Summer</strong> Collection</span>
                            <div class="divide-line"></div>
                        </div>
                        <h3 class="section-subtitle">Amazing products added recently in our catalog</h3>
                    </div>

                    <div class="row grid">
                        <div class="grid-item col-lg-6">
                            <div class="product-category">
                                <a href="/porto/demo32-shop.html">
                                    <figure>
                                        <img src="/porto/assets/images/demoes/demo32/banners/home-banner1.jpg" width="265"
                                            height="265" alt="Category Banner" />
                                    </figure>

                                    <div class="category-content content-right">
                                        <h3>Sport<br>Shoes</h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="grid-item col-6 col-lg-3 height-x1">
                            <div class="product-category">
                                <a href="/porto/demo32-shop.html">
                                    <figure>
                                        <img src="/porto/assets/images/demoes/demo32/banners/banner-dark.jpg" width="265"
                                            height="265" alt="Category Banner" />
                                    </figure>

                                    <div class="category-content content-white">
                                        <h3>For Her</h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="grid-item col-6 col-lg-3 height-x1">
                            <div class="product-category">
                                <a href="/porto/demo32-shop.html">
                                    <figure>
                                        <img src="/porto/assets/images/demoes/demo32/products/product-9.jpg" width="265"
                                            height="265" alt="Category Banner" />
                                    </figure>
                                </a>
                            </div>
                        </div>
                        <div class="grid-item col-6 col-lg-3 height-x1">
                            <div class="product-category">
                                <a href="/porto/demo32-shop.html">
                                    <figure>
                                        <img src="/porto/assets/images/demoes/demo32/banners/banner-dark.jpg" width="265"
                                            height="265" alt="Category Banner" />
                                    </figure>

                                    <div class="category-content content-white">
                                        <h3>For Him</h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="grid-item col-6 col-lg-3 height-x1">
                            <div class="product-category">
                                <a href="/porto/demo32-shop.html">
                                    <figure>
                                        <img src="/porto/assets/images/demoes/demo32/products/product-11.jpg" width="265"
                                            height="265" alt="Category Banner" />
                                    </figure>
                                </a>
                            </div>
                        </div>
                        <div class="col-1 grid-col-sizer"></div>
                    </div>
                </section>

                <section class="best-product-section appear-animate" data-animation-name="fadeIn"
                    data-animation-delay="100">
                    <div class="section-title">
                        <div class="divide-txt">
                            <div class="divide-line"></div>
                            <span><strong>Best Seller</strong> Products</span>
                            <div class="divide-line"></div>
                        </div>
                        <h3 class="section-subtitle">Only the best seller products added recently in our catalog</h3>
                    </div>

                    <div class="product-panel owl-carousel owl-theme show-nav-hover mb-0" data-toggle="owl"
                        data-owl-options="{
                        'margin' : 20,
                        'items' : 2,
                        'nav' : true,
                        'dots' : false,
                        'navText': [ '<i class=icon-left-open-big>', '<i class=icon-right-open-big>' ],
                        'responsive' : {
                            '768' : {
                                'items' : 3
                            }
                        }
                    }">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo32-product.html">
                                    <img src="/porto/assets/images/demoes/demo32/products/product-14.jpg" width="360"
                                        height="360" alt="Product" />
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
                                        <a href="/porto/demo32-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo32-product.html">Yellow Sports Shoes</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="old-price">$59.00</span>
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo32-product.html">
                                    <img src="/porto/assets/images/demoes/demo32/products/product-4.jpg" width="360"
                                        height="360" alt="Product" />
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
                                        <a href="/porto/demo32-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo32-product.html">Light Brown Shoes</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="old-price">$59.00</span>
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo32-product.html">
                                    <img src="/porto/assets/images/demoes/demo32/products/product-12.jpg" width="360"
                                        height="360" alt="Product" />
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
                                        <a href="/porto/demo32-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo32-product.html">Black Sports Shoes</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="old-price">$59.00</span>
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo32-product.html">
                                    <img src="/porto/assets/images/demoes/demo32/products/product-13.jpg" width="360"
                                        height="360" alt="Product" />
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
                                        <a href="/porto/demo32-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo32-product.html">Low Shoes</a> </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="old-price">$59.00</span>
                                    <span class="product-price">$49.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div>
                </section>

                <div class="partners-carousel owl-carousel owl-theme appear-animate" data-animation-name="fadeIn"
                    data-animation-delay="100" data-toggle="owl" data-owl-options="{
                    'margin' : 0,
                    'nav' : false,
                    'dots' : false,
                    'loop' : false,
                    'items' : 2,
                    'responsive' : {
                        '576' : {
                            'items' : 3
                        },
                        '768' : {
                            'items' : 4
                        },
                        '992' : {
                            'items' : 5
                        },
                        '1200' : {
                            'items' : 6
                        }
                    }
                }" data-appear-animation="fadeIn" data-appear-animation-delay="0" data-appear-animation-duration="1s">
                    <img src="/porto/assets/images/brands/small/brand1.png" alt="logo image" width="140" height="60">
                    <img src="/porto/assets/images/brands/small/brand2.png" alt="logo image" width="140" height="60">
                    <img src="/porto/assets/images/brands/small/brand3.png" alt="logo image" width="140" height="60">
                    <img src="/porto/assets/images/brands/small/brand4.png" alt="logo image" width="140" height="60">
                    <img src="/porto/assets/images/brands/small/brand5.png" alt="logo image" width="140" height="60">
                    <img src="/porto/assets/images/brands/small/brand6.png" alt="logo image" width="140" height="60">
                </div>
            </div>
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
