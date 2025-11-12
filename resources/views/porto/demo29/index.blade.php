@extends('layouts.porto')

@section('footer')
    @include('porto.demo29.footer')
@endsection


@section('header')
    @include('porto.demo29.header')
@endsection

@section('content')
<div class="container">
                <section>
                    <div class="row grid">
                        <div class="grid-item col-lg-5 height-x1">
                            <div class="home-banner">
                                <figure>
                                    <img src="/porto/assets/images/demoes/demo29/banners/home-banner1.jpg" width="674"
                                        height="316" alt="banner" />
                                </figure>
                                <div class="banner-content content-right">
                                    <h3 class="ls-10"><strong>black<br></strong>Armchairs</h3>
                                    <p class="font2">starting from $399</p>
                                    <a href="/porto/demo29-shop.html" class="btn">shop now <i
                                            class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item col-lg-7 height-x2">
                            <div class="home-banner">
                                <figure class="bg-gray">
                                    <img src="/porto/assets/images/demoes/demo29/banners/home-banner2.jpg" width="951"
                                        height="651" alt="banner" />
                                </figure>
                                <div class="banner-content content-left">
                                    <h3><strong>wooden<br></strong>Black Chair</h3>
                                    <div class="banner-info">
                                        <a href="#" class="btn skew-box">go coupon</a>
                                        <h3 class="sale-off skew-box"><span>$100</span>off</h3>
                                        <p class="font2">starting from $199</p>
                                        <a href="/porto/demo29-shop.html" class="btn">shop now <i
                                                class="fas fa-long-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item col-6 col-lg-2 height-x1">
                            <div class="home-banner">
                                <figure class="bg-dark">
                                    <img src="/porto/assets/images/demoes/demo29/banners/home-banner3.jpg" width="257"
                                        height="315" alt="banner" />
                                </figure>
                                <div class="banner-content content-top">
                                    <span class="font2">check new arrivals</span>
                                    <h4><strong>cool lamps</strong></h4>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item col-6 col-lg-3 height-x1">
                            <div class="home-banner">
                                <figure class="bg-primary">
                                    <img src="/porto/assets/images/demoes/demo29/banners/home-banner4.jpg" width="396"
                                        height="315" alt="banner" />
                                </figure>
                                <div class="banner-content content-bottom">
                                    <span class="font2">exclusive new collection</span>
                                    <h4><strong>luxurious jacuzzi</strong></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-1 pr-0 pl-0 grid-col-sizer"></div>
                    </div>
                </section>

                <section class="info-box-container mb-0 appear-animate" data-animation-name="fadeIn"
                    data-animation-delay="100">
                    <div class="row">
                        <div class="col-sm-6 col-xl-3 mb-2 mb-xl-0">
                            <div
                                class="info-box info-box-icon-left justify-content-sm-center justify-content-start p-0">
                                <i class="icon-shipping line-height-1"></i>

                                <div class="info-box-content">
                                    <h4 class="ls-25 line-height-1">FREE SHIPPING &amp; RETURN</h4>
                                    <p class="text-body">Free shipping on all orders over $99.</p>
                                </div><!-- End .info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3 mb-2 mb-xl-0">
                            <div
                                class="info-box info-box-icon-left justify-content-sm-center justify-content-start p-0">
                                <i class="icon-money line-height-1"></i>

                                <div class="info-box-content">
                                    <h4 class="ls-25 line-height-1">MONEY BACK GUARANTEE</h4>
                                    <p class="text-body">100% money back guarantee.</p>
                                </div><!-- End .info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3 mb-2 mb-xl-0">
                            <div
                                class="info-box info-box-icon-left justify-content-sm-center justify-content-start p-0">
                                <i class="icon-support line-height-1"></i>

                                <div class="info-box-content">
                                    <h4 class="ls-25 line-height-1">ONLINE SUPPORT 24/7</h4>
                                    <p class="text-body">Lorem ipsum dolor sit amet.</p>
                                </div><!-- End .info-box-content -->
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3 mb-2 mb-xl-0">
                            <div
                                class="info-box info-box-icon-left justify-content-sm-center justify-content-start p-0">
                                <i class="icon-secure-payment line-height-1"></i>

                                <div class="info-box-content">
                                    <h4 class="ls-25 line-height-1">SECURE PAYMENT</h4>
                                    <p class="text-body">Lorem ipsum dolor sit amet.</p>
                                </div><!-- End .info-box-content -->
                            </div>
                        </div>
                    </div>
                </section>

                <hr class="mt-0">

                <section class="featured-section product-slider-tab appear-animate" data-animation-name="fadeIn"
                    data-animation-delay="100">
                    <div class="heading d-flex align-items-center flex-column flex-lg-row">
                        <div class="section-title">
                            <h2 class="mt-1 mb-1">FEATURED PRODUCTS</h2>
                        </div>
                        <ul class="nav product-filter-items ml-lg-auto justify-content-center mb-0" id="myTab"
                            role="tablist">
                            <li class="nav-item product-filter-item">
                                <a class="nav-link active" id="kitchen-tab" data-toggle="tab" href="#kitchen" role="tab"
                                    aria-controls="kitchen" aria-selected="true">kitchen</a>
                            </li>
                            <li class="nav-item product-filter-item">
                                <a class="nav-link" id="dining-tab" data-toggle="tab" href="#dining" role="tab"
                                    aria-controls="dining" aria-selected="false">dining</a>
                            </li>
                            <li class="nav-item product-filter-item">
                                <a class="nav-link" id="bedroom-tab" data-toggle="tab" href="#bedroom" role="tab"
                                    aria-controls="bedroom" aria-selected="false">bedroom</a>
                            </li>
                            <li class="nav-item product-filter-item">
                                <a class="nav-link" id="living-tab" data-toggle="tab" href="#living" role="tab"
                                    aria-controls="living" aria-selected="false">living</a>
                            </li>
                            <li class="nav-item product-filter-item">
                                <a class="nav-link" id="office-tab" data-toggle="tab" href="#office" role="tab"
                                    aria-controls="office" aria-selected="false">Office</a>
                            </li>
                            <li class="nav-item product-filter-item">
                                <a class="nav-link" id="outdoor-tab" data-toggle="tab" href="#outdoor" role="tab"
                                    aria-controls="outdoor" aria-selected="false">outdoor</a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="kitchen" role="tabpanel"
                            aria-labelledby="kitchen-tab">
                            <div class="products-slider owl-carousel owl-theme" data-owl-options="{
                                'margin': 20,
                                'dots': false,
                                'nav': false,
                                'loop': false,
                                'responsive': {
                                    '0': {
                                        'items': 2
                                    },
                                    '576': {
                                        'items': 3
                                    },
                                    '768': {
                                        'items': 4
                                    },
                                    '992': {
                                        'items': 4
                                    },
                                    '1200': {
                                        'items': 5,
                                        'margin': 2
                                    }
                                }
                            }">
                                <div class="product-default">
                                    <figure>
                                        <a href="/porto/demo29-product.html">
                                            <img src="/porto/assets/images/demoes/demo29/products/grey/dining/dining(5).jpg"
                                                width="327" height="327" alt="Product" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-list">
                                            <a href="/porto/demo29-shop.html" class="product-category">Category</a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo29-product.html">Kitchen Wooden Chair</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <del class="old-price">$59.00</del>
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                        <div class="product-action">
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                        </div>
                                    </div><!-- End .product-details -->
                                </div>

                                <div class="product-default">
                                    <figure>
                                        <a href="/porto/demo29-product.html">
                                            <img src="/porto/assets/images/demoes/demo29/products/grey/kitchen/kitchen(1).jpg"
                                                width="327" height="327" alt="Product" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-list">
                                            <a href="/porto/demo29-shop.html" class="product-category">Category</a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo29-product.html">Sieve</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <del class="old-price">$59.00</del>
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                        <div class="product-action">
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                            <a href="/porto/demo29-product.html" class="btn-icon btn-add-cart"><i
                                                    class="fa fa-arrow-right"></i><span>SELECT
                                                    OPTIONS</span></a>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                        </div>
                                    </div><!-- End .product-details -->
                                </div>

                                <div class="product-default">
                                    <figure>
                                        <a href="/porto/demo29-product.html">
                                            <img src="/porto/assets/images/demoes/demo29/products/grey/living/living(2).jpg"
                                                width="327" height="327" alt="Product" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-list">
                                            <a href="/porto/demo29-shop.html" class="product-category">Category</a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo29-product.html">Blue Pillow</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <del class="old-price">$59.00</del>
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                        <div class="product-action">
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                            <a href="/porto/demo29-product.html" class="btn-icon btn-add-cart"><i
                                                    class="fa fa-arrow-right"></i><span>SELECT
                                                    OPTIONS</span></a>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                        </div>
                                    </div><!-- End .product-details -->
                                </div>

                                <div class="product-default">
                                    <figure>
                                        <a href="/porto/demo29-product.html">
                                            <img src="/porto/assets/images/demoes/demo29/products/grey/outdoor/outdoor(5).jpg"
                                                width="327" height="327" alt="Product" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-list">
                                            <a href="/porto/demo29-shop.html" class="product-category">Category</a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo29-product.html">Trellis</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <del class="old-price">$59.00</del>
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                        <div class="product-action">
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                        </div>
                                    </div><!-- End .product-details -->
                                </div>

                                <div class="product-default">
                                    <figure>
                                        <a href="/porto/demo29-product.html">
                                            <img src="/porto/assets/images/demoes/demo29/products/grey/dining/dining(4).jpg"
                                                width="327" height="327" alt="Product" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-list">
                                            <a href="/porto/demo29-shop.html" class="product-category">Category</a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo29-product.html">Dinner Table</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <del class="old-price">$59.00</del>
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                        <div class="product-action">
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                        </div>
                                    </div><!-- End .product-details -->
                                </div>
                            </div><!-- End .products-slider -->
                        </div>
                        <div class="tab-pane fade" id="dining" role="tabpanel" aria-labelledby="dining-tab">
                            <div class="products-slider owl-carousel owl-theme" data-owl-options="{
                                'margin': 20,
                                'dots': false,
                                'nav': false,
                                'loop': false,
                                'responsive': {
                                    '0': {
                                        'items': 2
                                    },
                                    '576': {
                                        'items': 3
                                    },
                                    '768': {
                                        'items': 4
                                    },
                                    '992': {
                                        'items': 4
                                    },
                                    '1200': {
                                        'items': 5,
                                        'margin': 2
                                    }
                                }
                            }">
                                <div class="product-default">
                                    <figure>
                                        <a href="/porto/demo29-product.html">
                                            <img src="/porto/assets/images/demoes/demo29/products/grey/dining/dining(4).jpg"
                                                width="327" height="327" alt="Product" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-list">
                                            <a href="/porto/demo29-shop.html" class="product-category">Category</a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo29-product.html">Dinner Table</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <del class="old-price">$59.00</del>
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                        <div class="product-action">
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                            <a href="/porto/demo29-product.html" class="btn-icon btn-add-cart"><i
                                                    class="fa fa-arrow-right"></i><span>SELECT
                                                    OPTIONS</span></a>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                        </div>
                                    </div><!-- End .product-details -->
                                </div>
                                <div class="product-default">
                                    <figure>
                                        <a href="/porto/demo29-product.html">
                                            <img src="/porto/assets/images/demoes/demo29/products/grey/living/living(2).jpg"
                                                width="327" height="327" alt="Product" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-list">
                                            <a href="/porto/demo29-shop.html" class="product-category">Category</a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo29-product.html">Blue Pillow</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <del class="old-price">$59.00</del>
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                        <div class="product-action">
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                            <a href="/porto/demo29-product.html" class="btn-icon btn-add-cart"><i
                                                    class="fa fa-arrow-right"></i><span>SELECT
                                                    OPTIONS</span></a>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                        </div>
                                    </div><!-- End .product-details -->
                                </div>
                                <div class="product-default">
                                    <figure>
                                        <a href="/porto/demo29-product.html">
                                            <img src="/porto/assets/images/demoes/demo29/products/grey/dining/dining(5).jpg"
                                                width="327" height="327" alt="Product" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-list">
                                            <a href="/porto/demo29-shop.html" class="product-category">Category</a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo29-product.html">Kitchen Wooden Chair</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <del class="old-price">$59.00</del>
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                        <div class="product-action">
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                        </div>
                                    </div><!-- End .product-details -->
                                </div>

                                <div class="product-default">
                                    <figure>
                                        <a href="/porto/demo29-product.html">
                                            <img src="/porto/assets/images/demoes/demo29/products/grey/kitchen/kitchen(1).jpg"
                                                width="327" height="327" alt="Product" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-list">
                                            <a href="/porto/demo29-shop.html" class="product-category">Category</a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo29-product.html">Sieve</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <del class="old-price">$59.00</del>
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                        <div class="product-action">
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                            <a href="/porto/demo29-product.html" class="btn-icon btn-add-cart"><i
                                                    class="fa fa-arrow-right"></i><span>SELECT
                                                    OPTIONS</span></a>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                        </div>
                                    </div><!-- End .product-details -->
                                </div>

                                <div class="product-default">
                                    <figure>
                                        <a href="/porto/demo29-product.html">
                                            <img src="/porto/assets/images/demoes/demo29/products/grey/living/living(2).jpg"
                                                width="327" height="327" alt="Product" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-list">
                                            <a href="/porto/demo29-shop.html" class="product-category">Category</a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo29-product.html">Blue Pillow</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <del class="old-price">$59.00</del>
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                        <div class="product-action">
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                            <a href="/porto/demo29-product.html" class="btn-icon btn-add-cart"><i
                                                    class="fa fa-arrow-right"></i><span>SELECT
                                                    OPTIONS</span></a>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                        </div>
                                    </div><!-- End .product-details -->
                                </div>
                                <div class="product-default">
                                    <figure>
                                        <a href="/porto/demo29-product.html">
                                            <img src="/porto/assets/images/demoes/demo29/products/grey/outdoor/outdoor(5).jpg"
                                                width="327" height="327" alt="Product" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-list">
                                            <a href="/porto/demo29-shop.html" class="product-category">Category</a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo29-product.html">Trellis</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <del class="old-price">$59.00</del>
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                        <div class="product-action">
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                        </div>
                                    </div><!-- End .product-details -->
                                </div>

                                <div class="product-default">
                                    <figure>
                                        <a href="/porto/demo29-product.html">
                                            <img src="/porto/assets/images/demoes/demo29/products/grey/dining/dining(4).jpg"
                                                width="327" height="327" alt="Product" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-list">
                                            <a href="/porto/demo29-shop.html" class="product-category">Category</a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo29-product.html">Dinner Table</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <del class="old-price">$59.00</del>
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                        <div class="product-action">
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                        </div>
                                    </div><!-- End .product-details -->
                                </div>
                            </div><!-- End .products-slider -->
                        </div>
                        <div class="tab-pane fade" id="bedroom" role="tabpanel" aria-labelledby="bedroom-tab">
                            <div class="products-slider owl-carousel owl-theme" data-owl-options="{
                                'margin': 20,
                                'dots': false,
                                'nav': false,
                                'loop': false,
                                'responsive': {
                                    '0': {
                                        'items': 2
                                    },
                                    '576': {
                                        'items': 3
                                    },
                                    '768': {
                                        'items': 4
                                    },
                                    '992': {
                                        'items': 4
                                    },
                                    '1200': {
                                        'items': 5,
                                        'margin': 2
                                    }
                                }
                            }">
                                <div class="product-default">
                                    <figure>
                                        <a href="/porto/demo29-product.html">
                                            <img src="/porto/assets/images/demoes/demo29/products/grey/kitchen/kitchen(1).jpg"
                                                width="327" height="327" alt="Product" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-list">
                                            <a href="/porto/demo29-shop.html" class="product-category">Category</a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo29-product.html">Sieve</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <del class="old-price">$59.00</del>
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                        <div class="product-action">
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                        </div>
                                    </div><!-- End .product-details -->
                                </div>

                                <div class="product-default">
                                    <figure>
                                        <a href="/porto/demo29-product.html">
                                            <img src="/porto/assets/images/demoes/demo29/products/grey/dining/dining(4).jpg"
                                                width="327" height="327" alt="Product" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-list">
                                            <a href="/porto/demo29-shop.html" class="product-category">Category</a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo29-product.html">Dinner Table</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <del class="old-price">$59.00</del>
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                        <div class="product-action">
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                            <a href="/porto/demo29-product.html" class="btn-icon btn-add-cart"><i
                                                    class="fa fa-arrow-right"></i><span>SELECT
                                                    OPTIONS</span></a>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                        </div>
                                    </div><!-- End .product-details -->
                                </div>
                            </div><!-- End .products-slider -->
                        </div>
                        <div class="tab-pane fade" id="living" role="tabpanel" aria-labelledby="living-tab">
                            <div class="products-slider owl-carousel owl-theme" data-owl-options="{
                                'margin': 20,
                                'dots': false,
                                'nav': false,
                                'loop': false,
                                'responsive': {
                                    '0': {
                                        'items': 2
                                    },
                                    '576': {
                                        'items': 3
                                    },
                                    '768': {
                                        'items': 4
                                    },
                                    '992': {
                                        'items': 4
                                    },
                                    '1200': {
                                        'items': 5,
                                        'margin': 2
                                    }
                                }
                            }">
                                <div class="product-default">
                                    <figure>
                                        <a href="/porto/demo29-product.html">
                                            <img src="/porto/assets/images/demoes/demo29/products/grey/living/living(2).jpg"
                                                width="327" height="327" alt="Product" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-list">
                                            <a href="/porto/demo29-shop.html" class="product-category">Category</a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo29-product.html">Blue Pillow</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <del class="old-price">$59.00</del>
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                        <div class="product-action">
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                        </div>
                                    </div><!-- End .product-details -->
                                </div>

                                <div class="product-default">
                                    <figure>
                                        <a href="/porto/demo29-product.html">
                                            <img src="/porto/assets/images/demoes/demo29/products/grey/outdoor/outdoor(5).jpg"
                                                width="327" height="327" alt="Product" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-list">
                                            <a href="/porto/demo29-shop.html" class="product-category">Category</a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo29-product.html">Trellis Pillow</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <del class="old-price">$59.00</del>
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                        <div class="product-action">
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                            <a href="/porto/demo29-product.html" class="btn-icon btn-add-cart"><i
                                                    class="fa fa-arrow-right"></i><span>SELECT
                                                    OPTIONS</span></a>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                        </div>
                                    </div><!-- End .product-details -->
                                </div>

                                <div class="product-default">
                                    <figure>
                                        <a href="/porto/demo29-product.html">
                                            <img src="/porto/assets/images/demoes/demo29/products/grey/dining/dining(4).jpg"
                                                width="327" height="327" alt="Product" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-list">
                                            <a href="/porto/demo29-shop.html" class="product-category">Category</a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo29-product.html">Dinner Table</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <del class="old-price">$59.00</del>
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                        <div class="product-action">
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                        </div>
                                    </div><!-- End .product-details -->
                                </div>
                            </div><!-- End .products-slider -->
                        </div>
                        <div class="tab-pane fade" id="office" role="tabpanel" aria-labelledby="office-tab">
                            <div class="products-slider owl-carousel owl-theme" data-owl-options="{
                                'margin': 20,
                                'dots': false,
                                'nav': false,
                                'loop': false,
                                'responsive': {
                                    '0': {
                                        'items': 2
                                    },
                                    '576': {
                                        'items': 3
                                    },
                                    '768': {
                                        'items': 4
                                    },
                                    '992': {
                                        'items': 4
                                    },
                                    '1200': {
                                        'items': 5,
                                        'margin': 2
                                    }
                                }
                            }">
                                <div class="product-default">
                                    <figure>
                                        <a href="/porto/demo29-product.html">
                                            <img src="/porto/assets/images/demoes/demo29/products/grey/living/living(2).jpg"
                                                width="327" height="327" alt="Product" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-list">
                                            <a href="/porto/demo29-shop.html" class="product-category">Category</a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo29-product.html">Blue Pillow</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <del class="old-price">$59.00</del>
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                        <div class="product-action">
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                            <a href="/porto/demo29-product.html" class="btn-icon btn-add-cart"><i
                                                    class="fa fa-arrow-right"></i><span>SELECT
                                                    OPTIONS</span></a>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                        </div>
                                    </div><!-- End .product-details -->
                                </div>

                                <div class="product-default">
                                    <figure>
                                        <a href="/porto/demo29-product.html">
                                            <img src="/porto/assets/images/demoes/demo29/products/grey/dining/dining(4).jpg"
                                                width="327" height="327" alt="Product" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-list">
                                            <a href="/porto/demo29-shop.html" class="product-category">Category</a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo29-product.html">Dinner Table</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <del class="old-price">$59.00</del>
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                        <div class="product-action">
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                        </div>
                                    </div><!-- End .product-details -->
                                </div>
                            </div><!-- End .products-slider -->
                        </div>
                        <div class="tab-pane fade" id="outdoor" role="tabpanel" aria-labelledby="outdoor-tab">
                            <div class="products-slider owl-carousel owl-theme" data-owl-options="{
                                'margin': 20,
                                'dots': false,
                                'nav': false,
                                'loop': false,
                                'responsive': {
                                    '0': {
                                        'items': 2
                                    },
                                    '576': {
                                        'items': 3
                                    },
                                    '768': {
                                        'items': 4
                                    },
                                    '992': {
                                        'items': 4
                                    },
                                    '1200': {
                                        'items': 5,
                                        'margin': 2
                                    }
                                }
                            }">
                                <div class="product-default">
                                    <figure>
                                        <a href="/porto/demo29-product.html">
                                            <img src="/porto/assets/images/demoes/demo29/products/grey/dining/dining(4).jpg"
                                                width="327" height="327" alt="Product" />
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-list">
                                            <a href="/porto/demo29-shop.html" class="product-category">Category</a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo29-product.html">Dinner Table</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <del class="old-price">$59.00</del>
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                        <div class="product-action">
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                            <a href="/porto/demo29-product.html" class="btn-icon btn-add-cart"><i
                                                    class="fa fa-arrow-right"></i><span>SELECT
                                                    OPTIONS</span></a>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                        </div>
                                    </div><!-- End .product-details -->
                                </div>
                            </div><!-- End .products-slider -->
                        </div>
                    </div>
                </section>
            </div>

            <section class="banner-section home-banner mb-6 appear-animate" data-animation-name="fadeIn"
                data-animation-delay="100" data-parallax="{'speed': 1.8, 'enableOnMobile': true}"
                data-image-src="/porto/assets/images/demoes/demo29/banners/banner-bathroom.jpg">
                <div class="banner-content full-content d-flex flex-lg-row flex-column align-items-center mt-1 mt-lg-0">
                    <div class="left-content">
                        <div>
                            <span class="font1">it is time for a</span>
                            <h4>Modern Bathroom</h4>
                        </div>
                        <a href="/porto/demo29-shop.html" class="btn">Show Now <i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                    <div class="right-content banner-info">
                        <a href="#" class="btn skew-box bg-white">Exclusive COUPON</a>
                        <h3 class="sale-off skew-box"><span class="text-white">$200</span>off</h3>
                    </div>
                </div>
            </section>

            <section>
                <div class="container">
                    <div class="featured-section bg-white appear-animate" data-animation-name="fadeIn"
                        data-animation-delay="100">
                        <div class="row">
                            <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                                <div class="product-default inner-quickview left-details inner-icon">
                                    <figure>
                                        <a href="/porto/demo29-product.html">
                                            <img src="/porto/assets/images/demoes/demo29/products/grey/bedroom/bedroom(1).jpg"
                                                width="257" height="257" alt="Product" />
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
                                                <a href="/porto/demo29-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title"> <a href="/porto/demo29-product.html">Product Short Name</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo29-product.html">
                                            <img src="/porto/assets/images/demoes/demo29/products/grey/outdoor/outdoor(2).jpg"
                                                width="257" height="257" alt="Product" />
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
                                                <a href="/porto/demo29-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title"> <a href="/porto/demo29-product.html">Wooden Arm Chair</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo29-product.html">
                                            <img src="/porto/assets/images/demoes/demo29/products/grey/bedroom/bedroom(3).jpg"
                                                width="257" height="257" alt="Product" />
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
                                                <a href="/porto/demo29-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title"> <a href="/porto/demo29-product.html">Bureau</a> </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo29-product.html">
                                            <img src="/porto/assets/images/demoes/demo29/products/grey/bedroom/bedroom(4).jpg"
                                                width="257" height="257" alt="Product" />
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
                                                <a href="/porto/demo29-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title"> <a href="/porto/demo29-product.html">Sleepwear</a> </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo29-product.html">
                                            <img src="/porto/assets/images/demoes/demo29/products/grey/bedroom/bedroom(5).jpg"
                                                width="257" height="257" alt="Product" />
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
                                                <a href="/porto/demo29-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title"> <a href="/porto/demo29-product.html">Clothes Chest</a> </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo29-product.html">
                                            <img src="/porto/assets/images/demoes/demo29/products/grey/dining/dining(1).jpg"
                                                width="257" height="257" alt="Product" />
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
                                                <a href="/porto/demo29-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title"> <a href="/porto/demo29-product.html">Drawer</a> </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo29-product.html">
                                            <img src="/porto/assets/images/demoes/demo29/products/grey/kitchen/kitchen(2).jpg"
                                                width="257" height="257" alt="Product" />
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
                                                <a href="/porto/demo29-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title"> <a href="/porto/demo29-product.html">Product Short Name</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo29-product.html">
                                            <img src="/porto/assets/images/demoes/demo29/products/grey/office/office(4).jpg"
                                                width="257" height="257" alt="Product" />
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
                                                <a href="/porto/demo29-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title"> <a href="/porto/demo29-product.html">Product Short Name</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo29-product.html">
                                            <img src="/porto/assets/images/demoes/demo29/products/grey/kitchen/kitchen(7).jpg"
                                                width="257" height="257" alt="Product" />
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
                                                <a href="/porto/demo29-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title"> <a href="/porto/demo29-product.html">Product Short Name</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo29-product.html">
                                            <img src="/porto/assets/images/demoes/demo29/products/grey/kitchen/kitchen(1).jpg"
                                                width="257" height="257" alt="Product" />
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
                                                <a href="/porto/demo29-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title"> <a href="/porto/demo29-product.html">Sieve</a> </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo29-product.html">
                                            <img src="/porto/assets/images/demoes/demo29/products/grey/dining/dining(4).jpg"
                                                width="257" height="257" alt="Product" />
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
                                                <a href="/porto/demo29-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title"> <a href="/porto/demo29-product.html">Dinner Table</a> </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo29-product.html">
                                            <img src="/porto/assets/images/demoes/demo29/products/grey/outdoor/outdoor(4).jpg"
                                                width="257" height="257" alt="Product" />
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
                                                <a href="/porto/demo29-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title"> <a href="/porto/demo29-product.html">Wooden Box</a> </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>
                        </div>
                        <a href="/porto/demo29-shop.html" class="btn with-icon align-center font2">Browse All<i
                                class="fas fa-long-arrow-alt-right"></i></a>
                    </div>

                    <hr />
                </div>

                <div class="blog-section container mb-4 appear-animate" data-animation-name="fadeIn"
                    data-animation-delay="100">
                    <div class="row">
                        <div class="col-xl-6 mb-3 mb-xl-0">
                            <div class="section-title d-flex align-items-center mt-1 mb-1">
                                <h2 class="mb-0">RECENT ARTICLE</h2>
                                <hr class="vertical d-none d-sm-block">
                                <a href="#" class="with-icon mr-sm-auto ml-4 mr-4 ml-sm-0">VIEW BLOG<i
                                        class="fas fa-long-arrow-alt-right"></i></a>
                            </div>

                            <div class="row post">
                                <div class="col-md-6">
                                    <div class="post-media">
                                        <a href="/porto/single.html">
                                            <img src="/porto/assets/images/demoes/demo29/banners/banner-article.jpg"
                                                width="396" height="297" alt="Post" />
                                        </a>
                                        <div class="post-date">
                                            <span class="day ls-0">24</span>
                                            <span class="month">JUL-19</span>
                                        </div><!-- End .post-date -->
                                    </div><!-- End .post-media -->
                                </div>
                                <div class="col-md-6 d-flex align-items-center">
                                    <div class="post-body">
                                        <a href="#" class="post-category">DESIGN TRENDS</a>
                                        <h3 class="post-title">Top quality flooring and parquets</h3>
                                        <p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras
                                            non placerat
                                            mi. Etiam non tellus sem. Aenean pretium convallis lorem, sit amet
                                            dapibus...</p>
                                        <a href="/porto/single.html" class="btn with-icon">READ MORE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="section-title d-flex align-items-center mt-1 mb-1">
                                <h2 class="mb-0">FROM INSTAGRAM</h2>
                                <hr class="vertical d-none d-sm-block">
                                <a href="#" class="with-icon mr-sm-auto ml-4 mr-4 ml-sm-0">@PORTODECOR<i
                                        class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                            <div class="row row-sm">
                                <div class="col-sm-4 mt-2 mb-2">
                                    <img class="w-100" src="/porto/assets/images/demoes/demo29/instagram/instagram1.jpg"
                                        width="263" height="263" alt="Instagram" />
                                </div>
                                <div class="col-sm-4 mt-2 mb-2">
                                    <img class="w-100" src="/porto/assets/images/demoes/demo29/instagram/instagram2.jpg"
                                        width="263" height="263" alt="Instagram" />
                                </div>
                                <div class="col-sm-4 mt-2 mb-2">
                                    <img class="w-100" src="/porto/assets/images/demoes/demo29/instagram/instagram3.jpg"
                                        width="263" height="263" alt="Instagram" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
