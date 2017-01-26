<?php

namespace Lara\Http\Controllers;

use Illuminate\Http\Request;
use Lara\Models\User;
use Auth;


class ProfileController extends Controller
{
	public function getProfile($username)
	{
		$user = User::where('username', $username)->first();

		if (!$user)
		{
			abort(404);
		}

		return view('profile.index')->with('user', $user);
	}

	public function getProfileEdit()
	{
		return view('profile.edit');
	}

	public function postProfileEdit(Request $request)
	{
		$this->validate($request, [
			'first_name' => 'alpha|max:60',
			'last_name' => 'alpha|max:60',
			'country' => 'max:25',
		]);

		Auth::user()->update([
			'first_name' => $request->input('first_name'),
			'last_name' => $request->input('last_name'),
			'country' => $request->input('country'),
		]);

		return redirect()->route('profile.edit')->with('info', 'Jouw gegevens zijn bijgewerkt');
	}

}