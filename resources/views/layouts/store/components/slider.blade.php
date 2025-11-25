@if ($slider && $slider->items->count() > 0)
    <div class="home-slider slide-animate owl-carousel owl-theme show-nav-hover nav-big mb-2 text-uppercase" data-owl-options="{'loop': false}">
        @foreach ($slider->items as $index => $item)
            <div class="home-slide home-slide{{ $index + 1 }} banner {{ $index === 1 ? 'banner-md-vw' : '' }}">
                @if ($item->media)
                    <img class="slide-bg" src="{{ $item->media->url }}" width="1903" height="499" alt="{{ $item->media->alt ?? $item->title }}" />
                @else
                    <img
                        class="slide-bg"
                        style="background-color: #ccc"
                        width="1903"
                        height="499"
                        src="{{ asset('porto/assets/images/demoes/demo4/slider/slide-' . ($index + 1) . '.jpg') }}"
                        alt="slider image"
                    />
                @endif
                <div class="container d-flex align-items-center">
                    <div class="banner-layer {{ $index === 1 ? 'd-flex justify-content-center' : '' }} appear-animate" data-animation-name="fadeInUpShorter">
                        @if ($index === 1)
                            <div class="mx-auto">
                                @if ($item->subtitle)
                                    <h4 class="m-b-1">{{ $item->subtitle }}</h4>
                                @endif

                                @if (isset($item->meta['heading']))
                                    <h3 class="m-b-2">{{ $item->meta['heading'] }}</h3>
                                @endif

                                @if (isset($item->meta['subheading']))
                                    <h3 class="mb-2 heading-border">{{ $item->meta['subheading'] }}</h3>
                                @endif

                                @if ($item->title)
                                    <h2 class="text-transform-none m-b-4">{{ $item->title }}</h2>
                                @endif

                                @if ($item->button_text && $item->button_url)
                                    <a href="{{ $item->button_url }}" class="btn btn-block btn-dark">{{ $item->button_text }}</a>
                                @endif
                            </div>
                        @else
                            @if ($item->subtitle)
                                <h4 class="text-transform-none m-b-3">{{ $item->subtitle }}</h4>
                            @endif

                            @if ($item->title)
                                <h2 class="text-transform-none mb-0">{{ $item->title }}</h2>
                            @endif

                            @if (isset($item->meta['heading']))
                                <h3 class="m-b-3">{{ $item->meta['heading'] }}</h3>
                            @endif

                            @if (isset($item->meta['subheading']))
                                <h5 class="d-inline-block mb-0">
                                    <span>{{ $item->meta['subheading'] }}</span>
                                </h5>
                            @endif

                            @if ($item->button_text && $item->button_url)
                                <a href="{{ $item->button_url }}" class="btn btn-dark btn-lg">{{ $item->button_text }}</a>
                            @endif
                        @endif
                    </div>
                    <!-- End .banner-layer -->
                </div>
            </div>
            <!-- End .home-slide -->
        @endforeach
    </div>
    <!-- End .home-slider -->
@else
    {{-- Fallback statik slider --}}
    <div class="home-slider slide-animate owl-carousel owl-theme show-nav-hover nav-big mb-2 text-uppercase" data-owl-options="{'loop': false}">
        <div class="home-slide home-slide1 banner">
            <img class="slide-bg" src="{{ asset('porto/assets/images/demoes/demo4/slider/slide-1.jpg') }}" width="1903" height="499" alt="slider image" />
            <div class="container d-flex align-items-center">
                <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                    <h4 class="text-transform-none m-b-3">Find the Boundaries. Push Through!</h4>
                    <h2 class="text-transform-none mb-0">Summer Sale</h2>
                    <h3 class="m-b-3">70% Off</h3>
                    <h5 class="d-inline-block mb-0">
                        <span>Starting At</span>
                        <b class="coupon-sale-text text-white bg-secondary align-middle">
                            <sup>$</sup>
                            <em class="align-text-top">199</em>
                            <sup>99</sup>
                        </b>
                    </h5>
                    <a href="#" class="btn btn-dark btn-lg">Shop Now!</a>
                </div>
            </div>
        </div>
    </div>
@endif
