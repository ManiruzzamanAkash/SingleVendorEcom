@extends('frontend.layouts.master')
@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/app/search.css') }}?v1.0.2">
@endsection
@section('content')

<!-- Start Sidebar + Content -->
<div class='container content-holder'>
    <div class="titleArea">
        <div>
            <h6 class="text-success pull-left">
                Showing search results for "{{ $search }}"
                <br />
                You can also search from Category
            </h6>
            <h6 class="pull-right">
                @php
                    $offers = [0, 10, 20, 30, 40, 50, 70, 80, 100];
                @endphp
                Offers: 
                @foreach ($offers as $offer)
                    <a class="btn btn-sm btn{{ request()->offer == $offer  ? '' : '-outline'}}-info" href="{{ route('search') }}?search={{ request()->search }}&offer={{ $offer }}">{{ $offer }}%</a>
                @endforeach
            </h6>
            <div class="clearfix"></div>
        </div>
    </div>
    
    @if ($products->count() > 0)
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