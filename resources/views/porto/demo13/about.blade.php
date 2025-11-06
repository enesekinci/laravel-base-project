@extends('layouts.porto')

@section('top-notice')
    @include('components.porto.demo13.top-notice')
@endsection

@section('header')
    @include('components.porto.demo13.header')
@endsection

@section('footer')
    @include('components.porto.demo13.footer')
@endsection

@section('content')
<div class="page-header">
				<div class="container">
					<h1 class="heading text-white text-uppercase">About Us</h1>
				</div>
			</div>
			<!-- breadcrumb -->
			<nav aria-label="breadcrumb" class="breadcrumb-nav">
				<div class="container">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="/porto/demo13.html">Home</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">About Us</li>
					</ol>
				</div>
			</nav>
			<section class="info-section">
				<h2 class="d-none">history & reviews</h2>
				<div class="container">
					<div class="row">
						<div class="col-lg-6 history-section">
							<h3 class="section-heading">our history</h3>
							<p class="section-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras
								dapibus a eros in venenatis. Cras mauris arcu, suscipit
								id lacinia sed, pulvinar in urna. Donec urna nisi, efficitur fermentum ullamcorper non,
								mattis et est. Nullam malesuada
								leo leo, non tempus turpis accumsan a. Sed tincidunt feugiat purus, sed lobortis justo
								consequat in. Phasellus lectus
								magna, accumsan eget felis in, hendrerit malesuada lectus. Duis orci nunc, vulputate vel
								sapien nec, sodales sollicitudin
								ligula.
							</p>
						</div>
						<div class="col-lg-6 testimonial about-test">
							<h3 class="section-heading">client reviews</h3>
							<div class="testimonial-owner">
								<figure>
									<img src="/porto/assets/images/clients/client1.png" alt="client">
								</figure>

								<div>
									<strong class="testimonial-title">John Smith</strong>
									<span>SMARTWAVE CEO</span>
								</div>
							</div>
							<!-- End .testimonial-owner -->

							<blockquote>
								<p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mipsum
									dolor sit amet, consectetur elitad
									adipiscing cas non placerat mi.</p>
							</blockquote>
						</div>
					</div>
				</div>
			</section>
			<section class="gallery-section with-bg">
				<div class="container">
					<h3 class="section-heading">photo gallery</h3>
					<div class="owl-carousel owl-theme" data-owl-options="{
							'dots': false,
							'margin': 30,
							'loop': false,
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
						<figure>
							<img src="/porto/assets/images/demoes/demo13/about/gallery1.jpg" width="270" height="216"
								alt="blog">
						</figure>
						<figure>
							<img src="/porto/assets/images/demoes/demo13/about/gallery2.jpg" width="270" height="216"
								alt="blog">
						</figure>
						<figure>
							<img src="/porto/assets/images/demoes/demo13/about/gallery3.jpg" width="270" height="216"
								alt="blog">
						</figure>
						<figure>
							<img src="/porto/assets/images/demoes/demo13/about/gallery4.jpg" width="270" height="216"
								alt="blog">
						</figure>
					</div>
				</div>
			</section>
			<section class="detail-info-section">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<figure>
								<img src="/porto/assets/images/demoes/demo13/about/img-1.jpg" class="lg-img" width="570"
									height="443" alt="blog">
							</figure>
						</div>
						<div class="col-lg-6 info-body">
							<div class="info-item">
								<h4 class="section-heading">our mission</h4>
								<p class="section-text">Lorem Ipsum is simply dummy text of the printing and typesetting
									industry. Lorem Ipsum has been the industry’s standard
									dummy text ever since the 1500s, when an unknown printer took a galley of type and
									scrambled.
								</p>
							</div>
							<div class="info-item">
								<h4 class="section-heading">our vision</h4>
								<p class="section-text">Lorem Ipsum is simply dummy text of the printing and typesetting
									industry. Lorem Ipsum has been the industry’s standard
									dummy text ever since the 1500s, when an unknown printer took a galley of type and
									scrambled.
								</p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="features-section with-bg">
				<div class="container">
					<div class="owl-carousel owl-theme" data-owl-options="{
							'dots': false,
							'margin': 30,
							'loop': false,
							'responsive': {
								'0': {
									'items': 1
								},
								'576': {
									'items': 2
								},
								'992': {
									'items': 3
								}
							}
						}">
						<div class="feature-box">
							<i class="icon-shipped"></i>

							<div class="feature-box-content p-0">
								<h3>Free Shipping</h3>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
							</div>
							<!-- End .feature-box-content -->
						</div>
						<div class="feature-box">
							<i class="icon-us-dollar"></i>

							<div class="feature-box-content p-0">
								<h3>100% Money Back Guarantee</h3>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
							</div>
							<!-- End .feature-box-content -->
						</div>
						<div class="feature-box">
							<i class="icon-online-support"></i>

							<div class="feature-box-content p-0">
								<h3>Online Support 24/7</h3>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
							</div>
							<!-- End .feature-box-content -->
						</div>
					</div>
				</div>
			</section>
@section('footer')
    @include('components.porto.demo13.footer')
@endsection

@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
