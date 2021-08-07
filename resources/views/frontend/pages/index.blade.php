@extends('frontend.layouts.master')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/app/home.css') }}">
@endsection

@section('content')
@php
    // dd($settings->website);
@endphp
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner blur-up lazyload">

            @foreach ($sliders as $slider)
                <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
                    <img class="d-block w-100" src="{{ asset('images/sliders/' . $slider->image) }}" height="auto"
                        alt="{{ $slider->title }}" >
                    {{-- <div class="carousel-caption d-none d-md-block "> --}}
                    <div class="carousel-caption d-none d-md-block ">
                        <h3 class="slider-title">{{ $slider->title }}</h3>
                        <p class="slider-description">{!! $slider->description ? $slider->description : '' !!}</p>

                        @if ($slider->button_link)
                            <a href="{{ $slider->button_link }}" type="button" class="btn btn-outline-primary btn-carousel">
                                {{ $slider->button_text }}
                            </a>
                        @endif

                        @if ($slider->button_link2)
                            <a href="{{ $slider->button_link2 }}" type="button" class="btn btn-outline-primary btn-carousel">
                                {{ $slider->button_text2 }}
                            </a>
                        @endif

                        {{-- @if ($slider->button_link2)
                            <a href="{{ url($slider->button_link2) }}" type="button" class="btn btn-outline-secondary">
                                {{ $slider->button_text2 }}
                            </a>
                        @endif --}}
                    </div>
                </div>
            @endforeach
        </div>
        @if (count($sliders) > 1)
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        @endif
    </div>
    <!-- Slider End -->
    <!-- offer 50% start -->
    <section>
        <div class="offer-section" style="background-image: url('{{ asset('images/Sale_HP__2x.jpg') }}');">
            <div class="offer-body">
                <h3>Extra 50% off Sale</h3>
                
                <p>Summer favorites. New styles added.</p>
                
                <a href="{{ route('categories.show', 'women') }}?offer=50" type="button"
                    class="btn btn-outline-secondary btn-carousel">
                    Shop Women's
                </a>

                <a href="{{ route('categories.show', 'mens') }}?offer=50" type="button"
                    class="btn btn-outline-secondary btn-carousel">
                    Shop Men's
                </a>

            </div>
        </div>
    </section>
    <!-- offer 50%  End -->


    @foreach ($categories as $catSingle)
        @if ($catSingle->manage_home_slider > 0)
            @if (count($catSingle->products) > 0)
                <div class="container content-holder">
                    <div class="col-md-12 main-title">
                        <div class="slider-title">
                            {{ $catSingle->slider_name }}
                            <h6>{{ $catSingle->slider_slogan }}</h6>
                            <a href="{{ route('categories.show', $catSingle->slug) }}" type="button"
                                class="btn btn-outline-secondary">
                                Shop Now
                            </a>
                        </div>
                        <div class="slide-6 theme-arrow product-m">
                            @php
                                $categoryProducts = $catSingle
                                    ->products()
                                    ->limit(12)
                                    ->orderBy('id', 'desc')
                                    ->get();
                            @endphp

                            @foreach ($categoryProducts as $product)
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

    <section>
        <div class="offer-section" style="background-image: url('{{ asset('images/Sale_HP__2x.jpg') }}');">
            <div class="offer-body">
                <h3>Extra 50% off Sale</h3>
                
                <p>Summer favorites. New styles added.</p>
                
                <a href="{{ route('categories.show', 'women') }}?offer=50" type="button"
                    class="btn btn-outline-secondary text-white">
                    Shop Now
                </a>

                <a href="{{ route('categories.show', 'mens') }}?offer=50" type="button"
                    class="btn btn-outline-secondary text-white">
                    Shop Now
                </a>

            </div>
        </div>
    </section>

@endsection
