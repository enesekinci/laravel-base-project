@extends('layouts.porto')

@section('header')
    @include('porto.demo32.header')
@endsection

@section('footer')
    @include('porto.demo32.footer')
@endsection

@section('content')
<div class="container-fluid">
                <div class="row">
                    <div class="col-xl-2cols col-lg-3">
                        <div class="sidebar-overlay"></div>
                        <aside class="sidebar-shop mobile-sidebar">
                            <div class="sidebar-wrapper" data-sticky-sidebar-options='{"offsetTop": 72}'>
                                <div class="header-bottom w-100 ml-0 position-relative d-lg-block d-none">
                                    <nav class="main-nav w-100">
                                        <ul class="menu no-superfish w-100">
                                            <li class="active">
                                                <a href="/porto/demo32.html">Home</a>
                                            </li>
                                            <li>
                                                <a href="/porto/demo32-shop.html" class="sf-with-ul">Categories</a>
                                                <div class="megamenu megamenu-fixed-width megamenu-3cols">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <a href="#" class="nolink">VARIATION 1</a>
                                                            <ul class="submenu">
                                                                <li><a href="/porto/category.html">Fullwidth Banner</a></li>
                                                                <li><a href="/porto/category-banner-boxed-slider.html">Boxed
                                                                        Slider Banner</a>
                                                                </li>
                                                                <li><a href="/porto/category-banner-boxed-image.html">Boxed
                                                                        Image Banner</a>
                                                                </li>
                                                                <li><a href="/porto/category.html">Left Sidebar</a></li>
                                                                <li><a href="/porto/category-sidebar-right.html">Right
                                                                        Sidebar</a></li>
                                                                <li><a href="/porto/category-off-canvas.html">Off Canvas
                                                                        Filter</a></li>
                                                                <li><a href="/porto/category-horizontal-filter1.html">Horizontal
                                                                        Filter1</a>
                                                                </li>
                                                                <li><a href="/porto/category-horizontal-filter2.html">Horizontal
                                                                        Filter2</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <a href="#" class="nolink">VARIATION 2</a>
                                                            <ul class="submenu">
                                                                <li><a href="/porto/category-list.html">List Types</a></li>
                                                                <li><a href="/porto/category-infinite-scroll.html">Ajax
                                                                        Infinite Scroll</a>
                                                                </li>
                                                                <li><a href="/porto/category.html">3 Columns Products</a></li>
                                                                <li><a href="/porto/category-4col.html">4 Columns Products</a>
                                                                </li>
                                                                <li><a href="/porto/category-5col.html">5 Columns Products</a>
                                                                </li>
                                                                <li><a href="/porto/category-6col.html">6 Columns Products</a>
                                                                </li>
                                                                <li><a href="/porto/category-7col.html">7 Columns Products</a>
                                                                </li>
                                                                <li><a href="/porto/category-8col.html">8 Columns Products</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-4 p-0">
                                                            <div class="menu-banner">
                                                                <figure>
                                                                    <img src="/porto/assets/images/menu-banner.jpg"
                                                                        alt="Menu banner">
                                                                </figure>
                                                                <div class="banner-content">
                                                                    <h4>
                                                                        <span class="">UP TO</span><br />
                                                                        <b class="">50%</b>
                                                                        <i>OFF</i>
                                                                    </h4>
                                                                    <a href="/porto/category.html"
                                                                        class="btn btn-sm btn-dark">SHOP NOW</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- End .megamenu -->
                                            </li>
                                            <li>
                                                <a href="/porto/demo32-product.html" class="sf-with-ul">Products</a>
                                                <div class="megamenu megamenu-fixed-width">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <a href="#" class="nolink">PRODUCT PAGES</a>
                                                            <ul class="submenu">
                                                                <li><a href="/porto/product.html">SIMPLE PRODUCT</a></li>
                                                                <li><a href="/porto/product-variable.html">VARIABLE PRODUCT</a>
                                                                </li>
                                                                <li><a href="/porto/product.html">SALE PRODUCT</a></li>
                                                                <li><a href="/porto/product.html">FEATURED & ON SALE</a></li>
                                                                <li><a href="/porto/product-custom-tab.html">WITH CUSTOM
                                                                        TAB</a></li>
                                                                <li><a href="/porto/product-sidebar-left.html">WITH LEFT
                                                                        SIDEBAR</a></li>
                                                                <li><a href="/porto/product-sidebar-right.html">WITH RIGHT
                                                                        SIDEBAR</a></li>
                                                                <li><a href="/porto/product-addcart-sticky.html">ADD CART
                                                                        STICKY</a></li>
                                                            </ul>
                                                        </div><!-- End .col-lg-4 -->

                                                        <div class="col-lg-4">
                                                            <a href="#" class="nolink">PRODUCT LAYOUTS</a>
                                                            <ul class="submenu">
                                                                <li><a href="/porto/product-extended-layout.html">EXTENDED
                                                                        LAYOUT</a></li>
                                                                <li><a href="/porto/product-grid-layout.html">GRID IMAGE</a>
                                                                </li>
                                                                <li><a href="/porto/product-full-width.html">FULL WIDTH
                                                                        LAYOUT</a></li>
                                                                <li><a href="/porto/product-sticky-info.html">STICKY INFO</a>
                                                                </li>
                                                                <li><a href="/porto/product-sticky-both.html">LEFT & RIGHT
                                                                        STICKY</a></li>
                                                                <li><a href="/porto/product-transparent-image.html">TRANSPARENT
                                                                        IMAGE</a></li>
                                                                <li><a href="/porto/product-center-vertical.html">CENTER
                                                                        VERTICAL</a></li>
                                                                <li><a href="#">BUILD YOUR OWN</a></li>
                                                            </ul>
                                                        </div><!-- End .col-lg-4 -->

                                                        <div class="col-lg-4 p-0">
                                                            <div class="menu-banner menu-banner-2">
                                                                <figure>
                                                                    <img src="/porto/assets/images/menu-banner-1.jpg"
                                                                        alt="Menu banner" class="product-promo">
                                                                </figure>
                                                                <i>OFF</i>
                                                                <div class="banner-content">
                                                                    <h4>
                                                                        <span class="">UP TO</span><br />
                                                                        <b class="">50%</b>
                                                                    </h4>
                                                                </div>
                                                                <a href="/porto/category.html" class="btn btn-sm btn-dark">SHOP
                                                                    NOW</a>
                                                            </div>
                                                        </div><!-- End .col-lg-4 -->
                                                    </div><!-- End .row -->
                                                </div><!-- End .megamenu -->
                                            </li>
                                            <li class="sf-with-ul">
                                                <a href="#" class="sf-with-ul">Pages</a>
                                                <ul>
                                                    <li><a href="/porto/wishlist.html">Wishlist</a></li>
                                                    <li><a href="/porto/cart.html">Shopping Cart</a></li>
                                                    <li><a href="/porto/checkout.html">Checkout</a></li>
                                                    <li><a href="/porto/dashboard.html">Dashboard</a></li>
                                                    <li><a href="/porto/about.html">About Us</a></li>
                                                    <li><a href="#">Blog</a>
                                                        <ul>
                                                            <li><a href="/porto/blog.html">Blog</a></li>
                                                            <li><a href="/porto/single.html">Blog Post</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="/porto/contact.html">Contact Us</a></li>
                                                    <li><a href="/porto/login.html">Login</a></li>
                                                    <li><a href="/porto/forgot-password.html">Forgot Password</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="https://1.envato.market/DdLk5" target="_blank">Buy Porto!</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>

                                <div class="category-widget">
                                    <div class="widget">
                                        <h3 class="widget-title">
                                            <a data-toggle="collapse" href="#widget-body-2" role="button"
                                                aria-expanded="true" aria-controls="widget-body-2">Categories</a>
                                        </h3>

                                        <div class="collapse show" id="widget-body-2">
                                            <div class="widget-body">
                                                <ul class="cat-list">
                                                    <li>
                                                        <a href="#widget-category-1">Boots
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#widget-category-2">Fashion
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#widget-category-3">Low Shoes
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#widget-category-4">Man
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#widget-category-5">Sports
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#widget-category-6">Summer
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#widget-category-7">Woman
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div><!-- End .widget-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .widget -->

                                    <div class="widget widget-price">
                                        <h3 class="widget-title">
                                            <a data-toggle="collapse" href="#widget-body-3" role="button"
                                                aria-expanded="true" aria-controls="widget-body-3">Filter By Price</a>
                                        </h3>

                                        <div class="collapse show" id="widget-body-3">
                                            <div class="widget-body">
                                                <form action="#">
                                                    <div class="price-slider-wrapper">
                                                        <div id="price-slider"></div><!-- End #price-slider -->
                                                    </div><!-- End .price-slider-wrapper -->

                                                    <div
                                                        class="filter-price-action d-flex align-items-center justify-content-between flex-wrap pb-0">
                                                        <div class="filter-price-text">
                                                            Price:
                                                            <span id="filter-price-range" class="mr-3"></span>
                                                        </div><!-- End .filter-price-text -->

                                                        <button type="submit"
                                                            class="btn btn-primary font2">Filter</button>
                                                    </div><!-- End .filter-price-action -->
                                                </form>
                                            </div><!-- End .widget-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .widget -->

                                    <div class="widget widget-brand">
                                        <h3 class="widget-title">
                                            <a data-toggle="collapse" href="#widget-body-7" role="button"
                                                aria-expanded="true" aria-controls="widget-body-7">Brand</a>
                                        </h3>

                                        <div class="collapse show" id="widget-body-7">
                                            <div class="widget-body pb-0">
                                                <ul class="cat-list">
                                                    <li><a href="#">Adidas</a></li>
                                                    <li><a href="#">Fila</a></li>
                                                    <li><a href="#">Nike</a></li>
                                                </ul>
                                            </div><!-- End .widget-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .widget -->

                                    <div class="widget widget-color">
                                        <h3 class="widget-title">
                                            <a data-toggle="collapse" href="#widget-body-6" role="button"
                                                aria-expanded="true" aria-controls="widget-body-6">Color</a>
                                        </h3>

                                        <div class="collapse show" id="widget-body-6">
                                            <div class="widget-body">
                                                <ul class="config-swatch-list flex-column">
                                                    <li>
                                                        <a href="#" style="background-color: #6085a5;"></a>
                                                        <span>Indego</span>
                                                    </li>
                                                    <li>
                                                        <a href="#" style="background-color: #333;"></a>
                                                        <span>Black</span>
                                                    </li>
                                                    <li>
                                                        <a href="#" style="background-color: #0188cc;"></a>
                                                        <span>Blue</span>
                                                    </li>
                                                </ul>
                                            </div><!-- End .widget-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .widget -->

                                    <div class="widget widget-size">
                                        <h3 class="widget-title">
                                            <a data-toggle="collapse" href="#widget-body-5" role="button"
                                                aria-expanded="true" aria-controls="widget-body-5">Sizes</a>
                                        </h3>

                                        <div class="collapse show" id="widget-body-5">
                                            <div class="widget-body">
                                                <ul class="cat-list">
                                                    <li><a href="#">235</a></li>
                                                    <li><a href="#">240</a></li>
                                                    <li><a href="#">245</a></li>
                                                    <li><a href="#">250</a></li>
                                                    <li><a href="#">255</a></li>
                                                </ul>
                                            </div><!-- End .widget-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .widget -->
                                </div>
                            </div><!-- End .sidebar-wrapper -->
                        </aside><!-- End .col-lg-3 -->
                    </div>

                    <div class="col-xl-8cols col-lg-6 col-md-8">
                        <div class="container p-0">
                            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/porto/demo32.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Shoes</li>
                                </ol>
                            </nav>

                            <div class="home-slide banner-cat d-flex align-items-center mb-3"
                                style="background-image: url('/porto/assets/images/demoes/demo32/banners/category_banner.jpg');">
                                <div class="slide-content">
                                    <div class="content-left">
                                        <div class="divide-txt">
                                            <span class="font2 ls-0">New Brown Collection</span>
                                            <div class="divide-line"></div>
                                        </div>
                                        <h2>Summer Sale</h2>
                                        <h3 class="ls-0">30% OFF</h3>
                                    </div>
                                    <div class="image-info-group">
                                        <a href="/porto/demo32-shop.html" class="btn mt-0">GET YOURS!</a>
                                    </div>
                                </div>
                            </div>

                            <div class="row products-group">
                                <div class="col-lg-12">
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
                                                    <path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z"
                                                        class="cls-2"></path>
                                                    <path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
                                                    <path
                                                        d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z"
                                                        class="cls-2"></path>
                                                </svg>
                                                <span class="mb-0">Filter</span>
                                            </a>

                                            <div class="toolbox-item toolbox-sort">
                                                <label>Sort By:</label>

                                                <div class="select-custom">
                                                    <select name="orderby" class="form-control">
                                                        <option value="menu_order" selected="selected">Default sorting
                                                        </option>
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
                                            <div class="toolbox-item toolbox-show">
                                                <label>Show:</label>

                                                <div class="select-custom">
                                                    <select name="count" class="form-control">
                                                        <option value="12">12</option>
                                                        <option value="24">24</option>
                                                        <option value="36">36</option>
                                                    </select>
                                                </div><!-- End .select-custom -->
                                            </div><!-- End .toolbox-item -->

                                            <div class="toolbox-item layout-modes">
                                                <a href="/porto/category.html" class="layout-btn btn-grid active" title="Grid">
                                                    <i class="icon-mode-grid"></i>
                                                </a>
                                                <a href="/porto/category-list.html" class="layout-btn btn-list" title="List">
                                                    <i class="icon-mode-list"></i>
                                                </a>
                                            </div><!-- End .layout-modes -->
                                        </div><!-- End .toolbox-right -->
                                    </nav>

                                    <div class="row">
                                        <div class="col-6 col-md-4 col-xl-3">
                                            <div class="product-default inner-quickview inner-icon">
                                                <figure>
                                                    <a href="/porto/demo32-product.html">
                                                        <img src="/porto/assets/images/demoes/demo32/products/product-1.jpg"
                                                            width="265" height="265" alt="product" />
                                                    </a>
                                                    <div class="btn-icon-group">
                                                        <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                                class="icon-shopping-cart"></i></a>
                                                    </div>
                                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                        title="Quick View">Quick View</a>
                                                </figure>
                                                <div class="product-details">
                                                    <div class="category-wrap">
                                                        <div class="category-list">
                                                            <a href="/porto/demo32-shop.html"
                                                                class="product-category">category</a>
                                                        </div>
                                                        <a href="#" class="btn-icon-wish"><i
                                                                class="icon-wishlist-2"></i></a>
                                                    </div>
                                                    <h3 class="product-title"> <a href="/porto/demo32-product.html">Black
                                                            Shoes</a> </h3>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span>
                                                            <!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div><!-- End .product-ratings -->
                                                    </div><!-- End .product-container -->
                                                    <div class="price-box">
                                                        <span class="old-price">$90.00</span>
                                                        <span class="product-price">$70.00</span>
                                                    </div><!-- End .price-box -->
                                                </div><!-- End .product-details -->
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-4 col-xl-3">
                                            <div class="product-default inner-quickview inner-icon">
                                                <figure>
                                                    <a href="/porto/demo32-product.html">
                                                        <img src="/porto/assets/images/demoes/demo32/products/product-2.jpg"
                                                            width="265" height="265" alt="product" />
                                                    </a>
                                                    <div class="btn-icon-group">
                                                        <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                                class="icon-shopping-cart"></i></a>
                                                    </div>
                                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                        title="Quick View">Quick View</a>
                                                </figure>
                                                <div class="product-details">
                                                    <div class="category-wrap">
                                                        <div class="category-list">
                                                            <a href="/porto/demo32-shop.html"
                                                                class="product-category">category</a>
                                                        </div>
                                                        <a href="#" class="btn-icon-wish"><i
                                                                class="icon-wishlist-2"></i></a>
                                                    </div>
                                                    <h3 class="product-title"> <a href="/porto/demo32-product.html">The Aged
                                                            Shoes</a> </h3>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span>
                                                            <!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div><!-- End .product-ratings -->
                                                    </div><!-- End .product-container -->
                                                    <div class="price-box">
                                                        <span class="product-price">$49.00</span>
                                                    </div><!-- End .price-box -->
                                                </div><!-- End .product-details -->
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-4 col-xl-3">
                                            <div class="product-default inner-quickview inner-icon">
                                                <figure>
                                                    <a href="/porto/demo32-product.html">
                                                        <img src="/porto/assets/images/demoes/demo32/products/product-3.jpg"
                                                            width="265" height="265" alt="product" />
                                                    </a>
                                                    <div class="btn-icon-group">
                                                        <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                                class="icon-shopping-cart"></i></a>
                                                    </div>
                                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                        title="Quick View">Quick View</a>
                                                </figure>
                                                <div class="product-details">
                                                    <div class="category-wrap">
                                                        <div class="category-list">
                                                            <a href="/porto/demo32-shop.html"
                                                                class="product-category">category</a>
                                                        </div>
                                                        <a href="#" class="btn-icon-wish"><i
                                                                class="icon-wishlist-2"></i></a>
                                                    </div>
                                                    <h3 class="product-title"> <a href="/porto/demo32-product.html">Football
                                                            Shoes</a> </h3>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span>
                                                            <!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div><!-- End .product-ratings -->
                                                    </div><!-- End .product-container -->
                                                    <div class="price-box">
                                                        <span class="old-price">$90.00</span>
                                                        <span class="product-price">$70.00</span>
                                                    </div><!-- End .price-box -->
                                                </div><!-- End .product-details -->
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-4 col-xl-3">
                                            <div class="product-default inner-quickview inner-icon">
                                                <figure>
                                                    <a href="/porto/demo32-product.html">
                                                        <img src="/porto/assets/images/demoes/demo32/products/product-4.jpg"
                                                            width="265" height="265" alt="product" />
                                                    </a>
                                                    <div class="btn-icon-group">
                                                        <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                                class="icon-shopping-cart"></i></a>
                                                    </div>
                                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                        title="Quick View">Quick View</a>
                                                </figure>
                                                <div class="product-details">
                                                    <div class="category-wrap">
                                                        <div class="category-list">
                                                            <a href="/porto/demo32-shop.html"
                                                                class="product-category">category</a>
                                                        </div>
                                                        <a href="#" class="btn-icon-wish"><i
                                                                class="icon-wishlist-2"></i></a>
                                                    </div>
                                                    <h3 class="product-title"> <a href="/porto/demo32-product.html">Light Brown
                                                            Shoes</a> </h3>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span>
                                                            <!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div><!-- End .product-ratings -->
                                                    </div><!-- End .product-container -->
                                                    <div class="price-box">
                                                        <span class="product-price">$49.00</span>
                                                    </div><!-- End .price-box -->
                                                </div><!-- End .product-details -->
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-4 col-xl-3">
                                            <div class="product-default inner-quickview inner-icon">
                                                <figure>
                                                    <a href="/porto/demo32-product.html">
                                                        <img src="/porto/assets/images/demoes/demo32/products/product-5.jpg"
                                                            width="265" height="265" alt="product" />
                                                    </a>
                                                    <div class="btn-icon-group">
                                                        <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                                class="icon-shopping-cart"></i></a>
                                                    </div>
                                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                        title="Quick View">Quick View</a>
                                                </figure>
                                                <div class="product-details">
                                                    <div class="category-wrap">
                                                        <div class="category-list">
                                                            <a href="/porto/demo32-shop.html"
                                                                class="product-category">category</a>
                                                        </div>
                                                        <a href="#" class="btn-icon-wish"><i
                                                                class="icon-wishlist-2"></i></a>
                                                    </div>
                                                    <h3 class="product-title"> <a href="/porto/demo32-product.html">Brown
                                                            Shoes</a> </h3>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span>
                                                            <!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div><!-- End .product-ratings -->
                                                    </div><!-- End .product-container -->
                                                    <div class="price-box">
                                                        <span class="product-price">$49.00</span>
                                                    </div><!-- End .price-box -->
                                                </div><!-- End .product-details -->
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-4 col-xl-3">
                                            <div class="product-default inner-quickview inner-icon">
                                                <figure>
                                                    <a href="/porto/demo32-product.html">
                                                        <img src="/porto/assets/images/demoes/demo32/products/product-6.jpg"
                                                            width="265" height="265" alt="product" />
                                                    </a>
                                                    <div class="btn-icon-group">
                                                        <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                                class="icon-shopping-cart"></i></a>
                                                    </div>
                                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                        title="Quick View">Quick View</a>
                                                </figure>
                                                <div class="product-details">
                                                    <div class="category-wrap">
                                                        <div class="category-list">
                                                            <a href="/porto/demo32-shop.html"
                                                                class="product-category">category</a>
                                                        </div>
                                                        <a href="#" class="btn-icon-wish"><i
                                                                class="icon-wishlist-2"></i></a>
                                                    </div>
                                                    <h3 class="product-title"> <a href="/porto/demo32-product.html">Fashion Low
                                                            Shoes</a> </h3>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span>
                                                            <!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div><!-- End .product-ratings -->
                                                    </div><!-- End .product-container -->
                                                    <div class="price-box">
                                                        <span class="old-price">$90.00</span>
                                                        <span class="product-price">$70.00</span>
                                                    </div><!-- End .price-box -->
                                                </div><!-- End .product-details -->
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-4 col-xl-3">
                                            <div class="product-default inner-quickview inner-icon">
                                                <figure>
                                                    <a href="/porto/demo32-product.html">
                                                        <img src="/porto/assets/images/demoes/demo32/products/product-7.jpg"
                                                            width="265" height="265" alt="product" />
                                                    </a>
                                                    <div class="btn-icon-group">
                                                        <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                                class="icon-shopping-cart"></i></a>
                                                    </div>
                                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                        title="Quick View">Quick View</a>
                                                </figure>
                                                <div class="product-details">
                                                    <div class="category-wrap">
                                                        <div class="category-list">
                                                            <a href="/porto/demo32-shop.html"
                                                                class="product-category">category</a>
                                                        </div>
                                                        <a href="#" class="btn-icon-wish"><i
                                                                class="icon-wishlist-2"></i></a>
                                                    </div>
                                                    <h3 class="product-title"> <a href="/porto/demo32-product.html">Spring Low
                                                            Shoes</a> </h3>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span>
                                                            <!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div><!-- End .product-ratings -->
                                                    </div><!-- End .product-container -->
                                                    <div class="price-box">
                                                        <span class="product-price">$49.00</span>
                                                    </div><!-- End .price-box -->
                                                </div><!-- End .product-details -->
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-4 col-xl-3">
                                            <div class="product-default inner-quickview inner-icon">
                                                <figure>
                                                    <a href="/porto/demo32-product.html">
                                                        <img src="/porto/assets/images/demoes/demo32/products/product-8.jpg"
                                                            width="265" height="265" alt="product" />
                                                    </a>
                                                    <div class="btn-icon-group">
                                                        <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                                class="icon-shopping-cart"></i></a>
                                                    </div>
                                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                        title="Quick View">Quick View</a>
                                                </figure>
                                                <div class="product-details">
                                                    <div class="category-wrap">
                                                        <div class="category-list">
                                                            <a href="/porto/demo32-shop.html"
                                                                class="product-category">category</a>
                                                        </div>
                                                        <a href="#" class="btn-icon-wish"><i
                                                                class="icon-wishlist-2"></i></a>
                                                    </div>
                                                    <h3 class="product-title"> <a href="/porto/demo32-product.html">Yellow Men
                                                            Shoes</a> </h3>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span>
                                                            <!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div><!-- End .product-ratings -->
                                                    </div><!-- End .product-container -->
                                                    <div class="price-box">
                                                        <span class="product-price">$49.00</span>
                                                    </div><!-- End .price-box -->
                                                </div><!-- End .product-details -->
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-4 col-xl-3">
                                            <div class="product-default inner-quickview inner-icon">
                                                <figure>
                                                    <a href="/porto/demo32-product.html">
                                                        <img src="/porto/assets/images/demoes/demo32/products/product-9.jpg"
                                                            width="265" height="265" alt="product" />
                                                    </a>
                                                    <div class="btn-icon-group">
                                                        <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                                class="icon-shopping-cart"></i></a>
                                                    </div>
                                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                        title="Quick View">Quick View</a>
                                                </figure>
                                                <div class="product-details">
                                                    <div class="category-wrap">
                                                        <div class="category-list">
                                                            <a href="/porto/demo32-shop.html"
                                                                class="product-category">category</a>
                                                        </div>
                                                        <a href="#" class="btn-icon-wish"><i
                                                                class="icon-wishlist-2"></i></a>
                                                    </div>
                                                    <h3 class="product-title"> <a href="/porto/demo32-product.html">Fashion
                                                            Girl Winter Shoes</a> </h3>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span>
                                                            <!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div><!-- End .product-ratings -->
                                                    </div><!-- End .product-container -->
                                                    <div class="price-box">
                                                        <span class="old-price">$90.00</span>
                                                        <span class="product-price">$70.00</span>
                                                    </div><!-- End .price-box -->
                                                </div><!-- End .product-details -->
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-4 col-xl-3">
                                            <div class="product-default inner-quickview inner-icon">
                                                <figure>
                                                    <a href="/porto/demo32-product.html">
                                                        <img src="/porto/assets/images/demoes/demo32/products/product-5.jpg"
                                                            width="265" height="265" alt="product" />
                                                    </a>
                                                    <div class="btn-icon-group">
                                                        <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                                class="icon-shopping-cart"></i></a>
                                                    </div>
                                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                        title="Quick View">Quick View</a>
                                                </figure>
                                                <div class="product-details">
                                                    <div class="category-wrap">
                                                        <div class="category-list">
                                                            <a href="/porto/demo32-shop.html"
                                                                class="product-category">category</a>
                                                        </div>
                                                        <a href="#" class="btn-icon-wish"><i
                                                                class="icon-wishlist-2"></i></a>
                                                    </div>
                                                    <h3 class="product-title"> <a href="/porto/demo32-product.html">Brown
                                                            Shoes</a> </h3>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span>
                                                            <!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div><!-- End .product-ratings -->
                                                    </div><!-- End .product-container -->
                                                    <div class="price-box">
                                                        <span class="product-price">$49.00</span>
                                                    </div><!-- End .price-box -->
                                                </div><!-- End .product-details -->
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-4 col-xl-3">
                                            <div class="product-default inner-quickview inner-icon">
                                                <figure>
                                                    <a href="/porto/demo32-product.html">
                                                        <img src="/porto/assets/images/demoes/demo32/products/product-1.jpg"
                                                            width="265" height="265" alt="product" />
                                                    </a>
                                                    <div class="btn-icon-group">
                                                        <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                                class="icon-shopping-cart"></i></a>
                                                    </div>
                                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                        title="Quick View">Quick View</a>
                                                </figure>
                                                <div class="product-details">
                                                    <div class="category-wrap">
                                                        <div class="category-list">
                                                            <a href="/porto/demo32-shop.html"
                                                                class="product-category">category</a>
                                                        </div>
                                                        <a href="#" class="btn-icon-wish"><i
                                                                class="icon-wishlist-2"></i></a>
                                                    </div>
                                                    <h3 class="product-title"> <a href="/porto/demo32-product.html">Black
                                                            Shoes</a> </h3>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span>
                                                            <!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div><!-- End .product-ratings -->
                                                    </div><!-- End .product-container -->
                                                    <div class="price-box">
                                                        <span class="old-price">$90.00</span>
                                                        <span class="product-price">$70.00</span>
                                                    </div><!-- End .price-box -->
                                                </div><!-- End .product-details -->
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-4 col-xl-3">
                                            <div class="product-default inner-quickview inner-icon">
                                                <figure>
                                                    <a href="/porto/demo32-product.html">
                                                        <img src="/porto/assets/images/demoes/demo32/products/product-7.jpg"
                                                            width="265" height="265" alt="product" />
                                                    </a>
                                                    <div class="btn-icon-group">
                                                        <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                                class="icon-shopping-cart"></i></a>
                                                    </div>
                                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                        title="Quick View">Quick View</a>
                                                </figure>
                                                <div class="product-details">
                                                    <div class="category-wrap">
                                                        <div class="category-list">
                                                            <a href="/porto/demo32-shop.html"
                                                                class="product-category">category</a>
                                                        </div>
                                                        <a href="#" class="btn-icon-wish"><i
                                                                class="icon-wishlist-2"></i></a>
                                                    </div>
                                                    <h3 class="product-title"> <a href="/porto/demo32-product.html">Spring Low
                                                            Shoes</a> </h3>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span>
                                                            <!-- End .ratings -->
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

                                    <nav class="toolbox toolbox-pagination">
                                        <div class="toolbox-item toolbox-show">
                                            <label>Show:</label>

                                            <div class="select-custom">
                                                <select name="count" class="form-control">
                                                    <option value="12">12</option>
                                                    <option value="24">24</option>
                                                    <option value="36">36</option>
                                                </select>
                                            </div><!-- End .select-custom -->
                                        </div><!-- End .toolbox-item -->

                                        <ul class="pagination toolbox-item">
                                            <li class="page-item disabled">
                                                <a class="page-link page-link-btn" href="#"><i
                                                        class="icon-angle-left"></i></a>
                                            </li>
                                            <li class="page-item active">
                                                <a class="page-link" href="#">1 <span
                                                        class="sr-only">(current)</span></a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><span class="page-link">...</span></li>
                                            <li class="page-item">
                                                <a class="page-link page-link-btn" href="#"><i
                                                        class="icon-angle-right"></i></a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2cols col-lg-3 col-md-4">
                        <aside class="sidebar-product d-block">
                            <div class="sidebar-wrapper"
                                data-sticky-sidebar-options='{"minWidth": 768, "offsetTop": 72}'>
                                <div class="widget">
                                    <h3 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-body-8" role="button"
                                            aria-expanded="true" aria-controls="widget-body-8">Custom HTML Block</a>
                                    </h3>

                                    <div class="collapse show" id="widget-body-8">
                                        <div class="widget-body">
                                            <h4 class="widget-subtitle">This is a custom sub-title.</h4>

                                            <p class="mb-4 ls-0">Lorem ipsum dolor sit amet, con sec tetur elitad.</p>
                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .widget -->

                                <div class="widget widget-banner pb-2">
                                    <div class="product-category">
                                        <a href="/porto/demo32-shop.html">
                                            <figure>
                                                <img src="/porto/assets/images/demoes/demo32/banners/banner-sidebar.jpg"
                                                    width="266" height="266" alt="Banner" />
                                            </figure>

                                            <div class="category-content content-right p-0">
                                                <h3>Sport<br>Shoes</h3>
                                            </div>
                                        </a>
                                    </div>
                                </div><!-- End .widget -->
                            </div>
                        </aside><!-- End .col-md-3 -->
                    </div>
                </div>
            </div>
@section('footer')
    @include('porto.demo32.footer')
@endsection

@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
