@extends('layouts.app');

@section('content')
	<form method="POST" action="/campaigns/{{ $campaign->id }}">
		@csrf
		@method('PUT')

		@include('campaigns.form', [
			'campaigns' => $campaign,
			'businesses' => [],
			'businessName' => $businessName,
			'buttonText' => 'Update'
		])
		
	</form>
@endsection