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
	<div class="container" x-data="{
			cartItems: {{ json_encode($cartItems ?? []) }},
			cartTotals: {{ json_encode($cartTotals ?? []) }},

			formatPrice(price) {
				return '$' + parseFloat(price).toFixed(2);
			},

			updateQuantity(index, change) {
				let item = this.cartItems[index];
				let newQty = parseInt(item.quantity) + change;
				if (newQty < 1) return;

				fetch('{{ route('cart.update') }}', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json',
						'X-CSRF-TOKEN': '{{ csrf_token() }}'
					},
					body: JSON.stringify({
						item_key: item.key,
						quantity: newQty
					})
				})
				.then(response => response.json())
				.then(data => {
					if (data.success) {
						this.cartItems = Object.values(data.cart.items);
						this.cartTotals.subtotal = data.cart.total;
						this.cartTotals.formattedSubtotal = data.cart.formatted_total;
						this.cartTotals.total = data.cart.total; // + shipping if needed
						this.cartTotals.formattedTotal = data.cart.formatted_total;

						// Dispatch event to update mini-cart
						window.dispatchEvent(new CustomEvent('cart-updated', { detail: data.cart }));
					}
				});
			},

			removeItem(index) {
				if(confirm('Are you sure you want to remove this item?')) {
					let item = this.cartItems[index];

					fetch('{{ route('cart.remove') }}', {
						method: 'POST',
						headers: {
							'Content-Type': 'application/json',
							'X-CSRF-TOKEN': '{{ csrf_token() }}'
						},
						body: JSON.stringify({
							item_key: item.key
						})
					})
					.then(response => response.json())
					.then(data => {
						if (data.success) {
							this.cartItems = Object.values(data.cart.items);
							this.cartTotals.subtotal = data.cart.total;
							this.cartTotals.formattedSubtotal = data.cart.formatted_total;
							this.cartTotals.total = data.cart.total;
							this.cartTotals.formattedTotal = data.cart.formatted_total;

							// Dispatch event to update mini-cart
							window.dispatchEvent(new CustomEvent('cart-updated', { detail: data.cart }));
						}
					});
				}
			},

			recalculateTotals() {
				// Client-side recalculation is less reliable, relying on server response in updateQuantity
			}
		}">
		<ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
			<li class="active">
				<a href="{{ route('page', ['page' => 'cart']) }}">{{ __('Shopping Cart') }}</a>
			</li>
			<li>
				<a href="{{ route('page', ['page' => 'checkout']) }}">{{ __('Checkout') }}</a>
			</li>
			<li class="disabled">
				<a href="#">{{ __('Order Complete') }}</a>
			</li>
		</ul>

		<div class="row">
			<div class="col-lg-8">
				<div class="cart-table-container">
					<table class="table table-cart">
						<thead>
							<tr>
								<th class="thumbnail-col"></th>
								<th class="product-col">Product</th>
								<th class="price-col">Price</th>
								<th class="qty-col">Quantity</th>
								<th class="text-right">Subtotal</th>
							</tr>
						</thead>
						<tbody>
							<template x-for="(item, index) in cartItems" :key="item.key">
								<tr class="product-row">
									<td>
										<figure class="product-image-container">
											<a :href="item.url" class="product-image">
												<img :src="item.image" :alt="item.name">
											</a>

											<a href="#" @click.prevent="removeItem(index)" class="btn-remove icon-cancel" title="Remove Product"></a>
										</figure>
									</td>
									<td class="product-col">
										<h5 class="product-title">
											<a :href="item.url" x-text="item.name"></a>
										</h5>
										<!-- <small class="text-muted" x-text="item.sku"></small> -->
									</td>
									<td x-text="item.formatted_unit_price"></td>
									<td>
										<div class="product-single-qty">
											<div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
												<span class="input-group-btn input-group-prepend">
													<button class="btn btn-outline btn-down-icon bootstrap-touchspin-down" type="button"
														@click="updateQuantity(index, -1)"></button>
												</span>
												<input class="horizontal-quantity form-control" type="text" :value="item.quantity" readonly>
												<span class="input-group-btn input-group-append">
													<button class="btn btn-outline btn-up-icon bootstrap-touchspin-up" type="button"
														@click="updateQuantity(index, 1)"></button>
												</span>
											</div>
										</div>
									</td>
									<td class="text-right"><span class="subtotal-price" x-text="item.formatted_subtotal"></span></td>
								</tr>
							</template>
							<template x-if="cartItems.length === 0">
								<tr>
									<td colspan="5" class="text-center text-muted py-4">Your cart is empty.</td>
								</tr>
							</template>
						</tbody>

						<tfoot>
							<tr>
								<td colspan="5" class="clearfix">
									<div class="float-left">
										<div class="cart-discount">
											<form action="#">
												<div class="input-group">
													<input type="text" class="form-control form-control-sm" placeholder="Coupon Code" required>
													<div class="input-group-append">
														<button class="btn btn-sm" type="submit">Apply
															Coupon</button>
													</div>
												</div>
											</form>
										</div>
									</div>

									<div class="float-right">
										<button type="submit" class="btn btn-shop btn-update-cart" @click="recalculateTotals()">
											Update Cart
										</button>
									</div>
								</td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="cart-summary">
					<h3>CART TOTALS</h3>

					<table class="table table-totals">
						<tbody>
							<tr>
								<td>Subtotal</td>
								<td x-text="cartTotals.formattedSubtotal"></td>
							</tr>

							<tr>
								<td colspan="2" class="text-left">
									<h4>Shipping</h4>

									<div class="form-group form-group-custom-control">
										<div class="custom-control custom-radio">
											<input type="radio" class="custom-control-input" name="radio" checked>
											<label class="custom-control-label">Local pickup</label>
										</div>
									</div>

									<div class="form-group form-group-custom-control mb-0">
										<div class="custom-control custom-radio mb-0">
											<input type="radio" name="radio" class="custom-control-input">
											<label class="custom-control-label">Flat rate</label>
										</div>
									</div>

									<form action="#">
										<div class="form-group form-group-sm">
											<label>Shipping to <strong>NY.</strong></label>
											<div class="select-custom">
												<select class="form-control form-control-sm" name="country">
													<option value="USA">United States (US)</option>
													<option value="Turkey">Turkey</option>
												</select>
											</div>
										</div>

										<div class="form-group form-group-sm">
											<div class="select-custom">
												<select class="form-control form-control-sm" name="state">
													<option value="NY">New York</option>
													<option value="CA">California</option>
												</select>
											</div>
										</div>

										<div class="form-group form-group-sm">
											<input type="text" class="form-control form-control-sm" placeholder="Town / City" value="New York">
										</div>

										<div class="form-group form-group-sm">
											<input type="text" class="form-control form-control-sm" placeholder="ZIP" value="10001">
										</div>

										<button type="submit" class="btn btn-shop btn-update-total">
											Update Totals
										</button>
									</form>
								</td>
							</tr>
						</tbody>

						<tfoot>
							<tr>
								<td>Total</td>
								<td x-text="cartTotals.formattedTotal"></td>
							</tr>
						</tfoot>
					</table>

					<div class="checkout-methods">
						<a href="{{ route('page', ['page' => 'checkout']) }}" class="btn btn-block btn-dark">Proceed to Checkout
							<i class="fa fa-arrow-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="mb-6"></div><!-- margin -->
@endsection
