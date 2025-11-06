@props([
    'name',
    'url',
    'image',
    'imageHover' => null,
    'price',
    'category' => null,
    'categoryUrl' => null,
    'labels' => [],
    'showQuickView' => true,
    'showCountdown' => false,
    'countdownUntil' => null,
    'rating' => 100,
    'wishlistUrl' => '/porto/wishlist.html',
    'addToCartUrl' => null,
    'addToCartType' => 'simple',
])

<div class="product-default inner-quickview inner-icon">
    <figure class="img-effect">
        <a href="{{ $url }}">
            <img src="{{ $image }}" width="205" height="205" alt="product">
            @if($imageHover)
                <img src="{{ $imageHover }}" width="205" height="205" alt="product">
            @endif
        </a>
        
        @if(count($labels) > 0)
            <div class="label-group">
                @foreach($labels as $label)
                    <div class="product-label label-{{ $label['type'] ?? 'hot' }}">{{ $label['text'] ?? '' }}</div>
                @endforeach
            </div>
        @endif
        
        <div class="btn-icon-group">
            @if($addToCartUrl)
                <a href="{{ $addToCartUrl }}" title="Add To Cart" class="btn-icon btn-add-cart product-type-{{ $addToCartType }}">
                    <i class="icon-shopping-cart"></i>
                </a>
            @else
                <a href="{{ $url }}" class="btn-icon btn-add-cart">
                    <i class="fa fa-arrow-right"></i>
                </a>
            @endif
        </div>
        
        @if($showQuickView)
            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View</a>
        @endif
        
        @if($showCountdown && $countdownUntil)
            <div class="product-countdown-container">
                <span class="product-countdown-title">offer ends in:</span>
                <div class="product-countdown countdown-compact" data-until="{{ $countdownUntil }}" data-compact="true"></div>
                <!-- End .product-countdown -->
            </div>
            <!-- End .product-countdown-container -->
        @endif
    </figure>
    
    <div class="product-details">
        <div class="category-wrap">
            @if($category && $categoryUrl)
                <div class="category-list">
                    <a href="{{ $categoryUrl }}" class="product-category">{{ $category }}</a>
                </div>
            @endif
            <a href="{{ $wishlistUrl }}" title="Add to Wishlist" class="btn-icon-wish">
                <i class="icon-heart"></i>
            </a>
        </div>
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

