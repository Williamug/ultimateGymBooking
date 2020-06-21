@extends('front-instructor.layouts.masterInstructor')

@section('title', 'Tip of the day')

@section('content')
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-10">
				<h4><i>Nutritional tip of the day...</i></h4>
			</div>
			<div class="pl-3">
				<a href="{{ route('instructor-post.create') }}" class="btn bg-gradient-primary btn-sm">Add a new tip <i class="fas fa-plus"></i></a>
			</div>
		</div>

        @foreach($nutritionalTips as $tip)
            <div class="card card-widget">
              <div class="card-header">
                <div class="user-block">
                    @if($tip->user->instructor->profile_image != null)
                        <img src="{{ asset('storage/' . $tip->user->instructor->profile_image) }}" class="img-circle elevation-1" alt="User Image" width="35" height="35">
                    @else
                        <img src="{{ asset('images/profiles/profile.png') }}" class="img-circle elevation-1" alt="User Image" width="35" height="35">
                            {{-- {{ Auth::user()->name }} <span class="caret"></span> --}}
                    @endif
                  <span class="username"><a href="#">{{ $tip->user->name }}</a></span>
                  <span class="description">Shared publicly - {{ $tip->created_at->diffForHumans() }}</span>
                </div>
                <!-- /.user-block -->
                <div class="card-tools">

                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>

                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
                <!-- post text -->
                <p>
                  {{ Str::limit(strip_tags($tip->post), 50) }}
                  @if(strlen(strip_tags($tip->post)) > 10)<a href="{{ route('instructor-post.show', ['tip' => $tip]) }}">Read More</a>
                  @endif
                </p>

                <!-- Attachment -->
                <div>

                </div>
                <!-- /.attachment-block -->

                <!-- Social sharing buttons -->
                {{-- <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button> --}}
                {{-- <span class="float-right text-muted">45 likes - 2 comments</span> --}}
              </div>
              <!-- /.card-body -->

            </div>
        @endforeach
  <div class="ml-4 mt-4">{{ $nutritionalTips->links() }}</div>
	</div>
@endsection