@extends('layouts.porto')

@section('header')
    @include('pages.header')
@endsection

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('page', ['page' => 'index']) }}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('page', ['page' => 'shop']) }}">{{ __('Products') }}</a></li>
            </ol>
        </nav>
        <div class="product-single-container product-single-default" x-data="{
                        quantity: 1,
                        productId: {{ $product['id'] ?? 'null' }},
                        adding: false,
                        added: false,

                        addToCart() {
                            if (!this.productId) return;
                            this.adding = true;

                            fetch('{{ route('cart.add') }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({
                                    product_id: this.productId,
                                    quantity: this.quantity
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                this.adding = false;
                                if (data.success) {
                                    this.added = true;
                                    // Dispatch event to update mini-cart
                                    window.dispatchEvent(new CustomEvent('cart-updated', { detail: data.cart }));
                                    setTimeout(() => this.added = false, 3000);
                                }
                            })
                            .catch(error => {
                                this.adding = false;
                                console.error('Error:', error);
                            });
                        },

                        increaseQty() {
                            this.quantity++;
                        },

                        decreaseQty() {
                            if (this.quantity > 1) this.quantity--;
                        }
                    }">
            <div class="cart-message" x-show="added" style="display: none;">
                <strong class="single-cart-notice">“{{ $product['name'] ?? 'Product' }}”</strong>
                <span>{{ __('sepetinize eklendi.') }}</span>
            </div>

            <div class="row">
                <div class="col-lg-5 col-md-6 product-single-gallery">
                    @if(isset($product) && $product)
                        <div class="product-slider-container">
                            @if(isset($product['old_price']) && $product['old_price'])
                                <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                    <div class="product-label label-sale">
                                        -{{ round((($product['old_price'] - $product['price']) / $product['old_price']) * 100) }}%
                                    </div>
                                </div>
                            @endif

                            @if(isset($product['images']) && count($product['images']) > 0)
                                <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                                    @foreach($product['images'] as $image)
                                        <div class="product-item">
                                            <img class="product-single-image" src="{{ $image['full'] ?? '/porto/assets/images/products/zoom/product-1-big.jpg' }}"
                                                data-zoom-image="{{ $image['full'] ?? '/porto/assets/images/products/zoom/product-1-big.jpg' }}" width="468"
                                                height="468" alt="{{ $product['name'] ?? 'product' }}" />
                                        </div>
                                    @endforeach
                                </div>
                                <!-- End .product-single-carousel -->
                            @endif
                            <span class="prod-full-screen">
                                <i class="icon-plus"></i>
                            </span>
                        </div>

                        @if(isset($product['images']) && count($product['images']) > 0)
                            <div class="prod-thumbnail owl-dots">
                                @foreach($product['images'] as $image)
                                    <div class="owl-dot">
                                        <img src="{{ $image['thumb'] ?? $image['full'] ?? '/porto/assets/images/products/zoom/product-1.jpg' }}" width="110"
                                            height="110" alt="product-thumbnail" />
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @else
                        <p>Ürün bulunamadı.</p>
                    @endif
                </div><!-- End .product-single-gallery -->

                <div class="col-lg-7 col-md-6 product-single-details">
                    @if(isset($product) && $product)
                        <h1 class="product-title">{{ $product['name'] ?? 'Ürün Adı' }}</h1>
                    @else
                        <h1 class="product-title">Ürün Bulunamadı</h1>
                    @endif

                    <div class="product-nav">
                        <div class="product-prev">
                            <a href="#">
                                <span class="product-link"></span>

                                <span class="product-popup">
                                    <span class="box-content">
                                        <img alt="product" width="150" height="150" src="/porto/assets/images/products/product-3.jpg"
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
                                        <img alt="product" width="150" height="150" src="/porto/assets/images/products/product-4.jpg"
                                            style="padding-top: 0px;">

                                        <span>Blue Backpack for the Young</span>
                                    </span>
                                </span>
                            </a>
                        </div>
                    </div>

                    @if(isset($product) && $product)
                        <div class="ratings-container">
                            <div class="product-ratings">
                                <span class="ratings" style="width:{{ ($product['rating'] ?? 0) * 20 }}%"></span><!-- End .ratings -->
                                <span class="tooltiptext tooltip-top"></span>
                            </div><!-- End .product-ratings -->

                            <a href="#" class="rating-link">( 0 Reviews )</a>
                        </div><!-- End .ratings-container -->

                        <hr class="short-divider">

                        <div class="price-box">
                            @if(isset($product['old_price']) && $product['old_price'])
                                <span class="old-price">{{ $product['old_price'] }}</span>
                            @endif
                            <span class="new-price">{{ $product['price'] ?? '$0.00' }}</span>
                        </div><!-- End .price-box -->

                        @if(isset($product['description']) || isset($product['short_description']))
                            <div class="product-desc">
                                <p>
                                    {{ $product['short_description'] ?? $product['description'] ?? '' }}
                                </p>
                            </div><!-- End .product-desc -->
                        @endif

                        <ul class="single-info-list">
                            @if(isset($product['sku']))
                                <li>
                                    SKU:
                                    <strong>{{ $product['sku'] }}</strong>
                                </li>
                            @endif

                            @if(isset($product['tags']) && count($product['tags']) > 0)
                                <li>
                                    TAGs:
                                    @foreach($product['tags'] as $tag)
                                        <strong><a href="{{ route('page', ['page' => 'shop', 'tag' => $tag['slug'] ?? '']) }}"
                                                class="product-category">{{ $tag['name'] ?? '' }}</a></strong>@if(!$loop->last),@endif
                                    @endforeach
                                </li>
                            @endif
                        </ul>
                    @endif

                    <div class="product-filters-container">
                        <div class="product-single-filter"><label class="font2">Color:</label>
                            <ul class="config-size-list config-color-list config-filter-list">
                                <li class=""><a href="javascript:;" class="filter-color border-0" style="background-color: rgb(1, 136, 204);"></a></li>
                                <li class=""><a href="javascript:;" class="filter-color border-0 initial disabled"
                                        style="background-color: rgb(221, 181, 119);"></a></li>
                                <li class=""><a href="javascript:;" class="filter-color border-0" style="background-color: rgb(96, 133, 165);"></a></li>
                            </ul>
                        </div>

                        <div class="product-single-filter">
                            <label class="font2">Size:</label>
                            <ul class="config-size-list">
                                <li class=""><a href="javascript:;" class="d-flex align-items-center justify-content-center">L</a></li>
                                <li class=""><a href="javascript:;" class="d-flex align-items-center justify-content-center">M</a></li>
                                <li class=""><a href="javascript:;" class="d-flex align-items-center justify-content-center">S</a></li>
                            </ul>
                        </div>

                        <div class="product-single-filter">
                            <label></label>
                            <a class="font1 text-uppercase clear-btn" href="#">Clear</a>
                        </div>
                        <!---->
                    </div>

                    <div class="product-action">
                        <div class="price-box product-filtered-price">
                            <del class="old-price"><span>$286.00</span></del>
                            <span class="product-price">$245.00</span>
                        </div>

                        <div class="product-single-qty">
                            <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                <span class="input-group-btn input-group-prepend">
                                    <button class="btn btn-outline btn-down-icon bootstrap-touchspin-down" type="button" @click="decreaseQty"></button>
                                </span>
                                <input class="horizontal-quantity form-control" type="text" x-model="quantity">
                                <span class="input-group-btn input-group-append">
                                    <button class="btn btn-outline btn-up-icon bootstrap-touchspin-up" type="button" @click="increaseQty"></button>
                                </span>
                            </div>
                        </div><!-- End .product-single-qty -->

                        <a href="javascript:;" class="btn btn-dark add-cart mr-2" title="Add to Cart" @click="addToCart" :disabled="adding">
                            <span x-text="adding ? 'Adding...' : 'Add to Cart'"></span>
                        </a>

                        <a href="{{ route('page', ['page' => 'cart']) }}" class="btn btn-gray view-cart" :class="{ 'd-none': !added }">{{ __('View cart') }}</a>
                    </div><!-- End .product-action -->

                    <hr class="divider mb-0 mt-0">

                    <div class="product-single-share mb-2">
                        <label class="sr-only">Share:</label>

                        <div class="social-icons mr-2">
                            <a href="#" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                            <a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                            <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank" title="Linkedin"></a>
                            <a href="#" class="social-icon social-gplus fab fa-google-plus-g" target="_blank" title="Google +"></a>
                            <a href="#" class="social-icon social-mail icon-mail-alt" target="_blank" title="Mail"></a>
                        </div><!-- End .social-icons -->

                        <a href="{{ route('page', ['page' => 'wishlist']) }}" class="btn-icon-wish add-wishlist"
                            title="{{ __('Add to Wishlist') }}"><i class="icon-wishlist-2"></i><span>{{ __('Add to Wishlist') }}</span></a>
                    </div><!-- End .product single-share -->
                </div><!-- End .product-single-details -->
            </div><!-- End .row -->
        </div><!-- End .product-single-container -->

        <div class="product-single-tabs">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab"
                        aria-controls="product-desc-content" aria-selected="true">Description</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="product-tab-size" data-toggle="tab" href="#product-size-content" role="tab"
                        aria-controls="product-size-content" aria-selected="true">Size Guide</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="product-tab-tags" data-toggle="tab" href="#product-tags-content" role="tab"
                        aria-controls="product-tags-content" aria-selected="false">Additional
                        Information</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content" role="tab"
                        aria-controls="product-reviews-content" aria-selected="false">Reviews (1)</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
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
                </div><!-- End .tab-pane -->

                <div class="tab-pane fade" id="product-size-content" role="tabpanel" aria-labelledby="product-tab-size">
                    <div class="product-size-content">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="/porto/assets/images/products/single/body-shape.png" alt="body shape" width="217" height="398">
                            </div><!-- End .col-md-4 -->

                            <div class="col-md-8">
                                <table class="table table-size">
                                    <thead>
                                        <tr>
                                            <th>SIZE</th>
                                            <th>CHEST (in.)</th>
                                            <th>WAIST (in.)</th>
                                            <th>HIPS (in.)</th>
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
                                            <td>XLL</td>
                                            <td>45-48</td>
                                            <td>40-44</td>
                                            <td>47.5-51.5</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- End .row -->
                    </div><!-- End .product-size-content -->
                </div><!-- End .tab-pane -->

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
                </div><!-- End .tab-pane -->

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
                                            <input type="checkbox" class="custom-control-input" id="save-name" />
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
            <h2 class="section-title">Related Products</h2>

            @if(isset($relatedProducts) && count($relatedProducts) > 0)
                <div class="products-slider 5col owl-carousel owl-theme dots-top dots-small">
                    @foreach($relatedProducts as $related)
                        <div class="product-default inner-quickview inner-icon">
                            <figure class="img-effect">
                                <a href="{{ route('page', ['page' => 'product', 'product' => $related['slug'] ?? '']) }}">
                                    <img src="{{ $related['image'] ?? '/porto/assets/images/demoes/demo1/products/product-1.jpg' }}" width="205" height="205"
                                        alt="{{ $related['name'] ?? 'product' }}">
                                    @if(isset($related['image_hover']))
                                        <img src="{{ $related['image_hover'] }}" width="205" height="205" alt="{{ $related['name'] ?? 'product' }}">
                                    @endif
                                </a>
                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i class="icon-shopping-cart"></i></a>
                                </div>
                                <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        @if(isset($related['category']))
                                            <a href="{{ $related['category_url'] ?? '/shop.html' }}"
                                                class="product-category">{{ $related['category'] }}</a>
                                        @endif
                                    </div>
                                    <a href="{{ route('page', ['page' => 'wishlist']) }}" title="{{ __('Wishlist') }}" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a
                                        href="{{ route('page', ['page' => 'product', 'product' => $related['slug'] ?? '']) }}">{{ $related['name'] ?? __('Product Name') }}</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price">{{ $related['price'] ?? '$0.00' }}</span>
                                </div><!-- End .price-box -->
                            </div><!-- End .product-details -->
                        </div>
                    @endforeach
                </div>
                <!-- End .products-slider -->
            @else
                <p>Henüz ilgili ürün bulunmamaktadır.</p>
            @endif
        </div>
        <!-- End .products-section -->

        <hr class="mt-0 m-b-5" />

        <div class="product-widgets-container row pb-2">
            @if(isset($featuredProducts) && count($featuredProducts) > 0)
                <div class="col-lg-3 col-sm-6 pb-5 pb-md-0">
                    <h4 class="section-sub-title">Featured Products</h4>
                    @foreach($featuredProducts as $featured)
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="{{ route('page', ['page' => 'product', 'product' => $featured['slug'] ?? '']) }}">
                                    <img src="{{ $featured['image'] ?? '/porto/assets/images/products/small/product-1.jpg' }}" width="74" height="74"
                                        alt="{{ $featured['name'] ?? 'product' }}">
                                    @if(isset($featured['image_hover']))
                                        <img src="{{ $featured['image_hover'] }}" width="74" height="74" alt="{{ $featured['name'] ?? 'product' }}">
                                    @endif
                                </a>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-title">
                                    <a
                                        href="{{ route('page', ['page' => 'product', 'product' => $featured['slug'] ?? '']) }}">{{ $featured['name'] ?? '' }}</a>
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
                                    <span class="product-price">{{ $featured['price'] ?? '$0.00' }}</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    @endforeach
                </div>
            @endif

            @if(isset($bestSellingProducts) && count($bestSellingProducts) > 0)
                <div class="col-lg-3 col-sm-6 pb-5 pb-md-0">
                    <h4 class="section-sub-title">Best Selling Products</h4>
                    @foreach($bestSellingProducts as $bestSelling)
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="{{ route('page', ['page' => 'product', 'product' => $bestSelling['slug'] ?? '']) }}">
                                    <img src="{{ $bestSelling['image'] ?? '/porto/assets/images/products/small/product-4.jpg' }}" width="74" height="74"
                                        alt="{{ $bestSelling['name'] ?? 'product' }}">
                                    @if(isset($bestSelling['image_hover']))
                                        <img src="{{ $bestSelling['image_hover'] }}" width="74" height="74" alt="{{ $bestSelling['name'] ?? 'product' }}">
                                    @endif
                                </a>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-title">
                                    <a
                                        href="{{ route('page', ['page' => 'product', 'product' => $bestSelling['slug'] ?? '']) }}">{{ $bestSelling['name'] ?? '' }}</a>
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
                                    <span class="product-price">{{ $bestSelling['price'] ?? '$0.00' }}</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    @endforeach
                </div>
            @endif

            @if(isset($latestProducts) && count($latestProducts) > 0)
                <div class="col-lg-3 col-sm-6 pb-5 pb-md-0">
                    <h4 class="section-sub-title">Latest Products</h4>
                    @foreach($latestProducts as $latest)
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="{{ route('page', ['page' => 'product', 'product' => $latest['slug'] ?? '']) }}">
                                    <img src="{{ $latest['image'] ?? '/porto/assets/images/products/small/product-7.jpg' }}" width="74" height="74"
                                        alt="{{ $latest['name'] ?? 'product' }}">
                                    @if(isset($latest['image_hover']))
                                        <img src="{{ $latest['image_hover'] }}" width="74" height="74" alt="{{ $latest['name'] ?? 'product' }}">
                                    @endif
                                </a>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-title">
                                    <a
                                        href="{{ route('page', ['page' => 'product', 'product' => $latest['slug'] ?? '']) }}">{{ $latest['name'] ?? '' }}</a>
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
                                    <span class="product-price">{{ $latest['price'] ?? '$0.00' }}</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    @endforeach
                </div>
            @endif

            @if(isset($topRatedProducts) && count($topRatedProducts) > 0)
                <div class="col-lg-3 col-sm-6 pb-5 pb-md-0">
                    <h4 class="section-sub-title">Top Rated Products</h4>
                    @foreach($topRatedProducts as $topRated)
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="{{ route('page', ['page' => 'product', 'product' => $topRated['slug'] ?? '']) }}">
                                    <img src="{{ $topRated['image'] ?? '/porto/assets/images/products/small/product-10.jpg' }}" width="74" height="74"
                                        alt="{{ $topRated['name'] ?? 'product' }}">
                                    @if(isset($topRated['image_hover']))
                                        <img src="{{ $topRated['image_hover'] }}" width="74" height="74" alt="{{ $topRated['name'] ?? 'product' }}">
                                    @endif
                                </a>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-title">
                                    <a
                                        href="{{ route('page', ['page' => 'product', 'product' => $topRated['slug'] ?? '']) }}">{{ $topRated['name'] ?? '' }}</a>
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
                                    <span class="product-price">{{ $topRated['price'] ?? '$0.00' }}</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        <!-- End .row -->
    </div>
    <!-- End .container -->
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush
