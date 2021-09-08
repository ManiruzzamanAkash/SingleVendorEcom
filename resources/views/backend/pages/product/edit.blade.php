@extends('backend.layouts.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">

            <div class="card">
                <div class="card-header">
                    Edit Product
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.product.update', $product->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @include('backend.partials.messages')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp"
                                placeholder="Enter product Title" value="{{ $product->title }}">
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="occation">Occation / #tag / Announcement</label>
                                    <input type="text" class="form-control" value="{{ $product->occation }}"
                                        name="occation" id="occation" aria-describedby="emailHelp"
                                        placeholder="Enter product Occation / #tag / Announcement">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="slogan">Code</label>
                                    <input type="text" class="form-control" name="slogan" value="{{ $product->slogan }}"
                                        id="slogan" aria-describedby="emailHelp" placeholder="Enter product Code">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="delivery_time">Delivery Time (In minutes)</label>
                                    <input type="number" min="3600" class="form-control" name="delivery_time"
                                        value="{{ empty(old('delivery_time')) ? 3600 : $product->delivery_time }}"
                                        id="delivery_time" aria-describedby="emailHelp"
                                        placeholder="Enter product Delivery deadline">
                                    <p class="text-info">
                                        <i class="fa fa-info-circle"></i> It would be the delivery time in minutes
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <textarea name="description" id="summernote">{{ $product->description }}</textarea>

                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control" name="price" value="{{ $product->price }}"
                                        id="price">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="discount">Discount Percentage</label>
                                    <input type="number" class="form-control" name="discount"
                                        value="{{ $product->discount }}" id="discount">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" class="form-control" name="quantity"
                                        value="{{ $product->quantity }}" id="quantity">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="warranty">Warranty(0=no warr,1=W.ava,2=noGur,3=G.ava)</label>
                                    <input type="text" class="form-control" name="warranty"
                                        value="{{ $product->warranty }}" id="warranty">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Select Category</label>
                                    <select class="form-control" name="category_id">
                                        <option value="">Please select a category for the product</option>
                                        @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', null)->get()
        as $parent)
                                            @php $parent_category_id = $product->category ? $product->category->id : null; @endphp
                                            <option value="{{ $parent->id }}"
                                                {{ $parent->id == $parent_category_id ? 'selected' : '' }}>
                                                {{ $parent->name }}</option>

                                            @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get()
        as $child)
                                                <option value="{{ $child->id }}"
                                                    {{ $child->id == $parent_category_id ? 'selected' : '' }}> ------>
                                                    {{ $child->name }}</option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Select Brand</label>
                                    <select class="form-control" name="brand_id">
                                        <option value="">Please select a brand for the product</option>
                                        @foreach (App\Models\Brand::orderBy('name', 'asc')->get() as $brand)
                                            <option value="{{ $brand->id }}"
                                                {{ $brand->id == $product->brand->id ? 'selected' : '' }}>
                                                {{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="product_image">
                                Product Image <span class="text-muted">(800X500) is recommended</span>

                                <button type="button" class="btn btn-primary btn-sm btn-info" data-toggle="modal"
                                    data-target="#product-images-modal" onclick="loadProductImages()">
                                    Manage Images
                                </button>
                            </label>

                            <div id="product-images-modal-area">
                                @include('backend.pages.product.partials.product-image')
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <input type="file" class="form-control" name="product_image[]" id="product_image">
                                </div>
                                <div class="col-md-4">
                                    <input type="file" class="form-control" name="product_image[]" id="product_image">
                                </div>
                                <div class="col-md-4">
                                    <input type="file" class="form-control" name="product_image[]" id="product_image">
                                </div>
                                <div class="col-md-4">
                                    <input type="file" class="form-control" name="product_image[]" id="product_image">
                                </div>
                                <div class="col-md-4">
                                    <input type="file" class="form-control" name="product_image[]" id="product_image">
                                </div>
                                <div class="col-md-4">
                                    <input type="file" class="form-control" name="product_image[]" id="product_image">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- main-panel ends -->
@endsection

@section('scripts')

    <script>

        function deleteProductImage(id) {
            var url = "{{ url('/admin/products/product-image/delete') }}/" + id;

            $.post(url, { _token: "{{ csrf_token() }}" })
                .done(function(data) {
                    alert('Product Image has been deleted successfully !');
					$('#product-image-'+id).remove();
                });
        }

        function loadProductImages() {
            var url = "{{ route('admin.product.image.get', $product->id) }}" + "?_token={{ csrf_token() }}";

            $.get(url)
                .done(function(data) {
                    $("#product-images-modal-area").html("Hello");
                });
        }
    </script>
@endsection
