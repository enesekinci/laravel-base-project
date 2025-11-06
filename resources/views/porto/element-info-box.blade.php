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
								<li class="breadcrumb-item"><a href="/porto/demo4.html">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Info Box</li>
							</ol>
						</nav>
						<h1 class="page-title text-center text-white">Info Box</h1>
					</div>
				</div>
			</div>

			<div class="container">
				<section class="left-section mt-5">
					<h3 class="mb-4	">Left Icon</h3>
					<div class="row">
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-left">
								<i class="icon-mobile"></i>
								<div class="info-box-content">
									<h4>Mobile Apps</h4>
									<p>Lorem ipsum dolor sit amet, coctetur adipiscing elit.</p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-left">
								<i class="icon-earphones-alt"></i>
								<div class="info-box-content">
									<h4>Customer Support</h4>
									<p>Lorem ipsum dolor sit amet, coctetur adipiscing elit.</p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-left">
								<i class="icon-credit-card"></i>
								<div class="info-box-content">
									<h4>Fully Customizable</h4>
									<p>Lorem ipsum dolor sit amet, coctetur adipiscing elit.</p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-left">
								<i class="icon-action-undo"></i>
								<div class="info-box-content">
									<h4>Powerful Admin</h4>
									<p>Lorem ipsum dolor sit amet, coctetur adipiscing elit.</p>
								</div>
							</div>
						</div>
					</div>
				</section>
				<hr class="divider">
				<section class="left-section mt-5">
					<h3 class="mb-4	">Right Icon</h3>
					<div class="row">
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-right">
								<div class="info-box-content">
									<h4>Mobile Apps</h4>
									<p>Lorem ipsum dolor sit amet, coctetur adipiscing elit.</p>
								</div>
								<i class="icon-mobile"></i>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-right">
								<div class="info-box-content">
									<h4>Customer Support</h4>
									<p>Lorem ipsum dolor sit amet, coctetur adipiscing elit.</p>
								</div>
								<i class="icon-earphones-alt"></i>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-right">
								<div class="info-box-content">
									<h4>Fully Customizable</h4>
									<p>Lorem ipsum dolor sit amet, coctetur adipiscing elit.</p>
								</div>
								<i class="icon-credit-card"></i>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-right">
								<div class="info-box-content">
									<h4>Powerful Admin</h4>
									<p>Lorem ipsum dolor sit amet, coctetur adipiscing elit.</p>
								</div>
								<i class="icon-action-undo"></i>
							</div>
						</div>
					</div>
				</section>
				<hr class="divider">
				<section class="left-section mt-5">
					<h3 class="mb-4	">Top Icon</h3>
					<h4>Center</h4>
					<div class="row">
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-top">
								<i class="icon-mobile"></i>
								<div class="info-box-content">
									<h4>Mobile Apps</h4>
									<p>Lorem ipsum dolor sit amet, coctetur adipiscing elit.</p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-top">
								<i class="icon-earphones-alt"></i>
								<div class="info-box-content">
									<h4>Customer Support</h4>
									<p>Lorem ipsum dolor sit amet, coctetur adipiscing elit.</p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-top">
								<i class="icon-credit-card"></i>
								<div class="info-box-content">
									<h4>Fully Customizable</h4>
									<p>Lorem ipsum dolor sit amet, coctetur adipiscing elit.</p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-top">
								<i class="icon-action-undo"></i>
								<div class="info-box-content">
									<h4>Powerful Admin</h4>
									<p>Lorem ipsum dolor sit amet, coctetur adipiscing elit.</p>
								</div>
							</div>
						</div>
					</div>
					<h4 class="mt-4">Left</h4>
					<div class="row mt-5">
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-top">
								<i class="icon-mobile mr-auto"></i>
								<div class="info-box-content text-left">
									<h4>Mobile Apps</h4>
									<p>Lorem ipsum dolor sit amet, coctetur adipiscing elit.</p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-top">
								<i class="icon-earphones-alt mr-auto"></i>
								<div class="info-box-content text-left">
									<h4>Customer Support</h4>
									<p>Lorem ipsum dolor sit amet, coctetur adipiscing elit.</p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-top">
								<i class="icon-credit-card mr-auto"></i>
								<div class="info-box-content text-left">
									<h4>Fully Customizable</h4>
									<p>Lorem ipsum dolor sit amet, coctetur adipiscing elit.</p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-top">
								<i class="icon-action-undo mr-auto"></i>
								<div class="info-box-content text-left">
									<h4>Powerful Admin</h4>
									<p>Lorem ipsum dolor sit amet, coctetur adipiscing elit.</p>
								</div>
							</div>
						</div>
					</div>
					<h4 class="mt-4">Right</h4>
					<div class="row mt-5">
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-top">
								<i class="icon-mobile ml-auto"></i>
								<div class="info-box-content text-right">
									<h4>Mobile Apps</h4>
									<p>Lorem ipsum dolor sit amet, coctetur adipiscing elit.</p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-top">
								<i class="icon-earphones-alt ml-auto"></i>
								<div class="info-box-content text-right">
									<h4>Customer Support</h4>
									<p>Lorem ipsum dolor sit amet, coctetur adipiscing elit.</p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-top">
								<i class="icon-credit-card ml-auto"></i>
								<div class="info-box-content text-right">
									<h4>Fully Customizable</h4>
									<p>Lorem ipsum dolor sit amet, coctetur adipiscing elit.</p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-top">
								<i class="icon-action-undo ml-auto"></i>
								<div class="info-box-content text-right">
									<h4>Powerful Admin</h4>
									<p>Lorem ipsum dolor sit amet, coctetur adipiscing elit.</p>
								</div>
							</div>
						</div>
					</div>
				</section>
				<hr class="divider">
				<section class="img-section">
					<h3>Image Box</h3>
					<div class="row">
						<div class="col-md-4">
							<div class="info-box info-box-img">
								<img src="/porto/assets/images/elements/info-box/history-1.jpg" alt="info-box-image"
									width="800" height="524" />
								<div class="info-box-content">
									<h4>Mobile Apps</h4>
									<p class="info-desc">Lorem ipsum dolor sit amet, coctetur adipiscing elit.</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque
										rutrum pellentesque imperdiet. Nulla lacinia iaculis nulla non metus pulvinar.
									</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="info-box info-box-img">
								<img src="/porto/assets/images/elements/info-box/history-2.jpg" alt="info-box-image"
									width="800" height="524" />
								<div class="info-box-content">
									<h4>Creative Websites</h4>
									<p class="info-desc">Lorem ipsum dolor sit amet, coctetur adipiscing elit.</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque
										rutrum pellentesque imperdiet. Nulla lacinia iaculis nulla non metus pulvinar.
									</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="info-box info-box-img">
								<img src="/porto/assets/images/elements/info-box/history-3.jpg" alt="info-box-image"
									width="800" height="524" />
								<div class="info-box-content">
									<h4>SEO Optimization</h4>
									<p class="info-desc">Lorem ipsum dolor sit amet, coctetur adipiscing elit.</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque
										rutrum pellentesque imperdiet. Nulla lacinia iaculis nulla non metus pulvinar.
									</p>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div><!-- End .container -->

			<div class="section-elements mt-8" style="background: #f4f4f4;">
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
