@extends('layouts.porto')

@section('header')
    @include('components.porto.demo35.header')
@endsection

@section('footer')
    @include('components.porto.demo35.footer')
@endsection

@section('content')
<div class="container">
                <nav aria-label="breadcrumb" class="breadcrumb-nav">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/porto/demo35.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">Products</a></li>
                    </ol>
                </nav>

                <div class="product-single-container product-single-default">
                    <div class="cart-message d-none">
                        <strong class="single-cart-notice">“Fonte de fibras”</strong>
                        <span>has been added to your cart.</span>
                    </div>

                    <div class="row">
                        <div class="col-lg-5 col-md-6 product-single-gallery">
                            <div class="product-slider-container">

                                <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                                    <div class="product-item">
                                        <img class="product-single-image"
                                            src="/porto/assets/images/demoes/demo35/products/product-6.jpg"
                                            data-zoom-image="/porto/assets/images/demoes/demo35/products/product-6.jpg"
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
                                    <img src="/porto/assets/images/demoes/demo35/products/product-6.jpg" width="110"
                                        height="110" alt="product-thumbnail" />
                                </div>
                            </div>
                        </div><!-- End .product-single-gallery -->

                        <div class="col-lg-7 col-md-6 product-single-details">
                            <h1 class="product-title">Fonte de fibras</h1>

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
                                <span class="product-price">$129.00</span>
                            </div><!-- End .price-box -->

                            <div class="product-desc">
                                <p>
                                    Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
                                    egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet,
                                    ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est.
                                    Mauris placerat eleifend leo.
                                </p>
                            </div><!-- End .product-desc -->

                            <ul class="single-info-list">
                                <li>
                                    CATEGORY: <strong><a href="#" class="product-category">Breakfast</a></strong>
                                </li>
                            </ul>

                            <div class="product-action">
                                <div class="product-single-qty">
                                    <input class="horizontal-quantity form-control font1" type="text">
                                </div><!-- End .product-single-qty -->

                                <a href="javascript:;" class="btn btn-dark add-cart font1 mr-2" title="Add to Cart">Add
                                    to
                                    Cart</a>

                                <a href="/porto/cart.html" class="btn btn-gray view-cart d-none">View cart</a>
                            </div><!-- End .product-action -->

                            <hr class="divider mb-0 mt-0">

                            <div class="product-single-share mb-3">
                                <label class="sr-only">Share:</label>

                                <div class="social-icons mr-2">
                                    <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"
                                        title="Facebook"></a>
                                    <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"
                                        title="Twitter"></a>
                                    <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank"
                                        title="Linkedin"></a>
                                    <a href="#" class="social-icon social-gplus fab fa-google-plus-g" target="_blank"
                                        title="Google +"></a>
                                    <a href="#" class="social-icon social-mail icon-mail-alt" target="_blank"
                                        title="Mail"></a>
                                </div><!-- End .social-icons -->

                                <a href="/porto/wishlist.html" class="btn-icon-wish add-wishlist" title="Add to Wishlist"><i
                                        class="icon-wishlist-2"></i><span>Add to
                                        Wishlist</span></a>
                            </div><!-- End .product single-share -->
                        </div><!-- End .product-single-details -->
                    </div><!-- End .row -->
                </div><!-- End .product-single-container -->

                <div class="product-single-tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="product-tab-desc" data-toggle="tab"
                                href="#product-desc-content" role="tab" aria-controls="product-desc-content"
                                aria-selected="true">Description</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="product-tab-reviews" data-toggle="tab"
                                href="#product-reviews-content" role="tab" aria-controls="product-reviews-content"
                                aria-selected="false">Reviews (1)</a>
                        </li>
                    </ul>

                    <div class="tab-content font2">
                        <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel"
                            aria-labelledby="product-tab-desc">
                            <div class="product-desc-content">
                                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
                                    egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet,
                                    ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est.
                                    Mauris placerat eleifend leo.</p>
                            </div><!-- End .product-desc-content -->
                        </div><!-- End .tab-pane -->

                        <div class="tab-pane fade" id="product-reviews-content" role="tabpanel"
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
                                            <label for="rating">Your rating <span class="required">*</span></label>
                                            <span class="rating-stars">
                                                <a class="star-1" href="#">1</a>
                                                <a class="star-2" href="#">2</a>
                                                <a class="star-3" href="#">3</a>
                                                <a class="star-4" href="#">4</a>
                                                <a class="star-5" href="#">5</a>
                                            </span>

                                            <select name="rating" id="rating" required="" style="display: none;">
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
                                            <textarea cols="5" rows="6" class="form-control form-control-sm"></textarea>
                                        </div><!-- End .form-group -->


                                        <div class="row">
                                            <div class="col-md-6 col-xl-12">
                                                <div class="form-group">
                                                    <label>Name <span class="required">*</span></label>
                                                    <input type="text" class="form-control form-control-sm" required>
                                                </div><!-- End .form-group -->
                                            </div>

                                            <div class="col-md-6 col-xl-12">
                                                <div class="form-group">
                                                    <label>Email <span class="required">*</span></label>
                                                    <input type="text" class="form-control form-control-sm" required>
                                                </div><!-- End .form-group -->
                                            </div>

                                            <div class="col-md-12">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="save-name" />
                                                    <label class="custom-control-label mb-0" for="save-name">Save my
                                                        name, email, and website in this browser for the next time I
                                                        comment.</label>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="submit" class="btn btn-primary" value="Submit">
                                    </form>
                                </div><!-- End .add-product-review -->
                            </div><!-- End .product-reviews-content -->
                        </div><!-- End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .product-single-tabs -->

                <div class="products-section pt-0">
                    <h2 class="section-title m-b-4">Related Products</h2>

                    <div class="row">
                        <div class="products-slider owl-carousel owl-theme dots-top dots-small mb-0" data-owl-options="{
                        'margin': 0
                    }">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo35-product.html">
                                        <img src="/porto/assets/images/demoes/demo35/products/product-17.jpg" width="217"
                                            height="217" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="/porto/demo35-product.html"
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
                                            <a href="/porto/demo35-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo35-product.html">Capeletti</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">$59.00</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo35-product.html">
                                        <img src="/porto/assets/images/demoes/demo35/products/product-16.jpg" width="217"
                                            height="217" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-sale">-17%</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="/porto/demo35-product.html"
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
                                            <a href="/porto/demo35-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo35-product.html">Raw Meat</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="old-price">$59.00</span>
                                        <span class="product-price">$49.00</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo35-product.html">
                                        <img src="/porto/assets/images/demoes/demo35/products/product-18.jpg" width="217"
                                            height="217" alt="product">
                                    </a>
                                    <div class="btn-icon-group">
                                        <a href="/porto/demo35-product.html"
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
                                            <a href="/porto/demo35-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo35-product.html">Bread</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:70%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">$62.00</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo35-product.html">
                                        <img src="/porto/assets/images/demoes/demo35/products/product-4.jpg" width="217"
                                            height="217" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="/porto/demo35-product.html"
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
                                            <a href="/porto/demo35-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo35-product.html">Leon Bayer</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span>
                                            <!-- End .ratings -->
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
                                    <a href="/porto/demo35-product.html">
                                        <img src="/porto/assets/images/demoes/demo35/products/product-1.jpg" width="217"
                                            height="217" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="/porto/demo35-product.html" class="btn-icon btn-add-cart"><i
                                                class="fa fa-arrow-right"></i></a>
                                    </div>
                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
                                        title="Quick View">Quick
                                        View</a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="/porto/demo35-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo35-product.html">Trafilati al Bronzo</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span>
                                            <!-- End .ratings -->
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
                                    <a href="/porto/demo35-product.html">
                                        <img src="/porto/assets/images/demoes/demo35/products/product-5.jpg" width="217"
                                            height="217" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-sale">-17%</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="/porto/demo35-product.html"
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
                                            <a href="/porto/demo35-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo35-product.html">Azeite de oliva extra Vergem</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="old-price">$59.00</span>
                                        <span class="product-price">$49.00</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="/porto/demo35-product.html">
                                        <img src="/porto/assets/images/demoes/demo35/products/product-8.jpg" width="217"
                                            height="217" alt="product">
                                    </a>
                                    <div class="label-group">
                                        <div class="product-label label-hot">HOT</div>
                                    </div>
                                    <div class="btn-icon-group">
                                        <a href="/porto/demo35-product.html"
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
                                            <a href="/porto/demo35-shop.html" class="product-category">category</a>
                                        </div>
                                        <a href="/porto/wishlist.html" title="Add to Wishlist" class="btn-icon-wish"><i
                                                class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="/porto/demo35-product.html">Coconut</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:0%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .product-container -->
                                    <div class="price-box">
                                        <span class="product-price">$25.00</span>
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>
                        </div><!-- End .products-slider -->
                    </div>
                </div><!-- End .products-section -->
            </div><!-- End .container -->
@section('footer')
    @include('components.porto.demo35.footer')
@endsection

@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
