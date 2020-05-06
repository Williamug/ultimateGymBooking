@extends('layouts.master')

@section('title', 'Services')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			<strong>Oops!</strong> Something went wrong, please check your form and try again
		</div>
	@endif

	<div class="card card-default">
		<div class="card-header">
			<h3 class="card-title">Edit {{ $service->title }}</h3>
		</div>
		<!-- /.card-header -->
		<!-- form start -->
		<form role="form" action="{{ route('services.update', ['service' => $service]) }}" method="post">
      @method('PATCH')
			@csrf
			<div class="card-body row">
				<div class="col-md-6">
					<!-- title-->
                  <div class="form-group">
                    <label for="title">Title <span class="star">*</span></label>
                    <input type="text" class="form-control form-control-sm @error('title') is-invalid @enderror" name="title" id="title" placeholder="Enter title" value="{{ $service->title ?? old('title') }}">
                    @error('title')
						<div class="error-alert">{{ $message }}</div>
					@enderror
                  </div>
                  <!-- /.title-->

                  <!-- price-->
                  <div class="form-group">
                    <label for="price">Price <span class="star">*</span></label>
                    <input type="text" class="form-control form-control-sm @error('price') is-invalid @enderror" name="price" id="price" placeholder="Enter price" value="{{ $service->price ?? old('price') }}">
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
                    <input type="text" class="form-control form-control-sm @error('available_seats') is-invalid @enderror" name="available_seats" id="available_seats" placeholder="Enter available seats" value="{{ $service->available_seats ?? old('available_seats') }}">
                    @error('available_seats')
						<div class="error-alert">{{ $message }}</div>
					@enderror
                  </div>
                  <!-- /.available_seats-->

                <!-- instructor -->
                  <div class="form-group">
                    <label>Instructor <span class="star">*</span></label>
                    <select class="form-control form-control-sm @error('instructor_id') is-invalid @enderror" name="instructor_id" id="instructor_id">
                      <option placeholder="Select instructor"></option>
                    @foreach($instructors as $instructor)
                      <option value="{{ $instructor->id ?? old('instructor_id') }}">{{ $instructor->first_name }} {{ $instructor->last_name }}</option>
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
                    <textarea class="form-control" rows="4" placeholder="Enter service description" name="description">{{ $service->description ?? old('description') }}</textarea>
                  </div>
                  <!-- /.description-->
                  <div class="row">
                  	<div class="col-4">
                  		<div class="form-group">
							<button type="submit" class="btn bg-gradient-primary btn-sm"><i class="fas fa-save"></i> Save Changes</button>
						</div>
                  	</div>
                  	<div class="col-6">
                  		<div class="form-group">
							<a href="{{ route('services.show', ['service' => $service]) }}" class="btn bg-gradient-danger btn-sm"><i class="fas fa-times"></i> Cancel</a>
						</div>
                  	</div>
                  </div>
				</div>
				<div class="col-md-6">
					 <!-- service_starts_at-->
                  <div class="form-group">
                    <label for="service_starts_at">Service Starts <span class="star">*</span></label>
                    <input type="time" class="form-control form-control-sm @error('service_starts_at') is-invalid @enderror" name="service_starts_at" id="service_starts_at" placeholder="hh:mm:ss" value="{{ $service->service_starts_at ?? old('service_starts_at') }}">
                    @error('service_starts_at')
						<div class="error-alert">{{ $message }}</div>
					@enderror
                  </div>
                  <!-- /.service_starts_at-->

                  <!-- service_ends_at-->
                  <div class="form-group">
                    <label for="service_ends_at">Service Ends At <span class="star">*</span></label>
                    <input type="time" class="form-control form-control-sm @error('service_ends_at') is-invalid @enderror" name="service_ends_at" id="service_ends_at" placeholder="hh:mm:ss" value="{{ $service->service_ends_at ?? old('service_ends_at') }}">
                    @error('service_ends_at')
						<div class="error-alert">{{ $message }}</div>
					@enderror
                  </div>
                  <!-- /.service_ends_at-->

                  <!-- service duration type -->
                  <div class="form-group">
                    <label>Service duration type</label>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" id="hourly" name="service_duration_type" value="1" checked>
                      <label for="hourly" class="custom-control-label">Hourly</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" id="daily" name="service_duration_type" value="0">
                      <label for="daily" class="custom-control-label">Daily</label>
                    </div>
                  </div>
                  <!-- /.service duration type -->

                  <!-- status -->
                  <div class="form-group">
                    <label for="">Status</label>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" id="active" name="status" value="1">
                      <label for="active" class="custom-control-label">Active</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" id="inactive" name="status"  value="0" checked>
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
                                  <input class="custom-control-input" type="checkbox" id="monday">
                                  <label for="monday" class="custom-control-label">Monday</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                  <input class="custom-control-input" type="checkbox" id="tuesday">
                                  <label for="tuesday" class="custom-control-label">Tuesday</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                  <input class="custom-control-input" type="checkbox" id="wednesday">
                                  <label for="wednesday" class="custom-control-label">Wednesday</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                  <input class="custom-control-input" type="checkbox" id="thursday">
                                  <label for="thursday" class="custom-control-label">Thursday</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="custom-control custom-checkbox">
                                  <input class="custom-control-input" type="checkbox" id="friday">
                                  <label for="friday" class="custom-control-label">Friday</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                  <input class="custom-control-input" type="checkbox" id="saturday">
                                  <label for="saturday" class="custom-control-label">Saturday</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                  <input class="custom-control-input" type="checkbox" id="sunday">
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