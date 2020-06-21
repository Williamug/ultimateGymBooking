@extends('front-instructor.layouts.masterInstructor')

@section('title', 'Services')

@section('content')
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Services</h3>

		<div class="card-tools">
			<div class="input-group input-group-sm" style="width: 150px;">

			</div>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body table-responsive p-0">
		<table class="table table-hover text-nowrap">
			<thead>
				<tr>
					<th>Title</th>
					<th>Available Seats</th>
					<th>Status</th>
					<th>Duration Type</th>
					<th>Price</th>
					<th>Starts</th>
					<th>Ends</th>
					<th>Days</th>
					<th>Action</th>
				</tr>
			</thead>
			@foreach($services as $service)
			<tbody>
				<tr>
					<td>{{$service->title}}</td>
					<td>{{$service->available_seats}}</td>
					<td>
						@if($service->status == 1)
						<small class="badge badge-success">Active</small>
						@else
						<small class="badge badge-danger">Inctive</small>
						@endif
					</td>
					<td>{{$service->service_duration_type == 1 ? 'Hourly' : 'Daily'}}</td>
					<td>{{$service->price}}</td>
					<td>{{ Carbon\Carbon::parse($service->service_starts_at)->format('h:i A') }}</td>
					<td>{{ Carbon\Carbon::parse($service->service_ends_at)->format('h:i A') }}</td>
					<td>{{$service->days}}</td>
					<td>
						<div class="row">
                            <div class="col-md-7">
						          <a href="{{ route('instructor-services.show', ['service' => $service]) }}" title="View" class="btn bg-gradient-primary btn-sm">
							         <i class="fas fa-eye"></i>
						          </a>
                            </div>{{--
                            <div class="">
                                <form action="{{ route('client-services.destroy', ['service' => $service]) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn bg-gradient-danger btn-sm" title="Delete">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div> --}}
                        </div>
					</td>
				</tr>
			</tbody>
			@endforeach
		</table>

		<div class="ml-4 mt-4">{{ $services->links() }}</div>
	</div>
	<!-- /.card-body -->
</div>

@include('models.services')
@endsection