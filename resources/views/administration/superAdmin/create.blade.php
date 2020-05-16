@extends('layouts.masterAuth')

@section('title', 'Super Admin')

@section('content')
<!-- form data -->
	<div class="register-logo">
  		@if($setting->logo)
			<img src="{{ asset('storage/' . $setting->logo) }}" alt="company logo" class="brand-image img-circle elevation-3" style="opacity: .8" width="100" height="100">
		@else
			<img src="{{ asset('images/profiles/profile.png') }}" alt="company logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		@endif
	</div>

	<div class="card">
    	<div class="card-body register-card-body">
      		<p class="login-box-msg">Only <b><u>SUPER ADMIN</u></b> can access this page</p>

      		<form action="{{ route('super-admin.store') }}" method="post">
      			@csrf
        		<div class="input-group mb-3">
          			<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" placeholder="Full name" autofocus>
          			<div class="input-group-append">
            			<div class="input-group-text">
              				<span class="fas fa-user"></span>
            			</div>
          			</div>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
        		</div>
        		<div class="input-group mb-3">
          			<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email">
          			<div class="input-group-append">
            			<div class="input-group-text">
              				<span class="fas fa-envelope"></span>
            			</div>
          			</div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
        		</div>
        		<div class="input-group mb-3">
          			<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Password">
          			<div class="input-group-append">
            			<div class="input-group-text">
              				<span class="fas fa-lock"></span>
            			</div>
          			</div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
        		</div>
        		<div class="input-group mb-3">
          			<input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Retype password">
          			<div class="input-group-append">
            			<div class="input-group-text">
              				<span class="fas fa-lock"></span>
            			</div>
          			</div>
        		</div>
        		<div class="row">
          			<div class="col-8">
            			<div class="icheck-primary">
              				<input type="checkbox" id="agreeTerms" name="terms" value="agree">
              				<label for="agreeTerms">
               					I agree to the <a href="#">terms</a>
              				</label>
            			</div>
          			</div>
          			<!-- /.col -->
          			<div class="col-4">
            			<button type="submit" class="btn btn-primary btn-block">Sign up</button>
          			</div>
          			<!-- /.col -->
        		</div>
      		</form>

      		<div class="social-auth-links text-center">
        		<p>- OR -</p>
        		<a href="#" class="btn btn-block btn-primary">
          			<i class="fab fa-facebook mr-2"></i>
          			Sign up using Facebook
        		</a>
        		<a href="#" class="btn btn-block btn-danger">
          			<i class="fab fa-google-plus mr-2"></i>
          				Sign up using Google+
        		</a>
      		</div>

      		<a href="{{ route('login') }}" class="text-center">I already have a membership</a>
		</div>
    	<!-- /.form-box -->
	</div><!-- /.card -->
@endsection