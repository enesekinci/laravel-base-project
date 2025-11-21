@extends('layouts.porto')

@section('header')
    @include('components.porto.header')
@endsection

@section('content')
		@if($pageBackground || $pageTitle || $pageSubtitle)
			<div class="page-header page-header-bg text-left"
				style="background: 50%/cover #D4E1EA url('{{ $pageBackground ?? '/porto/assets/images/page-header-bg.jpg' }}');">
				<div class="container">
					@if($pageTitle || $pageSubtitle)
						<h1>
							@if($pageTitle)<span>{{ $pageTitle }}</span>@endif
							@if($pageSubtitle){{ $pageSubtitle }}@endif
						</h1>
					@endif
					<a href="/porto/contact.html" class="btn btn-dark">{{ __('Contact') }}</a>
				</div><!-- End .container -->
			</div><!-- End .page-header -->
		@endif

		<nav aria-label="breadcrumb" class="breadcrumb-nav">
			<div class="container">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('page', ['page' => 'index']) }}"><i class="icon-home"></i></a></li>
					<li class="breadcrumb-item active" aria-current="page">About Us</li>
				</ol>
			</div><!-- End .container -->
		</nav>

		@if($aboutStory || $aboutQuote)
			<div class="about-section">
				<div class="container">
					@if($aboutStory)
						<h2 class="subtitle">OUR STORY</h2>
						{!! nl2br(e($aboutStory)) !!}
					@endif

					@if($aboutQuote)
						<p class="lead">" {{ $aboutQuote }} "</p>
					@endif
				</div><!-- End .container -->
			</div><!-- End .about-section -->
		@endif

		@if(!empty($featureBoxes) && count($featureBoxes) > 0)
			<div class="features-section bg-gray">
				<div class="container">
					<h2 class="subtitle">WHY CHOOSE US</h2>
					<div class="row">
						@foreach($featureBoxes as $featureBox)
							<div class="col-lg-4">
								<div class="feature-box bg-white">
									@if($featureBox['icon'])
										<i class="{{ $featureBox['icon'] }}"></i>
									@endif
									<div class="feature-box-content p-0">
										@if($featureBox['title'])
											<h3>{{ $featureBox['title'] }}</h3>
										@endif
										@if($featureBox['description'])
											<p>{{ $featureBox['description'] }}</p>
										@endif
									</div>
								</div>
							</div>
						@endforeach
					</div><!-- End .row -->
				</div><!-- End .container -->
			</div><!-- End .features-section -->
		@endif

		@if(!empty($testimonials) && count($testimonials) > 0)
			<div class="testimonials-section">
				<div class="container">
					<h2 class="subtitle text-center">HAPPY CLIENTS</h2>
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
						@foreach($testimonials as $testimonial)
							<div class="testimonial">
								<div class="testimonial-owner">
									@if(!empty($testimonial['image']))
										<figure>
											<img src="{{ $testimonial['image'] }}" alt="{{ $testimonial['name'] ?? 'client' }}">
										</figure>
									@endif
									<div>
										@if(!empty($testimonial['name']))
											<strong class="testimonial-title">{{ $testimonial['name'] }}</strong>
										@endif
										@if(!empty($testimonial['position']))
											<span>{{ $testimonial['position'] }}</span>
										@endif
									</div>
								</div>
								@if(!empty($testimonial['message']))
									<blockquote>
										<p>{{ $testimonial['message'] }}</p>
									</blockquote>
								@endif
							</div>
						@endforeach
					</div><!-- End .testimonials-slider -->
				</div><!-- End .container -->
			</div><!-- End .testimonials-section -->
		@endif

		@if(!empty($counters) && count($counters) > 0)
			<div class="counters-section bg-gray">
				<div class="container">
					<div class="row">
						@foreach($counters as $counter)
							<div class="col-6 col-md-4 count-container">
								<div class="count-wrapper {{ !empty($counter['suffix']) && str_contains($counter['suffix'], '%') ? 'line-height-1' : '' }}">
									<span class="count-to" 
										  data-from="0" 
										  data-to="{{ $counter['value'] ?? 0 }}" 
										  data-speed="2000"
										  data-refresh-interval="50">{{ $counter['value'] ?? 0 }}</span>
									@if(!empty($counter['suffix']))
										<span>{{ $counter['suffix'] }}</span>
									@endif
								</div>
								@if(!empty($counter['title']))
									<h4 class="count-title">{{ $counter['title'] }}</h4>
								@endif
							</div>
						@endforeach
					</div><!-- End .row -->
				</div><!-- End .container -->
			</div><!-- End .counters-section -->
		@endif
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
