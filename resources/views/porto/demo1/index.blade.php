@extends('layouts.porto')


@section('top-notice')
    @include('porto.demo1.top-notice')
@endsection

@section('header')
    @include('porto.demo1.header', [
        'headerMenu' => $headerMenu ?? null,
        'footerMenu' => $footerMenu ?? null,
        'footerSettings' => $footerSettings ?? [],
    ])
@endsection

@section('content')
    <div class="container mb-2">
        <div class="info-boxes-container row row-joined mb-2 font2">
            @forelse($infoBoxes as $box)
            <div class="info-box info-box-icon-left col-lg-4">
                    @if(!empty($box['icon']))
                        <i class="{{ $box['icon'] }}"></i>
                    @endif

                <div class="info-box-content">
                        <h4>{{ strtoupper($box['title'] ?? '') }}</h4>
                        <p class="text-body">{{ $box['description'] ?? '' }}</p>
                </div>
                <!-- End .info-box-content -->
            </div>
            @empty
                <div class="info-box info-box-icon-left col-lg-4">
                    <i class="icon-shipping"></i>
                    <div class="info-box-content">
                        <h4>{{ __('Free Shipping & Return') }}</h4>
                        <p class="text-body">{{ __('Free shipping on all orders over $99') }}</p>
                    </div>
                </div>
            <div class="info-box info-box-icon-left col-lg-4">
                <i class="icon-money"></i>
                <div class="info-box-content">
                        <h4>{{ __('Money Back Guarantee') }}</h4>
                        <p class="text-body">{{ __('100% money back guarantee') }}</p>
                </div>
            </div>
            <div class="info-box info-box-icon-left col-lg-4">
                <i class="icon-support"></i>
                <div class="info-box-content">
                        <h4>{{ __('Online Support 24/7') }}</h4>
                        <p class="text-body">{{ __('Reach out whenever you need help.') }}</p>
                </div>
            </div>
            @endforelse
        </div>

        <div class="row">
            <div class="col-lg-9">
                <div class="home-slider slide-animate owl-carousel owl-theme mb-2" data-owl-options="{
							'loop': false,
							'dots': true,
							'nav': false
						}">
                    @forelse($sliders as $slider)
                        <div class="home-slide banner banner-md-vw banner-sm-vw d-flex align-items-center">
                            <img class="slide-bg"
                                 style="background-color: {{ $slider['background_color'] ?? '#2699D0' }};"
                                 src="{{ $slider['image'] ?? '/porto/assets/images/demoes/demo1/slider/slide-1.png' }}"
                                 width="880"
                                 height="428"
                                 alt="home-slider">
                            <div class="banner-layer appear-animate" data-animation-name="{{ $slider['animation_name'] ?? 'fadeInUpShorter' }}">
                                @if(!empty($slider['subtitle']))
                                    <h4 class="{{ !empty($slider['text_uppercase']) ? 'text-uppercase' : '' }} mb-0">{{ $slider['subtitle'] }}</h4>
                                @endif
                                @if(!empty($slider['heading']))
                                    <h2 class="mb-0">{{ $slider['heading'] }}</h2>
                                @endif
                                @if(!empty($slider['title']))
                                    <h3 class="text-uppercase m-b-3">{{ $slider['title'] }}</h3>
                                @endif
                                @if(!empty($slider['price']))
                                    <h5 class="text-uppercase d-inline-block mb-0 ls-n-20 align-text-bottom">
                                        {{ __('Starting At') }}
                                        <b class="coupon-sale-text bg-secondary text-white d-inline-block">
                                            {{ $slider['price'] }}
                                        </b>
                            </h5>
                                @endif
                                @if(!empty($slider['button_text']))
                                    <a href="{{ $slider['button_url'] ?? route('page', ['page' => 'shop']) }}" class="btn btn-dark btn-md ls-10">
                                        {{ $slider['button_text'] }}
                                    </a>
                                @endif
                        </div>
                        <!-- End .banner-layer -->
                    </div>
                    <!-- End .home-slide -->
                    @empty
                        <div class="home-slide banner banner-md-vw banner-sm-vw d-flex align-items-center">
                            <img class="slide-bg" style="background-color: #2699D0;" src="/porto/assets/images/demoes/demo1/slider/slide-1.png" width="880" height="428" alt="home-slider">
                            <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                                <h4 class="text-white mb-0">{{ __('Find the Boundaries. Push Through!') }}</h4>
                                <h2 class="text-white mb-0">{{ __('Summer Sale') }}</h2>
                                <h3 class="text-white text-uppercase m-b-3">70% Off</h3>
                                <a href="{{ route('page', ['page' => 'shop']) }}" class="btn btn-dark btn-md ls-10">Shop Now!</a>
                        </div>
                    </div>
                    @endforelse
                </div>
                <!-- End .home-slider -->

                <div class="banners-container m-b-2 owl-carousel owl-theme" data-owl-options="{
							'dots': false,
							'margin': 20,
							'loop': false,
							'responsive': {
								'480': {
									'items': 2
								},
								'768': {
									'items': 3
								}
							}
						}">
                    @forelse($banners as $banner)
                        <div class="banner banner-hover-shadow d-flex align-items-center mb-2 w-100 appear-animate" data-animation-name="{{ $banner['animation_name'] ?? 'fadeInUpShorter' }}" data-animation-delay="{{ $banner['animation_delay'] ?? 200 }}">
                        <figure class="w-100">
                                <img src="{{ $banner['image'] ?? '/porto/assets/images/demoes/demo1/banners/banner-1.jpg' }}" style="background-color: {{ $banner['background_color'] ?? '#dadada' }};" alt="{{ $banner['image_alt'] ?? 'banner' }}">
                        </figure>
                            <div class="banner-layer {{ $banner['text_align'] ?? '' }}">
                                @if(!empty($banner['title']))
                                    <h3 class="m-b-2">{{ $banner['title'] }}</h3>
                                @endif
                                @if(!empty($banner['subtitle']))
                                    <h4 class="m-b-4 text-primary">{{ $banner['subtitle'] }}</h4>
                                @endif
                                <a href="{{ $banner['link'] ?? route('page', ['page' => 'shop']) }}" class="text-dark text-uppercase ls-10">{{ __('Shop Now') }}</a>
                        </div>
                    </div>
                    @empty
                        <div class="banner banner-hover-shadow d-flex align-items-center mb-2 w-100 appear-animate">
                        <figure class="w-100">
                                <img src="/porto/assets/images/demoes/demo1/banners/banner-1.jpg" style="background-color: #dadada;" alt="banner">
                        </figure>
                            <div class="banner-layer">
                                <h3 class="m-b-2">Porto Watches</h3>
                                <a href="{{ route('page', ['page' => 'shop']) }}" class="text-dark text-uppercase ls-10">Shop Now</a>
                        </div>
                    </div>
                    @endforelse
                </div>

                <h2 class="section-title ls-n-10 m-b-4 appear-animate" data-animation-name="fadeInUpShorter">
                    Featured Products</h2>

                <div class="products-slider owl-carousel owl-theme dots-top dots-small m-b-1 pb-1 appear-animate" data-animation-name="fadeInUpShorter">
                    @forelse($featuredProducts as $product)
                    <div class="product-default inner-quickview inner-icon">
                        <figure class="img-effect">
                                <a href="{{ $product['url'] ?? route('page', ['page' => 'product']) }}">
                                    <img src="{{ $product['image'] ?? '/porto/assets/images/demoes/demo1/products/product-1.jpg' }}" width="205" height="205" alt="{{ $product['name'] }}">
                                    @if(!empty($product['image_hover']))
                                        <img src="{{ $product['image_hover'] }}" width="205" height="205" alt="{{ $product['name'] }}">
                                    @endif
                                </a>
                            <div class="btn-icon-group">
                                    <a href="{{ $product['url'] ?? '#' }}" class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i></a>
                            </div>
                                <a href="{{ $product['url'] ?? '#' }}" class="btn-quickview" title="Quick View">Quick View</a>
                        </figure>
                        <div class="product-details">
                            <div class="category-wrap">
                                <div class="category-list">
                                        <a href="{{ $product['category_url'] ?? route('page', ['page' => 'shop']) }}" class="product-category">{{ $product['category'] ?? __('Category') }}</a>
                                </div>
                                    <a href="{{ route('page', ['page' => 'wishlist']) }}" title="Add to Wishlist" class="btn-icon-wish"><i class="icon-heart"></i></a>
                            </div>
                                <h3 class="product-title">
                                    <a href="{{ $product['url'] ?? '#' }}">{{ $product['name'] }}</a>
                            </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:100%"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                            </div>
                            <div class="price-box">
                                    <span class="product-price">{{ $product['price'] ?? '$0.00' }}</span>
                            </div>
                        </div>
                    </div>
                    @empty
                        <p class="text-muted mb-0">{{ __('Henüz vitrinde ürün yok.') }}</p>
                    @endforelse
                </div>
                <!-- End .featured-proucts -->

                <div class="brands-slider owl-carousel owl-theme images-center appear-animate" data-animation-name="fadeIn" data-animation-duration="700" data-owl-options="{
                    'margin': 0,
							'responsive': {
								'768': {
									'items': 4
                        },
                        '991': {
									'items': 4
                        },
                        '1200': {
									'items': 5
								}
							}
						}">
                    @forelse($brands as $brand)
                        <img src="{{ $brand['logo'] ?? '/porto/assets/images/brands/small/brand1.png' }}" width="140" height="60" alt="{{ $brand['name'] }}">
                    @empty
                        <img src="/porto/assets/images/brands/small/brand1.png" width="140" height="60" alt="brand">
                    @endforelse
                </div>
                <!-- End .brands-slider -->

                <div class="row products-widgets">
                    <div class="col-sm-6 col-md-4 pb-4 pb-md-0 appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="200">
                        <div class="product-column">
                            <h3 class="section-sub-title ls-n-20">{{ __('Top Rated Products') }}</h3>
                            @forelse($topRatedProducts as $product)
                                <div class="product-default left-details product-widget">
                                    <figure>
                                        <a href="{{ $product['url'] ?? '#' }}">
                                            <img src="{{ $product['image'] ?? '/porto/assets/images/demoes/demo1/products/small/product-4.jpg' }}" width="84" height="84" alt="{{ $product['name'] }}">
                                            @if(!empty($product['image_hover']))
                                                <img src="{{ $product['image_hover'] }}" width="84" height="84" alt="{{ $product['name'] }}">
                                            @endif
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h3 class="product-title"> <a href="{{ $product['url'] ?? '#' }}">{{ $product['name'] }}</a> </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            <span class="product-price">{{ $product['price'] ?? '$0.00' }}</span>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-muted">{{ __('Henüz ürün yok') }}</p>
                            @endforelse
                        </div>
                        <!-- End .product-column -->
                    </div>
                    <!-- End .col-md-4 -->

                    <div class="col-sm-6 col-md-4 pb-4 pb-md-0 appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="500">
                        <div class="product-column">
                            <h3 class="section-sub-title ls-n-20">{{ __('Best Selling Products') }}</h3>
                            @forelse($bestSellingProducts as $product)
                                <div class="product-default left-details product-widget">
                                    <figure>
                                        <a href="{{ $product['url'] ?? '#' }}">
                                            <img src="{{ $product['image'] ?? '/porto/assets/images/demoes/demo1/products/small/product-2.jpg' }}" width="84" height="84" alt="{{ $product['name'] }}">
                                            @if(!empty($product['image_hover']))
                                                <img src="{{ $product['image_hover'] }}" width="84" height="84" alt="{{ $product['name'] }}">
                                            @endif
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h3 class="product-title"> <a href="{{ $product['url'] ?? '#' }}">{{ $product['name'] }}</a></h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            <span class="product-price">{{ $product['price'] ?? '$0.00' }}</span>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-muted">{{ __('Henüz ürün yok') }}</p>
                            @endforelse
                        </div>
                        <!-- End .product-column -->
                    </div>
                    <!-- End .col-md-4 -->

                    <div class="col-sm-6 col-md-4 pb-4 pb-md-0 appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="800">
                        <div class="product-column">
                            <h3 class="section-sub-title ls-n-20">{{ __('Latest Products') }}</h3>
                            @forelse($latestProducts as $product)
                                <div class="product-default left-details product-widget">
                                    <figure>
                                        <a href="{{ $product['url'] ?? '#' }}">
                                            <img src="{{ $product['image'] ?? '/porto/assets/images/demoes/demo1/products/small/product-9.jpg' }}" width="84" height="84" alt="{{ $product['name'] }}">
                                            @if(!empty($product['image_hover']))
                                                <img src="{{ $product['image_hover'] }}" width="84" height="84" alt="{{ $product['name'] }}">
                                            @endif
                                        </a>
                                    </figure>
                                    <div class="product-details">
                                        <h3 class="product-title"> <a href="{{ $product['url'] ?? '#' }}">{{ $product['name'] }}</a> </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:100%"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            <span class="product-price">{{ $product['price'] ?? '$0.00' }}</span>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-muted">{{ __('Henüz ürün yok') }}</p>
                            @endforelse
                        </div>
                        <!-- End .product-column -->
                    </div>
                    <!-- End .col-md-4 -->
                </div>
                <!-- End .row -->

                <hr class="mt-1 mb-3 pb-2">

                <div class="feature-boxes-container">
                    <div class="row">
                        <div class="col-md-4 appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="200">
                            <div class="feature-box  feature-box-simple text-center">
                                <i class="icon-earphones-alt"></i>

                                <div class="feature-box-content p-0">
                                    <h3 class="mb-0 pb-1">Customer Support</h3>
                                    <h5 class="mb-1 pb-1">Need Assistance?</h5>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                                </div>
                                <!-- End .feature-box-content -->
                            </div>
                            <!-- End .feature-box -->
                        </div>
                        <!-- End .col-md-4 -->

                        <div class="col-md-4 appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="400">
                            <div class="feature-box feature-box-simple text-center">
                                <i class="icon-credit-card"></i>

                                <div class="feature-box-content p-0">
                                    <h3 class="mb-0 pb-1">Secured Payment</h3>
                                    <h5 class="mb-1 pb-1">Safe & Fast</h5>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                                </div>
                                <!-- End .feature-box-content -->
                            </div>
                            <!-- End .feature-box -->
                        </div>
                        <!-- End .col-md-4 -->

                        <div class="col-md-4 appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="600">
                            <div class="feature-box feature-box-simple text-center">
                                <i class="icon-action-undo"></i>

                                <div class="feature-box-content p-0">
                                    <h3 class="mb-0 pb-1">Returns</h3>
                                    <h5 class="mb-1 pb-1">Easy & Free</h5>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                                </div>
                                <!-- End .feature-box-content -->
                            </div>
                            <!-- End .feature-box -->
                        </div>
                        <!-- End .col-md-4 -->
                    </div>
                    <!-- End .row -->
                </div>
                <!-- End .feature-boxes-container -->
            </div>
            <!-- End .col-lg-9 -->

            <div class="sidebar-overlay"></div>
            <div class="sidebar-toggle custom-sidebar-toggle"><i class="fas fa-sliders-h"></i></div>
            <aside class="sidebar-home col-lg-3 order-lg-first mobile-sidebar">
                <div class="side-menu-wrapper text-uppercase mb-2 d-none d-lg-block">
                    <h2 class="side-menu-title bg-gray ls-n-25">{{ __('Categories') }}</h2>

                    <nav class="side-nav">
                        <ul class="menu menu-vertical sf-arrows">
                            @if(!empty($sidebarMenu) && is_array($sidebarMenu) && count($sidebarMenu) > 0)
                                {!! render_menu_items($sidebarMenu) !!}
                            @else
                                {{-- Fallback: Varsayılan menü --}}
                                <li class="active">
                                    <a href="{{ route('page', ['page' => 'index']) }}">
                                        <i class="icon-home"></i>{{ __('Home') }}
                                    </a>
                                </li>

                                @if(!empty($categories))
                                <li>
                                    <a href="{{ route('page', ['page' => 'shop']) }}" class="sf-with-ul">
                                        <i class="sicon-badge"></i>{{ __('Categories') }}
                                    </a>
                                    <div class="megamenu megamenu-fixed-width megamenu-3cols">
                                        <div class="row">
                                            @foreach($chunkedCategories as $chunkIndex => $chunk)
                                                @if($chunkIndex < 2)
                                                <div class="col-lg-4">
                                                    @if($chunkIndex === 0)
                                                        <a href="#" class="nolink pl-0">{{ __('Categories') }}</a>
                                                    @endif
                                                    <ul class="submenu">
                                                        @foreach($chunk ?? [] as $category)
                                                        <li>
                                                            <a href="{{ route('page', ['page' => 'shop', 'category' => $category['slug']]) }}">
                                                                {{ $category['name'] }}
                                                                @if(count($category['children']) > 0)
                                                                    <span class="tip tip-new">{{ __('New') }}</span>
                                                                @endif
                                                            </a>
                                                            @if(count($category['children']) > 0)
                                                                <ul>
                                                                    @foreach($category['children'] as $child)
                                                                    <li>
                                                                        <a href="{{ route('page', ['page' => 'shop', 'category' => $child['slug']]) }}">
                                                                            {{ $child['name'] }}
                                                                        </a>
                                                                    </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif
                                            @endforeach
                                            <div class="col-lg-4 p-0">
                                                <div class="menu-banner">
                                                    <figure>
                                                        <img src="/porto/assets/images/menu-banner.jpg" width="192" height="313" alt="{{ __('Menu banner') }}">
                                                    </figure>
                                                    <div class="banner-content">
                                                        <h4>
                                                            <span>{{ __('UP TO') }}</span><br>
                                                            <b>50%</b>
                                                            <i>{{ __('OFF') }}</i>
                                                        </h4>
                                                        <a href="{{ route('page', ['page' => 'shop']) }}" class="btn btn-sm btn-dark">
                                                            {{ __('SHOP NOW') }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endif
                            @endif
                        </ul>
                    </nav>
                </div>
                <!-- End .side-menu-container -->

                <div class="widget widget-banners px-3 pb-3 text-center">
                    <div class="owl-carousel owl-theme dots-small">
                        <div class="banner d-flex flex-column align-items-center">
                            <h3 class="badge-sale bg-primary d-flex flex-column align-items-center justify-content-center text-uppercase">
                                <em>Sale</em>Many Item
                            </h3>

                            <h4 class="sale-text text-uppercase"><small>UP
                                    TO</small>50<sup>%</sup><sub>off</sub></h4>
                            <p>Bags, Clothing, T-Shirts, Shoes, Watches and much more...</p>
                            <a href="{{ route('page', ['page' => 'shop']) }}" class="btn btn-dark btn-md">{{ __('View Sale') }}</a>
                        </div>
                        <!-- End .banner -->

                        <div class="banner banner4">
                            <figure>
                                <img src="/porto/assets/images/demoes/demo1/banners/banner-7.jpg" alt="banner">
                            </figure>

                            <div class="banner-layer">
                                <div class="coupon-sale-content">
                                    <h4>DRONE + CAMERAS</h4>
                                    <h5 class="coupon-sale-text text-gray ls-n-10 p-0 font1"><i>UP
                                            TO</i><b class="text-white bg-dark font1">$100</b> OFF</h5>
                                    <p class="ls-0">Top Brands and Models!</p>
                                    <a href="{{ route('page', ['page' => 'shop']) }}" class="btn btn-inline-block btn-dark btn-black ls-0">{{ __('VIEW SALE') }}</a>
                                </div>
                            </div>
                        </div>
                        <!-- End .banner -->

                        <div class="banner banner5">
                            <h4>HEADPHONES SALE</h4>

                            <figure class="m-b-3">
                                <img src="/porto/assets/images/demoes/demo1/banners/banner-8.jpg" alt="banner">
                            </figure>

                            <div class="banner-layer">
                                <div class="coupon-sale-content">
                                    <h5 class="coupon-sale-text ls-n-10 p-0 font1"><i>UP
                                            TO</i><b class="text-white bg-secondary font1">50%</b> OFF</h5>
                                    <a href="{{ route('page', ['page' => 'shop']) }}" class="btn btn-inline-block btn-dark btn-black ls-0">{{ __('VIEW SALE') }}</a>
                                </div>
                            </div>
                        </div>
                        <!-- End .banner -->
                    </div>
                    <!-- End .banner-slider -->
                </div>
                <!-- End .widget -->

                <div class="widget widget-newsletters bg-gray text-center">
                    <h3 class="widget-title text-uppercase m-b-3">Subscribe Newsletter</h3>
                    <p class="mb-2">Get all the latest information on Events, Sales and Offers. </p>
                    <form action="#">
                        <div class="form-group position-relative sicon-envolope-letter">
                            <input type="email" class="form-control" name="newsletter-email" placeholder="Email address">
                        </div>
                        <!-- Endd .form-group -->
                        <input type="submit" class="btn btn-primary btn-md" value="Subscribe">
                    </form>
                </div>
                <!-- End .widget -->

                <div class="widget widget-testimonials">
                    <div class="owl-carousel owl-theme dots-left dots-small">
                        <div class="testimonial">
                            <div class="testimonial-owner">
                                <figure>
                                    <img src="/porto/assets/images/clients/client-1.jpg" alt="client">
                                </figure>

                                <div>
                                    <h4 class="testimonial-title">john Smith</h4>
                                    <span>CEO &amp; Founder</span>
                                </div>
                            </div>
                            <!-- End .testimonial-owner -->

                            <blockquote class="ml-4 pr-0">
                                <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mi.
                                </p>
                            </blockquote>
                        </div>
                        <!-- End .testimonial -->

                        <div class="testimonial">
                            <div class="testimonial-owner">
                                <figure>
                                    <img src="/porto/assets/images/clients/client-2.jpg" alt="client">
                                </figure>

                                <div>
                                    <h4 class="testimonial-title">Dae Smith</h4>
                                    <span>CEO &amp; Founder</span>
                                </div>
                            </div>
                            <!-- End .testimonial-owner -->

                            <blockquote class="ml-4 pr-0">
                                <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mi.
                                </p>
                            </blockquote>
                        </div>
                        <!-- End .testimonial -->

                        <div class="testimonial">
                            <div class="testimonial-owner">
                                <figure>
                                    <img src="/porto/assets/images/clients/client-3.jpg" alt="client">
                                </figure>

                                <div>
                                    <h4 class="testimonial-title">John Doe</h4>
                                    <span>CEO &amp; Founder</span>
                                </div>
                            </div>
                            <!-- End .testimonial-owner -->

                            <blockquote class="ml-4 pr-0">
                                <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mi.
                                </p>
                            </blockquote>
                        </div>
                        <!-- End .testimonial -->
                    </div>
                    <!-- End .testimonials-slider -->
                </div>
                <!-- End .widget -->

                <div class="widget widget-posts post-date-in-media media-with-zoom mb-0 mb-lg-2 pb-lg-2">
                    @if(isset($blogPosts) && count($blogPosts) > 0)
                    <div class="owl-carousel owl-theme dots-left dots-m-0 dots-small" data-owl-options="
                        { 'margin' : 20,
                          'loop': false }">
                        @foreach($blogPosts as $post)
                        <article class="post">
                            <div class="post-media">
                                <a href="{{ route('page', ['page' => 'single', 'post' => $post['slug']]) }}">
                                    <img src="{{ $post['featured_image'] ?? '/porto/assets/images/blog/home/post-1.jpg' }}" data-zoom-image="{{ $post['featured_image'] ?? '/porto/assets/images/blog/home/post-1.jpg' }}" width="280" height="209" alt="{{ $post['title'] }}">
                                </a>
                                @if($post['published_at'])
                                <div class="post-date">
                                    <span class="day">{{ $post['day'] ?? '29' }}</span>
                                    <span class="month">{{ $post['month'] ?? 'Jun' }}</span>
                                </div>
                                <!-- End .post-date -->
                                @endif

                                <span class="prod-full-screen">
                                    <i class="fas fa-search"></i>
                                </span>
                            </div>
                            <!-- End .post-media -->

                            <div class="post-body">
                                <h2 class="post-title">
                                    <a href="{{ route('page', ['page' => 'single', 'post' => $post['slug']]) }}">{{ $post['title'] }}</a>
                                </h2>

                                <div class="post-content">
                                    <p>{{ Str::limit($post['excerpt'] ?? '', 100) }}...</p>

                                    <a href="{{ route('page', ['page' => 'single', 'post' => $post['slug']]) }}" class="read-more">{{ __('read more') }} <i
                                            class="icon-right-open"></i></a>
                                </div>
                                <!-- End .post-content -->
                            </div>
                            <!-- End .post-body -->
                        </article>
                        @endforeach
                    </div>
                    <!-- End .posts-slider -->
                    @else
                    <p class="text-muted">{{ __('Blog posts will appear here once you publish content from the admin panel.') }}</p>
                    @endif
                </div>
                <!-- End .widget -->
            </aside>
            <!-- End .col-lg-3 -->
        </div>
        <!-- End .row -->
    </div>
    <!-- End .container -->
@endsection

@section('footer')
    @include('porto.demo1.footer', [
        'footerMenu' => $footerMenu ?? null,
        'footerSettings' => $footerSettings ?? [],
    ])
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
