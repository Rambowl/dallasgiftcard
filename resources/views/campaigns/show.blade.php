@extends('layouts.app')

@section('content')
	<div class="flex justify-center w-full h-full">
		<design-campaign 
			id="{{ $campaign->id }}" 
			title="{{ $campaign->title }}" 
			description="{{ $campaign->description }}"
			type="{{ $campaign->type }}"
			csrf="{{ csrf_token() }}"
			template="{{ $campaign->template }}">
		</design-campaign>
		
</div>
@endsection
