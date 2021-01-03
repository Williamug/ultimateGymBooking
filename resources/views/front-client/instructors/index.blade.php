@extends('front-client.layouts.masterClient')

@section('title', 'Instructors')

@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">{{ session()->get('message') }}</div>
@endif
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Instructors</h3>

		<div class="card-tools">
			<div class="input-group input-group-sm" style="width: 150px;">
				{{-- <a href="{{ route('instructors.create') }}" class="btn bg-gradient-primary btn-sm">Add New Instructor <i
						class="fas fa-plus"></i></a>
 --}}			</div>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body table-responsive p-0">
		<table class="table table-hover text-nowrap">
			<thead>
				<tr>
					<th>Image</th>
					<th>First Name</th>
					<th>Service Offered</th>
					<th>Gender</th>
					<th>Verified</th>
					<th>Joined On</th>
				</tr>
			</thead>
			@foreach($instructors as $instructor)
			<tbody>
				<tr>
					<td>
						@if($instructor->profile_image != null)
							<img src="{{ asset('storage/' . $instructor->profile_image) }}" class="img-circle elevation-1" alt="User Image" width="35" height="35">
						@else
							<img src="{{ asset('images/profiles/profile.png') }}" class="img-circle elevation-1" alt="User Image" width="35" height="35">
							{{-- {{ Auth::user()->name }} <span class="caret"></span> --}}
						@endif
					</td>
					<td>{{$instructor->user->name}}</td>
					@foreach($instructor->services as $service)
						@if($service->pivot !== null)
							<td>{{$service->title}}</td>
						@else
							<td>No service assigned yet</td>
						@endif
					@endforeach
					<td>{{$instructor->gender}}</td>
					<td>
						@if($instructor->user->email_verified_at !== null)
						<small class="badge badge-primary">Verified</small>
						@else
						<small class="badge badge-warning">Pending</small>
						@endif
					</td>
					<td>{{ Carbon\Carbon::parse($instructor->user->created_at)->format('d M Y') }}</td>
				</tr>
			</tbody>
			@endforeach
		</table>

		<div class="ml-4 mt-4">{{ $instructors->links() }}</div>
</div>
<!-- /.card-body -->
</div>

@include('models.services')
@endsection