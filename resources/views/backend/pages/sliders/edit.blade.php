@extends('backend.layouts.master')

@section('content')
<div class="main-panel">
	<div class="content-wrapper">

		<div class="card">
			<div class="card-header">
				Edit Sliders
			</div>
			<div class="card-body">
				<form action="{!! route('admin.slider.update', $slider->id) !!}" method="post" enctype="multipart/form-data">

					{{ csrf_field() }}
					<div class="form-group">
						<label for="title">Slider Title <small class="text-danger">(required)</small></label>
						<input type="text" class="form-control" name="title" id="title" placeholder="Slider Title" required value="{{ $slider->title }}">
					</div>

					<div class="form-group">
						<label for="description">Slider Description <small class="text-danger">(required)</small></label>
						<textarea rows="3" class="form-control" name="description" id="summernote" placeholder="Slider description" required>{{ $slider->description }}</textarea>
					</div>

					<div class="form-group">
						<label for="image">Slider Image
							<a href="{{ asset('images/sliders/'.$slider->image) }}" target="_blank">
								Previous Image
							</a>

							<small class="text-danger">(required)</small></label>
						<input type="file" class="form-control" name="image" id="image" placeholder="Slider Image">
					</div>

					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label for="button_text">Slider Button Text <small class="text-info">(optional)</small></label>
								<input type="text" class="form-control" name="button_text" id="button_text" placeholder="Slider Button Text (if need)" value="{{ $slider->button_text }}">
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="button_link">Slider Button Link <small class="text-info">(optional)</small></label>
								<input type="text" class="form-control" name="button_link" id="button_link" placeholder="Slider Button Text (if need)" value="{{ $slider->button_link }}">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label for="button_text">Slider Button Text 2 <small class="text-info">(optional)</small></label>
								<input type="text" class="form-control" name="button_text2" id="button_text" placeholder="Slider Button Text (if need)" value="{{ $slider->button_text2 }}">
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="button_link">Slider Button Link 2 <small class="text-info">(optional)</small></label>
								<input type="text" class="form-control" name="button_link2" id="button_link" placeholder="Slider Button Text (if need)" value="{{ $slider->button_link2 }}">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label for="priority">Slider Priority <small class="text-info">(required)</small></label>
								<input type="number" class="form-control" name="priority" id="priority" placeholder="Slider Priority; e.g: 10" required value="{{ $slider->priority }}">
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label for="button_link">Slider Status <small class="text-info"></small></label>
								<select class="form-control" name="status" >
									<option value="1" {{ $slider->status==1 ? 'selected' : '' }} >Yes</option>
									<option value="0" {{ $slider->status==0 ? 'selected' : '' }} >No</option>
								</select>
							</div>
						</div>
					</div>

					<button type="submit" class="btn btn-success">Update</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

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