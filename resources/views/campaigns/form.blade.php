@csrf

<div class="flex justify-center w-full">
	<div class="flex flex-col bg-gray-300 border border-gray-500 p-4 w-1/2">
		<div class="text-3xl mb-6">
			Create a Campaign
		</div>
		<div class="control flex mb-5 items-center">
			<label for="type" class="text-xl mb-2 mr-3">Campaign Type:</label>

			
			
			<!-- if there is value within businesses (this is a create) -->
			@if (!empty($businesses))
				<select name="type" class="p-2 border border-blue-700">
					<option value="Newsletter">Newsletter</option>
					<option value="Buy Now">Buy Now</option>
					<option value="Promotion">Promotion</option>
				</select>

				<label for="businesses" class="text-xl mb-2 ml-8 mr-3">For Business:</label>

				<select name="businesses" class="p-2 border border-blue-700">
					@foreach ($businesses as $business)
						<option value="{{ $business->id }}">{{ $business->business_name }}</option>
					@endforeach
				</select>
			<!-- else this is an edit; use input instead of select -->
			@else
				<input type="text" name="type" class="p-2 border border-blue-700 opacity-50" value="{{ $campaign->type }}" disabled>
				<label for="businesses" class="text-xl mb-2 ml-8 mr-3">For Business:</label>
				
				<input type="text" name=businesses value="{{ $businessName }}" class="p-2 border border-blue-700 bg-white opacity-50" disabled>
			@endif
		</div>

		<div class="control mb-4">
			<label for="title" class="flex flex-col text-xl mb-2">Campaign Title</label>
			<input type="text" 
			id="title" 
			name="title" 
			class="
				@error('title')
					border border-red-600 
			   	@else 
					border border-gray-500 
				@enderror
					rounded p-1 w-full"
			value="{{ $campaign->title ?? old('title') }}">

			@error('title')
				<p class="text-red-600 text-sm mt-2 italic">{{ $errors->first('title') }}</p>
			@enderror
		</div>
		<div class="control mb-4">
			<label for="description" class="flex flex-col text-xl mb-2">Description</label>
			<textarea id="description" name="description" class="textarea 
				@error('description')
					border border-red-600 
			   	@else 
					border border-gray-500 
				@enderror
					rounded p-1 w-full">{{ $campaign->description ?? old('description') }}</textarea>

			@error('description')
				<p class="text-red-600 text-sm mt-2 italic">{{ $errors->first('description') }}</p>
			@enderror
		</div>	

		<footer class="flex justify-end mt-5">
			<button type="submit" class="button border border-blue-700 block rounded py-2 px-5 bg-blue-600 text-blue-100">{{ $buttonText }}</button>
		</footer>		
	</div>
</div>