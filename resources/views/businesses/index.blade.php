@extends('layouts.app')

@section('content')
	<div class="flex justify-center w-full">
		<div class="bg-gray-300 flex-col border border-gray-500 rounded w-10/12 p-2">
			<div class="flex flex-row px-4 py-5 justify-between items-center mb-3 mr-3">
				<div class="text-3xl">My Businesses</div>
				<div><a href="\businesses\create" class="button border border-blue-300 block rounded py-2 px-5 bg-blue-600 text-blue-100">Add Business</a></div>
			</div>

			<!-- if there are businesses.. show cards -->			
			<div class="lg:flex lg:flex-wrap mx-3">
				@forelse ($businesses->sortByDesc('business_name') as $business)
				<div class="lg:w-1/3 px-3 pb-6 bg-green-300 border rounded-lg m-3">
					@include('businesses.card')	
				</div>
				@empty
					<div class="ml-4 mb-4">
						You don't have a business to market. Please add one.
					</div>
				@endforelse
			</div>
		</div>
	</div>
@endsection