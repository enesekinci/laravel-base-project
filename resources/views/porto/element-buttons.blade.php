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
								<li class="breadcrumb-item active" aria-current="page">Buttons</li>
							</ol>
						</nav>
						<h1 class="page-title text-center text-white">Buttons</h1>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="row align-items-center mt-5">
					<div class="col-md-3">
						<div class="button-type">
							<h4>Default</h4>
							<p>These are the default button style, select between any color
								you
								want.</p>
						</div>
					</div>
					<div class="col-md-9">
						<ul class="btn-list">
							<li><button class="btn btn-default btn-md">default</button></li>
							<li><button class="btn btn-success btn-md">success</button></li>
							<li><button class="btn btn-info btn-md">info</button></li>
							<li><button class="btn btn-warning btn-md">warning</button></li>
							<li><button class="btn btn-danger btn-md">danger</button></li>
							<li><button class="btn btn-primary btn-md">primary</button></li>
							<li><button class="btn btn-secondary btn-md">secondary</button></li>
							<li><button class="btn btn-dark btn-md">dark</button></li>
						</ul>
					</div>
				</div>
				<hr class="divider">
				<div class="row align-items-center mt-5">
					<div class="col-md-3">
						<div class="button-type">
							<h4>Rounded</h4>
							<p>Rounded button style using any color from skin.</p>
						</div>
					</div>
					<div class="col-md-9">
						<ul class="btn-list">
							<li><button class="btn btn-default btn-rounded btn-md">default</button></li>
							<li><button class="btn btn-success btn-rounded btn-md">success</button></li>
							<li><button class="btn btn-info btn-rounded btn-md">info</button></li>
							<li><button class="btn btn-warning btn-rounded btn-md">warning</button></li>
							<li><button class="btn btn-danger btn-rounded btn-md">danger</button></li>
							<li><button class="btn btn-primary btn-rounded btn-md">primary</button></li>
							<li><button class="btn btn-secondary btn-rounded btn-md">secondary</button></li>
							<li><button class="btn btn-dark btn-rounded btn-md">dark</button></li>
						</ul>
					</div>
				</div>
				<hr class="divider">
				<div class="row align-items-center mt-5">
					<div class="col-md-3">
						<div class="button-type">
							<h4>Ellipse</h4>
							<p>Ellipse button style using any color from skin.</p>
						</div>
					</div>
					<div class="col-md-9">
						<ul class="btn-list">
							<li><button class="btn btn-default btn-ellipse btn-md">default</button></li>
							<li><button class="btn btn-success btn-ellipse btn-md">success</button></li>
							<li><button class="btn btn-info btn-ellipse btn-md">info</button></li>
							<li><button class="btn btn-warning btn-ellipse btn-md">warning</button></li>
							<li><button class="btn btn-danger btn-ellipse btn-md">danger</button></li>
							<li><button class="btn btn-primary btn-ellipse btn-md">primary</button></li>
							<li><button class="btn btn-secondary btn-ellipse btn-md">secondary</button></li>
							<li><button class="btn btn-dark btn-ellipse btn-md">dark</button></li>
						</ul>
					</div>
				</div>
				<hr class="divider">
				<div class="row align-items-center mt-5">
					<div class="col-md-3">
						<div class="button-type">
							<h4>Outline</h4>
							<p>Outline button style using any color from skin.</p>
						</div>
					</div>
					<div class="col-md-9">
						<ul class="btn-list">
							<li><button class="btn btn-outline btn-md">light</button></li>
							<li><button class="btn btn-outline-success btn-md">success</button></li>
							<li><button class="btn btn-outline-info btn-md">info</button></li>
							<li><button class="btn btn-outline-warning btn-md">warning</button></li>
							<li><button class="btn btn-outline-danger btn-md">danger</button></li>
							<li><button class="btn btn-outline-primary btn-md">primary</button></li>
							<li><button class="btn btn-outline-secondary btn-md">secondary</button></li>
							<li><button class="btn btn-outline-dark btn-md">dark</button></li>
						</ul>
					</div>
				</div>
				<hr class="divider">
				<div class="row align-items-center mt-5">
					<div class="col-md-3">
						<div class="button-type">
							<h4>Outline Rounded</h4>
							<p>Same as default outline but with rounded borders.</p>
						</div>
					</div>
					<div class="col-md-9">
						<ul class="btn-list">
							<li><button class="btn btn-outline btn-rounded btn-md">light</button></li>
							<li><button class="btn btn-outline-success btn-rounded btn-md">success</button></li>
							<li><button class="btn btn-outline-info btn-rounded btn-md">info</button></li>
							<li><button class="btn btn-outline-warning btn-rounded btn-md">warning</button></li>
							<li><button class="btn btn-outline-danger btn-rounded btn-md">danger</button></li>
							<li><button class="btn btn-outline-primary btn-rounded btn-md">primary</button></li>
							<li><button class="btn btn-outline-secondary btn-rounded btn-md">secondary</button></li>
							<li><button class="btn btn-outline-dark btn-rounded btn-md">dark</button></li>
						</ul>
					</div>
				</div>
				<hr class="divider">
				<div class="row align-items-center mt-5">
					<div class="col-md-3">
						<div class="button-type">
							<h4>Outline Ellipse</h4>
							<p>Same as default outline but with ellipse borders.</p>
						</div>
					</div>
					<div class="col-md-9">
						<ul class="btn-list">
							<li><button class="btn btn-outline btn-ellipse btn-md">light</button></li>
							<li><button class="btn btn-outline-success btn-ellipse btn-md">success</button></li>
							<li><button class="btn btn-outline-info btn-ellipse btn-md">info</button></li>
							<li><button class="btn btn-outline-warning btn-ellipse btn-md">warning</button></li>
							<li><button class="btn btn-outline-danger btn-ellipse btn-md">danger</button></li>
							<li><button class="btn btn-outline-primary btn-ellipse btn-md">primary</button></li>
							<li><button class="btn btn-outline-secondary btn-ellipse btn-md">secondary</button></li>
							<li><button class="btn btn-outline-dark btn-ellipse btn-md">dark</button></li>
						</ul>
					</div>
				</div>
				<hr class="divider">
				<div class="size-various">
					<h4>Buttons Sizes</h4>
					<ul class="btn-list">
						<li><button class="btn btn-primary btn-xl">Extra Large Size</button></li>
						<li><button class="btn btn-outline-primary btn-xl">Extra Large Size</button></li>
					</ul>
					<ul class="btn-list">
						<li><button class="btn btn-primary btn-lg">Large Size</button></li>
						<li><button class="btn btn-outline-primary btn-lg">Large Size</button></li>
					</ul>
					<ul class="btn-list">
						<li><button class="btn btn-primary btn-md">Normal Size</button></li>
						<li><button class="btn btn-outline-primary btn-md">Normal Size</button></li>
					</ul>
					<ul class="btn-list">
						<li><button class="btn btn-primary btn-sm">Small Size</button></li>
						<li><button class="btn btn-outline-primary btn-sm">Small Size</button></li>
					</ul>
					<ul class="btn-list">
						<li><button class="btn btn-primary btn-xs">Mini Size</button></li>
						<li><button class="btn btn-outline-primary btn-xs">Mini Size</button></li>
					</ul>
				</div>
				<hr class="divider">
				<div class="row">
					<div class="col-md-6">
						<h4>Border Radii</h4>
						<ul class="btn-list">
							<li><button class="btn btn-primary btn-md">default</button></li>
							<li><button class="btn btn-primary btn-rounded btn-md">rounded</button></li>
							<li><button class="btn btn-primary btn-ellipse btn-md">ellipse</button></li>
						</ul>
					</div>
					<div class="col-md-6">
						<h4>Buttons with Icons</h4>
						<ul class="btn-list">
							<li><button class="btn btn-primary btn-icon-left btn-rounded btn-md">
									<i class="fa fa-sync-alt"></i>Left Icon</button></li>
							<li><button class="btn btn-primary btn-icon-right btn-rounded btn-md">
									Right Icon<i class="fa fa-sync-alt"></i></button></li>
							<li><button class="btn btn-primary btn-rounded btn-md"><i
										class="fa fa-thumbs-up"></i></button></li>
							<li><button class="btn btn-outline-primary btn-rounded btn-md"><i
										class="fa fa-thumbs-up"></i></button></li>
						</ul>
					</div>
				</div>
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
