@extends('front-client.layouts.masterClient')

@section('title', 'Add new booking')

@section('styles')
<!-- daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
@endsection

@section('content')
@if(session()->has('message'))
<div class="alert alert-success"><strong>Success:</strong> {{ session()->get('message') }}</div>
@elseif($errors->any())
<div class="alert alert-danger">
	<strong>Oops!</strong> Something went wrong, please check your form and try again
</div>
@endif

<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Add a new booking</h3>
	</div>
	<!-- /.card-header -->
	<!-- form start -->
	<form role="form" action="{{ route('client-bookings.store') }}" method="post">
		@csrf
		<div class="card-body row">
			<div class="col-md-6">
				<!-- service -->
				<div class="form-group">
					<label>Service <span class="star">*</span></label>
					<select class="form-control form-control-sm @error('service_id') is-invalid @enderror" name="service_id" id="service_id">
						<option>Select service</option>
						@foreach($services as $service)
							<option value="{{ $service->id }}">{{ $service->title }}</option>
						@endforeach
					</select>
					@error('service_id')
					<div class="error-alert">{{ $message }}</div>
					@enderror
				</div>
				<!-- /.service -->

				<!-- abooking date-->
				<div class="form-group">
					<label for="booking_date">Booking Date <span class="star">*</span></label>
					<input type="date" class="form-control form-control-sm @error('booking_date') is-invalid @enderror" name="booking_date" id="booking_date" placeholder="Enter booking_date">
					@error('booking_date')
					<div class="error-alert">{{ $message }}</div>
					@enderror
				</div>
				<!-- /.abooking date-->


				<!-- description-->
				<div class="form-group">
					<label for="description">Comment</label>
					<textarea class="form-control" rows="3" placeholder="Enter comment" name="comment"></textarea>
				</div>
				<!-- /.description-->

				<!-- buttons-->
				<div class="row">
					<div class="col-3">
						<div class="form-group">
							<button type="submit" class="btn bg-gradient-primary btn-sm">Book Now</button>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<a href="{{ route('client-bookings.index') }}" class="btn bg-gradient-danger btn-sm">Cancel</a>
						</div>
					</div>
				</div>
				<!-- /.buttons-->
			</div>
			<div class="col-md-6">
				<!-- time-->
				<div class="form-group">
					<label for="booking_time">Booking Time</label>
					<input type="time" class="form-control form-control-sm @error('booking_time') is-invalid @enderror"
						name="booking_time" id="booking_time" placeholder="Enter booking time">
					@error('booking_time')
					<div class="error-alert">{{ $message }}</div>
					@enderror
				</div>
				<!-- /.time-->

				<!-- quantity-->
				<div class="form-group">
					<label for="quantity">Quantity</label>
					<input type="number" class="form-control form-control-sm @error('quantity') is-invalid @enderror"
						name="quantity" id="quantity" placeholder="Enter booking quantity">
					@error('quantity')
					<div class="error-alert">{{ $message }}</div>
					@enderror
				</div>
				<!-- /.quantity-->
			</div>
		</div>
		<!-- /.card-body -->
		<!-- /.card -->
	</form>
</div>
@endsection
@section('js')
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<script>
	//Timepicker
    $('#booking_time').datetimepicker({
      format: 'LT'
    })

</script>
@endsection