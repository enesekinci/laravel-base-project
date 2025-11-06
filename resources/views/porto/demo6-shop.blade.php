@extends('layouts.porto')

@section('header')
    @include('components.porto.header')
@endsection

@section('content')
<div class="category-banner home-slide-2 banner banner-sm-vw-xx d-flex justify-content-between bg-img bg-primary" style="background-image: url(/porto/assets/images/demoes/demo6/banners/category-banner.jpg);background-size: contain">
                <div class="banner-content banner-layer-left appear-animate" data-animation-name="fadeIn" data-animation-duration="1200" data-animation-delay="200">
                    <h2 class="text-white font3 font-weight-normal p-l-1">Summer Trends</h2>
                    <h3 class="text-white mb-0 text-left text-uppercase ml-0 ls-10">sale</h3>
                </div>
                <div class="banner-content banner-layer-right appear-animate" data-animation-name="fadeIn" data-animation-duration="1200" data-animation-delay="400">
                    <h4 class="text-white pl-2 font-weight-light text-left text-uppercase">prices up to</h4>
                    <h3 class="text-white mb-0 text-sale m-l-n-xs text-left text-uppercase ml-0">80%<small>OFF</small>
                    </h3>
                </div>
            </div>

            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container-fluid">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/porto/demo6.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Men</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Accessories</li>
                    </ol>
                </div>
            </nav>

            <div class="container-fluid products-body mb-3">
                <nav class="toolbox sticky-header horizontal-filter filter-sorts" data-sticky-options="{'mobile': true}">
                    <div class="sidebar-overlay d-lg-none"></div>
                    <a href="#" class="sidebar-toggle border-0"><svg data-name="Layer 3" id="Layer_3"
                            viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                            <line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
                            <line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
                            <line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
                            <line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
                            <line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
                            <line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
                            <path d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z"
                                class="cls-2"></path>
                            <path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                            <path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
                            <path d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z"
                                class="cls-2"></path>
                        </svg>
                        <span>Filter</span>
                    </a>

                    <aside class="toolbox-left sidebar-shop mobile-sidebar">
                        <div class="toolbox-item toolbox-sort select-custom">
                            <a class="sort-menu-trigger" href="#">Categories</a>
                            <ul class="sort-list cat-list">
                                <li>
                                    <a href="#widget-category-1" class="collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="widget-category-1">
                                        Accessories
                                        <span class="toggle"></span>
                                    </a>
                                    <div class="collapse" id="widget-category-1">
                                        <ul class="cat-sublist">
                                            <li>Caps</li>
                                            <li>Watches</li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="#widget-category-2" class="collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="widget-category-2">
                                        Dress
                                        <span class="toggle"></span>
                                    </a>
                                    <div class="collapse" id="widget-category-2">
                                        <ul class="cat-sublist">
                                            <li>Clothing</li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="#widget-category-3" class="collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="widget-category-3">
                                        Electronics
                                        <span class="toggle"></span>
                                    </a>
                                    <div class="collapse" id="widget-category-3">
                                        <ul class="cat-sublist">
                                            <li>Headphone</li>
                                            <li>Watch</li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="#widget-category-4" class="collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="widget-category-4">
                                        Fashion
                                        <span class="toggle"></span>
                                    </a>
                                    <div class="collapse" id="widget-category-4">
                                        <ul class="cat-sublist">
                                            <li>Shoes</li>
                                            <li>Bag</li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a href="#">Music</a></li>
                            </ul>
                        </div>
                        <!-- End .toolbox-item -->

                        <div class="toolbox-item toolbox-sort select-custom">
                            <a class="sort-menu-trigger" href="#">Select Size</a>
                            <ul class="sort-list">
                                <li><a href="#">Extra Large</a></li>
                                <li><a href="#">Large</a></li>
                                <li><a href="#">Medium</a></li>
                                <li><a href="#">Small</a></li>
                            </ul>
                        </div>
                        <!-- End .toolbox-item -->

                        <div class="toolbox-item toolbox-sort select-custom">
                            <a class="sort-menu-trigger" href="#">Select Color</a>
                            <ul class="sort-list">
                                <li><a href="#">Black</a></li>
                                <li><a href="#">Blue</a></li>
                                <li><a href="#">Brown</a></li>
                                <li><a href="#">Green</a></li>
                                <li><a href="#">Indigo</a></li>
                                <li><a href="#">Light Blue</a></li>
                                <li><a href="#">Red</a></li>
                                <li><a href="#">Yellow</a></li>
                            </ul>
                        </div>
                        <!-- End .toolbox-item -->

                        <div class="toolbox-item toolbox-sort price-sort select-custom">
                            <a class="sort-menu-trigger" href="#">Select Price</a>
                            <div class="sort-list">
                                <form class="filter-price-form d-flex align-items-center m-0">
                                    <input class="input-price mr-2" name="min_price" placeholder="55" /> -
                                    <input class="input-price mx-2" name="max_price" placeholder="111" />
                                    <button type="submit" class="btn btn-primary ml-3">Filter</button>
                                </form>
                            </div>
                        </div>
                        <!-- End .toolbox-item -->
                    </aside>
                    <!-- End .toolbox-left -->


                    <div class="toolbox-item toolbox-sort select-custom">
                        <select name="orderby" class="form-control">
                            <option value="menu_order" selected="selected">Default sorting</option>
                            <option value="popularity">Sort by popularity</option>
                            <option value="rating">Sort by average rating</option>
                            <option value="date">Sort by newness</option>
                            <option value="price">Sort by price: low to high</option>
                            <option value="price-desc">Sort by price: high to low</option>
                        </select>
                    </div>
                    <!-- End .toolbox-item -->

                    <div class="toolbox-item toolbox-show ml-auto">
                        <label>Show:</label>

                        <div class="select-custom">
                            <select name="count" class="form-control">
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="40">40</option>
                                <option value="50">50</option>
                            </select>
                        </div>
                        <!-- End .select-custom -->
                    </div>
                    <!-- End .toolbox-item -->

                    <div class="toolbox-item layout-modes">
                        <a href="/porto/demo6-shop.html" class="layout-btn btn-grid active" title="Grid">
                            <i class="icon-mode-grid"></i>
                        </a>
                        <a href="/porto/category-list.html" class="layout-btn btn-list" title="List">
                            <i class="icon-mode-list"></i>
                        </a>
                    </div>
                    <!-- End .layout-modes -->
                </nav>

                <div class="row">
                    <div class="col-6 col-sm-4 col-md-3 col-xl-5col">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo6-product.html">
                                    <img src="/porto/assets/images/demoes/demo6/products/product-15.jpg" width="400" height="400" alt="product" />
                                    <img src="/porto/assets/images/demoes/demo6/products/product-15-2.jpg" width="400" height="400" alt="product" />
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
                                        <a href="/porto/demo6-shop.html" class="product-category">clothing</a>,
                                        <a href="/porto/demo6-shop.html" class="product-category">trousers</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo6-product.html">Black Gril Blouse</a> </h3>
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
                                    <span class="product-price">$149.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>
                    <!-- End .col-sm-4 -->

                    <div class="col-6 col-sm-4 col-md-3 col-xl-5col">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo6-product.html">
                                    <img src="/porto/assets/images/demoes/demo6/products/product-5.jpg" width="400" height="400" alt="product" />
                                    <img src="/porto/assets/images/demoes/demo6/products/product-5-2.jpg" width="400" height="400" alt="product" />
                                </a>
                                <div class="btn-icon-group">
                                    <a href="/porto/demo6-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo6-shop.html" class="product-category">headphone</a>,
                                        <a href="/porto/demo6-shop.html" class="product-category">trousers</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo6-product.html">Blue Jacket</a> </h3>
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
                                    <span class="product-price">$101.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>
                    <!-- End .col-sm-4 -->

                    <div class="col-6 col-sm-4 col-md-3 col-xl-5col">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo6-product.html">
                                    <img src="/porto/assets/images/demoes/demo6/products/product-1.jpg" width="400" height="400" alt="product" />
                                    <img src="/porto/assets/images/demoes/demo6/products/product-2.jpg" width="400" height="400" alt="product" />
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
                                        <a href="/porto/demo6-shop.html" class="product-category">headphone</a>,
                                        <a href="/porto/demo6-shop.html" class="product-category">trousers</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo6-product.html">Girl Black Blouse</a> </h3>
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
                                    <span class="product-price">$109.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>
                    <!-- End .col-sm-4 -->

                    <div class="col-6 col-sm-4 col-md-3 col-xl-5col">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo6-product.html">
                                    <img src="/porto/assets/images/demoes/demo6/products/product-9.jpg" width="400" height="400" alt="product" />
                                    <img src="/porto/assets/images/demoes/demo6/products/product-13.jpg" width="400" height="400" alt="product" />
                                </a>
                                <div class="btn-icon-group">
                                    <a href="/porto/demo6-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo6-shop.html" class="product-category">clothing</a>,
                                        <a href="/porto/demo6-shop.html" class="product-category">t-shirts</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo6-product.html">Men Black Jacket</a> </h3>
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
                                    <span class="product-price">$259.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>
                    <!-- End .col-sm-4 -->

                    <div class="col-6 col-sm-4 col-md-3 col-xl-5col">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo6-product.html">
                                    <img src="/porto/assets/images/demoes/demo6/products/product-16.jpg" width="400" height="400" alt="product" />
                                    <img src="/porto/assets/images/demoes/demo6/products/product-16-2.jpg" width="400" height="400" alt="product" />
                                </a>
                                <div class="btn-icon-group">
                                    <a href="/porto/demo6-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo6-shop.html" class="product-category">caps</a>,
                                        <a href="/porto/demo6-shop.html" class="product-category">shoes</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo6-product.html">Men Jacket</a> </h3>
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
                                    <span class="product-price">$101.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>
                    <!-- End .col-sm-4 -->

                    <div class="col-6 col-sm-4 col-md-3 col-xl-5col">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo6-product.html">
                                    <img src="/porto/assets/images/demoes/demo6/products/product-17.jpg" width="400" height="400" alt="product" />
                                    <img src="/porto/assets/images/demoes/demo6/products/product-12.jpg" width="400" height="400" alt="product" />
                                </a>
                                <div class="btn-icon-group">
                                    <a href="/porto/demo6-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo6-shop.html" class="product-category">caps</a>,
                                        <a href="/porto/demo6-shop.html" class="product-category">shoes</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo6-product.html">Men Long T-Shirt</a> </h3>
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
                                    <span class="product-price">$101.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>
                    <!-- End .col-sm-4 -->

                    <div class="col-6 col-sm-4 col-md-3 col-xl-5col">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo6-product.html">
                                    <img src="/porto/assets/images/demoes/demo6/products/product-14.jpg" width="400" height="400" alt="product" />
                                    <img src="/porto/assets/images/demoes/demo6/products/product-14-2.jpg" width="400" height="400" alt="product" />
                                </a>
                                <div class="btn-icon-group">
                                    <a href="/porto/demo6-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo6-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo6-product.html">Men Sports T-Shirt</a> </h3>
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
                                    <span class="old-price">$90.00</span>
                                    <span class="product-price">$70.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>
                    <!-- End .col-sm-4 -->
                    <div class="col-6 col-sm-4 col-md-3 col-xl-5col">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo6-product.html">
                                    <img src="/porto/assets/images/demoes/demo6/products/product-4.jpg" width="400" height="400" alt="product" />
                                    <img src="/porto/assets/images/demoes/demo6/products/product-3.jpg" width="400" height="400" alt="product" />
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
                                        <a href="/porto/demo6-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo6-product.html">Men White Shirt</a> </h3>
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
                                    <span class="old-price">$90.00</span>
                                    <span class="product-price">$70.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>
                    <!-- End .col-sm-4 -->
                    <div class="col-6 col-sm-4 col-md-3 col-xl-5col">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo6-product.html">
                                    <img src="/porto/assets/images/demoes/demo6/products/product-3.jpg" width="400" height="400" alt="product" />
                                    <img src="/porto/assets/images/demoes/demo6/products/product-4.jpg" width="400" height="400" alt="product" />
                                </a>
                                <div class="btn-icon-group">
                                    <a href="/porto/demo6-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo6-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo6-product.html">Porto Sports Shirts</a> </h3>
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
                                    <span class="old-price">$90.00</span>
                                    <span class="product-price">$70.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>
                    <!-- End .col-sm-4 -->
                    <div class="col-6 col-sm-4 col-md-3 col-xl-5col">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo6-product.html">
                                    <img src="/porto/assets/images/demoes/demo6/products/product-2.jpg" width="400" height="400" alt="product" />
                                    <img src="/porto/assets/images/demoes/demo6/products/product-1.jpg" width="400" height="400" alt="product" />
                                </a>
                                <div class="label-group">
                                    <div class="product-label label-sale">-30%</div>
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
                                        <a href="/porto/demo6-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title"> <a href="/porto/demo6-product.html">Porto White Girl Shirt</a> </h3>
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
                                    <span class="old-price">$90.00</span>
                                    <span class="product-price">$70.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>
                    <!-- End .col-sm-4 -->
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
                            <a class="page-link page-link-btn" href="#"><i class="icon-angle-left"></i></a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><span class="page-link">...</span></li>
                        <li class="page-item">
                            <a class="page-link page-link-btn" href="#"><i class="icon-angle-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- End .container -->
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
