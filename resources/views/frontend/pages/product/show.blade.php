@extends('frontend.layouts.master')

@section('stylesheets')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/assets/css/app/single-page.css') }}?v={{ config('constants.asset_version') }}">
    <link href="{{ asset('public/frontend') }}/css/style.css" rel="stylesheet" />
@endsection

@section('title')
    {{ $product->title }} | {{ config('app.name') }}
@endsection

@section('stylesheets')

    <meta property="og:url" content="{{ route('products.show', $product->slug) }}" />
    <meta property="og:type" content="Product" />
    <meta property="og:title" content="{{ $product->title }}" />
    <meta property="og:description"
        content="{{ $product->title }} and Price - {{ $product->offer_price ? $product->offer_price : $product->price }} Taka - {{ config('app.name') }}" />
    <meta property="og:image"
        content="{{ $product->images->count() > 0 ? asset('/images/products/' . $product->images->first->image->image) : '' }}" />

    <!-- Single Page product show with zoom -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('css/flexslider.css') }}?v={{ config('constants.asset_version') }}">


@endsection

@section('content')

    <div id='main-wrapper' class="container-fluid">
        <div class="row">
            <div class="container-fluid p-3 pl-0 ">
                <div class="product-menu">
                    <a href="{{ route('index') }}" class="text-black">Home</a>
                    |
                    <a href="{{ route('categories.show', $product->category->slug) }}"
                        class="text-black">{{ $product->category->name }}</a>
                    |
                    <a href="{{ route('products.show', $product->slug) }}"
                        class="text-black">{{ $product->title }}</a>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-5 col-12">

                <div class="small-img-t">
                </div>

                {{-- <div class="show-me card" href="1.jpg">
                    <img src="{{ asset('public/frontend') }}/assets/potty-car-left.png" id="show-img">
                </div> --}}
                <div class="slideshow-container">

                    <div class="mySlides ">

                        <img src="{{ asset('public/frontend') }}/assets/potty-car-left.png" id="show-img"
                            style="width:100%">

                    </div>

                    <div class="mySlides ">

                        <img src="{{ asset('public/frontend') }}/assets/potty-car-left.png" id="show-img"
                            style="width:100%">

                    </div>

                    <div class="mySlides ">

                        <img src="{{ asset('public/frontend') }}/assets/potty-car-left.png" id="show-img"
                            style="width:100%">

                    </div>

                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>

                </div>
                <br>

                <div style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </div>


                <div class="small-img-t">
                </div>

                <div class="small-img p-0 ml-0 mr-0">

                    <div class="small-container">
                        <div id="small-img-roll">
                            @if ($product->images->count() > 0)
                                @foreach ($product->images as $key => $image)
                                    <img src="{{ asset('/images/products/' . $image->image) }}" class="show-small-img"
                                        alt="">
                                @endforeach
                            @else
                                <div class="carousel-item ">
                                    <img id="zoom_02" class="d-block w-100"
                                        src="{{ asset('images/defaults/no-image.jpg') }}" alt="First slide">
                                </div>
                            @endif

                        </div>
                    </div>

                </div>

            </div>
            <div class="col-md-2"></div>

            <div class="col-md-5 col-12 text-center mt-3">
                <h4 class="single-product-title">{{ $product->title }}</h4>
                <p style=" font-size: 14px; font-weight: 100; color: gray; margin-bottom: 45px!important;">
                    Code: {{ $product->slogan }}
                </p>
                <h5><strong>{{ $product->offer_price ? '৳ ' . $product->offer_price : '৳ ' . $product->price }}</strong>
                </h5>
                <h5 class="text-danger"><strong><del>{{ $product->offer_price ? '৳ ' . $product->price : '' }}</del>
                    </strong> </h5>
                <div>
                    <span>Brand :</span> {{ $product->brand->name }}
                </div>
                <div class="product-selection mt-3 mb-5 pb-3">
                    <h6 class="text-left">Select Size</h6>
                    <div class="d-flex size-variation">
                        <p>XS </p>
                        <p>S </p>
                        <p>M </p>
                        <p>XL </p>
                        <p>2XL </p>
                        <p>3XL </p>
                    </div>

                </div>

                <div class="product-buy-cart-box mt-3">
                    <div class="product-buy-cart">
                        <div class="add-cart">
                            @if ($product->quantity < 1)
                                <div class="cart-disable">
                                    <i class="fa fa-shopping-cart"></i> Out of Stock
                                </div>
                            @else
                                @if (Auth::check())
                                    <form action="{{ route('carts.buy') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <span class="buy-item">
                                            <button title="Buy Now" tabindex="0" class="buyNow" type="submit"><i
                                                    class="fa fa-location-arrow" aria-hidden="true"></i> Buy Now</button>
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
                <div class="card custom-card p-5 border-0">
                    <div class="row p-4">
                        <div class="col-md-6 px-5">
                            <div class="description-grid">
                                <h5>Description</h5>
                                <p>{!! $product->description !!}</p>

                                <h5 class="mt-5">Material</h5>
                                <p>100% Fine Cotton</p>

                                <p>Combed Compact 60s</p>

                                <p>Digital Print</p>

                                <p>Fabric Finish : Liquid Ammonia</p>

                            </div>
                        </div>
                        <div class="col-md-6 px-5">

                            <div class="description-grid">
                                <h5>Details</h5>
                                <ul class="pl-3">
                                    <li>Semi-Formal/Casual</li>
                                    <li>Regular Fit</li>
                                    <li>Regular Fit</li>
                                </ul>
                                <h5 class="mt-5">Care</h5>
                                <ul class="pl-3">
                                    <li>Semi-Formal/Casual</li>
                                    <li>Regular Fit</li>
                                    <li>Regular Fit</li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @php
            $products = $product->recommended(4);
        @endphp

        <div class="mb-5">
            @if ($products->count() > 0)
                <h2 class="mb-3 pl-4 pr-4">Recommended Products</h2>
                @include('frontend.pages.product.partials.all_products')
            @endif
        </div>

    </div>
    <!-- product-tab ends -->
@endsection

{{-- <div class="col-12 mt-lg-3">
    <div class="owl-carousel product-carousel owl-theme custom__owl">
        <a href="">
            <div class="single-product">
                <div class="imgbox card__img">
                    <img src="{{ asset('public/frontend') }}/assets/potty-car-left.png" id="show-img"
                    style="width:100%">
                    
                </div>
            </div>
        </a>
        <a href="">
            <div class="single-product">
                <div class="imgbox card__img">
                    <img src="{{ asset('public/frontend') }}/assets/potty-car-left.png" id="show-img"
                    style="width:100%">
                    
                </div>
            </div>
        </a>
    </div>
</div> --}}

@section('scripts')

    <script src="{{ asset('public/frontend') }}/js/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('public/frontend') }}/js/zoom-image.js"></script>
    <script src="{{ asset('public/frontend') }}/js/copy-main.js"></script>
   
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            navText: [
                '<span><img  class="prev__car" src="assets/car-rgt.png" style="height:17px; width:17px; position:absolute; top:-43px; right:45px;" /></span>',
                '<span><img class="next__car" src="assets/car-lft.png" style="height:17px; width:17px; position:absolute; top:-43px; right:69px" /></span>',
            ],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })
    </script>

@endsection
