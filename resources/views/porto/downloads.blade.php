@extends('layouts.porto')

@section('header')
    @include('components.porto.header')
@endsection

@section('content')
<div class="page-header">
				<div class="container d-flex flex-column align-items-center">
					<nav aria-label="breadcrumb" class="breadcrumb-nav">
						<div class="container">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('page', ['page' => 'index']) }}">Home</a></li>
								<li class="breadcrumb-item"><a href="/porto/category.html">Shop</a></li>
								<li class="breadcrumb-item active" aria-current="page">
									My Account
								</li>
							</ol>
						</div>
					</nav>

					<h1>My Account</h1>
				</div>
			</div>

			<div class="container account-container">
				<div class="row">
					<div class="col-lg-9 order-lg-last order-1">

					</div><!-- End .col-lg-9 -->

					<aside class="sidebar col-lg-3 order-0">
						<div class="widget widget-dashboard">
							<h2 class="text-uppercase">My Account</h2>
							<ul class="list mb-0">
								<li>
									<a href="/porto/dashboard.html">Dashboard</a>
								</li>
								<li>
									<a href="/porto/order.html">Orders</a>
								</li>
								<li>
									<a href="/porto/downloads.html" class="active">Downloads
									</a>
								</li>
								<li>
									<a href="/porto/address.html">Addresses
									</a>
								</li>
								<li>
									<a href="/porto/edit-account.html">Account details
									</a>
								</li>
								<li>
									<a href="/porto/wishlist.html">Wishlist</a>
								</li>
								<li>
									<a href="/porto/login.html">Logout</a>
								</li>
							</ul>
						</div>
					</aside>
				</div><!-- End .row -->
			</div><!-- End .container -->

			<div class="mb-5"></div><!-- margin -->
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
