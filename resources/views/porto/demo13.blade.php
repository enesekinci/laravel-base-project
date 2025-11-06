@extends('layouts.porto')

@section('footer')
    @include('components.porto.footer-demo13')
@endsection

@section('top-notice')
    @include('components.porto.top-notice-demo13')
@endsection


@section('header')
    @include('components.porto.header-demo13')
@endsection

@section('content')
<div class="home-top-container mt-lg-2">
				<div class="container">
					<div class="row">
						<div class="col-lg-9 col-md-12 mb-2">
							<div class="home-slider owl-carousel owl-theme owl-carousel-lazy h-100 slide-animate"
								data-owl-options="{
								'dots': true,
								'nav': false,
								'loop': false
							}">
								<div class="home-slide home-slide1 banner banner-md-vw h-100">
									<figure>
										<img class="slide-bg" src="/porto/assets/images/demoes/demo13/slider/slide-1.jpg"
											style="background-color: #555;" alt="slider image" width="835" height="445">
									</figure>

									<div class="banner-layer banner-layer-middle intro-banner">
										<div class="appear-animate" data-animation-name="fadeInLeftShorter"
											data-animation-delay="200">
											<h4 class="text-white">Find the Boundaries. Push Through!</h4>
											<h2 class="text-white m-b-1">Summer Sale</h2>
											<h3 class="text-white text-uppercase m-b-3">70% Off</h3>
											<h5
												class="text-white text-uppercase d-inline-block mb-1 pb-1 ls-n-20 align-text-bottom">
												Starting At
												<b class="coupon-sale-text bg-secondary text-white d-inline-block">$
													<em>199</em>99</b>
											</h5>
											<a href="/porto/demo13-shop.html"
												class="btn btn-dark btn-md ls-10 align-bottom">Shop Now!</a>
										</div>
									</div>
									<!-- End .banner-layer -->
								</div>
								<!-- End .home-slide -->

								<div class="home-slide home-slide2 banner banner-md-vw h-100">
									<figure>
										<img class="slide-bg" src="/porto/assets/images/demoes/demo13/slider/slide-2.jpg"
											style="background-color: rgb(216, 41, 41);" alt="slider image" width="833"
											height="445">
									</figure>

									<div class="banner-layer banner-layer-middle text-uppercase">
										<div class="appear-animate" data-animation-name="fadeInLeftShorter"
											data-animation-delay="200">
											<h4 class="text-white m-b-2">Over 200 products with discounts</h4>
											<h2 class="text-white m-b-3">Great Deals</h2>
											<h5 class="text-white d-inline-block mb-0 align-top mr-4 pt-2">Starting At
												<b class="ml-2 mr-3">$
													<em>299</em>99</b>
											</h5>
											<a href="/porto/demo13-shop.html" class="btn btn-primary btn-md ls-10">Get
												Yours!</a>
										</div>
									</div>
									<!-- End .banner-layer -->
								</div>
								<!-- End .home-slide -->
							</div>
							<!-- End .home-slider -->
						</div>
						<!-- End .col-lg-9 -->

						<div class="col-lg-3 top-banners">
							<div class="row">
								<div class="col-md-4 col-lg-12">
									<div class="banner banner1 banner-md-vw-large banner-sm-vw-large mb-2">
										<figure>
											<img src="/porto/assets/images/demoes/demo13/banners/banner-1.jpg"
												style="background-color: #ccc;" alt="banner" width="264" height="133">
										</figure>
										<div class="banner-layer banner-layer-middle text-right">
											<h3 class="m-b-2">Handbags</h3>
											<h4 class="text-secondary text-uppercase">Starting at $99</h4>
											<a href="/porto/demo13-shop.html" class="text-dark text-uppercase ls-10 py-1">Shop
												Now
											</a>
										</div>
									</div>
									<!-- End .banner -->
								</div>
								<div class="col-md-4 col-lg-12">
									<div
										class="banner banner2 banner-md-vw-large banner-sm-vw-large text-uppercase mb-2">
										<figure>
											<img src="/porto/assets/images/demoes/demo13/banners/banner-2.jpg"
												style="background-color: #fff;" alt="banner" width="264" height="133">
										</figure>
										<div class="banner-layer banner-layer-middle text-center">
											<h3 class="m-b-1 text-primary">Deal Promos</h3>
											<h4 class="mb-1 pb-1 text-body">Starting at $99</h4>
											<a href="/porto/demo13-shop.html" class="text-dark ls-10 pb-1">Shop Now</a>
										</div>
									</div>
									<!-- End .banner -->
								</div>
								<div class="col-md-4 col-lg-12">
									<div class="banner banner3 banner-md-vw-large banner-sm-vw-large mb-2">
										<figure>
											<img src="/porto/assets/images/demoes/demo13/banners/banner-3.jpg"
												style="background-color: #b8c1d0;" alt="banner" width="264" height="133"
												style="object-position: left;">
										</figure>
										<div class="banner-layer banner-layer-middle">
											<h3 class="m-b-2">Black Jackets</h3>
											<h4 class="text-white text-uppercase">Starting at $99</h4>
											<a href="/porto/demo13-shop.html" class="text-dark text-uppercase ls-10 pb-1">Shop
												Now
											</a>
										</div>
									</div>
									<!-- End .banner -->
								</div>
							</div>
						</div>
						<!-- End .col-lg-3 -->
					</div>
					<!-- End .row -->
				</div>
				<!-- End .container -->
			</div>
			<!-- End .home-top-container -->

			<div class="info-boxes-container bg-dark2 mb-4">
				<div class="container">
					<div class="info-boxes-slider owl-carousel owl-theme" data-owl-options="{
						'dots': false,
						'margin': 20,
						'loop': false,
						'responsive': {
							'576': {
								'items': 2
							},
							'992': {
								'items': 3
							}
						}
					}">
						<div class="info-box text-white info-box-icon-left">
							<i class="icon-shipping"></i>

							<div class="info-box-content pt-1">
								<h4>FREE SHIPPING & RETURN</h4>
								<p>Free Shipping on All Orders Over $99.</p>
							</div>
							<!-- End .info-box-content -->
						</div>
						<!-- End .info-box -->

						<div class="info-box text-white info-box-icon-left">
							<i class="icon-money"></i>

							<div class="info-box-content pt-1">
								<h4>MONEY BACK GUARANTEE</h4>
								<p>100% Money Back Guarantee</p>
							</div>
							<!-- End .info-box-content -->
						</div>
						<!-- End .info-box -->

						<div class="info-box text-white info-box-icon-left">
							<i class="icon-support"></i>

							<div class="info-box-content pt-1">
								<h4>ONLINE SUPPORT 24/7</h4>
								<p>Lorem Ipsum Dolor Sit Amet.</p>
							</div>
							<!-- End .info-box-content -->
						</div>
						<!-- End .info-box -->
					</div>
					<!-- End .info-boxes-slider -->
				</div>
				<!-- End .container -->
			</div>
			<!-- End .info-boxes-container -->

			<div class="container">
				<div class="row">
					<div class="col-lg-9">
						<div class="home-product-tabs">
							<ul class="nav nav-tabs mb-2" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="featured-products-tab" data-toggle="tab"
										href="#featured-products" role="tab" aria-controls="featured-products"
										aria-selected="true">Featured Products</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="latest-products-tab" data-toggle="tab"
										href="#latest-products" role="tab" aria-controls="latest-products"
										aria-selected="false">Latest Products</a>
								</li>
							</ul>
							<div class="tab-content appear-animate" data-animation-name="fadeIn"
								data-animation-delay="200">
								<div class="tab-pane fade show active" id="featured-products" role="tabpanel"
									aria-labelledby="featured-products-tab">
									<div class="row">
										<!-- product-1 -->
										<div class="col-6 col-sm-4">
											<div class="product-default inner-quickview inner-icon">
												<figure>
													<a href="/porto/demo13-product.html">
														<img src="/porto/assets/images/demoes/demo13/products/product-5.jpg"
															width="300" height="300" alt="product">
														<img src="/porto/assets/images/demoes/demo13/products/product-5-2.jpg"
															width="300" height="300" alt="product">
													</a>
													<div class="label-group">
														<span class="product-label label-sale">-30%</span>
													</div>
													<div class="btn-icon-group">
														<a href="#" class="btn-icon btn-add-cart product-type-simple">
															<i class="icon-shopping-cart"></i>
														</a>
													</div>
													<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
														title="Quick View">Quick View</a>
												</figure>
												<div class="product-details">
													<div class="category-wrap">
														<div class="category-list">
															<a href="/porto/demo13-shop.html" class="product-category">SHOES,
																TOYS
															</a>
														</div>
														<a href="#" class="btn-icon-wish">
															<i class="icon-wishlist-2"></i>
														</a>
													</div>
													<h3 class="product-title">
														<a href="/porto/demo13-product.html">Men Gentle Shoes</a>
													</h3>
													<div class="ratings-container">
														<div class="product-ratings">
															<span class="ratings" style="width:100%"></span>
															<!-- End .ratings -->
															<span class="tooltiptext tooltip-top"></span>
														</div>
														<!-- End .product-ratings -->
													</div>
													<!-- End .product-container -->
													<div class="price-box">
														<span class="product-price">$269.00</span>
													</div>
													<!-- End .price-box -->
												</div>
												<!-- End .product-details -->
											</div>
										</div>
										<!-- product-2 -->
										<div class="col-6 col-sm-4">
											<div class="product-default inner-quickview inner-icon">
												<figure>
													<a href="/porto/demo13-product.html">
														<img src="/porto/assets/images/demoes/demo13/products/product-1.jpg"
															width="300" height="300" alt="product">
														<img src="/porto/assets/images/demoes/demo13/products/product-1-2.jpg"
															width="300" height="300" alt="product">
													</a>
													<div class="label-group">
														<span class="product-label label-hot">HOT</span>
													</div>
													<div class="btn-icon-group">
														<a href="#" class="btn-icon btn-add-cart product-type-simple">
															<i class="icon-shopping-cart"></i>
														</a>
													</div>
													<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
														title="Quick View">Quick View</a>
												</figure>
												<div class="product-details">
													<div class="category-wrap">
														<div class="category-list">
															<a href="/porto/demo13-shop.html" class="product-category">CAPS,
																DRESS
															</a>
														</div>
														<a href="#" class="btn-icon-wish">
															<i class="icon-wishlist-2"></i>
														</a>
													</div>
													<h3 class="product-title">
														<a href="/porto/demo13-product.html">Porto Gray Cap</a>
													</h3>
													<div class="ratings-container">
														<div class="product-ratings">
															<span class="ratings" style="width:0%"></span>
															<!-- End .ratings -->
															<span class="tooltiptext tooltip-top"></span>
														</div>
														<!-- End .product-ratings -->
													</div>
													<!-- End .product-container -->
													<div class="price-box">
														<span class="product-price">$29.00</span>
													</div>
													<!-- End .price-box -->
												</div>
												<!-- End .product-details -->
											</div>
										</div>
										<!-- product-3 -->
										<div class="col-6 col-sm-4">
											<div class="product-default inner-quickview inner-icon">
												<figure>
													<a href="/porto/demo13-product.html">
														<img src="/porto/assets/images/demoes/demo13/products/product-8.jpg"
															width="300" height="300" alt="product">
														<img src="/porto/assets/images/demoes/demo13/products/product-8-2.jpg"
															width="300" height="300" alt="product">
													</a>
													<div class="label-group">
														<span class="product-label label-sale">-20%</span>
													</div>
													<div class="btn-icon-group">
														<a href="#" class="btn-icon btn-add-cart product-type-simple">
															<i class="icon-shopping-cart"></i>
														</a>
													</div>
													<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
														title="Quick View">Quick View</a>
												</figure>
												<div class="product-details">
													<div class="category-wrap">
														<div class="category-list">
															<a href="/porto/demo13-shop.html" class="product-category">CAPS,
																T-SHIRTS
															</a>
														</div>
														<a href="#" class="btn-icon-wish">
															<i class="icon-wishlist-2"></i>
														</a>
													</div>
													<h3 class="product-title">
														<a href="/porto/demo13-product.html">Porto White Cap</a>
													</h3>
													<div class="ratings-container">
														<div class="product-ratings">
															<span class="ratings" style="width:0%"></span>
															<!-- End .ratings -->
															<span class="tooltiptext tooltip-top">5.00</span>
														</div>
														<!-- End .product-ratings -->
													</div>
													<!-- End .product-container -->
													<div class="price-box">
														<span class="product-price">$101.00 – $108.00</span>
													</div>
													<!-- End .price-box -->
												</div>
												<!-- End .product-details -->
											</div>
										</div>
										<!-- product-4 -->
										<div class="col-6 col-sm-4">
											<div class="product-default inner-quickview inner-icon">
												<figure>
													<a href="/porto/demo13-product.html">
														<img src="/porto/assets/images/demoes/demo13/products/product-11.jpg"
															width="300" height="300" alt="product">
														<img src="/porto/assets/images/demoes/demo13/products/product-11-2.jpg"
															width="300" height="300" alt="product">
													</a>
													<div class="btn-icon-group">
														<a href="#" class="btn-icon btn-add-cart product-type-simple">
															<i class="icon-shopping-cart"></i>
														</a>
													</div>
													<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
														title="Quick View">Quick View</a>
												</figure>
												<div class="product-details">
													<div class="category-wrap">
														<div class="category-list">
															<a href="/porto/demo13-shop.html" class="product-category">DRESS,
																T-SHIRTS
															</a>
														</div>
														<a href="#" class="btn-icon-wish">
															<i class="icon-wishlist-2"></i>
														</a>
													</div>
													<h3 class="product-title">
														<a href="/porto/demo13-product.html">Winter Towel</a>
													</h3>
													<div class="ratings-container">
														<div class="product-ratings">
															<span class="ratings" style="width:0%"></span>
															<!-- End .ratings -->
															<span class="tooltiptext tooltip-top">5.00</span>
														</div>
														<!-- End .product-ratings -->
													</div>
													<!-- End .product-container -->
													<div class="price-box">
														<span class="product-price">$49.00</span>
													</div>
													<!-- End .price-box -->
												</div>
												<!-- End .product-details -->
											</div>
										</div>
										<!-- product-5 -->
										<div class="col-6 col-sm-4">
											<div class="product-default inner-quickview inner-icon">
												<figure>
													<a href="/porto/demo13-product.html">
														<img src="/porto/assets/images/demoes/demo13/products/product-9.jpg"
															width="300" height="300" alt="product">
														<img src="/porto/assets/images/demoes/demo13/products/product-9-2.jpg"
															width="300" height="300" alt="product">
													</a>
													<div class="btn-icon-group">
														<a href="#" class="btn-icon btn-add-cart product-type-simple">
															<i class="icon-shopping-cart"></i>
														</a>
													</div>
													<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
														title="Quick View">Quick View</a>
												</figure>
												<div class="product-details">
													<div class="category-wrap">
														<div class="category-list">
															<a href="/porto/demo13-shop.html" class="product-category">DRESS,
																HEADPHONE
															</a>
														</div>
														<a href="#" class="btn-icon-wish">
															<i class="icon-wishlist-2"></i>
														</a>
													</div>
													<h3 class="product-title">
														<a href="/porto/demo13-product.html">Product Extended</a>
													</h3>
													<div class="ratings-container">
														<div class="product-ratings">
															<span class="ratings" style="width:100%"></span>
															<!-- End .ratings -->
															<span class="tooltiptext tooltip-top"></span>
														</div>
														<!-- End .product-ratings -->
													</div>
													<!-- End .product-container -->
													<div class="price-box">
														<span class="product-price">$39.00</span>
													</div>
													<!-- End .price-box -->
												</div>
												<!-- End .product-details -->
											</div>
										</div>
										<!-- product-6 -->
										<div class="col-6 col-sm-4">
											<div class="product-default inner-quickview inner-icon">
												<figure>
													<a href="/porto/demo13-product.html">
														<img src="/porto/assets/images/demoes/demo13/products/product-10.jpg"
															width="300" height="300" alt="product">
														<img src="/porto/assets/images/demoes/demo13/products/product-10-2.jpg"
															width="300" height="300" alt="product">
													</a>
													<div class="label-group">
														<span class="product-label label-hot">HOT</span>
													</div>
													<div class="btn-icon-group">
														<a href="#" class="btn-icon btn-add-cart product-type-simple">
															<i class="icon-shopping-cart"></i>
														</a>
													</div>
													<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
														title="Quick View">Quick View</a>
												</figure>
												<div class="product-details">
													<div class="category-wrap">
														<div class="category-list">
															<a href="/porto/demo13-shop.html" class="product-category">SHOES,
																TOYS
															</a>
														</div>
														<a href="#" class="btn-icon-wish">
															<i class="icon-wishlist-2"></i>
														</a>
													</div>
													<h3 class="product-title">
														<a href="/porto/demo13-product.html">Sports Shoes</a>
													</h3>
													<div class="ratings-container">
														<div class="product-ratings">
															<span class="ratings" style="width:0%"></span>
															<!-- End .ratings -->
															<span class="tooltiptext tooltip-top"></span>
														</div>
														<!-- End .product-ratings -->
													</div>
													<!-- End .product-container -->
													<div class="price-box">
														<span class="product-price">$239.00 – $259.00</span>
													</div>
													<!-- End .price-box -->
												</div>
												<!-- End .product-details -->
											</div>
										</div>
										<!-- product-7 -->
										<div class="col-6 col-sm-4">
											<div class="product-default inner-quickview inner-icon">
												<figure>
													<a href="/porto/demo13-product.html">
														<img src="/porto/assets/images/demoes/demo13/products/product-14.jpg"
															width="300" height="300" alt="product">
														<img src="/porto/assets/images/demoes/demo13/products/product-14-2.jpg"
															width="300" height="300" alt="product">
													</a>
													<div class="btn-icon-group">
														<a href="#" class="btn-icon btn-add-cart product-type-simple">
															<i class="icon-shopping-cart"></i>
														</a>
													</div>
													<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
														title="Quick View">Quick View</a>
												</figure>
												<div class="product-details">
													<div class="category-wrap">
														<div class="category-list">
															<a href="/porto/demo13-shop.html" class="product-category">TOYS,
																TROUSERS
															</a>
														</div>
														<a href="#" class="btn-icon-wish">
															<i class="icon-wishlist-2"></i>
														</a>
													</div>
													<h3 class="product-title">
														<a href="/porto/demo13-product.html">Women Bag</a>
													</h3>
													<div class="ratings-container">
														<div class="product-ratings">
															<span class="ratings" style="width:100%"></span>
															<!-- End .ratings -->
															<span class="tooltiptext tooltip-top"></span>
														</div>
														<!-- End .product-ratings -->
													</div>
													<!-- End .product-container -->
													<div class="price-box">
														<span class="product-price">$299.00</span>
													</div>
													<!-- End .price-box -->
												</div>
												<!-- End .product-details -->
											</div>
										</div>
										<!-- product-8 -->
										<div class="col-6 col-sm-4">
											<div class="product-default inner-quickview inner-icon">
												<figure>
													<a href="/porto/demo13-product.html">
														<img src="/porto/assets/images/demoes/demo13/products/product-4.jpg"
															width="300" height="300" alt="product">
														<img src="/porto/assets/images/demoes/demo13/products/product-4-2.jpg"
															width="300" height="300" alt="product">
													</a>
													<div class="btn-icon-group">
														<a href="#" class="btn-icon btn-add-cart product-type-simple">
															<i class="icon-shopping-cart"></i>
														</a>
													</div>
													<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
														title="Quick View">Quick View</a>
												</figure>
												<div class="product-details">
													<div class="category-wrap">
														<div class="category-list">
															<a href="/porto/demo13-shop.html"
																class="product-category">HEADPHONE, WATCHES</a>
														</div>
														<a href="#" class="btn-icon-wish">
															<i class="icon-wishlist-2"></i>
														</a>
													</div>
													<h3 class="product-title">
														<a href="/porto/demo13-product.html">Men Black Belts</a>
													</h3>
													<div class="ratings-container">
														<div class="product-ratings">
															<span class="ratings" style="width:0%"></span>
															<!-- End .ratings -->
															<span class="tooltiptext tooltip-top"></span>
														</div>
														<!-- End .product-ratings -->
													</div>
													<!-- End .product-container -->
													<div class="price-box">
														<span class="product-price">$55.00</span>
													</div>
													<!-- End .price-box -->
												</div>
												<!-- End .product-details -->
											</div>
										</div>
										<!-- product-9 -->
										<div class="col-6 col-sm-4">
											<div class="product-default inner-quickview inner-icon">
												<figure>
													<a href="/porto/demo13-product.html">
														<img src="/porto/assets/images/demoes/demo13/products/product-12.jpg"
															width="300" height="300" alt="product">
														<img src="/porto/assets/images/demoes/demo13/products/product-12-2.jpg"
															width="300" height="300" alt="product">
													</a>
													<div class="label-group">
														<span class="product-label label-hot">HOT</span>
													</div>
													<div class="btn-icon-group">
														<a href="#" class="btn-icon btn-add-cart product-type-simple">
															<i class="icon-shopping-cart"></i>
														</a>
													</div>
													<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
														title="Quick View">Quick View</a>
												</figure>
												<div class="product-details">
													<div class="category-wrap">
														<div class="category-list">
															<a href="/porto/demo13-shop.html" class="product-category">DRESS,
																WATCHES
															</a>
														</div>
														<a href="#" class="btn-icon-wish">
															<i class="icon-wishlist-2"></i>
														</a>
													</div>
													<h3 class="product-title">
														<a href="/porto/demo13-product.html">Women Bag</a>
													</h3>
													<div class="ratings-container">
														<div class="product-ratings">
															<span class="ratings" style="width:0%"></span>
															<!-- End .ratings -->
															<span class="tooltiptext tooltip-top"></span>
														</div>
														<!-- End .product-ratings -->
													</div>
													<!-- End .product-container -->
													<div class="price-box">
														<del class="old-price">$299.00</del>
														<span class="product-price">$199.00</span>
													</div>
													<!-- End .price-box -->
												</div>
												<!-- End .product-details -->
											</div>
										</div>
									</div>
								</div>
								<!-- End .tab-pane -->
								<div class="tab-pane fade" id="latest-products" role="tabpanel"
									aria-labelledby="latest-products-tab">
									<div class="row">
										<div class="col-6 col-sm-4">
											<div class="product-default inner-quickview inner-icon">
												<figure>
													<a href="/porto/demo13-product.html">
														<img src="/porto/assets/images/demoes/demo13/products/product-1.jpg"
															width="300" height="300" alt="product">
													</a>
													<div class="label-group">
														<span class="product-label label-sale">-30%</span>
													</div>
													<div class="btn-icon-group">
														<a href="#" class="btn-icon btn-add-cart product-type-simple">
															<i class="icon-shopping-cart"></i>
														</a>
													</div>
													<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
														title="Quick View">Quick View</a>
												</figure>
												<div class="product-details">
													<div class="category-wrap">
														<div class="category-list">
															<a href="/porto/demo13-shop.html"
																class="product-category">category</a>
														</div>
														<a href="#" class="btn-icon-wish">
															<i class="icon-wishlist-2"></i>
														</a>
													</div>
													<h3 class="product-title">
														<a href="/porto/demo13-product.html">Product Short Name</a>
													</h3>
													<div class="ratings-container">
														<div class="product-ratings">
															<span class="ratings" style="width:100%"></span>
															<!-- End .ratings -->
															<span class="tooltiptext tooltip-top">5.00</span>
														</div>
														<!-- End .product-ratings -->
													</div>
													<!-- End .product-container -->
													<div class="price-box">
														<span class="old-price">$59.00</span>
														<span class="product-price">$49.00</span>
													</div>
													<!-- End .price-box -->
												</div>
												<!-- End .product-details -->
											</div>
										</div>
										<div class="col-6 col-sm-4">
											<div class="product-default inner-quickview inner-icon">
												<figure>
													<a href="/porto/demo13-product.html">
														<img src="/porto/assets/images/demoes/demo13/products/product-2.jpg"
															width="300" height="300" alt="product">
													</a>
													<div class="btn-icon-group">
														<a href="#" class="btn-icon btn-add-cart product-type-simple">
															<i class="icon-shopping-cart"></i>
														</a>
													</div>
													<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
														title="Quick View">Quick View</a>
												</figure>
												<div class="product-details">
													<div class="category-wrap">
														<div class="category-list">
															<a href="/porto/demo13-shop.html"
																class="product-category">category</a>
														</div>
														<a href="#" class="btn-icon-wish">
															<i class="icon-wishlist-2"></i>
														</a>
													</div>
													<h3 class="product-title">
														<a href="/porto/demo13-product.html">Product Short Name</a>
													</h3>
													<div class="ratings-container">
														<div class="product-ratings">
															<span class="ratings" style="width:100%"></span>
															<!-- End .ratings -->
															<span class="tooltiptext tooltip-top"></span>
														</div>
														<!-- End .product-ratings -->
													</div>
													<!-- End .product-container -->
													<div class="price-box">
														<span class="old-price">$59.00</span>
														<span class="product-price">$49.00</span>
													</div>
													<!-- End .price-box -->
												</div>
												<!-- End .product-details -->
											</div>
										</div>
										<div class="col-6 col-sm-4">
											<div class="product-default inner-quickview inner-icon">
												<figure>
													<a href="/porto/demo13-product.html">
														<img src="/porto/assets/images/demoes/demo13/products/product-3.jpg"
															width="300" height="300" alt="product">
													</a>
													<div class="label-group">
														<span class="product-label label-hot">HOT</span>
													</div>
													<div class="btn-icon-group">
														<a href="#" class="btn-icon btn-add-cart product-type-simple">
															<i class="icon-shopping-cart"></i>
														</a>
													</div>
													<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
														title="Quick View">Quick View</a>
												</figure>
												<div class="product-details">
													<div class="category-wrap">
														<div class="category-list">
															<a href="/porto/demo13-shop.html"
																class="product-category">category</a>
														</div>
														<a href="#" class="btn-icon-wish">
															<i class="icon-wishlist-2"></i>
														</a>
													</div>
													<h3 class="product-title">
														<a href="/porto/demo13-product.html">Product Short Name</a>
													</h3>
													<div class="ratings-container">
														<div class="product-ratings">
															<span class="ratings" style="width:100%"></span>
															<!-- End .ratings -->
															<span class="tooltiptext tooltip-top"></span>
														</div>
														<!-- End .product-ratings -->
													</div>
													<!-- End .product-container -->
													<div class="price-box">
														<span class="old-price">$59.00</span>
														<span class="product-price">$49.00</span>
													</div>
													<!-- End .price-box -->
												</div>
												<!-- End .product-details -->
											</div>
										</div>
										<div class="col-6 col-sm-4">
											<div class="product-default inner-quickview inner-icon">
												<figure>
													<a href="/porto/demo13-product.html">
														<img src="/porto/assets/images/demoes/demo13/products/product-4.jpg"
															width="300" height="300" alt="product">
													</a>
													<div class="btn-icon-group">
														<a href="#" class="btn-icon btn-add-cart product-type-simple">
															<i class="icon-shopping-cart"></i>
														</a>
													</div>
													<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
														title="Quick View">Quick View</a>
												</figure>
												<div class="product-details">
													<div class="category-wrap">
														<div class="category-list">
															<a href="/porto/demo13-shop.html"
																class="product-category">category</a>
														</div>
														<a href="#" class="btn-icon-wish">
															<i class="icon-wishlist-2"></i>
														</a>
													</div>
													<h3 class="product-title">
														<a href="/porto/demo13-product.html">Product Short Name</a>
													</h3>
													<div class="ratings-container">
														<div class="product-ratings">
															<span class="ratings" style="width:100%"></span>
															<!-- End .ratings -->
															<span class="tooltiptext tooltip-top"></span>
														</div>
														<!-- End .product-ratings -->
													</div>
													<!-- End .product-container -->
													<div class="price-box">
														<span class="old-price">$59.00</span>
														<span class="product-price">$49.00</span>
													</div>
													<!-- End .price-box -->
												</div>
												<!-- End .product-details -->
											</div>
										</div>
										<div class="col-6 col-sm-4">
											<div class="product-default inner-quickview inner-icon">
												<figure>
													<a href="/porto/demo13-product.html">
														<img src="/porto/assets/images/demoes/demo13/products/product-5.jpg"
															width="300" height="300" alt="product">
													</a>
													<div class="btn-icon-group">
														<a href="#" class="btn-icon btn-add-cart product-type-simple">
															<i class="icon-shopping-cart"></i>
														</a>
													</div>
													<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
														title="Quick View">Quick View</a>
												</figure>
												<div class="product-details">
													<div class="category-wrap">
														<div class="category-list">
															<a href="/porto/demo13-shop.html"
																class="product-category">category</a>
														</div>
														<a href="#" class="btn-icon-wish">
															<i class="icon-wishlist-2"></i>
														</a>
													</div>
													<h3 class="product-title">
														<a href="/porto/demo13-product.html">Product Short Name</a>
													</h3>
													<div class="ratings-container">
														<div class="product-ratings">
															<span class="ratings" style="width:100%"></span>
															<!-- End .ratings -->
															<span class="tooltiptext tooltip-top"></span>
														</div>
														<!-- End .product-ratings -->
													</div>
													<!-- End .product-container -->
													<div class="price-box">
														<span class="old-price">$59.00</span>
														<span class="product-price">$49.00</span>
													</div>
													<!-- End .price-box -->
												</div>
												<!-- End .product-details -->
											</div>
										</div>
										<div class="col-6 col-sm-4">
											<div class="product-default inner-quickview inner-icon">
												<figure>
													<a href="/porto/demo13-product.html">
														<img src="/porto/assets/images/demoes/demo13/products/product-6.jpg"
															width="300" height="300" alt="product">
													</a>
													<div class="label-group">
														<span class="product-label label-hot">HOT</span>
													</div>
													<div class="btn-icon-group">
														<a href="#" class="btn-icon btn-add-cart product-type-simple">
															<i class="icon-shopping-cart"></i>
														</a>
													</div>
													<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
														title="Quick View">Quick View</a>
												</figure>
												<div class="product-details">
													<div class="category-wrap">
														<div class="category-list">
															<a href="/porto/demo13-shop.html"
																class="product-category">category</a>
														</div>
														<a href="#" class="btn-icon-wish">
															<i class="icon-wishlist-2"></i>
														</a>
													</div>
													<h3 class="product-title">
														<a href="/porto/demo13-product.html">Product Short Name</a>
													</h3>
													<div class="ratings-container">
														<div class="product-ratings">
															<span class="ratings" style="width:100%"></span>
															<!-- End .ratings -->
															<span class="tooltiptext tooltip-top"></span>
														</div>
														<!-- End .product-ratings -->
													</div>
													<!-- End .product-container -->
													<div class="price-box">
														<span class="old-price">$59.00</span>
														<span class="product-price">$49.00</span>
													</div>
													<!-- End .price-box -->
												</div>
												<!-- End .product-details -->
											</div>
										</div>
										<div class="col-6 col-sm-4">
											<div class="product-default inner-quickview inner-icon">
												<figure>
													<a href="/porto/demo13-product.html">
														<img src="/porto/assets/images/demoes/demo13/products/product-10.jpg"
															width="300" height="300" alt="product">
													</a>
													<div class="label-group">
														<span class="product-label label-sale">-30%</span>
													</div>
													<div class="btn-icon-group">
														<a href="#" class="btn-icon btn-add-cart product-type-simple">
															<i class="icon-shopping-cart"></i>
														</a>
													</div>
													<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
														title="Quick View">Quick View</a>
												</figure>
												<div class="product-details">
													<div class="category-wrap">
														<div class="category-list">
															<a href="/porto/demo13-shop.html"
																class="product-category">category</a>
														</div>
														<a href="#" class="btn-icon-wish">
															<i class="icon-wishlist-2"></i>
														</a>
													</div>
													<h3 class="product-title">
														<a href="/porto/demo13-product.html">Product Short Name</a>
													</h3>
													<div class="ratings-container">
														<div class="product-ratings">
															<span class="ratings" style="width:100%"></span>
															<!-- End .ratings -->
															<span class="tooltiptext tooltip-top"></span>
														</div>
														<!-- End .product-ratings -->
													</div>
													<!-- End .product-container -->
													<div class="price-box">
														<span class="old-price">$59.00</span>
														<span class="product-price">$49.00</span>
													</div>
													<!-- End .price-box -->
												</div>
												<!-- End .product-details -->
											</div>
										</div>
										<div class="col-6 col-sm-4">
											<div class="product-default inner-quickview inner-icon">
												<figure>
													<a href="/porto/demo13-product.html">
														<img src="/porto/assets/images/demoes/demo13/products/product-11.jpg"
															width="300" height="300" alt="product">
													</a>
													<div class="label-group">
														<span class="product-label label-hot">HOT</span>
													</div>
													<div class="btn-icon-group">
														<a href="#" class="btn-icon btn-add-cart product-type-simple">
															<i class="icon-shopping-cart"></i>
														</a>
													</div>
													<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
														title="Quick View">Quick View</a>
												</figure>
												<div class="product-details">
													<div class="category-wrap">
														<div class="category-list">
															<a href="/porto/demo13-shop.html"
																class="product-category">category</a>
														</div>
														<a href="#" class="btn-icon-wish">
															<i class="icon-wishlist-2"></i>
														</a>
													</div>
													<h3 class="product-title">
														<a href="/porto/demo13-product.html">Product Short Name</a>
													</h3>
													<div class="ratings-container">
														<div class="product-ratings">
															<span class="ratings" style="width:100%"></span>
															<!-- End .ratings -->
															<span class="tooltiptext tooltip-top"></span>
														</div>
														<!-- End .product-ratings -->
													</div>
													<!-- End .product-container -->
													<div class="price-box">
														<span class="old-price">$59.00</span>
														<span class="product-price">$49.00</span>
													</div>
													<!-- End .price-box -->
												</div>
												<!-- End .product-details -->
											</div>
										</div>
										<div class="col-6 col-sm-4">
											<div class="product-default inner-quickview inner-icon">
												<figure>
													<a href="/porto/demo13-product.html">
														<img src="/porto/assets/images/demoes/demo13/products/product-12.jpg"
															width="300" height="300" alt="product">
													</a>
													<div class="label-group">
														<span class="product-label label-sale">-20%</span>
													</div>
													<div class="btn-icon-group">
														<a href="#" class="btn-icon btn-add-cart product-type-simple">
															<i class="icon-shopping-cart"></i>
														</a>
													</div>
													<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
														title="Quick View">Quick View</a>
												</figure>
												<div class="product-details">
													<div class="category-wrap">
														<div class="category-list">
															<a href="/porto/demo13-shop.html"
																class="product-category">category</a>
														</div>
														<a href="#" class="btn-icon-wish">
															<i class="icon-wishlist-2"></i>
														</a>
													</div>
													<h3 class="product-title">
														<a href="/porto/demo13-product.html">Product Short Name</a>
													</h3>
													<div class="ratings-container">
														<div class="product-ratings">
															<span class="ratings" style="width:100%"></span>
															<!-- End .ratings -->
															<span class="tooltiptext tooltip-top">5.00</span>
														</div>
														<!-- End .product-ratings -->
													</div>
													<!-- End .product-container -->
													<div class="price-box">
														<span class="old-price">$59.00</span>
														<span class="product-price">$49.00</span>
													</div>
													<!-- End .price-box -->
												</div>
												<!-- End .product-details -->
											</div>
										</div>
									</div>
								</div>
								<!-- End .tab-pane -->
							</div>
							<!-- End .tab-content -->
						</div>
						<!-- End .home-product-tabs -->

						<div class="banners-group">
							<div class="row m-b-3">
								<div class="col-md-6 w-md-44 mb-2">
									<div class="banner banner4 banner-md-vw-large" style="background-color: #383b44;">
										<figure>
											<img src="/porto/assets/images/demoes/demo13/banners/banner-4.jpg" width="360"
												height="196" style="background-color: #555;" alt="banner">
										</figure>
										<div class="banner-layer banner-layer-middle banner-layer-space">
											<h3 class="m-b-2 ls-n-20 text-uppercase">Flash Sale</h3>
											<h5 class="m-b-2 ls-n-20 text-uppercase">Cool Sunglasses</h5>
											<h4 class="m-b-3 ls-n-20 text-white">
												<span>Only</span>
												<sup>$</sup>199
												<sup>99</sup>
											</h4>
											<a href="#" class="btn btn-md btn-light ls-10">View Sale</a>
										</div>
									</div>
								</div>
								<!-- End .col-md-6 -->

								<div class="col-md-6 w-md-55 mb-2">
									<div class="banner banner5 banner-md-vw-large"
										style="background-image: url(/porto/assets/images/demoes/demo13/banners/banner-5.jpg)">
										<div class="banner-layer">
											<h3 class="text-primary">Exclusive Shoes</h3>
											<h4 class="text-primary">50% OFF</h4>
											<a href="#" class="btn btn-md btn-dark ls-10">View Sale</a>
										</div>
									</div>
								</div>
								<!-- End .col-md-6 -->
							</div>
							<!-- End .row -->
						</div>
						<!-- End .banners-group -->

						<div class="product-widgets">
							<div class="row">
								<!-- product-1 -->
								<div class="col-lg-4 col-sm-6 pb-5">
									<h4 class="section-sub-title text-uppercase m-b-3">Top Rated Products</h4>
									<div class="product-default left-details product-widget">
										<figure>
											<a href="/porto/demo13-product.html">
												<img src="/porto/assets/images/demoes/demo13/products/product-5.jpg" width="95"
													height="95" alt="product">
												<img src="/porto/assets/images/demoes/demo13/products/product-5-2.jpg"
													width="95" height="95" alt="product">
											</a>
										</figure>
										<div class="product-details">
											<h3 class="product-title"> <a href="/porto/demo13-product.html">Men Gentle
													Shoes</a> </h3>
											<div class="ratings-container">
												<div class="product-ratings">
													<span class="ratings" style="width:100%"></span>
													<!-- End .ratings -->
													<span class="tooltiptext tooltip-top"></span>
												</div>
												<!-- End .product-ratings -->
											</div>
											<!-- End .product-container -->
											<div class="price-box">
												<span class="product-price">$269.00</span>
											</div>
											<!-- End .price-box -->
										</div>
										<!-- End .product-details -->
									</div>
									<div class="product-default left-details product-widget">
										<figure>
											<a href="/porto/demo13-product.html">
												<img src="/porto/assets/images/demoes/demo13/products/product-13.jpg"
													width="95" height="95" alt="product">
												<img src="/porto/assets/images/demoes/demo13/products/product-13-2.jpg"
													width="95" height="95" alt="product">
											</a>
										</figure>
										<div class="product-details">
											<h3 class="product-title"> <a href="/porto/demo13-product.html">Women Bag</a> </h3>
											<div class="ratings-container">
												<div class="product-ratings">
													<span class="ratings" style="width:100%"></span>
													<!-- End .ratings -->
													<span class="tooltiptext tooltip-top">5.00</span>
												</div>
												<!-- End .product-ratings -->
											</div>
											<!-- End .product-container -->
											<div class="price-box">
												<span class="product-price">$299.00</span>
											</div>
											<!-- End .price-box -->
										</div>
										<!-- End .product-details -->
									</div>
									<div class="product-default left-details product-widget">
										<figure>
											<a href="/porto/demo13-product.html">
												<img src="/porto/assets/images/demoes/demo13/products/product-9.jpg" width="95"
													height="95" alt="product">
												<img src="/porto/assets/images/demoes/demo13/products/product-9-2.jpg"
													width="95" height="95" alt="product">
											</a>
										</figure>
										<div class="product-details">
											<h3 class="product-title"> <a href="/porto/demo13-product.html">Product
													Extended</a> </h3>
											<div class="ratings-container">
												<div class="product-ratings">
													<span class="ratings" style="width:100%"></span>
													<!-- End .ratings -->
													<span class="tooltiptext tooltip-top"></span>
												</div>
												<!-- End .product-ratings -->
											</div>
											<!-- End .product-container -->
											<div class="price-box">
												<span class="product-price">$39.00</span>
											</div>
											<!-- End .price-box -->
										</div>
										<!-- End .product-details -->
									</div>
								</div>
								<!-- product-2 -->
								<div class="col-lg-4 col-sm-6 pb-5">
									<h4 class="section-sub-title text-uppercase m-b-3">Best Selling Products</h4>
									<div class="product-default left-details product-widget">
										<figure>
											<a href="/porto/demo13-product.html">
												<img src="/porto/assets/images/demoes/demo13/products/product-2.jpg" width="95"
													height="95" alt="product">
												<img src="/porto/assets/images/demoes/demo13/products/product-2-2.jpg"
													width="95" height="95" alt="product">
											</a>
										</figure>
										<div class="product-details">
											<h3 class="product-title"> <a href="/porto/demo13-product.html">Gentle Shoes</a>
											</h3>
											<div class="ratings-container">
												<div class="product-ratings">
													<span class="ratings" style="width:0%"></span>
													<!-- End .ratings -->
													<span class="tooltiptext tooltip-top">5.00</span>
												</div>
												<!-- End .product-ratings -->
											</div>
											<!-- End .product-container -->
											<div class="price-box">
												<span class="product-price">$299.00</span>
											</div>
											<!-- End .price-box -->
										</div>
										<!-- End .product-details -->
									</div>
									<div class="product-default left-details product-widget">
										<figure>
											<a href="/porto/demo13-product.html">
												<img src="/porto/assets/images/demoes/demo13/products/product-1.jpg" width="95"
													height="95" alt="product">
												<img src="/porto/assets/images/demoes/demo13/products/product-1-2.jpg"
													width="95" height="95" alt="product">
											</a>
										</figure>
										<div class="product-details">
											<h3 class="product-title"> <a href="/porto/demo13-product.html">Porto Gray Cap</a>
											</h3>
											<div class="ratings-container">
												<div class="product-ratings">
													<span class="ratings" style="width:0%"></span>
													<!-- End .ratings -->
													<span class="tooltiptext tooltip-top"></span>
												</div>
												<!-- End .product-ratings -->
											</div>
											<!-- End .product-container -->
											<div class="price-box">
												<span class="product-price">$29.00</span>
											</div>
											<!-- End .price-box -->
										</div>
										<!-- End .product-details -->
									</div>
									<div class="product-default left-details product-widget">
										<figure>
											<a href="/porto/demo13-product.html">
												<img src="/porto/assets/images/demoes/demo13/products/product-8.jpg" width="95"
													height="95" alt="product">
												<img src="/porto/assets/images/demoes/demo13/products/product-8-2.jpg"
													width="95" height="95" alt="product">
											</a>
										</figure>
										<div class="product-details">
											<h3 class="product-title"> <a href="/porto/demo13-product.html">Porto White Cap</a>
											</h3>
											<div class="ratings-container">
												<div class="product-ratings">
													<span class="ratings" style="width:0%"></span>
													<!-- End .ratings -->
													<span class="tooltiptext tooltip-top">5.00</span>
												</div>
												<!-- End .product-ratings -->
											</div>
											<!-- End .product-container -->
											<div class="price-box">
												<span class="product-price">$101.00 – $108.00</span>
											</div>
											<!-- End .price-box -->
										</div>
										<!-- End .product-details -->
									</div>
								</div>
								<!-- product-3 -->
								<div class="col-lg-4 col-sm-6 pb-5">
									<h4 class="section-sub-title text-uppercase m-b-3">Latest Products</h4>
									<div class="product-default left-details product-widget">
										<figure>
											<a href="/porto/demo13-product.html">
												<img src="/porto/assets/images/demoes/demo13/products/product-5.jpg" width="95"
													height="95" alt="product">
												<img src="/porto/assets/images/demoes/demo13/products/product-5-2.jpg"
													width="95" height="95" alt="product">
											</a>
										</figure>
										<div class="product-details">
											<h3 class="product-title"> <a href="/porto/demo13-product.html">Men Gentle
													Shoes</a> </h3>
											<div class="ratings-container">
												<div class="product-ratings">
													<span class="ratings" style="width:100%"></span>
													<!-- End .ratings -->
													<span class="tooltiptext tooltip-top"></span>
												</div>
												<!-- End .product-ratings -->
											</div>
											<!-- End .product-container -->
											<div class="price-box">
												<span class="product-price">$269.00</span>
											</div>
											<!-- End .price-box -->
										</div>
										<!-- End .product-details -->
									</div>
									<div class="product-default left-details product-widget">
										<figure>
											<a href="/porto/demo13-product.html">
												<img src="/porto/assets/images/demoes/demo13/products/product-1.jpg" width="95"
													height="95" alt="product">
												<img src="/porto/assets/images/demoes/demo13/products/product-1-2.jpg"
													width="95" height="95" alt="product">
											</a>
										</figure>
										<div class="product-details">
											<h3 class="product-title"> <a href="/porto/demo13-product.html">Porto Gray Cap</a>
											</h3>
											<div class="ratings-container">
												<div class="product-ratings">
													<span class="ratings" style="width:0%"></span>
													<!-- End .ratings -->
													<span class="tooltiptext tooltip-top">5.00</span>
												</div>
												<!-- End .product-ratings -->
											</div>
											<!-- End .product-container -->
											<div class="price-box">
												<span class="product-price">$29.00</span>
											</div>
											<!-- End .price-box -->
										</div>
										<!-- End .product-details -->
									</div>
									<div class="product-default left-details product-widget">
										<figure>
											<a href="/porto/demo13-product.html">
												<img src="/porto/assets/images/demoes/demo13/products/product-8.jpg" width="95"
													height="95" alt="product">
												<img src="/porto/assets/images/demoes/demo13/products/product-8-2.jpg"
													width="95" height="95" alt="product">
											</a>
										</figure>
										<div class="product-details">
											<h3 class="product-title"> <a href="/porto/demo13-product.html">Porto White Cap</a>
											</h3>
											<div class="ratings-container">
												<div class="product-ratings">
													<span class="ratings" style="width:0%"></span>
													<!-- End .ratings -->
													<span class="tooltiptext tooltip-top"></span>
												</div>
												<!-- End .product-ratings -->
											</div>
											<!-- End .product-container -->
											<div class="price-box">
												<span class="product-price">$101.00 – $108.00</span>
											</div>
											<!-- End .price-box -->
										</div>
										<!-- End .product-details -->
									</div>
								</div>
							</div>
							<!-- End .row -->
						</div>
						<!-- End .product-widgets -->
					</div>
					<!-- End .col-lg-9 -->

					<div class="sidebar-overlay"></div>
					<div class="sidebar-toggle custom-sidebar-toggle">
						<i class="fas fa-sliders-h"></i>
					</div>
					<aside class="sidebar-home col-lg-3 mobile-sidebar">
						<div class="side-menu-wrapper mb-3">
							<h2 class="side-menu-title ls-n-25">Browse Categories</h2>

							<ul class="side-menu px-3 mx-3">
								<li>
									<a href="/porto/demo13-shop.html">Fashion</a>
									<span class="side-menu-toggle"></span>

									<ul>
										<li>
											<a href="#">Women Clothes</a>
										</li>
										<li>
											<a href="#">Men Clothes</a>
										</li>
										<li>
											<a href="#">Shoes</a>
										</li>
										<li>
											<a href="#">Accessories</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="/porto/demo13-shop.html">Accessories </a>
									<span class="side-menu-toggle"></span>

									<ul>
										<li>
											<a href="#">Watches</a>
										</li>
										<li>
											<a href="#">Caps</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="/porto/demo13-shop.html">Electronics</a>
									<span class="side-menu-toggle"></span>

									<ul>
										<li>
											<a href="#">Toys</a>
										</li>
										<li>
											<a href="#">Headphone</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="/porto/demo13-shop.html">Dress</a>
								</li>
							</ul>
							<!-- End .side-menu -->
						</div>

						<div class="widget widget-banners px-5 text-center">
							<div class="owl-carousel owl-theme dots-small">
								<div class="banner d-flex flex-column align-items-center">
									<h3
										class="badge-sale bg-secondary d-flex flex-column align-items-center justify-content-center text-uppercase">
										<em class="ls-0">Sale</em>Many Item</h3>
									<h4 class="sale-text font1 text-uppercase">
										<span>45</span>
										<sup>%</sup>
										<sub>off</sub>
									</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
									<a href="#" class="btn btn-primary btn-md font1">View Sale</a>
								</div>
								<!-- End .banner -->

								<div class="banner d-flex flex-column align-items-center">
									<h3
										class="badge-sale bg-secondary d-flex flex-column align-items-center justify-content-center text-uppercase">
										<em class="ls-0">Sale</em>Many Item</h3>
									<h4 class="sale-text font1 text-uppercase">45
										<sup>%</sup>
										<sub>off</sub>
									</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
									<a href="#" class="btn btn-primary btn-md font1">View Sale</a>
								</div>
								<!-- End .banner -->

								<div class="banner d-flex flex-column align-items-center">
									<h3
										class="badge-sale bg-secondary d-flex flex-column align-items-center justify-content-center text-uppercase">
										<em class="ls-0">Sale</em>Many Item</h3>
									<h4 class="sale-text font1 text-uppercase">45
										<sup>%</sup>
										<sub>off</sub>
									</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
									<a href="#" class="btn btn-primary btn-md font1">View Sale</a>
								</div>
								<!-- End .banner -->
							</div>
							<!-- End .banner-slider -->
						</div>
						<!-- End .widget -->

						<div class="widget widget-newsletters bg-gray text-center">
							<h3 class="widget-title text-uppercase">Subscribe Newsletter</h3>
							<p class="mb-2">Get all the latest information on Events, Sales and Offers. </p>
							<form action="#">
								<div class="form-group position-relative sicon-envolope-letter">
									<input type="email" class="form-control" name="newsletter-email"
										placeholder="Email address">
								</div>
								<!-- Endd .form-group -->
								<input type="submit" class="btn btn-primary btn-md" value="Subscribe">
							</form>
						</div>
						<!-- End .widget -->

						<div class="widget widget-testimonials">
							<div class="owl-carousel owl-theme dots-left dots-small">
								<div class="testimonial">
									<div class="testimonial-owner">
										<figure>
											<img src="/porto/assets/images/clients/client-1.jpg" alt="client" width="100"
												height="100">
										</figure>

										<div>
											<h4 class="testimonial-title">john Smith</h4>
											<span>CEO &amp; Founder</span>
										</div>
									</div>
									<!-- End .testimonial-owner -->

									<blockquote>
										<p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat
											mi.
										</p>
									</blockquote>
								</div>
								<!-- End .testimonial -->

								<div class="testimonial">
									<div class="testimonial-owner">
										<figure>
											<img src="/porto/assets/images/clients/client-2.jpg" alt="client" width="100"
												height="100">
										</figure>

										<div>
											<h4 class="testimonial-title">Dae Smith</h4>
											<span>CEO &amp; Founder</span>
										</div>
									</div>
									<!-- End .testimonial-owner -->

									<blockquote>
										<p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat
											mi.
										</p>
									</blockquote>
								</div>
								<!-- End .testimonial -->

								<div class="testimonial">
									<div class="testimonial-owner">
										<figure>
											<img src="/porto/assets/images/clients/client-3.jpg" alt="client" width="100"
												height="100">
										</figure>

										<div>
											<h4 class="testimonial-title">John Doe</h4>
											<span>CEO &amp; Founder</span>
										</div>
									</div>
									<!-- End .testimonial-owner -->

									<blockquote>
										<p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat
											mi.
										</p>
									</blockquote>
								</div>
								<!-- End .testimonial -->
							</div>
							<!-- End .testimonials-slider -->
						</div>
						<!-- End .widget -->

						<div class="widget widget-posts post-date-in-media media-with-zoom">
							<div class="owl-carousel owl-theme dots-left dots-m-0 dots-small" data-owl-options="
								{ 'margin' : 20,
									'loop': false }">
								<article class="post">
									<div class="post-media">
										<a href="/porto/single.html">
											<img src="/porto/assets/images/demoes/demo13/blog/home/post-1.jpg" alt="Post"
												width="400" height="300"
												data-zoom-image="/porto/assets/images/demoes/demo13/blog/home/post-1.jpg">
										</a>
										<div class="post-date">
											<span class="day">29</span>
											<span class="month">Jun</span>
										</div>
										<!-- End .post-date -->

										<span class="prod-full-screen">
											<i class="fas fa-search"></i>
										</span>
									</div>
									<!-- End .post-media -->

									<div class="post-body">
										<h2 class="post-title">
											<a href="/porto/single.html">Post Format Standard</a>
										</h2>

										<div class="post-content">
											<p>Leap into electronic typesetting, remaining essentially unchanged. It was
												popularised in the 1960s with... </p>

											<a href="/porto/single.html" class="read-more">read more
												<i class="icon-right-open"></i>
											</a>
										</div>
										<!-- End .post-content -->
									</div>
									<!-- End .post-body -->
								</article>

								<article class="post">
									<div class="post-media">
										<a href="/porto/single.html">
											<img src="/porto/assets/images/demoes/demo13/blog/home/post-2.jpg" alt="Post"
												width="400" height="300"
												data-zoom-image="/porto/assets/images/demoes/demo13/blog/home/post-2.jpg">
										</a>
										<div class="post-date">
											<span class="day">29</span>
											<span class="month">Jun</span>
										</div>
										<!-- End .post-date -->
										<span class="prod-full-screen">
											<i class="fas fa-search"></i>
										</span>
									</div>
									<!-- End .post-media -->

									<div class="post-body">
										<h2 class="post-title">
											<a href="/porto/single.html">Fashion Trends</a>
										</h2>

										<div class="post-content">
											<p>Leap into electronic typesetting, remaining essentially unchanged. It was
												popularised in the 1960s with... </p>

											<a href="/porto/single.html" class="read-more">read more
												<i class="icon-right-open"></i>
											</a>
										</div>
										<!-- End .post-content -->
									</div>
									<!-- End .post-body -->
								</article>

								<article class="post">
									<div class="post-media">
										<a href="/porto/single.html">
											<img src="/porto/assets/images/demoes/demo13/blog/home/post-3.jpg" alt="Post"
												width="400" height="300"
												data-zoom-image="/porto/assets/images/demoes/demo13/blog/home/post-3.jpg">
										</a>
										<div class="post-date">
											<span class="day">29</span>
											<span class="month">Jun</span>
										</div>
										<!-- End .post-date -->
										<span class="prod-full-screen">
											<i class="fas fa-search"></i>
										</span>
									</div>
									<!-- End .post-media -->

									<div class="post-body">
										<h2 class="post-title">
											<a href="/porto/single.html">
												Post Format Video</a>
										</h2>

										<div class="post-content">
											<p>Leap into electronic typesetting, remaining essentially unchanged. It was
												popularised in the 1960s with... </p>

											<a href="/porto/single.html" class="read-more">read more
												<i class="icon-right-open"></i>
											</a>
										</div>
										<!-- End .post-content -->
									</div>
									<!-- End .post-body -->
								</article>
							</div>
							<!-- End .posts-slider -->
						</div>
						<!-- End .widget -->
					</aside>
				</div>
				<!-- End .row -->
			</div>
			<!-- End .container -->
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
