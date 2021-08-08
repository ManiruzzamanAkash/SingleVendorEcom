@extends('frontend.layouts.master')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/app/dashboard.css') }}?v1.0.2">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/app/dashboard/order.css') }}?v1.0.2">
@endsection

@section('content')
<div class="container">
	<div class="contents row">
		@include('frontend.pages.users.partials')
		<div class="right-side-area col-md-8">
			<div class='order-item'>
				<div class="titleArea">My Orders</div>

				@foreach ($orders as $order)
				<div class="order-area">
					<div class="order-numbers">
						<div class="order-id">
							<a href="{{ route('user.ordershow', $order->id) }}">#{{ $order->id }}ODR120895</a>
						</div>
						<div class="detail-view">
							<a href="{{ route('user.ordershow', $order->id) }}">View Detail</a>
						</div>
					</div>

					<div class="order-detail-area table-responsive">
						@if ($order->carts->count() > 0)
						@php
						$total_price = 0;
						@endphp
						<table class="table">
							<thead>
								<tr>
									<th>Product</th>
									<th>Qty</th>
									<th>Unit Price</th>
									<th>Subtotal</th>
									<th>Payment Type</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($order->carts as $cart)
									@php
										$price = $cart->product->offer_price ?  $cart->product->offer_price : $cart->product->price;
									@endphp
									<tr>
										<td>
											@if ($cart->product->images->count() > 0)
											<a href="{{ route('products.show', $cart->product->slug) }}" class="thumbnail">
												<img src="{{ asset('images/products/'. $cart->product->images->first()->image) }}" class="img-responsive blur-up lazyload">
											</a>
											<br>
											@endif
											<a href="{{ route('products.show', $cart->product->slug) }}">{{ $cart->product->title }}</a>
										</td>
										<td>
											{{ $cart->product_quantity }}
										</td>
										<td>
											<div class="item-price">
												৳ {{ $price }}
											</div>
											<div class="old-price">
												{{ $cart->product->offer_price ?  '৳ ' . $cart->product->price : '' }}
											</div>
										</td>
										<td>
											৳ {{ $price * $cart->product_quantity }}
										</td>
										
										<td>
											{{ $order->payment->name }}
										</td>

										<td>
											<div class="conditions">
												@if ($order->is_seen_by_admin)
												<span class="text-success">Checking complete order on processing.</span>
												@else
												<span class="text-danger">Your order on Checking.</span>
												@endif
											</div>
											<div class="conditions">
												@if ($order->is_completed)
												<span class="text-success">Your order ready for Shipping.</span>
												@else
												@endif
											</div>
											<div class="conditions">
												@if ($order->is_paid)
												<span class="text-success">Your order on the way.</span>
												@else
												@endif
											</div>
											<div class="conditions">
												@if ($order->delivery_status)
												<span class="text-success">Your order successfully delivered.</span>
												@else
												@endif
											</div>
										</td>
									</tr>
									@php $total_price += $price * $cart->product_quantity; @endphp
								@endforeach
							</tbody>
						</table>
						@endif
					</div>
				</div>
				<div class="footer">
					<div class="view-order">
						<span>Ordered On :</span>
						{{ $order->created_at }}
					</div>
					<div class="order-total-price">
						<span>Total Amount : </span> <span style="font-weight: 500; color: #000;">৳{{ $order->total_amounts() - $order->custom_discount +  $order->shipping_charge }}</span>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection