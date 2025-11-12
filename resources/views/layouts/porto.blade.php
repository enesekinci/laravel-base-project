<!DOCTYPE html>
<html lang="en">

@include('components.porto.head', [
    'title' => $title ?? 'Porto - Bootstrap eCommerce Template',
    'keywords' => $keywords ?? 'HTML5 Template',
    'description' => $description ?? 'Porto - Bootstrap eCommerce Template',
    'demoCss' => $demoCss ?? 'demo1',
])

<body
@if(isset($bodyClass) && $bodyClass)
 class="{{ $bodyClass }}"
@endif
@if(isset($bodyAttributes) && $bodyAttributes)
 {{ $bodyAttributes }}
@endif>
    @include('components.porto.loading-overlay')
    <div class="page-wrapper">
        @hasSection('top-notice')
            @yield('top-notice')
        @elseif(isset($topNotice) && $topNotice)
            @include('components.porto.top-notice')
        @endif

        @hasSection('header')
            @yield('header')
        @else
            @include('components.porto.header')
        @endif

        <main class="main{{ $mainClass ? ' ' . $mainClass : '' }}">
            @yield('content')
        </main>

        @hasSection('footer')
            @yield('footer')
        @else
            @include('components.porto.footer')
        @endif
    </div>

    @include('components.porto.mobile-menu-overlay')
    @include('components.porto.mobile-menu')
    @hasSection('sticky-navbar')
        @yield('sticky-navbar')
    @else
        @include('components.porto.sticky-navbar')
    @endif
    @include('components.porto.newsletter-popup')
    @include('components.porto.scroll-top')

    @include('components.porto.scripts')
</body>

</html>

