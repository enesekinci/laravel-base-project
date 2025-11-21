@extends('layouts.porto')

@section('top-notice')
    @include('pages.top-notice')
@endsection

@section('header')
    @include('pages.header')
@endsection

@section('footer')
    @include('pages.footer')
@endsection

@section('content')
<div class="page-header">
                <div class="container d-flex flex-column align-items-center">
                    <nav aria-label="breadcrumb" class="breadcrumb-nav">
                        <div class="container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('page', ['page' => 'index']) }}">{{ __('Home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ __('Wishlist') }}
                                </li>
                            </ol>
                        </div>
                    </nav>

                    <h1>Wishlist</h1>
                </div>
            </div>

            <div class="container">
                <div class="wishlist-title">
                    <h2 class="p-2">My wishlist on Porto Shop 4</h2>
                </div>
                <div class="wishlist-table-container">
                    <table class="table table-wishlist mb-0">
                        <thead>
                            <tr>
                                <th class="thumbnail-col"></th>
                                <th class="product-col">Product</th>
                                <th class="price-col">Price</th>
                                <th class="status-col">Stock Status</th>
                                <th class="action-col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($wishlistItems ?? [] as $item)
                                <tr class="product-row">
                                    <td>
                                        <figure class="product-image-container">
                                            <a href="{{ $item['url'] ?? '#' }}" class="product-image">
                                                <img src="{{ $item['image'] ?? '/porto/assets/images/products/product-4.jpg' }}" alt="{{ $item['name'] ?? 'product' }}">
                                            </a>

                                            <a href="#" class="btn-remove icon-cancel" title="{{ __('Remove Product') }}"></a>
                                        </figure>
                                    </td>
                                    <td>
                                        <h5 class="product-title">
                                            <a href="{{ $item['url'] ?? '#' }}">{{ $item['name'] ?? '' }}</a>
                                        </h5>
                                        <small class="text-muted">{{ $item['sku'] ?? '' }}</small>
                                    </td>
                                    <td class="price-box">{{ $item['formatted_unit_price'] ?? '$0.00' }}</td>
                                    <td>
                                        <span class="stock-status">{{ __('In stock') }}</span>
                                    </td>
                                    <td class="action">
                                        <a href="{{ $item['url'] ?? '#' }}" class="btn btn-quickview mt-1 mt-md-0"
                                            title="Quick View">Quick
                                            View</a>
                                        <button class="btn btn-dark btn-add-cart product-type-simple btn-shop">
                                            {{ __('Add to Cart') }}
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">{{ __('İstek listenizde ürün yok.') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div><!-- End .cart-table-container -->
            </div><!-- End .container -->
@endsection
