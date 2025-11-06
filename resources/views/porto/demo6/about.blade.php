@extends('layouts.porto')

@section('header')
    @include('components.porto.demo6.header')
@endsection

@section('footer')
    @include('components.porto.demo6.footer')
@endsection

@section('content')
<div class="page-header page-header-bg text-left"
                style="background: 50%/cover #D4E1EA url('/porto/assets/images/demoes/demo6/page-header-bg.jpg');">
                <div class="container p-0">
                    <h1 class="text-white">ABOUT US</h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->

            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container-fluid">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/porto/demo6.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ol>
                </div><!-- End .container -->
            </nav>

            <div class="container-fluid">
                <div class="history-section row align-items-center">
                    <div class="col-xl-5 col-lg-6">
                        <figure>
                            <img src="/porto/assets/images/demoes/demo6/about/about-us-history.jpg" width="717" height="342"
                                alt="history" />
                        </figure>
                    </div>
                    <div class="col-xl-7 col-lg-6">
                        <div class="row">
                            <h3 class="col-12 about-title">OUR HISTORY</h3>
                            <div class="col-xl-5">
                                <p>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum
                                    has been the industry’s standard dummy text ever since the 1500s, when an unknown
                                    printer took a galley of type and scrambled it to make a type specimen book. It has
                                    survived not only five centuries It was popularised in the 1960s with the release of
                                    Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                                    publishing software like Aldus
                                </p>
                            </div>
                            <div class="offset-xl-1 col-xl-5 offset-xl-0">
                                <p>
                                    Been the industry’s standard dummy text ever since the 1500s, when an unknown
                                    printer
                                    took a galley of type and scrambled it to make a type specimen book. It has survived
                                    not
                                    only five centuries It was popularised in the 1960s with the release of Letraset
                                    sheets
                                    containing Lorem Ipsum passages, and more recently with desktop publishing software
                                    like
                                    Aldus.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="features-section">
                <div class="container-fluid">
                    <div class="heading mb-3">
                        <h2 class="about-title text-center">OUR SPECIAL FEATURES</h2>
                        <p class="text-center mb-0">Lorem ipsum is simply dummy text</p>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-sm-6">
                            <div class="feature-box bg-white text-center">
                                <i class="icon-support"></i>

                                <div class="feature-box-content text-left p-0">
                                    <h3>ONLINE SUPPORT</h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's</p>
                                </div><!-- End .feature-box-content -->
                            </div><!-- End .feature-box -->
                        </div><!-- End .col-lg-4 -->

                        <div class="col-xl-3 col-sm-6">
                            <div class="feature-box bg-white text-center">
                                <i class="icon-shipping"></i>

                                <div class="feature-box-content text-left p-0">
                                    <h3>FREE SHIPPING & RETURN</h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's</p>
                                </div><!-- End .feature-box-content -->
                            </div><!-- End .feature-box -->
                        </div><!-- End .col-lg-4 -->

                        <div class="col-xl-3 col-sm-6">
                            <div class="feature-box bg-white text-center">
                                <i class="icon-money"></i>

                                <div class="feature-box-content text-left p-0">
                                    <h3>MONEY BACK GUARANTEE</h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's</p>
                                </div><!-- End .feature-box-content -->
                            </div><!-- End .feature-box -->
                        </div><!-- End .col-lg-4 -->

                        <div class="col-xl-3 col-sm-6">
                            <div class="feature-box bg-white text-center">
                                <i class="icon-cat-shirt"></i>

                                <div class="feature-box-content text-left p-0">
                                    <h3>NEW STYPES EVERY DAY</h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's</p>
                                </div><!-- End .feature-box-content -->
                            </div><!-- End .feature-box -->
                        </div><!-- End .col-lg-4 -->
                    </div><!-- End .row -->
                </div>
            </div><!-- End .features-section -->

            <div class="container-fluid">
                <div class="team-section">
                    <div class="heading mb-3">
                        <h2 class="about-title text-center">OUR TEAM</h2>
                        <p class="text-center">Lorem ipsum is simply dummy text</p>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                            <div class="team-info">
                                <figure class="zoom-effect">
                                    <a href="#">
                                        <img src="/porto/assets/images/demoes/demo6/about/team1.jpg"
                                            data-zoom-image="/porto/assets/images/demoes/demo6/about/team1.jpg" class="w-100"
                                            width="270" height="319" alt="Team" />
                                    </a>
                                    <h5 class="team-name font4 mb-0">John Doe</h5>

                                    <span class="prod-full-screen">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </figure>
                            </div>
                        </div><!-- End .col-lg-4 -->

                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                            <div class="team-info">
                                <figure class="zoom-effect">
                                    <a href="#">
                                        <img src="/porto/assets/images/demoes/demo6/about/team2.jpg"
                                            data-zoom-image="/porto/assets/images/demoes/demo6/about/team2.jpg" class="w-100"
                                            width="270" height="319" alt="Team" />
                                    </a>

                                    <h5 class="team-name font4 mb-0">Jessica Doe</h5>
                                    <span class="prod-full-screen">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </figure>
                            </div>
                        </div><!-- End .col-lg-4 -->

                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                            <div class="team-info">
                                <figure class="zoom-effect">
                                    <a href="#">
                                        <img src="/porto/assets/images/demoes/demo6/about/team3.jpg"
                                            data-zoom-image="/porto/assets/images/demoes/demo6/about/team3.jpg" class="w-100"
                                            width="270" height="319" alt="Team" />
                                    </a>

                                    <h5 class="team-name font4 mb-0">Rick Edward Doe</h5>
                                    <span class="prod-full-screen">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </figure>
                            </div>

                        </div><!-- End .col-lg-4 -->

                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                            <div class="team-info">
                                <figure class="zoom-effect">
                                    <a href="#">
                                        <img src="/porto/assets/images/demoes/demo6/about/team4.jpg"
                                            data-zoom-image="/porto/assets/images/demoes/demo6/about/team4.jpg" class="w-100"
                                            width="270" height="319" alt="Team" />
                                    </a>

                                    <h5 class="team-name font4 mb-0">Henry Doe</h5>

                                    <span class="prod-full-screen">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </figure>
                            </div>
                        </div><!-- End .col-lg-4 -->

                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                            <div class="team-info">
                                <figure class="zoom-effect">
                                    <a href="#">
                                        <img src="/porto/assets/images/demoes/demo6/about/team5.jpg"
                                            data-zoom-image="/porto/assets/images/demoes/demo6/about/team5.jpg" class="w-100"
                                            width="270" height="319" alt="Team" />
                                    </a>

                                    <h5 class="team-name font4 mb-0">Robert Doe</h5>

                                    <span class="prod-full-screen">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </figure>
                            </div>
                        </div><!-- End .col-lg-4 -->

                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                            <div class="team-info">
                                <figure class="zoom-effect">
                                    <a href="#">
                                        <img src="/porto/assets/images/demoes/demo6/about/team6.jpg"
                                            data-zoom-image="/porto/assets/images/demoes/demo6/about/team6.jpg" class="w-100"
                                            width="270" height="319" alt="Team" />
                                    </a>
                                    <h5 class="team-name font4 mb-0">Melissa Doe</h5>
                                    <span class="prod-full-screen">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </figure>
                            </div>
                        </div><!-- End .col-lg-4 -->
                    </div><!-- End .row -->
                </div>

                <div class="testimonials-section">
                    <div class="heading">
                        <h2 class="about-title text-center">TESTIMONIALS</h2>
                        <p class="text-center mb-0">What our client says about us</p>
                    </div>

                    <div class="row">
                        <div class="col-md-12 offset-xl-1 col-xl-10">
                            <div class="row">
                                <div class="col-md-6 mb-md-0 mb-7">
                                    <div class="testimonial">
                                        <blockquote class="ml-0">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry. Lorem
                                                Ipsum has been the industry’s standard dummy text ever since the
                                                1500s,
                                                when an
                                                unknown printer took a galley of type and scrambled.</p>
                                        </blockquote>

                                        <div class="testimonial-owner">
                                            <figure>
                                                <img src="/porto/assets/images/demoes/demo6/clients/client-1.jpg" width="25"
                                                    height="25" alt="client">
                                            </figure>

                                            <div>
                                                <strong class="testimonial-title font4">John Smith</strong>
                                                <span>CEO</span>
                                            </div>
                                        </div><!-- End .testimonial-owner -->
                                    </div><!-- End .testimonial -->
                                </div>

                                <div class="col-md-6">
                                    <div class="testimonial">
                                        <blockquote class="ml-0">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry. Lorem
                                                Ipsum has been the industry’s standard dummy text ever since the
                                                1500s,
                                                when an
                                                unknown printer took a galley of type and scrambled.</p>
                                        </blockquote>

                                        <div class="testimonial-owner">
                                            <figure>
                                                <img src="/porto/assets/images/demoes/demo6/clients/client-2.jpg" width="25"
                                                    height="25" alt="client">
                                            </figure>

                                            <div>
                                                <strong class="testimonial-title font4">BRENDA DOE</strong>
                                                <span>FOUNDER</span>
                                            </div>
                                        </div><!-- End .testimonial-owner -->
                                    </div><!-- End .testimonial -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End .testimonials-section -->
            </div>
@section('footer')
    @include('components.porto.demo6.footer')
@endsection

@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
