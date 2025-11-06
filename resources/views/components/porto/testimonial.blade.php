@props([
    'name',
    'position',
    'avatar',
    'quote',
])

<div class="testimonial">
    <div class="testimonial-owner">
        <figure>
            <img src="{{ $avatar }}" alt="client">
        </figure>
        <div>
            <h4 class="testimonial-title">{{ $name }}</h4>
            <span>{{ $position }}</span>
        </div>
    </div>
    <!-- End .testimonial-owner -->
    <blockquote class="ml-4 pr-0">
        <p>{{ $quote }}</p>
    </blockquote>
</div>
<!-- End .testimonial -->

