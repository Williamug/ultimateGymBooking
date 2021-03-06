@extends('layouts.master')

@section('title', 'Edit service')

@section('content')

@if($errors->any())
	<div class="alert alert-danger">
		<strong>Oops!</strong> Something went wrong, please check your form and try again
	</div>
@elseif(session()->has('message'))
	<div class="alert alert-danger"><strong>Oops:</strong> {{ session()->get('message') }}</div>
@endif

<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Edit {{ $service->title }}</h3>
	</div>
	<!-- /.card-header -->
	<!-- form start -->
	<form role="form" action="{{ route('services.update', ['service' => $service]) }}" method="post" enctype="multipart/form-data">
		@method('PATCH')
		@csrf
		<div class="card-body row">
			<div class="col-md-6">
				<!-- title-->
				<div class="form-group">
					<label for="title">Title <span class="star">*</span></label>
					<input type="text" class="form-control form-control-sm @error('title') is-invalid @enderror"
						name="title" id="title" placeholder="Enter title" value="{{ old('title') ?? $service->title }}">
					@error('title')
					<div class="error-alert">{{ $message }}</div>
					@enderror
				</div>
				<!-- /.title-->

				<!-- price-->
				<div class="form-group">
					<label for="price">Price <span class="star">*</span></label>
					<input type="text" class="form-control form-control-sm @error('price') is-invalid @enderror"
						name="price" id="price" placeholder="Enter price" value="{{ old('price') ?? $service->price }}">
					@error('price')
					<div class="error-alert">{{ $message }}</div>
					@enderror
				</div>
				<!-- /.price-->

				<!-- service_duration-->
				<!-- <div class="form-group">
                    <label for="service_duration">Service Duration <span class="star">*</span></label>
                    <input type="time" v-model="form.service_duration" class="form-control form-control-sm" name="service_duration" id="service_duration" placeholder="hh:mm" :class="{'is-invalid': form.errors.has('service_duration')}">
                    <has-error :form="form" field="service_duration"></has-error>
                </div> -->
				<!-- /.service_duration-->

				<!-- available_seats-->
				<div class="form-group">
					<label for="available_seats">Number of Seats Available <span class="star">*</span></label>
					<input type="text"
						class="form-control form-control-sm @error('available_seats') is-invalid @enderror"
						name="available_seats" id="available_seats" placeholder="Enter available seats"
						value="{{ old('available_seats') ?? $service->available_seats }}">
					@error('available_seats')
					<div class="error-alert">{{ $message }}</div>
					@enderror
				</div>
				<!-- /.available_seats-->

				<!-- instructor -->
				<div class="form-group">
					<label>Instructor <span class="star">*</span></label>
					<select class="form-control form-control-sm @error('instructor_id') is-invalid @enderror"
						name="instructor_id" id="instructor_id">
						<option>-- Select instructor --</option>
						@foreach($instructors as $instructor)
						<option value="{{ old('instructor_id') ?? $instructor->id }}"{{ $instructor->id == $instructor->id ? 'selected' : '' }}>{{ $instructor->user->name }}</option>
						@endforeach
					</select>
					@error('instructor_id')
					<div class="error-alert">{{ $message }}</div>
					@enderror
				</div>
				<!-- /.instructor -->

				<!-- description-->
				<div class="form-group">
					<label for="description">Description</label>
					<textarea class="form-control" rows="4" placeholder="Enter service description"
						name="description">{{ old('description') ?? $service->description }}</textarea>
				</div>
				<!-- /.description-->
				<div class="row">
					<div class="col-4">
						<div class="form-group">
							<button type="submit" class="btn bg-gradient-primary btn-sm"><i class="fas fa-save"></i>
								Save Changes</button>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<a href="{{ route('services.show', ['service' => $service]) }}"
								class="btn bg-gradient-danger btn-sm"><i class="fas fa-times"></i> Cancel</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<!-- service_starts_at-->
				<div class="form-group">
					<label for="service_starts_at">Service Starts <span class="star">*</span></label>
					<input type="time"
						class="form-control form-control-sm @error('service_starts_at') is-invalid @enderror"
						name="service_starts_at" id="service_starts_at" placeholder="hh:mm:ss"
						value="{{ old('service_starts_at') ?? $service->service_starts_at }}">
					@error('service_starts_at')
					<div class="error-alert">{{ $message }}</div>
					@enderror
				</div>
				<!-- /.service_starts_at-->

				<!-- service_ends_at-->
				<div class="form-group">
					<label for="service_ends_at">Service Ends At <span class="star">*</span></label>
					<input type="time"
						class="form-control form-control-sm @error('service_ends_at') is-invalid @enderror"
						name="service_ends_at" id="service_ends_at" placeholder="hh:mm:ss"
						value="{{ old('service_ends_at') ?? $service->service_ends_at }}">
					@error('service_ends_at')
					<div class="error-alert">{{ $message }}</div>
					@enderror
				</div>
				<!-- /.service_ends_at-->

				<!-- service_img-->
				{{-- <div class="form-group">
					<label for="service_img">Service Image<span class="star"></span></label>
					<input type="file" class="form-control form-control-sm @error('service_img') is-invalid @enderror" name="service_img" id="service_img" value="{{ old('service_img')}}">
					@error('service_img')
					<div class="error-alert">{{ $message }}</div>
					@enderror
				</div> --}}
				<!-- /.service_img-->

				<!-- service duration type -->
				<div class="form-group">
					<label>Service duration type</label>
					<div class="custom-control custom-radio">
						<input class="custom-control-input" type="radio" id="hourly" name="service_duration_type"
							value="1" {{ $service->service_duration_type == 1 ? 'checked' : '' }}>
						<label for="hourly" class="custom-control-label">Hourly</label>
					</div>
					<div class="custom-control custom-radio">
						<input class="custom-control-input" type="radio" id="daily" name="service_duration_type"
							value="0" {{ $service->service_duration_type == 0 ? 'checked' : '' }}>
						<label for="daily" class="custom-control-label">Daily</label>
					</div>
				</div>
				<!-- /.service duration type -->

				<!-- status -->
				<div class="form-group">
					<label for="">Status</label>
					<div class="custom-control custom-radio">
						<input class="custom-control-input" type="radio" id="active" name="status" value="1" {{ $service->status == 1 ? 'checked' : '' }}>
						<label for="active" class="custom-control-label">Active</label>
					</div>
					<div class="custom-control custom-radio">
						<input class="custom-control-input" type="radio" id="inactive" name="status" value="0" {{ $service->status == 0 ? 'checked' : '' }}>
						<label for="inactive" class="custom-control-label">Inactive</label>
					</div>
				</div>
				<!-- /.status -->

				<!-- days-->
				<div class="form-group">
					<label for="">Days</label>
					<div class="row">
						<div class="col-6">
							<div class="custom-control custom-checkbox">
								<input class="custom-control-input" type="checkbox" id="monday" name="days[]" value="Monday" {{ !empty($weekDays[0]) ? 'checked' : '' }}>
								<label for="monday" class="custom-control-label">Monday</label>
							</div>
							<div class="custom-control custom-checkbox">
								<input class="custom-control-input" type="checkbox" id="tuesday" name="days[]" value="Tuesday" {{ !empty($weekDays[1]) ? 'checked' : '' }}>
								<label for="tuesday" class="custom-control-label">Tuesday</label>
							</div>
							<div class="custom-control custom-checkbox">
								<input class="custom-control-input" type="checkbox" id="wednesday" name="days[]" value="Wednesday" {{ !empty($weekDays[2]) ? 'checked' : '' }}>
								<label for="wednesday" class="custom-control-label">Wednesday</label>
							</div>
							<div class="custom-control custom-checkbox">
								<input class="custom-control-input" type="checkbox" id="thursday" name="days[]" value="Thursday" {{ !empty($weekDays[3]) ? 'checked' : '' }}>
								<label for="thursday" class="custom-control-label">Thursday</label>
							</div>
						</div>
						<div class="col-6">
							<div class="custom-control custom-checkbox">
								<input class="custom-control-input" type="checkbox" id="friday" name="days[]" value="Friday" {{ !empty($weekDays[4]) ? 'checked' : '' }}>
								<label for="friday" class="custom-control-label">Friday</label>
							</div>
							<div class="custom-control custom-checkbox">
								<input class="custom-control-input" type="checkbox" id="saturday" name="days[]" value="Saturday" {{ !empty($weekDays[5]) ? 'checked' : '' }}>
								<label for="saturday" class="custom-control-label">Saturday</label>
							</div>
							<div class="custom-control custom-checkbox">
								<input class="custom-control-input" type="checkbox" id="sunday" name="days[]" value="Sunday" {{ !empty($weekDays[6]) ? 'checked' : '' }}>
								<label for="sunday" class="custom-control-label">Sunday</label>
							</div>
						</div>
					</div>
				</div>
				<!-- /.days-->
			</div>
		</div>
		<!-- /.card-body -->
		<!-- /.card -->
	</form>
</div>
@endsection