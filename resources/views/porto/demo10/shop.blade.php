@extends('layouts.porto')

@section('header')
    @include('porto.demo10.header')
@endsection

@section('footer')
    @include('porto.demo10.footer')
@endsection

@section('content')
<section class="container">
				<div class="newsletter-section shop-banner bg-img">
					<div class="banner">
						<img src="/porto/assets/images/demoes/demo10/newsletter_bg.jpg" alt="desc" width="1000" height="400">

						<div class="banner-layer banner-layer-middle text-right pt-4 pt-lg-0">
							<h4>Sunglasses, Bags, Dresses and much more...</h4>
							<h3>
								<b class="text-white position-relative">BIG SALE</b> ALL NEW FASHION BRANDS ITEMS UP TO
								70% OFF
							</h3>
							<a href="/porto/demo10-shop.html" class="btn btn-xl" role="button">Shop Now<i
									class="fas fa-chevron-right"></i></a>
						</div>
					</div>
				</div>
			</section>
			<!-- End .container-->

			<nav aria-label="breadcrumb" class="breadcrumb-nav sticky-header no-boxShadow p-0 mb-0"
				data-sticky-options="{'mobile': false}">
				<div class="container">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="/porto/demo10.html"><i class="icon-home"></i></a></li>
						<li class="breadcrumb-item"><a href="#">Men</a></li>
						<li class="breadcrumb-item active" aria-current="page">Accessories</li>
					</ol>
				</div>
			</nav>

			<div class="container mb-3">
				<div class="row products-group ml-0 mr-0">
					<div class="main-content w-100">
						<nav class="toolbox horizontal-filter filter-sorts sticky-header"
							data-sticky-options="{'mobile': true}">
							<div class="sidebar-overlay d-lg-none"></div>
							<a href="#" class="sidebar-toggle border-0"><svg data-name="Layer 3" id="Layer_3"
									viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
									<line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
									<line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
									<line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
									<line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
									<line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
									<line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
									<path d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z"
										class="cls-2"></path>
									<path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
									<path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
									<path
										d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z"
										class="cls-2"></path>
								</svg>
								<span>Filter</span>
							</a>

							<aside class="toolbox-left sidebar-shop mobile-sidebar">
								<div class="toolbox-item toolbox-sort select-custom">
									<a class="sort-menu-trigger" href="#">SIZE</a>
									<ul class="sort-list">
										<li><a href="#">EXTRA LARGE</a></li>
										<li><a href="#">LARGE</a></li>
										<li><a href="#">MEDIUM</a></li>
										<li><a href="#">SMALL</a></li>
									</ul>
								</div>
								<!-- End .toolbox-item -->

								<div class="toolbox-item toolbox-sort select-custom">
									<a class="sort-menu-trigger" href="#">COLOR</a>
									<ul class="sort-list">
										<li><a href="#">BLACK</a></li>
										<li><a href="#">BLUE</a></li>
										<li><a href="#">BROWN</a></li>
										<li><a href="#">GREEN</a></li>
										<li><a href="#">INDIGO</a></li>
										<li><a href="#">LIGHT BLUE</a></li>
										<li><a href="#">RED</a></li>
										<li><a href="#">YELLOW</a></li>
									</ul>
								</div>
								<!-- End .toolbox-item -->

								<div class="toolbox-item toolbox-sort price-sort select-custom">
									<a class="sort-menu-trigger" href="#">PRICE</a>
									<div class="sort-list">
										<form class="filter-price-form d-flex align-items-center m-0">
											<input class="input-price mr-2" name="min_price" placeholder="55" /> -
											<input class="input-price mx-2" name="max_price" placeholder="111" />
											<button type="submit" class="btn btn-primary ml-3">Filter</button>
										</form>
									</div>
								</div>
								<!-- End .toolbox-item -->
							</aside>
							<!-- End .toolbox-left -->


							<div class="toolbox-item toolbox-sort select-custom">
								<select name="orderby" class="form-control">
									<option value="menu_order" selected="selected">DEFAULT SORTING</option>
									<option value="popularity">SORT BY POPULARITY</option>
									<option value="rating">SORT BY AVERAGE RATING</option>
									<option value="date">SORT BY NEWNESS</option>
									<option value="price">SORT BY PRICE: LOW TO HIGH</option>
									<option value="price-desc">SORT BY PRICE: HIGH TO LOW</option>
								</select>
							</div>
							<!-- End .toolbox-item -->

							<div class="toolbox-item toolbox-show ml-auto">
								<label>Show:</label>

								<div class="select-custom">
									<select name="count" class="form-control">
										<option value="10">10</option>
										<option value="20">20</option>
										<option value="30">30</option>
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
						</nav>

						<div class="row">
							<div class="product-default inner-quickview inner-icon col-xl-5col col-lg-3 col-md-4 col-6">
								<figure>
									<a href="/porto/demo10-product.html">
										<img src="/porto/assets/images/demoes/demo10/products/home/product-1.jpg" alt="product"
											width="400" height="400" />
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
											<a href="/porto/demo10-shop.html" class="product-category">DRESS</a>,
											<a href="/porto/demo10-shop.html" class="product-category">T-SHIRTS</a>
										</div>

										<a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
												class="icon-heart"></i></a>
									</div>

									<h3 class="product-title"> <a href="/porto/demo10-product.html">Lucky Emmie Ballet Flat</a>
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
							<!-- End .product-default -->

							<div class="product-default inner-quickview inner-icon col-xl-5col col-lg-3 col-md-4 col-6">
								<figure>
									<a href="/porto/demo10-product.html">
										<img src="/porto/assets/images/demoes/demo10/products/home/product-2.jpg" alt="product"
											width="400" height="400" />
										<img src="/porto/assets/images/demoes/demo10/products/home/product-2-2.jpg"
											alt="product" width="400" height="400" />
									</a>

									<div class="btn-icon-group">
										<a href="/porto/demo10-product.html" class="btn-icon btn-add-cart"><i
												class="fa fa-arrow-right"></i>
										</a>
									</div>

									<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
										title="Quick View">Quick
										View</a>
								</figure>

								<div class="product-details">
									<div class="category-wrap">
										<div class="category-list">
											<a href="/porto/demo10-shop.html" class="product-category">TOYS</a>,
											<a href="/porto/demo10-shop.html" class="product-category">WATCHES</a>
										</div>

										<a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
												class="icon-heart"></i></a>
									</div>

									<h3 class="product-title"> <a href="/porto/demo10-product.html">Silver Porto Headset</a>
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
										<span class="product-price">$149.00</span>
									</div>
									<!-- End .price-box -->
								</div>
								<!-- End .product-details -->
							</div>
							<!-- End .product-default -->

							<div class="product-default inner-quickview inner-icon col-xl-5col col-lg-3 col-md-4 col-6">
								<figure>
									<a href="/porto/demo10-product.html">
										<img src="/porto/assets/images/demoes/demo10/products/home/product-3.jpg" alt="product"
											width="400" height="400" />
									</a>

									<div class="btn-icon-group">
										<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
												class="icon-shopping-cart"></i></a>
									</div>

									<div class="label-group">
										<span class="product-label label-hot">HOT</span>
									</div>

									<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
										title="Quick View">Quick
										View</a>
								</figure>

								<div class="product-details">
									<div class="category-wrap">
										<div class="category-list">
											<a href="/porto/demo10-shop.html" class="product-category">DRESS</a>,
											<a href="/porto/demo10-shop.html" class="product-category">T-SHIRTS</a>
										</div>

										<a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
												class="icon-heart"></i></a>
									</div>

									<h3 class="product-title"> <a href="/porto/demo10-product.html">Black Watch</a> </h3>

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
										<span class="product-price">$89.00</span>
									</div>
									<!-- End .price-box -->
								</div>
								<!-- End .product-details -->
							</div>
							<!-- End .product-default -->

							<div class="product-default inner-quickview inner-icon col-xl-5col col-lg-3 col-md-4 col-6">
								<figure>
									<a href="/porto/demo10-product.html">
										<img src="/porto/assets/images/demoes/demo10/products/home/product-4.jpg" alt="product"
											width="400" height="400" />
										<img src="/porto/assets/images/demoes/demo10/products/home/product-4-2.jpg"
											alt="product" width="400" height="400" />
									</a>

									<div class="btn-icon-group">
										<a href="/porto/demo10-product.html" class="btn-icon btn-add-cart"><i
												class="fa fa-arrow-right"></i>
										</a>
									</div>

									<div class="label-group">
										<span class="product-label label-hot">HOT</span>
									</div>

									<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
										title="Quick View">Quick
										View</a>
								</figure>

								<div class="product-details">
									<div class="category-wrap">
										<div class="category-list">
											<a href="/porto/demo10-shop.html" class="product-category">DRESS</a>,
											<a href="/porto/demo10-shop.html" class="product-category">WATCHES</a>
										</div>

										<a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
												class="icon-heart"></i></a>
									</div>

									<h3 class="product-title"> <a href="/porto/demo10-product.html">Porto Black Shoes</a> </h3>

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
										<span class="product-price">$101.00 - $108.00</span>
									</div>
									<!-- End .price-box -->
								</div>
								<!-- End .product-details -->
							</div>
							<!-- End .product-default -->

							<div class="product-default inner-quickview inner-icon col-xl-5col col-lg-3 col-md-4 col-6">
								<figure>
									<a href="/porto/demo10-product.html">
										<img src="/porto/assets/images/demoes/demo10/products/home/product-5.jpg" alt="product"
											width="400" height="400" />
										<img src="/porto/assets/images/demoes/demo10/products/home/product-5-2.jpg"
											alt="product" width="400" height="400" />
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
											<a href="/porto/demo10-shop.html" class="product-category">SHOES</a>,
											<a href="/porto/demo10-shop.html" class="product-category">WATCHES</a>
										</div>

										<a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
												class="icon-heart"></i></a>
									</div>

									<h3 class="product-title"> <a href="/porto/demo10-product.html">Product Black Bag</a> </h3>

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
										<span class="product-price">$229.00</span>
									</div>
									<!-- End .price-box -->
								</div>
								<!-- End .product-details -->
							</div>
							<!-- End .product-default -->

							<div class="product-default inner-quickview inner-icon col-xl-5col col-lg-3 col-md-4 col-6">
								<figure>
									<a href="/porto/demo10-product.html">
										<img src="/porto/assets/images/demoes/demo10/products/home/product-6.jpg" alt="product"
											width="400" height="400" />
										<img src="/porto/assets/images/demoes/demo10/products/home/product-6-2.jpg"
											alt="product" width="400" height="400" />
									</a>

									<div class="btn-icon-group">
										<a href="/porto/demo10-product.html" class="btn-icon btn-add-cart"><i
												class="fa fa-arrow-right"></i>
										</a>
									</div>

									<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
										title="Quick View">Quick
										View</a>
								</figure>

								<div class="product-details">
									<div class="category-wrap">
										<div class="category-list">
											<a href="/porto/demo10-shop.html" class="product-category">SHOES</a>,
											<a href="/porto/demo10-shop.html" class="product-category">WATCHES</a>
										</div>

										<a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
												class="icon-heart"></i></a>
									</div>

									<h3 class="product-title"> <a href="/porto/demo10-product.html">Porto Black Glasses</a>
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
										<span class="product-price">$39.00</span>
									</div>
									<!-- End .price-box -->
								</div>
								<!-- End .product-details -->
							</div>
							<!-- End .product-default -->

							<div class="product-default inner-quickview inner-icon col-xl-5col col-lg-3 col-md-4 col-6">
								<figure>
									<a href="/porto/demo10-product.html">
										<img src="/porto/assets/images/demoes/demo10/products/home/product-12.jpg"
											alt="product" width="400" height="400" />
										<img src="/porto/assets/images/demoes/demo10/products/home/product-12-2.jpg"
											alt="product" width="400" height="400" />
									</a>

									<div class="btn-icon-group">
										<a href="/porto/demo10-product.html" class="btn-icon btn-add-cart"><i
												class="fa fa-arrow-right"></i>
										</a>
									</div>

									<div class="label-group">
										<span class="product-label label-hot">HOT</span>
									</div>

									<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
										title="Quick View">Quick
										View</a>
								</figure>

								<div class="product-details">
									<div class="category-wrap">
										<div class="category-list">
											<a href="/porto/demo10-shop.html" class="product-category">SHOES</a>,
											<a href="/porto/demo10-shop.html" class="product-category">TOYS</a>
										</div>

										<a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
												class="icon-heart"></i></a>
									</div>

									<h3 class="product-title"> <a href="/porto/demo10-product.html">Lucky Bag</a> </h3>

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
							<!-- End .product-default -->

							<div class="product-default inner-quickview inner-icon col-xl-5col col-lg-3 col-md-4 col-6">
								<figure>
									<a href="/porto/demo10-product.html">
										<img src="/porto/assets/images/demoes/demo10/products/home/product-7.jpg" alt="product"
											width="400" height="400" />
									</a>

									<div class="btn-icon-group">
										<a href="#" class="btn-icon btn-add-cart product-type-simple"><i
												class="icon-shopping-cart"></i></a>
									</div>

									<div class="label-group">
										<span class="product-label label-sale">-15%</span>
									</div>

									<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
										title="Quick View">Quick
										View</a>
								</figure>

								<div class="product-details">
									<div class="category-wrap">
										<div class="category-list">
											<a href="/porto/demo10-shop.html" class="product-category">SHOES</a>,
											<a href="/porto/demo10-shop.html" class="product-category">TOYS</a>
										</div>

										<a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
												class="icon-heart"></i></a>
									</div>

									<h3 class="product-title"> <a href="/porto/demo10-product.html">Men Shoes</a> </h3>

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
										<span class="old-price">$1,999.00</span>
										<span class="product-price">$1,699.00</span>
									</div>
									<!-- End .price-box -->
								</div>
								<!-- End .product-details -->
							</div>
							<!-- End .product-default -->

							<div class="product-default inner-quickview inner-icon col-xl-5col col-lg-3 col-md-4 col-6">
								<figure>
									<a href="/porto/demo10-product.html">
										<img src="/porto/assets/images/demoes/demo10/products/home/product-8.jpg" alt="product"
											width="400" height="400" />
										<img src="/porto/assets/images/demoes/demo10/products/home/product-7.jpg" alt="product"
											width="400" height="400" />
									</a>

									<div class="btn-icon-group">
										<a href="/porto/demo10-product.html" class="btn-icon btn-add-cart"><i
												class="fa fa-arrow-right"></i>
										</a>
									</div>

									<a href="/porto/ajax/product-quick-view.html" class="btn-quickview"
										title="Quick View">Quick
										View</a>
								</figure>

								<div class="product-details">
									<div class="category-wrap">
										<div class="category-list">
											<a href="/porto/demo10-shop.html" class="product-category">SHOES</a>,
											<a href="/porto/demo10-shop.html" class="product-category">TOYS</a>
										</div>

										<a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
												class="icon-heart"></i></a>
									</div>

									<h3 class="product-title"> <a href="/porto/demo10-product.html">Porto Sports Shoes</a>
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
										<span class="product-price">$101.00 - $111.00</span>
									</div>
									<!-- End .price-box -->
								</div>
								<!-- End .product-details -->
							</div>
							<!-- End .product-default -->

							<div class="product-default inner-quickview inner-icon col-xl-5col col-lg-3 col-md-4 col-6">
								<figure>
									<a href="/porto/demo10-product.html">
										<img src="/porto/assets/images/demoes/demo10/products/home/product-9.jpg" alt="product"
											width="400" height="400" />
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
											<a href="/porto/demo10-shop.html" class="product-category">DRESS</a>,
											<a href="/porto/demo10-shop.html" class="product-category">SHOES</a>
										</div>

										<a href="/porto/wishlist.html" title="Wishlist" class="btn-icon-wish"><i
												class="icon-heart"></i></a>
									</div>

									<h3 class="product-title"> <a href="/porto/demo10-product.html">Men's Quartz</a> </h3>

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
							<!-- End .product-default -->
						</div>
						<!-- End .row -->
						<nav class="toolbox toolbox-pagination">
							<div class="toolbox-item toolbox-show">
								<label>Show:</label>

								<div class="select-custom">
									<select name="count" class="form-control">
										<option value="10">10</option>
										<option value="20">20</option>
										<option value="30">30</option>
									</select>
								</div>
								<!-- End .select-custom -->
							</div>
							<!-- End .toolbox-item -->

							<ul class="pagination toolbox-item">
								<li class="page-item disabled">
									<a class="page-link page-link-btn" href="#"><i class="icon-angle-left"></i></a>
								</li>
								<li class="page-item active">
									<a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
								</li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item"><span class="page-link">...</span></li>
								<li class="page-item">
									<a class="page-link page-link-btn" href="#"><i class="icon-angle-right"></i></a>
								</li>
							</ul>
						</nav>
					</div>
					<!-- End .col-lg-9 -->
				</div>
				<!-- End .row -->
			</div>
			<!-- End .container -->
@section('footer')
    @include('porto.demo10.footer')
@endsection

@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
