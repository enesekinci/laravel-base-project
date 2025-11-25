<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>@yield('title', 'Admin') | Fast Commerce</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('cork/src/assets/img/favicon.ico') }}" />
        <link href="{{ asset('cork/layouts/modern-dark-menu/css/light/loader.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('cork/layouts/modern-dark-menu/css/dark/loader.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('cork/layouts/modern-dark-menu/loader.js') }}"></script>
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet" />
        <link href="{{ asset('cork/src/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('cork/layouts/modern-dark-menu/css/light/plugins.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('cork/layouts/modern-dark-menu/css/dark/plugins.css') }}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->

        <!-- Tom Select CSS (Global) -->
        <link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/src/tomSelect/tom-select.default.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/light/tomSelect/custom-tomSelect.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('cork/src/plugins/css/dark/tomSelect/custom-tomSelect.css') }}" />

        <!-- SweetAlert2 CSS (Global) -->
        <link rel="stylesheet" href="{{ asset('cork/src/plugins/src/sweetalerts2/sweetalerts2.css') }}" />
        <link href="{{ asset('cork/src/plugins/css/light/sweetalerts2/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('cork/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />

        @vite(['resources/js/alpine.js', 'resources/js/admin/init.js'])

        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
        @stack('styles')
        <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

        <style>
            body.dark .layout-px-spacing,
            .layout-px-spacing {
                min-height: calc(100vh - 155px) !important;
            }

            /* Tom Select yükseklik ve padding düzeltmesi - form-select ile aynı */
            .ts-wrapper,
            .ts-control {
                min-height: calc(1.5em + 1.5rem + 2px) !important;
                height: calc(1.5em + 1.5rem + 2px) !important;
            }

            .ts-wrapper.single .ts-control {
                padding: 0.75rem 2.25rem 0.75rem 1.25rem !important;
            }

            .ts-wrapper.single .ts-control input {
                height: calc(1.5em + 1.5rem) !important;
                line-height: 1.5 !important;
                padding: 0 !important;
            }

            .ts-wrapper.single .ts-control .item {
                line-height: 1.5 !important;
                padding: 0 !important;
            }

            /* Tom Select dropdown arrow */
            .ts-wrapper.single .ts-control::after {
                border-width: 0.3em 0.3em 0 0.3em !important;
                margin-top: -0.15em !important;
                right: 1.25rem !important;
            }

            /* Tom Select multi-select için */
            .ts-wrapper.multi .ts-control {
                padding: 0.75rem 1.25rem !important;
                min-height: calc(1.5em + 1.5rem + 2px) !important;
            }

            .ts-wrapper.multi .ts-control .item {
                padding: 0.25em 0.5em !important;
                margin: 0.125rem 0.25rem 0.125rem 0 !important;
            }

            /* Form select ile aynı görünüm için */
            .ts-wrapper.form-select {
                padding: 0 !important;
            }

            /* Icon Button Hover Styles */
            .btn-icon {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                padding: 0.375rem;
                transition: all 0.2s ease;
            }

            .btn-icon svg {
                transition: all 0.2s ease;
            }

            .btn-icon:hover {
                transform: translateY(-1px);
            }

            .btn-icon.btn-outline-primary:hover {
                background-color: var(--bs-primary);
                border-color: var(--bs-primary);
            }

            .btn-icon.btn-outline-primary:hover svg {
                stroke: white;
                stroke-width: 2.5;
            }

            .btn-icon.btn-outline-danger:hover {
                background-color: var(--bs-danger);
                border-color: var(--bs-danger);
            }

            .btn-icon.btn-outline-danger:hover svg {
                stroke: white;
                stroke-width: 2.5;
            }

            .btn-icon.btn-outline-info:hover {
                background-color: var(--bs-info);
                border-color: var(--bs-info);
            }

            .btn-icon.btn-outline-info:hover svg {
                stroke: white;
                stroke-width: 2.5;
            }

            .btn-icon.btn-outline-secondary:hover {
                background-color: var(--bs-secondary);
                border-color: var(--bs-secondary);
            }

            .btn-icon.btn-outline-secondary:hover svg {
                stroke: white;
                stroke-width: 2.5;
            }

            /* Dark mode support */
            body.dark .btn-icon.btn-outline-primary:hover svg,
            body.dark .btn-icon.btn-outline-danger:hover svg,
            body.dark .btn-icon.btn-outline-info:hover svg,
            body.dark .btn-icon.btn-outline-secondary:hover svg {
                stroke: white;
            }

            /* Sidebar Menu Search Styles */
            .sidebar-search-container {
                margin-top: 1rem;
            }

            .sidebar-search-container .input-group {
                border-radius: 8px;
                overflow: hidden;
                background: var(--bs-body-bg);
                border: 1px solid var(--bs-border-color);
            }

            .sidebar-search-container .input-group-text {
                background: transparent;
                border: none;
                color: var(--bs-secondary);
                padding: 0.5rem 0.75rem;
            }

            .sidebar-search-container .form-control {
                border: none;
                background: transparent;
                padding: 0.5rem 0.75rem;
                font-size: 0.875rem;
            }

            .sidebar-search-container .form-control:focus {
                box-shadow: none;
                background: transparent;
            }

            .sidebar-search-container .btn-link {
                border: none;
                background: transparent;
                padding: 0.5rem 0.75rem;
            }

            .sidebar-search-container .btn-link:hover {
                color: var(--bs-danger) !important;
            }

            /* Dark mode için sidebar search */
            body.dark .sidebar-search-container .input-group {
                background: rgba(255, 255, 255, 0.05);
                border-color: rgba(255, 255, 255, 0.1);
            }

            body.dark .sidebar-search-container .form-control {
                color: var(--bs-body-color);
            }

            body.dark .sidebar-search-container .form-control::placeholder {
                color: var(--bs-secondary);
            }
        </style>
    </head>
    <body class="layout-boxed">
        <!-- BEGIN LOADER -->
        <div id="load_screen">
            <div class="loader">
                <div class="loader-content">
                    <div class="spinner-grow align-self-center"></div>
                </div>
            </div>
        </div>
        <!--  END LOADER -->

        <!--  BEGIN NAVBAR  -->
        <div class="header-container container-xxl">
            <header class="header navbar navbar-expand-sm expand-header">
                <a href="javascript:void(0);" class="sidebarCollapse">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="feather feather-menu"
                    >
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </a>

                <div class="search-animated toggle-search">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="feather feather-search"
                    >
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <form class="form-inline search-full form-inline search" role="search">
                        <div class="search-bar">
                            <input type="text" class="form-control search-form-control ml-lg-auto" placeholder="Ara..." />
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="feather feather-x search-close"
                            >
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </div>
                    </form>
                    <span class="badge badge-secondary">Ctrl + /</span>
                </div>

                <ul class="navbar-item flex-row ms-lg-auto ms-0">
                    <li class="nav-item theme-toggle-item">
                        <a href="javascript:void(0);" class="nav-link theme-toggle">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="feather feather-moon dark-mode"
                            >
                                <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                            </svg>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="feather feather-sun light-mode"
                            >
                                <circle cx="12" cy="12" r="5"></circle>
                                <line x1="12" y1="1" x2="12" y2="3"></line>
                                <line x1="12" y1="21" x2="12" y2="23"></line>
                                <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                                <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                                <line x1="1" y1="12" x2="3" y2="12"></line>
                                <line x1="21" y1="12" x2="23" y2="12"></line>
                                <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                                <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                            </svg>
                        </a>
                    </li>

                    <li class="nav-item dropdown notification-dropdown">
                        <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="feather feather-bell"
                            >
                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                            </svg>
                            <span class="badge badge-success"></span>
                        </a>

                        <div class="dropdown-menu position-absolute" aria-labelledby="notificationDropdown">
                            <div class="drodpown-title message">
                                <h6 class="d-flex justify-content-between">
                                    <span class="align-self-center">Mesajlar</span>
                                    <span class="badge badge-primary">9 Okunmamış</span>
                                </h6>
                            </div>
                            <div class="notification-scroll">
                                <div class="dropdown-item">
                                    <div class="media server-log">
                                        <img src="{{ asset('cork/src/assets/img/profile-16.jpeg') }}" class="img-fluid me-2" alt="avatar" />
                                        <div class="media-body">
                                            <div class="data-info">
                                                <h6 class="">Yeni Sipariş</h6>
                                                <p class="">1 saat önce</p>
                                            </div>

                                            <div class="icon-status">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    class="feather feather-x"
                                                >
                                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown user-profile-dropdown order-lg-0 order-1">
                        <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar-container">
                                <div class="avatar avatar-sm avatar-indicators avatar-online">
                                    <img alt="avatar" src="{{ asset('cork/src/assets/img/profile-30.png') }}" class="rounded-circle" />
                                </div>
                            </div>
                        </a>

                        <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                            <div class="user-profile-section">
                                <div class="media mx-auto">
                                    <div class="emoji me-2">&#x1F44B;</div>
                                    <div class="media-body">
                                        <h5>{{ Auth::user()->name ?? 'Kullanıcı' }}</h5>
                                        <p>Admin</p>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-item">
                                <a href="#">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="feather feather-user"
                                    >
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <span>Profil</span>
                                </a>
                            </div>
                            <div class="dropdown-item">
                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="feather feather-log-out"
                                    >
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg>
                                    <span>Çıkış Yap</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </header>
        </div>
        <!--  END NAVBAR  -->

        <!--  BEGIN MAIN CONTAINER  -->
        <div class="main-container" id="container">
            <div class="overlay"></div>
            <div class="search-overlay"></div>

            <!--  BEGIN SIDEBAR  -->
            <div class="sidebar-wrapper sidebar-theme">
                <nav id="sidebar">
                    <div class="navbar-nav theme-brand flex-row text-center">
                        <div class="nav-logo">
                            <div class="nav-item theme-logo">
                                <a href="{{ route('admin.dashboard') }}">
                                    <img src="{{ asset('cork/src/assets/img/logo.svg') }}" class="navbar-logo" alt="logo" />
                                </a>
                            </div>
                            <div class="nav-item theme-text">
                                <a href="{{ route('admin.dashboard') }}" class="nav-link">Fast Commerce</a>
                            </div>
                        </div>
                        <div class="nav-item sidebar-toggle">
                            <div class="btn-toggle sidebarCollapse">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="feather feather-chevrons-left"
                                >
                                    <polyline points="11 17 6 12 11 7"></polyline>
                                    <polyline points="18 17 13 12 18 7"></polyline>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="profile-info">
                        <div class="user-info">
                            <div class="profile-img">
                                <img src="{{ asset('cork/src/assets/img/profile-30.png') }}" alt="avatar" />
                            </div>
                            <div class="profile-content">
                                <h6 class="">{{ Auth::user()->name ?? 'Kullanıcı' }}</h6>
                                <p class="">Admin</p>
                            </div>
                        </div>
                    </div>

                    <!-- Menu Search -->
                    <div class="sidebar-search-container px-3 mb-3">
                        <div class="input-group">
                            <span class="input-group-text">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="18"
                                    height="18"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="feather feather-search"
                                >
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                            </span>
                            <input
                                type="text"
                                id="sidebar-menu-search"
                                class="form-control"
                                placeholder="Menüde ara..."
                                autocomplete="off"
                            />
                            <button
                                type="button"
                                id="sidebar-menu-search-clear"
                                class="btn btn-link text-muted d-none"
                                style="padding: 0.375rem 0.5rem; text-decoration: none"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="18"
                                    height="18"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="feather feather-x"
                                >
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="shadow-bottom"></div>
                    <ul class="list-unstyled menu-categories" id="accordionExample">
                        <li class="menu">
                            <a
                                href="#dashboard"
                                data-bs-toggle="collapse"
                                aria-expanded="{{ request()->routeIs('admin.dashboard') ? 'true' : 'false' }}"
                                class="dropdown-toggle {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                            >
                                <div class="">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="feather feather-home"
                                    >
                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                    </svg>
                                    <span>Dashboard</span>
                                </div>
                                <div>
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="feather feather-chevron-right"
                                    >
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </div>
                            </a>
                            <ul class="collapse submenu list-unstyled {{ request()->routeIs('admin.dashboard') ? 'show' : '' }}" id="dashboard" data-bs-parent="#accordionExample">
                                <li>
                                    <a href="{{ route('admin.dashboard') }}">Ana Sayfa</a>
                                </li>
                            </ul>
                        </li>

                        <li class="menu">
                            <a href="{{ route('admin.components') }}" class="dropdown-toggle {{ request()->routeIs('admin.components') ? 'active' : '' }}">
                                <div class="">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="feather feather-layers"
                                    >
                                        <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                        <polyline points="2 17 12 22 22 17"></polyline>
                                        <polyline points="2 12 12 17 22 12"></polyline>
                                    </svg>
                                    <span>Components</span>
                                </div>
                                <div></div>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!--  END SIDEBAR  -->

            <!--  BEGIN CONTENT AREA  -->
            <div id="content" class="main-content">
                <div class="layout-px-spacing">
                    <div class="middle-content container-xxl p-0">
                        @yield('content')
                    </div>
                </div>

                <div class="footer-wrapper">
                    <div class="footer-section f-section-1">
                        <p class="">
                            Copyright ©
                            <span class="dynamic-year">{{ date('Y') }}</span>
                            <a target="_blank" href="#">Fast Commerce</a>
                            , Tüm hakları saklıdır.
                        </p>
                    </div>
                    <div class="footer-section f-section-2">
                        <p class="">
                            Coded with
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="feather feather-heart"
                            >
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                            </svg>
                        </p>
                    </div>
                </div>
            </div>
            <!--  END CONTENT AREA  -->
        </div>
        <!-- END MAIN CONTAINER -->

        <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
        <script src="{{ asset('cork/src/plugins/src/global/vendors.min.js') }}"></script>
        <script src="{{ asset('cork/src/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('cork/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('cork/src/plugins/src/mousetrap/mousetrap.min.js') }}"></script>
        <script src="{{ asset('cork/src/plugins/src/waves/waves.min.js') }}"></script>
        <script src="{{ asset('cork/layouts/modern-dark-menu/app.js') }}"></script>
        <!-- END GLOBAL MANDATORY SCRIPTS -->

        <!-- Toast Container (Alpine.js) -->
        <div
            x-data="{ messages: $store.toast.messages }"
            x-init="$watch('$store.toast.messages', () => (messages = $store.toast.messages))"
            class="fixed bottom-4 right-4 z-50 space-y-2"
            style="z-index: 9999"
        >
            <template x-for="message in messages" :key="message.id">
                <div
                    x-show="true"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    :class="{
                    'bg-success': message.type === 'success',
                    'bg-danger': message.type === 'error',
                    'bg-info': message.type === 'info',
                    'bg-warning': message.type === 'warning'
                }"
                    class="alert alert-dismissible fade show text-white"
                    role="alert"
                >
                    <span x-text="message.message"></span>
                    <button @click="$store.toast.remove(message.id)" type="button" class="btn-close btn-close-white" aria-label="Close"></button>
                </div>
            </template>
        </div>

        <!-- Confirm Modal (Alpine.js) -->
        <div
            x-data="{ open: $store.confirm.open }"
            x-show="open"
            x-init="$watch('$store.confirm.open', () => (open = $store.confirm.open))"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="modal fade"
            style="display: none; z-index: 9998"
            tabindex="-1"
        >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" x-text="$store.confirm.title"></h5>
                        <button type="button" class="btn-close" @click="$store.confirm.cancel()" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p x-text="$store.confirm.message"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="$store.confirm.cancel()">İptal</button>
                        <button type="button" class="btn btn-danger" @click="$store.confirm.confirm()">Onayla</button>
                    </div>
                </div>
            </div>
            <div class="modal-backdrop fade show" @click="$store.confirm.cancel()"></div>
        </div>

        <!-- Tom Select (Global) -->
        <script src="{{ asset('cork/src/plugins/src/tomSelect/tom-select.base.js') }}"></script>
        <script>
            // Global Tom Select initialization - Tüm select'leri otomatik Tom Select'e çevir
            ;(function () {
                // Mevcut select'leri initialize et
                function initTomSelects() {
                    // Tüm select elementlerini bul (data-tomselect="false" olanları hariç tut)
                    document.querySelectorAll('select:not([data-tomselect="false"]):not(.ts-hidden-accessible)').forEach(function (select) {
                        // Eğer zaten Tom Select ile initialize edilmişse atla
                        if (select.tomselect || select.hasAttribute('data-tomselect-initialized')) {
                            return
                        }

                        // SweetAlert2 içindeki select'leri ignore et
                        if (select.closest('.swal2-container')) {
                            return
                        }

                        // Editör içindeki select'leri ignore et (Quill toolbar, TinyMCE, vb.)
                        if (select.closest('.ql-toolbar, .ql-container, .mce-container, .editor-toolbar, .ql-editor')) {
                            return
                        }

                        // Multiple select kontrolü
                        const isMultiple = select.hasAttribute('multiple')

                        // Placeholder kontrolü
                        const placeholder = select.getAttribute('placeholder') || select.getAttribute('data-placeholder') || 'Seçiniz...'

                        // Tom Select options
                        const options = {
                            placeholder: placeholder,
                            allowEmptyOption: true,
                            sortField: {
                                field: 'text',
                                direction: 'asc',
                            },
                            // Search özelliği her zaman açık
                            searchField: ['text', 'value'],
                            // Dropdown açıldığında search input'u focus et
                            onDropdownOpen: function () {
                                const searchInput = this.control_input
                                if (searchInput) {
                                    setTimeout(() => {
                                        searchInput.focus()
                                    }, 50)
                                }
                            },
                        }

                        // Multiple select için ek ayarlar
                        if (isMultiple) {
                            options.maxItems = select.getAttribute('data-max-items') ? parseInt(select.getAttribute('data-max-items')) : null
                        }

                        try {
                            const tomSelect = new TomSelect(select, options)

                            // Alpine.js ile entegrasyon
                            if (window.Alpine && select.hasAttribute('x-model')) {
                                // Tom Select değiştiğinde Alpine.js'i güncelle
                                tomSelect.on('change', function (value) {
                                    // Alpine.js component'ini bul ve güncelle
                                    const alpineComponent = select.closest('[x-data]')
                                    if (alpineComponent && window.Alpine.$data) {
                                        try {
                                            const component = window.Alpine.$data(alpineComponent)
                                            const modelName = select.getAttribute('x-model')
                                            if (component && component[modelName] !== undefined) {
                                                component[modelName] = isMultiple ? (Array.isArray(value) ? value : [value]) : value
                                            }
                                        } catch (e) {
                                            // Alpine.js component bulunamadı, devam et
                                        }
                                    }
                                })
                            }

                            // İşaretle ki tekrar initialize edilmesin
                            select.setAttribute('data-tomselect-initialized', 'true')
                        } catch (e) {
                            console.warn('Tom Select initialization failed for:', select, e)
                        }
                    })
                }

                // Sayfa yüklendiğinde initialize et
                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', initTomSelects)
                } else {
                    initTomSelects()
                }

                // Alpine.js ile entegrasyon - Alpine.js component'leri yüklendikten sonra
                if (window.Alpine) {
                    // Alpine.js init event'ini dinle
                    document.addEventListener('alpine:init', function () {
                        setTimeout(initTomSelects, 100)
                    })

                    // Alpine.js component'leri mount olduktan sonra
                    document.addEventListener('alpine:initialized', function () {
                        setTimeout(initTomSelects, 200)
                    })
                }

                // MutationObserver ile dinamik eklenen select'leri yakala
                const observer = new MutationObserver((mutations) => {
                    let shouldInit = false
                    mutations.forEach((mutation) => {
                        mutation.addedNodes.forEach((node) => {
                            if (node.nodeType !== 1) return

                            // Select elementlerini kontrol et
                            if (node.tagName === 'SELECT' || node.querySelectorAll?.('select').length > 0) {
                                shouldInit = true
                            }
                        })
                    })

                    if (shouldInit) {
                        setTimeout(initTomSelects, 100)
                    }
                })

                observer.observe(document.body, {
                    childList: true,
                    subtree: true,
                })
            })()
        </script>

        <!-- SweetAlert2 JS (Global) -->
        <script src="{{ asset('cork/src/plugins/src/sweetalerts2/sweetalerts2.min.js') }}"></script>
        <script>
            // SweetAlert2 Toast Mixin - Genel kullanım için
            window.SwalToast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer
                    toast.onmouseleave = Swal.resumeTimer
                },
            })

            // SweetAlert2 Helper Functions
            window.swalHelpers = {
                // Success toast
                success: function (message) {
                    window.SwalToast.fire({
                        icon: 'success',
                        title: message,
                    })
                },

                // Error toast
                error: function (message) {
                    window.SwalToast.fire({
                        icon: 'error',
                        title: message,
                    })
                },

                // Warning toast
                warning: function (message) {
                    window.SwalToast.fire({
                        icon: 'warning',
                        title: message,
                    })
                },

                // Info toast
                info: function (message) {
                    window.SwalToast.fire({
                        icon: 'info',
                        title: message,
                    })
                },

                // Confirm dialog
                confirm: function (options) {
                    const defaultOptions = {
                        title: 'Emin misiniz?',
                        text: 'Bu işlemi geri alamazsınız!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Evet',
                        cancelButtonText: 'Hayır',
                        reverseButtons: true,
                    }
                    return Swal.fire({ ...defaultOptions, ...options })
                },

                // Success alert
                successAlert: function (title, text) {
                    return Swal.fire({
                        icon: 'success',
                        title: title || 'Başarılı!',
                        text: text || '',
                        showConfirmButton: true,
                    })
                },

                // Error alert
                errorAlert: function (title, text) {
                    return Swal.fire({
                        icon: 'error',
                        title: title || 'Hata!',
                        text: text || '',
                        showConfirmButton: true,
                    })
                },
            }
        </script>

        <!-- Sidebar Menu Search -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const searchInput = document.getElementById('sidebar-menu-search')
                const clearButton = document.getElementById('sidebar-menu-search-clear')
                const menuItems = document.querySelectorAll('#accordionExample > .menu')

                if (!searchInput) return

                // Clear button göster/gizle
                function toggleClearButton() {
                    if (searchInput.value.trim() !== '') {
                        clearButton.classList.remove('d-none')
                    } else {
                        clearButton.classList.add('d-none')
                    }
                }

                // Arama fonksiyonu
                function filterMenuItems(searchTerm) {
                    const term = searchTerm.toLowerCase().trim()
                    let hasVisibleItems = false

                    menuItems.forEach((menuItem) => {
                        const menuLink = menuItem.querySelector('a.dropdown-toggle, a:not(.dropdown-toggle)')
                        const menuText = menuLink ? menuLink.textContent.toLowerCase() : ''
                        const submenuItems = menuItem.querySelectorAll('.submenu li a')
                        let hasVisibleSubmenu = false

                        // Alt menü öğelerini kontrol et
                        submenuItems.forEach((subItem) => {
                            const subText = subItem.textContent.toLowerCase()
                            if (subText.includes(term)) {
                                subItem.closest('li').style.display = ''
                                hasVisibleSubmenu = true
                            } else {
                                subItem.closest('li').style.display = 'none'
                            }
                        })

                        // Ana menü öğesi veya alt menü öğelerinden biri eşleşiyorsa göster
                        if (term === '' || menuText.includes(term) || hasVisibleSubmenu) {
                            menuItem.style.display = ''
                            hasVisibleItems = true

                            // Eğer alt menüde eşleşme varsa, alt menüyü aç
                            if (hasVisibleSubmenu && term !== '') {
                                const collapseElement = menuItem.querySelector('.collapse')
                                if (collapseElement && !collapseElement.classList.contains('show')) {
                                    const bsCollapse = new bootstrap.Collapse(collapseElement, {
                                        toggle: false,
                                    })
                                    bsCollapse.show()
                                }
                            }
                        } else {
                            menuItem.style.display = 'none'
                        }

                        // Menu heading'leri kontrol et
                        const menuHeading = menuItem.querySelector('.menu-heading')
                        if (menuHeading) {
                            const headingText = menuHeading.textContent.toLowerCase()
                            if (term === '' || headingText.includes(term)) {
                                menuHeading.closest('.menu').style.display = ''
                            }
                        }
                    })

                    // Eğer hiçbir sonuç yoksa mesaj göster
                    const noResultsMessage = document.getElementById('sidebar-no-results')
                    if (!hasVisibleItems && term !== '') {
                        if (!noResultsMessage) {
                            const message = document.createElement('li')
                            message.id = 'sidebar-no-results'
                            message.className = 'menu text-center p-3'
                            message.innerHTML = '<span class="text-muted">Sonuç bulunamadı</span>'
                            document.getElementById('accordionExample').appendChild(message)
                        }
                    } else {
                        if (noResultsMessage) {
                            noResultsMessage.remove()
                        }
                    }
                }

                // Input event listener
                searchInput.addEventListener('input', function (e) {
                    const searchTerm = e.target.value
                    toggleClearButton()
                    filterMenuItems(searchTerm)
                })

                // Clear button event listener
                clearButton.addEventListener('click', function () {
                    searchInput.value = ''
                    toggleClearButton()
                    filterMenuItems('')
                    searchInput.focus()
                })

                // Enter tuşu ile arama yapma (form submit'i engelle)
                searchInput.addEventListener('keydown', function (e) {
                    if (e.key === 'Enter') {
                        e.preventDefault()
                    }
                })

                // İlk yüklemede clear button'u gizle
                toggleClearButton()
            })
        </script>

        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
        @stack('scripts')
        <!-- END PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    </body>
</html>
