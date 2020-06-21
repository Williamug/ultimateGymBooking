<?php

namespace App\Http\Controllers\web\Instructor;

use App\Http\Controllers\Controller;
use App\Model\Booking;
use App\Model\Client;
use App\Model\Payment;
use App\Model\Service;
use App\Model\Setting;
use App\User;
use Illuminate\Http\Request;

class InstructorBookingsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$bookings = Booking::where('status', 1)->orderBy('id', 'desc')->paginate(10);
		// $bookings = Booking::where('user_id', auth()->id())->paginate(10);
		$payments = Payment::all();
		$setting  = Setting::first();

		return view('front-instructor.bookings.index', compact('bookings', 'payments', 'setting'));
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
		$client  = Client::all();
		$payment = Payment::all();
		$service = Service::all();
		$setting = Setting::first();
		$user    = User::all();

		return view('front-instructor.bookings.show', compact('booking', 'client', 'payment', 'service', 'setting', 'user'));
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
