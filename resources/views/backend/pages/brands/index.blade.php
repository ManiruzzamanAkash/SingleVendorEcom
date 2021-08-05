@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          <h2 class="float-left">
            Manage Brands
          </h2>
          <p class="float-right">
            <a href="{{ route('admin.brand.create') }}" class="btn btn-primary">Add New Brand</a>
          </p>
          <div class="clearfix"></div>
        </div>
        <div class="card-body">
            @include('backend.partials.messages')
            <table class="table table-striped table-bordered display ajax_view"  id="brand_table">
              <thead>
                <tr>
                  <th>#SL</th>
                  <th>Brand Name</th>
                  <th>Brand Image</th>
                  <th>Action</th>
                </tr>
              </thead>
            </table>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection

@section('scripts')
<script>
  const ajaxURL = "<?php echo Route::is('admin/brands') ?>";
  $('table#brand_table').DataTable({
      dom: 'Blfrtip',
      language: {processing: "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Loading Data..."},
      processing: true,
      serverSide: true,
      ajax: {url: ajaxURL},
      aLengthMenu: [[25, 50, 100, 1000, -1], [25, 50, 100, 1000, "All"]],
      buttons: ['copy', 'csv','excel', 'pdf', 'print'],
      columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'name', name: 'name'},
          {data: 'image', name: 'image'},
          {data: 'action', name: 'action'}
      ]
  });
</script>
@endsection
