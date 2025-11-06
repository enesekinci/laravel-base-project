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
                                <li class="breadcrumb-item"><a href="/porto/demo1.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    POSTS</li>
                            </ol>
                        </nav>
                        <h1 class="page-title text-center text-white">Posts</h1>
                    </div>
                </div>
            </div>
            <section class="blog-section mt-8 mb-4">
                <div class="container">
                    <h3 class="text-center appear-animate" data-animation-name="fadeInUp">
                        Default Style</h3>
                    <div class="owl-carousel owl-theme appear-animate" data-animation-name="fadeIn" data-owl-options="{
						'loop': false,
						'margin': 20,
						'autoHeight': true,
						'autoplay': false,
						'dots': false,
						'items': 2,
						'responsive': {
							'0': {
								'items': 1
							},
							'480': {
								'items': 2
							},
							'576': {
								'items': 3
							},
							'768': {
								'items': 4
							}
						}
					}">
                        <article class="post">
                            <div class="post-media">
                                <a href="/porto/single.html">
                                    <img src="/porto/assets/images/blog/home/post-1.jpg" alt="Post" width="225" height="280">
                                </a>
                                <div class="post-date">
                                    <span class="day">26</span>
                                    <span class="month">Feb</span>
                                </div>
                            </div><!-- End .post-media -->

                            <div class="post-body">
                                <h2 class="post-title">
                                    <a href="/porto/single.html">Top New Collection</a>
                                </h2>
                                <div class="post-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi.
                                        Etiam non tellus sem. Aenean...</p>
                                </div><!-- End .post-content -->
                                <a href="/porto/single.html" class="post-comment">0 Comments</a>
                            </div><!-- End .post-body -->
                        </article><!-- End .post -->

                        <article class="post">
                            <div class="post-media">
                                <a href="/porto/single.html">
                                    <img src="/porto/assets/images/blog/home/post-2.jpg" alt="Post" width="225" height="280">
                                </a>
                                <div class="post-date">
                                    <span class="day">26</span>
                                    <span class="month">Feb</span>
                                </div>
                            </div><!-- End .post-media -->

                            <div class="post-body">
                                <h2 class="post-title">
                                    <a href="/porto/single.html">Fashion Trends</a>
                                </h2>
                                <div class="post-content">
                                    <p>Leap into electronic typesetting, remaining essentially unchanged. It was
                                        popularised in the 1960s with the release of...</p>
                                </div><!-- End .post-content -->
                                <a href="/porto/single.html" class="post-comment">0 Comments</a>
                            </div><!-- End .post-body -->
                        </article><!-- End .post -->

                        <article class="post">
                            <div class="post-media">
                                <a href="/porto/single.html">
                                    <img src="/porto/assets/images/blog/home/post-3.jpg" alt="Post" width="225" height="280">
                                </a>
                                <div class="post-date">
                                    <span class="day">26</span>
                                    <span class="month">Feb</span>
                                </div>
                            </div><!-- End .post-media -->

                            <div class="post-body">
                                <h2 class="post-title">
                                    <a href="/porto/single.html">Right Choices</a>
                                </h2>
                                <div class="post-content">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the...</p>
                                </div><!-- End .post-content -->
                                <a href="/porto/single.html" class="post-comment">0 Comments</a>
                            </div><!-- End .post-body -->
                        </article><!-- End .post -->

                        <article class="post">
                            <div class="post-media">
                                <a href="/porto/single.html">
                                    <img src="/porto/assets/images/blog/home/post-4.jpg" alt="Post" width="225" height="280">
                                </a>
                                <div class="post-date">
                                    <span class="day">26</span>
                                    <span class="month">Feb</span>
                                </div>
                            </div><!-- End .post-media -->

                            <div class="post-body">
                                <h2 class="post-title">
                                    <a href="/porto/single.html">Perfect Accessories</a>
                                </h2>
                                <div class="post-content">
                                    <p>Leap into electronic typesetting, remaining essentially unchanged. It was
                                        popularised in the 1960s with the release of...</p>
                                </div><!-- End .post-content -->
                                <a href="/porto/single.html" class="post-comment">0 Comments</a>
                            </div><!-- End .post-body -->
                        </article><!-- End .post -->
                    </div>
                </div>
            </section>

            <div class="blog-section blog-type2 bg-gray pt-3">
                <div class="container text-center mt-7">
                    <h3 class="text-center appear-animate" data-animation-name="fadeInUpShorter"
                        data-animation-delay="200">Post Style2</h3>
                    <div class="owl-carousel owl-theme mb-4 pb-2 text-left appear-animate"
                        data-animation-name="fadeInUpShorter" data-animation-delay="500" data-owl-options="{
						'loop': false,
						'margin': 20,
						'autoHeight': true,
						'autoplay': false,
                        'items': 2,
                        'dots': false,
						'responsive': {
                            '0': {
								'items': 1
							},
							'576': {
								'items': 2
							}
						}
					}">
                        <article class="post">
                            <div class="post-media">
                                <a href="/porto/single.html">
                                    <img src="/porto/assets/images/elements/post/type2/post-1.jpg" alt="Post" width="225"
                                        height="280">
                                </a>
                            </div><!-- End .post-media -->

                            <div class="post-body">
                                <h2 class="post-title">
                                    <a href="/porto/single.html">Fashion News</a>
                                </h2>
                                <div class="post-date">27-FEB-2018</div><!-- End .post-date -->
                                <div class="post-content">
                                    <p>Quisque elementum nibh at dolor pellentesque, a eleifend libero... </p>

                                    <a href="/porto/single.html" class="read-more">Read More<i
                                            class="fas fa-long-arrow-alt-right ml-1"></i></a>
                                </div><!-- End .post-content -->
                            </div><!-- End .post-body -->
                        </article><!-- End .post -->

                        <article class="post">
                            <div class="post-media">
                                <a href="/porto/single.html">
                                    <img src="/porto/assets/images/elements/post/type2/post-2.jpg" alt="Post" width="225"
                                        height="280">
                                </a>
                            </div><!-- End .post-media -->

                            <div class="post-body">
                                <h2 class="post-title">
                                    <a href="/porto/single.html">Trends of Spring</a>
                                </h2>
                                <div class="post-date">27-FEB-2018</div><!-- End .post-date -->
                                <div class="post-content">
                                    <p>Quisque elementum nibh at dolor pellentesque, a eleifend libero... </p>

                                    <a href="/porto/single.html" class="read-more">Read More<i
                                            class="fas fa-long-arrow-alt-right ml-1"></i></a>
                                </div><!-- End .post-content -->
                            </div><!-- End .post-body -->
                        </article><!-- End .post -->

                        <article class="post">
                            <div class="post-media">
                                <a href="/porto/single.html">
                                    <img src="/porto/assets/images/elements/post/type2/post-3.jpg" alt="Post" width="225"
                                        height="280">
                                </a>
                            </div><!-- End .post-media -->

                            <div class="post-body">
                                <h2 class="post-title">
                                    <a href="/porto/single.html">Women News</a>
                                </h2>
                                <div class="post-date">27-FEB-2018</div><!-- End .post-date -->
                                <div class="post-content">
                                    <p>Quisque elementum nibh at dolor pellentesque, a eleifend libero... </p>

                                    <a href="/porto/single.html" class="read-more">Read More<i
                                            class="fas fa-long-arrow-alt-right ml-1"></i></a>
                                </div><!-- End .post-content -->
                            </div><!-- End .post-body -->
                        </article><!-- End .post -->
                    </div>
                </div>
            </div><!-- End .blog-type2 -->
            <div class="blog-section blog-type3 media-with-zoom appear-animate mt-8"
                data-animation-name="fadeInUpShorter" data-animation-delay="250">
                <h3 class="text-center appear-animate" data-animation-delay="100" data-animation-name="fadeIn">Post
                    Style3</h3>
                <div class="container">
                    <div class="post-slider owl-carousel owl-theme mb-0" data-owl-options="{
                            'margin' : 20,
                            'nav' : false,
                            'dots' : false,
                            'loop' : false,
                            'responsive' : {
                                '576' : {
                                    'items' : 2
                                },
                                '768' : {
                                    'items' : 2
                                },
                                '992' : {
                                    'items' : 3
                                }
                            }
                        }">
                        <article class="post">
                            <div class="post-box">
                                <div class="post-media">
                                    <a href="/porto/single.html">
                                        <img src="/porto/assets/images/elements/post/type3/post-1.jpg"
                                            data-zoom-image="/porto/assets/images/elements/post/type3/post-1.jpg" width="354"
                                            height="181" alt="Post">
                                    </a>

                                    <span class="prod-full-screen">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div><!-- End .post-media -->

                                <div class="post-body">
                                    <div class="post-meta">
                                        <span class="meta-date"><i class="far fa-calendar-alt"></i>December 1,
                                            2020</span>
                                        <span class="meta-author"><i class="far fa-user"></i>By <a href="#"
                                                title="Posts by John Doe" rel="author">John Doe</a></span>
                                        <span class="meta-comments"><i class="far fa-comments"></i><a href="#"
                                                title="Comment on Lorem ipsum dolor sit amet">0 Comments</a></span>
                                    </div>

                                    <h2 class="post-title">
                                        <a href="/porto/single.html">Lorem ipsum dolor sit amet</a>
                                    </h2>

                                    <div class="post-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat
                                            mi.
                                            Etiam non tellus sem. Aenean pretium convallis...</p>

                                        <a href="/porto/single.html" class="read-more">read more...</a>
                                    </div><!-- End .post-content -->
                                </div><!-- End .post-body -->
                            </div>
                        </article>

                        <article class="post">
                            <div class="post-box">
                                <div class="post-media">
                                    <a href="/porto/single.html">
                                        <img src="/porto/assets/images/elements/post/type3/post-2.jpg"
                                            data-zoom-image="/porto/assets/images/elements/post/type3/post-2.jpg" width="354"
                                            height="181" alt="Post">
                                    </a>

                                    <span class="prod-full-screen">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div><!-- End .post-media -->

                                <div class="post-body">
                                    <div class="post-meta">
                                        <span class="meta-date"><i class="far fa-calendar-alt"></i>December 1,
                                            2020</span>
                                        <span class="meta-author"><i class="far fa-user"></i>By <a href="#"
                                                title="Posts by John Doe" rel="author">John Doe</a></span>
                                        <span class="meta-comments"><i class="far fa-comments"></i><a href="#"
                                                title="Comment on Lorem ipsum dolor sit amet">0 Comments</a></span>
                                    </div>

                                    <h2 class="post-title">
                                        <a href="/porto/single.html">Lorem ipsum dolor sit amet</a>
                                    </h2>

                                    <div class="post-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat
                                            mi.
                                            Etiam non tellus sem. Aenean pretium convallis...</p>

                                        <a href="/porto/single.html" class="read-more">read more...</a>
                                    </div><!-- End .post-content -->
                                </div><!-- End .post-body -->
                            </div>
                        </article>

                        <article class="post">
                            <div class="post-box">
                                <div class="post-media">
                                    <a href="/porto/single.html">
                                        <img src="/porto/assets/images/elements/post/type3/post-3.jpg"
                                            data-zoom-image="/porto/assets/images/elements/post/type3/post-3.jpg" width="354"
                                            height="181" alt="Post">
                                    </a>

                                    <span class="prod-full-screen">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div><!-- End .post-media -->

                                <div class="post-body">
                                    <div class="post-meta">
                                        <span class="meta-date"><i class="far fa-calendar-alt"></i>December 1,
                                            2020</span>
                                        <span class="meta-author"><i class="far fa-user"></i>By <a href="#"
                                                title="Posts by John Doe" rel="author">John Doe</a></span>
                                        <span class="meta-comments"><i class="far fa-comments"></i><a href="#"
                                                title="Comment on Lorem ipsum dolor sit amet">0 Comments</a></span>
                                    </div>

                                    <h2 class="post-title">
                                        <a href="/porto/single.html">Lorem ipsum dolor sit amet</a>
                                    </h2>

                                    <div class="post-content">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat
                                            mi.
                                            Etiam non tellus sem. Aenean pretium convallis...</p>

                                        <a href="/porto/single.html" class="read-more">read more...</a>
                                    </div><!-- End .post-content -->
                                </div><!-- End .post-body -->
                            </div>
                        </article>
                    </div><!-- End .owl-carousel -->
                </div>
            </div>
            <section class="blog-section blog-type4 bg-gray appear-animate pt-3">
                <div class="container mt-7">
                    <h3 class="text-center appear-animate" data-animation-delay="100" data-animation-name="fadeIn">
                        Post + Testimonial</h3>
                    <div class="row">
                        <div class="col-md-7 col-lg-6 mb-2 mb-sm-0 media-with-zoom">
                            <h2 class="section-title">Latest News</h2>

                            <div class="owl-carousel owl-theme" data-owl-options="{
                                    'autoplay': false,
                                    'loop': false,
                                    'autoHeight': true
                                }">
                                <article class="post d-sm-flex d-block align-items-center media-with-zoom mb-0">
                                    <div class="post-media position-relative ml-auto mr-auto mb-sm-0">
                                        <a href="/porto/single.html">
                                            <img src="/porto/assets/images/elements/post/type4/1-1.jpg" alt="Post" width="265"
                                                height="220"
                                                data-zoom-image="/porto/assets/images/elements/post/type4/1-1.jpg">
                                        </a>
                                        <div class="post-date">
                                            <span class="day">13</span>
                                            <span class="month">JAN</span>
                                        </div>
                                        <span class="prod-full-screen">
                                            <i class="fas fa-search"></i>
                                        </span>
                                    </div>
                                    <!-- End .post-media -->

                                    <div class="post-body border-0 text-center text-sm-left">
                                        <h2 class="post-title">
                                            <a href="/porto/single.html">Top Cosmetics Collection</a>
                                        </h2>
                                        <div class="post-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non
                                                placerat mi.
                                                Etiam non tellus sem. Aenean...</p>
                                        </div>
                                        <!-- End .post-content -->
                                        <a href="/porto/single.html" class="post-comment">
                                            <i class="far fa-comments m-r-1"></i>0 COMMENTS</a>
                                    </div>
                                    <!-- End .post-body -->
                                </article>
                                <!-- End .post -->

                                <article class="post d-sm-flex d-block align-items-center mb-0">
                                    <div class="post-media position-relative ml-auto mr-auto mb-sm-0">
                                        <a href="/porto/single.html">
                                            <img src="/porto/assets/images/elements/post/type4/1-2.jpg" alt="Post" width="265"
                                                height="220"
                                                data-zoom-image="/porto/assets/images/elements/post/type4/1-2.jpg">
                                        </a>
                                        <div class="post-date">
                                            <span class="day">26</span>
                                            <span class="month">FEB</span>
                                        </div>
                                        <span class="prod-full-screen">
                                            <i class="fas fa-search"></i>
                                        </span>
                                    </div>
                                    <!-- End .post-media -->

                                    <div class="post-body border-0 text-center text-sm-left">
                                        <h2 class="post-title">
                                            <a href="/porto/single.html">Post Format Standard</a>
                                        </h2>
                                        <div class="post-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non
                                                placerat mi.
                                                Etiam non tellus sem. Aenean...</p>
                                        </div>
                                        <!-- End .post-content -->
                                        <a href="/porto/single.html" class="post-comment">
                                            <i class="far fa-comments m-r-1"></i>0 COMMENTS</a>
                                    </div>
                                    <!-- End .post-body -->
                                </article>
                                <!-- End .post -->
                            </div>
                        </div>

                        <div class="col-md-5 col-lg-6">
                            <h2 class="section-title">Latest Product Reviews</h2>

                            <div class="owl-carousel owl-theme" data-owl-options="{
                                    'autoplay': false,
                                    'autoHeight': true
                                }">
                                <div class="testimonial bg-white">
                                    <div class="testimonial-owner">
                                        <figure>
                                            <img src="/porto/assets/images/elements/post/type4/2-1.jpg" alt="client" width="96"
                                                height="96">
                                        </figure>

                                        <div class="testi-content">
                                            <div class="ratings-container mb-1">
                                                <div class="product-ratings">
                                                    <div class="ratings" style="width: 80%"></div>
                                                </div>
                                            </div>

                                            <h4 class="testimonial-title p-0">Fashion High Hill</h4>

                                            <blockquote class="ml-3 pr-0">
                                                <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing dolor sit
                                                    amet,
                                                    consectetur elitad adipiscin.
                                                </p>
                                            </blockquote>

                                            <h5 class="testi-author">by Joe Doe</h5>
                                        </div>
                                    </div>
                                </div>
                                <!-- End .testimonial -->

                                <div class="testimonial bg-white">
                                    <div class="testimonial-owner">
                                        <figure>
                                            <img src="/porto/assets/images/elements/post/type4/2-2.jpg" alt="client" width="96"
                                                height="96">
                                        </figure>

                                        <div class="testi-content">
                                            <div class="ratings-container mb-1">
                                                <div class="product-ratings">
                                                    <div class="ratings" style="width: 80%"></div>
                                                </div>
                                            </div>

                                            <h4 class="testimonial-title p-0">Summer High Hill</h4>

                                            <blockquote class="ml-3 pr-0">
                                                <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing dolor sit
                                                    amet,
                                                    consectetur elitad adipiscin.</p>
                                            </blockquote>

                                            <h5 class="testi-author">by Joe Doe</h5>
                                        </div>
                                    </div>
                                </div>
                                <!-- End .testimonial -->
                            </div>
                            <!-- End .testimonial-slider -->
                        </div>
                    </div>
                </div>
            </section>

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
