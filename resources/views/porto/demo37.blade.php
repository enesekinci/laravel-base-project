@extends('layouts.porto')

@section('top-notice')
    @include('components.porto.top-notice-demo37')
@endsection

@section('footer')
    @include('components.porto.footer-demo37')
@endsection


@section('header')
    @include('components.porto.header-demo37')
@endsection

@section('content')
<div class="home-slider slide-animate owl-carousel owl-theme show-nav-hover nav-big mb-2 text-uppercase"
                data-owl-options="{
				'loop': false
			}">
                <div class="home-slide home-slide1 banner">
                    <img class="slide-bg" src="/porto/assets/images/demoes/demo37/slider/slide-1.jpg" width="1920" height="580"
                        alt="slider image" style="background-color: #eee;">
                    <div class="container d-flex align-items-center">
                        <div class="banner-layer">
                            <h4 class="text-transform-none appear-animate" data-animation-name="fadeInLeftShorter"
                                data-animation-delay="200">Find the Boundaries. Push Through!</h4>
                            <h2 class="text-transform-none mb-0 appear-animate" data-animation-name="fadeInUpShorter"
                                data-animation-delay="200">SUNGLASSES</h2>
                            <img src="/porto/assets/images/demoes/demo37/banners/icon1.png" class="appear-animate"
                                data-animation-name="fadeInLeftShorter" data-animation-delay="400" width="255"
                                height="25" alt="Image" />
                            <div class="d-flex">
                                <a href="/porto/demo37-shop.html" class="btn btn-dark btn-lg appear-animate"
                                    data-animation-name="fadeInLeftShorter" data-animation-delay="600">Shop Now!</a>
                                <h5 class="d-inline-block mb-0">
                                    <span class="d-inline-block appear-animate" data-animation-name="fadeInLeftShorter"
                                        data-animation-delay="900">Starting At</span>
                                    <b class="coupon-sale-text text-white bg-secondary align-middle appear-animate"
                                        data-animation-name="fadeIn" data-animation-delay="1400"><sup>$</sup><em
                                            class="align-text-top">99</em><sup>99</sup></b>
                                </h5>
                            </div>
                        </div><!-- End .banner-layer -->
                    </div>
                </div><!-- End .home-slide -->

                <div class="home-slide home-slide2 banner banner-md-vw">
                    <img class="slide-bg" src="/porto/assets/images/demoes/demo37/slider/slide-2.jpg" width="1920" height="580"
                        alt="slider image" style="background-color: #eee;">
                    <div class="container d-flex align-items-center">
                        <div class="banner-layer">
                            <h4 class="text-transform-none appear-animate" data-animation-name="fadeInUpShorter"
                                data-animation-delay="200">Take Your Chill Up a Level</h4>
                            <h2 class="text-transform-none mb-0 appear-animate" data-animation-name="fadeInRightShorter"
                                data-animation-delay="200">CASUAL WEAR</h2>
                            <img src="/porto/assets/images/demoes/demo37/banners/icon1.png" class="appear-animate"
                                data-animation-name="fadeInUpShorter" data-animation-delay="400" width="255" height="25"
                                alt="Image" />
                            <div class="d-flex">
                                <a href="/porto/demo37-shop.html" class="btn btn-dark btn-lg appear-animate"
                                    data-animation-name="fadeInRightShorter" data-animation-delay="1400">Shop Now!</a>
                                <h5 class="d-inline-block mb-0">
                                    <span class="d-inline-block appear-animate" data-animation-name="fadeInRightShorter"
                                        data-animation-delay="900">Starting At</span>
                                    <b class="coupon-sale-text text-white bg-secondary align-middle appear-animate"
                                        data-animation-name="fadeIn" data-animation-delay="600"><sup>$</sup><em
                                            class="align-text-top">99</em><sup>99</sup></b>
                                </h5>
                            </div>
                        </div><!-- End .banner-layer -->
                    </div>
                </div><!-- End .home-slide -->
            </div><!-- End .home-slider -->

            <div class="container appear-animate" data-animation-name="fadeIn" data-animation-delay="100">
                <div class="info-boxes-slider owl-carousel owl-theme m-b-3" data-owl-options="{
					'dots': false,
					'loop': false,
					'responsive': {
						'576': {
							'items': 2
						},
						'992': {
							'items': 3
						}
					}
				}">
                    <div class="info-box info-box-icon-left">
                        <i class="icon-shipping text-primary"></i>

                        <div class="info-box-content">
                            <h4>Free Shipping on Orders Over $99</h4>
                            <p class="text-body">For more than 100,000 parts!</p>
                        </div><!-- End .info-box-content -->
                    </div><!-- End .info-box -->

                    <div class="info-box info-box-icon-left">
                        <i class="icon-percent-circle text-primary"></i>

                        <div class="info-box-content">
                            <h4>Up to 40% OFF on Selected Items</h4>
                            <p class="text-body">Available for all Categories!</p>
                        </div><!-- End .info-box-content -->
                    </div><!-- End .info-box -->

                    <div class="info-box info-box-icon-left">
                        <i class="icon-pulley text-primary"></i>

                        <div class="info-box-content">
                            <h4>100% Secure Payment</h4>
                            <p class="text-body">We ensure secure payment!</p>
                        </div><!-- End .info-box-content -->
                    </div><!-- End .info-box -->
                </div><!-- End .info-boxes-slider -->
            </div><!-- End .container -->

            <section class="products-scroll-section appear-animate" data-animation-name="fadeIn"
                data-animation-delay="100">
                <div class="container">
                    <h2 class="section-title heading-border ls-n-10 border-0 text-center text-capitalize">Top 10
                        Products
                    </h2>

                    <div class="row custom-srcollbar">
                        <div class="col-lg-3 col-sm-4 col-6">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo37-product.html">
                                        <img src="/porto/assets/images/demoes/demo37/products/product-1.jpg" width="205"
                                            height="205" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-number">1<span>º</span></div>
                                        <div class="product-label label-hot">HOT</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart"
                                            class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                        title="Quick View">Quick
                                        View
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo37-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo37-product.html">Black wrist watch</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span><!-- End .ratings -->
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

                        <div class="col-lg-3 col-sm-4 col-6">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo37-product.html">
                                        <img src="/porto/assets/images/demoes/demo37/products/product-2.jpg" width="205"
                                            height="205" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-number">2<span>º</span></div>
                                        <div class="product-label label-hot">HOT</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart"
                                            class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                        title="Quick View">Quick
                                        View
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo37-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo37-product.html">Warm Jacket</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span><!-- End .ratings -->
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

                        <div class="col-lg-3 col-sm-4 col-6">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo37-product.html">
                                        <img src="/porto/assets/images/demoes/demo37/products/product-3.jpg" width="205"
                                            height="205" alt="product">
                                        <img src="/porto/assets/images/demoes/demo37/products/product-3-2.jpg" width="205"
                                            height="205" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-number">3<span>º</span></div>
                                        <div class="product-label label-hot">HOT</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart"
                                            class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                        title="Quick View">Quick
                                        View
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo37-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo37-product.html">White Sport Shoes</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span><!-- End .ratings -->
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

                        <div class="col-lg-3 col-sm-4 col-6">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo37-product.html">
                                        <img src="/porto/assets/images/demoes/demo37/products/product-4.jpg" width="205"
                                            height="205" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-number">4<span>º</span></div>
                                        <div class="product-label label-hot">HOT</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart"
                                            class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                        title="Quick View">Quick
                                        View
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo37-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo37-product.html">Men Coat</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span><!-- End .ratings -->
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

                        <div class="col-lg-3 col-sm-4 col-6">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo37-product.html">
                                        <img src="/porto/assets/images/demoes/demo37/products/product-5.jpg" width="205"
                                            height="205" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-number">5<span>º</span></div>
                                        <div class="product-label label-hot">HOT</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart"
                                            class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                        title="Quick View">Quick
                                        View
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo37-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo37-product.html">Blue Jeans</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span><!-- End .ratings -->
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

                        <div class="col-lg-3 col-sm-4 col-6">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo37-product.html">
                                        <img src="/porto/assets/images/demoes/demo37/products/product-6.jpg" width="205"
                                            height="205" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-number">6<span>º</span></div>
                                        <div class="product-label label-hot">HOT</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart"
                                            class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                        title="Quick View">Quick
                                        View
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo37-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo37-product.html">Man Jeans</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span><!-- End .ratings -->
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

                        <div class="col-lg-3 col-sm-4 col-6">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo37-product.html">
                                        <img src="/porto/assets/images/demoes/demo37/products/product-7.jpg" width="205"
                                            height="205" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-number">7<span>º</span></div>
                                        <div class="product-label label-hot">HOT</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart"
                                            class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                        title="Quick View">Quick
                                        View
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo37-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo37-product.html">Wrist Watch</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span><!-- End .ratings -->
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

                        <div class="col-lg-3 col-sm-4 col-6">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo37-product.html">
                                        <img src="/porto/assets/images/demoes/demo37/products/product-8.jpg" width="205"
                                            height="205" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-number">8<span>º</span></div>
                                        <div class="product-label label-hot">HOT</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart"
                                            class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                        title="Quick View">Quick
                                        View
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo37-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo37-product.html">Belt</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span><!-- End .ratings -->
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
                        <div class="col-lg-3 col-sm-4 col-6">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo37-product.html">
                                        <img src="/porto/assets/images/demoes/demo37/products/product-8.jpg" width="205"
                                            height="205" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-number">9<span>º</span></div>
                                        <div class="product-label label-hot">HOT</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart"
                                            class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                        title="Quick View">Quick
                                        View
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo37-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo37-product.html">Blue Shirt</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span><!-- End .ratings -->
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

                        <div class="col-lg-3 col-sm-4 col-6">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo37-product.html">
                                        <img src="/porto/assets/images/demoes/demo37/products/product-10.jpg" width="205"
                                            height="205" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-number">10<span>º</span></div>
                                        <div class="product-label label-hot">HOT</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="#" title="Add To Cart"
                                            class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                        title="Quick View">Quick
                                        View
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo37-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo37-product.html">Lingerie</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span><!-- End .ratings -->
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
                    </div>
                </div>
            </section>

            <section class="product-info-container">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="heading">
                                <h4 class="text-transform-none appear-animate" data-animation-name="fadeInLeftShorter"
                                    data-animation-delay="200">Super Sale</h4>
                                <h2 class="text-transform-none appear-animate" data-animation-name="fadeInLeftShorter"
                                    data-animation-delay="600">TRENDING LOOKS</h2>
                                <div class="d-flex appear-animate" data-animation-name="fadeInLeftShorter"
                                    data-animation-delay="600">
                                    <h5 class="d-inline-block mb-0">
                                        <span>for only</span>
                                        <b class="coupon-sale-text text-white bg-secondary align-middle">
                                            <sup>$</sup>
                                            <em class="align-text-top">99</em>
                                            <sup>99</sup>
                                        </b>
                                    </h5>
                                </div>
                            </div>

                            <ul class="product-info-content appear-animate" data-animation-name="fadeInLeftShorter"
                                data-animation-delay="1000">
                                <li class="product-info-item">
                                    <div class="product-default">
                                        <figure class="d-none">
                                            <a href="/porto/demo37-product.html">
                                                <img src="/porto/assets/images/demoes/demo37/products/product-1.jpg"
                                                    width="205" height="205" alt="product">
                                            </a>
                                        </figure>
                                        <div class="product-details d-flex align-items-center">
                                            <h3 class="product-title">
                                                <a href="/porto/demo37-product.html">Wrist Watch</a>
                                            </h3>

                                            <div class="price-box">
                                                <span class="old-price">$399.00</span>
                                                <span class="product-price">$299.00</span>
                                            </div><!-- End .price-box -->

                                            <a href="#" class="btn-icon btn-add-cart product-type-simple">Add To
                                                Cart</a>
                                        </div><!-- End .product-details -->
                                    </div>
                                </li>

                                <li class="product-info-item">
                                    <div class="product-default">
                                        <figure class="d-none">
                                            <a href="/porto/demo37-product.html">
                                                <img src="/porto/assets/images/demoes/demo37/products/product-8.jpg"
                                                    width="205" height="205" alt="product">
                                            </a>
                                        </figure>
                                        <div class="product-details d-flex align-items-center">
                                            <h3 class="product-title">
                                                <a href="/porto/demo37-product.html">Belt</a>
                                            </h3>

                                            <div class="price-box">
                                                <span class="product-price">$25.00</span>
                                            </div><!-- End .price-box -->

                                            <a href="#" class="btn-icon btn-add-cart product-type-simple">Add To
                                                Cart</a>
                                        </div><!-- End .product-details -->
                                    </div>
                                </li>

                                <li class="product-info-item">
                                    <div class="product-default">
                                        <figure class="d-none">
                                            <a href="/porto/demo37-product.html">
                                                <img src="/porto/assets/images/demoes/demo37/products/product-4.jpg"
                                                    width="205" height="205" alt="product">
                                            </a>
                                        </figure>

                                        <div class="product-details d-flex align-items-center">
                                            <h3 class="product-title">
                                                <a href="/porto/demo37-product.html">Man Shaggy Coat</a>
                                            </h3>

                                            <div class="price-box">
                                                <span class="product-price">$299.00</span>
                                            </div><!-- End .price-box -->

                                            <a href="#" class="btn-icon btn-add-cart product-type-simple">Add To
                                                Cart</a>
                                        </div><!-- End .product-details -->
                                    </div>
                                </li>

                                <li class="product-info-item">
                                    <div class="product-default">
                                        <figure class="d-none">
                                            <a href="/porto/demo37-product.html">
                                                <img src="/porto/assets/images/demoes/demo37/products/product-9.jpg"
                                                    width="205" height="205" alt="product">
                                            </a>
                                        </figure>

                                        <div class="product-details d-flex align-items-center">
                                            <h3 class="product-title">
                                                <a href="/porto/demo37-product.html">Blue Tshirt</a>
                                            </h3>

                                            <div class="price-box">
                                                <span class="product-price">$199.00</span>
                                            </div><!-- End .price-box -->

                                            <a href="#" class="btn-icon btn-add-cart product-type-simple">Add To
                                                Cart</a>
                                        </div><!-- End .product-details -->
                                    </div>
                                </li>

                                <li class="product-info-item">
                                    <div class="product-default">
                                        <figure class="d-none">
                                            <a href="/porto/demo37-product.html">
                                                <img src="/porto/assets/images/demoes/demo37/products/product-10.jpg"
                                                    width="205" height="205" alt="product">
                                            </a>
                                        </figure>

                                        <div class="product-details d-flex align-items-center">
                                            <h3 class="product-title">
                                                <a href="/porto/demo37-product.html">Lingerie</a>
                                            </h3>

                                            <div class="price-box">
                                                <span class="product-price">$39.00</span>
                                            </div><!-- End .price-box -->

                                            <a href="#" class="btn-icon btn-add-cart product-type-simple">Add To
                                                Cart</a>
                                        </div><!-- End .product-details -->
                                    </div>
                                </li>

                                <li class="product-info-item">
                                    <div class="product-default">
                                        <figure class="d-none">
                                            <a href="/porto/demo37-product.html">
                                                <img src="/porto/assets/images/demoes/demo37/products/product-11.jpg"
                                                    width="205" height="205" alt="product">
                                            </a>
                                        </figure>

                                        <div class="product-details d-flex align-items-center">
                                            <h3 class="product-title">
                                                <a href="/porto/demo37-product.html">Black Handbag</a>
                                            </h3>

                                            <div class="price-box">
                                                <span class="product-price">$79.00</span>
                                            </div><!-- End .price-box -->

                                            <a href="#" class="btn-icon btn-add-cart product-type-simple">Add To
                                                Cart</a>
                                        </div><!-- End .product-details -->
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 position-relative mt-auto">
                            <div class="product-info-image appear-animate" data-animation-name="fadeIn"
                                data-animation-delay="1200">
                                <figure class="mb-0">
                                    <img src="/porto/assets/images/demoes/demo37/banners/home_banner1.jpg" width="400"
                                        height="532" alt="Product" />
                                </figure>
                                <div class="product-popup-dot dot-top-one">
                                    <a href="#"><i class="fas fa-circle"></i></a>
                                    <div class="product-popup-wrap">
                                        <div class="product-default inner-quickview inner-icon">
                                            <figure>
                                                <a href="/porto/demo37-product.html">
                                                    <img src="/porto/assets/images/demoes/demo37/products/product-9.jpg"
                                                        width="205" height="205" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-wrap">
                                                    <div class="category-list">
                                                        <a href="/porto/demo37-shop.html" class="product-category">category</a>
                                                    </div>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="/porto/demo37-product.html">Blue Tshirt</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:100%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div><!-- End .product-ratings -->
                                                </div><!-- End .product-container -->

                                                <div class="price-box">
                                                    <span class="product-price">$70.00</span>
                                                </div><!-- End .price-box -->

                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class=" icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                            </div><!-- End .product-details -->
                                        </div>
                                    </div>
                                </div>
                                <div class="product-popup-dot dot-middle-one">
                                    <a href="#"><i class="fas fa-circle"></i></a>
                                    <div class="product-popup-wrap">
                                        <div class="product-default inner-quickview inner-icon">
                                            <figure>
                                                <a href="/porto/demo37-product.html">
                                                    <img src="/porto/assets/images/demoes/demo37/products/product-6.jpg"
                                                        width="205" height="205" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-wrap">
                                                    <div class="category-list">
                                                        <a href="/porto/demo37-shop.html" class="product-category">category</a>
                                                    </div>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="/porto/demo37-product.html">Man Jeans</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:100%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div><!-- End .product-ratings -->
                                                </div><!-- End .product-container -->

                                                <div class="price-box">
                                                    <span class="product-price">$70.00</span>
                                                </div><!-- End .price-box -->

                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class=" icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                            </div><!-- End .product-details -->
                                        </div>
                                    </div>
                                </div>
                                <div class="product-popup-dot dot-bottom-one">
                                    <a href="#"><i class="fas fa-circle"></i></a>
                                    <div class="product-popup-wrap">
                                        <div class="product-default inner-quickview inner-icon">
                                            <figure>
                                                <a href="/porto/demo37-product.html">
                                                    <img src="/porto/assets/images/demoes/demo37/products/product-3.jpg"
                                                        width="205" height="205" alt="product">
                                                    <img src="/porto/assets/images/demoes/demo37/products/product-3-2.jpg"
                                                        width="205" height="205" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-wrap">
                                                    <div class="category-list">
                                                        <a href="/porto/demo37-shop.html" class="product-category">category</a>
                                                    </div>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="/porto/demo37-product.html">White Sport Shoes</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:100%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div><!-- End .product-ratings -->
                                                </div><!-- End .product-container -->

                                                <div class="price-box">
                                                    <span class="product-price">$70.00</span>
                                                </div><!-- End .price-box -->

                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class=" icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                            </div><!-- End .product-details -->
                                        </div>
                                    </div>
                                </div>
                                <div class="product-popup-dot dot-top-two">
                                    <a href="#"><i class="fas fa-circle"></i></a>
                                    <div class="product-popup-wrap">
                                        <div class="product-default inner-quickview inner-icon">
                                            <figure>
                                                <a href="/porto/demo37-product.html">
                                                    <img src="/porto/assets/images/demoes/demo37/products/product-10.jpg"
                                                        width="205" height="205" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-wrap">
                                                    <div class="category-list">
                                                        <a href="/porto/demo37-shop.html" class="product-category">category</a>
                                                    </div>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="/porto/demo37-product.html">Lingerie</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:100%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div><!-- End .product-ratings -->
                                                </div><!-- End .product-container -->

                                                <div class="price-box">
                                                    <span class="product-price">$70.00</span>
                                                </div><!-- End .price-box -->

                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class=" icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                            </div><!-- End .product-details -->
                                        </div>
                                    </div>
                                </div>
                                <div class="product-popup-dot dot-middle-two">
                                    <a href="#"><i class="fas fa-circle"></i></a>
                                    <div class="product-popup-wrap">
                                        <div class="product-default inner-quickview inner-icon">
                                            <figure>
                                                <a href="/porto/demo37-product.html">
                                                    <img src="/porto/assets/images/demoes/demo37/products/product-5.jpg"
                                                        width="205" height="205" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-wrap">
                                                    <div class="category-list">
                                                        <a href="/porto/demo37-shop.html" class="product-category">category</a>
                                                    </div>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="/porto/demo37-product.html">Blue Jeans</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:100%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div><!-- End .product-ratings -->
                                                </div><!-- End .product-container -->

                                                <div class="price-box">
                                                    <span class="product-price">$70.00</span>
                                                </div><!-- End .price-box -->

                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class=" icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                            </div><!-- End .product-details -->
                                        </div>
                                    </div>
                                </div>
                                <div class="product-popup-dot dot-bottom-two">
                                    <a href="#"><i class="fas fa-circle"></i></a>
                                    <div class="product-popup-wrap">
                                        <div class="product-default inner-quickview inner-icon">
                                            <figure>
                                                <a href="/porto/demo37-product.html">
                                                    <img src="/porto/assets/images/demoes/demo37/products/product-3-2.jpg"
                                                        width="205" height="205" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <div class="category-wrap">
                                                    <div class="category-list">
                                                        <a href="/porto/demo37-shop.html" class="product-category">category</a>
                                                    </div>
                                                </div>
                                                <h3 class="product-title">
                                                    <a href="/porto/demo37-product.html">Sport Shoes</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:100%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div><!-- End .product-ratings -->
                                                </div><!-- End .product-container -->

                                                <div class="price-box">
                                                    <span class="product-price">$70.00</span>
                                                </div><!-- End .price-box -->

                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class=" icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                            </div><!-- End .product-details -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-8 col-md-6 col-lg-2 d-flex align-items-center">
                            <div class=" btn-group flex-column mt-0 mt-md-3 mt-lg-0 appear-animate"
                                data-animation-name="fadeInLeftShorter" data-animation-delay="700">
                                <a href="/porto/demo37-shop.html" class="btn btn-dark btn-shop m-b-3">SHOP MEN</a>
                                <a href="/porto/demo37-shop.html" class="btn btn-dark btn-shop">SHOP WOMEN</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="sale-products-section">
                <div class="container">
                    <h2 class="section-title heading-border ls-n-10 border-0 text-center text-capitalize appear-animate"
                        data-animation-delay="100" data-animation-name="fadeIn">Sale Products
                    </h2>

                    <div class="products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center appear-animate"
                        data-animation-delay="200" data-animation-name="fadeInUpShorter" data-owl-options="{
						'dots': false,
                        'nav': true,
                        'navText': [ '<i class=icon-left-open-big>', '<i class=icon-right-open-big>' ],
						'responsive': {
							'992': {
								'items': 5
							}
						}
					}">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo37-product.html">
                                    <img src="/porto/assets/images/demoes/demo37/products/product-6.jpg" width="205"
                                        height="205" alt="product">
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
                                        <a href="/porto/demo37-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo37-product.html">Man Jeans</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
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
                                <a href="/porto/demo37-product.html">
                                    <img src="/porto/assets/images/demoes/demo37/products/product-4.jpg" width="205"
                                        height="205" alt="product">
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
                                        <a href="/porto/demo37-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo37-product.html">Main Coat</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
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
                                <a href="/porto/demo37-product.html">
                                    <img src="/porto/assets/images/demoes/demo37/products/product-6.jpg" width="205"
                                        height="205" alt="product">
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
                                        <a href="/porto/demo37-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo37-product.html">Man Jeans</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
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
                                <a href="/porto/demo37-product.html">
                                    <img src="/porto/assets/images/demoes/demo37/products/product-2.jpg" width="205"
                                        height="205" alt="product">
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
                                        <a href="/porto/demo37-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo37-product.html">Warm Jacket</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
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
                                <a href="/porto/demo37-product.html">
                                    <img src="/porto/assets/images/demoes/demo37/products/product-3.jpg" width="205"
                                        height="205" alt="product">
                                    <img src="/porto/assets/images/demoes/demo37/products/product-3-2.jpg" width="205"
                                        height="205" alt="product">
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
                                        <a href="/porto/demo37-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo37-product.html">White Sport Shoes</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
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
                                <a href="/porto/demo37-product.html">
                                    <img src="/porto/assets/images/demoes/demo37/products/product-7.jpg" width="205"
                                        height="205" alt="product">
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
                                        <a href="/porto/demo37-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo37-product.html">Wrist Watch</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->

                                <div class="price-box">
                                    <span class="old-price">$90.00</span>
                                    <span class="product-price">$70.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div><!-- End .featured-proucts -->

                    <div class="banner banner-big-sale appear-animate" data-animation-delay="100"
                        data-animation-name="fadeIn"
                        style="background: #2A95CB center/cover url('/porto/assets/images/demoes/demo37/banners/banner.jpg');">
                        <div class="banner-content row align-items-center mx-0 justify-content-center">
                            <div class="col-xl-9 col-sm-8">
                                <h2 class="text-white text-uppercase text-center text-sm-left ls-n-20 mb-md-0 px-4">
                                    <b class="d-inline-block mb-1 mb-xl-0">Big Sale</b>
                                    All new fashion brands items up to 70% off
                                    <small class="text-transform-none align-middle ls-n-10">Online Purchases
                                        Only</small>
                                </h2>
                            </div>
                            <div class="col-md-3 col-sm-4 text-center text-sm-right">
                                <a class="btn btn-light btn-white btn-lg" href="/porto/demo37-shop.html">View Sale</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="new-products-section">
                <div class="container">
                    <h2 class="section-title heading-border ls-n-10 border-0 text-center text-capitalize appear-animate"
                        data-animation-delay="100" data-animation-name="fadeIn">New Arrivals
                    </h2>

                    <div class="products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center mb-2 appear-animate"
                        data-animation-delay="200" data-animation-name="fadeInUpShorter" data-owl-options="{
                        'dots': false,
                        'navText': [ '<i class=icon-left-open-big>', '<i class=icon-right-open-big>' ],
						'nav': true,
						'responsive': {
							'992': {
								'items': 5
                            },
                            '1200': {
								'items': 6
							}
						}
					}">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo37-product.html">
                                    <img src="/porto/assets/images/demoes/demo37/products/product-7.jpg" width="205"
                                        height="205" alt="product">
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
                                        <a href="/porto/demo37-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo37-product.html">Wrist Watch</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
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
                                <a href="/porto/demo37-product.html">
                                    <img src="/porto/assets/images/demoes/demo37/products/product-8.jpg" width="205"
                                        height="205" alt="product">
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
                                        <a href="/porto/demo37-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo37-product.html">Belt</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
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
                                <a href="/porto/demo37-product.html">
                                    <img src="/porto/assets/images/demoes/demo37/products/product-4.jpg" width="205"
                                        height="205" alt="product">
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
                                        <a href="/porto/demo37-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo37-product.html">Man Shaggy Coat</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
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
                                <a href="/porto/demo37-product.html">
                                    <img src="/porto/assets/images/demoes/demo37/products/product-9.jpg" width="205"
                                        height="205" alt="product">
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
                                        <a href="/porto/demo37-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo37-product.html">Blue Tshirt</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
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
                                <a href="/porto/demo37-product.html">
                                    <img src="/porto/assets/images/demoes/demo37/products/product-10.jpg" width="205"
                                        height="205" alt="product">
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
                                        <a href="/porto/demo37-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo37-product.html">Lingerie</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
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
                                <a href="/porto/demo37-product.html">
                                    <img src="/porto/assets/images/demoes/demo37/products/product-11.jpg" width="205"
                                        height="205" alt="product">
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
                                        <a href="/porto/demo37-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo37-product.html">Black Handbag</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
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
                                <a href="/porto/demo37-product.html">
                                    <img src="/porto/assets/images/demoes/demo37/products/product-4.jpg" width="205"
                                        height="205" alt="product">
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
                                        <a href="/porto/demo37-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo37-product.html">Man Shaggy Coat</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->

                                <div class="price-box">
                                    <span class="old-price">$90.00</span>
                                    <span class="product-price">$70.00</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div><!-- End .featured-proucts -->
                </div>
            </section>

            <div class="newsletter-section pt-3 appear-animate" data-animation-delay="100" data-animation-name="fadeIn">
                <div class="container text-center">
                    <h3 class="ls-n-10">Get Special Offers and Savings</h3>
                    <p>Get all the latest information on Events, Sales and Offers.</p>

                    <form action=" #" method="get" class="mb-0">
                        <div class="submit-wrapper">
                            <input type="search" class="form-control" name="q" id="qqq"
                                placeholder="Enter Your E-mail Address..." required="">
                            <button class="btn btn-primary" type="submit">OK</button>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div>
            </div>
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
