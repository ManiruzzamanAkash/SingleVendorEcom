@extends('frontend.layouts.master')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/app/search.css') }}?v1.0.2">
@endsection
@section('content')

  <!-- Start Sidebar + Content -->
  <div class='container content-holder'>


       @if ($products->count() > 0)
        <div class="titleArea">
          Showing search results for "{{ $search }}"
          <h6 class="text-success">You can also search from Category</h6>
        </div>

       
          @include('frontend.pages.product.partials.all_products')
        @else
            
<div class="empty-holder">
  <div class="notFound">
    Not found
  </div>
    <div class="emptyContent">
        <div class="empty-logo">
            <i class="fa fa-search" aria-hidden="true"></i>
        </div>
        <div class="empty-heading">
            <!-- looks like you have no items in your shopping cart. -->
            Oops there is no search results for "{{ $search }}" 
        </div>
        <div class="add-msg">
            <h6 class="text-success">You can also search from Category</h6>
        </div>
    </div>
</div>
        
        @endif



  </div>

  <!-- End Sidebar + Content -->
@endsection
