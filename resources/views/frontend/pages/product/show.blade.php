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
<meta property="og:description" content="{{ $product->title}} and Price - {{ $product->price}} Taka - {{ config('app.name') }}" />
<meta property="og:image" content="{{ $product->images->count() > 0 ? asset('/images/products/'. $product->images->first->image->image) : '' }}" />

<!-- Single Page product show with zoom -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/flexslider.css') }}?v={{ config('constants.asset_version') }}">
@endsection

@section('content')
<div class="container content-holder">

  <div class="content-area row">
    <div class="img-area col-md-6">
      <div class="img-holder">
        <div class="thumbs" id="thumb">

          @if ($product->images->count() > 0)
          <ul>
            @foreach ($product->images as $image)
            <li>
              <div class="thumb">
                <a href="#" data-image="{{ asset('/images/products/'. $image->image) }}" data-zoom-image="{{ asset('/images/products/'. $image->image) }}" class="active galleryImg blur-up lazyload">
                  <img src="{{ asset('/images/products/'. $image->image) }}" width="70" height="70">
                </a>
              </div>
            </li>
            @endforeach
            @else
            <li>
              <div class="thumb">
                <a href="#" data-image="{{ asset('images/defaults/no-image.jpg') }}" data-zoom-image="{{ asset('images/defaults/no-image.jpg') }}" class="active galleryImg blur-up lazyload">
                  <img src="{{ asset('images/defaults/no-image.jpg') }}" width="70" height="70">
                </a>
              </div>
            </li>
          </ul>
          @endif

        </div>
        <div class="img-show">
          @php $i =1; @endphp
          <div class="">
            @foreach ($product->images as $image)

            @if ($i > 0)
            <img id="zoom_02" src="{{ asset('/images/products/'. $image->image) }}" data-zoom-image="{{ asset('/images/products/'. $image->image) }}" class="blur-up lazyload large">
            @endif

            @php $i--; @endphp
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <div class="img-content col-md-6">
      <div class="upperContent">
        <div class="event-name">
          {{ $product->occation }}
        </div>
        <div class="wish-heart">
          @if (Auth::check())
          <div class="clearfix"></div>
          <div class="wishlist-div">
            <add-wishlist url="{{ url('/') }}" route="{{ Route::currentRouteName() }}" id="{{ $product->id }}" api_token="{{ Auth::user()->api_token }}"></add-wishlist>
          </div>
          @endif
        </div>
      </div>
      <div class="prod-title">
        {{ $product->title }}
      </div>

      <div class="price-area">
        <div class="price">
          ৳ {{ $product->price }}
        </div>
        <div class="old-price">
          ৳ {{ $product->offer_price }}
        </div>
      </div>

      <div class="brand">
        <span>Brand :</span> {{ $product->brand->name }}
      </div>

      <div class="other-info">
        <div class="infos">
          <div class="quantity">
            @if($product->quantity < 1) <span class="notAvailable"><i class="fa fa-exclamation" aria-hidden="true"></i>Sorry
              product currently not available.</span>
              @elseif($product->quantity < 10) <span class="prodLeft"><i class="fa fa-exclamation" aria-hidden="true"></i>Hurry Only {{ $product->quantity}} products are available.</span>
                @else
                <span class="available"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Available in stock.</span>
                @endif
          </div>
        </div>
        <div class="infos">
          <div class="warranty">
            @if($product->warranty < 0) <span class="notAvailable">
              <i class="fa fa-times" aria-hidden="true"></i>Warranty not available in this product.
              </span>
              @elseif($product->warranty <= 1) <span class="available">
                <i class="fa fa-check" aria-hidden="true"></i>Warranty available in this product.
                </span>
                @elseif($product->warranty <= 2) <span class="notAvailable">
                  <i class="fa fa-times" aria-hidden="true"></i>Guarantee not available in this product.
                  </span>
                  @elseif($product->warranty <= 3) <span class="available">
                    <i class="fa fa-check" aria-hidden="true"></i>Guarantee available in this product.
                    </span>
                    @else

                    @endif

          </div>
        </div>
        <div class="infos">
          <div class="delivery">
            <i class="fa fa-calendar-o tick"></i> Delivery expected in {{ $product->delivery_time }} days.
          </div>
        </div>
        <div class="infos">
          <div class="pay">
            <i class="fa fa-money" aria-hidden="true"></i>You can pay via COD, Bkash, Rocket and Nogod.
          </div>
        </div>
        <div class="infos">
          <div class="coupon">
            <i class="fa fa-tags" aria-hidden="true"></i></i>Please use coupon if you have.
          </div>
        </div>
      </div>
      <div class="product-buy-cart">
        <div class="add-cart">
          @if($product->quantity < 1) <div class="cart-disable">
            <i class="fa fa-shopping-cart"></i> Out of Stock
        </div>
        @else
        <add-cart url="{{ url('/') }}" id="{{ $product->id }}"></add-cart>
        @endif

      </div>
      <div class="buyIt">
        @if($product->quantity < 1) <div class="buy-disable">
          <i class="fa fa-bolt"></i> Available Soon !
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
      @endif
      @endif
    </div>
  </div>
</div>
</div>
</div>

<!-- Producr 3 col left page end -->
<!-- Product descrption -->
<div class="review-area">
  <div class="container content-holder">
    <div class="">
      <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="top-home-tab" data-toggle="tab" href="#top-home" role="tab" aria-selected="true">Product Details</a>
          <div class="material-border"></div>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="review-list-tab" data-toggle="tab" href="#review-list" role="tab" aria-selected="true">All Reviews</a>
          <div class="material-border"></div>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="review-top-tab" data-toggle="tab" href="#top-review" role="tab" aria-selected="false">Write Review</a>
          <div class="material-border"></div>
        </li>
      </ul>
    </div>
    <div class="tab-content review-section" id="top-tabContent">
      <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
        <div class="description">
          <textarea class="textarea" rows="16" cols="80">{!! $product->description !!}</textarea>
        </div>
      </div>
      <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
        <div class="description">
          {{-- {{ $product->description }} --}}
        </div>
      </div>
      <div class="tab-pane fade" id="review-list" role="tabpanel" aria-labelledby="review-top-tab">
        @php
        $reviews = $product->reviews()->where('is_approved', 1)->get();
        @endphp
        @foreach ($reviews as $review)
        <div class="single-review">
          {{-- <div class="col-md-2">
                    <img src="{{ App\Helpers\ReturnPathHelper::getUserImage($review->user_id) }}" class="img
          img-fluid">
        </div> --}}
        <div class="reviews">
          <div class="stars">
            @for ($review_point = 1; $review_point < $review->point; $review_point++)
              <i class="fa fa-star text-warning" style="font-size: 16px"></i>
              @endfor
          </div>
          <div class="user">
            <span class="review-user">By : {{ $review->user->first_name }}</span>
          </div>

          <div>
            Review : {!! $review->description !!}
          </div>
        </div>

      </div>
      @endforeach
      <div class="revire-footer">
        please give us your review
      </div>
    </div>
    <div class="tab-pane fade" id="top-review" role="tabpanel" aria-labelledby="review-top-tab">
      <div class="write">
        @if (Auth::check())
        <product-rating url="{{ url('/') }}" id="{{ $product->id }}" api_token="{{ Auth::user()->api_token }}">
        </product-rating>
        @else
        <div class="p-2 loginToreview">
          You must be <a href="{{ route('login') }}" class="login-link">
            Login
          </a> to post your review.
        </div>
        @endif
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