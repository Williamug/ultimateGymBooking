@extends('front-instructor.layouts.masterInstructor')

@section('title', 'Booking')

@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">{{ session()->get('message') }}</div>
@endif
<div class="card">
	<div class="card-header">
		<h4 class="card-title">Bookings</h4>

		<div class="card-tools">
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body table-responsive p-0">
		<table class="table table-hover text-nowrap">
			<thead>
				<tr>
					<th>Client</th>
					<th>Phone Number</th>
					<th>Service</th>
					<th>Status</th>
					<th>Date</th>
					<th>Time</th>
					<th>Action</th>
				</tr>
			</thead>
			@foreach($bookings as $booking)
			<tbody>
				<tr>
					<td>{{ $booking->user->name }}</td>
					<td>{{ $booking->user->client->phone_number }}</td>
					@foreach($booking->services as $service)
						<td>{{ $service->title }}</td>
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
					<td>{{ Carbon\Carbon::parse($booking->booking_time)->format('h:i A') }}</td>

					<td>
                        <div class="row">
                            <div class="col-md-4">
						          <a href="{{ route('instructor-bookings.show', ['booking' => $booking]) }}" title="View" class="btn bg-gradient-primary btn-sm">
							         <i class="fas fa-eye"></i>
						          </a>
                            </div>
                        </div>
					</td>
				</tr>
			</tbody>
			@endforeach
		</table>

		<div class="ml-4 mt-4">{{ $bookings->links() }}
	</div>
</div>
<!-- /.card-body -->
</div>

@include('models.services')
@endsection