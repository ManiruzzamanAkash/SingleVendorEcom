@extends('backend.layouts.master')

@section('stylesheets')
  <style>
    .count-div {
        text-align: center;
        border: 5px solid #58d8a3;
        line-height: 25px;
        color: #28a745;
        font-weight: bold;
    }
    .product-count {
        font-size: 50px;
        font-weight: 600;
        color: #16aaf3;
    }
  </style>
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
  <div class="row">
      <div class="col-md-4">
          <div class="card card-body count-div">
              <span class="product-count">{{ $total_products }}</span>
              <br>
              Total Products
          </div>
      </div>

      <div class="col-md-5">
          <div class="card card-body count-div">
              <span class="product-count">{{ $total_price }} ৳</span>
              <br>
              Total Price
          </div>
      </div>
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
        <table class="table table-hover table-striped"  id="dataTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Product Code</th>
              <th>Product Title</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            @foreach ($products as $product)
            <tr>
              <td>{{ $loop->index+1 }}</td>
              <td>#PLE{{ $product->id }}</td>
              <td>{{ $product->title }}</td>
              <td>{{ $product->price }}</td>
              <td>{{ $product->quantity }}</td>
              <td>
                <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-success">Edit</a>
                <a href="#deleteModal{{ $product->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Are sure to delete?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{!! route('admin.product.delete', $product->id) !!}"  method="post">
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

          <tfoot>
            <tr>
              <th>#</th>
              <th>Product Code</th>
              <th>Product Title</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Action</th>
            </tr>
          </tfoot>

        </table>
      </div>
    </div>

  </div>
</div>
<!-- main-panel ends -->
@endsection
