@extends('layouts.porto')

@section('top-notice')
    @include('porto.demo1.top-notice')
@endsection

@section('header')
    @include('porto.demo1.header')
@endsection

@section('footer')
    @include('porto.demo1.footer')
@endsection

@section('content')
<div class="page-header">
				<div class="container d-flex flex-column align-items-center">
					<nav aria-label="breadcrumb" class="breadcrumb-nav">
						<div class="container">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('page', ['page' => 'index']) }}">{{ __('Home') }}</a></li>
								<li class="breadcrumb-item"><a href="{{ route('page', ['page' => 'shop']) }}">{{ __('Shop') }}</a></li>
								<li class="breadcrumb-item active" aria-current="page">
									{{ __('My Account') }}
								</li>
							</ol>
						</div>
					</nav>

					<h1>My Account</h1>
				</div>
			</div>

			<div class="container account-container custom-account-container">
				<div class="row">
					<div class="sidebar widget widget-dashboard mb-lg-0 mb-3 col-lg-3 order-0">
						<h2 class="text-uppercase">My Account</h2>
						<ul class="nav nav-tabs list flex-column mb-0" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="dashboard-tab" data-toggle="tab" href="#dashboard"
									role="tab" aria-controls="dashboard" aria-selected="true">Dashboard</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" id="order-tab" data-toggle="tab" href="#order" role="tab"
									aria-controls="order" aria-selected="true">Orders</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" id="download-tab" data-toggle="tab" href="#download" role="tab"
									aria-controls="download" aria-selected="false">Downloads</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab"
									aria-controls="address" aria-selected="false">Addresses</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab"
									aria-controls="edit" aria-selected="false">Account
									details</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="shop-address-tab" data-toggle="tab" href="#shipping" role="tab"
									aria-controls="edit" aria-selected="false">Shopping Addres</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{ route('page', ['page' => 'wishlist']) }}">{{ __('Wishlist') }}</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{ route('page', ['page' => 'login']) }}">{{ __('Logout') }}</a>
							</li>
						</ul>
					</div>
					<div class="col-lg-9 order-lg-last order-1 tab-content">
						<div class="tab-pane fade show active" id="dashboard" role="tabpanel">
							<div class="dashboard-content">
								<p>
									Hello <strong class="text-dark">{{ $accountUser->name ?? __('Guest') }}</strong>
									@if($accountUser)
										(<a href="{{ route('logout') }}" class="btn btn-link"
											onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Log out') }}</a>)
										<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
											@csrf
										</form>
									@else
										(<a href="{{ route('login') }}" class="btn btn-link">{{ __('Log in') }}</a>)
									@endif
								</p>
									<a href="{{ route('login') }}" class="btn btn-link ">{{ __('Log out') }}</a>)
								</p>

								<p>
									From your account dashboard you can view your
									<a class="btn btn-link link-to-tab" href="#order">recent orders</a>,
									manage your
									<a class="btn btn-link link-to-tab" href="#address">shipping and billing
										addresses</a>, and
									<a class="btn btn-link link-to-tab" href="#edit">edit your password and account
										details.</a>
								</p>

								<div class="mb-4"></div>

								<div class="row row-lg">
									<div class="col-6 col-md-4">
										<div class="feature-box text-center pb-4">
											<a href="#order" class="link-to-tab"><i
													class="sicon-social-dropbox"></i></a>
											<div class="feature-box-content">
												<h3>ORDERS</h3>
											</div>
										</div>
									</div>

									<div class="col-6 col-md-4">
										<div class="feature-box text-center pb-4">
											<a href="#download" class="link-to-tab"><i
													class="sicon-cloud-download"></i></a>
											<div class=" feature-box-content">
												<h3>DOWNLOADS</h3>
											</div>
										</div>
									</div>

									<div class="col-6 col-md-4">
										<div class="feature-box text-center pb-4">
											<a href="#address" class="link-to-tab"><i
													class="sicon-location-pin"></i></a>
											<div class="feature-box-content">
												<h3>ADDRESSES</h3>
											</div>
										</div>
									</div>

									<div class="col-6 col-md-4">
										<div class="feature-box text-center pb-4">
											<a href="#edit" class="link-to-tab"><i class="icon-user-2"></i></a>
											<div class="feature-box-content p-0">
												<h3>ACCOUNT DETAILS</h3>
											</div>
										</div>
									</div>

									<div class="col-6 col-md-4">
										<div class="feature-box text-center pb-4">
											<a href="{{ route('page', ['page' => 'wishlist']) }}"><i class="sicon-heart"></i></a>
											<div class="feature-box-content">
												<h3>WISHLIST</h3>
											</div>
										</div>
									</div>

									<div class="col-6 col-md-4">
										<div class="feature-box text-center pb-4">
											<a href="{{ route('page', ['page' => 'login']) }}"><i class="sicon-logout"></i></a>
											<div class="feature-box-content">
												<h3>LOGOUT</h3>
											</div>
										</div>
									</div>
								</div><!-- End .row -->
							</div>
						</div><!-- End .tab-pane -->

						<div class="tab-pane fade" id="order" role="tabpanel">
							<div class="order-content">
								<h3 class="account-sub-title d-none d-md-block"><i
										class="sicon-social-dropbox align-middle mr-3"></i>Orders</h3>
								<div class="order-table-container text-center">
									<table class="table table-order text-left">
										<thead>
											<tr>
												<th class="order-id">ORDER</th>
												<th class="order-date">DATE</th>
												<th class="order-status">STATUS</th>
												<th class="order-price">TOTAL</th>
												<th class="order-action">ACTIONS</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class="text-center p-0" colspan="5">
                                                    @forelse($accountOrders ?? [] as $order)
                                                        <tr>
                                                            <td>{{ $order['order_number'] ?? '' }}</td>
                                                            <td>{{ $order['date'] ?? '' }}</td>
                                                            <td>{{ ucfirst($order['status'] ?? 'pending') }}</td>
                                                            <td>{{ $order['total'] ?? '$0.00' }}</td>
                                                            <td>
                                                                <a href="#" class="btn btn-primary btn-sm">{{ __('View') }}</a>
                                                            </td>
                                                        </tr>
                                                    @empty
													    <tr>
                                                            <td class="text-center p-0" colspan="5">
                                                                <p class="mb-5 mt-5">
                                                                    {{ __('No Order has been made yet.') }}
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    @endforelse
												</td>
											</tr>
										</tbody>
									</table>
									<hr class="mt-0 mb-3 pb-2" />

									<a href="{{ route('page', ['page' => 'shop']) }}" class="btn btn-dark">{{ __('Go Shop') }}</a>
								</div>
							</div>
						</div><!-- End .tab-pane -->

						<div class="tab-pane fade" id="download" role="tabpanel">
							<div class="download-content">
								<h3 class="account-sub-title d-none d-md-block"><i
										class="sicon-cloud-download align-middle mr-3"></i>Downloads</h3>
								<div class="download-table-container">
									<p>{{ __('No downloads available yet.') }}</p> <a href="{{ route('page', ['page' => 'shop']) }}"
										class="btn btn-primary text-transform-none mb-2">GO SHOP</a>
								</div>
							</div>
						</div><!-- End .tab-pane -->

						<div class="tab-pane fade" id="address" role="tabpanel">
							<h3 class="account-sub-title d-none d-md-block mb-1"><i
									class="sicon-location-pin align-middle mr-3"></i>Addresses</h3>
							<div class="addresses-content">
								<p class="mb-4">
									The following addresses will be used on the checkout page by
									default.
								</p>

								<div class="row">
									<div class="address col-md-6">
										<div class="heading d-flex">
											<h4 class="text-dark mb-0">Billing address</h4>
										</div>

										<div class="address-box">
											@if(!empty($accountAddresses['billing']))
												<strong>{{ $accountAddresses['billing']['name'] ?? '' }}</strong><br>
												<span>{{ $accountAddresses['billing']['email'] ?? '' }}</span>
											@else
												{{ __('You have not set up this type of address yet.') }}
											@endif
										</div>

										<a href="#billing" class="btn btn-default address-action link-to-tab">
                                            {{ empty($accountAddresses['billing']) ? __('Add Address') : __('Edit Address') }}
                                        </a>
									</div>

									<div class="address col-md-6 mt-5 mt-md-0">
										<div class="heading d-flex">
											<h4 class="text-dark mb-0">
												Shipping address
											</h4>
										</div>

										<div class="address-box">
											@if(!empty($accountAddresses['shipping']))
												<strong>{{ $accountAddresses['shipping']['name'] ?? '' }}</strong><br>
												<span>{{ $accountAddresses['shipping']['address'] ?? '' }}</span>
											@else
												{{ __('You have not set up this type of address yet.') }}
											@endif
										</div>

										<a href="#shipping" class="btn btn-default address-action link-to-tab">
                                            {{ empty($accountAddresses['shipping']) ? __('Add Address') : __('Edit Address') }}
                                        </a>
									</div>
								</div>
							</div>
						</div><!-- End .tab-pane -->

						<div class="tab-pane fade" id="edit" role="tabpanel">
							<h3 class="account-sub-title d-none d-md-block mt-0 pt-1 ml-1"><i
									class="icon-user-2 align-middle mr-3 pr-1"></i>Account Details</h3>
							<div class="account-content">
								<form action="#">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="acc-name">First name <span class="required">*</span></label>
												<input type="text" class="form-control" placeholder="Editor"
													id="acc-name" name="acc-name" required />
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label for="acc-lastname">Last name <span
														class="required">*</span></label>
												<input type="text" class="form-control" id="acc-lastname"
													name="acc-lastname" required />
											</div>
										</div>
									</div>

									<div class="form-group mb-2">
										<label for="acc-text">Display name <span class="required">*</span></label>
										<input type="text" class="form-control" id="acc-text" name="acc-text"
											placeholder="Editor" required />
										<p>This will be how your name will be displayed in the account section and
											in
											reviews</p>
									</div>


									<div class="form-group mb-4">
										<label for="acc-email">Email address <span class="required">*</span></label>
										<input type="email" class="form-control" id="acc-email" name="acc-email"
											placeholder="editor@gmail.com" required />
									</div>

									<div class="change-password">
										<h3 class="text-uppercase mb-2">Password Change</h3>

										<div class="form-group">
											<label for="acc-password">Current Password (leave blank to leave
												unchanged)</label>
											<input type="password" class="form-control" id="acc-password"
												name="acc-password" />
										</div>

										<div class="form-group">
											<label for="acc-password">New Password (leave blank to leave
												unchanged)</label>
											<input type="password" class="form-control" id="acc-new-password"
												name="acc-new-password" />
										</div>

										<div class="form-group">
											<label for="acc-password">Confirm New Password</label>
											<input type="password" class="form-control" id="acc-confirm-password"
												name="acc-confirm-password" />
										</div>
									</div>

									<div class="form-footer mt-3 mb-0">
										<button type="submit" class="btn btn-dark mr-0">
											Save changes
										</button>
									</div>
								</form>
							</div>
						</div><!-- End .tab-pane -->

						<div class="tab-pane fade" id="billing" role="tabpanel">
							<div class="address account-content mt-0 pt-2">
								<h4 class="title">Billing address</h4>

								<form class="mb-2" action="#">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>First name <span class="required">*</span></label>
												<input type="text" class="form-control" required />
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label>Last name <span class="required">*</span></label>
												<input type="text" class="form-control" required />
											</div>
										</div>
									</div>

									<div class="form-group">
										<label>Company </label>
										<input type="text" class="form-control">
									</div>

									<div class="select-custom">
										<label>Country / Region <span class="required">*</span></label>
										<select name="orderby" class="form-control">
											<option value="" selected="selected">British Indian Ocean Territory
											</option>
											<option value="1">Brunei</option>
											<option value="2">Bulgaria</option>
											<option value="3">Burkina Faso</option>
											<option value="4">Burundi</option>
											<option value="5">Cameroon</option>
										</select>
									</div>

									<div class="form-group">
										<label>Street address <span class="required">*</span></label>
										<input type="text" class="form-control"
											placeholder="House number and street name" required />
										<input type="text" class="form-control"
											placeholder="Apartment, suite, unit, etc. (optional)" required />
									</div>

									<div class="form-group">
										<label>Town / City <span class="required">*</span></label>
										<input type="text" class="form-control" required />
									</div>

									<div class="form-group">
										<label>State / Country <span class="required">*</span></label>
										<input type="text" class="form-control" required />
									</div>

									<div class="form-group">
										<label>Postcode / ZIP <span class="required">*</span></label>
										<input type="text" class="form-control" required />
									</div>

									<div class="form-group mb-3">
										<label>Phone <span class="required">*</span></label>
										<input type="number" class="form-control" required />
									</div>

									<div class="form-group mb-3">
										<label>Email address <span class="required">*</span></label>
										<input type="email" class="form-control" placeholder="editor@gmail.com"
											required />
									</div>

									<div class="form-footer mb-0">
										<div class="form-footer-right">
											<button type="submit" class="btn btn-dark py-4">
												Save Address
											</button>
										</div>
									</div>
								</form>
							</div>
						</div><!-- End .tab-pane -->

						<div class="tab-pane fade" id="shipping" role="tabpanel">
							<div class="address account-content mt-0 pt-2">
								<h4 class="title mb-3">Shipping Address</h4>

								<form class="mb-2" action="#">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>First name <span class="required">*</span></label>
												<input type="text" class="form-control" required />
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label>Last name <span class="required">*</span></label>
												<input type="text" class="form-control" required />
											</div>
										</div>
									</div>

									<div class="form-group">
										<label>Company </label>
										<input type="text" class="form-control">
									</div>

									<div class="select-custom">
										<label>Country / Region <span class="required">*</span></label>
										<select name="orderby" class="form-control">
											<option value="" selected="selected">British Indian Ocean Territory
											</option>
											<option value="1">Brunei</option>
											<option value="2">Bulgaria</option>
											<option value="3">Burkina Faso</option>
											<option value="4">Burundi</option>
											<option value="5">Cameroon</option>
										</select>
									</div>

									<div class="form-group">
										<label>Street address <span class="required">*</span></label>
										<input type="text" class="form-control"
											placeholder="House number and street name" required />
										<input type="text" class="form-control"
											placeholder="Apartment, suite, unit, etc. (optional)" required />
									</div>

									<div class="form-group">
										<label>Town / City <span class="required">*</span></label>
										<input type="text" class="form-control" required />
									</div>

									<div class="form-group">
										<label>State / Country <span class="required">*</span></label>
										<input type="text" class="form-control" required />
									</div>

									<div class="form-group">
										<label>Postcode / ZIP <span class="required">*</span></label>
										<input type="text" class="form-control" required />
									</div>

									<div class="form-footer mb-0">
										<div class="form-footer-right">
											<button type="submit" class="btn btn-dark py-4">
												Save Address
											</button>
										</div>
									</div>
								</form>
							</div>
						</div><!-- End .tab-pane -->
					</div><!-- End .tab-content -->
				</div><!-- End .row -->
			</div><!-- End .container -->

			<div class="mb-5"></div><!-- margin -->
@endsection
