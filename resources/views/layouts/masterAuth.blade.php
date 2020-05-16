<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="x-ua-compatible" content="ie=edge">

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>@yield('title') | {{ config('app.name', 'The Ultimate Gym') }} </title>

		<link href="{{ asset('images/logo/logo.png') }}" rel='shortcut icon'>
		<!-- styles -->
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
		@yield('styles')
	</head>

	<body class="hold-transition register-page login-page">
		<div class="register-box" id="app">
			@yield('content')
		</div>
		<script src="{{ asset('js/app.js') }}"></script>
		@yield('js')
	</body>
</html>