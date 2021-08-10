<div class="row {{ Route::is('wishlists') }}">
    @foreach ($products as $product)

        @if (Route::is('wishlists'))
            @php $product = $product->product; @endphp
        @endif
        <div class="col-sm-6 col-md-3 col-lg-3">
            <div class="product">

                @if (Auth::check())
                    <div class="wishlist-div">
                        <add-wishlist url="{{ url('/') }}" route="{{ Route::currentRouteName() }}"
                            id="{{ $product->id }}" api_token="{{ Auth::user()->api_token }}"></add-wishlist>
                    </div>
                @endif

                <div class="product-image">
                    <a href="{!! route('products.show', $product->slug) !!}" class="thumbnail">
                        <div class="flip-box">    
                            <div class="flip-box-inner">
                                <div class="flip-box-front">
                                    <img style="width:160px;height:178px" src="{{ asset('images/products/' . $product->images->first()->image) }}" alt="{{ $product->title }}">
                                </div>
                                <div class="flip-box-back">
                                    @if ($product->images->get(1))
                                    <img style="width:160px;height:178px" src="{{ asset('images/products/' .$product->images->get(1)->image) }}" alt="{{ $product->title }}">
                                    @else
                                    <img style="width:160px;height:178px" src="{{ asset('images/logo-old.png') }}" alt="logo">
                                    @endif
                                </div>
                            </div>  
                        </div>
                        {{-- <img src="{{ asset('images/products/' . $product->images->first()->image) }}"
                            alt="{{ $product->title }}" class="img-fluid blur-up lazyload product-image"> --}}
                    </a>
                </div>

                <div class="prod-content" onclick="location.href='{!! route('products.show', $product->slug) !!}'">
                    <div class="prod-name">
                        <a href="{!! route('products.show', $product->slug) !!}">{{ $product->title }}</a>
                    </div>
                    <div class="prod-price">
                        <div class="product-price">
                            ৳ {{ $product->offer_price ? $product->offer_price : $product->price }}
                        </div>
                        <div class="prodOld-price">
                            {{ $product->offer_price ? '৳ ' . $product->price : '' }}
                        </div>
                    </div>
                    <div class="prod-slogan text-success">
                        {{ $product->slogan }}
                    </div>
                </div>
                <div class="cart-info">
                    <add-cart url="{{ url('/') }}" id="{{ $product->id }}"></add-cart>
                </div>
            </div>
        </div>
    @endforeach
</div>

@if (!isset($data['disable_pagination']))
    <div class="mt-4 text-center">
        {{ $products->links() }}
    </div>
@endif
