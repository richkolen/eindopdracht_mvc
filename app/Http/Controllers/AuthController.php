<?php

namespace Lara\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Lara\Models\User;

class AuthController extends Controller
{
	public function getSignup ()
	{
		return view('auth.signup');
	}

	public function postSignup(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|unique:users|email|max:255',
			'username' => 'required|unique:users|alpha_dash|max:20',
			'password' => 'required|min:6',
		]);

		User::create([
			'email' => $request->input('email'),
			'username' => $request->input('username'),
			'password' => bcrypt($request->input('password')),
		]);

		return redirect()
			->route('home')
			->with('info', 'Je bent nu lid van Lara. Je kunt inloggen met jouw gegevens');
	}

	public function getSignin ()
	{
		return view('auth.signin');
	}

	public function postSignin(Request $request)
	{
		$this->validate($request, [
			'email' => 'required',
			'password' => 'required',
		]);

		if (!Auth::attempt($request->only(['email', 'password']), $request->has('remember')))
		{
			return redirect()->back()->with('info', 'Jouw inloggegevens zijn niet correct');
		}

		return redirect()->route('home')->with('info', 'Je bent nu ingelogd');
	}

	public function getSignOut()
	{
		Auth::logout();

		return redirect()->route('home')->with('info', 'Je bent nu uitgelogd');;
	}

}