@if(!empty($topNotice))
    @include('components.porto.top-notice')
@else
    <div class="container py-5 text-center text-muted">
        {{ __('Top notice içeriği ayarlardan aktifleştirildiğinde burada görünecek.') }}
    </div>
@endif