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
								<li class="breadcrumb-item active" aria-current="page">Product Categories</li>
							</ol>
						</nav>
						<h1 class="page-title text-center text-white">Product Categories</h1>
					</div>
				</div>
			</div>

			<div class="container">
				<section class="simple-section mt-5">
					<h4 class="heading-bottom-border text-uppercase">Simple Categories</h4>
					<div class="row">
						<div class="col-lg-3 col-sm-4 col-6">
							<div class="product-category">
								<a href="/porto/category.html">
									<figure>
										<img src="/porto/assets/images/categories/category-1.jpg" width="300" height="300"
											alt="category">
									</figure>
									<div class="category-content">
										<h3>Sunglasses</h3>
										<span><mark class="count">3</mark> products</span>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-3 col-sm-4 col-6">
							<div class="product-category">
								<a href="/porto/category.html">
									<figure>
										<img src="/porto/assets/images/categories/category-2.jpg" width="300" height="300"
											alt="category">
									</figure>
									<div class="category-content">
										<h3>Bags</h3>
										<span><mark class="count">8</mark> products</span>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-3 col-sm-4 col-6">
							<div class="product-category">
								<a href="/porto/category.html">
									<figure>
										<img src="/porto/assets/images/categories/category-3.jpg" width="300" height="300"
											alt="category">
									</figure>
									<div class="category-content">
										<h3>Shoes</h3>
										<span><mark class="count">2</mark> products</span>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-3 col-sm-4 col-6">
							<div class="product-category">
								<a href="/porto/category.html">
									<figure>
										<img src="/porto/assets/images/categories/category-4.jpg" width="300" height="300"
											alt="category">
									</figure>
									<div class="category-content">
										<h3>Accessories</h3>
										<span><mark class="count">5</mark> products</span>
									</div>
								</a>
							</div>
						</div>
					</div>
				</section>
				<section class="carousel-section pt-5 pb-5">
					<h4 class="heading-bottom-border text-uppercase">Carousel Categories</h4>
					<div class="owl-carousel owl-theme nav-outer" data-owl-options="{
						'loop': true,
						'dots': false,
						'nav': true,
						'margin': 20,
						'responsive': {
							'0': {
								'items': 2
							},
							'576': {
								'items': 3
							},
							'991': {
								'items': 4
							}
						}
					}">
						<div class="product-category content-left-center">
							<a href="/porto/category.html">
								<figure>
									<img src="/porto/assets/images/categories/category-fashion-cat.jpg" width="300"
										height="300" alt="category">
								</figure>
								<div class="category-content">
									<h3>Fashion</h3>
									<span><mark class="count">5</mark> products</span>
								</div>
							</a>
						</div>
						<div class="product-category content-left-center">
							<a href="/porto/category.html">
								<figure>
									<img src="/porto/assets/images/categories/category-electronics-cat.jpg" width="300"
										height="300" alt="category">
								</figure>
								<div class="category-content">
									<h3>electronics</h3>
									<span><mark class="count">3</mark> products</span>
								</div>
							</a>
						</div>
						<div class="product-category content-left-center">
							<a href="/porto/category.html">
								<figure>
									<img src="/porto/assets/images/categories/category-sports-cat.jpg" width="300" height="300"
										alt="category">
								</figure>
								<div class="category-content">
									<h3>Sports</h3>
									<span><mark class="count">5</mark> products</span>
								</div>
							</a>
						</div>
						<div class="product-category content-left-center">
							<a href="/porto/category.html">
								<figure>
									<img src="/porto/assets/images/categories/category-fashion-cat.jpg" width="300"
										height="300" alt="category">
								</figure>
								<div class="category-content">
									<h3>Men</h3>
									<span><mark class="count">4</mark> products</span>
								</div>
							</a>
						</div>
						<div class="product-category content-left-center">
							<a href="/porto/category.html">
								<figure>
									<img src="/porto/assets/images/categories/category-fashion-cat.jpg" width="300"
										height="300" alt="category">
								</figure>
								<div class="category-content">
									<h3>Fashion</h3>
									<span><mark class="count">5</mark> products</span>
								</div>
							</a>
						</div>
						<div class="product-category content-left-center">
							<a href="/porto/category.html">
								<figure>
									<img src="/porto/assets/images/categories/category-electronics-cat.jpg" width="300"
										height="300" alt="category">
								</figure>
								<div class="category-content">
									<h3>electronics</h3>
									<span><mark class="count">3</mark> products</span>
								</div>
							</a>
						</div>
						<div class="product-category content-left-center">
							<a href="/porto/category.html">
								<figure>
									<img src="/porto/assets/images/categories/category-sports-cat.jpg" width="300" height="300"
										alt="category">
								</figure>
								<div class="category-content">
									<h3>Sports</h3>
									<span><mark class="count">5</mark> products</span>
								</div>
							</a>
						</div>
						<div class="product-category content-left-center">
							<a href="/porto/category.html">
								<figure>
									<img src="/porto/assets/images/categories/category-fashion-cat.jpg" width="300"
										height="300" alt="category">
								</figure>
								<div class="category-content">
									<h3>Men</h3>
									<span><mark class="count">4</mark> products</span>
								</div>
							</a>
						</div>
					</div>
				</section>
				<section class="overlay-section mt-4">
					<h4 class="heading-bottom-border text-uppercase">Overlay Categories</h4>
					<div class="row">
						<div class="col-lg-3 col-sm-4 col-6">
							<div class="product-category content-center overlay-light">
								<a href="/porto/category.html">
									<figure>
										<img src="/porto/assets/images/categories/category-1.jpg" width="300" height="300"
											alt="category">
									</figure>
									<div class="category-content">
										<h3>Sunglasses</h3>
										<span><mark class="count">3</mark> products</span>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-3 col-sm-4 col-6">
							<div class="product-category content-center overlay-light">
								<a href="/porto/category.html">
									<figure>
										<img src="/porto/assets/images/categories/category-2.jpg" width="300" height="300"
											alt="category">
									</figure>
									<div class="category-content">
										<h3>Bags</h3>
										<span><mark class="count">8</mark> products</span>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-3 col-sm-4 col-6">
							<div class="product-category content-center overlay-light">
								<a href="/porto/category.html">
									<figure>
										<img src="/porto/assets/images/categories/category-3.jpg" width="300" height="300"
											alt="category">
									</figure>
									<div class="category-content">
										<h3>Shoes</h3>
										<span><mark class="count">2</mark> products</span>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-3 col-sm-4 col-6">
							<div class="product-category content-center overlay-light">
								<a href="/porto/category.html">
									<figure>
										<img src="/porto/assets/images/categories/category-4.jpg" width="300" height="300"
											alt="category">
									</figure>
									<div class="category-content">
										<h3>Accessories</h3>
										<span><mark class="count">5</mark> products</span>
									</div>
								</a>
							</div>
						</div>
					</div>
				</section>
				<section class="creative-section mt-5">
					<h4 class="heading-bottom-border text-uppercase">Creative Categories 1</h4>
					<div class="creative-grid grid row">
						<div
							class="col-md-6 col-12 product-category content-left-bottom hidden-count overlay-light grid-item height-600">
							<a href="/porto/category.html">
								<figure>
									<img src="/porto/assets/images/categories/category-5.jpg" width="800" height="800"
										alt="category">
								</figure>
								<div class="category-content">
									<h3>Sunglasses</h3>
									<span><mark class="count">5</mark> products</span>
								</div>
							</a>
						</div>
						<div
							class="col-md-3 col-sm-6 col-12 product-category content-left-bottom hidden-count overlay-light grid-item height-300">
							<a href="/porto/category.html">
								<figure>
									<img src="/porto/assets/images/categories/category-6.jpg" width="400" height="400"
										alt="category">
								</figure>
								<div class="category-content">
									<h3>Shoes</h3>
									<span><mark class="count">17</mark> products</span>
								</div>
							</a>
						</div>
						<div
							class="col-md-3 col-sm-6 col-12 product-category content-left-bottom hidden-count overlay-light grid-item height-600">
							<a href="/porto/category.html">
								<figure>
									<img src="/porto/assets/images/categories/category-8.jpg" width="800" height="800"
										alt="category">
								</figure>
								<div class="category-content">
									<h3>Accessories</h3>
									<span><mark class="count">7</mark> products</span>
								</div>
							</a>
						</div>
						<div
							class="col-md-3 col-sm-6 col-12 product-category content-left-bottom hidden-count overlay-light grid-item height-300">
							<a href="/porto/category.html">
								<figure>
									<img src="/porto/assets/images/categories/category-7.jpg" width="400" height="400"
										alt="category">
								</figure>
								<div class="category-content">
									<h3>Bags</h3>
									<span><mark class="count">4</mark> products</span>
								</div>
							</a>
						</div>
						<div class="col-1 grid-col-sizer"></div>
					</div>
					<h4 class="heading-bottom-border text-uppercase mt-5">Creative Categories 2</h4>
					<div class="creative-grid grid row">
						<div
							class="col-md-6 col-12 product-category content-left-bottom hidden-count overlay-darker grid-item height-400">
							<a href="/porto/category.html">
								<figure>
									<img src="/porto/assets/images/categories/category-5.jpg" width="800" height="800"
										alt="category">
								</figure>
								<div class="category-content">
									<h3>Sunglasses</h3>
									<span><mark class="count">5</mark> products</span>
								</div>
							</a>
						</div>
						<div
							class="col-md-3 col-sm-6 col-12 product-category content-left-bottom hidden-count overlay-darker grid-item height-300">
							<a href="/porto/category.html">
								<figure>
									<img src="/porto/assets/images/categories/category-6.jpg" width="400" height="400"
										alt="category">
								</figure>
								<div class="category-content">
									<h3>Shoes</h3>
									<span><mark class="count">17</mark> products</span>
								</div>
							</a>
						</div>
						<div
							class="col-md-3 col-sm-6 col-12 product-category content-left-bottom hidden-count overlay-darker grid-item height-600">
							<a href="/porto/category.html">
								<figure>
									<img src="/porto/assets/images/categories/category-8.jpg" width="800" height="800"
										alt="category">
								</figure>
								<div class="category-content">
									<h3>Accessories</h3>
									<span><mark class="count">7</mark> products</span>
								</div>
							</a>
						</div>
						<div
							class="col-md-3 col-sm-6 col-12 product-category content-left-bottom hidden-count overlay-darker order-md-1 grid-item height-300">
							<a href="/porto/category.html">
								<figure>
									<img src="/porto/assets/images/categories/category-7.jpg" width="400" height="400"
										alt="category">
								</figure>
								<div class="category-content">
									<h3>Bags</h3>
									<span><mark class="count">4</mark> products</span>
								</div>
							</a>
						</div>
						<div
							class="col-md-6 col-12 product-category content-left-bottom hidden-count overlay-darker grid-item height-200">
							<a href="/porto/category.html">
								<figure>
									<img src="/porto/assets/images/categories/category-9.jpg" width="1000" height="1000"
										alt="category">
								</figure>
								<div class="category-content">
									<h3>Music</h3>
									<span><mark class="count">7</mark> products</span>
								</div>
							</a>
						</div>
						<div class="col-1 grid-col-sizer"></div>
					</div>
				</section>
				<section class="icon-section mt-5">
					<h4 class="heading-bottom-border text-uppercase">Icon Categories</h4>
					<div class="row">
						<div class="col-5col-1 col-lg-3 col-sm-4 col-6">
							<div class="product-category content-center-bottom">
								<a href="/porto/category.html">
									<figure>
										<img src="/porto/assets/images/categories/head_phone.jpg" width="220" height="180"
											alt="category">
									</figure>
									<div class="category-content">
										<h3>Head Phone</h3>
									</div>
								</a>
							</div>
						</div>
						<div class="col-5col-1 col-lg-3 col-sm-4 col-6">
							<div class="product-category content-center-bottom">
								<a href="/porto/category.html">
									<figure>
										<img src="/porto/assets/images/categories/laptop.jpg" width="220" height="180"
											alt="category">
									</figure>
									<div class="category-content">
										<h3>Laptop</h3>
									</div>
								</a>
							</div>
						</div>
						<div class="col-5col-1 col-lg-3 col-sm-4 col-6">
							<div class="product-category content-center-bottom">
								<a href="/porto/category.html">
									<figure>
										<img src="/porto/assets/images/categories/smart_phone.jpg" width="220" height="180"
											alt="category">
									</figure>
									<div class="category-content">
										<h3>Smart Phone</h3>
									</div>
								</a>
							</div>
						</div>
						<div class="col-5col-1 col-lg-3 col-sm-4 col-6">
							<div class="product-category content-center-bottom">
								<a href="/porto/category.html">
									<figure>
										<img src="/porto/assets/images/categories/smart_watch.jpg" width="220" height="180"
											alt="category">
									</figure>
									<div class="category-content">
										<h3>Smart Watches</h3>
									</div>
								</a>
							</div>
						</div>
						<div class="col-5col-1 col-lg-3 col-sm-4 col-6">
							<div class="product-category content-center-bottom">
								<a href="/porto/category.html">
									<figure>
										<img src="/porto/assets/images/categories/bulb.jpg" width="220" height="180"
											alt="category">
									</figure>
									<div class="category-content">
										<h3>Bulb</h3>
									</div>
								</a>
							</div>
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
