@extends('layouts.app')

@section('content')
	<div class="flex justify-center w-full">
		<div class="bg-gray-300 flex-col border border-gray-500 rounded w-10/12 p-2">
			<div class="flex flex-row px-4 py-5 justify-between items-center mb-3 mr-3">
				<div class="text-3xl">My Businesses</div>
				<div><a href="\businesses\create" class="button border border-blue-300 block rounded py-2 px-5 bg-blue-600 text-blue-100">Add Business</a></div>
			</div>

			<!-- table cols -->
			@if (count($businesses) > 0)
				<div class="text-xl bg-blue-500 text-white">
					<div class="flex w-full">
						<div class="px-3 border border-black p-2 w-1/12">
							Logo
						</div>
						<div class="border border-black p-2 w-2/12">
							Name of Business		
						</div>
						<div class="border border-black p-2 w-4/12">
							Address
						</div>
						<div class="border border-black p-2 w-2/12">
							Phone Numbers
						</div>
						<div class="border border-black p-2 w-3/12">
							Website
						</div>
						
					</div>
				</div>
			@else
				<div class="ml-4 mb-4">
					You don't have a business to market. Please add one.
				</div>
			@endif

			<!-- table data -->
			<div class="text-base">
				@foreach ($businesses->sortByDesc('name') as $business)
					<div class="flex border border-blue-500 py-2 w-full">
						<div class="px-6 w-1/12">
							{{ $business->logo ? 'Logo Exists' : 'No Logo' }}
						</div>
						<div class="px-3 w-2/12">
							<a href="{{ $business->name }}/{{ $business->id }}" class="hover:text-blue-400">
								{{ $business->business_name }}
							</a>
						</div>
						<div class="px-3 w-4/12">
							{{ ucwords($business->address_1) }}, 
							@if (isset($business->address_2))
								{{ ucwords($business->address_2) }}, 
							@endif
							@if (isset($business->city))
								{{ ucwords($business->city) }}, 
							@endif
							{{ strtoupper($business->state) }} {{ $business->zip_code }}
						</div>
						<div class="px-3 w-2/12">
							{{ $business->phone_1 }} 
							
							{{--  if there is a second phone number --}}
							@if ($business->phone_2)
								<br>{{ $business->phone_2 }}
							@endif
						</div>
						<div class="px-3 w-3/12">
							{{ $business->website }}
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection