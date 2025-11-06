@props(['tabs'])

@php
    // tabs: [['id' => 'desc', 'title' => 'Description', 'active' => true, 'content' => '...'], ...]
@endphp

<div class="product-single-tabs">
    <ul class="nav nav-tabs" role="tablist">
        @foreach($tabs as $tab)
            <li class="nav-item">
                <a class="nav-link {{ isset($tab['active']) && $tab['active'] ? 'active' : '' }}" 
                   id="product-tab-{{ $tab['id'] }}" 
                   data-toggle="tab"
                   href="#product-{{ $tab['id'] }}-content" 
                   role="tab" 
                   aria-controls="product-{{ $tab['id'] }}-content"
                   aria-selected="{{ isset($tab['active']) && $tab['active'] ? 'true' : 'false' }}">
                    {{ $tab['title'] }}
                    @if(isset($tab['badge']))
                        <span>({{ $tab['badge'] }})</span>
                    @endif
                </a>
            </li>
        @endforeach
    </ul>

    <div class="tab-content">
        @foreach($tabs as $tab)
            <div class="tab-pane fade {{ isset($tab['active']) && $tab['active'] ? 'show active' : '' }}" 
                 id="product-{{ $tab['id'] }}-content" 
                 role="tabpanel"
                 aria-labelledby="product-tab-{{ $tab['id'] }}">
                @if(isset($tab['content']))
                    {!! $tab['content'] !!}
                @else
                    {{ $slot }}
                @endif
            </div>
            <!-- End .tab-pane -->
        @endforeach
    </div>
</div>

