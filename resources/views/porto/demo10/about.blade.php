@extends('layouts.porto')

@section('header')
    @include('porto.demo10.header')
@endsection

@section('footer')
    @include('porto.demo10.footer')
@endsection

@section('content')
<div class="page-header page-header-bg text-left"
                style="background: 50%/cover #D4E1EA url('/porto/assets/images/demoes/demo10/page-header-bg.jpg');">
                <div class="container">
                    <h1 class="font2">ABOUT US</h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->

            <nav aria-label="breadcrumb" class="breadcrumb-nav sticky-header p-0 mb-0">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/porto/demo10.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ol>
                </div><!-- End .container -->
            </nav>

            <div class="about-section">
                <div class="container">
                    <h2 class="subtitle font4 mb-2">ABOUT US</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book. It has survived not only five centuries
                        It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                        passages, and more recently with desktop publishing software like Aldus.</p>

                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book. It has survived not only.</p>
                </div><!-- End .container -->
            </div><!-- End .about-section -->

            <hr class="mt-0 mb-5">

            <div class="container history-section">
                <h2 class="subtitle font4 mb-2">OUR HISTORY</h2>
                <div class="owl-carousel owl-theme dots-simple" data-owl-options="{
                    'dots': true,
                    'margin': 30,
                    'responsive': {
                        '0': {
                            'items': 1
                        },
                        '576': {
                            'items': 2
                        }
                    }
                }">
                    <div class="history-info">
                        <h2 class="subtitle font2 mb-3">2016</h2>

                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a
                            galley.</p>
                    </div>

                    <div class="history-info">
                        <h2 class="subtitle font2 mb-3">2017</h2>

                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a
                            galley.</p>
                    </div>

                    <div class="history-info">
                        <h2 class="subtitle font2 mb-3">2018</h2>

                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a
                            galley.</p>
                    </div>

                    <div class="history-info">
                        <h2 class="subtitle font2 mb-3">2019</h2>

                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a
                            galley.</p>
                    </div>

                    <div class="history-info">
                        <h2 class="subtitle font2 mb-3">2021</h2>

                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a
                            galley.</p>
                    </div>
                </div>
            </div><!-- End .container -->

            <hr class="mt-0 mb-5">

            <div class="team-section container">
                <h2 class="subtitle font4 mb-2">OUR TEAM</h2>

                <div class="row justify-content-center">
                    <div class="col-md-3 col-6">
                        <div class="team-info mb-3">
                            <figure>
                                <a href="#">
                                    <img src="/porto/assets/images/demoes/demo10/team/team1.jpg"
                                        data-zoom-image="/porto/assets/images/demoes/demo10/team/team1.jpg" class="w-100"
                                        width="270" height="319" alt="Team" />
                                </a>

                                <span class="prod-full-screen">
                                    <i class="fas fa-search"></i>
                                </span>
                            </figure>

                            <h5 class="team-name text-center mb-0">John Doe</h5>
                        </div>
                    </div><!-- End .col-lg-4 -->

                    <div class="col-md-3 col-6">
                        <div class="team-info mb-3">
                            <figure>
                                <a href="#">
                                    <img src="/porto/assets/images/demoes/demo10/team/team2.jpg"
                                        data-zoom-image="/porto/assets/images/demoes/demo10/team/team2.jpg" class="w-100"
                                        width="270" height="319" alt="Team" />
                                </a>

                                <span class="prod-full-screen">
                                    <i class="fas fa-search"></i>
                                </span>
                            </figure>

                            <h5 class="team-name mb-0 text-center">John Doe</h5>
                        </div>
                    </div><!-- End .col-lg-4 -->

                    <div class="col-md-3 col-6">
                        <div class="team-info mb-3">
                            <figure>
                                <a href="#">
                                    <img src="/porto/assets/images/demoes/demo10/team/team3.jpg"
                                        data-zoom-image="/porto/assets/images/demoes/demo10/team/team3.jpg" class="w-100"
                                        width="270" height="319" alt="Team" />
                                </a>

                                <span class="prod-full-screen">
                                    <i class="fas fa-search"></i>
                                </span>
                            </figure>

                            <h5 class="team-name text-center mb-0">John Doe</h5>
                        </div>
                    </div><!-- End .col-lg-4 -->

                    <div class="col-md-3 col-6">
                        <div class="team-info mb-3">
                            <figure>
                                <a href="#">
                                    <img src="/porto/assets/images/demoes/demo10/team/team4.jpg"
                                        data-zoom-image="/porto/assets/images/demoes/demo10/team/team4.jpg" class="w-100"
                                        width="270" height="319" alt="Team" />
                                </a>

                                <span class="prod-full-screen">
                                    <i class="fas fa-search"></i>
                                </span>
                            </figure>

                            <h5 class="team-name text-center mb-0">John Doe</h5>
                        </div>
                    </div><!-- End .col-lg-4 -->
                </div><!-- End .row -->
            </div>

            <hr class="mt-0 mb-0">

            <div class="container brands-section">
                <div class="brands-slider owl-carousel owl-theme images-center nav-outer" data-owl-options="{
                    'margin': 50,
                    'nav': false,
                    'responsive': {
                        '480': {
                            'items': 2
                        },
                        '768': {
                            'items': 3
                        },
                        '991': {
                            'items': 3
                        },
                        '1200': {
                            'items': 3
                        },
                        '1400': {
                            'items': 4,
                            'nav': true
                        },
                        '1600': {
                            'items': 5,
                            'nav': true
                        }
                    }
                }">
                    <img src="/porto/assets/images/demoes/demo10/logoes/logo-1.png" width="245" height="45" alt="logo">
                    <img src="/porto/assets/images/demoes/demo10/logoes/logo-2.png" width="245" height="45" alt="logo">
                    <img src="/porto/assets/images/demoes/demo10/logoes/logo-3.png" width="245" height="45" alt="logo">
                    <img src="/porto/assets/images/demoes/demo10/logoes/logo-4.png" width="245" height="45" alt="logo">
                    <img src="/porto/assets/images/demoes/demo10/logoes/logo-5.png" width="245" height="45" alt="logo">
                    <img src="/porto/assets/images/demoes/demo10/logoes/logo-6.png" width="245" height="45" alt="logo">
                </div><!-- End .brands-slider -->
            </div>
@section('footer')
    @include('porto.demo10.footer')
@endsection

@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
