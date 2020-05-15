<?php

namespace App\Http\Controllers;

use App\Model\Booking;
use App\Model\Client;
use App\Model\Setting;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index() {
		$clients  = Client::all();
		$bookings = Booking::all();
		$setting  = Setting::first();

		return view('home', compact('clients', 'bookings', 'setting'));
	}
}
