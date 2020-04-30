@extends('layouts.master')

@section('content')
{{ $settings->company_name }}
	{{$settings->currency->id }}
	@endsection

