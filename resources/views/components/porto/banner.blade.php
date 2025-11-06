@props([
    'image',
    'imageAlt' => 'banner',
    'backgroundColor' => '#dadada',
    'title' => null,
    'subtitle' => null,
    'price' => null,
    'priceEm' => null,
    'buttonText' => 'Shop Now',
    'buttonUrl' => '/porto/demo1-shop.html',
    'textAlign' => 'left', // left, center, right
    'animationName' => null,
    'animationDelay' => null,
    'class' => 'banner-hover-shadow',
])

<div class="banner {{ $class }} d-flex align-items-center mb-2 w-100 appear-animate" 
     @if($animationName) data-animation-name="{{ $animationName }}" @endif
     @if($animationDelay) data-animation-delay="{{ $animationDelay }}" @endif>
    <figure class="w-100">
        <img src="{{ $image }}" 
             @if($backgroundColor) style="background-color: {{ $backgroundColor }};" @endif
             alt="{{ $imageAlt }}">
    </figure>
    <div class="banner-layer text-{{ $textAlign }}">
        @if($title)
            <h3 class="m-b-2">{{ $title }}</h3>
        @endif
        @if($subtitle)
            <h4 class="m-b-4 {{ str_contains($subtitle, 'OFF') ? 'text-primary' : 'text-secondary' }}">
                @if(str_contains($subtitle, '%'))
                    <sup class="text-dark"><del>{{ $priceEm ?? '' }}</del></sup>{{ $subtitle }}<sup>OFF</sup>
                @else
                    {{ $subtitle }}
                @endif
            </h4>
        @endif
        @if($price)
            <h4 class="{{ str_contains($price, 'UP TO') ? 'text-body' : 'mb-3 text-secondary text-uppercase' }}">
                {{ $price }}
            </h4>
        @endif
        <a href="{{ $buttonUrl }}" class="text-dark text-uppercase ls-10">{{ $buttonText }}</a>
    </div>
</div>
<!-- End .banner -->

