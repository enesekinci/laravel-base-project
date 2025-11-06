@extends('layouts.porto')

@section('footer')
    @include('components.porto.demo41.footer')
@endsection


@section('header')
    @include('components.porto.demo41.header')
@endsection

@section('content')
<div class="intro-slider" style="background-color: #ececec;">
				<div class="container slide-animate owl-carousel owl-theme show-nav-hover nav-big" data-owl-options="{
						'loop': true,
						'nav': true,
						'dots': false
				}">
					<div class="intro-slide1 banner">
						<div class="row">
							<div class="col-lg-6 order-1">
								<div class="banner-layer banner-layer-middle position-relative">
									<h5 class="banner-subtitle font-weight-normal appear-animate"
										data-animation-name="fadeInUpShorter" data-animation-delay="100">Exclusive
										Product New Arrival
									</h5>
									<h2 class="banner-title font-weight-bold appear-animate"
										data-animation-name="fadeInUpShorter" data-animation-delay="200">Sauce Combo
									</h2>
									<h3 class="banner-desc text-uppercase appear-animate"
										data-animation-name="fadeInUpShorter" data-animation-delay="300">Special Blend
									</h3>
									<h4 class="custom-text-1 text-secondary appear-animate" data-animation-delay="500">
										Super Hot!
									</h4>
									<p class="text-right appear-animate" data-animation-name="fadeInRightShorter"
										data-animation-delay="700">EXCLUSIVE PRODUCTS ON SALE</p>
									<h2 class="up-to text-right mb-0 pb-2 appear-animate"
										data-animation-name="fadeInLeftShorter" data-animation-delay="800">
										<sup class="font-weight-bold">UP
											TO</sup><strong>50%<small>OFF</small></strong>
									</h2>
								</div>
							</div>
							<div class="col-lg-6 order-0 order-lg-1">
								<figure class="banner-media">
									<img src="/porto/assets/images/demoes/demo41/banner/banner-1.png" data-plugin-float-element
										data-plugin-options="{'startPos': 'top', 'speed': 9.8, 'transition': true, 'horizontal':false,'transitionDuration':1000}"
										width="497" height="473" alt="intro-banner" />
								</figure>
							</div>
						</div>
					</div>
					<div class="intro-slide2 banner">
						<div class="row">
							<div class="col-lg-6">
								<figure class="banner-media position-relative">
									<img src="/porto/assets/images/demoes/demo41/banner/banner-2.png" data-plugin-float-element
										data-plugin-options="{'startPos': 'top', 'speed': 9.8, 'transition': true, 'horizontal':false,'transitionDuration':1000}"
										width="497" height="473" alt="intro-banner" />
								</figure>
							</div>
							<div class="col-lg-6">
								<div class="banner-layer banner-layer-middle position-relative pb-3">
									<h5 class="banner-subtitle font-weight-normal appear-animate"
										data-animation-name="fadeInUpShorter" data-animation-delay="100">Exclusive
										Product New Arrival
									</h5>
									<h2 class="banner-title font-weight-bold appear-animate"
										data-animation-name="fadeInUpShorter" data-animation-delay="200">Fit Low Carb
									</h2>
									<h3 class="banner-desc text-uppercase appear-animate"
										data-animation-name="fadeInUpShorter" data-animation-delay="300">Candy Bar</h3>
									<h4 class="custom-text-2 appear-animate" data-animation-delay="500">Sugar-Free</h4>
									<p class="text-right appear-animate" data-animation-name="fadeInRightShorter"
										data-animation-delay="700">BREAKFAST PRODUCTS ON SALE</p>
									<h2 class="up-to text-right mb-0 pb-2 appear-animate"
										data-animation-name="fadeInLeftShorter" data-animation-delay="800">
										<sup class="font-weight-bold">UP
											TO</sup><strong>70%</strong>
									</h2>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="content-box appear-animate" data-animation-name="fadeInUpShorter"
						data-animation-delay="300">
						<div class="row justify-content-center mx-0">
							<div class="col-xl-4 col-md-6">
								<h2>1.</h2>
								<h3>Order Grocery</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipi-scing elit.</p>
							</div>
							<div class="col-xl-4 col-md-6">
								<h2>2.</h2>
								<h3>Make a Secure Payment</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit orci ipsum dolor sit.</p>
							</div>
							<div class="col-xl-4 col-md-6">
								<h2>3.</h2>
								<h3>Deliver Order</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing ipsum dolor elit.</p>
							</div>
						</div>
					</div>
				</div>
			</div><!-- End .intro-slider -->
			<section class="product-section container">
				<div class="product-slider-tab">
					<span class="inline-title d-sm-inline-block appear-animate" data-animation-name="fadeInLeftShorter"
						data-animation-delay="100">Featured Items</span>
					<ul class="nav nav-tabs d-sm-inline-flex mt-1 appear-animate" data-animation-delay="300">
						<li class="nav-item">
							<a class="nav-link active show" id="new-products-tab" data-toggle="tab" href="#new-products"
								aria-controls="new-products">New</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="best-products-tab" data-toggle="tab" href="#best-products"
								aria-controls="best-products">Best Sellers</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="sale-products-tab" data-toggle="tab" href="#sale-products"
								aria-controls="sale-products">Sale</a>
						</li>
					</ul>
					<div class="divider"></div>
					<div class="tab-content appear-animate" data-animation-name="fadeIn" data-animation-delay="200">
						<div class="tab-pane fade active show" data-animation-delay="500" id="new-products"
							role="tabpanel" aria-labelledby="new-products-tab">
							<div class="owl-carousel owl-theme nav-top" data-owl-options="{
								'loop': false,
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
									'768': {
										'items': 4
									},
									'992': {
										'items': 5
									}
								}
							}">
								<div class="product-default inner-quickview inner-icon">
									<figure>
										<a href="/porto/demo41-product.html">
											<img src="/porto/assets/images/demoes/demo41/product/product1-300x300.jpg"
												width="300" height="300" alt="product">
										</a>
										<div class="label-group">
											<span class="product-label label-sale">-36%</span>
										</div>
										<div class="btn-icon-group">
											<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
													class="icon-shopping-cart"></i></a>
										</div>
										<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
											title="Quick View">Quick
											View</a>
									</figure>
									<div class="product-details">
										<div class="category-wrap">
											<div class="category-list">
												<a href="#">Bread & Bakery</a>,
												<a href="#">Breakfast</a>,
												<a href="#">Party Supplies & Crafts</a>
											</div>
											<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
													class="icon-heart"></i></a>
										</div>
										<h3 class="product-title">
											<a href="/porto/demo41-product.html">Product Short Name</a>
										</h3>
										<div class="ratings-container">
											<div class="product-ratings">
												<span class="ratings" style="width:100%"></span>
												<!-- End .ratings -->
												<span class="tooltiptext tooltip-top"></span>
											</div><!-- End .product-ratings -->
										</div><!-- End .product-container -->
										<div class="price-box">
											<del class="old-price">$11.00</del>
											<span class="product-price">$7.00</span>
										</div><!-- End .price-box -->
									</div><!-- End .product-details -->
								</div>
								<div class="product-default inner-quickview inner-icon">
									<figure>
										<a href="/porto/demo41-product.html">
											<img src="/porto/assets/images/demoes/demo41/product/product2-300x300.jpg"
												width="300" height="300" alt="product">
										</a>
										<div class="btn-icon-group">
											<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
													class="icon-shopping-cart"></i></a>
										</div>
										<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
											title="Quick View">Quick
											View</a>
									</figure>
									<div class="product-details">
										<div class="category-wrap">
											<div class="category-list">
												<a href="#">Breakfast</a>,
												<a href="#">Cooking</a>,
												<a href="#">Frozen</a>,
												<a href="#">Meat</a>
												<a href="#">Meat & Seafood</a>
											</div>
											<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
													class="icon-heart"></i></a>
										</div>
										<h3 class="product-title">
											<a href="/porto/demo41-product.html">Product Short Name</a>
										</h3>
										<div class="ratings-container">
											<div class="product-ratings">
												<span class="ratings" style="width:100%"></span>
												<!-- End .ratings -->
												<span class="tooltiptext tooltip-top"></span>
											</div><!-- End .product-ratings -->
										</div><!-- End .product-container -->
										<div class="price-box">
											<span class="product-price">$19.00</span>
										</div><!-- End .price-box -->
									</div><!-- End .product-details -->
								</div>
								<div class="product-default inner-quickview inner-icon">
									<figure>
										<a href="/porto/demo41-product.html">
											<img src="/porto/assets/images/demoes/demo41/product/product3-300x300.jpg"
												width="300" height="300" alt="product">
										</a>
										<div class="label-group">
											<span class="product-label label-sale">-18%</span>
										</div>
										<div class="btn-icon-group">
											<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
													class="icon-shopping-cart"></i></a>
										</div>
										<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
											title="Quick View">Quick
											View</a>
									</figure>
									<div class="product-details">
										<div class="category-wrap">
											<div class="category-list">
												<a href="#">Breakfast</a>,
												<a href="#">Cooking</a>,
												<a href="#">Fruits</a>,
												<a href="#">Fruits & Vegetables</a>
											</div>
											<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
													class="icon-heart"></i></a>
										</div>
										<h3 class="product-title">
											<a href="/porto/demo41-product.html">Product Short Name</a>
										</h3>
										<div class="ratings-container">
											<div class="product-ratings">
												<span class="ratings" style="width:100%"></span>
												<!-- End .ratings -->
												<span class="tooltiptext tooltip-top"></span>
											</div><!-- End .product-ratings -->
										</div><!-- End .product-container -->
										<div class="price-box">
											<del class="old-price">$11.00</del>
											<span class="product-price">$9.00</span>
										</div><!-- End .price-box -->
									</div><!-- End .product-details -->
								</div>
								<div class="product-default inner-quickview inner-icon">
									<figure>
										<a href="/porto/demo41-product.html">
											<img src="/porto/assets/images/demoes/demo41/product/product4-300x300.jpg"
												width="300" height="300" alt="product">
										</a>
										<div class="label-group">
											<span class="product-label label-sale">-17%</span>
										</div>
										<div class="btn-icon-group">
											<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
													class="icon-shopping-cart"></i></a>
										</div>
										<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
											title="Quick View">Quick
											View</a>
									</figure>
									<div class="product-details">
										<div class="category-wrap">
											<div class="category-list">
												<a href="#">Breakfast</a>,
												<a href="#">Cooking</a>
											</div>
											<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
													class="icon-heart"></i></a>
										</div>
										<h3 class="product-title">
											<a href="/porto/demo41-product.html">Product Short Name</a>
										</h3>
										<div class="ratings-container">
											<div class="product-ratings">
												<span class="ratings" style="width:0%"></span>
												<!-- End .ratings -->
												<span class="tooltiptext tooltip-top"></span>
											</div><!-- End .product-ratings -->
										</div><!-- End .product-container -->
										<div class="price-box">
											<del class="old-price">$59.00</del>
											<span class="product-price">$49.00</span>
										</div><!-- End .price-box -->
									</div><!-- End .product-details -->
								</div>
								<div class="product-default inner-quickview inner-icon">
									<figure>
										<a href="/porto/demo41-product.html">
											<img src="/porto/assets/images/demoes/demo41/product/product5-300x300.jpg"
												width="300" height="300" alt="product">
										</a>
										<div class="label-group">
											<span class="product-label label-sale">-17%</span>
										</div>
										<div class="btn-icon-group">
											<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
													class="icon-shopping-cart"></i></a>
										</div>
										<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
											title="Quick View">Quick
											View</a>
									</figure>
									<div class="product-details">
										<div class="category-wrap">
											<div class="category-list">
												<a href="#">Fruits</a>
											</div>
											<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
													class="icon-heart"></i></a>
										</div>
										<h3 class="product-title">
											<a href="/porto/demo41-product.html">Product Short Name</a>
										</h3>
										<div class="ratings-container">
											<div class="product-ratings">
												<span class="ratings" style="width:100%"></span>
												<!-- End .ratings -->
												<span class="tooltiptext tooltip-top"></span>
											</div><!-- End .product-ratings -->
										</div><!-- End .product-container -->
										<div class="price-box">
											<del class="old-price">$59.00</del>
											<span class="product-price">$49.00</span>
										</div><!-- End .price-box -->
									</div><!-- End .product-details -->
								</div>
								<div class="product-default inner-quickview inner-icon">
									<figure>
										<a href="/porto/demo41-product.html">
											<img src="/porto/assets/images/demoes/demo41/product/product6-300x300.jpg"
												width="300" height="300" alt="product">
										</a>
										<div class="btn-icon-group">
											<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
													class="icon-shopping-cart"></i></a>
										</div>
										<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
											title="Quick View">Quick
											View</a>
									</figure>
									<div class="product-details">
										<div class="category-wrap">
											<div class="category-list">
												<a href="#">Fruits</a>,
												<a href="#">Fruits & Vegetables</a>
											</div>
											<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
													class="icon-heart"></i></a>
										</div>
										<h3 class="product-title">
											<a href="/porto/demo41-product.html">Product Short Name</a>
										</h3>
										<div class="ratings-container">
											<div class="product-ratings">
												<span class="ratings" style="width:100%"></span>
												<!-- End .ratings -->
												<span class="tooltiptext tooltip-top"></span>
											</div><!-- End .product-ratings -->
										</div><!-- End .product-container -->
										<div class="price-box">
											<span class="product-price">$23.00</span>
										</div><!-- End .price-box -->
									</div><!-- End .product-details -->
								</div>
								<div class="product-default inner-quickview inner-icon">
									<figure>
										<a href="/porto/demo41-product.html">
											<img src="/porto/assets/images/demoes/demo41/product/product7-300x300.jpg"
												width="300" height="300" alt="product">
										</a>
										<div class="label-group">
											<span class="product-label label-sale">-17%</span>
										</div>
										<div class="btn-icon-group">
											<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
													class="icon-shopping-cart"></i></a>
										</div>
										<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
											title="Quick View">Quick
											View</a>
									</figure>
									<div class="product-details">
										<div class="category-wrap">
											<div class="category-list">
												<a href="#">Bakery</a>,
												<a href="#">Bread & Bakery</a>,
												<a href="#">Breakfast</a>,
												<a href="#">Frozen</a>,
												<a href="#">Party Supplies & Crafts</a>
											</div>
											<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
													class="icon-heart"></i></a>
										</div>
										<h3 class="product-title">
											<a href="/porto/demo41-product.html">Product Short Name</a>
										</h3>
										<div class="ratings-container">
											<div class="product-ratings">
												<span class="ratings" style="width:0%"></span>
												<!-- End .ratings -->
												<span class="tooltiptext tooltip-top"></span>
											</div><!-- End .product-ratings -->
										</div><!-- End .product-container -->
										<div class="price-box">
											<del class="old-price">$59.00</del>
											<span class="product-price">$49.00</span>
										</div><!-- End .price-box -->
									</div><!-- End .product-details -->
								</div>
								<div class="product-default inner-quickview inner-icon">
									<figure>
										<a href="/porto/demo41-product.html">
											<img src="/porto/assets/images/demoes/demo41/product/product8-300x300.jpg"
												width="300" height="300" alt="product">
										</a>
										<div class="label-group">
											<span class="product-label label-sale">-50%</span>
										</div>
										<div class="btn-icon-group">
											<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
													class="icon-shopping-cart"></i></a>
										</div>
										<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
											title="Quick View">Quick
											View</a>
									</figure>
									<div class="product-details">
										<div class="category-wrap">
											<div class="category-list">
												<a href="#">Bakery</a>,
												<a href="#">Bread</a>,
												<a href="#">Bread & Bakery</a>,
												<a href="#">Breakfast</a>,
												<a href="#">Frozen</a>
											</div>
											<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
													class="icon-heart"></i></a>
										</div>
										<h3 class="product-title">
											<a href="/porto/demo41-product.html">Product Short Name</a>
										</h3>
										<div class="ratings-container">
											<div class="product-ratings">
												<span class="ratings" style="width:0%"></span>
												<!-- End .ratings -->
												<span class="tooltiptext tooltip-top"></span>
											</div><!-- End .product-ratings -->
										</div><!-- End .product-container -->
										<div class="price-box">
											<del class="old-price">$22.00</del>
											<span class="product-price">$11.00</span>
										</div><!-- End .price-box -->
									</div><!-- End .product-details -->
								</div>
							</div>
						</div>
						<!-- End .tab-pane -->
						<div class="tab-pane fade" data-animation-delay="500" id="best-products" role="tabpanel"
							aria-labelledby="best-products-tab">
							<div class="owl-carousel owl-theme nav-top" data-owl-options="{
								'loop': false,
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
									'768': {
										'items': 4
									},
									'992': {
										'items': 5
									}
								}
							}">

								<div class="product-default inner-quickview inner-icon">
									<figure>
										<a href="/porto/demo41-product.html">
											<img src="/porto/assets/images/demoes/demo41/product/product3-300x300.jpg"
												width="300" height="300" alt="product">
										</a>
										<div class="label-group">
											<span class="product-label label-sale">-18%</span>
										</div>
										<div class="btn-icon-group">
											<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
													class="icon-shopping-cart"></i></a>
										</div>
										<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
											title="Quick View">Quick
											View</a>
									</figure>
									<div class="product-details">
										<div class="category-wrap">
											<div class="category-list">
												<a href="#">Breakfast</a>,
												<a href="#">Cooking</a>,
												<a href="#">Fruits</a>,
												<a href="#">Fruits & Vegetables</a>
											</div>
											<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
													class="icon-heart"></i></a>
										</div>
										<h3 class="product-title">
											<a href="/porto/demo41-product.html">Product Short Name</a>
										</h3>
										<div class="ratings-container">
											<div class="product-ratings">
												<span class="ratings" style="width:100%"></span>
												<!-- End .ratings -->
												<span class="tooltiptext tooltip-top"></span>
											</div><!-- End .product-ratings -->
										</div><!-- End .product-container -->
										<div class="price-box">
											<del class="old-price">$11.00</del>
											<span class="product-price">$9.00</span>
										</div><!-- End .price-box -->
									</div><!-- End .product-details -->
								</div>
								<div class="product-default inner-quickview inner-icon">
									<figure>
										<a href="/porto/demo41-product.html">
											<img src="/porto/assets/images/demoes/demo41/product/product4-300x300.jpg"
												width="300" height="300" alt="product">
										</a>
										<div class="label-group">
											<span class="product-label label-sale">-17%</span>
										</div>
										<div class="btn-icon-group">
											<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
													class="icon-shopping-cart"></i></a>
										</div>
										<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
											title="Quick View">Quick
											View</a>
									</figure>
									<div class="product-details">
										<div class="category-wrap">
											<div class="category-list">
												<a href="#">Breakfast</a>,
												<a href="#">Cooking</a>
											</div>
											<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
													class="icon-heart"></i></a>
										</div>
										<h3 class="product-title">
											<a href="/porto/demo41-product.html">Product Short Name</a>
										</h3>
										<div class="ratings-container">
											<div class="product-ratings">
												<span class="ratings" style="width:0%"></span>
												<!-- End .ratings -->
												<span class="tooltiptext tooltip-top"></span>
											</div><!-- End .product-ratings -->
										</div><!-- End .product-container -->
										<div class="price-box">
											<del class="old-price">$59.00</del>
											<span class="product-price">$49.00</span>
										</div><!-- End .price-box -->
									</div><!-- End .product-details -->
								</div>
								<div class="product-default inner-quickview inner-icon">
									<figure>
										<a href="/porto/demo41-product.html">
											<img src="/porto/assets/images/demoes/demo41/product/product8-300x300.jpg"
												width="300" height="300" alt="product">
										</a>
										<div class="label-group">
											<span class="product-label label-sale">-50%</span>
										</div>
										<div class="btn-icon-group">
											<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
													class="icon-shopping-cart"></i></a>
										</div>
										<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
											title="Quick View">Quick
											View</a>
									</figure>
									<div class="product-details">
										<div class="category-wrap">
											<div class="category-list">
												<a href="#">Bakery</a>,
												<a href="#">Bread</a>,
												<a href="#">Bread & Bakery</a>,
												<a href="#">Breakfast</a>,
												<a href="#">Frozen</a>
											</div>
											<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
													class="icon-heart"></i></a>
										</div>
										<h3 class="product-title">
											<a href="/porto/demo41-product.html">Product Short Name</a>
										</h3>
										<div class="ratings-container">
											<div class="product-ratings">
												<span class="ratings" style="width:0%"></span>
												<!-- End .ratings -->
												<span class="tooltiptext tooltip-top"></span>
											</div><!-- End .product-ratings -->
										</div><!-- End .product-container -->
										<div class="price-box">
											<del class="old-price">$22.00</del>
											<span class="product-price">$11.00</span>
										</div><!-- End .price-box -->
									</div><!-- End .product-details -->
								</div>
								<div class="product-default inner-quickview inner-icon">
									<figure>
										<a href="/porto/demo41-product.html">
											<img src="/porto/assets/images/demoes/demo41/product/product5-300x300.jpg"
												width="300" height="300" alt="product">
										</a>
										<div class="label-group">
											<span class="product-label label-sale">-17%</span>
										</div>
										<div class="btn-icon-group">
											<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
													class="icon-shopping-cart"></i></a>
										</div>
										<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
											title="Quick View">Quick
											View</a>
									</figure>
									<div class="product-details">
										<div class="category-wrap">
											<div class="category-list">
												<a href="#">Fruits</a>
											</div>
											<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
													class="icon-heart"></i></a>
										</div>
										<h3 class="product-title">
											<a href="/porto/demo41-product.html">Product Short Name</a>
										</h3>
										<div class="ratings-container">
											<div class="product-ratings">
												<span class="ratings" style="width:100%"></span>
												<!-- End .ratings -->
												<span class="tooltiptext tooltip-top"></span>
											</div><!-- End .product-ratings -->
										</div><!-- End .product-container -->
										<div class="price-box">
											<del class="old-price">$59.00</del>
											<span class="product-price">$49.00</span>
										</div><!-- End .price-box -->
									</div><!-- End .product-details -->
								</div>
								<div class="product-default inner-quickview inner-icon">
									<figure>
										<a href="/porto/demo41-product.html">
											<img src="/porto/assets/images/demoes/demo41/product/product6-300x300.jpg"
												width="300" height="300" alt="product">
										</a>
										<div class="btn-icon-group">
											<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
													class="icon-shopping-cart"></i></a>
										</div>
										<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
											title="Quick View">Quick
											View</a>
									</figure>
									<div class="product-details">
										<div class="category-wrap">
											<div class="category-list">
												<a href="#">Fruits</a>,
												<a href="#">Fruits & Vegetables</a>
											</div>
											<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
													class="icon-heart"></i></a>
										</div>
										<h3 class="product-title">
											<a href="/porto/demo41-product.html">Product Short Name</a>
										</h3>
										<div class="ratings-container">
											<div class="product-ratings">
												<span class="ratings" style="width:100%"></span>
												<!-- End .ratings -->
												<span class="tooltiptext tooltip-top"></span>
											</div><!-- End .product-ratings -->
										</div><!-- End .product-container -->
										<div class="price-box">
											<span class="product-price">$23.00</span>
										</div><!-- End .price-box -->
									</div><!-- End .product-details -->
								</div>
								<div class="product-default inner-quickview inner-icon">
									<figure>
										<a href="/porto/demo41-product.html">
											<img src="/porto/assets/images/demoes/demo41/product/product1-300x300.jpg"
												width="300" height="300" alt="product">
										</a>
										<div class="label-group">
											<span class="product-label label-sale">-36%</span>
										</div>
										<div class="btn-icon-group">
											<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
													class="icon-shopping-cart"></i></a>
										</div>
										<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
											title="Quick View">Quick
											View</a>
									</figure>
									<div class="product-details">
										<div class="category-wrap">
											<div class="category-list">
												<a href="#">Bread & Bakery</a>,
												<a href="#">Breakfast</a>,
												<a href="#">Party Supplies & Crafts</a>
											</div>
											<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
													class="icon-heart"></i></a>
										</div>
										<h3 class="product-title">
											<a href="/porto/demo41-product.html">Product Short Name</a>
										</h3>
										<div class="ratings-container">
											<div class="product-ratings">
												<span class="ratings" style="width:100%"></span>
												<!-- End .ratings -->
												<span class="tooltiptext tooltip-top"></span>
											</div><!-- End .product-ratings -->
										</div><!-- End .product-container -->
										<div class="price-box">
											<del class="old-price">$11.00</del>
											<span class="product-price">$7.00</span>
										</div><!-- End .price-box -->
									</div><!-- End .product-details -->
								</div>
							</div>
						</div>
						<!-- End .tab-pane -->
						<div class="tab-pane fade" data-animation-delay="500" id="sale-products" role="tabpanel"
							aria-labelledby="sale-products-tab">
							<div class="owl-carousel owl-theme nav-top" data-owl-options="{
								'loop': false,
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
									'768': {
										'items': 4
									},
									'992': {
										'items': 5
									}
								}
							}">
								<div class="product-default inner-quickview inner-icon">
									<figure>
										<a href="/porto/demo41-product.html">
											<img src="/porto/assets/images/demoes/demo41/product/product8-300x300.jpg"
												width="300" height="300" alt="product">
										</a>
										<div class="label-group">
											<span class="product-label label-sale">-50%</span>
										</div>
										<div class="btn-icon-group">
											<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
													class="icon-shopping-cart"></i></a>
										</div>
										<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
											title="Quick View">Quick
											View</a>
									</figure>
									<div class="product-details">
										<div class="category-wrap">
											<div class="category-list">
												<a href="#">Bakery</a>,
												<a href="#">Bread</a>,
												<a href="#">Bread & Bakery</a>,
												<a href="#">Breakfast</a>,
												<a href="#">Frozen</a>
											</div>
											<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
													class="icon-heart"></i></a>
										</div>
										<h3 class="product-title">
											<a href="/porto/demo41-product.html">Product Short Name</a>
										</h3>
										<div class="ratings-container">
											<div class="product-ratings">
												<span class="ratings" style="width:0%"></span>
												<!-- End .ratings -->
												<span class="tooltiptext tooltip-top"></span>
											</div><!-- End .product-ratings -->
										</div><!-- End .product-container -->
										<div class="price-box">
											<del class="old-price">$22.00</del>
											<span class="product-price">$11.00</span>
										</div><!-- End .price-box -->
									</div><!-- End .product-details -->
								</div>
								<div class="product-default inner-quickview inner-icon">
									<figure>
										<a href="/porto/demo41-product.html">
											<img src="/porto/assets/images/demoes/demo41/product/product1-300x300.jpg"
												width="300" height="300" alt="product">
										</a>
										<div class="label-group">
											<span class="product-label label-sale">-36%</span>
										</div>
										<div class="btn-icon-group">
											<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
													class="icon-shopping-cart"></i></a>
										</div>
										<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
											title="Quick View">Quick
											View</a>
									</figure>
									<div class="product-details">
										<div class="category-wrap">
											<div class="category-list">
												<a href="#">Bread & Bakery</a>,
												<a href="#">Breakfast</a>,
												<a href="#">Party Supplies & Crafts</a>
											</div>
											<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
													class="icon-heart"></i></a>
										</div>
										<h3 class="product-title">
											<a href="/porto/demo41-product.html">Product Short Name</a>
										</h3>
										<div class="ratings-container">
											<div class="product-ratings">
												<span class="ratings" style="width:100%"></span>
												<!-- End .ratings -->
												<span class="tooltiptext tooltip-top"></span>
											</div><!-- End .product-ratings -->
										</div><!-- End .product-container -->
										<div class="price-box">
											<del class="old-price">$11.00</del>
											<span class="product-price">$7.00</span>
										</div><!-- End .price-box -->
									</div><!-- End .product-details -->
								</div>
								<div class="product-default inner-quickview inner-icon">
									<figure>
										<a href="/porto/demo41-product.html">
											<img src="/porto/assets/images/demoes/demo41/product/product4-300x300.jpg"
												width="300" height="300" alt="product">
										</a>
										<div class="label-group">
											<span class="product-label label-sale">-17%</span>
										</div>
										<div class="btn-icon-group">
											<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
													class="icon-shopping-cart"></i></a>
										</div>
										<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
											title="Quick View">Quick
											View</a>
									</figure>
									<div class="product-details">
										<div class="category-wrap">
											<div class="category-list">
												<a href="#">Breakfast</a>,
												<a href="#">Cooking</a>
											</div>
											<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
													class="icon-heart"></i></a>
										</div>
										<h3 class="product-title">
											<a href="/porto/demo41-product.html">Product Short Name</a>
										</h3>
										<div class="ratings-container">
											<div class="product-ratings">
												<span class="ratings" style="width:0%"></span>
												<!-- End .ratings -->
												<span class="tooltiptext tooltip-top"></span>
											</div><!-- End .product-ratings -->
										</div><!-- End .product-container -->
										<div class="price-box">
											<del class="old-price">$59.00</del>
											<span class="product-price">$49.00</span>
										</div><!-- End .price-box -->
									</div><!-- End .product-details -->
								</div>
								<div class="product-default inner-quickview inner-icon">
									<figure>
										<a href="/porto/demo41-product.html">
											<img src="/porto/assets/images/demoes/demo41/product/product7-300x300.jpg"
												width="300" height="300" alt="product">
										</a>
										<div class="label-group">
											<span class="product-label label-sale">-17%</span>
										</div>
										<div class="btn-icon-group">
											<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
													class="icon-shopping-cart"></i></a>
										</div>
										<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
											title="Quick View">Quick
											View</a>
									</figure>
									<div class="product-details">
										<div class="category-wrap">
											<div class="category-list">
												<a href="#">Bakery</a>,
												<a href="#">Bread & Bakery</a>,
												<a href="#">Breakfast</a>,
												<a href="#">Frozen</a>,
												<a href="#">Party Supplies & Crafts</a>
											</div>
											<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
													class="icon-heart"></i></a>
										</div>
										<h3 class="product-title">
											<a href="/porto/demo41-product.html">Product Short Name</a>
										</h3>
										<div class="ratings-container">
											<div class="product-ratings">
												<span class="ratings" style="width:0%"></span>
												<!-- End .ratings -->
												<span class="tooltiptext tooltip-top"></span>
											</div><!-- End .product-ratings -->
										</div><!-- End .product-container -->
										<div class="price-box">
											<del class="old-price">$59.00</del>
											<span class="product-price">$49.00</span>
										</div><!-- End .price-box -->
									</div><!-- End .product-details -->
								</div>
								<div class="product-default inner-quickview inner-icon">
									<figure>
										<a href="/porto/demo41-product.html">
											<img src="/porto/assets/images/demoes/demo41/product/product5-300x300.jpg"
												width="300" height="300" alt="product">
										</a>
										<div class="label-group">
											<span class="product-label label-sale">-17%</span>
										</div>
										<div class="btn-icon-group">
											<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
													class="icon-shopping-cart"></i></a>
										</div>
										<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
											title="Quick View">Quick
											View</a>
									</figure>
									<div class="product-details">
										<div class="category-wrap">
											<div class="category-list">
												<a href="#">Fruits</a>
											</div>
											<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
													class="icon-heart"></i></a>
										</div>
										<h3 class="product-title">
											<a href="/porto/demo41-product.html">Product Short Name</a>
										</h3>
										<div class="ratings-container">
											<div class="product-ratings">
												<span class="ratings" style="width:100%"></span>
												<!-- End .ratings -->
												<span class="tooltiptext tooltip-top"></span>
											</div><!-- End .product-ratings -->
										</div><!-- End .product-container -->
										<div class="price-box">
											<del class="old-price">$59.00</del>
											<span class="product-price">$49.00</span>
										</div><!-- End .price-box -->
									</div><!-- End .product-details -->
								</div>
								<div class="product-default inner-quickview inner-icon">
									<figure>
										<a href="/porto/demo41-product.html">
											<img src="/porto/assets/images/demoes/demo41/product/product3-300x300.jpg"
												width="300" height="300" alt="product">
										</a>
										<div class="label-group">
											<span class="product-label label-sale">-18%</span>
										</div>
										<div class="btn-icon-group">
											<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
													class="icon-shopping-cart"></i></a>
										</div>
										<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
											title="Quick View">Quick
											View</a>
									</figure>
									<div class="product-details">
										<div class="category-wrap">
											<div class="category-list">
												<a href="#">Breakfast</a>,
												<a href="#">Cooking</a>,
												<a href="#">Fruits</a>,
												<a href="#">Fruits & Vegetables</a>
											</div>
											<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
													class="icon-heart"></i></a>
										</div>
										<h3 class="product-title">
											<a href="/porto/demo41-product.html">Product Short Name</a>
										</h3>
										<div class="ratings-container">
											<div class="product-ratings">
												<span class="ratings" style="width:100%"></span>
												<!-- End .ratings -->
												<span class="tooltiptext tooltip-top"></span>
											</div><!-- End .product-ratings -->
										</div><!-- End .product-container -->
										<div class="price-box">
											<del class="old-price">$11.00</del>
											<span class="product-price">$9.00</span>
										</div><!-- End .price-box -->
									</div><!-- End .product-details -->
								</div>
							</div>
						</div>
						<!-- End .tab-pane -->
					</div>
				</div>
				<div class="product-banner banner">
					<div class="row justify-content-center mx-0">
						<div class="col-lg-4 py-6 banner-content">
							<h4 class="banner-subtitle font-weight-normal text-right appear-animate"
								data-animation-name="fadeInRightShorter" data-animation-delay="100">SOFT FLAVOR</h4>
							<h3 class="banner-title font-weight-bold appear-animate"
								data-animation-name="fadeInRightShorter" data-animation-delay="200">Fresh Cola</h3>
							<p class="banner-desc appear-animate" data-animation-name="fadeInRightShorter"
								data-animation-delay="300">SODA DRINK</p>
						</div>
						<div class="col-lg-4">
							<img src="/porto/assets/images/demoes/demo41/banner/banner-3.jpg" class="appear-animate"
								data-animation-delay="200" data-plugin-float-element
								data-plugin-options="{'startPos': 'top', 'speed': 9.8, 'transition': true, 'horizontal':false,'transitionDuration':1000}"
								width="364" height="270" alt="banner" />
						</div>
						<div class="col-lg-4 py-6 banner-price" style="z-index: 1;">
							<h2 class="up-to text-right mb-0 pb-2 appear-animate"
								data-animation-name="fadeInLeftShorter" data-animation-delay="200">
								<sup class="font-weight-bold">ONLY</sup><strong>$0,99</strong>
							</h2>
						</div>
					</div>
				</div>
				<span class="inline-title appear-animate" data-animation-name="fadeInUpShorter"
					data-animation-delay="300">Top Rated</span>
				<div class="divider"></div>
				<div class="row appear-animate rated-products">
					<div class="col-6 col-sm-4 col-md-3 col-xl-5col">
						<div class="product-default inner-quickview inner-icon">
							<figure>
								<a href="/porto/demo41-product.html">
									<img src="/porto/assets/images/demoes/demo41/product/product9-300x300.jpg" width="300"
										height="300" alt="product">
								</a>
								<div class="label-group">
									<span class="product-label label-sale">-17%</span>
								</div>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
											class="icon-shopping-cart"></i></a>
								</div>
								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
									View</a>
							</figure>
							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="#">Fruits</a>,
										<a href="#">Party Supplies & Crafts</a>
									</div>
									<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
											class="icon-heart"></i></a>
								</div>
								<h3 class="product-title">
									<a href="/porto/demo41-product.html">Product Short Name</a>
								</h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span>
										<!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->
								<div class="price-box">
									<del class="old-price">$59.00</del>
									<span class="product-price">$49.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-xl-5col">
						<div class="product-default inner-quickview inner-icon">
							<figure>
								<a href="/porto/demo41-product.html">
									<img src="/porto/assets/images/demoes/demo41/product/product10-300x300.jpg" width="300"
										height="300" alt="product">
								</a>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
											class="icon-shopping-cart"></i></a>
								</div>
								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
									View</a>
							</figure>
							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="#">Meat</a>,
										<a href="#">Meat & Seafood</a>
									</div>
									<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
											class="icon-heart"></i></a>
								</div>
								<h3 class="product-title">
									<a href="/porto/demo41-product.html">Product Short Name</a>
								</h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span>
										<!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->
								<div class="price-box">
									<span class="product-price">$89.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-xl-5col">
						<div class="product-default inner-quickview inner-icon">
							<figure>
								<a href="/porto/demo41-product.html">
									<img src="/porto/assets/images/demoes/demo41/product/product11-300x300.jpg" width="300"
										height="300" alt="product">
								</a>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
											class="icon-shopping-cart"></i></a>
								</div>
								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
									View</a>
							</figure>
							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="#">Frozen</a>,
										<a href="#">Meat</a>,
										<a href="#">Meat & Seafood</a>
									</div>
									<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
											class="icon-heart"></i></a>
								</div>
								<h3 class="product-title">
									<a href="/porto/demo41-product.html">Product Short Name</a>
								</h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span>
										<!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->
								<div class="price-box">
									<span class="product-price">$12.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-xl-5col">
						<div class="product-default inner-quickview inner-icon">
							<figure>
								<a href="/porto/demo41-product.html">
									<img src="/porto/assets/images/demoes/demo41/product/product12-300x300.jpg" width="300"
										height="300" alt="product">
								</a>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
											class="icon-shopping-cart"></i></a>
								</div>
								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
									View</a>
							</figure>
							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="#">Meat</a>,
										<a href="#">Meat & Seafood</a>
									</div>
									<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
											class="icon-heart"></i></a>
								</div>
								<h3 class="product-title">
									<a href="/porto/demo41-product.html">Product Short Name</a>
								</h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span>
										<!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->
								<div class="price-box">
									<span class="product-price">$39.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-xl-5col">
						<div class="product-default inner-quickview inner-icon">
							<figure>
								<a href="/porto/demo41-product.html">
									<img src="/porto/assets/images/demoes/demo41/product/product13-300x300.jpg" width="300"
										height="300" alt="product">
								</a>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
											class="icon-shopping-cart"></i></a>
								</div>
								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
									View</a>
							</figure>
							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="#">Fruits</a>,
										<a href="#">Vegetables</a>
									</div>
									<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
											class="icon-heart"></i></a>
								</div>
								<h3 class="product-title">
									<a href="/porto/demo41-product.html">Product Short Name</a>
								</h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span>
										<!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->
								<div class="price-box">
									<span class="product-price">$12.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-xl-5col">
						<div class="product-default inner-quickview inner-icon">
							<figure>
								<a href="/porto/demo41-product.html">
									<img src="/porto/assets/images/demoes/demo41/product/product14-300x300.jpg" width="300"
										height="300" alt="product">
								</a>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
											class="icon-shopping-cart"></i></a>
								</div>
								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
									View</a>
							</figure>
							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="#">Bakery</a>,
										<a href="#">Bread & Bakery</a>,
										<a href="#">Fruits</a>,
										<a href="#">Party Supplies & Crafts</a>
									</div>
									<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
											class="icon-heart"></i></a>
								</div>
								<h3 class="product-title">
									<a href="/porto/demo41-product.html">Product Short Name</a>
								</h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span>
										<!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->
								<div class="price-box">
									<span class="product-price">$19.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-xl-5col">
						<div class="product-default inner-quickview inner-icon">
							<figure>
								<a href="/porto/demo41-product.html">
									<img src="/porto/assets/images/demoes/demo41/product/product15-300x300.jpg" width="300"
										height="300" alt="product">
								</a>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
											class="icon-shopping-cart"></i></a>
								</div>
								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
									View</a>
							</figure>
							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="#">Bakery</a>,
										<a href="#">Bread</a>,
										<a href="#">Bread & Bakery</a>,
										<a href="#">Breakfast</a>,
										<a href="#">Party Supplies & Crafts</a>
									</div>
									<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
											class="icon-heart"></i></a>
								</div>
								<h3 class="product-title">
									<a href="/porto/demo41-product.html">Product Short Name</a>
								</h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span>
										<!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->
								<div class="price-box">
									<span class="product-price">$14.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-xl-5col">
						<div class="product-default inner-quickview inner-icon">
							<figure>
								<a href="/porto/demo41-product.html">
									<img src="/porto/assets/images/demoes/demo41/product/product16-300x300.jpg" width="300"
										height="300" alt="product">
								</a>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
											class="icon-shopping-cart"></i></a>
								</div>
								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
									View</a>
							</figure>
							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="#">Fruits</a>,
										<a href="#">Fruits & Vegetables</a>
									</div>
									<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
											class="icon-heart"></i></a>
								</div>
								<h3 class="product-title">
									<a href="/porto/demo41-product.html">Product Short Name</a>
								</h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span>
										<!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->
								<div class="price-box">
									<span class="product-price">$23.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-xl-5col">
						<div class="product-default inner-quickview inner-icon">
							<figure>
								<a href="/porto/demo41-product.html">
									<img src="/porto/assets/images/demoes/demo41/product/product17-300x300.jpg" width="300"
										height="300" alt="product">
								</a>
								<div class="label-group">
									<span class="product-label label-sale">-17%</span>
								</div>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
											class="icon-shopping-cart"></i></a>
								</div>
								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
									View</a>
							</figure>
							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="#">Fruits</a>
									</div>
									<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
											class="icon-heart"></i></a>
								</div>
								<h3 class="product-title">
									<a href="/porto/demo41-product.html">Product Short Name</a>
								</h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span>
										<!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->
								<div class="price-box">
									<del class="old-price">$59.00</del>
									<span class="product-price">$49.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
					</div>
					<div class="col-6 col-sm-4 col-md-3 col-xl-5col">
						<div class="product-default inner-quickview inner-icon">
							<figure>
								<a href="/porto/demo41-product.html">
									<img src="/porto/assets/images/demoes/demo41/product/product18-300x300.jpg" width="300"
										height="300" alt="product">
								</a>
								<div class="label-group">
									<span class="product-label label-sale">-18%</span>
								</div>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
											class="icon-shopping-cart"></i></a>
								</div>
								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
									View</a>
							</figure>
							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="#">Breakfast</a>,
										<a href="#">Cooking</a>,
										<a href="#">Fruits</a>,
										<a href="#">Fruits & Vegetables</a>,
										<a href="#">Vegetables</a>
									</div>
									<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
											class="icon-heart"></i></a>
								</div>
								<h3 class="product-title">
									<a href="/porto/demo41-product.html">Product Short Name</a>
								</h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span>
										<!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->
								<div class="price-box">
									<del class="old-price">$11.00</del>
									<span class="product-price">$9.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
					</div>
				</div>
			</section><!-- End .product-section -->
			<section class="category-section container appear-animate">
				<div class="owl-carousel owl-theme" data-owl-options="{
					'dots': true,
					'nav': false,
					'loop': false,
					'margin': 20,
					'responsive': {
						'0': {
							'items': 1
						},
						'576': {
							'items': 2
						},
						'767': {
							'items': 3
						}
					}
				}">
					<div class="product-category content-left-center">
						<a href="/porto/demo41-shop.html">
							<figure>
								<img src="/porto/assets/images/demoes/demo41/category/category-1.jpg" width="393" height="200"
									alt="category" />
							</figure>
							<div class="category-content">
								<h3>Vegetables</h3>
								<span><mark class="count">2</mark> Products</span>
							</div>
						</a>
					</div>
					<div class="product-category content-left-center">
						<a href="/porto/demo41-shop.html">
							<figure>
								<img src="/porto/assets/images/demoes/demo41/category/category-2.jpg" width="393" height="200"
									alt="category" />
							</figure>
							<div class="category-content">
								<h3>Fruits</h3>
								<span><mark class="count">10</mark> Products</span>
							</div>
						</a>
					</div>
					<div class="product-category content-left-center">
						<a href="/porto/demo41-shop.html">
							<figure>
								<img src="/porto/assets/images/demoes/demo41/category/category-3.jpg" width="393" height="200"
									alt="category" />
							</figure>
							<div class="category-content">
								<h3>Meat</h3>
								<span><mark class="count">6</mark> Products</span>
							</div>
						</a>
					</div>
				</div>
			</section><!-- End .category-section -->
			<div class="container">
				<div class="newsletter d-flex align-items-center flex-wrap appear-animate">
					<div class="info-box info-box-icon-left d-inline-flex">
						<i class="icon-envolope"></i>

						<div class="info-box-content">
							<h4 class="font-weight-bold text-capitalize">Subscribe To Our Newsletter</h4>
							<p>Get all the latest information on Events, Sales and Offers.</p>
						</div><!-- End .info-box-content -->
					</div>
					<form action="#" class="d-flex justify-content-center mb-0">
						<input type="email" class="form-control mb-0" placeholder="Your E-mail Address" required="">
						<button class="btn btn-secondary">subscribe now!</button>
					</form>
				</div>
			</div>
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
