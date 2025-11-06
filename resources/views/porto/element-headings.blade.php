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
								<li class="breadcrumb-item active" aria-current="page">Headings</li>
							</ol>
						</nav>
						<h1 class="page-title text-center text-white">Headings</h1>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6 mt-8">
						<h1>Heading H1</h1>
						<h2>Heading H2</h2>
						<h3>Heading H3</h3>
						<h4>Heading H4</h4>
						<h5>Heading H5</h5>
						<h6>Heading H6</h6>
					</div>
					<div class="col-lg-3 col-md-6 mt-8 text-uppercase">
						<h1>Heading H1</h1>
						<h2>Heading H2</h2>
						<h3>Heading H3</h3>
						<h4>Heading H4</h4>
						<h5>Heading H5</h5>
						<h6>Heading H6</h6>
					</div>
					<div class="col-lg-3 col-md-6 mt-8">
						<h1 class="heading-bottom-border">Heading H1</h1>
						<h2 class="heading-bottom-border">Heading H2</h2>
						<h3 class="heading-bottom-border">Heading H3</h3>
						<h4 class="heading-bottom-border">Heading H4</h4>
						<h5 class="heading-bottom-border">Heading H5</h5>
						<h6 class="heading-bottom-border">Heading H6</h6>
					</div>
					<div class="col-lg-3 col-md-6 mt-8">
						<h1 class="heading-bottom-border double">Heading H1</h1>
						<h2 class="heading-bottom-border double">Heading H2</h2>
						<h3 class="heading-bottom-border double">Heading H3</h3>
						<h4 class="heading-bottom-border double">Heading H4</h4>
						<h5 class="heading-bottom-border double">Heading H5</h5>
						<h6 class="heading-bottom-border double">Heading H6</h6>
					</div>
				</div>

				<div class="mt-8">
					<h1 class="heading-middle-border left">Heading H1</h1>
					<h2 class="heading-middle-border left">Heading H2</h2>
					<h3 class="heading-middle-border left">Heading H3</h3>
					<h4 class="heading-middle-border left">Heading H4</h4>
					<h5 class="heading-middle-border left">Heading H5</h5>
					<h6 class="heading-middle-border left">Heading H6</h6>
				</div>

				<div class="mt-8">
					<h1 class="heading-middle-border right">Heading H1</h1>
					<h2 class="heading-middle-border right">Heading H2</h2>
					<h3 class="heading-middle-border right">Heading H3</h3>
					<h4 class="heading-middle-border right">Heading H4</h4>
					<h5 class="heading-middle-border right">Heading H5</h5>
					<h6 class="heading-middle-border right">Heading H6</h6>
				</div>

				<div class="mt-8">
					<h1 class="heading-middle-border left right">Heading H1</h1>
					<h2 class="heading-middle-border left right">Heading H2</h2>
					<h3 class="heading-middle-border left right">Heading H3</h3>
					<h4 class="heading-middle-border left right">Heading H4</h4>
					<h5 class="heading-middle-border left right">Heading H5</h5>
					<h6 class="heading-middle-border left right">Heading H6</h6>

					<h2 class="heading-middle-border left right mt-4">Heading H2</h2>
					<h2 class="heading-middle-border left right sm">Heading H2</h2>
					<h2 class="heading-middle-border left right md">Heading H2</h2>
					<h2 class="heading-middle-border left right lg">Heading H2</h2>
				</div>

				<div class="mt-8">
					<div class="row">
						<div class="col-5col-1 text-center">
							<h1>H1</h1>
							<h2>H2</h2>
							<h3>H3</h3>
							<h4>H4</h4>
							<h5>H5</h5>
							<h6>H6</h6>
						</div>
						<div class="col-5col-1 text-center">
							<h1 class="text-primary">H1</h1>
							<h2 class="text-primary">H2</h2>
							<h3 class="text-primary">H3</h3>
							<h4 class="text-primary">H4</h4>
							<h5 class="text-primary">H5</h5>
							<h6 class="text-primary">H6</h6>
						</div>
						<div class="col-5col-1 text-center">
							<h1 class="text-danger">H1</h1>
							<h2 class="text-danger">H2</h2>
							<h3 class="text-danger">H3</h3>
							<h4 class="text-danger">H4</h4>
							<h5 class="text-danger">H5</h5>
							<h6 class="text-danger">H6</h6>
						</div>
						<div class="col-5col-1 text-center">
							<h1 class="text-info">H1</h1>
							<h2 class="text-info">H2</h2>
							<h3 class="text-info">H3</h3>
							<h4 class="text-info">H4</h4>
							<h5 class="text-info">H5</h5>
							<h6 class="text-info">H6</h6>
						</div>
						<div class="col-5col-1 text-center">
							<h1 class="text-body">H1</h1>
							<h2 class="text-body">H2</h2>
							<h3 class="text-body">H3</h3>
							<h4 class="text-body">H4</h4>
							<h5 class="text-body">H5</h5>
							<h6 class="text-body">H6</h6>
						</div>
					</div>
				</div>

				<div class="mt-8">
					<div class="row">
						<div class="col-md-3">
							<h2 class="heading-bottom-border border-primary">Heading H2</h2>
							<h2 class="heading-bottom-border border-primary text-primary">Heading H2</h2>
						</div>
						<div class="col-md-3">
							<h2 class="heading-bottom-border border-danger">Heading H2</h2>
							<h2 class="heading-bottom-border border-danger text-danger">Heading H2</h2>
						</div>
						<div class="col-md-3">
							<h2 class="heading-bottom-border border-info">Heading H2</h2>
							<h2 class="heading-bottom-border border-info text-info">Heading H2</h2>
						</div>
						<div class="col-md-3">
							<h2 class="heading-bottom-border border-body">Heading H2</h2>
							<h2 class="heading-bottom-border border-body text-body">Heading H2</h2>
						</div>
					</div>

					<h2 class="text-center mt-4">Heading with <span
							class="text-white bg-primary">&nbsp;Highlight&nbsp;</span> Colors.</h2>
					<h2 class="text-center">Heading with <span class="text-white bg-danger">&nbsp;Highlight&nbsp;</span>
						Colors.</h2>
					<h2 class="text-center">Heading with <span class="text-white bg-info">&nbsp;Highlight&nbsp;</span>
						Colors.</h2>
					<h2 class="text-center">Heading with <span class="text-white bg-dark2">&nbsp;Highlight&nbsp;</span>
						Colors.</h2>

					<h2 class="text-center mt-4"><span class="text-primary">Multiple</span><span class="text-danger">
							Colors</span> in the<span class="text-info"> Same</span> Heading</h2>
				</div>

				<div class="mt-8 mb-8">
					<h1 class="mb-0">Heading H1</h1>
					<p>Sub-title pellentesque pellentesque tempor tellus eget fermentum. usce lacllentesque eget tempor
						tellus ellentesque pelleinia tempor malesuada.</p>

					<h2 class="mt-3 mb-0">Heading H2</h2>
					<p>Sub-title pellentesque pellentesque tempor tellus eget fermentum. usce lacllentesque eget tempor
						tellus ellentesque pelleinia tempor malesuada.</p>

					<h3 class="mt-3 mb-0">Heading H3</h3>
					<p>Sub-title pellentesque pellentesque tempor tellus eget fermentum. usce lacllentesque eget tempor
						tellus ellentesque pelleinia tempor malesuada.</p>

					<h4 class="mt-3 mb-0">Heading H4</h4>
					<p>Sub-title pellentesque pellentesque tempor tellus eget fermentum. usce lacllentesque eget tempor
						tellus ellentesque pelleinia tempor malesuada.</p>

					<h5 class="mt-3 mb-0">Heading H5</h5>
					<p>Sub-title pellentesque pellentesque tempor tellus eget fermentum. usce lacllentesque eget tempor
						tellus ellentesque pelleinia tempor malesuada.</p>
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
