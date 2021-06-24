@extends('backend.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Edit Coupon
        </div>
        <div class="card-body">
          <form action="{{ route('admin.coupon.update', $coupon->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('backend.partials.messages')
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="title">Coupon Title</label>
                  <input type="text" class="form-control" name="title" id="title" placeholder="Enter Coupon Title, e.g- Bijoy Dibosh Coupon" value="{{ $coupon->title }}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="code">Coupon Code</label>
                  <input type="text" class="form-control" name="code" id="code" placeholder="Enter Coupon Code Text, e.g- Bijoy16" value="{{ $coupon->code }}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="is_order_discount">Discount Type</label>
                  <select name="is_order_discount" id="is_order_discount" class="form-control">
                    <option value="1" {{ $coupon->is_order_discount == 1 ? 'selected' : ''}}>Order Discount</option>
                    <option value="0" {{ $coupon->is_order_discount == 0 ? 'selected' : ''}}>Item Discount</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="direct_amount_or_percentage">Discount By</label>
                  <select name="direct_amount_or_percentage" id="direct_amount_or_percentage" class="form-control">
                    <option value="1" {{ $coupon->direct_amount_or_percentage == 1 ? 'selected' : ''}}>Direct Amount</option>
                    <option value="0" {{ $coupon->direct_amount_or_percentage == 0 ? 'selected' : ''}}>%</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="criteria_amount">Discount Criteria Value</label>
                  <input type="number" class="form-control" name="criteria_amount" id="criteria_amount" placeholder="Enter Discount Criteria Value" value="{{ $coupon->criteria_amount }}">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="discount_amount">Discount Amount</label>
                  <input type="number" class="form-control" name="discount_amount" id="discount_amount" placeholder="Enter Discount Amount" value="{{ $coupon->discount_amount }}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                  <div class="form-group">
                      <label for="valid_date">Valid Upto</label>
                      <input type="date" class="form-control" name="valid_date" id="valid_date" value="{{ date('Y-m-d') }}" required value="{{ $coupon->valid_date }}">
                    </div>
              </div>
              <div class="col-md-3">
                  <div class="form-group">
                      <label for="total_quantity">Total Discount Quantity Open</label>
                      <input type="number" class="form-control" name="total_quantity" id="total_quantity" placeholder="Keep Empty to make unlimited" value="{{ $coupon->total_quantity }}">
                    </div>
              </div>
            </div>

            <div class="form-group">
              <label for="description">Coupon Description</label>
              <textarea name="description" id="description" rows="8" cols="80" class="form-control">{{ $coupon->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>  Update Coupon</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection
