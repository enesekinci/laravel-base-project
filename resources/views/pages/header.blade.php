@php
    $miniCartItems = collect(session('cart.items', []));
    $miniCartCount = $miniCartItems->count();
    $miniCartSubtotal = $miniCartItems->sum(fn($item) => data_get($item, 'subtotal', 0));
    $formattedMiniCartSubtotal = '$' . number_format($miniCartSubtotal, 2);
    $isLoggedIn = auth()->check();
    $accountUrl = $isLoggedIn
        ? route('page', ['page' => 'dashboard'])
        : route('login');
@endphp
<header class="header home">
    <div class="header-top bg-primary text-uppercase">
        <div class="container">
            <div class="header-left">
                <div class="header-dropdown mr-auto mr-sm-3 mr-md-0">
                    <a href="#" class="pl-0"><i class="flag-us flag"></i>ENG</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="#"><i class="flag-us flag mr-2"></i>ENG</a>
                            </li>
                            <li><a href="#"><i class="flag-fr flag mr-2"></i>FRA</a></li>
                        </ul>
                    </div>
                    <!-- End .header-menu -->
                </div>
                <!-- End .header-dropown -->

                <div class="header-dropdown ml-3 pl-1">
                    <a href="#">{{ __('USD') }}</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="#">EUR</a></li>
                            <li><a href="#">USD</a></li>
                        </ul>
                    </div>
                    <!-- End .header-menu -->
                </div>
                <!-- End .header-dropown -->
            </div>
            <!-- End .header-left -->

            <div class="header-right header-dropdowns ml-0 ml-sm-auto">
                <p class="top-message mb-0 d-none d-sm-block">Welcome To Porto!</p>
                <div class="header-dropdown dropdown-expanded mr-3">
                    <a href="#">Links</a>
                    <div class="header-menu">
                        <ul>
                            @foreach($headerMenu ?? [] as $item)
                                @if($item['is_active'] ?? true)
                                    <li>
                                        <a href="{{ $item['url'] ?? '#' }}" @if(($item['target'] ?? '_self') === '_blank') target="_blank" @endif
                                            @if(isset($item['url']) && str_contains($item['url'], 'login')) class="login-link" @endif>
                                            {{ $item['name'] ?? '' }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <!-- End .header-menu -->
                </div>
                <!-- End .header-dropown -->

                <span class="separator"></span>

                <div class="social-icons">
                    <a href="#" class="social-icon social-facebook icon-facebook ml-0" target="_blank"></a>
                    <a href="#" class="social-icon social-twitter icon-twitter ml-0" target="_blank"></a>
                    <a href="#" class="social-icon social-instagram icon-instagram ml-0" target="_blank"></a>
                </div>
                <!-- End .social-icons -->
            </div>
            <!-- End .header-right -->
        </div>
        <!-- End .container -->
    </div>
    <!-- End .header-top -->

    <div class="header-middle text-dark sticky-header">
        <div class="container">
            <div class="header-left col-lg-2 w-auto pl-0">
                <button class="mobile-menu-toggler mr-2" type="button">
                    <i class="fas fa-bars"></i>
                </button>
                <a href="{{ route('page', ['page' => 'index']) }}" class="logo">
                    <img src="{{ $siteSettings['logo'] ?? '/porto/assets/images/logo.png' }}" width="111" height="44" alt="Porto Logo">
                </a>
            </div>
            <!-- End .header-left -->

            <div class="header-right w-lg-max pl-2">
                <div class="header-search header-icon header-search-inline header-search-category w-lg-max">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search-3"></i></a>
                    <form action="{{ route('page', ['page' => 'shop']) }}" method="get">
                        <div class="header-search-wrapper">
                            <input type="search" class="form-control" name="q" id="q" placeholder="{{ __('Search...') }}" required>
                            <div class="select-custom">
                                <select id="cat" name="cat">
                                    {!! category_select_options(null, 'All Categories') !!}
                                </select>
                            </div>
                            <!-- End .select-custom -->
                            <button class="btn icon-magnifier" type="submit"></button>
                        </div>
                        <!-- End .header-search-wrapper -->
                    </form>
                </div>
                <!-- End .header-search -->

                <div class="header-contact d-none d-lg-flex align-items-center pr-xl-5 mr-5 mr-xl-3 ml-5">
                    <i class="icon-phone-2"></i>
                    <h6 class="pt-1 line-height-1">{{ $siteSettings['phone_text'] ?? __('Call us now') }}<a
                            href="tel:{{ $siteSettings['phone'] ?? '' }}" class="d-block text-dark ls-10 pt-1">{{ $siteSettings['phone'] }}</a></h6>
                </div>
                <!-- End .header-contact -->

                <a href="{{ $accountUrl }}" class="header-icon header-icon-user"><i class="icon-user-2"></i></a>

                <a href="{{ route('page', ['page' => 'wishlist']) }}" class="header-icon"><i class="icon-wishlist-2"></i></a>

                <div class="dropdown cart-dropdown" x-data="{
                            cartCount: {{ $miniCartCount }},
                            cartTotal: '{{ $formattedMiniCartSubtotal }}',
                            cartItems: {{ json_encode($miniCartItems) }},
                            
                            init() {
                                window.addEventListener('cart-updated', (event) => {
                                    this.cartCount = event.detail.item_count;
                                    this.cartTotal = event.detail.formatted_total;
                                    this.cartItems = Object.values(event.detail.items);
                                });
                            },

                            removeItem(itemKey) {
                                fetch('{{ route('cart.remove') }}', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    body: JSON.stringify({ item_key: itemKey })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        window.dispatchEvent(new CustomEvent('cart-updated', { detail: data.cart }));
                                    }
                                });
                            }
                        }">
                    <a href="#" title="Cart" class="dropdown-toggle dropdown-arrow cart-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" data-display="static">
                        <i class="minicart-icon"></i>
                        <span class="cart-count badge-circle" x-text="cartCount">{{ $miniCartCount }}</span>
                    </a>

                    <div class="cart-overlay"></div>

                    <div class="dropdown-menu mobile-cart">
                        <a href="#" title="Close (Esc)" class="btn-close">×</a>

                        <div class="dropdownmenu-wrapper custom-scrollbar">
                            <div class="dropdown-cart-header">Shopping Cart</div>
                            <!-- End .dropdown-cart-header -->

                            <div class="dropdown-cart-products">
                                <template x-for="(item, key) in cartItems" :key="key">
                                    <div class="product">
                                        <div class="product-details">
                                            <h4 class="product-title">
                                                <a :href="item.url" x-text="item.name"></a>
                                            </h4>

                                            <span class="cart-product-info">
                                                <span class="cart-product-qty" x-text="item.quantity"></span> × <span
                                                    x-text="item.formatted_unit_price"></span>
                                            </span>
                                        </div>
                                        <!-- End .product-details -->

                                        <figure class="product-image-container">
                                            <a :href="item.url" class="product-image">
                                                <img :src="item.image" :alt="item.name" width="80" height="80">
                                            </a>

                                            <a href="#" class="btn-remove" title="Remove Product" @click.prevent="removeItem(key)"><span>×</span></a>
                                        </figure>
                                    </div>
                                </template>

                                <div x-show="cartItems.length === 0">
                                    <p class="text-center text-muted mb-0 py-3">{{ __('Sepetiniz boş.') }}</p>
                                </div>
                            </div>
                            <!-- End .cart-product -->

                            <div class="dropdown-cart-total">
                                <span>SUBTOTAL:</span>

                                <span class="cart-total-price float-right" x-text="cartTotal">{{ $formattedMiniCartSubtotal }}</span>
                            </div>
                            <!-- End .dropdown-cart-total -->

                            <div class="dropdown-cart-action">
                                <a href="{{ route('page', ['page' => 'cart']) }}" class="btn btn-gray btn-block view-cart">View
                                    Cart</a>
                                <a href="{{ route('page', ['page' => 'checkout']) }}" class="btn btn-dark btn-block">Checkout</a>
                            </div>
                            <!-- End .dropdown-cart-total -->
</header>
