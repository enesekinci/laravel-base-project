@extends('layouts.porto')

@section('header')
    @include('porto.demo12.header')
@endsection

@section('footer')
    @include('porto.demo12.footer')
@endsection

@section('content')
<div class="page-header page-header-bg text-left"
                style="background: 50%/cover #D4E1EA url('/porto/assets/images/demoes/demo12/page-header-bg.jpg');">
                <div class="container">
                    <h1>WHO WE ARE</h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->

            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/porto/demo12.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ol>
                </div><!-- End .container -->
            </nav>

            <div class="container">
                <div class="history-section mt-4 pb-2 mb-6">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <h2 class="about-title font4">ABOUT US</h2>
                            <p class="text-bg">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. has been the
                                industry’s standard dummy
                            </p>
                            <p>long established fact that a reader will be distracted by the readable content of a page
                                when
                                looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
                                normal
                                distribution of letters, as opposed to using ‘Content here, content here’, making it
                                look
                                like readable English. Many desktop publishing packages and web page.</p>
                        </div>
                        <div class="col-md-4">
                            <figure>
                                <img class="m-auto" src="/porto/assets/images/demoes/demo12/about/history.jpg" width="307"
                                    height="371" alt="history image" />
                            </figure>
                        </div>
                        <div class="col-md-4">
                            <div class="accordion-section" id="accordion">
                                <div class="card card-accordion">
                                    <a class="card-header" href="#" data-toggle="collapse" data-target="#collapseOne"
                                        aria-expanded="true" aria-controls="collapseOne">
                                        Company History
                                    </a>

                                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                        <p>leap into electronic typesetting, remaining essentially unchanged. It was
                                            popularised in the 1960s with the release of Letraset sheets containing
                                            Lorem Ipsum passages, and more recently with desktop.</p>
                                    </div>
                                </div>

                                <div class="card card-accordion">
                                    <a class="card-header collapsed" href="#" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                        Our Vision
                                    </a>

                                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                        <p>leap into electronic typesetting, remaining essentially unchanged. It was
                                            popularised in the 1960s with the release of Letraset sheets containing
                                            Lorem Ipsum passages, and more recently with desktop.</p>
                                    </div>
                                </div>

                                <div class="card card-accordion">
                                    <a class="card-header collapsed" href="#" data-toggle="collapse"
                                        data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                        Our Mission
                                    </a>

                                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                                        <p>leap into electronic typesetting, remaining essentially unchanged. It was
                                            popularised in the 1960s with the release of Letraset sheets containing
                                            Lorem Ipsum passages, and more recently with desktop.</p>
                                    </div>
                                </div>

                                <div class="card card-accordion">
                                    <a class="card-header collapsed" href="#" data-toggle="collapse"
                                        data-target="#collapseFour" aria-expanded="true" aria-controls="collapseThree">
                                        Funcfacts
                                    </a>

                                    <div id="collapseFour" class="collapse" data-parent="#accordion">
                                        <p>leap into electronic typesetting, remaining essentially unchanged. It was
                                            popularised in the 1960s with the release of Letraset sheets containing
                                            Lorem Ipsum passages, and more recently with desktop.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="team-section">
                <div class="container text-center">
                    <h2 class="about-title text-left font4">ABOUT US</h2>

                    <div class="row justify-content-center">
                        <div class="col-md-3 col-6">
                            <div class="team-info mb-3">
                                <figure>
                                    <a href="#">
                                        <img src="/porto/assets/images/demoes/demo10/team/team2.jpg"
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
                                        <img src="/porto/assets/images/demoes/demo10/team/team1.jpg"
                                            data-zoom-image="/porto/assets/images/demoes/demo10/team/team2.jpg" class="w-100"
                                            width="270" height="319" alt="Team" />
                                    </a>

                                    <span class="prod-full-screen">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </figure>

                                <h5 class="team-name text-center mb-0">Jessica Doe</h5>
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

                                <h5 class="team-name text-center mb-0">Rick Edward Doe</h5>
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

                                <h5 class="team-name text-center mb-0">Melinda Wolosky</h5>
                            </div>
                        </div><!-- End .col-lg-4 -->
                    </div><!-- End .row -->

                    <a class="btn font4" href="#">JOIN OUR TEAM</a>
                </div>
            </div>

            <div class="testimonials-section">
                <div class="container">
                    <h2 class="about-title font4 text-center">TESTIMONIALS</h2>

                    <div class="row">
                        <div class="col-md-12 offset-xl-3 col-xl-6 offset-lg-2 col-lg-8">
                            <div class="testimonial">
                                <blockquote style="color:#5e6065">
                                    <p>Long established fact that a reader will be distracted by the readable content of
                                        a page
                                        when looking at its layout. The point of using Lorem Ipsum is that it has a
                                        more-or-less
                                        normal distribution of letters, as opposed to using ‘Content here, content here
                                    </p>
                                </blockquote>

                                <div class="testimonial-owner justify-content-center text-center flex-column">
                                    <figure>
                                        <img src="/porto/assets/images/demoes/demo12/clients/client1.jpg" alt="client">
                                    </figure>

                                    <div>
                                        <h5 class="testimonial-title">John Doe</h5>
                                        <span>Porto Founder</span>
                                    </div>
                                </div><!-- End .testimonial-owner -->
                            </div><!-- End .testimonial -->
                        </div>
                    </div>
                </div><!-- End .container -->
            </div><!-- End .testimonials-section -->
@section('footer')
    @include('porto.demo12.footer')
@endsection

@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
