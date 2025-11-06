@extends('layouts.porto')

@section('header')
    @include('components.porto.header')
@endsection

@section('content')
<nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/porto/demo22.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Store List</li>
                    </ol>
                </div>
            </nav>

            <div class="container">
                <div class="toolbox toolbox-store sticky-header" data-sticky-options="{'mobile': true}">
                    <div class="toolbox-left">
                        <div class="toolbox-item d-none d-md-block">
                            <label>Total store showing: 3</label>
                        </div>

                        <div class="toolbox-item toolbox-filter mr-0">
                            <a href="#filter-form" class="btn collapsed" data-toggle="collapse"><svg data-name="Layer 3"
                                    id="Layer_3" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                    <line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
                                    <line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
                                    <line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
                                    <line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
                                    <line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
                                    <line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
                                    <path d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z"
                                        class="cls-2"></path>
                                    <path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                                    <path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
                                    <path
                                        d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z"
                                        class="cls-2"></path>
                                </svg>Filter</a>
                        </div>
                    </div>

                    <div class="toolbox-item toolbox-sort">
                        <label>Sort By:</label>

                        <div class="select-custom">
                            <select name="orderby" class="form-control">
                                <option value="menu_order" selected="selected">Most Recent</option>
                                <option value="popularity">Most Popular</option>
                            </select>
                        </div><!-- End .select-custom -->


                    </div><!-- End .toolbox-item -->

                    <div class="toolbox-item layout-modes">
                        <a href="/porto/demo22-vendors.html" class="layout-btn btn-grid" title="Grid">
                            <i class="icon-mode-grid"></i>
                        </a>
                        <a href="/porto/demo22-vendors-list.html" class="layout-btn btn-list active" title="List">
                            <i class="icon-mode-list"></i>
                        </a>
                    </div><!-- End .layout-modes -->
                </div>

                <div id="filter-form" class="filter-form-container collapse">
                    <div></div>
                    <form action="#" class="mb-2">
                        <div class="row">
                            <div class="input-group col-lg-7 col-xl-5">
                                <input type="text" class="form-control" placeholder="Searcch Vendors" required>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary btn-submit">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="mt-2">
                    <div class="store-default store-list">
                        <div class="store-header">
                            <a href="/porto/demo22-store.html">
                                <figure>
                                    <img src="/porto/assets/images/demoes/demo22/vendors/banner-1.jpg" alt="vendor" width="625"
                                        height="299">
                                </figure>
                            </a>
                        </div>

                        <div class="store-content">
                            <a href="/porto/demo22-store.html">
                                <h3 class="store-title">Porto Vendor</h3>
                            </a>

                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:80%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div><!-- End .product-ratings -->
                                <p>4.00 out of 5</p>
                            </div><!-- End .product-container -->

                            <p class="store-address">
                                California, United States (US)
                            </p>
                        </div>

                        <div class="store-footer">
                            <div class="seller-avatar">
                                <img src="/porto/assets/images/demoes/demo22/vendors/avatar-1.jpg" alt="avatar" width="100"
                                    height="100">
                            </div>
                            <a href="/porto/demo22-store.html" class="btn btn-primary btn-round">
                            </a>
                        </div>
                    </div>
                    <div class="store-default store-list">
                        <div class="store-header">
                            <a href="/porto/demo22-store.html">
                                <figure>
                                    <img src="/porto/assets/images/demoes/demo22/vendors/banner-2.jpg" alt="vendor" width="625"
                                        height="299">
                                </figure>
                            </a>
                        </div>

                        <div class="store-content">
                            <a href="/porto/demo22-store.html">
                                <h3 class="store-title">Vendor 2</h3>
                            </a>
                            <p class="store-address">
                                California, United States (US)
                            </p>
                        </div>

                        <div class="store-footer">
                            <div class="seller-avatar">
                                <img src="/porto/assets/images/demoes/demo22/vendors/avatar-2.png" alt="avatar" width="100"
                                    height="100">
                            </div>
                            <a href="/porto/demo22-store.html" class="btn btn-primary btn-round">
                            </a>
                        </div>
                    </div>
                    <div class="store-default store-list no-banner">
                        <div class="store-header">
                            <a href="/porto/demo22-store.html">
                                <figure>
                                    <img src="/porto/assets/images/demoes/demo22/vendors/banner-default.png" alt="vendor"
                                        width="625" height="299">
                                </figure>
                            </a>
                        </div>

                        <div class="store-content">
                            <a href="/porto/demo22-store.html">
                                <h3 class="store-title">Vendor 3</h3>
                            </a>

                            <p class="store-address">
                                United Kingdom (UK)
                            </p>
                        </div>

                        <div class="store-footer">
                            <div class="seller-avatar">
                                <img src="/porto/assets/images/demoes/demo22/vendors/avatar-3.png" alt="avatar" width="100"
                                    height="100">
                            </div>
                            <a href="/porto/demo22-store.html" class="btn btn-primary btn-round">
                            </a>
                        </div>
                    </div>
                </div>
            </div><!-- End .container -->

            <div class="mb-6"></div>
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
