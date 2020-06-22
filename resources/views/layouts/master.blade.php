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
	@yield('styles')
</head>

<body class="hold-transition sidebar-mini">
	<div class="wrapper" id="app">

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
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
				</li>
			</ul>

			<!-- SEARCH FORM -->
			<form class="form-inline ml-3">
				<div class="input-group input-group-sm">
					<input class="form-control form-control-navbar" type="search" placeholder="Search"
						aria-label="Search">
					<div class="input-group-append">
						<button class="btn btn-navbar" type="submit">
							<i class="fas fa-search"></i>
						</button>
					</div>
				</div>
			</form>

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<!-- Messages Dropdown Menu -->
				@guest
				<li class="nav-item">
					<a href="{{ route('login') }}" class="nav-link">{{ __('Login') }}</a>
				</li>
				@if(Route::has('register'))
				<li class="nav-item">
					<a href="{{ route('register') }}" class="nav-link">{{ __('Register') }}</a>
				</li>
				@endif
				@else
				{{-- <li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
						<i class="far fa-comments pr-2 mt-2"></i>
						<span class="badge badge-danger navbar-badge">3</span>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<a href="#" class="dropdown-item">
							<!-- Message Start -->
							<div class="media">
								<img src="{{ asset('images/logo/user.png') }}" alt="User Avatar"
									class="img-size-50 mr-3 img-circle">
								<div class="media-body">
									<h3 class="dropdown-item-title">
										Brad Diesel
										<span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
									</h3>
									<p class="text-sm">Call me whenever you can...</p>
									<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
								</div>
							</div>
							<!-- Message End -->
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<!-- Message Start -->
							<div class="media">
								<img src="{{ asset('images/logo/user.png') }}" alt="User Avatar"
									class="img-size-50 img-circle mr-3">
								<div class="media-body">
									<h3 class="dropdown-item-title">
										John Pierce
										<span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
									</h3>
									<p class="text-sm">I got your message bro</p>
									<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
								</div>
							</div>
							<!-- Message End -->
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<!-- Message Start -->
							<div class="media">
								<img src="{{ asset('images/logo/user.png') }}" alt="User Avatar"
									class="img-size-50 img-circle mr-3">
								<div class="media-body">
									<h3 class="dropdown-item-title">
										Nora Silvester
										<span class="float-right text-sm text-warning"><i
												class="fas fa-star"></i></span>
									</h3>
									<p class="text-sm">The subject goes here</p>
									<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
								</div>
							</div>
							<!-- Message End -->
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
					</div>
				</li> --}}
				<!-- Notifications Dropdown Menu -->
				{{-- <li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
						<i class="far fa-bell pr-2 mt-2"></i>
						<span class="badge badge-warning navbar-badge">15</span>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<span class="dropdown-header">15 Notifications</span>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fas fa-envelope mr-2"></i> 4 new messages
							<span class="float-right text-muted text-sm">3 mins</span>
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fas fa-users mr-2"></i> 8 friend requests
							<span class="float-right text-muted text-sm">12 hours</span>
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fas fa-file mr-2"></i> 3 new reports
							<span class="float-right text-muted text-sm">2 days</span>
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
					</div>
				</li> --}}

				{{-- user img --}}
				<li class="nav-item dropdown">
					<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
						{{-- <img src="{{ asset('images/profiles/profile.png') }}" alt="" class="circle avatar"> --}}
						@if(Auth::user()->admin->profile_image != null)
							<img src="{{ asset('storage/' . Auth::user()->admin->profile_image) }}" class="img-circle elevation-1" alt="User Image" width="35" height="35">
						@else
							<img src="{{ asset('images/profiles/profile.png') }}" class="img-circle elevation-1" alt="User Image" width="35" height="35">
							{{-- {{ Auth::user()->name }} <span class="caret"></span> --}}
						@endif
					</a>

					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<div class="dropdown-item">
							<span>{{ Auth::user()->name }}</span><br>
							<small class="text-muted">{{ Auth::user()->email }}</small>
						</div>
							<hr>
						<!-- my profile-->
						<a class="dropdown-item" href="{{ route('user-profile.show', ['user' => Auth::user()]) }}">
							<i class="far fa-user"></i>  {{ __('My Profile') }}
						</a>
						<!-- /.my profile-->
						<!-- logout -->
						<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
							<i class="far fa-arrow-alt-circle-right"></i>  {{ __('Logout') }}
						</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
						<!--/logout -->

				</li>
				{{-- <li class="nav-item">
					<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
							class="fas fa-th-large"></i></a>
				</li> --}}
				@endguest
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		@include('patials.mainsidebar')

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			@include('patials.page-header')
			<!-- /.content-header -->

			<!-- Main content -->
			<div class="container">
				@guest
				  <h4>You need to <a href="{{ route('login') }}">{{ __('login') }}</a> to resume your session</h4>
				@else
				@yield('content')
				@endguest
			</div>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<!-- Control Sidebar -->
		@include('patials.control-sidebar')
		<!-- /.control-sidebar -->

		<!-- Main Footer -->
		@include('patials.footer')
	</div>
	<!-- ./wrapper -->

	<!-- REQUIRED SCRIPTS -->

	@include('sweetalert::alert')
	<script src="{{ asset('js/app.js') }}"></script>
	@yield('js')
</body>

</html>