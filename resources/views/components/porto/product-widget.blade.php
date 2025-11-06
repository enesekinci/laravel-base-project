@props([
    'name',
    'url',
    'image',
    'imageHover' => null,
    'price',
    'rating' => 100,
    'wishlistUrl' => '/porto/wishlist.html',
])

<div class="product-default left-details product-widget">
    <figure>
        <a href="{{ $url }}">
            <img src="{{ $image }}" width="84" height="84" alt="product">
            @if($imageHover)
                <img src="{{ $imageHover }}" width="84" height="84" alt="product">
            @endif
        </a>
    </figure>
    <div class="product-details">
        <h3 class="product-title">
            <a href="{{ $url }}">{{ $name }}</a>
        </h3>
        <div class="ratings-container">
            <div class="product-ratings">
                <span class="ratings" style="width:{{ $rating }}%"></span>
                <!-- End .ratings -->
                <span class="tooltiptext tooltip-top"></span>
            </div>
            <!-- End .product-ratings -->
        </div>
        <!-- End .product-container -->
        <div class="price-box">
            <span class="product-price">{{ $price }}</span>
        </div>
        <!-- End .price-box -->
    </div>
    <!-- End .product-details -->
</div>

