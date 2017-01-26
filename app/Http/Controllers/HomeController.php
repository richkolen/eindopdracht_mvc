<?php

namespace Lara\Http\Controllers;

use Auth;

class HomeController extends Controller
{
	public function index()
	{
		If (Auth::check())
		{
			return view('timeline.index');
		}

        return view('home');
	}
}