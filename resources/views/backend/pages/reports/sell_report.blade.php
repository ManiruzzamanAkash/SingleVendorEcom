@extends('backend.layouts.master')

@section('title')
  Sell Report
@stop

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          <h2 class="float-left">
            Sell Report
          </h2>
          <div class="clearfix"></div>
        </div>
        <div class="card-body">
            <div class="row">
              <form action="{{ route('admin.report.sell_report.search') }}" method="post">
                @csrf
                <div class="row">
                  
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="start_date">Start Date</label>
                          <input type="date" class="form-control" name="start_date" id="start_date" required>
                      </div>
                  </div>
                    
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="end_date">End Date</label>
                          <input type="date" class="form-control" name="end_date" id="end_date" required>
                      </div>
                  </div>
                    
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="">&nbsp;</label>
                        <button type="submit" class="btn btn-success btn-lg">
                          Search
                        </button>
                      </div>
                  </div>

                </div>

              </form>
              <br>
            </div>

            <div class="card card-body">
              @if (isset($searched))
                @if(count($orders) > 0)
                <table class="table table-hover table-striped" id="sell_report_datatable">
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
                      </tr>
                    </thead>
          
                    <tbody>
                      @foreach ($orders as $order)
                      <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>#LE{{ $order->id }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->phone_no }}</td>
                        <td>
                            {{ $order->created_at }}
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
                        
                      </tr>
                      @endforeach
        
                    </tbody>
          
                  </table>
                @else
                <div class="alert alert-info">
                  Sorry !! No data has found 
                </div>

                @endif
              @endif
            </div>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection

@section('scripts')

<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<script>
    $('#sell_report_datatable').DataTable( {
      dom: 'Bfrtip',
      buttons: [
          'print', 'copy', 'excel', 'pdf'
      ]
    });
</script>
@endsection
