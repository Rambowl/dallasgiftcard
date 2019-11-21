@extends('layouts.app');

@section('content')
	<form method="POST" action="/campaigns/{{ $campaign->id }}">
		@csrf
		@method('PUT')

		<div class="flex justify-center w-full">
			<div class="flex flex-col bg-gray-300 border border-gray-500 p-4 w-10/12">
				<div class="mb-5">
					<label for="title" placeholder="" class="flex flex-col text-xl mb-2">Campaign Title</label>
					<input type="text" id="title" name="title" class="border border-gray-500 rounded p-1 w-full" value="{{ $campaign->title }}" required>
				</div>
				<div class="mb-4">
					<label for="description" class="flex flex-col text-xl mb-2">Description</label>
					<textarea id="description" name="description" class="textarea border border-gray-500 rounded p-1 w-full" required>{{ $campaign->description }}</textarea>
				</div>	

				<footer class="flex justify-end mt-5">
					<button type="submit" class="button border border-blue-700 block rounded py-2 px-5 bg-blue-600 text-blue-100">Update</button>
				</footer>		
			</div>
		</div>
	</form>
@endsection