@props(['items'])

@php
    // items: [['text' => 'Home', 'url' => '/porto/demo4.html', 'icon' => 'icon-home'], ['text' => 'Men'], ['text' => 'Accessories', 'active' => true]]
@endphp

<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <ol class="breadcrumb">
        @foreach($items as $item)
            <li class="breadcrumb-item {{ isset($item['active']) && $item['active'] ? 'active' : '' }}" 
                @if(isset($item['active']) && $item['active']) aria-current="page" @endif>
                @if(isset($item['url']) && !isset($item['active']))
                    <a href="{{ $item['url'] }}">
                        @if(isset($item['icon']))
                            <i class="{{ $item['icon'] }}"></i>
                        @else
                            {{ $item['text'] }}
                        @endif
                    </a>
                @else
                    {{ $item['text'] }}
                @endif
            </li>
        @endforeach
    </ol>
</nav>

