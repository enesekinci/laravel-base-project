@extends('layouts.porto')

@section('footer')
    @include('components.porto.demo34.footer')
@endsection


@section('header')
    @include('components.porto.demo34.header')
@endsection

@section('content')
<section class="intro-section">
                <div class="home-slider slide-animate owl-carousel owl-theme show-nav-hover loaded m-b-5"
                    data-owl-options="{
                    'lazyLoad': false
                }">
                    <div class="home-slide home-slide-1 banner" style="background-color: #f6dbe2;">
                        <figure>
                            <img src="/porto/assets/images/demoes/demo34/slider/slide-1.jpg" alt="slider" width="1920"
                                height="700">
                        </figure>

                        <div class="banner-layer banner-layer-middle">
                            <div class="appear-animate" data-animation-name="fadeInLeftShorter"
                                data-animation-delay="300">
                                <h4 class="m-b-2">New Amazing Collection</h4>
                                <h2 class="font1 font-italic m-b-4">Summer Beauty Sale</h2>
                                <p class="font2 ls-n-15 m-b-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Praesent
                                    ullamcorper
                                    quam lacus, et suscipit lectus porta efficitur.</p>
                                <h5 class="coupon-sale-text float-left ls-n-20 text-uppercase">Starting at
                                    <em>$<strong>39</strong>99</em></h5>
                                <a href="/porto/demo34-shop.html" class="btn btn-light btn-lg mb-2">Shop Now</a>
                            </div>
                        </div>

                        <div class="banner-layer banner-layer-bottom banner-text">
                            <img src="/porto/assets/images/demoes/demo34/slider/slide-1-text.png" alt="bg-text" width="1281"
                                height="275">
                        </div>

                        <div class="banner-layer dot-image">
                            <img src="/porto/assets/images/demoes/demo34/dots.png" alt="dots" width="123" height="126">
                        </div>
                    </div>
                    <div class="home-slide home-slide-2 banner" style="background-color: #f6dbe2;">
                        <figure>
                            <img src="/porto/assets/images/demoes/demo34/slider/slide-2.jpg" alt="slider" width="1920"
                                height="700" />
                        </figure>

                        <div class="banner-layer banner-layer-middle text-right">
                            <div class="appear-animate" data-animation-name="fadeInRightShorter"
                                data-animation-delay="300">
                                <h4 class="m-b-2">Back In Stock</h4>
                                <h2 class="font1 font-italic m-b-4">Ultimate SkinCare</h2>
                                <p class="font2 ls-n-15 m-b-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Praesent lori ullamcorper quam lacus, et suscipit lectus porta efficitur.</p>
                                <a href="/porto/demo34-shop.html" class="btn btn-light btn-lg mb-2 float-right">Shop Now</a>
                                <h5 class="coupon-sale-text float-right ls-n-20 text-uppercase">Starting at
                                    <em>$<strong>39</strong>99</em></h5>
                            </div>
                        </div>

                        <div class="banner-layer banner-layer-bottom banner-text">
                            <img src="/porto/assets/images/demoes/demo34/slider/slide-2-text.png" alt="bg-text" width="1281"
                                height="275">
                        </div>

                        <div class="banner-layer dot-image">
                            <img src="/porto/assets/images/demoes/demo34/dots.png" alt="dots" width="123" height="126">
                        </div>
                    </div>
                </div>
            </section>

            <section class="category-section">
                <div class="container">
                    <h2 class="section-title m-b-2 appear-animate" data-animation-name="fadeInUpShorter">Shop By
                        Category</h2>
                    <h5 class="section-info p-b-4 mb-2 appear-animate" data-animation-name="fadeInUpShorter"
                        data-animation-delay="200">Only the best seller products added recently in our catalog</h5>

                    <div class="row grid appear-animate" data-animation-name="fadeInUpShorter"
                        data-animation-delay="400">
                        <div class="grid-item col-sm-6 col-md-3 height-3-5">
                            <div class="product-category" style="background-color: #f4f4f2;">
                                <a href="/porto/demo34-shop.html">
                                    <figure>
                                        <img src="/porto/assets/images/demoes/demo34/products/cats/cat-1.jpg" alt="src"
                                            width="264" height="345">
                                    </figure>
                                </a>
                                <div class="category-content">
                                    <ul class="sub-categories">
                                        <li><a href="/porto/demo34-shop.html">Bath &amp; Shower</a></li>
                                        <li><a href="/porto/demo34-shop.html">Body Care</a></li>
                                        <li><a href="/porto/demo34-shop.html">Body Sculpting</a></li>
                                        <li><a href="/porto/demo34-shop.html">Foot Care</a></li>
                                        <li><a href="/porto/demo34-shop.html">Handcare</a></li>
                                    </ul>

                                    <h3><a href="/porto/demo34-shop.html">Body</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item col-sm-6 height-5-5">
                            <div class="product-category" style="background-color: #f4f4f2;">
                                <a href="/porto/demo34-shop.html">
                                    <figure>
                                        <img src="/porto/assets/images/demoes/demo34/products/cats/cat-2.jpg" alt="src"
                                            width="550" height="564">
                                    </figure>
                                </a>
                                <div class="category-content">
                                    <ul class="sub-categories">
                                        <li><a href="/porto/demo34-shop.html">Cleansers</a></li>
                                        <li><a href="/porto/demo34-shop.html">Exfoliators</a></li>
                                        <li><a href="/porto/demo34-shop.html">Eye Care</a></li>
                                        <li><a href="/porto/demo34-shop.html">Face Masks</a></li>
                                        <li><a href="/porto/demo34-shop.html">Lip Care</a></li>
                                        <li><a href="/porto/demo34-shop.html">Serums</a></li>
                                        <li><a href="/porto/demo34-shop.html">Toners</a></li>
                                    </ul>

                                    <h3><a href="/porto/demo34-shop.html">Skincare</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item col-sm-6 col-md-3 height-2-5">
                            <div class="product-category" style="background-color: #f4f4f4;">
                                <a href="/porto/demo34-shop.html">
                                    <figure>
                                        <img src="/porto/assets/images/demoes/demo34/products/cats/cat-3.jpg" alt="src"
                                            width="264" height="199">
                                    </figure>
                                </a>
                                <div class="category-content">
                                    <ul class="sub-categories">
                                        <li><a href="/porto/demo34-shop.html">Complexion</a></li>
                                        <li><a href="/porto/demo34-shop.html">Eyes</a></li>
                                        <li><a href="/porto/demo34-shop.html">Lips</a></li>
                                    </ul>

                                    <h3><a href="/porto/demo34-shop.html">Makeup</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item col-sm-6 col-md-3 height-3-5">
                            <div class="product-category" style="background-color: #f4f4f2;">
                                <a href="/porto/demo34-shop.html">
                                    <figure>
                                        <img src="/porto/assets/images/demoes/demo34/products/cats/cat-5.jpg" alt="src"
                                            width="264" height="345">
                                    </figure>
                                </a>
                                <div class="category-content">
                                    <ul class="sub-categories">
                                        <li><a href="/porto/demo34-shop.html">Body &amp; Hair Mist</a></li>
                                        <li><a href="/porto/demo34-shop.html">Fragrance</a></li>
                                        <li><a href="/porto/demo34-shop.html">Perfume</a></li>
                                        <li><a href="/porto/demo34-shop.html">Soap</a></li>
                                    </ul>

                                    <h3><a href="/porto/demo34-shop.html">Fragrance</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item col-sm-6 col-md-3 height-2-5">
                            <div class="product-category" style="background-color: #f4f4f4">
                                <a href="/porto/demo34-shop.html">
                                    <figure>
                                        <img src="/porto/assets/images/demoes/demo34/products/cats/cat-4.jpg" alt="src"
                                            width="264" height="199">
                                    </figure>
                                </a>
                                <div class="category-content">
                                    <ul class="sub-categories">
                                        <li><a href="/porto/demo34-shop.html">Conditioner</a></li>
                                        <li><a href="/porto/demo34-shop.html">Shampoo</a></li>
                                        <li><a href="/porto/demo34-shop.html">Styling</a></li>
                                        <li><a href="/porto/demo34-shop.html">Treatments</a></li>
                                    </ul>

                                    <h3><a href="/porto/demo34-shop.html">Hair</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="grid-col-sizer col-1"></div>
                    </div>
                </div>
            </section>

            <section class="recommended-section">
                <div class="container">
                    <h2 class="section-title m-b-2 appear-animate" data-animation-name="fadeInUpShorter">Recommended
                        Products</h2>
                    <h5 class="section-info p-b-4 mb-2 appear-animate" data-animation-name="fadeInUpShorter"
                        data-animation-delay="200">Only the best seller products added recently in our catalog</h5>

                    <ul class="nav nav-tabs justify-content-center pt-4 m-b-3">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#best-seller">Best Seller</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#what-new">What's new</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#best-rating">Best Rating</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#body">Body</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#fragrance">Fragrance</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#hair">Hair</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#makeup">Makeup</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#skincare">Skincare</a>
                        </li>
                    </ul>

                    <div class="product-slider-tab">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="best-seller">
                                <div class="products-slider owl-carousel owl-theme show-nav-hover nav-outer nav-image-center"
                                    data-owl-options="{
                                'dots': false,
                                'nav': true,
                                'responsive': {
                                    '576': {
                                        'items': 2
                                    },
                                    '992': {
                                        'items': 3
                                    }
                                }
                            }">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo34-product.html">
                                                <img src="/porto/assets/images/demoes/demo34/products/product-1.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="/porto/demo34-product.html" class="btn-icon btn-add-cart"><i
                                                        class="fa fa-arrow-right"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View">Quick
                                                View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo34-product.html">Face Powder</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$69.00 &ndash; $89.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo34-product.html">
                                                <img src="/porto/assets/images/demoes/demo34/products/product-2.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="/porto/demo34-product.html"
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
                                                    <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo34-product.html">Lipstick</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
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
                                            <a href="/porto/demo34-product.html">
                                                <img src="/porto/assets/images/demoes/demo34/products/product-3.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                                <div class="product-label label-sale">-16%</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="/porto/demo34-product.html"
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
                                                    <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo34-product.html">Woman Perfume</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="old-price">$129.00</span>
                                                <span class="product-price">$108.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo34-product.html">
                                                <img src="/porto/assets/images/demoes/demo34/products/product-4.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="/porto/demo34-product.html"
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
                                                    <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo34-product.html">Aerin Rose Oil</a>
                                            </h3>
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
                                </div>
                            </div>
                            <div class="tab-pane fade" id="what-new">
                                <div class="products-slider owl-carousel owl-theme show-nav-hover nav-outer nav-image-center"
                                    data-owl-options="{
                                'dots': false,
                                'nav': true,
                                'responsive': {
                                    '576': {
                                        'items': 2
                                    },
                                    '992': {
                                        'items': 3
                                    }
                                }
                            }">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo34-product.html">
                                                <img src="/porto/assets/images/demoes/demo34/products/product-1.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="/porto/demo34-product.html" class="btn-icon btn-add-cart"><i
                                                        class="fa fa-arrow-right"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View">Quick
                                                View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo34-product.html">Face Powder</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$69.00 &ndash; $89.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo34-product.html">
                                                <img src="/porto/assets/images/demoes/demo34/products/product-2.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="/porto/demo34-product.html"
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
                                                    <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo34-product.html">Lipstick</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
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
                                            <a href="/porto/demo34-product.html">
                                                <img src="/porto/assets/images/demoes/demo34/products/product-3.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                                <div class="product-label label-sale">-16%</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="/porto/demo34-product.html"
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
                                                    <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo34-product.html">Woman Perfume</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="old-price">$129.00</span>
                                                <span class="product-price">$108.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo34-product.html">
                                                <img src="/porto/assets/images/demoes/demo34/products/product-4.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="/porto/demo34-product.html"
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
                                                    <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo34-product.html">Aerin Rose Oil</a>
                                            </h3>
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
                                </div>
                            </div>
                            <div class="tab-pane fade" id="best-rating">
                                <div class="products-slider owl-carousel owl-theme show-nav-hover nav-outer nav-image-center"
                                    data-owl-options="{
                                'dots': false,
                                'nav': true,
                                'responsive': {
                                    '576': {
                                        'items': 2
                                    },
                                    '992': {
                                        'items': 3
                                    }
                                }
                            }">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo34-product.html">
                                                <img src="/porto/assets/images/demoes/demo34/products/product-1.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="/porto/demo34-product.html" class="btn-icon btn-add-cart"><i
                                                        class="fa fa-arrow-right"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View">Quick
                                                View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo34-product.html">Face Powder</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$69.00 &ndash; $89.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo34-product.html">
                                                <img src="/porto/assets/images/demoes/demo34/products/product-2.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="/porto/demo34-product.html"
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
                                                    <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo34-product.html">Lipstick</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
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
                                            <a href="/porto/demo34-product.html">
                                                <img src="/porto/assets/images/demoes/demo34/products/product-3.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                                <div class="product-label label-sale">-16%</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="/porto/demo34-product.html"
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
                                                    <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo34-product.html">Woman Perfume</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="old-price">$129.00</span>
                                                <span class="product-price">$108.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo34-product.html">
                                                <img src="/porto/assets/images/demoes/demo34/products/product-4.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="/porto/demo34-product.html"
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
                                                    <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo34-product.html">Aerin Rose Oil</a>
                                            </h3>
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
                                </div>
                            </div>
                            <div class="tab-pane fade" id="body">
                                <div class="products-slider owl-carousel owl-theme show-nav-hover nav-outer nav-image-center"
                                    data-owl-options="{
                                'dots': false,
                                'nav': true,
                                'responsive': {
                                    '576': {
                                        'items': 2
                                    },
                                    '992': {
                                        'items': 3
                                    }
                                }
                            }">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo34-product.html">
                                                <img src="/porto/assets/images/demoes/demo34/products/product-1.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="/porto/demo34-product.html" class="btn-icon btn-add-cart"><i
                                                        class="fa fa-arrow-right"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View">Quick
                                                View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo34-product.html">Face Powder</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$69.00 &ndash; $89.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo34-product.html">
                                                <img src="/porto/assets/images/demoes/demo34/products/product-2.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="/porto/demo34-product.html"
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
                                                    <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo34-product.html">Lipstick</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
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
                                            <a href="/porto/demo34-product.html">
                                                <img src="/porto/assets/images/demoes/demo34/products/product-3.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                                <div class="product-label label-sale">-16%</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="/porto/demo34-product.html"
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
                                                    <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo34-product.html">Woman Perfume</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="old-price">$129.00</span>
                                                <span class="product-price">$108.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo34-product.html">
                                                <img src="/porto/assets/images/demoes/demo34/products/product-4.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="/porto/demo34-product.html"
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
                                                    <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo34-product.html">Aerin Rose Oil</a>
                                            </h3>
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
                                </div>
                            </div>
                            <div class="tab-pane fade" id="fragrance">
                                <div class="products-slider owl-carousel owl-theme show-nav-hover nav-outer nav-image-center"
                                    data-owl-options="{
                                'dots': false,
                                'nav': true,
                                'responsive': {
                                    '576': {
                                        'items': 2
                                    },
                                    '992': {
                                        'items': 3
                                    }
                                }
                            }">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo34-product.html">
                                                <img src="/porto/assets/images/demoes/demo34/products/product-1.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="/porto/demo34-product.html" class="btn-icon btn-add-cart"><i
                                                        class="fa fa-arrow-right"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View">Quick
                                                View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo34-product.html">Face Powder</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$69.00 &ndash; $89.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo34-product.html">
                                                <img src="/porto/assets/images/demoes/demo34/products/product-2.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="/porto/demo34-product.html"
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
                                                    <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo34-product.html">Lipstick</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
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
                                            <a href="/porto/demo34-product.html">
                                                <img src="/porto/assets/images/demoes/demo34/products/product-3.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                                <div class="product-label label-sale">-16%</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="/porto/demo34-product.html"
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
                                                    <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo34-product.html">Woman Perfume</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="old-price">$129.00</span>
                                                <span class="product-price">$108.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo34-product.html">
                                                <img src="/porto/assets/images/demoes/demo34/products/product-4.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="/porto/demo34-product.html"
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
                                                    <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo34-product.html">Aerin Rose Oil</a>
                                            </h3>
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
                                </div>
                            </div>
                            <div class="tab-pane fade" id="hair">
                                <div class="products-slider owl-carousel owl-theme show-nav-hover nav-outer nav-image-center"
                                    data-owl-options="{
                                'dots': false,
                                'nav': true,
                                'responsive': {
                                    '576': {
                                        'items': 2
                                    },
                                    '992': {
                                        'items': 3
                                    }
                                }
                            }">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo34-product.html">
                                                <img src="/porto/assets/images/demoes/demo34/products/product-1.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="/porto/demo34-product.html" class="btn-icon btn-add-cart"><i
                                                        class="fa fa-arrow-right"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View">Quick
                                                View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo34-product.html">Face Powder</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$69.00 &ndash; $89.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo34-product.html">
                                                <img src="/porto/assets/images/demoes/demo34/products/product-2.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="/porto/demo34-product.html"
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
                                                    <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo34-product.html">Lipstick</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
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
                                            <a href="/porto/demo34-product.html">
                                                <img src="/porto/assets/images/demoes/demo34/products/product-3.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                                <div class="product-label label-sale">-16%</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="/porto/demo34-product.html"
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
                                                    <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo34-product.html">Woman Perfume</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="old-price">$129.00</span>
                                                <span class="product-price">$108.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo34-product.html">
                                                <img src="/porto/assets/images/demoes/demo34/products/product-4.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="/porto/demo34-product.html"
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
                                                    <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo34-product.html">Aerin Rose Oil</a>
                                            </h3>
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
                                </div>
                            </div>
                            <div class="tab-pane fade" id="makeup">
                                <div class="products-slider owl-carousel owl-theme show-nav-hover nav-outer nav-image-center"
                                    data-owl-options="{
                                'dots': false,
                                'nav': true,
                                'responsive': {
                                    '576': {
                                        'items': 2
                                    },
                                    '992': {
                                        'items': 3
                                    }
                                }
                            }">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo34-product.html">
                                                <img src="/porto/assets/images/demoes/demo34/products/product-1.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="/porto/demo34-product.html" class="btn-icon btn-add-cart"><i
                                                        class="fa fa-arrow-right"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View">Quick
                                                View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo34-product.html">Face Powder</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$69.00 &ndash; $89.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo34-product.html">
                                                <img src="/porto/assets/images/demoes/demo34/products/product-2.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="/porto/demo34-product.html"
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
                                                    <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo34-product.html">Lipstick</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
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
                                            <a href="/porto/demo34-product.html">
                                                <img src="/porto/assets/images/demoes/demo34/products/product-3.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                                <div class="product-label label-sale">-16%</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="/porto/demo34-product.html"
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
                                                    <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo34-product.html">Woman Perfume</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="old-price">$129.00</span>
                                                <span class="product-price">$108.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo34-product.html">
                                                <img src="/porto/assets/images/demoes/demo34/products/product-4.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="/porto/demo34-product.html"
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
                                                    <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo34-product.html">Aerin Rose Oil</a>
                                            </h3>
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
                                </div>
                            </div>
                            <div class="tab-pane fade" id="skincare">
                                <div class="products-slider owl-carousel owl-theme show-nav-hover nav-outer nav-image-center"
                                    data-owl-options="{
                                'dots': false,
                                'nav': true,
                                'responsive': {
                                    '576': {
                                        'items': 2
                                    },
                                    '992': {
                                        'items': 3
                                    }
                                }
                            }">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo34-product.html">
                                                <img src="/porto/assets/images/demoes/demo34/products/product-1.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="/porto/demo34-product.html" class="btn-icon btn-add-cart"><i
                                                        class="fa fa-arrow-right"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                                title="Quick View">Quick
                                                View</a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo34-product.html">Face Powder</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">$69.00 &ndash; $89.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo34-product.html">
                                                <img src="/porto/assets/images/demoes/demo34/products/product-2.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="/porto/demo34-product.html"
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
                                                    <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo34-product.html">Lipstick</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
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
                                            <a href="/porto/demo34-product.html">
                                                <img src="/porto/assets/images/demoes/demo34/products/product-3.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                                <div class="product-label label-sale">-16%</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="/porto/demo34-product.html"
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
                                                    <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo34-product.html">Woman Perfume</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="old-price">$129.00</span>
                                                <span class="product-price">$108.00</span>
                                            </div><!-- End .price-box -->
                                        </div><!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo34-product.html">
                                                <img src="/porto/assets/images/demoes/demo34/products/product-4.jpg"
                                                    width="217" height="217" alt="product">
                                            </a>
                                            <div class="label-group">
                                                <div class="product-label label-hot">HOT</div>
                                            </div>
                                            <div class="btn-icon-group">
                                                <a href="/porto/demo34-product.html"
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
                                                    <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo34-product.html">Aerin Rose Oil</a>
                                            </h3>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="brands-section">
                <div class="container">
                    <h2 class="section-title m-b-2 appear-animate" data-animation-name="fadeIn"
                        data-animation-delay="100">Shop by Brands</h2>
                    <h5 class="section-info p-b-4 m-b-2 appear-animate" data-animation-name="fadeIn"
                        data-animation-delay="250">Only the best seller products added recently in our catalog
                    </h5>

                    <div class="brands-slider owl-carousel owl-theme m-b-5 appear-animate" data-animation-name="fadeIn"
                        data-animation-delay="400">
                        <a href="#">
                            <div class="d-inline-block"><img src="/porto/assets/images/brands/small/brand1.png" alt="brand"
                                    width="140" height="60"></div>
                        </a>
                        <a href="#">
                            <div class="d-inline-block"><img src="/porto/assets/images/brands/small/brand2.png" alt="brand"
                                    width="140" height="60"></div>
                        </a>
                        <a href="#">
                            <div class="d-inline-block"><img src="/porto/assets/images/brands/small/brand3.png" alt="brand"
                                    width="140" height="60"></div>
                        </a>
                        <a href="#">
                            <div class="d-inline-block"><img src="/porto/assets/images/brands/small/brand4.png" alt="brand"
                                    width="140" height="60"></div>
                        </a>
                        <a href="#">
                            <div class="d-inline-block"><img src="/porto/assets/images/brands/small/brand5.png" alt="brand"
                                    width="140" height="60"></div>
                        </a>
                        <a href="#">
                            <div class="d-inline-block"><img src="/porto/assets/images/brands/small/brand6.png" alt="brand"
                                    width="140" height="60"></div>
                        </a>
                    </div>
                </div>
            </section>

            <section class="reviews-section" style="background-image: url(/porto/assets/images/demoes/demo34/bg-text.png);">
                <div class="container">
                    <h2 class="section-title text-center m-b-2">Clients Reviews</h2>
                    <h5 class="section-info border-0 text-center mb-0">Only the best seller products added recently in
                        our
                        catalog
                    </h5>

                    <div class="testimonial-carousel owl-carousel owl-theme show-nav-hover nav-outer dots-small mb-2"
                        data-owl-options="{
                        'dots': true,
                        'loop': false,
                        'responsive': null
                    }">
                        <div class="testimonial">
                            <blockquote>
                                <p>I really love it. At first it does feel strange and a little sore after! But
                                    keep it up (I use morning and night) and my skin feels great.</p>
                            </blockquote>
                            <div class="testimonial-owner">
                                <strong class="testimonial-title">Mary Doe</strong>
                            </div>
                        </div>
                        <div class="testimonial">
                            <blockquote>
                                <p>I really love it. At first it does feel strange and a little sore after! But
                                    keep it up (I use morning and night) and my skin feels great.</p>
                            </blockquote>
                            <div class="testimonial-owner">
                                <strong class="testimonial-title">Mary Doe</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="best-selling-products">
                <div class="container">
                    <h2 class="section-title m-b-2">Best Selling Products</h2>
                    <h5 class="section-info p-b-4 mb-2">Only the best seller products added recently in
                        our
                        catalog
                    </h5>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="banner banner1 mb-2" style="background-color: #f4f4f2;">
                                <figure>
                                    <img src="/porto/assets/images/demoes/demo34/banners/banner-1.png" alt="banner" width="580"
                                        height="430">
                                </figure>

                                <div class="banner-layer banner-layer-middle banner-layer-right text-right">
                                    <h3 class="text-uppercase mb-0">Fragrance Offers</h3>
                                    <h4 class="font1 text-uppercase mb-0">
                                        <small
                                            class="font2 font-weight-bold ls-n-20"><sup>up</sup><sub>to</sub></small><i>45%</i>
                                    </h4>
                                    <h5 class="ls-n-20 text-uppercase">off</h5>
                                    <a href="/porto/demo34-shop.html" class="btn btn-dark btn-lg">Shop now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="owl-carousel owl-theme dots-small" data-owl-options="{
                                'items': 2,
                                'dots': true,
                                'loop': true,
                                'margin': 20
                            }">
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo34-product.html">
                                            <img src="/porto/assets/images/demoes/demo34/products/product-5.jpg" width="217"
                                                height="217" alt="product">
                                        </a>
                                        <div class="label-group">
                                            <div class="product-label label-sale">-26%</div>
                                        </div>
                                        <div class="btn-icon-group">
                                            <a href="/porto/demo34-product.html"
                                                class="btn-icon btn-add-cart product-type-simple"><i
                                                    class="icon-shopping-cart"></i></a>
                                        </div>
                                        <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                            title="Quick View">Quick
                                            View</a>
                                        <div class="product-countdown-container">
                                            <span class="product-countdown-title">offer ends in:</span>
                                            <div class="product-countdown countdown-compact" data-until="2021, 10, 5"
                                                data-compact="true">
                                            </div><!-- End .product-countdown -->
                                        </div><!-- End .product-countdown-container -->
                                    </figure>
                                    <div class="product-details">
                                        <div class="category-wrap">
                                            <div class="category-list">
                                                <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo34-product.html">Toner</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="old-price">$39.00</span>
                                            <span class="product-price">$29.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo34-product.html">
                                            <img src="/porto/assets/images/demoes/demo34/products/product-6.jpg" width="217"
                                                height="217" alt="product">
                                        </a>
                                        <div class="btn-icon-group">
                                            <a href="/porto/demo34-product.html"
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
                                                <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo34-product.html">Fashion High Hill</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div><!-- End .product-ratings -->
                                        </div><!-- End .product-container -->
                                        <div class="price-box">
                                            <span class="product-price">$29.00</span>
                                        </div><!-- End .price-box -->
                                    </div><!-- End .product-details -->
                                </div>
                                <div class="product-default inner-quickview inner-icon">
                                    <figure>
                                        <a href="/porto/demo34-product.html">
                                            <img src="/porto/assets/images/demoes/demo34/products/product-7.jpg" width="217"
                                                height="217" alt="product">
                                        </a>
                                        <div class="btn-icon-group">
                                            <a href="/porto/demo34-product.html"
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
                                                <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                            </div>
                                            <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                                    class="icon-heart"></i></a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="/porto/demo34-product.html">Summer High Hill</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:0%"></span><!-- End .ratings -->
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
                    </div>
                </div>
            </section>

            <div class="banner banner2">
                <div class="row no-gutters m-0">
                    <div class="col-lg-6 parallax-bg" data-parallax="{'speed': 1.3, 'enableOnMobile': false}"
                        data-image-src="/porto/assets/images/demoes/demo34/banners/banner-2.jpg"
                        style="background-color: #f4f4f2;">
                        <div class="dot-image">
                            <img src="/porto/assets/images/demoes/demo34/dots.png" alt="dots" width="123" height="126">
                        </div>
                    </div>
                    <div class="col-lg-6 banner-content appear-animate" data-animation-name="fadeInLeftShorter"
                        data-animation-delay="200">
                        <h4 class="m-b-1">Self Care for You</h4>
                        <h2 class="font1 font-italic m-b-4">Stay Beauty at Home</h2>
                        <p class="font2 ls-n-15 m-b-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Praesent
                            ullamcorper
                            quam lacus, et suscipit lectus porta efficitur.</p>
                        <h5 class="coupon-sale-text float-left ls-n-20 text-uppercase">Starting at
                            <em>$<strong>39</strong>99</em></h5>
                        <a href="/porto/demo34-shop.html" class="btn btn-dark btn-lg mb-0">Shop Now</a>
                    </div>
                </div>
            </div>

            <div class="banner banner3">
                <div class="row no-gutters m-0">
                    <div class="col-lg-6 parallax-bg order-lg-last"
                        data-parallax="{'speed': 1.3, 'enableOnMobile': false}"
                        data-image-src="/porto/assets/images/demoes/demo34/banners/banner-3.jpg"
                        style="background-color: #f5dee6;">
                        <div class="dot-image">
                            <img src="/porto/assets/images/demoes/demo34/dots.png" alt="dots" width="123" height="126">
                        </div>
                    </div>
                    <div class="col-lg-6 banner-content appear-animate" data-animation-name="fadeInRightShorter"
                        data-animation-delay="200">
                        <h4 class="m-b-1">Clear and Glowing Skin</h4>
                        <h2 class="font1 font-italic m-b-4">Best Face Masks</h2>
                        <p class="font2 ls-n-15 m-b-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Praesent
                            ullamcorper
                            quam lacus, et suscipit lectus porta efficitur.</p>
                        <h5 class="coupon-sale-text float-left ls-n-20 text-uppercase">Starting at
                            <em>$<strong>39</strong>99</em></h5>
                        <a href="/porto/demo34-shop.html" class="btn btn-dark btn-lg mb-0">Shop Now</a>
                    </div>
                </div>
            </div>

            <section class="essentials-section">
                <div class="container">
                    <div class="info-boxes-slider owl-carousel appear-animate" data-owl-options="{
                        'items': 1,
                        'dots': false,
                        'loop': false,
                        'responsive': {
                            '768': {
                                'items': 2
                            },
                            '992': {
                                'items': 3
                            }
                        }
                    }" data-animation-name="fadeInUpShorter" data-animation-delay="200">
                        <div class="info-box info-box-icon-left">
                            <i class="icon-shipping"></i>

                            <div class="info-box-content">
                                <h4>Free Shipping &amp; Return</h4>
                                <p>Free shipping on all orders over $99.</p>
                            </div><!-- End .info-box-content -->
                        </div><!-- End .info-box -->

                        <div class="info-box info-box-icon-left">
                            <i class="icon-money "></i>

                            <div class="info-box-content">
                                <h4>Money Back Guarantee</h4>
                                <p>100% money back guarantee</p>
                            </div><!-- End .info-box-content -->
                        </div><!-- End .info-box -->

                        <div class="info-box info-box-icon-left">
                            <i class="icon-support "></i>

                            <div class="info-box-content">
                                <h4>Online Support 24/7</h4>
                                <p>Lorem ipsum dolor sit amet.</p>
                            </div><!-- End .info-box-content -->
                        </div><!-- End .info-box -->
                    </div>

                    <h2 class="section-title m-b-2">Everyday Essentials Collection</h2>
                    <h5 class="section-info p-b-4 mb-2">Only the best seller products added recently in
                        our
                        catalog
                    </h5>

                    <div class="row m-b-5">
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="product-default inner-icon">
                                <figure>
                                    <a href="/porto/demo34-product.html">
                                        <img src="/porto/assets/images/demoes/demo34/products/small/product-1.jpg" width="84"
                                            height="84" alt="product">
                                    </a>
                                </figure>

                                <div class="product-details">
                                    <div class="category-list">
                                        <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                    </div>

                                    <h3 class="product-title"> <a href="/porto/demo34-product.html">Aerin Rose Oil</a> </h3>

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
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="product-default inner-icon">
                                <figure>
                                    <a href="/porto/demo34-product.html">
                                        <img src="/porto/assets/images/demoes/demo34/products/small/product-2.jpg" width="84"
                                            height="84" alt="product">
                                    </a>
                                </figure>

                                <div class="product-details">
                                    <div class="category-list">
                                        <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                    </div>

                                    <h3 class="product-title"> <a href="/porto/demo34-product.html">Cosmetic Bag</a> </h3>

                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->

                                    <div class="price-box">
                                        <span class="product-price">$9.00</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="product-default inner-icon">
                                <figure>
                                    <a href="/porto/demo34-product.html">
                                        <img src="/porto/assets/images/demoes/demo34/products/small/product-3.jpg" width="84"
                                            height="84" alt="product">
                                    </a>
                                </figure>

                                <div class="product-details">
                                    <div class="category-list">
                                        <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                    </div>

                                    <h3 class="product-title"> <a href="/porto/demo34-product.html">Eye lotion</a> </h3>

                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->

                                    <div class="price-box">
                                        <span class="product-price">$59.00</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="product-default inner-icon">
                                <figure>
                                    <a href="/porto/demo34-product.html">
                                        <img src="/porto/assets/images/demoes/demo34/products/small/product-4.jpg" width="84"
                                            height="84" alt="product">
                                    </a>
                                </figure>

                                <div class="product-details">
                                    <div class="category-list">
                                        <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                    </div>

                                    <h3 class="product-title"> <a href="/porto/demo34-product.html">Fashion High Hill</a> </h3>

                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->

                                    <div class="price-box">
                                        <span class="product-price">$29.00</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="product-default inner-icon">
                                <figure>
                                    <a href="/porto/demo34-product.html">
                                        <img src="/porto/assets/images/demoes/demo34/products/small/product-5.jpg" width="84"
                                            height="84" alt="product">
                                    </a>
                                </figure>

                                <div class="product-details">
                                    <div class="category-list">
                                        <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                    </div>

                                    <h3 class="product-title"> <a href="/porto/demo34-product.html">Hand Care Cream</a> </h3>

                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->

                                    <div class="price-box">
                                        <span class="product-price">$69.00</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="product-default inner-icon">
                                <figure>
                                    <a href="/porto/demo34-product.html">
                                        <img src="/porto/assets/images/demoes/demo34/products/small/product-6.jpg" width="84"
                                            height="84" alt="product">
                                    </a>
                                </figure>

                                <div class="product-details">
                                    <div class="category-list">
                                        <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                    </div>

                                    <h3 class="product-title"> <a href="/porto/demo34-product.html">Lipstick</a> </h3>

                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->

                                    <div class="price-box">
                                        <span class="product-price">$19.00</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="product-default inner-icon">
                                <figure>
                                    <a href="/porto/demo34-product.html">
                                        <img src="/porto/assets/images/demoes/demo34/products/small/product-7.jpg" width="84"
                                            height="84" alt="product">
                                    </a>
                                </figure>

                                <div class="product-details">
                                    <div class="category-list">
                                        <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                    </div>

                                    <h3 class="product-title"> <a href="/porto/demo34-product.html">Toner</a> </h3>

                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->

                                    <div class="price-box">
                                        <span class="old-price">$39.00</span>
                                        <span class="product-price">$29.00</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="product-default inner-icon">
                                <figure>
                                    <a href="/porto/demo34-product.html">
                                        <img src="/porto/assets/images/demoes/demo34/products/product-1.jpg" width="84"
                                            height="84" alt="product">
                                    </a>
                                </figure>

                                <div class="product-details">
                                    <div class="category-list">
                                        <a href="/porto/demo34-shop.html" class="product-category">category</a>
                                    </div>

                                    <h3 class="product-title"> <a href="/porto/demo34-product.html">Face Powder</a> </h3>

                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->

                                    <div class="price-box">
                                        <span class="product-price">$69.00 &ndash; $89.00</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="blog-section post-date-in-media media-with-zoom"
                style="background-image: url(/porto/assets/images/demoes/demo34/blogs/blog-text.png);">
                <div class="container">
                    <h2 class="section-title m-b-2 appear-animate" data-animation-name="fadeInUpShorter"
                        data-animation-delay="100">Beauty Inspiration</h2>
                    <h5 class="section-info border-0 m-b-4 appear-animate" data-animation-name="fadeInUpShorter"
                        data-animation-delay="300">Only the best seller products added recently in
                        our
                        catalog
                    </h5>

                    <div class="owl-carousel owl-theme mb-1 appear-animate" data-owl-options="{
                        'loop': false,
                        'nav': false,
                        'dots': false,
                        'margin': 20,
                        'items': 1,
                        'responsive': {
                            '576': {
                                'items': 2
                            }
                        }
                    }" data-animation-name="fadeInUpShorter" data-animation-delay="500">
                        <article class="post">
                            <div class="post-media">
                                <a href="/porto/single.html">
                                    <img src="/porto/assets/images/demoes/demo34/blogs/post-1.jpg"
                                        data-zoom-image="/porto/assets/images/demoes/demo34/blogs/post-1.jpg" alt="Post"
                                        width="400" height="185">
                                </a>
                                <div class="post-date">
                                    <span class="day">16</span>
                                    <span class="month">May</span>
                                </div>

                                <span class="prod-full-screen">
                                    <i class="fas fa-search"></i>
                                </span>
                            </div><!-- End .post-media -->

                            <div class="post-body">
                                <h2 class="post-title">
                                    <a href="/porto/single.html">Find the best cosmetics for your skin</a>
                                </h2>
                                <div class="post-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi.
                                        Etiam non tellus sem. Aenean pretium convallis...</p>
                                </div><!-- End .post-content -->
                            </div><!-- End .post-body -->
                        </article><!-- End .post -->
                        <article class="post">
                            <div class="post-media">
                                <a href="/porto/single.html">
                                    <img src="/porto/assets/images/demoes/demo34/blogs/post-2.jpg"
                                        data-zoom-image="/porto/assets/images/demoes/demo34/blogs/post-2.jpg" alt="Post"
                                        width="400" height="185">
                                </a>
                                <div class="post-date">
                                    <span class="day">13</span>
                                    <span class="month">May</span>
                                </div>

                                <span class="prod-full-screen">
                                    <i class="fas fa-search"></i>
                                </span>
                            </div><!-- End .post-media -->

                            <div class="post-body">
                                <h2 class="post-title">
                                    <a href="/porto/single.html">Never run out of your favourites</a>
                                </h2>
                                <div class="post-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi.
                                        Etiam non tellus sem. Aenean pretium convallis...</p>
                                </div><!-- End .post-content -->
                            </div><!-- End .post-body -->
                        </article><!-- End .post -->
                    </div>
                </div>
            </section>

            <section class="instagram-section position-relative">
                <div class="instagram-follow text-center bg-dark">
                    <i class="fab fa-instagram text-white"></i>
                    <div class="info-box-content">
                        <h4 class="font1 font-italic text-white">Follow on Instagram</h4>
                        <p class="font2 mb-0">@portoecommerce</p>
                    </div>
                </div>

                <div class="instagram-carousel owl-carousel owl-theme" data-owl-options="{
                    'items': 2,
                    'dots': false,
                    'responsive': {
                        '576': {
                            'items': 3
                        },
                        '768': {
                            'items': 4
                        },
                        '992': {
                            'items': 5
                        },
                        '1200': {
                            'items' : 6
                        }
                    }
                }">
                    <img src="/porto/assets/images/demoes/demo34/instagrams/instagram-1.jpg" alt="instagram" width="240"
                        height="240">
                    <img src="/porto/assets/images/demoes/demo34/instagrams/instagram-2.jpg" alt="instagram" width="240"
                        height="240">
                    <img src="/porto/assets/images/demoes/demo34/instagrams/instagram-3.jpg" alt="instagram" width="240"
                        height="240">
                    <img src="/porto/assets/images/demoes/demo34/instagrams/instagram-4.jpg" alt="instagram" width="240"
                        height="240">
                    <img src="/porto/assets/images/demoes/demo34/instagrams/instagram-5.jpg" alt="instagram" width="240"
                        height="240">
                    <img src="/porto/assets/images/demoes/demo34/instagrams/instagram-6.jpg" alt="instagram" width="240"
                        height="240">
                </div>
            </section>
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
