@extends('front-client.layouts.masterClient')

@section('title', 'Booking')

@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">{{ session()->get('message') }}</div>
@endif
<div class="card">
	<div class="card-header">
		<h4 class="card-title">Bookings</h4>

		<div class="card-tools">
			<div class="input-group input-group-sm" style="width: 150px;">
				<a href="{{ route('client-bookings.create') }}" class="btn bg-gradient-primary btn-sm">Add New Booking <i
						class="fas fa-plus"></i></a>
			</div>
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
					<th>Bill</th>
					<th>Status</th>
					<th>Date</th>
					<th>Time</th>
					<th>Payment Status</th>
					<th>Action</th>
				</tr>
			</thead>
			@foreach($bookings as $booking)
			<tbody>
				<tr>
					@foreach($booking->clients as $clients => $client)
						<td>{{ $client->user->name }}</td>
						<td>{{ $client->phone_number }}</td>
					@endforeach
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
					<td>{{ Carbon\Carbon::parse($booking->booking_time)->format('h:i A') }}</td>
					<td>
						@if($booking->payments !== null)
						<small class="badge badge-success">Paid</small>
						@else
						<small class="badge badge-danger">Due</small>
						@endif
					</td>

					<td>
                        <div class="row">
                            <div class="col-md-6">
						          <a href="{{ route('bookings.show', ['booking' => $booking]) }}" title="View" class="btn bg-gradient-primary btn-sm">
							         <i class="fas fa-eye"></i>
						          </a>
                            </div>
                            <div class="">
                                <form action="{{ route('bookings.destroy', ['booking' => $booking]) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn bg-gradient-danger btn-sm" title="Delete">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
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