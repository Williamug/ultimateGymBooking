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
			{{-- application settings --}}
			<div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel"
				aria-labelledby="vert-tabs-home-tab">
				<!-- general form elements -->
				@include('patials.messages')
				<div class="card card-default">
					<div class="card-header">
						<h3 class="card-title">Application Settings</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<form role="form" action="/settings/{{$setting->id}}" method="post" enctype="multipart/form-data">
						@method('PATCH')
						@csrf
						<div class="card-body row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="companyName">Company Name <span class="star">*</span></label>
									<input type="text"
										class="form-control form-control-sm @error('company_name') is-invalid @enderror"
										name="company_name" id="companyName" placeholder="Enter company name"
										value="{{ $setting->company_name ?? old('company_name')}}">
									@error('company_name')
									<div class="error-alert">{{ $message }}</div>
									@enderror
								</div>

								<!-- company logo-->
								<div class="form-group">
									<label for="logo">Company Logo</label>
									<input type="file" class="form-control form-control-sm" name="logo" id="logo" placeholder="Enter phone number" value="{{ old('logo') ?? $setting->logo}}"  @error('logo') is-invalid @enderror>
									@error('logo')
										<div class="error-alert">{{ $message }}</div>
									@enderror
								</div>
								<!-- /.company logo-->

								<div class="form-group">
									<label for="officePhoneNumber">Office Phone Number <span class="star">*</span></label>
									<input type="text"
										class="form-control form-control-sm @error('official_company_number') is-invalid @enderror"
										name="official_company_number" id="officePhoneNumber"
										placeholder="Office number"
										value="{{ $setting->official_company_number  ?? old('official_company_number') }}">
									@error('official_company_number')
									<div class="error-alert">{{ $message }}</div>
									@enderror
								</div>

								<!--/ website-->
								<div class="form-group">
									<label for="website">Company Website</label>
									<input type="text" class="form-control form-control-sm" name="company_website" id="website"
										placeholder="Enter website" value="{{ old('company_website') ?? $setting->company_website }}">
								</div>
								<!--/.website-->

								{{-- <div class="form-group">
									<label for="currency_id">Currency</label>
									<select
										class="form-control form-control-sm @error('currency_id') is-invalid @enderror"
										name="currency_id" id="currency_id">
										<option value="">--Select--</option>
										@foreach($currencies as $currency)
										<option value="{{ $currency->id }}" {{ $currency->id == $currency->id ? 'selected' : '' }}>{{ $currency->currency}}</option>
										@endforeach
									</select>
									@error('currency_id')
									<div class="error-alert">{{ $message }}</div>
									@enderror
								</div> --}}
								<div class="form-group">
									<button type="submit" class="btn bg-gradient-primary btn-sm">Submit</button>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Company Address <span class="star">*</span></label>
									<textarea class="form-control @error('address') is-invalid @enderror" rows="4"
										placeholder="Enter ..."
										name="address">{{ $setting->address  ?? old('address') }}</textarea>
									@error('address')
									<div class="error-alert">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group">
									<label for="mobleNumber">Mobile Phone Number</label>
									<input type="text" class="form-control form-control-sm" name="phone_number"
										id="mobleNumber" placeholder="Enter mobile number"
										value="{{ $setting->phone_number  ?? old('phone_number') }}">
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

			{{-- email settings --}}
			<div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
				<div class="card card-default">
					<div class="card-header">
						<h3 class="card-title">Email Settings</h3>
					</div>
					<!-- /.card-header -->
					<!-- form start -->
					<form role="form" action="/emailsettings/{{ $emailSetting->id }}" method="post">
						@method('PATCH')
						@csrf
						<div class="card-body row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="email_sent_from_name">Email sent from name <span
											class="star">*</span></label>
									<input type="text"
										class="form-control form-control-sm @error('email_sent_from_name') is-invalid @enderror"
										name="email_sent_from_name" id="email_sent_from_name"
										placeholder="e.g name of your company"
										value="{{ $emailSetting->email_sent_from_name }}">
								</div>
								@error('email_sent_from_name')
								<div class="error-alert">{{ $message }}</div>
								@enderror

								<div class="form-group">
									<button type="submit" class="btn bg-gradient-primary btn-sm">Submit</button>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="email">Email <span class="star">*</span></label>
									<input type="email"
										class="form-control form-control-sm @error('email') is-invalid @enderror"
										name="email" id="email" placeholder="Enter email"
										value="{{ $emailSetting->email }}">
								</div>
								@error('email')
								<div class="error-alert">{{ $message }}</div>
								@enderror
							</div>
						</div>
					</form>
					<div class="pb-4"></div>
					<!-- email templates-->
					<div class="card-header email-header">
						<h3 class="card-title">Email Templates</h3>
						<div class="card-tools">
							<div class="input-group input-group-sm" style="width: 150px;">
								<button type="submit" class="btn bg-gradient-primary btn-sm" data-toggle="modal"
									data-target="#email-template">Add Email Template</button>
							</div>
						</div>
					</div>
					<div class="card-body table-responsive p-0">
						<table class="table table-hover text-nowrap">
							<thead>
								<tr>
									<th>Title</th>
									<th>Action</th>
								</tr>
							</thead>
							@foreach($emailtemplates as $emailtemplate)
							<tbody>
								<tr>
									<td>{{$emailtemplate->title}}</td>
									<td>
										<a href="/email-templates/{{$emailtemplate->id}}" class="view-email">
											<i class="fas fa-eye" title="View"></i>
										</a>
									</td>
								</tr>
							</tbody>
							@endforeach
						</table>
					</div>
				</div>
			</div>

			<div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
				<!-- roles -->
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Roles</h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body table-responsive p-0">
						<table class="table table-hover text-nowrap">
							<thead>
								<tr>
									<th>Title</th>
									{{-- <th>Action</th> --}}
								</tr>
							</thead>
							@foreach($roles as $role)
							<tbody>
								<tr>
									<td>{{$role->role}}</td>
									{{-- <td>
										<a href="/roles/{{ $role->id }}" class="view-email" data-toggle="modal"
									data-target="#role-model"><i class="fas fa-eye"></i></a>
									</td> --}}
								</tr>
							</tbody>
							@endforeach
						</table>
					</div>
					<!-- /.card-body -->
				</div>
			</div>
			<div class="tab-pane fade" id="vert-tabs-settings" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
				dahkdjg
			</div>
		</div>
	</div>
</div>
@include('models.email-template')
@include('models.role')

@endsection