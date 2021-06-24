@extends('frontend.layouts.master')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/app/auth/auth.css') }}?v=1.0.3">
<style>
.alert-danger p {
    color: #721c24!important;
}
</style>
@endsection

@section('content')
<div class="container content-holder">
    @if (Session::has('checkout_error'))
        <div class="row justified-content-center">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="alert alert-danger">
                    <p>{{ Session::get('checkout_error') }}</p>
                </div>
            </div>
        </div>
    @endif
    <div class="login-area">
        <div class="logo">
            <a href="{{ route('index') }}"><img src="{{ asset('public/assets/images/logo.png') }}"></a>
        </div>
        <div class="titleArea">
            Login to your account
        </div>
    <login-user url="{{ url('/') }}"></login-user>
    </div>
</div>
@include('auth.partials.footer')

@endsection
