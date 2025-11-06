@props([
    'icon',
    'title',
    'subtitle' => null,
    'description',
    'animationName' => null,
    'animationDelay' => null,
    'class' => 'col-md-4',
])

<div class="{{ $class }} appear-animate" 
     @if($animationName) data-animation-name="{{ $animationName }}" @endif
     @if($animationDelay) data-animation-delay="{{ $animationDelay }}" @endif>
    <div class="feature-box feature-box-simple text-center">
        <i class="{{ $icon }}"></i>
        <div class="feature-box-content p-0">
            <h3 class="mb-0 pb-1">{{ $title }}</h3>
            @if($subtitle)
                <h5 class="mb-1 pb-1">{{ $subtitle }}</h5>
            @endif
            <p>{{ $description }}</p>
        </div>
        <!-- End .feature-box-content -->
    </div>
    <!-- End .feature-box -->
</div>
<!-- End .col-md-4 -->

