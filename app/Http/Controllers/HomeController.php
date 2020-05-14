<?php

namespace App\Http\Controllers;

use App\Model\Booking;
use App\Model\Client;

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

		return view('home', compact('clients', 'bookings'));
	}
}
