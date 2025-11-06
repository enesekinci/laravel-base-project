@extends('layouts.porto')

@section('top-notice')
    @include('components.porto.demo17.top-notice')
@endsection

@section('header')
    @include('components.porto.demo17.header')
@endsection

@section('footer')
    @include('components.porto.demo17.footer')
@endsection

@section('content')
<nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/porto/demo17.html">
                                <i class="icon-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ol>
                </div>
                <!-- End .container -->
            </nav>

            <div class="container">
                <div class="row">
                    <div class="describe-section col-lg-8 offset-lg-2">
                        <div class="text-center">
                            <h2 class="title">Who we are</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                                in
                                voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.
                            </p>
                        </div>
                        <!-- End .heading -->
                    </div>
                    <!-- End .col-lg-8 -->
                </div>
                <!-- End .row -->

                <img src="/porto/assets/images/demoes/demo17/about/bg-1.jpg" alt="about image" width="1170" height="413">

                <div class="row mt-5">
                    <div class="col-md-10 offset-md-1 col-lg-6 offset-lg-3">
                        <div class="row">
                            <div class="col-sm-4 count-container text-center">
                                <div class="count-wrapper">
                                    <span class="count-to" data-fromvalue="0" data-tovalue="50" data-speed="2000"
                                        data-append="+">0</span>
                                </div>
                                <!-- End .count-wrapper -->
                                <h4 class="count-title">Fashion Brands</h4>
                            </div>
                            <!-- End .col-sm-4 -->
                            <div class="col-sm-4 count-container text-center">
                                <div class="count-wrapper">
                                    <span class="count-to" data-fromvalue="0" data-tovalue="150" data-speed="2000"
                                        data-append="K+">0</span>
                                </div>
                                <!-- End .count-wrapper -->
                                <h4 class="count-title">Fashion Products</h4>
                            </div>
                            <!-- End .col-sm-4 -->
                            <div class="col-sm-4 count-container text-center">
                                <div class="count-wrapper">
                                    <span class="count-to" data-fromvalue="0" data-tovalue="250" data-speed="2000"
                                        data-append="K+">0</span>
                                </div>
                                <!-- End .count-wrapper -->
                                <h4 class="count-title">Regular Buyers</h4>
                            </div>
                            <!-- End .col-sm-4 -->
                        </div>
                        <!-- End .row -->
                    </div>
                    <!-- End .col-lg-6 -->
                </div>
                <!-- End .row -->
            </div>
            <!-- End .container -->

            <div class="history-section">
                <div class="container">
                    <h2 class="title text-center mb-3">Our History</h2>

                    <div class="row align-items-md-stretch">
                        <div class="col-md-4">
                            <img src="/porto/assets/images/demoes/demo17/about/view.jpg" alt="image">
                        </div>
                        <div class="col-md-8">
                            <div class="tab-box row">
                                <div class="col-md-9">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="date-2021" role="tabpanel"
                                            aria-labelledby="2021-tab">
                                            <h3>2021</h3>
                                            <p>Eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                                minim
                                                veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                                commodo
                                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                                                esse
                                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
                                        </div>
                                        <div class="tab-pane fade" id="date-2017" role="tabpanel"
                                            aria-labelledby="2017-tab">
                                            <h3>2017</h3>
                                            <p>Eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                                minim
                                                veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                                commodo
                                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                                                esse
                                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
                                        </div>
                                        <div class="tab-pane fade" id="date-2014" role="tabpanel"
                                            aria-labelledby="2014-tab">
                                            <h3>2014</h3>
                                            <p>Eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                                minim
                                                veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                                commodo
                                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                                                esse
                                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
                                        </div>
                                        <div class="tab-pane fade" id="date-2012" role="tabpanel"
                                            aria-labelledby="2012-tab">
                                            <h3>2012</h3>
                                            <p>Eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                                minim
                                                veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                                commodo
                                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                                                esse
                                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <ul class="nav nav-history" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="2021-tab" data-toggle="tab" href="#date-2021"
                                                role="tab" aria-controls="date-2021" aria-selected="true">2021</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="2017-tab" data-toggle="tab" href="#date-2017"
                                                role="tab" aria-controls="date-2017" aria-selected="false">2017</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="2014-tab" data-toggle="tab" href="#date-2014"
                                                role="tab" aria-controls="date-2014" aria-selected="false">2014</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="2012-tab" data-toggle="tab" href="#date-2012"
                                                role="tab" aria-controls="date-2012" aria-selected="false">2012</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End .row -->
                </div>
                <!-- End .tab-pane -->
            </div>
@section('footer')
    @include('components.porto.demo17.footer')
@endsection

@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
