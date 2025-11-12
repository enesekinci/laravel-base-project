@extends('layouts.porto')

@section('top-notice')
    @include('porto.demo4.top-notice')
@endsection

@section('header')
    @include('porto.demo4.header')
@endsection

	<div class="page-wrapper">
		<!-- End .container -->
		</div><!-- End .top-notice -->

		<!-- End .header -->

		@section('content')

			<div class="page-header page-header-bg text-left"
				style="background: 50%/cover #D4E1EA url('assets/images/page-header-bg.jpg');">
				<div class="container">
					<h1><span>ABOUT US</span>
						OUR COMPANY</h1>
					<a href="/porto/contact.html" class="btn btn-dark">Contact</a>
				</div><!-- End .container -->
			</div><!-- End .page-header -->

			<nav aria-label="breadcrumb" class="breadcrumb-nav">
				<div class="container">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="/porto/demo4.html"><i class="icon-home"></i></a></li>
						<li class="breadcrumb-item active" aria-current="page">About Us</li>
					</ol>
				</div><!-- End .container -->
			</nav>

			<div class="about-section">
				<div class="container">
					<h2 class="subtitle">OUR STORY</h2>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
						the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
						of type and scrambled it to make a type specimen book. It has survived not only five centuries,
						but also the leap into electronic typesetting, remaining essentially unchanged.</p>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
						the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
						of type and scrambled it to make a type specimen book.</p>

					<p class="lead">“ Many desktop publishing packages and web page editors now use Lorem Ipsum as their
						default model search for evolved over sometimes by accident, sometimes on purpose ”</p>
				</div><!-- End .container -->
			</div><!-- End .about-section -->

			<div class="features-section bg-gray">
				<div class="container">
					<h2 class="subtitle">WHY CHOOSE US</h2>
					<div class="row">
						<div class="col-lg-4">
							<div class="feature-box bg-white">
								<i class="icon-shipped"></i>

								<div class="feature-box-content p-0">
									<h3>Free Shipping</h3>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
										Ipsum has been the industr.</p>
								</div><!-- End .feature-box-content -->
							</div><!-- End .feature-box -->
						</div><!-- End .col-lg-4 -->

						<div class="col-lg-4">
							<div class="feature-box bg-white">
								<i class="icon-us-dollar"></i>

								<div class="feature-box-content p-0">
									<h3>100% Money Back Guarantee</h3>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
										Ipsum has been the industr.</p>
								</div><!-- End .feature-box-content -->
							</div><!-- End .feature-box -->
						</div><!-- End .col-lg-4 -->

						<div class="col-lg-4">
							<div class="feature-box bg-white">
								<i class="icon-online-support"></i>

								<div class="feature-box-content p-0">
									<h3>Online Support 24/7</h3>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
										Ipsum has been the industr.</p>
								</div><!-- End .feature-box-content -->
							</div><!-- End .feature-box -->
						</div><!-- End .col-lg-4 -->
					</div><!-- End .row -->
				</div><!-- End .container -->
			</div><!-- End .features-section -->

			<div class="testimonials-section">
				<div class="container">
					<h2 class="subtitle text-center">HAPPY CLIENTS</h2>

					<div class="testimonials-carousel owl-carousel owl-theme images-left" data-owl-options="{
						'margin': 20,
                        'lazyLoad': true,
                        'autoHeight': true,
                        'dots': false,
                        'responsive': {
                            '0': {
                                'items': 1
                            },
                            '992': {
                                'items': 2
                            }
                        }
                    }">
						<div class="testimonial">
							<div class="testimonial-owner">
								<figure>
									<img src="/porto/assets/images/clients/client1.png" alt="client">
								</figure>

								<div>
									<strong class="testimonial-title">John Smith</strong>
									<span>SMARTWAVE CEO</span>
								</div>
							</div><!-- End .testimonial-owner -->

							<blockquote>
								<p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mipsum
									dolor sit amet, consectetur elitad adipiscing cas non placerat mi.</p>
							</blockquote>
						</div><!-- End .testimonial -->

						<div class="testimonial">
							<div class="testimonial-owner">
								<figure>
									<img src="/porto/assets/images/clients/client2.png" alt="client">
								</figure>

								<div>
									<strong class="testimonial-title">Bob Smith</strong>
									<span>SMARTWAVE CEO</span>
								</div>
							</div><!-- End .testimonial-owner -->

							<blockquote>
								<p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mipsum
									dolor sit amet, consectetur elitad adipiscing cas non placerat mi.</p>
							</blockquote>
						</div><!-- End .testimonial -->

						<div class="testimonial">
							<div class="testimonial-owner">
								<figure>
									<img src="/porto/assets/images/clients/client1.png" alt="client">
								</figure>

								<div>
									<strong class="testimonial-title">John Smith</strong>
									<span>SMARTWAVE CEO</span>
								</div>
							</div><!-- End .testimonial-owner -->

							<blockquote>
								<p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mipsum
									dolor sit amet, consectetur elitad adipiscing cas non placerat mi.</p>
							</blockquote>
						</div><!-- End .testimonial -->
					</div><!-- End .testimonials-slider -->
				</div><!-- End .container -->
			</div><!-- End .testimonials-section -->

			<div class="counters-section bg-gray">
				<div class="container">
					<div class="row">
						<div class="col-6 col-md-4 count-container">
							<div class="count-wrapper">
								<span class="count-to" data-from="0" data-to="200" data-speed="2000"
									data-refresh-interval="50">200</span>+
							</div><!-- End .count-wrapper -->
							<h4 class="count-title">MILLION CUSTOMERS</h4>
						</div><!-- End .col-md-4 -->

						<div class="col-6 col-md-4 count-container">
							<div class="count-wrapper">
								<span class="count-to" data-from="0" data-to="1800" data-speed="2000"
									data-refresh-interval="50">1800</span>+
							</div><!-- End .count-wrapper -->
							<h4 class="count-title">TEAM MEMBERS</h4>
						</div><!-- End .col-md-4 -->

						<div class="col-6 col-md-4 count-container">
							<div class="count-wrapper line-height-1">
								<span class="count-to" data-from="0" data-to="24" data-speed="2000"
									data-refresh-interval="50">24</span><span>HR</span>
							</div><!-- End .count-wrapper -->
							<h4 class="count-title">SUPPORT AVAILABLE</h4>
						</div><!-- End .col-md-4 -->

						<div class="col-6 col-md-4 count-container">
							<div class="count-wrapper">
								<span class="count-to" data-from="0" data-to="265" data-speed="2000"
									data-refresh-interval="50">265</span>+
							</div><!-- End .count-wrapper -->
							<h4 class="count-title">SUPPORT AVAILABLE</h4>
						</div><!-- End .col-md-4 -->

						<div class="col-6 col-md-4 count-container">
							<div class="count-wrapper line-height-1">
								<span class="count-to" data-from="0" data-to="99" data-speed="2000"
									data-refresh-interval="50">99</span><span>%</span>
							</div><!-- End .count-wrapper -->
							<h4 class="count-title">SUPPORT AVAILABLE</h4>
						</div><!-- End .col-md-4 -->
					</div><!-- End .row -->
				</div><!-- End .container -->
			</div><!-- End .counters-section -->
		
@endsection<!-- End .main -->

		<!-- End .footer -->
	</div><!-- End .page-wrapper -->

	<div class="loading-overlay">
		<div class="bounce-loader">
			<div class="bounce1"></div>
			<div class="bounce2"></div>
			<div class="bounce3"></div>
		</div>
	</div>

	<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

	<div class="mobile-menu-container">
		<div class="mobile-menu-wrapper">
			<span class="mobile-menu-close"><i class="fa fa-times"></i></span>
			<nav class="mobile-nav">
				<ul class="mobile-menu">
					<li><a href="/porto/demo4.html">Home</a></li>
					<li>
						<a href="/porto/category.html">Categories</a>
						<ul>
							<li><a href="/porto/category.html">Full Width Banner</a></li>
							<li><a href="/porto/category-banner-boxed-slider.html">Boxed Slider Banner</a></li>
							<li><a href="/porto/category-banner-boxed-image.html">Boxed Image Banner</a></li>
							<li><a href="/porto/category-sidebar-left.html">Left Sidebar</a></li>
							<li><a href="/porto/category-sidebar-right.html">Right Sidebar</a></li>
							<li><a href="/porto/category-off-canvas.html">Off Canvas Filter</a></li>
							<li><a href="/porto/category-horizontal-filter1.html">Horizontal Filter 1</a></li>
							<li><a href="/porto/category-horizontal-filter2.html">Horizontal Filter 2</a></li>
							<li><a href="#">List Types</a></li>
							<li><a href="/porto/category-infinite-scroll.html">Ajax Infinite Scroll<span
										class="tip tip-new">New</span></a></li>
							<li><a href="/porto/category.html">3 Columns Products</a></li>
							<li><a href="/porto/category-4col.html">4 Columns Products</a></li>
							<li><a href="/porto/category-5col.html">5 Columns Products</a></li>
							<li><a href="/porto/category-6col.html">6 Columns Products</a></li>
							<li><a href="/porto/category-7col.html">7 Columns Products</a></li>
							<li><a href="/porto/category-8col.html">8 Columns Products</a></li>
						</ul>
					</li>
					<li>
						<a href="/porto/product.html">Products</a>
						<ul>
							<li>
								<a href="#" class="nolink">PRODUCT PAGES</a>
								<ul>
									<li><a href="/porto/product.html">SIMPLE PRODUCT</a></li>
									<li><a href="/porto/product-variable.html">VARIABLE PRODUCT</a></li>
									<li><a href="/porto/product.html">SALE PRODUCT</a></li>
									<li><a href="/porto/product.html">FEATURED & ON SALE</a></li>
									<li><a href="/porto/product-sticky-info.html">WIDTH CUSTOM TAB</a></li>
									<li><a href="/porto/product-sidebar-left.html">WITH LEFT SIDEBAR</a></li>
									<li><a href="/porto/product-sidebar-right.html">WITH RIGHT SIDEBAR</a></li>
									<li><a href="/porto/product-addcart-sticky.html">ADD CART STICKY</a></li>
								</ul>
							</li>
							<li>
								<a href="#" class="nolink">PRODUCT LAYOUTS</a>
								<ul>
									<li><a href="/porto/product-extended-layout.html">EXTENDED LAYOUT</a></li>
									<li><a href="/porto/product-grid-layout.html">GRID IMAGE</a></li>
									<li><a href="/porto/product-full-width.html">FULL WIDTH LAYOUT</a></li>
									<li><a href="/porto/product-sticky-info.html">STICKY INFO</a></li>
									<li><a href="/porto/product-sticky-both.html">LEFT & RIGHT STICKY</a></li>
									<li><a href="/porto/product-transparent-image.html">TRANSPARENT IMAGE</a></li>
									<li><a href="/porto/product-center-vertical.html">CENTER VERTICAL</a></li>
									<li><a href="#">BUILD YOUR OWN</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li>
						<a href="#">Pages<span class="tip tip-hot">Hot!</span></a>
						<ul>
							<li>
								<a href="/porto/wishlist.html">Wishlist</a>
							</li>
							<li>
								<a href="/porto/cart.html">Shopping Cart</a>
							</li>
							<li>
								<a href="/porto/checkout.html">Checkout</a>
							</li>
							<li>
								<a href="/porto/dashboard.html">Dashboard</a>
							</li>
							<li>
								<a href="/porto/login.html">Login</a>
							</li>
							<li>
								<a href="/porto/forgot-password.html">Forgot Password</a>
							</li>
						</ul>
					</li>
					                                <li><a href="/porto/blog.html">Blog</a></li>                                
                                <li><a href="#">Elements</a>
                        <ul class="custom-scrollbar">
                            <li><a href="/porto/element-accordions.html">Accordion</a></li>
                            <li><a href="/porto/element-alerts.html">Alerts</a></li>
                            <li><a href="/porto/element-animations.html">Animations</a></li>
                            <li><a href="/porto/element-banners.html">Banners</a></li>
                            <li><a href="/porto/element-buttons.html">Buttons</a></li>
                            <li><a href="/porto/element-call-to-action.html">Call to Action</a></li>
                            <li><a href="/porto/element-countdown.html">Count Down</a></li>
                            <li><a href="/porto/element-counters.html">Counters</a></li>
                            <li><a href="/porto/element-headings.html">Headings</a></li>
                            <li><a href="/porto/element-icons.html">Icons</a></li>
                            <li><a href="/porto/element-info-box.html">Info box</a></li>
                            <li><a href="/porto/element-posts.html">Posts</a></li>
                            <li><a href="/porto/element-products.html">Products</a></li>
                            <li><a href="/porto/element-product-categories.html">Product Categories</a></li>
                            <li><a href="/porto/element-tabs.html">Tabs</a></li>
                            <li><a href="/porto/element-testimonial.html">Testimonials</a></li>
                        </ul>
					</li>
				</ul>

				<ul class="mobile-menu mt-2 mb-2">
					<li class="border-0">
						<a href="#">
							Special Offer!
						</a>
					</li>
					<li class="border-0">
						<a href="#" target="_blank">
							Buy Porto!
							<span class="tip tip-hot">Hot</span>
						</a>
					</li>
				</ul>

				<ul class="mobile-menu">
					<li><a href="/porto/login.html">My Account</a></li>
					<li><a href="/porto/contact.html">Contact Us</a></li>
					<li><a href="/porto/blog.html">Blog</a></li>
					<li><a href="/porto/wishlist.html">My Wishlist</a></li>
					<li><a href="/porto/cart.html">Cart</a></li>
					<li><a href="/porto/login.html" class="login-link">Log In</a></li>
				</ul>
			</nav><!-- End .mobile-nav -->

			<form class="search-wrapper mb-2" action="#">
				<input type="text" class="form-control mb-0" placeholder="{{ __('Search...') }}" required />
				<button class="btn icon-search text-white bg-transparent p-0" type="submit"></button>
			</form>

			<div class="social-icons">
				<a href="#" class="social-icon social-facebook icon-facebook" target="_blank">
				</a>
				<a href="#" class="social-icon social-twitter icon-twitter" target="_blank">
				</a>
				<a href="#" class="social-icon social-instagram icon-instagram" target="_blank">
				</a>
			</div>
		</div><!-- End .mobile-menu-wrapper -->
	</div><!-- End .mobile-menu-container -->

	<div class="sticky-navbar">
		<div class="sticky-info">
			<a href="/porto/demo4.html">
				<i class="icon-home"></i>Home
			</a>
		</div>
		<div class="sticky-info">
			<a href="/porto/category.html" class="">
				<i class="icon-bars"></i>Categories
			</a>
		</div>
		<div class="sticky-info">
			<a href="/porto/wishlist.html" class="">
				<i class="icon-wishlist-2"></i>Wishlist
			</a>
		</div>
		<div class="sticky-info">
			<a href="/porto/login.html" class="">
				<i class="icon-user-2"></i>Account
			</a>
		</div>
		<div class="sticky-info">
			<a href="/porto/cart.html" class="">
				<i class="icon-shopping-cart position-relative">
					<span class="cart-count badge-circle">3</span>
				</i>Cart
			</a>
		</div>
	</div>

	<a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

	<!-- Plugins JS File -->
	<script src="/porto/assets/js/jquery.min.js"></script>
	<script src="/porto/assets/js/bootstrap.bundle.min.js"></script>
	<script src="/porto/assets/js/plugins.min.js"></script>
	<script src="/porto/assets/js/plugins/jquery.countTo.js"></script>

	<!-- Main JS File -->
	<script src="/porto/assets/js/main.min.js"></script>