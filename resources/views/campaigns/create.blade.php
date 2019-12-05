@extends ('layouts.app')

@section('content')
<form method="POST" action="/campaigns">
	@include('campaigns.form', [ 
		'businesses' => $businesses,
		 'buttonText' => 'Create'
	 ])
</form>
@endsection