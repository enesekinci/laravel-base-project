@extends('layouts.porto')

@section('footer')
    @include('components.porto.demo30.footer')
@endsection


@section('header')
    @include('components.porto.demo30.header')
@endsection

@section('content')
<div class="container">
                <section class="mb-2">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="home-banner">
                                <div class="row m-0">
                                    <div
                                        class="col-sm-6 p-0 pr-sm-2 d-flex align-items-center justify-content-center justify-content-lg-end text-center text-sm-right">
                                        <div class="banner-content appear-animate" data-animation-name="fadeInUpShorter"
                                            data-animation-delay="200">
                                            <span>An entire week to enjoy all offers</span>
                                            <h3 class="ls-0">The Week</h3>
                                            <h4 class="ls-0">Gift Shop</h4>
                                            <a href="/porto/demo30-shop.html" class="btn">SHOP NOW</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 p-0">
                                        <div class="owl-carousel owl-theme dots-small pb-5 pb-lg-0" data-toggle="owl"
                                            data-owl-options="{
                                            'items': 1,
                                            'margin': 0,
                                            'nav': false,
                                            'dots': true
                                        }">
                                            <div class="product-default pt-5">
                                                <figure>
                                                    <a href="/porto/demo30-product.html">
                                                        <img src="/porto/assets/images/demoes/demo30/products/400x300/product-10.jpg"
                                                            width="280" height="280" alt="Product" />
                                                        <img src="/porto/assets/images/demoes/demo30/products/400x300/product-4.jpg"
                                                            width="280" height="280" alt="Product" />
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h3 class="product-title"> <a href="/porto/demo30-product.html">Ceramic
                                                            Panda Mug</a> </h3>
                                                    <div class="price-box">
                                                        <span class="old-price">$59.00</span>
                                                        <span class="product-price">$49.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-default pt-5">
                                                <figure>
                                                    <a href="/porto/demo30-product.html">
                                                        <img src="/porto/assets/images/demoes/demo30/products/400x300/product-6.jpg"
                                                            width="280" height="280" alt="Product" />
                                                        <img src="/porto/assets/images/demoes/demo30/products/400x300/product-8.jpg"
                                                            width="280" height="280" alt="Product" />
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h3 class="product-title"> <a href="/porto/demo30-product.html">USB
                                                            Memories</a> </h3>
                                                    <div class="price-box">
                                                        <span class="old-price">$59.00</span>
                                                        <span class="product-price">$49.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-default pt-5">
                                                <figure>
                                                    <a href="/porto/demo30-product.html">
                                                        <img src="/porto/assets/images/demoes/demo30/products/400x300/product-2.jpg"
                                                            width="280" height="280" alt="Product" />
                                                        <img src="/porto/assets/images/demoes/demo30/products/400x300/product-5.jpg"
                                                            width="280" height="280" alt="Product" />
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h3 class="product-title"> <a href="/porto/demo30-product.html">Sugar</a>
                                                    </h3>
                                                    <div class="price-box">
                                                        <span class="old-price">$59.00</span>
                                                        <span class="product-price">$49.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="home-banner2 text-center">
                                <h3 class="mb-0">Flash Sale Running!</h3>
                                <div class="banner-content">
                                    <div class="product-panel">
                                        <div class="product-default mt-0">
                                            <figure class="mb-0">
                                                <a href="/porto/demo30-product.html">
                                                    <img src="/porto/assets/images/demoes/demo30/products/400x400/product-1.jpg"
                                                        width="280" height="280" alt="Product" />
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <h3 class="product-title"> <a href="/porto/demo30-product.html">Teddy Bear
                                                        Blue</a> </h3>
                                                <div class="price-box">
                                                    <span class="old-price">$59.00</span>
                                                    <span class="product-price">$49.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="/porto/demo30-shop.html" class="btn">SHOP SALE NOW</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="home-banner3 text-center"
                                style="background-image: url('/porto/assets/images/demoes/demo30/banners/banner3.jpg');">
                                <h3 class="ls-10">Gift Finder<br><span>Find the Perfect Gift</span></h3>
                                <div class="select-box">
                                    <div class="select-custom">
                                        <select class="form-control">
                                            <option selected="" hidden="">Price Range</option>
                                            <option>0 - 100</option>
                                            <option>100 - 200</option>
                                            <option>200 - 500</option>
                                        </select>
                                    </div>
                                    <div class="select-custom">
                                        <select class="form-control">
                                            <option selected="" hidden="">By color</option>
                                            <option>Red</option>
                                            <option>Green</option>
                                            <option>Blue</option>
                                        </select>
                                    </div>
                                    <div class="select-custom">
                                        <select class="form-control">
                                            <option selected="" hidden="">By size</option>
                                            <option>L</option>
                                            <option>M</option>
                                            <option>X</option>
                                            <option>XL</option>
                                        </select>
                                    </div>
                                </div>
                                <a href="/porto/demo30-shop.html" class="btn btn-primary">VIEW SUGGESTIONS</a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 appear-animate" data-animation-name="fadeInUpShorter"
                            data-animation-delay="200">
                            <div class="home-banner4 mb-2"
                                style="background-image: url('/porto/assets/images/demoes/demo30/banners/home-banner1.jpg');">
                                <div class="banner-content">
                                    <h3>GIFTS $10</h3>
                                    <span>& under</span>
                                    <a href="/porto/demo30-shop.html">SHOP NOW</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 appear-animate" data-animation-name="fadeInUpShorter"
                            data-animation-delay="400">
                            <div class="home-banner4 mb-2"
                                style="background-image: url('/porto/assets/images/demoes/demo30/banners/home-banner2.jpg');">
                                <div class="banner-content">
                                    <h3>GIFTS $20</h3>
                                    <span>& under</span>
                                    <a href="/porto/demo30-shop.html">SHOP NOW</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 appear-animate" data-animation-name="fadeInUpShorter"
                            data-animation-delay="600">
                            <div class="home-banner4 mb-2"
                                style="background-image: url('/porto/assets/images/demoes/demo30/banners/home-banner3.jpg');">
                                <div class="banner-content">
                                    <h3>GIFTS $50</h3>
                                    <span>& under</span>
                                    <a href="/porto/demo30-shop.html">SHOP NOW</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 appear-animate" data-animation-name="fadeInUpShorter"
                            data-animation-delay="800">
                            <div class="home-banner4 mb-2"
                                style="background-image: url('/porto/assets/images/demoes/demo30/banners/home-banner4.jpg');">
                                <div class="banner-content">
                                    <h3>GIFTS $99</h3>
                                    <span>& under</span>
                                    <a href="/porto/demo30-shop.html">SHOP NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="product-panel appear-animate" data-animation-name="fadeInUpShorter"
                    data-animation-delay="200">
                    <div class="section-title">
                        <h2 class="ls-0">Best Selling Gifts</h2>
                    </div>
                    <div class="product-intro owl-carousel owl-theme" data-toggle="owl" data-owl-options="{
                        'margin': 20,
                        'items': 2,
                        'autoplayTimeout': 5000,
                        'responsive': {
                            '559': {
                                'items': 3
                            },
                            '975': {
                                'items': 4
                            }
                        }
                    }">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo30-product.html">
                                    <img src="/porto/assets/images/demoes/demo30/products/400x400/product-9.jpg" width="280"
                                        height="280" alt="Product" />
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
                                        <a href="/porto/demo30-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo30-product.html">USB Memories</a>
                                </h3>
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
                                <a href="/porto/demo30-product.html">
                                    <img src="/porto/assets/images/demoes/demo30/products/400x400/product-8.jpg" width="280"
                                        height="280" alt="Product" />
                                </a>

                                <div class="btn-icon-group">
                                    <a href="/porto/demo30-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo30-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo30-product.html">Black Cup</a>
                                </h3>
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
                                <a href="/porto/demo30-product.html">
                                    <img src="/porto/assets/images/demoes/demo30/products/400x400/product-7.jpg" width="280"
                                        height="280" alt="Product" />
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
                                        <a href="/porto/demo30-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo30-product.html">Teddy Bear Blue</a>
                                </h3>
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
                                <a href="/porto/demo30-product.html">
                                    <img src="/porto/assets/images/demoes/demo30/products/400x400/product-4.jpg" width="280"
                                        height="280" alt="Product" />
                                </a>

                                <div class="btn-icon-group">
                                    <a href="/porto/demo30-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo30-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo30-product.html">Clasp Knife</a>
                                </h3>
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
                                <a href="/porto/demo30-product.html">
                                    <img src="/porto/assets/images/demoes/demo30/products/400x400/product-1.jpg" width="280"
                                        height="280" alt="Product" />
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
                                        <a href="/porto/demo30-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo30-product.html">Fountain Pen</a>
                                </h3>
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
            </div>

            <section class="bg-gray pt-5 pb-5 appear-animate" data-animation-name="fadeIn" data-animation-delay="100">
                <div class="container mt-1 mb-1">
                    <div class="row">
                        <div class="col-md-4 mb-md-0 mb-2">
                            <div class="home-banner5" style="color: #d66a79">
                                <div class="banner-background"
                                    style="background-image: url('/porto/assets/images/demoes/demo30/banners/home-banner5.jpg');">

                                    <div class="banner-content">
                                        <span>Shop Gifts</span>
                                        <h3>For Her</h3>
                                        <a href="/porto/demo30-shop.html" class="btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-md-0 mb-2">
                            <div class="home-banner5" style="color: #293871">
                                <div class="banner-background"
                                    style="background-image: url('/porto/assets/images/demoes/demo30/banners/home-banner6.jpg');">

                                    <div class="banner-content">
                                        <span>Shop Gifts</span>
                                        <h3>For Him</h3>
                                        <a href="/porto/demo30-shop.html" class="btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="home-banner5" style="color: #c6a99b">
                                <div class="banner-background"
                                    style="background-image: url('/porto/assets/images/demoes/demo30/banners/home-banner7.jpg');">

                                    <div class="banner-content">
                                        <span>Shop Gifts</span>
                                        <h3>For Kids</h3>
                                        <a href="/porto/demo30-shop.html" class="btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="container">
                <section class="info-section mt-3 mb-3 row row-joined appear-animate"
                    data-animation-name="fadeInUpShorter" data-animation-delay="200">
                    <div class="col-sm-4">
                        <div class="info-box info-box-icon-left">
                            <i class="icon-shipping"></i>

                            <div class="info-box-content">
                                <h4>FREE SHIPPING &amp; RETURN</h4>
                                <p>Free shipping on all orders over $99.</p>
                            </div><!-- End .info-box-content -->
                        </div><!-- End .info-box -->
                    </div>

                    <div class="col-sm-4">
                        <div class="info-box info-box-icon-left">
                            <i class="icon-money"></i>

                            <div class="info-box-content">
                                <h4>MONEY BACK GUARANTEE</h4>
                                <p>100% money back guarantee</p>
                            </div><!-- End .info-box-content -->
                        </div><!-- End .info-box -->
                    </div>

                    <div class="col-sm-4">
                        <div class="info-box info-box-icon-left">
                            <i class="icon-support"></i>

                            <div class="info-box-content">
                                <h4>ONLINE SUPPORT 24/7</h4>
                                <p>Lorem ipsum dolor sit amet.</p>
                            </div><!-- End .info-box-content -->
                        </div><!-- End .info-box -->
                    </div>
                </section>

                <section class="product-panel pt-3 mb-1 pb-1 appear-animate" data-animation-name="fadeInUpShorter"
                    data-animation-delay="400">
                    <div class="section-title">
                        <h2 class="ls-0">Our Recommendations</h2>
                    </div>
                    <div class="product-intro owl-carousel owl-theme" data-toggle="owl" data-owl-options="{
                        'margin': 20,
                        'items': 2,
                        'autoplayTimeout': 5000,
                        'responsive': {
                            '559': {
                                'items': 3
                            },
                            '975': {
                                'items': 4
                            }
                        }
                    }">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo30-product.html">
                                    <img src="/porto/assets/images/demoes/demo30/products/400x400/product-5.jpg" width="280"
                                        height="280" alt="Product" />
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
                                        <a href="/porto/demo30-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo30-product.html">Product Name</a> </h3>
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
                                <a href="/porto/demo30-product.html">
                                    <img src="/porto/assets/images/demoes/demo30/products/400x400/product-6.jpg" width="280"
                                        height="280" alt="Product" />
                                </a>

                                <div class="btn-icon-group">
                                    <a href="/porto/demo30-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo30-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo30-product.html">USB Memories</a> </h3>
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
                                <a href="/porto/demo30-product.html">
                                    <img src="/porto/assets/images/demoes/demo30/products/400x400/product-3.jpg" width="280"
                                        height="280" alt="Product" />
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
                                        <a href="/porto/demo30-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo30-product.html">Tea Cup</a> </h3>
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
                                <a href="/porto/demo30-product.html">
                                    <img src="/porto/assets/images/demoes/demo30/products/400x400/product-2.jpg" width="280"
                                        height="280" alt="Product" />
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
                                        <a href="/porto/demo30-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo30-product.html">Product Short Name</a> </h3>
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
                                <a href="/porto/demo30-product.html">
                                    <img src="/porto/assets/images/demoes/demo30/products/400x400/product-1.jpg" width="280"
                                        height="280" alt="Product" />
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
                                        <a href="/porto/demo30-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo30-product.html">Sugar</a> </h3>
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
            </div>
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
