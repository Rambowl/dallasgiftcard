@extends('layouts.app')

@section('content')
	<div class="flex justify-center w-full">
		<div class="bg-gray-300 flex-col border border-gray-500 rounded w-10/12">
			<div class="flex flex-row px-4 py-5 justify-between items-center mb-3 mr-3">
				<div class="text-3xl">Campaign Management</div>
				<div><a href="\campaigns\create" class="button border border-blue-300 block rounded py-2 px-5 bg-blue-600 text-blue-100">New Campaign</a></div>
			</div>

			<!-- table cols -->
			@if (count($campaigns) > 0)
				<div class="text-xl bg-blue-500 text-white">
					<div class="flex w-full">
						<div class="px-3 border border-black p-2 w-2/6">
							Title		
						</div>
						<div class="border border-black p-2 w-1/6">
							Marketing Type
						</div>
						<div class="border border-black p-2 w-1/6">
							Current Status
						</div>
						<div class="border border-black p-2 w-1/6">
							Scheduled (Date, Time)
						</div>
						<div class="border border-black p-2 w-1/6">
							Last Update
						</div>
					</div>
				</div>
			@else
				<div class="ml-4 mb-4">
					There are no campaigns. Please create some.
				</div>
			@endif

			<!-- table data -->
			<div class="text-base xl:text-xl">
				@foreach ($campaigns->sortByDesc('updated_at') as $campaign)
					<div class="flex border border-blue-500 py-2 w-full">
						<div class="px-6 w-2/6">
							<a href="/campaigns/{{ $campaign->id }}" class="hover:text-blue-400">
								{{ $campaign->title }}
							</a>
						</div>
						<div class="px-3 w-1/6">
							{{ $campaign->type }}
						</div>
						<div class="px-3 w-1/6">
							Draft
						</div>
						<div class="px-3 w-1/6">
							T.B.D.
						</div>
						<div class="px-3 w-1/6">
							{{ $campaign->getMyDateFormat($campaign->id) }}
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection