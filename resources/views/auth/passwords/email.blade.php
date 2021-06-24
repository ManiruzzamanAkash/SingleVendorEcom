@extends('frontend.layouts.master')

@section('stylesheets')
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/app//auth/auth.css') }}?v=1.0.3">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/app//auth/forget.css') }}?v=1.0.3">
@endsection

@section('content')
    <div class="container content-holder">
        <div class="forget-area">
            <div class="logo">
                <a href="{{ route('index') }}"><img src="{{ asset('public/assets/images/logo.png') }}"></a>
            </div>
            <div class="titleArea">
                Forget Your Password
            </div>
            <form class="form-content" method="POST" action="{{ route('password.email') }}">
                <div class="confirm-notify">
                    @if (session('status'))
                        {{ session('status') }}
                    @endif
                </div>
                @csrf
                <div class="forget-text">
                    We'll email you a verification code you can<br>enter here to create a new password.
                </div>
                <div class="field">
                    <label for="email">Email address (required)</label>
                    <input id="email" type="email" class="control-label w-100 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="field login">
                       Remember my old password <a href="{{ route('login') }}">login</a> here!
                </div>
                <div class="field reginter">
                       I want a new account <a href="{{ route('register') }}">SignUp</a> here!
                </div>
                <div class="field">
                    <button type="submit" class="reset-btn">
                        Request Password Reset Link
                    </button>
                </div>
            </form>
        </div>
    </div>
    @include('auth.partials.footer')
@endsection
