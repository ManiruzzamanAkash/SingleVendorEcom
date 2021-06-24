@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Add Product
        </div>
        <div class="card-body">
          <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('backend.partials.messages')
            <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product name">
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Occation / #tag / Announcement</label>
                  <input type="text" class="form-control" name="occation" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product name">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Slogan</label>
                  <input type="text" class="form-control" name="slogan" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product name">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Delivery Date</label>
                  <input type="text" class="form-control" name="delivery_time" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product name">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Description</label>
              <textarea name="description" rows="8" cols="80" class="form-control"></textarea>

            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="exampleInputEmail1">Price</label>
                  <input type="number" class="form-control" name="price" id="exampleInputEmail1">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="exampleInputEmail1">Old price</label>
                  <input type="number" class="form-control" name="offer_price" id="exampleInputEmail1">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="exampleInputEmail1">Quantity</label>
                  <input type="number" class="form-control" name="quantity" id="exampleInputEmail1">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="exampleInputEmail1">Warranty(0=no warr,1=W.ava,2=noGur,3=G.ava)</label>
                  <input type="text" class="form-control" name="warranty" id="exampleInputEmail1">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Select Category</label>
                  <select class="form-control" name="category_id">
                    <option value="">Please select a category for the product</option>
                    @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
                      <option value="{{ $parent->id }}">{{ $parent->name }}</option>

                      @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child)
                        <option value="{{ $child->id }}"> ------> {{ $child->name }}</option>

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
                      <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>




            <div class="form-group">
              <label for="product_image">Product Image <span class="text-muted">(400X533) is recommended</span></label>

              <div class="row">
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" id="product_image" >
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" id="product_image" >
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" id="product_image" >
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" id="product_image" >
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" id="product_image" >
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" id="product_image" >
                </div>
              </div>
            </div>

            <button type="submit" class="btn btn-primary">Ad Product</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection
