@extends('layouts.porto')

@section('top-notice')
    @include('porto.demo13.top-notice')
@endsection

@section('header')
    @include('porto.demo13.header')
@endsection

@section('footer')
    @include('porto.demo13.footer')
@endsection

@section('content')
<div class="category-banner-container bg-gray">
				<div class="category-banner banner text-uppercase"
					style="background: no-repeat 50%/cover url('/porto/assets/images/demoes/demo13/banners/banner-top.jpg') #ee3d43;">
					<div class="container position-relative">
						<div class="banner-body text-uppercase">
							<h4 class="banner-subtitle text-white">over 200 products with discounts</h4>
							<h3 class="banner-title text-white">great deals</h3>
							<h5 class="banner-text text-white d-inline-block ls-n-20 align-text-bottom">Starting At
								<b class="coupon-sale-text bg-secondary text-white d-inline-block">$
									<em>299</em>99</b>
							</h5>
							<a href="/porto/demo13-shop.html" class="btn btn-primary btn-md ls-10 align-bottom">Get Yours!</a>
						</div>
					</div>
				</div>
			</div>

			<nav aria-label="breadcrumb" class="breadcrumb-nav">
				<div class="container">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="/porto/demo13.html">Home</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Shop</li>
					</ol>
				</div>
			</nav>

			<div class="container">
				<div class="row">
					<div class="col-lg-9 main-content">
						<nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
							<div class="toolbox-left">
								<a href="#" class="sidebar-toggle">
									<svg data-name="Layer 3" id="Layer_3" viewBox="0 0 32 32"
										xmlns="http://www.w3.org/2000/svg">
										<line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
										<line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
										<line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
										<line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
										<line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
										<line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
										<path
											d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z"
											class="cls-2"></path>
										<path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
										<path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
										<path
											d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z"
											class="cls-2"></path>
									</svg>
									<span>Filter</span>
								</a>

								<div class="toolbox-item toolbox-sort">
									<label>Sort By:</label>

									<div class="select-custom">
										<select name="orderby" class="form-control">
											<option value="menu_order" selected="selected">Default sorting</option>
											<option value="popularity">Sort by popularity</option>
											<option value="rating">Sort by average rating</option>
											<option value="date">Sort by newness</option>
											<option value="price">Sort by price: low to high</option>
											<option value="price-desc">Sort by price: high to low</option>
										</select>
									</div>
									<!-- End .select-custom -->


								</div>
								<!-- End .toolbox-item -->
							</div>
							<!-- End .toolbox-left -->

							<div class="toolbox-right">
								<div class="toolbox-item toolbox-show">
									<label>Show:</label>

									<div class="select-custom">
										<select name="count" class="form-control">
											<option value="12">12</option>
											<option value="24">24</option>
											<option value="36">36</option>
										</select>
									</div>
									<!-- End .select-custom -->
								</div>
								<!-- End .toolbox-item -->

								<div class="toolbox-item layout-modes">
									<a href="/porto/category.html" class="layout-btn btn-grid active" title="Grid">
										<i class="icon-mode-grid"></i>
									</a>
									<a href="/porto/category-list.html" class="layout-btn btn-list" title="List">
										<i class="icon-mode-list"></i>
									</a>
								</div>
								<!-- End .layout-modes -->
							</div>
							<!-- End .toolbox-right -->
						</nav>

						<div class="row products-group">
							<!-- product-1 -->
							<div class="col-xl-3 col-md-4 col-6">
								<div class="product-default inner-quickview inner-icon">
									<figure class="img-effect">
										<a href="/porto/demo13-product.html">
											<img src="/porto/assets/images/demoes/demo13/products/product-2.jpg" width="205"
												height="205" alt="product">
											<img src="/porto/assets/images/demoes/demo13/products/product-2-2.jpg" width="205"
												height="205" alt="product">
										</a>
										<div class="label-group">
											<div class="product-label label-hot">HOT</div>
											<div class="product-label label-sale">-20%</div>
										</div>
										<div class="btn-icon-group">
											<a href="#" class="btn-icon btn-add-cart product-type-simple">
												<i class="icon-shopping-cart"></i>
											</a>
										</div>
										<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
											title="Quick View">Quick View
										</a>
									</figure>
									<div class="product-details">
										<div class="category-wrap">
											<div class="category-list">
												<a href="/porto/demo13-shop.html" class="product-category">SHOES, WATCHES</a>
											</div>
											<a href="/porto/wishlist.html" class="btn-icon-wish">
												<i class="icon-wishlist-2"></i>
											</a>
										</div>
										<h3 class="product-title">
											<a href="/porto/demo13-product.html">Gentle Shoes</a>
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
											<span class="product-price">$299.00</span>
										</div>
										<!-- End .price-box -->
									</div>
									<!-- End .product-details -->
								</div>
							</div>
							<!-- End .col-sm-4 -->

							<!-- product-2 -->
							<div class="col-xl-3 col-md-4 col-6">
								<div class="product-default inner-quickview inner-icon">
									<figure class="img-effect">
										<a href="/porto/demo13-product.html">
											<img src="/porto/assets/images/demoes/demo13/products/product-3.jpg" width="205"
												height="205" alt="product" />
											<img src="/porto/assets/images/demoes/demo13/products/product-3-2.jpg" width="205"
												height="205" alt="product" />
										</a>
										<div class="btn-icon-group">
											<a href="/porto/demo13-product.html" class="btn-icon btn-add-cart">
												<i class="fa fa-arrow-right"></i>
											</a>
										</div>
										<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
											title="Quick View">Quick View
										</a>
									</figure>
									<div class="product-details">
										<div class="category-wrap">
											<div class="category-list">
												<a href="/porto/demo13-shop.html" class="product-category">T-SHIRTS, WATCHES
												</a>
											</div>
											<a href="/porto/wishlist.html" class="btn-icon-wish">
												<i class="icon-wishlist-2"></i>
											</a>
										</div>
										<h3 class="product-title">
											<a href="/porto/demo13-product.html">Men Belts</a>
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
											<del class="product-price">$1,999.00</del>
											<span class="product-price">$1,699.00</span>
										</div>
										<!-- End .price-box -->
									</div>
									<!-- End .product-details -->
								</div>
							</div>
							<!-- End .col-sm-4 -->

							<!-- product-3 -->
							<div class="col-xl-3 col-md-4 col-6">
								<div class="product-default inner-quickview inner-icon">
									<figure class="img-effect">
										<a href="/porto/demo13-product.html">
											<img src="/porto/assets/images/demoes/demo13/products/product-4.jpg" width="205"
												height="205" alt="product">
											<img src="/porto/assets/images/demoes/demo13/products/product-4-2.jpg" width="205"
												height="205" alt="product">
										</a>
										<div class="label-group">
											<div class="product-label label-hot">HOT</div>
											<div class="product-label label-sale">-30%</div>
										</div>
										<div class="btn-icon-group">
											<a href="#" class="btn-icon btn-add-cart product-type-simple">
												<i class="icon-shopping-cart"></i>
											</a>
										</div>
										<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
											title="Quick View">Quick View
										</a>
									</figure>
									<div class="product-details">
										<div class="category-wrap">
											<div class="category-list">
												<a href="/porto/demo13-shop.html" class="product-category">HEADPHONE, WATCHES
												</a>
											</div>
											<a href="/porto/wishlist.html" class="btn-icon-wish">
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
							<!-- End .col-sm-4 -->

							<!-- product-4 -->
							<div class="col-xl-3 col-md-4 col-6">
								<div class="product-default inner-quickview inner-icon">
									<figure class="img-effect">
										<a href="/porto/demo13-product.html">
											<img src="/porto/assets/images/demoes/demo13/products/product-5.jpg" width="205"
												height="205" alt="product">
											<img src="/porto/assets/images/demoes/demo13/products/product-5-2.jpg" width="205"
												height="205" alt="product">
										</a>
										<div class="btn-icon-group">
											<a href="/porto/demo13-product.html" class="btn-icon btn-add-cart">
												<i class="fa fa-arrow-right"></i>
											</a>
										</div>
										<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
											title="Quick View">Quick View
										</a>
									</figure>
									<div class="product-details">
										<div class="category-wrap">
											<div class="category-list">
												<a href="/porto/demo13-shop.html" class="product-category">SHOES, TOYS</a>
											</div>
											<a href="/porto/wishlist.html" class="btn-icon-wish">
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
							<!-- End .col-sm-4 -->

							<!-- product-5 -->
							<div class="col-xl-3 col-md-4 col-6">
								<div class="product-default inner-quickview inner-icon">
									<figure class="img-effect">
										<a href="/porto/demo13-product.html">
											<img src="/porto/assets/images/demoes/demo13/products/product-1.jpg" width="205"
												height="205" alt="product">
											<img src="/porto/assets/images/demoes/demo13/products/product-1-2.jpg" width="205"
												height="205" alt="product">
										</a>
										<div class="btn-icon-group">
											<a href="#" class="btn-icon btn-add-cart product-type-simple">
												<i class="icon-shopping-cart"></i>
											</a>
										</div>
										<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
											title="Quick View">Quick View
										</a>
									</figure>
									<div class="product-details">
										<div class="category-wrap">
											<div class="category-list">
												<a href="/porto/demo13-shop.html" class="product-category">CAPS, DRESS</a>
											</div>
											<a href="/porto/wishlist.html" class="btn-icon-wish">
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
							<!-- End .col-sm-4 -->

							<!-- product-6 -->
							<div class="col-xl-3 col-md-4 col-6">
								<div class="product-default inner-quickview inner-icon">
									<figure class="img-effect">
										<a href="/porto/demo13-product.html">
											<img src="/porto/assets/images/demoes/demo13/products/product-8.jpg" width="205"
												height="205" alt="product">
											<img src="/porto/assets/images/demoes/demo13/products/product-8-2.jpg" width="205"
												height="205" alt="product">
										</a>
										<div class="btn-icon-group">
											<a href="/porto/demo13-product.html" class="btn-icon btn-add-cart">
												<i class="fa fa-arrow-right"></i>
											</a>
										</div>
										<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
											title="Quick View">Quick View
										</a>
									</figure>
									<div class="product-details">
										<div class="category-wrap">
											<div class="category-list">
												<a href="/porto/demo13-shop.html" class="product-category">CAPS, T-SHIRTS</a>
											</div>
											<a href="/porto/wishlist.html" class="btn-icon-wish">
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
							<!-- End .col-sm-4 -->

							<!-- product-7 -->
							<div class="col-xl-3 col-md-4 col-6">
								<div class="product-default inner-quickview inner-icon">
									<figure class="img-effect">
										<a href="/porto/demo13-product.html">
											<img src="/porto/assets/images/demoes/demo13/products/product-9.jpg" width="205"
												height="205" alt="product">
											<img src="/porto/assets/images/demoes/demo13/products/product-9-2.jpg" width="205"
												height="205" alt="product" />
										</a>
										<div class="btn-icon-group">
											<a href="#" class="btn-icon btn-add-cart product-type-simple">
												<i class="icon-shopping-cart"></i>
											</a>
										</div>
										<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
											title="Quick View">Quick View
										</a>
									</figure>
									<div class="product-details">
										<div class="category-wrap">
											<div class="category-list">
												<a href="/porto/demo13-shop.html" class="product-category">DRESS, HEADPHONE</a>
											</div>
											<a href="/porto/wishlist.html" class="btn-icon-wish">
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
							<!-- End .col-sm-4 -->

							<!-- product-8 -->
							<div class="col-xl-3 col-md-4 col-6">
								<div class="product-default inner-quickview inner-icon">
									<figure class="img-effect">
										<a href="/porto/demo13-product.html">
											<img src="/porto/assets/images/demoes/demo13/products/product-10.jpg" width="205"
												height="205" alt="product" />
											<img src="/porto/assets/images/demoes/demo13/products/product-10-2.jpg" width="205"
												height="205" alt="product" />
										</a>
										<div class="btn-icon-group">
											<a href="/porto/demo13-product.html" class="btn-icon btn-add-cart">
												<i class="fa fa-arrow-right"></i>
											</a>
										</div>
										<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
											title="Quick View">Quick View
										</a>
									</figure>
									<div class="product-details">
										<div class="category-wrap">
											<div class="category-list">
												<a href="/porto/demo13-shop.html" class="product-category">SHOES, TOYS</a>
											</div>
											<a href="/porto/wishlist.html" class="btn-icon-wish">
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
							<!-- End .col-sm-4 -->

							<!-- product-9 -->
							<div class="col-xl-3 col-md-4 col-6">
								<div class="product-default inner-quickview inner-icon">
									<figure class="img-effect">
										<a href="/porto/demo13-product.html">
											<img src="/porto/assets/images/demoes/demo13/products/product-11.jpg" width="205"
												height="205" alt="product" />
											<img src="/porto/assets/images/demoes/demo13/products/product-11-2.jpg" width="205"
												height="205" alt="product" />
										</a>
										<div class="btn-icon-group">
											<a href="#" class="btn-icon btn-add-cart product-type-simple">
												<i class="icon-shopping-cart"></i>
											</a>
										</div>
										<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
											title="Quick View">Quick View
										</a>
									</figure>

									<div class="product-details">
										<div class="category-wrap">
											<div class="category-list">
												<a href="/porto/demo13-shop.html" class="product-category">DRESS, T-SHIRTS</a>
											</div>
											<a href="/porto/wishlist.html" class="btn-icon-wish">
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
												<span class="tooltiptext tooltip-top"></span>
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
							<!-- End .col-sm-4 -->

							<!-- product-10 -->
							<div class="col-xl-3 col-md-4 col-6">
								<div class="product-default inner-quickview inner-icon">
									<figure class="img-effect">
										<a href="/porto/demo13-product.html">
											<img src="/porto/assets/images/demoes/demo13/products/product-12.jpg" width="205"
												height="205" alt="product">
											<img src="/porto/assets/images/demoes/demo13/products/product-12-2.jpg" width="205"
												height="205" alt="product" />
										</a>
										<div class="btn-icon-group">
											<a href="#" class="btn-icon btn-add-cart product-type-simple">
												<i class="icon-shopping-cart"></i>
											</a>
										</div>
										<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
											title="Quick View">Quick View
										</a>
									</figure>

									<div class="product-details">
										<div class="category-wrap">
											<div class="category-list">
												<a href="/porto/demo13-shop.html" class="product-category">DRESS, WATCHES</a>
											</div>
											<a href="/porto/wishlist.html" class="btn-icon-wish">
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
											<span class="product-price">$299.00</span>
										</div>
										<!-- End .price-box -->
									</div>
									<!-- End .product-details -->
								</div>
							</div>
							<!-- End .col-sm-4 -->

							<!-- product-11 -->
							<div class="col-xl-3 col-md-4 col-6">
								<div class="product-default inner-quickview inner-icon">
									<figure class="img-effect">
										<a href="/porto/demo13-product.html">
											<img src="/porto/assets/images/demoes/demo13/products/product-13.jpg" width="205"
												height="205" alt="product">
											<img src="/porto/assets/images/demoes/demo13/products/product-13-2.jpg" width="205"
												height="205" alt="product" />
										</a>
										<div class="btn-icon-group">
											<a href="/porto/demo13-product.html" class="btn-icon btn-add-cart">
												<i class="fa fa-arrow-right"></i>
											</a>
										</div>
										<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
											title="Quick View">Quick View
										</a>
									</figure>

									<div class="product-details">
										<div class="category-wrap">
											<div class="category-list">
												<a href="/porto/demo13-shop.html" class="product-category">TOYS, TROUSERS</a>
											</div>
											<a href="/porto/wishlist.html" class="btn-icon-wish">
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
							<!-- End .col-sm-4 -->

							<!-- product-12 -->
							<div class="col-xl-3 col-md-4 col-6">
								<div class="product-default inner-quickview inner-icon">
									<figure class="img-effect">
										<a href="/porto/demo13-product.html">
											<img src="/porto/assets/images/demoes/demo13/products/product-14.jpg" width="205"
												height="205" alt="product">
											<img src="/porto/assets/images/demoes/demo13/products/product-14-2.jpg" width="205"
												height="205" alt="product" />
										</a>
										<div class="btn-icon-group">
											<a href="/porto/demo13-product.html" class="btn-icon btn-add-cart">
												<i class="fa fa-arrow-right"></i>
											</a>
										</div>
										<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
											title="Quick View">Quick View
										</a>
									</figure>

									<div class="product-details">
										<div class="category-wrap">
											<div class="category-list">
												<a href="/porto/demo13-shop.html" class="product-category">T-Shirts, Watches
												</a>
											</div>
											<a href="/porto/wishlist.html" class="btn-icon-wish">
												<i class="icon-wishlist-2"></i>
											</a>
										</div>
										<h3 class="product-title">
											<a href="/porto/demo13-product.html">Women Red Bag</a>
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
											<del class="product-price">$299.00</del>
											<span class="product-price">$199.00</span>
										</div>
										<!-- End .price-box -->
									</div>
									<!-- End .product-details -->
								</div>
							</div>
							<!-- End .col-sm-4 -->
						</div>
						<!-- End .row -->

						<nav class="toolbox toolbox-pagination">
							<div class="toolbox-item toolbox-show">
								<label>Show:</label>

								<div class="select-custom">
									<select name="count" class="form-control">
										<option value="12">12</option>
										<option value="24">24</option>
										<option value="36">36</option>
									</select>
								</div>
								<!-- End .select-custom -->
							</div>
							<!-- End .toolbox-item -->

							<ul class="pagination toolbox-item">
								<li class="page-item disabled">
									<a class="page-link page-link-btn" href="#">
										<i class="icon-angle-left"></i>
									</a>
								</li>
								<li class="page-item active">
									<a class="page-link" href="#">1
										<span class="sr-only">(current)</span>
									</a>
								</li>
								<li class="page-item">
									<a class="page-link" href="#">2</a>
								</li>
								<li class="page-item">
									<a class="page-link" href="#">3</a>
								</li>
								<li class="page-item">
									<span class="page-link">...</span>
								</li>
								<li class="page-item">
									<a class="page-link page-link-btn" href="#">
										<i class="icon-angle-right"></i>
									</a>
								</li>
							</ul>
						</nav>
					</div>
					<!-- End .col-lg-9 -->

					<div class="sidebar-overlay"></div>
					<aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
						<div class="sidebar-wrapper">
							<div class="widget">
								<h3 class="widget-title">
									<a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true"
										aria-controls="widget-body-2">Categories</a>
								</h3>

								<div class="collapse show" id="widget-body-2">
									<div class="widget-body">
										<ul class="cat-list">
											<li>
												<a href="#widget-category-1" data-toggle="collapse" role="button"
													aria-expanded="true" aria-controls="widget-category-1">
													Accessories
													<span class="products-count">(3)</span>
													<span class="toggle"></span>
												</a>
												<div class="collapse show" id="widget-category-1">
													<ul class="cat-sublist">
														<li>Caps
															<span class="products-count">(1)</span>
														</li>
														<li>Watches
															<span class="products-count">(2)</span>
														</li>
													</ul>
												</div>
											</li>
											<li>
												<a href="#widget-category-2" class="collapsed" data-toggle="collapse"
													role="button" aria-expanded="false"
													aria-controls="widget-category-2">
													Dress
													<span class="products-count">(4)</span>
													<span class="toggle"></span>
												</a>
												<div class="collapse" id="widget-category-2">
													<ul class="cat-sublist">
														<li>Clothing
															<span class="products-count">(4)</span>
														</li>
													</ul>
												</div>
											</li>
											<li>
												<a href="#widget-category-3" class="collapsed" data-toggle="collapse"
													role="button" aria-expanded="false"
													aria-controls="widget-category-3">
													Electronics
													<span class="products-count">(2)</span>
													<span class="toggle"></span>
												</a>
												<div class="collapse" id="widget-category-3">
													<ul class="cat-sublist">
														<li>Headphone
															<span class="products-count">(1)</span>
														</li>
														<li>Watch
															<span class="products-count">(1)</span>
														</li>
													</ul>
												</div>
											</li>
											<li>
												<a href="#widget-category-4" class="collapsed" data-toggle="collapse"
													role="button" aria-expanded="false"
													aria-controls="widget-category-4">
													Fashion
													<span class="products-count">(6)</span>
													<span class="toggle"></span>
												</a>
												<div class="collapse" id="widget-category-4">
													<ul class="cat-sublist">
														<li>Shoes
															<span class="products-count">(4)</span>
														</li>
														<li>Bag
															<span class="products-count">(2)</span>
														</li>
													</ul>
												</div>
											</li>
										</ul>
									</div>
									<!-- End .widget-body -->
								</div>
								<!-- End .collapse -->
							</div>
							<!-- End .widget -->

							<div class="widget">
								<h3 class="widget-title">
									<a data-toggle="collapse" href="#widget-body-3" role="button" aria-expanded="true"
										aria-controls="widget-body-3">Price</a>
								</h3>

								<div class="collapse show" id="widget-body-3">
									<div class="widget-body pb-0">
										<form action="#">
											<div class="price-slider-wrapper">
												<div id="price-slider"></div>
												<!-- End #price-slider -->
											</div>
											<!-- End .price-slider-wrapper -->

											<div
												class="filter-price-action d-flex align-items-center justify-content-between flex-wrap">
												<div class="filter-price-text">
													Price:
													<span id="filter-price-range"></span>
												</div>
												<!-- End .filter-price-text -->

												<button type="submit" class="btn btn-primary">Filter</button>
											</div>
											<!-- End .filter-price-action -->
										</form>
									</div>
									<!-- End .widget-body -->
								</div>
								<!-- End .collapse -->
							</div>
							<!-- End .widget -->

							<div class="widget widget-size">
								<h3 class="widget-title">
									<a data-toggle="collapse" href="#widget-body-5" role="button" aria-expanded="true"
										aria-controls="widget-body-5">Size</a>
								</h3>

								<div class="collapse show" id="widget-body-5">
									<div class="widget-body">
										<ul class="cat-list">
											<li class="active">
												<a href="#">Extra Large</a>
											</li>
											<li>
												<a href="#">Extra Small</a>
											</li>
											<li>
												<a href="#">Large</a>
											</li>
											<li>
												<a href="#">Medium</a>
											</li>
											<li>
												<a href="#">Small</a>
											</li>
										</ul>
									</div>
									<!-- End .widget-body -->
								</div>
								<!-- End .collapse -->
							</div>
							<!-- End .widget -->

							<div class="widget widget-brand">
								<h3 class="widget-title">
									<a data-toggle="collapse" href="#widget-body-5" role="button" aria-expanded="true"
										aria-controls="widget-body-5">Brands</a>
								</h3>

								<div class="collapse show" id="widget-body-6">
									<div class="widget-body">
										<ul class="cat-list">
											<li>
												<a href="#">Adidas</a>
											</li>
										</ul>
									</div>
									<!-- End .widget-body -->
								</div>
								<!-- End .collapse -->
							</div>
							<!-- End .widget -->

							<div class="widget widget-color">
								<h3 class="widget-title">
									<a data-toggle="collapse" href="#widget-body-4" role="button" aria-expanded="true"
										aria-controls="widget-body-4">Color</a>
								</h3>

								<div class="collapse show" id="widget-body-4">
									<div class="widget-body pb-0">
										<ul class="config-swatch-list">
											<li class="active">
												<a href="#" style="background-color: #000;"></a>
											</li>
											<li>
												<a href="#" style="background-color: #0188cc;"></a>
											</li>
											<li>
												<a href="#" style="background-color: #81d742;"></a>
											</li>
											<li>
												<a href="#" style="background-color: #6085a5;"></a>
											</li>
											<li>
												<a href="#" style="background-color: #ab6e6e;"></a>
											</li>
											<li>
												<a href="#" style="background-color: #809fbf;"></a>
											</li>
											<li>
												<a href="#" style="background-color: #eded78;"></a>
											</li>
										</ul>
									</div>
									<!-- End .widget-body -->
								</div>
								<!-- End .collapse -->
							</div>
							<!-- End .widget -->
						</div>
						<!-- End .sidebar-wrapper -->
					</aside>
					<!-- End .col-lg-3 -->
				</div>
				<!-- End .row -->
			</div>
			<!-- End .container -->

			<div class="mb-4"></div>
			<!-- margin -->
@section('footer')
    @include('porto.demo13.footer')
@endsection

@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
