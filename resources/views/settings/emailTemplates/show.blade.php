@extends('layouts.master')

@section('title', 'Email Template')

{{-- @section('page-title', 'Email Template') --}}

@section('content')
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Email Template</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body row">
		<div class="col-3 col-sm-8">
			<div>
				<h4>{{ $emailTemplate->title }}</h4>
			</div>
			<div>
				<p>Your booking is received. Please waite for Admin's comfirmation on your booking!</p>
				<h4>Booking Summary</h4>
				<p>Booking ID: {{ $emailTemplate->id }}</p>
				<p>Service Name:</p>
				<p>Quantity:</p>
				<p>Status:</p>
				<p>Date:</p>
				<p>Slot:</p>
				<p>Payment:</p>
			</div>
		</div>
		<div class="col-9 col-sm-4">
			<div class="row">
				<div class="col-4 col-sm-1 mr-5">
					<div class="">
						<a href="{{ route('settings.index') }}" class="btn bg-gradient-primary btn-sm">Back</a>
					</div>
				</div>
				<div class="col-5 col-sm-3">
					<div class="flex">
						<form action="/email-templates/{{$emailTemplate->id}}" method="post">
							@method('DELETE')
							@csrf
							<button type="submit" class="btn bg-gradient-danger btn-sm">Delete</button>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- /.card-body -->
</div>
@endsection