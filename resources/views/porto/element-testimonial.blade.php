@extends('layouts.porto')

@section('header')
    @include('components.porto.header')
@endsection

@section('content')
<div class="category-banner-container bg-gray">
                <div class="category-banner banner text-uppercase"
                    style="background: no-repeat 60%/cover url('/porto/assets/images/elements/page-header.jpg');">
                    <div class="container position-relative">
                        <nav aria-label="breadcrumb" class="breadcrumb-nav text-white">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ route('page', ['page' => 'index']) }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Testimonial</li>
                            </ol>
                        </nav>
                        <h1 class="page-title text-center text-white">Testimonial</h1>
                    </div>
                </div>
            </div>
            <section class="mt-8 testimonial-section">
                <div class="container">
                    <h3 class="text-center">Testimonials Default</h3>
                    <div class="row">
                        <div class="col-12 col-md-4 testimonial testimonial-type1 blockquote-both owner-center">
                            <blockquote class="text-gray">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula
                                    est, in consequat.</p>
                            </blockquote>
                            <div class="testimonial-owner">
                                <div>
                                    <strong class="testimonial-title">John Smith</strong>
                                    <span>CEO & Founder - Okler</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 testimonial testimonial-type2 owner-center">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula
                                est, in consequat.</p>
                            <div class="testimonial-owner">
                                <div>
                                    <figure class="max-width-none">
                                        <img src="/porto/assets/images/elements/testimonial/client1.png" width="62" height="62"
                                            alt="client">
                                    </figure>
                                    <strong class="testimonial-title">John Smith</strong>
                                    <span>CEO & Founder - Okler</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 testimonial testimonial-type3">
                            <blockquote class="text-gray bg-gray">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum molestie,
                                    massa ut semper egestas, ex ligula ifend neque, eget pharetra elit lectus ac
                                    ex.risus.</p>
                            </blockquote>
                            <div class="testimonial-arrow-down"></div>
                            <div class="testimonial-owner">
                                <figure class="max-width-none">
                                    <img src="/porto/assets/images/elements/testimonial/client1.png" width="62" height="62"
                                        alt="client">
                                </figure>
                                <div>
                                    <strong class="testimonial-title">John Smith</strong>
                                    <span>CEO & Founder - Okler</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6 ">
                            <div class="testimonial testimonial-border testimonial-type4">
                                <blockquote class="text-gray">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum molestie,
                                        massa ut semper egestas, ex ligula ifend neque, eget pharetra elit lectus ac
                                        ex.risus.</p>
                                </blockquote>
                                <div class="testimonial-owner">
                                    <figure class="max-width-none">
                                        <img src="/porto/assets/images/elements/testimonial/client1.png" width="62" height="62"
                                            alt="client">
                                    </figure>
                                    <div>
                                        <strong class="testimonial-title">John Smith</strong>
                                        <span>CEO & Founder - Okler</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-12 col-md-6 testimonial testimonial-border-bottom  owner-center testimonial-type5">
                            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget risus porta,
                                tincidunt turpis at, interdum tortor. Suspendisse potenti. Lorem ipsum dolor sit
                                amet, consectetur adipiscing elit. Cum sociis natoque penatibus et magnis dis
                                parturient montes, nascetur ridiculus mus. Fusce ante tellus, convallis non
                                consectetur sed, pharetra nec ex. Aliquam et tortor nisi. Duis mollis diam nec elit
                                volutpat suscipit."</p>
                            <div class="testimonial-owner">
                                <div>
                                    <figure>
                                        <img src="/porto/assets/images/elements/testimonial/client1.png" width="62" height="62"
                                            alt="client">
                                    </figure>
                                    <div>
                                        <strong class="testimonial-title">John Smith</strong>
                                        <span>CEO & Founder - Okler</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mt-8 testimonial-section">
                <div class="container">
                    <h3>Colors</h3>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="testimonial bg-blue testimonial-color testimonial-type3">
                                <blockquote class="text-white">
                                    <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec
                                        hendrerit vehicula est, in consequat.</p>
                                </blockquote>
                                <div class="testimonial-arrow-down"></div>
                                <div class="testimonial-owner">
                                    <figure>
                                        <img src="/porto/assets/images/elements/testimonial/client1.png" width="62" height="62"
                                            alt="client">
                                    </figure>
                                    <div>
                                        <strong class="testimonial-title">John Smith</strong>
                                        <span>CEO & Founder - Okler</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="testimonial bg-red testimonial-color testimonial-type3">
                                <blockquote class="text-white">
                                    <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec
                                        hendrerit vehicula est, in consequat.</p>
                                </blockquote>
                                <div class="testimonial-arrow-down"></div>
                                <div class="testimonial-owner">
                                    <figure>
                                        <img src="/porto/assets/images/clients/client-3.jpg" width="55" height="55"
                                            alt="client">
                                    </figure>
                                    <div>
                                        <strong class="testimonial-title">John Smith</strong>
                                        <span>CEO & Founder - Okler</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="testimonial bg-green testimonial-color testimonial-type3">
                                <blockquote class="text-white">
                                    <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec
                                        hendrerit vehicula est, in consequat.</p>
                                </blockquote>
                                <div class="testimonial-arrow-down"></div>
                                <div class="testimonial-owner">
                                    <figure>
                                        <img src="/porto/assets/images/clients/client-3.jpg" width="55" height="55"
                                            alt="client">
                                    </figure>
                                    <div>
                                        <strong class="testimonial-title">John Smith</strong>
                                        <span>CEO & Founder - Okler</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="testimonial bg-grey testimonial-color testimonial-type3">
                                <blockquote class="text-white">
                                    <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec
                                        hendrerit vehicula est, in consequat.</p>
                                </blockquote>
                                <div class="testimonial-arrow-down"></div>
                                <div class="testimonial-owner">
                                    <figure>
                                        <img src="/porto/assets/images/elements/testimonial/client1.png" width="62" height="62"
                                            alt="client">
                                    </figure>
                                    <div>
                                        <strong class="testimonial-title">John Smith</strong>
                                        <span>CEO & Founder - Okler</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mt-8 testimonial-section">
                <div class="container">
                    <h3>Carousels</h3>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="owl-carousel owl-theme owl-dots-simple mb-4 mb-lg-0 appear-animate"
                                data-owl-options="{
                            'loop': false,
                            'dots': true,
                            'margin': 20,
                            'responsive': null
                        }" data-animation-name="fadeInRightShorter" data-animation-delay="200">

                                <div class="testimonial bg-blue testimonial-color testimonial-type3 mb-0">
                                    <blockquote class="text-white">
                                        <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            Donec hendrerit vehicula est, in consequat. Lorem ipsum dolor sit amet,
                                            consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat.</p>
                                    </blockquote>
                                    <div class="testimonial-arrow-down"></div>
                                    <div class="testimonial-owner">
                                        <figure>
                                            <img src="/porto/assets/images/elements/testimonial/client1.png" width="62"
                                                height="62" alt="client">
                                        </figure>
                                        <div>
                                            <strong class="testimonial-title">John Smith</strong>
                                            <span>CEO & Founder - Okler</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="testimonial bg-blue testimonial-color testimonial-type3 mb-0">
                                    <blockquote class="text-white">
                                        <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            Donec hendrerit vehicula est, in consequat. Lorem ipsum dolor sit amet,
                                            consectetur adipiscing elit. Donec hendrerit vehicula est, in consequat.
                                            Donec hendrerit vehicula est, in consequat. Donec hendrerit vehicula est, in
                                            consequat.</p>
                                    </blockquote>
                                    <div class="testimonial-arrow-down"></div>
                                    <div class="testimonial-owner">
                                        <figure>
                                            <img src="/porto/assets/images/elements/testimonial/client1.png" width="62"
                                                height="62" alt="client">
                                        </figure>
                                        <div>
                                            <strong class="testimonial-title">John Smith</strong>
                                            <span>CEO & Founder - Okler</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="owl-carousel owl-theme owl-dots-simple mb-4 mb-lg-0 appear-animate"
                                data-owl-options="{
                            'loop': false,
                            'dots': true,
                            'margin': 20,
                            'responsive': null
                        }" data-animation-name="fadeInRightShorter" data-animation-delay="200">
                                <div class="testimonial testimonial-type2 owner-center">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula
                                        est, in consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Donec hendrerit vehicula est, in consequat.</p>
                                    <div class="testimonial-owner">
                                        <div>
                                            <figure>
                                                <img src="/porto/assets/images/elements/testimonial/client1.png" width="62"
                                                    height="62" alt="client">
                                            </figure>
                                            <strong class="testimonial-title">John Smith</strong>
                                            <span>CEO & Founder - Okler</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial testimonial-type2 owner-center">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit vehicula
                                        est, in consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Donec hendrerit vehicula est, in consequat. Donec hendrerit vehicula est, in
                                        consequat. Donec hendrerit vehicula est, in consequat.</p>
                                    <div class="testimonial-owner">
                                        <div>
                                            <figure>
                                                <img src="/porto/assets/images/elements/testimonial/client1.png" width="62"
                                                    height="62" alt="client">
                                            </figure>
                                            <strong class="testimonial-title">John Smith</strong>
                                            <span>CEO & Founder - Okler</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="mt-8 testimonial-section testimonial-bg bg-gray">
                <div class="container">
                    <div class="owl-carousel owl-theme owl-dots-simple mb-4 mb-lg-0 appear-animate" data-owl-options="{
                'loop': false,
                'dots': true,
                'margin': 20,
                'responsive': null
            }" data-animation-name="fadeInRightShorter" data-animation-delay="200">
                        <div class="testimonial testimonial-type1 blockquote-both inner-blockquote owner-center">
                            <div class="testimonial-owner">
                                <div>
                                    <figure>
                                        <img src="/porto/assets/images/elements/testimonial/client1.png" width="62" height="62"
                                            alt="client">
                                    </figure>
                                    <blockquote class="text-gray">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit
                                            vehicula est, in consequat. Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit. Donec hendrerit vehicula est, in consequat.</p>
                                    </blockquote>
                                    <strong class="testimonial-title">John Smith</strong>
                                    <span>CEO & Founder - Okler</span>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial testimonial-type1 blockquote-both inner-blockquote owner-center">
                            <div class="testimonial-owner">
                                <div>
                                    <figure>
                                        <img src="/porto/assets/images/elements/testimonial/client1.png" width="62" height="62"
                                            alt="client">
                                    </figure>
                                    <blockquote class="text-gray">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit
                                            vehicula est, in consequat. Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit. Donec hendrerit vehicula est, in consequat. Donec hendrerit
                                            vehicula est, in consequat. Donec hendrerit vehicula est, in consequat.</p>
                                    </blockquote>
                                    <strong class="testimonial-title">John Smith</strong>
                                    <span>CEO & Founder - Okler</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="testimonial-section mt-8">
                <div class="container">
                    <h3>Parallax</h3>
                </div>
                <div class="testimonial-bg" data-parallax="{'speed': 2, 'enableOnMobile': true}"
                    data-image-src="/porto/assets/images/elements/testimonial/parallax.jpg">
                    <div class="container">
                        <div class="owl-carousel owl-theme owl-dots-simple mb-4 mb-lg-0 appear-animate"
                            data-owl-options="{
                    'loop': false,
                    'dots': true,
                    'margin': 20,
                    'responsive': null
                }" data-animation-name="fadeInRightShorter" data-animation-delay="200">
                            <div class="testimonial testimonial-type1 blockquote-both inner-blockquote owner-center">
                                <div class="testimonial-owner">
                                    <div>
                                        <figure>
                                            <img src="/porto/assets/images/elements/testimonial/client1.png" width="62"
                                                height="62" alt="client">
                                        </figure>
                                        <blockquote class="text-white">
                                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit.
                                                Donec hendrerit
                                                vehicula est, in consequat. Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit. Donec hendrerit vehicula est, in consequat.</p>
                                        </blockquote>
                                        <strong class="testimonial-title text-white">John Smith</strong>
                                        <span class="text-white">CEO & Founder - Okler</span>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial testimonial-type1 blockquote-both inner-blockquote owner-center">
                                <div class="testimonial-owner">
                                    <div>
                                        <figure>
                                            <img src="/porto/assets/images/elements/testimonial/client1.png" width="62"
                                                height="62" alt="client">
                                        </figure>
                                        <blockquote class="text-white">
                                            <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit.
                                                Donec hendrerit
                                                vehicula est, in consequat. Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit. Donec hendrerit vehicula est, in consequat. Donec
                                                hendrerit
                                                vehicula est, in consequat. Donec hendrerit vehicula est, in consequat.
                                            </p>
                                        </blockquote>
                                        <strong class="testimonial-title text-white">John Smith</strong>
                                        <span class="text-white">CEO & Founder - Okler</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="testimonial-section testimonials-big-type mt-8 mb-10">
                <div class="container">
                    <h3>Advanced Style</h3>
                    <div class="testimonial">
                        <figure>
                            <img src="/porto/assets/images/elements/testimonial/client-1.jpg" alt="client" width="120"
                                height="120">
                        </figure>
                        <div class="testimonial-owner">
                            <div class="meta">
                                <blockquote class="text-gray">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget risus porta,
                                        tincidunt turpis at, interdum tortor. Suspendisse potenti. Lorem ipsum dolor sit
                                        amet, consectetur adipiscing elit. Sociis natoque penatibus et magnis dis
                                        parturient montes, nascetur ridiculus mus. Fusce ante tellus, convallis non
                                        consectetur sed, pharetra nec ex. Aliquam et tortor nisi. Duis mollis diam nec
                                        elit volutpat suscipit.</p>
                                </blockquote>
                                <h4 class="testimonial-title">John Doe</h4>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:60%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top text-white"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->
                            </div>
                        </div>
                    </div>
                    <!-- End .testimonial -->
                </div>
                <!-- End .container -->
            </section>

            <div class="section-elements" style="background: #f4f4f4;">
                <div class="container">
                    <h2 class="elements">Porto Elements</h2>
                    <p class="mb-5">Giant variety of elements to create your site with unlimited possibilities.</p>
                    <div class="row justify-content-center">
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                            <a href="/porto/element-accordions.html" class="icon-box">
                                <i class="fa fa-bars"></i>
                                <h5 class="porto-sicon-title">Accordions</h5>
                                <i class="fa fa-bars"></i>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                            <a href="/porto/element-alerts.html" class="icon-box">
                                <i class="fa fa-exclamation-triangle"></i>
                                <h5 class="porto-sicon-title">Alerts</h5>
                                <i class="fa fa-exclamation-triangle"></i>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                            <a href="/porto/element-products.html" class="icon-box">
                                <i class="fa fa-cart-arrow-down"></i>
                                <h5 class="porto-sicon-title">Products</h5>
                                <i class="fa fa-cart-arrow-down"></i>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                            <a href="/porto/element-product-categories.html" class="icon-box">
                                <i class="fas fa-shopping-basket"></i>
                                <h5 class="porto-sicon-title">Product Categories</h5>
                                <i class="fas fa-shopping-basket"></i>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                            <a href="/porto/element-animations.html" class="icon-box">
                                <i class="fa fa-asterisk"></i>
                                <h5 class="porto-sicon-title">Animations</h5>
                                <i class="fa fa-asterisk"></i>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                            <a href="/porto/element-buttons.html" class="icon-box">
                                <i class="fa fa-minus"></i>
                                <h5 class="porto-sicon-title">Buttons</h5>
                                <i class="fa fa-minus"></i>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                            <a href="/porto/element-banners.html" class="icon-box">
                                <i class="fas fa-cloud-meatball"></i>
                                <h5 class="porto-sicon-title">Banners</h5>
                                <i class="fas fa-cloud-meatball"></i>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                            <a href="/porto/element-call-to-action.html" class="icon-box">
                                <i class="fas fa-external-link-alt"></i>
                                <h5 class="porto-sicon-title">Call To Action</h5>
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                            <a href="/porto/element-counters.html" class="icon-box">
                                <i class="fas fa-sort-numeric-down"></i>
                                <h5 class="porto-sicon-title">Counters</h5>
                                <i class="fas fa-sort-numeric-down"></i>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                            <a href="/porto/element-countdown.html" class="icon-box">
                                <i class="far fa-clock"></i>
                                <h5 class="porto-sicon-title">Count Down</h5>
                                <i class="far fa-clock"></i>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                            <a href="/porto/element-headings.html" class="icon-box">
                                <i class="fa fa-text-height"></i>
                                <h5 class="porto-sicon-title">Headings</h5>
                                <i class="fa fa-text-height"></i>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                            <a href="/porto/element-icons.html" class="icon-box">
                                <i class="fa fa-check"></i>
                                <h5 class="porto-sicon-title">Icons</h5>
                                <i class="fa fa-check"></i>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                            <a href="/porto/element-info-box.html" class="icon-box">
                                <i class="fa fa-archive"></i>
                                <h5 class="porto-sicon-title">Info Box</h5>
                                <i class="fa fa-archive"></i>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                            <a href="/porto/element-posts.html" class="icon-box">
                                <i class="far fa-calendar-alt"></i>
                                <h5 class="porto-sicon-title">Posts</h5>
                                <i class="far fa-calendar-alt"></i>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                            <a href="/porto/element-tabs.html" class="icon-box">
                                <i class="fa fa-columns"></i>
                                <h5 class="porto-sicon-title">Tabs</h5>
                                <i class="fa fa-columns"></i>
                            </a>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                            <a href="/porto/element-testimonial.html" class="icon-box">
                                <i class="far fa-comments"></i>
                                <h5 class="porto-sicon-title">Testimonials</h5>
                                <i class="far fa-comments"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
