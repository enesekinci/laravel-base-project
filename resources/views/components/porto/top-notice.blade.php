@if(isset($topNotice) && $topNotice)
<div class="top-notice {{ $topNotice['text_color'] ?? 'text-white' }} {{ $topNotice['background_color'] ?? 'bg-dark' }}">
    <div class="container text-center">
        <h5 class="d-inline-block mb-0">{!! $topNotice['text'] ?? '' !!}</h5>
        @if(isset($topNotice['links']) && is_array($topNotice['links']))
            @foreach($topNotice['links'] as $link)
                @if(!empty($link['label']) && !empty($link['url']))
                    <a href="{{ $link['url'] }}" class="category">{{ $link['label'] }}</a>
                @endif
            @endforeach
        @endif
        @if(!empty($topNotice['footer_text']))
            <small>{{ $topNotice['footer_text'] }}</small>
        @endif
        <button title="Close (Esc)" type="button" class="mfp-close">×</button>
    </div>
</div>
<!-- End .top-notice -->
@endif

