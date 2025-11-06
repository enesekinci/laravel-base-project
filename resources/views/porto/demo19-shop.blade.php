@extends('layouts.porto')

@section('header')
    @include('components.porto.header')
@endsection

@section('content')
<div class="container-fluid">
                <div class="category-banner-container">
                    <div class="banner category-banner p-0" style="background-color: #f4f4f4;">
                        <figure>
                            <img src="/porto/assets/images/demoes/demo19/banners/shop-banner.jpg" alt="banner" width="1685"
                                height="262">
                        </figure>
                        <div class="container p-0">
                            <div class="banner-layer banner-layer-middle row">
                                <div class="col-md-4 col-xl-5 text-center text-md-right">
                                    <h3 class="text-uppercase mb-2 mb-md-0 ml-0">
                                        Top Electronic<br>Deals
                                    </h3>
                                </div>
                                <div class="col-md-4 col-xl-2 text-center">
                                    <a href="#" class="btn btn-lg btn-dark ml-0 mb-2 mb-md-0">View Sale</a>
                                </div>
                                <div class="col-auto coupon-sale-text mx-auto mx-md-0">
                                    <h4 class="m-b-2 font1 d-block text-white bg-dark">Exclusive COUPON</h4>
                                    <h5 class="mb-0 font1 d-inline-block bg-secondary"><i class="text-dark ls-0">UP
                                            TO</i><b class="text-white">$100</b><sub class="text-dark">OFF</sub></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <nav aria-label="breadcrumb" class="breadcrumb-nav mb-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/porto/demo19.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shop</li>
                    </ol>
                </nav>
            </div>

            <div class="main-container mt-3">
                <div class="container-fluid">
                    <div class="category-list mb-2 mb-md-0" id="category-list">
                        <ul class="nav category-list-nav">
                            <li class="nav-item green">
                                <a href="#cat-1" class="nav-link">
                                    <span class="cat-list-icon"><i class="icon-cat-shirt"></i></span>
                                    <span class="cat-list-text">Fashion &amp; Clothes</span>
                                </a>
                            </li>
                            <li class="nav-item orange">
                                <a href="#cat-2" class="nav-link">
                                    <span class="cat-list-icon"><i class="icon-cat-computer"></i></span>
                                    <span class="cat-list-text">Electronics &amp; Computers</span>
                                </a>
                            </li>
                            <li class="nav-item green">
                                <a href="#cat-3" class="nav-link">
                                    <span class="cat-list-icon"><i class="icon-cat-toys"></i></span>
                                    <span class="cat-list-text">Toys &amp; Hobbies</span>
                                </a>
                            </li>
                            <li class="nav-item yellow">
                                <a href="#cat-4" class="nav-link">
                                    <span class="cat-list-icon"><i class="icon-cat-garden"></i></span>
                                    <span class="cat-list-text">Home &amp; Garden</span>
                                </a>
                            </li>
                            <li class="nav-item gray">
                                <a href="#cat-5" class="nav-link">
                                    <span class="cat-list-icon"><i class="icon-cat-sport"></i></span>
                                    <span class="cat-list-text">Sports &amp; Fitness</span>
                                </a>
                            </li>
                            <li class="nav-item lightblue">
                                <a href="#cat-6" class="nav-link">
                                    <span class="cat-list-icon"><i class="icon-cat-gift"></i></span>
                                    <span class="cat-list-text">Gifts</span>
                                </a>
                            </li>
                        </ul>
                    </div><!-- End .category-list -->

                    <div class="row">
                        <div class="col-lg-9 main-content shop-content">
                            <nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
                                <div class="toolbox-left">
                                    <a href="#" class="sidebar-toggle"><svg data-name="Layer 3" id="Layer_3"
                                            viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                            <line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
                                            <line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
                                            <line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
                                            <line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
                                            <line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
                                            <line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
                                            <path
                                                d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z"
                                                class="cls-2"></path>
                                            <path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2">
                                            </path>
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
                                        </div><!-- End .select-custom -->


                                    </div><!-- End .toolbox-item -->
                                </div><!-- End .toolbox-left -->

                                <div class="toolbox-right">
                                    <div class="toolbox-item layout-modes">
                                        <a href="/porto/demo19-shop.html" class="layout-btn btn-grid active" title="Grid">
                                            <i class="icon-mode-grid"></i>
                                        </a>
                                        <a href="/porto/category-list.html" class="layout-btn btn-list" title="List">
                                            <i class="icon-mode-list"></i>
                                        </a>
                                    </div><!-- End .layout-modes -->
                                </div><!-- End .toolbox-right -->
                            </nav>

                            <div class="row product-ajax-grid">
                                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo19-product.html">
                                                <img src="/porto/assets/images/demoes/demo19/products/product-13.jpg"
                                                    width="205" height="205" alt="product">
                                            </a>
                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View">Quick View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="title-wrap">
                                                <h3 class="product-title">
                                                    <a href="/porto/demo19-product.html">Avengers 2 Age of Ultron</a>
                                                </h3>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:60%"></span><!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$45.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                </div><!-- End .col-lg-3 -->
                                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo19-product.html">
                                                <img src="/porto/assets/images/demoes/demo19/products/product-32.jpg"
                                                    width="205" height="205" alt="product">
                                            </a>
                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View">Quick View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="title-wrap">
                                                <h3 class="product-title">
                                                    <a href="/porto/demo19-product.html">BBQ Grill Tools Set</a>
                                                </h3>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:40%"></span><!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$39.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                </div><!-- End .col-lg-3 -->
                                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo19-product.html">
                                                <img src="/porto/assets/images/demoes/demo19/products/product-20.jpg"
                                                    width="205" height="205" alt="product">
                                            </a>
                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View">Quick View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="title-wrap">
                                                <h3 class="product-title">
                                                    <a href="/porto/demo19-product.html">Beach chair, foldable light blue</a>
                                                </h3>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$25.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                </div><!-- End .col-lg-3 -->
                                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo19-product.html">
                                                <img src="/porto/assets/images/demoes/demo19/products/product-9.jpg"
                                                    width="205" height="205" alt="product">
                                            </a>
                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View">Quick View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="title-wrap">
                                                <h3 class="product-title">
                                                    <a href="/porto/demo19-product.html">Beats Solo HD Drenched</a>
                                                </h3>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:60%"></span><!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$86.90</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                </div><!-- End .col-lg-3 -->
                                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo19-product.html">
                                                <img src="/porto/assets/images/demoes/demo19/products/product-12.jpg"
                                                    width="205" height="205" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-sale">-29%</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View">Quick View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="title-wrap">
                                                <h3 class="product-title">
                                                    <a href="/porto/demo19-product.html">Bose SoundLink Color Bluetooth</a>
                                                </h3>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:75%"></span><!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="old-price">$139.00</span>
                                                <span class="product-price">$99.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                </div><!-- End .col-lg-3 -->
                                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo19-product.html">
                                                <img src="/porto/assets/images/demoes/demo19/products/product-10.jpg"
                                                    width="205" height="205" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-sale">-41%</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View">Quick View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="title-wrap">
                                                <h3 class="product-title">
                                                    <a href="/porto/demo19-product.html">Camera</a>
                                                </h3>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:50%"></span><!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$289.00 &ndash; $399.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                </div><!-- End .col-lg-3 -->
                                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo19-product.html">
                                                <img src="/porto/assets/images/demoes/demo19/products/product-33.jpg"
                                                    width="205" height="205" alt="product">
                                            </a>
                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View">Quick View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="title-wrap">
                                                <h3 class="product-title">
                                                    <a href="/porto/demo19-product.html">Candle Company Smell</a>
                                                </h3>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:60%"></span><!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$19.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                </div><!-- End .col-lg-3 -->
                                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo19-product.html">
                                                <img src="/porto/assets/images/demoes/demo19/products/product-24.jpg"
                                                    width="205" height="205" alt="product">
                                            </a>
                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View">Quick View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="title-wrap">
                                                <h3 class="product-title">
                                                    <a href="/porto/demo19-product.html">Charcoal grill with cart</a>
                                                </h3>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$28.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                </div><!-- End .col-lg-3 -->
                                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo19-product.html">
                                                <img src="/porto/assets/images/demoes/demo19/products/product-7.jpg"
                                                    width="205" height="205" alt="product">
                                            </a>
                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View">Quick View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="title-wrap">
                                                <h3 class="product-title">
                                                    <a href="/porto/demo19-product.html">Computer Desktop 4K</a>
                                                </h3>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$999.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                </div><!-- End .col-lg-3 -->
                                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo19-product.html">
                                                <img src="/porto/assets/images/demoes/demo19/products/product-1.jpg"
                                                    width="205" height="205" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View">Quick View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="title-wrap">
                                                <h3 class="product-title">
                                                    <a href="/porto/demo19-product.html">Cotton Bomber Jacket</a>
                                                </h3>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$23.90</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                </div><!-- End .col-lg-3 -->
                                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo19-product.html">
                                                <img src="/porto/assets/images/demoes/demo19/products/product-4.jpg"
                                                    width="205" height="205" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View">Quick View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="title-wrap">
                                                <h3 class="product-title">
                                                    <a href="/porto/demo19-product.html">Cuffed Chino Shorts</a>
                                                </h3>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:60%"></span><!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$19.90</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                </div><!-- End .col-lg-3 -->
                                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo19-product.html">
                                                <img src="/porto/assets/images/demoes/demo19/products/product-31.jpg"
                                                    width="205" height="205" alt="product">
                                            </a>
                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View">Quick View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="title-wrap">
                                                <h3 class="product-title">
                                                    <a href="/porto/demo19-product.html">Cuisine Prefere Pro Stainless</a>
                                                </h3>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$39.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                </div><!-- End .col-lg-3 -->
                                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo19-product.html">
                                                <img src="/porto/assets/images/demoes/demo19/products/product-8.jpg"
                                                    width="205" height="205" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <span class="product-label label-hot">HOT</span>
                                                <span class="product-label label-sale">-6%</span>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View">Quick View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="title-wrap">
                                                <h3 class="product-title">
                                                    <a href="/porto/demo19-product.html">Drone Pro</a>
                                                </h3>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="old-price">$669.00</span>
                                                <span class="product-price">$629.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                </div><!-- End .col-lg-3 -->
                                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo19-product.html">
                                                <img src="/porto/assets/images/demoes/demo19/products/product-14.jpg"
                                                    width="205" height="205" alt="product">
                                            </a>
                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View">Quick View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="title-wrap">
                                                <h3 class="product-title">
                                                    <a href="/porto/demo19-product.html">GM Camaro SS Original</a>
                                                </h3>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$35.90</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                </div><!-- End .col-lg-3 -->
                                <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo19-product.html">
                                                <img src="/porto/assets/images/demoes/demo19/products/product-34.jpg"
                                                    width="205" height="205" alt="product">
                                            </a>
                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View">Quick View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="title-wrap">
                                                <h3 class="product-title">
                                                    <a href="/porto/demo19-product.html">Guest Soap 100% Natural</a>
                                                </h3>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$18.99</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                </div><!-- End .col-lg-3 -->
                            </div><!-- End .row -->

                            <div class="product-more-container d-flex justify-content-center">
                                <a href="/porto/ajax/demo19-ajax-products.html" class="btn loadmore">Load More...</a>
                            </div><!-- End .product-more-container -->
                        </div><!-- End .col-lg-9 -->

                        <div class="sidebar-overlay"></div>
                        <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
                            <div class="sidebar-wrapper">
                                <div class="widget">
                                    <h3 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-body-2" role="button"
                                            aria-expanded="true" aria-controls="widget-body-2">Categories</a>
                                    </h3>

                                    <div class="collapse show" id="widget-body-2">
                                        <div class="widget-body">
                                            <ul class="cat-list">
                                                <li>
                                                    <a href="#widget-category-2">
                                                        Electronics &amp; Computers<span
                                                            class="products-count">(6)</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#widget-category-1" class="collapsed"
                                                        data-toggle="collapse" role="button" aria-expanded="true"
                                                        aria-controls="widget-category-1">
                                                        Fashion &amp; Clothes<span class="products-count">(6)</span>
                                                        <span class="toggle"></span>
                                                    </a>
                                                    <div class="collapse" id="widget-category-1">
                                                        <ul class="cat-sublist">
                                                            <li>Caps<span class="products-count">(4)</span></li>
                                                            <li>Watches<span class="products-count">(2)</span></li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li>
                                                    <a href="#widget-category-2">
                                                        Gifts &amp; Gadgets<span class="products-count">(6)</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#widget-category-2">
                                                        Home &amp; Garden<span class="products-count">(6)</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#widget-category-2">
                                                        Sports &amp; Fitness<span class="products-count">(6)</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#widget-category-2">
                                                        Toys &amp; Games<span class="products-count">(6)</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .widget -->

                                <div class="widget">
                                    <h3 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-body-3" role="button"
                                            aria-expanded="true" aria-controls="widget-body-3">Price</a>
                                    </h3>

                                    <div class="collapse show" id="widget-body-3">
                                        <div class="widget-body pb-0">
                                            <form action="#">
                                                <div class="price-slider-wrapper">
                                                    <div id="price-slider"></div><!-- End #price-slider -->
                                                </div><!-- End .price-slider-wrapper -->

                                                <div
                                                    class="filter-price-action d-flex align-items-center justify-content-between flex-wrap">
                                                    <div class="filter-price-text">
                                                        Price:
                                                        <span id="filter-price-range"></span>
                                                    </div><!-- End .filter-price-text -->

                                                    <button type="submit" class="btn btn-primary">Filter</button>
                                                </div><!-- End .filter-price-action -->
                                            </form>
                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .widget -->

                                <div class="widget widget-color">
                                    <h3 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-body-4" role="button"
                                            aria-expanded="true" aria-controls="widget-body-4">Color</a>
                                    </h3>

                                    <div class="collapse show" id="widget-body-4">
                                        <div class="widget-body pb-0">
                                            <ul class="config-swatch-list">
                                                <li class="active">
                                                    <a href="#" style="background-color: #000;"></a>
                                                </li>
                                                <li>
                                                    <a href="#" style="background-color: #0188cc;"></a>
                                                </li>
                                                <li>
                                                    <a href="#" style="background-color: #81d742;"></a>
                                                </li>
                                                <li>
                                                    <a href="#" style="background-color: #6085a5;"></a>
                                                </li>
                                                <li>
                                                    <a href="#" style="background-color: #ab6e6e;"></a>
                                                </li>
                                            </ul>
                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .widget -->

                                <div class="widget widget-size">
                                    <h3 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-body-5" role="button"
                                            aria-expanded="true" aria-controls="widget-body-5">Size</a>
                                    </h3>

                                    <div class="collapse show" id="widget-body-5">
                                        <div class="widget-body">
                                            <ul class="config-size-list">
                                                <li class="active"><a href="#">XL</a></li>
                                                <li><a href="#">L</a></li>
                                                <li><a href="#">M</a></li>
                                                <li><a href="#">S</a></li>
                                            </ul>
                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .widget -->

                                <div class="widget widget-featured">
                                    <h3 class="widget-title">Featured</h3>

                                    <div class="widget-body">
                                        <div class="owl-carousel widget-featured-products">
                                            <div class="featured-col">
                                                <div class="product-default left-details product-widget">
                                                    <figure>
                                                        <a href="/porto/demo19-product.html">
                                                            <img src="/porto/assets/images/demoes/demo19/products/small/product-1.jpg"
                                                                width="75" height="75" alt="product" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h3 class="product-title">
                                                            <a href="/porto/demo19-product.html">White Sofa</a>
                                                        </h3>
                                                        <div class="ratings-container">
                                                            <div class="product-ratings">
                                                                <span class="ratings" style="width:60%"></span>
                                                                <!-- End .ratings -->
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div><!-- End .product-ratings -->
                                                        </div><!-- End .product-container -->
                                                        <div class="price-box">
                                                            <span class="product-price">$25.00</span>
                                                        </div><!-- End .price-box -->
                                                    </div><!-- End .product-details -->
                                                </div>
                                                <div class="product-default left-details product-widget">
                                                    <figure>
                                                        <a href="/porto/demo19-product.html">
                                                            <img src="/porto/assets/images/demoes/demo19/products/small/product-2.jpg"
                                                                width="75" height="75" alt="product" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h3 class="product-title">
                                                            <a href="/porto/demo19-product.html">Women's runnings tights</a>
                                                        </h3>
                                                        <div class="ratings-container">
                                                            <div class="product-ratings">
                                                                <span class="ratings" style="width:80%"></span>
                                                                <!-- End .ratings -->
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div><!-- End .product-ratings -->
                                                        </div><!-- End .product-container -->
                                                        <div class="price-box">
                                                            <span class="product-price">$110.00</span>
                                                        </div><!-- End .price-box -->
                                                    </div><!-- End .product-details -->
                                                </div>
                                                <div class="product-default left-details product-widget">
                                                    <figure>
                                                        <a href="/porto/demo19-product.html">
                                                            <img src="/porto/assets/images/demoes/demo19/products/small/product-3.jpg"
                                                                width="75" height="75" alt="product" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h3 class="product-title">
                                                            <a href="/porto/demo19-product.html">Cotton Bomber Jacket</a>
                                                        </h3>
                                                        <div class="ratings-container">
                                                            <div class="product-ratings">
                                                                <span class="ratings" style="width:75%"></span>
                                                                <!-- End .ratings -->
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div><!-- End .product-ratings -->
                                                        </div><!-- End .product-container -->
                                                        <div class="price-box">
                                                            <span class="product-price">$23.90</span>
                                                        </div><!-- End .price-box -->
                                                    </div><!-- End .product-details -->
                                                </div>
                                            </div><!-- End .featured-col -->
                                            <div class="featured-col">
                                                <div class="product-default left-details product-widget">
                                                    <figure>
                                                        <a href="/porto/demo19-product.html">
                                                            <img src="/porto/assets/images/demoes/demo19/products/small/product-1.jpg"
                                                                width="75" height="75" alt="product" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h3 class="product-title">
                                                            <a href="/porto/demo19-product.html">White Sofa</a>
                                                        </h3>
                                                        <div class="ratings-container">
                                                            <div class="product-ratings">
                                                                <span class="ratings" style="width:60%"></span>
                                                                <!-- End .ratings -->
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div><!-- End .product-ratings -->
                                                        </div><!-- End .product-container -->
                                                        <div class="price-box">
                                                            <span class="product-price">$25.00</span>
                                                        </div><!-- End .price-box -->
                                                    </div><!-- End .product-details -->
                                                </div>
                                                <div class="product-default left-details product-widget">
                                                    <figure>
                                                        <a href="/porto/demo19-product.html">
                                                            <img src="/porto/assets/images/demoes/demo19/products/small/product-2.jpg"
                                                                width="75" height="75" alt="product" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h3 class="product-title">
                                                            <a href="/porto/demo19-product.html">Women's runnings tights</a>
                                                        </h3>
                                                        <div class="ratings-container">
                                                            <div class="product-ratings">
                                                                <span class="ratings" style="width:80%"></span>
                                                                <!-- End .ratings -->
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div><!-- End .product-ratings -->
                                                        </div><!-- End .product-container -->
                                                        <div class="price-box">
                                                            <span class="product-price">$110.00</span>
                                                        </div><!-- End .price-box -->
                                                    </div><!-- End .product-details -->
                                                </div>
                                                <div class="product-default left-details product-widget">
                                                    <figure>
                                                        <a href="/porto/demo19-product.html">
                                                            <img src="/porto/assets/images/demoes/demo19/products/small/product-3.jpg"
                                                                width="75" height="75" alt="product" />
                                                        </a>
                                                    </figure>
                                                    <div class="product-details">
                                                        <h3 class="product-title">
                                                            <a href="/porto/demo19-product.html">Cotton Bomber Jacket</a>
                                                        </h3>
                                                        <div class="ratings-container">
                                                            <div class="product-ratings">
                                                                <span class="ratings" style="width:75%"></span>
                                                                <!-- End .ratings -->
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div><!-- End .product-ratings -->
                                                        </div><!-- End .product-container -->
                                                        <div class="price-box">
                                                            <span class="product-price">$23.90</span>
                                                        </div><!-- End .price-box -->
                                                    </div><!-- End .product-details -->
                                                </div>
                                            </div><!-- End .featured-col -->
                                        </div><!-- End .widget-featured-slider -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .widget -->
                            </div><!-- End .sidebar-wrapper -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </div>

                <div class="mb-4"></div>
            </div>
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
