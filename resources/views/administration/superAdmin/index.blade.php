@foreach( $users as $user)
	<ul>
		<li>
			{{ $user->name }} | {{ $user->email }}
		</li>
	</ul>
@endforeach