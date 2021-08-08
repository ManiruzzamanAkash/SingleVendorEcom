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
								<label for="slider_name">Homepage Section Name</label>
								<input type="text" class="form-control" name="slider_name" id="slider_name" value="{{ $category->slider_name }}">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="slider_slogan">Homepage Slogan</label>
								<input type="text" class="form-control" name="slider_slogan" id="slider_slogan" value="{{ $category->slider_slogan }}">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-9">
							<label for="sub_header">Sub Header</label>
							<input type="text" class="form-control" name="sub_header" id="sub_header" value="{{ $category->sub_header }}">
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="status">Status ?</label>
								<select class="form-control" name="status" id="status">
									<option value="1" {{ $category->status ? 'selected' : '' }}>Active</option>
									<option value="0" {{ ! $category->status ? 'selected' : '' }}>Inactive</option>
								</select>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label for="show_navbar">Visible on Navbar ?</label>
								<select class="form-control" name="show_navbar" id="show_navbar">
									<option value="1" {{ $category->show_navbar ? 'selected' : '' }}>Yes</option>
									<option value="0" {{ ! $category->show_navbar ? 'selected' : '' }}>No</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="navbar_priority">Navbar Priority</label>
								<input type="number" min="1" value="{{ $category->navbar_priority }}" class="form-control" name="navbar_priority" id="navbar_priority" placeholder="Enter Priority for Nav bar display">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="show_homepage">Visible on Homepage ?</label>
								<select class="form-control" name="show_homepage" id="show_homepage">
									<option value="1" {{ $category->show_homepage ? 'selected' : '' }}>Yes</option>
									<option value="0" {{ ! $category->show_homepage ? 'selected' : '' }}>No</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="homepage_priority">Homepage Priority</label>
								<input type="number" min="1" value="{{ $category->homepage_priority }}" class="form-control" name="homepage_priority" id="homepage_priority" placeholder="Enter Priority for homepage display">
							</div>
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

						<label for="image">Category New Image (optional)</label>

						<input type="file" class="form-control" name="image" id="image">
					</div>


					<button type="submit" class="btn btn-success">Update Category</button>
				</form>
			</div>
		</div>

	</div>
</div>
<!-- main-panel ends -->
@endsection