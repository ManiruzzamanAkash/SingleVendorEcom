@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Edit Brand
        </div>
        <div class="card-body">
          <form action="{{ route('admin.brand.update', $brand->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('backend.partials.messages')
           
           <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Brand Name" value="{{ $brand->name }}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="slug">URL Text</label>
                  <input type="text" class="form-control" name="slug" id="slug" aria-describedby="emailHelp" placeholder="Enter Brand URL Text, e.g- mans-fashion"  value="{{ $brand->slug }}">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Description (optional)</label>
              <textarea name="description" rows="8" cols="80" class="form-control"> {!! $brand->description !!}</textarea>

            </div>


            <div class="form-group">
              <label for="oldimage">Brand Old Image</label> <br>

              <img src="{!! asset('images/brands/'.$brand->image) !!}" width="100"> <br>

              <label for="image">Brand New  Image (optional)</label>

              <input type="file" class="form-control" name="image" id="image" >
            </div>


            <button type="submit" class="btn btn-success">Update Brand</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection
