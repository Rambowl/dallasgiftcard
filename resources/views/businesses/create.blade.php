@extends('layouts.app')

@section('content')
<form method="POST" action="/businesses">
	@include('businesses.form', [
		'buttonText' => 'Create'
	])
</form>
	
@endsection