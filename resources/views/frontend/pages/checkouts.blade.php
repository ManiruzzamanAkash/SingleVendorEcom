@extends('frontend.layouts.master')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/app/checkout.css') }}?v=1.0.2">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/app/cartNcheckout.css') }}?v=1.0.2">
@endsection

@section('content')
<div class="container card card-body border-top-0 mt-2 mb-4">
	<div class="row">
		<div class="col-sm-12 col-md-8">
			<div class="checkout-area">
				<div class="checkout-content">
					<div class="titleArea">
						<div class="checktitle">
							Confirm Items
						</div>
						<div class="backToCart" onclick="location.href='{{ route('carts') }}'">
							<i class="fa fa-pencil"></i>
						</div>
					</div>

					@if (App\Models\Cart::totalItems() > 0)
					<table class="table">
						<thead>
							<tr>
								<th></th>
								<th>Product</th>
								<th>Qty</th>
								<th>Unit Price</th>
								<th>Subtotal</th>
							</tr>
						</thead>

						<tbody>
							@php
							$total_price = 0;
							@endphp
							@foreach (App\Models\Cart::totalCarts() as $cart)
								@php
								$price = $cart->product->offer_price ? $cart->product->offer_price : $cart->product->price;
								@endphp
								<tr>
									<td>
										@if ($cart->product->images->count() > 0)
										<a href="{{ route('products.show', $cart->product->slug) }}" class="thumbnail">
											<img src="{{ asset('images/products/'. $cart->product->images->first()->image) }}" class="blur-up lazyload">
										</a>
										@endif
									</td>
									<td><a href="{{ route('products.show', $cart->product->slug) }}">{{ $cart->product->title }}</a></td>
									<td>{{ $cart->product_quantity }}</td>
									<td>
										৳ {{ $price }}
									</td>
									<td>
										@php
										$total_price += $price * $cart->product_quantity;
										@endphp
										৳{{ $price * $cart->product_quantity }}
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>

					<div class="checkout-footer">
						<div class="totle-footer">
							<span>Total Amount :</span> <span {{-- style="font-weight: 500;" --}}> ৳ {{ $total_price }}</span>
						</div>
					</div>

					<div class="ml-2 pl-2">
						We contact you before your delivery.
					</div>
					@endif
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="proceed-area">
				<div class="amount-counter">
					<div class="titleArea">Price Details</div>
					@php
					$total_price = App\Models\Cart::totalAmounts();
					$total_items = App\Models\Cart::totalItems();
					@endphp
					<div class="total-priceArea">
						<div class="name">
							Price
						</div>
						<div class="amount">
							&nbsp; ৳ {{ $total_price }}
						</div>
					</div>
					<div class="total-priceArea">
						<div class="name">
							Delivery Cost
						</div>
						<div class="amount">
							&nbsp; ৳{{ App\Models\Setting::first()->shipping_cost }}
						</div>
					</div>
					<div class="total-priceArea text-success">
						<div class="name">
							Discount
						</div>
						<div class="amount">
							<span id="coupon-entry"></span>
						</div>
					</div>
					<div class="total-priceArea">
						<div class="name">
							Total Amount
						</div>
						<div class="amount" id="total-cost">
							&nbsp; ৳ {{ $total_price + App\Models\Setting::first()->shipping_cost }}
						</div>
					</div>
					<div class="coupon">
						<coupon-check url="{{ url('/') }}" total_price="{{ $total_price }}" total_items="{{ $total_items }}" shipping_cost="{{ App\Models\Setting::first()->shipping_cost }}"></coupon-check>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="card card-body mt-2 mb-4">
		<h5>Shipping Address</h5>

		<form method="POST" action="{{ route('checkouts.store') }}">
			@csrf
			<input type="hidden" name="coupon_code" id="coupon_code" value="">
			<div class="row">
				<div class="col-md-4">
					<div class="form-group row">
						<label for="name" class="col-md-12 col-form-label">Reciever Name</label>

						<div class="col-md-12">
							<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ Auth::check() ? Auth::user()->first_name.' '.Auth::user()->last_name : '' }}" required autofocus>

							@if ($errors->has('name'))
							<span class="invalid-feedback">
								<strong>{{ $errors->first('name') }}</strong>
							</span>
							@endif
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group row">
						<label for="email" class="col-md-12 col-form-label">E-Mail Address</label>

						<div class="col-md-12">
							<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::check() ? Auth::user()->email : '' }}" required>

							@if ($errors->has('email'))
							<span class="invalid-feedback">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
							@endif
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group row">
						<label for="phone_no" class="col-md-12 col-form-label">Phone No</label>

						<div class="col-md-12">
							<input id="phone_no" type="text" class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" name="phone_no" value="{{ Auth::check() ? Auth::user()->phone_no : '' }}" required>

							@if ($errors->has('phone_no'))
							<span class="invalid-feedback">
								<strong>{{ $errors->first('phone_no') }}</strong>
							</span>
							@endif
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="form-group row">
						<label for="shipping_address" class="col-md-12 col-form-label">Shipping Address (*)</label>

						<div class="col-md-12">
							<textarea id="shipping_address" class="form-control{{ $errors->has('shipping_address') ? ' is-invalid' : '' }}" rows="3" name="shipping_address" required>{{ Auth::check() ? Auth::user()->shipping_address : '' }}</textarea>

							@if ($errors->has('shipping_address'))
							<span class="invalid-feedback">
								<strong>{{ $errors->first('shipping_address') }}</strong>
							</span>
							@endif
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group row">
						<label for="message" class="col-md-12 col-form-label">Additional Message (optional)</label>

						<div class="col-md-12">
							<textarea id="message" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" rows="3" name="message"></textarea>

							@if ($errors->has('message'))
							<span class="invalid-feedback">
								<strong>{{ $errors->first('message') }}</strong>
							</span>
							@endif
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="form-group row">
						<label for="payment_method" class="col-md-12 col-form-label">Select a payment method</label>

						<div class="col-md-12">
							<select class="form-control" name="payment_method_id" required id="payments">
								<option value="">Select a payment method please</option>
								@foreach ($payments as $payment)
								<option value="{{ $payment->short_name }}">{{ $payment->name }}</option>
								@endforeach
							</select>

						</div>
						<div class="col-md-12">
							<div id="transaction_id" class=" hidden mt-2">
								<label for="payment_method" class="col-form-label">Transaction Code</label>
								<br>
								<input type="text" name="transaction_id" class="form-control" placeholder="Enter transaction code">
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					@foreach ($payments as $payment)
					@if ($payment->short_name == "cash_in")
					<div id="payment_{{ $payment->short_name }}" class="alert alert-success mt-2 text-center hidden">
						<h3>
							For Cash in there is nothing necessary. Just click Finish Order.
							<br>
							<small>
								You will get your product in two or three business days.
							</small>
						</h3>
					</div>
					@else
					<div id="payment_{{ $payment->short_name }}" class="alert alert-success mt-2 text-center hidden">
						<h3>{{ $payment->name }} Payment</h3>
						<p>
							<strong>{{ $payment->name }} No : {{ $payment->no }}</strong>
							<br>
							<strong>Account Type: {{ $payment->type }}</strong>
						</p>
						<div class="alert alert-success" style="background: aliceblue;color: red;">
							Please send the above money to this Bkash No and write your transaction code below there..
						</div>

					</div>
					@endif
					@endforeach

				</div>
			</div>
			<div class="form-group row mb-0">
				<div class="col-md-6 offset-md-4">
					<button type="submit" class="btn btn-primary">
						<i class="fa fa-check"></i> Order Now
					</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	$("#payments").change(function() {
		var payment_method = $("#payments").val();

		if (payment_method == "cash_in") {
			$("#payment_cash_in").removeClass('hidden');
			$("#payment_bkash").addClass('hidden');
			$("#payment_rocket").addClass('hidden');
			$("#transaction_id").addClass('hidden');
		} else if (payment_method == "bkash") {
			$("#payment_bkash").removeClass('hidden');
			$("#payment_cash_in").addClass('hidden');
			$("#payment_rocket").addClass('hidden');
			$("#transaction_id").removeClass('hidden');
		} else if (payment_method == "rocket") {
			$("#payment_rocket").removeClass('hidden');
			$("#payment_bkash").addClass('hidden');
			$("#payment_cash_in").addClass('hidden');
			$("#transaction_id").removeClass('hidden');
		} else {
			$("#payment_cash_in").addClass('hidden');
			$("#payment_bkash").addClass('hidden');
			$("#payment_rocket").addClass('hidden');
			$("#transaction_id").addClass('hidden');
		}
	})
</script>
@endsection