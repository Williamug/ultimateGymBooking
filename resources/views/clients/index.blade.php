@extends('layouts.master')

@section('title', 'Clients')

@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">{{ session()->get('message') }}</div>
@endif
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Clients</h3>

		<div class="card-tools">
			<div class="input-group input-group-sm" style="width: 150px;">
				<a href="{{ route('clients.create') }}" class="btn bg-gradient-primary btn-sm">Add New Client <i
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
					<th>Joined At</th>
					<th>Action</th>
				</tr>
			</thead>
			@foreach($clients as $client)
			<tbody>
				<tr>
					<td>{{$client->user->name}}</td>
					<td>{{$client->user->email}}</td>
					<td>{{$client->gender}}</td>
					<td>{{$client->phone_number}}</td>
					<td>
						@if($client->user->email_verified_at !== null)
						<small class="badge badge-primary">Verified</small>
						@else
						<small class="badge badge-warning">Pending</small>
						@endif
					</td>
					<td>{{ Carbon\Carbon::parse($client->user->created_at)->format('d M Y') }}</td>

					<td>
                        <div class="row">
                            <div class="col-md-6">
						          <a href="{{ route('clients.show', ['client' => $client]) }}" title="View" class="btn bg-gradient-primary btn-sm">
							         <i class="fas fa-eye"></i>
						          </a>
                            </div>
                            <div class="">
                                <form action="{{ route('clients.destroy', ['client' => $client]) }}" method="post">
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

		<div class="ml-4 mt-4">{{ $clients->links() }}</div>
</div>
<!-- /.card-body -->
</div>

@include('models.services')
@endsection