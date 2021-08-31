@extends('frontend.layouts.master')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/app/single-page.css') }}?v={{ config('constants.asset_version') }}">
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

                <div class="slideshow-container">
                    @if ($product->images->count() > 0)
                        @foreach ($product->images as $key => $image)
                            <div class="mySlides ">
                                <img src="{{ asset('/images/products/' . $image->image) }}" class="show-small-img"
                                    style="width:100%">
                                {{-- <img src="{{ asset('public/frontend') }}/assets/potty-car-left.png" id="show-img" style="width:100%"> --}}
                            </div>
                        @endforeach
                    @endif
                    {{-- <div class="mySlides ">
                        <img src="{{ asset('public/frontend') }}/assets/potty-car-left.png" id="show-img" style="width:100%">
                    </div> --}}

                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
                <br>

                <div style="text-align:center">
                    @foreach ($product->images as $key => $image)
                        <span class="dot" onclick="currentSlide({{ $key + 1 }})"></span>
                    @endforeach
                </div>

                <div class="small-img-t">
                </div>

                <div class="small-img p-0 ml-0 mr-0">
                    <div class="small-container">
                        <div id="small-img-roll">
                            @if ($product->images->count() > 0)
                                @foreach ($product->images as $key => $image)
                                    <img src="{{ asset('/images/products/' . $image->image) }}" class="show-small-img" onclick="currentSlide({{ $key + 1 }})" alt="">
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
                        <label><input name="size" onclick="selectProductSize('XS')" type="radio" > XS</label>
                        <label><input name="size" onclick="selectProductSize('S')" type="radio" > S</label>
                        <label><input name="size" onclick="selectProductSize('M')" type="radio" > M</label>
                        <label><input name="size" onclick="selectProductSize('XL')" type="radio" > XL</label>
                        <label><input name="size" onclick="selectProductSize('2XL')" type="radio" > 2XL</label>
                        <label><input name="size" onclick="selectProductSize('3XL')" type="radio" > 3XL</label>
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
                                        <input type="hidden" name="product_size" id="product_size" />
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
                        <div class="col-md-12 px-5">
                            {!! $product->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @php
            $products = $product->recommended(10);
        @endphp

        <div class="mb-5">
            @if ($products->count() > 0)
                <div class="similar-products-title">
                    <h6 class="text-center product-like-text">YOU MAY ALSO LIKE</h6>
                </div>
                @include('frontend.pages.product.partials.recommended-products')
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
    {{-- <script src="{{ asset('public/frontend') }}/js/zoom-image.js"></script> --}}

    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            console.log(`n`, n);
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }

        function selectProductSize(size){
            localStorage.setItem('lastProductSize', size);
        }

        var lastProductSize = localStorage.getItem('lastProductSize');
        $("#product_size").val(lastProductSize);

    </script>
@endsection
