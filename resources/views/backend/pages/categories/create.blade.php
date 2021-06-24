@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Add Category
        </div>
        <div class="card-body">
          <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('backend.partials.messages')
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Category Name">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="slug">URL Text</label>
                  <input type="text" class="form-control" name="slug" id="slug" aria-describedby="emailHelp" placeholder="Enter Category URL Text, e.g- mans-fashion">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="name">Slider Name</label>
                  <input type="text" class="form-control" name="slider_name" id="name" aria-describedby="emailHelp" placeholder="Enter Category Name">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="slug">Slider Slogan</label>
                  <input type="text" class="form-control" name="slider_slogan" id="slug" aria-describedby="emailHelp" placeholder="Enter Category URL Text, e.g- mans-fashion">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Sub Header</label>
              <input type="text" class="form-control" name="sub_header" id="slug" aria-describedby="emailHelp" placeholder="Enter Category URL Text, e.g- mans-fashion">

            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Description</label>
              <textarea name="description" rows="8" cols="80" class="form-control"></textarea>

            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Parent Category (optional)</label>
              <select class="form-control" name="parent_id">
                <option value="">Please select a Parent category</option>
                @foreach ($main_categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>

            </div>
            <div class="form-group">
              <label for="image">Category Image (optional)</label>
              <input type="file" class="form-control" name="image" id="image" >
            </div>


            <button type="submit" class="btn btn-primary">Add Category</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection
