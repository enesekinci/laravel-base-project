@extends('layouts.porto')

@section('header')
    @include('components.porto.header')
@endsection

@section('content')
<nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/porto/demo24.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="/porto/demo24-shop.html">Themes</a></li>
                        <li class="breadcrumb-item">
                            <a href="/porto/demo24-shop.html">Themes</a>,
                            <a href="/porto/demo24-shop.html">Wordpress</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Portoblee - Responsive Theme</li>
                    </ol>
                </div>
            </nav>

            <div class="container">
                <div class="product-single-container product-single-default">
                    <div class="cart-message d-none">
                        <strong class="single-cart-notice">“Portoblee &ndash; Responsive Theme”</strong>
                        <span>has been added to your cart.</span>
                    </div>

                    <div class="row">
                        <div class="col-md-7 product-single-gallery">
                            <div class="product-slider-container p-0">
                                <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>

                                    <div class="product-label label-sale">
                                        SALE
                                    </div>
                                </div>

                                <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                                    <div class="product-item">
                                        <img class="product-single-image"
                                            src="/porto/assets/images/demoes/demo24/products/zoom/product-1-big.jpg"
                                            data-zoom-image="/porto/assets/images/demoes/demo24/products/zoom/product-1-big.jpg"
                                            width="468" height="468" alt="product" />
                                    </div>
                                </div>
                                <!-- End .product-single-carousel -->
                                <span class="prod-full-screen">
                                    <i class="icon-plus"></i>
                                </span>
                            </div>
                        </div><!-- End .product-single-gallery -->

                        <div class="col-md-5 product-single-details">
                            <h1 class="product-title mb-1">Portoblee &ndash; Responsive Theme</h1>

                            <div class="product-nav">
                                <div class="product-prev">
                                    <a href="#">
                                        <span class="product-link"></span>

                                        <span class="product-popup">
                                            <span class="box-content">
                                                <img alt="product" width="150" height="150"
                                                    src="/porto/assets/images/demoes/demo24/products/product-3.jpg"
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
                                                    src="/porto/assets/images/demoes/demo24/products/product-4.jpg"
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

                            <div class="price-box">
                                <span class="old-price">$59</span>
                                <span class="new-price">$39</span>
                            </div><!-- End .price-box -->

                            <div class="product-desc">
                                <p>
                                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                    fugiat nulla pariatur reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                    nulla pariat henderit in voluptate velit. non.
                                </p>
                            </div><!-- End .product-desc -->

                            <div class="product-filters-container">
                                <div class="product-single-filter">
                                    <label>License:</label>
                                    <ul class="config-size-list">
                                        <li><a href="javascript:;"
                                                class="d-flex align-items-center justify-content-center">Regular</a>
                                        </li>
                                        <li class=""><a href="javascript:;"
                                                class="d-flex align-items-center justify-content-center">Extended</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="product-filtered-price">
                                    <a href="#read-more" class="license-info text-body" data-toggle="collapse"><i
                                            class="fas fa-exclamation-circle"></i><i>Read More About License</i></a>
                                    <p id="read-more" class="collapse">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                        aliqua.</p>
                                </div>

                                <div class="product-single-filter">
                                    <a class="font1 text-uppercase clear-btn" href="#">Clear</a>
                                </div>
                                <!---->
                            </div>

                            <div class="product-action">
                                <div class="product-single-qty">
                                    <input class="horizontal-quantity form-control" type="text">
                                </div><!-- End .product-single-qty -->

                                <a href="javascript:;" class="btn btn-dark btn-round add-cart mr-2"
                                    title="Add to Cart">Add to
                                    Cart</a>

                                <a href="/porto/cart.html" class="btn btn-gray view-cart d-none">View cart</a>
                            </div><!-- End .product-action -->

                            <hr class="divider mb-0 mt-0">

                            <div class="product-single-share mb-3">
                                <a href="/porto/wishlist.html" class="btn-icon-wish add-wishlist" title="Add to Wishlist"><i
                                        class="icon-wishlist-2"></i><span>Add to
                                        Wishlist</span></a>

                                <label class="sr-only">Share:</label>

                                <div class="social-icons ml-auto">
                                    <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"
                                        title="Facebook"></a>
                                    <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"
                                        title="Twitter"></a>
                                    <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank"
                                        title="Linkedin"></a>
                                </div><!-- End .social-icons -->
                            </div><!-- End .product single-share -->
                        </div><!-- End .product-single-details -->
                    </div><!-- End .row -->
                </div><!-- End .product-single-container -->

                <div class="product-single-tabs mb-2">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="product-tab-desc" data-toggle="tab"
                                href="#product-desc-content" role="tab" aria-controls="product-desc-content"
                                aria-selected="true">Description</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="product-tab-tags" data-toggle="tab" href="#product-tags-content"
                                role="tab" aria-controls="product-tags-content" aria-selected="false">Additional
                                Information</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="product-tab-reviews" data-toggle="tab"
                                href="#product-reviews-content" role="tab" aria-controls="product-reviews-content"
                                aria-selected="false">Reviews (1)</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel"
                            aria-labelledby="product-tab-desc">
                            <div class="product-desc-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostrud ipsum
                                    consectetur sed do, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                    commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
                                <ul>
                                    <li>Any Product types that You want - Simple,
                                        Configurable</li>
                                    <li>Downloadable/Digital Products, Virtual
                                        Products</li>
                                    <li>Inventory Management with Backordered items
                                    </li>
                                </ul>
                                <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                    veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. </p>
                            </div><!-- End .product-desc-content -->
                            <div class="product-action">
                                <a href="/porto/ajax/product-quick-view.html" class="btn btn-round btn-quickview">Preview<i
                                        class="fas fa-external-link-alt"></i></a>
                                <a href="#" class="btn btn-round">Screenshots</a>
                            </div>
                        </div><!-- End .tab-pane -->

                        <div class="tab-pane fade" id="product-tags-content" role="tabpanel"
                            aria-labelledby="product-tab-tags">
                            <table class="table table-striped mt-2">
                                <tbody>
                                    <tr>
                                        <th>Weight</th>
                                        <td>23 kg</td>
                                    </tr>

                                    <tr>
                                        <th>Dimensions</th>
                                        <td>12 × 24 × 35 cm</td>
                                    </tr>

                                    <tr>
                                        <th>Color</th>
                                        <td>Black, Green, Indigo</td>
                                    </tr>

                                    <tr>
                                        <th>Size</th>
                                        <td>Large, Medium, Small</td>
                                    </tr>
                                </tbody>
                            </table>
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
                                                <div class=" custom-control custom-checkbox">
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

                <div class="products-section pt-0 pb-3">
                    <h2 class="section-title text-left ls-n-10 pb-3 m-b-4">Related products</h2>

                    <div class="products-slider owl-carousel owl-theme dots-top dots-small">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo24-product.html">
                                    <img src="/porto/assets/images/demoes/demo24/products/product-6.jpg" width="217"
                                        height="217" alt="product">
                                </a>
                                <div class="label-group">
                                    <div class="product-label label-sale">-10%</div>
                                </div>
                                <div class="btn-icon-group">
                                    <a href="/porto/demo24-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo24-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo24-product.html">Portobe &ndash; Shopify Theme</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="old-price">$99</span>
                                    <span class="product-price">$89</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>

                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo24-product.html">
                                    <img src="/porto/assets/images/demoes/demo24/products/product-5.jpg" width="217"
                                        height="217" alt="product">
                                </a>
                                <div class="label-group">
                                    <div class="product-label label-sale">-10%</div>
                                </div>
                                <div class="btn-icon-group">
                                    <a href="/porto/demo24-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo24-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo24-product.html">PortoHUB &ndash; Magenta Theme</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="old-price">$99</span>
                                    <span class="product-price">$89</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>

                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo24-product.html">
                                    <img src="/porto/assets/images/demoes/demo24/products/product-2.jpg" width="217"
                                        height="217" alt="product">
                                </a>
                                <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                    <div class="product-label label-sale">-50%</div>
                                </div>
                                <div class="btn-icon-group">
                                    <a href="/porto/demo24-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo24-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo24-product.html">Shoport &ndash; eCommerce Theme</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="old-price">$399</span>
                                    <span class="product-price">$198</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>

                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo24-product.html">
                                    <img src="/porto/assets/images/demoes/demo24/products/product-4.jpg" width="217"
                                        height="217" alt="product">
                                </a>
                                <div class="label-group">
                                    <div class="product-label label-sale">-34%</div>
                                </div>
                                <div class="btn-icon-group">
                                    <a href="/porto/demo24-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo24-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo24-product.html">DUBLIN &ndash; HTML Temlate</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="old-price">$29</span>
                                    <span class="product-price">$19</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>

                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo24-product.html">
                                    <img src="/porto/assets/images/demoes/demo24/products/product-3.jpg" width="217"
                                        height="217" alt="product">
                                </a>
                                <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                    <div class="product-label label-sale">-17%</div>
                                </div>
                                <div class="btn-icon-group">
                                    <a href="/porto/demo24-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo24-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo24-product.html">xPorto &ndash; Responsive HTML Template</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="old-price">$59</span>
                                    <span class="product-price">$49</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>

                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="/porto/demo24-product.html">
                                    <img src="/porto/assets/images/demoes/demo24/products/product-7.jpg" width="217"
                                        height="217" alt="product">
                                </a>
                                <div class="label-group">
                                    <div class="product-label label-sale">-17%</div>
                                </div>
                                <div class="btn-icon-group">
                                    <a href="/porto/demo24-product.html" class="btn-icon btn-add-cart"><i
                                            class="fa fa-arrow-right"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo24-shop.html" class="product-category">category</a>
                                    </div>
                                    <a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo24-product.html">OCIRCLY &ndash; HTML Temlate</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="old-price">$59</span>
                                    <span class="product-price">$49</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    </div><!-- End .products-slider -->
                </div><!-- End .products-section -->
            </div>
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
