@extends('layouts.store')

@section('title', 'Home')

@push('styles')
    
@endpush

@section('content')
    @include('layouts.store.components.slider')

    <div class="container">
        <div
            class="info-boxes-slider owl-carousel owl-theme mb-2"
            data-owl-options="{
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
				}"
        >
            <div class="info-box info-box-icon-left">
                <i class="icon-shipping"></i>

                <div class="info-box-content">
                    <h4>FREE SHIPPING &amp; RETURN</h4>
                    <p class="text-body">Free shipping on all orders over $99.</p>
                </div>
                <!-- End .info-box-content -->
            </div>
            <!-- End .info-box -->

            <div class="info-box info-box-icon-left">
                <i class="icon-money"></i>

                <div class="info-box-content">
                    <h4>MONEY BACK GUARANTEE</h4>
                    <p class="text-body">100% money back guarantee</p>
                </div>
                <!-- End .info-box-content -->
            </div>
            <!-- End .info-box -->

            <div class="info-box info-box-icon-left">
                <i class="icon-support"></i>

                <div class="info-box-content">
                    <h4>ONLINE SUPPORT 24/7</h4>
                    <p class="text-body">Lorem ipsum dolor sit amet.</p>
                </div>
                <!-- End .info-box-content -->
            </div>
            <!-- End .info-box -->
        </div>
        <!-- End .info-boxes-slider -->

        <div class="banners-container mb-2">
            <div
                class="banners-slider owl-carousel owl-theme"
                data-owl-options="{
						'dots': false
					}"
            >
                <div class="banner banner1 banner-sm-vw d-flex align-items-center appear-animate" style="background-color: #ccc" data-animation-name="fadeInLeftShorter" data-animation-delay="500">
                    <figure class="w-100">
                        <img src="{{ asset('porto/assets/images/demoes/demo4/banners/banner-1.jpg') }}" alt="banner" width="380" height="175" />
                    </figure>
                    <div class="banner-layer">
                        <h3 class="m-b-2">Porto Watches</h3>
                        <h4 class="m-b-3 text-primary">
                            <sup class="text-dark"><del>20%</del></sup>
                            30%
                            <sup>OFF</sup>
                        </h4>
                        <a href="category.html" class="btn btn-sm btn-dark">Shop Now</a>
                    </div>
                </div>
                <!-- End .banner -->

                <div class="banner banner2 banner-sm-vw text-uppercase d-flex align-items-center appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200">
                    <figure class="w-100">
                        <img src="{{ asset('porto/assets/images/demoes/demo4/banners/banner-2.jpg') }}" style="background-color: #ccc" alt="banner" width="380" height="175" />
                    </figure>
                    <div class="banner-layer text-center">
                        <div class="row align-items-lg-center">
                            <div class="col-lg-7 text-lg-right">
                                <h3>Deal Promos</h3>
                                <h4 class="pb-4 pb-lg-0 mb-0 text-body">Starting at $99</h4>
                            </div>
                            <div class="col-lg-5 text-lg-left px-0 px-xl-3">
                                <a href="category.html" class="btn btn-sm btn-dark">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End .banner -->

                <div class="banner banner3 banner-sm-vw d-flex align-items-center appear-animate" style="background-color: #ccc" data-animation-name="fadeInRightShorter" data-animation-delay="500">
                    <figure class="w-100">
                        <img src="{{ asset('porto/assets/images/demoes/demo4/banners/banner-3.jpg') }}" alt="banner" width="380" height="175" />
                    </figure>
                    <div class="banner-layer text-right">
                        <h3 class="m-b-2">Handbags</h3>
                        <h4 class="m-b-2 text-secondary text-uppercase">Starting at $99</h4>
                        <a href="category.html" class="btn btn-sm btn-dark">Shop Now</a>
                    </div>
                </div>
                <!-- End .banner -->
            </div>
        </div>
    </div>
    <!-- End .container -->

    <section class="featured-products-section">
        <div class="container">
            <h2 class="section-title heading-border ls-20 border-0">Featured Products</h2>

            @if($featuredProducts->count() > 0)
                <div
                    class="products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center"
                    data-owl-options="{
						'dots': false,
						'nav': true
					}"
                >
                    @foreach($featuredProducts as $product)
                        <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="#">
                                    @if($product->images->count() > 0)
                                        <img src="{{ asset($product->images->first()->path) }}" width="280" height="280" alt="{{ $product->name }}" />
                                        @if($product->images->count() > 1)
                                            <img src="{{ asset($product->images->skip(1)->first()->path) }}" width="280" height="280" alt="{{ $product->name }}" />
                                        @endif
                                    @else
                                        <img src="{{ asset('porto/assets/images/products/product-1.jpg') }}" width="280" height="280" alt="{{ $product->name }}" />
                                    @endif
                                </a>
                                @if($product->special_price)
                                    <div class="label-group">
                                        <div class="product-label label-sale">
                                            @if($product->special_price_type === 'percent')
                                                -{{ $product->special_price }}%
                                            @else
                                                İndirim
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    @if($product->categories->count() > 0)
                                        <a href="#" class="product-category">{{ $product->categories->first()->name }}</a>
                                    @endif
                                </div>
                                <h3 class="product-title">
                                    <a href="#">{{ $product->name }}</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width: 80%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>
                                <div class="price-box">
                                    @if($product->special_price && $product->getEffectivePrice() < $product->price)
                                        <del class="old-price">{{ number_format($product->price, 2) }} ₺</del>
                                    @endif
                                    <span class="product-price">{{ number_format($product->getEffectivePrice(), 2) }} ₺</span>
                                </div>
                                <div class="product-action">
                                    <a href="#" class="btn-icon-wish" title="wishlist">
                                        <i class="icon-heart"></i>
                                    </a>
                                    <a href="#" class="btn-icon btn-add-cart {{ $product->variants->count() > 0 ? '' : 'product-type-simple' }}">
                                        @if($product->variants->count() > 0)
                                            <i class="fa fa-arrow-right"></i>
                                            <span>SELECT OPTIONS</span>
                                        @else
                                            <i class="icon-shopping-cart"></i>
                                            <span>ADD TO CART</span>
                                        @endif
                                    </a>
                                    <a href="#" class="btn-quickview" title="Quick View">
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center">Henüz öne çıkan ürün bulunmamaktadır.</p>
            @endif
        </div>
    </section>

    <section class="new-products-section">
        <div class="container">
            <h2 class="section-title heading-border ls-20 border-0">New Arrivals</h2>

            @if($newArrivals->count() > 0)
                <div
                    class="products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center mb-2"
                    data-owl-options="{
						'dots': false,
						'nav': true,
						'responsive': {
							'992': {
								'items': 4
							},
							'1200': {
								'items': 5
							}
						}
					}"
                >
                    @foreach($newArrivals as $product)
                        <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="#">
                                    @if($product->images->count() > 0)
                                        <img src="{{ asset($product->images->first()->path) }}" width="220" height="220" alt="{{ $product->name }}" />
                                        @if($product->images->count() > 1)
                                            <img src="{{ asset($product->images->skip(1)->first()->path) }}" width="220" height="220" alt="{{ $product->name }}" />
                                        @endif
                                    @else
                                        <img src="{{ asset('porto/assets/images/products/product-6.jpg') }}" width="220" height="220" alt="{{ $product->name }}" />
                                    @endif
                                </a>
                                @if($product->special_price)
                                    <div class="label-group">
                                        <div class="product-label label-sale">
                                            @if($product->special_price_type === 'percent')
                                                -{{ $product->special_price }}%
                                            @else
                                                İndirim
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    @if($product->categories->count() > 0)
                                        <a href="#" class="product-category">{{ $product->categories->first()->name }}</a>
                                    @endif
                                </div>
                                <h3 class="product-title">
                                    <a href="#">{{ $product->name }}</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width: 80%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>
                                <div class="price-box">
                                    @if($product->special_price && $product->getEffectivePrice() < $product->price)
                                        <del class="old-price">{{ number_format($product->price, 2) }} ₺</del>
                                    @endif
                                    <span class="product-price">{{ number_format($product->getEffectivePrice(), 2) }} ₺</span>
                                </div>
                                <div class="product-action">
                                    <a href="#" class="btn-icon-wish" title="wishlist">
                                        <i class="icon-heart"></i>
                                    </a>
                                    <a href="#" class="btn-icon btn-add-cart {{ $product->variants->count() > 0 ? '' : 'product-type-simple' }}">
                                        @if($product->variants->count() > 0)
                                            <i class="fa fa-arrow-right"></i>
                                            <span>SELECT OPTIONS</span>
                                        @else
                                            <i class="icon-shopping-cart"></i>
                                            <span>ADD TO CART</span>
                                        @endif
                                    </a>
                                    <a href="#" class="btn-quickview" title="Quick View">
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center">Henüz yeni ürün bulunmamaktadır.</p>
            @endif
                <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                    <figure>
                        <a href="product.html">
                            <img src="{{ asset('porto/assets/images/products/product-6.jpg') }}" width="220" height="220" alt="product" />
                            <img src="{{ asset('porto/assets/images/products/product-6-2.jpg') }}" width="220" height="220" alt="product" />
                        </a>
                        <div class="label-group">
                            <div class="product-label label-hot">HOT</div>
                        </div>
                    </figure>
                    <div class="product-details">
                        <div class="category-list">
                            <a href="category.html" class="product-category">Category</a>
                        </div>
                        <h3 class="product-title">
                            <a href="product.html">Men Black Gentle Belt</a>
                        </h3>
                        <div class="ratings-container">
                            <div class="product-ratings">
                                <span class="ratings" style="width: 80%"></span>
                                <!-- End .ratings -->
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <!-- End .product-ratings -->
                        </div>
                        <!-- End .product-container -->
                        <div class="price-box">
                            <del class="old-price">$59.00</del>
                            <span class="product-price">$49.00</span>
                        </div>
                        <!-- End .price-box -->
                        <div class="product-action">
                            <a href="wishlist.html" class="btn-icon-wish" title="wishlist">
                                <i class="icon-heart"></i>
                            </a>
                            <a href="#" class="btn-icon btn-add-cart product-type-simple">
                                <i class="icon-shopping-cart"></i>
                                <span>ADD TO CART</span>
                            </a>
                            <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                        </div>
                    </div>
                    <!-- End .product-details -->
                </div>
                <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                    <figure>
                        <a href="product.html">
                            <img src="{{ asset('porto/assets/images/products/product-7.jpg') }}" width="220" height="220" alt="product" />
                            <img src="{{ asset('porto/assets/images/products/product-7-2.jpg') }}" width="220" height="220" alt="product" />
                        </a>
                        <div class="label-group">
                            <div class="product-label label-hot">HOT</div>
                        </div>
                    </figure>
                    <div class="product-details">
                        <div class="category-list">
                            <a href="category.html" class="product-category">Category</a>
                        </div>
                        <h3 class="product-title">
                            <a href="product.html">Brown-Black Men Casual Glasses</a>
                        </h3>
                        <div class="ratings-container">
                            <div class="product-ratings">
                                <span class="ratings" style="width: 80%"></span>
                                <!-- End .ratings -->
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <!-- End .product-ratings -->
                        </div>
                        <!-- End .product-container -->
                        <div class="price-box">
                            <del class="old-price">$59.00</del>
                            <span class="product-price">$49.00</span>
                        </div>
                        <!-- End .price-box -->
                        <div class="product-action">
                            <a href="wishlist.html" class="btn-icon-wish" title="wishlist">
                                <i class="icon-heart"></i>
                            </a>
                            <a href="#" class="btn-icon btn-add-cart product-type-simple">
                                <i class="icon-shopping-cart"></i>
                                <span>ADD TO CART</span>
                            </a>
                            <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                        </div>
                    </div>
                    <!-- End .product-details -->
                </div>
                <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                    <figure>
                        <a href="product.html">
                            <img src="{{ asset('porto/assets/images/products/product-8.jpg') }}" width="220" height="220" alt="product" />
                            <img src="{{ asset('porto/assets/images/products/product-8-2.jpg') }}" width="220" height="220" alt="product" />
                        </a>
                        <div class="label-group">
                            <div class="product-label label-sale">-20%</div>
                        </div>
                    </figure>
                    <div class="product-details">
                        <div class="category-list">
                            <a href="category.html" class="product-category">Category</a>
                        </div>
                        <h3 class="product-title">
                            <a href="product.html">Brown-Black Men Casual Glasses</a>
                        </h3>
                        <div class="ratings-container">
                            <div class="product-ratings">
                                <span class="ratings" style="width: 80%"></span>
                                <!-- End .ratings -->
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <!-- End .product-ratings -->
                        </div>
                        <!-- End .product-container -->
                        <div class="price-box">
                            <del class="old-price">$59.00</del>
                            <span class="product-price">$49.00</span>
                        </div>
                        <!-- End .price-box -->
                        <div class="product-action">
                            <a href="wishlist.html" class="btn-icon-wish" title="wishlist">
                                <i class="icon-heart"></i>
                            </a>
                            <a href="#" class="btn-icon btn-add-cart product-type-simple">
                                <i class="icon-shopping-cart"></i>
                                <span>ADD TO CART</span>
                            </a>
                            <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                        </div>
                    </div>
                    <!-- End .product-details -->
                </div>
                <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                    <figure>
                        <a href="product.html">
                            <img src="{{ asset('porto/assets/images/products/product-9.jpg') }}" width="220" height="220" alt="product" />
                            <img src="{{ asset('porto/assets/images/products/product-9-2.jpg') }}" width="220" height="220" alt="product" />
                        </a>
                        <div class="label-group">
                            <div class="product-label label-sale">-30%</div>
                        </div>
                    </figure>
                    <div class="product-details">
                        <div class="category-list">
                            <a href="category.html" class="product-category">Category</a>
                        </div>
                        <h3 class="product-title">
                            <a href="product.html">Black Men Casual Glasses</a>
                        </h3>
                        <div class="ratings-container">
                            <div class="product-ratings">
                                <span class="ratings" style="width: 80%"></span>
                                <!-- End .ratings -->
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <!-- End .product-ratings -->
                        </div>
                        <!-- End .product-container -->
                        <div class="price-box">
                            <del class="old-price">$59.00</del>
                            <span class="product-price">$49.00</span>
                        </div>
                        <!-- End .price-box -->
                        <div class="product-action">
                            <a href="wishlist.html" class="btn-icon-wish" title="wishlist">
                                <i class="icon-heart"></i>
                            </a>
                            <a href="product.html" class="btn-icon btn-add-cart">
                                <i class="fa fa-arrow-right"></i>
                                <span>SELECT OPTIONS</span>
                            </a>
                            <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                        </div>
                    </div>
                    <!-- End .product-details -->
                </div>
                <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                    <figure>
                        <a href="product.html">
                            <img src="{{ asset('porto/assets/images/products/product-10.jpg') }}" width="220" height="220" alt="product" />
                            <img src="{{ asset('porto/assets/images/products/product-10-2.jpg') }}" width="220" height="220" alt="product" />
                        </a>
                        <div class="label-group">
                            <div class="product-label label-hot">HOT</div>
                        </div>
                    </figure>
                    <div class="product-details">
                        <div class="category-list">
                            <a href="category.html" class="product-category">Category</a>
                        </div>
                        <h3 class="product-title">
                            <a href="product.html">Basketball Sports Blue Shoes</a>
                        </h3>
                        <div class="ratings-container">
                            <div class="product-ratings">
                                <span class="ratings" style="width: 80%"></span>
                                <!-- End .ratings -->
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <!-- End .product-ratings -->
                        </div>
                        <!-- End .product-container -->
                        <div class="price-box">
                            <del class="old-price">$59.00</del>
                            <span class="product-price">$49.00</span>
                        </div>
                        <!-- End .price-box -->
                        <div class="product-action">
                            <a href="wishlist.html" class="btn-icon-wish" title="wishlist">
                                <i class="icon-heart"></i>
                            </a>
                            <a href="#" class="btn-icon btn-add-cart product-type-simple">
                                <i class="icon-shopping-cart"></i>
                                <span>ADD TO CART</span>
                            </a>
                            <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                        </div>
                    </div>
                    <!-- End .product-details -->
                </div>
                <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                    <figure>
                        <a href="product.html">
                            <img src="{{ asset('porto/assets/images/products/product-11.jpg') }}" width="220" height="220" alt="product" />
                            <img src="{{ asset('porto/assets/images/products/product-11-2.jpg') }}" width="220" height="220" alt="product" />
                        </a>
                        <div class="label-group">
                            <div class="product-label label-sale">-20%</div>
                        </div>
                    </figure>
                    <div class="product-details">
                        <div class="category-list">
                            <a href="category.html" class="product-category">Category</a>
                        </div>
                        <h3 class="product-title">
                            <a href="product.html">Men Sports Travel Bag</a>
                        </h3>
                        <div class="ratings-container">
                            <div class="product-ratings">
                                <span class="ratings" style="width: 80%"></span>
                                <!-- End .ratings -->
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <!-- End .product-ratings -->
                        </div>
                        <!-- End .product-container -->
                        <div class="price-box">
                            <del class="old-price">$59.00</del>
                            <span class="product-price">$49.00</span>
                        </div>
                        <!-- End .price-box -->
                        <div class="product-action">
                            <a href="wishlist.html" class="btn-icon-wish" title="wishlist">
                                <i class="icon-heart"></i>
                            </a>
                            <a href="product.html" class="btn-icon btn-add-cart">
                                <i class="fa fa-arrow-right"></i>
                                <span>SELECT OPTIONS</span>
                            </a>
                            <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                        </div>
                    </div>
                    <!-- End .product-details -->
                </div>
            </div>
            <!-- End .featured-proucts -->

            <div
                class="banner banner-big-sale appear-animate"
                data-animation-delay="200"
                data-animation-name="fadeInUpShorter"
                style="background: #2a95cb center/cover url('{{ asset('porto/assets/images/demoes/demo4/banners/banner-4.jpg') }}')"
            >
                <div class="banner-content row align-items-center mx-0">
                    <div class="col-md-9 col-sm-8">
                        <h2 class="text-white text-uppercase text-center text-sm-left ls-n-20 mb-md-0 px-4">
                            <b class="d-inline-block mr-3 mb-1 mb-md-0">Big Sale</b>
                            All new fashion brands items up to 70% off
                            <small class="text-transform-none align-middle">Online Purchases Only</small>
                        </h2>
                    </div>
                    <div class="col-md-3 col-sm-4 text-center text-sm-right">
                        <a class="btn btn-light btn-white btn-lg" href="category.html">View Sale</a>
                    </div>
                </div>
            </div>

            <h2 class="section-title categories-section-title heading-border border-0 ls-0 appear-animate" data-animation-delay="100" data-animation-name="fadeInUpShorter">Browse Our Categories</h2>

            @if($categories->count() > 0)
                <div class="categories-slider owl-carousel owl-theme show-nav-hover nav-outer">
                    @foreach($categories as $category)
                        <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">
                            <a href="#">
                                <figure>
                                    @if($category->image)
                                        <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" width="220" height="220" />
                                    @else
                                        <img src="{{ asset('porto/assets/images/demoes/demo4/products/categories/category-1.jpg') }}" alt="{{ $category->name }}" width="220" height="220" />
                                    @endif
                                </figure>
                                <div class="category-content">
                                    <h3>{{ $category->name }}</h3>
                                    <span>
                                        <mark class="count">{{ $category->products->count() }}</mark>
                                        products
                                    </span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center">Henüz kategori bulunmamaktadır.</p>
            @endif
        </div>
    </section>

    <section class="feature-boxes-container">
        <div class="container appear-animate" data-animation-name="fadeInUpShorter">
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-box px-sm-5 feature-box-simple text-center">
                        <div class="feature-box-icon">
                            <i class="icon-earphones-alt"></i>
                        </div>

                        <div class="feature-box-content p-0">
                            <h3>Customer Support</h3>
                            <h5>You Won't Be Alone</h5>

                            <p>We really care about you and your website as much as you do. Purchasing Porto or any other theme from us you get 100% free support.</p>
                        </div>
                        <!-- End .feature-box-content -->
                    </div>
                    <!-- End .feature-box -->
                </div>
                <!-- End .col-md-4 -->

                <div class="col-md-4">
                    <div class="feature-box px-sm-5 feature-box-simple text-center">
                        <div class="feature-box-icon">
                            <i class="icon-credit-card"></i>
                        </div>

                        <div class="feature-box-content p-0">
                            <h3>Fully Customizable</h3>
                            <h5>Tons Of Options</h5>

                            <p>With Porto you can customize the layout, colors and styles within only a few minutes. Start creating an amazing website right now!</p>
                        </div>
                        <!-- End .feature-box-content -->
                    </div>
                    <!-- End .feature-box -->
                </div>
                <!-- End .col-md-4 -->

                <div class="col-md-4">
                    <div class="feature-box px-sm-5 feature-box-simple text-center">
                        <div class="feature-box-icon">
                            <i class="icon-action-undo"></i>
                        </div>
                        <div class="feature-box-content p-0">
                            <h3>Powerful Admin</h3>
                            <h5>Made To Help You</h5>

                            <p>Porto has very powerful admin features to help customer to build their own shop in minutes without any special skills in web development.</p>
                        </div>
                        <!-- End .feature-box-content -->
                    </div>
                    <!-- End .feature-box -->
                </div>
                <!-- End .col-md-4 -->
            </div>
            <!-- End .row -->
        </div>
        <!-- End .container-->
    </section>
    <!-- End .feature-boxes-container -->

    <section class="promo-section bg-dark" data-parallax="{'speed': 2, 'enableOnMobile': true}" data-image-src="{{ asset('porto/assets/images/demoes/demo4/banners/banner-5.jpg') }}">
        <div class="promo-banner banner container text-uppercase">
            <div class="banner-content row align-items-center text-center">
                <div class="col-md-4 ml-xl-auto text-md-right appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="600">
                    <h2 class="mb-md-0 text-white">
                        Top Fashion
                        <br />
                        Deals
                    </h2>
                </div>
                <div class="col-md-4 col-xl-3 pb-4 pb-md-0 appear-animate" data-animation-name="fadeIn" data-animation-delay="300">
                    <a href="category.html" class="btn btn-dark btn-black ls-10">View Sale</a>
                </div>
                <div class="col-md-4 mr-xl-auto text-md-left appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="600">
                    <h4 class="mb-1 mt-1 font1 coupon-sale-text p-0 d-block ls-n-10 text-transform-none">
                        <b>Exclusive COUPON</b>
                    </h4>
                    <h5 class="mb-1 coupon-sale-text text-white ls-10 p-0">
                        <i class="ls-0">UP TO</i>
                        <b class="text-white bg-secondary ls-n-10">$100</b>
                        OFF
                    </h5>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-section pb-0">
        <div class="container">
            <h2 class="section-title heading-border border-0 appear-animate" data-animation-name="fadeInUp">Latest News</h2>

            @if($blogPosts->count() > 0)
                <div
                    class="owl-carousel owl-theme appear-animate"
                    data-animation-name="fadeIn"
                    data-owl-options="{
						'loop': false,
						'margin': 20,
						'autoHeight': true,
						'autoplay': false,
						'dots': false,
						'items': 2,
						'responsive': {
							'0': {
								'items': 1
							},
							'480': {
								'items': 2
							},
							'576': {
								'items': 3
							},
							'768': {
								'items': 4
							}
						}
					}"
                >
                    @foreach($blogPosts as $post)
                        <article class="post">
                            <div class="post-media">
                                <a href="#">
                                    @if($post->media)
                                        <img src="{{ $post->media->url }}" alt="{{ $post->title }}" width="225" height="280" />
                                    @else
                                        <img src="{{ asset('porto/assets/images/blog/home/post-1.jpg') }}" alt="{{ $post->title }}" width="225" height="280" />
                                    @endif
                                </a>
                                @if($post->published_at)
                                    <div class="post-date">
                                        <span class="day">{{ $post->published_at->format('d') }}</span>
                                        <span class="month">{{ $post->published_at->format('M') }}</span>
                                    </div>
                                @endif
                            </div>
                            <div class="post-body">
                                <h2 class="post-title">
                                    <a href="#">{{ $post->title }}</a>
                                </h2>
                                <div class="post-content">
                                    <p>{{ Str::limit($post->excerpt ?? $post->content, 100) }}</p>
                                </div>
                                <a href="#" class="post-comment">0 Comments</a>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <p class="text-center">Henüz blog yazısı bulunmamaktadır.</p>
            @endif

            <hr class="mt-0 m-b-5" />

            @if($brands->count() > 0)
                <div
                    class="brands-slider owl-carousel owl-theme images-center appear-animate"
                    data-animation-name="fadeIn"
                    data-animation-duration="500"
                    data-owl-options="{
					'margin': 0}"
                >
                    @foreach($brands as $brand)
                        <img src="{{ $brand->logo ? asset($brand->logo) : asset('porto/assets/images/brands/brand1.png') }}" width="130" height="56" alt="{{ $brand->name }}" />
                    @endforeach
                </div>
            @else
                <p class="text-center">Henüz marka bulunmamaktadır.</p>
            @endif
            <!-- End .brands-slider -->

            <hr class="mt-4 m-b-5" />

            <div class="product-widgets-container row pb-2">
                <div class="col-lg-3 col-sm-6 pb-5 pb-md-0 appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="200">
                    <h4 class="section-sub-title">Featured Products</h4>
                    @foreach($featuredWidgetProducts as $product)
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="#">
                                    @if($product->images->count() > 0)
                                        <img src="{{ asset($product->images->first()->path) }}" width="84" height="84" alt="{{ $product->name }}" />
                                        @if($product->images->count() > 1)
                                            <img src="{{ asset($product->images->skip(1)->first()->path) }}" width="84" height="84" alt="{{ $product->name }}" />
                                        @endif
                                    @else
                                        <img src="{{ asset('porto/assets/images/products/small/product-1.jpg') }}" width="84" height="84" alt="{{ $product->name }}" />
                                    @endif
                                </a>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-title">
                                    <a href="#">{{ $product->name }}</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width: 100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>
                                <div class="price-box">
                                    <span class="product-price">{{ number_format($product->getEffectivePrice(), 2) }} ₺</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-lg-3 col-sm-6 pb-5 pb-md-0 appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="500">
                    <h4 class="section-sub-title">Best Selling Products</h4>
                    @foreach($bestSellingProducts as $product)
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="#">
                                    @if($product->images->count() > 0)
                                        <img src="{{ asset($product->images->first()->path) }}" width="84" height="84" alt="{{ $product->name }}" />
                                        @if($product->images->count() > 1)
                                            <img src="{{ asset($product->images->skip(1)->first()->path) }}" width="84" height="84" alt="{{ $product->name }}" />
                                        @endif
                                    @else
                                        <img src="{{ asset('porto/assets/images/products/small/product-4.jpg') }}" width="84" height="84" alt="{{ $product->name }}" />
                                    @endif
                                </a>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-title">
                                    <a href="#">{{ $product->name }}</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width: 100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>
                                <div class="price-box">
                                    <span class="product-price">{{ number_format($product->getEffectivePrice(), 2) }} ₺</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-lg-3 col-sm-6 pb-5 pb-md-0 appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="800">
                    <h4 class="section-sub-title">Latest Products</h4>
                    @foreach($latestProducts as $product)
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="#">
                                    @if($product->images->count() > 0)
                                        <img src="{{ asset($product->images->first()->path) }}" width="84" height="84" alt="{{ $product->name }}" />
                                        @if($product->images->count() > 1)
                                            <img src="{{ asset($product->images->skip(1)->first()->path) }}" width="84" height="84" alt="{{ $product->name }}" />
                                        @endif
                                    @else
                                        <img src="{{ asset('porto/assets/images/products/small/product-7.jpg') }}" width="84" height="84" alt="{{ $product->name }}" />
                                    @endif
                                </a>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-title">
                                    <a href="#">{{ $product->name }}</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width: 100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>
                                <div class="price-box">
                                    <span class="product-price">{{ number_format($product->getEffectivePrice(), 2) }} ₺</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-lg-3 col-sm-6 pb-5 pb-md-0 appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="1100">
                    <h4 class="section-sub-title">Top Rated Products</h4>
                    @foreach($topRatedProducts as $product)
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="#">
                                    @if($product->images->count() > 0)
                                        <img src="{{ asset($product->images->first()->path) }}" width="84" height="84" alt="{{ $product->name }}" />
                                        @if($product->images->count() > 1)
                                            <img src="{{ asset($product->images->skip(1)->first()->path) }}" width="84" height="84" alt="{{ $product->name }}" />
                                        @endif
                                    @else
                                        <img src="{{ asset('porto/assets/images/products/small/product-10.jpg') }}" width="84" height="84" alt="{{ $product->name }}" />
                                    @endif
                                </a>
                            </figure>
                            <div class="product-details">
                                <h3 class="product-title">
                                    <a href="#">{{ $product->name }}</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width: 100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>
                                <div class="price-box">
                                    <span class="product-price">{{ number_format($product->getEffectivePrice(), 2) }} ₺</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- End .row -->
        </div>
    </section>
@endsection

@push('scripts')
    
@endpush
