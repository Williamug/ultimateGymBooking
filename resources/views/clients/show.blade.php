@extends('layouts.master')

@section('title', $client->user->name)

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
					@if($client->profile_image)
					<img class="profile-user-img img-fluid img-circle"
						src="{{ asset('storage/' . $client->profile_image) }}" alt="User profile picture">
					@else
					<img class="profile-user-img img-fluid img-circle" src="{{ asset('images/profiles/profile.png') }}"
						alt="User profile picture">
					@endif
				</div>

				<h3 class="profile-username text-center">{{	$client->user->name }}</h3>

				<p class="text-muted text-center">{{ $client->user->email }}</p>

				<ul class="list-group list-group-unbordered mb-3">
					<li class="list-group-item">
						<b>Phone Number:</b> <a class="float-right">{{ $client->phone_number }}</a>
					</li>
					<li class="list-group-item">
						<b>Gender:</b> <a class="float-right">{{ $client->gender }}</a>
					</li>
					<li class="list-group-item">
						<b>Date of birth:</b> <a class="float-right">{{ Carbon\Carbon::parse($client->dob)->format('jS M Y') }}</a>
					<li class="list-group-item">
						<b>Verified:</b> <a class="float-right">
							@if($client->user->email_verified_at !== null)
							<small class="badge badge-primary">Verified</small>
							@else
							<small class="badge badge-warning">Pending</small>
							@endif
						</a>
					</li>
					</li>
					<li class="list-group-item">
						<b>User role:</b> <a class="float-right">{{ $client->role->role }}</a>
					</li>
					<li class="list-group-item">
						<b>Joined:</b> <a class="float-right">{{ Carbon\Carbon::parse($client->user->created_at)->diffForHumans(Carbon\Carbon::now(), Carbon\CarbonInterface::DIFF_ABSOLUTE) }} ago</a>
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
						<a class="nav-link active" href="#booking" data-toggle="tab">Booking History</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a>
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
									<th>Service</th>
									<th>Bill</th>
									<th>Status</th>
									<th>Date</th>
									<th>Time</th>
									<th>Payment Status</th>
								</tr>
							</thead>
							@foreach($bookings as $booking)
							<tbody>
								<tr>
								@foreach($booking->services as $service)
									<td>{{ $service->title }}</td>
									<td>{{ $service->price }}</td>
								@endforeach
									<td>
									@if($booking->status == 1)
										<small class="badge badge-success">Confirmed</small>
									@elseif($booking->status == 2)
										<small class="badge badge-warning">Pending</small>
									@else
										<small class="badge badge-danger">Canceled</small>
									@endif
									</td>
									<td>{{ Carbon\Carbon::parse($booking->booking_date)->format('jS M Y') }}</td>
									<td>{{ Carbon\Carbon::parse($booking->booking_time)->format('h:m A') }}</td>
									<td>
									@if($booking->payments !== null)
										<small class="badge badge-success">Paid</small>
									@else
										<small class="badge badge-danger">Due</small>
									@endif
									</td>
								</tr>
							</tbody>
							@endforeach
						</table>
					</div>
					<!-- /.tab-pane -->
					<div class="tab-pane" id="timeline">
						<!-- The timeline -->
						<div class="timeline timeline-inverse">
							<!-- timeline time label -->
							<div class="time-label">
								<span class="bg-danger">
									10 Feb. 2014
								</span>
							</div>
							<!-- /.timeline-label -->

							<!-- timeline item -->
							<div>
								<i class="fas fa-envelope bg-primary"></i>

								<div class="timeline-item">
									<span class="time"><i class="far fa-clock"></i> 12:05</span>

									<h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

									<div class="timeline-body">
										Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
										weebly ning heekya handango imeem plugg dopplr jibjab, movity
										jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
										quora plaxo ideeli hulu weebly balihoo...
									</div>
									<div class="timeline-footer">
										<a href="#" class="btn btn-primary btn-sm">Read more</a>
										<a href="#" class="btn btn-danger btn-sm">Delete</a>
									</div>
								</div>
							</div>
							<!-- END timeline item -->
							<!-- timeline item -->
							<div>
								<i class="fas fa-user bg-info"></i>

								<div class="timeline-item">
									<span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

									<h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your
										friend request
									</h3>
								</div>
							</div>
							<!-- END timeline item -->
							<!-- timeline item -->
							<div>
								<i class="fas fa-comments bg-warning"></i>

								<div class="timeline-item">
									<span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

									<h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

									<div class="timeline-body">
										Take me to your leader!
										Switzerland is small and neutral!
										We are more like Germany, ambitious and misunderstood!
									</div>
									<div class="timeline-footer">
										<a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
									</div>
								</div>
							</div>
							<!-- END timeline item -->
							<!-- timeline time label -->
							<div class="time-label">
								<span class="bg-success">
									3 Jan. 2014
								</span>
							</div>
							<!-- /.timeline-label -->
							<div>
								<i class="far fa-clock bg-gray"></i>
							</div>
						</div>
					</div>
					<!-- /.tab-pane -->

					<div class="tab-pane" id="settings">
						<h4>Edit user details</h4>
						<div class="card card-default">
							<!-- form start -->
							<form role="form" action="{{ route('clients.update', ['client' => $client]) }}" method="post" enctype="multipart/form-data">
								@method('PATCH')
								@csrf
								<div class="card-body row">
									<div class="col-md-6">
										<!-- date of birth-->
										<div class="form-group">
											<label for="dob">Date of birth</label>
											<input type="date" class="form-control form-control-sm" name="dob" id="dob" placeholder="Enter date of birth" value="{{ old('dob') ?? $client->dob}}">
										</div>
										<!-- date of birth-->

										<!-- profile_image-->
										<div class="form-group">
											<label for="profile_image">Profile image</label>
											<input type="file" class="form-control form-control-sm" name="profile_image" id="profile_image" placeholder="Enter phone number" value="{{ old('profile_image') ?? $client->profile_image }}" @error('profile_image') is-invalid @enderror>
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
													<a href="{{ route('clients.index') }}" class="btn bg-gradient-danger btn-sm">
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
												<input type="radio" id="male" name="gender" value="Male" {{ $client->gender == 'Male' ? 'checked' : ''}} checked="checked" class="custom-control-input">
												<label for="male" class="custom-control-label">Male</label>
											</div>
											<div class="custom-control custom-radio">
												<input type="radio" id="female" name="gender" value="Female" {{ $client->gender == 'Female' ? 'checked' : ''}} class="custom-control-input">
												<label for="female" class="custom-control-label">Female</label>
											</div>
										</div>
										<!-- /.gender-->
										<!-- phone_number-->
										<div class="form-group">
											<label for="phone_number">Phone Number</label>
											<input type="text" class="form-control form-control-sm" name="phone_number" id="phone_number" placeholder="Enter phone number" value="{{ old('phone_number') ?? $client->phone_number}}">
										</div>
										<!-- /.phone_number-->
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
							<form role="form" action="{{ route('user.update', ['user' => $client->user]) }}" method="post">
								@method('PATCH')
								@csrf
								<div class="card-body">
									<!-- name-->
									<div class="form-group">
										<label for="name">Name</label>
										<input type="name" class="form-control form-control-sm" name="name" id="name" placeholder="Enter enter current password" value="{{ old('name') ?? $client->user->name }}" @error('name') is-invalid @enderror>
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