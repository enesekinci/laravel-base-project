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
								<li class="breadcrumb-item active" aria-current="page">Banners</li>
							</ol>
						</nav>
						<h1 class="page-title text-center text-white">Banners</h1>
					</div>
				</div>
			</div>

			<section class="entire-banner mt-5 pt-5">
				<h3 class="text-center">Entrance Effect for Entire and Individuals</h3>
				<p class="text-center mx-auto mb-3 px-5">Now we provide lots of animations in banner and other elements.
					It
					makes your site more beautiful than ever before. Please purchase Porto without hesitation.</p>
				<div class="owl-carousel owl-theme show-nav-hover slide-animate" data-owl-options="{
					'dots': false,
					'nav': true,
					'loop': false
				}">
					<div class="banner banner1">
						<figure>
							<img width="1920" height="580" src="/porto/assets/images/elements/banners/slide1.jpg"
								style="background:#d8dce5;min-height:36rem;" alt="banner" />
						</figure>
						<div class="container align-items-center d-flex">
							<div class="banner-layer">
								<h4 class="banner-subtitle appear-animate" data-animation-name="fadeInUpShorter"
									data-animation-delay="200">Find
									the Boundaries. Push Through!</h4>
								<h3 class="banner-title appear-animate" data-animation-name="fadeInUpShorter"
									data-animation-delay="400">
									Sunglasses</h3>

								<img class="box-border appear-animate" data-animation-name="fadeInLeftShorter"
									data-animation-delay="700" src="/porto/assets/images/elements/banners/icon1.png"
									width="260" height="26" alt="icon" />
								<div class="d-flex justify-content-between">
									<a href="#" data-animation-name="fadeInRightShorter" data-animation-delay="900"
										class="btn btn-dark appear-animate" role="button">Shop Now!</a>
									<h5 class="d-inline-block mb-0 appear-animate"
										data-animation-name="fadeInLeftShorter" data-animation-delay="1100">
										<span class="text-uppercase">Starting At</span>
										<b class="coupon-sale-text text-white align-middle">$<em
												class="align-text-top">99</em>99</b>
									</h5>
								</div>
							</div>
						</div>
					</div>
					<div class="banner banner2">
						<figure>
							<img width="1920" height="580" src="/porto/assets/images/elements/banners/slide2.jpg"
								style="background:#d8dce5;min-height:36rem;" alt="banner" />
						</figure>
						<div class="container align-items-center d-flex">
							<div class="banner-layer">
								<h4 class="banner-subtitle appear-animate" data-animation-name="fadeInRightShorter"
									data-animation-delay="200">Take Your Chill Up a Level</h4>
								<h3 class="banner-title appear-animate" data-animation-name="fadeInRightShorter"
									data-animation-delay="400">Casual Wear</h3>

								<img class="box-border appear-animate" data-animation-name="fadeInLeftShorter"
									data-animation-delay="500" src="/porto/assets/images/elements/banners/icon1.png"
									width="260" height="26" alt="icon" />
								<div class="d-flex justify-content-between">
									<a href="#" class="btn btn-dark appear-animate"
										data-animation-name="fadeInLeftShorter" data-animation-delay="800"
										role="button">Shop Now!</a>
									<h5 class="d-inline-block mb-0 appear-animate"
										data-animation-name="fadeInRightShorter" data-animation-delay="1000">
										<span class="text-uppercase">Starting At</span>
										<b class="coupon-sale-text text-white align-middle">$<em
												class="align-text-top">99</em>99</b>
									</h5>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="kenBurns-section mt-5 pt-5">
				<h3 class="text-center">Background KenBurns Effect</h3>
				<p class="text-center mx-auto mb-3">Here, you can see Kenburns effect. It adds perspective effect to
					your banner.</p>
				<div class="banner ken-banner" style="background: #e2e2e0">
					<figure class="kenBurnsToRight" style="animation-duration: 20s">
						<img class="slide-bg" src="/porto/assets/images/elements/banners/slide3.jpg" alt="slider image"
							width="1200" height="575" style="background-color: #ccc;">
					</figure>
					<div class="container">
						<div class="banner-layer banner-layer-middle banner-layer-left">
							<div class="appear-animate animated fadeInLeftShorter appear-animation-visible"
								data-animation-name="fadeInLeftShorter" data-animation-delay="200"
								style="animation-duration: 1000ms;">
								<h2 class="font-weight-light ls-10">Discover our Arrivals!</h2>
								<a href="#" class="btn btn-link">View our Dresses<i class="icon-right-open-big"></i></a>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="hover-section container mt-8">
				<h3 class="text-center">A lot of Hover Effects</h3>
				<p class="text-center mx-auto mb-3">There are many hover effects as you can see below. Please choose any
					effect to suit your need.</p>
				<div class="row">
					<div class="col-md-4 col-6">
						<div class="banner overlay-effect1 mb-3">
							<figure>
								<img src="/porto/assets/images/elements/banners/banner-effect.jpg" width="1920"
									alt="element-banner" height="1080" /></figure>
							<div class="banner-layer banner-layer-middle text-center">
								<h3 class=" text-white mb-0">Effect 1</h3>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-6">
						<div class="banner overlay-opacity overlay-zoom mb-3">
							<figure>
								<img src="/porto/assets/images/elements/banners/banner-effect.jpg" width="1920"
									alt="element-banner" height="1080" /></figure>
							<div class="banner-layer banner-layer-middle text-center">
								<h3 class=" text-white mb-0">Opacity and Zoom</h3>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-6">
						<div class="banner overlay-effect3 mb-3">
							<figure>
								<img src="/porto/assets/images/elements/banners/banner-effect.jpg" width="1920"
									alt="element-banner" height="1080" /></figure>
							<div class="banner-layer banner-layer-middle text-center">
								<h3 class=" text-white mb-0">Effect 3</h3>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-6">
						<div class="banner overlay-zoom mb-3">
							<figure>
								<div class="banner-label" style="background:#ffc107">Featured</div>
								<img src="/porto/assets/images/elements/banners/banner-effect.jpg" width="1920"
									alt="element-banner" height="1080" />
							</figure>
							<div class="banner-layer banner-layer-middle text-center">
								<h3 class=" text-white mb-0">Zoom</h3>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-6">
						<div class="banner overlay-contentIn mb-3">
							<figure>
								<div class="banner-label">Fade In</div>
								<img src="/porto/assets/images/elements/banners/banner-effect.jpg" width="1920"
									alt="element-banner" height="1080" />
							</figure>
							<div class="banner-layer banner-layer-middle text-center">
								<h3 class=" text-white mb-0">Content Fade In</h3>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-6">
						<div class="banner overlay-opacity mb-3">
							<figure>
								<img src="/porto/assets/images/elements/banners/banner-effect.jpg" width="1920"
									alt="element-banner" height="1080" /></figure>
							<div class="banner-layer banner-layer-middle text-center">
								<h3 class=" text-white mb-0">Overlay</h3>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-6">
						<div class="banner overlay-effect2 mb-3">
							<figure>
								<img src="/porto/assets/images/elements/banners/banner-effect.jpg" width="1920"
									alt="element-banner" height="1080" /></figure>
							<div class="banner-layer banner-layer-middle text-center">
								<h3 class=" text-white mb-0">Effect 2</h3>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-6">
						<div class="banner overlay-contentOut mb-3">
							<figure>
								<div class="banner-label" style="background:#A6C76C">Fade Out</div>
								<img src="/porto/assets/images/elements/banners/banner-effect.jpg" width="1920"
									alt="element-banner" height="1080" />
							</figure>
							<div class="banner-layer banner-layer-middle text-center">
								<h3 class=" text-white mb-0">Content Fade Out</h3>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-6">
						<div class="banner overlay-effect4 mb-3">
							<figure>
								<img src="/porto/assets/images/elements/banners/banner-effect.jpg" width="1920"
									alt="element-banner" height="1080" /></figure>
							<div class="banner-layer banner-layer-middle text-center">
								<h3 class=" text-white mb-0">Effect 4</h3>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="hover-section mt-8">
				<h3 class="text-center">Niche Particle Effects</h3>
				<p class="text-center mx-auto mb-3">Snow and Sparkle effects.</p>
				<div class="owl-carousel owl-theme show-nav-hover slide-animate" data-owl-options="{
					'dots': false,
					'nav': true,
					'loop': false
				}">
					<div class="banner banner3">
						<figure>
							<img width="1920" height="700" src="/porto/assets/images/elements/banners/home_slide1.jpg"
								style="background:#f6e1e8;min-height:36rem;" alt="banner" />
							<div class="snowfall particle-effect"></div>
						</figure>

						<div class="banner-layer banner-layer-middle">
							<div class="appear-animate" data-animation-name="fadeInRightShorter">
								<h4 class="banner-subtitle">New Amazing Collection</h4>
								<h3 class="banner-title">Summer Beauty Sale</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ullamcorper quam
									lacus, et suscipit lectus porta efficitur.</p>
								<h5 class="d-inline-block mb-0">
									<span class="text-uppercase">Starting At</span>
									<b class="coupon-sale-text align-middle">$<em class="align-text-top">39</em>99</b>
								</h5>
								<a href="#" class="btn btn-dark" role="button">Shop Now!</a>

							</div>
						</div>
					</div>
					<div class="banner banner4">
						<figure>
							<img width="1920" height="700" src="/porto/assets/images/elements/banners/home_slide2.jpg"
								style="background:#f6e1e8;min-height:36rem;" alt="banner" />
							<div class="particle-effect sparkle"></div>
						</figure>

						<div class="banner-layer banner-layer-middle text-right">
							<div class="appear-animate" data-animation-name="fadeInLeftShorter">
								<h4 class="banner-subtitle">Back In Stock</h4>
								<h3 class="banner-title">Ultimate SkinCare</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent lori ullamcorper
									quam lacus, et suscipit lectus porta efficitur.</p>
								<h5 class="d-inline-block mb-0">
									<span class="text-uppercase">Starting At</span>
									<b class="coupon-sale-text align-middle">$<em class="align-text-top">39</em>99</b>
								</h5>
								<a href="#" class="btn btn-dark" role="button">Shop Now!</a>

							</div>
						</div>
					</div>
				</div>
			</section>
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
