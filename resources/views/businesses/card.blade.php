<div class="card flex flex-col" style="height: 210px;">
	<h3 class="font-normal text-xl mb-3 py-3 -ml-5 border-l-4 border-green-600 pl-3">
		<div class="flex justify-between">
			<div class="flex justify-start">
				{{ $business->business_name }}
			</div>
			<div class="flex justify-end">
				<a href="{{ $business->path().'/edit' }}" class="text-default hover:no-underline text-lg hover:text-blue-500" @click.prevent="$modal.show('new-business', {
					business_id: '{{ $business->id }}',
					business_name: '{{ addslashes($business->business_name) }}',
					address_1: '{{ addslashes($business->address_1) }}',
					address_2: '{{ addslashes($business->address_2) }}',
					city: '{{ addslashes($business->city) }}',
					state: '{{ addslashes($business->state) }}',
					zip_code: '{{ addslashes($business->zip_code) }}',
					phone_1: '{{ addslashes($business->phone_1) }}',
					phone_2: '{{ addslashes($business->phone_2) }}',
					fax: '{{ addslashes($business->fax) }}',
					email: '{{ addslashes($business->email) }}',
					website: '{{ addslashes($business->website) }}',
					description: '{{ addslashes($business->description) }}'
				})">
					Edit
				</a>
			</div>
		</div>
	</h3>
	<div class="flex flex-1">
		{{-- logo on left  --}}
		<div class="w-1/3 mr-4 flex-shrink-0">
			<div slot="activator">
				<a href="{{ $business->path().'/images/upload' }}"><img src="{{ $business->logo ? '/images/' . $business->id . '/' . $business->logo : '/images/addBusinessLogo.png' }}" alt="Add business logo" width="150" height="150"></a>
			</div>
		</div>
		{{-- business info on right --}}
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
	<footer class="flex justify-end">
		<form method="POST" onsubmit="{{ (App\Campaign::where('business_id', $business->id)->count() > 0) ? "Swal.fire({
			  icon: 'error',
			  title: 'Delete Failed!',
			  text: 'There are Campaigns associated with this Business.',
			});return false;" : "return confirm('Are you sure you want to delete?')" }}" action="{{ $business->path() }}">
			@method('DELETE')
			@csrf

			<button type="submit" class="text-default hover:no-underline text-lg hover:text-blue-500">Delete</button>
		</form>
	</footer>
</div>