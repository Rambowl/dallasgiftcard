@extends('layouts.app')

@section('content')
	<div class="flex justify-center w-full">
		<div class="bg-gray-300 flex-col border border-gray-500 rounded w-10/12">
			<div class="flex flex-row px-4 py-5 justify-between items-center mb-3 mr-3">
				<div class="text-3xl">Campaign Management</div>
				<div><a href="\campaigns\create" class="button border border-blue-300 block rounded py-2 px-5 bg-blue-600 text-blue-100">New Campaign</a></div>
			</div>
				
			<div class="text-xl px-4">
				@forelse ($campaigns as $campaign)
					<div class="mb-4">
						<a href="/campaigns/{{ $campaign->id }}" class="hover:text-blue-400">
							{{ $campaign->title }}
						</a>
					</div>
				@empty
					<div class="mb-4">
						There are no campaigns. Please create some.
					</div>
				@endforelse
			</div>
		</div>
	</div>
@endsection