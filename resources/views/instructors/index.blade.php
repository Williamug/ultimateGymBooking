@extends('layouts.master')

@section('title', 'Instructors')

@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">{{ session()->get('message') }}</div>
@endif
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Instructors</h3>

		<div class="card-tools">
			<div class="input-group input-group-sm" style="width: 150px;">
				<a href="{{ route('instructors.create') }}" class="btn bg-gradient-primary btn-sm">Add New Instructor <i
						class="fas fa-plus"></i></a>
			</div>
		</div>
	</div>
	<!-- /.card-header -->
	<div class="card-body table-responsive p-0">
		<table class="table table-hover text-nowrap">
			<thead>
				<tr>
					<th>First Name</th>
					<th>Email</th>
					<th>Gender</th>
					<th>Phone Number</th>
					<th>Verified</th>
					<th>Joined On</th>
					<th>Action</th>
				</tr>
			</thead>
			@foreach($instructors as $instructor)
			<tbody>
				<tr>
					<td>{{$instructor->user->name}}</td>
					<td>{{$instructor->user->email}}</td>
					<td>{{$instructor->gender}}</td>
					<td>{{$instructor->phone_number}}</td>
					<td>
						@if($instructor->user->email_verified_at !== null)
						<small class="badge badge-primary">Verified</small>
						@else
						<small class="badge badge-warning">Pending</small>
						@endif
					</td>
					<td>{{ Carbon\Carbon::parse($instructor->user->created_at)->format('d M Y') }}</td>

					<td>
                        <div class="row">
                            <div class="col-md-6">
						          <a href="{{ route('instructors.show', ['instructor' => $instructor]) }}" title="View" class="btn bg-gradient-primary btn-sm">
							         <i class="fas fa-eye"></i>
						          </a>
                            </div>
                            <div class="">
                                <form action="{{ route('instructors.destroy', ['instructor' => $instructor]) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn bg-gradient-danger btn-sm" title="Delete">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
					</td>
				</tr>
			</tbody>
			@endforeach
		</table>

		<div class="ml-4 mt-4">{{ $instructors->links() }}</div>
</div>
<!-- /.card-body -->
</div>

@include('models.services')
@endsection