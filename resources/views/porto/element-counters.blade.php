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
								<li class="breadcrumb-item active" aria-current="page">Counters</li>
							</ol>
						</nav>
						<h1 class="page-title text-center text-white">Counters</h1>
					</div>
				</div>
			</div>

			<div class="container">
				<section class="default-section mt-5">
					<h3>Default</h3>
					<div class="row text-center">
						<div class="col-md-3">
							<h3 class="count-to mb-0" style="font-size: 5rem;" data-fromvalue="0" data-tovalue="19000"
								data-duration="3000" data-delimiter="," data-append="+">0</h3>
							<p style="font-size: 2rem;">Happy Clients</p>
						</div>
						<div class="col-md-3">
							<h3 class="count-to mb-0" style="font-size: 5rem;" data-fromvalue="0" data-tovalue="15"
								data-duration="3000">0</h3>
							<p style="font-size: 2rem;">Years in Business</p>
						</div>
						<div class="col-md-3">
							<h3 class="count-to mb-0" style="font-size: 5rem;" data-fromvalue="0" data-tovalue="352"
								data-duration="3000">0</h3>
							<p style="font-size: 2rem;">Cups of Coffee</p>
						</div>
						<div class="col-md-3">
							<h3 class="count-to mb-0" style="font-size: 5rem;" data-fromvalue="0" data-tovalue="178"
								data-duration="3000">0</h3>
							<p style="font-size: 2rem;">High Score</p>
						</div>
					</div>
				</section>
				<hr class="divider">
				<section class="size-section mt-5">
					<h3>Sizes</h3>
					<div class="row text-center">
						<div class="col-md-3">
							<h3 class="count-to mb-0" style="font-size: 3.5rem;" data-fromvalue="0" data-tovalue="19000"
								data-duration="3000" data-delimiter="," data-append="+">0</h3>
							<p style="font-size: 1.5rem;">Happy Clients</p>
						</div>
						<div class="col-md-3">
							<h3 class="count-to mb-0" style="font-size: 3.5rem;" data-fromvalue="0" data-tovalue="15"
								data-duration="3000">0</h3>
							<p style="font-size: 1.5rem;">Years in Business</p>
						</div>
						<div class="col-md-3">
							<h3 class="count-to mb-0" style="font-size: 3.5rem;" data-fromvalue="0" data-tovalue="352"
								data-duration="3000">0</h3>
							<p style="font-size: 1.5rem;">Cups of Coffee</p>
						</div>
						<div class="col-md-3">
							<h3 class="count-to mb-0" style="font-size: 3.5rem;" data-fromvalue="0" data-tovalue="178"
								data-duration="3000">0</h3>
							<p style="font-size: 1.5rem;">High Score</p>
						</div>
					</div>
					<div class="row text-center">
						<div class="col-md-3">
							<h3 class="count-to mb-0" style="font-size: 5rem;" data-fromvalue="0" data-tovalue="19000"
								data-duration="3000" data-delimiter="," data-append="+">0</h3>
							<p style="font-size: 2rem;">Happy Clients</p>
						</div>
						<div class="col-md-3">
							<h3 class="count-to mb-0" style="font-size: 5rem;" data-fromvalue="0" data-tovalue="15"
								data-duration="3000">0</h3>
							<p style="font-size: 2rem;">Years in Business</p>
						</div>
						<div class="col-md-3">
							<h3 class="count-to mb-0" style="font-size: 5rem;" data-fromvalue="0" data-tovalue="352"
								data-duration="3000">0</h3>
							<p style="font-size: 2rem;">Cups of Coffee</p>
						</div>
						<div class="col-md-3">
							<h3 class="count-to mb-0" style="font-size: 5rem;" data-fromvalue="0" data-tovalue="178"
								data-duration="3000">0</h3>
							<p style="font-size: 2rem;">High Score</p>
						</div>
					</div>
					<div class="row text-center">
						<div class="col-md-3">
							<h3 class="count-to mb-0" style="font-size: 6rem;" data-fromvalue="0" data-tovalue="19000"
								data-duration="3000" data-delimiter="," data-append="+">0</h3>
							<p style="font-size: 2.5rem;">Happy Clients</p>
						</div>
						<div class="col-md-3">
							<h3 class="count-to mb-0" style="font-size: 6rem;" data-fromvalue="0" data-tovalue="15"
								data-duration="3000">0</h3>
							<p style="font-size: 2.5rem;">Years in Business</p>
						</div>
						<div class="col-md-3">
							<h3 class="count-to mb-0" style="font-size: 6rem;" data-fromvalue="0" data-tovalue="352"
								data-duration="3000">0</h3>
							<p style="font-size: 2.5rem;">Cups of Coffee</p>
						</div>
						<div class="col-md-3">
							<h3 class="count-to mb-0" style="font-size: 6rem;" data-fromvalue="0" data-tovalue="178"
								data-duration="3000">0</h3>
							<p style="font-size: 2.5rem;">High Score</p>
						</div>
					</div>
				</section>
				<hr class="divider">
			</div>
			<section class="color-section mt-5">
				<div class="container">
					<h3>Colors</h3>
					<div class="row text-center">
						<div class="col-md-3">
							<h3 class="count-to text-primary mb-0" style="font-size: 5rem;" data-fromvalue="0"
								data-tovalue="19000" data-duration="3000" data-delimiter="," data-append="+">0</h3>
							<p style="font-size: 2rem;">Happy Clients</p>
						</div>
						<div class="col-md-3">
							<h3 class="count-to text-secondary mb-0" style="font-size: 5rem;" data-fromvalue="0"
								data-tovalue="15" data-duration="3000">0</h3>
							<p style="font-size: 2rem;">Years in Business</p>
						</div>
						<div class="col-md-3">
							<h3 class="count-to text-info mb-0" style="font-size: 5rem;" data-fromvalue="0"
								data-tovalue="352" data-duration="3000">0</h3>
							<p style="font-size: 2rem;">Cups of Coffee</p>
						</div>
						<div class="col-md-3">
							<h3 class="count-to text-dark mb-0" style="font-size: 5rem;" data-fromvalue="0"
								data-tovalue="178" data-duration="3000">0</h3>
							<p style="font-size: 2rem;">High Score</p>
						</div>
					</div>
				</div>
				<div style="background-color: #f4f4f4; border-top: 5px solid #f1f1f1;">
					<div class="container pt-5 pb-5">
						<div class="row text-center">
							<div class="col-md-3">
								<h3 class="count-to mb-0" style="font-size: 5rem;" data-fromvalue="0"
									data-tovalue="19000" data-duration="3000" data-delimiter="," data-append="+">0</h3>
								<p style="font-size: 2rem;">Happy Clients</p>
							</div>
							<div class="col-md-3">
								<h3 class="count-to mb-0" style="font-size: 5rem;" data-fromvalue="0" data-tovalue="15"
									data-duration="3000">0</h3>
								<p style="font-size: 2rem;">Years in Business</p>
							</div>
							<div class="col-md-3">
								<h3 class="count-to mb-0" style="font-size: 5rem;" data-fromvalue="0" data-tovalue="352"
									data-duration="3000">0</h3>
								<p style="font-size: 2rem;">Cups of Coffee</p>
							</div>
							<div class="col-md-3">
								<h3 class="count-to mb-0" style="font-size: 5rem;" data-fromvalue="0" data-tovalue="178"
									data-duration="3000">0</h3>
								<p style="font-size: 2rem;">High Score</p>
							</div>
						</div>
					</div>
				</div>
				<div style="background-color: #0088cc; border-top: 5px solid #0077b3;">
					<div class="container pt-5 pb-5">
						<div class="row text-center">
							<div class="col-md-3">
								<h3 class="count-to text-white mb-0" style="font-size: 5rem;" data-fromvalue="0"
									data-tovalue="19000" data-duration="3000" data-delimiter="," data-append="+">0</h3>
								<p class="text-white" style="font-size: 2rem;">Happy Clients</p>
							</div>
							<div class="col-md-3">
								<h3 class="count-to text-white mb-0" style="font-size: 5rem;" data-fromvalue="0"
									data-tovalue="15" data-duration="3000">0</h3>
								<p class="text-white" style="font-size: 2rem;">Years in Business</p>
							</div>
							<div class="col-md-3">
								<h3 class="count-to text-white mb-0" style="font-size: 5rem;" data-fromvalue="0"
									data-tovalue="352" data-duration="3000">0</h3>
								<p class="text-white" style="font-size: 2rem;">Cups of Coffee</p>
							</div>
							<div class="col-md-3">
								<h3 class="count-to text-white mb-0" style="font-size: 5rem;" data-fromvalue="0"
									data-tovalue="178" data-duration="3000">0</h3>
								<p class="text-white" style="font-size: 2rem;">High Score</p>
							</div>
						</div>
					</div>
				</div>
				<div class="container mt-5">
					<h3>Parallax</h3>
				</div>
				<div data-parallax="{'speed': 2, 'enableOnMobile': true}"
					data-image-src="/porto/assets/images/elements/counter/parallax.jpg" style="background-color: #efefef;">
					<div class="container pt-5 pb-5">
						<div class="row text-center">
							<div class="col-md-3">
								<i class="fa fa-user text-white" style="font-size: 3.5rem;"></i>
								<h3 class="count-to text-white mb-0" style="font-size: 5rem;" data-fromvalue="0"
									data-tovalue="19000" data-duration="3000" data-delimiter="," data-append="+">0</h3>
								<p class="text-white" style="font-size: 2rem;">Happy Clients</p>
							</div>
							<div class="col-md-3">
								<i class="fa fa-star text-white" style="font-size: 3.5rem;"></i>
								<h3 class="count-to text-white mb-0" style="font-size: 5rem;" data-fromvalue="0"
									data-tovalue="15" data-duration="3000">0</h3>
								<p class="text-white" style="font-size: 2rem;">Years in Business</p>
							</div>
							<div class="col-md-3">
								<i class="fa fa-coffee text-white" style="font-size: 3.5rem;"></i>
								<h3 class="count-to text-white mb-0" style="font-size: 5rem;" data-fromvalue="0"
									data-tovalue="352" data-duration="3000">0</h3>
								<p class="text-white" style="font-size: 2rem;">Cups of Coffee</p>
							</div>
							<div class="col-md-3">
								<i class="far fa-chart-bar text-white" style="font-size: 3.5rem;"></i>
								<h3 class="count-to text-white mb-0" style="font-size: 5rem;" data-fromvalue="0"
									data-tovalue="178" data-duration="3000">0</h3>
								<p class="text-white" style="font-size: 2rem;">High Score</p>
							</div>
						</div>
					</div>
				</div>
				<div class="container mt-5">
					<h3>With Icons</h3>
					<div class="row text-center">
						<div class="col-md-3">
							<i class="fa fa-user text-primary" style="font-size: 3.5rem;"></i>
							<h3 class="count-to text-primary mb-0" style="font-size: 5rem;" data-fromvalue="0"
								data-tovalue="19000" data-duration="3000" data-delimiter="," data-append="+">0</h3>
							<p style="font-size: 2rem;">Happy Clients</p>
						</div>
						<div class="col-md-3">
							<i class="fa fa-star text-primary" style="font-size: 3.5rem;"></i>
							<h3 class="count-to text-primary mb-0" style="font-size: 5rem;" data-fromvalue="0"
								data-tovalue="15" data-duration="3000">0</h3>
							<p style="font-size: 2rem;">Years in Business</p>
						</div>
						<div class="col-md-3">
							<i class="fa fa-coffee text-primary" style="font-size: 3.5rem;"></i>
							<h3 class="count-to text-primary mb-0" style="font-size: 5rem;" data-fromvalue="0"
								data-tovalue="352" data-duration="3000">0</h3>
							<p style="font-size: 2rem;">Cups of Coffee</p>
						</div>
						<div class="col-md-3">
							<i class="far fa-chart-bar text-primary" style="font-size: 3.5rem;"></i>
							<h3 class="count-to text-primary mb-0" style="font-size: 5rem;" data-fromvalue="0"
								data-tovalue="178" data-duration="3000">0</h3>
							<p style="font-size: 2rem;">High Score</p>
						</div>
					</div>
				</div>
			</section>
			<div class="container">
				<hr class="divider">
				<section class="special-section mt-5">
					<h3>Special Content</h3>
					<div class="row text-center">
						<div class="col-md-3">
							<h3 class="count-to text-primary mb-0" style="font-size: 5rem;" data-fromvalue="0"
								data-tovalue="70.13" data-duration="3000" data-delimiter="." data-round="2">0</h3>
							<p style="font-size: 2rem;">Decimals</p>
						</div>
						<div class="col-md-3">
							<h3 class="text-primary mb-0" style="font-size: 5rem;">
								$<span class="count-to" data-fromvalue="0" data-tovalue="15"
									data-duration="3000">0</span></h3>
							<p style="font-size: 2rem;">Years in Business</p>
						</div>
						<div class="col-md-3">
							<h3 class="count-to text-primary mb-0" style="font-size: 5rem;" data-fromvalue="0"
								data-tovalue="78" data-append="%" data-duration="3000">0</h3>
							<p style="font-size: 2rem;">Percentual</p>
						</div>
						<div class="col-md-3">
							<h3 class="count-to text-primary mb-0" style="font-size: 5rem;" data-fromvalue="0"
								data-delimiter="," data-append="+" data-tovalue="5000" data-duration="3000">0</h3>
							<p style="font-size: 2rem;">Append Symbol</p>
						</div>
					</div>
				</section>
				<hr class="divider">
				<section class="option-section mt-5">
					<div class="row text-center">
						<div class="col-md-6">
							<h3 class="text-left">Options</h3>
							<div class="row">
								<div class="col-6">
									<i class="fa fa-user text-primary" style="font-size: 3.5rem;"></i>
									<h3 class="count-to text-primary mb-0" style="font-size: 5rem;" data-fromvalue="0"
										data-tovalue="1000" data-duration="1000">0</h3>
									<p style="font-size: 2rem;">Speed</p>
								</div>
								<div class="col-6">
									<i class="fa fa-star text-primary" style="font-size: 3.5rem;"></i>
									<h3 class="count-to text-primary mb-0" style="font-size: 5rem;" data-fromvalue="0"
										data-tovalue="1000" data-duration="1000">0</h3>
									<p style="font-size: 2rem;">Icon Animation</p>
								</div>
							</div>
						</div>
						<div class="col-md-6 text-left">
							<h3>Inline</h3>
							<p>Porto has more than <span class="count-to font-weight-bold" data-fromvalue="0"
									data-tovalue="19000" data-duration="3000">0</span> happy customers.</p>
							<p>Porto has more than <span class="count-to text-primary font-weight-bold"
									style="font-family: Shadows Into Light,sans-serif; font-size: 2.2rem"
									data-fromvalue="0" data-tovalue="19000" data-duration="3000">0</span> happy
								customers.
							</p>
						</div>
					</div>
				</section>
			</div>
			<!-- End .container -->

			<div class="section-elements mt-6" style="background: #f4f4f4;">
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
