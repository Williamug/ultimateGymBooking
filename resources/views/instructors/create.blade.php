@extends('layouts.master')

@section('title', 'Add Instructor')

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
		<h3 class="card-title">Add a new service</h3>
	</div>
	<!-- /.card-header -->
	<!-- form start -->
	<form role="form" action="{{ route('instructors.store') }}" method="post" enctype="multipart/form-data">
		@csrf
		<div class="card-body row">
			<div class="col-md-6">
				<!-- name-->
				<div class="form-group">
					<label for="name">Name <span class="star">*</span></label>
					<input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter name" value="{{ old('name') }}">
					@error('name')
						<div class="error-alert">{{ $message }}</div>
					@enderror
				</div>
				<!-- /.name-->

				<!-- email-->
				<div class="form-group">
					<label for="email">Email <span class="star">*</span></label>
					<input type="text" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter email" value="{{ old('email') }}">
					@error('email')
						<div class="error-alert">{{ $message }}</div>
					@enderror
				</div>
				<!-- /.email-->

				<!-- password-->
				<div class="form-group">
					<label for="password">Password<span class="star">*</span></label>
					<input type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" id="password" placeholder="Enter password" value="{{ old('password') }}">
					@error('password')
						<div class="error-alert">{{ $message }}</div>
					@enderror
				</div>
				<!-- /.password-->
					<br>
					<hr>
				<!-- phone_number-->
				<div class="form-group">
					<label for="phone_number">Phone Number</label>
					<input type="text" class="form-control form-control-sm" name="phone_number" id="phone_number" placeholder="Enter phone number" value="{{ old('phone_number') }}">
				</div>
				<!-- /.phone_number-->

				<div class="row">
					<div class="col-2">
						<div class="form-group">
							<button type="submit" class="btn bg-gradient-primary btn-sm">Submit</button>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<a href="{{ route('clients.index') }}" class="btn bg-gradient-danger btn-sm">Cancel</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<!-- gender-->
				<div class="form-group">
					<label>Gender</label>
					<div class="custom-control custom-radio">
						<input type="radio" id="male" name="gender" value="Male" checked="checked" class="custom-control-input">
						<label for="male" class="custom-control-label">Male</label>
					</div>
					<div class="custom-control custom-radio">
						<input type="radio" id="female" name="gender" value="Female" class="custom-control-input">
						<label for="female" class="custom-control-label">Female</label>
					</div>
				</div>
				<!-- /.gender-->

				<!-- date of birth-->
				<div class="form-group">
					<label for="dob">Date of birth</label>
					<input type="date" class="form-control form-control-sm" name="dob" id="dob" placeholder="Enter date of birth" value="{{ old('dob') }}">
				</div>
				<!-- date of birth-->

				<!-- profile_image-->
				<div class="form-group">
					<label for="profile_image">Profile image</label>
					<input type="file" class="form-control form-control-sm" name="profile_image" id="profile_image" placeholder="Enter phone number" value="{{ old('profile_image') }}"  @error('profile_image') is-invalid @enderror>
					@error('profile_image')
						<div class="error-alert">{{ $message }}</div>
					@enderror
				</div>
				<!-- /.profile_image-->

				<!-- mobile_number-->
				<div class="form-group">
					<label for="mobile_number">Mobile Number</label>
					<input type="text" class="form-control form-control-sm" name="mobile_number" id="mobile_number" placeholder="Enter mobile number" value="{{ old('mobile_number') }}">
				</div>
				<!-- /.mobile_number-->
			</div>
		</div>
		<!-- /.card-body -->
		<!-- /.card -->
	</form>
</div>
@endsection