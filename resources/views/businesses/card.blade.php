<div class="card flex flex-col" style="height: 200px;">
	<h3 class="font-normal text-xl mb-3 py-3 -ml-5 border-l-4 border-green-600 pl-3">
		<div class="flex justify-between">
			<div class="flex justify-start">
				{{ $business->business_name }}
			</div>
			<div class="flex justify-end">
				<a href="{{ $business->path().'/edit' }}" class="text-default hover:no-underline text-lg hover:text-blue-500">
					Edit
				</a>
			</div>
		</div>
	</h3>
	<div class="flex"> 
		<div class="w-1/3 mr-4 flex-shrink-0">
			<a href=""><img src="{{ $business->logo ? '/images/logo.png' : '/images/addBusinessLogo.png' }}" alt="Add business logo" width="150" height="150"></a>
		</div>
		<div>
			<div>
				@if (isset($business->address_2))
					{{ ucwords($business->address_1) }}, 
					{{ ucwords($business->address_2) }}
				@else
					{{ ucwords($business->address_1) }} 
				@endif
			</div>
			<div>{{ ucwords($business->city) }}, {{ strtoupper($business->state) }} {{ $business->zip_code }}</div>
			<div>
				{{ substr($business->phone_1, 0, 3) . "." . substr($business->phone_1, 3, 3) . "." . substr($business->phone_1, 6) }}
			</div>

			@if (isset($business->phone_2))
			<div>

				{{ substr($business->phone_2, 0, 3) . "." . substr($business->phone_2, 3, 3) . "." . substr($business->phone_2, 6) }}
			</div>
			@endif

			@if (isset($business->fax))
			<div>
				{{ substr($business->fax, 0, 3) . "." . substr($business->fax, 3, 3) . "." . substr($business->fax, 6) }}
			</div>
			@endif
			

			<div class="text-default mb-4 flex-1">
				<div>{{ $business->website ?? '' }}</div>
			</div>
			<div>
				@if (isset($business->description) && strlen($business->description) > 50)
					{{ substr($business->description, 0, 47) ."..." }}
				@elseif (isset($business->description) && strlen($business->description) <= 50)
					{{ $business->description }}
				@endif
			</div>
		</div>
	</div>
</div>