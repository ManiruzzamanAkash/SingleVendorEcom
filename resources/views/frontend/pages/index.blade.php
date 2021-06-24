@extends('frontend.layouts.master')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/app/home.css') }}{{-- ?v=1.0.2 --}}">
@endsection

@section('content')

<!-- Slider -->
{{-- <div class="container-fluid">
    <div class="row">
        <div class="col-md-12 p-0">
            <div class="slide-1 home-slider full-width-slide">
              @foreach ($sliders as $slider)
              <div>
                <div class="home full-height text-left p-left blur-up lazyload">
                    <img src="{{ asset('images/sliders/'.$slider->image) }}" class="img-to-bg" alt="slider">
<div class="container">
    <div class="row">
        <div class="col">
            <div class="slider-contain">
                <div>
                    <h3 class="slide-two sub">{{ $slider->title }}</h3>
                    <h3 class="slide-two sub">Save up to 50% off</h3>
                    <a href="#" class="btn btn-theme br-0">Shop now</a>
                    @if ($slider->button_text)
                    <p>
                        <a href="{{ $slider->button_link }}" target="_blank"
                            class="btn btn-theme">{{ $slider->button_text }}</a>
                    </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endforeach

</div>
</div>
</div>
</div> --}}
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner blur-up lazyload">
        @foreach ($sliders as $slider)

        <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
            <a href="{{ $slider->button_link }}" target="_blank">
                <img class="d-block w-100" src="{{ asset('images/sliders/'.$slider->image) }}" alt="{{$slider->title}}">
            </a>
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

<!-- Category two -->
{{--     <section>
        <div class="container">
            <div class="row two-mt-30">
                <div class="col-12 main-title">
                    <h4 class="title">Top Category</h4>
                </div>
                @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)

                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="category-two border-theme">
                        <div class="media">
                          <img class="align-self-start blur-up lazyload" src="{!! asset('images/categories/'.$parent->image) !!}" alt="{{ $parent->name }}">
<div class="media-body">
    <div class="d-flex-center">
        <div>
            <a href="{!! route('categories.show', $parent->id) !!}" class="cat-name"><i
                    class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>{{ $parent->name }}</a>
            @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child)
            <a href="{!! route('categories.show', $child->id) !!}" class="cat-name"><i
                    class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>{{ $child->name }}</a>
            @endforeach
        </div>
    </div>
</div>
</div>
</div>
</div>
@endforeach

</div>
</div>
</section> --}}
<!-- Category two end -->

<!-- Product layout two -->

@foreach ($categories as $catSingle)
@if($catSingle->manage_home_slider > 0)
@if (count($catSingle->products) > 0)
<div class="container content-holder">
    <div class="col-md-12 main-title">
        <div class="slider-title">
            {{ $catSingle->slider_name }}
            <h6>{{ $catSingle->slider_slogan }}</h6>
        </div>
        <div class="slide-6 theme-arrow product-m">
            @foreach ($catSingle->products()->limit(12)->get() as $product)
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
                <img src="{{ asset('images/products/'.$product->images->first()->image) }}" alt="{{ $product->title }}"
                    class="img-fluid blur-up lazyload product-image">
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
            <img alt="{{ $product->title }}" src="{{ asset('images/products/'.$product->images->first()->image) }}"
                class="img-responsive blur-up lazyload">
        </a>
        @if (Auth::check())
        <div class="wishlist-div">
            <add-wishlist url="{{ url('/') }}" id="{{ $product->id }}" api_token="{{ Auth::user()->api_token }}">
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

<!-- Hot deal -->
{{-- <section>
    <div class="container">
        <div class="row space-hot-deal">
            <div class="col-md-6 col-xl-4">
               <div class="border-theme-orange">
                <div class="add-banner theme-arrow main-title">
                    <h4 class="title">Today Hot Deal</h4>
                    <div class="slide-1 add-banner theme-arrow arrow-two p-0 timer-banner product-timer">
                        <div class="product-box">
                            <div class="text-center">
                                <img src="public/assets/images/electronics3/timmer_product.jpg" alt="product" class="img-fluid blur-up lazyload">
                            </div>
                            <div class="timer-banner text-center ">
                                <div class="timer-two w-100 text-center">
                                    <p id="deal-timer"></p>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <a href="#"><h6>When an unknown.When an unknown.It has survived not only five.</h6></a>
                                <h4>$45.00</h4>
                            </div>
                        </div>
                        <div class="product-box">
                            <div class="text-center">
                                <img src="public/assets/images/electronics3/timmer_product1.jpg" alt="product" class="img-fluid blur-up lazyload">
                            </div>
                            <div class="timer-banner text-center ">
                                <div class="timer-two w-100 text-center">
                                    <p id="deal-timer-two"></p>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <a href="#"><h6>When an unknown.When an unknown.It has survived not only five.</h6></a>
                                <h4>$45.00</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-6 theme-tab">
            <h4 class="title text-uppercase">Top Collection</h4>
            <div class="border-tab"></div>
            <ul class="tabs tab-title">
                <li class="current">
                    <a href="tab-1">New Products</a>
                </li>
                <li class="">
                    <a href="tab-2.html">Best Sellers</a>
                </li>
            </ul>
            <div class="tab-content-cls lg-img-res">
                <div id="tab-1" class="tab-content active default">
                    <div class="tab-slide-3 theme-arrow arrow-two product-m">
                        <div class="product-spce">
                            <div class="product-box">
                                <div class="product border-theme">
                                   <div class="lable-wrapper">
                                    <span class="lable1">new</span>
                                    <span class="lable2">10% off</span>
                                </div>
                                <img src="public/assets/images/electronics3/product/8.jpg" alt="product" class="img-fluid blur-up lazyload">
                                <div class="cart-info">
                                    <button title="Add to cart"><i class="icon-bag"></i></button>
                                    <a href="#" title="Quick View"><i class="icon-search" aria-hidden="true"></i></a>
                                    <a href="javascript:void(0)" title="Add to Wishlist"><i class="icon-heart" aria-hidden="true"></i></a>
                                    <a href="#" title="Add to Compare"><i class="icon-arrows-horizontal" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <a href="#"><h6>When an unknown.</h6></a>
                                <h4>$45.00</h4>

                            </div>
                        </div>
                        <div class="product-box">
                            <div class="product border-theme">
                                <img src="public/assets/images/electronics3/product/9.jpg" alt="product" class="img-fluid blur-up lazyload">
                                <div class="cart-info">
                                    <button title="Add to cart"><i class="icon-bag"></i></button>
                                    <a href="#" title="Quick View"><i class="icon-search" aria-hidden="true"></i></a>
                                    <a href="javascript:void(0)" title="Add to Wishlist"><i class="icon-heart" aria-hidden="true"></i></a>
                                    <a href="#" title="Add to Compare"><i class="icon-arrows-horizontal" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <a href="#"><h6>When an unknown.</h6></a>
                                <h4>$45.00</h4>
                            </div>
                        </div>
                    </div>
                    <div class="product-spce">
                        <div class="product-box">
                            <div class="product border-theme">
                                <img src="public/assets/images/electronics3/product/10.jpg" alt="product" class="img-fluid blur-up lazyload">
                                <div class="cart-info">
                                    <button title="Add to cart"><i class="icon-bag"></i></button>
                                    <a href="#" title="Quick View"><i class="icon-search" aria-hidden="true"></i></a>
                                    <a href="javascript:void(0)" title="Add to Wishlist"><i class="icon-heart" aria-hidden="true"></i></a>
                                    <a href="#" title="Add to Compare"><i class="icon-arrows-horizontal" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <a href="#"><h6>When an unknown.</h6></a>
                                <h4>$45.00</h4>
                            </div>
                        </div>
                        <div class="product-box">
                            <div class="product border-theme">
                               <div class="lable-wrapper">
                                <span class="lable1">new</span>
                                <span class="lable2">10% off</span>
                            </div>
                            <img src="public/assets/images/electronics3/product/11.jpg" alt="product" class="img-fluid blur-up lazyload">
                            <div class="cart-info">
                                <button title="Add to cart"><i class="icon-bag"></i></button>
                                <a href="#" title="Quick View"><i class="icon-search" aria-hidden="true"></i></a>
                                <a href="javascript:void(0)" title="Add to Wishlist"><i class="icon-heart" aria-hidden="true"></i></a>
                                <a href="#" title="Add to Compare"><i class="icon-arrows-horizontal" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <a href="#"><h6>When an unknown.</h6></a>
                            <h4>$45.00</h4>
                        </div>
                    </div>
                </div>
                <div class="product-spce">
                    <div class="product-box">
                        <div class="product border-theme">
                            <img src="public/assets/images/electronics3/product/12.jpg" alt="product" class="img-fluid blur-up lazyload">
                            <div class="cart-info">
                                <button title="Add to cart"><i class="icon-bag"></i></button>
                                <a href="#" title="Quick View"><i class="icon-search" aria-hidden="true"></i></a>
                                <a href="javascript:void(0)" title="Add to Wishlist"><i class="icon-heart" aria-hidden="true"></i></a>
                                <a href="#" title="Add to Compare"><i class="icon-arrows-horizontal" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <a href="#"><h6>When an unknown.</h6></a>
                            <h4>$405.00</h4>
                        </div>
                    </div>
                    <div class="product-box">
                        <div class="product border-theme">         
                            <img src="public/assets/images/electronics3/product/13.jpg" alt="product" class="img-fluid blur-up lazyload">
                            <div class="cart-info">
                                <button title="Add to cart"><i class="icon-bag"></i></button>
                                <a href="#" title="Quick View"><i class="icon-search" aria-hidden="true"></i></a>
                                <a href="javascript:void(0)" title="Add to Wishlist"><i class="icon-heart" aria-hidden="true"></i></a>
                                <a href="#" title="Add to Compare"><i class="icon-arrows-horizontal" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <a href="#"><h6>When an unknown.</h6></a>
                            <h4>$45.00</h4>
                        </div>
                    </div>                                    
                </div>
                <div class="product-spce">
                    <div class="product-box">
                        <div class="product border-theme">
                           <div class="lable-wrapper">
                            <span class="lable1">new</span>
                            <span class="lable2">10% off</span>
                        </div>
                        <img src="public/assets/images/electronics3/product/14.jpg" alt="product" class="img-fluid blur-up lazyload">
                        <div class="cart-info">
                            <button title="Add to cart"><i class="icon-bag"></i></button>
                            <a href="#" title="Quick View"><i class="icon-search" aria-hidden="true"></i></a>
                            <a href="javascript:void(0)" title="Add to Wishlist"><i class="icon-heart" aria-hidden="true"></i></a>
                            <a href="#" title="Add to Compare"><i class="icon-arrows-horizontal" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <a href="#"><h6>When an unknown.</h6></a>
                        <h4>$45.00</h4>
                    </div>
                </div>
                <div class="product-box">
                    <div class="product border-theme">
                       <div class="lable-wrapper">
                        <span class="lable1">new</span>
                        <span class="lable2">10% off</span>
                    </div>
                    <img src="public/assets/images/electronics3/product/15.jpg" alt="product" class="img-fluid blur-up lazyload">
                    <div class="cart-info">
                        <button title="Add to cart"><i class="icon-bag"></i></button>
                        <a href="#" title="Quick View"><i class="icon-search" aria-hidden="true"></i></a>
                        <a href="javascript:void(0)" title="Add to Wishlist"><i class="icon-heart" aria-hidden="true"></i></a>
                        <a href="#" title="Add to Compare"><i class="icon-arrows-horizontal" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="product-info">
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <a href="#"><h6>When an unknown.</h6></a>
                    <h4>$45.00</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="tab-2" class="tab-content" >
    <div class="tab-slide-3 theme-arrow arrow-two product-m">
        <div class="product-spce">
            <div class="product-box">
                <div class="product border-theme">
                   <div class="lable-wrapper">
                    <span class="lable1">new</span>
                    <span class="lable2">10% off</span>
                </div>
                <img src="public/assets/images/electronics3/product/16.jpg" alt="product" class="img-fluid blur-up lazyload">
                <div class="cart-info">
                    <button title="Add to cart"><i class="icon-bag"></i></button>
                    <a href="#" title="Quick View"><i class="icon-search" aria-hidden="true"></i></a>
                    <a href="javascript:void(0)" title="Add to Wishlist"><i class="icon-heart" aria-hidden="true"></i></a>
                    <a href="#" title="Add to Compare"><i class="icon-arrows-horizontal" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="product-info">
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <a href="#"><h6>When an unknown.</h6></a>
                <h4>$45.00</h4>
            </div>
        </div>
        <div class="product-box">
            <div class="product border-theme">
                <img src="public/assets/images/electronics3/product/17.jpg" alt="product" class="img-fluid blur-up lazyload">
                <div class="cart-info">
                    <button title="Add to cart"><i class="icon-bag"></i></button>
                    <a href="#" title="Quick View"><i class="icon-search" aria-hidden="true"></i></a>
                    <a href="javascript:void(0)" title="Add to Wishlist"><i class="icon-heart" aria-hidden="true"></i></a>
                    <a href="#" title="Add to Compare"><i class="icon-arrows-horizontal" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="product-info">
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <a href="#"><h6>When an unknown.</h6></a>
                <h4>$45.00</h4>
            </div>
        </div>
    </div>
    <div class="product-spce">
        <div class="product-box">
            <div class="product border-theme">
                <img src="public/assets/images/electronics3/product/18.jpg" alt="product" class="img-fluid blur-up lazyload">
                <div class="cart-info">
                    <button title="Add to cart"><i class="icon-bag"></i></button>
                    <a href="#" title="Quick View"><i class="icon-search" aria-hidden="true"></i></a>
                    <a href="javascript:void(0)" title="Add to Wishlist"><i class="icon-heart" aria-hidden="true"></i></a>
                    <a href="#" title="Add to Compare"><i class="icon-arrows-horizontal" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="product-info">
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <a href="#"><h6>When an unknown.</h6></a>
                <h4>$45.00</h4>
            </div>
        </div>
        <div class="product-box">
            <div class="product border-theme">
               <div class="lable-wrapper">
                <span class="lable1">new</span>
                <span class="lable2">10% off</span>
            </div>
            <img src="public/assets/images/electronics3/product/19.jpg" alt="product" class="img-fluid blur-up lazyload">
            <div class="cart-info">
                <button title="Add to cart"><i class="icon-bag"></i></button>
                <a href="#" title="Quick View"><i class="icon-search" aria-hidden="true"></i></a>
                <a href="javascript:void(0)" title="Add to Wishlist"><i class="icon-heart" aria-hidden="true"></i></a>
                <a href="#" title="Add to Compare"><i class="icon-arrows-horizontal" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="product-info">
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
            <a href="#"><h6>When an unknown.</h6></a>
            <h4>$45.00</h4>
        </div>
    </div>
</div>
<div class="product-spce">
    <div class="product-box">
        <div class="product border-theme">
            <img src="public/assets/images/electronics3/product/20.jpg" alt="product" class="img-fluid blur-up lazyload">
            <div class="cart-info">
                <button title="Add to cart"><i class="icon-bag"></i></button>
                <a href="#" title="Quick View"><i class="icon-search" aria-hidden="true"></i></a>
                <a href="javascript:void(0)" title="Add to Wishlist"><i class="icon-heart" aria-hidden="true"></i></a>
                <a href="#" title="Add to Compare"><i class="icon-arrows-horizontal" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="product-info">
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
            <a href="#"><h6>When an unknown.</h6></a>
            <h4>$405.00</h4>
        </div>
    </div>
    <div class="product-box">
        <div class="product border-theme">         
            <img src="public/assets/images/electronics3/product/21.jpg" alt="product" class="img-fluid blur-up lazyload">
            <div class="cart-info">
                <button title="Add to cart"><i class="icon-bag"></i></button>
                <a href="#" title="Quick View"><i class="icon-search" aria-hidden="true"></i></a>
                <a href="javascript:void(0)" title="Add to Wishlist"><i class="icon-heart" aria-hidden="true"></i></a>
                <a href="#" title="Add to Compare"><i class="icon-arrows-horizontal" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="product-info">
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
            <a href="#"><h6>When an unknown.</h6></a>
            <h4>$45.00</h4>
        </div>
    </div>                                    
</div>
<div class="product-spce">
    <div class="product-box">
        <div class="product border-theme">
           <div class="lable-wrapper">
            <span class="lable1">new</span>
            <span class="lable2">10% off</span>
        </div>
        <img src="public/assets/images/electronics3/product/22.jpg" alt="product" class="img-fluid blur-up lazyload">
        <div class="cart-info">
            <button title="Add to cart"><i class="icon-bag"></i></button>
            <a href="#" title="Quick View"><i class="icon-search" aria-hidden="true"></i></a>
            <a href="javascript:void(0)" title="Add to Wishlist"><i class="icon-heart" aria-hidden="true"></i></a>
            <a href="#" title="Add to Compare"><i class="icon-arrows-horizontal" aria-hidden="true"></i></a>
        </div>
    </div>
    <div class="product-info">
        <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
        </div>
        <a href="#"><h6>When an unknown.</h6></a>
        <h4>$45.00</h4>
    </div>
</div>
<div class="product-box">
    <div class="product border-theme">
       <div class="lable-wrapper">
        <span class="lable1">new</span>
        <span class="lable2">10% off</span>
    </div>
    <img src="public/assets/images/electronics3/product/23.jpg" alt="product" class="img-fluid blur-up lazyload">
    <div class="cart-info">
        <button title="Add to cart"><i class="icon-bag"></i></button>
        <a href="#" title="Quick View"><i class="icon-search" aria-hidden="true"></i></a>
        <a href="javascript:void(0)" title="Add to Wishlist"><i class="icon-heart" aria-hidden="true"></i></a>
        <a href="#" title="Add to Compare"><i class="icon-arrows-horizontal" aria-hidden="true"></i></a>
    </div>
</div>
<div class="product-info">
    <div class="rating">
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
    </div>
    <a href="#"><h6>When an unknown.</h6></a>
    <h4>$45.00</h4>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-xl-2 add-d-none-md">
    <img src="public/assets/images/electronics3/add-banner.jpg" alt="add-banner" class="img-fluid">
</div>
</div>
</div>
</section> --}}
<!-- Hot deal End -->

@endsection