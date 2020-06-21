@extends('layouts.master')

@section('title', 'Add payments')


@section('content')
	<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Add Payment</h3>

		<div class="card-tools">
			<div class="input-group input-group-sm" style="width: 150px;">
				<a href="{{ route('bookings.index') }}" class="btn bg-gradient-primary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
			</div>
		</div>
	</div>
	<!-- /.card-header -->
	<!-- form start -->
	<form role="form" action="{{ route('booking-payment.store', ['booking' => $booking]) }}" method="post">
		@csrf
		<div class="card-body row">
			<div class="col-md-3">
			</div>
			<div class="col-md-6">
				<div class="booking-details">
					<p>
						Booking ID: #{{$booking->id}}
					</p>
					<p>
						Status:
						@if($booking->status == 1)
							<small class="badge badge-success">Confirmed</small>
						@elseif($booking->status == 2)
							<small class="badge badge-warning">Pending</small>
						@else
							<small class="badge badge-danger">Canceled</small>
						@endif
					</p>
					<p>
						Bill:
						@foreach($booking->services as $service)
							<span class="booking-shs">Shs.</span> {{ $service->price }}
						@endforeach
					</p>
					<p>
						Due:
						@foreach($booking->services as $service)
							<span class="booking-shs">Shs.</span> {{ $service->price }}
						@endforeach
					</p>
				</div>

				<hr>
				<br>
				<!-- service -->
				<div class="form-group">
					<label>Payment Methods <span class="star">*</span></label>
					<select class="form-control form-control-sm @error('payment_method_id') is-invalid @enderror" name="payment_method_id" id="payment_method_id">
						<option>Choose one</option>
						@foreach($paymentMethods as $method)
							<option value="{{ $method->id }}">{{ $method->payment_methods }}</option>
						@endforeach
					</select>
					@error('payment_method_id')
					<div class="error-alert">{{ $message }}</div>
					@enderror
				</div>
				<!-- /.service -->

				<!-- time-->
				<div class="form-group">
					<label for="amount">Payment Amount</label>
					@foreach($booking->services as $service)
					<input type="text" class="form-control form-control-sm @error('amount') is-invalid @enderror"
						name="amount" id="amount" value="{{ $service->price}}">
					@endforeach
					@error('amount')
					<div class="error-alert">{{ $message }}</div>
					@enderror
				</div>
				<!-- /.time-->
				<div class="form-group">
					<button type="submit" class="btn bg-gradient-primary btn-sm">Pay Now</button>
				</div>
			</div>
			<div class="col-md-3">
			</div>
		</div>
		<!-- /.card-body -->
		<!-- /.card -->
	</form>
</div>
@endsection