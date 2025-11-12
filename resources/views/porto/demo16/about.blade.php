@extends('layouts.porto')

@section('header')
    @include('porto.demo16.header')
@endsection

@section('footer')
    @include('porto.demo16.footer')
@endsection

@section('content')
<div class="page-header page-header-bg text-left"
                style="background-image: url('/porto/assets/images/demoes/demo16/banners/category-bg-1.jpg');">
                <div class="container">
                    <h1 class="text-uppercase">
                        <span>check our</span>
                        history</h1>
                </div>
                <!-- End .container -->
            </div>
            <section class="info-section">
                <div class="section-content mx-auto">
                    <h4 class="section-subtitle">what we are</h4>
                    <h3 class="section-title">about us</h3>
                    <p class="section-text">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry’s standard dummy
                        text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
                        make
                        a type specimen book. It has survived not only five centuries, but also the leap into electronic
                        typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release
                        of
                        Letraset sheets containing Lorem Ipsum passages
                    </p>
                </div>
            </section>
            <section class="service-section"
                style="background-image: url('/porto/assets/images/demoes/demo16/banners/category-bg-2.jpg');">
                <div class="container">
                    <div class="section-content ml-auto">
                        <h4 class="section-subtitle">speciality</h4>
                        <h3 class="section-title">why choose us</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="icon-support"></i>
                                    <div class="info-box-content">
                                        <h4>Online support</h4>
                                        <p class="body-text">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="icon-shipping"></i>
                                    <div class="info-box-content">
                                        <h4>Free shipping & return</h4>
                                        <p class="text-body">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="icon-money"></i>
                                    <div class="info-box-content">
                                        <h4>Money back guarantee</h4>
                                        <p class="text-body">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="icon-cat-shirt"></i>
                                    <div class="info-box-content">
                                        <h4>New styles every day</h4>
                                        <p class="text-body">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="team-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <h4 class="section-subtitle">our</h4>
                            <h3 class="section-title">team</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and Lorem typesetting industry looking
                                Ipsum
                                has been.</p>
                        </div>
                        <div class="col-lg-9">
                            <div class="owl-carousel owl-simple owl-theme" data-owl-options="{
                                    'nav': true, 
                                    'dots': false,   
                                    'margin': 25,
                                    'loop': true,
                                    'responsive': {
                                        '576': {
                                            'items':1
                                        },
                                        '768': {
                                            'items':2
                                        },
                                        '992': {
                                            'items':3
                                        }
                                    }
                                }">
                                <div class="member">
                                    <img src="/porto/assets/images/demoes/demo16/team/1.jpg" alt="member name" width="250"
                                        height="270">
                                    <h3 class="member-title">JANE DOE</h3>
                                </div>
                                <div class="member">
                                    <img src="/porto/assets/images/demoes/demo16/team/2.jpg" alt="member name" width="250"
                                        height="270">
                                    <h3 class="member-title">JESSICA DOE</h3>
                                </div>
                                <div class="member">
                                    <img src="/porto/assets/images/demoes/demo16/team/3.jpg" alt="member name" width="250"
                                        height="270">
                                    <h3 class="member-title">RICK EDWARD DOE</h3>
                                </div>
                                <div class="member">
                                    <img src="/porto/assets/images/demoes/demo16/team/4.jpg" alt="member name" width="250"
                                        height="270">
                                    <h3 class="member-title">MELINDA WOLOSKY</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
@section('footer')
    @include('porto.demo16.footer')
@endsection

@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
