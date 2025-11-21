@extends('layouts.porto')

@section('top-notice')
    @include('pages.top-notice')
@endsection

@section('header')
    @include('pages.header')
@endsection

@section('footer')
    @include('pages.footer')
@endsection

@section('content')
<nav aria-label="breadcrumb" class="breadcrumb-nav">
				<div class="container">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('page', ['page' => 'index']) }}"><i class="icon-home"></i></a></li>
						<li class="breadcrumb-item active" aria-current="page">{{ __('Blog') }}</li>
					</ol>
				</div><!-- End .container -->
			</nav>

			<div class="container">
				<div class="row">
					<div class="col-lg-9">
						<div class="blog-section row">
                            @forelse($blogPosts as $post)
							<div class="col-md-6 col-lg-4">
								<article class="post">
									<div class="post-media">
										<a href="{{ route('page', ['page' => 'single', 'post' => $post->slug]) }}">
											<img src="{{ $post->featured_image ?? '/porto/assets/images/blog/home/post-1.jpg' }}" alt="{{ $post->title }}" width="225"
												height="280">
										</a>
										<div class="post-date">
											<span class="day">{{ optional($post->published_at)->format('d') }}</span>
											<span class="month">{{ optional($post->published_at)->format('M') }}</span>
										</div>
									</div><!-- End .post-media -->

									<div class="post-body">
										<h2 class="post-title">
											<a href="{{ route('page', ['page' => 'single', 'post' => $post->slug]) }}">{{ $post->title }}</a>
										</h2>
										<div class="post-content">
											<p>{{ $post->excerpt ?? \Illuminate\Support\Str::limit(strip_tags($post->content), 120) }}</p>
										</div><!-- End .post-content -->
										<a href="{{ route('page', ['page' => 'single', 'post' => $post->slug]) }}" class="post-comment">
                                            {{ optional($post->published_at)->format('F d, Y') }}
                                        </a>
									</div><!-- End .post-body -->
								</article><!-- End .post -->
							</div>
                            @empty
                                <div class="col-12">
                                    <p class="text-muted">{{ __('Blog posts will appear here once you publish content from the admin panel.') }}</p>
                                </div>
                            @endforelse
						</div>

                        @if($blogPosts instanceof \Illuminate\Contracts\Pagination\Paginator)
                            <div class="mt-4">
                                {{ $blogPosts->withQueryString()->links() }}
                            </div>
                        @endif
					</div><!-- End .col-lg-9 -->

					<div class="sidebar-toggle custom-sidebar-toggle">
						<i class="fas fa-sliders-h"></i>
					</div>
					<div class="sidebar-overlay"></div>
					<aside class="sidebar mobile-sidebar col-lg-3">
						<div class="sidebar-wrapper" data-sticky-sidebar-options='{"offsetTop": 72}'>
							<div class="widget widget-categories">
								<h4 class="widget-title">{{ __('Blog Categories') }}</h4>

								<ul class="list">
                                    @forelse($blogCategories ?? [] as $category)
                                        <li>
                                            <a href="{{ route('page', ['page' => 'shop', 'category' => $category['slug']]) }}">
                                                {{ $category['name'] }}
                                            </a>
                                            @if(!empty($category['children']))
                                                <ul class="list">
                                                    @foreach($category['children'] as $child)
                                                        <li>
                                                            <a href="{{ route('page', ['page' => 'shop', 'category' => $child['slug']]) }}">
                                                                {{ $child['name'] }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @empty
                                        <li>{{ __('Category not found') }}</li>
                                    @endforelse
								</ul>
							</div><!-- End .widget -->

							<div class="widget widget-post">
								<h4 class="widget-title">{{ __('Recent Posts') }}</h4>

								<ul class="simple-post-list">
                                    @forelse($recentPosts ?? [] as $recent)
									<li>
										<div class="post-media">
											<a href="{{ route('page', ['page' => 'single', 'post' => $recent->slug]) }}">
												<img src="{{ $recent->featured_image ?? '/porto/assets/images/blog/widget/post-1.jpg' }}" alt="{{ $recent->title }}">
											</a>
										</div><!-- End .post-media -->
										<div class="post-info">
											<a href="{{ route('page', ['page' => 'single', 'post' => $recent->slug]) }}">{{ $recent->title }}</a>
											<div class="post-meta">{{ optional($recent->published_at)->format('F d, Y') }}</div>
											<!-- End .post-meta -->
										</div><!-- End .post-info -->
									</li>
                                    @empty
                                        <li>
                                            <span class="text-muted">{{ __('No blog posts yet') }}</span>
                                        </li>
                                    @endforelse
								</ul>
							</div><!-- End .widget -->

							<div class="widget">
								<h4 class="widget-title">{{ __('Tags') }}</h4>

								<div class="tagcloud">
                                    @forelse($blogTags ?? [] as $tag)
									    <a href="{{ route('page', ['page' => 'shop', 'tag' => $tag->slug]) }}">{{ strtoupper($tag->name) }}</a>
                                    @empty
                                        <span class="text-muted">{{ __('Tag not found') }}</span>
                                    @endforelse
								</div><!-- End .tagcloud -->
							</div><!-- End .widget -->
						</div><!-- End .sidebar-wrapper -->
					</aside><!-- End .col-lg-3 -->
				</div><!-- End .row -->
			</div><!-- End .container -->
@endsection
