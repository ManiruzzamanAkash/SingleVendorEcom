@extends('frontend.layouts.master')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/app//auth/auth.css') }}{{-- ?v=1.0.3 --}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/app//auth/reset.css') }}{{-- ?v=1.0.3 --}}">
@endsection

@section('content')
  <div class="container content-holder">
    <div class="register-form-area">
      <register-user url="{{ url('/') }}"></register-user>
    </div>
  </div>
@include('auth.partials.footer')
@endsection
