@extends('layouts.master')

@section('title', 'Services')

@section('content')
	<div class="card">
              <div class="card-header">
                <h3 class="card-title">Details for {{ $service->title }}</h3>

                <div class="card-tools">

                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
				<td>{{$service->title}}</td>
				<td>{{$service->available_seats}}</td>
				<td>{{$service->status}}</td>
				<td>{{$service->service_duration_type}}</td>
				<td>{{$service->price}}</td>
				<td>{{$service->days}}</td>
              </div>
              <!-- /.card-body -->
            </div>


@endsection