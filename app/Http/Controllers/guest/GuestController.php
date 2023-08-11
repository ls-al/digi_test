<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;

class GuestController extends Controller
{

	public function index()
	{
		return view('guest.index');
	}

}
