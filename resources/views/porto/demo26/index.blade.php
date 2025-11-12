@extends('layouts.porto')

@section('footer')
    @include('porto.demo26.footer')
@endsection


@section('header')
    @include('porto.demo26.header')
@endsection

@section('content')
<section class="intro-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 mb-2">
                            <div class="banner banner1 d-flex flex-wrap align-items-center bg-gray no-gutters">
                                <div class="col-md-5 appear-animate" data-animation-name="fadeInRightShorter"
                                    data-animation-delay="200">
                                    <div class="brand m-b-2">
                                        <img src="/porto/assets/images/demoes/demo26/banners/brand.png" alt="brand" width="230"
                                            height="26">
                                    </div>
                                    <h3 class="ls-n-20 text-body text-uppercase m-b-2">Car shock absorbers</h3>
                                    <h2 class="ls-n-20 text-uppercase m-b-4">Starting<br>at
                                        <small>$</small>99<small>99</small></h2>
                                    <h4 class="font-weight-normal ls-n-20 m-b-3">Start Shopping Right Now</h4>
                                    <p class="font2 text-body m-b-3">* Get Plus Discount Buying Package</p>
                                    <a href="/porto/demo26-shop.html" class="btn btn-dark btn-lg m-b-5">View Sale</a>
                                </div>
                                <div class="col-md-7">
                                    <figure>
                                        <img src="/porto/assets/images/demoes/demo26/banners/banner-1.jpg" alt="banner"
                                            width="700" height="576">
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="banner banner2 h-100"
                                style="background: #414141 no-repeat center/cover url(/porto/assets/images/demoes/demo26/banners/banner-2.jpg)">
                                <div
                                    class="banner-layer d-flex flex-column justify-content-center align-items-end text-right">
                                    <h3 class="font-weight-bold ls-n-20 text-primary text-uppercase m-b-2 appear-animate"
                                        data-animation-name="fadeInUpShorter" data-animation-delay="100">Flash Sale
                                    </h3>
                                    <h3 class="ls-n-20 m-b-2 appear-animate" data-animation-name="fadeInUpShorter"
                                        data-animation-delay="250">ALL HIGH PERFORMANCE<br>WHEELS AND TIRES</h3>
                                    <h2 class="ls-n-20 text-white text-uppercase m-b-3 appear-animate"
                                        data-animation-name="fadeInUpShorter" data-animation-delay="400">Starting<br>at
                                        <small>$</small>199<small>99</small></h2>
                                    <a href="/porto/demo26-shop.html" class="btn btn-light btn-lg appear-animate"
                                        data-animation-name="fadeInUpShorter" data-animation-delay="600">View Sale</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="newsletter-section appear-animate" data-animation-name="fadeInUpShorter"
                data-animation-delay="200">
                <div class="container">
                    <div class="widget-newsletter">
                        <div class="row no-gutters m-0">
                            <div class="col-md-5">
                                <div class="info-box info-box-icon-left justify-content-start align-itmes-center">
                                    <i class="far fa-envelope line-height-1 text-primary"></i>
                                    <div class="info-content">
                                        <h4 class="line-height-1 text-dark">Get Special Offers and Savings</h4>
                                        <p class="font2 text-body">Get all the latest information on Events, Sales and
                                            Offers.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <form class="newsletter-form" action="#" method="get">
                                    <input type="email" class="form-control font2 mb-0"
                                        placeholder="Enter Your E-mail Address..." required>

                                    <button type="submit" class="btn btn-submit text-white">Sign Up</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="popular-section">
                <div class="container">
                    <div class="appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="400">
                        <h2 class="section-title pb-3 m-b-4">Popular Items</h2>

                        <div class="row m-b-2">
                            <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo26-product.html">
                                            <img src="/porto/assets/images/demoes/demo26/products/product-1.jpg" width="217"
                                                height="217" alt="product">
                                        </a>
                                        <div class="btn-icon-group">
                                            <a href="/porto/demo26-product.html" class="btn-icon btn-add-cart"><i
                                                    class="fa fa-arrow-right"></i></a>
                                        </div>
                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick
                                            View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="/porto/demo26-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo26-product.html">Product Short Name</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$101.0 &ndash; $108.0</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo26-product.html">
                                            <img src="/porto/assets/images/demoes/demo26/products/product-2.jpg" width="217"
                                                height="217" alt="product">
                                        </a>
                                        <div class="label-group">
                                            <div class="product-label label-sale">-17%</div>
                                        </div>
                                        <div class="btn-icon-group">
                                            <a href="/porto/demo26-product.html"
                                                class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick
                                            View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="/porto/demo26-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo26-product.html">Product Short Name</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="old-price">$59.0</span>
                                            <span class="product-price">$49.0</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo26-product.html">
                                            <img src="/porto/assets/images/demoes/demo26/products/product-3.jpg" width="217"
                                                height="217" alt="product">
                                        </a>
                                        <div class="label-group">
                                            <div class="product-label label-hot">HOT</div>
                                        </div>
                                        <div class="btn-icon-group">
                                            <a href="/porto/demo26-product.html"
                                                class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick
                                            View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="/porto/demo26-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo26-product.html">Product Short Name</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$299.0</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo26-product.html">
                                            <img src="/porto/assets/images/demoes/demo26/products/product-4.jpg" width="217"
                                                height="217" alt="product">
                                        </a>
                                        <div class="label-group">
                                            <div class="product-label label-hot">HOT</div>
                                        </div>
                                        <div class="btn-icon-group">
                                            <a href="/porto/demo26-product.html"
                                                class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick
                                            View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="/porto/demo26-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo26-product.html">Product Short Name</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$55.0</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo26-product.html">
                                            <img src="/porto/assets/images/demoes/demo26/products/product-5.jpg" width="217"
                                                height="217" alt="product">
                                        </a>
                                        <div class="label-group">
                                            <div class="product-label label-hot">HOT</div>
                                        </div>
                                        <div class="btn-icon-group">
                                            <a href="/porto/demo26-product.html" class="btn-icon btn-add-cart"><i
                                                    class="fa fa-arrow-right"></i></a>
                                        </div>
                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick
                                            View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="/porto/demo26-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo26-product.html">Product Short Name</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$39.0</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo26-product.html">
                                            <img src="/porto/assets/images/demoes/demo26/products/product-6.jpg" width="217"
                                                height="217" alt="product">
                                        </a>
                                        <div class="label-group">
                                            <div class="product-label label-hot">HOT</div>
                                        </div>
                                        <div class="btn-icon-group">
                                            <a href="/porto/demo26-product.html" class="btn-icon btn-add-cart"><i
                                                    class="fa fa-arrow-right"></i></a>
                                        </div>
                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick
                                            View</a>
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="/porto/demo26-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo26-product.html">Product Short Name</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:60%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$599.0</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tagcloud d-flex flex-wrap justify-content-between bg-gray mb-4 appear-animate"
                        data-animation-name="fadeInUpShorter" data-animation-delay="600">
                        <a href="/porto/demo26-shop.html">Cadillac</a>
                        <a href="/porto/demo26-shop.html">Chevy</a>
                        <a href="/porto/demo26-shop.html">Dodge</a>
                        <a href="/porto/demo26-shop.html">Ford</a>
                        <a href="/porto/demo26-shop.html">Honda</a>
                        <a href="/porto/demo26-shop.html">Hyundai</a>
                        <a href="/porto/demo26-shop.html">Jeep</a>
                        <a href="/porto/demo26-shop.html">Nissan</a>
                        <a href="/porto/demo26-shop.html">Toyota</a>
                    </div>
                </div>
            </section>

            <div class="products-container bg-gray mt-1">
                <div class="container">
                    <div class="row custom-products no-gutters appear-animate" data-animation-name="fadeInUpShorter"
                        data-animation-delay="200">
                        <div class="col-sm-6 col-md-4">
                            <div class="product-default inner-icon inner-quickview">
                                <figure>
                                    <a href="/porto/demo26-product.html">
                                        <img src="/porto/assets/images/demoes/demo26/products/product-7.jpg" width="75"
                                            height="75" alt="product" />
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo26-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo26-product.html">Product Short Name</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">$299.0</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="product-default inner-icon inner-quickview">
                                <figure>
                                    <a href="/porto/demo26-product.html">
                                        <img src="/porto/assets/images/demoes/demo26/products/product-8.jpg" width="75"
                                            height="75" alt="product" />
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo26-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo26-product.html">Product Short Name</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">$299.0</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="product-default inner-icon inner-quickview">
                                <figure>
                                    <a href="/porto/demo26-product.html">
                                        <img src="/porto/assets/images/demoes/demo26/products/product-9.jpg" width="75"
                                            height="75" alt="product" />
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo26-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo26-product.html">Product Short Name</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">$299.0</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="product-default inner-icon inner-quickview">
                                <figure>
                                    <a href="/porto/demo26-product.html">
                                        <img src="/porto/assets/images/demoes/demo26/products/product-10.jpg" width="75"
                                            height="75" alt="product" />
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo26-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo26-product.html">Product Short Name</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">$299.0</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="product-default inner-icon inner-quickview">
                                <figure>
                                    <a href="/porto/demo26-product.html">
                                        <img src="/porto/assets/images/demoes/demo26/products/product-11.jpg" width="75"
                                            height="75" alt="product" />
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo26-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo26-product.html">Product Short Name</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">$299.0</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="product-default inner-icon inner-quickview">
                                <figure>
                                    <a href="/porto/demo26-product.html">
                                        <img src="/porto/assets/images/demoes/demo26/products/product-12.jpg" width="75"
                                            height="75" alt="product" />
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo26-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo26-product.html">Product Short Name</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">$299.0</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="top-sellers-section appear-animate" data-animation-name="fadeIn" data-animation-delay="200">
                <div class="container">
                    <div class="banner banner3 d-flex flex-wrap align-items-center"
                        style="background: #dc7a1f no-repeat center/cover url(/porto/assets/images/demoes/demo26/banners/banner-3.jpg)">
                        <div class="col-lg-9 mb-2 mb-lg-0">
                            <h2 class="d-inline-block ls-n-20 text-white text-uppercase mb-0"><span class="sale-off">Big
                                    sale</span> ALL
                                HIGH
                                PERFORMANCE ITEMS UP TO 70% OFF</h2>
                            <h6 class="d-inline-block mb-0">Online Purchases Only</h6>
                        </div>
                        <div class="col-lg-3 text-lg-right">
                            <a href="/porto/demo26-shop.html" class="btn btn-light btn-lg">View Sale</a>
                        </div>
                    </div>

                    <h2 class="section-title pb-3 m-b-4">Top Seller</h2>

                    <div class="row">
                        <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo26-product.html">
                                        <img src="/porto/assets/images/demoes/demo26/products/product-13.jpg" width="217"
                                            height="217" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                        <div class="product-label label-sale">-13%</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="/porto/demo26-product.html" class="btn-icon btn-add-cart"><i
                                                class="fa fa-arrow-right"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                        title="Quick View">Quick
                                        View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo26-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo26-product.html">Product Short Name</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="old-price">$299.0</span>
                                        <span class="product-price">$259.0</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo26-product.html">
                                        <img src="/porto/assets/images/demoes/demo26/products/product-14.jpg" width="217"
                                            height="217" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-sale">-35%</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="/porto/demo26-product.html"
                                            class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                        title="Quick View">Quick
                                        View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo26-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo26-product.html">Product Short Name</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="old-price">$199.0</span>
                                        <span class="product-price">$129.0</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo26-product.html">
                                        <img src="/porto/assets/images/demoes/demo26/products/product-15.jpg" width="217"
                                            height="217" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-sale">-35%</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="/porto/demo26-product.html"
                                            class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                        title="Quick View">Quick
                                        View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo26-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo26-product.html">Product Short Name</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="old-price">$199.0</span>
                                        <span class="product-price">$129.0</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo26-product.html">
                                        <img src="/porto/assets/images/demoes/demo26/products/product-3.jpg" width="217"
                                            height="217" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="/porto/demo26-product.html"
                                            class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                        title="Quick View">Quick
                                        View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo26-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo26-product.html">Product Short Name</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">$299.0</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo26-product.html">
                                        <img src="/porto/assets/images/demoes/demo26/products/product-16.jpg" width="217"
                                            height="217" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="/porto/demo26-product.html"
                                            class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                        title="Quick View">Quick
                                        View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo26-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo26-product.html">Product Short Name</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">$299.0</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo26-product.html">
                                        <img src="/porto/assets/images/demoes/demo26/products/product-17.jpg" width="217"
                                            height="217" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="/porto/demo26-product.html" class="btn-icon btn-add-cart"><i
                                                class="fa fa-arrow-right"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                        title="Quick View">Quick
                                        View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo26-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo26-product.html">Product Short Name</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">$101.0 &ndash; $111.0</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="info-boxes-container appear-animate" data-animation-name="fadeIn"
                data-animation-delay="200">
                <div class="container">
                    <div class="row">
                        <div class="info-boxes-slider owl-carousel owl-theme" data-owl-options="{
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
                                    <h4 class="line-height-1">Free Shipping on Orders Over $99</h4>
                                    <p class="font2 line-height-1 text-body ">For more than 100,000 parts!</p>
                                </div>
                            </div>

                            <div class="info-box info-box-icon-left">
                                <i class="icon-money text-primary"></i>
                                <div class="info-box-content">
                                    <h4 class="line-height-1">Up to 40% OFF on Selected Items</h4>
                                    <p class="font2 line-height-1 text-body ">Available for all Categories!</p>
                                </div>
                            </div>

                            <div class="info-box info-box-icon-left">
                                <i class="icon-secure-payment text-primary"></i>
                                <div class="info-box-content">
                                    <h4 class="line-height-1">100% Secure Payments</h4>
                                    <p class="font2 line-height-1 text-body ">We ensure secure payment!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="brands-section">
                <div class="container">
                    <h2 class="section-title pb-3 mb-4">Brands We Trust</h2>

                    <div class="brands-slider owl-carousel owl-theme mb-4 appear-animate" data-owl-options="{
                        'margin': 0
                    }" data-animation-name="fadeIn" data-animation-delay="400">
                        <a href="#"><img src="/porto/assets/images/brands/small/brand1.png" alt="brand" width="140"
                                height="60"></a>
                        <a href="#"><img src="/porto/assets/images/brands/small/brand2.png" alt="brand" width="140"
                                height="60"></a>
                        <a href="#"><img src="/porto/assets/images/brands/small/brand3.png" alt="brand" width="140"
                                height="60"></a>
                        <a href="#"><img src="/porto/assets/images/brands/small/brand4.png" alt="brand" width="140"
                                height="60"></a>
                        <a href="#"><img src="/porto/assets/images/brands/small/brand5.png" alt="brand" width="140"
                                height="60"></a>
                        <a href="#"><img src="/porto/assets/images/brands/small/brand6.png" alt="brand" width="140"
                                height="60"></a>
                    </div>
                </div>
            </section>

            <div class="blog-section post-date-in-media media-with-zoom bg-gray">
                <div class="container">
                    <div class="owl-carousel owl-theme" data-owl-options="{
                        'loop': false,
                        'margin': 20,
                        'items': 1,
                        'responsive': {
                            '576': {
                                'items': 2
                            },
                            '768': {
                                'items': 3
                            }
                        }
                    }">
                        <article class="post">
                            <div class="post-media">
                                <a href="/porto/single.html">
                                    <img src="/porto/assets/images/demoes/demo26/blogs/post-1.jpg"
                                        data-zoom-image="/porto/assets/images/demoes/demo26/blogs/post-1.jpg" alt="Post"
                                        width="400" height="185">
                                </a>
                                <div class="post-date">
                                    <span class="day">26</span>
                                    <span class="month">Feb</span>
                                </div>

                                <span class="prod-full-screen">
                                    <i class="fas fa-search"></i>
                                </span>
                            </div><!-- End .post-media -->

                            <div class="post-body">
                                <h2 class="post-title">
                                    <a href="/porto/single.html">Fancy Yellow Car</a>
                                </h2>
                                <div class="post-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi.
                                        Etiam...
                                        <a href="/porto/single.html" class="read-more">read more <i
                                                class="fas fa-angle-right"></i></a>
                                    </p>
                                </div><!-- End .post-content -->
                            </div><!-- End .post-body -->
                        </article><!-- End .post -->

                        <article class="post">
                            <div class="post-media">
                                <a href="/porto/single.html">
                                    <img src="/porto/assets/images/demoes/demo26/blogs/post-2.jpg"
                                        data-zoom-image="/porto/assets/images/demoes/demo26/blogs/post-2.jpg" alt="Post"
                                        width="225" height="280">
                                </a>
                                <div class="post-date">
                                    <span class="day">26</span>
                                    <span class="month">Feb</span>
                                </div>

                                <span class="prod-full-screen">
                                    <i class="fas fa-search"></i>
                                </span>
                            </div><!-- End .post-media -->

                            <div class="post-body">
                                <h2 class="post-title">
                                    <a href="/porto/single.html">Fashion Trends</a>
                                </h2>
                                <div class="post-content">
                                    <p>Leap into electronic typesetting, remaining essentially unchanged. It was
                                        popularised in the 1960s...
                                        <a href="/porto/single.html" class="read-more">read more <i
                                                class="fas fa-angle-right"></i></a>
                                    </p>
                                </div><!-- End .post-content -->
                            </div><!-- End .post-body -->
                        </article><!-- End .post -->

                        <article class="post">
                            <div class="post-media">
                                <a href="/porto/single.html">
                                    <img src="/porto/assets/images/demoes/demo26/blogs/post-3.jpg"
                                        data-zoom-image="/porto/assets/images/demoes/demo26/blogs/post-3.jpg" alt="Post"
                                        width="225" height="280">
                                </a>
                                <div class="post-date">
                                    <span class="day">26</span>
                                    <span class="month">Feb</span>
                                </div>

                                <span class="prod-full-screen">
                                    <i class="fas fa-search"></i>
                                </span>
                            </div><!-- End .post-media -->

                            <div class="post-body">
                                <h2 class="post-title">
                                    <a href="/porto/single.html">Right Choices</a>
                                </h2>
                                <div class="post-content">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem...
                                        <a href="/porto/single.html" class="read-more">read more <i
                                                class="fas fa-angle-right"></i></a>
                                    </p>
                                </div><!-- End .post-content -->
                            </div><!-- End .post-body -->
                        </article><!-- End .post -->
                    </div>
                </div>
            </div>
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
