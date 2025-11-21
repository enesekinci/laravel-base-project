@extends('layouts.porto')

@section('header')
    @include('pages.header')
@endsection

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('page', ['page' => 'index']) }}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('page', ['page' => 'shop']) }}">{{ __('Shop') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Products') }}</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-lg-9 mb-1">
                @if(isset($categoryBanners) && $categoryBanners->count() > 0)
                    <div class="home-slider category-home-slider owl-carousel owl-theme owl-carousel-lazy" data-owl-options="{
                                    'nav': false
                                }">
                        @foreach($categoryBanners as $banner)
                            <div class="home-slide home-slide{{ $loop->iteration }} banner banner-md-vw banner-sm-vw d-flex align-items-center">
                                <img class="owl-lazy slide-bg" src="/porto/assets/images/lazy.png"
                                    style="background-color: {{ $banner->background_color ?? '#71b5da' }};"
                                    data-src="{{ $banner->image ?? '/porto/assets/images/demoes/demo1/banners/banner-4.jpg' }}" width="880" height="280"
                                    alt="{{ $banner->title ?? 'category-banner' }}">
                                <div class="banner-layer">
                                    @if($banner->title)
                                        <h4 class="text-white mb-0">{{ $banner->title }}</h4>
                                    @endif
                                    @if($banner->subtitle)
                                        <h2 class="text-white mb-0">{{ $banner->subtitle }}</h2>
                                    @endif
                                    @if($banner->description)
                                        <h3 class="text-white text-uppercase m-b-3">{{ $banner->description }}</h3>
                                    @endif
                                    @if($banner->button_text && $banner->button_url)
                                        <a href="{{ $banner->button_url }}" class="btn btn-dark btn-md">{{ $banner->button_text }}</a>
                                    @endif
                                </div>
                                <!-- End .banner-layer -->
                            </div>
                            <!-- End .home-slide -->
                        @endforeach
                    </div>
                    <!-- End .home-slider -->
                @endif

                <nav class="toolbox sticky-header mt-2" data-sticky-options="{'mobile': true}">
                    <div class="toolbox-left">
                        <a href="#" class="sidebar-toggle"><svg data-name="Layer 3" id="Layer_3" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
                                <line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
                                <line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
                                <line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
                                <line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
                                <line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
                                <path d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                                <path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                                <path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
                                <path d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                            </svg>
                            <span>Filter</span>
                        </a>

                        <div class="toolbox-item toolbox-sort">
                            <label>Sort By:</label>

                            <div class="select-custom">
                                <select name="orderby" class="form-control">
                                    <option value="menu_order" selected="selected">Default sorting</option>
                                    <option value="popularity">Sort by popularity</option>
                                    <option value="rating">Sort by average rating</option>
                                    <option value="date">Sort by newness</option>
                                    <option value="price">Sort by price: low to high</option>
                                    <option value="price-desc">Sort by price: high to low</option>
                                </select>
                            </div>
                            <!-- End .select-custom -->


                        </div>
                        <!-- End .toolbox-item -->
                    </div>
                    <!-- End .toolbox-left -->

                    <div class="toolbox-right">
                        <div class="toolbox-item toolbox-show">
                            <label>Show:</label>

                            <div class="select-custom">
                                <select name="count" class="form-control">
                                    <option value="12">12</option>
                                    <option value="24">24</option>
                                    <option value="36">36</option>
                                </select>
                            </div>
                            <!-- End .select-custom -->
                        </div>
                        <!-- End .toolbox-item -->

                        <div class="toolbox-item layout-modes">
                            <a href="{{ route('page', ['page' => 'shop']) }}" class="layout-btn btn-grid active"
                                title="{{ __('Grid') }}">
                                <i class="icon-mode-grid"></i>
                            </a>
                            <a href="{{ route('page', ['page' => 'shop']) }}" class="layout-btn btn-list" title="{{ __('List') }}">
                                <i class="icon-mode-list"></i>
                            </a>
                        </div>
                        <!-- End .layout-modes -->
                    </div>
                    <!-- End .toolbox-right -->
                </nav>

                <div class="row products-group">
                    @forelse($shopProducts ?? [] as $product)
                        <div class="col-6 col-sm-4 col-md-3" x-data="productCart({{ $product->id }})">
                            <div class="product-default inner-quickview inner-icon">
                                <figure class="img-effect">
                                    <a href="{{ route('page', ['page' => 'product', 'product' => $product->slug]) }}">
                                        @php
                                            $primaryImage = $product->media->first();
                                            $secondaryImage = $product->media->skip(1)->first();
                                        @endphp
                                        <img src="{{ $primaryImage?->path ?? '/porto/assets/images/demoes/demo1/products/product-1.jpg' }}" width="205"
                                            height="205" alt="{{ $product->name }}">
                                        @if($secondaryImage)
                                            <img src="{{ $secondaryImage->path }}" width="205" height="205" alt="{{ $product->name }}">
                                        @endif
                                    </a>
                                    @if($product->is_featured)
                                        <div class="label-group">
                                            <div class="product-label label-hot">HOT</div>
                                        </div>
                                    @endif
                                    <div class="btn-icon-group">
                                        <a href="#" class="btn-icon btn-add-cart product-type-simple" @click.prevent="addToCart" title="Add to Cart">
                                            <i :class="adding ? 'fas fa-spinner fa-spin' : 'icon-shopping-cart'"></i>
                                        </a>
                                    </div>
                                    <a href="#" class="btn-quickview" title="{{ __('Quick View') }}">{{ __('Quick View') }}
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            @if($product->categories->first())
                                                <a href="{{ route('page', ['page' => 'shop', 'category' => $product->categories->first()->slug]) }}"
                                                    class="product-category">{{ $product->categories->first()->name }}</a>
                                            @endif
                                        </div>
                                        <a href="{{ route('page', ['page' => 'wishlist']) }}" title="{{ __('Wishlist') }}"
                                            class="btn-icon-wish"><i class="icon-heart"></i></a>
                                    </div>
                                    <h3 class="product-title">
                                        <a
                                            href="{{ route('page', ['page' => 'product', 'product' => $product->slug]) }}">{{ $product->name }}</a>
                                    </h3>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:{{ ($product->rating ?? 0) * 20 }}%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->

                                    <div class="price-box">
                                        @php
                                            $minPrice = $product->variations->min('price') ?? $product->price ?? 0;
                                            $maxPrice = $product->variations->max('price') ?? $product->price ?? 0;
                                        @endphp
                                        @if($maxPrice > $minPrice)
                                            <span class="old-price">${{ number_format($maxPrice, 2) }}</span>
                                        @endif
                                        <span class="product-price">${{ number_format($minPrice, 2) }}</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                        </div>
                        <!-- End .col-sm-4 -->
                    @empty
                        <div class="col-12">
                            <p class="text-center">Henüz ürün bulunmamaktadır.</p>
                        </div>
                    @endforelse
                </div>
                <!-- End .row -->

                @if(isset($shopProducts) && $shopProducts->hasPages())
                    <nav class="toolbox toolbox-pagination">
                        <div class="toolbox-item toolbox-show mb-0">
                            <label>Show:</label>

                            <div class="select-custom">
                                <select name="count" class="form-control">
                                    <option value="12" {{ request('per_page', 12) == 12 ? 'selected' : '' }}>12</option>
                                    <option value="24" {{ request('per_page', 12) == 24 ? 'selected' : '' }}>24</option>
                                    <option value="36" {{ request('per_page', 12) == 36 ? 'selected' : '' }}>36</option>
                                </select>
                            </div>
                            <!-- End .select-custom -->
                        </div>
                        <!-- End .toolbox-item -->

                        {{ $shopProducts->links('pagination::bootstrap-4') }}
                    </nav>
                @endif
            </div>
            <!-- End .col-lg-9 -->

            <div class="sidebar-overlay"></div>
            <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
                <div class="sidebar-wrapper">
                    <div class="widget">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true"
                                aria-controls="widget-body-2">Categories</a>
                        </h3>

                        <div class="collapse show" id="widget-body-2">
                            <div class="widget-body">
                                @if(isset($shopCategories) && count($shopCategories) > 0)
                                    <ul class="cat-list">
                                        @foreach($shopCategories as $category)
                                            <li>
                                                <a href="{{ route('page', ['page' => 'shop', 'category' => $category['slug'] ?? '']) }}">
                                                    {{ $category['name'] ?? '' }}<span class="products-count">({{ $category['products_count'] ?? 0 }})</span>
                                                </a>
                                                @if(isset($category['children']) && count($category['children']) > 0)
                                                    <ul class="cat-sublist">
                                                        @foreach($category['children'] as $child)
                                                            <li>
                                                                <a href="{{ route('page', ['page' => 'shop', 'category' => $child['slug'] ?? '']) }}">
                                                                    {{ $child['name'] ?? '' }}<span class="products-count">({{ $child['products_count'] ?? 0 }})</span>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>Henüz kategori bulunmamaktadır.</p>
                                @endif
                            </div>
                            <!-- End .widget-body -->
                        </div>
                        <!-- End .collapse -->
                    </div>
                    <!-- End .widget -->

                    <div class="widget">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-body-3" role="button" aria-expanded="true" aria-controls="widget-body-3">Price</a>
                        </h3>

                        <div class="collapse show" id="widget-body-3">
                            <div class="widget-body pb-0">
                                <form action="#">
                                    <div class="price-slider-wrapper">
                                        <div id="price-slider"></div>
                                        <!-- End #price-slider -->
                                    </div>
                                    <!-- End .price-slider-wrapper -->

                                    <div class="filter-price-action d-flex align-items-center justify-content-between flex-wrap">
                                        <div class="filter-price-text">
                                            Price:
                                            <span id="filter-price-range"></span>
                                        </div>
                                        <!-- End .filter-price-text -->

                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                    <!-- End .filter-price-action -->
                                </form>
                            </div>
                            <!-- End .widget-body -->
                        </div>
                        <!-- End .collapse -->
                    </div>
                    <!-- End .widget -->

                    <div class="widget widget-color">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-body-4" role="button" aria-expanded="true" aria-controls="widget-body-4">Color</a>
                        </h3>

                        <div class="collapse show" id="widget-body-4">
                            <div class="widget-body pb-0">
                                @if(isset($shopFilters['colors']))
                                    <ul class="config-swatch-list">
                                        @foreach($shopFilters['colors'] as $color)
                                            <li>
                                                <a href="#" style="background-color: {{ $color['value'] ?? '#000' }};"></a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <!-- End .widget-body -->
                        </div>
                        <!-- End .collapse -->
                    </div>
                    <!-- End .widget -->

                    <div class="widget widget-size">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-body-5" role="button" aria-expanded="true" aria-controls="widget-body-5">Sizes</a>
                        </h3>

                        <div class="collapse show" id="widget-body-5">
                            <div class="widget-body pb-0">
                                @if(isset($shopFilters['sizes']))
                                    <ul class="config-size-list">
                                        @foreach($shopFilters['sizes'] as $size)
                                            <li><a href="#">{{ $size }}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <!-- End .widget-body -->
                        </div>
                        <!-- End .collapse -->
                    </div>
                    <!-- End .widget -->

                    <div class="widget widget-featured">
                        <h3 class="widget-title">Featured</h3>

                        <div class="widget-body">
                            @if(isset($featuredProducts) && count($featuredProducts) > 0)
                                <div class="owl-carousel widget-featured-products">
                                    <div class="featured-col">
                                        @foreach($featuredProducts as $featured)
                                            <div class="product-default left-details product-widget">
                                                <figure>
                                                    <a href="{{ route('page', ['page' => 'product', 'product' => $featured['slug'] ?? '']) }}">
                                                        <img src="{{ $featured['image'] ?? '/porto/assets/images/products/small/product-4.jpg' }}" width="75"
                                                            height="75" alt="{{ $featured['name'] ?? 'product' }}" />
                                                        @if(isset($featured['image_hover']))
                                                            <img src="{{ $featured['image_hover'] }}" width="75" height="75"
                                                                alt="{{ $featured['name'] ?? 'product' }}" />
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
                                    <!-- End .featured-col -->
                                </div>
                                <!-- End .widget-featured-slider -->
                            @else
                                <p>Henüz öne çıkan ürün bulunmamaktadır.</p>
                            @endif
                        </div>
                        <!-- End .widget-body -->
                    </div>
                    <!-- End .widget -->

                    <div class="widget widget-block">
                        <h3 class="widget-title">Custom HTML Block</h3>
                        <h5>This is a custom sub-title.</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi. Etiam non tellus </p>
                    </div>
                    <!-- End .widget -->
                </div>
                <!-- End .sidebar-wrapper -->
            </aside>
            <!-- End .col-lg-3 -->
        </div>
        <!-- End .row -->
    </div>
    <!-- End .container -->

    <div class="mb-4"></div>
    <!-- margin -->
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('productCart', (productId) => ({
                adding: false,

                addToCart() {
                    if (!productId) return;
                    this.adding = true;

                    fetch('{{ route('cart.add') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            product_id: productId,
                            quantity: 1
                        })
                    })
                        .then(response => response.json())
                        .then(data => {
                            this.adding = false;
                            if (data.success) {
                                // Dispatch event to update mini-cart
                                window.dispatchEvent(new CustomEvent('cart-updated', { detail: data.cart }));

                                // Optional: Show toast or notification
                                // alert('Product added to cart!');
                            }
                        })
                        .catch(error => {
                            this.adding = false;
                            console.error('Error:', error);
                        });
                }
            }))
        })
    </script>
@endpush
