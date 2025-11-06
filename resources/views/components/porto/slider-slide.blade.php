@props([
    'slideNumber',
    'image',
    'imageAlt' => 'home-slider',
    'backgroundColor' => null,
    'title' => null,
    'subtitle' => null,
    'heading' => null,
    'price' => null,
    'priceEm' => null,
    'buttonText' => 'Shop Now!',
    'buttonUrl' => '/porto/demo1-shop.html',
    'textUppercase' => false,
    'animationName' => 'fadeInUpShorter',
])

<div class="home-slide home-slide{{ $slideNumber }} banner banner-md-vw banner-sm-vw d-flex align-items-center">
    <img class="slide-bg" 
         @if($backgroundColor) style="background-color: {{ $backgroundColor }};" @endif
         src="{{ $image }}" 
         width="880" 
         height="428" 
         alt="{{ $imageAlt }}">
    <div class="banner-layer {{ $textUppercase ? 'text-uppercase' : '' }} appear-animate" 
         data-animation-name="{{ $animationName }}">
        @if($title)
            <h4 class="{{ $textUppercase ? 'm-b-2' : 'text-white mb-0' }}">{{ $title }}</h4>
        @endif
        @if($heading)
            <h2 class="{{ $textUppercase ? 'm-b-3' : 'text-white mb-0' }}">{{ $heading }}</h2>
        @endif
        @if($subtitle)
            <h3 class="text-white text-uppercase m-b-3">{{ $subtitle }}</h3>
        @endif
        @if($price)
            <h5 class="{{ $textUppercase ? 'd-inline-block mb-0 align-top mr-5 mb-2' : 'text-white text-uppercase d-inline-block mb-0 ls-n-20 align-text-bottom' }}">
                @if($textUppercase)
                    Starting At <b>$<em>{{ $priceEm ?? '' }}</em>{{ $price }}</b>
                @else
                    Starting At <b class="coupon-sale-text bg-secondary text-white d-inline-block">$<em class="align-text-top">{{ $priceEm ?? '' }}</em>{{ $price }}</b>
                @endif
            </h5>
        @endif
        <a href="{{ $buttonUrl }}" class="btn btn-dark btn-md ls-10">{{ $buttonText }}</a>
    </div>
    <!-- End .banner-layer -->
</div>
<!-- End .home-slide -->

