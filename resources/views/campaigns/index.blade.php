@extends('layouts.app')

@section('content')
	
		<h1>Campaigns</h1>
	<div>
		@forelse ($campaigns as $campaign)
			<div>
				{{ $campaign->title }}
			</div>
		@empty
			<div>
				There are no campaigns. Please create some.
			</div>
		@endforelse
	</div>

@endsection