@extends('frontend.layouts.master')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/app/dashboard/dashboard.css') }}{{-- ?v=1.0.2 --}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/app/dashboard/accsetting.css') }}?v=1.0.2">
@endsection

@section('content')
<div class="container">
  <div class="contents row">
    @include('frontend.pages.users.partials')
    <div class="right-side-area col-md-8">
     <div class="mainContent">
      <div class="title-area">
        Edit Information
        <h6>You can edit or change information anytime. </h6>
      </div>
      <form method="POST" action="{{ route('user.profile.update') }}">
        @csrf
      <div class="sec-divider">
          <div class="section">
          <label for="first_name" class="sec-name">Username</label>

            <div class="sec-content">
              <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ $user->username }}" required autofocus>

            @if ($errors->has('username'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('username') }}</strong>
              </span>
            @endif
            </div>
        </div>
        <div class="section">
          <label for="first_name" class="sec-name">First Name</label>

            <div class="sec-content">
              <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ $user->first_name }}" required autofocus>

              @if ($errors->has('first_name'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('first_name') }}</strong>
                </span>
              @endif
            </div>
        </div>
        <div class="section">
          <label for="first_name" class="sec-name">Last Name</label>

            <div class="sec-content">
              <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ $user->last_name }}" required autofocus>

            @if ($errors->has('last_name'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('last_name') }}</strong>
              </span>
            @endif
            </div>
        </div>
      </div>
      <div class="sec-divider">
        <div class="section">
          <label for="first_name" class="sec-name">Email</label>

            <div class="sec-content">
              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

            @if ($errors->has('email'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
            @endif
            </div>
        </div>
        <div class="section">
          <label for="first_name" class="sec-name">Phone no</label>

            <div class="sec-content">
              <input id="phone_no" type="text" class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" name="phone_no" value="{{ $user->phone_no }}" required>

            @if ($errors->has('phone_no'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('phone_no') }}</strong>
              </span>
            @endif
            </div>
        </div>
      </div>
      <div class="sec-divider">
        <div class="section">
          <label for="first_name" class="sec-name">Divisions</label>
            <div class="sec-content">
              <select class="form-control" name="division_id">
              <option value="">Please select your division</option>
              @foreach ($divisions as $division)
                <option value="{{ $division->id }}" {{ $user->division_id == $division->id ? 'selected' : '' }}>{{ $division->name }}</option>
              @endforeach
            </select>
            </div>
        </div>
        <div class="section">
          <label for="first_name" class="sec-name">Districts</label>
            <div class="sec-content">
              <select class="form-control" name="district_id">
              <option value="">Please select your district</option>
              @foreach ($districts as $district)
                <option value="{{ $district->id }}" {{ $user->district_id == $district->id ? 'selected' : '' }}>{{ $district->name }}</option>
              @endforeach
            </select>
            </div>
        </div>
      </div>
      <div class="sec-divider">
        <div class="section">
          <label for="first_name" class="sec-name">Home Address</label>
            <div class="sec-content">
              <textarea id="street_address" type="text" class="form-control{{ $errors->has('street_address') ? ' is-invalid' : '' }}" rows="4" name="street_address" required>{{ $user->street_address }}</textarea>

            @if ($errors->has('street_address'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('street_address') }}</strong>
              </span>
            @endif
            </div>
        </div>
        <div class="section">
          <label for="first_name" class="sec-name">Shipping Address (Optional)</label>
            <div class="sec-content">
              <textarea id="shipping_address" class="form-control{{ $errors->has('shipping_address') ? ' is-invalid' : '' }}" rows="4" name="shipping_address">{{ $user->shipping_address }}</textarea>

            @if ($errors->has('shipping_address'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('shipping_address') }}</strong>
              </span>
            @endif
            </div>
        </div>
      </div>
      <div class="sec-divider">
        <div class="section">
          <label for="first_name" class="sec-name">New Password (Optional)</label>
            <div class="sec-content">
              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

            @if ($errors->has('password'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
            @endif
            </div>
        </div>
      </div>
      <div class="sec-divider saveFooter">
        <button type="submit" class="saveData">
              Save
        </button>
      </div>    
  </form>
     </div>
    </div>
  </div>
</div>
@endsection
