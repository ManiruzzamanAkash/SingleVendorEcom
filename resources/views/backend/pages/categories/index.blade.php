@extends('backend.layouts.master')

@section('content')
<div class="main-panel">
	<div class="content-wrapper">

		<div class="card">
			<div class="card-header">
				<h2 class="float-left">
					Manage Categories
				</h2>
				<p class="float-right">
					<a href="{{ route('admin.category.create') }}" class="btn btn-primary">Add New Category</a>
				</p>
				<div class="clearfix"></div>
			</div>
			<div class="card-body">
				@include('backend.partials.messages')
				<div class="table-responsive product-table">
					<table class="table table-striped table-bordered display ajax_view"  id="category_table">
					  <thead>
						<tr>
						  <th>#SL</th>
						  <th>Category Name</th>
						  <th>Category Image</th>
						  <th>Visible Homepage</th>
						  <th>Homepage Priority</th>
						  <th>Visble Navbar</th>
						  <th>Navbar Priority</th>
						  <th>Status</th>
						  <th>Parent Category</th>
						  <th>Action</th>
						</tr>
					  </thead>
					</table>
				</div>
			</div>
		</div>

	</div>
</div>
<!-- main-panel ends -->
@endsection

@section('scripts')
<script>
	const ajaxURL = "<?php echo Route::is('admin/categories') ?>";
	$('table#category_table').DataTable({
		dom: 'Blfrtip',
		language: {processing: "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Loading Data..."},
		processing: true,
		serverSide: true,
		ajax: {url: ajaxURL},
		aLengthMenu: [[25, 50, 100, 1000, -1], [25, 50, 100, 1000, "All"]],
		buttons: ['excel', 'pdf', 'print'],
		columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex'},
			{data: 'name', name: 'name'},
			{data: 'image', name: 'image'},
			{data: 'show_homepage', name: 'show_homepage'},
			{data: 'homepage_priority', name: 'homepage_priority'},
			{data: 'show_navbar', name: 'show_navbar'},
			{data: 'navbar_priority', name: 'navbar_priority'},
			{data: 'status', name: 'status'},
			{data: 'parent_id', name: 'parent_id'},
			{data: 'action', name: 'action'}
		]
	});
  </script>
  
  @endsection



{{-- @extends('backend.layouts.master')

@section('content')
<div class="main-panel">
	<div class="content-wrapper">

		<div class="card">
			<div class="card-header">
				<h2 class="float-left">
					Manage Categories
				</h2>
				<p class="float-right">
					<a href="{{ route('admin.category.create') }}" class="btn btn-primary">Add New Category</a>
				</p>
				<div class="clearfix"></div>
			</div>
			<div class="card-body">
				@include('backend.partials.messages')
				<table class="table table-hover table-striped">
					<tr>
						<th>#</th>
						<th>Category Name</th>
						<th>Category Image</th>
						<th>Category Link</th>
						<th>Parent Category</th>
						<th>Action</th>
					</tr>

					@foreach ($categories as $category)
					<tr>
						<td>#</td>
						<td>{{ $category->name }}</td>
						<td>
							<img src="{!! asset('images/categories/'.$category->image) !!}" width="100">
						</td>
						<td>
							<a href="{{ route('categories.show', $category->slug) }}" target="_blank">
								{{ $category->name }}
							</a>
						</td>
						<td>
							@if ($category->parent_id == NULL)
							Primary Category
							@else
							{{ $category->parent->name }}
							@endif
						</td>
						<td>
							<a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-success">Edit</a>

							<a href="#deleteModal{{ $category->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

							<!-- Delete Modal -->
							<div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form action="{!! route('admin.category.delete', $category->id) !!}" method="post">
												{{ csrf_field() }}
												<button type="submit" class="btn btn-danger">Permanent Delete</button>
											</form>

										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
										</div>
									</div>
								</div>
							</div>

						</td>
					</tr>
					@endforeach

				</table>
			</div>
		</div>

	</div>
</div>
<!-- main-panel ends -->
@endsection --}}