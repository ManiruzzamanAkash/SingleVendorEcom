@extends('frontend.layouts.master')
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/app/dashboard/dashboard.css') }}{{-- ?v=1.0.2 --}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/app/dashboard/profile.css') }}{{-- ?v=1.0.2 --}}">
@endsection

@section('content')
<div class="container content-holder">
  <div class="contents">
    @include('frontend.pages.users.partials')
    <div class="right-side-area">
      {{-- <h2>Welcome {{ $user->first_name . ' '. $user->last_name }}</h2>
      <p>You can change your profile and every informations here..</p>
      <hr> --}}
       <div class="title-area">
      <div class="titleName">
        Your Profile Information
      </div>
      <div class="verified">
       <i class="fa fa-check" aria-hidden="true"></i> Account verified
      </div>
    </div>
    <div class="information-area">
      <div class="heading text-success">
          Your registered name.
      </div>
      <div class="profile-information">
        <div class="info-title">
          Name :
        </div>
        <div class="info-content">
          {{ $user->first_name }}
        </div>
      </div>
      <div class="profile-information">
        <div class="info-title">
          Username :
        </div>
        <div class="info-content">
          {{ $user->first_name . ' '. $user->last_name }}
        </div>
      </div>
    </div>

    <div class="information-area">
      <div class="heading text-info">
          Your contact information.
      </div>
      <div class="profile-information">
        <div class="info-title">
          Email :
        </div>
        <div class="info-content">
          {{ $user->email }}
        </div>
      </div>
      <div class="profile-information">
        <div class="info-title">
          Number :
        </div>
        <div class="info-content">
          {{ $user->phone_no }}
        </div>
      </div>
    </div>

    <div class="information-area">
      <div class="heading text-danger">
          Your address & privacy.
      </div>
      <div class="profile-information">
        <div class="info-title">
          Address :
        </div>
        <div class="info-content">
          {{ $user->street_address }}
        </div>
      </div>
      <div class="profile-information">
        <div class="info-title">
          Password :
        </div>
        <div class="info-content">
          *********
        </div>
      </div>
    </div>
    </div>
  </div>
  
</div>
    
@endsection
