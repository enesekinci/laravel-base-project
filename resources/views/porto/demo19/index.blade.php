@extends('layouts.porto')

@section('footer')
    @include('components.porto.demo19.footer')
@endsection

@section('top-notice')
    @include('components.porto.demo19.top-notice')
@endsection


@section('header')
    @include('components.porto.demo19.header-home')
@endsection

@section('content')
<div class="home-slider slide-animate owl-carousel owl-theme show-nav-hover nav-big text-uppercase"
                data-owl-options="{
                'nav': false,
                'responsive': {
                    '992': {
                        'nav': true
                    }
                }
            }">
                <div class="home-slide home-slide1 banner">
                    <img class="slide-bg" src="/porto/assets/images/demoes/demo19/slider/slide-1.jpg"
                        style="background-color: #cfcfcf;" alt="slider image">
                    <div class="container d-flex align-items-center">
                        <div class="banner-layer">
                            <h4 class="text-transform-none mb-0 appear-animate" data-animation-name="fadeInUpShorter"
                                data-animation-delay="200">Find the Boundaries. Push Through!</h4>
                            <h2 class="text-transform-none line-height-1 m-b-1 appear-animate"
                                data-animation-name="fadeInUpShorter" data-animation-delay="400">Smartphones</h2>
                            <h3 class="line-height-1 m-b-3 appear-animate" data-animation-name="fadeInUpShorter"
                                data-animation-delay="600">70% Off</h3>
                            <a href="/porto/demo19-shop.html" class="btn btn-dark btn-xl ls-10 appear-animate"
                                data-animation-name="fadeInUpShorter" data-animation-delay="1000">Shop Now!</a>
                            <h5 class="float-right mb-0">
                                <span class="d-inline-block align-top line-height-1 ls-n-20 m-b-4 appear-animate"
                                    data-animation-name="fadeInUpShorter" data-animation-delay="1000">Starting At</span>
                                <b class="coupon-sale-text d-inline-block ls-n-20 text-white bg-secondary m-b-1 appear-animate"
                                    data-animation-name="fadeInUpShorter"
                                    data-animation-delay="800"><sup>$</sup>199<sup>99</sup></b>
                            </h5>
                        </div><!-- End .banner-layer -->
                    </div>
                </div><!-- End .home-slide -->

                <div class="home-slide home-slide2 banner">
                    <img class="owl-lazy slide-bg" src="/porto/assets/images/lazy.png"
                        data-src="/porto/assets/images/demoes/demo19/slider/slide-2.jpg" style="background-color: #cfcfcf;"
                        alt="slider image">
                    <div class="container d-flex align-items-center">
                        <div class="banner-layer">
                            <h4 class="appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200">
                                It's the best time of the year!</h4>
                            <h2 class="text-transform-none line-height-1 m-b-1 appear-animate"
                                data-animation-name="fadeInUpShorter" data-animation-delay="400">Hot Collections</h2>
                            <h3 class="line-height-1 m-b-3 appear-animate" data-animation-name="fadeInUpShorter"
                                data-animation-delay="600">50% Off</h3>
                            <a href="/porto/demo19-shop.html" class="btn btn-dark btn-xl ls-10 appear-animate"
                                data-animation-name="fadeInUpShorter" data-animation-delay="1000">Shop Now!</a>
                            <h5 class="float-right mb-0">
                                <span class="d-inline-block align-top line-height-1 ls-n-20 m-b-4 appear-animate"
                                    data-animation-name="fadeInUpShorter" data-animation-delay="800">Starting At</span>
                                <span class="d-inline-block appear-animate m-b-1" data-animation-name="fadeInUpShorter"
                                    data-animation-delay="1000">
                                    <b
                                        class="coupon-sale-text d-inline-block ls-n-20 text-white bg-secondary"><sup>$</sup>199<sup>99</sup></b>
                                </span>
                            </h5>
                        </div><!-- End .banner-layer -->
                    </div>
                </div><!-- End .home-slide -->
            </div><!-- End .home-slider -->

            <div class="main-container mt-3 mt-md-0">
                <div class="container-fluid">
                    <div class="category-list" id="category-list">
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

                    <div class="category-details">
                        <section id="cat-1" class="category-section">
                            <div class="category-title appear-animate" data-animation-name="fadeInDownShorter"
                                data-animation-delay="200">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle cat-title" data-display="static"
                                        data-toggle="dropdown">Fashion &amp; Clothes</a>
                                    <div class="dropdown-menu">
                                        <ul class="row m-0">
                                            <li class="col-6 col-md-4 col-lg-2">
                                                <a href="#">FASHION</a>
                                                <ul>
                                                    <li><a href="#">Women</a></li>
                                                    <li><a href="#">Men</a></li>
                                                    <li><a href="#">Accessories</a></li>
                                                    <li><a href="#">Jewelry</a></li>
                                                    <li><a href="#">Shoes</a></li>
                                                </ul>
                                            </li>
                                            <li class="col-6 col-md-4 col-lg-2">
                                                <a href="#">NEW ARRIVALS</a>
                                                <ul>
                                                    <li><a href="#">Dresses</a></li>
                                                    <li><a href="#">Tops</a></li>
                                                    <li><a href="#">Jackets</a></li>
                                                    <li><a href="#">Bottoms</a></li>
                                                    <li><a href="#">Swim</a></li>
                                                    <li><a href="#">Accessories</a></li>
                                                    <li><a href="#">Shoes</a></li>
                                                </ul>
                                            </li>
                                            <li class="col-6 col-md-4 col-lg-2">
                                                <a href="#">JACKETS</a>
                                                <ul>
                                                    <li><a href="#">Bomber</a></li>
                                                    <li><a href="#">Leather + Suede</a></li>
                                                    <li><a href="#">Denim</a></li>
                                                    <li><a href="#">Parkas + Anoraks</a></li>
                                                    <li><a href="#">Blazers</a></li>
                                                    <li><a href="#">Dusters</a></li>
                                                </ul>
                                            </li>
                                            <li class="col-6 col-md-4 col-lg-2">
                                                <a href="#">TOP</a>
                                                <ul>
                                                    <li><a href="#">Shirts</a></li>
                                                    <li><a href="#">Bodysuits</a></li>
                                                    <li><a href="#">Cropped</a></li>
                                                    <li><a href="#">Tanks + Tees</a></li>
                                                    <li><a href="#">Graphic Tees</a></li>
                                                    <li><a href="#">Sweaters</a></li>
                                                    <li><a href="#">Cardigans</a></li>
                                                </ul>
                                            </li>
                                            <li class="col-6 col-md-4 col-lg-2">
                                                <a href="#">DRESSES</a>
                                                <ul>
                                                    <li><a href="#">Casual</a></li>
                                                    <li><a href="#">Cocktail</a></li>
                                                    <li><a href="#">Mini</a></li>
                                                    <li><a href="#">Midi</a></li>
                                                    <li><a href="#">Maxi</a></li>
                                                    <li><a href="#">Rompers</a></li>
                                                    <li><a href="#">Plus Size</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div><!-- End .dropdown-menu -->
                                </div><!-- End .dropdown -->
                                <a href="/porto/demo19-shop.html" class="btn btn-dark">View All</a>
                            </div><!-- End .category-title -->
                            <div class="products-slider custom-products owl-carousel owl-theme appear-animate"
                                data-owl-options="{
                                'dots': false,
                                'responsive': {
                                    '1200': {
                                        'items': 6
                                    }
                                }
                            }" data-animation-name="fadeInDownShorter" data-animation-delay="200">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-1.jpg" width="205"
                                                height="205" alt="product">
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
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$23.90</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-2.jpg" width="205"
                                                height="205" alt="product">
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
                                                <a href="/porto/demo19-product.html">S-Graphic Baseball Cap</a>
                                            </h3>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:40%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$19.90</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-3.jpg" width="205"
                                                height="205" alt="product">
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
                                                <a href="/porto/demo19-product.html">Palm Print Shirt</a>
                                            </h3>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$49.90</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-4.jpg" width="205"
                                                height="205" alt="product">
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
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
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
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-5.jpg" width="205"
                                                height="205" alt="product">
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
                                                <a href="/porto/demo19-product.html">Varsity-Striped Collar Trousers</a>
                                            </h3>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$26.90</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-6.jpg" width="205"
                                                height="205" alt="product">
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
                                                <a href="/porto/demo19-product.html">PT Bags</a>
                                            </h3>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:75%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$185.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>
                            <div class="category-description appear-animate" data-animation-name="fadeInDownShorter"
                                data-animation-delay="200">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="banner banner1" style="background-color: #6db2d9;">
                                            <figure>
                                                <img src="/porto/assets/images/demoes/demo19/banners/banner-1.jpg" alt="banner"
                                                    width="825" height="178">
                                            </figure>
                                            <div class="banner-layer banner-layer-middle banner-layer-left">
                                                <h5 class="m-b-2">Find the Boundaries. Push Through!</h5>
                                                <h3 class="text-white mb-0">Summer Sale</h3>
                                                <h4 class="text-uppercase text-white mb-0">30% off</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="banner banner2" style="background-color: #f4f4f4;">
                                            <figure>
                                                <img src="/porto/assets/images/demoes/demo19/banners/banner-2.jpg" alt="banner"
                                                    width="825" height="178">
                                            </figure>
                                            <div class="banner-layer banner-layer-center text-center">
                                                <h3 class="text-uppercase ls-10 m-b-1">Deal Promos</h3>
                                                <h5 class="text-body text-uppercase mb-0">Starting at $99</h5>
                                            </div>
                                            <div class="banner-layer banner-layer-middle banner-layer-left">
                                                <h6 class="bg-dark text-white text-center mb-0">
                                                    50<small><sup>%</sup><sub>off</sub></small></h6>
                                            </div>
                                            <div class="banner-layer banner-layer-right banner-layer-top">
                                                <h6 class="bg-dark text-white text-center mb-0">
                                                    30<small><sup>%</sup><sub>off</sub></small></h6>
                                            </div>
                                            <div class="banner-layer banner-layer-right banner-layer-bottom">
                                                <h6 class="bg-dark text-white text-center mb-0">
                                                    70<small><sup>%</sup><sub>off</sub></small></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section id="cat-2" class="category-section">
                            <div class="category-title appear-animate" data-animation-name="fadeInDownShorter"
                                data-animation-delay="200">
                                <h2 class="cat-title">ELECTRONICS &amp; COMPUTERS</h2>
                                <a href="/porto/demo19-shop.html" class="btn btn-dark">View All</a>
                            </div><!-- End .category-title -->
                            <div class="products-slider custom-products owl-carousel owl-theme appear-animate"
                                data-owl-options="{
                                'dots': false,
                                'responsive': {
                                    '1200': {
                                        'items': 6
                                    }
                                }
                            }" data-animation-name="fadeInDownShorter" data-animation-delay="200">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-7.jpg" width="205"
                                                height="205" alt="product">
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
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
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
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-8.jpg" width="205"
                                                height="205" alt="product">
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
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="old-price">$669.00</span>
                                            <span class="product-price">$629.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-9.jpg" width="205"
                                                height="205" alt="product">
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
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
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
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-10.jpg" width="205"
                                                height="205" alt="product">
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
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
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
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-11.jpg" width="205"
                                                height="205" alt="product">
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
                                                <a href="/porto/demo19-product.html">Phone SE 64GB Space Grey</a>
                                            </h3>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$499.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-12.jpg" width="205"
                                                height="205" alt="product">
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
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
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
                            </div>
                            <div class="category-description appear-animate" data-animation-name="fadeInDownShorter"
                                data-animation-delay="200">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="banner banner3" style="background-color: #f4f4f4;">
                                            <figure>
                                                <img src="/porto/assets/images/demoes/demo19/banners/banner-3.jpg" alt="banner"
                                                    width="825" height="178">
                                            </figure>
                                            <div
                                                class="banner-layer banner-layer-middle row align-items-center flex-md-nowrap">
                                                <div class="col-auto offset-4">
                                                    <div class="coupon-sale-text">
                                                        <h4 class="m-b-2 font1 d-block text-white bg-dark">Exclusive
                                                            COUPON</h4>
                                                        <h5 class="mb-0 font1 d-inline-block bg-dark"><i
                                                                class="text-dark ls-0">UP TO</i><b
                                                                class="text-white">$100</b><sub
                                                                class="text-dark">OFF</sub></h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 offset-md-0 offset-4">
                                                    <h3 class="font1 ls-10 text-md-center text-uppercase mb-0">Drone
                                                        &amp; Cameras</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="banner banner4" style="background-color: #242527;">
                                            <figure>
                                                <img src="/porto/assets/images/demoes/demo19/banners/banner-4.jpg" alt="banner"
                                                    width="825" height="178">
                                            </figure>
                                            <div class="banner-layer banner-layer-middle row align-items-center">
                                                <div class="col-md-4 col-md-4 offset-4">
                                                    <h3
                                                        class="ls-10 text-uppercase text-white text-md-center m-b-2 mb-lg-0">
                                                        Electronic Deals</h3>
                                                </div>
                                                <div class="col-auto offset-md-0 offset-4">
                                                    <div class="coupon-sale-text">
                                                        <h4 class="m-b-2 font1 d-block text-dark bg-white">Exclusive
                                                            COUPON</h4>
                                                        <h5 class="mb-0 font1 d-inline-block"><i
                                                                class="text-white ls-0">UP TO</i><b
                                                                class="text-dark">$100</b><sub
                                                                class="text-white">OFF</sub></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section id="cat-3" class="category-section">
                            <div class="category-title appear-animate" data-animation-name="fadeInDownShorter"
                                data-animation-delay="200">
                                <h2 class="cat-title">Toys &amp; Games</h2>
                                <a href="/porto/demo19-shop.html" class="btn btn-dark">View All</a>
                            </div><!-- End .category-title -->
                            <div class="products-slider custom-products owl-carousel owl-theme appear-animate"
                                data-owl-options="{
                                'dots': false,
                                'responsive': {
                                    '1200': {
                                        'items': 6
                                    }
                                }
                            }" data-animation-name="fadeInDownShorter" data-animation-delay="200">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-13.jpg" width="205"
                                                height="205" alt="product">
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
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
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
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-14.jpg" width="205"
                                                height="205" alt="product">
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
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
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
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-15.jpg" width="205"
                                                height="205" alt="product">
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
                                                <a href="/porto/demo19-product.html">Kotobukiya Marvel Spider Woman</a>
                                            </h3>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$142.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-16.jpg" width="205"
                                                height="205" alt="product">
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
                                                <a href="/porto/demo19-product.html">Mercedes - Benz Actros Truck 1:18</a>
                                            </h3>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:50%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$499.99</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-17.jpg" width="205"
                                                height="205" alt="product">
                                        </a>
                                        <div class="label-group">
                                            <div class="product-label label-sale">-51%</div>
                                        </div>
                                        <div class="btn-icon-group">
                                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick View</a>
                                        <div class="product-countdown-container">
                                            <span class="product-countdown-title">offer ends in:</span>
                                            <div class="product-countdown countdown-compact" data-until="2021, 10, 5"
                                                data-compact="true">
                                            </div><!-- End .product-countdown -->
                                        </div><!-- End .product-countdown-container -->
                                    </figure>
                                    <div class="product-details">
                                        <div class="title-wrap">
                                            <h3 class="product-title">
                                                <a href="/porto/demo19-product.html">LEGO Juniors Knights Castle</a>
                                            </h3>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="old-price">$99.00</span>
                                            <span class="product-price">$49.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-18.jpg" width="205"
                                                height="205" alt="product">
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
                                                <a href="/porto/demo19-product.html">Toy anti-aircraft</a>
                                            </h3>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$99.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>
                            <div class="category-description appear-animate" data-animation-name="fadeInDownShorter"
                                data-animation-delay="200">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="banner banner5" style="background-color: #292929;">
                                            <figure>
                                                <img src="/porto/assets/images/demoes/demo19/banners/banner-5.jpg" alt="banner"
                                                    width="825" height="178">
                                            </figure>
                                            <div
                                                class="banner-layer banner-layer-middle d-flex justify-content-between align-items-center">
                                                <div class="content-left">
                                                    <h5 class="font1 text-uppercase m-b-1">Be a Kendo Warrior</h5>
                                                    <h3 class="font1 text-white text-uppercase ls-n-20 mb-0">ProWarrior
                                                    </h3>
                                                </div>
                                                <div class="content-right">
                                                    <h4 class="font1 mb-0 text-white">
                                                        <del>$59</del>
                                                        $29
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="banner banner6" style="background-color: #f4f4f4;">
                                            <figure>
                                                <img src="/porto/assets/images/demoes/demo19/banners/banner-6.jpg" alt="banner"
                                                    width="825" height="178">
                                            </figure>
                                            <div class="banner-layer banner-layer-middle banner-layer-left">
                                                <h3 class="m-b-1">Consoles &amp; Games</h3>
                                                <h4 class="mb-0">50% OFF</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section id="cat-4" class="category-section">
                            <div class="category-title appear-animate" data-animation-name="fadeInDownShorter"
                                data-animation-delay="200">
                                <h2 class="cat-title">Home &amp; Garden</h2>
                                <a href="/porto/demo19-shop.html" class="btn btn-dark">View All</a>
                            </div><!-- End .category-title -->
                            <div class="products-slider custom-products owl-carousel owl-theme appear-animate"
                                data-owl-options="{
                                'dots': false,
                                'responsive': {
                                    '1200': {
                                        'items': 6
                                    }
                                }
                            }" data-animation-name="fadeInDownShorter" data-animation-delay="200">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-19.jpg" width="205"
                                                height="205" alt="product">
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
                                                <a href="/porto/demo19-product.html">White Sofa</a>
                                            </h3>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:60%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$25.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-20.jpg" width="205"
                                                height="205" alt="product">
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
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$25.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-21.jpg" width="205"
                                                height="205" alt="product">
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
                                                <a href="/porto/demo19-product.html">UmbChair, outdoor, black-brown</a>
                                            </h3>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:50%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$150.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-22.jpg" width="205"
                                                height="205" alt="product">
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
                                                <a href="/porto/demo19-product.html">Umbrella with base, tilting beige</a>
                                            </h3>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:40%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$118.99</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-23.jpg" width="205"
                                                height="205" alt="product">
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
                                                <a href="/porto/demo19-product.html">Utdoor, brown stained</a>
                                            </h3>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$65.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-24.jpg" width="205"
                                                height="205" alt="product">
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
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$28.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>
                            <div class="category-description appear-animate" data-animation-name="fadeInDownShorter"
                                data-animation-delay="200">
                                <div class="row">
                                    <div class="col-lg-6 d-flex">
                                        <div class="banner banner7 m-b-4" style="background-color: #f4f4f4;">
                                            <figure>
                                                <img src="/porto/assets/images/demoes/demo19/banners/banner-7.jpg" alt="banner"
                                                    width="825" height="178">
                                            </figure>
                                            <div
                                                class="banner-layer banner-layer-middle d-flex justify-content-between align-items-center">
                                                <div class="content-left text-center">
                                                    <h5 class="heading-border text-dark text-uppercase m-b-1">Amazing
                                                    </h5>
                                                    <h3 class="font1 ls-n-10 text-uppercase m-b-2">Collection</h3>
                                                    <hr class="m-b-2 mt-0">
                                                    <h5 class="text-uppercase mb-0">Check our discounts</h5>
                                                </div>
                                                <div class="content-right text-center">
                                                    <h4 class="text-uppercase ls-n-20 m-b-2">Starting AT
                                                        <sup>$</sup>199<sup>99</sup></h4>
                                                    <h6 class="text-body text-uppercase mb-0">* limited time only</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div
                                            class="banner banner8 d-flex align-items-center justify-content-center m-b-4">
                                            <div
                                                class="row no-gutters banner-layer position-static justify-content-center align-items-center m-t-3 px-3">
                                                <div
                                                    class="col-auto d-flex flex-column justify-content-center text-center">
                                                    <h4 class="align-left text-uppercase mb-0">Furniture &amp; Garden
                                                    </h4>
                                                    <h3 class="text-white m-b-3 align-left text-uppercase">Huge Sale
                                                    </h3>
                                                </div>

                                                <div class="col-auto">
                                                    <h2 class="text-white m-b-3 position-relative align-left">
                                                        50<small>%<ins>OFF</ins></small>
                                                    </h2>
                                                </div>

                                                <div class="col-auto">
                                                    <a href="/porto/demo19-shop.html" class="btn m-b-3 ls-10">Shop Now!</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section id="cat-5" class="category-section">
                            <div class="category-title appear-animate" data-animation-name="fadeInDownShorter"
                                data-animation-delay="200">
                                <h2 class="cat-title">Sports &amp; Fitness</h2>
                                <a href="/porto/demo19-shop.html" class="btn btn-dark">View All</a>
                            </div><!-- End .category-title -->
                            <div class="products-slider custom-products owl-carousel owl-theme appear-animate"
                                data-owl-options="{
                                'dots': false,
                                'responsive': {
                                    '1200': {
                                        'items': 6
                                    }
                                }
                            }" data-animation-name="fadeInDownShorter" data-animation-delay="200">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-25.jpg" width="205"
                                                height="205" alt="product">
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
                                                <a href="/porto/demo19-product.html">Women's runnings tights</a>
                                            </h3>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:40%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$110.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-26.jpg" width="205"
                                                height="205" alt="product">
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
                                                <a href="/porto/demo19-product.html">Trey Basket Ball Shoe</a>
                                            </h3>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$229.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-27.jpg" width="205"
                                                height="205" alt="product">
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
                                                <a href="/porto/demo19-product.html">Red Football</a>
                                            </h3>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$33.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-28.jpg" width="205"
                                                height="205" alt="product">
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
                                                <a href="/porto/demo19-product.html">Jacket Marie Premier</a>
                                            </h3>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$199.99</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-29.jpg" width="205"
                                                height="205" alt="product">
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
                                                <a href="/porto/demo19-product.html">Running Backpack</a>
                                            </h3>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:50%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$70.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-30.jpg" width="205"
                                                height="205" alt="product">
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
                                                <a href="/porto/demo19-product.html">Men's Training Gloves</a>
                                            </h3>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$33.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>
                            <div class="category-description appear-animate" data-animation-name="fadeInDownShorter"
                                data-animation-delay="200">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="banner banner9" style="background-color: #22252a;">
                                            <figure>
                                                <img src="/porto/assets/images/demoes/demo19/banners/banner-8.jpg" alt="banner"
                                                    width="825" height="178">
                                            </figure>
                                            <div
                                                class="banner-layer banner-layer-middle d-flex justify-content-between align-items-center">
                                                <div class="content-left coupon-sale-text">
                                                    <h5 class="mb-0 font1 d-inline-block ls-10 text-white"><i
                                                            class="ls-0">UP TO</i><b>50%</b><sub>OFF</sub></h5>
                                                </div>
                                                <div class="content-right">
                                                    <h4 class="font1 text-uppercase m-b-1">Flash Sales On</h4>
                                                    <h3 class="font1 text-white text-uppercase mb-0">Nice Shoes</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="banner banner10" style="background-color: #f4f4f4">
                                            <figure>
                                                <img src="/porto/assets/images/demoes/demo19/banners/banner-9.jpg" alt="banner"
                                                    width="825" height="178">
                                            </figure>
                                            <div
                                                class="banner-layer banner-layer-middle row no-gutters d-flex align-items-center justify-content-between justify-content-lg-start flex-nowrap overflow-hidden m-0">
                                                <div class="col-auto col-lg-4 text-right ml-4 ml-lg-0">
                                                    <h6 class="font1 text-uppercase text-body m-b-1">Feel like a player
                                                    </h6>
                                                    <h3 class="font1 text-uppercase ls-n-25 mb-0">Football</h3>
                                                </div>
                                                <div class="col-auto coupon-sale-text offset-lg-4 mr-4 mr-lg-0">
                                                    <h4 class="m-b-2 font1 d-block ls-10 text-white bg-dark">Exclusive
                                                        COUPON</h4>
                                                    <h5 class="mb-0 font1 d-inline-block ls-10 bg-dark"><i
                                                            class="text-dark ls-0">UP TO</i><b
                                                            class="text-white">100%</b><sub class="text-dark">OFF</sub>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section id="cat-6" class="category-section">
                            <div class="category-title appear-animate" data-animation-name="fadeInDownShorter"
                                data-animation-delay="200">
                                <h2 class="cat-title">Gifts &amp; Gadgets</h2>
                                <a href="/porto/demo19-shop.html" class="btn btn-dark">View All</a>
                            </div><!-- End .category-title -->
                            <div class="products-slider custom-products owl-carousel owl-theme appear-animate"
                                data-owl-options="{
                                'dots': false,
                                'responsive': {
                                    '1200': {
                                        'items': 6
                                    }
                                }
                            }" data-animation-name="fadeInDownShorter" data-animation-delay="200">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-31.jpg" width="205"
                                                height="205" alt="product">
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
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
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
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-32.jpg" width="205"
                                                height="205" alt="product">
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
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
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
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-33.jpg" width="205"
                                                height="205" alt="product">
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
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
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
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-34.jpg" width="205"
                                                height="205" alt="product">
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
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$18.99</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-35.jpg" width="205"
                                                height="205" alt="product">
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
                                                <a href="/porto/demo19-product.html">Guest Soap Orange</a>
                                            </h3>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$18.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo19-product.html">
                                            <img src="/porto/assets/images/demoes/demo19/products/product-36.jpg" width="205"
                                                height="205" alt="product">
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
                                                <a href="/porto/demo19-product.html">Product</a>
                                            </h3>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:90%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$18.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>
                            <div class="category-description appear-animate" data-animation-name="fadeInDownShorter"
                                data-animation-delay="200">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="banner banner11" style="background-color: #f4f4f4;">
                                            <figure>
                                                <img src="/porto/assets/images/demoes/demo19/banners/banner-10.jpg"
                                                    alt="banner" width="825" height="178">
                                            </figure>
                                            <div class="banner-layer banner-layer-middle banner-layer-right">
                                                <h3 class="text-uppercase text-right ls-10 mb-0">
                                                    Top Electronic<br>For Gifts
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="banner banner12" style="background-color: #f5a083;">
                                            <figure>
                                                <img src="/porto/assets/images/demoes/demo19/banners/banner-11.jpg"
                                                    alt="banner" width="825" height="178">
                                            </figure>

                                            <div class="banner-layer banner-layer-middle">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <h2 class="line-height-1 m-b-2">Outlet Selected Items</h2>
                                                        <h4 class="text-white ls-0 mb-0"><b>BIG SALE UP TO</b></h4>
                                                    </div>

                                                    <div class="col-auto">
                                                        <h3 class="text-white mb-0">80%<small
                                                                class="d-inline-block text-center"><b>OFF</b></small>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div><!-- End .category-details -->
                </div>
            </div>

            <section class="feature-boxes-container">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3 appear-animate" data-animation-name="fadeInLeftShorter"
                            data-animation-delay="200">
                            <div class="feature-box feature-box-simple text-center mb-2">
                                <div class="feature-box-icon">
                                    <i class="icon-earphones-alt"></i>
                                </div>

                                <div class="feature-box-content p-0">
                                    <h3>Customer Support</h3>
                                    <h5 class="line-height-1">Need Assistance?</h5>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum
                                        magna, et dapib.</p>
                                </div><!-- End .feature-box-content -->
                            </div><!-- End .feature-box -->
                        </div><!-- End .col-sm-6.col-lg-3 -->

                        <div class="col-sm-6 col-lg-3 appear-animate" data-animation-name="fadeInLeftShorter"
                            data-animation-delay="400">
                            <div class="feature-box feature-box-simple text-center mb-2">
                                <div class="feature-box-icon">
                                    <i class="icon-credit-card"></i>
                                </div>

                                <div class="feature-box-content p-0">
                                    <h3>Secured Payment</h3>
                                    <h5 class="line-height-1">Safe &amp; Fast</h5>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum
                                        magna, et dapibus lacus. Lorem ipsum dolor sit amet.</p>
                                </div><!-- End .feature-box-content -->
                            </div><!-- End .feature-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3 appear-animate" data-animation-name="fadeInLeftShorter"
                            data-animation-delay="600">
                            <div class="feature-box feature-box-simple text-center mb-2">
                                <div class="feature-box-icon">
                                    <i class="icon-action-undo"></i>
                                </div>
                                <div class="feature-box-content p-0">
                                    <h3>Free Returns</h3>
                                    <h5 class="line-height-1">Easy &amp; Free</h5>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum
                                        magna, et dapib.</p>
                                </div><!-- End .feature-box-content -->
                            </div><!-- End .feature-box -->
                        </div><!-- col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3 appear-animate" data-animation-name="fadeInLeftShorter"
                            data-animation-delay="800">
                            <div class="feature-box feature-box-simple text-center mb-2">
                                <div class="feature-box-icon">
                                    <i class="icon-shipping"></i>
                                </div>
                                <div class="feature-box-content p-0">
                                    <h3>Free Shipping</h3>
                                    <h5 class="line-height-1">Orders Over $99</h5>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum
                                        magna, et dapib.</p>
                                </div><!-- End .feature-box-content -->
                            </div><!-- End .feature-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container-->
            </section><!-- End .feature-boxes-container -->
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    <script src="/porto/assets/js/jquery.plugin.min.js"></script>
    <script src="/porto/assets/js/jquery.countdown.min.js"></script>
    <script>
        $(document).ready(function() {
            // Bootstrap scrollspy'yi initialize et
            // data-spy="scroll" zaten body'de var, sadece refresh et
            $('body').scrollspy('refresh');
            
            // Smooth scroll için nav linklerine click event ekle
            $('#category-list .nav-link').on('click', function(e) {
                var target = $(this.getAttribute('href'));
                if (target.length) {
                    e.preventDefault();
                    $('html, body').stop().animate({
                        scrollTop: target.offset().top - 71
                    }, 1000);
                }
            });
        });
    </script>
@endpush
