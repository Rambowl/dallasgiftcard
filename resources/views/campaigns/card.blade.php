<div class="card flex flex-col" style="height: 200px;">
	<h3 class="font-normal text-xl mb-3 py-3 -ml-5 border-l-4 border-indigo-600 pl-3">
		<a href="{{ $campaign->path() }}" class="text-default hover:no-underline">{{ $campaign->title }}</a>
	</h3>

	<div class="text-default mb-4 flex-1">{{ $campaign->description }}</div>
	<div>Last Update: {{ $campaign->getMyDateFormat($campaign->id) }}</div>

</div>