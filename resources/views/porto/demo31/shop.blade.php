@extends('layouts.porto')

@section('header')
    @include('components.porto.demo31.header')
@endsection

@section('footer')
    @include('components.porto.demo31.footer')
@endsection

@section('content')
<div class="container">
                <section>
                    <div class="home-banner2 mt-2 mb-0 d-flex flex-md-row">
                        <div class=" col-lg-4 banner-background"
                            style="background-image: url('/porto/assets/images/demoes/demo31/banners/home_banner5.jpg');">
                        </div>
                        <div class="content-center">
                            <h3 class="mb-md-0 font1">Porto Switch Lite</h3>
                            <p class="font1">Now Available For Pre-Order</p>
                        </div>
                        <div class="d-flex align-items-center content-right pt-0 py-lg-5">
                            <a href="/porto/demo31-shop.html" class="btn">Pre-Order Now</a>
                        </div>
                    </div>
                </section>

                <nav aria-label="breadcrumb" class="breadcrumb-nav">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/porto/demo31.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Games</li>
                    </ol>
                </nav>

                <div class="row">
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
                                    <span class="mb-0">Filter</span>
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

                        <div class="row products-group">
                            <div class="col-6 col-sm-4 col-md-3">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo31-product.html">
                                            <img src="/porto/assets/images/demoes/demo31/products/product-3.jpg" width="205"
                                                height="875" alt="Product" />
                                        </a>

                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="/porto/ajax/demo31-product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick
                                            View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="/porto/demo31-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title"> <a href="/porto/demo31-product.html">Eouc Future 3</a> </h3>
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
                            </div><!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4 col-md-3">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo31-product.html">
                                            <img src="/porto/assets/images/demoes/demo31/products/product-4.jpg" width="205"
                                                height="875" alt="Product" />
                                        </a>

                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="/porto/ajax/demo31-product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick
                                            View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="/porto/demo31-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title"> <a href="/porto/demo31-product.html">PEL 2019</a> </h3>
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
                            </div><!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4 col-md-3">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo31-product.html">
                                            <img src="/porto/assets/images/demoes/demo31/products/product-5.jpg" width="205"
                                                height="875" alt="Product" />
                                        </a>

                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="/porto/ajax/demo31-product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick
                                            View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="/porto/demo31-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title"> <a href="/porto/demo31-product.html">Apoc Warrior</a> </h3>
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
                            </div><!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4 col-md-3">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo31-product.html">
                                            <img src="/porto/assets/images/demoes/demo31/products/product-7.jpg" width="205"
                                                height="875" alt="Product" />
                                        </a>

                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="/porto/ajax/demo31-product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick
                                            View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="/porto/demo31-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title"> <a href="/porto/demo31-product.html">Call of War 3</a> </h3>
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
                            </div><!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4 col-md-3">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo31-product.html">
                                            <img src="/porto/assets/images/demoes/demo31/products/product-8.jpg" width="205"
                                                height="875" alt="Product" />
                                        </a>

                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="/porto/ajax/demo31-product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick
                                            View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="/porto/demo31-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title"> <a href="/porto/demo31-product.html">Destruction 3</a> </h3>
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
                            </div><!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4 col-md-3">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo31-product.html">
                                            <img src="/porto/assets/images/demoes/demo31/products/product-9.jpg" width="205"
                                                height="875" alt="Product" />
                                        </a>

                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="/porto/ajax/demo31-product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick
                                            View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="/porto/demo31-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title"> <a href="/porto/demo31-product.html">Dragon 2</a> </h3>
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
                            </div><!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4 col-md-3">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo31-product.html">
                                            <img src="/porto/assets/images/demoes/demo31/products/product-10.jpg" width="205"
                                                height="875" alt="Product" />
                                        </a>

                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="/porto/ajax/demo31-product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick
                                            View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="/porto/demo31-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title"> <a href="/porto/demo31-product.html">Gas Station 5</a> </h3>
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
                            </div><!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4 col-md-3">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo31-product.html">
                                            <img src="/porto/assets/images/demoes/demo31/products/product-11.jpg" width="205"
                                                height="875" alt="Product" />
                                        </a>

                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="/porto/ajax/demo31-product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick
                                            View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="/porto/demo31-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title"> <a href="/porto/demo31-product.html">Gods 2 - Porto
                                                Games</a> </h3>
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
                            </div><!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4 col-md-3">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo31-product.html">
                                            <img src="/porto/assets/images/demoes/demo31/products/product-12.jpg" width="205"
                                                height="875" alt="Product" />
                                        </a>

                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="/porto/ajax/demo31-product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick
                                            View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="/porto/demo31-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title"> <a href="/porto/demo31-product.html">Gun Machine 6</a> </h3>
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
                            </div><!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4 col-md-3">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo31-product.html">
                                            <img src="/porto/assets/images/demoes/demo31/products/product-13.jpg" width="205"
                                                height="875" alt="Product" />
                                        </a>

                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="/porto/ajax/demo31-product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick
                                            View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="/porto/demo31-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title"> <a href="/porto/demo31-product.html">Epic Future 2</a> </h3>
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
                            </div><!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4 col-md-3">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo31-product.html">
                                            <img src="/porto/assets/images/demoes/demo31/products/product-14.jpg" width="205"
                                                height="875" alt="Product" />
                                        </a>

                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="/porto/ajax/demo31-product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick
                                            View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="/porto/demo31-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title"> <a href="/porto/demo31-product.html">Need For Race</a> </h3>
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
                            </div><!-- End .col-sm-4 -->

                            <div class="col-6 col-sm-4 col-md-3">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo31-product.html">
                                            <img src="/porto/assets/images/demoes/demo31/products/product-15.jpg" width="205"
                                                height="875" alt="Product" />
                                        </a>

                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="/porto/ajax/demo31-product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick
                                            View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="/porto/demo31-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title"> <a href="/porto/demo31-product.html">Old Wars 2</a> </h3>
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
                    <aside class="sidebar-shop col-lg-3 pb-4 order-lg-first mobile-sidebar">
                        <div class="sidebar-wrapper">
                            <div class="widget">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true"
                                        aria-controls="widget-body-2">Categories</a>
                                </h3>

                                <div class="collapse show" id="widget-body-2">
                                    <div class="widget-body">
                                        <ul class="cat-list">
                                            <li>
                                                <a href="#widget-category-1">
                                                    Action<span class="products-count">(4)</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#widget-category-2">
                                                    FPS<span class="products-count">(6)</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#widget-category-3">
                                                    Horror<span class="products-count">(6)</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#widget-category-4">
                                                    Shot<span class="products-count">(6)</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#widget-category-5">
                                                    Survival<span class="products-count">(6)</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                            <div class="widget widget-price">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-body-3" role="button" aria-expanded="true"
                                        aria-controls="widget-body-3">Filter By Price</a>
                                </h3>

                                <div class="collapse show" id="widget-body-3">
                                    <div class="widget-body">
                                        <form action="#">
                                            <div class="price-slider-wrapper">
                                                <div id="price-slider"></div><!-- End #price-slider -->
                                            </div><!-- End .price-slider-wrapper -->

                                            <div
                                                class="filter-price-action d-flex align-items-center justify-content-between flex-wrap pb-0">
                                                <div class="filter-price-text mb-1 mb-xl-0">
                                                    Price:
                                                    <span id="filter-price-range" class="mr-3"></span>
                                                </div><!-- End .filter-price-text -->

                                                <button type="submit"
                                                    class="btn btn-primary font2 mb-1 mb-xl-0">Filter</button>
                                            </div><!-- End .filter-price-action -->
                                        </form>
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div><!-- End .widget -->

                            <div class="widget widget-featured mb-0">
                                <h3 class="widget-title">Featured Products</h3>

                                <div class="widget-body pb-0">
                                    <div class="owl-carousel widget-featured-products">
                                        <div class="featured-col">
                                            <div class="product-default left-details product-widget">
                                                <figure>
                                                    <a href="/porto/demo31-product.html">
                                                        <img src="/porto/assets/images/demoes/demo31/products/product-4.jpg"
                                                            width="75" height="75" alt="product" />
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h3 class="product-title"> <a href="/porto/demo31-product.html">PEL
                                                            2019</a> </h3>
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
                                            <div class="product-default left-details product-widget">
                                                <figure>
                                                    <a href="/porto/demo31-product.html">
                                                        <img src="/porto/assets/images/demoes/demo31/products/product-5.jpg"
                                                            width="75" height="75" alt="product" />
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h3 class="product-title"> <a href="/porto/demo31-product.html">Apoc
                                                            Warrior</a> </h3>
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
                                        </div><!-- End .featured-col -->

                                        <div class="featured-col">
                                            <div class="product-default left-details product-widget">
                                                <figure>
                                                    <a href="/porto/demo31-product.html">
                                                        <img src="/porto/assets/images/demoes/demo31/products/product-7.jpg"
                                                            width="75" height="75" alt="product" />
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h3 class="product-title"> <a href="/porto/demo31-product.html">Call of War
                                                            3</a> </h3>
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

                                            <div class="product-default left-details product-widget">
                                                <figure>
                                                    <a href="/porto/demo31-product.html">
                                                        <img src="/porto/assets/images/demoes/demo31/products/product-6.jpg"
                                                            width="75" height="75" alt="product" />
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <h3 class="product-title"> <a href="/porto/demo31-product.html">Call of War
                                                            2</a> </h3>
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
                                        </div><!-- End .featured-col -->
                                    </div><!-- End .widget-featured-slider -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .widget -->
                        </div><!-- End .sidebar-wrapper -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="mb-2"></div><!-- margin -->
@section('footer')
    @include('components.porto.demo31.footer')
@endsection

@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
