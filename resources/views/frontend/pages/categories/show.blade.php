@extends('frontend.layouts.master')

@section('stylesheets')
<style type="text/css">
	.titleArea {
		text-align: center;
		font-size: 24px;
	}
	.empty-logo {
		margin-top: 6%;
	}
	.empty-holder {
		height: 330px;
	}
</style>
@endsection

@section('content')

<!-- Start Sidebar + Content -->
<div class='container content-holder'>
	@php 
		$query = $category->products(); 
		$offers = [0, 10, 20, 30, 40, 50, 70, 80, 100]; 
		if (request()->offer) {
			$query->where('discount', '>=', request()->offer);
		}
		$products = $query->paginate(20);
	@endphp

	<div class="titleArea cateTitle" style="text-align: left">
		<div class="pull-left">
			{{ $category->name }}
			<p><small>{{ $category->slogan }}</small></p>
		</div>
		<div class="pull-right">
			Offers: 
			@foreach ($offers as $offer)
				<a class="btn btn-sm btn{{ request()->offer == $offer  ? '' : '-outline'}}-info" href="{{ route('categories.show', $category->slug) }}?offer={{ $offer }}">{{ $offer }}%</a>
			@endforeach
		</div>
        <div class="clearfix"></div>
	</div>

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
@endif
</div>

<!-- End Sidebar + Content -->
@endsection