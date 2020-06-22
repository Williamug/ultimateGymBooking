@extends('layouts.master')

@section('title', $admin->user->name)

@section('content')
@if(session()->has('message'))
<div class="alert alert-success"><strong>Success:</strong> {{ session()->get('message') }}</div>
@endif

<div class="row">
	<div class="col-2"></div>
	<div class="col-6">
		<!-- Profile Image -->
		<div class="card card-primary card-outline">
			<div class="card-body box-profile">
				<div class="text-center">
					@if($admin->profile_image)
					<img class="profile-user-img img-fluid img-circle"
						src="{{ asset('storage/' . $admin->profile_image) }}" alt="User profile picture">
					@else
					<img class="profile-user-img img-fluid img-circle" src="{{ asset('images/profiles/profile.png') }}"
						alt="User profile picture">
					@endif
				</div>

				<h3 class="profile-username text-center">{{	$admin->user->name }}</h3>

				<p class="text-muted text-center">{{ $admin->user->email }}</p>

				<ul class="list-group list-group-unbordered mb-3">
					<li class="list-group-item">
						<b>Phone Number:</b> <a class="float-right">{{ $admin->phone_number }}</a>
					</li>
					<li class="list-group-item">
						<b>Gender:</b> <a class="float-right">{{ $admin->gender }}</a>
					</li>
					<li class="list-group-item">
						<b>Date of birth:</b> <a class="float-right">{{ Carbon\Carbon::parse($admin->dob,)->format('jS M Y') }}</a>
					<li class="list-group-item">
						<b>Verified:</b> <a class="float-right">
							@if($admin->user->email_verified_at !== null)
							<small class="badge badge-primary">Verified</small>
							@else
							<small class="badge badge-warning">Pending</small>
							@endif
						</a>
					</li>
					</li>{{--
					<li class="list-group-item">
						<b>User role:</b> <a class="float-right">{{ $user->role->role }}</a>
					</li> --}}
					<li class="list-group-item">
						<b>Joined:</b> <a class="float-right">{{ $admin->user->created_at->diffForHumans() }}</a>
					</li>
				</ul>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
	<!-- /.col -->

</div>

	<!-- /.card-body -->
@endsection