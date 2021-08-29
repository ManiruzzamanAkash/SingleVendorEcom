@extends('frontend.layouts.master')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/app/home.css') }}">
@endsection

@section('content')

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner blur-up lazyload">

        @foreach ($sliders as $slider)
        <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
            <img class="d-block w-100" src="{{ asset('images/sliders/' . $slider->image) }}" height="auto" alt="{{ $slider->title }}">
            <div class="carousel-caption d-md-block ">
                <h3 class="slider-title text-white">{{ $slider->title }}</h3>
                <p class="slider-description">{!! $slider->description ? $slider->description : '' !!}</p>

                @if ($slider->button_link)
                <a href="{{ url($slider->button_link) }}" type="button" class="btn btn-outline-primary btn-carousel">
                    {{ $slider->button_text }}
                </a>
                @endif

                @if ($slider->button_link2)
                <a href="{{ url($slider->button_link2) }}" type="button" class="btn btn-outline-primary btn-carousel">
                    {{ $slider->button_text2 }}
                </a>
                @endif
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

<!-- Categories Section -->
<section>
    <div class="container-fluid mb-5">
        <div class="row">
            @foreach ($homepage_categories as $category)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div onclick="location.href='{{ route("categories.show", $category->slug) }}'" class="category-image d-flex align-items-end pointer" style="background-image: url('{{ asset('images/categories/' . $category->image) }}');">
                        <div class="ml-4 home-category pb-2 text-white">
                            <p>{{ $category->name }}</p>
                            <a href="{{ route('categories.show', $category->slug) }}" >Shop Now</a>
                        </div>
                    </div>
                </div> 
            @endforeach
        </div>
</section>
<!-- Categories Section -->

<!-- offer 50% start -->
<section>
    <div class="offer-section" style="background-image: url('{{ asset('images/Sale_HP__2x.jpg') }}');margin-top: -20px;">
        <div class="offer-body">
            <h3>Extra 50% off Sale</h3>

            <p>Summer favorites. New styles added.</p>

            <a href="{{ route('categories.show', 'women') }}?offer=50" type="button" class="btn btn-outline-secondary btn-carousel">
                Shop Women's
            </a>

            <a href="{{ route('categories.show', 'mens') }}?offer=50" type="button" class="btn btn-outline-secondary btn-carousel">
                Shop Men's
            </a>
        </div>
    </div>
</section>
<!-- offer 50%  End -->

@if ($settings->website->theme->base_theme === 'light')
    @include('frontend.partials.category-wise-products-light')
@else
    @include('frontend.partials.category-wise-products')
@endif


@endsection