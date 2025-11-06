@extends('layouts.porto')

@section('top-notice')
    @include('components.porto.top-notice-demo22')
@endsection

@section('header')
    @include('components.porto.header-demo22')
@endsection

@section('footer')
    @include('components.porto.footer-demo22')
@endsection

@section('content')
<nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/porto/demo22.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="/porto/demo22-vendors.html">Store</a></li>
                        <li class="breadcrumb-item active" aria-current="page">alexp</li>
                    </ol>
                </div>
            </nav>

            <div class="store-single-container container d-md-flex">
                <aside class="sidebar-store mb-3">
                    <div class="widget widget-products-categories mb-3">
                        <h3 class="widget-title">Store Product Category</h3>

                        <div class="widget-body">
                            <ul class="cat-list">
                                <li><a href="/porto/demo22-shop.html">Gifts</a></li>
                                <li><a href="/porto/demo22-shop.html">Toys</a></li>
                                <li><a href="/porto/demo22-shop.html">Digital Microscope</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="widget widget-contact">
                        <h3 class="widget-title">Contact Vendor</h3>
                        <div class="widget-body">
                            <form class="mb-0" action="#" method="get">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name" required />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="you@example.com" required />
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="6"
                                        placeholder="Type your message..."></textarea>
                                </div>
                                <div class="form-footer my-0">
                                    <div class="form-footer-right">
                                        <button type="submit" class="btn btn-primary">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </aside>

                <div class="store-single mb-3">
                    <div class="store-header-info">
                        <div class="store-details">
                            <div class="seller-avatar">
                                <img src="/porto/assets/images/demoes/demo22/vendors/avatar-1.jpg" alt="avatar" width="100"
                                    height="100">
                            </div>

                            <div class="store-data">
                                <h1 class="store-title">Porto Vendor</h1>
                                <ul class="store-info-list">
                                    <li>
                                        <i class="fa fa-map-marker"></i>
                                        <p class="store-address">California, United States (US)</p>
                                    </li>
                                    <li>
                                        <i class="fa fa-star"></i>
                                        4.00 rating from 1 review
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="store-single-tabs mb-2">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a href="#store-content" class="nav-link active" data-toggle="tab"
                                    role="tab">Products</a>
                            </li>
                        </ul>
                    </div>

                    <div class="store-tab-content tab-content">
                        <div class="tab-pane fade show active" id="store-content" role="tabpanel">
                            <div class="row">
                                <div class="col-6 col-sm-4 col-xl-3">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo22-product.html">
                                                <img src="/porto/assets/images/demoes/demo22/products/product-20.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View">Quick
                                                View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo22-product.html">HD Camera</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="old-price">$199.00</span>
                                                <span class="product-price">$129.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4 col-xl-3">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo22-product.html">
                                                <img src="/porto/assets/images/demoes/demo22/products/product-21.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-sale">-35%</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View">Quick
                                                View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo22-product.html">Black Watches</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="old-price">$199.00</span>
                                                <span class="product-price">$129.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4 col-xl-3">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo22-product.html">
                                                <img src="/porto/assets/images/demoes/demo22/products/product-18.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View">Quick
                                                View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo22-product.html">Motor Cap</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="old-price">$199.00</span>
                                                <span class="product-price">$109.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4 col-xl-3">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo22-product.html">
                                                <img src="/porto/assets/images/demoes/demo22/products/product-23.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View">Quick
                                                View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo22-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo22-product.html">Computer Mouse</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$55.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3"></div>
@section('footer')
    @include('components.porto.footer-demo22')
@endsection

@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
