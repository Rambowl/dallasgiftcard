@extends('layouts.app')

@section('content')
	<h2>Campaigns</h2>
	<main>
		@forelse ($campaigns as $campaign)
			<div>
				{{ $campaign->title }}
			</div>
		@empty
			<div>
				There are no campaigns. Please create some.
			</div>
		@endforelse
	</main>

@endsection