@extends('layouts.porto')

@section('footer')
    @include('components.porto.demo39.footer')
@endsection


@section('header')
    @include('components.porto.demo39.header')
@endsection

@section('content')
<div class="home-slider slide-animate owl-carousel owl-theme dot-inside show-nav-hover custom-nav-1 mb-4 text-uppercase" data-owl-options="{
                'loop': false,
                'nav' : false,
                'responsive': {
                    '0': {
                        'dots' : true
                    },
                    '1200': {
                        'nav' : true
                    }
                }
			}">
                <div class="home-slide home-slide1 banner">
                    <img class="slide-bg" src="/porto/assets/images/demoes/demo39/slider/slide-1.jpg" width="1903" height="503" alt="slider image" style="background-color: #f4f4f4;">
                    <div class="container d-flex align-items-center">
                        <div class="banner-layer appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="150">
                            <h2 class="text-transform-none">Porto wine</h2>
                            <h3 class="text-capitalize ml-2 appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="200">2016 Cabernet Sauvignon</h3>
                            <h4 class="text-transform-none ml-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. quam lacus, et suscipit lectus porta efficitur.</h4>
                            <h5 class="d-flex ml-3">
                                <span class="text-transform-none">only</span>
                                <b class="coupon-sale-text text-white align-middle text-primary font2"><sup>$</sup><em>39</em><sup>99</sup></b>
                            </h5>
                            <a href="/porto/demo39-shop.html" class="btn btn-lg ml-3">Shop Now</a>
                        </div>
                        <!-- End .banner-layer -->
                    </div>
                </div>
                <!-- End .home-slide -->

                <div class="home-slide home-slide2 banner banner-md-vw">
                    <img class="slide-bg" src="/porto/assets/images/demoes/demo39/slider/slide-2.jpg" width="1903" height="550" alt="slider image" style="background-color: #f4f4f4;">
                    <div class="container d-flex align-items-center">
                        <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                            <h2 class="text-transform-none">Rare Wines</h2>
                            <h3 class="text-capitalize ml-2">The Top Selection</h3>
                            <h4 class="text-transform-none ml-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. quam lacus, et suscipit lectus porta efficitur.</h4>
                            <h5 class="d-flex justify-content-end ml-3 appear-animate" data-animation-name="fadeInRightShorter">
                                <span class="text-transform-none">Starting at</span>
                                <b class="coupon-sale-text text-white align-middle text-primary font2"><sup>$</sup><em>99</em><sup>99</sup></b>
                            </h5>
                            <a href="/porto/demo39-shop.html" class="btn btn-lg ml-3">Shop Now</a>
                        </div>
                        <!-- End .banner-layer -->
                    </div>
                </div>
                <!-- End .home-slide -->
            </div>
            <!-- End .home-slider -->

            <div class="container">
                <div class="product-category-tabs appear-animate" data-animation-name="fadeInUpShorter">
                    <div class="heading mb-0">
                        <h4>FILTER BY:</h4>
                    </div>

                    <ul class=" nav nav-tabs row row-joined pb-0 border-0" role="tablist">
                        <li class="nav-item col-6 m-0 text-center">
                            <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">VARIETAL</a>
                        </li>

                        <li class="nav-item col-6 m-0 text-center">
                            <a class="nav-link" id="product-tab-size" data-toggle="tab" href="#product-size-content" role="tab" aria-controls="product-size-content" aria-selected="true">REGION</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
                            <div class="row">
                                <div class="col-md-3 col-6 mb-4 mb-md-0">
                                    <div class="category-info font2">
                                        <h4 class="category-info-title"><a href="/porto/demo39-shop.html">Red Wine</a></h4>
                                        <ul class="category-info-content">
                                            <li><a href="/porto/demo39-shop.html">Bordeaux Blends</a></li>
                                            <li><a href="/porto/demo39-shop.html">Cabernet Sauvignon</a></li>
                                            <li><a href="/porto/demo39-shop.html">Merlot</a></li>
                                            <li><a href="/porto/demo39-shop.html">Pinot Noir</a></li>
                                            <li><a href="/porto/demo39-shop.html">Sangiovese</a></li>
                                        </ul>
                                        <a href="/porto/demo39-shop.html" class="view-more">VIEW ALL</a>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6 mb-4 mb-md-0">
                                    <div class="category-info font2">
                                        <h4 class="category-info-title"><a href="/porto/demo39-shop.html">White Wine</a></h4>
                                        <ul class="category-info-content">
                                            <li><a href="/porto/demo39-shop.html">Chardonnay</a></li>
                                            <li><a href="/porto/demo39-shop.html">Pinot Gris/grigio</a></li>
                                            <li><a href="/porto/demo39-shop.html">Riesling</a></li>
                                            <li><a href="/porto/demo39-shop.html">Sauvignon Blanc</a></li>
                                            <li><a href="/porto/demo39-shop.html">White Bordeaux Blends</a></li>
                                        </ul>
                                        <a href="/porto/demo39-shop.html" class="view-more">VIEW ALL</a>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="category-info font2">
                                        <h4 class="category-info-title"><a href="/porto/demo39-shop.html">Other</a></h4>
                                        <ul class="category-info-content">
                                            <li><a href="/porto/demo39-shop.html">Champagne</a></li>
                                            <li><a href="/porto/demo39-shop.html">Desert & Fortified</a></li>
                                            <li><a href="/porto/demo39-shop.html">Rose Wine</a></li>
                                            <li><a href="/porto/demo39-shop.html">Sake</a></li>
                                            <li><a href="/porto/demo39-shop.html">Sparking</a></li>
                                        </ul>
                                        <a href="/porto/demo39-shop.html" class="view-more">VIEW ALL</a>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="category-info font2">
                                        <h4 class="category-info-title"><a href="/porto/demo39-shop.html">Selection</a></h4>
                                        <ul class="category-info-content">
                                            <li><a href="/porto/demo39-shop.html">From $100 to $200</a></li>
                                            <li><a href="/porto/demo39-shop.html">From $200 to $500</a></li>
                                            <li><a href="/porto/demo39-shop.html">From $40 to $60</a></li>
                                            <li><a href="/porto/demo39-shop.html">From $60 to $100</a></li>
                                            <li><a href="/porto/demo39-shop.html">Top Sellers</a></li>
                                        </ul>
                                        <a href="/porto/demo39-shop.html" class="view-more">VIEW ALL</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End .tab-pane -->

                        <div class="tab-pane fade" id="product-size-content" role="tabpanel" aria-labelledby="product-tab-size">
                            <div class="row">
                                <div class="col-md-3 col-6 mb-3 mb-md-0">
                                    <div class="category-info font2">
                                        <h4 class="category-info-title"><a href="/porto/demo39-shop.html">France</a></h4>
                                        <ul class="category-info-content">
                                            <li><a href="/porto/demo39-shop.html">Bordeaux</a></li>
                                            <li><a href="/porto/demo39-shop.html">Burgundy</a></li>
                                            <li><a href="/porto/demo39-shop.html">Champagne</a></li>
                                            <li><a href="/porto/demo39-shop.html">Rhone</a></li>
                                            <li><a href="/porto/demo39-shop.html">Woddu</a></li>
                                        </ul>
                                        <a href="/porto/demo39-shop.html" class="view-more">VIEW ALL</a>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6 mb-3 mb-md-0">
                                    <div class="category-info font2">
                                        <h4 class="category-info-title"><a href="/porto/demo39-shop.html">Italy</a></h4>
                                        <ul class="category-info-content">
                                            <li><a href="/porto/demo39-shop.html">Fruili-venezia-giulia</a></li>
                                            <li><a href="/porto/demo39-shop.html">Piedmont</a></li>
                                            <li><a href="/porto/demo39-shop.html">Siciliy</a></li>
                                            <li><a href="/porto/demo39-shop.html">Tuscany</a></li>
                                            <li><a href="/porto/demo39-shop.html">Veneto</a></li>
                                        </ul>
                                        <a href="/porto/demo39-shop.html" class="view-more">VIEW ALL</a>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="category-info font2">
                                        <h4 class="category-info-title"><a href="/porto/demo39-shop.html">Usa</a></h4>
                                        <ul class="category-info-content">
                                            <li><a href="/porto/demo39-shop.html">California</a></li>
                                            <li><a href="/porto/demo39-shop.html">Central Coast</a></li>
                                            <li><a href="/porto/demo39-shop.html">Napa Volley</a></li>
                                            <li><a href="/porto/demo39-shop.html">Sonoma Country</a></li>
                                            <li><a href="/porto/demo39-shop.html">Washington</a></li>
                                        </ul>
                                        <a href="/porto/demo39-shop.html" class="view-more">VIEW ALL</a>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="category-info font2">
                                        <h4 class="category-info-title"><a href="/porto/demo39-shop.html">Country</a></h4>
                                        <ul class="category-info-content">
                                            <li><a href="/porto/demo39-shop.html">Australia</a></li>
                                            <li><a href="/porto/demo39-shop.html">Austria</a></li>
                                            <li><a href="/porto/demo39-shop.html">Germany</a></li>
                                            <li><a href="/porto/demo39-shop.html">Portugal</a></li>
                                            <li><a href="/porto/demo39-shop.html">Spain</a></li>
                                        </ul>
                                        <a href="/porto/demo39-shop.html" class="view-more">VIEW ALL</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End .tab-pane -->
                    </div>
                    <!-- End .tab-content -->
                </div>
                <!-- End .product-single-tabs -->
            </div>
            <!-- End .container -->

            <section class="popular-products-section appear-animate" data-animation-name="fadeInUpShorter">
                <div class="container">
                    <div class="heading">
                        <h2 class="text-uppercase">Popular Wines</h2>
                    </div>

                    <div class="products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center" data-owl-options="{
                        'dots': false,
                        'nav': true,
                        'navText': [ '<i class=icon-arrow-forward-right>', '<i class=icon-arrow-forward-right>' ]
					}">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo39-product.html">
                                    <img src="/porto/assets/images/demoes/demo39/products/product-1.jpg" width="205" height="205" alt="product">
                                </a>

                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo39-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo39-product.html">Pedro Jeixeiru</a>
                                </h3>
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
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo39-product.html">
                                    <img src="/porto/assets/images/demoes/demo39/products/product-2.jpg" width="205" height="205" alt="product">
                                </a>

                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo39-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo39-product.html">Chandon</a>
                                </h3>
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
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo39-product.html">
                                    <img src="/porto/assets/images/demoes/demo39/products/product-3.jpg" width="205" height="205" alt="product">
                                </a>

                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo39-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo39-product.html">Artefacto</a>
                                </h3>
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
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo39-product.html">
                                    <img src="/porto/assets/images/demoes/demo39/products/product-4.jpg" width="205" height="205" alt="product">
                                </a>

                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo39-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo39-product.html">Carnivor</a>
                                </h3>
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
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo39-product.html">
                                    <img src="/porto/assets/images/demoes/demo39/products/product-5.jpg" width="205" height="205" alt="product">
                                </a>

                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo39-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo39-product.html">Cathedeal Cellar </a>
                                </h3>
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
                    <!-- End .featured-proucts -->
                </div>
            </section>

            <section class="banner-section container">
                <div class="row">
                    <div class="col-md-8 mb-md-0 mb-2">
                        <div class="banner banner1 d-flex align-items-center flex-column flex-sm-row justify-content-center justify-content-sm-between" style="background-image: url(/porto/assets/images/demoes/demo39/banners/banner-1.jpg);">
                            <div class="content-left text-sm-right text-center appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="100">
                                <h2 class="text-white">RARE WINES</h2>
                                <h5 class="mb-sm-0 mb-2">Incredible Discounts</h5>
                            </div>
                            <div class="content-right text-right appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="200">
                                <h5 class="d-flex">
                                    <span class="text-transform-none text-white">only</span>
                                    <b class="coupon-sale-text text-white align-middle text-white font2"><sup>$</sup><em>39</em><sup>99</sup></b>
                                </h5>
                                <a href="/porto/demo39-shop.html" class="btn btn-lg">Shop Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="banner banner2" style="background-image: url(/porto/assets/images/demoes/demo39/banners/banner-2.jpg);">
                            <div class="content-left">
                                <h2 class="appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="50">Top<span class="text-primary font2">10+</span></h2>
                                <h4 class="appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="150">Under<b class="font2">$100</b></h4>
                                <a href="/porto/demo39-shop.html" class="btn btn-lg appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="featured-products-container mb-2 appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200">
                <div class="container">
                    <div class="heading">
                        <h2 class="text-uppercase">Featured Wines</h2>
                    </div>

                    <div class="products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center appear-animate" data-animation-delay="500" data-animation-name="fadeIn" data-owl-options="{
						'dots': false,
                        'nav': true
					}">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo39-product.html">
                                    <img src="/porto/assets/images/demoes/demo39/products/product-5.jpg" width="205" height="205" alt="product">
                                </a>

                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo39-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo39-product.html">Cathedeal Cellar</a>
                                </h3>
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
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo39-product.html">
                                    <img src="/porto/assets/images/demoes/demo39/products/product-6.jpg" width="205" height="205" alt="product">
                                </a>

                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo39-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo39-product.html">Calyptra</a>
                                </h3>
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
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo39-product.html">
                                    <img src="/porto/assets/images/demoes/demo39/products/product-7.jpg" width="205" height="205" alt="product">
                                </a>

                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo39-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo39-product.html">Calyptra</a>
                                </h3>
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
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo39-product.html">
                                    <img src="/porto/assets/images/demoes/demo39/products/product-5.jpg" width="205" height="205" alt="product">
                                </a>

                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                            class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo39-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo39-product.html">Cathedeal Cellar</a>
                                </h3>
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
                    <!-- End .featured-proucts -->
                </div>
            </section>

            <div class="testimonials-section" style="background-image: url(/porto/assets/images/demoes/demo39/banners/banner-3.jpg);">
                <div class="container appear-animate" data-animation-name="fadeIn" data-animation-delay="100">
                    <div class="owl-carousel owl-theme">
                        <div class="testimonial col-sm-8 col-9 m-auto">
                            <blockquote class="pl-0 pr-0">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tempor tempus rhoncus. Sed et magna quis nisi iaculis consectetur. Nullam molestie sed dui at volutpat. Morbi porta malesuada tortor, eu hendrerit lectus.
                                </p>
                            </blockquote>

                            <div class="testimonial-owner justify-content-center text-center flex-column">
                                <figure>
                                    <img src="/porto/assets/images/demoes/demo39/clients/client1.png" alt="client">
                                </figure>

                                <div>
                                    <h5 class="testimonial-title">Mary Doe</h5>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->
                                </div>
                            </div>
                            <!-- End .testimonial-owner -->
                        </div>
                        <!-- End .testimonial -->
                    </div>
                </div>
                <!-- End .container -->
            </div>
            <!-- End .testimonials-section -->

            <div class="product-widgets-container container mb-md-4 mb-0 pb-2 appear-animate" data-animation-name="fadeIn" data-animation-delay="100">
                <div class="heading">
                    <h2 class="text-uppercase">Staff Favorites</h2>
                </div>

                <div class=" row pb-2">
                    <div class="col-md-4  col-sm-6 pb-5 pb-md-0">
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/product.html">
                                    <img src="/porto/assets/images/demoes/demo39/products/small/product-6.jpg" width="74" height="74" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/product.html">Pedro Jeixeiru</a> </h3>

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
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/product.html">
                                    <img src="/porto/assets/images/demoes/demo39/products/small/product-2.jpg" width="74" height="74" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/product.html">Calyptra</a> </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">5.00</span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->

                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/product.html">
                                    <img src="/porto/assets/images/demoes/demo39/products/small/product-3.jpg" width="74" height="74" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/product.html">Calyptra</a> </h3>

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
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>

                    <div class="col-md-4  col-sm-6 pb-5 pb-md-0">
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/product.html">
                                    <img src="/porto/assets/images/demoes/demo39/products/small/product-3.jpg" width="74" height="74" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/product.html">Calyptra</a> </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">5.00</span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->

                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/product.html">
                                    <img src="/porto/assets/images/demoes/demo39/products/small/product-5.jpg" width="74" height="74" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/product.html">Bridlewood</a> </h3>

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
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/product.html">
                                    <img src="/porto/assets/images/demoes/demo39/products/small/product-6.jpg" width="74" height="74" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/product.html">Pedro Jeixeiru</a> </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">5.00</span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->

                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>

                    <div class="col-md-4  col-sm-6 pb-5 pb-md-0">
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/product.html">
                                    <img src="/porto/assets/images/demoes/demo39/products/small/product-6.jpg" width="74" height="74" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/product.html">Pedro Jeixeiru</a> </h3>

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
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/product.html">
                                    <img src="/porto/assets/images/demoes/demo39/products/small/product-1.jpg" width="74" height="74" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/product.html">Wine</a> </h3>

                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top">5.00</span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->

                                <div class="price-box">
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>

                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/product.html">
                                    <img src="/porto/assets/images/demoes/demo39/products/small/product-2.jpg" width="74" height="74" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="/porto/product.html">Calyptra</a> </h3>

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
                                    <span class="product-price">$49.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End .row -->

            <div class="container">
                <div class="banner-section custom-banner-section bg-primary">
                    <div class="banner banner1 d-flex flex-column flex-md-row align-items-center justify-content-center">
                        <div class="content-left text-center text-lg-left mb-2 mb-md-0 appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="150">
                            <h2 class="text-white">WINE SPECTATOR'S TOP <span class="font1">100</span></h2>
                            <h5 class="mb-0">Check Now This Year’s List</h5>
                        </div>
                        <div class="content-right text-right appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="200">
                            <a href="/porto/demo39-shop.html" class="btn btn-lg">Shop Now</a>
                        </div>
                    </div>
                </div>

                <div class="blog-section font2 media-with-zoom appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="250">
                    <div class="heading">
                        <h2 class="text-uppercase">FROM THE BLOG</h2>
                    </div>

                    <div class="owl-carousel owl-theme mb-0" data-owl-options="{
                            'margin' : 20,
                            'nav' : false,
                            'dots' : false,
                            'loop' : false,
                            'responsive' : {
                                '576' : {
                                    'items' : 2
                                },
                                '768' : {
                                    'items' : 2
                                },
                                '992' : {
                                    'items' : 3
                                }
                            }
                        }">
                        <article class="post mb-3">
                            <div class="post-box">
                                <div class="post-media">
                                    <a href="/porto/single.html">
                                        <img src="/porto/assets/images/demoes/demo39/blog/post-1.jpg" data-zoom-image="/porto/assets/images/demoes/demo39/blog/post-1.jpg" width="354" height="181" alt="Post">
                                    </a>

                                    <span class="prod-full-screen">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div>
                                <!-- End .post-media -->

                                <div class="post-body">
                                    <div class="post-meta">
                                        <span class="meta-date"><i class="far fa-calendar-alt"></i>December 1,
                                            2020</span>
                                        <span class="meta-author"><i class="far fa-user"></i>By <a href="#"
                                                title="Posts by John Doe" rel="author">John Doe</a></span>
                                        <span class="meta-comments"><i class="far fa-comments"></i><a href="#"
                                                title="Comment on Lorem ipsum dolor sit amet">0 Comments</a></span>
                                    </div>

                                    <h2 class="post-title">
                                        <a href="/porto/single.html">Lorem ipsum dolor sit amet</a>
                                    </h2>

                                    <div class="post-content">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi....
                                        </p>

                                        <a href="/porto/single.html" class="read-more">read more...</a>
                                    </div>
                                    <!-- End .post-content -->
                                </div>
                                <!-- End .post-body -->
                            </div>
                        </article>

                        <article class="post mb-3">
                            <div class="post-box">
                                <div class="post-media">
                                    <a href="/porto/single.html">
                                        <img src="/porto/assets/images/demoes/demo39/blog/post-2.jpg" data-zoom-image="/porto/assets/images/demoes/demo39/blog/post-2.jpg" width="354" height="181" alt="Post">
                                    </a>

                                    <span class="prod-full-screen">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div>
                                <!-- End .post-media -->

                                <div class="post-body">
                                    <div class="post-meta">
                                        <span class="meta-date"><i class="far fa-calendar-alt"></i>December 1,
                                            2020</span>
                                        <span class="meta-author"><i class="far fa-user"></i>By <a href="#"
                                                title="Posts by John Doe" rel="author">John Doe</a></span>
                                        <span class="meta-comments"><i class="far fa-comments"></i><a href="#"
                                                title="Comment on Lorem ipsum dolor sit amet">0 Comments</a></span>
                                    </div>

                                    <h2 class="post-title">
                                        <a href="/porto/single.html">Lorem ipsum dolor sit amet</a>
                                    </h2>

                                    <div class="post-content">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi....
                                        </p>

                                        <a href="/porto/single.html" class="read-more">read more...</a>
                                    </div>
                                    <!-- End .post-content -->
                                </div>
                                <!-- End .post-body -->
                            </div>
                        </article>

                        <article class="post mb-3">
                            <div class="post-box">
                                <div class="post-media">
                                    <a href="/porto/single.html">
                                        <img src="/porto/assets/images/demoes/demo39/blog/post-3.jpg" data-zoom-image="/porto/assets/images/demoes/demo39/blog/post-1.jpg" width="354" height="181" alt="Post">
                                    </a>

                                    <span class="prod-full-screen">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div>
                                <!-- End .post-media -->

                                <div class="post-body">
                                    <div class="post-meta">
                                        <span class="meta-date"><i class="far fa-calendar-alt"></i>December 1,
                                            2020</span>
                                        <span class="meta-author"><i class="far fa-user"></i>By <a href="#"
                                                title="Posts by John Doe" rel="author">John Doe</a></span>
                                        <span class="meta-comments"><i class="far fa-comments"></i><a href="#"
                                                title="Comment on Lorem ipsum dolor sit amet">0 Comments</a></span>
                                    </div>

                                    <h2 class="post-title">
                                        <a href="/porto/single.html">Lorem ipsum dolor sit amet</a>
                                    </h2>

                                    <div class="post-content">
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi....
                                        </p>

                                        <a href="/porto/single.html" class="read-more">read more...</a>
                                    </div>
                                    <!-- End .post-content -->
                                </div>
                                <!-- End .post-body -->
                            </div>
                        </article>
                    </div>
                    <!-- End .owl-carousel -->
                </div>
                <!-- End .related-posts -->

                <div class="info-boxes-container row row-joined appear-animate" data-animation-name="fadeIn" data-animation-duration="1000" data-animation-delay="100">
                    <div class="info-box info-box-icon-left col-lg-4">
                        <i class="icon-shipping"></i>

                        <div class="info-box-content">
                            <h4>FREE SHIPPING &amp; RETURN</h4>
                            <p class="text-body">Free shipping on all orders over $99.</p>
                        </div>
                        <!-- End .info-box-content -->
                    </div>
                    <!-- End .info-box -->

                    <div class="info-box info-box-icon-left col-lg-4">
                        <i class="icon-money"></i>

                        <div class="info-box-content">
                            <h4>MONEY BACK GUARANTEE</h4>
                            <p class="text-body">100% money back guarantee</p>
                        </div>
                        <!-- End .info-box-content -->
                    </div>
                    <!-- End .info-box -->

                    <div class="info-box info-box-icon-left col-lg-4">
                        <i class="icon-support"></i>

                        <div class="info-box-content">
                            <h4>ONLINE SUPPORT 24/7</h4>
                            <p class="text-body">Lorem ipsum dolor sit amet.</p>
                        </div>
                        <!-- End .info-box-content -->
                    </div>
                    <!-- End .info-box -->
                </div>
                <!-- End .info-boxes-container -->

                <div class="instagram-section appear-animate appear-animate" data-animation-name="fadeIn" data-animation-delay="100">
                    <div class="heading">
                        <h2 class="text-uppercase">FROM INSTAGRAM - <span>@PORTOWINESHOP</span></h2>
                    </div>

                    <div class="owl-carousel owl-theme instagram-feed-list dots-small" data-owl-options="{
                        'margin': 20,
                        'dots': false,
                        'responsive': {
                            '0': {
                                'items' : 2
                            },
                            '576': {
                                'items' : 3
                            },
                            '991': {
                                'items' : 4
                            }
                        }
                    }">
                        <a href="#"><img src="/porto/assets/images/demoes/demo39/instagram/1.jpg" width="197" height="150" alt="Feed"></a>
                        <a href="#"><img src="/porto/assets/images/demoes/demo39/instagram/2.jpg" width="197" height="150" alt="Feed"></a>
                        <a href="#"><img src="/porto/assets/images/demoes/demo39/instagram/3.jpg" width="197" height="150" alt="Feed"></a>
                        <a href="#"><img src="/porto/assets/images/demoes/demo39/instagram/4.jpg" width="197" height="150" alt="Feed"></a>
                    </div>
                    <!-- End .instagram-feed-carousel -->
                </div>
                <!-- End .instagram-section -->
            </div>
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
