@extends('front-client.layouts.masterClient')

{{-- @section('title', $service->title) --}}

@section('content')

<h4><i>Nutritional tip of the day...</i></h4>
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
                 <div>
                    <img src="{{ asset('storage/' . $tip->image) }}" alt="" width="800" height="400" align="center">
                </div>
                <!-- /.attachment-block -->
                <br>
                <!-- post text -->
                <div>
                  <p>{!! $tip->post !!}</p>
                </div>

                <!-- Social sharing buttons -->
                {{-- <button type="button" class="btn btn-default btn-sm"><i class="far fa-thumbs-up"></i> Like</button> --}}
                {{-- <span class="float-right text-muted">45 likes - 2 comments</span> --}}
              </div>
              <!-- /.card-body -->
              <div class="card-footer card-comments" style="display: block;">
                <div class="card-comment">
                  <!-- User image -->
                  @foreach($tip->nutritionalcomments as $comment)
                  {{-- <img src="{{ asset('storage/' . $comment->user->profile_image) }}" class="img-fluid img-circle img-sm" alt="Image"> --}}
                  @if($comment->user->profile_image != null)
                    <img src="{{ asset('storage/' . $comment->user->profile_image) }}" class="img-fluid img-circle img-sm" alt="Image">

                    @else
                        <img src="{{ asset('images/profiles/profile.png') }}" class="img-fluid img-circle img-sm" alt="Image">
                            {{-- {{ Auth::user()->name }} <span class="caret"></span> --}}
                    @endif

                  <div class="comment-text">
                    <span class="username">
                            {{ $comment->user->name }}
                      <span class="text-muted float-right"><i class="far fa-clock"></i> {{ $comment->created_at->diffForHumans() }}</span>
                    </span><!-- /.username -->
                    {{ $comment->comment }}
                  </div>
                  <hr>
                @endforeach
                  <!-- /.comment-text -->
                </div>
                <!-- /.card-comment -->
              </div>
              <!-- /.card-footer -->
              <div class="card-footer" style="display: block;">
                <form action="{{ route('nutrition-comment.store', ['tip' => $tip]) }}" method="post">
                  @csrf
                    @if(Auth::user()->client->profile_image != null)
                    <img src="{{ asset('storage/' . Auth::user()->client->profile_image) }}" class="img-fluid img-circle img-sm" alt="Image">

                    @else
                        <img src="{{ asset('images/profiles/profile.png') }}" class="img-fluid img-circle img-sm" alt="Image">
                            {{-- {{ Auth::user()->name }} <span class="caret"></span> --}}
                    @endif
                  <!-- .img-push is used to add margin to elements next to floating images -->
                  <div class="img-push">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-sm" name="comment" placeholder="Enter your comment here">
                    </div>
                    <button type="submit" class="btn bg-gradient-primary btn-sm">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card-footer -->
            </div>

@endsection