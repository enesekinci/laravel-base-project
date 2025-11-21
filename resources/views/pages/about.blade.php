@extends('layouts.porto')

@section('header')
    @include('pages.header')
@endsection

@section('content')
@php
    $headerBackground = $pageBackground ?? '/porto/assets/images/page-header-bg.jpg';
@endphp
<div class="page-header page-header-bg text-left"
                style="background: 50%/cover #D4E1EA url('{{ $headerBackground }}');">
                <div class="container">
                    <h1>
                        <span>{{ __('About Us') }}</span>
                        {{ $pageTitle ?? __('Our Company') }}
                    </h1>
                    <a href="{{ route('page', ['page' => 'contact']) }}" class="btn btn-dark">
                        {{ __('Contact') }}
                    </a>
                </div><!-- End .container -->
            </div><!-- End .page-header -->

            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('page', ['page' => 'index']) }}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('About Us') }}</li>
                    </ol>
                </div><!-- End .container -->
            </nav>

            <div class="about-section">
                <div class="container">
                    <h2 class="subtitle">{{ __('Our Story') }}</h2>
                    @if(!empty($aboutStory))
                        {!! $aboutStory !!}
                    @else
                        <p>{{ __('Our team keeps innovating to deliver delightful commerce experiences for our customers.') }}</p>
                    @endif

                    @if(!empty($aboutQuote))
                        <p class="lead">“ {{ $aboutQuote }} ”</p>
                    @endif
                </div><!-- End .container -->
            </div><!-- End .about-section -->

            <div class="features-section bg-gray">
                <div class="container">
                    <h2 class="subtitle">{{ __('Why Choose Us') }}</h2>
                    <div class="row">
                        @forelse($featureBoxes as $feature)
                            <div class="col-lg-4">
                                <div class="feature-box bg-white">
                                    @if(!empty($feature['icon']))
                                        <i class="{{ $feature['icon'] }}"></i>
                                    @endif

                                    <div class="feature-box-content p-0">
                                        <h3>{{ $feature['title'] ?? '' }}</h3>
                                        @if(!empty($feature['subtitle']))
                                            <p class="text-muted mb-1">{{ $feature['subtitle'] }}</p>
                                        @endif
                                        <p>{{ $feature['description'] ?? '' }}</p>
                                    </div><!-- End .feature-box-content -->
                                </div><!-- End .feature-box -->
                            </div><!-- End .col-lg-4 -->
                        @empty
                            <div class="col-12">
                                <p class="text-muted mb-0">{{ __('No feature boxes have been configured yet.') }}</p>
                            </div>
                        @endforelse
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .features-section -->

            <div class="testimonials-section">
                <div class="container">
                    <h2 class="subtitle text-center">{{ __('Happy Clients') }}</h2>

                    <div class="testimonials-carousel owl-carousel owl-theme images-left" data-owl-options="{
						'margin': 20,
                        'lazyLoad': true,
                        'autoHeight': true,
                        'dots': false,
                        'responsive': {
                            '0': {
                                'items': 1
                            },
                            '992': {
                                'items': 2
                            }
                        }
                    }">
                        @forelse($testimonials as $testimonial)
                            <div class="testimonial">
                                <div class="testimonial-owner">
                                    <figure>
                                        <img src="{{ $testimonial['image'] ?? '/porto/assets/images/clients/client1.png' }}" alt="client">
                                    </figure>

                                    <div>
                                        <strong class="testimonial-title">{{ $testimonial['name'] ?? '' }}</strong>
                                        <span>{{ $testimonial['title'] ?? '' }}</span>
                                    </div>
                                </div><!-- End .testimonial-owner -->

                                <blockquote>
                                    <p>{{ $testimonial['quote'] ?? '' }}</p>
                                </blockquote>
                            </div><!-- End .testimonial -->
                        @empty
                            <div class="testimonial text-center">
                                <blockquote class="mb-0">
                                    <p>{{ __('Add testimonials from the admin panel to showcase customer happiness.') }}</p>
                                </blockquote>
                            </div>
                        @endforelse
                    </div><!-- End .testimonials-slider -->
                </div><!-- End .container -->
            </div><!-- End .testimonials-section -->

            <div class="counters-section bg-gray">
                <div class="container">
                    <div class="row">
                        @forelse($counters as $counter)
                            <div class="col-6 col-md-4 count-container">
                                <div class="count-wrapper{{ !empty($counter['line_height']) ? ' ' . $counter['line_height'] : '' }}">
                                    <span class="count-to"
                                        data-fromvalue="0"
                                        data-tovalue="{{ $counter['value'] ?? 0 }}"
                                        data-duration="{{ $counter['duration'] ?? 2000 }}"
                                        @if(!empty($counter['append'])) data-append="{{ $counter['append'] }}" @endif
                                    >0</span>
                                </div><!-- End .count-wrapper -->
                                <h4 class="count-title">{{ strtoupper($counter['label'] ?? '') }}</h4>
                            </div><!-- End .col-md-4 -->
                        @empty
                            <div class="col-12">
                                <p class="text-center text-muted mb-0">{{ __('Counters will appear here once configured from the admin panel.') }}</p>
                            </div>
                        @endforelse
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .counters-section -->
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
