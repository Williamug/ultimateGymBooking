<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Model\Booking;
use App\Model\Client;
use App\Model\Setting;
use App\User;
use Illuminate\Http\Request;

class ClientDashboardController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$clients          = Client::all();
		$totalBooking     = Booking::where('user_id', auth()->id());
		$confirmedBooking = Booking::where([
				['user_id', auth()->id()],
				['status', 1],
			]);
		$pendingBooking = Booking::where([
				['user_id', auth()->id()],
				['status', 2],
			]);
		$cancelBooking = Booking::where([
				['user_id', auth()->id()],
				['status', 3],
			]);
		$setting = Setting::first();

		return view('front-client.home', compact('clients', 'totalBooking', 'confirmedBooking', 'pendingBooking', 'cancelBooking', 'setting'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function show(User $user) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function edit(User $user) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, User $user) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(User $user) {
		//
	}
}
