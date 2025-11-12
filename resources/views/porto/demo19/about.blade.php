@extends('layouts.porto')

@section('top-notice')
    @include('porto.demo19.top-notice')
@endsection

@section('header')
    @include('porto.demo19.header')
@endsection

@section('footer')
    @include('porto.demo19.footer')
@endsection

@section('content')
<div class="container-fluid">
                <nav aria-label="breadcrumb" class="breadcrumb-nav mb-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/porto/demo19.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About us</li>
                    </ol>
                </nav>
            </div>

            <div class="main-container mt-3">
                <div class="container-fluid">
                    <div class="category-list mb-2 mb-md-0" id="category-list">
                        <ul class="nav category-list-nav">
                            <li class="nav-item green">
                                <a href="/porto/demo19-shop.html" class="nav-link">
                                    <span class="cat-list-icon"><i class="icon-cat-shirt"></i></span>
                                    <span class="cat-list-text">Fashion &amp; Clothes</span>
                                </a>
                            </li>
                            <li class="nav-item orange">
                                <a href="/porto/demo19-shop.html" class="nav-link">
                                    <span class="cat-list-icon"><i class="icon-cat-computer"></i></span>
                                    <span class="cat-list-text">Electronics &amp; Computers</span>
                                </a>
                            </li>
                            <li class="nav-item green">
                                <a href="/porto/demo19-shop.html" class="nav-link">
                                    <span class="cat-list-icon"><i class="icon-cat-toys"></i></span>
                                    <span class="cat-list-text">Toys &amp; Hobbies</span>
                                </a>
                            </li>
                            <li class="nav-item yellow">
                                <a href="/porto/demo19-shop.html" class="nav-link">
                                    <span class="cat-list-icon"><i class="icon-cat-garden"></i></span>
                                    <span class="cat-list-text">Home &amp; Garden</span>
                                </a>
                            </li>
                            <li class="nav-item gray">
                                <a href="/porto/demo19-shop.html" class="nav-link">
                                    <span class="cat-list-icon"><i class="icon-cat-sport"></i></span>
                                    <span class="cat-list-text">Sports &amp; Fitness</span>
                                </a>
                            </li>
                            <li class="nav-item lightblue">
                                <a href="/porto/demo19-shop.html" class="nav-link">
                                    <span class="cat-list-icon"><i class="icon-cat-gift"></i></span>
                                    <span class="cat-list-text">Gifts</span>
                                </a>
                            </li>
                        </ul>
                    </div><!-- End .category-list -->

                    <div class="banner">
                        <figure>
                            <img src="/porto/assets/images/demoes/demo19/top-bg.jpg" alt="page-header" width="1620"
                                height="398">
                        </figure>
                    </div>

                    <section class="about-section">
                        <h2 class="subtitle text-center text-uppercase">About Us</h2>

                        <div class="row">
                            <div class="col-lg-7 mx-auto">
                                <p class="text-center mb-0">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever
                                    since the 1500s, when an unknown printer took a galley of type and scrambled it to
                                    make a type specimen book. It has survived not only five centuries, but also the
                                    leap into electronic typesetting, remaining essentially unchanged. It was
                                    popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                                    passages</p>
                            </div>
                        </div>
                    </section>

                    <hr />

                    <section class="team-section">
                        <h2 class="subtitle text-center text-uppercase">About Us</h2>

                        <div class="grid row">
                            <div class="grid-item grid-col-sizer col-6 col-md-4 col-lg-3 col-5col-1 mb-2">
                                <div class="team-info">
                                    <figure class="zoom-effect">
                                        <a href="#">
                                            <img src="/porto/assets/images/demoes/demo19/team/team2.jpg"
                                                data-zoom-image="/porto/assets/images/demoes/demo19/team/team2.jpg"
                                                class="w-100" width="270" height="319" alt="Team" />
                                        </a>

                                        <span class="prod-full-screen">
                                            <i class="fas fa-search"></i>
                                        </span>
                                    </figure>

                                    <h5 class="team-name mb-0 text-center">John Doe</h5>
                                    <p class="text-center">Leader</p>
                                </div>
                            </div>
                            <div class="grid-item col-6 col-md-4 col-lg-3 col-5col-1 mb-2">
                                <div class="team-info">
                                    <figure class="zoom-effect">
                                        <a href="#">
                                            <img src="/porto/assets/images/demoes/demo19/team/team1.jpg"
                                                data-zoom-image="/porto/assets/images/demoes/demo19/team/team1.jpg"
                                                class="w-100" width="270" height="319" alt="Team" />
                                        </a>

                                        <span class="prod-full-screen">
                                            <i class="fas fa-search"></i>
                                        </span>
                                    </figure>

                                    <h5 class="team-name mb-0 text-center">Jessica Doe</h5>
                                    <p class="text-center">Marketing Manager</p>
                                </div>
                            </div>
                            <div class="grid-item col-6 col-md-4 col-lg-3 col-5col-1 mb-2">
                                <div class="team-info">
                                    <figure class="zoom-effect">
                                        <a href="#">
                                            <img src="/porto/assets/images/demoes/demo19/team/team3.jpg"
                                                data-zoom-image="/porto/assets/images/demoes/demo19/team/team3.jpg"
                                                class="w-100" width="270" height="319" alt="Team" />
                                        </a>

                                        <span class="prod-full-screen">
                                            <i class="fas fa-search"></i>
                                        </span>
                                    </figure>

                                    <h5 class="team-name mb-0 text-center">Rick Edward Doe</h5>
                                    <p class="text-center">Web Developer</p>
                                </div>
                            </div>
                            <div class="grid-item col-6 col-md-4 col-lg-3 col-5col-1 mb-2">
                                <div class="team-info">
                                    <figure class="zoom-effect">
                                        <a href="#">
                                            <img src="/porto/assets/images/demoes/demo19/team/team4.jpg"
                                                data-zoom-image="/porto/assets/images/demoes/demo19/team/team4.jpg"
                                                class="w-100" width="270" height="319" alt="Team" />
                                        </a>

                                        <span class="prod-full-screen">
                                            <i class="fas fa-search"></i>
                                        </span>
                                    </figure>

                                    <h5 class="team-name mb-0 text-center">Melinda Wolosky</h5>
                                    <p class="text-center">Web Designer</p>
                                </div>
                            </div>
                            <div class="grid-item col-6 col-md-4 col-lg-3 col-5col-1 mb-2">
                                <div class="team-info">
                                    <figure class="zoom-effect">
                                        <a href="#">
                                            <img src="/porto/assets/images/demoes/demo19/team/team2.jpg"
                                                data-zoom-image="/porto/assets/images/demoes/demo19/team/team2.jpg"
                                                class="w-100" width="270" height="319" alt="Team" />
                                        </a>

                                        <span class="prod-full-screen">
                                            <i class="fas fa-search"></i>
                                        </span>
                                    </figure>

                                    <h5 class="team-name mb-0 text-center">Robert Doe</h5>
                                    <p class="text-center">App Developer</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="testimonials-section">
                        <h2 class="subtitle text-center text-uppercase">Happy Buyers</h2>

                        <div class="testimonials-slider owl-carousel owl-theme mb-2" data-togggle="owl"
                            data-owl-options="{
                            'dots': false,
                            'nav': false,
                            'responsive': {
                                '768': {
                                    'items': 2
                                }
                            }
                        }">
                            <div class="testimonial">
                                <div class="row">
                                    <div class="col-md-4 col-lg-2 text-center text-md-right">
                                        <figure>
                                            <img src="/porto/assets/images/clients/client1.png" alt="client">
                                        </figure>
                                    </div>

                                    <div class="col-lg-10 text-center text-md-left">
                                        <blockquote>
                                            <p>Remaining essentially unchanged. It was popularised in the 1960s with the
                                                release of Letraset sheets containing Lorem Ipsum passages, and more
                                                recently with desktop publishing software.</p>

                                            <a href="#">
                                                <strong class="testimonial-title">John Smith Doe</strong>
                                                <span class="d-inline-block">CEO</span>
                                            </a>
                                        </blockquote>
                                    </div>
                                </div>
                            </div><!-- End .testimonial -->
                            <div class="testimonial">
                                <div class="row">
                                    <div class="col-md-4 col-lg-2 text-center text-md-right">
                                        <figure>
                                            <img src="/porto/assets/images/clients/client2.png" alt="client">
                                        </figure>
                                    </div><!-- End .testimonial-owner -->

                                    <div class="col-lg-10 text-center text-md-left">
                                        <blockquote>
                                            <p>Remaining essentially unchanged. It was popularised in the 1960s with the
                                                release of Letraset sheets containing Lorem Ipsum passages, and more
                                                recently with desktop publishing software.</p>

                                            <a href="#">
                                                <strong class="testimonial-title">Bob Smith Doe</strong>
                                                <span class="d-inline-block">Founder</span>
                                            </a>
                                        </blockquote>
                                    </div>
                                </div>
                            </div><!-- End .testimonial -->
                        </div>
                    </section>

                    <section class="brands-section">
                        <h2 class="subtitle text-center text-uppercase mb-3">Our Partners</h2>

                        <div class="container">
                            <div class="brands-slider owl-carousel owl-theme mb-2" data-owl-options="{
                                'margin': 0,
                                'navText': ['<i class=icon-angle-left>','<i class=icon-angle-right>'],
                                'nav': true,
                                'responsive': {
                                    '768': {
                                        'items': 4
                                    },
                                    '991': {
                                        'items': 5
                                    },
                                    '1200': {
                                        'items': 5
                                    }
                                }
                            }">
                                <img src="/porto/assets/images/demoes/demo19/logos/logo-1.png" width="245" height="45"
                                    alt="brand">
                                <img src="/porto/assets/images/demoes/demo19/logos/logo-2.png" width="245" height="45"
                                    alt="brand">
                                <img src="/porto/assets/images/demoes/demo19/logos/logo-3.png" width="245" height="45"
                                    alt="brand">
                                <img src="/porto/assets/images/demoes/demo19/logos/logo-4.png" width="245" height="45"
                                    alt="brand">
                                <img src="/porto/assets/images/demoes/demo19/logos/logo-5.png" width="245" height="45"
                                    alt="brand">
                                <img src="/porto/assets/images/demoes/demo19/logos/logo-6.png" width="245" height="45"
                                    alt="brand">
                            </div>
                        </div>
                    </section>
                </div>
            </div>
@section('footer')
    @include('porto.demo19.footer')
@endsection

@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
