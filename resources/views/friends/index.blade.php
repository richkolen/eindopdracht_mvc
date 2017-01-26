@extends('templates.default')
	
@section('content')
	<div class="row">
		<div class="col-lg-6">
			<h3>Jouw connecties</h3>

			@if (!$friends->count())
			<p>Je hebt nog geen connecties</p>
			@else
				@foreach ($friends as $user)
					@include('users/partials/userinfo')
				@endforeach
			@endif
		</div>
		<div class="col-lg-6">
			<h4>Connectie verzoeken</h4>

			@if (!$requests->count())
			<p>Je hebt geen verzoeken</p>
			@else
				@foreach ($requests as $user)
					@include('users/partials/userinfo')
				@endforeach
			@endif
		</div>
	</div>
@stop