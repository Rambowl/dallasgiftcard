@extends ('layouts.app')

@section('content')
<form method="POST" action="/campaigns">
	@include('campaigns.form', [ 
		 'buttonText' => 'Create'
	 ])
</form>
@endsection