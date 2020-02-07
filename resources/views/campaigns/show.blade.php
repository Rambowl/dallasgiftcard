@extends('layouts.app')

@section('content')
	<div class="flex justify-center w-full h-full">
		<design-campaign 
			id="{{ $campaign->id }}" 
			title="{{ $campaign->title }}" 
			description="{{ $campaign->description }}"
			type="{{ $campaign->type }}"
			template="{{ $campaign->template }}">
			
       		<form action="{{ $campaign->path() }}"
            	class="dropzone bg-yellow-200 m-2"
            	method="POST"
            	id="newsletterDropzone">
        		@csrf
        		@method('PUT')
            	@error('file')

            	<p class="text-red-600 text-sm mt-2 italic">{{ $errors->first('file.message') }} </p>
            	@enderror  
        	</form>
		</design-campaign>	
	</div>
@endsection
