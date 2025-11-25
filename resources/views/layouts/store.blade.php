<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <title>@yield('title', 'Home') | Fast Commerce</title>

        <meta name="keywords" content="@yield('keywords', 'Fast Commerce')" />
        <meta name="description" content="@yield('description', 'Fast Commerce')" />
        <meta name="author" content="@yield('author', 'Fast Commerce')" />

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

        <script>
            WebFontConfig = {
                google: {
                    families: ['Open+Sans:300,400,600,700,800', 'Poppins:300,400,500,600,700,800', 'Oswald:300,400,500,600,700,800'],
                },
            }
            ;(function (d) {
                var wf = d.createElement('script'),
                    s = d.scripts[0]
                wf.src = '{{ asset('porto/assets/js/webfont.js') }}'
                wf.async = true
                s.parentNode.insertBefore(wf, s)
            })(document)
        </script>

        <!-- Plugins CSS File -->
        <link rel="stylesheet" href="{{ asset('porto/assets/css/bootstrap.min.css') }}" />

        <!-- Main CSS File -->
        <link rel="stylesheet" href="{{ asset('porto/assets/css/demo4.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('porto/assets/vendor/fontawesome-free/css/all.min.css') }}" />
        @stack('styles')
    </head>

    <body>
        <div class="page-wrapper">
            @include('layouts.store.components.top-notice')

            @include('layouts.store.components.header')

            <main class="main">
                @yield('content')
            </main>
            <!-- End .main -->

            @include('layouts.store.components.footer')
        </div>
        <!-- End .page-wrapper -->

        <div class="loading-overlay">
            <div class="bounce-loader">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>

        <div class="mobile-menu-overlay"></div>
        <!-- End .mobil-menu-overlay -->

        @include('layouts.store.components.mobile-menu')

        <div class="sticky-navbar">
            <div class="sticky-info">
                <a href="demo4.html">
                    <i class="icon-home"></i>
                    Home
                </a>
            </div>
            <div class="sticky-info">
                <a href="category.html" class="">
                    <i class="icon-bars"></i>
                    Categories
                </a>
            </div>
            <div class="sticky-info">
                <a href="wishlist.html" class="">
                    <i class="icon-wishlist-2"></i>
                    Wishlist
                </a>
            </div>
            <div class="sticky-info">
                <a href="login.html" class="">
                    <i class="icon-user-2"></i>
                    Account
                </a>
            </div>
            <div class="sticky-info">
                <a href="cart.html" class="">
                    <i class="icon-shopping-cart position-relative">
                        <span class="cart-count badge-circle">3</span>
                    </i>
                    Cart
                </a>
            </div>
        </div>

        @include('layouts.store.components.newsletter-popup')

        <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

        <!-- Plugins JS File -->
        <script src="{{ asset('porto/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('porto/assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('porto/assets/js/optional/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('porto/assets/js/plugins.min.js') }}"></script>
        <script src="{{ asset('porto/assets/js/jquery.appear.min.js') }}"></script>

        <!-- Main JS File -->
        <script src="{{ asset('porto/assets/js/main.min.js') }}"></script>
        @stack('scripts')
    </body>
</html>
