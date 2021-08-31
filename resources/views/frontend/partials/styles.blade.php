{{-- <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>

<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/bootstrap.min.css"/>

<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}?ver=1.1">
--}}


<!--Google font-->
{{-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800,800i" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Heebo:100,300,400,500,700,800,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Arizonia" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,300i,400,400i,500,500i,600,700,800,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700" rel="stylesheet"> --}}
<link href="https://fonts.googleapis.com/css?family=Roboto:400,500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500&display=swap" rel="stylesheet">
<!-- Fontawesome -->
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/font-awesome.css') }}"> --}}
<link rel="stylesheet" type="text/css"
    href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Slick css -->
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/slick-theme.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/slick.css') }}">

<!-- Flaticon icon -->
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/flaticon.css') }}">

<!-- Themify icon -->
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/themify.css') }}">

<!-- Animate icon -->
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/animate.css') }}">

<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/bootstrap.css') }}">

<!-- Color CSS -->
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/style8.css') }}?v1.0.2"> --}}

<!-- Search -->
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/app/search.css') }}?v={{ config('constants.asset_version') }}">

<!-- Custom CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/custom.css') }}?v={{ config('constants.asset_version') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/app/header.css') }}?v={{ config('constants.asset_version') }}">

<!-- Owl Carousel CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/owl.carousel.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/owl.theme.default.min.css') }}">

<!-- Responsive CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/responsive.css') }}?v={{ config('constants.asset_version') }}">

{{-- Font Awesome CSS --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
<style>
    .addToCart{
        background-color: {{ $settings->website->theme->color->cartbtn }} !important;
    }
    #footer, .copyright {
        background-color: {{ $settings->website->theme->color->footer }} !important;
    }
    .btn-primary {
        background-color: {{ $settings->website->theme->color->cartbtn }} !important;
        border-color    : {{ $settings->website->theme->color->cartbtn }} !important;
    }
</style>

<style>
    media only screen and (min-width:0px) and (max-width:767px){
    	span.sign-in-text {
    		display: none;
    	}
    	.logo-area img {
    		width: 57px!important;
    	}
    }

    @media only screen  and (min-width:0px) and (max-width: 767px){
    	span.sign-in-text {
    		display: none!important;
    	}
    	.logo-area img {
    		width: 57px!important;
    	}
    }
</style>

