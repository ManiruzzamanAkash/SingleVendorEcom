@extends('frontend.layouts.master')
{{-- $brand --}}
@section('stylesheets')
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
            {{ $brand->name }}
          </div>
          @php
          $products = $brand->products()->paginate(9);
          @endphp

          @if ($products->count() > 0)
            @include('frontend.pages.product.partials.all_products')
          @else
<div class="empty-holder">
    <div class="emptyContent">
        <div class="empty-logo">
            <i class="fa fa-linode" aria-hidden="true"></i>
        </div>
        <div class="empty-heading">
            <!-- looks like you have no items in your shopping cart. -->
            !! No items added in the Brand yet !! 
        </div>
    </div>
</div>
    @endif
  </div>

  <!-- End Sidebar + Content -->
@endsection