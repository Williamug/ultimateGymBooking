@if(session()->has('success-message'))
	<div class="alert alert-success"><strong>Success:</strong> {{ session()->get('success-message')}}</div>
@elseif(session()->has('info-message'))
	<div class="alert alert-info"><strong>Info:</strong> {{ session()->get('info-message')}}</div>
@endif