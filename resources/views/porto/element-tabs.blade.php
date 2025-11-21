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
								<li class="breadcrumb-item active" aria-current="page">Tabs</li>
							</ol>
						</nav>
						<h1 class="page-title text-center text-white">Tabs</h1>
					</div>
				</div>
			</div>

			<div class="container">
				<section class="default-section mt-5">
					<h3>Default</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="tabs mb-5">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="tab-popular" data-toggle="tab"
											href="#popular-content" role="tab" aria-controls="popular-content"
											aria-selected="true"><i class="fa fa-star text-primary pr-2"></i>Popular</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" id="recent-tab" data-toggle="tab" href="#recent-content"
											role="tab" aria-controls="recent-content" aria-selected="true">Recent</a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade show active" id="popular-content" role="tabpanel"
										aria-labelledby="tab-popular">
										<p>Popular</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitat.</p>
									</div>
									<div class="tab-pane fade" id="recent-content" role="tabpanel"
										aria-labelledby="recent-tab">
										<p>Recent</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitat.</p>

									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="tabs mb-5">
								<ul class="nav nav-tabs justify-content-end" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="tab-popular1" data-toggle="tab"
											href="#popular-content1" role="tab" aria-controls="popular-content1"
											aria-selected="true"><i class="fa fa-star text-primary pr-2"></i>Popular</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" id="recent-tab1" data-toggle="tab" href="#recent-content1"
											role="tab" aria-controls="recent-content1" aria-selected="true">Recent</a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade show active" id="popular-content1" role="tabpanel"
										aria-labelledby="tab-popular1">
										<p>Popular</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitat.</p>
									</div>
									<div class="tab-pane fade" id="recent-content1" role="tabpanel"
										aria-labelledby="recent-tab1">
										<p>Recent</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitat.</p>

									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<hr class="divider mt-0">
				<section class="bottom-section">
					<h3>Bottom</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="tabs tabs-bottom mb-5">
								<div class="tab-content">
									<div class="tab-pane fade show active" id="popular-content2" role="tabpanel"
										aria-labelledby="tab-popular2">
										<p>Popular</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitat.</p>
									</div>
									<div class="tab-pane fade" id="recent-content2" role="tabpanel"
										aria-labelledby="recent-tab2">
										<p>Recent</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitat.</p>

									</div>
								</div>
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="tab-popular2" data-toggle="tab"
											href="#popular-content2" role="tab" aria-controls="popular-content2"
											aria-selected="true"><i class="fa fa-star text-primary pr-2"></i>Popular</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" id="recent-tab2" data-toggle="tab" href="#recent-content2"
											role="tab" aria-controls="recent-content2" aria-selected="true">Recent</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-md-6">
							<div class="tabs tabs-bottom mb-5">
								<div class="tab-content">
									<div class="tab-pane fade show active" id="popular-content3" role="tabpanel"
										aria-labelledby="tab-popular3">
										<p>Popular</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitat.</p>
									</div>
									<div class="tab-pane fade" id="recent-content3" role="tabpanel"
										aria-labelledby="recent-tab3">
										<p>Recent</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitat.</p>

									</div>
								</div>
								<ul class="nav nav-tabs justify-content-end" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="tab-popular3" data-toggle="tab"
											href="#popular-content3" role="tab" aria-controls="popular-content3"
											aria-selected="true"><i class="fa fa-star text-primary pr-2"></i>Popular</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" id="recent-tab3" data-toggle="tab" href="#recent-content3"
											role="tab" aria-controls="recent-content3" aria-selected="true">Recent</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</section>
				<hr class="divider mt-0">
				<section class="justify-section">
					<h3>Justified</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="tabs mb-5">
								<ul class="nav nav-tabs nav-justified" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="tab-popular4" data-toggle="tab"
											href="#popular-content4" role="tab" aria-controls="popular-content4"
											aria-selected="true"><i class="fa fa-star text-primary pr-2"></i>Popular</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" id="recent-tab4" data-toggle="tab" href="#recent-content4"
											role="tab" aria-controls="recent-content4" aria-selected="true">Recent</a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade show active" id="popular-content4" role="tabpanel"
										aria-labelledby="tab-popular4">
										<p>Popular</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitat.</p>
									</div>
									<div class="tab-pane fade" id="recent-content4" role="tabpanel"
										aria-labelledby="recent-tab4">
										<p>Recent</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitat.</p>

									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="tabs tabs-bottom tabs-secondary mb-5">
								<div class="tab-content">
									<div class="tab-pane fade show active" id="popular-content5" role="tabpanel"
										aria-labelledby="tab-popular5">
										<p>Popular</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitat.</p>
									</div>
									<div class="tab-pane fade" id="recent-content5" role="tabpanel"
										aria-labelledby="recent-tab5">
										<p>Recent</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitat.</p>

									</div>
								</div>
								<ul class="nav nav-tabs nav-justified" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="tab-popular5" data-toggle="tab"
											href="#popular-content5" role="tab" aria-controls="popular-content5"
											aria-selected="true"><i
												class="fa fa-star text-secondary pr-5"></i>Popular</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" id="recent-tab5" data-toggle="tab" href="#recent-content5"
											role="tab" aria-controls="recent-content5" aria-selected="true">Recent</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</section>
				<hr class="divider mt-0">
				<section class="vertical-section">
					<h3>Vertical</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="tabs tabs-vertical tabs-secondary tabs-left mb-5">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="tab-popular6" data-toggle="tab"
											href="#popular-content6" role="tab" aria-controls="popular-content6"
											aria-selected="true"><i
												class="fa fa-star text-secondary pr-2"></i>Popular</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" id="recent-tab6" data-toggle="tab" href="#recent-content6"
											role="tab" aria-controls="recent-content6" aria-selected="true">Recent</a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade show active" id="popular-content6" role="tabpanel"
										aria-labelledby="tab-popular6">
										<p>Popular</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitat.</p>
									</div>
									<div class="tab-pane fade" id="recent-content6" role="tabpanel"
										aria-labelledby="recent-tab6">
										<p>Recent</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitat.</p>

									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="tabs tabs-vertical tabs-right mb-5">
								<div class="tab-content">
									<div class="tab-pane fade show active" id="popular-content7" role="tabpanel"
										aria-labelledby="tab-popular7">
										<p>Popular</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitat.</p>
									</div>
									<div class="tab-pane fade" id="recent-content7" role="tabpanel"
										aria-labelledby="recent-tab7">
										<p>Recent</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitat.</p>

									</div>
								</div>
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="tab-popular7" data-toggle="tab"
											href="#popular-content7" role="tab" aria-controls="popular-content7"
											aria-selected="true"><i class="fa fa-star text-primary pr-2"></i>Popular</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" id="recent-tab7" data-toggle="tab" href="#recent-content7"
											role="tab" aria-controls="recent-content7" aria-selected="true">Recent</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</section>
				<hr class="divider mt-0">
				<section class="center-section">
					<h3>Center</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="tabs mb-5">
								<ul class="nav nav-tabs justify-content-center" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="tab-popular8" data-toggle="tab"
											href="#popular-content8" role="tab" aria-controls="popular-content8"
											aria-selected="true"><i class="fa fa-star text-primary pr-2"></i>Popular</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" id="recent-tab8" data-toggle="tab" href="#recent-content8"
											role="tab" aria-controls="recent-content8" aria-selected="true">Recent</a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade show active" id="popular-content8" role="tabpanel"
										aria-labelledby="tab-popular8">
										<p>Popular</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitat.</p>
									</div>
									<div class="tab-pane fade" id="recent-content8" role="tabpanel"
										aria-labelledby="recent-tab8">
										<p>Recent</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitat.</p>

									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="tabs tabs-bottom mb-5">
								<div class="tab-content">
									<div class="tab-pane fade show active" id="popular-content9" role="tabpanel"
										aria-labelledby="tab-popular9">
										<p>Popular</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitat.</p>
									</div>
									<div class="tab-pane fade" id="recent-content9" role="tabpanel"
										aria-labelledby="recent-tab9">
										<p>Recent</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitat.</p>

									</div>
								</div>
								<ul class="nav nav-tabs justify-content-center" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="tab-popular9" data-toggle="tab"
											href="#popular-content9" role="tab" aria-controls="popular-content9"
											aria-selected="true"><i class="fa fa-star text-primary pr-2"></i>Popular</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" id="recent-tab9" data-toggle="tab" href="#recent-content9"
											role="tab" aria-controls="recent-content9" aria-selected="true">Recent</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</section>
				<hr class="divider mt-0">
				<section class="center-section">
					<h3>Colors</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="tabs mb-5">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="tab-popular10" data-toggle="tab"
											href="#popular-content10" role="tab" aria-controls="popular-content10"
											aria-selected="true"><i class="fa fa-star text-primary pr-2"></i>Popular</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" id="recent-tab10" data-toggle="tab" href="#recent-content10"
											role="tab" aria-controls="recent-content10" aria-selected="true">Recent</a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade show active" id="popular-content10" role="tabpanel"
										aria-labelledby="tab-popular10">
										<p>Popular</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitat.</p>
									</div>
									<div class="tab-pane fade" id="recent-content10" role="tabpanel"
										aria-labelledby="recent-tab10">
										<p>Recent</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitat.</p>

									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="tabs tabs-secondary mb-5">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="tab-popular11" data-toggle="tab"
											href="#popular-content11" role="tab" aria-controls="popular-content11"
											aria-selected="true"><i
												class="fa fa-star text-secondary pr-2"></i>Popular</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" id="recent-tab11" data-toggle="tab" href="#recent-content11"
											role="tab" aria-controls="recent-content11" aria-selected="true">Recent</a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade show active" id="popular-content11" role="tabpanel"
										aria-labelledby="tab-popular11">
										<p>Popular</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitat.</p>
									</div>
									<div class="tab-pane fade" id="recent-content11" role="tabpanel"
										aria-labelledby="recent-tab11">
										<p>Recent</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitat.</p>

									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="tabs tabs-tertiary mb-5">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="tab-popular12" data-toggle="tab"
											href="#popular-content12" role="tab" aria-controls="popular-content12"
											aria-selected="true"><i class="fa fa-star text-info pr-2"></i>Popular</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" id="recent-tab12" data-toggle="tab" href="#recent-content12"
											role="tab" aria-controls="recent-content12" aria-selected="true">Recent</a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade show active" id="popular-content12" role="tabpanel"
										aria-labelledby="tab-popular12">
										<p>Popular</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitat.</p>
									</div>
									<div class="tab-pane fade" id="recent-content12" role="tabpanel"
										aria-labelledby="recent-tab12">
										<p>Recent</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitat.</p>

									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="tabs tabs-dark mb-5">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="tab-popular13" data-toggle="tab"
											href="#popular-content13" role="tab" aria-controls="popular-content13"
											aria-selected="true"><i class="fa fa-star text-dark pr-2"></i>Popular</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" id="recent-tab13" data-toggle="tab" href="#recent-content13"
											role="tab" aria-controls="recent-content13" aria-selected="true">Recent</a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade show active" id="popular-content13" role="tabpanel"
										aria-labelledby="tab-popular13">
										<p>Popular</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitat.</p>
									</div>
									<div class="tab-pane fade" id="recent-content13" role="tabpanel"
										aria-labelledby="recent-tab13">
										<p>Recent</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitat.</p>

									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<hr class="divider mt-0">
				<section class="simple-section">
					<h3>Simple</h3>
					<div class="tabs tabs-simple">
						<ul class="nav nav-tabs justify-content-center" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="tab-customer" data-toggle="tab" href="#customer-content"
									role="tab" aria-controls="customer-content" aria-selected="true">Customer
									Support</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="lng-tab" data-toggle="tab" href="#lng-content" role="tab"
									aria-controls="lng-content" aria-selected="true">HTML5 / CSS3 /
									JS</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="font-tab" data-toggle="tab" href="#font-content" role="tab"
									aria-controls="font-content" aria-selected="true">500+ Google
									Fonts</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="color-tab" data-toggle="tab" href="#color-content" role="tab"
									aria-controls="color-content" aria-selected="true">Colors</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade show active text-center" id="customer-content" role="tabpanel"
								aria-labelledby="tab-customer">
								<h4>Customer Support</h4>
								<p style="line-height: 2.4rem;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
									Curabitur pellentesque neque
									eget diam posuere porta. Quisque ut nulla at nunc <a href="#">vehicula</a>
									lacinia.<br>Proin adipiscing porta tellus, ut feugiat nibh adipiscing sit amet. In
									eu justo a felis faucibus
									ornare vel id metus. Vestibulum ante ipsum primis in faucibus orci luctus et
									ultrices posuere cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac
									viverra leo. Nullam convallis, arcu vel pellentesque sodales, nisi est varius diam,
									ac ultrices sem ante quis sem. Proin ultricies volutpat sapien, nec scelerisque
									ligula mollis lobortis.</p>
							</div>
							<div class="tab-pane fade text-center" id="lng-content" role="tabpanel"
								aria-labelledby="lng-tab">
								<h4>HTML5 / CSS3 / JS</h4>
								<p style="line-height: 2.4rem;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
									Curabitur pellentesque neque
									eget diam posuere porta. Quisque ut nulla at nunc <a href="#">vehicula</a>
									lacinia.<br>Proin adipiscing porta tellus, ut feugiat nibh adipiscing sit amet. In
									eu justo a felis faucibus
									ornare vel id metus. Vestibulum ante ipsum primis in faucibus orci luctus et
									ultrices posuere cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac
									viverra leo. Nullam convallis, arcu vel pellentesque sodales, nisi est varius diam,
									ac ultrices sem ante quis sem. Proin ultricies volutpat sapien, nec scelerisque
									ligula mollis lobortis.</p>
							</div>
							<div class="tab-pane fade text-center" id="font-content" role="tabpanel"
								aria-labelledby="font-tab">
								<h4>500+ Google Fonts</h4>
								<p style="line-height: 2.4rem;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
									Curabitur pellentesque neque
									eget diam posuere porta. Quisque ut nulla at nunc <a href="#">vehicula</a>
									lacinia.<br>Proin adipiscing porta tellus, ut feugiat nibh adipiscing sit amet. In
									eu justo a felis faucibus
									ornare vel id metus. Vestibulum ante ipsum primis in faucibus orci luctus et
									ultrices posuere cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac
									viverra leo. Nullam convallis, arcu vel pellentesque sodales, nisi est varius diam,
									ac ultrices sem ante quis sem. Proin ultricies volutpat sapien, nec scelerisque
									ligula mollis lobortis.</p>
							</div>
							<div class="tab-pane fade text-center" id="color-content" role="tabpanel"
								aria-labelledby="color-tab">
								<h4>Colors</h4>
								<p style="line-height: 2.4rem;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
									Curabitur pellentesque neque
									eget diam posuere porta. Quisque ut nulla at nunc <a href="#">vehicula</a>
									lacinia.<br>Proin adipiscing porta tellus, ut feugiat nibh adipiscing sit amet. In
									eu justo a felis faucibus
									ornare vel id metus. Vestibulum ante ipsum primis in faucibus orci luctus et
									ultrices posuere cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac
									viverra leo. Nullam convallis, arcu vel pellentesque sodales, nisi est varius diam,
									ac ultrices sem ante quis sem. Proin ultricies volutpat sapien, nec scelerisque
									ligula mollis lobortis.</p>
							</div>
						</div>
					</div>
				</section>
				<hr class="divider">
				<section class="bg-icon-section">
					<h3>Big Icons</h3>
					<div class="tabs tabs-simple tabs-with-icon">
						<ul class="nav nav-tabs justify-content-center" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="tab-customer1" data-toggle="tab"
									href="#customer-content1" role="tab" aria-controls="customer-content1"
									aria-selected="true">
									<span class="icon-content">
										<i class="fa fa-user text-primary"></i></span>
									<span class="tab-title">Customer Support</span></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="lng-tab1" data-toggle="tab" href="#lng-content1" role="tab"
									aria-controls="lng-content1" aria-selected="true">
									<span class="icon-content">
										<i class="fa fa-file text-primary"></i></span>
									<span class="tab-title">HTML5 / CSS3 / JS</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="font-tab1" data-toggle="tab" href="#font-content1" role="tab"
									aria-controls="font-content1" aria-selected="true">
									<span class="icon-content">
										<i class="fab fa-google-plus-g text-primary"></i></span>
									<span class="tab-title">500+ Google Fonts</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="color-tab1" data-toggle="tab" href="#color-content1" role="tab"
									aria-controls="color-content1" aria-selected="true">
									<span class="icon-content">
										<i class="fa fa-adjust text-primary"></i></span>
									<span class="tab-title">Colors</span>
								</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade show active text-center" id="customer-content1" role="tabpanel"
								aria-labelledby="tab-customer1">
								<h4>Customer Support</h4>
								<p style="line-height: 2.4rem;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
									Curabitur pellentesque neque
									eget diam posuere porta. Quisque ut nulla at nunc <a href="#">vehicula</a>
									lacinia.<br>Proin adipiscing porta tellus, ut feugiat nibh adipiscing sit amet. In
									eu justo a felis faucibus
									ornare vel id metus. Vestibulum ante ipsum primis in faucibus orci luctus et
									ultrices posuere cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac
									viverra leo. Nullam convallis, arcu vel pellentesque sodales, nisi est varius diam,
									ac ultrices sem ante quis sem. Proin ultricies volutpat sapien, nec scelerisque
									ligula mollis lobortis.</p>
							</div>
							<div class="tab-pane fade text-center" id="lng-content1" role="tabpanel"
								aria-labelledby="lng-tab1">
								<h4>HTML5 / CSS3 / JS</h4>
								<p style="line-height: 2.4rem;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
									Curabitur pellentesque neque
									eget diam posuere porta. Quisque ut nulla at nunc <a href="#">vehicula</a>
									lacinia.<br>Proin adipiscing porta tellus, ut feugiat nibh adipiscing sit amet. In
									eu justo a felis faucibus
									ornare vel id metus. Vestibulum ante ipsum primis in faucibus orci luctus et
									ultrices posuere cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac
									viverra leo. Nullam convallis, arcu vel pellentesque sodales, nisi est varius diam,
									ac ultrices sem ante quis sem. Proin ultricies volutpat sapien, nec scelerisque
									ligula mollis lobortis.</p>
							</div>
							<div class="tab-pane fade text-center" id="font-content1" role="tabpanel"
								aria-labelledby="font-tab1">
								<h4>500+ Google Fonts</h4>
								<p style="line-height: 2.4rem;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
									Curabitur pellentesque neque
									eget diam posuere porta. Quisque ut nulla at nunc <a href="#">vehicula</a>
									lacinia.<br>Proin adipiscing porta tellus, ut feugiat nibh adipiscing sit amet. In
									eu justo a felis faucibus
									ornare vel id metus. Vestibulum ante ipsum primis in faucibus orci luctus et
									ultrices posuere cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac
									viverra leo. Nullam convallis, arcu vel pellentesque sodales, nisi est varius diam,
									ac ultrices sem ante quis sem. Proin ultricies volutpat sapien, nec scelerisque
									ligula mollis lobortis.</p>
							</div>
							<div class="tab-pane fade text-center" id="color-content1" role="tabpanel"
								aria-labelledby="color-tab1">
								<h4>Colors</h4>
								<p style="line-height: 2.4rem;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
									Curabitur pellentesque neque
									eget diam posuere porta. Quisque ut nulla at nunc <a href="#">vehicula</a>
									lacinia.<br>Proin adipiscing porta tellus, ut feugiat nibh adipiscing sit amet. In
									eu justo a felis faucibus
									ornare vel id metus. Vestibulum ante ipsum primis in faucibus orci luctus et
									ultrices posuere cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac
									viverra leo. Nullam convallis, arcu vel pellentesque sodales, nisi est varius diam,
									ac ultrices sem ante quis sem. Proin ultricies volutpat sapien, nec scelerisque
									ligula mollis lobortis.</p>
							</div>
						</div>
					</div>
				</section>
			</div>
			<!-- End .container -->

			<div class="mb-4"></div><!-- margin -->

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
