@extends('layouts.app')

@section('content')
	<div class="flex justify-center w-full">
		<div class="bg-gray-300 flex-col border border-gray-500 rounded w-10/12">		
			@if (count($businesses) === 0)
				<div class="px-4 py-3 justify-between items-center mr-3 text-red-700 text-xl mt-3">
					You have to add your business before you can create a 'Campaign'. Click <a href="businesses" class="text-blue-600 underline">here</a> to add your  business.
				</div>
			@endif
			
			<div class="flex flex-row px-4 py-5 justify-between items-center mb-3 mr-3">
				<div class="text-3xl">Campaign Management</div>
				<div>
					
					@if (count($businesses) > 0)
						@foreach ($businesses as $business)
						@php
							$busInfo[] = $business->business_name;
						@endphp
							
						@endforeach					
						<a href="campaigns/create" class="button border border-blue-300 block rounded py-2 px-5 text-blue-100 bg-blue-600" @click.prevent="$modal.show('new-campaign', 		
							{
								businesses: '{{ json_encode($businesses) }}'
							})">
							New Campaign</a></div>

					@else
						<a class="button border border-blue-300 block rounded py-2 px-5 text-blue-100 bg-blue-600 cursor-not-allowed opacity-50">
							New Campaign</a></div>
					@endif
			</div>

			<!-- campaign cards -->
			<div class="lg:flex lg:flex-wrap mx-3">
				@forelse ($campaigns->sortByDesc('updated_at') as $campaign)

					<div class="lg:w-1/4 px-3 pb-6 bg-indigo-200 border rounded-lg m-3">
						@include('campaigns.card')
					</div>
				@empty
					<div class="ml-4 mb-4">
						There are no campaigns. Please create some.
					</div>
				@endforelse
			</div>
		</div>
		<new-campaign-modal></new-campaign-modal>
	</div>
	
@endsection