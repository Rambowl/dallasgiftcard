@extends('layouts.app')

@section('content')
<div>
	<div class="flex justify-center w-full">
		<div class="bg-gray-300 flex-col border border-gray-500 rounded px-4 w-10/12">
			<div class="flex flex-row py-5 justify-between items-center mb-3 mr-3">
				<div class="text-3xl">{{ $business->business_name }}</div>
				<div><a href="\businesses\{{ $business->id }}\edit" class="button border border-blue-600 block rounded py-2 px-5 bg-blue-600 text-blue-100">Edit</a></div>
			</div>
				
			<div class="text-xl mb-4">
				{{ $business->address_1 }}
			</div>
		</div>
	</div>
</div>

@endsection