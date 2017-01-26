<?php

namespace Lara\Http\Controllers;

use Illuminate\Http\Request;
use Lara\Models\User;
use Auth;

class FriendController extends Controller
{
	public function getIndex()
	{
		$friends = Auth::user()->friends();
		$requests = Auth::user()->friendRequest();

		return view('friends.index')->with('friends', $friends)->with('requests', $requests);
	}

	public function getTheRequest($username)
	{
		$user = User::where('username', $username)->first();

		if(!$user)
		{
			return redirect()->route('home')->with('info', 'Gebruiker is niet gevonden!');
		}

		if(Auth::user()->id === $user->id)
		{
			return redirect()->route('home');
		}

		if(Auth::user()->hasPendingFriendRequest($user) || $user->hasPendingFriendRequest(Auth::user()))
		{
			return redirect()->route('profile.index', ['username' => $user->username])
			->with('info', 'Verzoek tot connctie bestaat al!');
		}

		if(Auth::user()->isFriends($user))
		{
			return redirect()->route('profile.index', ['username' => $user->username])
			->with('info', 'Connectie bestaat al!');
		}

		Auth::user()->addFriend($user);

		return redirect()->route('profile.index', ['username' => $user->username])
			->with('info', 'Connectieverzoek is verstuurd!');
	}

	public function getAcceptRequest($username)
	{
		$user = User::where('username', $username)->first();

		if(!$user)
		{
			return redirect()->route('home')->with('info', 'Gebruiker is niet gevonden!');
		}

		if(!Auth::user()->hasRequestOfFriend($user))
		{
			return redirect()->route('home')->with('info', 'Connectie maken is niet meer mogelijk!');
		}

		Auth::user()->acceptRequest($user);

		return redirect()->route('profile.index', ['username' => $username])
			->with('info', 'Connectie is toegevoegd!');
	}
}