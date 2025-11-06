@props([
    'title',
    'url',
    'image',
    'zoomImage' => null,
    'day' => null,
    'month' => null,
    'excerpt' => null,
    'readMoreText' => 'read more',
])

<article class="post">
    <div class="post-media">
        <a href="{{ $url }}">
            <img src="{{ $image }}" 
                 @if($zoomImage) data-zoom-image="{{ $zoomImage }}" @endif
                 width="280" 
                 height="209" 
                 alt="Post">
        </a>
        @if($day && $month)
            <div class="post-date">
                <span class="day">{{ $day }}</span>
                <span class="month">{{ $month }}</span>
            </div>
            <!-- End .post-date -->
        @endif
        <span class="prod-full-screen">
            <i class="fas fa-search"></i>
        </span>
    </div>
    <!-- End .post-media -->
    <div class="post-body">
        <h2 class="post-title">
            <a href="{{ $url }}">{{ $title }}</a>
        </h2>
        @if($excerpt)
            <div class="post-content">
                <p>{{ $excerpt }}</p>
                <a href="{{ $url }}" class="read-more">{{ $readMoreText }} <i class="icon-right-open"></i></a>
            </div>
            <!-- End .post-content -->
        @endif
    </div>
    <!-- End .post-body -->
</article>

