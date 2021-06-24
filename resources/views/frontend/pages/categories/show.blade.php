@extends('frontend.layouts.master')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/app/search.css') }}{{-- ?v=1.0.2 --}}">
    <style type="text/css">
      .titleArea{
        text-align: center;
        font-size: 24px;
      }
      .empty-logo{
        margin-top: 6%;
      }
      .empty-holder{
        height: 330px;
      }
    </style>
@endsection

@section('content')

  <!-- Start Sidebar + Content -->
  <div class='container content-holder'>

          <div class="titleArea cateTitle">
            {{ $category->name }}
          </div>
          @php
          $products = $category->products()->paginate(9);
          @endphp

          @if ($products->count() > 0)
            @include('frontend.pages.product.partials.all_products')
          @else
  <div class="empty-holder">
    <div class="emptyContent">
        <div class="empty-logo">
            <i class="fa fa-list-ol" aria-hidden="true"></i>
        </div>
        <div class="empty-heading">
            <!-- looks like you have no items in your shopping cart. -->
            !! No items added in the Category yet !! 
        </div>
    </div>
  </div>
{{-- <div class="alert alert-warning">
    <p>
      <strong>Sorry !! No item in the Category !!</strong>
    </p>
    <p>
      <a href="{{ route('products') }}" class="btn btn-theme">View Products</a>
    </p>
  </div> --}}
          @endif
  </div>

  <!-- End Sidebar + Content -->
@endsection
