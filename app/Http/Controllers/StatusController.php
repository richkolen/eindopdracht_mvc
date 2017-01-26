<?php

namespace Lara\Http\Controllers;

use Illuminate\Http\Request;
use Lara\Models\User;
use Auth;

class StatusController extends Controller
{
	public function postStatus(Request $request)
	{
		$this->validate($request, [
			'status' => 'required|max:1500',
		]);

		Auth::user()->status()->create([
			'body' => $request->input('status'),
		]);

		return redirect()->route('home')->with('info', 'Je bericht is geplaatst!');
	}
}