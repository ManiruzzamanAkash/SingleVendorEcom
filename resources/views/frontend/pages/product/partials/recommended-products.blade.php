<div class="container-fluid">
    <div class="col-12 mt-lg-3">
        <div class="owl-carousel recommended-product-carousel owl-theme custom__owl">
            @foreach ($products as $product)
                <a href="{!! route('products.show', $product->slug) !!}">
                    <div class="single-product-slider">
                        <div class="imgbox card__img">
                            <img class="img-fluid"
                                src="{{ asset('images/products/' . $product->images->first()->image) }}" />
                        </div>
                        <p class="mb-0 mt-3">{{ $product->title }}</p>
                        <p class="product-code ">{{ $product->slogan }}</p>
                        <h6>BDT {{ $product->offer_price ? $product->offer_price : $product->price }}</h6>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
