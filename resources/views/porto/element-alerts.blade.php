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
								<li class="breadcrumb-item active" aria-current="page">Alerts</li>
							</ol>
						</nav>
						<h1 class="page-title text-center text-white">Alerts</h1>
					</div>
				</div>
			</div>

			<div class="container">
				<section class="message-section mt-6">
					<h3 class="title">Message Boxes</h3>
					<h5 class="title">With Font Awesome</h5>
					<div class="alert alert-rounded alert-success">
						<i class="fa fa-check" style="color: #9ad36a;"></i>
						<span><strong>Well done!</strong> You successfully read this important alert message.</span>
					</div>
					<div class="alert alert-rounded alert-info">
						<i class="fas fa-info-circle" style="color: #67cce0;"></i>
						<span><strong>Heads up!</strong> This alert needs your attention, but it’s not super
							important.</span>
					</div>
					<div class="alert alert-rounded alert-warning">
						<i class="fa fa-exclamation-triangle" style="color: #f9cf79;"></i>
						<span><strong>Warning!</strong> Best check yo self, you’re not looking too good.</span>
					</div>
					<div class="alert alert-rounded alert-danger">
						<i class="fa fa-exclamation-circle" style="color: #ef8495;"></i>
						<span><strong>Oh snap!</strong> Change a few things up and try submitting again.</span>
					</div>
					<h5 class="title">With Pixel</h5>
					<div class="alert alert-rounded alert-radius alert-success">
						<i class="pixel-icon" style="background-image: url(/porto/assets/images/elements/alert/tick.png);"></i>
						<span><strong>Well done!</strong> You successfully read this important alert message.</span>
					</div>
					<div class="alert alert-rounded alert-info">
						<i class="pixel-icon" style="background-image: url(/porto/assets/images/elements/alert/info.png);"></i>
						<span><strong>Heads up!</strong> This alert needs your attention, but it’s not super
							important.</span>
					</div>
					<div class="alert alert-rounded alert-warning">
						<i class="pixel-icon"
							style="background-image: url(/porto/assets/images/elements/alert/alert.png);"></i>
						<span><strong>Warning!</strong> Best check yo self, you’re not looking too good.</span>
					</div>
					<div class="alert alert-rounded alert-danger">
						<i class="pixel-icon"
							style="background-image: url(/porto/assets/images/elements/alert/exclamation.png);"></i>
						<span><strong>Oh snap!</strong> Change a few things up and try submitting again.</span>
					</div>
				</section>
				<hr class="separator-line align_center">
				<section class="default-section">
					<h3 class="title">Default</h3>
					<div class="alert alert-default">
						<span><strong>Well done!</strong> You are using an awesome template! <a class="alert-link">Say
								Hi to Porto </a>.</span>
					</div>
					<div class="alert alert-success">
						<span><strong>Well done!</strong> You are using an awesome template! <a class="alert-link">Say
								Hi to Porto </a>.</span>
					</div>
					<div class="alert alert-info">
						<span><strong>Need any help?!</strong> We are glad <a class="alert-link">to help you</a>, if you
							need.</span>
					</div>
					<div class="alert alert-warning">
						<span><strong>We must tell you!</strong> This template is made with love by the <a
								class="alert-link">okler team</a>.</span>
					</div>
					<div class="alert alert-danger">
						<span><strong>Oh snap!</strong> Are you using the other template? <a class="alert-link">Buy
								Porto now </a>and make your customers a lot happier.</span>
					</div>
					<div class="alert alert-dark">
						<span><strong>Well done!</strong> You are using an awesome template! <a class="alert-link">Say
								Hi to Porto </a>.</span>
					</div>
					<div class="alert alert-info">
						<div class="alert-wrapper">
							<h4>Announcement!</h4>
							<p>We are extermely happy to announce our first admin. We dedicated a lot of efforts to
								bring you tons of features, easily customizable for an accessible price! Do you still
								have
								any doubt that this is the best choice?</p>
							<button class="btn btn-info mt-xs mb-xs" type="button">Yes, it’s the best choice</button>
							<button class="btn btn-default mt-xs mb-xs" type="button">Not convinced yet</button>

						</div>
					</div>
				</section>
				<hr class="separator-line align_center">
				<section class="color-section">
					<h3 class="title">Colors</h3>
					<div class="alert alert-primary">
						<span><strong>Well done!</strong> You are using an awesome template! <a class="alert-link">Say
								Hi
								to Porto </a>.</span>
					</div>
					<div class="alert alert-secondary">
						<span><strong>Well done!</strong> You are using an awesome template! <a class="alert-link">Say
								Hi
								to Porto </a>.</span>
					</div>
					<div class="alert alert-tertiary">
						<span><strong>Well done!</strong> You are using an awesome template! <a class="alert-link">Say
								Hi
								to Porto </a>.</span>
					</div>
					<div class="alert alert-quaternary">
						<span><strong>Well done!</strong> You are using an awesome template! <a class="alert-link">Say
								Hi
								to Porto </a>.</span>
					</div>
				</section>
				<hr class="separator-line align_center">
				<div class="row">
					<div class="col-md-6">
						<h3 class="mb-0">Dismissible alerts</h3>
						<p class="mb-3">Build on any alert by adding an optional .alert-dismissible.</p>
						<div class="alert alert-warning alert-dismissible">
							<span><strong>Warning!</strong> Better check yourself, you’re not looking too good.</span>
						</div>
					</div>
					<div class="col-md-6">
						<h3 class="mb-0">With Icons</h3>
						<p class="mb-3">Add any icon you want from the icons library.</p>
						<div class="alert alert-radius alert-success icon-sm">
							<i class="far fa-thumbs-up"></i>
							<span><strong>Well done!</strong> You successfully read this important alert message.</span>
						</div>
					</div>
				</div>
				<hr class="separator-line align_center">
				<section class="size-section">
					<h3>Sizes</h3>
					<div class="alert alert-info alert-sm">
						<span><strong>Heads up!</strong> This alert needs your attention, but it’s not super
							important.</span>
					</div>
					<div class="alert alert-info">
						<span><strong>Heads up!</strong> This alert needs your attention, but it’s not super
							important.</span>
					</div>
					<div class="alert alert-info alert-lg">
						<span><strong>Heads up!</strong> This alert needs your attention, but it’s not super
							important.</span>
					</div>
				</section>
				<hr class="separator-line align_center">
				<section class="summary-section">
					<h3>Summary</h3>
					<div class="alert alert-rounded alert-danger icon-sm">
						<div class="alert-wrapper">
							<i class="fas fa-exclamation-triangle"></i>
							<span><strong>Oh snap!</strong> Change a few things up and try submitting again.</span>
							<ul>
								<li>Inform your username.</li>
								<li>Inform your password.</li>
							</ul>
						</div>
					</div>
				</section>
			</div><!-- End .container -->

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
