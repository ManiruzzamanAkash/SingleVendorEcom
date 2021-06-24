@extends('frontend.layouts.master')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/app/wishlist.css') }}?v=1.0.2">
@endsection

@section('title')
	Wishlist Items | {{config('app.name')}}
@endsection

@section('content')

  <!-- Start Sidebar + Content -->
<div class='container wishlist-area'>
@if (count($products) > 0)
  <div class="titleArea">
    My Wishlist
  </div>

  @foreach ($products as $product)
  
  @if (Route::is('wishlists'))
    @php
      $product = $product->product;
    @endphp
  @endif

    <div class="{{ Route::is('wishlists')}}">
        <div class="wish-product">
          <div class="lable-wrapper"></div>

          <div class="product-image">
             <a href="{!! route('products.show', $product->slug) !!}" class="thumbnail">
              <img src="{{ asset('images/products/'.$product->images->first()->image) }}" alt="{{ $product->title }}" class="img-fluid blur-up lazyload product-image">
            </a>
          </div>
          <div class="wish-content">
            <div class="prod-name">
              <a href="{!! route('products.show', $product->slug) !!}" >{{ $product->title }}</a>
            </div>
            <div class="prod-slogan">
              {{ $product->slogan }}
            </div>
            <div class="prod-price">
              <div class="product-price">
                ৳ {{ $product->price }}
              </div>
              <div class="prodOld-price">
                ৳ {{ $product->offer_price }}
              </div>
            </div>
            <div class="cart-info">
              <add-cart url="{{ url('/') }}" id="{{ $product->id }}" ></add-cart>
            </div>
          </div>
        {{-- <div class="prod-content" onclick="location.href='{!! route('products.show', $product->slug) !!}'">
        <div class="prod-slogan text-success">
          {{ $product->slogan }}
        </div>
        </div> --}}
        {{-- <div class="cart-info">
          <add-cart url="{{ url('/') }}" id="{{ $product->id }}" ></add-cart>
        </div> --}}
        @if (Auth::check())
               <div class="wishlist-div">
                   <add-wishlist url="{{ url('/') }}" route="{{ Route::currentRouteName() }}" id="{{ $product->id }}" api_token="{{ Auth::user()->api_token }}"></add-wishlist>
               </div>
           @endif
      </div>
  </div>
  @endforeach


<div class="mt-4 text-center">
  {{ $products->links() }}
</div>


  @else
  <div class="empty-holder">
    <div class="emptyContent">
        <div class="empty-logo">
            <i class="fa fa-heartbeat" aria-hidden="true"></i>
        </div>
        <div class="empty-heading">
            <!-- looks like you have no items in your shopping cart. -->
            !! Currently wishlist is empty !! 
        </div>
    </div>
  </div>
{{--   <div class="alert alert-warning">
  	<p>
  		<strong>Sorry !! No item in the wishlist !!</strong>
  	</p>
  	<p>
  		<a href="{{ route('products') }}" class="btn btn-theme">View Products</a>
  	</p>
  </div> --}}
  @endif
</div>

  <!-- End Sidebar + Content -->
@endsection
