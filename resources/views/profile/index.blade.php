@extends('templates.default')
	
@section('content')
	<div class="row">
		<div class="col-lg-5">
			@include('users.partials.userinfo')
			<hr>
		</div>
		<div class="col-lg-4 col-lg-offset-3">

			@if (Auth::user()->hasPendingFriendRequest($user))
				<p>{{ $user->getNameOrUsername() }} heeft je verzoek nog niet geaccepteerd</p>
			@elseif (Auth::user()->hasRequestOfFriend($user))
				<a href="{{ route('friend.accept', ['username' => $user->username]) }}" class="btn btn-primary">Connectie toevoegen</a>
			@elseif (Auth::user()->isFriends($user))
				<p>{{ $user->getNameOrUsername() }} is een connectie</p>
			@elseif (Auth::user()==$user)
			@else
				<a href="{{ route('friend.add', ['username' => $user->username]) }}" class="btn btn-primary">Maak connectie</a>
			@endif
			<h4>Connecties</h4>

			@if (!$user->friends()->count())
			<p>{{ $user->getFirstNameOrUsername() }} heeft nog geen connecties</p>
			@else
				@foreach ($user->friends() as $user)
					@include('users/partials/userinfo')
				@endforeach
			@endif
		</div>
	</div>
@stop