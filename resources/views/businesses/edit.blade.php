@extends('layouts.app')

@section('content')
	<form method="POST" action="/businesses/{{ $business->id }}">
		@csrf
		@method('PUT')

		@include('businesses.form', [
			'buttonText' => 'Update'
		])
	</form>
@endsection