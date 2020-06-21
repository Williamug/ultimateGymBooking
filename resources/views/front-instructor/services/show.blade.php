@extends('front-instructor.layouts.masterInstructor')

@section('title', $service->title)

@section('content')
@if(session()->has('message'))
<div class="alert alert-success"><strong>Success:</strong> {{ session()->get('message') }}</div>
@endif

<div class="card">
	<div class="card-header">
		<h3 class="card-title">Details for {{ $service->title }}</h3>

		<div class="card-tools">
			<div class="input-group input-group-sm" style="width: 150px;">
				<a href="{{ route('instructor-services.index') }}" class="btn bg-gradient-primary btn-sm"><i
						class="fas fa-arrow-left"></i> Back</a>
			</div>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="row">
			<div class="col-7">
				<h4>{{$service->title}}</h4>
				<div class="row">
					<div class="col-4">
						<p><strong>Available Seats:</strong></p>
						<p><strong>Service Duration Type:</strong></p>
						<p><strong>Service Starts:</strong></p>
						<p><strong>Service Ends:</strong></p>
						<p><strong>Status:</strong></p>
						<p><strong>Days:</strong></p>
						<p><strong>Price:</strong></p>
						<p><strong>Description:</strong></p>
						<p><strong>Instructor(s):</strong></p>
					</div>
					<div class="col-6">
						<p>{{ $service->available_seats }} Seats</p>
						<p>{{ $service->service_duration_type == 1 ? 'Hourly' : 'Daily' }}</p>
						<p>{{ Carbon\Carbon::parse($service->service_starts_at)->format('h:i A') }}</p>
						<p>{{ Carbon\Carbon::parse($service->service_ends_at)->format('h:i A') }}</p>
						<p>
							@if($service->status === 1)
							<small class="badge badge-success">Active</small>
							@else
							<small class="badge badge-danger">Inactive</small>
							@endif
						</p>
						<p><span class="badge badge-info">{{ $service->days }}</span></p>
						<p>{{ $service->price }}</p>
						<p>{{ $service->description === null ? 'No description for this service' : $service->description }}
						</p>
						<p>
							@foreach($service->instructors as $instructor)
							<p>{{ $instructor->user->name }}</p>
							@endforeach
						</p>
					</div>
				</div>
			</div>
			<div class="col-5">
				{{-- @if($service->profile_image)
					<img class="img-fluid pad" src="{{ asset('storage/' . $service->service_img) }}" alt="Service cover photo">
				@else
					<img class="img-fluid pad" src="{{ asset('images/cover.png') }}" alt="Service cover photo">
					{{-- <span class="flex justify-center">405.14 x 384</span> --}}
				{{-- @endif --}}
			</div>
		</div>
		<hr>
		{{-- <div class="row">
			<div class="col-2">
				<a href="{{ route('services.edit', ['service' => $service]) }}"
					class="btn bg-gradient-primary btn-sm"><i class="nav-icon fas fa-calendar-alt"></i> Book Now</a>
			</div>
		</div> --}}
	</div>
	<!-- /.card-body -->
</div>

@endsection