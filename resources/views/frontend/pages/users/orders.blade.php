@extends('frontend.layouts.master')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/app/dashboard.css') }}?v1.0.2">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/app/dashboard/order.css') }}?v1.0.2">
@endsection

@section('content')
<div class="container content-holder">
  <div class="contents">
    @include('frontend.pages.users.partials')
    <div class="right-side-area">
      <div class='order-item'>
    <div class="titleArea">
      My Orders
    </div>
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
      <div class="order-detail-area">
        @if ($order->carts->count() > 0)
            @php
              $total_price = 0;
            @endphp
        @foreach ($order->carts as $cart)
        <div class="order-details">
          @if ($cart->product->images->count() > 0)
          <div class="itemImg">
            <a href="{{ route('products.show', $cart->product->slug) }}" class="thumbnail">
              <img src="{{ asset('images/products/'. $cart->product->images->first()->image) }}" class="img-responsive blur-up lazyload">
            </a>
          </div>
          @endif
          <div class="order-info-holder">
          <div class="order-item-info">
            <div class="order-name">
              <a href="{{ route('products.show', $cart->product->slug) }}">{{ $cart->product->title }}</a>
            </div>
            <div class="order-item-price">
              <div class="item-price">
                ৳ {{ $cart->product->price }}
              </div>
              <div class="old-price">
                ৳ {{ $cart->product->offer_price }}
              </div>
            </div>
            <div class="sell-by">
              Sold by : demo
            </div>
            <div class="order-deli">
              Delivery expected in {{ $cart->product->delivery_time }}
            </div>
            
          </div>
            <div class="order-qty">
                <span>Qty:</span>
              <h6>{{ $cart->product_quantity }}</h6>
            </div>
            <div class="order-pay">
                <span>Payment type</span>
                <h6>{{ $order->payment->name }}</h6>
            </div>
            <div class="order-condition">
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
            </div>
            </div>
        </div>
        <div>
          @php
            $total_price += $cart->product->price * $cart->product_quantity;
          @endphp

        </div>
      @endforeach
          
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
  @endif
  </div>
  </div>

@endforeach 
    </div>
  </div>
</div>
</div>
</div>
@endsection
