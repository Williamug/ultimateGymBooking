@extends('front-instructor.layouts.masterInstructor')

@section('titl', 'Create a new tip')

@section('content')
	<div class="card card-default">
		<div class="card-header">
			<h3 class="card-title">Add a tip of the day</h3>
		</div>
		<div class="card-body">
			<form action="{{ route('instructor-post.store') }}" method="post" enctype="multipart/form-data">
				@csrf
				<div>
					<div class="form-group">
		                <label>Tip of the day</label>
		                <textarea class="form-control" rows="3" placeholder="Enter ..." name="post">{{old('post')}}</textarea>
		                @error('post')
		                	<div class="error-alert">{{ $message }}</div>
						@enderror
		              </div>

		              <div class="form-group">
						<label for="image">Image</label>
						<input type="file" class="form-control form-control-sm" name="image"
							id="image"
							value="{{ old('image') }}"  @error('image') is-invalid @enderror>
						@error('image')
							<div class="error-alert">{{ $message }}</div>
						@enderror
					</div>

		              <button type="submit" class="btn bg-gradient-primary btn-sm">Submit</button>
				</div>
			</form>
		</div>
	</div>
@endsection
@section('js')
	<script src="//cdn.ckeditor.com/4.14.1/basic/ckeditor.js"></script>
	<script>
		CKEDITOR.replace( 'post' );
	</script>
@endsection