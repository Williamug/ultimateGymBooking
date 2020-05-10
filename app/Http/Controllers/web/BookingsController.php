<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Model\Booking;
use Illuminate\Http\Request;

class BookingsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$bookings = Booking::all();
		return view('bookings.index', compact('bookings'));
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
	 * @param  \App\Model\Booking  $booking
	 * @return \Illuminate\Http\Response
	 */
	public function show(Booking $booking) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Model\Booking  $booking
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Booking $booking) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Model\Booking  $booking
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Booking $booking) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Model\Booking  $booking
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Booking $booking) {
		//
	}
}
