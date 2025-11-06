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
								<li class="breadcrumb-item active" aria-current="page">Products</li>
							</ol>
						</nav>
						<h1 class="page-title text-center text-white">Products</h1>
					</div>
				</div>
			</div>

			<div class="container">
				<h4 class="text-uppercase heading-bottom-border mt-8">Default Layout</h4>
				<div class="row mt-2">
					<div class="col-6 col-sm-4 col-md-3">
						<div class="product-default">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-1.jpg" width="280" height="280"
										alt="product" />
									<img src="/porto/assets/images/products/product-1-2.jpg" width="280" height="280"
										alt="product" />
								</a>

								<div class="label-group">
									<div class="product-label label-hot">HOT</div>
									<div class="product-label label-sale">-20%</div>
								</div>
							</figure>

							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">category</a>
									</div>
								</div>

								<h3 class="product-title"> <a href="/porto/product.html">Ultimate 3D Bluetooth Speaker</a>
								</h3>

								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->

								<div class="price-box">
									<span class="old-price">$90.00</span>
									<span class="product-price">$70.00</span>
								</div><!-- End .price-box -->

								<div class="product-action">
									<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
											class="icon-heart"></i></a>
									<a href="/porto/product.html" class="btn-icon btn-add-cart"><i
											class="fa fa-arrow-right"></i><span>SELECT
											OPTIONS</span></a>
									<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
											class="fas fa-external-link-alt"></i></a>
								</div>
							</div><!-- End .product-details -->
						</div>
					</div><!-- End .col-sm-4 -->

					<div class="col-6 col-sm-4 col-md-3">
						<div class="product-default">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-2.jpg" width="280" height="280"
										alt="product" />
									<img src="/porto/assets/images/products/product-2-2.jpg" width="280" height="280"
										alt="product" />
								</a>
							</figure>

							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">category</a>
									</div>
								</div>

								<h3 class="product-title"> <a href="/porto/product.html">Brown Women Casual HandBag</a> </h3>

								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->

								<div class="price-box">
									<span class="product-price">$33.00</span>
								</div><!-- End .price-box -->

								<div class="product-action">
									<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
											class="icon-heart"></i></a>
									<a href="/porto/product.html" class="btn-icon btn-add-cart"><i
											class="fa fa-arrow-right"></i><span>SELECT
											OPTIONS</span></a>
									<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
											class="fas fa-external-link-alt"></i></a>
								</div>
							</div><!-- End .product-details -->
						</div>
					</div><!-- End .col-sm-4 -->

					<div class="col-6 col-sm-4 col-md-3">
						<div class="product-default">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-3.jpg" width="280" height="280"
										alt="product" />
									<img src="/porto/assets/images/products/product-3-2.jpg" width="280" height="280"
										alt="product" />
								</a>

								<div class="label-group">
									<div class="product-label label-sale">-20%</div>
								</div>
							</figure>

							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">category</a>
									</div>
								</div>

								<h3 class="product-title"> <a href="/porto/product.html">Circled Ultimate 3D Speaker</a> </h3>

								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->

								<div class="price-box">
									<span class="old-price">$90.00</span>
									<span class="product-price">$70.00</span>

								</div><!-- End .price-box -->
								<div class="product-action">
									<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
											class="icon-heart"></i></a>
									<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
											class="icon-shopping-cart"></i>ADD TO CART</a>
									<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
											class="fas fa-external-link-alt"></i></a>
								</div>
							</div><!-- End .product-details -->
						</div>
					</div><!-- End .col-sm-4 -->

					<div class="col-6 col-sm-4 col-md-3">
						<div class="product-default">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-4.jpg" width="280" height="280"
										alt="product" />
									<img src="/porto/assets/images/products/product-4-2.jpg" width="280" height="280"
										alt="product">
								</a>

								<div class="label-group">
									<div class="product-label label-sale">-30%</div>
								</div>
							</figure>

							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">category</a>
									</div>
								</div>

								<h3 class="product-title"> <a href="/porto/product.html">Blue Backpack for the Young - S</a>
								</h3>

								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->

								<div class="price-box">
									<span class="old-price">$90.00</span>
									<span class="product-price">$70.00</span>
								</div><!-- End .price-box -->

								<div class="product-action">
									<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
											class="icon-heart"></i></a>
									<a href="/porto/product.html" class="btn-icon btn-add-cart"><i
											class="fa fa-arrow-right"></i><span>SELECT
											OPTIONS</span></a>
									<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
											class="fas fa-external-link-alt"></i></a>
								</div>
							</div><!-- End .product-details -->
						</div>
					</div><!-- End .col-sm-4 -->
				</div><!-- End .row -->

				<h4 class="text-uppercase heading-bottom-border mt-4">Show links on hover</h4>
				<div class="row mt-2 divide-line row-joined up-effect">
					<div class="col-6 col-sm-4 col-lg-3">
						<div class="product-default">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-13.jpg" width="280" height="280"
										alt="product" />
								</a>

								<div class="label-group">
									<div class="product-label label-hot">HOT</div>
									<div class="product-label label-sale">-20%</div>
								</div>
							</figure>

							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">category</a>
									</div>
								</div>

								<h3 class="product-title"> <a href="/porto/product.html">Ultimate 3D Bluetooth Speaker</a>
								</h3>

								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->

								<div class="price-box">
									<span class="old-price">$90.00</span>
									<span class="product-price">$70.00</span>
								</div><!-- End .price-box -->

								<div class="product-action">
									<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
											class="icon-heart"></i></a>
									<a href="/porto/product.html" class="btn-icon btn-add-cart"><i
											class="fa fa-arrow-right"></i><span>SELECT
											OPTIONS</span></a>
									<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
											class="fas fa-external-link-alt"></i></a>
								</div>
							</div><!-- End .product-details -->
						</div>
					</div><!-- End .col-sm-4 -->

					<div class="col-6 col-sm-4 col-lg-3">
						<div class="product-default">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-14.jpg" width="280" height="280"
										alt="product" />
								</a>
							</figure>

							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">category</a>
									</div>
								</div>

								<h3 class="product-title"> <a href="/porto/product.html">Black-handled Knife</a> </h3>

								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->

								<div class="price-box">
									<span class="product-price">$33.00</span>
								</div><!-- End .price-box -->

								<div class="product-action">
									<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
											class="icon-heart"></i></a>
									<a href="/porto/product.html" class="btn-icon btn-add-cart"><i
											class="fa fa-arrow-right"></i><span>SELECT
											OPTIONS</span></a>
									<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
											class="fas fa-external-link-alt"></i></a>
								</div>
							</div><!-- End .product-details -->
						</div>
					</div><!-- End .col-sm-4 -->

					<div class="col-6 col-sm-4 col-lg-3">
						<div class="product-default">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-15.jpg" width="280" height="280"
										alt="product" />
								</a>

								<div class="label-group">
									<div class="product-label label-sale">-20%</div>
								</div>
							</figure>

							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">category</a>
									</div>
								</div>

								<h3 class="product-title"> <a href="/porto/product.html">Swiss Army Knife</a> </h3>

								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->

								<div class="price-box">
									<span class="old-price">$90.00</span>
									<span class="product-price">$70.00</span>

								</div><!-- End .price-box -->
								<div class="product-action">
									<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
											class="icon-heart"></i></a>
									<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
											class="icon-shopping-cart"></i>ADD TO CART</a>
									<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
											class="fas fa-external-link-alt"></i></a>
								</div>
							</div><!-- End .product-details -->
						</div>
					</div><!-- End .col-sm-4 -->

					<div class="col-6 col-sm-4 col-lg-3">
						<div class="product-default">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-16.jpg" width="280" height="280"
										alt="product" />
								</a>

								<div class="label-group">
									<div class="product-label label-sale">-30%</div>
								</div>
							</figure>

							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">category</a>
									</div>
								</div>

								<h3 class="product-title"> <a href="/porto/product.html">Circled Ultimate 3D Speaker</a> </h3>

								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->

								<div class="price-box">
									<span class="old-price">$90.00</span>
									<span class="product-price">$70.00</span>
								</div><!-- End .price-box -->

								<div class="product-action">
									<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
											class="icon-heart"></i></a>
									<a href="/porto/product.html" class="btn-icon btn-add-cart"><i
											class="fa fa-arrow-right"></i><span>SELECT
											OPTIONS</span></a>
									<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
											class="fas fa-external-link-alt"></i></a>
								</div>
							</div><!-- End .product-details -->
						</div>
					</div><!-- End .col-sm-4 -->
				</div><!-- End .row -->

				<h4 class="text-uppercase heading-bottom-border mt-8">Add to cart, quick view on image - simple products
					carousel</h4>
				<div class="owl-carousel owl-theme dots-top dots-small" data-owl-options="{
					'dots': true,
					'margin': 20,
					'loop': true,
					'autoplay': true,
					'responsive': {
						'480': {
							'items': 2
						},
						'768': {
							'items': 3
						},
						'992': {
							'items': 4
						}
					}
				}">
					<div class="product-default inner-quickview inner-icon">
						<figure class="img-effect">
							<a href="/porto/product.html">
								<img src="/porto/assets/images/products/product-7.jpg" width="280" height="280" alt="product">
								<img src="/porto/assets/images/products/product-7-2.jpg" width="280" height="280"
									alt="product" />
							</a>
							<div class="btn-icon-group">
								<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
										class="icon-shopping-cart"></i></a>
							</div>
							<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View
							</a>
						</figure>
						<div class="product-details">
							<div class="category-wrap">
								<div class="category-list">
									<a href="/porto/category.html" class="product-category">category</a>
								</div>
								<a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
										class="icon-heart"></i></a>
							</div>
							<h3 class="product-title">
								<a href="/porto/product.html">Brown-Black Men Shoes</a>
							</h3>
							<div class="ratings-container">
								<div class="product-ratings">
									<span class="ratings" style="width:100%"></span><!-- End .ratings -->
									<span class="tooltiptext tooltip-top"></span>
								</div><!-- End .product-ratings -->
							</div><!-- End .product-container -->

							<div class="price-box">
								<span class="old-price">$90.00</span>
								<span class="product-price">$70.00</span>
							</div><!-- End .price-box -->
						</div><!-- End .product-details -->
					</div>
					<div class="product-default inner-quickview inner-icon">
						<figure class="img-effect">
							<a href="/porto/product.html">
								<img src="/porto/assets/images/products/product-8.jpg" width="280" height="280" alt="product">
								<img src="/porto/assets/images/products/product-8-2.jpg" width="280" height="280"
									alt="product" />
							</a>
							<div class="btn-icon-group">
								<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
										class="icon-shopping-cart"></i></a>
							</div>
							<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View
							</a>
						</figure>
						<div class="product-details">
							<div class="category-wrap">
								<div class="category-list">
									<a href="/porto/category.html" class="product-category">category</a>
								</div>
								<a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
										class="icon-heart"></i></a>
							</div>
							<h3 class="product-title">
								<a href="/porto/product.html">Brown-Black Men Casual Glasses</a>
							</h3>
							<div class="ratings-container">
								<div class="product-ratings">
									<span class="ratings" style="width:100%"></span><!-- End .ratings -->
									<span class="tooltiptext tooltip-top"></span>
								</div><!-- End .product-ratings -->
							</div><!-- End .product-container -->

							<div class="price-box">
								<span class="old-price">$90.00</span>
								<span class="product-price">$70.00</span>
							</div><!-- End .price-box -->
						</div><!-- End .product-details -->
					</div>
					<div class="product-default inner-quickview inner-icon">
						<figure class="img-effect">
							<a href="/porto/product.html">
								<img src="/porto/assets/images/products/product-9.jpg" width="280" height="280" alt="product">
								<img src="/porto/assets/images/products/product-9-2.jpg" width="280" height="280"
									alt="product" />
							</a>
							<div class="btn-icon-group">
								<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
										class="icon-shopping-cart"></i></a>
							</div>
							<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View
							</a>
						</figure>

						<div class="product-details">
							<div class="category-wrap">
								<div class="category-list">
									<a href="/porto/category.html" class="product-category">category</a>
								</div>
								<a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
										class="icon-heart"></i></a>
							</div>
							<h3 class="product-title">
								<a href="/porto/product.html">Black Men Casual Glasses</a>
							</h3>
							<div class="ratings-container">
								<div class="product-ratings">
									<span class="ratings" style="width:100%"></span><!-- End .ratings -->
									<span class="tooltiptext tooltip-top"></span>
								</div><!-- End .product-ratings -->
							</div><!-- End .product-container -->

							<div class="price-box">
								<span class="old-price">$90.00</span>
								<span class="product-price">$70.00</span>
							</div><!-- End .price-box -->
						</div><!-- End .product-details -->
					</div>
					<div class="product-default inner-quickview inner-icon">
						<figure class="img-effect">
							<a href="/porto/product.html">
								<img src="/porto/assets/images/products/product-10.jpg" width="280" height="280" alt="product">
								<img src="/porto/assets/images/products/product-10-2.jpg" width="280" height="280"
									alt="product" />
							</a>
							<div class="btn-icon-group">
								<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
										class="icon-shopping-cart"></i></a>
							</div>
							<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View
							</a>
						</figure>

						<div class="product-details">
							<div class="category-wrap">
								<div class="category-list">
									<a href="/porto/category.html" class="product-category">category</a>
								</div>
								<a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
										class="icon-heart"></i></a>
							</div>
							<h3 class="product-title">
								<a href="/porto/product.html">Basketball Sports Blue Shoes</a>
							</h3>
							<div class="ratings-container">
								<div class="product-ratings">
									<span class="ratings" style="width:100%"></span><!-- End .ratings -->
									<span class="tooltiptext tooltip-top"></span>
								</div><!-- End .product-ratings -->
							</div><!-- End .product-container -->

							<div class="price-box">
								<span class="old-price">$90.00</span>
								<span class="product-price">$70.00</span>
							</div><!-- End .price-box -->
						</div><!-- End .product-details -->
					</div>
					<div class="product-default inner-quickview inner-icon">
						<figure class="img-effect">
							<a href="/porto/product.html">
								<img src="/porto/assets/images/products/product-11.jpg" width="280" height="280" alt="product">
								<img src="/porto/assets/images/products/product-11-2.jpg" width="280" height="280"
									alt="product" />
							</a>
							<div class="btn-icon-group">
								<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
										class="icon-shopping-cart"></i></a>
							</div>
							<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View
							</a>
						</figure>

						<div class="product-details">
							<div class="category-wrap">
								<div class="category-list">
									<a href="/porto/category.html" class="product-category">category</a>
								</div>
								<a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
										class="icon-heart"></i></a>
							</div>
							<h3 class="product-title">
								<a href="/porto/product.html">Men Sports Travel Bag</a>
							</h3>
							<div class="ratings-container">
								<div class="product-ratings">
									<span class="ratings" style="width:100%"></span><!-- End .ratings -->
									<span class="tooltiptext tooltip-top"></span>
								</div><!-- End .product-ratings -->
							</div><!-- End .product-container -->

							<div class="price-box">
								<span class="old-price">$90.00</span>
								<span class="product-price">$70.00</span>
							</div><!-- End .price-box -->
						</div><!-- End .product-details -->
					</div>
					<div class="product-default inner-quickview inner-icon">
						<figure class="img-effect">
							<a href="/porto/product.html">
								<img src="/porto/assets/images/products/product-12.jpg" width="280" height="280" alt="product">
								<img src="/porto/assets/images/products/product-12-2.jpg" width="280" height="280"
									alt="product" />
							</a>
							<div class="btn-icon-group">
								<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
										class="icon-shopping-cart"></i></a>
							</div>
							<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View
							</a>
						</figure>

						<div class="product-details">
							<div class="category-wrap">
								<div class="category-list">
									<a href="/porto/category.html" class="product-category">category</a>
								</div>
								<a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
										class="icon-heart"></i></a>
							</div>
							<h3 class="product-title">
								<a href="/porto/product.html">Brown HandBag</a>
							</h3>
							<div class="ratings-container">
								<div class="product-ratings">
									<span class="ratings" style="width:100%"></span><!-- End .ratings -->
									<span class="tooltiptext tooltip-top"></span>
								</div><!-- End .product-ratings -->
							</div><!-- End .product-container -->

							<div class="price-box">
								<span class="old-price">$90.00</span>
								<span class="product-price">$70.00</span>
							</div><!-- End .price-box -->
						</div><!-- End .product-details -->
					</div>
				</div>

				<h4 class="text-uppercase heading-bottom-border mt-4">Out of image - products carousel with arrows</h4>
				<div class="owl-carousel owl-theme show-nav-hover nav-outer nav-image-center" data-owl-options="{
					'dots': false,
					'margin': 20,
					'loop': true,
					'nav': true,
					'autoplay': true,
					'responsive': {
						'480': {
							'items': 2
						},
						'768': {
							'items': 3
						},
						'992': {
							'items': 4
						}
					}
				}">
					<div class="product-default left-details product-unfold">
						<figure>
							<a href="/porto/product.html">
								<img src="/porto/assets/images/products/product-8.jpg" alt="product" width="300" height="300">
								<img src="/porto/assets/images/products/product-8-2.jpg" alt="product" width="300"
									height="300">
							</a>
						</figure>
						<div class="product-details">
							<div class="category-list">
								<a href="/porto/category.html" class="product-category">clothing</a>,
								<a href="/porto/category.html" class="product-category">shoes</a>
							</div>
							<h3 class="product-title"> <a href="/porto/product.html">Men Black Glasses</a> </h3>
							<div class="ratings-container">
								<div class="product-ratings">
									<span class="ratings" style="width:0%"></span><!-- End .ratings -->
									<span class="tooltiptext tooltip-top"></span>
								</div><!-- End .product-ratings -->
							</div><!-- End .product-container -->
							<div class="price-box">
								<span class="product-price">$99.00 – $109.00</span>
							</div><!-- End .price-box -->
							<div class="product-action">
								<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
										class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
								<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
										class="icon-heart"></i></a>
								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
										class="fas fa-external-link-alt"></i></a>
							</div>
						</div><!-- End .product-details -->
					</div>
					<div class="product-default left-details product-unfold">
						<figure>
							<a href="/porto/product.html">
								<img src="/porto/assets/images/products/product-9.jpg" alt="product" width="300" height="300">
								<img src="/porto/assets/images/products/product-9-2.jpg" alt="product" width="300"
									height="300">
							</a>
						</figure>
						<div class="product-details">
							<div class="category-list">
								<a href="/porto/category.html" class="product-category">clothing</a>,
								<a href="/porto/category.html" class="product-category">shoes</a>
							</div>
							<h3 class="product-title"> <a href="/porto/product.html">Black Glasses</a> </h3>
							<div class="ratings-container">
								<div class="product-ratings">
									<span class="ratings" style="width:0%"></span><!-- End .ratings -->
									<span class="tooltiptext tooltip-top"></span>
								</div><!-- End .product-ratings -->
							</div><!-- End .product-container -->
							<div class="price-box">
								<span class="product-price">$99.00 – $109.00</span>
							</div><!-- End .price-box -->
							<div class="product-action">
								<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
										class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
								<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
										class="icon-heart"></i></a>
								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
										class="fas fa-external-link-alt"></i></a>
							</div>
						</div><!-- End .product-details -->
					</div>
					<div class="product-default left-details product-unfold">
						<figure>
							<a href="/porto/product.html">
								<img src="/porto/assets/images/products/product-10.jpg" alt="product" width="300" height="300">
								<img src="/porto/assets/images/products/product-10-2.jpg" alt="product" width="300"
									height="300">
							</a>
						</figure>
						<div class="product-details">
							<div class="category-list">
								<a href="/porto/category.html" class="product-category">clothing</a>,
								<a href="/porto/category.html" class="product-category">shoes</a>
							</div>
							<h3 class="product-title"> <a href="/porto/product.html">Men Black Shoes</a> </h3>
							<div class="ratings-container">
								<div class="product-ratings">
									<span class="ratings" style="width:0%"></span><!-- End .ratings -->
									<span class="tooltiptext tooltip-top"></span>
								</div><!-- End .product-ratings -->
							</div><!-- End .product-container -->
							<div class="price-box">
								<span class="product-price">$99.00 – $109.00</span>
							</div><!-- End .price-box -->
							<div class="product-action">
								<a href="/porto/product.html" class="btn-icon btn-add-cart"><i
										class="fa fa-arrow-right"></i><span>SELECT
										OPTIONS</span></a>
								<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
										class="icon-heart"></i></a>
								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
										class="fas fa-external-link-alt"></i></a>
							</div>
						</div><!-- End .product-details -->
					</div>
					<div class="product-default left-details product-unfold">
						<figure>
							<a href="/porto/product.html">
								<img src="/porto/assets/images/products/product-11.jpg" alt="product" width="300" height="300">
								<img src="/porto/assets/images/products/product-11-2.jpg" alt="product" width="300"
									height="300">
							</a>
						</figure>
						<div class="product-details">
							<div class="category-list">
								<a href="/porto/category.html" class="product-category">clothing</a>,
								<a href="/porto/category.html" class="product-category">bag</a>
							</div>
							<h3 class="product-title"> <a href="/porto/product.html">Women Bag</a> </h3>
							<div class="ratings-container">
								<div class="product-ratings">
									<span class="ratings" style="width:0%"></span><!-- End .ratings -->
									<span class="tooltiptext tooltip-top"></span>
								</div><!-- End .product-ratings -->
							</div><!-- End .product-container -->
							<div class="price-box">
								<span class="product-price">$99.00 – $109.00</span>
							</div><!-- End .price-box -->
							<div class="product-action">
								<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
										class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
								<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
										class="icon-heart"></i></a>
								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
										class="fas fa-external-link-alt"></i></a>
							</div>
						</div><!-- End .product-details -->
					</div>
					<div class="product-default left-details product-unfold">
						<figure>
							<a href="/porto/product.html">
								<img src="/porto/assets/images/products/product-6.jpg" alt="product" width="300" height="300">
								<img src="/porto/assets/images/products/product-6-2.jpg" alt="product" width="300"
									height="300">
							</a>
						</figure>
						<div class="product-details">
							<div class="category-list">
								<a href="/porto/category.html" class="product-category">clothing</a>,
								<a href="/porto/category.html" class="product-category">shoes</a>
							</div>
							<h3 class="product-title"> <a href="/porto/product.html">Brown Belt</a> </h3>
							<div class="ratings-container">
								<div class="product-ratings">
									<span class="ratings" style="width:0%"></span><!-- End .ratings -->
									<span class="tooltiptext tooltip-top"></span>
								</div><!-- End .product-ratings -->
							</div><!-- End .product-container -->
							<div class="price-box">
								<span class="product-price">$99.00 – $109.00</span>
							</div><!-- End .price-box -->
							<div class="product-action">
								<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
										class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
								<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
										class="icon-heart"></i></a>
								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
										class="fas fa-external-link-alt"></i></a>
							</div>
						</div><!-- End .product-details -->
					</div>
					<div class="product-default left-details product-unfold">
						<figure>
							<a href="/porto/product.html">
								<img src="/porto/assets/images/products/product-5.jpg" alt="product" width="300" height="300">
								<img src="/porto/assets/images/products/product-5-2.jpg" alt="product" width="300"
									height="300">
							</a>
						</figure>
						<div class="product-details">
							<div class="category-list">
								<a href="/porto/category.html" class="product-category">clothing</a>,
								<a href="/porto/category.html" class="product-category">shoes</a>
							</div>
							<h3 class="product-title"> <a href="/porto/product.html">Men Gentle Shoes</a> </h3>
							<div class="ratings-container">
								<div class="product-ratings">
									<span class="ratings" style="width:0%"></span><!-- End .ratings -->
									<span class="tooltiptext tooltip-top"></span>
								</div><!-- End .product-ratings -->
							</div><!-- End .product-container -->
							<div class="price-box">
								<span class="product-price">$99.00 – $109.00</span>
							</div><!-- End .price-box -->
							<div class="product-action">
								<a href="/porto/product.html" class="btn-icon btn-add-cart"><i
										class="fa fa-arrow-right"></i><span>SELECT
										OPTIONS</span></a>
								<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist"><i
										class="icon-heart"></i></a>
								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
										class="fas fa-external-link-alt"></i></a>
							</div>
						</div><!-- End .product-details -->
					</div>
				</div>

				<h4 class="text-uppercase heading-bottom-border mt-4">Products without gaps</h4>
				<div class="row mt-2 row-joined product-nogap">
					<div class="col-6 col-sm-4 col-md-3">
						<div class="product-default inner-quickview inner-icon">
							<figure class="img-effect">
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-7.jpg" width="280" height="280"
										alt="product">
									<img src="/porto/assets/images/products/product-7-2.jpg" width="280" height="280"
										alt="product" />
								</a>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
											class="icon-shopping-cart"></i></a>
								</div>
								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
									View
								</a>
							</figure>

							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">category</a>
									</div>
									<a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
											class="icon-heart"></i></a>
								</div>
								<h3 class="product-title">
									<a href="/porto/product.html">Black Men Casual Shoes</a>
								</h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->

								<div class="price-box">
									<span class="old-price">$90.00</span>
									<span class="product-price">$70.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
					</div>
					<div class="col-6 col-sm-4 col-md-3">
						<div class="product-default inner-quickview inner-icon">
							<figure class="img-effect">
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-10.jpg" width="280" height="280"
										alt="product">
									<img src="/porto/assets/images/products/product-10-2.jpg" width="280" height="280"
										alt="product" />
								</a>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
											class="icon-shopping-cart"></i></a>
								</div>
								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
									View
								</a>
							</figure>

							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">category</a>
									</div>
									<a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
											class="icon-heart"></i></a>
								</div>
								<h3 class="product-title">
									<a href="/porto/product.html">Basketball Sports Blue Shoes</a>
								</h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->

								<div class="price-box">
									<span class="old-price">$90.00</span>
									<span class="product-price">$70.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
					</div>
					<div class="col-6 col-sm-4 col-md-3">
						<div class="product-default inner-quickview inner-icon">
							<figure class="img-effect">
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-11.jpg" width="280" height="280"
										alt="product">
									<img src="/porto/assets/images/products/product-11-2.jpg" width="280" height="280"
										alt="product" />
								</a>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
											class="icon-shopping-cart"></i></a>
								</div>
								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
									View
								</a>
							</figure>

							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">category</a>
									</div>
									<a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
											class="icon-heart"></i></a>
								</div>
								<h3 class="product-title">
									<a href="/porto/product.html">Women Bag</a>
								</h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->

								<div class="price-box">
									<span class="old-price">$90.00</span>
									<span class="product-price">$70.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
					</div>
					<div class="col-6 col-sm-4 col-md-3">
						<div class="product-default inner-quickview inner-icon">
							<figure class="img-effect">
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-12.jpg" width="280" height="280"
										alt="product">
									<img src="/porto/assets/images/products/product-12-2.jpg" width="280" height="280"
										alt="product" />
								</a>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
											class="icon-shopping-cart"></i></a>
								</div>
								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
									View
								</a>
							</figure>

							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">category</a>
									</div>
									<a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
											class="icon-heart"></i></a>
								</div>
								<h3 class="product-title">
									<a href="/porto/product.html">Gray HandBag</a>
								</h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->

								<div class="price-box">
									<span class="old-price">$90.00</span>
									<span class="product-price">$70.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
					</div>
				</div><!-- End .row -->

				<h4 class="text-uppercase heading-bottom-border mt-4">Add to cart, quick view on image with padding -
					products with divider line</h4>
				<div class="row mt-2 divide-line">
					<!-- product 1 -->
					<div class="col-lg-3 col-md-4 col-6">
						<div class="product-default inner-quickview inner-icon">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-18.jpg" alt="product" width="400"
										height="320" />
								</a>

								<div class="btn-icon-group">
									<button class="btn-icon btn-add-cart product-type-simple" data-toggle="modal"
										data-target="#addCartModal">
										<i class="icon-bag"></i>
									</button>
								</div>

								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
									View</a>
							</figure>

							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">FACE</a>,
										<a href="/porto/category.html" class="product-category">LIPS</a>
									</div>

									<a href="#" class="btn-icon-wish">
										<i class="icon-heart"></i>
									</a>
								</div>

								<h3 class="product-title"> <a href="/porto/product.html">Aerin Rose Oil</a> </h3>

								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width: 100%"></span>
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
						<!-- End .product-default -->
					</div>
					<!-- product 2 -->
					<div class="col-lg-3 col-md-4 col-6">
						<div class="product-default inner-quickview inner-icon">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-19.jpg" alt="product" width="400"
										height="320" />
								</a>

								<div class="btn-icon-group">
									<button class="btn-icon btn-add-cart product-type-simple" data-toggle="modal"
										data-target="#addCartModal">
										<i class="icon-bag"></i>
									</button>
								</div>

								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
									View</a>
							</figure>

							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">BRUSHES</a>,
										<a href="/porto/category.html" class="product-category">TOOLS</a>
									</div>

									<a href="#" class="btn-icon-wish">
										<i class="icon-heart"></i>
									</a>
								</div>

								<h3 class="product-title"> <a href="/porto/product.html">Beauty products</a> </h3>

								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width: 0%"></span>
										<!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div>
									<!-- End .product-ratings -->
								</div>
								<!-- End .product-container -->

								<div class="price-box">
									<span class="product-price">$99.00</span>
								</div>
								<!-- End .price-box -->
							</div>
							<!-- End .product-details -->
						</div>
						<!-- End .product-default -->
					</div>
					<!-- product 3 -->
					<div class="col-lg-3 col-md-4 col-6">
						<div class="product-default inner-quickview inner-icon">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-20.jpg" alt="product" width="400"
										height="320" />
								</a>

								<div class="btn-icon-group">
									<button class="btn-icon btn-add-cart product-type-simple" data-toggle="modal"
										data-target="#addCartModal">
										<i class="icon-bag"></i>
									</button>
								</div>

								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
									View</a>
							</figure>

							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">APPLY</a>,
										<a href="/porto/category.html" class="product-category">TOOLS</a>
									</div>

									<a href="#" class="btn-icon-wish">
										<i class="icon-heart"></i>
									</a>
								</div>

								<h3 class="product-title"> <a href="/porto/product.html">Beauty Wash</a> </h3>

								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width: 0%"></span>
										<!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div>
									<!-- End .product-ratings -->
								</div>
								<!-- End .product-container -->

								<div class="price-box">
									<span class="product-price">$101.00 - $111.00</span>
								</div>
								<!-- End .price-box -->
							</div>
							<!-- End .product-details -->
						</div>
						<!-- End .product-default -->
					</div>
					<!-- product 4 -->
					<div class="col-lg-3 col-md-4 col-6">
						<div class="product-default inner-quickview inner-icon">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-21.jpg" alt="product" width="400"
										height="320" />
								</a>

								<div class="btn-icon-group">
									<button class="btn-icon btn-add-cart product-type-simple" data-toggle="modal"
										data-target="#addCartModal">
										<i class="icon-bag"></i>
									</button>
								</div>

								<div class="label-group">
									<span class="product-label label-sale">-13%</span>
								</div>

								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
									View</a>
							</figure>

							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">EYEBROW</a>,
										<a href="/porto/category.html" class="product-category">SKIN CARE</a>
									</div>

									<a href="#" class="btn-icon-wish">
										<i class="icon-heart"></i>
									</a>
								</div>

								<h3 class="product-title"> <a href="/porto/product.html">Blue High Hill</a> </h3>

								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width: 0%"></span>
										<!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div>
									<!-- End .product-ratings -->
								</div>
								<!-- End .product-container -->

								<div class="price-box">
									<span class="old-price">$299.00</span>
									<span class="product-price">$259.00</span>
								</div>
								<!-- End .price-box -->
							</div>
							<!-- End .product-details -->
						</div>
						<!-- End .product-default -->
					</div>
					<!-- product 5 -->
					<div class="col-lg-3 col-md-4 col-6">
						<div class="product-default inner-quickview inner-icon">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-22.jpg" alt="product" width="400"
										height="320" />
								</a>

								<div class="btn-icon-group">
									<button class="btn-icon btn-add-cart product-type-simple" data-toggle="modal"
										data-target="#addCartModal">
										<i class="icon-bag"></i>
									</button>
								</div>

								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
									View</a>
							</figure>

							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">BRUSHES</a>,
										<a href="/porto/category.html" class="product-category">NECK</a>
									</div>

									<a href="#" class="btn-icon-wish">
										<i class="icon-heart"></i>
									</a>
								</div>

								<h3 class="product-title"> <a href="/porto/product.html">Cosmetic Bag</a> </h3>

								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width: 0%"></span>
										<!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div>
									<!-- End .product-ratings -->
								</div>
								<!-- End .product-container -->

								<div class="price-box">
									<span class="product-price">$99.00</span>
								</div>
								<!-- End .price-box -->
							</div>
							<!-- End .product-details -->
						</div>
						<!-- End .product-default -->
					</div>
					<!-- product 6 -->
					<div class="col-lg-3 col-md-4 col-6">
						<div class="product-default inner-quickview inner-icon">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-23.jpg" alt="product" width="400"
										height="320" />
								</a>

								<div class="btn-icon-group">
									<button class="btn-icon btn-add-cart product-type-simple" data-toggle="modal"
										data-target="#addCartModal">
										<i class="icon-bag"></i>
									</button>
								</div>

								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
									View</a>
							</figure>

							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">CHEEK</a>,
										<a href="/porto/category.html" class="product-category">LIPS</a>
									</div>

									<a href="#" class="btn-icon-wish">
										<i class="icon-heart"></i>
									</a>
								</div>

								<h3 class="product-title"> <a href="/porto/product.html">Face Powder</a> </h3>

								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width: 0%"></span>
										<!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div>
									<!-- End .product-ratings -->
								</div>
								<!-- End .product-container -->

								<div class="price-box">
									<span class="product-price">$99.00</span>
								</div>
								<!-- End .price-box -->
							</div>
							<!-- End .product-details -->
						</div>
						<!-- End .product-default -->
					</div>
					<!-- product 7 -->
					<div class="col-lg-3 col-md-4 col-6">
						<div class="product-default inner-quickview inner-icon">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-24.jpg" alt="product" width="400"
										height="320" />
								</a>

								<div class="btn-icon-group">
									<button class="btn-icon btn-add-cart product-type-simple" data-toggle="modal"
										data-target="#addCartModal">
										<i class="icon-bag"></i>
									</button>
								</div>

								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
									View</a>
							</figure>

							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">eyebrow</a>,
										<a href="/porto/category.html" class="product-category">skin care</a>
									</div>

									<a href="#" class="btn-icon-wish">
										<i class="icon-heart"></i>
									</a>
								</div>

								<h3 class="product-title"> <a href="/porto/product.html">Blue High Hill</a> </h3>

								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width: 0%"></span>
										<!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div>
									<!-- End .product-ratings -->
								</div>
								<!-- End .product-container -->

								<div class="price-box">
									<del class="old-price">$299.00</del>
									<span class="product-price">$259.00</span>
								</div>
								<!-- End .price-box -->
							</div>
							<!-- End .product-details -->
						</div>
						<!-- End .product-default -->
					</div>
					<!-- product 8 -->
					<div class="col-lg-3 col-md-4 col-6">
						<div class="product-default inner-quickview inner-icon">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-25.jpg" alt="product" width="400"
										height="320" />
								</a>

								<div class="btn-icon-group">
									<button class="btn-icon btn-add-cart product-type-simple" data-toggle="modal"
										data-target="#addCartModal">
										<i class="icon-bag"></i>
									</button>
								</div>

								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
									View</a>
							</figure>

							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">APPLY</a>,
										<a href="/porto/category.html" class="product-category">FASHION</a>,
										<a href="/porto/category.html" class="product-category">SKIN CARE</a>
									</div>

									<a href="#" class="btn-icon-wish">
										<i class="icon-heart"></i>
									</a>
								</div>

								<h3 class="product-title"> <a href="/porto/product.html">Lipstick</a> </h3>

								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width: 0%"></span>
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
						<!-- End .product-default -->
					</div>
				</div><!-- End .row -->

				<h4 class="text-uppercase heading-bottom-border mt-8">On image - Products without gap with hidden
					description</h4>
				<div class="row mt-2">
					<!-- product 1 -->
					<div class="col-lg-3 col-md-4 col-6">
						<div class="product-default left-details hidden-description inner-icon">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-4.jpg" alt="product" width="300"
										height="300" />
								</a>

								<div class="btn-icon-group">
									<button class="btn-icon btn-icon-wish">
										<i class="icon-heart"></i>
									</button>
								</div>
							</figure>

							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">Clothes</a>,
										<a href="/porto/category.html" class="product-category">Bag</a>
									</div>

									<a href="#" class="btn-icon-wish">
										<i class="icon-heart"></i>
									</a>
								</div>

								<h3 class="product-title"> <a href="/porto/product.html">Blue backpack</a> </h3>

								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width: 100%"></span>
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
								<div class="product-action">
									<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
										title="Quick View">QUICK VIEW</a>
									<a href="#" class="btn-icon btn-add-cart product-type-simple"
										title="add to cart">ADD TO CART</a>
								</div>
							</div>
							<!-- End .product-details -->
						</div>
						<!-- End .product-default -->
					</div>
					<!-- product 2 -->
					<div class="col-lg-3 col-md-4 col-6">
						<div class="product-default left-details hidden-description inner-icon">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-6.jpg" alt="product" width="300"
										height="300" />
								</a>

								<div class="btn-icon-group">
									<button class="btn-icon btn-icon-wish">
										<i class="icon-heart"></i>
									</button>
								</div>

							</figure>

							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">Clothes</a>,
										<a href="/porto/category.html" class="product-category">Belt</a>
									</div>

									<a href="#" class="btn-icon-wish">
										<i class="icon-heart"></i>
									</a>
								</div>

								<h3 class="product-title"> <a href="/porto/product.html">Black Women Belt</a> </h3>

								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width: 0%"></span>
										<!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div>
									<!-- End .product-ratings -->
								</div>
								<!-- End .product-container -->

								<div class="price-box">
									<span class="product-price">$99.00</span>
								</div>
								<!-- End .price-box -->
								<div class="product-action">
									<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
										title="Quick View">QUICK VIEW</a>
									<a href="#" class="btn-icon btn-add-cart product-type-simple"
										title="add to cart">ADD TO CART</a>
								</div>
							</div>
							<!-- End .product-details -->
						</div>
						<!-- End .product-default -->
					</div>
					<!-- product 3 -->
					<div class="col-lg-3 col-md-4 col-6">
						<div class="product-default left-details hidden-description inner-icon">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-9.jpg" alt="product" width="300"
										height="300" />
								</a>

								<div class="btn-icon-group">
									<button class="btn-icon btn-icon-wish">
										<i class="icon-heart"></i>
									</button>
								</div>
							</figure>

							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">Gadgets</a>,
										<a href="/porto/category.html" class="product-category">Glasses</a>
									</div>

									<a href="#" class="btn-icon-wish">
										<i class="icon-heart"></i>
									</a>
								</div>

								<h3 class="product-title"> <a href="/porto/product.html">Computer Safety Glasses</a> </h3>

								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width: 0%"></span>
										<!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div>
									<!-- End .product-ratings -->
								</div>
								<!-- End .product-container -->

								<div class="price-box">
									<span class="product-price">$101.00 - $111.00</span>
								</div>
								<!-- End .price-box -->
								<div class="product-action">
									<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
										title="Quick View">QUICK VIEW</a>
									<a href="#" class="btn-icon btn-add-cart product-type-simple"
										title="add to cart">ADD TO CART</a>
								</div>
							</div>
							<!-- End .product-details -->
						</div>
						<!-- End .product-default -->
					</div>
					<!-- product 4 -->
					<div class="col-lg-3 col-md-4 col-6">
						<div class="product-default left-details hidden-description inner-icon">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-11.jpg" alt="product" width="300"
										height="300" />
								</a>

								<div class="btn-icon-group">
									<button class="btn-icon btn-icon-wish">
										<i class="icon-heart"></i>
									</button>
								</div>

								<div class="label-group">
									<span class="product-label label-sale">-13%</span>
								</div>

							</figure>

							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">Clothes</a>,
										<a href="/porto/category.html" class="product-category">Bag</a>
									</div>

									<a href="#" class="btn-icon-wish">
										<i class="icon-heart"></i>
									</a>
								</div>

								<h3 class="product-title"> <a href="/porto/product.html">Women White Bag</a> </h3>

								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width: 0%"></span>
										<!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div>
									<!-- End .product-ratings -->
								</div>
								<!-- End .product-container -->

								<div class="price-box">
									<span class="old-price">$299.00</span>
									<span class="product-price">$259.00</span>
								</div>
								<!-- End .price-box -->
								<div class="product-action">
									<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
										title="Quick View">QUICK VIEW</a>
									<a href="#" class="btn-icon btn-add-cart product-type-simple"
										title="add to cart">ADD TO CART</a>
								</div>
							</div>
							<!-- End .product-details -->
						</div>
						<!-- End .product-default -->
					</div>
				</div><!-- End .row -->

				<h4 class="text-uppercase heading-bottom-border mt-4">Fullwidth</h4>
			</div><!-- End .container -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-6 col-sm-4 col-lg-2">
						<div class="product-default inner-quickview inner-icon">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-6-2.jpg" width="212" height="212"
										alt="product" />
									<img src="/porto/assets/images/products/product-6.jpg" width="212" height="212"
										alt="product" />
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
										<a href="/porto/category.html" class="product-category">category</a>
									</div>
									<a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
											class="icon-heart"></i></a>
								</div>
								<h3 class="product-title">
									<a href="/porto/product.html">Brown Men Casual Belt</a>
								</h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->
								<div class="price-box">
									<span class="old-price">$59.00</span>
									<span class="product-price">$49.00</span>
								</div><!-- End .price-box -->
								<div class="product-nav-filter product-nav-thumbs">
									<a href="#" class="active">
										<img src="/porto/assets/images/products/product-6-2.jpg" width="30" height="30"
											alt="prod-thumbnail" />
									</a>
									<a href="#">
										<img src="/porto/assets/images/products/product-6.jpg" width="30" height="30"
											alt="prod-thumbnail" />
									</a>
								</div>
							</div><!-- End .product-details -->
						</div>
					</div><!-- End .col-xl-5col -->

					<div class="col-6 col-sm-4 col-lg-2">
						<div class="product-default inner-quickview inner-icon">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-12.jpg" width="212" height="212"
										alt="product" />
									<img src="/porto/assets/images/products/product-12-2.jpg" width="212" height="212"
										alt="product" />
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
										<a href="/porto/category.html" class="product-category">category</a>
									</div>
									<a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
											class="icon-heart"></i></a>
								</div>
								<h3 class="product-title">
									<a href="/porto/product.html">Casual Office Bag</a>
								</h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->
								<div class="price-box">
									<span class="old-price">$59.00</span>
									<span class="product-price">$49.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
					</div><!-- End .col-xl-5col -->

					<div class="col-6 col-sm-4 col-lg-2">
						<div class="product-default inner-quickview inner-icon">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-7.jpg" width="212" height="212"
										alt="product" />
									<img src="/porto/assets/images/products/product-7-2.jpg" width="212" height="212"
										alt="product" />
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
										<a href="/porto/category.html" class="product-category">category</a>
									</div>
									<a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
											class="icon-heart"></i></a>
								</div>
								<h3 class="product-title">
									<a href="/porto/product.html">Men Shoes</a>
								</h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->
								<div class="price-box">
									<span class="old-price">$59.00</span>
									<span class="product-price">$49.00</span>
								</div><!-- End .price-box -->
								<div class="product-nav-filter product-nav-dots">
									<a href="#" class="active" style="background: #cc9966;"><span class="sr-only">Color
											name</span></a>
									<a href="#" style="background: #7fc5ed;"><span class="sr-only">Color
											name</span></a>
									<a href="#" style="background: #e8c97a;"><span class="sr-only">Color
											name</span></a>
								</div>
							</div><!-- End .product-details -->
						</div>
					</div><!-- End .col-xl-5col -->

					<div class="col-6 col-sm-4 col-lg-2">
						<div class="product-default inner-quickview inner-icon">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-2.jpg" width="212" height="212"
										alt="product" />
									<img src="/porto/assets/images/products/product-2-2.jpg" width="212" height="212"
										alt="product" />
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
										<a href="/porto/category.html" class="product-category">category</a>
									</div>
									<a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
											class="icon-heart"></i></a>
								</div>
								<h3 class="product-title">
									<a href="/porto/product.html">Brown Bag</a>
								</h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->
								<div class="price-box">
									<span class="old-price">$59.00</span>
									<span class="product-price">$49.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
					</div><!-- End .col-xl-5col -->

					<div class="col-6 col-sm-4 col-lg-2">
						<div class="product-default inner-quickview inner-icon">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-5.jpg" width="212" height="212"
										alt="product" />
									<img src="/porto/assets/images/products/product-5-2.jpg" width="212" height="212"
										alt="product" />
								</a>
								<div class="label-group">
									<span class="product-label label-hot">HOT</span>
									<span class="product-label label-sale">-30%</span>
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
										<a href="/porto/category.html" class="product-category">category</a>
									</div>
									<a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
											class="icon-heart"></i></a>
								</div>
								<h3 class="product-title">
									<a href="/porto/product.html">Blue Men Shoes</a>
								</h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->
								<div class="price-box">
									<span class="old-price">$59.00</span>
									<span class="product-price">$49.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
					</div><!-- End .col-xl-5col -->

					<div class="col-6 col-sm-4 col-lg-2">
						<div class="product-default inner-quickview inner-icon">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-10.jpg" width="212" height="212"
										alt="product" />

									<img src="/porto/assets/images/products/product-10-2.jpg" width="212" height="212"
										alt="product" />
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
										<a href="/porto/category.html" class="product-category">category</a>
									</div>
									<a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
											class="icon-heart"></i></a>
								</div>
								<h3 class="product-title">
									<a href="/porto/product.html"> Sports Shoes</a>
								</h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->
								<div class="price-box">
									<span class="old-price">$59.00</span>
									<span class="product-price">$49.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
					</div><!-- End .col-xl-5col -->
				</div>
			</div><!-- End .container-fluid -->
			<div class="container mt-4">
				<h4 class="text-uppercase heading-bottom-border">On image with overlay1 - full width without gap with
					dark hidden description</h4>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-6 col-sm-4 col-lg-2">
						<div class="product-default product-overlay inner-icon-inline inner-quickview inner-icon">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-6-2.jpg" width="212" height="212"
										alt="product" />
								</a>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
											class="icon-shopping-cart"></i></a>
									<a href="#" class="btn-icon btn-icon-wish product-type-simple" title="wishlist"><i
											class="icon-heart"></i></a>
								</div>
								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
									View</a>
							</figure>
							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">category</a>
									</div>
								</div>
								<h3 class="product-title">
									<a href="/porto/product.html">Brown Men Casual Belt</a>
								</h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->
								<div class="price-box">
									<span class="old-price">$59.00</span>
									<span class="product-price">$49.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
					</div><!-- End .col-xl-5col -->

					<div class="col-6 col-sm-4 col-lg-2">
						<div class="product-default product-overlay inner-icon-inline inner-quickview inner-icon">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-6.jpg" width="212" height="212"
										alt="product" />
								</a>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
											class="icon-shopping-cart"></i></a>
									<a href="#" class="btn-icon btn-icon-wish product-type-simple" title="wishlist"><i
											class="icon-heart"></i></a>
								</div>
								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
									View</a>
							</figure>
							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">category</a>
									</div>
								</div>
								<h3 class="product-title">
									<a href="/porto/product.html">Black Men Carousel Melt</a>
								</h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->
								<div class="price-box">
									<span class="old-price">$59.00</span>
									<span class="product-price">$49.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
					</div><!-- End .col-xl-5col -->

					<div class="col-6 col-sm-4 col-lg-2">
						<div class="product-default product-overlay inner-icon-inline inner-quickview inner-icon">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-10.jpg" width="212" height="212"
										alt="product" />
								</a>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
											class="icon-shopping-cart"></i></a>
									<a href="#" class="btn-icon btn-icon-wish product-type-simple" title="wishlist"><i
											class="icon-heart"></i></a>
								</div>
								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
									View</a>
							</figure>
							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">category</a>
									</div>
								</div>
								<h3 class="product-title">
									<a href="/porto/product.html">Men Shoes</a>
								</h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->
								<div class="price-box">
									<span class="old-price">$59.00</span>
									<span class="product-price">$49.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
					</div><!-- End .col-xl-5col -->

					<div class="col-6 col-sm-4 col-lg-2">
						<div class="product-default product-overlay inner-icon-inline inner-quickview inner-icon">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-2.jpg" width="212" height="212"
										alt="product" />
								</a>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
											class="icon-shopping-cart"></i></a>
									<a href="#" class="btn-icon btn-icon-wish product-type-simple" title="wishlist"><i
											class="icon-heart"></i></a>
								</div>
								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
									View</a>
							</figure>
							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">category</a>
									</div>
								</div>
								<h3 class="product-title">
									<a href="/porto/product.html">Women Bag</a>
								</h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->
								<div class="price-box">
									<span class="old-price">$59.00</span>
									<span class="product-price">$49.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
					</div><!-- End .col-xl-5col -->

					<div class="col-6 col-sm-4 col-lg-2">
						<div class="product-default product-overlay inner-icon-inline inner-quickview inner-icon">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-5.jpg" width="212" height="212"
										alt="product" />
								</a>
								<div class="label-group">
									<span class="product-label label-hot">HOT</span>
									<span class="product-label label-sale">-30%</span>
								</div>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
											class="icon-shopping-cart"></i></a>
									<a href="#" class="btn-icon btn-icon-wish product-type-simple" title="wishlist"><i
											class="icon-heart"></i></a>
								</div>
								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
									View</a>
							</figure>
							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">category</a>
									</div>
								</div>
								<h3 class="product-title">
									<a href="/porto/product.html">Blue Shoes</a>
								</h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->
								<div class="price-box">
									<span class="old-price">$59.00</span>
									<span class="product-price">$49.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
					</div><!-- End .col-xl-5col -->

					<div class="col-6 col-sm-4 col-lg-2">
						<div class="product-default product-overlay inner-icon-inline inner-quickview inner-icon">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-4.jpg" width="212" height="212"
										alt="product" />
								</a>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
											class="icon-shopping-cart"></i></a>
									<a href="#" class="btn-icon btn-icon-wish product-type-simple" title="wishlist"><i
											class="icon-heart"></i></a>
								</div>
								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
									View</a>
							</figure>
							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">category</a>
									</div>
								</div>
								<h3 class="product-title">
									<a href="/porto/product.html">Knapsack</a>
								</h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->
								<div class="price-box">
									<span class="old-price">$59.00</span>
									<span class="product-price">$49.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
					</div><!-- End .col-xl-5col -->
				</div>
			</div>
			<div class="container mt-6">
				<h4 class="text-uppercase heading-bottom-border">On image with overlay2 - Creative products grid</h4>

				<div class="creative-grid grid">
					<div
						class="product-default grid-item inner-quickview inner-icon inner-icon-inline overlay-dark w-50 grid-height-1 w-md-100">
						<figure>
							<a href="/porto/product.html">
								<img src="/porto/assets/images/products/grid/product-1.jpg" alt="product" width="576"
									height="576">
							</a>
							<div class="label-group">
								<span class="product-label label-sale">27% Off</span>
							</div>
							<div class="btn-icon-group">
								<a href="#" class="btn-icon btn-icon-wish">
									<i class="icon-heart"></i>
								</a>
								<button class="btn-icon btn-add-cart product-type-simple" data-toggle="modal"
									data-target="#addCartModal">
									<i class="icon-shopping-cart"></i>
								</button>
							</div>
							<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View
							</a>
						</figure>
						<div class="product-details">
							<div class="category-wrap">
								<div class="category-list">
									<a href="/porto/category.html" class="product-category">men</a>
								</div>
							</div>
							<h3 class="product-title"> <a href="/porto/product.html">Woman blouse</a> </h3>
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
								<span class="product-price">$914.00</span>
							</div>
							<!-- End .price-box -->
						</div>
						<!-- End .product-details -->
					</div>

					<div
						class="product-default grid-item inner-quickview inner-icon inner-icon-inline overlay-dark w-25 grid-height-1 w-md-50 w-xs-100">
						<figure>
							<a href="/porto/product.html">
								<img src="/porto/assets/images/products/grid/product-2.jpg" alt="product" width="300"
									height="600">
							</a>
							<div class="btn-icon-group">
								<a href="#" class="btn-icon btn-icon-wish">
									<i class="icon-heart"></i>
								</a>
								<button class="btn-icon btn-add-cart product-type-simple" data-toggle="modal"
									data-target="#addCartModal">
									<i class="icon-shopping-cart"></i>
								</button>
							</div>
							<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View
							</a>
						</figure>
						<div class="product-details">
							<div class="category-list">
								<a href="/porto/category.html" class="product-category">men</a>
							</div>
							<h3 class="product-title"> <a href="/porto/product.html">Man Cloths</a> </h3>
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
								<span class="product-price">$188.00</span>
							</div>
							<!-- End .price-box -->
						</div>
						<!-- End .product-details -->
					</div>

					<div
						class="product-default grid-item inner-quickview inner-icon inner-icon-inline overlay-dark w-25 grid-height-1-2 w-md-50 w-xs-100">
						<figure>
							<a href="/porto/product.html">
								<img src="/porto/assets/images/products/grid/product-3.jpg" alt="product" width="300"
									height="300">
								<img src="/porto/assets/images/products/grid/product-3-2.jpg" alt="product" width="300"
									height="300">
							</a>
							<div class="btn-icon-group">
								<a href="#" class="btn-icon btn-icon-wish">
									<i class="icon-heart"></i>
								</a>
								<button class="btn-icon btn-add-cart product-type-simple" data-toggle="modal"
									data-target="#addCartModal">
									<i class="icon-shopping-cart"></i>
								</button>
							</div>
							<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View
							</a>
						</figure>
						<div class="product-details">
							<div class="category-list">
								<a href="/porto/category.html" class="product-category">men</a>
							</div>
							<h3 class="product-title"> <a href="/porto/product.html">Man Belt</a> </h3>
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
								<span class="product-price">$18.00</span>
							</div>
							<!-- End .price-box -->
						</div>
						<!-- End .product-details -->
					</div>

					<div
						class="product-default grid-item inner-quickview inner-icon inner-icon-inline overlay-dark w-25 grid-height-1-2 w-md-50 w-xs-100">
						<figure>
							<a href="/porto/product.html">
								<img src="/porto/assets/images/products/grid/product-4.jpg" alt="product" width="300"
									height="300">
							</a>
							<div class="btn-icon-group">
								<a href="#" class="btn-icon btn-icon-wish">
									<i class="icon-heart"></i>
								</a>
								<button class="btn-icon btn-add-cart product-type-simple" data-toggle="modal"
									data-target="#addCartModal">
									<i class="icon-shopping-cart"></i>
								</button>
							</div>
							<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick View
							</a>
						</figure>
						<div class="product-details">
							<div class="category-list">
								<a href="/porto/category.html" class="product-category">men</a>
							</div>
							<h3 class="product-title"> <a href="/porto/product.html">Woman Bag</a> </h3>
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
								<span class="product-price">$48.00</span>
							</div>
							<!-- End .price-box -->
						</div>
						<!-- End .product-details -->
					</div>
					<div class="grid-col-sizer"></div>
				</div>

				<h4 class="text-uppercase heading-bottom-border mt-6">Links on image</h4>
				<div class="row">
					<div class="col-6 col-sm-4 col-md-3">
						<div class="product-default inner-btn inner-icon inner-icon-inline left-details">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-1.jpg" width="280" height="280"
										alt="product" />
									<img src="/porto/assets/images/products/product-1-2.jpg" width="280" height="280"
										alt="product" />
								</a>

								<div class="label-group">
									<div class="product-label label-hot">HOT</div>
									<div class="product-label label-sale">-20%</div>
								</div>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
											class="icon-shopping-cart"></i></a>
									<a href="#" class="btn-icon btn-icon-wish product-type-simple" title="wishlist"><i
											class="icon-heart"></i></a>
									<a href="/porto/ajax/product-quick-view.html" class="btn-icon btn-quickview"
										title="Quick View"><i class="fas fa-external-link-alt"></i></a>
								</div>
							</figure>

							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">category</a>
									</div>
								</div>

								<h3 class="product-title"> <a href="/porto/product.html">Ultimate 3D Bluetooth Speaker</a>
								</h3>

								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->

								<div class="price-box">
									<span class="old-price">$90.00</span>
									<span class="product-price">$70.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
					</div><!-- End .col-sm-4 -->

					<div class="col-6 col-sm-4 col-md-3">
						<div class="product-default inner-btn inner-icon inner-icon-inline left-details">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-2.jpg" width="280" height="280"
										alt="product" />
									<img src="/porto/assets/images/products/product-2-2.jpg" width="280" height="280"
										alt="product" />
								</a>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
											class="icon-shopping-cart"></i></a>
									<a href="#" class="btn-icon btn-icon-wish product-type-simple" title="wishlist"><i
											class="icon-heart"></i></a>
									<a href="/porto/ajax/product-quick-view.html" class="btn-icon btn-quickview"
										title="Quick View"><i class="fas fa-external-link-alt"></i></a>
								</div>
							</figure>

							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">category</a>
									</div>
								</div>

								<h3 class="product-title"> <a href="/porto/product.html">Brown Women Casual HandBag</a> </h3>

								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->

								<div class="price-box">
									<span class="product-price">$33.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
					</div><!-- End .col-sm-4 -->

					<div class="col-6 col-sm-4 col-md-3">
						<div class="product-default inner-btn inner-icon inner-icon-inline left-details">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-3.jpg" width="280" height="280"
										alt="product" />
									<img src="/porto/assets/images/products/product-3-2.jpg" width="280" height="280"
										alt="product" />
								</a>

								<div class="label-group">
									<div class="product-label label-sale">-20%</div>
								</div>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
											class="icon-shopping-cart"></i></a>
									<a href="#" class="btn-icon btn-icon-wish product-type-simple" title="wishlist"><i
											class="icon-heart"></i></a>
									<a href="/porto/ajax/product-quick-view.html" class="btn-icon btn-quickview"
										title="Quick View"><i class="fas fa-external-link-alt"></i></a>
								</div>
							</figure>

							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">category</a>
									</div>
								</div>

								<h3 class="product-title"> <a href="/porto/product.html">Circled Ultimate 3D Speaker</a> </h3>

								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->

								<div class="price-box">
									<span class="old-price">$90.00</span>
									<span class="product-price">$70.00</span>

								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
					</div><!-- End .col-sm-4 -->

					<div class="col-6 col-sm-4 col-md-3">
						<div class="product-default inner-btn inner-icon inner-icon-inline left-details">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-4.jpg" width="280" height="280"
										alt="product" />
									<img src="/porto/assets/images/products/product-4-2.jpg" width="280" height="280"
										alt="product">
								</a>

								<div class="label-group">
									<div class="product-label label-sale">-30%</div>
								</div>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
											class="icon-shopping-cart"></i></a>
									<a href="#" class="btn-icon btn-icon-wish product-type-simple" title="wishlist"><i
											class="icon-heart"></i></a>
									<a href="/porto/ajax/product-quick-view.html" class="btn-icon btn-quickview"
										title="Quick View"><i class="fas fa-external-link-alt"></i></a>
								</div>
							</figure>

							<div class="product-details">
								<div class="category-wrap">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">category</a>
									</div>
								</div>

								<h3 class="product-title"> <a href="/porto/product.html">Blue Backpack for the Young - S</a>
								</h3>

								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span><!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->

								<div class="price-box">
									<span class="old-price">$90.00</span>
									<span class="product-price">$70.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
					</div><!-- End .col-sm-4 -->
				</div><!-- End .row -->

				<h4 class="text-uppercase heading-bottom-border mt-4">Show quantity input</h4>
				<div class="row">
					<!-- product-1 -->
					<div class="col-lg-3 col-md-4 col-6">
						<div class="product-default inner-quickview inner-icon quantity-input">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-17.jpg" width="280" height="280"
										alt="product" />
								</a>
								<div class="label-group">
									<span class="product-label label-hot">HOT</span>
									<span class="product-label label-sale">-30%</span>
								</div>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-icon-wish">
										<i class="icon-heart"></i>
									</a>
								</div>
								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
									View</a>
							</figure>
							<div class="product-details">
								<div class="category-list">
									<a href="/porto/category.html" class="product-category">toys, watches</a>
								</div>
								<h3 class="product-title"> <a href="/porto/product.html">25 Acoustic Noise</a> </h3>
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
								<div class="product-action">
									<div class="product-single-qty">
										<input class="horizontal-quantity form-control" type="text">
									</div>
									<!-- End .product-single-qty -->
									<button class="btn-icon btn-add-cart product-type-simple" data-toggle="modal"
										data-target="#addCartModal">ADD TO CART</button>
								</div>
							</div>
							<!-- End .product-details -->
						</div>
					</div>
					<!-- End .col-sm-4 -->

					<!-- product-2 -->
					<div class="col-lg-3 col-md-4 col-6">
						<div class="product-default inner-quickview inner-icon quantity-input">
							<figure class="img-effect">
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-1-2.jpg" width="280" height="280"
										alt="product" />
								</a>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-icon-wish">
										<i class="icon-heart"></i>
									</a>
								</div>
								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
									View
								</a>
							</figure>
							<div class="product-details">
								<div class="category-list">
									<a href="/porto/category.html" class="product-category">SPEAKERS, WATCHES</a>
								</div>
								<h3 class="product-title"> <a href="/porto/product.html">Dark speaker</a> </h3>
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
									<span class="product-price">$299.00</span>
								</div>
								<!-- End .price-box -->
								<div class="product-action">
									<div class="product-single-qty">
										<input class="horizontal-quantity form-control" type="text">
									</div>
									<!-- End .product-single-qty -->
									<button class="btn-icon btn-add-cart product-type-simple" data-toggle="modal"
										data-target="#addCartModal">ADD TO CART</button>
								</div>
							</div>
							<!-- End .product-details -->
						</div>
					</div>
					<!-- End .col-sm-4 -->

					<!-- product-3 -->
					<div class="col-lg-3 col-md-4 col-6">
						<div class="product-default inner-quickview inner-icon quantity-input">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-9.jpg" width="280" height="280"
										alt="product">
								</a>
								<div class="label-group">
									<span class="product-label label-hot">HOT</span>
									<span class="product-label label-sale">-20%</span>
								</div>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-icon-wish">
										<i class="icon-heart"></i>
									</a>
								</div>
								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
									View</a>
							</figure>
							<div class="product-details">
								<div class="category-list">
									<a href="/porto/category.html" class="product-category">computer, watches</a>
								</div>
								<h3 class="product-title"> <a href="/porto/product.html">Computer Glasses</a> </h3>
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
								<div class="product-action">
									<div class="product-single-qty">
										<input class="horizontal-quantity form-control" type="text">
									</div>
									<!-- End .product-single-qty -->
									<button class="btn-icon btn-add-cart product-type-simple" data-toggle="modal"
										data-target="#addCartModal">ADD TO CART</button>
								</div>
							</div>
							<!-- End .product-details -->
						</div>
					</div>

					<!-- product-4 -->
					<div class="col-lg-3 col-md-4 col-6">
						<div class="product-default inner-quickview inner-icon quantity-input">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/product-3.jpg" width="280" height="280"
										alt="product">
								</a>
								<div class="label-group">
									<span class="product-label label-hot">HOT</span>
									<span class="product-label label-sale">-30%</span>
								</div>
								<div class="btn-icon-group">
									<a href="#" class="btn-icon btn-icon-wish">
										<i class="icon-heart"></i>
									</a>
								</div>
								<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
									View</a>
							</figure>
							<div class="product-details">
								<div class="category-list">
									<a href="/porto/category.html" class="product-category">Computer, bluetooth</a>
								</div>
								<h3 class="product-title"> <a href="/porto/product.html">Portable Speaker</a> </h3>
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
									<span class="product-price">$299.00</span>
								</div>
								<!-- End .price-box -->
								<div class="product-action">
									<div class="product-single-qty">
										<input class="horizontal-quantity form-control" type="text">
									</div>
									<!-- End .product-single-qty -->
									<button class="btn-icon btn-add-cart product-type-simple data-toggle=" modal"
										data-target="#addCartModal">ADD TO CART</button>
								</div>
							</div>
							<!-- End .product-details -->
						</div>
						<!-- End .col-sm-4 -->
					</div>
				</div><!-- End .row -->

				<div class="row mb-8">
					<div class="col-lg-9">
						<h4 class="text-uppercase heading-bottom-border mt-4">List</h4>
						<div class="row">
							<div class="col-sm-12 col-6 product-default left-details product-list mb-2">
								<figure>
									<a href="/porto/product.html">
										<img src="/porto/assets/images/products/product-1.jpg" width="250" height="250"
											alt="product" />
										<img src="/porto/assets/images/products/product-1-2.jpg" width="250" height="250"
											alt="product" />
									</a>
								</figure>
								<div class="product-details">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">category</a>
									</div>
									<h3 class="product-title"> <a href="/porto/product.html">Ultimate 3D Bluetooth Speaker</a>
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
									<p class="product-description">Pellentesque habitant morbi tristique senectus et
										netus et malesuada fames ac turpis egestas. Vestibulum tortor
										quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit
										amet quam egestas semper. Aenean
										ultricies mi vitae est. Mauris placerat eleifend leo.</p>
									<div class="price-box">
										<span class="product-price">$15.00</span>
									</div>
									<!-- End .price-box -->
									<div class="product-action">
										<a href="#" class="btn-icon btn-add-cart product-type-simple">
											<i class="icon-shopping-cart"></i>
											<span>ADD TO CART</span>
										</a>
										<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist">
											<i class="icon-heart"></i>
										</a>
										<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">
											<i class="fas fa-external-link-alt"></i>
										</a>
									</div>
								</div>
								<!-- End .product-details -->
							</div>

							<div class="col-sm-12 col-6 product-default left-details product-list mb-2">
								<figure>
									<a href="/porto/product.html">
										<img src="/porto/assets/images/products/product-2.jpg" width="250" height="250"
											alt="product" />
										<img src="/porto/assets/images/products/product-2-2.jpg" width="250" height="250"
											alt="product" />
									</a>
								</figure>

								<div class="product-details">
									<div class="category-list">
										<a href="/porto/category.html" class="product-category">category</a>
									</div>

									<h3 class="product-title"> <a href="/porto/product.html">Brown Women Casual HandBag</a>
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

									<p class="product-description">Pellentesque habitant morbi tristique senectus et
										netus et malesuada fames ac turpis egestas. Vestibulum tortor
										quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit
										amet quam egestas semper. Aenean
										ultricies mi vitae est. Mauris placerat eleifend leo.</p>
									<div class="price-box">

										<span class="product-price">$15.00</span>
									</div>
									<!-- End .price-box -->

									<div class="product-action">
										<a href="/porto/product.html" class="btn-icon btn-add-cart">
											<i class="fa fa-arrow-right"></i>
											<span>SELECT OPTIONS</span>
										</a>
										<a href="/porto/wishlist.html" class="btn-icon-wish" title="wishlist">
											<i class="icon-heart"></i>
										</a>
										<a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">
											<i class="fas fa-external-link-alt"></i>
										</a>
									</div>
								</div>
								<!-- End .product-details -->
							</div>
						</div><!-- End .row -->
					</div>
					<div class="col-lg-3">
						<h4 class="text-uppercase heading-bottom-border mt-6 mt-lg-4">Widget</h4>
						<div class="product-default left-details product-widget">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/small/product-1.jpg" width="84" height="84"
										alt="product">
									<img src="/porto/assets/images/products/small/product-1-2.jpg" width="84" height="84"
										alt="product">
								</a>
							</figure>
							<div class="product-details">
								<h3 class="product-title"> <a href="/porto/product.html">Porto Extended Camera</a> </h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span>
										<!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->
								<div class="price-box">
									<span class="product-price">$49.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
						<div class="product-default left-details product-widget">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/small/product-4.jpg" width="84" height="84"
										alt="product">
									<img src="/porto/assets/images/products/small/product-4-2.jpg" width="84" height="84"
										alt="product">
								</a>
							</figure>
							<div class="product-details">
								<h3 class="product-title"> <a href="/porto/product.html">Blue BackPack</a> </h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span>
										<!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->
								<div class="price-box">
									<span class="product-price">$49.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
						<div class="product-default left-details product-widget ">
							<figure>
								<a href="/porto/product.html">
									<img src="/porto/assets/images/products/small/product-5.jpg" width="84" height="84"
										alt="product">
									<img src="/porto/assets/images/products/small/product-5-2.jpg" width="84" height="84"
										alt="product">
								</a>
							</figure>
							<div class="product-details">
								<h3 class="product-title"> <a href="/porto/product.html">Casual Blue Shoes</a> </h3>
								<div class="ratings-container">
									<div class="product-ratings">
										<span class="ratings" style="width:100%"></span>
										<!-- End .ratings -->
										<span class="tooltiptext tooltip-top"></span>
									</div><!-- End .product-ratings -->
								</div><!-- End .product-container -->
								<div class="price-box">
									<span class="product-price">$49.00</span>
								</div><!-- End .price-box -->
							</div><!-- End .product-details -->
						</div>
					</div>
				</div>
			</div>

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
