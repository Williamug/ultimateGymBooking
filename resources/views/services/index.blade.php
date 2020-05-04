@extends('layouts.master')

@section('title', 'Services')

@section('content')
	<div class="card">
              <div class="card-header">
                <h3 class="card-title">Services</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <button type="submit" class="btn bg-gradient-primary btn-sm">Add <i class="fas fa-plus"></i></button>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Available Seats</th>
                      <th>Status</th>
                      <th>Duration Type</th>
                      <th>Price</th>
                      <th>Days</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  	@foreach($services as $service)
	                  	<tbody>
	                    	<tr>
	                      		<td>{{$service->title}}</td>
								<td>{{$service->available_seats}}</td>
								<td>{{$service->status}}</td>
								<td>{{$service->service_duration_type}}</td>
								<td>{{$service->price}}</td>
								<td>{{$service->days}}</td>
								<td>
									<a href="/services/{{ $service->title }}" class="email-view">
										<i class="fas fa-eye"></i>
									</a>
								</td>
	                      	</tr>
	                  	</tbody>
					@endforeach
                </table>
              </div>
              <!-- /.card-body -->
            </div>
@endsection