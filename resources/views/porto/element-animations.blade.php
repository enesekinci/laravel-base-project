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
								<li class="breadcrumb-item active" aria-current="page">Animation</li>
							</ol>
						</nav>
						<h1 class="page-title text-center text-white">Animation</h1>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="anim-pane mt-8">
					<div class="anim-wrapper">
						<img src="/porto/assets/images/elements/device.png" class="appear-animate" data-animation-name='fadeIn'
							data-animation-delay="200" alt="img" width="200" height="141" />
						<button class="btn btn-primary btn-sm anim-play-btn"><i
								class="fas fa-play pr-2"></i>Play</button>
					</div>
					<div>
						<h4>fadeIn</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget
							diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta
							tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. In eu justo a felis
							faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>
					</div>
				</div>

				<hr>

				<div class="anim-pane mt-4">
					<div class="anim-wrapper">
						<img src="/porto/assets/images/elements/device.png" class="appear-animate"
							data-animation-name='fadeInUpShorter' data-animation-delay="200" alt="img" width="200"
							height="141" />
						<button class="btn btn-primary btn-sm anim-play-btn"><i
								class="fas fa-play pr-2"></i>Play</button>
					</div>
					<div>
						<h4>fadeInUpShorter</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget
							diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta
							tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. In eu justo a felis
							faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>
					</div>
				</div>

				<hr>

				<div class="anim-pane mt-4">
					<div class="anim-wrapper">
						<img src="/porto/assets/images/elements/device.png" class="appear-animate"
							data-animation-name='fadeInDownShorter' data-animation-delay="200" alt="img" width="200"
							height="141" />
						<button class="btn btn-primary btn-sm anim-play-btn"><i
								class="fas fa-play pr-2"></i>Play</button>
					</div>
					<div>
						<h4>fadeInDownShorter</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget
							diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta
							tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. In eu justo a felis
							faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>
					</div>
				</div>

				<hr>

				<div class="anim-pane mt-4">
					<div class="anim-wrapper">
						<img src="/porto/assets/images/elements/device.png" class="appear-animate"
							data-animation-name='fadeInLeftShorter' data-animation-delay="200" alt="img" width="200"
							height="141" />
						<button class="btn btn-primary btn-sm anim-play-btn"><i
								class="fas fa-play pr-2"></i>Play</button>
					</div>
					<div>
						<h4>fadeInLeftShorter</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget
							diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta
							tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. In eu justo a felis
							faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>
					</div>
				</div>

				<hr>

				<div class="anim-pane mt-4">
					<div class="anim-wrapper">
						<img src="/porto/assets/images/elements/device.png" class="appear-animate"
							data-animation-name='fadeInRightShorter' data-animation-delay='200' alt="img" width="200"
							height="141" />
						<button class="btn btn-primary btn-sm anim-play-btn"><i
								class="fas fa-play pr-2"></i>Play</button>
					</div>
					<div>
						<h4>fadeInRightShorter</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget
							diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta
							tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. In eu justo a felis
							faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>
					</div>
				</div>

				<hr>

				<div class="anim-pane mt-4">
					<div class="anim-wrapper">
						<img src="/porto/assets/images/elements/device.png" class="appear-animate"
							data-animation-name='fadeInUpBig' data-animation-delay="200" alt="img" width="200"
							height="141" />
						<button class="btn btn-primary btn-sm anim-play-btn"><i
								class="fas fa-play pr-2"></i>Play</button>
					</div>
					<div>
						<h4>fadeInUpBig</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget
							diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta
							tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. In eu justo a felis
							faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>
					</div>
				</div>

				<hr>

				<div class="anim-pane mt-4">
					<div class="anim-wrapper">
						<img src="/porto/assets/images/elements/device.png" class="appear-animate"
							data-animation-name='fadeInDownBig' data-animation-delay="200" alt="img" width="200"
							height="141" />
						<button class="btn btn-primary btn-sm anim-play-btn"><i
								class="fas fa-play pr-2"></i>Play</button>
					</div>
					<div>
						<h4>fadeInDownBig</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget
							diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta
							tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. In eu justo a felis
							faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>
					</div>
				</div>

				<hr>

				<div class="anim-pane mt-4">
					<div class="anim-wrapper">
						<img src="/porto/assets/images/elements/device.png" class="appear-animate"
							data-animation-name='fadeInLeftBig' data-animation-delay="200" alt="img" width="200"
							height="141" />
						<button class="btn btn-primary btn-sm anim-play-btn"><i
								class="fas fa-play pr-2"></i>Play</button>
					</div>
					<div>
						<h4>fadeInLeftBig</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget
							diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta
							tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. In eu justo a felis
							faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>
					</div>
				</div>

				<hr>

				<div class="anim-pane mt-4">
					<div class="anim-wrapper">
						<img src="/porto/assets/images/elements/device.png" class="appear-animate"
							data-animation-name='fadeInRightBig' data-animation-delay="200" alt="img" width="200"
							height="141" />
						<button class="btn btn-primary btn-sm anim-play-btn"><i
								class="fas fa-play pr-2"></i>Play</button>
					</div>
					<div>
						<h4>fadeInRightBig</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget
							diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta
							tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. In eu justo a felis
							faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>
					</div>
				</div>

				<hr>

				<div class="anim-pane mt-4">
					<div class="anim-wrapper">
						<img src="/porto/assets/images/elements/device.png" class="appear-animate"
							data-animation-name='bounceIn' data-animation-delay="200" alt="img" width="200"
							height="141" />
						<button class="btn btn-primary btn-sm anim-play-btn"><i
								class="fas fa-play pr-2"></i>Play</button>
					</div>
					<div>
						<h4>bounceIn</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget
							diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta
							tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. In eu justo a felis
							faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>
					</div>
				</div>

				<hr>

				<div class="anim-pane mt-4">
					<div class="anim-wrapper">
						<img src="/porto/assets/images/elements/device.png" class="appear-animate"
							data-animation-name='bounceInUp' data-animation-delay="200" alt="img" width="200"
							height="141" />
						<button class="btn btn-primary btn-sm anim-play-btn"><i
								class="fas fa-play pr-2"></i>Play</button>
					</div>
					<div>
						<h4>bounceInUp</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget
							diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta
							tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. In eu justo a felis
							faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>
					</div>
				</div>

				<hr>

				<div class="anim-pane mt-4">
					<div class="anim-wrapper">
						<img src="/porto/assets/images/elements/device.png" class="appear-animate"
							data-animation-name='bounceInDown' data-animation-delay="200" alt="img" width="200"
							height="141" />
						<button class="btn btn-primary btn-sm anim-play-btn"><i
								class="fas fa-play pr-2"></i>Play</button>
					</div>
					<div>
						<h4>bounceInDown</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget
							diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta
							tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. In eu justo a felis
							faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>
					</div>
				</div>

				<hr>

				<div class="anim-pane mt-4">
					<div class="anim-wrapper">
						<img src="/porto/assets/images/elements/device.png" class="appear-animate"
							data-animation-name='bounceInLeft' data-animation-delay="200" alt="img" width="200"
							height="141" />
						<button class="btn btn-primary btn-sm anim-play-btn"><i
								class="fas fa-play pr-2"></i>Play</button>
					</div>
					<div>
						<h4>bounceInLeft</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget
							diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta
							tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. In eu justo a felis
							faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>
					</div>
				</div>

				<hr>

				<div class="anim-pane mt-4">
					<div class="anim-wrapper">
						<img src="/porto/assets/images/elements/device.png" class="appear-animate"
							data-animation-name='bounceInRight' data-animation-delay="200" alt="img" width="200"
							height="141" />
						<button class="btn btn-primary btn-sm anim-play-btn"><i
								class="fas fa-play pr-2"></i>Play</button>
					</div>
					<div>
						<h4>bounceInRight</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget
							diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta
							tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. In eu justo a felis
							faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>
					</div>
				</div>

				<hr>

				<div class="anim-pane mt-4">
					<div class="anim-wrapper">
						<img src="/porto/assets/images/elements/device.png" class="appear-animate"
							data-animation-name='rotateIn' data-animation-delay="200" alt="img" width="200"
							height="141" />
						<button class="btn btn-primary btn-sm anim-play-btn"><i
								class="fas fa-play pr-2"></i>Play</button>
					</div>
					<div>
						<h4>rotateIn</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget
							diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta
							tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. In eu justo a felis
							faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>
					</div>
				</div>

				<hr>

				<div class="anim-pane mt-4">
					<div class="anim-wrapper">
						<img src="/porto/assets/images/elements/device.png" class="appear-animate"
							data-animation-name='rotateInUpLeft' data-animation-delay="200" alt="img" width="200"
							height="141" />
						<button class="btn btn-primary btn-sm anim-play-btn"><i
								class="fas fa-play pr-2"></i>Play</button>
					</div>
					<div>
						<h4>rotateInUpLeft</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget
							diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta
							tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. In eu justo a felis
							faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>
					</div>
				</div>

				<hr>

				<div class="anim-pane mt-4">
					<div class="anim-wrapper">
						<img src="/porto/assets/images/elements/device.png" class="appear-animate"
							data-animation-name='rotateInDownLeft' data-animation-delay="200" alt="img" width="200"
							height="141" />
						<button class="btn btn-primary btn-sm anim-play-btn"><i
								class="fas fa-play pr-2"></i>Play</button>
					</div>
					<div>
						<h4>rotateInDownLeft</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget
							diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta
							tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. In eu justo a felis
							faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>
					</div>
				</div>

				<hr>

				<div class="anim-pane mt-4">
					<div class="anim-wrapper">
						<img src="/porto/assets/images/elements/device.png" class="appear-animate"
							data-animation-name='rotateInUpRight' data-animation-delay="200" alt="img" width="200"
							height="141" />
						<button class="btn btn-primary btn-sm anim-play-btn"><i
								class="fas fa-play pr-2"></i>Play</button>
					</div>
					<div>
						<h4>rotateInUpRight</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget
							diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta
							tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. In eu justo a felis
							faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>
					</div>
				</div>

				<hr>

				<div class="anim-pane mt-4">
					<div class="anim-wrapper">
						<img src="/porto/assets/images/elements/device.png" class="appear-animate"
							data-animation-name='rotateInDownRight' data-animation-delay="200" alt="img" width="200"
							height="141" />
						<button class="btn btn-primary btn-sm anim-play-btn"><i
								class="fas fa-play pr-2"></i>Play</button>
					</div>
					<div>
						<h4>rotateInDownRight</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget
							diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta
							tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. In eu justo a felis
							faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>
					</div>
				</div>

				<hr>

				<div class="anim-pane mt-4">
					<div class="anim-wrapper">
						<img src="/porto/assets/images/elements/device.png" class="appear-animate" data-animation-name='flash'
							data-animation-delay="200" alt="img" width="200" height="141" />
						<button class="btn btn-primary btn-sm anim-play-btn"><i
								class="fas fa-play pr-2"></i>Play</button>
					</div>
					<div>
						<h4>flash</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget
							diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta
							tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. In eu justo a felis
							faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>
					</div>
				</div>

				<hr>

				<div class="anim-pane mt-4">
					<div class="anim-wrapper">
						<img src="/porto/assets/images/elements/device.png" class="appear-animate" data-animation-name='shake'
							data-animation-delay="200" alt="img" width="200" height="141" />
						<button class="btn btn-primary btn-sm anim-play-btn"><i
								class="fas fa-play pr-2"></i>Play</button>
					</div>
					<div>
						<h4>shake</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget
							diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta
							tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. In eu justo a felis
							faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>
					</div>
				</div>

				<hr>

				<div class="anim-pane mt-4">
					<div class="anim-wrapper">
						<img src="/porto/assets/images/elements/device.png" class="appear-animate" data-animation-name='bounce'
							data-animation-delay="200" alt="img" width="200" height="141" />
						<button class="btn btn-primary btn-sm anim-play-btn"><i
								class="fas fa-play pr-2"></i>Play</button>
					</div>
					<div>
						<h4>bounce</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget
							diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta
							tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. In eu justo a felis
							faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>
					</div>
				</div>

				<hr>

				<div class="anim-pane mt-4">
					<div class="anim-wrapper">
						<img src="/porto/assets/images/elements/device.png" class="appear-animate" data-animation-name='tada'
							data-animation-delay="200" alt="img" width="200" height="141" />
						<button class="btn btn-primary btn-sm anim-play-btn"><i
								class="fas fa-play pr-2"></i>Play</button>
					</div>
					<div>
						<h4>tada</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget
							diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta
							tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. In eu justo a felis
							faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>
					</div>
				</div>

				<hr>

				<div class="anim-pane mt-4">
					<div class="anim-wrapper">
						<img src="/porto/assets/images/elements/device.png" class="appear-animate" data-animation-name='pulse'
							data-animation-delay="200" alt="img" width="200" height="141" />
						<button class="btn btn-primary btn-sm anim-play-btn"><i
								class="fas fa-play pr-2"></i>Play</button>
					</div>
					<div>
						<h4>pulse</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget
							diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta
							tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. In eu justo a felis
							faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>
					</div>
				</div>

				<hr>

				<div class="anim-pane mt-4">
					<div class="anim-wrapper">
						<img src="/porto/assets/images/elements/device.png" class="appear-animate" data-animation-name='swing'
							data-animation-delay="200" alt="img" width="200" height="141" />
						<button class="btn btn-primary btn-sm anim-play-btn"><i
								class="fas fa-play pr-2"></i>Play</button>
					</div>
					<div>
						<h4>swing</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget
							diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta
							tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. In eu justo a felis
							faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>
					</div>
				</div>

				<hr>

				<div class="anim-pane mt-4">
					<div class="anim-wrapper">
						<img src="/porto/assets/images/elements/device.png" class="appear-animate" data-animation-name='wobble'
							data-animation-delay="200" alt="img" width="200" height="141" />
						<button class="btn btn-primary btn-sm anim-play-btn"><i
								class="fas fa-play pr-2"></i>Play</button>
					</div>
					<div>
						<h4>wobble</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget
							diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta
							tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis. In eu justo a felis
							faucibus ornare vel id
							metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
							Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu
							vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin
							ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>
					</div>
				</div>

				<hr>
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
