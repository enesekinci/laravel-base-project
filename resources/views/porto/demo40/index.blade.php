@extends('layouts.porto')

@section('footer')
    @include('porto.demo40.footer')
@endsection


@section('header')
    @include('porto.demo40.header')
@endsection

@section('content')
<div class="container-fluid p-0">
                <div class="row m-0">
                    <div class="sidebar-overlay"></div>
                    <div class="sidebar-toggle custom-sidebar-toggle"><i class="fas fa-sliders-h"></i></div>
                    <aside class="col-lg-3 order-lg-first sidebar-home mobile-sidebar">
                        <div class="sidebar-wrapper">
                            <div class="side-menu-wrapper text-uppercase border-0 font2">
                                <h2 class="side-menu-title ls-n-10">Specials and Offers</h2>

                                <nav class="side-nav">
                                    <ul class="menu menu-vertical with-icon sf-arrows d-block no-superfish">
                                        <li>
                                            <a href="#" class="p-0"><i class="icon-percent-shape"></i>Special
                                                Offers<span class="sf-with-ul menu-btn"></span></a>

                                            <ul>
                                                <li><a href="#">Special Offers</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#" class="p-0"><i class="icon-business-book"></i>Our
                                                Recipes<span class="sf-with-ul menu-btn"></span></a>

                                            <ul>
                                                <li><a href="#">Our Recipes</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>

                                <h2 class="side-menu-title ls-n-10 pb-2">Departments</h2>

                                <nav class="side-nav">
                                    <ul class="menu menu-vertical sf-arrows d-block no-superfish">
                                        <li>
                                            <a href="/porto/demo40-shop.html">Fruits & Vegetables<span
                                                    class="sf-with-ul menu-btn"></span></a>
                                            <div class="megamenu megamenu-fixed-width megamenu-one">
                                                <div class="row">
                                                    <div class="col-lg-3 mb-1 pb-2">
                                                        <a href="#" class="nolink pl-0 d-lg-none d-block">VARIATION
                                                            1</a>
                                                        <a href="#" class="nolink pl-0">FLESH</a>
                                                        <ul class="submenu">
                                                            <li><a href="/porto/demo40-shop.html">FRUITS</a></li>
                                                            <li><a href="/porto/demo40-shop.html">APPLE</a></li>
                                                            <li><a href="/porto/demo40-shop.html">COCOA</a></li>
                                                            <li><a href="/porto/demo40-shop.html">TOMATO</a></li>
                                                        </ul>

                                                        <a href="#" class="nolink pl-0">COLLECTIVE</a>
                                                        <ul class="submenu">
                                                            <li><a href="/porto/demo40-shop.html">BANANA</a></li>
                                                            <li><a href="/porto/demo40-shop.html">PEAR</a></li>
                                                            <li><a href="/porto/demo40-shop.html">ORANGE</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <a href="#" class="nolink pl-0 d-lg-none d-block">VARIATION
                                                            2</a>
                                                        <a href="#" class="nolink pl-0">SIMPLE</a>
                                                        <ul class="submenu">
                                                            <li><a href="/porto/demo40-shop.html">ACTINDIA</a></li>
                                                            <li><a href="/porto/demo40-shop.html">LEMON</a></li>
                                                            <li><a href="/porto/demo40-shop.html">STRAWBERRY</a></li>
                                                            <li><a href="/porto/demo40-shop.html">KOKA</a></li>
                                                        </ul>

                                                        <a href="#" class="nolink pl-0">VEGETABLES</a>
                                                        <ul class="submenu">
                                                            <li><a href="/porto/demo40-shop.html">BARBECUE</a></li>
                                                            <li><a href="/porto/demo40-shop.html">ONION</a></li>
                                                            <li><a href="/porto/demo40-shop.html">WINTER SNEAKERS</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-5 p-0 d-lg-block d-none">
                                                        <div class="menu-banner menu-banner-2">
                                                            <figure>
                                                                <img src="/porto/assets/images/demoes/demo40/menu-banner-1.jpg" alt="Menu banner" class="product-promo w-100">
                                                            </figure>
                                                            <i>OFF</i>
                                                            <div class="banner-content">
                                                                <h4>
                                                                    <span class="text-dark">UP TO</span><br />
                                                                    <b class="text-dark">50%</b>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 d-lg-block d-none">
                                                        <div class="partners-container row">
                                                            <div class="col-xl-5col">
                                                                <div class="partner">
                                                                    <img src="/porto/assets/images/brands/small/brand1.png" alt="logo image" width="140" height="60"></div>
                                                            </div>
                                                            <div class="col-xl-5col">
                                                                <div class="partner">
                                                                    <img src="/porto/assets/images/brands/small/brand2.png" alt="logo image" width="140" height="60"></div>
                                                            </div>
                                                            <div class="col-xl-5col">
                                                                <div class="partner">
                                                                    <img src="/porto/assets/images/brands/small/brand3.png" alt="logo image" width="140" height="60"></div>
                                                            </div>
                                                            <div class="col-xl-5col">
                                                                <div class="partner">
                                                                    <img src="/porto/assets/images/brands/small/brand4.png" alt="logo image" width="140" height="60"></div>
                                                            </div>
                                                            <div class="col-xl-5col">
                                                                <div class="partner">
                                                                    <img src="/porto/assets/images/brands/small/brand5.png" alt="logo image" width="140" height="60"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End .megamenu -->
                                        </li>
                                        <li>
                                            <a href="/porto/demo40-shop.html">Meat & Seafood<span
                                                    class="sf-with-ul menu-btn"></span></a>
                                            <div class="megamenu megamenu-fixed-width megamenu-two">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <a href="#" class="nolink pl-0">ACCESSORIES</a>
                                                        <ul class="submenu">
                                                            <li><a href="/porto/demo40-shop.html">SEAFOOD</a></li>
                                                            <li><a href="/porto/demo40-shop.html">CABLES & ADAPTERS</a>
                                                            </li>
                                                            <li><a href="/porto/demo40-shop.html">ELECTRONIC CIGARETTES</a>
                                                            </li>
                                                            <li><a href="/porto/demo40-shop.html">BATTERIES</a>
                                                            </li>
                                                            <li><a href="/porto/demo40-shop.html">CHARGERS</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- End .col-lg-4 -->

                                                    <div class="col-lg-3 pl-xl-2">
                                                        <a href="#" class="nolink pl-0">AUDIO & VIDEO</a>
                                                        <ul class="submenu">
                                                            <li><a href="/porto/demo40-shop.html">TELEVISIONS</a></li>
                                                            <li><a href="/porto/demo40-shop.html">TV RECEIVERS</a>
                                                            </li>
                                                            <li><a href="/porto/demo40-shop.html">PROJECTORS</a>
                                                            </li>
                                                            <li><a href="/porto/demo40-shop.html">AUDIO AMPLIFIER</a>
                                                            </li>
                                                            <li><a href="/porto/demo40-shop.html">TV STICKS</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- End .col-lg-4 -->

                                                    <div class="col-lg-3 pl-xl-0">
                                                        <a href="#" class="nolink pl-0">CAMERA & PHOTO</a>
                                                        <ul class="submenu">
                                                            <li><a href="/porto/demo40-shop.html">DiGITAL CAMERAS</a></li>
                                                            <li><a href="/porto/demo40-shop.html">CAMCORDERS</a>
                                                            </li>
                                                            <li><a href="/porto/demo40-shop.html">CAMERA DRONES</a>
                                                            </li>
                                                            <li><a href="/porto/demo40-shop.html">ACTION CAMERAS</a>
                                                            </li>
                                                            <li><a href="/porto/demo40-shop.html">PHOTO SUPPLIES</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- End .col-lg-4 -->

                                                    <div class="col-lg-3 pl-xl-0">
                                                        <a href="#" class="nolink pl-0">LAPTOPS</a>
                                                        <ul class="submenu">
                                                            <li><a href="/porto/demo40-shop.html">GAMING LAPTOPS</a></li>
                                                            <li><a href="/porto/demo40-shop.html">ULTRASLIM LAPTOPS</a>
                                                            </li>
                                                            <li><a href="/porto/demo40-shop.html">TABLETS</a>
                                                            </li>
                                                            <li><a href="/porto/demo40-shop.html">LAPTOP ACCESSORIES</a>
                                                            </li>
                                                            <li><a href="/porto/demo40-shop.html">TABLET ACCESSORIES</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- End .col-lg-4 -->
                                                    <div class="banner-container w-100 pl-3 pr-3 d-lg-block d-none">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="banner banner3 banner-md-vw text-transform-none">
                                                                    <figure>
                                                                        <img src="/porto/assets/images/demoes/demo40/menu-banner-2.jpg" alt="banner">
                                                                    </figure>

                                                                    <div class="banner-layer banner-layer-middle d-flex align-items-center justify-content-end pt-0">
                                                                        <div class="content-left">
                                                                            <h4 class="banner-layer-circle-item mb-0 ls-0">
                                                                                40<sup>%<small
                                                                                        class="ls-0">OFF</small></sup>
                                                                            </h4>
                                                                        </div>
                                                                        <div class="content-right text-right">
                                                                            <h5 class=" ls-0"><del class="d-block m-b-2 text-secondary">$450</del>$270
                                                                            </h5>
                                                                            <h4 class="m-b-1 ls-n-25">Watches</h4>
                                                                            <h3 class="mb-0">HURRY UP!</h3>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- End .banner -->
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="banner banner4 banner-md-vw">
                                                                    <figure>
                                                                        <img src="/porto/assets/images/demoes/demo40/menu-banner-3.jpg" alt="banner">
                                                                    </figure>

                                                                    <div class="banner-layer banner-layer-middle d-flex align-items-end flex-column">
                                                                        <h3 class="text-dark text-right">
                                                                            Electronic<br>Deals</h3>

                                                                        <div class="coupon-sale-content">
                                                                            <h4 class="custom-coupon-sale-text bg-dark text-white d-block font1 text-transform-none">
                                                                                Exclusive COUPON
                                                                            </h4>
                                                                            <h5 class="custom-coupon-sale-text font1 text-dark ls-n-10 p-0">
                                                                                <b class="text-dark">$100</b> OFF</h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- End .banner -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End .row -->
                                            </div>
                                            <!-- End .megamenu -->
                                        </li>
                                        <li>
                                            <a href="#">Eggs & Dairy<span class="sf-with-ul menu-btn"></span></a>

                                            <div class="megamenu megamenu-fixed-width megamenu-three">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <a href="#" class="nolink pl-0 d-flex flex-column"><i
                                                                class="icon-boy-broad-smile"></i>FOR HIM</a>
                                                        <ul class="submenu pb-0">
                                                            <li><a href="/porto/demo40-shop.html">HEALTH & UNTRITION</a></li>
                                                            <li><a href="/porto/demo40-shop.html">BEAUTY & PERSONAL CARE</a>
                                                            </li>
                                                            <li><a href="/porto/demo40-shop.html">GIFTS FOR DAD</a>
                                                            </li>
                                                            <li><a href="/porto/demo40-shop.html">GIFTS FOR GRANDPA</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- End .col-lg-4 -->

                                                    <div class="col-lg-3 pl-xl-2">
                                                        <a href="#" class="nolink pl-0 d-flex flex-column"><i
                                                                class="icon-smiling-girl"></i>FOR HER</a>
                                                        <ul class="submenu pb-0">
                                                            <li><a href="/porto/demo40-shop.html">GIFTS FOR GIRLFRIEND</a></li>
                                                            <li><a href="/porto/demo40-shop.html">PANTRY</a>
                                                            </li>
                                                            <li><a href="/porto/demo40-shop.html">PARTY SUPPLIES</a>
                                                            </li>
                                                            <li><a href="/porto/demo40-shop.html">PARTY SUPPLIES & CRAFTS</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- End .col-lg-4 -->

                                                    <div class="col-lg-3 pl-xl-0">
                                                        <a href="#" class="nolink pl-0 d-flex flex-column"><i
                                                                class="icon-smiling-baby"></i>FOR KIDS</a>
                                                        <ul class="submenu pb-0">
                                                            <li><a href="/porto/demo40-shop.html">BREAD & BAKERY</a></li>
                                                            <li><a href="/porto/demo40-shop.html">BREAD</a>
                                                            </li>
                                                            <li><a href="/porto/demo40-shop.html">BAKERY</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- End .col-lg-4 -->

                                                    <div class="col-lg-3 pl-xl-0">
                                                        <a href="#" class="nolink pl-0 d-flex flex-column"><i
                                                                class="icon-gift-2"></i>BIRTHDAY</a>
                                                        <ul class="submenu pb-0">
                                                            <li><a href="/porto/demo40-shop.html">DELI</a></li>
                                                            <li><a href="/porto/demo40-shop.html">ALCOHOL</a>
                                                            </li>
                                                            <li><a href="/porto/demo40-shop.html">GIFTS FOR MON</a>
                                                            </li>
                                                            <li><a href="/porto/demo40-shop.html">GIFTS FOR GRANDMA</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- End .col-lg-4 -->
                                                </div>
                                                <!-- End .row -->
                                            </div>
                                            <!-- End .megamenu -->
                                        </li>
                                        <li>
                                            <a href="/porto/demo40-shop.html">Snacks & Candy<span
                                                    class="sf-with-ul menu-btn"></span></a>
                                            <div class="megamenu megamenu-fixed-width megamenu-four">
                                                <div class="row">
                                                    <div class="col-lg-4 mb-1 pb-2">
                                                        <a href="#" class="nolink pl-0 d-lg-none d-block">VARIATION
                                                            1</a>
                                                        <a href="#" class="nolink pl-0">FURNITURE</a>
                                                        <ul class="submenu">
                                                            <li><a href="/porto/demo40-shop.html">BEAUTY & PERSONAL CARE</a>
                                                            </li>
                                                            <li><a href="/porto/demo40-shop.html">SOF & COUCHES</a></li>
                                                            <li><a href="/porto/demo40-shop.html">ARMCHARIRS</a></li>
                                                            <li><a href="/porto/demo40-shop.html">BED FRAMES</a></li>
                                                            <li><a href="/porto/demo40-shop.html">BEDSIDE TABLES</a></li>
                                                            <li><a href="/porto/demo40-shop.html">BRESSING TABLES</a></li>
                                                        </ul>

                                                        <a href="#" class="nolink pl-0">HOME ACCESSORIES</a>
                                                        <ul class="submenu pb-0">
                                                            <li><a href="/porto/demo40-shop.html">DECORATIVE ACCESSORIES</a>
                                                            </li>
                                                            <li><a href="/porto/demo40-shop.html">CANDLES & HOLDERS</a></li>
                                                            <li><a href="/porto/demo40-shop.html">HOME FRAGRANCE</a></li>
                                                            <li><a href="/porto/demo40-shop.html">MIRRORS</a></li>
                                                            <li><a href="/porto/demo40-shop.html">CLOCKS</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <a href="#" class="nolink pl-0 d-lg-none d-block">VARIATION
                                                            2</a>
                                                        <a href="#" class="nolink pl-0">LIGHTING</a>
                                                        <ul class="submenu">
                                                            <li><a href="/porto/demo40-shop.html">LIGHT BULBS</a></li>
                                                            <li><a href="/porto/demo40-shop.html">LAMPS</a></li>
                                                            <li><a href="/porto/demo40-shop.html">CEILING LIGHTS</a></li>
                                                            <li><a href="/porto/demo40-shop.html">WALL LIGHTS</a></li>
                                                            <li><a href="/porto/demo40-shop.html">BATHROOM LIGHTING</a></li>
                                                            <li><a href="/porto/demo40-shop.html">OUTDOOR LIGHTING</a></li>
                                                        </ul>

                                                        <a href="#" class="nolink pl-0">GARDEN & OUTDOORS</a>
                                                        <ul class="submenu pb-0">
                                                            <li><a href="/porto/demo40-shop.html">GARDEN FURNITURE</a></li>
                                                            <li><a href="/porto/demo40-shop.html">LAWN MOWERS</a></li>
                                                            <li><a href="/porto/demo40-shop.html">PRESSURE WASHERS</a></li>
                                                            <li><a href="/porto/demo40-shop.html">ALL ARDEN TOOLS &
                                                                    EQUIPMENT</a></li>
                                                            <li><a href="/porto/demo40-shop.html">BARBECURE & OUTDOOR
                                                                    DINING</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-4 d-lg-block d-none">
                                                        <div class="product-widgets-container">
                                                            <div class="product-default left-details product-widget">
                                                                <figure>
                                                                    <a href="/porto/demo40-product.html">
                                                                        <img src="/porto/assets/images/demoes/demo40/products/product-24.jpg" width="84" height="84" alt="product">
                                                                    </a>
                                                                </figure>

                                                                <div class="product-details">
                                                                    <h3 class="product-title">
                                                                        <a href="/porto/demo40-product.html">Ultimate 3D
                                                                            Bluetooth
                                                                            Speaker</a>
                                                                    </h3>

                                                                    <div class="ratings-container">
                                                                        <div class="product-ratings">
                                                                            <span class="ratings" style="width:100%"></span>
                                                                            <!-- End .ratings -->
                                                                            <span class="tooltiptext tooltip-top"></span>
                                                                        </div>
                                                                        <!-- End .product-ratings -->
                                                                    </div>
                                                                    <!-- End .product-container -->

                                                                    <div class="price-box">
                                                                        <span class="product-price">$49.00</span>
                                                                    </div>
                                                                    <!-- End .price-box -->
                                                                </div>
                                                                <!-- End .product-details -->
                                                            </div>

                                                            <div class="product-default left-details product-widget">
                                                                <figure>
                                                                    <a href="/porto/demo40-product.html">
                                                                        <img src="/porto/assets/images/demoes/demo40/products/product-23.jpg" width="84" height="84" alt="product">
                                                                    </a>
                                                                </figure>

                                                                <div class="product-details">
                                                                    <h3 class="product-title">
                                                                        <a href="/porto/demo40-product.html">Brown Women Casual
                                                                            HandBag</a>
                                                                    </h3>

                                                                    <div class="ratings-container">
                                                                        <div class="product-ratings">
                                                                            <span class="ratings" style="width:100%"></span>
                                                                            <!-- End .ratings -->
                                                                            <span class="tooltiptext tooltip-top">5.00</span>
                                                                        </div>
                                                                        <!-- End .product-ratings -->
                                                                    </div>
                                                                    <!-- End .product-container -->

                                                                    <div class="price-box">
                                                                        <span class="product-price">$49.00</span>
                                                                    </div>
                                                                    <!-- End .price-box -->
                                                                </div>
                                                                <!-- End .product-details -->
                                                            </div>

                                                            <div class="product-default left-details product-widget">
                                                                <figure>
                                                                    <a href="/porto/demo40-product.html">
                                                                        <img src="/porto/assets/images/demoes/demo40/products/product-12.jpg" width="84" height="84" alt="product">
                                                                    </a>
                                                                </figure>

                                                                <div class="product-details">
                                                                    <h3 class="product-title">
                                                                        <a href="/porto/demo40-product.html">Circled Ultimate
                                                                            3D
                                                                            Speaker</a>
                                                                    </h3>

                                                                    <div class="ratings-container">
                                                                        <div class="product-ratings">
                                                                            <span class="ratings" style="width:100%"></span>
                                                                            <!-- End .ratings -->
                                                                            <span class="tooltiptext tooltip-top"></span>
                                                                        </div>
                                                                        <!-- End .product-ratings -->
                                                                    </div>
                                                                    <!-- End .product-container -->

                                                                    <div class="price-box">
                                                                        <span class="product-price">$49.00</span>
                                                                    </div>
                                                                    <!-- End .price-box -->
                                                                </div>
                                                                <!-- End .product-details -->
                                                            </div>

                                                            <div class="product-default left-details product-widget">
                                                                <figure>
                                                                    <a href="/porto/demo40-product.html">
                                                                        <img src="/porto/assets/images/demoes/demo40/products/product-6.jpg" width="84" height="84" alt="product">
                                                                    </a>
                                                                </figure>

                                                                <div class="product-details">
                                                                    <h3 class="product-title">
                                                                        <a href="/porto/demo40-product.html">Circled Ultimate
                                                                            3D
                                                                            Speaker</a>
                                                                    </h3>

                                                                    <div class="ratings-container">
                                                                        <div class="product-ratings">
                                                                            <span class="ratings" style="width:100%"></span>
                                                                            <!-- End .ratings -->
                                                                            <span class="tooltiptext tooltip-top"></span>
                                                                        </div>
                                                                        <!-- End .product-ratings -->
                                                                    </div>
                                                                    <!-- End .product-container -->

                                                                    <div class="price-box">
                                                                        <span class="product-price">$49.00</span>
                                                                    </div>
                                                                    <!-- End .price-box -->
                                                                </div>
                                                                <!-- End .product-details -->
                                                            </div>

                                                            <div class="product-default left-details product-widget">
                                                                <figure>
                                                                    <a href="/porto/demo40-product.html">
                                                                        <img src="/porto/assets/images/demoes/demo40/products/product-5.jpg" width="84" height="84" alt="product">
                                                                    </a>
                                                                </figure>

                                                                <div class="product-details">
                                                                    <h3 class="product-title">
                                                                        <a href="/porto/demo40-product.html">Circled Ultimate
                                                                            3D
                                                                            Speaker</a>
                                                                    </h3>

                                                                    <div class="ratings-container">
                                                                        <div class="product-ratings">
                                                                            <span class="ratings" style="width:100%"></span>
                                                                            <!-- End .ratings -->
                                                                            <span class="tooltiptext tooltip-top"></span>
                                                                        </div>
                                                                        <!-- End .product-ratings -->
                                                                    </div>
                                                                    <!-- End .product-container -->

                                                                    <div class="price-box">
                                                                        <span class="product-price">$49.00</span>
                                                                    </div>
                                                                    <!-- End .price-box -->
                                                                </div>
                                                                <!-- End .product-details -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End .row -->
                                            </div>
                                            <!-- End .megamenu -->
                                        </li>
                                        <li>
                                            <a href="/porto/demo40-shop.html">Beverages<span
                                                    class="sf-with-ul menu-btn"></span></a>
                                            <div class="megamenu megamenu-fixed-width megamenu-five text-transform-none" style="background-image: url(/porto/assets/images/demoes/demo40/menu-banner-4.jpg);">
                                                <div class="row">
                                                    <div class="col-lg-4 pt-0">
                                                        <a href="#" class="nolink pl-0">INSTRUMENTS</a>
                                                        <ul class="submenu bg-transparent">
                                                            <li><a href="/porto/demo40-shop.html">Beverages</a>
                                                            </li>
                                                            <li><a href="/porto/demo40-shop.html">Guitar</a></li>
                                                            <li><a href="/porto/demo40-shop.html">Drums Sets</a></li>
                                                            <li><a href="/porto/demo40-shop.html">Percussions</a></li>
                                                            <li><a href="/porto/demo40-shop.html">Pedals & Effects</a></li>
                                                            <li><a href="/porto/demo40-shop.html">Sound Cards</a></li>
                                                            <li><a href="/porto/demo40-shop.html">Studio Equipments</a></li>
                                                            <li><a href="/porto/demo40-shop.html">Piano & Keyboards</a></li>
                                                        </ul>

                                                        <a href="#" class="nolink pl-0">EXTRA</a>
                                                        <ul class="submenu bg-transparent pb-0">
                                                            <li><a href="/porto/demo40-shop.html">Alcohol</a>
                                                            </li>
                                                            <li><a href="/porto/demo40-shop.html">Strings</a></li>
                                                            <li><a href="/porto/demo40-shop.html">Recorders</a></li>
                                                            <li><a href="/porto/demo40-shop.html">Amplifiers</a></li>
                                                            <li><a href="/porto/demo40-shop.html">Accessories</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-8 pt-0 d-lg-block d-none">
                                                        <div class="banner banner1 mb-2 h-100 d-flex align-items-center">
                                                            <div class="banner-layer text-right pt-0">
                                                                <h6 class="text-transform-none">
                                                                    CHECK NEW ARRIVALS
                                                                </h6>
                                                                <h3 class=" text-white">PROFESSIONAL</h3>
                                                                <h2 class="text-transform-none text-white">
                                                                    HEADPHONES</h2>
                                                                <a href="/porto/demo40-shop.html" class="btn btn-dark">VIEW
                                                                    ALL NOW</a>
                                                            </div>
                                                            <!-- End .banner-layer -->
                                                        </div>
                                                        <!-- End .home-slide -->
                                                    </div>
                                                </div>
                                                <!-- End .row -->
                                            </div>
                                            <!-- End .megamenu -->
                                        </li>
                                        <li>
                                            <a href="/porto/demo40-shop.html">Alcohol<span
                                                    class="sf-with-ul menu-btn"></span></a>
                                            <ul>
                                                <li><a href="/porto/demo40-shop.html">Alcohol</a></li>
                                                <li><a href="/porto/demo40-shop.html">Beverages</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="/porto/demo40-shop.html">Frozen<span
                                                    class="sf-with-ul menu-btn"></span></a>
                                            <ul>
                                                <li><a href="/porto/demo40-shop.html">Alcohol</a></li>
                                                <li><a href="/porto/demo40-shop.html">Beverages</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="/porto/demo40-shop.html">Organic Shop<span
                                                    class="sf-with-ul menu-btn"></span></a>
                                            <ul>
                                                <li><a href="/porto/demo40-shop.html">Organic Shop</a></li>
                                                <li><a href="/porto/demo40-shop.html">Health & Nutrition</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="/porto/demo40-shop.html">Household Essentials<span
                                                    class="sf-with-ul menu-btn"></span></a>
                                            <ul>
                                                <li><a href="/porto/demo40-shop.html">Household Essentials</a></li>
                                                <li><a href="/porto/demo40-shop.html">Home, Kitchen & Dine</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="/porto/demo40-shop.html">Health & Nutrition<span
                                                    class="sf-with-ul menu-btn"></span></a>
                                            <ul>
                                                <li><a href="/porto/demo40-shop.html">Health & Nutrition</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="/porto/demo40-shop.html">Beauty & Personal Care<span
                                                    class="sf-with-ul menu-btn"></span></a>
                                            <ul>
                                                <li><a href="/porto/demo40-shop.html">Beauty & Personal Care</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="/porto/demo40-shop.html">Baby<span class="sf-with-ul menu-btn"></span></a>
                                            <ul>
                                                <li><a href="/porto/demo40-shop.html">Baby</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="/porto/demo40-shop.html">Pets<span class="sf-with-ul menu-btn"></span></a>
                                            <ul>
                                                <li><a href="/porto/demo40-shop.html">Pets</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="/porto/demo40-shop.html">Party Supplies & Crafts<span
                                                    class="sf-with-ul menu-btn"></span></a>
                                            <ul>
                                                <li><a href="/porto/demo40-shop.html">Party Supplies & Crafts</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="/porto/demo40-shop.html">Home, Kitchen & Dine<span
                                                    class="sf-with-ul menu-btn"></span></a>
                                            <ul>
                                                <li><a href="/porto/demo40-shop.html">Home, Kitchen & Dine</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="/porto/demo40-shop.html">Office & Electronics<span
                                                    class="sf-with-ul menu-btn"></span></a>
                                            <ul>
                                                <li><a href="/porto/demo40-shop.html">Office & Electronics</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="/porto/demo40-shop.html">Garden & Tools<span
                                                    class="sf-with-ul menu-btn"></span></a>
                                            <ul>
                                                <li><a href="/porto/demo40-shop.html">Garden & Tools</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="/porto/demo40-shop.html">Sports & Outdoor<span
                                                    class="sf-with-ul menu-btn"></span></a>
                                            <ul>
                                                <li><a href="/porto/demo40-shop.html">Sports & Outdoor</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="/porto/demo40-shop.html">Toys<span class="sf-with-ul menu-btn"></span></a>
                                            <ul>
                                                <li><a href="/porto/demo40-shop.html">Toys</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="/porto/demo40-shop.html">Clothing<span
                                                    class="sf-with-ul menu-btn"></span></a>
                                            <ul>
                                                <li><a href="/porto/demo40-shop.html">Clothing</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>

                                <h2 class="side-menu-title ls-n-10">Customer Services</h2>

                                <nav class="side-nav">
                                    <ul class="menu menu-vertical main-vertical sf-arrows d-block pb-0 no-superfish">
                                        <li>
                                            <a href="/porto/demo40-shop.html">Shop<span class="sf-with-ul menu-btn"></span></a>
                                            <div class="megamenu megamenu-fixed-width megamenu-3cols">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <a href="#" class="nolink pl-0">VARIATION 1</a>
                                                        <ul class="submenu pb-0">
                                                            <li><a href="/porto/category.html">Fullwidth Banner</a></li>
                                                            <li><a href="/porto/category-banner-boxed-slider.html">Boxed
                                                                    Slider
                                                                    Banner</a>
                                                            </li>
                                                            <li><a href="/porto/category-banner-boxed-image.html">Boxed
                                                                    Image
                                                                    Banner</a>
                                                            </li>
                                                            <li><a href="/porto/demo40-shop.html">Left Sidebar</a></li>
                                                            <li><a href="/porto/category-sidebar-right.html">Right
                                                                    Sidebar</a>
                                                            </li>
                                                            <li><a href="/porto/category-off-canvas.html">Off Canvas
                                                                    Filter</a>
                                                            </li>
                                                            <li><a href="/porto/category-horizontal-filter1.html">Horizontal
                                                                    Filter1</a>
                                                            </li>
                                                            <li><a href="/porto/category-horizontal-filter2.html">Horizontal
                                                                    Filter2</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <a href="#" class="nolink pl-0">VARIATION 2</a>
                                                        <ul class="submenu pb-0">
                                                            <li><a href="/porto/category-list.html">List Types</a></li>
                                                            <li><a href="/porto/category-infinite-scroll.html">Ajax
                                                                    Infinite
                                                                    Scroll</a>
                                                            </li>
                                                            <li><a href="/porto/category.html">3 Columns Products</a></li>
                                                            <li><a href="/porto/category-4col.html">4 Columns Products</a>
                                                            </li>
                                                            <li><a href="/porto/category-5col.html">5 Columns Products</a>
                                                            </li>
                                                            <li><a href="/porto/category-6col.html">6 Columns Products</a>
                                                            </li>
                                                            <li><a href="/porto/category-7col.html">7 Columns Products</a>
                                                            </li>
                                                            <li><a href="/porto/category-8col.html">8 Columns Products</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-4 p-0 d-lg-block d-none">
                                                        <div class="menu-banner">
                                                            <figure>
                                                                <img src="/porto/assets/images/menu-banner.jpg" alt="Menu banner">
                                                            </figure>
                                                            <div class="banner-content">
                                                                <h4>
                                                                    <span class="">UP TO</span><br />
                                                                    <b class="">50%</b>
                                                                    <i>OFF</i>
                                                                </h4>
                                                                <a href="/porto/demo40-shop.html" class="btn btn-sm btn-dark">SHOP
                                                                    NOW</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End .megamenu -->
                                        </li>
                                        <li>
                                            <a href="/porto/demo40-product.html">Products<span
                                                    class="sf-with-ul menu-btn"></span></a>
                                            <div class="megamenu megamenu-fixed-width">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <a href="#" class="nolink pl-0">PRODUCT PAGES</a>
                                                        <ul class="submenu pb-0">
                                                            <li><a href="/porto/product.html">SIMPLE PRODUCT</a></li>
                                                            <li><a href="/porto/product-variable.html">VARIABLE PRODUCT</a>
                                                            </li>
                                                            <li><a href="/porto/product.html">SALE PRODUCT</a></li>
                                                            <li><a href="/porto/product.html">FEATURED & ON SALE</a></li>
                                                            <li><a href="/porto/product-custom-tab.html">WITH CUSTOM
                                                                    TAB</a>
                                                            </li>
                                                            <li><a href="/porto/product-sidebar-left.html">WITH LEFT
                                                                    SIDEBAR</a>
                                                            </li>
                                                            <li><a href="/porto/product-sidebar-right.html">WITH RIGHT
                                                                    SIDEBAR</a>
                                                            </li>
                                                            <li><a href="/porto/product-addcart-sticky.html">ADD CART
                                                                    STICKY</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- End .col-lg-4 -->

                                                    <div class="col-lg-4">
                                                        <a href="#" class="nolink pl-0">PRODUCT LAYOUTS</a>
                                                        <ul class="submenu pb-0">
                                                            <li><a href="/porto/product-extended-layout.html">EXTENDED
                                                                    LAYOUT</a>
                                                            </li>
                                                            <li><a href="/porto/product-grid-layout.html">GRID IMAGE</a>
                                                            </li>
                                                            <li><a href="/porto/product-full-width.html">FULL WIDTH
                                                                    LAYOUT</a>
                                                            </li>
                                                            <li><a href="/porto/product-sticky-info.html">STICKY INFO</a>
                                                            </li>
                                                            <li><a href="/porto/product-sticky-both.html">LEFT & RIGHT
                                                                    STICKY</a>
                                                            </li>
                                                            <li><a href="/porto/product-transparent-image.html">TRANSPARENT
                                                                    IMAGE</a></li>
                                                            <li><a href="/porto/product-center-vertical.html">CENTER
                                                                    VERTICAL</a>
                                                            </li>
                                                            <li><a href="#">BUILD YOUR OWN</a></li>
                                                        </ul>
                                                    </div>
                                                    <!-- End .col-lg-4 -->

                                                    <div class="col-lg-4 p-0 d-lg-block d-none">
                                                        <div class="menu-banner menu-banner-2">
                                                            <figure>
                                                                <img src="/porto/assets/images/menu-banner-1.jpg" alt="Menu banner" class="product-promo">
                                                            </figure>
                                                            <i>OFF</i>
                                                            <div class="banner-content">
                                                                <h4>
                                                                    <span class="">UP TO</span><br />
                                                                    <b class="">50%</b>
                                                                </h4>
                                                            </div>
                                                            <a href="/porto/demo40-shop.html" class="btn btn-sm btn-dark">SHOP
                                                                NOW</a>
                                                        </div>
                                                    </div>
                                                    <!-- End .col-lg-4 -->
                                                </div>
                                                <!-- End .row -->
                                            </div>
                                            <!-- End .megamenu -->
                                        </li>
                                        <li>
                                            <a href="#">Pages<span class="sf-with-ul menu-btn"></span></a>

                                            <ul>
                                                <li><a href="/porto/wishlist.html">Wishlist</a></li>
                                                <li><a href="/porto/cart.html">Shopping Cart</a></li>
                                                <li><a href="/porto/checkout.html">Checkout</a></li>
                                                <li><a href="/porto/dashboard.html">Dashboard</a></li>
                                                <li><a href="/porto/demo40-about.html">About Us</a></li>
                                                <li><a href="#">Blog</a>
                                                    <ul>
                                                        <li><a href="/porto/blog.html">Blog</a></li>
                                                        <li><a href="/porto/single.html">Blog Post</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="/porto/demo40-contact.html">Contact Us</a></li>
                                                <li><a href="/porto/login.html">Login</a></li>
                                                <li><a href="/porto/forgot-password.html">Forgot Password</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="/porto/blog.html">Blog</a></li>
                                        <li><a href="https://1.envato.market/DdLk5" target="_blank">Buy Porto!</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- End .side-menu-container -->
                        </div>
                        <!-- End .sidebar-wrapper -->
                    </aside>
                    <!-- End .col-lg-3 -->

                    <div class="col-lg-9">
                        <div class="main-content">
                            <section class="home-section mb-2">
                                <div class="row">
                                    <div class="col-md-12 col-xl-8 col-lg-12 mb-xl-0 mb-2">
                                        <div class="home-slider slide-animate owl-carousel owl-theme show-nav-hover dot-inside nav-big h-100 text-uppercase" data-owl-options="{
                                                    'loop': false,
                                                    'nav' : false,
                                                    'dots' : true
                                                }">
                                            <div class="home-slide home-slide1 banner">
                                                <img class="slide-bg" src="/porto/assets/images/demoes/demo40/slider/slide-1.jpg" alt="slider image" style="background-color: #c0e1f2;">
                                                <div class="container d-flex align-items-center">
                                                    <div class="banner-layer d-flex flex-column">
                                                        <h6 class="text-transform-none appear-animate" data-animation-name="fadeInDownShorter" data-animation-delay="100">Exclusive Product New Arrival
                                                        </h6>
                                                        <h2 class="text-transform-none appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="600">Condensed Milk</h2>
                                                        <h3 class=" appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="1100">NATURAL PRODUCT</h3>
                                                        <span class="custom-font text-transform-none appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="1100"><span>Extra!</span></span>
                                                        <h5 class=" appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="1400">BREAKFAST PRODUCTS ON SALE</h5>
                                                        <h4 class="d-inline-block appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="1800">
                                                            <sup>UP TO</sup>
                                                            <b class="coupon-sale-text ls-10 text-white align-middle">50%</b>
                                                        </h4>
                                                    </div>
                                                    <!-- End .banner-layer -->
                                                </div>
                                            </div>
                                            <!-- End .home-slide -->

                                            <div class="home-slide home-slide2 banner banner-md-vw">
                                                <img class="slide-bg" src="/porto/assets/images/demoes/demo40/slider/slide-2.jpg" alt="slider image" style="background-color: #d5dade;">
                                                <div class="container d-flex align-items-center">
                                                    <div class="container d-flex align-items-center">
                                                        <div class="banner-layer d-flex flex-column text-right">
                                                            <h6 class="text-transform-none appear-animate" data-animation-name="fadeInDownShorter" data-animation-delay="100">Exclusive Whole Wheat</h6>
                                                            <h2 class="text-transform-none appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="600">Fluffy Pancakes</h2>
                                                            <h3 class=" appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="1100">GOOD OLD FASHIONED</h3>
                                                            <h5 class=" appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="1400">BREAKFAST PRODUCTS ON SALE
                                                            </h5>
                                                            <h4 class="d-inline-block appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="1800">
                                                                <sup>UP TO</sup>
                                                                <b class="coupon-sale-text ls-10 text-white align-middle">50%</b>
                                                            </h4>
                                                        </div>
                                                        <!-- End .banner-layer -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End .home-slide -->
                                        </div>
                                        <!-- End .home-slider -->
                                    </div>
                                    <div class="col-md-12 col-xl-4 col-lg-12 d-sm-flex d-xl-block">
                                        <div class="banner banner1 mb-2 pr-sm-3 pr-0 pr-xl-0">
                                            <img class="slide-bg" src="/porto/assets/images/demoes/demo40/banners/banner-1.jpg" alt="slider image" style="background-color: #d9e2e1;">
                                            <div class="container d-flex align-items-center">
                                                <div class="banner-layer d-flex flex-column pt-0">
                                                    <h6 class="text-transform-none mb-1 appear-animate" data-animation-name="fadeInDownShorter" data-animation-delay="100">Exclusive Product New Arrival
                                                    </h6>
                                                    <h2 class="text-transform-none appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="600">Organic Coffee</h2>
                                                    <h3 class=" appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="1100">SPECIAL BLEND</h3>
                                                    <span class="custom-font text-transform-none appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="1100"><span>Fresh!</span></span>
                                                </div>
                                                <!-- End .banner-layer -->
                                            </div>
                                        </div>
                                        <!-- End .home-slide -->

                                        <div class="banner banner2 pl-sm-3 pl-0 pl-xl-0">
                                            <img class="slide-bg" src="/porto/assets/images/demoes/demo40/banners/banner-2.jpg" alt="slider image" style="background-color: #b48476;">
                                            <div class="container d-flex align-items-center">
                                                <div class="banner-layer d-flex flex-column">
                                                    <h6 class="text-transform-none mb-1 appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200">Stay Healthy</h6>
                                                    <h2 class="text-transform-none text-white ml-0 appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="400">Low Carb</h2>
                                                    <h3 class=" text-white appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="800">STRAWBERRY</h3>
                                                    <span class="custom-font text-transform-none appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="1200"><span
                                                            class="text-white text-transform-none">Sugar-Free</span></span>
                                                </div>
                                                <!-- End .banner-layer -->
                                            </div>
                                        </div>
                                        <!-- End .home-slide -->
                                    </div>
                                </div>
                            </section>

                            <div class="info-boxes-slider owl-carousel owl-theme appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200" data-owl-options="{
                                'dots': false,
                                'loop': false,
                                'responsive': {
                                    '576': {
                                        'items': 2
                                    },
                                    '992': {
                                        'items': 2
                                    },
                                    '1200': {
                                        'items': 3
                                    }
                                }
                            }">
                                <div class="info-box info-box-icon-left">
                                    <i class="icon-shipping mr-3 pr-2"></i>

                                    <div class="info-box-content">
                                        <h4 class="pt-1">Free Shipping and Returns</h4>
                                    </div>
                                    <!-- End .info-box-content -->
                                </div>
                                <!-- End .info-box -->

                                <div class="info-box info-box-icon-left">
                                    <i class="icon-money"></i>

                                    <div class="info-box-content">
                                        <h4 class="ls-n-15">Money Back Guarantee</h4>
                                    </div>
                                    <!-- End .info-box-content -->
                                </div>
                                <!-- End .info-box -->

                                <div class="info-box info-box-icon-left">
                                    <i class="icon-support mr-3 pr-2"></i>

                                    <div class="info-box-content">
                                        <h4>Online Support 24/7</h4>
                                    </div>
                                    <!-- End .info-box-content -->
                                </div>
                                <!-- End .info-box -->
                            </div>
                            <!-- End .info-boxes-slider -->

                            <section class="featured-section appear-animate" data-animation-name="fadeIn" data-animation-delay="100">
                                <div class="heading d-flex align-items-center">
                                    <h2 class="text-transform-none mb-0">Featured Items</h2>
                                    <ul class="nav justify-content-center" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="best-products-tab" data-toggle="tab" href="#best-products" role="tab" aria-controls="best-products" aria-selected="true">Best Sellers</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="new-products-tab" data-toggle="tab" href="#new-products" role="tab" aria-controls="new-products" aria-selected="false">New</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="sale-products-tab" data-toggle="tab" href="#sale-products" role="tab" aria-controls="sale-products" aria-selected="false">On Sale</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="best-products" role="tabpanel" aria-labelledby="best-products-tab">
                                        <div class="products-slider owl-carousel owl-theme owl-nav-top" data-owl-options="{
                                            'margin': 20,
                                            'dots': false,
                                            'nav': true,
                                            'loop': false,
                                            'responsive': {
                                                '0': {
                                                    'items': 2
                                                },
                                                '576': {
                                                    'items': 3
                                                },
                                                '768': {
                                                    'items': 4
                                                },
                                                '992': {
                                                    'items': 4
                                                },
                                                '1500': {
                                                    'items': 6
                                                }
                                            }
                                        }">
                                            <div class="product-default inner-quickview inner-icon">
                                                <figure>
                                                    <a href="/porto/demo40-product.html">
                                                        <img src="/porto/assets/images/demoes/demo40/products/product-1.jpg" width="205" height="205" alt="product">
                                                    </a>

                                                    <div class="btn-icon-group">
                                                        <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                                class="icon-shopping-cart"></i></a>
                                                    </div>
                                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                        View
                                                    </a>
                                                    <div class="product-countdown-container">
                                                        <span class="product-countdown-title">offer ends in:</span>
                                                        <div class="product-countdown countdown-compact" data-until="2021, 10, 5" data-compact="true">
                                                        </div>
                                                        <!-- End .product-countdown -->
                                                    </div>
                                                    <!-- End .product-countdown-container -->
                                                </figure>
                                                <div class="product-details">
                                                    <div class="category-wrap">
                                                        <div class="category-list">
                                                            <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                        </div>
                                                        <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                                class="icon-heart"></i></a>
                                                    </div>
                                                    <h3 class="product-title">
                                                        <a href="/porto/demo40-product.html">Product Short Name</a>
                                                    </h3>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span>
                                                            <!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <!-- End .product-ratings -->
                                                    </div>
                                                    <!-- End .product-container -->

                                                    <div class="price-box">
                                                        <span class="old-price">$90.00</span>
                                                        <span class="product-price">$70.00</span>
                                                    </div>
                                                    <!-- End .price-box -->
                                                </div>
                                                <!-- End .product-details -->
                                            </div>
                                            <div class="product-default inner-quickview inner-icon">
                                                <figure>
                                                    <a href="/porto/demo40-product.html">
                                                        <img src="/porto/assets/images/demoes/demo40/products/product-2.jpg" width="205" height="205" alt="product">
                                                    </a>

                                                    <div class="btn-icon-group">
                                                        <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                                class="icon-shopping-cart"></i></a>
                                                    </div>
                                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                        View
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <div class="category-wrap">
                                                        <div class="category-list">
                                                            <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                        </div>
                                                        <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                                class="icon-heart"></i></a>
                                                    </div>
                                                    <h3 class="product-title">
                                                        <a href="/porto/demo40-product.html">Product Short Name</a>
                                                    </h3>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span>
                                                            <!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <!-- End .product-ratings -->
                                                    </div>
                                                    <!-- End .product-container -->

                                                    <div class="price-box">
                                                        <span class="old-price">$90.00</span>
                                                        <span class="product-price">$70.00</span>
                                                    </div>
                                                    <!-- End .price-box -->
                                                </div>
                                                <!-- End .product-details -->
                                            </div>
                                            <div class="product-default inner-quickview inner-icon">
                                                <figure>
                                                    <a href="/porto/demo40-product.html">
                                                        <img src="/porto/assets/images/demoes/demo40/products/product-3.jpg" width="205" height="205" alt="product">
                                                    </a>

                                                    <div class="btn-icon-group">
                                                        <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                                class="icon-shopping-cart"></i></a>
                                                    </div>
                                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                        View
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <div class="category-wrap">
                                                        <div class="category-list">
                                                            <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                        </div>
                                                        <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                                class="icon-heart"></i></a>
                                                    </div>
                                                    <h3 class="product-title">
                                                        <a href="/porto/demo40-product.html">Product Short Name</a>
                                                    </h3>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span>
                                                            <!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <!-- End .product-ratings -->
                                                    </div>
                                                    <!-- End .product-container -->

                                                    <div class="price-box">
                                                        <span class="old-price">$90.00</span>
                                                        <span class="product-price">$70.00</span>
                                                    </div>
                                                    <!-- End .price-box -->
                                                </div>
                                                <!-- End .product-details -->
                                            </div>
                                            <div class="product-default inner-quickview inner-icon">
                                                <figure>
                                                    <a href="/porto/demo40-product.html">
                                                        <img src="/porto/assets/images/demoes/demo40/products/product-4.jpg" width="205" height="205" alt="product">
                                                    </a>

                                                    <div class="btn-icon-group">
                                                        <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                                class="icon-shopping-cart"></i></a>
                                                    </div>
                                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                        View
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <div class="category-wrap">
                                                        <div class="category-list">
                                                            <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                        </div>
                                                        <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                                class="icon-heart"></i></a>
                                                    </div>
                                                    <h3 class="product-title">
                                                        <a href="/porto/demo40-product.html">Product Short Name</a>
                                                    </h3>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span>
                                                            <!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <!-- End .product-ratings -->
                                                    </div>
                                                    <!-- End .product-container -->

                                                    <div class="price-box">
                                                        <span class="old-price">$90.00</span>
                                                        <span class="product-price">$70.00</span>
                                                    </div>
                                                    <!-- End .price-box -->
                                                </div>
                                                <!-- End .product-details -->
                                            </div>
                                            <div class="product-default inner-quickview inner-icon">
                                                <figure>
                                                    <a href="/porto/demo40-product.html">
                                                        <img src="/porto/assets/images/demoes/demo40/products/product-5.jpg" width="205" height="205" alt="product">
                                                    </a>

                                                    <div class="btn-icon-group">
                                                        <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                                class="icon-shopping-cart"></i></a>
                                                    </div>
                                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                        View
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <div class="category-wrap">
                                                        <div class="category-list">
                                                            <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                        </div>
                                                        <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                                class="icon-heart"></i></a>
                                                    </div>
                                                    <h3 class="product-title">
                                                        <a href="/porto/demo40-product.html">Product Short Name</a>
                                                    </h3>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span>
                                                            <!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <!-- End .product-ratings -->
                                                    </div>
                                                    <!-- End .product-container -->

                                                    <div class="price-box">
                                                        <span class="old-price">$90.00</span>
                                                        <span class="product-price">$70.00</span>
                                                    </div>
                                                    <!-- End .price-box -->
                                                </div>
                                                <!-- End .product-details -->
                                            </div>
                                            <div class="product-default inner-quickview inner-icon">
                                                <figure>
                                                    <a href="/porto/demo40-product.html">
                                                        <img src="/porto/assets/images/demoes/demo40/products/product-6.jpg" width="205" height="205" alt="product">
                                                    </a>

                                                    <div class="btn-icon-group">
                                                        <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                                class="icon-shopping-cart"></i></a>
                                                    </div>
                                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                        View
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <div class="category-wrap">
                                                        <div class="category-list">
                                                            <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                        </div>
                                                        <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                                class="icon-heart"></i></a>
                                                    </div>
                                                    <h3 class="product-title">
                                                        <a href="/porto/demo40-product.html">Product Short Name</a>
                                                    </h3>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span>
                                                            <!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <!-- End .product-ratings -->
                                                    </div>
                                                    <!-- End .product-container -->

                                                    <div class="price-box">
                                                        <span class="old-price">$90.00</span>
                                                        <span class="product-price">$70.00</span>
                                                    </div>
                                                    <!-- End .price-box -->
                                                </div>
                                                <!-- End .product-details -->
                                            </div>
                                            <div class="product-default inner-quickview inner-icon">
                                                <figure>
                                                    <a href="/porto/demo40-product.html">
                                                        <img src="/porto/assets/images/demoes/demo40/products/product-7.jpg" width="205" height="205" alt="product">
                                                    </a>

                                                    <div class="btn-icon-group">
                                                        <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                                class="icon-shopping-cart"></i></a>
                                                    </div>
                                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                        View
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <div class="category-wrap">
                                                        <div class="category-list">
                                                            <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                        </div>
                                                        <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                                class="icon-heart"></i></a>
                                                    </div>
                                                    <h3 class="product-title">
                                                        <a href="/porto/demo40-product.html">Product Short Name</a>
                                                    </h3>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span>
                                                            <!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <!-- End .product-ratings -->
                                                    </div>
                                                    <!-- End .product-container -->

                                                    <div class="price-box">
                                                        <span class="old-price">$90.00</span>
                                                        <span class="product-price">$70.00</span>
                                                    </div>
                                                    <!-- End .price-box -->
                                                </div>
                                                <!-- End .product-details -->
                                            </div>
                                        </div>
                                        <!-- End .products-slider -->
                                    </div>
                                    <div class="tab-pane fade" id="new-products" role="tabpanel" aria-labelledby="new-products-tab">
                                        <div class="products-slider owl-carousel owl-theme owl-nav-top" data-owl-options="{
                                                'margin': 20,
                                                'dots': false,
                                                'nav': true,
                                                'loop': false,
                                                'responsive': {
                                                    '0': {
                                                        'items': 2
                                                    },
                                                    '576': {
                                                        'items': 3
                                                    },
                                                    '768': {
                                                        'items': 4
                                                    },
                                                    '992': {
                                                        'items': 4
                                                    },
                                                    '1500': {
                                                        'items': 6
                                                    }
                                                }
                                        }">
                                            <div class="product-default inner-quickview inner-icon">
                                                <figure>
                                                    <a href="/porto/demo40-product.html">
                                                        <img src="/porto/assets/images/demoes/demo40/products/product-3.jpg" width="205" height="205" alt="product">
                                                    </a>

                                                    <div class="btn-icon-group">
                                                        <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                                class="icon-shopping-cart"></i></a>
                                                    </div>
                                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                        View
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <div class="category-wrap">
                                                        <div class="category-list">
                                                            <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                        </div>
                                                        <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                                class="icon-heart"></i></a>
                                                    </div>
                                                    <h3 class="product-title">
                                                        <a href="/porto/demo40-product.html">Product Short Name</a>
                                                    </h3>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span>
                                                            <!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <!-- End .product-ratings -->
                                                    </div>
                                                    <!-- End .product-container -->

                                                    <div class="price-box">
                                                        <span class="old-price">$90.00</span>
                                                        <span class="product-price">$70.00</span>
                                                    </div>
                                                    <!-- End .price-box -->
                                                </div>
                                                <!-- End .product-details -->
                                            </div>
                                            <div class="product-default inner-quickview inner-icon">
                                                <figure>
                                                    <a href="/porto/demo40-product.html">
                                                        <img src="/porto/assets/images/demoes/demo40/products/product-4.jpg" width="205" height="205" alt="product">
                                                    </a>

                                                    <div class="btn-icon-group">
                                                        <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                                class="icon-shopping-cart"></i></a>
                                                    </div>
                                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                        View
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <div class="category-wrap">
                                                        <div class="category-list">
                                                            <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                        </div>
                                                        <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                                class="icon-heart"></i></a>
                                                    </div>
                                                    <h3 class="product-title">
                                                        <a href="/porto/demo40-product.html">Product Short Name</a>
                                                    </h3>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span>
                                                            <!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <!-- End .product-ratings -->
                                                    </div>
                                                    <!-- End .product-container -->

                                                    <div class="price-box">
                                                        <span class="old-price">$90.00</span>
                                                        <span class="product-price">$70.00</span>
                                                    </div>
                                                    <!-- End .price-box -->
                                                </div>
                                                <!-- End .product-details -->
                                            </div>
                                            <div class="product-default inner-quickview inner-icon">
                                                <figure>
                                                    <a href="/porto/demo40-product.html">
                                                        <img src="/porto/assets/images/demoes/demo40/products/product-11.jpg" width="205" height="205" alt="product">
                                                    </a>

                                                    <div class="btn-icon-group">
                                                        <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                                class="icon-shopping-cart"></i></a>
                                                    </div>
                                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                        View
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <div class="category-wrap">
                                                        <div class="category-list">
                                                            <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                        </div>
                                                        <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                                class="icon-heart"></i></a>
                                                    </div>
                                                    <h3 class="product-title">
                                                        <a href="/porto/demo40-product.html">Product Short Name</a>
                                                    </h3>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span>
                                                            <!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <!-- End .product-ratings -->
                                                    </div>
                                                    <!-- End .product-container -->

                                                    <div class="price-box">
                                                        <span class="old-price">$90.00</span>
                                                        <span class="product-price">$70.00</span>
                                                    </div>
                                                    <!-- End .price-box -->
                                                </div>
                                                <!-- End .product-details -->
                                            </div>
                                            <div class="product-default inner-quickview inner-icon">
                                                <figure>
                                                    <a href="/porto/demo40-product.html">
                                                        <img src="/porto/assets/images/demoes/demo40/products/product-13.jpg" width="205" height="205" alt="product">
                                                    </a>

                                                    <div class="btn-icon-group">
                                                        <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                                class="icon-shopping-cart"></i></a>
                                                    </div>
                                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                        View
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <div class="category-wrap">
                                                        <div class="category-list">
                                                            <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                        </div>
                                                        <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                                class="icon-heart"></i></a>
                                                    </div>
                                                    <h3 class="product-title">
                                                        <a href="/porto/demo40-product.html">Product Short Name</a>
                                                    </h3>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span>
                                                            <!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <!-- End .product-ratings -->
                                                    </div>
                                                    <!-- End .product-container -->

                                                    <div class="price-box">
                                                        <span class="old-price">$90.00</span>
                                                        <span class="product-price">$70.00</span>
                                                    </div>
                                                    <!-- End .price-box -->
                                                </div>
                                                <!-- End .product-details -->
                                            </div>
                                        </div>
                                        <!-- End .products-slider -->
                                    </div>
                                    <div class="tab-pane fade" id="sale-products" role="tabpanel" aria-labelledby="sale-products-tab">
                                        <div class="products-slider owl-carousel owl-theme" data-owl-options="{
                                            'margin': 20,
                                            'dots': false,
                                            'nav': true,
                                            'loop': false,
                                            'responsive': {
                                                '0': {
                                                    'items': 2
                                                },
                                                '576': {
                                                    'items': 3
                                                },
                                                '768': {
                                                    'items': 4
                                                },
                                                '992': {
                                                    'items': 4
                                                },
                                                '1500': {
                                                    'items': 6
                                                }
                                            }
                                        }">
                                            <div class="product-default inner-quickview inner-icon">
                                                <figure>
                                                    <a href="/porto/demo40-product.html">
                                                        <img src="/porto/assets/images/demoes/demo40/products/product-11.jpg" width="205" height="205" alt="product">
                                                    </a>

                                                    <div class="btn-icon-group">
                                                        <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                                class="icon-shopping-cart"></i></a>
                                                    </div>
                                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                        View
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <div class="category-wrap">
                                                        <div class="category-list">
                                                            <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                        </div>
                                                        <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                                class="icon-heart"></i></a>
                                                    </div>
                                                    <h3 class="product-title">
                                                        <a href="/porto/demo40-product.html">Product Short Name</a>
                                                    </h3>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span>
                                                            <!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <!-- End .product-ratings -->
                                                    </div>
                                                    <!-- End .product-container -->

                                                    <div class="price-box">
                                                        <span class="old-price">$90.00</span>
                                                        <span class="product-price">$70.00</span>
                                                    </div>
                                                    <!-- End .price-box -->
                                                </div>
                                                <!-- End .product-details -->
                                            </div>
                                            <div class="product-default inner-quickview inner-icon">
                                                <figure>
                                                    <a href="/porto/demo40-product.html">
                                                        <img src="/porto/assets/images/demoes/demo40/products/product-13.jpg" width="205" height="205" alt="product">
                                                    </a>

                                                    <div class="btn-icon-group">
                                                        <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                                class="icon-shopping-cart"></i></a>
                                                    </div>
                                                    <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                        View
                                                    </a>
                                                </figure>
                                                <div class="product-details">
                                                    <div class="category-wrap">
                                                        <div class="category-list">
                                                            <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                        </div>
                                                        <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                                class="icon-heart"></i></a>
                                                    </div>
                                                    <h3 class="product-title">
                                                        <a href="/porto/demo40-product.html">Product Short Name</a>
                                                    </h3>
                                                    <div class="ratings-container">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:100%"></span>
                                                            <!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <!-- End .product-ratings -->
                                                    </div>
                                                    <!-- End .product-container -->

                                                    <div class="price-box">
                                                        <span class="old-price">$90.00</span>
                                                        <span class="product-price">$70.00</span>
                                                    </div>
                                                    <!-- End .price-box -->
                                                </div>
                                                <!-- End .product-details -->
                                            </div>
                                        </div>
                                        <!-- End .products-slider -->
                                    </div>
                                </div>
                            </section>

                            <section class="categories-section appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="150">
                                <div class="heading d-flex align-items-center flex-column flex-lg-row border-0 mb-0">
                                    <h2 class="text-transform-none mb-0">Popular Departments</h2>
                                </div>
                                <div class="owl-carousel owl-theme appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200" data-owl-options="{
                                        'dots': false,
                                        'margin': 20,
                                        'nav': false,
                                        'loop': false,
                                        'responsive': {
                                            '0': {
                                                'items': 2
                                            },
                                            '768': {
                                                'items': 3
                                            },
                                            '991': {
                                                'items': 3
                                            },
                                            '1200': {
                                                'items': 4
                                            }
                                        }
                                    }">
                                    <div class="banner banner-image font2">
                                        <a href="/porto/demo40-shop.html">
                                            <img src="/porto/assets/images/demoes/demo40/categories/category-1.jpg" width="374" height="200" alt="banner" style="background-color: #f4f4f4;">
                                        </a>
                                        <div class="banner-layer banner-layer-middle">
                                            <h3>Vegetables</h3>
                                            <span>2 Products </span>
                                        </div>
                                    </div>
                                    <!-- End .banner -->

                                    <div class="banner banner-image font2">
                                        <a href="/porto/demo40-shop.html">
                                            <img src="/porto/assets/images/demoes/demo40/categories/category-2.jpg" width="374" height="200" alt="banner" style="background-color: #f4f4f4;">
                                        </a>
                                        <div class="banner-layer banner-layer-middle">
                                            <h3>Fruits</h3>
                                            <span>10 Products </span>
                                        </div>
                                    </div>
                                    <!-- End .banner -->

                                    <div class="banner banner-image font2">
                                        <a href="/porto/demo40-product.html">
                                            <img src="/porto/assets/images/demoes/demo40/categories/category-3.jpg" width="374" height="200" alt="banner" style="background-color: #f4f4f4;">
                                        </a>
                                        <div class="banner-layer banner-layer-middle">
                                            <h3>Cooking</h3>
                                            <span>4 Products </span>
                                        </div>
                                    </div>
                                    <!-- End .banner -->

                                    <div class="banner banner-image font2">
                                        <a href="/porto/demo40-shop.html">
                                            <img src="/porto/assets/images/demoes/demo40/categories/category-4.jpg" width="374" height="200" alt="banner" style="background-color: #f4f4f4;">
                                        </a>
                                        <div class="banner-layer banner-layer-middle">
                                            <h3>Breakfast</h3>
                                            <span>8 Products </span>
                                        </div>
                                    </div>
                                    <!-- End .banner -->
                                </div>
                                <!-- End .cat-carousel -->
                            </section>
                            <!-- End .banners-section -->

                            <section class="products-container">
                                <div class="heading d-flex align-items-center appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="150">
                                    <h2 class="text-transform-none mb-0">Milk & Cheese</h2>
                                    <a class="d-block view-all ml-auto" href="/porto/demo40-shop.html">View All<i
                                            class="fas fa-chevron-right"></i></a>
                                </div>
                                <div class="products-slider owl-carousel owl-theme  appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200" data-owl-options="{
                                            'margin': 20,
                                            'dots': false,
                                            'nav': false,
                                            'loop': false,
                                            'responsive': {
                                                '0': {
                                                    'items': 2
                                                },
                                                '576': {
                                                    'items': 3
                                                },
                                                '768': {
                                                    'items': 4
                                                },
                                                '992': {
                                                    'items': 4
                                                },
                                                '1500': {
                                                    'items': 6
                                                }
                                            }
                                        }">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo40-product.html">
                                                <img src="/porto/assets/images/demoes/demo40/products/product-5.jpg" width="205" height="205" alt="product">
                                            </a>

                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                View
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo40-product.html">Product Short Name</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->

                                            <div class="price-box">
                                                <span class="old-price">$90.00</span>
                                                <span class="product-price">$70.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo40-product.html">
                                                <img src="/porto/assets/images/demoes/demo40/products/product-6.jpg" width="205" height="205" alt="product">
                                            </a>

                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                View
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo40-product.html">Product Short Name</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->

                                            <div class="price-box">
                                                <span class="old-price">$90.00</span>
                                                <span class="product-price">$70.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo40-product.html">
                                                <img src="/porto/assets/images/demoes/demo40/products/product-9.jpg" width="205" height="205" alt="product">
                                            </a>

                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                View
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo40-product.html">Product Short Name</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->

                                            <div class="price-box">
                                                <span class="old-price">$90.00</span>
                                                <span class="product-price">$70.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo40-product.html">
                                                <img src="/porto/assets/images/demoes/demo40/products/product-10.jpg" width="205" height="205" alt="product">
                                            </a>

                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                View
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo40-product.html">Product Short Name</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->

                                            <div class="price-box">
                                                <span class="old-price">$90.00</span>
                                                <span class="product-price">$70.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo40-product.html">
                                                <img src="/porto/assets/images/demoes/demo40/products/product-11.jpg" width="205" height="205" alt="product">
                                            </a>

                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                View
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo40-product.html">Product Short Name</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->

                                            <div class="price-box">
                                                <span class="old-price">$90.00</span>
                                                <span class="product-price">$70.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo40-product.html">
                                                <img src="/porto/assets/images/demoes/demo40/products/product-12.jpg" width="205" height="205" alt="product">
                                            </a>

                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                View
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo40-product.html">Product Short Name</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->

                                            <div class="price-box">
                                                <span class="old-price">$90.00</span>
                                                <span class="product-price">$70.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo40-product.html">
                                                <img src="/porto/assets/images/demoes/demo40/products/product-7.jpg" width="205" height="205" alt="product">
                                            </a>

                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                View
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo40-product.html">Product Short Name</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->

                                            <div class="price-box">
                                                <span class="old-price">$90.00</span>
                                                <span class="product-price">$70.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                </div>
                                <!-- End .products-slider -->
                            </section>

                            <section class="products-container pt-0">
                                <div class="heading d-flex align-items-center appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200">
                                    <h2 class="text-transform-none mb-0">Fresh Fruit</h2>
                                    <a class="d-block view-all ml-auto" href="/porto/demo40-shop.html">View All<i
                                            class="fas fa-chevron-right"></i></a>
                                </div>
                                <div class="products-slider owl-carousel owl-theme appear-animate" data-animation-name="fadeIn" data-animation-delay="100" data-owl-options="{
                                            'margin': 20,
                                            'dots': false,
                                            'nav': false,
                                            'loop': false,
                                            'responsive': {
                                                '0': {
                                                    'items': 2
                                                },
                                                '576': {
                                                    'items': 3
                                                },
                                                '768': {
                                                    'items': 4
                                                },
                                                '992': {
                                                    'items': 4
                                                },
                                                '1500': {
                                                    'items': 6
                                                }
                                            }
                                        }">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo40-product.html">
                                                <img src="/porto/assets/images/demoes/demo40/products/product-3.jpg" width="205" height="205" alt="product">
                                            </a>

                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                View
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo40-product.html">Product Short Name</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->

                                            <div class="price-box">
                                                <span class="old-price">$90.00</span>
                                                <span class="product-price">$70.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo40-product.html">
                                                <img src="/porto/assets/images/demoes/demo40/products/product-4.jpg" width="205" height="205" alt="product">
                                            </a>

                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                View
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo40-product.html">Product Short Name</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->

                                            <div class="price-box">
                                                <span class="old-price">$90.00</span>
                                                <span class="product-price">$70.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo40-product.html">
                                                <img src="/porto/assets/images/demoes/demo40/products/product-11.jpg" width="205" height="205" alt="product">
                                            </a>

                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                View
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo40-product.html">Product Short Name</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->

                                            <div class="price-box">
                                                <span class="old-price">$90.00</span>
                                                <span class="product-price">$70.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo40-product.html">
                                                <img src="/porto/assets/images/demoes/demo40/products/product-13.jpg" width="205" height="205" alt="product">
                                            </a>

                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                View
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo40-product.html">Product Short Name</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->

                                            <div class="price-box">
                                                <span class="old-price">$90.00</span>
                                                <span class="product-price">$70.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo40-product.html">
                                                <img src="/porto/assets/images/demoes/demo40/products/product-15.jpg" width="205" height="205" alt="product">
                                            </a>

                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                View
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo40-product.html">Product Short Name</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->

                                            <div class="price-box">
                                                <span class="old-price">$90.00</span>
                                                <span class="product-price">$70.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo40-product.html">
                                                <img src="/porto/assets/images/demoes/demo40/products/product-16.jpg" width="205" height="205" alt="product">
                                            </a>

                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                View
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo40-product.html">Product Short Name</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->

                                            <div class="price-box">
                                                <span class="old-price">$90.00</span>
                                                <span class="product-price">$70.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo40-product.html">
                                                <img src="/porto/assets/images/demoes/demo40/products/product-7.jpg" width="205" height="205" alt="product">
                                            </a>

                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                View
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo40-product.html">Product Short Name</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->

                                            <div class="price-box">
                                                <span class="old-price">$90.00</span>
                                                <span class="product-price">$70.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                </div>
                                <!-- End .products-slider -->
                            </section>

                            <section class="products-container pt-0">
                                <div class="heading d-flex align-items-center appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200">
                                    <h2 class="text-transform-none mb-0">Meat & Seafood</h2>
                                    <a class="d-block view-all ml-auto" href="/porto/demo40-shop.html">View All<i
                                            class="fas fa-chevron-right"></i></a>
                                </div>
                                <div class="products-slider owl-carousel owl-theme appear-animate" data-animation-name="fadeIn" data-animation-delay="100" data-owl-options="{
                                            'margin': 20,
                                            'dots': false,
                                            'nav': false,
                                            'loop': false,
                                            'responsive': {
                                                '0': {
                                                    'items': 2
                                                },
                                                '576': {
                                                    'items': 3
                                                },
                                                '768': {
                                                    'items': 4
                                                },
                                                '992': {
                                                    'items': 4
                                                },
                                                '1500': {
                                                    'items': 6
                                                }
                                            }
                                        }">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo40-product.html">
                                                <img src="/porto/assets/images/demoes/demo40/products/product-17.jpg" width="205" height="205" alt="product">
                                            </a>

                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                View
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo40-product.html">Product Short Name</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->

                                            <div class="price-box">
                                                <span class="old-price">$90.00</span>
                                                <span class="product-price">$70.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo40-product.html">
                                                <img src="/porto/assets/images/demoes/demo40/products/product-16.jpg" width="205" height="205" alt="product">
                                            </a>

                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                View
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo40-product.html">Product Short Name</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->

                                            <div class="price-box">
                                                <span class="old-price">$90.00</span>
                                                <span class="product-price">$70.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo40-product.html">
                                                <img src="/porto/assets/images/demoes/demo40/products/product-18.jpg" width="205" height="205" alt="product">
                                            </a>

                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                View
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo40-product.html">Product Short Name</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->

                                            <div class="price-box">
                                                <span class="old-price">$90.00</span>
                                                <span class="product-price">$70.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo40-product.html">
                                                <img src="/porto/assets/images/demoes/demo40/products/product-19.jpg" width="205" height="205" alt="product">
                                            </a>

                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                View
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo40-product.html">Product Short Name</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->

                                            <div class="price-box">
                                                <span class="old-price">$90.00</span>
                                                <span class="product-price">$70.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo40-product.html">
                                                <img src="/porto/assets/images/demoes/demo40/products/product-20.jpg" width="205" height="205" alt="product">
                                            </a>

                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                View
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo40-product.html">Product Short Name</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->

                                            <div class="price-box">
                                                <span class="old-price">$90.00</span>
                                                <span class="product-price">$70.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo40-product.html">
                                                <img src="/porto/assets/images/demoes/demo40/products/product-21.jpg" width="205" height="205" alt="product">
                                            </a>

                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                View
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo40-product.html">Product Short Name</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->

                                            <div class="price-box">
                                                <span class="old-price">$90.00</span>
                                                <span class="product-price">$70.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo40-product.html">
                                                <img src="/porto/assets/images/demoes/demo40/products/product-7.jpg" width="205" height="205" alt="product">
                                            </a>

                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                View
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo40-product.html">Product Short Name</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->

                                            <div class="price-box">
                                                <span class="old-price">$90.00</span>
                                                <span class="product-price">$70.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                </div>
                                <!-- End .products-slider -->
                            </section>

                            <div class="banner-section banner-bg" style="background-image: url(/porto/assets/images/demoes/demo40/banners/banner-3.jpg);">
                                <div class="banner col-md-11 m-auto d-flex align-items-center flex-column flex-sm-row justify-content-center justify-content-sm-between">
                                    <div class="content-left text-center text-sm-right">
                                        <h6 class="text-transform-none appear-animate" data-animation-name="fadeInDownShorter" data-animation-delay="100">Exclusive Whole Wheat</h6>
                                        <h2 class="text-transform-none appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="600">Fluffy Pancakes
                                        </h2>
                                        <h3 class=" appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="1100">GOOD OLD FASHIONED</h3>
                                    </div>
                                    <div class="content-right text-center text-sm-right">
                                        <h5 class=" appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="400">BREAKFAST PRODUCTS ON SALE</h5>
                                        <h4 class="d-inline-block appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="800">
                                            <sup>UP TO</sup>
                                            <b class="coupon-sale-text ls-10 text-white align-middle">50%</b>
                                        </h4>
                                    </div>
                                </div>
                            </div>

                            <section class="products-container products-section-with-border appear-animate" data-animation-name="fadeIn" data-animation-delay="100">
                                <div class="heading d-flex align-items-center">
                                    <h2 class="d-flex align-items-center text-transform-none mb-0"><i></i>Special Offers
                                    </h2>
                                    <a class="d-block view-all ml-auto mt-0" href="/porto/demo40-shop.html">View All<i
                                            class="fas fa-chevron-right"></i></a>
                                </div>
                                <div class="products-slider owl-carousel owl-theme" data-owl-options="{
                                            'margin': 20,
                                            'dots': false,
                                            'nav': false,
                                            'loop': false,
                                            'responsive': {
                                                '0': {
                                                    'items': 2
                                                },
                                                '576': {
                                                    'items': 3
                                                },
                                                '768': {
                                                    'items': 4
                                                },
                                                '992': {
                                                    'items': 4
                                                },
                                                '1500': {
                                                    'items': 6
                                                }
                                            }
                                        }">
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo40-product.html">
                                                <img src="/porto/assets/images/demoes/demo40/products/product-22.jpg" width="205" height="205" alt="product">
                                            </a>

                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                View
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo40-product.html">Product Short Name</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->

                                            <div class="price-box">
                                                <span class="old-price">$90.00</span>
                                                <span class="product-price">$70.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo40-product.html">
                                                <img src="/porto/assets/images/demoes/demo40/products/product-5.jpg" width="205" height="205" alt="product">
                                            </a>

                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                View
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo40-product.html">Product Short Name</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->

                                            <div class="price-box">
                                                <span class="old-price">$90.00</span>
                                                <span class="product-price">$70.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo40-product.html">
                                                <img src="/porto/assets/images/demoes/demo40/products/product-9.jpg" width="205" height="205" alt="product">
                                            </a>

                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                View
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo40-product.html">Product Short Name</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->

                                            <div class="price-box">
                                                <span class="old-price">$90.00</span>
                                                <span class="product-price">$70.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo40-product.html">
                                                <img src="/porto/assets/images/demoes/demo40/products/product-11.jpg" width="205" height="205" alt="product">
                                            </a>

                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                View
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo40-product.html">Product Short Name</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->

                                            <div class="price-box">
                                                <span class="old-price">$90.00</span>
                                                <span class="product-price">$70.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo40-product.html">
                                                <img src="/porto/assets/images/demoes/demo40/products/product-23.jpg" width="205" height="205" alt="product">
                                            </a>

                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                View
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo40-product.html">Product Short Name</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->

                                            <div class="price-box">
                                                <span class="old-price">$90.00</span>
                                                <span class="product-price">$70.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    <div class="product-default inner-quickview inner-icon">
                                        <figure>
                                            <a href="/porto/demo40-product.html">
                                                <img src="/porto/assets/images/demoes/demo40/products/product-24.jpg" width="205" height="205" alt="product">
                                            </a>

                                            <div class="btn-icon-group">
                                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                        class="icon-shopping-cart"></i></a>
                                            </div>
                                            <a href="/porto/ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
                                                View
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <div class="category-wrap">
                                                <div class="category-list">
                                                    <a href="/porto/demo40-shop.html" class="product-category">category</a>
                                                </div>
                                                <a href="/porto/wishlist.html" class="btn-icon-wish"><i
                                                        class="icon-heart"></i></a>
                                            </div>
                                            <h3 class="product-title">
                                                <a href="/porto/demo40-product.html">Product Short Name</a>
                                            </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->

                                            <div class="price-box">
                                                <span class="old-price">$90.00</span>
                                                <span class="product-price">$70.00</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                </div>
                                <!-- End .products-slider -->
                            </section>

                            <footer class="footer font2">
                                <div class="footer-top appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200">
                                    <div class="widget-newsletter d-flex align-items-center align-items-sm-start flex-column flex-xl-row  justify-content-xl-between">
                                        <div class="widget-newsletter-info text-center text-sm-left d-flex flex-column flex-sm-row align-items-center mb-1 mb-xl-0">
                                            <i class="icon-envolope"></i>
                                            <div class="widget-info-content">
                                                <h5 class="widget-newsletter-title mb-0">
                                                    Subscribe To Our Newsletter</h5>
                                                <p class="widget-newsletter-content mb-0">Get all the latest information on Events, Sales and Offers.
                                                </p>
                                            </div>
                                        </div>
                                        <form action="#" class="mb-0 w-lg-max mt-2 mt-md-0">
                                            <div class="footer-submit-wrapper d-flex align-items-center">
                                                <input type="email" class="form-control mb-0" placeholder="Your E-mail Address" size="40" required>
                                                <button type="submit" class="btn btn-primary btn-sm text-transform-none">Subscribe
                                                    Now!</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="footer-middle">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-3">
                                            <div class="widget">
                                                <h3 class="widget-title">Customer Services</h3>
                                                <div class="widget-content">
                                                    <ul>
                                                        <li><a href="#">Help & FAQs</a></li>
                                                        <li><a href="#">Order Tracking</a></li>
                                                        <li><a href="#">Shipping & Delivery</a></li>
                                                        <li><a href="#">Orders History</a></li>
                                                        <li><a href="#">Advanced Search</a></li>
                                                        <li><a href="/porto/login.html">Login</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="widget">
                                                <h3 class="widget-title">About Us</h3>
                                                <div class="widget-content">
                                                    <ul>
                                                        <li><a href="/porto/about.html">About Us</a></li>
                                                        <li><a href="#">Careers</a></li>
                                                        <li><a href="#">Our Stores</a></li>
                                                        <li><a href="#">Corporate Sales</a></li>
                                                        <li><a href="#">Careers</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="widget">
                                                <h3 class="widget-title">More Information</h3>
                                                <div class="widget-content">
                                                    <ul>
                                                        <li><a href="#">Affiliates</a></li>
                                                        <li><a href="#">Refer a Friend</a></li>
                                                        <li><a href="#">Student Beans Offers</a></li>
                                                        <li><a href="#">Gift Vouchers</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3">
                                            <div class="widget">
                                                <h3 class="widget-title">Follow Us</h3>
                                                <div class="widget-content">
                                                    <div class="social-icons">
                                                        <a href="#" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                                                        <a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                                                        <a href="#" class="social-icon social-instagram icon-instagram" target="_blank" title="Instagram"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer-bottom d-sm-flex align-items-center">
                                    <div class="footer-left">
                                        <span class="footer-copyright">Porto eCommerce. © 2021. All Rights
                                            Reserved</span>
                                    </div>

                                    <div class="footer-right ml-auto mt-1 mt-sm-0">
                                        <div class="payment-icons mr-0">
                                            <span class="payment-icon visa" style="background-image: url(/porto/assets/images/payments/payment-visa.svg)"></span>
                                            <span class="payment-icon paypal" style="background-image: url(/porto/assets/images/payments/payment-paypal.svg)"></span>
                                            <span class="payment-icon stripe" style="background-image: url(/porto/assets/images/payments/payment-stripe.png)"></span>
                                            <span class="payment-icon verisign" style="background-image:  url(/porto/assets/images/payments/payment-verisign.svg)"></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- End .footer-bottom -->
                            </footer>
                            <!-- End .footer -->
                        </div>
                    </div>
                </div>
            </div>
@endsection

@section('sticky-navbar')
<div class="sticky-navbar">
    <div class="sticky-info">
        <a href="/porto/demo40.html">
            <i class="icon-home"></i>Home
        </a>
    </div>
    <div class="sticky-info">
        <a href="/porto/demo40-shop.html" class="">
            <i class="icon-bars"></i>Categories
        </a>
    </div>
    <div class="sticky-info">
        <a href="/porto/wishlist.html" class="">
            <i class="icon-wishlist-2"></i>Wishlist
        </a>
    </div>
    <div class="sticky-info">
        <a href="/porto/login.html" class="">
            <i class="icon-user-2"></i>Account
        </a>
    </div>
    <div class="sticky-info">
        <a href="/porto/cart.html" class="">
            <i class="icon-shopping-cart position-relative">
                <span class="cart-count badge-circle">3</span>
            </i>Cart
        </a>
    </div>
</div>
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
