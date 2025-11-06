@extends('layouts.porto')

@section('top-notice')
    @include('components.porto.demo20.top-notice')
@endsection

@section('header')
    @include('components.porto.demo20.header')
@endsection

@section('footer')
    @include('components.porto.demo20.footer')
@endsection

@section('content')
<div class="category-banner-container">
                <div class="container">
                    <div class="banner banner1" style="background-color: #eee;">
                        <figure>
                            <img src="/porto/assets/images/demoes/demo20/banners/shop-banner.jpg" alt="banner" width="779"
                                height="464">
                        </figure>

                        <div class="banner-layer banner-layer-middle banner-layer-left">
                            <h3 class="text-body m-b-1 ml-0">Save Big Sale</h3>
                            <h4 class="d-flex align-items-center text-uppercase m-b-2">50%<small
                                    class="d-inline-block">Off</small></h4>
                            <h5 class="mb-1">
                                <span class="d-inline-block align-top ls-n-20 text-uppercase">Starting At</span>
                                <b
                                    class="coupon-sale-text d-inline-block ls-n-20 text-primary mb-0"><sup>$</sup>199<sup>99</sup></b>
                            </h5>
                            <a href="/porto/demo20-shop.html" class="btn btn-sm text-uppercase ls-10">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <nav aria-label="breadcrumb" class="breadcrumb-nav">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/porto/demo20.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shop</li>
                    </ol>
                </nav>

                <div class="row pt-3">
                    <div class="col-lg-9 main-content">
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

                        <div class="row mb-2">
                            <div class="col-6 col-sm-4">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo20-product.html">
                                            <img src="/porto/assets/images/demoes/demo20/products/product-1.jpg" width="280"
                                                height="280" alt="product">
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
                                                <a href="/porto/demo20-shop.html" class="product-category">category</a>
                                            </div>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo20-product.html">Brown Food Recipient</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$56.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div><!-- End .col-sm-4 -->
                            <div class="col-6 col-sm-4">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo20-product.html">
                                            <img src="/porto/assets/images/demoes/demo20/products/product-2.jpg" width="280"
                                                height="280" alt="product">
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
                                                <a href="/porto/demo20-shop.html" class="product-category">category</a>
                                            </div>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo20-product.html">Modern White Chair</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$76.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div><!-- End .col-sm-4 -->
                            <div class="col-6 col-sm-4">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo20-product.html">
                                            <img src="/porto/assets/images/demoes/demo20/products/product-3.jpg" width="280"
                                                height="280" alt="product">
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
                                                <a href="/porto/demo20-shop.html" class="product-category">category</a>
                                            </div>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo20-product.html">Black Metal Light Bulb</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$56.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div><!-- End .col-sm-4 -->
                            <div class="col-6 col-sm-4">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo20-product.html">
                                            <img src="/porto/assets/images/demoes/demo20/products/product-4.jpg" width="280"
                                                height="280" alt="product">
                                        </a>
                                        <div class="btn-icon-group">
                                            <a href="/porto/demo20-product.html" class="btn-icon btn-add-cart"><i
                                                    class="fa fa-arrow-right"></i></a>
                                        </div>
                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="/porto/demo20-shop.html" class="product-category">category</a>
                                            </div>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo20-product.html">A White Chair</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$199.00 &ndash; $200.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div><!-- End .col-sm-4 -->
                            <div class="col-6 col-sm-4">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo20-product.html">
                                            <img src="/porto/assets/images/demoes/demo20/products/product-5.jpg" width="280"
                                                height="280" alt="product">
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
                                                <a href="/porto/demo20-shop.html" class="product-category">category</a>
                                            </div>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo20-product.html">Black Chair Top</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:85%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$88.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div><!-- End .col-sm-4 -->
                            <div class="col-6 col-sm-4">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo20-product.html">
                                            <img src="/porto/assets/images/demoes/demo20/products/product-6.jpg" width="280"
                                                height="280" alt="product">
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
                                                <a href="/porto/demo20-shop.html" class="product-category">category</a>
                                            </div>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo20-product.html">Black Sofa</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$188.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div><!-- End .col-sm-4 -->
                            <div class="col-6 col-sm-4">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo20-product.html">
                                            <img src="/porto/assets/images/demoes/demo20/products/product-7.jpg" width="280"
                                                height="280" alt="product">
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
                                                <a href="/porto/demo20-shop.html" class="product-category">category</a>
                                            </div>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo20-product.html">Porto Vertical Thumb</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:85%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$101.00 &ndash; $111.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div><!-- End .col-sm-4 -->
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
                                    <a class="page-link page-link-btn" href="#"><i class="icon-angle-left"></i></a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><span class="page-link">...</span></li>
                                <li class="page-item">
                                    <a class="page-link page-link-btn" href="#"><i class="icon-angle-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div><!-- End .col-lg-9 -->

                    <div class="sidebar-overlay"></div>
                    <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
                        <div class="sidebar-wrapper">
                            <div class="widget">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-1" role="button" aria-expanded="true"
                                        aria-controls="widget-body-1">Categories</a>
                                </h3>

                                <div class="collapse show" id="widget-body-1">
                                    <div class="widget-body">
                                        <ul class="cat-list">
                                            <li>
                                                <a href="#widget-category-1" data-toggle="collapse" role="button"
                                                    aria-expanded="true" aria-controls="widget-category-1">
                                                    Accessories<span class="products-count">(3)</span>
                                                    <span class="toggle"></span>
                                                </a>
                                                <div class="collapse show" id="widget-category-1">
                                                    <ul class="cat-sublist">
                                                        <li>Caps<span class="products-count">(1)</span></li>
                                                        <li>Watches<span class="products-count">(2)</span></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#widget-category-2" class="collapsed" data-toggle="collapse"
                                                    role="button" aria-expanded="false"
                                                    aria-controls="widget-category-2">
                                                    Dress<span class="products-count">(4)</span>
                                                    <span class="toggle"></span>
                                                </a>
                                                <div class="collapse" id="widget-category-2">
                                                    <ul class="cat-sublist">
                                                        <li>Clothing<span class="products-count">(4)</span></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#widget-category-3" class="collapsed" data-toggle="collapse"
                                                    role="button" aria-expanded="false"
                                                    aria-controls="widget-category-3">
                                                    Electronics<span class="products-count">(2)</span>
                                                    <span class="toggle"></span>
                                                </a>
                                                <div class="collapse" id="widget-category-3">
                                                    <ul class="cat-sublist">
                                                        <li>Headphone<span class="products-count">(1)</span></li>
                                                        <li>Watch<span class="products-count">(1)</span></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#widget-category-4" class="collapsed" data-toggle="collapse"
                                                    role="button" aria-expanded="false"
                                                    aria-controls="widget-category-4">
                                                    Fashion<span class="products-count">(6)</span>
                                                    <span class="toggle"></span>
                                                </a>
                                                <div class="collapse" id="widget-category-4">
                                                    <ul class="cat-sublist">
                                                        <li>Shoes<span class="products-count">(4)</span></li>
                                                        <li>Bag<span class="products-count">(2)</span></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li><a href="#">Music</a><span class="products-count">(2)</span></li>
                                        </ul>
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                            <div class="widget">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true"
                                        aria-controls="widget-body-2">Price</a>
                                </h3>

                                <div class="collapse show" id="widget-body-2">
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

                            <div class="widget">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-3" role="button" aria-expanded="true"
                                        aria-controls="widget-body-3">Size</a>
                                </h3>

                                <div class="collapse show" id="widget-body-3">
                                    <div class="widget-body">
                                        <ul class="cat-list">
                                            <li><a href="#">Extra Large</a></li>
                                            <li><a href="#">Large</a></li>
                                            <li><a href="#">Medium</a></li>
                                            <li><a href="#">Small</a></li>
                                        </ul>
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                            <div class="widget widget-brand">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-4" role="button" aria-expanded="true"
                                        aria-controls="widget-body-4">Brand</a>
                                </h3>

                                <div class="collapse show" id="widget-body-4">
                                    <div class="widget-body">
                                        <ul class="cat-list">
                                            <li><a href="#">Adidas</a></li>
                                            <li><a href="#">Calvin Klein</a></li>
                                            <li><a href="#">Diesel</a></li>
                                            <li><a href="#">Lacoste</a></li>
                                        </ul>
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                            <div class="widget widget-color">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-5" role="button" aria-expanded="true"
                                        aria-controls="widget-body-5">Color</a>
                                </h3>

                                <div class="collapse show" id="widget-body-5">
                                    <div class="widget-body pb-0">
                                        <ul class="config-swatch-list">
                                            <li class="active">
                                                <a href="#" style="background-color: #000;">Black</a>
                                            </li>
                                            <li>
                                                <a href="#" style="background-color: #0188cc;">Blue</a>
                                            </li>
                                            <li>
                                                <a href="#" style="background-color: #81d742;">Green</a>
                                            </li>
                                            <li>
                                                <a href="#" style="background-color: #6085a5;">Indigo</a>
                                            </li>
                                            <li>
                                                <a href="#" style="background-color: #ab6e6e;">Red</a>
                                            </li>
                                        </ul>
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->
                        </div><!-- End .sidebar-wrapper -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->

                <div class="pt-2 mb-4"></div>
            </div><!-- End .container -->
@section('footer')
    @include('components.porto.demo20.footer')
@endsection

@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
