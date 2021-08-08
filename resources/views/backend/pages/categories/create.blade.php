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
                                    <input type="text" class="form-control" name="name" id="name"
                                        aria-describedby="emailHelp" placeholder="Enter Category Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slug">URL Text</label>
                                    <input type="text" class="form-control" name="slug" id="slug"
                                        aria-describedby="emailHelp"
                                        placeholder="Enter Category URL Text, e.g- mans-fashion">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Slider Name</label>
                                    <input type="text" class="form-control" name="slider_name" id="name"
                                        aria-describedby="emailHelp" placeholder="Enter Homepage Category Title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slug">Slider Slogan</label>
                                    <input type="text" class="form-control" name="slider_slogan" id="slug"
                                        aria-describedby="emailHelp"
                                        placeholder="Enter Category URL Text, e.g- mans-fashion">
                                </div>
                            </div>
                        </div>

                        <div class="row">
							<div class="col-md-9">
								<div class="form-group">
									<label for="exampleInputPassword1">Sub Header</label>
									<input type="text" class="form-control" name="sub_header" id="slug" aria-describedby="emailHelp"
										placeholder="Enter Category URL Text, e.g- mans-fashion">
								</div>
							</div>
	
							<div class="col-md-3">
								<div class="form-group">
									<label for="status">Status ?</label>
									<select class="form-control" name="status" id="status">
										<option value="1" selected>Active</option>
										<option value="0">Inactive</option>
									</select>
								</div>
							</div>
						</div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="show_navbar">Visible on Navbar ?</label>
                                    <select class="form-control" name="show_navbar" id="show_navbar">
										<option value="1">Yes</option>
										<option value="0" selected>No</option>
									</select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="navbar_priority">Navbar Priority</label>
                                    <input type="number" min="1" value="1" class="form-control" name="navbar_priority" id="navbar_priority" placeholder="Enter Priority for Nav bar display">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="show_homepage">Visible on Homepage ?</label>
                                    <select class="form-control" name="show_homepage" id="show_homepage">
										<option value="1">Yes</option>
										<option value="0" selected>No</option>
									</select>
                                </div>
                            </div>
							<div class="col-md-3">
                                <div class="form-group">
                                    <label for="homepage_priority">Homepage Priority</label>
                                    <input type="number" min="1" value="1" class="form-control" name="homepage_priority" id="homepage_priority" placeholder="Enter Priority for homepage display">
                                </div>
                            </div>
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
                            <input type="file" class="form-control" name="image" id="image">
                        </div>


                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- main-panel ends -->
@endsection
