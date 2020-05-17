@extends('layouts.master')

@section('title', 'Booking details')

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
					@foreach($booking->clients as $client)
					@if($client->profile_image)
						<img class="profile-user-img img-fluid img-circle" src="{{ asset('storage/' . $client->profile_image) }}" alt="User profile picture">
					@else
						<img class="profile-user-img img-fluid img-circle" src="{{ asset('images/profiles/profile.png') }}" alt="User profile picture">
					@endif
					@endforeach
				</div>
					<h3 class="profile-username text-center">{{	$client->user->name }}</h3>

					<p class="text-muted text-center"><i class="far fa-envelope"></i> {{ $client->user->email }}</p>
					<p class="text-muted text-center"><i class="fas fa-phone-alt"></i> {{ $client->phone_number }}</p>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
	<!-- /.col -->
	<div class="col-md-8">
		<div class="card">
			<div class="card-header p-2">
				<h3>Booking Details #{{$booking->id}}</h3>

				<div class="card-tools">
					<div class="input-group input-group-sm" style="width: 150px;">
						<a href="{{ route('bookings.index') }}">All Bookings</a>
					</div>
				</div>
			</div><!-- /.card-header -->
			<div class="card-body">
				<div class="tab-content">
					<div class="row">
					<div class="col-4">
						<p><strong>Service:</strong></p>
						<p><strong>Status:</strong></p>
						<p><strong>Booking date:</strong></p>
						<p><strong>Booking time:</strong></p>
						<p><strong>Quantity:</strong></p>
						<p><strong>Bill:</strong></p>
						<p><strong>Payment Status:</strong></p>
						<p><strong>Instructor(s):</strong></p>
						<p><strong>Created At:</strong></p>
					</div>
					<div class="col-6">
						@foreach($booking->services as $service)
						<p>{{ $service->title }}</p>
						@endforeach
						<p>
							@if($booking->status == 1)
								<small class="badge badge-success">Confirmed</small>
							@elseif($booking->status == 2)
								<small class="badge badge-warning">Pending</small>
							@else
								<small class="badge badge-danger">Canceled</small>
							@endif
						</p>
						<p>{{ Carbon\Carbon::parse($booking->booking_date)->format('jS M Y') }}</p>
						<p>{{ Carbon\Carbon::parse($booking->booking_time)->format('h:i A') }}</p>
						@if($booking->quantity !== null)
							<p>{{ $booking->quantity }}</p>
						@else
							<p>No quantity specified</p>
						@endif
						@foreach($booking->services as $service)
						<p>{{ $service->price }}</p>
						@endforeach
						<p>
							@if($booking->payments !== null)
								<small class="badge badge-success">Paid</small>
							@else
								<small class="badge badge-danger">Due</small>
							@endif
						</p>

						@foreach($booking->services as $service)
							@foreach($service->instructors as $instructor)
								@if($instructor !== null)
									<p>{{ $instructor->user->name }}</p>
								@else
									<p>No instructor for this service/booking yet</p>
								@endif
							@endforeach
						@endforeach
						@foreach($booking->services as $service)
						<p>{{ Carbon\Carbon::parse($service->created_at)->format('jS M Y h:i A') }}</p>
						@endforeach
					</div>
				</div>
				</div>
				<!-- /.tab-pane -->
			</div>
					<!-- /.tab-content -->
		</div><!-- /.card-body -->
	</div>
			<!-- /.nav-tabs-custom -->
</div>

	<!-- /.card-body -->
@endsection