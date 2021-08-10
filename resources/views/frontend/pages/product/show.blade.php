@extends('frontend.layouts.master')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/app/single-page.css') }}?v={{ config('constants.asset_version') }}">
@endsection

@section('title')
{{ $product->title }} | {{ config('app.name') }}
@endsection

@section('stylesheets')

<meta property="og:url" content="{{ route('products.show', $product->slug) }}" />
<meta property="og:type" content="Product" />
<meta property="og:title" content="{{ $product->title }}" />
<meta property="og:description" content="{{ $product->title }} and Price - {{ $product->offer_price ? $product->offer_price : $product->price }} Taka - {{ config('app.name') }}" />
<meta property="og:image" content="{{ $product->images->count() > 0 ? asset('/images/products/'. $product->images->first->image->image) : '' }}" />

<!-- Single Page product show with zoom -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/flexslider.css') }}?v={{ config('constants.asset_version') }}">


@endsection

@section('content')
<nav aria-label="breadcrumb ">
  <ol class="breadcrumb bg-white">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">{{ $product->title }}</a></li>
    {{-- <li class="breadcrumb-item active" aria-current="page">Data</li> --}}
  </ol>
</nav>
<div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div id="carouselExampleControls" class="carousel slide" data-interval="false">
          <div  class="carousel-inner">
            @if ($product->images->count() > 0)
              @foreach ($product->images as $key=>$image)
                <div class="carousel-item {{ $key==0 ? "active" : ''}}"  >
                  <img  class="d-block w-100" src="{{ asset('/images/products/'. $image->image) }}" alt="First slide" >
                </div>
              @endforeach
            @else
              <div class="carousel-item "  >
                <img id="zoom_02" class="d-block w-100" src="{{ asset('images/defaults/no-image.jpg') }}"  alt="First slide" >
              </div>
            @endif

          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <div class="col-md-6 text-center">
        <h4>{{ $product->title }}</h4>
        <div >
          <span>Brand :</span> {{ $product->brand->name }}
        </div>
        <h5><strong>{{ $product->offer_price ? '৳ '.$product->offer_price : '৳ '.$product->price }}</strong></h5>
        <h5 class="text-danger"><strong><del>{{ $product->offer_price ? '৳ ' . $product->price : '' }}</del> </strong> </h5>
        <div class="border-bottom border-dark">
          <p >Color</p>
        </div>
        <div class="border-bottom border-dark">
          <p>Select Size</p>
        </div>
        <div class="product-buy-cart-box">
          <div class="product-buy-cart">
            <div class="add-cart">
              @if($product->quantity < 1) <div class="cart-disable">
                <i class="fa fa-shopping-cart"></i> Out of Stock
            </div>
            @else
              @if (Auth::check())
                <form action="{{ route('carts.buy') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <span class="buy-item">
                <button title="Buy Now" tabindex="0" class="buyNow" type="submit"><i class="fa fa-location-arrow" aria-hidden="true"></i> Buy Now</button>
                </span>
                </form>
              @else
                <add-cart url="{{ url('/') }}" id="{{ $product->id }}"></add-cart>
              @endif
            @endif
    
          </div>
        </div>
      </div>
    </div>
    <div class="container pt-5 pb-5">
      <div class="card">
        <div class="row p-4">
          <div class="col-md-8">
            <h4><strong>Description</strong> </h4>
            <h5>Product Name :  {{ $product->title }} </h5>
            <p>Brand :  {{ $product->brand->name }} </p>
            <ul>
              <li>
                @if($product->quantity < 1) 
                  <span >Sorry
                  product currently not available.</span>
                @elseif($product->quantity < 10) 
                  <span >Hurry Only {{ $product->quantity}} products are available.</span>
                @else
                    <span > Available in stock.</span>
                @endif
              </li>
              <li>
                @if($product->warranty < 0) 
                  <span >
                     Warranty not available in this product.
                  </span>
                @elseif($product->warranty <= 1) 
                  <span >
                     Warranty available in this product.
                  </span>
                @elseif($product->warranty <= 2) 
                  <span >
                     Guarantee not available in this product.
                  </span>
                @elseif($product->warranty <= 3) 
                  <span >
                     Guarantee available in this product.
                  </span>
                @else

                @endif
              </li>
              <li>
                 Delivery expected in {{ $product->delivery_time }} days.
              </li>
              <li>
                You can pay via COD, Bkash, Rocket and Nogod.
              </li>
              <li>
                Please use coupon if you have.
              </li>
              
            </ul>
            
          </div>
          
        </div>
      </div>
    </div>
</div>

</div> 
<!-- product-tab ends -->
@endsection


@section('scripts')
<script src="{{ asset('public/assets/js/jquery.elevatezoom.js') }}?v={{ config('constants.asset_version') }}" type="text/javascript"></script>
<script type="text/javascript">
  $("#zoom_02").elevateZoom({
    zoomWindowWidth: 450,
    zoomWindowHeight: 502,
    gallery: 'thumb',
    cursor: 'pointer',
    galleryActiveClass: 'active',
    imageCrossfade: true,
    borderSize: 1,
    zoomWindowOffetx: 10,
    zoomWindowOffety: -13,
    cursor: 'crosshair',
    lensColour: '#dddddd',
    lensBorder: 'red'
  });
</script>

@endsection