@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Edit Category
        </div>
        <div class="card-body">
          <form action="{{ route('admin.category.update', $category->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('backend.partials.messages')

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Category Name" value="{{ $category->name }}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="slug">URL Text</label>
                  <input type="text" class="form-control" name="slug" id="slug" aria-describedby="emailHelp" placeholder="Enter Category URL Text, e.g- mans-fashion" value="{{ $category->slug }}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="name">Slider Name</label>
                  <input type="text" class="form-control" name="slider_name" id="name" value="{{ $category->slider_name }}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="slug">Slider Slogan</label>
                  <input type="text" class="form-control" name="slider_slogan" id="slug" value="{{ $category->slider_slogan }}">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Sub Header</label>
                <input type="text" class="form-control" name="sub_header" id="slug" value="{{ $category->sub_header }}">
              </div>
              <div class="col-md-6">
                <label for="exampleInputPassword1">Home slider(0 = hide, 1 = show)</label>
                <input type="number" class="form-control" name="manage_home_slider" id="slug" value="{{ $category->manage_home_slider }}">
              </div>
            </div>
            
            <div class="form-group">
              <label for="exampleInputPassword1">Description (optional)</label>
              <textarea name="description" rows="8" cols="80" class="form-control"> {!! $category->description !!}</textarea>
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Parent Category (optional)</label>
              <select class="form-control" name="parent_id">
                <option value="">Please select a Primary category</option>
                @foreach ($main_categories as $cat)
                  <option value="{{ $cat->id }}" {{ $cat->id == $category->parent_id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
              </select>

            </div>
            <div class="form-group">
              <label for="oldimage">Category Old Image</label> <br>

              <img src="{!! asset('images/categories/'.$category->image) !!}" width="100"> <br>

              <label for="image">Category New  Image (optional)</label>

              <input type="file" class="form-control" name="image" id="image" >
            </div>


            <button type="submit" class="btn btn-success">Update Category</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection
