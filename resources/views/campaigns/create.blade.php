@extends ('layouts.app')

@section('content')
<form method="POST" action="/campaigns">
	@csrf

	<div class="flex justify-center w-full">
		<div class="flex flex-col bg-gray-300 border border-gray-500 p-4 w-10/12">
			<div class="mb-5">
				<label for="title" placeholder="" class="flex flex-col text-xl mb-2">Campaign Title</label>
				<input type="text" 
				id="title" 
				name="title" 
				class="
					@error('title')
						border border-red-600 
				   	@else 
						border border-gray-500 
					@enderror
						rounded p-1 w-full">

				@error('title')
					<p class="text-red-600 text-sm mt-2 italic">{{ $errors->first('title') }}</p>
				@enderror
			</div>
			<div class="mb-4">
				<label for="description" class="flex flex-col text-xl mb-2">Description</label>
				<textarea id="description" name="description" class="textarea border border-gray-500 rounded p-1 w-full"></textarea>
			</div>	

			<footer class="flex justify-end mt-5">
				<button type="submit" class="button border border-blue-700 block rounded py-2 px-5 bg-blue-600 text-blue-100">Create</button>
			</footer>		
		</div>
	</div>
</form>
@endsection