@csrf

<div class="flex justify-center w-full">
	<div class="flex flex-col bg-gray-300 border border-gray-500 p-4 w-1/3">
		<div class="text-3xl mb-6">
			Your Business Information
		</div>
		
		<div class="mb-4">
			<label for="business_name" class="flex flex-col text-xl mb-2">Business Name</label>
			<input type="text" 
			name="business_name" 
			class="
				@error('business_name')
					border border-red-600 
			   	@else 
					border border-gray-500 
				@enderror
					rounded p-1 w-full"
			value="{{ $business->business_name ?? old('business_name') }}">

			@error('business_name')
				<p class="text-red-600 text-sm mt-2 italic">{{ $errors->first('business_name') }}</p>
			@enderror
		</div>
		<div class="mb-4">
			<label for="address_1" class="flex flex-col text-xl mb-2">Address Line 1</label>
			<input name="address_1" type="text" class=" 
				@error('address1')
					border border-red-600 
			   	@else 
					border border-gray-500 
				@enderror
					rounded p-1 w-full"
					value="{{ $business->address_1 ?? old('address_1') }}">

			@error('address_1')
				<p class="text-red-600 text-sm mt-2 italic">{{ $errors->first('address_1') }}</p>
			@enderror
		</div>
		<div class="mb-4">
			<label for="address_2" class="flex flex-col text-xl mb-2">Address Line 2</label>
			<input name="address_2" type="text" class="border border-gray-500 rounded p-1 w-full" value="{{ $business->address_2 ?? old('address_2') }}">

			@error('address_2')
				<p class="text-red-600 text-sm mt-2 italic">{{ $errors->first('address_2') }}</p>
			@enderror
		</div>	
		<div class="mb-4">
			<div class="flex">
				<label for="city" class="flex flex-col text-xl mb-2 w-1/3">City</label>
				<label for="state" class="flex flex-col text-xl mb-2 w-1/3">State</label>
				<label for="zip_code" class="flex flex-col text-xl mb-2 w-1/3">Zip Code</label>
			</div>
			<div class="flex">
				<input name="city" type="text" class ="border border-gray-500 rounded p-1 mr-2 w-1/3" value="{{ $business->city ?? old('city') }}">
				<input name="state" type="text" class ="border border-gray-500 rounded p-1 mr-2 w-1/3" value="{{ $business->state ?? old('state') }}">
				<input name="zip_code" type="text" class ="border border-gray-500 rounded p-1 mr-2 w-1/3" value="{{ $business->zip_code ?? old('zip_code') }}">
			</div>
			@error('city')
				<p class="text-red-600 text-sm mt-2 italic">{{ $errors->first('city') }}</p>
			@enderror
			@error('state')
				<p class="text-red-600 text-sm mt-2 italic">{{ $errors->first('state') }}</p>
			@enderror
			@error('zip_code')
				<p class="text-red-600 text-sm mt-2 italic">{{ $errors->first('zip_code') }}</p>
			@enderror
		</div>
		<div class="mb-4">
			<div class="flex">
				<label for="phone_1" class="flex flex-col text-xl mb-2 w-1/2">Primary Phone #</label>
				<label for="phone_2" class="flex flex-col text-xl mb-2 w-1/2">Secondary Phone #</label>
			</div>
			<div class="flex">
				<input type="tel" name="phone_1" pattern="[0-9]{10}"
				placeholder="1234567890"
				class ="border border-gray-500 rounded p-1 mr-2 w-1/2"
				value="{{ $business->phone_1 ?? old('phone_1') }}">
				<input type="tel" name="phone_2" pattern="[0-9]{10}" 
				placeholder="1234567890"
				class ="border border-gray-500 rounded p-1 mr-2 w-1/2"
				value="{{ $business->phone_2 ?? old('phone_2') }}">

				@error('phone_1')
					<p class="text-red-600 text-sm mt-2 italic">{{ $errors->first('phone_1') }}</p>
				@enderror
				@error('phone_2')
					<p class="text-red-600 text-sm mt-2 italic">{{ $errors->first('phone_2') }}</p>
				@enderror
			</div>
		</div>
		<div class="mb-4">
			<label for="fax" class="flex flex-col text-xl mb-2">Fax #</label>
			<input type="tel" name="fax" pattern="[0-9]{10}" 
				placeholder="1234567890"
				class ="border border-gray-500 rounded p-1 mr-2 w-1/2"
				value="{{ $business->fax ?? old('fax') }}">

				@error('fax')
					<p class="text-red-600 text-sm mt-2 italic">{{ $errors->first('fax') }}</p>
				@enderror
		</div>
		<div class="mb-4">
			<label for="email" class="flex flex-col text-xl mb-2">Business E-Mail Address</label>
			<input type="text" name="email" class ="border border-gray-500 rounded p-1 mr-2 w-full"
			value="{{ $business->email ?? old('email') }}">

			@error('email')
				<p class="text-red-600 text-sm mt-2 italic">{{ $errors->first('email') }}</p>
			@enderror
		</div>
		<div class="mb-4">
			<label for="website" class="flex flex-col text-xl mb-2">Website</label>
			<input type="text" name="website" placeholder="www.mybusinesswebsite.com" class ="border border-gray-500 rounded p-1 mr-2 w-full"
			value="{{ $business->website ?? old('website') }}">
		</div>
		<div class="mb-4">
			<label for="description" class="flex flex-col text-xl mb-2">Brief Description Of Your Business</label>
			<textarea type="text" name="description" class ="border border-gray-500 rounded p-1 mr-2 w-full">{{ $business->description ?? old('description') }}</textarea>
		</div>

		<footer class="flex justify-end mt-5">
			<button type="submit" class="button border border-blue-700 block rounded py-2 px-5 bg-blue-600 text-blue-100">{{ $buttonText }}</button>
		</footer>		
	</div>
</div>