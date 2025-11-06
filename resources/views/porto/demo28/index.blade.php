@extends('layouts.porto')

@section('footer')
    @include('components.porto.demo28.footer')
@endsection


@section('header')
    @include('components.porto.demo28.header')
@endsection

@section('content')
<!-- banner-section-1 -->
            <section class="section-1" id="intro">
                <div class="container">
                    <div class="row align-items-center product-row">
                        <div class="col-lg-7 appear-animate" data-animation-name="fadeInLeftShorter" data-appear-animation-delay="200">
                            <figure class="large-img">
                                <img src="/porto/assets/images/demoes/demo28/banner/1.png" alt="banner" width="939" height="1120">
                            </figure>
                        </div>
                        <div class="col-lg-5 order-lg-first appear-animate" data-animation-name="fadeIn" data-appear-animation-delay="100">
                            <div class="section-body">
                                <h3 class="banner-subtitle mb-0 line-height-1e appear-animate" data-animation-name="fadeInLeftShorter" data-appear-animation-delay="1170">
                                    INTRODUCING</h3>
                                <h3 class="product-title appear-animate line-height-1" data-animation-name="fadeInLeftShorter" data-appear-animation-delay="1320">PORTO HEADPHONE
                                </h3>
                                <div class="price-box appear-animate" data-animation-name="fadeInLeftShorter" data-appear-animation-delay="1500">
                                    <span class="product-price text-primary">
                                        <b>$350.00</b>
                                    </span>
                                    <a href="#" class="btn btn-rounded with-bg btn-add-cart product-type-simple">add to
                                        cart
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- banner-section-2 -->
            <section class="section-2 with-bg" id="feature">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 appear-animate" data-animation-name="fadeInRightShorter" data-appear-animation-delay="400">
                            <figure>
                                <img src="/porto/assets/images/demoes/demo28/banner/2.jpg" alt="banner" width="629" height="455">
                            </figure>
                        </div>
                        <div class="col-lg-6">
                            <div class="section-body">
                                <h3 class="product-title mb-2 appear-animate" data-animation-name="fadeInUpShorter" data-appear-animation-delay="500">PORTO HEADPHONE</h3>
                                <p class="section-text appear-animate" data-animation-name="fadeInUpShorter" data-appear-animation-delay="700">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
                                    make a type specimen book. It has survived not only five centurie
                                </p>
                                <div class="mb-2 appear-animate scrolling-box" data-animation-name="fadeInUpShorter" data-appear-animation-delay="900">
                                    <a href="#specific" class="btn btn-rounded with-border">specifications</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- banner-section-3 -->
            <section class="section-3">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5 img-wrapper appear-animate" data-animation-name="fadeInRightShorter" data-appear-animation-delay="200">
                            <figure>
                                <img src="/porto/assets/images/demoes/demo28/banner/3.jpg" alt="banner" width="463" height="473">
                            </figure>
                        </div>
                        <div class="col-lg-6 order-lg-first">
                            <div class="section-body">
                                <h3 class="product-title mb-2 appear-aniamte" data-animation-name="fadeInUpShorter" data-appear-animation-delay="300">BLUETOOTH CONNECTION</h3>
                                <p class="section-text appear-animate" data-animation-name="fadeInUpShorter" data-appear-animation-delay="500">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                                    survived not only five centuries, but also the leap into electronic typesetting.
                                </p>
                                <div class="mb-2 appear-animate scrolling-box" data-animation-name="fadeInUpShorter" data-appear-animation-delay="700">
                                    <a href="#testimonial" class="btn btn-rounded with-border">testimonials</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- banner-section-4 -->
            <section class="section-4 with-bg">
                <div class="container">
                    <div class="row align-items-center product-row">
                        <div class="col-lg-6 appear-animate" data-animation-name="fadeInRightShorter" data-appear-animation-delay="400">
                            <figure>
                                <img src="/porto/assets/images/demoes/demo28/banner/4.jpg" alt="banner" width="870" height="587">
                            </figure>
                        </div>
                        <div class="col-lg-6">
                            <div class="section-body">
                                <h3 class="product-title mb-2 appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="500">EXTRA QUALITY SOUND</h3>
                                <p class="section-text appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ac metus at elit malesuada tristique ut at est. Donec ut iaculis nunc. Nullam egestas nec erat a tincidunt. Mauris metus metus, bibendum id convallis non,
                                    commodo in lacus. Maecenas maximus consequat varius. Praesent ullamcorper non lectus ac ultrices.
                                </p>
                                <div class="appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="700">
                                    <a href="#" class="btn btn-rounded with-border btn-add-cart product-type-simple">add
                                        to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- banner-section-5 -->
            <section class="rotating-section" id="tour">
                <div class="heading-wrapper text-center">
                    <h3 class="product-title appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200">TOUR</h3>
                    <h4 class="section-subtitle line-height-1 appear-animate" data-animation-name="fadeInUpShoretr" data-animation-delay="400">
                        <i class="left-angle"></i>360º VIRTUAL TOUR
                        <i class="right-angle"></i>
                    </h4>
                </div>
                <svg class="position-absolute w-100 h-100 z-index-2 p-events-none" viewBox="0 0 120 120" version="1.1" xmlns="http://www.w3.org/2000/svg" style="bottom: -80px; left: 0;">
                    <circle cx="60" cy="120" r="100" stroke="#edeeee" stroke-width="0.3" fill="transparent"
                        data-animation-name="customSVGLineAnimTwo" data-animation-delay="200">
                    </circle>
                </svg>
                <div class="cd-product-viewer-wrapper loaded" data-frame="16" data-friction="0.33">
                    <div>
                        <figure class="product-viewer appear-animate fadeInUp" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">
                            <img src="./assets/images/demoes/demo28/rotate.jpg" width="1133" height="560" alt="rotating-image">
                            <div class="product-sprite" style="background-image: url(./assets/images/demoes/demo28/product-360-sprite.jpg);" data-image="./assets/images/demoes/demo28/product-360-sprite.jpg">
                            </div>
                        </figure>
                        <div class="cd-product-viewer-handle">
                            <span class="fill"></span>
                            <span class="handle" style="left: 66.7%;">Handle
                                <span class="bars">
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </section>
            <!-- specify section -->
            <section class="specification" id="specific">
                <div class="container">
                    <div class="product-row row">
                        <div class="heading col-lg-8">
                            <h3 class="product-title text-white">PORTO HEADPHONE SPECIFICATIONS</h3>
                            <p class="section-text text-white ls-0">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vitae scelerisque elit. Vestibulum vulputate felis dolor. Nulla facilisi. Mauris mattis, sem non egestas euismod.
                            </p>
                        </div>
                        <div class="price-box col-lg-4 mb-3">
                            <span class="product-price text-white">
                                <b>$350.00</b>
                            </span>
                            <a href="#" class="btn btn-rounded with-bg btn-add-cart product-type-simple">add to cart</a>
                        </div>
                    </div>
                    <h3 class="widget-heading text-white text-uppercase">General</h3>
                    <div class="row">
                        <div class="widget col-md-4">
                            <ul>
                                <li>
                                    <span class="dark">Designed For</span>
                                    <span class="text-white">Smartphones</span>
                                </li>
                                <li>
                                    <span class="dark">Circumaural</span>
                                    <span class="text-white">Supra-aural</span>
                                </li>
                                <li>
                                    <span class="dark">Magnet Type</span>
                                    <span class="text-white">Neodymium</span>
                                </li>
                                <li>
                                    <span class="dark">With Microphone</span>
                                    <span class="text-white">Yes</span>
                                </li>
                            </ul>
                        </div>
                        <div class="widget col-md-4 with-bar">
                            <ul>
                                <li>
                                    <span class="dark">Glass Type</span>
                                    <span class="text-white">Monocle</span>
                                </li>
                                <li>
                                    <span class="dark">Lens Type</span>
                                    <span class="text-white">Bi Convex</span>
                                </li>
                                <li>
                                    <span class="dark">Suitable For</span>
                                    <span class="text-white">Entertainment</span>
                                </li>
                                <li>
                                    <span class="dark">Functions</span>
                                    <span class="text-white">Graphical Display</span>
                                </li>
                            </ul>
                        </div>
                        <div class="widget col-md-4 with-bar">
                            <ul>
                                <li>
                                    <span class="dark">Compatible OS</span>
                                    <span class="text-white">Android</span>
                                </li>
                                <li>
                                    <span class="dark">Compatible Eye</span>
                                    <span class="text-white">Both</span>
                                </li>
                                <li>
                                    <span class="dark">Control Type</span>
                                    <span class="text-white">Manual</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <!-- testimonial -->
            <section class="testimonials-section" id="testimonial">
                <div class="container">
                    <h2 class="subtitle text-center">TESTIMONIALS</h2>

                    <div class="testimonials-carousel owl-carousel owl-theme images-left" data-owl-options="{
                        'margin': 30,
                        'autoHeight': true,
                        'dots': true,
                        'responsive': {
                            '0': {
                                'items': 1
                            },
                            '768': {
                                'items': 2
                            }
                        }
                    }">
                        <div class="testimonial">
                            <figure>
                                <img src="/porto/assets/images/demoes/demo28/member/client-1.jpg" alt="client" width="120" height="120">
                            </figure>
                            <div class="testimonial-owner">
                                <div class="meta">
                                    <blockquote>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget quam auctor, faucibus mi ac, ultrices eros. Sed maximus risus sem, nec imperdiet nulla posuere vitae. Aenean a rutrum dolor. Ut quis nunc ligula.
                                            Fusce
                                        </p>
                                    </blockquote>
                                    <h4 class="testimonial-title">John Doe</h4>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:60%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->
                                </div>
                            </div>
                        </div>
                        <!-- End .testimonial -->
                        <div class="testimonial">
                            <figure>
                                <img src="/porto/assets/images/demoes/demo28/member/client-2.jpg" alt="client" width="120" height="120">
                            </figure>
                            <div class="testimonial-owner">
                                <div class="meta">
                                    <blockquote>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget quam auctor, faucibus mi ac, ultrices eros. Sed maximus risus sem, nec imperdiet nulla posuere vitae. Aenean a rutrum dolor. Ut quis nunc ligula.
                                            Fusce
                                        </p>
                                    </blockquote>
                                    <h4 class="testimonial-title">Jessica Doe</h4>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:80%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->
                                </div>
                            </div>
                        </div>
                        <!-- End .testimonial -->
                        <div class="testimonial">
                            <figure>
                                <img src="/porto/assets/images/demoes/demo28/member/client-3.jpg" alt="client" width="120" height="120">
                            </figure>
                            <div class="testimonial-owner">
                                <div class="meta">
                                    <blockquote>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget quam auctor, faucibus mi ac, ultrices eros. Sed maximus risus sem, nec imperdiet nulla posuere vitae. Aenean a rutrum dolor. Ut quis nunc ligula.
                                            Fusce
                                        </p>
                                    </blockquote>
                                    <h4 class="testimonial-title">Chris Doe</h4>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" style="width:60%"></span>
                                            <!-- End .ratings -->
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <!-- End .product-ratings -->
                                    </div>
                                    <!-- End .product-container -->
                                </div>
                            </div>
                        </div>
                        <!-- End .testimonial -->
                    </div>
                    <!-- End .testimonials-slider -->
                </div>
                <!-- End .container -->
            </section>
            <!-- product section -->
            <section class="product-section">
                <div class="container">
                    <div class="product-default product-extend product-row">
                        <figure>
                            <img src="/porto/assets/images/demoes/demo28/banner/5.jpg" alt="banner" width="640" height="479">
                        </figure>
                        <div class="product-details">
                            <h3 class="product-title">
                                <b>PORTO HEADPHONE</b>
                            </h3>
                            <div class="ratings-container mb-2">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:80%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <p class="product-desc">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempus nibh sed elimttis adipiscing. Fusce in hendrerit purus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempus nibh…
                            </p>
                            <div class="price-box">
                                <span class="product-price">$350.00</span>
                            </div>
                            <div class="product-action">
                                <div class="product-single-qty">
                                    <input class="horizontal-quantity form-control" type="text">
                                </div>
                                <a href="#" class="btn btn-rounded with-bg btn-add-cart product-type-simple">add to cart
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- video section -->
            <section class="video-section appear-animate" style="background-image: url(/porto/assets/images/demoes/demo28/bg.jpg); background-color: #bb3a1b;" data-animation-name="fadeIn" data-animation-delay="200">
                <div class="section-body d-flex flex-column align-items-center justify-content-center">
                    <h3 class="product-title text-white">EXPLORE THE BEST FOR YOU</h3>
                    <a href="https://www.youtube.com/watch?v=YbJOTdZBX1g" class="btn play-btn btn-iframe">
                        <i class="fas fa-play"></i>
                    </a>
                </div>
            </section>
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
