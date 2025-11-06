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
								<li class="breadcrumb-item active" aria-current="page">Call to Action</li>
							</ol>
						</nav>
						<h1 class="page-title text-center text-white">Call to Action</h1>
					</div>
				</div>
			</div>

			<div class="container cta">
				<div class="mt-8">
					<h3>Default</h3>
					<div class="row cta-simple">
						<div class="col-md-9">
							<h3 class="font-weight-normal">Porto is <b>everything</b> you need to create an
								<b>awesome</b> website!</h3>
							<p>The <b>Best Selling</b> Woocommerce Theme on ThemeForest</p>
						</div>
						<div class="col-md-3">
							<div class="btn btn-lg btn-primary mt-2 mt-md-0">Buy Now</div>
						</div>
					</div>
				</div>

				<hr class="mt-3">
				<div class="mt-5">
					<h3>With Borders</h3>
					<div class="cta-border">
						<div class="row cta-simple">
							<div class="col-md-9">
								<h3 class="font-weight-normal">Porto is <b>everything</b> you need to create an
									<b>awesome</b> website!</h3>
								<p>The <b>Best Selling</b> Woocommerce Theme on ThemeForest</p>
							</div>
							<div class="col-md-3">
								<div class="btn btn-lg btn-primary mt-2 mt-md-0">Buy Now!</div>
							</div>
						</div>
					</div>
				</div>

				<hr>
				<div class="mt-5">
					<h3>Button Centered</h3>
					<div class="cta-simple cta-border">
						<h3 class="font-weight-normal">Porto is <b>everything</b> you need to create an <b>awesome</b>
							website!</h3>
						<p>The <b>Best Selling</b> Woocommerce Theme on ThemeForest</p>
						<div class="btn btn-lg btn-primary mt-2">Buy Now!</div>
					</div>
				</div>

				<hr>
				<div class="mt-5">
					<h3>Colors</h3>
					<div class="cta-border cta-bg blue">
						<div class="row cta-simple">
							<div class="col-md-9">
								<h3 class="font-weight-normal">Porto is <b>everything</b> you need to create an
									<b>awesome</b> website!</h3>
								<p>The <b>Best Selling</b> Woocommerce Theme on ThemeForest</p>
							</div>
							<div class="col-md-3">
								<div class="btn btn-light btn-lg mt-2 mt-md-0">Buy Now!</div>
							</div>
						</div>
					</div>

					<div class="cta-border cta-bg red mt-6">
						<div class="row cta-simple">
							<div class="col-md-9">
								<h3 class="font-weight-normal">Porto is <b>everything</b> you need to create an
									<b>awesome</b> website!</h3>
								<p>The <b>Best Selling</b> Woocommerce Theme on ThemeForest</p>
							</div>
							<div class="col-md-3">
								<div class="btn btn-light btn-lg mt-2 mt-md-0">Buy Now!</div>
							</div>
						</div>
					</div>

					<div class="cta-border cta-bg cyan mt-6">
						<div class="row cta-simple">
							<div class="col-md-9">
								<h3 class="font-weight-normal">Porto is <b>everything</b> you need to create an
									<b>awesome</b> website!</h3>
								<p>The <b>Best Selling</b> Woocommerce Theme on ThemeForest</p>
							</div>
							<div class="col-md-3">
								<div class="btn btn-light btn-lg mt-2 mt-md-0">Buy Now!</div>
							</div>
						</div>
					</div>

					<div class="cta-border cta-bg dark mt-6">
						<div class="row cta-simple">
							<div class="col-md-9">
								<h3 class="font-weight-normal">Porto is <b>everything</b> you need to create an
									<b>awesome</b> website!</h3>
								<p>The <b>Best Selling</b> Woocommerce Theme on ThemeForest</p>
							</div>
							<div class="col-md-3">
								<div class="btn btn-light btn-lg mt-2 mt-md-0">Buy Now!</div>
							</div>
						</div>
					</div>

					<div class="cta-border cta-bg light mt-6">
						<div class="row cta-simple">
							<div class="col-md-9">
								<h3 class="font-weight-normal">Porto is <b>everything</b> you need to create an
									<b>awesome</b> website!</h3>
								<p>The <b>Best Selling</b> Woocommerce Theme on ThemeForest</p>
							</div>
							<div class="col-md-3">
								<div class="btn btn-light btn-lg mt-2 mt-md-0">Buy Now!</div>
							</div>
						</div>
					</div>
				</div>

				<hr>
				<div class="mt-5">
					<h3>Outlines</h3>
					<div class="cta-border cta-outline blue">
						<div class="row cta-simple">
							<div class="col-md-9">
								<h3 class="font-weight-normal">Porto is <b>everything</b> you need to create an
									<b>awesome</b> website!</h3>
								<p>The <b>Best Selling</b> Woocommerce Theme on ThemeForest</p>
							</div>
							<div class="col-md-3">
								<div class="btn mt-2 mt-md-0">Buy Now!</div>
							</div>
						</div>
					</div>

					<div class="cta-border cta-outline red mt-6">
						<div class="row cta-simple">
							<div class="col-md-9">
								<h3 class="font-weight-normal">Porto is <b>everything</b> you need to create an
									<b>awesome</b> website!</h3>
								<p>The <b>Best Selling</b> Woocommerce Theme on ThemeForest</p>
							</div>
							<div class="col-md-3">
								<div class="btn mt-2 mt-md-0">Buy Now!</div>
							</div>
						</div>
					</div>

					<div class="cta-border cta-outline cyan mt-6">
						<div class="row cta-simple">
							<div class="col-md-9">
								<h3 class="font-weight-normal">Porto is <b>everything</b> you need to create an
									<b>awesome</b> website!</h3>
								<p>The <b>Best Selling</b> Woocommerce Theme on ThemeForest</p>
							</div>
							<div class="col-md-3">
								<div class="btn mt-2 mt-md-0">Buy Now!</div>
							</div>
						</div>
					</div>

					<div class="cta-border cta-outline dark mt-6">
						<div class="row cta-simple">
							<div class="col-md-9">
								<h3 class="font-weight-normal">Porto is <b>everything</b> you need to create an
									<b>awesome</b> website!</h3>
								<p>The <b>Best Selling</b> Woocommerce Theme on ThemeForest</p>
							</div>
							<div class="col-md-3">
								<div class="btn mt-2 mt-md-0">Buy Now!</div>
							</div>
						</div>
					</div>
				</div>

				<hr>
				<div class="mt-5">
					<h3>3Ds</h3>
					<div class="cta-border cta-bg cta-3Ds blue">
						<div class="row cta-simple">
							<div class="col-md-9">
								<h3 class="font-weight-normal">Porto is <b>everything</b> you need to create an
									<b>awesome</b> website!</h3>
								<p>The <b>Best Selling</b> Woocommerce Theme on ThemeForest</p>
							</div>
							<div class="col-md-3">
								<div class="btn btn-light btn-lg mt-2 mt-md-0">Buy Now!</div>
							</div>
						</div>
					</div>

					<div class="cta-border cta-bg cta-3Ds red mt-6">
						<div class="row cta-simple">
							<div class="col-md-9">
								<h3 class="font-weight-normal">Porto is <b>everything</b> you need to create an
									<b>awesome</b> website!</h3>
								<p>The <b>Best Selling</b> Woocommerce Theme on ThemeForest</p>
							</div>
							<div class="col-md-3">
								<div class="btn btn-light btn-lg mt-2 mt-md-0">Buy Now!</div>
							</div>
						</div>
					</div>

					<div class="cta-border cta-bg cta-3Ds cyan mt-6">
						<div class="row cta-simple">
							<div class="col-md-9">
								<h3 class="font-weight-normal">Porto is <b>everything</b> you need to create an
									<b>awesome</b> website!</h3>
								<p>The <b>Best Selling</b> Woocommerce Theme on ThemeForest</p>
							</div>
							<div class="col-md-3">
								<div class="btn btn-light btn-lg mt-2 mt-md-0">Buy Now!</div>
							</div>
						</div>
					</div>

					<div class="cta-border cta-bg cta-3Ds dark mt-6">
						<div class="row cta-simple">
							<div class="col-md-9">
								<h3 class="font-weight-normal">Porto is <b>everything</b> you need to create an
									<b>awesome</b> website!</h3>
								<p>The <b>Best Selling</b> Woocommerce Theme on ThemeForest</p>
							</div>
							<div class="col-md-3">
								<div class="btn btn-light btn-lg mt-2 mt-md-0">Buy Now!</div>
							</div>
						</div>
					</div>
				</div>

				<hr>
				<div class="mt-6 mb-8">
					<h3>Small</h3>
					<div class="row">
						<div class="col-lg-4">
							<div class="cta-simple cta-border">
								<h3 class="font-weight-normal">Porto is <b>everything</b> you need to create an
									<b>awesome</b> website!</h3>
								<p>The <b>Best Selling</b> Woocommerce Theme on ThemeForest</p>
								<div class="btn btn-lg btn-primary mt-2">Buy Now!</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="cta-simple cta-border bg-primary">
								<h3 class="font-weight-normal text-white">Porto is <b>everything</b> you need to create
									an <b>awesome</b> website!</h3>
								<p class="text-white">The <b>Best Selling</b> Woocommerce Theme on ThemeForest</p>
								<div class="btn btn-lg btn-light mt-2">Buy Now!</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="cta-simple cta-border bg-dark">
								<h3 class="font-weight-normal text-white">Porto is <b>everything</b> you need to create
									an <b>awesome</b> website!</h3>
								<p class="text-white">The <b>Best Selling</b> Woocommerce Theme on ThemeForest</p>
								<div class="btn btn-lg btn-primary mt-2">Buy Now!</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- End .container -->

			<div class="section-elements" style="background: #f4f4f4;">
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
