<header class="header">
            <div class="header-middle sticky-header" data-sticky-options="{'mobile': true}">
                <div class="container-fluid">
                    <div class="header-left d-none d-lg-flex">
                        <div class="header-dropdown">
                            <a href="#">USD</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="#">EUR</a></li>
                                    <li><a href="#">USD</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="header-dropdown">
                            <a href="#"><i class="flag-us flag"></i>ENG</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="#"><i class="flag-us flag mr-2"></i>ENG</a>
                                    </li>
                                    <li><a href="#"><i class="flag-fr flag mr-2"></i>FRA</a></li>
                                </ul>
                            </div><!-- End .header-menu -->
                        </div>
                    </div>

                    <div class="header-center ml-0 ml-lg-auto">
                        <button class="mobile-menu-toggler" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
                        <a href="/porto/demo23.html" class="logo">
                            <img src="/porto/assets/images/demoes/demo23/logo.png" alt="Porto Logo" width="113" height="48">
                        </a>
                    </div>

                    <div class="header-right">
                        <a href="login.html" class="header-icon d-lg-block d-none">
                            <div class="header-user">
                                <i class="icon-user-2"></i>
                                <div class="header-userinfo">
                                    <span class="d-inline-block font2 line-height-1">Hello!</span>
                                    <h4 class="mb-0">My Account</h4>
                                </div>
                            </div>
                        </a>

                        <a href="wishlist.html" class="header-icon">
                            <i class="icon-wishlist-2"></i>
                        </a>

                        <div class="dropdown cart-dropdown">
                            <a href="#" title="Cart" class="dropdown-toggle cart-toggle" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <i class="minicart-icon"></i>
                                <span class="cart-count badge-circle">3</span>
                            </a>

                            <div class="cart-overlay"></div>

                            <div class="dropdown-menu mobile-cart">
                                <a href="#" title="Close (Esc)" class="btn-close">×</a>

                                <div class="dropdownmenu-wrapper custom-scrollbar">
                                    <div class="dropdown-cart-header">Shopping Cart</div>
                                    <!-- End .dropdown-cart-header -->

                                    <div class="dropdown-cart-products">
                                        <div class="product">
                                            <div class="product-details">
                                                <h4 class="product-title">
                                                    <a href="/porto/demo23-product.html">Ultimate 3D Bluetooth Speaker</a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">1</span>
                                                    × $99.00
                                                </span>
                                            </div><!-- End .product-details -->

                                            <figure class="product-image-container">
                                                <a href="/porto/demo23-product.html" class="product-image">
                                                    <img src="/porto/assets/images/products/product-1.jpg" alt="product"
                                                        width="80" height="80">
                                                </a>

                                                <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                                            </figure>
                                        </div><!-- End .product -->

                                        <div class="product">
                                            <div class="product-details">
                                                <h4 class="product-title">
                                                    <a href="/porto/demo23-product.html">Brown Women Casual HandBag</a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">1</span>
                                                    × $35.00
                                                </span>
                                            </div><!-- End .product-details -->

                                            <figure class="product-image-container">
                                                <a href="/porto/demo23-product.html" class="product-image">
                                                    <img src="/porto/assets/images/products/product-2.jpg" alt="product"
                                                        width="80" height="80">
                                                </a>

                                                <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                                            </figure>
                                        </div><!-- End .product -->

                                        <div class="product">
                                            <div class="product-details">
                                                <h4 class="product-title">
                                                    <a href="/porto/demo23-product.html">Circled Ultimate 3D Speaker</a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">1</span>
                                                    × $35.00
                                                </span>
                                            </div><!-- End .product-details -->

                                            <figure class="product-image-container">
                                                <a href="/porto/demo23-product.html" class="product-image">
                                                    <img src="/porto/assets/images/products/product-3.jpg" alt="product"
                                                        width="80" height="80">
                                                </a>
                                                <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                                            </figure>
                                        </div><!-- End .product -->
                                    </div><!-- End .cart-product -->

                                    <div class="dropdown-cart-total">
                                        <span>SUBTOTAL:</span>

                                        <span class="cart-total-price float-right">$134.00</span>
                                    </div><!-- End .dropdown-cart-total -->

                                    <div class="dropdown-cart-action">
                                        <a href="cart.html" class="btn btn-gray btn-block view-cart">View
                                            Cart</a>
                                        <a href="checkout.html" class="btn btn-dark btn-block">Checkout</a>
                                    </div><!-- End .dropdown-cart-total -->
                                </div><!-- End .dropdownmenu-wrapper -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .dropdown -->

                        <div
                            class="header-search header-search-popup header-search-category text-right d-flex d-lg-none">
                            <a href="#" class="search-toggle" role="button"><i
                                    class="icon-magnifier"></i><span>Search</span></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper">
                                    <input type="search" class="form-control" name="q" id="q"
                                        placeholder="I'm searching for..." required>
                                    <div class="select-custom">
                                         <select id="cat" name="cat">
                                            {!! category_select_options(null, 'All Categories') !!}
                                        </select>
                                    </div><!-- End .select-custom -->
                                    <button class="btn icon-magnifier p-0" title="search" type="submit"></button>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                    </div>
                </div>
            </div>

            <div class="header-bottom sticky-header" data-sticky-options="{'mobile': false}">
                <div class="container-fluid">
                    <div class="header-left d-flex">
                        <nav class="main-nav">
                            <ul class="menu">
                                <li><a href="#">Outlet</a></li>
                                <li><a href="#">Buy Porto</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-center w-auto">
                        <nav class="main-nav">
                            <ul class="menu">
                                <li class="active">
                                    <a href="/porto/demo23.html">Home</a>
                                </li>
                                <li>
                                    <a href="/porto/demo23-shop.html">Categories</a>
                                    <div class="megamenu megamenu-fixed-width megamenu-3cols">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <a href="#" class="nolink">VARIATION 1</a>
                                                <ul class="submenu">
                                                    <li><a href="/porto/category.html">Fullwidth Banner</a></li>
                                                    <li><a href="/porto/category-banner-boxed-slider.html">Boxed Slider
                                                            Banner</a>
                                                    </li>
                                                    <li><a href="/porto/category-banner-boxed-image.html">Boxed Image
                                                            Banner</a>
                                                    </li>
                                                    <li><a href="/porto/category.html">Left Sidebar</a></li>
                                                    <li><a href="/porto/category-sidebar-right.html">Right Sidebar</a></li>
                                                    <li><a href="/porto/category-off-canvas.html">Off Canvas Filter</a></li>
                                                    <li><a href="/porto/category-horizontal-filter1.html">Horizontal
                                                            Filter1</a>
                                                    </li>
                                                    <li><a href="/porto/category-horizontal-filter2.html">Horizontal
                                                            Filter2</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-4">
                                                <a href="#" class="nolink">VARIATION 2</a>
                                                <ul class="submenu">
                                                    <li><a href="/porto/category-list.html">List Types</a></li>
                                                    <li><a href="/porto/category-infinite-scroll.html">Ajax Infinite Scroll</a>
                                                    </li>
                                                    <li><a href="/porto/category.html">3 Columns Products</a></li>
                                                    <li><a href="/porto/category-4col.html">4 Columns Products</a></li>
                                                    <li><a href="/porto/category-5col.html">5 Columns Products</a></li>
                                                    <li><a href="/porto/category-6col.html">6 Columns Products</a></li>
                                                    <li><a href="/porto/category-7col.html">7 Columns Products</a></li>
                                                    <li><a href="/porto/category-8col.html">8 Columns Products</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-4 p-0">
                                                <div class="menu-banner">
                                                    <figure>
                                                        <img src="/porto/assets/images/menu-banner.jpg" alt="Menu banner"
                                                            width="300" height="300">
                                                    </figure>
                                                    <div class="banner-content">
                                                        <h4>
                                                            <span class="">UP TO</span><br />
                                                            <b class="">50%</b>
                                                            <i>OFF</i>
                                                        </h4>
                                                        <a href="/porto/category.html" class="btn btn-sm btn-dark">SHOP NOW</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- End .megamenu -->
                                </li>
                                <li>
                                    <a href="/porto/demo23-product.html">Products</a>
                                    <div class="megamenu megamenu-fixed-width">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <a href="#" class="nolink">PRODUCT PAGES</a>
                                                <ul class="submenu">
                                                    <li><a href="/porto/demo23-product.html">SIMPLE PRODUCT</a></li>
                                                    <li><a href="/porto/product-variable.html">VARIABLE PRODUCT</a></li>
                                                    <li><a href="/porto/demo23-product.html">SALE PRODUCT</a></li>
                                                    <li><a href="/porto/demo23-product.html">FEATURED & ON SALE</a></li>
                                                    <li><a href="/porto/product-custom-tab.html">WITH CUSTOM TAB</a></li>
                                                    <li><a href="/porto/product-sidebar-left.html">WITH LEFT SIDEBAR</a></li>
                                                    <li><a href="/porto/product-sidebar-right.html">WITH RIGHT SIDEBAR</a></li>
                                                    <li><a href="/porto/product-addcart-sticky.html">ADD CART STICKY</a></li>
                                                </ul>
                                            </div><!-- End .col-lg-4 -->

                                            <div class="col-lg-4">
                                                <a href="#" class="nolink">PRODUCT LAYOUTS</a>
                                                <ul class="submenu">
                                                    <li><a href="/porto/product-extended-layout.html">EXTENDED LAYOUT</a></li>
                                                    <li><a href="/porto/product-grid-layout.html">GRID IMAGE</a></li>
                                                    <li><a href="/porto/product-full-width.html">FULL WIDTH LAYOUT</a></li>
                                                    <li><a href="/porto/product-sticky-info.html">STICKY INFO</a></li>
                                                    <li><a href="/porto/product-sticky-both.html">LEFT & RIGHT STICKY</a></li>
                                                    <li><a href="/porto/product-transparent-image.html">TRANSPARENT IMAGE</a>
                                                    </li>
                                                    <li><a href="/porto/product-center-vertical.html">CENTER VERTICAL</a></li>
                                                    <li><a href="#">BUILD YOUR OWN</a></li>
                                                </ul>
                                            </div><!-- End .col-lg-4 -->

                                            <div class="col-lg-4 p-0">
                                                <div class="menu-banner menu-banner-2">
                                                    <figure>
                                                        <img src="/porto/assets/images/menu-banner-1.jpg" alt="Menu banner"
                                                            class="product-promo" width="380" height="790">
                                                    </figure>
                                                    <i>OFF</i>
                                                    <div class="banner-content">
                                                        <h4>
                                                            <span class="">UP TO</span><br />
                                                            <b class="">50%</b>
                                                        </h4>
                                                    </div>
                                                    <a href="/porto/category.html" class="btn btn-sm btn-dark">SHOP NOW</a>
                                                </div>
                                            </div><!-- End .col-lg-4 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .megamenu -->
                                </li>
                                <li class="d-none d-xl-block">
                                    <a href="#">Pages</a>
                                    <ul>
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="cart.html">Shopping Cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="dashboard.html">Dashboard</a></li>
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="#">Blog</a>
                                            <ul>
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="single.html">Blog Post</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                        <li><a href="login.html">Login</a></li>
                                        <li><a href="forgot-password.html">Forgot Password</a></li>
                                    </ul>
                                </li>
                                <li><a href="blog.html">Blog</a></li>
                                <li>
                                    <a href="#">Elements</a>
                                    <ul class="custom-scrollbar">
                                        <li><a href="element-accordions.html">Accordion</a></li>
                                        <li><a href="element-alerts.html">Alerts</a></li>
                                        <li><a href="element-animations.html">Animations</a></li>
                                        <li><a href="element-banners.html">Banners</a></li>
                                        <li><a href="element-buttons.html">Buttons</a></li>
                                        <li><a href="element-call-to-action.html">Call to Action</a></li>
                                        <li><a href="element-countdown.html">Count Down</a></li>
                                        <li><a href="element-counters.html">Counters</a></li>
                                        <li><a href="element-headings.html">Headings</a></li>
                                        <li><a href="element-icons.html">Icons</a></li>
                                        <li><a href="element-info-box.html">Info box</a></li>
                                        <li><a href="element-posts.html">Posts</a></li>
                                        <li><a href="element-products.html">Products</a></li>
                                        <li><a href="element-product-categories.html">Product Categories</a></li>
                                        <li><a href="element-tabs.html">Tabs</a></li>
                                        <li><a href="element-testimonial.html">Testimonials</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-right d-flex pr-0">
                        <div class="header-search header-search-popup header-search-category text-right">
                            <a href="#" class="search-toggle" role="button"><i
                                    class="icon-magnifier mr-2"></i><span>Search</span></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper">
                                    <input type="search" class="form-control" name="q" id="q1"
                                        placeholder="I'm searching for..." required>
                                    <div class="select-custom">
                                        <select id="cat1" name="cat">
                                            <option value="">All Categories</option>
                                            <option value="4">Fashion</option>
                                            <option value="12">- Women</option>
                                            <option value="13">- Men</option>
                                            <option value="66">- Jewellery</option>
                                            <option value="67">- Kids Fashion</option>
                                            <option value="5">Electronics</option>
                                            <option value="21">- Smart TVs</option>
                                            <option value="22">- Cameras</option>
                                            <option value="63">- Games</option>
                                            <option value="7">Home &amp; Garden</option>
                                            <option value="11">Motors</option>
                                            <option value="31">- Cars and Trucks</option>
                                            <option value="32">- Motorcycles &amp; Powersports</option>
                                            <option value="33">- Parts &amp; Accessories</option>
                                            <option value="34">- Boats</option>
                                            <option value="57">- Auto Tools &amp; Supplies</option>
                                        </select>
                                    </div><!-- End .select-custom -->
                                    <button class="btn icon-magnifier p-0" title="search" type="submit"></button>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                    </div>
                </div>
            </div>
        </header>