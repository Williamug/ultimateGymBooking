<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Model\Booking;
use App\Model\Client;
use App\Model\Payment;
use App\Model\Service;
use App\User;
use Illuminate\Http\Request;

class BookingsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$bookings = Booking::all();
		$payments = Payment::all();

		return view('bookings.index', compact('bookings', 'payments'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$services = Service::all();
		$users    = User::all();
		$clients  = Client::all();

		return view('bookings.create', compact('services', 'users', 'clients'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$service = Service::where('id', $request['service_id'])->get();
		$client  = Client::where('id', $request['client_id'])->get();

		$data = request()->validate([
				'booking_date' => '',
				'booking_time' => '',
				'quantity'     => '',
				'comment'      => '',
				'status'       => '',
			]);
		$bookings = Booking::create([
				'booking_date' => $request['booking_date'],
				'booking_time' => $request['booking_time'],
				'quantity'     => $request['quantity'],
				'comment'      => $request['comment'],
				'status'       => $request['status'],
			]);

		$bookings->services()->attach($service);
		$bookings->clients()->attach($client);

		return redirect()->route('bookings.index')->with('message', 'A new service has been added successfully');
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

		return view('bookings.show', compact('booking', 'client', 'payment', 'service'));
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
