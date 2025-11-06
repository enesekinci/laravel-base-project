@extends('layouts.porto')

@section('header')
    @include('components.porto.header')
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
                            <nav aria-label="breadcrumb" class="breadcrumb-nav font2">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/porto/demo40.html"><i class="icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#">Product</a></li>
                                </ol>
                            </nav>

                            <div class="product-single-container product-single-default">
                                <div class="cart-message d-none">
                                    <strong class="single-cart-notice">“Men Black Sports Shoes”</strong>
                                    <span>has been added to your cart.</span>
                                </div>

                                <div class="row">
                                    <div class="col-xl-5 col-md-6 product-single-gallery">
                                        <div class="product-slider-container">
                                            <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                                                <div class="product-item">
                                                    <img class="product-single-image" src="/porto/assets/images/demoes/demo40/products/zoom/product-1-big.jpg" data-zoom-image="/porto/assets/images/demoes/demo40/products/zoom/product-1-big.jpg" width="468" height="468" alt="product" />
                                                </div>
                                                <div class="product-item">
                                                    <img class="product-single-image" src="/porto/assets/images/demoes/demo40/products/zoom/product-2-big.jpg" data-zoom-image="/porto/assets/images/demoes/demo40/products/zoom/product-2-big.jpg" width="468" height="468" alt="product" />
                                                </div>
                                                <div class="product-item">
                                                    <img class="product-single-image" src="/porto/assets/images/demoes/demo40/products/zoom/product-3-big.jpg" data-zoom-image="/porto/assets/images/demoes/demo40/products/zoom/product-3-big.jpg" width="468" height="468" alt="product" />
                                                </div>
                                                <div class="product-item">
                                                    <img class="product-single-image" src="/porto/assets/images/demoes/demo40/products/zoom/product-4-big.jpg" data-zoom-image="/porto/assets/images/demoes/demo40/products/zoom/product-4-big.jpg" width="468" height="468" alt="product" />
                                                </div>
                                                <div class="product-item">
                                                    <img class="product-single-image" src="/porto/assets/images/demoes/demo40/products/zoom/product-5-big.jpg" data-zoom-image="/porto/assets/images/demoes/demo40/products/zoom/product-5-big.jpg" width="468" height="468" alt="product" />
                                                </div>
                                            </div>
                                            <!-- End .product-single-carousel -->
                                            <span class="prod-full-screen">
                                                <i class="icon-plus"></i>
                                            </span>
                                        </div>

                                        <div class="prod-thumbnail owl-dots">
                                            <div class="owl-dot">
                                                <img src="/porto/assets/images/demoes/demo40/products/zoom/product-1.jpg" width="110" height="110" alt="product-thumbnail" />
                                            </div>
                                            <div class="owl-dot">
                                                <img src="/porto/assets/images/demoes/demo40/products/zoom/product-2.jpg" width="110" height="110" alt="product-thumbnail" />
                                            </div>
                                            <div class="owl-dot">
                                                <img src="/porto/assets/images/demoes/demo40/products/zoom/product-3.jpg" width="110" height="110" alt="product-thumbnail" />
                                            </div>
                                            <div class="owl-dot">
                                                <img src="/porto/assets/images/demoes/demo40/products/zoom/product-4.jpg" width="110" height="110" alt="product-thumbnail" />
                                            </div>
                                            <div class="owl-dot">
                                                <img src="/porto/assets/images/demoes/demo40/products/zoom/product-5.jpg" width="110" height="110" alt="product-thumbnail" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End .product-single-gallery -->

                                    <div class="col-xl-7 col-md-6 product-single-details">
                                        <h1 class="product-title">Product Short Name</h1>

                                        <div class="product-nav">
                                            <div class="product-prev">
                                                <a href="#">
                                                    <span class="product-link"></span>

                                                    <span class="product-popup">
                                                        <span class="box-content">
                                                            <img alt="product" width="150" height="150"
                                                                src="/porto/assets/images/products/product-3.jpg"
                                                                style="padding-top: 0px;">

                                                            <span>Circled Ultimate 3D Speaker</span>
                                                    </span>
                                                    </span>
                                                </a>
                                            </div>

                                            <div class="product-next">
                                                <a href="#">
                                                    <span class="product-link"></span>

                                                    <span class="product-popup">
                                                        <span class="box-content">
                                                            <img alt="product" width="150" height="150"
                                                                src="/porto/assets/images/products/product-4.jpg"
                                                                style="padding-top: 0px;">

                                                            <span>Blue Backpack for the Young</span>
                                                    </span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:60%"></span>
                                                <!-- End .ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <!-- End .product-ratings -->

                                            <a href="#" class="rating-link">( 6 Reviews )</a>
                                        </div>
                                        <!-- End .ratings-container -->

                                        <hr class="short-divider">

                                        <div class="price-box">
                                            <span class="product-price"> $35.00</span>
                                        </div>
                                        <!-- End .price-box -->

                                        <div class="product-desc ls-0 font2">
                                            <p>
                                                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris
                                                placerat eleifend leo.
                                            </p>
                                        </div>
                                        <!-- End .product-desc -->

                                        <ul class="single-info-list font2">
                                            <li>
                                                CATEGORies:
                                                <strong>
                                                    <a href="#" class="product-category">Breakfast</a>
                                                </strong>
                                            </li>
                                        </ul>

                                        <div class="product-action">
                                            <div class="product-single-qty">
                                                <input class="horizontal-quantity form-control" type="text">
                                            </div>
                                            <!-- End .product-single-qty -->

                                            <a href="javascript:;" class="btn btn-dark add-cart mr-2" title="Add to Cart">Add to
                                                Cart</a>

                                            <a href="/porto/cart.html" class="btn btn-gray view-cart d-none">View cart</a>
                                        </div>
                                        <!-- End .product-action -->

                                        <hr class="divider mb-0 mt-0">

                                        <div class="product-single-share icon-with-color mb-2 mt-2">
                                            <label class="sr-only">Share:</label>

                                            <div class="social-icons">
                                                <a href="#" class="social-icon social-facebook" target="_blank" title="Facebook">
                                                    <i class="icon-facebook"></i>
                                                </a>
                                                <a href="#" class="social-icon social-twitter" target="_blank" title="Twitter">
                                                    <i class="icon-twitter"></i>
                                                </a>
                                                <a href="#" class="social-icon social-linkedin" target="_blank" title="Linkedin">
                                                    <i class="fab fa-linkedin-in"></i>
                                                </a>
                                                <a href="#" class="social-icon social-gplus" target="_blank" title="Google +">
                                                    <i class="fab fa-google-plus-g"></i>
                                                </a>
                                                <a href="#" class="social-icon social-mail" target="_blank" title="Email">
                                                    <i class="icon-mail-alt"></i>
                                                </a>
                                            </div>
                                            <!-- End .social-icons -->
                                        </div>
                                        <!-- End .product single-share -->
                                    </div>
                                    <!-- End .product-single-details -->
                                </div>
                                <!-- End .row -->
                            </div>
                            <!-- End .product-single-container -->

                            <div class="product-single-tabs font2">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content" role="tab" aria-controls="product-reviews-content" aria-selected="false">Reviews
                                            (1)</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
                                        <div class="product-desc-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostrud ipsum consectetur sed do, quis nostrud exercitation
                                                ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
                                            <ul>
                                                <li>Any Product types that You want - Simple, Configurable
                                                </li>
                                                <li>Downloadable/Digital Products, Virtual Products
                                                </li>
                                                <li>Inventory Management with Backordered items
                                                </li>
                                            </ul>
                                            <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                        </div>
                                        <!-- End .product-desc-content -->
                                    </div>
                                    <!-- End .tab-pane -->

                                    <div class="tab-pane fade" id="product-reviews-content" role="tabpanel" aria-labelledby="product-tab-reviews">
                                        <div class="product-reviews-content">
                                            <h3 class="reviews-title">1 review for Men Black Sports Shoes</h3>

                                            <div class="comment-list">
                                                <div class="comments">
                                                    <figure class="img-thumbnail">
                                                        <img src="/porto/assets/images/blog/author.jpg" alt="author" width="80" height="80">
                                                    </figure>

                                                    <div class="comment-block">
                                                        <div class="comment-header">
                                                            <div class="comment-arrow"></div>

                                                            <div class="ratings-container float-sm-right">
                                                                <div class="product-ratings">
                                                                    <span class="ratings" style="width:60%"></span>
                                                                    <!-- End .ratings -->
                                                                    <span class="tooltiptext tooltip-top"></span>
                                                                </div>
                                                                <!-- End .product-ratings -->
                                                            </div>

                                                            <span class="comment-by">
                                                                <strong>Joe Doe</strong> – April 12, 2018
                                                            </span>
                                                        </div>

                                                        <div class="comment-content">
                                                            <p>Excellent.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="divider"></div>

                                            <div class="add-product-review">
                                                <h3 class="review-title">Add a review</h3>

                                                <form action="#" class="comment-form m-0">
                                                    <div class="rating-form">
                                                        <label for="rating">Your rating <span
                                                                class="required">*</span></label>
                                                        <span class="rating-stars">
                                                            <a class="star-1" href="#">1</a>
                                                            <a class="star-2" href="#">2</a>
                                                            <a class="star-3" href="#">3</a>
                                                            <a class="star-4" href="#">4</a>
                                                            <a class="star-5" href="#">5</a>
                                                        </span>

                                                        <select name="rating" id="rating" required="" style="display: none;">
                                                            <option value="">Rate…</option>
                                                            <option value="5">Perfect</option>
                                                            <option value="4">Good</option>
                                                            <option value="3">Average</option>
                                                            <option value="2">Not that bad</option>
                                                            <option value="1">Very poor</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Your review <span class="required">*</span></label>
                                                        <textarea cols="5" rows="6" class="form-control form-control-sm"></textarea>
                                                    </div>
                                                    <!-- End .form-group -->


                                                    <div class="row">
                                                        <div class="col-md-6 col-xl-12">
                                                            <div class="form-group">
                                                                <label>Name <span class="required">*</span></label>
                                                                <input type="text" class="form-control form-control-sm" required>
                                                            </div>
                                                            <!-- End .form-group -->
                                                        </div>

                                                        <div class="col-md-6 col-xl-12">
                                                            <div class="form-group">
                                                                <label>Email <span class="required">*</span></label>
                                                                <input type="text" class="form-control form-control-sm" required>
                                                            </div>
                                                            <!-- End .form-group -->
                                                        </div>

                                                        <div class="col-md-6 col-xl-12">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="save-name" />
                                                                <label class="custom-control-label mb-0" for="save-name">Save my
                                                                    name, email, and website in this browser for the
                                                                    next time I
                                                                    comment.</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <input type="submit" class="btn btn-primary" value="Submit">
                                                </form>
                                            </div>
                                            <!-- End .add-product-review -->
                                        </div>
                                        <!-- End .product-reviews-content -->
                                    </div>
                                    <!-- End .tab-pane -->
                                </div>
                                <!-- End .tab-content -->
                            </div>
                            <!-- End .product-single-tabs -->

                            <div class="products-section pt-0">
                                <h2 class="section-title pb-3">Related Products</h2>

                                <div class="products-slider owl-carousel owl-theme dots-top dots-small" data-owl-options="{
                                    'dots': true,
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
                            </div>
                            <!-- End .products-section -->

                            <footer class="footer font2">
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

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
