@extends('frontend.layouts.master')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/app/cart.css') }}?v=1.0.2">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/app/cartNcheckout.css') }}?v1.0.2">
@endsection
@section('content')
<div class="container-fluid">
	<cart-items url="{{ url('/') }}"></cart-items>
</div>

@endsection
