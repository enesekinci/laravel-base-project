@extends('layouts.porto')

@section('top-notice')
    @include('components.porto.demo33.top-notice')
@endsection

@section('header')
    @include('components.porto.demo33.header')
@endsection

@section('footer')
    @include('components.porto.demo33.footer')
@endsection

@section('content')
<div class="banner home-slide1 caty-banner">
                <figure>
                    <img src="/porto/assets/images/demoes/demo33/banners/category-banner.jpg" width="1903" height="300"
                        alt="banner">
                </figure>
                <div class="banner-layer banner-layer-middle">
                    <h2 class="ls-n-20">Spring / Summer Season</h2>
                    <h3>
                        <em class="text-center ls-0">up
                            <br>to</em>50% OFF</h3>
                    <h4 class="text-uppercase d-inline-block mb-0 align-top pt-2">Starting at
                        <span class="text-primary">$
                            <em>19</em>99</span>
                    </h4>
                    <a href="/porto/demo33-shop.html" class="btn btn-dark btn-outline btn-xl mt-1">Shop Now</a>
                </div>
                <!-- End .banner-layer -->
            </div>

            <div class="container">
                <nav aria-label="breadcrumb" class="breadcrumb-nav">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/porto/demo33.html">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">shop</li>
                    </ol>
                </nav>
                <div class="row">
                    <div class="col-lg-9 main-content">
                        <nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
                            <div class="toolbox-left">
                                <a href="#" class="sidebar-toggle">
                                    <svg data-name="Layer 3" id="Layer_3" viewBox="0 0 32 32"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
                                        <line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
                                        <line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
                                        <line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
                                        <line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
                                        <line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
                                        <path
                                            d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z"
                                            class="cls-2"></path>
                                        <path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                                        <path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
                                        <path
                                            d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z"
                                            class="cls-2"></path>
                                    </svg>
                                    <span>Filter</span>
                                </a>

                                <div class="toolbox-item toolbox-sort">
                                    <label>Sort By:</label>

                                    <div class="select-custom">
                                        <select name="orderby" class="form-control">
                                            <option value="menu_order" selected="selected">Default sorting</option>
                                            <option value="popularity">Sort by popularity</option>
                                            <option value="rating">Sort by average rating</option>
                                            <option value="date">Sort by newness</option>
                                            <option value="price">Sort by price: low to high</option>
                                            <option value="price-desc">Sort by price: high to low</option>
                                        </select>
                                    </div>
                                    <!-- End .select-custom -->


                                </div>
                                <!-- End .toolbox-item -->
                            </div>
                            <!-- End .toolbox-left -->

                            <div class="toolbox-right">
                                <div class="toolbox-item toolbox-show">
                                    <label>Show:</label>

                                    <div class="select-custom">
                                        <select name="count" class="form-control">
                                            <option value="12">12</option>
                                            <option value="24">24</option>
                                            <option value="36">36</option>
                                        </select>
                                    </div>
                                    <!-- End .select-custom -->
                                </div>
                                <!-- End .toolbox-item -->

                                <div class="toolbox-item layout-modes">
                                    <a href="/porto/demo33-shop.html" class="layout-btn btn-grid active" title="Grid">
                                        <i class="icon-mode-grid"></i>
                                    </a>
                                    <a href="/porto/category-list.html" class="layout-btn btn-list" title="List">
                                        <i class="icon-mode-list"></i>
                                    </a>
                                </div>
                                <!-- End .layout-modes -->
                            </div>
                            <!-- End .toolbox-right -->
                        </nav>

                        <div class="row products-group products-caty">
                            <!-- product 1 -->
                            <div class="col-md-4 col-6">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo33-product.html">
                                            <img src="/porto/assets/images/demoes/demo33/products/home/product-1.jpg"
                                                alt="product" width="300" height="300" />
                                        </a>

                                        <div class="btn-icon-group">
                                            <button class="btn-icon btn-add-cart product-type-simple"
                                                data-toggle="modal" data-target="#addCartModal">
                                                <i class="icon-bag"></i>
                                            </button>
                                        </div>

                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick View</a>
                                    </figure>

                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="/porto/demo33-shop.html" class="product-category">Accessories</a>,
                                                <a href="/porto/demo33-shop.html" class="product-category">Clothes</a>
                                            </div>

                                            <a href="#" class="btn-icon-wish">
                                                <i class="icon-heart"></i>
                                            </a>
                                        </div>

                                        <h3 class="product-title"> <a href="/porto/demo33-product.html">Brown Man Belt</a>
                                        </h3>

                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width: 0%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <!-- End .product-ratings -->
                                        </div>
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <del class="old-price">$188.00</del>
                                            <span class="product-price">$108.00</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                                <!-- End .product-default -->
                            </div>
                            <!-- product 2 -->
                            <div class="col-md-4 col-6">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo33-product.html">
                                            <img src="/porto/assets/images/demoes/demo33/products/home/product-2.jpg"
                                                alt="product" width="300" height="300" />
                                        </a>

                                        <div class="btn-icon-group">
                                            <button class="btn-icon btn-add-cart product-type-simple"
                                                data-toggle="modal" data-target="#addCartModal">
                                                <i class="icon-bag"></i>
                                            </button>
                                        </div>

                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick View</a>
                                    </figure>

                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="/porto/demo33-shop.html" class="product-category">bags</a>
                                            </div>
                                            <a href="#" class="btn-icon-wish">
                                                <i class="icon-heart"></i>
                                            </a>
                                        </div>

                                        <h3 class="product-title"> <a href="/porto/demo33-product.html">Brown Bag</a> </h3>

                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width: 0%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <!-- End .product-ratings -->
                                        </div>
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <del class="old-price">$199.00</del>
                                            <span class="product-price">$99.00</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                                <!-- End .product-default -->
                            </div>
                            <!-- product 3 -->
                            <div class="col-md-4 col-6">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo33-product.html">
                                            <img src="/porto/assets/images/demoes/demo33/products/home/product-3.jpg"
                                                alt="product" width="300" height="300" />
                                        </a>

                                        <div class="btn-icon-group">
                                            <button class="btn-icon btn-add-cart product-type-simple"
                                                data-toggle="modal" data-target="#addCartModal">
                                                <i class="icon-bag"></i>
                                            </button>
                                        </div>

                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick View</a>
                                    </figure>

                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="/porto/demo33-shop.html" class="product-category">bags</a>
                                            </div>

                                            <a href="#" class="btn-icon-wish">
                                                <i class="icon-heart"></i>
                                            </a>
                                        </div>

                                        <h3 class="product-title"> <a href="/porto/demo33-product.html">Business Bag</a> </h3>

                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width: 100%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <!-- End .product-ratings -->
                                        </div>
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <span class="product-price">$166.00 - $199.00</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                                <!-- End .product-default -->
                            </div>
                            <!-- product 4 -->
                            <div class="col-md-4 col-6">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo33-product.html">
                                            <img src="/porto/assets/images/demoes/demo33/products/home/product-4.jpg"
                                                alt="product" width="300" height="300" />
                                        </a>

                                        <div class="btn-icon-group">
                                            <button class="btn-icon btn-add-cart product-type-simple"
                                                data-toggle="modal" data-target="#addCartModal">
                                                <i class="icon-bag"></i>
                                            </button>
                                        </div>

                                        <div class="label-group">
                                            <span class="product-label label-sale">-13%</span>
                                        </div>

                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick View</a>
                                    </figure>

                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="/porto/demo33-shop.html" class="product-category">Accessories</a>
                                            </div>

                                            <a href="#" class="btn-icon-wish">
                                                <i class="icon-heart"></i>
                                            </a>
                                        </div>

                                        <h3 class="product-title"> <a href="/porto/demo33-product.html">Fashion Watch</a> </h3>

                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width: 0%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <!-- End .product-ratings -->
                                        </div>
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <del class="old-price">$199.00</del>
                                            <span class="product-price">$99.00</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                                <!-- End .product-default -->
                            </div>
                            <!-- product 5 -->
                            <div class="col-md-4 col-6">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo33-product.html">
                                            <img src="/porto/assets/images/demoes/demo33/products/home/product-5.jpg"
                                                alt="product" width="300" height="300" />
                                        </a>

                                        <div class="btn-icon-group">
                                            <button class="btn-icon btn-add-cart product-type-simple"
                                                data-toggle="modal" data-target="#addCartModal">
                                                <i class="icon-bag"></i>
                                            </button>
                                        </div>

                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick View</a>
                                    </figure>

                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="/porto/demo33-shop.html" class="product-category">Accessories</a>
                                            </div>

                                            <a href="#" class="btn-icon-wish">
                                                <i class="icon-heart"></i>
                                            </a>
                                        </div>

                                        <h3 class="product-title"> <a href="/porto/demo33-product.html">Men Belt</a> </h3>

                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width: 0%"></span>
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
                            <!-- product 6 -->
                            <div class="col-md-4 col-6">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo33-product.html">
                                            <img src="/porto/assets/images/demoes/demo33/products/home/product-6.jpg"
                                                alt="product" width="300" height="300" />
                                        </a>

                                        <div class="btn-icon-group">
                                            <button class="btn-icon btn-add-cart product-type-simple"
                                                data-toggle="modal" data-target="#addCartModal">
                                                <i class="icon-bag"></i>
                                            </button>
                                        </div>

                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick View</a>
                                    </figure>

                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="/porto/demo33-shop.html" class="product-category">Accessories</a>
                                            </div>

                                            <a href="#" class="btn-icon-wish">
                                                <i class="icon-heart"></i>
                                            </a>
                                        </div>

                                        <h3 class="product-title"> <a href="/porto/demo33-product.html">Men Clothes</a> </h3>

                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width: 0%"></span>
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
                                <!-- End .product-default -->
                            </div>
                            <!-- product 7 -->
                            <div class="col-md-4 col-6">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo33-product.html">
                                            <img src="/porto/assets/images/demoes/demo33/products/home/product-7.jpg"
                                                alt="product" width="300" height="300" />
                                        </a>

                                        <div class="btn-icon-group">
                                            <button class="btn-icon btn-add-cart product-type-simple"
                                                data-toggle="modal" data-target="#addCartModal">
                                                <i class="icon-bag"></i>
                                            </button>
                                        </div>

                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick View</a>
                                    </figure>

                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="/porto/demo33-shop.html" class="product-category">Accessories</a>,
                                                <a href="/porto/demo33-shop.html" class="product-category">clothes</a>
                                            </div>

                                            <a href="#" class="btn-icon-wish">
                                                <i class="icon-heart"></i>
                                            </a>
                                        </div>

                                        <h3 class="product-title"> <a href="/porto/demo33-product.html">Blue High Hill</a>
                                        </h3>

                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width: 100%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <!-- End .product-ratings -->
                                        </div>
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <del class="old-price">$188.00</del>
                                            <span class="product-price">$108.00</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                                <!-- End .product-default -->
                            </div>
                            <!-- product 8 -->
                            <div class="col-md-4 col-6">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo33-product.html">
                                            <img src="/porto/assets/images/demoes/demo33/products/home/product-8.jpg"
                                                alt="product" width="300" height="300" />
                                        </a>

                                        <div class="btn-icon-group">
                                            <button class="btn-icon btn-add-cart product-type-simple"
                                                data-toggle="modal" data-target="#addCartModal">
                                                <i class="icon-bag"></i>
                                            </button>
                                        </div>

                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick View</a>
                                    </figure>

                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="/porto/demo33-shop.html" class="product-category">Accessories</a>,
                                                <a href="/porto/demo33-shop.html" class="product-category">clothes</a>
                                            </div>

                                            <a href="#" class="btn-icon-wish">
                                                <i class="icon-heart"></i>
                                            </a>
                                        </div>

                                        <h3 class="product-title"> <a href="/porto/demo33-product.html">Lipstick</a> </h3>

                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width: 0%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <!-- End .product-ratings -->
                                        </div>
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <del class="product-price">$59.00</del>
                                            <span class="product-price">$49.00</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                                <!-- End .product-default -->
                            </div>
                            <!-- prodcut 9 -->
                            <div class="col-md-4 col-6">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo33-product.html">
                                            <img src="/porto/assets/images/demoes/demo33/products/home/product-9.jpg"
                                                alt="product" width="300" height="300" />
                                        </a>

                                        <div class="btn-icon-group">
                                            <button class="btn-icon btn-add-cart product-type-simple"
                                                data-toggle="modal" data-target="#addCartModal">
                                                <i class="icon-bag"></i>
                                            </button>
                                        </div>

                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick View</a>
                                    </figure>

                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="/porto/demo33-shop.html" class="product-category">shoes</a>
                                            </div>

                                            <a href="#" class="btn-icon-wish">
                                                <i class="icon-heart"></i>
                                            </a>
                                        </div>

                                        <h3 class="product-title"> <a href="/porto/demo33-product.html">Sport Shoes</a> </h3>

                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width: 100%"></span>
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
                                <!-- End .product-default -->
                            </div>
                            <!-- product 10 -->
                            <div class="col-md-4 col-6">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo33-product.html">
                                            <img src="/porto/assets/images/demoes/demo33/products/home/product-10.jpg"
                                                alt="product" width="300" height="300" />
                                        </a>

                                        <div class="btn-icon-group">
                                            <button class="btn-icon btn-add-cart product-type-simple"
                                                data-toggle="modal" data-target="#addCartModal">
                                                <i class="icon-bag"></i>
                                            </button>
                                        </div>

                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick View</a>
                                    </figure>

                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="/porto/demo33-shop.html" class="product-category">Sunglasses</a>
                                            </div>

                                            <a href="#" class="btn-icon-wish">
                                                <i class="icon-heart"></i>
                                            </a>
                                        </div>

                                        <h3 class="product-title"> <a href="/porto/demo33-product.html">Sunglasses 1</a> </h3>

                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width: 0%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <!-- End .product-ratings -->
                                        </div>
                                        <!-- End .product-container -->

                                        <div class="price-box">
                                            <del class="old-price">$99.00</del>
                                            <span class="product-price">$99.00</span>
                                        </div>
                                        <!-- End .price-box -->
                                    </div>
                                    <!-- End .product-details -->
                                </div>
                                <!-- End .product-default -->
                            </div>
                            <!-- product 11 -->
                            <div class="col-md-4 col-6">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo33-product.html">
                                            <img src="/porto/assets/images/demoes/demo33/products/home/product-11.jpg"
                                                alt="product" width="300" height="300" /> </a>

                                        <div class="btn-icon-group">
                                            <button class="btn-icon btn-add-cart product-type-simple"
                                                data-toggle="modal" data-target="#addCartModal">
                                                <i class="icon-bag"></i>
                                            </button>
                                        </div>

                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick View</a>
                                    </figure>

                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="/porto/demo33-shop.html" class="product-category">bags</a>
                                            </div>

                                            <a href="#" class="btn-icon-wish">
                                                <i class="icon-heart"></i>
                                            </a>
                                        </div>

                                        <h3 class="product-title"> <a href="/porto/demo33-product.html">Woman Bag</a> </h3>

                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width: 0%"></span>
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
                            <!-- product 12 -->
                            <div class="col-md-4 col-6">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo33-product.html">
                                            <img src="/porto/assets/images/demoes/demo33/products/home/product-12.jpg"
                                                alt="product" width="300" height="300" />
                                        </a>

                                        <div class="btn-icon-group">
                                            <button class="btn-icon btn-add-cart product-type-simple"
                                                data-toggle="modal" data-target="#addCartModal">
                                                <i class="icon-bag"></i>
                                            </button>
                                        </div>

                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick View</a>
                                    </figure>

                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="/porto/demo33-shop.html" class="product-category">Accessories</a>
                                            </div>

                                            <a href="#" class="btn-icon-wish">
                                                <i class="icon-heart"></i>
                                            </a>
                                        </div>

                                        <h3 class="product-title"> <a href="/porto/demo33-product.html">Women Blouse</a> </h3>

                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width: 0%"></span>
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
                                <!-- End .product-default -->
                            </div>
                        </div>
                        <!-- End .row -->

                        <nav class="toolbox toolbox-pagination">
                            <div class="toolbox-item toolbox-show">
                                <label>Show:</label>

                                <div class="select-custom">
                                    <select name="count" class="form-control">
                                        <option value="12">12</option>
                                        <option value="24">24</option>
                                        <option value="36">36</option>
                                    </select>
                                </div>
                                <!-- End .select-custom -->
                            </div>
                            <!-- End .toolbox-item -->

                            <ul class="pagination toolbox-item">
                                <li class="page-item disabled">
                                    <a class="page-link page-link-btn" href="#">
                                        <i class="icon-angle-left"></i>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1
                                        <span class="sr-only">(current)</span>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <span class="page-link">...</span>
                                </li>
                                <li class="page-item">
                                    <a class="page-link page-link-btn" href="#">
                                        <i class="icon-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- End .col-lg-9 -->

                    <div class="sidebar-overlay"></div>
                    <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
                        <div class="sidebar-wrapper">
                            <!-- category -->
                            <div class="widget">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-1" role="button"
                                        aria-expanded="true">Categories</a>
                                </h3>

                                <div class="collapse show" id="widget-body-1">
                                    <div class="widget-body">
                                        <ul class="cat-list">
                                            <li>
                                                <a href="#widget-category-1" data-toggle="collapse" role="button"
                                                    aria-expanded="true">
                                                    Accessories
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#widget-category-2" class="collapsed" data-toggle="collapse"
                                                    role="button" aria-expanded="false">
                                                    Bags
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#widget-category-3" class="collapsed" data-toggle="collapse"
                                                    role="button" aria-expanded="false">
                                                    Clothes
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#widget-category-4" class="collapsed" data-toggle="collapse"
                                                    role="button" aria-expanded="false">
                                                    Shoes
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#widget-category-5" class="collapsed" data-toggle="collapse"
                                                    role="button" aria-expanded="false">
                                                    Sunglasses
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- End .widget-body -->
                                </div>
                                <!-- End .collapse -->
                            </div>
                            <!-- End .widget -->

                            <!-- price -->
                            <div class="widget">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-2" role="button"
                                        aria-expanded="true">Price</a>
                                </h3>

                                <div class="collapse show" id="widget-body-2">
                                    <div class="widget-body pb-0">
                                        <form action="#">
                                            <div class="price-slider-wrapper">
                                                <div id="price-slider"></div>
                                                <!-- End #price-slider -->
                                            </div>
                                            <!-- End .price-slider-wrapper -->

                                            <div
                                                class="filter-price-action d-flex align-items-center justify-content-between flex-wrap">
                                                <div class="filter-price-text">
                                                    Price:
                                                    <span id="filter-price-range"></span>
                                                </div>
                                                <!-- End .filter-price-text -->

                                                <button type="submit" class="btn btn-primary">Filter</button>
                                            </div>
                                            <!-- End .filter-price-action -->
                                        </form>
                                    </div>
                                    <!-- End .widget-body -->
                                </div>
                                <!-- End .collapse -->
                            </div>
                            <!-- End .widget -->

                            <!-- color -->
                            <div class="widget selector">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-3" role="button"
                                        aria-expanded="true">color</a>
                                </h3>

                                <div class="collapse show" id="widget-body-3">
                                    <div class="widget-body">
                                        <ul class="cat-list">
                                            <li>
                                                <a href="#widget-color-1" data-toggle="collapse" role="button"
                                                    aria-expanded="true">
                                                    Black
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#widget-color-2" class="collapsed" data-toggle="collapse"
                                                    role="button" aria-expanded="false">
                                                    Brown
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#widget-color-3" class="collapsed" data-toggle="collapse"
                                                    role="button" aria-expanded="false">
                                                    Gray
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#widget-color-4" class="collapsed" data-toggle="collapse"
                                                    role="button" aria-expanded="false">
                                                    Red
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- End .widget-body -->
                                </div>
                                <!-- End .collapse -->
                            </div>
                            <!-- End .widget -->

                            <!-- size -->
                            <div class="widget selector">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-4" role="button" aria-expanded="true"
                                        aria-controls="widget-body-4">size</a>
                                </h3>

                                <div class="collapse show" id="widget-body-4">
                                    <div class="widget-body">
                                        <ul class="cat-list">
                                            <li>
                                                <a href="#widget-size-1" data-toggle="collapse" role="button"
                                                    aria-expanded="true">
                                                    extra Large
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#widget-size-2" class="collapsed" data-toggle="collapse"
                                                    role="button" aria-expanded="false">
                                                    Large
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#widget-size-3" class="collapsed" data-toggle="collapse"
                                                    role="button" aria-expanded="false">
                                                    Medium
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#widget-size-4" class="collapsed" data-toggle="collapse"
                                                    role="button" aria-expanded="false">
                                                    Small
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- End .widget-body -->
                                </div>
                                <!-- End .collapse -->
                            </div>
                            <!-- End .widget -->
                        </div>
                        <!-- End .sidebar-wrapper -->
                    </aside>
                    <!-- End .col-lg-3 -->
                </div>
                <!-- End .row -->
            </div>
            <!-- End .container -->
@section('footer')
    @include('components.porto.demo33.footer')
@endsection

@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
