<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Model\Setting;

class WelcomeController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$setting = Setting::first();

		return view('welcome', compact('setting'));
	}

}
