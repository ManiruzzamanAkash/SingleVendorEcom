@foreach ($navbar_categories as $catSingle)
    <div style="background-color: {{ $catSingle->bg_color }};margin-bottom: -48px!important; padding-top: 32px; padding-bottom: 2rem">
        @php $products = $catSingle->products()->paginate(4); @endphp

        @if (count($products) > 0)
            <div class="container-fluid">
                <h2 class="mb-3 mt-2 pull-left">{{ $catSingle->name }}</h2>
                <h2 class="mb-3 mt-2 pull-right">
                    <a href="{{ route('categories.show', $catSingle->slug) }}" class="btn btn-info btn-sm btn-theme">
                        View More <i class="fa fa-arrow-right"></i>
                    </a>
                </h2>
                <div class="clearfix"></div>
                @php $data = ['disable_pagination' => true]; @endphp
                @include('frontend.pages.product.partials.all_products', $data)
                <div class="mt-5"></div>
            </div>
        @endif
    </div>
@endforeach
