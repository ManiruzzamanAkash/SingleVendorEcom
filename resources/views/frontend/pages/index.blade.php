@extends('frontend.layouts.master')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/app/home.css') }}{{-- ?v=1.0.2 --}}">
@endsection

@section('content')
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner blur-up lazyload">
            @foreach ($sliders as $slider)

                <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">

                    <img class="d-block w-100" src="{{ asset('images/sliders/' . $slider->image) }}" height="500px"
                        alt="{{ $slider->title }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h3 class="text-dark">{{ $slider->title }}</h3>
                        <p class="text-dark">{{ $slider->description ? $slider->description : 'No description' }}</p>
                        <a href="{{ route('brands.index') }}" type="button" class="btn btn-outline-secondary">Shop Now</a>
                    </div>

                </div>

            @endforeach
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
    <!-- Slider End -->

    @foreach ($categories as $catSingle)
        @if ($catSingle->manage_home_slider > 0)
            @if (count($catSingle->products) > 0)
                <div class="container content-holder">
                    <div class="col-md-12 main-title">
                        <div class="slider-title">
                            {{ $catSingle->slider_name }}
                            <h6>{{ $catSingle->slider_slogan }}</h6>
                            <a href="{{ route('categories.show', $catSingle->slug) }}" type="button"
                                class="btn btn-outline-secondary">Shop Now</a>
                        </div>
                        <div class="slide-6 theme-arrow product-m">
                            @foreach ($catSingle->products()->limit(12)->get()
        as $product)
                                {{-- <div class="product-box">
        <div class="product">
             @if (Auth::check())
                 <div class="wishlist-div">
                     <add-wishlist url="{{ url('/') }}" id="{{ $product->id }}"
            api_token="{{ Auth::user()->api_token }}"></add-wishlist>
        </div>
        @endif
        <div class="product-image-div">
            <a href="{!! route('products.show', $product->slug) !!}">
                <img src="{{ asset('images/products/'.$product->images->first()->image) }}" alt="{{ $product->title }}" class="img-fluid blur-up lazyload product-image">
            </a>
        </div>

        <div class="product-info">
            <a href="{!! route('products.show', $product->slug) !!}">
                <h6 class="product-title">{{ $product->title }}</h6>
            </a>
            <h4 class="product-price">৳{{ $product->price }}</h4>
        </div>
        <div class="cart-info">
            <add-cart url="{{ url('/') }}" id="{{ $product->id }}"></add-cart>
        </div>
    </div>
</div> --}}

                                <div class="product">
                                    <div class="proImg">
                                        <a href="{!! route('products.show', $product->slug) !!}" class="thumbnail">
                                            <img alt="{{ $product->title }}"
                                                src="{{ asset('images/products/' . $product->images->first()->image) }}"
                                                class="img-responsive blur-up lazyload">
                                        </a>
                                        @if (Auth::check())
                                            <div class="wishlist-div">
                                                <add-wishlist url="{{ url('/') }}" id="{{ $product->id }}"
                                                    api_token="{{ Auth::user()->api_token }}">
                                                </add-wishlist>
                                            </div>
                                        @endif
                                        <div class="info" onclick="location.href='{!! route('products.show', $product->slug) !!}'">
                                            <h5 class="prodTitle">
                                                {{ $product->title }}
                                            </h5>
                                            <h5 class="price">
                                                ৳ {{ $product->price }}
                                            </h5>
                                            <h5 class="slogan">
                                                {{ $product->slogan }}
                                            </h5>
                                        </div>
                                    </div>

                                </div>
                            @endforeach

                        </div>


                    </div>
                </div>
            @endif
        @endif
    @endforeach

    <section >
        <div class="offer-section" style="background-image: url('{{ asset('images/Sale_HP__2x.jpg')}}');"  >
            <div class="offer-body" >
                <h3>Extra 50% off Sale</h3><dr></dr>
                <p>Summer favorites. New styles added.</p><dr></dr>
                <a href="{{ route('brands.index') }}" type="button" class="btn btn-outline-secondary">Shop Now</a>
                <a href="{{ route('brands.index') }}" type="button" class="btn btn-outline-secondary">Shop Now</a>

            </div>
        </div>
    </section>

@endsection
