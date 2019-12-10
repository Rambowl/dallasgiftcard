@extends('layouts.app');

@section('content')
	<form method="POST" action="/campaigns/{{ $campaign->id }}">
		@csrf
		@method('PUT')

		@include('campaigns.form', [
			'businesses' => [],
			'buttonText' => 'Update'
		])
		
	</form>
@endsection