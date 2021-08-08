@extends('frontend.layouts.master')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/app/dashboard/order.css') }}?v=1.0.2">
@endsection

@section('content')
<div class='container'>
  <div class="areaTitle">
    Order details
  </div>
  <div class="userInfo">
    <div class="userArea">
      <div class="userAndOrder-detail">
        <div class="user-data">
          <div class="detail-title">
            Your Details :
          </div>
          <div class="odrId">
            #{{ $orders->id }}ODR120895
          </div>
          <div class="name">
            {{ $orders->name }}
          </div>
          <div class="address">
            {{ $orders->shipping_address }}
          </div>
          <div class="number">
            {{ $orders->phone_no }}
          </div>
          <div class="email">
            {{ $orders->email }}
          </div>
        </div>

        <div class="order-data">
          <div class="detail-title">
            Your Order info :
          </div>
          <div class="pay-method">
            Payment Method : {{ $orders->payment->name }}
          </div>
          <div class="delivery">
            Delivery Cost : ৳ {{ $orders->shipping_charge }}
          </div>
          <div class="delivery">
            Ordered Date : {{ $orders->created_at }}
          </div>
          <div class="delivery">
            Discount Amount : ৳ {{ $orders->custom_discount }}
          </div>
          <div class="delivery">
            Delivery Amount : ৳ {{ $orders->shipping_charge }}
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="order-status">
    <div class="status-title">
      Order Status
    </div>
    <div class="progressBar">
      <ul>
        <li>
          @if ($orders->is_seen_by_admin)
          <i class="fa fa-circle active"></i>
          <p class="done">Checked</p>
          @else
          <i class="fa fa-circle not-active"></i>
          <p class="not-done">Checking</p>
          @endif
        </li>
        <li>
          @if ($orders->is_completed)
          <i class="fa fa-circle active"></i>
          <p class="done">Processed</p>
          @else
          <i class="fa fa-circle not-active"></i>
          <p class="not-done">Processing</p>
          @endif
        </li>
        <li>
          @if ($orders->is_paid)
          <i class="fa fa-circle active"></i>
          <p class="done">On Way</p>
          @else
          <i class="fa fa-circle not-active"></i>
          <p class="not-done">Shipping</p>
          @endif
        </li>
        <li>
          @if ($orders->delivery_status)
          <i class="fa fa-circle active"></i>
          <p class="done">Delivered</p>
          @else
          <i class="fa fa-circle not-active"></i>
          <p class="not-done">Delivery</p>
          @endif
        </li>
      </ul>
    </div>
    {{-- <div class="all-status">
        <div class="status">
          @if ($orders->is_seen_by_admin)
            <div class="steps">
              <div class="step"></div>
              <p class="">Process compleate</p>
            </div> 
            @else
            <div class="steps">
              <div class="step2"></div>
              <p class="">On processing</p>
            </div>
          @endif
      </div>
      <i class="fa fa-arrow-right arrow" aria-hidden="true"></i>
      <div class="status">
            @if ($orders->is_completed)
              <div class="steps">
                <div class="step"></div>
                <p class="">Verify</p>
              </div>
            @else
            <div class="steps">
              <div class="step2"></div>
              <p class="">Waiting for process</p>
            </div>
          @endif
      </div>
      <i class="fa fa-arrow-right arrow" aria-hidden="true"></i>
      <div class="status">
          @if ($orders->is_paid)
            <div class="steps">
              <div class="step"></div>
              <p class="">On the way</p>
            </div>
            @else
            <div class="steps">
              <div class="step2"></div>
              <p class=""></p>
            </div>
          @endif
      </div>
      <i class="fa fa-arrow-right arrow" aria-hidden="true"></i>
      <div class="status">
          @if ($orders->delivery_status)
            <div class="steps">
              <div class="step"></div>
              <p class="">Delivered</p>
            </div>
          @else
          <div class="steps">
              <div class="step2"></div>
              <p class=""></p>
            </div>
          @endif
      </div>
      </div> --}}
  </div>

  <div class="order-area">
    <div class="order-numbers">
      <div class="order-id">
        <a href="#">#{{ $orders->id }}ODR120895</a>
      </div>
    </div>
    <div class="order-detail-area">
      @if ($orders->carts->count() > 0)
      @php
      $total_price = 0;
      @endphp
      @foreach ($orders->carts as $cart)
      <div class="order-details">
        @if ($cart->product->images->count() > 0)
        <div class="itemImg">
          <a href="{{ route('products.show', $cart->product->slug) }}" class="thumbnail">
            <img src="{{ asset('images/products/'. $cart->product->images->first()->image) }}" class="img-responsive blur-up lazyload">
          </a>
        </div>
        @endif
        <div class="order-info-holder">
          <div class="order-item-info large-area">
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
          <div class="order-qty quantity">
            <span>Qty:</span>
            <h6>{{ $cart->product_quantity }}</h6>
          </div>
          <div class="order-pay detail-pay">
            <span>Payment type :</span>
            <h6>{{ $orders->payment->name }}</h6>
          </div>
          <div class="unit-prc">
            <span>Unit Price :</span>
            <h6>৳ {{ $cart->product->price }}</h6>
          </div>
          <div class="subtotal-prc">
            <span>Subtotal :</span>
            @php
            $total_price += $cart->product->price * $cart->product_quantity;
            @endphp
            <h6>৳ {{ $cart->product->price * $cart->product_quantity }}</h6>
          </div>
          {{-- <div class="order-condition">
              <div class="conditions">
                  @if ($orders->is_seen_by_admin)
                    <span class="text-success">Your Order currently on proceesing.</span> 
                    @else
                    <span class="text-danger">Your order will procees soon.</span>
                  @endif
              </div>
              <div class="conditions">
                  @if ($orders->is_completed)
                    <span class="text-success">Your order ready for Shipping.</span>
                    @else
                  @endif
              </div>
              <div class="conditions">
                  @if ($orders->is_paid)
                    <span class="text-success">Your order dispatch for shipping.</span>
                    @else
                  @endif
              </div>
              <div class="conditions">
                  @if ($orders->delivery_status)
                    <span class="text-success">Your order successfully delivered.</span>
                    @else
                  @endif
              </div>
            </div> --}}
        </div>
      </div>
      <div>
        @php
        $total_price += $cart->product->price * $cart->product_quantity;
        @endphp

      </div>
      @endforeach {{-- $orders->carts as $cart --}}

    </div>
    <div class="footer">
      <div class="order-total-price">
        <span>Total Amount : </span> <span style="font-weight: 500; color: #000;">৳{{ $orders->total_amounts() - $orders->custom_discount +  $orders->shipping_charge }}</span>
      </div>
    </div>
    @endif
  </div>
</div>
@endsection