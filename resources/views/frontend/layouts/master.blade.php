<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    {{-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Multimart | Best Ecommerce Mega Store Html Template">
    <meta name="keywords" content="Multimart | Best Ecommerce Mega Store Html Template">
    <meta name="author" content="Multimart | Best Ecommerce Mega Store Html Template">
    <link rel="icon" href="public/assets/images/favicon/favicon.png" type="image/x-icon" />
    <link rel="shortcut icon" href="public/assets/images/favicon/favicon.png" type="image/x-icon" />
    <title>
        @yield('title', config('app.name'))
    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('frontend.partials.styles')
    @yield('stylesheets')
</head>

<body>
    <div id="app">
        @if ($settings->website->theme->base_theme === 'light')
			@include('frontend.partials.nav_light_theme')
		@else
        	@include('frontend.partials.topbar')
            @include('frontend.partials.nav')
        @endif

        @yield('content')
        @include('frontend.partials.footer')
    </div>

    @include('frontend.partials.scripts')
    @yield('scripts')
    
</body>

</html>
