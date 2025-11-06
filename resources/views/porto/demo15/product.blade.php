@extends('layouts.porto')

@section('header')
    @include('components.porto.demo15.header')
@endsection

@section('footer')
    @include('components.porto.demo15.footer')
@endsection

@section('content')
<div class="container">
                <nav aria-label="breadcrumb" class="breadcrumb-nav">
                    <ol class="breadcrumb no-gap">
                        <li class="breadcrumb-item">
                            <a href="/porto/demo15.html">
                                <i class="icon-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">shop</li>
                        <li class="breadcrumb-item" aria-current="page">shoes, toys</li>
                        <li class="breadcrumb-item active" aria-current="page">men shoes black</li>
                    </ol>
                </nav>

                <div class="product-single-container product-single-default">
                    <div class="cart-message d-none">
                        <strong class="single-cart-notice">“Men Shoes Black”</strong>
                        <span>has been added to your cart.</span>
                    </div>

                    <div class="row">
                        <div class="col-lg-5 col-md-6 product-single-gallery">
                            <div class="product-slider-container">
                                <div class="label-group">
                                    <div class="product-label label-sale">
                                        -13%
                                    </div>
                                </div>

                                <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                                    <div class="product-item">
                                        <img class="product-single-image" src="/porto/assets/images/demoes/demo15/products/zoom/shoes-1.jpg" data-zoom-image="/porto/assets/images/demoes/demo15/products/zoom/shoes-1.jpg" width="468" height="468" alt="product" />
                                    </div>
                                    <div class="product-item">
                                        <img class="product-single-image" src="/porto/assets/images/demoes/demo15/products/zoom/shoes-2.jpg" data-zoom-image="/porto/assets/images/demoes/demo15/products/zoom/shoes-2.jpg" width="468" height="468" alt="product" />
                                    </div>
                                    <div class="product-item">
                                        <img class="product-single-image" src="/porto/assets/images/demoes/demo15/products/zoom/shoes-3.jpg" data-zoom-image="/porto/assets/images/demoes/demo15/products/zoom/shoes-3.jpg" width="468" height="468" alt="product" />
                                    </div>
                                    <div class="product-item">
                                        <img class="product-single-image" src="/porto/assets/images/demoes/demo15/products/zoom/shoes-4.jpg" data-zoom-image="/porto/assets/images/demoes/demo15/products/zoom/shoes-4.jpg" width="468" height="468" alt="product" />
                                    </div>
                                </div>
                                <!-- End .product-single-carousel -->
                                <span class="prod-full-screen">
                                    <i class="icon-plus"></i>
                                </span>
                            </div>

                            <div class="prod-thumbnail owl-dots">
                                <div class="owl-dot">
                                    <img src="/porto/assets/images/demoes/demo15/products/dot-1.jpg" width="110" height="110" alt="product-thumbnail" />
                                </div>
                                <div class="owl-dot">
                                    <img src="/porto/assets/images/demoes/demo15/products/dot-2.jpg" width="110" height="110" alt="product-thumbnail" />
                                </div>
                                <div class="owl-dot">
                                    <img src="/porto/assets/images/demoes/demo15/products/dot-3.jpg" width="110" height="110" alt="product-thumbnail" />
                                </div>
                                <div class="owl-dot">
                                    <img src="/porto/assets/images/demoes/demo15/products/dot-4.jpg" width="110" height="110" alt="product-thumbnail" />
                                </div>
                            </div>
                        </div>
                        <!-- End .product-single-gallery -->

                        <div class="col-lg-7 col-md-6 product-single-details">
                            <h1 class="product-title">Men Shoes Black</h1>
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
                                    <span class="ratings" style="width:0%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <!-- End .product-ratings -->

                                <a href="#" class="rating-link">( There are no reviews yet. )</a>
                            </div>
                            <!-- End .ratings-container -->

                            <hr class="short-divider">

                            <div class="price-box">
                                <del class="old-price">$299.00</del>
                                <span class="product-price">$259.00</span>
                            </div>
                            <!-- End .price-box -->

                            <div class="product-desc">
                                <p>
                                    Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris
                                    placerat eleifend leo.
                                </p>
                            </div>
                            <!-- End .product-desc -->

                            <div class="product-action">
                                <div class="product-single-qty">
                                    <input class="horizontal-quantity form-control" type="text">
                                </div>
                                <!-- End .product-single-qty -->

                                <a href="javascript:;" class="btn btn-dark add-cart mr-2" title="Add to Cart">Add to
                                    Cart
                                </a>

                                <a href="/porto/cart.html" class="btn btn-gray view-cart d-none">View cart</a>
                            </div>
                            <!-- End .product-action -->

                            <hr class="divider mb-0 mt-0">

                            <div class="product-single-share mb-3">
                                <label class="sr-only">Share:</label>

                                <div class="social-icons mr-2">
                                    <a href="#" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                                    <a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                                    <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank" title="Linkedin"></a>
                                    <a href="#" class="social-icon social-gplus fab fa-google-plus-g" target="_blank" title="Google +"></a>
                                    <a href="#" class="social-icon social-mail icon-mail-alt" target="_blank" title="Mail"></a>
                                </div>
                                <!-- End .social-icons -->

                                <a href="/porto/wishlist.html" class="btn-icon-wish add-wishlist" title="Add to Wishlist">
                                    <i class="icon-heart"></i>
                                    <span>Add to Wishlist
                                    </span>
                                </a>
                            </div>
                            <!-- End .product single-share -->
                        </div>
                        <!-- End .product-single-details -->
                    </div>
                    <!-- End .row -->
                </div>
                <!-- End .product-single-container -->

                <div class="product-single-tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="product-tab-size" data-toggle="tab" href="#product-size-content" role="tab" aria-controls="product-size-content" aria-selected="true">Size Guide</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="product-tab-tags" data-toggle="tab" href="#product-tags-content" role="tab" aria-controls="product-tags-content" aria-selected="false">Additional
                                Information
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content" role="tab" aria-controls="product-reviews-content" aria-selected="false">Reviews (0)</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
                            <div class="product-desc-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostrud ipsum consectetur sed do, quis nostrud exercitation ullamco laboris
                                    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.
                                </p>
                                <ul>
                                    <li>Any Product types that You want – Simple, Configurable
                                    </li>
                                    <li>Downloadable/Digital Products, Virtual Products
                                    </li>
                                    <li>Inventory Management with Backordered items
                                    </li>
                                </ul>
                                <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                            </div>
                            <!-- End .product-desc-content -->
                        </div>
                        <!-- End .tab-pane -->

                        <div class="tab-pane fade" id="product-size-content" role="tabpanel" aria-labelledby="product-tab-size">
                            <div class="product-size-content">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="/porto/assets/images/products/single/body-shape.png" alt="body shape" width="217" height="398">
                                    </div>
                                    <!-- End .col-md-4 -->

                                    <div class="col-md-8">
                                        <table class="table table-size">
                                            <thead>
                                                <tr>
                                                    <th>SIZE</th>
                                                    <th>CHEST(in.)</th>
                                                    <th>WAIST(in.)</th>
                                                    <th>HIPS(in.)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>XS</td>
                                                    <td>34-36</td>
                                                    <td>27-29</td>
                                                    <td>34.5-36.5</td>
                                                </tr>
                                                <tr>
                                                    <td>S</td>
                                                    <td>36-38</td>
                                                    <td>29-31</td>
                                                    <td>36.5-38.5</td>
                                                </tr>
                                                <tr>
                                                    <td>M</td>
                                                    <td>38-40</td>
                                                    <td>31-33</td>
                                                    <td>38.5-40.5</td>
                                                </tr>
                                                <tr>
                                                    <td>L</td>
                                                    <td>40-42</td>
                                                    <td>33-36</td>
                                                    <td>40.5-43.5</td>
                                                </tr>
                                                <tr>
                                                    <td>XL</td>
                                                    <td>42-45</td>
                                                    <td>36-40</td>
                                                    <td>43.5-47.5</td>
                                                </tr>
                                                <tr>
                                                    <td>XXL</td>
                                                    <td>45-48</td>
                                                    <td>40-44</td>
                                                    <td>47.5-51.5</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- End .row -->
                            </div>
                            <!-- End .product-size-content -->
                        </div>
                        <!-- End .tab-pane -->

                        <div class="tab-pane fade" id="product-tags-content" role="tabpanel" aria-labelledby="product-tab-tags">
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
                        </div>
                        <!-- End .tab-pane -->

                        <div class="tab-pane fade" id="product-reviews-content" role="tabpanel" aria-labelledby="product-tab-reviews">
                            <div class="product-reviews-content">
                                <h3 class="reviews-title">1 review for Men Black Sports Shoes</h3>

                                <div class="comment-list">
                                    <div class="comments">
                                        <figure class="img-thumbnail">
                                            <img src="/porto/assets/images/blog/author.jpg" alt="author" width="80" height="80">
                                        </figure>

                                        <div class="comment-block">
                                            <div class="comment-header">
                                                <div class="comment-arrow"></div>

                                                <div class="ratings-container float-sm-right">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:60%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
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
                                            <label for="rating">Your rating
                                                <span class="required">*</span>
                                            </label>
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
                                            <label>Your review
                                                <span class="required">*</span>
                                            </label>
                                            <textarea cols="5" rows="6" class="form-control form-control-sm"></textarea>
                                        </div>
                                        <!-- End .form-group -->


                                        <div class="row">
                                            <div class="col-md-6 col-xl-12">
                                                <div class="form-group">
                                                    <label>Name
                                                        <span class="required">*</span>
                                                    </label>
                                                    <input type="text" class="form-control form-control-sm" required>
                                                </div>
                                                <!-- End .form-group -->
                                            </div>

                                            <div class="col-md-6 col-xl-12">
                                                <div class="form-group">
                                                    <label>Email
                                                        <span class="required">*</span>
                                                    </label>
                                                    <input type="text" class="form-control form-control-sm" required>
                                                </div>
                                                <!-- End .form-group -->
                                            </div>

                                            <div class="col-md-6 col-xl-12">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="save-name" />
                                                    <label class="custom-control-label mb-0" for="save-name">Save my
                                                        name, email, and website in this browser for the next time I
                                                        comment.
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="submit" class="btn btn-primary" value="Submit">
                                    </form>
                                </div>
                                <!-- End .add-product-review -->
                            </div>
                            <!-- End .product-reviews-content -->
                        </div>
                        <!-- End .tab-pane -->
                    </div>
                    <!-- End .tab-content -->
                </div>
                <!-- End .product-single-tabs -->

                <div class="products-section with-border pt-0">
                    <h2 class="section-title">Related Products</h2>

                    <div class="products-slider owl-carousel owl-theme dots-top dots-small">
                        <!-- product 1 -->
                        <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="/porto/demo15-product.html">
                                    <img src="/porto/assets/images/demoes/demo15/products/product-6.jpg" alt="product" width="400" height="400" />
                                </a>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal">
                                        <i class="icon-shopping-cart"></i>
                                    </button>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo15-shop.html" class="product-category">Headphone</a>,
                                        <a href="/porto/demo15-shop.html" class="product-category">T-shirts</a>
                                    </div>
                                    <a href="#" class="btn-icon-wish">
                                        <i class="icon-heart"></i>
                                    </a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo15-product.html">Jeans Wear</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$108.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <!-- product 2 -->
                        <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="/porto/demo15-product.html">
                                    <img src="/porto/assets/images/demoes/demo15/products/product-2.jpg" alt="product" width="400" height="400" />
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-sale">-30%</span>
                                </div>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal">
                                        <i class="icon-shopping-cart"></i>
                                    </button>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo15-shop.html" class="product-category">dress</a>,
                                        <a href="/porto/demo15-shop.html" class="product-category">toys</a>
                                    </div>
                                    <a href="#" class="btn-icon-wish">
                                        <i class="icon-heart"></i>
                                    </a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo15-product.html">Woman Black Blouse</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$129.00 – $185.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <!-- product 3 -->
                        <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="/porto/demo15-product.html">
                                    <img src="/porto/assets/images/demoes/demo15/products/product-5.jpg" alt="product" width="400" height="400" />
                                </a>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal">
                                        <i class="icon-shopping-cart"></i>
                                    </button>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo15-shop.html" class="product-category">caps</a>,
                                        <a href="/porto/demo15-shop.html" class="product-category">T-shirts</a>
                                    </div>
                                    <a href="#" class="btn-icon-wish">
                                        <i class="icon-heart"></i>
                                    </a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo15-product.html">White Cap</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$88.00 – $108.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <!-- product 4 -->
                        <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="/porto/demo15-product.html">
                                    <img src="/porto/assets/images/demoes/demo15/products/product-4.jpg" alt="product" width="400" height="400" />
                                </a>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal">
                                        <i class="icon-shopping-cart"></i>
                                    </button>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo15-shop.html" class="product-category">Dress</a>,
                                        <a href="/porto/demo15-shop.html" class="product-category">T-shirts</a>
                                    </div>
                                    <a href="#" class="btn-icon-wish">
                                        <i class="icon-heart"></i>
                                    </a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo15-product.html">Woman Jacket</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$199.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <!-- product 5 -->
                        <div class="product-default inner-quickview inner-icon appear-animate" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="/porto/demo15-product.html">
                                    <img src="/porto/assets/images/demoes/demo15/products/product-3.jpg" alt="product" width="400" height="400" />
                                </a>
                                <div class="label-group">
                                    <span class="product-label label-sale">-13%</span>
                                </div>
                                <div class="btn-icon-group">
                                    <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal">
                                        <i class="icon-shopping-cart"></i>
                                    </button>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                    View
                                </a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="/porto/demo15-shop.html" class="product-category">Dress</a>,
                                        <a href="/porto/demo15-shop.html" class="product-category">Trousers</a>
                                    </div>
                                    <a href="#" class="btn-icon-wish">
                                        <i class="icon-heart"></i>
                                    </a>
                                </div>
                                <h3 class="product-title">
                                    <a href="/porto/demo15-product.html">Porto Sticky info</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$399.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>
                </div>

                <div class="product-widgets-container row pb-2">
                    <div class="col-lg-3 col-sm-6 pb-5">
                        <h4 class="section-sub-title text-uppercase">FEATURED PRODUCTS</h4>
                        <!-- product-1 -->
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo15-product.html">
                                    <img src="/porto/assets/images/demoes/demo15/products/product-2.jpg" width="75" height="75" alt="product">
                                </a>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-title">
                                    <a href="/porto/demo15-product.html">Woman Black Blouse</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$129.00 – $185.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <!-- product-2 -->
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo15-product.html">
                                    <img src="/porto/assets/images/demoes/demo15/products/product-6.jpg" width="75" height="75" alt="product">
                                </a>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-title">
                                    <a href="/porto/demo15-product.html">Jeans Wear</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$108.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <!-- product-3 -->
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo15-product.html">
                                    <img src="/porto/assets/images/demoes/demo15/products/product-3.jpg" width="75" height="75" alt="product">
                                </a>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-title">
                                    <a href="/porto/demo15-product.html">Porto Sticky info</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$399.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 pb-5">
                        <h4 class="section-sub-title text-uppercase">BEST SELLING PRODUCTS</h4>
                        <!-- product-1 -->
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo15-product.html">
                                    <img src="/porto/assets/images/demoes/demo15/products/product-3.jpg" width="75" height="75" alt="product">
                                </a>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-title">
                                    <a href="/porto/demo15-product.html">Porto Both Sticky Info</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$399.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <!-- product-2 -->
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo15-product.html">
                                    <img src="/porto/assets/images/demoes/demo15/products/product-4.jpg" width="75" height="75" alt="product">
                                </a>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-title">
                                    <a href="/porto/demo15-product.html">Woman jacket</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$199.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <!-- product-3 -->
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo15-product.html">
                                    <img src="/porto/assets/images/demoes/demo15/products/dot-3.jpg" width="75" height="75" alt="product">
                                </a>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-title">
                                    <a href="/porto/demo15-product.html">Gentle Shoes</a>
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
                                    <span class="product-price">$299.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 pb-5">
                        <h4 class="section-sub-title text-uppercase">LATEST PRODUCTS</h4>
                        <!-- product-1 -->
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo15-product.html">
                                    <img src="/porto/assets/images/demoes/demo15/products/product-1.jpg" width="75" height="75" alt="product">
                                </a>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-title">
                                    <a href="/porto/demo15-product.html">Woman Red Bag</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$29.00 – $39.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <!-- product-2 -->
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo15-product.html">
                                    <img src="/porto/assets/images/demoes/demo15/products/product-9.jpg" width="75" height="75" alt="product">
                                </a>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-title">
                                    <a href="/porto/demo15-product.html">Woman Black Blouse</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$129.00 – $185.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <!-- product-3 -->
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo15-product.html">
                                    <img src="/porto/assets/images/demoes/demo15/products/product-5.jpg" width="75" height="75" alt="product">
                                </a>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-title">
                                    <a href="/porto/demo15-product.html">White Cap</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$88.00 – $108.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 pb-5">
                        <h4 class="section-sub-title text-uppercase">TOP RATED PRODUCTS</h4>
                        <!-- product-1 -->
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo15-product.html">
                                    <img src="/porto/assets/images/demoes/demo15/products/product-3.jpg" width="75" height="75" alt="product">
                                </a>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-title">
                                    <a href="/porto/demo15-product.html">Porto Sticky Info</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$399.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <!-- product-2 -->
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo15-product.html">
                                    <img src="/porto/assets/images/demoes/demo15/products/product-4.jpg" width="75" height="75" alt="product">
                                </a>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-title">
                                    <a href="/porto/demo15-product.html">Woman jacket</a>
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
                                    <span class="product-price">$199.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                        <!-- product-3 -->
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="/porto/demo15-product.html">
                                    <img src="/porto/assets/images/demoes/demo15/products/dot-3.jpg" width="75" height="75" alt="product">
                                </a>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-title">
                                    <a href="/porto/demo15-product.html">Gentle Shoes</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:0%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">$299.00</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>
                </div>
            </div>
@section('footer')
    @include('components.porto.demo15.footer')
@endsection

@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
