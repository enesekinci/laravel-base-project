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
								<li class="breadcrumb-item active" aria-current="page">Accordions</li>
							</ol>
						</nav>
						<h1 class="page-title text-center text-white">Accordions</h1>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="mt-8" id="accordion1">
					<h3>Default</h3>
					<div class="card card-accordion">
						<a class="card-header" href="#" data-toggle="collapse" data-target="#collapse1"
							aria-expanded="true" aria-controls="collapse1">
							First Header
						</a>

						<div id="collapse1" class="collapse show" data-parent="#accordion1">
							<p>Lorem ipsum dolor sit amet, consectetur
								adipiscing elit. Curabitur eget leo at velit
								imperdiet varius. In eu ipsum vitae velit
								congue iaculis vitae at risus. Nullam tortor
								nunc, bibendum vitae semper a, volutpat eget
								massa.</p>
						</div>
					</div>

					<div class="card card-accordion">
						<a class="card-header collapsed" href="#" data-toggle="collapse" data-target="#collapse2"
							aria-expanded="true" aria-controls="collapse2">
							Second Header
						</a>

						<div id="collapse2" class="collapse" data-parent="#accordion1">
							<p>Lorem ipsum dolor sit amet, consectetur
								adipiscing elit. Curabitur eget leo at velit
								imperdiet varius. In eu ipsum vitae velit
								congue iaculis vitae at risus. Nullam tortor
								nunc, bibendum vitae semper a, volutpat eget
								massa. Lorem ipsum dolor sit amet,
								consectetur adipiscing elit. Integer
								fringilla, orci sit amet posuere auctor,
								orci eros pellentesque odio, nec
								pellentesque erat ligula nec massa. Aenean
								consequat lorem ut felis ullamcorper posuere
								gravida tellus faucibus. Maecenas dolor
								elit, pulvinar eu vehicula eu, consequat et
								lacus. Duis et purus ipsum. In auctor mattis
								ipsum id molestie. Donec risus nulla,
								fringilla a rhoncus vitae, semper a massa.
								Vivamus ullamcorper, enim sit amet consequat
								laoreet, tortor tortor dictum urna, ut
								egestas urna ipsum nec libero. Nulla justo
								leo, molestie vel tempor nec, egestas at
								massa. Aenean pulvinar, felis porttitor
								iaculis pulvinar, odio orci sodales odio, ac
								pulvinar felis quam sit.</p>
						</div>
					</div>

					<div class="card card-accordion">
						<a class="card-header collapsed" href="#" data-toggle="collapse" data-target="#collapse3"
							aria-expanded="true" aria-controls="collapse3">
							Third Header
						</a>

						<div id="collapse3" class="collapse" data-parent="#accordion1">
							<p>Lorem ipsum dolor sit amet, consectetur
								adipiscing elit. Curabitur eget leo at velit
								imperdiet varius. In eu ipsum vitae velit
								congue iaculis vitae at risus. Nullam tortor
								nunc, bibendum vitae semper a, volutpat eget
								massa.</p>
						</div>
					</div>
				</div>

				<div class="mt-8" id="accordion2">
					<h3>Boxed Style</h3>
					<div class="card card-accordion accordion-boxed">
						<a class="card-header" href="#" data-toggle="collapse" data-target="#collapse4"
							aria-expanded="true" aria-controls="collapse4">
							First Header
						</a>

						<div id="collapse4" class="collapse show" data-parent="#accordion2">
							<p>Lorem ipsum dolor sit amet, consectetur
								adipiscing elit. Curabitur eget leo at velit
								imperdiet varius. In eu ipsum vitae velit
								congue iaculis vitae at risus. Nullam tortor
								nunc, bibendum vitae semper a, volutpat eget
								massa.</p>
						</div>
					</div>

					<div class="card card-accordion accordion-boxed">
						<a class="card-header collapsed" href="#" data-toggle="collapse" data-target="#collapse5"
							aria-expanded="true" aria-controls="collapse5">
							Second Header
						</a>

						<div id="collapse5" class="collapse" data-parent="#accordion2">
							<p>Lorem ipsum dolor sit amet, consectetur
								adipiscing elit. Curabitur eget leo at velit
								imperdiet varius. In eu ipsum vitae velit
								congue iaculis vitae at risus. Nullam tortor
								nunc, bibendum vitae semper a, volutpat eget
								massa. Lorem ipsum dolor sit amet,
								consectetur adipiscing elit. Integer
								fringilla, orci sit amet posuere auctor,
								orci eros pellentesque odio, nec
								pellentesque erat ligula nec massa. Aenean
								consequat lorem ut felis ullamcorper posuere
								gravida tellus faucibus. Maecenas dolor
								elit, pulvinar eu vehicula eu, consequat et
								lacus. Duis et purus ipsum. In auctor mattis
								ipsum id molestie. Donec risus nulla,
								fringilla a rhoncus vitae, semper a massa.
								Vivamus ullamcorper, enim sit amet consequat
								laoreet, tortor tortor dictum urna, ut
								egestas urna ipsum nec libero. Nulla justo
								leo, molestie vel tempor nec, egestas at
								massa. Aenean pulvinar, felis porttitor
								iaculis pulvinar, odio orci sodales odio, ac
								pulvinar felis quam sit.</p>
						</div>
					</div>

					<div class="card card-accordion accordion-boxed">
						<a class="card-header collapsed" href="#" data-toggle="collapse" data-target="#collapse6"
							aria-expanded="true" aria-controls="collapse6">
							Third Header
						</a>

						<div id="collapse6" class="collapse" data-parent="#accordion2">
							<p>Lorem ipsum dolor sit amet, consectetur
								adipiscing elit. Curabitur eget leo at velit
								imperdiet varius. In eu ipsum vitae velit
								congue iaculis vitae at risus. Nullam tortor
								nunc, bibendum vitae semper a, volutpat eget
								massa.</p>
						</div>
					</div>
				</div>

				<div class="mt-8" id="accordion3">
					<h3>With Icons</h3>
					<div class="card card-accordion accordion-boxed">
						<a class="card-header" href="#" data-toggle="collapse" data-target="#collapse7"
							aria-expanded="true" aria-controls="collapse7">
							<i class="fa fa-users"></i> First Header
						</a>

						<div id="collapse7" class="collapse show" data-parent="#accordion3">
							<p>Lorem ipsum dolor sit amet, consectetur
								adipiscing elit. Curabitur eget leo at velit
								imperdiet varius. In eu ipsum vitae velit
								congue iaculis vitae at risus. Nullam tortor
								nunc, bibendum vitae semper a, volutpat eget
								massa.</p>
						</div>
					</div>

					<div class="card card-accordion accordion-boxed">
						<a class="card-header collapsed" href="#" data-toggle="collapse" data-target="#collapse8"
							aria-expanded="true" aria-controls="collapse8">
							<i class="fa fa-film"></i>Second Header
						</a>

						<div id="collapse8" class="collapse" data-parent="#accordion3">
							<p>Lorem ipsum dolor sit amet, consectetur
								adipiscing elit. Curabitur eget leo at velit
								imperdiet varius. In eu ipsum vitae velit
								congue iaculis vitae at risus. Nullam tortor
								nunc, bibendum vitae semper a, volutpat eget
								massa. Lorem ipsum dolor sit amet,
								consectetur adipiscing elit. Integer
								fringilla, orci sit amet posuere auctor,
								orci eros pellentesque odio, nec
								pellentesque erat ligula nec massa. Aenean
								consequat lorem ut felis ullamcorper posuere
								gravida tellus faucibus. Maecenas dolor
								elit, pulvinar eu vehicula eu, consequat et
								lacus. Duis et purus ipsum. In auctor mattis
								ipsum id molestie. Donec risus nulla,
								fringilla a rhoncus vitae, semper a massa.
								Vivamus ullamcorper, enim sit amet consequat
								laoreet, tortor tortor dictum urna, ut
								egestas urna ipsum nec libero. Nulla justo
								leo, molestie vel tempor nec, egestas at
								massa. Aenean pulvinar, felis porttitor
								iaculis pulvinar, odio orci sodales odio, ac
								pulvinar felis quam sit.</p>
						</div>
					</div>

					<div class="card card-accordion accordion-boxed">
						<a class="card-header collapsed" href="#" data-toggle="collapse" data-target="#collapse9"
							aria-expanded="true" aria-controls="collapse9">
							<i class="fa fa-bars"></i>Third Header
						</a>

						<div id="collapse9" class="collapse" data-parent="#accordion3">
							<p>Lorem ipsum dolor sit amet, consectetur
								adipiscing elit. Curabitur eget leo at velit
								imperdiet varius. In eu ipsum vitae velit
								congue iaculis vitae at risus. Nullam tortor
								nunc, bibendum vitae semper a, volutpat eget
								massa.</p>
						</div>
					</div>
				</div>

				<div class="mt-8 mb-8" id="accordion4">
					<h3>Colored Style</h3>
					<div class="card card-accordion accordion-boxed">
						<a class="card-header bg-primary text-white" href="#" data-toggle="collapse"
							data-target="#collapse10" aria-expanded="true" aria-controls="collapse10">
							First Header
						</a>

						<div id="collapse10" class="collapse show" data-parent="#accordion4">
							<p>Lorem ipsum dolor sit amet, consectetur
								adipiscing elit. Curabitur eget leo at velit
								imperdiet varius. In eu ipsum vitae velit
								congue iaculis vitae at risus. Nullam tortor
								nunc, bibendum vitae semper a, volutpat eget
								massa.</p>
						</div>
					</div>

					<div class="card card-accordion accordion-boxed">
						<a class="card-header collapsed bg-info text-white" href="#" data-toggle="collapse"
							data-target="#collapse11" aria-expanded="true" aria-controls="collapse11">
							Second Header
						</a>

						<div id="collapse11" class="collapse" data-parent="#accordion4">
							<p>Lorem ipsum dolor sit amet, consectetur
								adipiscing elit. Curabitur eget leo at velit
								imperdiet varius. In eu ipsum vitae velit
								congue iaculis vitae at risus. Nullam tortor
								nunc, bibendum vitae semper a, volutpat eget
								massa. Lorem ipsum dolor sit amet,
								consectetur adipiscing elit. Integer
								fringilla, orci sit amet posuere auctor,
								orci eros pellentesque odio, nec
								pellentesque erat ligula nec massa. Aenean
								consequat lorem ut felis ullamcorper posuere
								gravida tellus faucibus. Maecenas dolor
								elit, pulvinar eu vehicula eu, consequat et
								lacus. Duis et purus ipsum. In auctor mattis
								ipsum id molestie. Donec risus nulla,
								fringilla a rhoncus vitae, semper a massa.
								Vivamus ullamcorper, enim sit amet consequat
								laoreet, tortor tortor dictum urna, ut
								egestas urna ipsum nec libero. Nulla justo
								leo, molestie vel tempor nec, egestas at
								massa. Aenean pulvinar, felis porttitor
								iaculis pulvinar, odio orci sodales odio, ac
								pulvinar felis quam sit.</p>
						</div>
					</div>

					<div class="card card-accordion accordion-boxed">
						<a class="card-header collapsed bg-success text-white" href="#" data-toggle="collapse"
							data-target="#collapse12" aria-expanded="true" aria-controls="collapse12">
							Third Header
						</a>

						<div id="collapse12" class="collapse" data-parent="#accordion4">
							<p>Lorem ipsum dolor sit amet, consectetur
								adipiscing elit. Curabitur eget leo at velit
								imperdiet varius. In eu ipsum vitae velit
								congue iaculis vitae at risus. Nullam tortor
								nunc, bibendum vitae semper a, volutpat eget
								massa.</p>
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
