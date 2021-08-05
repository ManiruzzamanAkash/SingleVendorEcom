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
						<label for="title">Title</label>
						<input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" placeholder="Enter product Title" value="{{ old('title') }}">
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="occation">Occation / #tag / Announcement</label>
								<input type="text" class="form-control" value="{{ old('occation') }}" name="occation" id="occation" aria-describedby="emailHelp" placeholder="Enter product Occation / #tag / Announcement">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="slogan">Slogan</label>
								<input type="text" class="form-control" name="slogan" value="{{ old('slogan') }}" id="slogan" aria-describedby="emailHelp" placeholder="Enter product Slogan">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="delivery_time">Delivery Time (In minutes)</label>
								<input type="number" min="3600" class="form-control" name="delivery_time" value="{{ empty(old('delivery_time')) ? 3600 : old('delivery_time') }}" id="delivery_time" aria-describedby="emailHelp" placeholder="Enter product Delivery deadline">
								<p class="text-info">
									<i class="fa fa-info-circle"></i> It would be the delivery time in minutes
								</p>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputPassword1">Description</label>
						<textarea  name="description" id="summernote" ></textarea>
						
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label for="price">Price</label>
								<input type="number" class="form-control" name="price" value="{{ old('price') }}" id="price">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="discount">Discount Percentage</label>
								<input type="number" class="form-control" name="discount" value="{{ old('discount') }}" id="discount">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="quantity">Quantity</label>
								<input type="number" class="form-control" name="quantity" value="{{ old('quantity') }}" id="quantity">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="warranty">Warranty(0=no warr,1=W.ava,2=noGur,3=G.ava)</label>
								<input type="text" class="form-control" name="warranty" value="{{ old('warranty') }}" id="warranty">
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

					<button type="submit" class="btn btn-primary">Ad Product</button>
				</form>
			</div>
		</div>

	</div>
</div>
<!-- main-panel ends -->
@endsection

@section('scripts')

<script>
	$('#summernote').summernote({
	  placeholder: 'Write a short description',
	  tabsize: 2,
	  height: 120,
	  toolbar: [
		['style', ['style']],
		['font', ['bold', 'underline', 'clear']],
		['color', ['color']],
		['para', ['ul', 'ol', 'paragraph']],
		['table', ['table']],
		['insert', ['link', 'picture', 'video']],
		['view', ['fullscreen', 'codeview', 'help']]
	  ]
	});
  </script>

@endsection
