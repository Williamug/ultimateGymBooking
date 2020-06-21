@extends('front-instructor.layouts.masterInstructor')

@section('title', 'Home')

@section('content')
     <div class="container-fluid">
		{{-- <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-chart-bar"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total bookings</span>
                <span class="info-box-number">{{ $totalBooking->count() }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fas fa-handshake"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Confirmed bookings</span>
                    <span class="info-box-number">{{ $confirmedBooking->count() }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          /.col

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fas fa-user-clock"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pending bookings</span>
                <span class="info-box-number">{{ $pendingBooking->count() }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fas fa-times"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Cancelled bookings</span>
                <span class="info-box-number">{{ $cancelBooking->count() }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div> --}}

	<!-- Nutritional tip -->
		<br><br>
		<h4><i>Nutritional tip of the day...</i></h4>

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
                  @if(strlen(strip_tags($tip->post)) > 50)<a href="{{ route('instructor-post.show', ['tip' => $tip]) }}">Read More</a>
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
       <div class="ml-4 mt4">{{ $nutritionalTips->links() }}</div>
</div><!-- /.container-fluid -->
@endsection