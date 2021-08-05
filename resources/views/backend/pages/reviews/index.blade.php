@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          <h2 class="float-left">
            Manage Reviews
          </h2>
          <div class="clearfix"></div>
        </div>
        <div class="card-body">
            @include('backend.partials.messages')
          <table class="table table-hover table-striped"  id="review_Table">
            <thead>
              <tr>
                <th>#</th>
                <th>User</th>
                <th>Message</th>
                <th>Approved</th>
                <th>Reviewd at</th>
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
  const ajaxURL = "<?php echo Route::is('admin/reviews') ?>";
  $('table#review_Table').DataTable({
      dom: 'Blfrtip',
      language: {processing: "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Loading Data..."},
      processing: true,
      serverSide: true,
      ajax: {url: ajaxURL},
      aLengthMenu: [[25, 50, 100, 1000, -1], [25, 50, 100, 1000, "All"]],
      buttons: ['copy', 'csv','excel', 'pdf', 'print'],
      columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'user_id', name: 'user_id'},
          {data: 'description', name: 'description'},
          {data: 'is_approved', name: 'is_approved'},
          {data: 'created_at', name: 'created_at'},
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
            Manage Reviews
          </h2>
          <div class="clearfix"></div>
        </div>
        <div class="card-body">
            @include('backend.partials.messages')
          <table class="table table-hover table-striped"  id="dataTable">
            <thead>
              <tr>
                <th>#</th>
                <th>User</th>
                <th>Message</th>
                <th>Approved</th>
                <th>Reviewd at</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($reviews as $review)
              <tr>
                <td>#</td>
                <td>
                    {{ $review->user->first_name. ' '.$review->user->last_name }}
                    <br>
                    ({{ $review->user->email }})
                </td>

                <td>{{ $review->description }}</td>
                <td>
                  @if ($review->is_approved)
                      <span class="badge badge-success">
                        Approved
                      </span>
                  @else
                      <span class="badge badge-danger">
                        Not Approved
                      </span>
                  @endif
                </td>
                <td>{{ $review->created_at }}</td>
                
                <td>
                        
                  <a href="#approveModal{{ $review->id }}" data-toggle="modal" class="btn btn-info btn-sm btn-icon"><i class="fa fa-check"></i></a>
                  <a href="#deleteModal{{ $review->id }}" data-toggle="modal" class="btn btn-danger btn-sm btn-icon"><i class="fa fa-trash"></i></a>

                  <!-- Delete Modal -->
                  <div class="modal fade" id="deleteModal{{ $review->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.review.delete', $review->id) !!}"  method="post">
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

                  <!-- Approve Modal -->
                  <div class="modal fade" id="approveModal{{ $review->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to change approve status ?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.review.approve', $review->id) !!}"  method="post">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-success">Change Now</button>
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
            </tbody>

            

          </table>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection --}}
