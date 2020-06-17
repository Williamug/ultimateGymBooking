@extends('layouts.master')

@section('title', $instructor->user->name)

@section('content')
@if(session()->has('message'))
<div class="alert alert-success"><strong>Success:</strong> {{ session()->get('message') }}</div>
@endif

<div class="row">
	<div class="col-md-4">
		<!-- Profile Image -->
		<div class="card card-primary card-outline">
			<div class="card-body box-profile">
				<div class="text-center">
					@if($instructor->profile_image)
					<img class="profile-user-img img-fluid img-circle"
						src="{{ asset('storage/' . $instructor->profile_image) }}" alt="User profile picture">
					@else
					<img class="profile-user-img img-fluid img-circle" src="{{ asset('images/profiles/profile.png') }}"
						alt="User profile picture">
					@endif
				</div>

				<h3 class="profile-username text-center">{{	$instructor->user->name }}</h3>

				<p class="text-muted text-center">{{ $instructor->user->email }}</p>

				<ul class="list-group list-group-unbordered mb-3">
					<li class="list-group-item">
						<b>Phone Number:</b> <a class="float-right">{{ $instructor->phone_number }}</a>
					</li>
					<li class="list-group-item">
						<b>Mobile Number:</b> <a class="float-right">{{ $instructor->mobile_number }}</a>
					</li>
					<li class="list-group-item">
						<b>Gender:</b> <a class="float-right">{{ $instructor->gender }}</a>
					</li>
					<li class="list-group-item">
						<b>Date of birth:</b> <a class="float-right">{{ Carbon\Carbon::parse($instructor->dob,)->format('jS M Y') }}</a>
					<li class="list-group-item">
						<b>Verified:</b> <a class="float-right">
							@if($instructor->user->email_verified_at !== null)
							<small class="badge badge-primary">Verified</small>
							@else
							<small class="badge badge-warning">Pending</small>
							@endif
						</a>
					</li>
					</li>{{--
					<li class="list-group-item">
						<b>User role:</b> <a class="float-right">{{ $instructor->role->role }}</a>
					</li> --}}
					<li class="list-group-item">
						<b>Joined:</b> <a class="float-right">{{ Carbon\Carbon::parse($instructor->user->created_at,  'Africa/Nairobi')->diffForHumans(Carbon\Carbon::now(), Carbon\CarbonInterface::DIFF_ABSOLUTE) }} ago</a>
					</li>
				</ul>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
	<!-- /.col -->
	<div class="col-md-8">
		<div class="card">
			<div class="card-header p-2">
				<ul class="nav nav-pills">
					<li class="nav-item">
						<a class="nav-link active" href="#booking" data-toggle="tab">Services offered</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#settings" data-toggle="tab">Settings</a>
					</li>
				</ul>
			</div><!-- /.card-header -->
			<div class="card-body">
				<div class="tab-content">
					<div class="active tab-pane" id="booking">
						<table class="table table-hover text-nowrap">
							<thead>
								<tr>
									<th>Title</th>
									<th>Price</th>
									<th>Available seats</th>
									<th>service starts at</th>
									<th>Days</th>
								</tr>
							</thead>
							@foreach($services as $service)
							<tbody>
								<tr>
									<td>{{ $service->title }}</td>
									<td>{{ $service->price }}</td>
									<td>{{ $service->available_seats }}</td>
									<td>{{ Carbon\Carbon::parse($service->service_starts_at)->format('h:i A') }}</td>
									<td>{{ $service->days }}</td>
								</tr>
							</tbody>
							@endforeach
						</table>
					</div>

					<div class="tab-pane" id="settings">
						<h4>Edit instructor's details</h4>
						<div class="card card-default">
							<!-- form start -->
							<form role="form" action="{{ route('instructors.update', ['instructor' => $instructor]) }}" method="post" enctype="multipart/form-data">
								@method('PATCH')
								@csrf
								<div class="card-body row">
									<div class="col-md-6">
										<!-- date of birth-->
										<div class="form-group">
											<label for="dob">Date of birth</label>
											<input type="date" class="form-control form-control-sm" name="dob" id="dob" placeholder="Enter date of birth" value="{{ old('dob') ?? $instructor->dob}}">
										</div>
										<!-- date of birth-->

										<!-- phone_number-->
										<div class="form-group">
											<label for="phone_number">Phone Number</label>
											<input type="text" class="form-control form-control-sm" name="phone_number" id="phone_number" placeholder="Enter phone number" value="{{ old('phone_number') ?? $instructor->phone_number}}">
										</div>
										<!-- /.phone_number-->

										<!-- profile_image-->
										<div class="form-group">
											<label for="profile_image">Profile image</label>
											<input type="file" class="form-control form-control-sm" name="profile_image" id="profile_image" placeholder="Enter phone number" value="{{ old('profile_image') ?? $instructor->profile_image }}" @error('profile_image') is-invalid @enderror>
											@error('profile_image')
												<div class="error-alert">{{ $message }}</div>
											@enderror
										</div>
										<!-- /.profile_image-->

										<div class="row">
											<div class="col-5">
												<div class="form-group">
													<button type="submit" class="btn bg-gradient-primary btn-sm">
														Save profile
													</button>
												</div>
											</div>
											<div class="">
												<div class="form-group">
													<a href="{{ route('instructors.index') }}" class="btn bg-gradient-danger btn-sm">
														Cancel
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<!-- gender-->
										<div class="form-group">
											<label>Gender</label>
											<div class="custom-control custom-radio">
												<input type="radio" id="male" name="gender" value="Male" {{ $instructor->gender == 'Male' ? 'checked' : ''}} checked="checked" class="custom-control-input">
												<label for="male" class="custom-control-label">Male</label>
											</div>
											<div class="custom-control custom-radio">
												<input type="radio" id="female" name="gender" value="Female" {{ $instructor->gender == 'Female' ? 'checked' : ''}} class="custom-control-input">
												<label for="female" class="custom-control-label">Female</label>
											</div>
										</div>
										<!-- /.gender-->

										<!-- mobile number-->
										<div class="form-group">
											<label for="mobile_number">Mobile Number</label>
											<input type="text" class="form-control form-control-sm" name="mobile_number" id="mobile_number" placeholder="Enter phone number" value="{{ old('mobile_number') ?? $instructor->mobile_number}}">
										</div>
										<!-- /.mobile number-->
									</div>
								</div>
								<!-- /.card-body -->
							<!-- /.card -->
							</form>
						</div>
						<!-- /.tab-pane -->

							<br>

						<!-- change password and name-->
						<h5>Change password or your name</h5>
						<div class="card card-default">
							<!-- form start -->
							<form role="form" action="{{ route('user.update', ['user' => $instructor->user]) }}" method="post">
								@method('PATCH')
								@csrf
								<div class="card-body">
									<!-- name-->
									<div class="form-group">
										<label for="name">Name</label>
										<input type="name" class="form-control form-control-sm" name="name" id="name" placeholder="Enter enter current password" value="{{ old('name') ?? $instructor->user->name }}" @error('name') is-invalid @enderror>
										@error('name')
											<div class="error-alert">{{ $message }}</div>
										@enderror
									</div>
									<!-- name-->
										<br>
										<hr>
									<!-- current password-->
									<div class="form-group">
										<label for="current_password">Current Password</label>
										<input type="password" class="form-control form-control-sm" name="current_password" id="current_password" placeholder="Enter enter current password" value="{{ old('current_password') }}" @error('current_password') is-invalid @enderror>
										@error('current_password')
											<div class="error-alert">{{ $message }}</div>
										@enderror
									</div>
									<!-- current password-->
									<br>
									<hr>
									<!-- new password-->
									<div class="form-group">
										<label for="password">New Password</label>
										<input type="password" class="form-control form-control-sm" name="password" id="password" placeholder="Enter new password">
									</div>
									<!-- new password-->
									<!-- confirm password-->
									<div class="form-group">
										<label for="password_confirmation">Confirm Password</label>
										<input type="password" class="form-control form-control-sm" name="password_confirmation" id="password_confirmation" placeholder="Confirm password" @error('password_confirmation') is-invalid @enderror>
										@error('password_confirmation')
											<div class="error-alert">{{ $message }}</div>
										@enderror
									</div>
									<!-- confirm password-->
									<div class="form-group">
										<button type="submit" class="btn bg-gradient-primary btn-sm">
											Save Changes
										</button>
									</div>
								</div>
								<!-- /.card-body -->
							<!-- /.card -->
							</form>
						</div>
						<!-- /.tab-pane -->
					</div>
					<!-- /.tab-content -->
				</div><!-- /.card-body -->
			</div>
			<!-- /.nav-tabs-custom -->
		</div>
	</div>
		<!-- /.col -->
</div>

	<!-- /.card-body -->
@endsection