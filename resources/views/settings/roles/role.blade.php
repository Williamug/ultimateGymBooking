@extends('layouts.master')

@section('title', 'Roles')

@section('content')
<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Roles</h3>
	</div>
	<div class="card-body row">
		<div class="col-3 col-sm-8">
			<div>
				<p>{{$role->role}}</p>
			</div>
		</div>
		<div class="col-9 col-sm-4">
			<div class="row">
				<div class="col-4 col-sm-1 mr-5">
					<div>
						<a href="http://127.0.0.1:8000/settings" class="btn bg-gradient-primary btn-sm">Back</a>
					</div>
				</div>
				<div class="col-5 col-sm-3">
					<div class="flex">
						<form action="/roles/{{$role->id}}" method="post">
							@method('DELETE')
							@csrf
							<button type="submit" class="btn bg-gradient-danger btn-sm">Delete</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection