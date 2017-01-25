@extends('templates.default')
	
@section('content')
	<h3>Jouw zoekresultaten voor {{ Request::input('query') }}</h3>

	@if (!$users->count())
		<p>Jouw zoekopdracht heeft geen resultaten opgeleverd</p>
	@else
	<div class="row">
		<div class="col-lg-12">
			@foreach ($users as $user)
				@include('users/partials/userinfo')
			@endforeach
		</div>
	</div>
	@endif
@stop