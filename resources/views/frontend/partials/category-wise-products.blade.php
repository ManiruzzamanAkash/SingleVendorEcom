@foreach ($homepage_categories as $catSingle)
@if ($catSingle->show_homepage)
@if (count($catSingle->products) > 0)
<div class="container content-holder">
    <div class="col-md-12 main-title">
        <div class="slider-title ">
            <span class="text-black">{{ $catSingle->slider_name }}</span>
            <h6>{{ $catSingle->slider_slogan }}</h6>
            <a href="{{ route('categories.show', $catSingle->slug) }}" type="button" class="btn btn-outline-secondary">
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
                        <img alt="{{ $product->title }}" src="{{ asset('images/products/' . $product->images->first()->image) }}" class="img-responsive blur-up lazyload">
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
                            ৳ {{ $product->offer_price ? $product->offer_price : $product->price }}
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