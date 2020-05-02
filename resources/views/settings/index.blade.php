@extends('layouts.master')

@section('title', 'Settings')

@section('page-title', 'Settings')

@section('content')
<div class="row">
	<div class="col-5 col-sm-3">
		<div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
			<a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab"
				aria-controls="vert-tabs-home" aria-selected="true">Application Settings</a>
			<a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab"
				aria-controls="vert-tabs-profile" aria-selected="false">Email Settings</a>
			<a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages" role="tab"
				aria-controls="vert-tabs-messages" aria-selected="false">Roles</a>
			<a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill" href="#vert-tabs-settings" role="tab"
				aria-controls="vert-tabs-settings" aria-selected="false">Off Days and Holidays</a>
		</div>
	</div>
	<div class="col-7 col-sm-9">
		<div class="tab-content" id="vert-tabs-tabContent">
			<div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel"
				aria-labelledby="vert-tabs-home-tab">
				<!-- general form elements -->
				@if(session()->has('message'))
					<div class="alert alert-success"><strong>Success:</strong> {{ session()->get('message')}}</div>
				@endif
				<div class="card card-default">
					<div class="card-header">
						<h3 class="card-title">Application Settings</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<form role="form" action="/settings/{{$setting->id}}" method="post" enctype="">
						@method('PATCH')
						@csrf
						<div class="card-body row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="companyName">Company Name <span class="star">*</span></label>
									<input type="text" class="form-control form-control-sm" name="company_name" id="companyName"
										placeholder="Enter company name" value="{{ $setting->company_name ?? old('company_name')}}">
									@error('company_name')
    									<div class="error-alert">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group">
									<label for="logo">Company Logo</label>
									<div class="input-group input-group-sm">
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="logo" name="logo" value="{{ $setting->logo ?? old('logo') }}">
											<label class="custom-file-label" for="logo">Choose logo</label>
										</div>
										<div class="input-group-append">
											<span class="input-group-text" id="">Upload</span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="officePhoneNumber">Office Phone Number <span class="star">*</span></label>
									<input type="text" class="form-control form-control-sm" name="official_company_number"
										id="officePhoneNumber" placeholder="Office number" value="{{ $setting->official_company_number  ?? old('official_company_number') }}">
									@error('official_company_number')
    									<div class="error-alert">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group">
									<label for="website">Company Website</label>
									<input type="text" class="form-control form-control-sm" name="website" id="website"
										placeholder="Enter website" value="{{ $setting->website  ?? old('website') }}">
								</div>
								<div class="form-group">
			                        <label for="currency_id">Select Currency</label>
				                        <select class="form-control form-control-sm" name="currency_id" id="currency_id">
					                        @foreach($currencies as $currency)
					                        	<option value="{{ $currency->id }}">{{ $currency->currency}}</option>
						                    @endforeach
				                        </select>
			                      </div>
								<div class="form-group">
									<button type="submit" class="btn btn-block bg-gradient-primary btn-sm">Submit</button>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Company Address <span class="star">*</span></label>
									<textarea class="form-control" rows="4" placeholder="Enter ..." name="address">{{ $setting->address  ?? old('address') }}</textarea>
									@error('address')
    									<div class="error-alert">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group">
									<label for="mobleNumber">Mobile Phone Number</label>
									<input type="text" class="form-control form-control-sm" name="phone_number" id="mobleNumber"
										placeholder="Enter mobile number" value="{{ $setting->phone_number  ?? old('phone_number') }}">
								</div>
								<div class="form-group">
									<label for="email">Company Email</label>
									<input type="email" class="form-control form-control-sm" name="email" id="email"
										placeholder="Enter email" value="{{ $setting->email  ?? old('email') }}">
								</div>
							</div>
						</div>
						<!-- /.card-body -->
						<!-- /.card -->
					</form>
				</div>
			</div>
			<div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
				jdahd
			</div>
			<div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
				jd;ad
			</div>
			<div class="tab-pane fade" id="vert-tabs-settings" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
				dahkdjg
			</div>
		</div>
	</div>
</div>
@endsection