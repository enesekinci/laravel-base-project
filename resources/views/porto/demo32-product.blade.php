@extends('layouts.porto')

@section('header')
    @include('components.porto.header')
@endsection

@section('content')
<div class="container-fluid">
                <div class="row">
                    <div class="col-xl-2cols col-lg-3">
                        <div class="sidebar-overlay"></div>
                        <div class="sidebar-toggle custom-sidebar-toggle"><i class="fas fa-sliders-h"></i></div>
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

                            <div class="product-single-container product-single-default">
                                <div class="cart-message d-none">
                                    <strong class="single-cart-notice">“Men Black Sports Shoes”</strong>
                                    <span>has been added to your cart.</span>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 product-single-gallery">
                                        <div class="product-slider-container">
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                                <!---->
                                                <div class="product-label label-sale">
                                                    -16%
                                                </div>
                                            </div>

                                            <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                                                <div class="product-item">
                                                    <img class="product-single-image"
                                                        src="/porto/assets/images/products/zoom/product-1-big.jpg"
                                                        data-zoom-image="/porto/assets/images/products/zoom/product-1-big.jpg"
                                                        width="468" height="468" alt="product" />
                                                </div>
                                                <div class="product-item">
                                                    <img class="product-single-image"
                                                        src="/porto/assets/images/products/zoom/product-2-big.jpg"
                                                        data-zoom-image="/porto/assets/images/products/zoom/product-2-big.jpg"
                                                        width="468" height="468" alt="product" />
                                                </div>
                                                <div class="product-item">
                                                    <img class="product-single-image"
                                                        src="/porto/assets/images/products/zoom/product-3-big.jpg"
                                                        data-zoom-image="/porto/assets/images/products/zoom/product-3-big.jpg"
                                                        width="468" height="468" alt="product" />
                                                </div>
                                                <div class="product-item">
                                                    <img class="product-single-image"
                                                        src="/porto/assets/images/products/zoom/product-4-big.jpg"
                                                        data-zoom-image="/porto/assets/images/products/zoom/product-4-big.jpg"
                                                        width="468" height="468" alt="product" />
                                                </div>
                                                <div class="product-item">
                                                    <img class="product-single-image"
                                                        src="/porto/assets/images/products/zoom/product-5-big.jpg"
                                                        data-zoom-image="/porto/assets/images/products/zoom/product-5-big.jpg"
                                                        width="468" height="468" alt="product" />
                                                </div>
                                            </div>
                                            <!-- End .product-single-carousel -->
                                            <span class="prod-full-screen">
                                                <i class="icon-plus"></i>
                                            </span>
                                        </div>

                                        <div class="prod-thumbnail owl-dots">
                                            <div class="owl-dot">
                                                <img src="/porto/assets/images/products/zoom/product-1.jpg" width="110"
                                                    height="110" alt="product-thumbnail" />
                                            </div>
                                            <div class="owl-dot">
                                                <img src="/porto/assets/images/products/zoom/product-2.jpg" width="110"
                                                    height="110" alt="product-thumbnail" />
                                            </div>
                                            <div class="owl-dot">
                                                <img src="/porto/assets/images/products/zoom/product-3.jpg" width="110"
                                                    height="110" alt="product-thumbnail" />
                                            </div>
                                            <div class="owl-dot">
                                                <img src="/porto/assets/images/products/zoom/product-4.jpg" width="110"
                                                    height="110" alt="product-thumbnail" />
                                            </div>
                                            <div class="owl-dot">
                                                <img src="/porto/assets/images/products/zoom/product-5.jpg" width="110"
                                                    height="110" alt="product-thumbnail" />
                                            </div>
                                        </div>
                                    </div><!-- End .product-single-gallery -->

                                    <div class="col-md-6 product-single-details">
                                        <h1 class="product-title">Men Black Sports Shoes</h1>

                                        <div class="product-nav">
                                            <div class="product-prev">
                                                <a href="#">
                                                    <span class="product-link"></span>

                                                    <span class="product-popup">
                                                        <span class="box-content">
                                                            <img alt="product" width="150" height="150"
                                                                src="/porto/assets/images/products/product-3.jpg"
                                                                style="padding-top: 0px;">

                                                            <span>Circled Ultimate 3D Speaker</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </div>

                                            <div class="product-next">
                                                <a href="#">
                                                    <span class="product-link"></span>

                                                    <span class="product-popup">
                                                        <span class="box-content">
                                                            <img alt="product" width="150" height="150"
                                                                src="/porto/assets/images/products/product-4.jpg"
                                                                style="padding-top: 0px;">

                                                            <span>Blue Backpack for the Young</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:60%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->

                                            <a href="#" class="rating-link">( 6 Reviews )</a>
                                        </div><!-- End .ratings-container -->

                                        <hr class="short-divider">

                                        <div class="price-box">
                                            <span class="product-price">$15.00 &ndash; </span>
                                            <span class="product-price"> $35.00</span>
                                        </div><!-- End .price-box -->

                                        <div class="product-desc">
                                            <p>
                                                Pellentesque habitant morbi tristique senectus et netus et malesuada
                                                fames ac turpis
                                                egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor
                                                sit amet,
                                                ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi
                                                vitae est.
                                                Mauris placerat eleifend leo.
                                            </p>
                                        </div><!-- End .product-desc -->

                                        <ul class="single-info-list">
                                            <!---->
                                            <li>
                                                SKU:
                                                <strong>654613612</strong>
                                            </li>

                                            <li>
                                                CATEGORY:
                                                <strong>
                                                    <a href="#" class="product-category">SHOES</a>
                                                </strong>
                                            </li>
                                        </ul>

                                        <div class="product-filters-container">
                                            <div class="product-single-filter">
                                                <label class="font2 pb-2">Color:</label>
                                                <ul class="config-size-list config-img-list">
                                                    <li>
                                                        <a href="javascript:;"
                                                            class="d-flex align-items-center justify-content-center p-0">
                                                            <img src="/porto/assets/images/demoes/demo32/products/zoom/product-1.jpg"
                                                                width="30" height="30" alt="filter-img" />
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;"
                                                            class="d-flex align-items-center justify-content-center p-0">
                                                            <img src="/porto/assets/images/demoes/demo32/products/zoom/product-2.jpg"
                                                                width="30" height="30" alt="filter-img" />
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;"
                                                            class="d-flex align-items-center justify-content-center p-0">
                                                            <img src="/porto/assets/images/demoes/demo32/products/zoom/product-3.jpg"
                                                                width="30" height="30" alt="filter-img" />
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="product-single-filter">
                                                <label class="font2">Size:</label>
                                                <ul class="config-size-list">
                                                    <li><a href="javascript:;"
                                                            class="d-flex align-items-center justify-content-center">235</a>
                                                    </li>
                                                    <li class=""><a href="javascript:;"
                                                            class="d-flex align-items-center justify-content-center">240</a>
                                                    </li>
                                                    <li class=""><a href="javascript:;"
                                                            class="d-flex align-items-center justify-content-center">245</a>
                                                    </li>
                                                    <li class=""><a href="javascript:;"
                                                            class="d-flex align-items-center justify-content-center">250</a>
                                                    </li>
                                                    <li class=""><a href="javascript:;"
                                                            class="d-flex align-items-center justify-content-center">255</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="product-single-filter">
                                                <label></label>
                                                <a class="font1 text-uppercase clear-btn" href="#">Clear</a>
                                            </div>
                                            <!---->
                                        </div>

                                        <div class="product-action">
                                            <div class="price-box product-filtered-price">
                                                <del class="old-price"><span>$286.00</span></del>
                                                <span class="product-price">$245.00</span>
                                            </div>

                                            <div class="product-single-qty">
                                                <input class="horizontal-quantity form-control" type="text">
                                            </div><!-- End .product-single-qty -->

                                            <a href="javascript:;" class="btn btn-dark add-cart mr-2"
                                                title="Add to Cart">Add to
                                                Cart</a>

                                            <a href="/porto/cart.html" class="btn btn-gray view-cart d-none">View cart</a>
                                        </div><!-- End .product-action -->

                                        <hr class="divider mb-0 mt-0">

                                        <div class="product-single-share mb-2">
                                            <label class="sr-only">Share:</label>

                                            <div class="social-icons mr-2">
                                                <a href="#" class="social-icon social-facebook icon-facebook"
                                                    target="_blank" title="Facebook"></a>
                                                <a href="#" class="social-icon social-twitter icon-twitter"
                                                    target="_blank" title="Twitter"></a>
                                                <a href="#" class="social-icon social-linkedin fab fa-linkedin-in"
                                                    target="_blank" title="Linkedin"></a>
                                                <a href="#" class="social-icon social-gplus fab fa-google-plus-g"
                                                    target="_blank" title="Google +"></a>
                                                <a href="#" class="social-icon social-mail icon-mail-alt"
                                                    target="_blank" title="Mail"></a>
                                            </div><!-- End .social-icons -->

                                            <a href="/porto/wishlist.html" class="btn-icon-wish add-wishlist"
                                                title="Add to Wishlist"><i class="icon-wishlist-2"></i><span>Add to
                                                    Wishlist</span></a>
                                        </div><!-- End .product single-share -->
                                    </div><!-- End .product-single-details -->
                                </div><!-- End .row -->
                            </div><!-- End .product-single-container -->

                            <div class="product-single-tabs">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" id="product-tab-desc" data-toggle="tab"
                                            href="#product-desc-content" role="tab" aria-controls="product-desc-content"
                                            aria-selected="false">Description</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="product-tab-tags" data-toggle="tab"
                                            href="#product-tags-content" role="tab" aria-controls="product-tags-content"
                                            aria-selected="false">Additional
                                            Information</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link active" id="product-tab-reviews" data-toggle="tab"
                                            href="#product-reviews-content" role="tab"
                                            aria-controls="product-reviews-content" aria-selected="true">Reviews
                                            (1)</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="product-tab-size" data-toggle="tab"
                                            href="#product-size-content" role="tab" aria-controls="product-size-content"
                                            aria-selected="true">Size Guide</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade" id="product-desc-content" role="tabpanel"
                                        aria-labelledby="product-tab-desc">
                                        <div class="product-desc-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor
                                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                nostrud ipsum
                                                consectetur sed do, quis nostrud exercitation ullamco laboris nisi ut
                                                aliquip ex ea
                                                commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                                velit esse
                                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
                                            <ul>
                                                <li>Any Product types that You want - Simple,
                                                    Configurable</li>
                                                <li>Downloadable/Digital Products, Virtual
                                                    Products</li>
                                                <li>Inventory Management with Backordered items
                                                </li>
                                            </ul>
                                            <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                enim ad minim
                                                veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                                commodo
                                                consequat. </p>
                                        </div><!-- End .product-desc-content -->
                                    </div><!-- End .tab-pane -->

                                    <div class="tab-pane fade" id="product-tags-content" role="tabpanel"
                                        aria-labelledby="product-tab-tags">
                                        <table class="table table-striped mt-2">
                                            <tbody>
                                                <tr>
                                                    <th>Weight</th>
                                                    <td>23 kg</td>
                                                </tr>

                                                <tr>
                                                    <th>Dimensions</th>
                                                    <td>12 × 24 × 35 cm</td>
                                                </tr>

                                                <tr>
                                                    <th>Color</th>
                                                    <td>Black, Green, Indigo</td>
                                                </tr>

                                                <tr>
                                                    <th>Size</th>
                                                    <td>Large, Medium, Small</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div><!-- End .tab-pane -->

                                    <div class="tab-pane fade show active" id="product-reviews-content" role="tabpanel"
                                        aria-labelledby="product-tab-reviews">
                                        <div class="product-reviews-content">
                                            <h3 class="reviews-title">1 review for Men Black Sports Shoes</h3>

                                            <div class="comment-list">
                                                <div class="comments">
                                                    <figure class="img-thumbnail">
                                                        <img src="/porto/assets/images/blog/author.jpg" alt="author" width="80"
                                                            height="80">
                                                    </figure>

                                                    <div class="comment-block">
                                                        <div class="comment-header">
                                                            <div class="comment-arrow"></div>

                                                            <div class="ratings-container float-sm-right">
                                                                <div class="product-ratings">
                                                                    <span class="ratings" style="width:60%"></span>
                                                                    <!-- End .ratings -->
                                                                    <span class="tooltiptext tooltip-top"></span>
                                                                </div><!-- End .product-ratings -->
                                                            </div>

                                                            <span class="comment-by">
                                                                <strong>Joe Doe</strong> – April 12, 2018
                                                            </span>
                                                        </div>

                                                        <div class="comment-content">
                                                            <p>Excellent.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="divider"></div>

                                            <div class="add-product-review">
                                                <h3 class="review-title">Add a review</h3>

                                                <form action="#" class="comment-form m-0">
                                                    <div class="rating-form">
                                                        <label for="rating">Your rating <span
                                                                class="required">*</span></label>
                                                        <span class="rating-stars">
                                                            <a class="star-1" href="#">1</a>
                                                            <a class="star-2" href="#">2</a>
                                                            <a class="star-3" href="#">3</a>
                                                            <a class="star-4" href="#">4</a>
                                                            <a class="star-5" href="#">5</a>
                                                        </span>

                                                        <select name="rating" id="rating" required=""
                                                            style="display: none;">
                                                            <option value="">Rate…</option>
                                                            <option value="5">Perfect</option>
                                                            <option value="4">Good</option>
                                                            <option value="3">Average</option>
                                                            <option value="2">Not that bad</option>
                                                            <option value="1">Very poor</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Your review <span class="required">*</span></label>
                                                        <textarea cols="5" rows="6"
                                                            class="form-control form-control-sm"></textarea>
                                                    </div><!-- End .form-group -->


                                                    <div class="row">
                                                        <div class="col-md-6 col-xl-12">
                                                            <div class="form-group">
                                                                <label>Name <span class="required">*</span></label>
                                                                <input type="text" class="form-control form-control-sm"
                                                                    required>
                                                            </div><!-- End .form-group -->
                                                        </div>

                                                        <div class="col-md-6 col-xl-12">
                                                            <div class="form-group">
                                                                <label>Email <span class="required">*</span></label>
                                                                <input type="text" class="form-control form-control-sm"
                                                                    required>
                                                            </div><!-- End .form-group -->
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="save-name" />
                                                                <label class="custom-control-label mb-0"
                                                                    for="save-name">Save my
                                                                    name, email, and website in this browser for the
                                                                    next time I
                                                                    comment.</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <input type="submit" class="btn btn-primary" value="Submit">
                                                </form>
                                            </div><!-- End .add-product-review -->
                                        </div><!-- End .product-reviews-content -->
                                    </div><!-- End .tab-pane -->

                                    <div class="tab-pane fade" id="product-size-content" role="tabpanel"
                                        aria-labelledby="product-tab-size">
                                        <div class="product-size-content">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img src="/porto/assets/images/products/single/body-shape.png"
                                                        alt="body shape">
                                                </div><!-- End .col-md-4 -->

                                                <div class="col-md-8">
                                                    <table class="table table-size">
                                                        <thead>
                                                            <tr>
                                                                <th>SIZE</th>
                                                                <th>CHEST (in.)</th>
                                                                <th>WAIST (in.)</th>
                                                                <th>HIPS (in.)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>XS</td>
                                                                <td>34-36</td>
                                                                <td>27-29</td>
                                                                <td>34.5-36.5</td>
                                                            </tr>
                                                            <tr>
                                                                <td>S</td>
                                                                <td>36-38</td>
                                                                <td>29-31</td>
                                                                <td>36.5-38.5</td>
                                                            </tr>
                                                            <tr>
                                                                <td>M</td>
                                                                <td>38-40</td>
                                                                <td>31-33</td>
                                                                <td>38.5-40.5</td>
                                                            </tr>
                                                            <tr>
                                                                <td>L</td>
                                                                <td>40-42</td>
                                                                <td>33-36</td>
                                                                <td>40.5-43.5</td>
                                                            </tr>
                                                            <tr>
                                                                <td>XL</td>
                                                                <td>42-45</td>
                                                                <td>36-40</td>
                                                                <td>43.5-47.5</td>
                                                            </tr>
                                                            <tr>
                                                                <td>XLL</td>
                                                                <td>45-48</td>
                                                                <td>40-44</td>
                                                                <td>47.5-51.5</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div><!-- End .row -->
                                        </div><!-- End .product-size-content -->
                                    </div><!-- End .tab-pane -->
                                </div><!-- End .tab-content -->
                            </div><!-- End .product-single-tabs -->
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

                <div class="products-section pt-0">
                    <h2 class="section-title ls-10">Related Products</h2>

                    <div class="products-slider owl-carousel owl-theme dots-top dots-small 5col" data-owl-options="{
                        'dots': true
                    }">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo32-product.html">
                                    <img src="/porto/assets/images/demoes/demo32/products/product-1.jpg" width="265"
                                        height="265" alt="product" />
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
                                <h3 class="product-title">
                                    <a href="/porto/demo32-product.html">Black Shoes</a>
                                </h3>
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

                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo32-product.html">
                                    <img src="/porto/assets/images/demoes/demo32/products/product-2.jpg" width="265"
                                        height="265" alt="product" />
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
                                <h3 class="product-title">
                                    <a href="/porto/demo32-product.html">The Aged Shoes</a>
                                </h3>
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

                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo32-product.html">
                                    <img src="/porto/assets/images/demoes/demo32/products/product-4.jpg" width="265"
                                        height="265" alt="product" />
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
                                <h3 class="product-title">
                                    <a href="/porto/demo32-product.html">Light Brown Shoes</a>
                                </h3>
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

                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo32-product.html">
                                    <img src="/porto/assets/images/demoes/demo32/products/product-5.jpg" width="265"
                                        height="265" alt="product" />
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
                                <h3 class="product-title">
                                    <a href="/porto/demo32-product.html">Brown Shoes</a>
                                </h3>
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

                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo32-product.html">
                                    <img src="/porto/assets/images/demoes/demo32/products/product-6.jpg" width="265"
                                        height="265" alt="product" />
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
                                <h3 class="product-title">
                                    <a href="/porto/demo32-product.html">Fashion Low Shoes</a>
                                </h3>
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

                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo32-product.html">
                                    <img src="/porto/assets/images/demoes/demo32/products/product-14.jpg" width="265"
                                        height="265" alt="product" />
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
                                <h3 class="product-title">
                                    <a href="/porto/demo32-product.html">Yellow Sports Shoes</a>
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
                    </div><!-- End .products-slider -->
                </div><!-- End .products-section -->
            </div>
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
