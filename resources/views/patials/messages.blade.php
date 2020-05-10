@if(session()->has('success-message'))
<div class="alert alert-success"><strong>Success:</strong> {{ session()->get('success-message')}}</div>
@elseif(session()->has('info-message'))
<div class="alert alert-info"><strong>Info:</strong> {{ session()->get('info-message')}}</div>
@elseif($errors->any())
<div class="alert alert-danger">
	Oops! Something went wrong, please check your form and try again
</div>
@endif