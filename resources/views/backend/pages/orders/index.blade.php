@extends('backend.layouts.master')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">

            <div class="card">
                <div class="card-header">
                    Manage Orders
                </div>
                <div class="card-body">
                    @include('backend.partials.messages')
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered display ajax_view" id="order_table">
                            <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Orderer Name</th>
                                    <th>Contact No</th>
                                    <th>Date</th>
                                    <th>Total Amount</th>
                                    <th>Discount/Shipping Charge</th>
                                    <th>Order Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            </tbody>

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
        const ajaxURL = "<?php echo Route::is('admin/orders'); ?>";
        $('table#order_table').DataTable({
            dom: 'Blfrtip',
            language: {
                processing: "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Loading Data..."
            },
            processing: true,
            serverSide: true,
            ajax: {
                url: ajaxURL
            },
            aLengthMenu: [
                [25, 50, 100, 1000, -1],
                [25, 50, 100, 1000, "All"]
            ],
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'phone_no',
                    name: 'phone_no'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'message',
                    name: 'message'
                },
                {
                    data: 'custom_discount',
                    name: 'custom_discount'
                },
                {
                    data: 'is_paid',
                    name: 'is_paid'
                },

                {
                    data: 'action',
                    name: 'action'
                }
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
        Manage Orders
      </div>
      <div class="card-body">
        @include('backend.partials.messages')
        <div class="table-responsive">
          <table class="table table-hover table-striped" id="dataTable">
            <thead>
              <tr>
                <th>#</th>
                <th>Order ID</th>
                <th>Orderer Name</th>
                <th>Contact No</th>
                <th>Date</th>
                <th>Total Amount</th>
                <th>Discount/Shipping Charge</th>
                <th>Subtotal</th>
                <th>Order Status</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($orders as $order)
              <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>#LE{{ $order->id }}</td>
                <td>{{ $order->name }}</td>
                <td>{{ $order->phone_no }}</td>
                <td>{{ $order->created_at }}
                  <br> ({{ $order->created_at->diffForHumans() }})
                </td>
                <td>
                  <strong class="text-info"> {{ $order->total_amounts() }} ৳</strong>
                </td>
                <td>
                  (-) {{ $order->custom_discount }} ৳
                  <br>
                  (+) {{ $order->shipping_charge }} ৳
                </td>
                <td>
                  <strong class="text-danger">
                    {{ $order->total_amounts() - $order->custom_discount +  $order->shipping_charge }} ৳
                  </strong>
                </td>
                <td>
                  <p>
                    @if ($order->is_seen_by_admin)
                    <button type="button" class="btn btn-success btn-sm">Seen</button>
                    @else
                    <button type="button" class="btn btn-warning btn-sm">Unseen</button>
                    @endif
                  </p>

                  <p>
                    @if ($order->is_completed)
                    <button type="button" class="btn btn-success btn-sm">Completed</button>
                    @else
                    <button type="button" class="btn btn-warning btn-sm">Not Completed</button>
                    @endif
                  </p>

                  <p>
                    @if ($order->is_paid)
                    <button type="button" class="btn btn-success btn-sm">Paid</button>
                    @else
                    <button type="button" class="btn btn-danger btn-sm">Unpaid</button>
                    @endif
                  </p>
                  <p>
                    @if ($order->is_paid) 
                    <button type="button" class="btn btn-success btn-sm">Delivery Compleate</button> 
                     @else
                    <button type="button" class="btn btn-danger btn-sm">Delivery Pending</button>
                     @endif
                  </p>
                </td>
                <td>


                  <a href="{{ route('admin.order.show', $order->id) }}" class="btn btn-info">View Order</a>

                  <a href="#deleteModal{{ $order->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                  <!-- Delete Modal -->
                  <div class="modal fade" id="deleteModal{{ $order->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.order.delete', $order->id) !!}" method="post">
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

            <tfoot>
              <tr>
                <th>#</th>
                <th>Order ID</th>
                <th>Orderer Name</th>
                <th>Orderer Phone No</th>
                <th>Order Status</th>
                <th>Action</th>
              </tr>
            </tfoot>


            </tbody>

          </table>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- main-panel ends -->
@endsection --}}
