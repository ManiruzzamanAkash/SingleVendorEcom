@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          <h2 class="float-left">
            Manage Coupons
          </h2>
          <p class="float-right">
            <a href="{{ route('admin.coupon.create') }}" class="btn btn-primary">Add New Coupon</a>
          </p>
          <div class="clearfix"></div>
        </div>
        <div class="card-body">
            @include('backend.partials.messages')
          <table class="table table-hover table-striped"  id="dataTable">
            <thead>
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Code</th>
                <th>Discount Type</th>
                <th>Criteria Amount</th>
                <th>Discount</th>
                <th>Valid Upto</th>
                <th>Total available</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($coupons as $coupon)
              <tr>
                <td>#</td>
                <td>{{ $coupon->title }}</td>
                <td>{{ $coupon->code }}</td>
                <td>
                  @if ($coupon->is_order_discount)
                      <span class="badge badge-success">
                        Order Discount
                      </span>
                  @else
                      <span class="badge badge-info">
                        Item Discount
                      </span>
                  @endif
                </td>
                <td>{{ $coupon->criteria_amount }}</td>
                <td> 
                {{ $coupon->discount_amount }}  
                @if ($coupon->direct_amount_or_percentage)
                  Taka
                @else
                    %
                @endif
                </td>
                <td>{{ $coupon->valid_date }}</td>
                <td> {{ $coupon->total_quantity }} </td>

                <td>
                  <a href="{{ route('admin.coupon.edit', $coupon->id) }}" class="btn btn-success btn-sm btn-icon"><i class="fa fa-edit"></i></a>

                  <a href="#deleteModal{{ $coupon->id }}" data-toggle="modal" class="btn btn-danger btn-sm btn-icon"><i class="fa fa-trash"></i></a>

                  <!-- Delete Modal -->
                  <div class="modal fade" id="deleteModal{{ $coupon->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{!! route('admin.coupon.delete', $coupon->id) !!}"  method="post">
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
            </tbody>

            

          </table>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection
