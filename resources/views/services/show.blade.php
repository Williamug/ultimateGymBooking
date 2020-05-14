@extends('layouts.master')

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
				<a href="{{ route('services.index') }}" class="btn bg-gradient-primary btn-sm"><i
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
						<p>{{ $service->days }}</p>
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
				<img class="img-fluid pad" src="{{ asset('images/photo2.png') }}" alt="Photo">
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-2">
				<a href="{{ route('services.edit', ['service' => $service]) }}"
					class="btn bg-gradient-primary btn-sm"><i class="fas fa-pen"></i> Edit</a>
			</div>
			<div class="col-6">
				<form action="{{ route('services.destroy', ['service' => $service]) }}" method="post">
					@method('DELETE')
					@csrf
					<button type="submit" class="btn bg-gradient-danger btn-sm">
						<i class="far fa-trash-alt"></i> Delete
					</button>
				</form>
			</div>
		</div>
	</div>
	<!-- /.card-body -->
</div>

@endsection