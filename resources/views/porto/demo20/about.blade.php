@extends('layouts.porto')

@section('top-notice')
    @include('components.porto.demo20.top-notice')
@endsection

@section('header')
    @include('components.porto.demo20.header')
@endsection

@section('footer')
    @include('components.porto.demo20.footer')
@endsection

@section('content')
<div class="container">
                <nav aria-label="breadcrumb" class="breadcrumb-nav">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/porto/demo20.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ol>
                </nav>
            </div><!-- End .container -->


            <section class="about-section">
                <div class="container">
                    <h2 class="section-title text-uppercase">Who We Are</h2>

                    <div class="row">
                        <div class="col-lg-8">
                            <p class="pr-lg-4">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and scrambled it to make a type specimen
                                book. It has survived not only five centuries, but also the leap into electronic
                                typesetting, remaining essentially unchanged. posuere cubilia Curae; In eu libero
                                ligula. Fusce eget metus lorem, ac viverra leo. Vestibulum ante ipsum primis in faucibus
                                orci luctus et ultrices posuere cubilia Curae; In eu libero ligula. Fusce eget metus
                                lorem, ac viverra leo. desktop publishing software like Aldus PageMaker including
                                versions. was popularised in the 1960s with the release of Letraset sheets containing
                                Lorem Ipsum passages, and more recently.</p>
                        </div>
                        <div class="col-lg-4">
                            <div class="feature-boxes-container">
                                <div class="feature-box text-center mb-0">
                                    <i class="icon-shipped"></i>

                                    <div class="feature-box-content">
                                        <h3 class="text-uppercase">Free Shipping &amp; Return</h3>
                                        <p class="mb-0">Free shipping on all orders over $99.</p>
                                    </div>
                                </div>
                                <div class="feature-box text-center mb-0">
                                    <i class="icon-us-dollar"></i>

                                    <div class="feature-box-content">
                                        <h3 class="text-uppercase">Money Back Guarantee</h3>
                                        <p class="mb-0">100% money back guarantee</p>
                                    </div>
                                </div>
                                <div class="feature-box text-center mb-0">
                                    <i class="icon-online-support"></i>

                                    <div class="feature-box-content">
                                        <h3 class="text-uppercase">Online Support 24/7</h3>
                                        <p class="mb-0">Lorem ipsum dolor sit amet.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="team-section">
                <div class="container">
                    <h2 class="section-title text-uppercase">Our Team</h2>

                    <div class="grid row">
                        <div class="grid-item col-sm-6 col-md-4 col-xl-3 mb-2">
                            <div class="team-info">
                                <figure class="zoom-effect">
                                    <a href="#">
                                        <img src="/porto/assets/images/demoes/demo20/team/team1.jpg"
                                            data-zoom-image="/porto/assets/images/demoes/demo20/team/team1.jpg" class="w-100"
                                            width="270" height="319" alt="Team" />
                                    </a>

                                    <span class="prod-full-screen">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </figure>

                                <h5 class="team-name mt-2 mb-1 text-center text-uppercase"><a href="#">Jane Doe</a></h5>
                            </div>
                        </div>
                        <div class="grid-item grid-col-sizer col-sm-6 col-md-4 col-xl-3 mb-2">
                            <div class="team-info">
                                <figure class="zoom-effect">
                                    <a href="#">
                                        <img src="/porto/assets/images/demoes/demo20/team/team2.jpg"
                                            data-zoom-image="/porto/assets/images/demoes/demo20/team/team2.jpg" class="w-100"
                                            width="270" height="319" alt="Team" />
                                    </a>

                                    <span class="prod-full-screen">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </figure>

                                <h5 class="team-name mt-2 mb-1 text-center text-uppercase"><a href="#">John Doe</a></h5>
                            </div>
                        </div>
                        <div class="grid-item col-sm-6 col-md-4 col-xl-3 mb-2">
                            <div class="team-info">
                                <figure class="zoom-effect">
                                    <a href="#">
                                        <img src="/porto/assets/images/demoes/demo20/team/team3.jpg"
                                            data-zoom-image="/porto/assets/images/demoes/demo20/team/team3.jpg" class="w-100"
                                            width="270" height="319" alt="Team" />
                                    </a>

                                    <span class="prod-full-screen">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </figure>

                                <h5 class="team-name mt-2 mb-1 text-center text-uppercase"><a href="#">George Doe</a>
                                </h5>
                            </div>
                        </div>
                        <div class="grid-item col-sm-6 col-md-4 col-xl-3 mb-2">
                            <div class="team-info">
                                <figure class="zoom-effect">
                                    <a href="#">
                                        <img src="/porto/assets/images/demoes/demo20/team/team4.jpg"
                                            data-zoom-image="/porto/assets/images/demoes/demo20/team/team4.jpg" class="w-100"
                                            width="270" height="319" alt="Team" />
                                    </a>

                                    <span class="prod-full-screen">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </figure>

                            </div>
                            <h5 class="team-name mt-2 mb-1 text-center text-uppercase"><a href="#">Alice Doe</a></h5>
                        </div>
                    </div>

                    <div class="view-more-container text-center">
                        <a href="#" class="btn btn-dark">View More</a>
                    </div>
                </div>
            </section>

            <section class="history-section mb-3">
                <div class="container">
                    <h2 class="section-title text-uppercase">Our History</h2>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="history">
                                <div class="row no-gutters m-0">
                                    <div class="col-sm-auto">
                                        <figure>
                                            <img src="/porto/assets/images/demoes/demo20/history/history-1.jpg" alt="history"
                                                width="197" height="248">
                                            <h3 class="mb-0">2000</h3>
                                        </figure>
                                    </div>
                                    <div class="col">
                                        <div class="history-content">
                                            <p>
                                                Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry. Lorem Ipsum has been the industry’s standard dummy text ever
                                                since the 1500s, when an unknown printer took.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="history">
                                <div class="row no-gutters m-0">
                                    <div class="col-sm-auto">
                                        <figure>
                                            <img src="/porto/assets/images/demoes/demo20/history/history-2.jpg" alt="history"
                                                width="197" height="248">
                                            <h3 class="mb-0">2010</h3>
                                        </figure>
                                    </div>
                                    <div class="col">
                                        <div class="history-content">
                                            <p>
                                                Readable English. Many desktop publishing packages and web page editors
                                                now use Lorem Ipsum as their default model text, and a search for ‘lorem
                                                ipsum’ will uncover many web sites.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="history">
                                <div class="row no-gutters m-0">
                                    <div class="col-sm-auto">
                                        <figure>
                                            <img src="/porto/assets/images/demoes/demo20/history/history-3.jpg" alt="history"
                                                width="197" height="248">
                                            <h3 class="mb-0">2015</h3>
                                        </figure>
                                    </div>
                                    <div class="col">
                                        <div class="history-content">
                                            <p>
                                                There are many variations of passages of Lorem Ipsum available, but the
                                                majority have suffered alteration in some form, by injected humour, or
                                                randomised words which don’t look even slightly.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="history">
                                <div class="row no-gutters m-0">
                                    <div class="col-sm-auto">
                                        <figure>
                                            <img src="/porto/assets/images/demoes/demo20/history/history-4.jpg" alt="history"
                                                width="197" height="248">
                                            <h3>2021</h3>
                                        </figure>
                                    </div>
                                    <div class="col">
                                        <div class="history-content">
                                            <p>
                                                The standard chunk of Lorem Ipsum used since the 1500s is reproduced
                                                below for those interested. Sections 1.10.32 and 1.10.33 from “de
                                                Finibus Bonorum et Malorum.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
@section('footer')
    @include('components.porto.demo20.footer')
@endsection

@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
