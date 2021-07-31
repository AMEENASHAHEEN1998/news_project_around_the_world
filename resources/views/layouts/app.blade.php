<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>Around The World</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Favicon -->
<link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon" />

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/website/css/font-awesome.min.css') }}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- {{-- <!-- Font Icon --> --}}
    <link rel="stylesheet" href="{{ asset('assets/login/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('assets/login/style.css') }}">
    <!--- Style css -->
    <style>
        .auth{
            color: white;
            background-color: #000;
        }
    </style>
@if (App::getLocale() == 'en')
<link href="{{ URL::asset('assets/css/ltr.css') }}" rel="stylesheet">
@else
<link href="{{ URL::asset('assets/css/rtl.css') }}" rel="stylesheet">
@endif
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md ">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                    {{ trans('auth.title') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item {{ (request()->routeIs('login')) ? 'auth' : '' }}">
                                <a class="nav-link" href="{{ route('login') }}">{{ trans('auth.login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item {{ (request()->routeIs('register')) ? 'auth' : '' }}">
                                    <a class="nav-link" href="{{ route('register') }}">{{ trans('auth.register')}}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <!-- JS -->
    <script src="{{ asset('assets/login/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/login/main.js') }}"></script>
    </div>
</body>
</html>
