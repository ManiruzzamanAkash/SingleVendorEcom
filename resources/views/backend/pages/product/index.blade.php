@extends('backend.layouts.master')

@section('stylesheets')
  
@endsection

@section('content')
<div class="main-panel">
  <div class="content-wrapper">
    @php
        $total_products = 0;
        $total_price = 0;
        foreach($products as $pr){
          $total_products += $pr->quantity;
          $total_price += $pr->quantity * $pr->price;
        }
    @endphp
  <div class="row ">
      <div class="col-md-4 ">
          <div class="card card-body text-white bg-success count-div">
              <span class="product-count">{{ $total_products }}</span>
              <br>
              Total Products
          </div>
      </div>

      <div class="col-md-4 ">
          <div class="card card-body text-white bg-info count-div">
              <span class="product-count">{{ $total_price }} ৳</span>
              <br>
              Total Price
          </div>
      </div>
      {{-- <div class="col-md-4">
        <div class="card card-body count-div">
            <span class="product-count">{{ $total_price }} ৳</span>
            <br>
            Total Price
        </div>
    </div> --}}
  </div>

    <div class="card">
      <div class="card-header">
        <h2 class="float-left">
          Manage Product
        </h2>
        <p class="float-right">
          <a href="{{ route('admin.product.create') }}" class="btn btn-primary">Add New Product</a>
        </p>
      </div>
      <div class="card-body">
        @include('backend.partials.messages')
        <div class="table-responsive product-table">
          <table class="table table-striped table-bordered display ajax_view"  id="products_table">
            <thead>
              <tr>
                <th>#SL</th>
                <th>title</th>
                <th>Product Image</th>
                <th>Price</th>
                <th>Offer Price & Discount</th>
                <th>Quantity</th>
                {{-- <th>Status</th> --}}
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
  const ajaxURL = "<?php echo Route::is('admin/products') ?>";
  $('table#products_table').DataTable({
      dom: 'Blfrtip',
      language: {processing: "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Loading Data..."},
      processing: true,
      serverSide: true,
      ajax: {url: ajaxURL},
      aLengthMenu: [[25, 50, 100, 1000, -1], [25, 50, 100, 1000, "All"]],
      buttons: ['copy', 'csv','excel', 'pdf', 'print'],
      columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'title', name: 'title'},
          {data: 'image', name: 'image'},
          {data: 'price', name: 'price'},
          {data: 'offer_price', name: 'offer_price'},
          {data: 'quantity', name: 'quantity'},
          // {data: 'status', name: 'status'},
          {data: 'action', name: 'action'}
      ]
  });
</script>

@endsection


