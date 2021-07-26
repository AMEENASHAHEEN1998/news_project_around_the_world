<!-- Title -->
<title>@yield("title")</title>

<!-- Favicon -->
<link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon" />

<!-- Font -->
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">
@yield('css')
<!--- Style css -->
<link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{URL::asset('assets/website/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('assets/website/css/font-awesome.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('assets/website/css/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('assets/website/css/li-scroller.css') }}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('assets/website/css/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('assets/website/css/theme.css') }}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('assets/website/css/style.css') }}">

<link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet">

<script src="{{URL::asset('assets/js/html5shiv.min.js')}}"></script>
<script src="{{URL::asset('assets/js/respond.min.js')}}"></script>

<!--- Style css -->
{{-- @if (App::isLocale('ar'))

<style>
    body{
        direction : rtl;
        text-align : right;
    }

</style>
@endif --}}
<!--- Style css -->
@if (App::getLocale() == 'en')
    <link href="{{ URL::asset('assets/css/ltr.css') }}" rel="stylesheet">
@else
    <link href="{{ URL::asset('assets/css/rtl.css') }}" rel="stylesheet">
@endif

