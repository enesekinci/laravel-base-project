@extends('layouts.porto')

@section('header')
    @include('porto.demo40.header')
@endsection

@section('footer')
    @include('porto.demo40.footer')
@endsection

@section('content')
<div class="container-fluid p-0">
                <div class="row m-0">
                    <div class="sidebar-overlay"></div>
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
                            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/porto/demo40.html"><i class="icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#">Men</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Accessories</li>
                                </ol>
                            </nav>

                            <nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
                                <div class="toolbox-left">
                                    <a href="#" class="sidebar-toggle"><svg data-name="Layer 3" id="Layer_3"
                                            viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                            <line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
                                            <line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
                                            <line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
                                            <line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
                                            <line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
                                            <line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
                                            <path
                                                d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z"
                                                class="cls-2"></path>
                                            <path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2">
                                            </path>
                                            <path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
                                            <path
                                                d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z"
                                                class="cls-2"></path>
                                        </svg>
                                        <span>Filter</span>
                                    </a>

                                    <div class="toolbox-item toolbox-sort">
                                        <label>Sort By:</label>

                                        <div class="select-custom">
                                            <select name="orderby" class="form-control">
                                                <option value="menu_order" selected="selected">Default sorting</option>
                                                <option value="popularity">Sort by popularity</option>
                                                <option value="rating">Sort by average rating</option>
                                                <option value="date">Sort by newness</option>
                                                <option value="price">Sort by price: low to high</option>
                                                <option value="price-desc">Sort by price: high to low</option>
                                            </select>
                                        </div>
                                        <!-- End .select-custom -->


                                    </div>
                                    <!-- End .toolbox-item -->
                                </div>
                                <!-- End .toolbox-left -->

                                <div class="toolbox-right">
                                    <div class="toolbox-item toolbox-show">
                                        <label>Show:</label>

                                        <div class="select-custom">
                                            <select name="count" class="form-control">
                                                <option value="12">18</option>
                                                <option value="24">36</option>
                                            </select>
                                        </div>
                                        <!-- End .select-custom -->
                                    </div>
                                    <!-- End .toolbox-item -->

                                    <div class="toolbox-item layout-modes">
                                        <a href="/porto/category.html" class="layout-btn btn-grid active" title="Grid">
                                            <i class="icon-mode-grid"></i>
                                        </a>
                                        <a href="/porto/category-list.html" class="layout-btn btn-list" title="List">
                                            <i class="icon-mode-list"></i>
                                        </a>
                                    </div>
                                    <!-- End .layout-modes -->
                                </div>
                                <!-- End .toolbox-right -->
                            </nav>

                            <div class="row products-group">
                                <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2">
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
                                <!-- End .col-sm-4 -->

                                <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2">
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
                                </div>
                                <!-- End .col-sm-4 -->

                                <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2">
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
                                </div>
                                <!-- End .col-sm-4 -->

                                <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2">
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
                                </div>
                                <!-- End .col-sm-4 -->

                                <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2">
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
                                </div>
                                <!-- End .col-sm-4 -->

                                <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2">
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
                                <!-- End .col-sm-4 -->

                                <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2">
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
                                </div>
                                <!-- End .col-sm-4 -->

                                <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2">
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
                                </div>
                                <!-- End .col-sm-4 -->

                                <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2">
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
                                </div>
                                <!-- End .col-sm-4 -->

                                <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2">
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
                                </div>
                                <!-- End .col-sm-4 -->

                                <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2">
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
                                </div>
                                <!-- End .col-sm-4 -->

                                <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2">
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
                                </div>
                                <!-- End .col-sm-4 -->

                                <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2">
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
                                </div>

                                <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2">
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
                                </div>

                                <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2">
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

                                <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2">
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
                                </div>

                                <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2">
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
                                </div>

                                <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2">
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
                                </div>
                            </div>
                            <!-- End .row -->

                            <nav class="toolbox toolbox-pagination">
                                <div class="toolbox-item toolbox-show">
                                    <label>Show:</label>

                                    <div class="select-custom">
                                        <select name="count" class="form-control">
                                            <option value="12">18</option>
                                            <option value="36">36</option>
                                        </select>
                                    </div>
                                    <!-- End .select-custom -->
                                </div>
                                <!-- End .toolbox-item -->

                                <ul class="pagination toolbox-item">
                                    <li class="page-item disabled">
                                        <a class="page-link page-link-btn" href="#"><i class="icon-angle-left"></i></a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><span class="page-link">...</span></li>
                                    <li class="page-item">
                                        <a class="page-link page-link-btn" href="#"><i class="icon-angle-right"></i></a>
                                    </li>
                                </ul>
                            </nav>

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
@section('footer')
    @include('porto.demo40.footer')
@endsection

@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
