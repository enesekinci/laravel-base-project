@props(['icon', 'title', 'description', 'class' => 'col-lg-4'])

<div class="info-box info-box-icon-left {{ $class }}">
    <i class="{{ $icon }}"></i>

    <div class="info-box-content">
        <h4>{{ $title }}</h4>
        <p class="text-body">{{ $description }}</p>
    </div>
    <!-- End .info-box-content -->
</div>
<!-- End .info-box -->

