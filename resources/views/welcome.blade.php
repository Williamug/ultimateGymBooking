<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'The Ultimate Gym') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('images/logo/logo.png') }}" rel='shortcut icon'>
    <!-- styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="">
        <div class="flex-center position-ref full-height content-welcome-page">
            {{-- <img src="{{ asset('/images/background-image.jpeg') }}" alt=""> --}}
            @if (Route::has('login'))
                <div class="top-right links link-nav">
                    @auth
                        {{-- <a href="{{ url('/home') }}">Dashboard</a> --}}
                        @if(auth()->user()->role->role == 'Super Admin')
                            <a href="{{ route('super-dashboard') }}" class="nav-link">Dashboard</a>
                        @elseif(auth()->user()->role->role == 'Admin')
                            <a href="{{ route('home') }}" class="nav-link">Dashboard</a>
                        @elseif(auth()->user()->role->role == 'Accountant')
                            <a href="{{ route('Accountant-dashboard') }}" class="nav-link">Dashboard</a>
                        @elseif(auth()->user()->role->role == 'Instructor')
                            <a href="{{ route('instructor-dashboard') }}" class="nav-link">Dashboard</a>
                        @elseif(auth()->user()->role->role == 'Client')
                            <a href="{{ route('clients-dashboard') }}" class="nav-link">Dashboard</a>
                        @endif
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="first-title">
                    Welcome to
                </div>
                <div class="title m-b-md">
                    {{ $setting->company_name }}
                </div>
            </div>
        </div>
    </body>
</html>
