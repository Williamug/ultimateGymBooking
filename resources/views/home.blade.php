@extends('layouts.master')

@section('title', 'Home')

@section('content')
      <div class="container-fluid">
    <!-- for box-->
      <div class="row">
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
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Clients</span>
                <span class="info-box-number">{{ $clients->count() }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fas fa-user-clock"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pending bookings</span>
                <span class="info-box-number">{{ $pendingBooking->count() }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>

      <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Monthly booking overview</h3>

                  <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  {{-- <p class="d-flex flex-column">
                    <span class="text-bold text-lg">{{ $totalBooking->count() }}</span>
                    <span>Bookings Over Time</span>
                  </p> --}}
                  {{-- <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 12.5%
                    </span>
                    <span class="text-muted">Since last week</span>
                  </p> --}}
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  {{-- <canvas id="visitors-chart" height="200" width="445" class="chartjs-render-monitor" style="display: block; width: 445px; height: 200px;"></canvas> --}}
                      {{-- Chart goes here --}}
                  {!! $bookingChart->renderHtml() !!}
                </div>
              </div>
            </div>
              <!-- ./card-body -->

              <!-- /.card-footer -->
            </div>
            <!-- /.card -->

            <!-- Sales overview-->
            <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">{{ $salesChart->options['chart_title'] }}</h3>

                  <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  {{-- <p class="d-flex flex-column">
                    <span class="text-bold text-lg">
                        Shs. {{ $totalPayments }}
                    </span>
                    <span>Sales Over Time</span>
                  </p> --}}
                 {{--  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 12.5%
                    </span>
                    <span class="text-muted">Since last month</span>
                  </p> --}}
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  {!! $salesChart->renderHtml() !!}
                </div>
              </div>
            </div>
            <!-- /.card -->


            <!-- /.card -->
          </div>


        <div class="col-8">
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
                  {{ Str::limit(strip_tags($tip->post), 100) }}
                  {{-- @if(strlen(strip_tags($tip->post)) > 50)<a href="{{ route('instructor-post.show', ['tip' => $tip]) }}">Read More</a> --}}
                  {{-- @endif --}}
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
        </div>
          <!-- latest members-->
          <div class="col-4">
          <div class="pb-4"></div>
            <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Clients</h4>

                    <div class="card-tools">
                      <small class="badge badge-danger">{{ $clients->count() }} Clients</small>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
                      @foreach($clients as $client)
                          <li>
                            @if($client->profile_image)
                                <img class="profile-user-img img-fluid img-circle" src="{{ asset('storage/' . $client->profile_image) }}" alt="User profile picture">
                            @else
                                <img class="profile-user-img img-fluid img-circle" src="{{ asset('images/profiles/profile.png') }}" alt="User profile picture">
                            @endif
                          <a class="users-list-name" href="{{ route('clients.show', ['client' => $client]) }}">{{ $client->user->name }}</a>
                          <span class="users-list-date">{{ $client->user->created_at->diffForHumans() }}</span>
                        </li>
                      @endforeach
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="{{ route('clients.index') }}">View All Users</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
          </div>
          <!-- /.col -->



          </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
@endsection
@section('js')
  {!! $bookingChart->renderChartJsLibrary() !!}
{!! $bookingChart->renderJs() !!}
{!! $salesChart->renderJs() !!}
@endsection