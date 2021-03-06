<?php

namespace App\Http\Controllers\web\Client;

use App\Http\Controllers\Controller;
use App\Model\Booking;
use App\Model\Client;
use App\Model\Payment;
use App\Model\Service;
use App\Model\Setting;
use App\User;
use Illuminate\Http\Request;

class ClientBookingsController extends Controller {
	public function __construct() {
		$this->middleware(['auth', 'verified']);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		// $bookings = Booking::where('id', '>', 0)->orderBy('id', 'desc')->paginate(10);
		$bookings = Booking::where('user_id', auth()->id())->paginate(10);
		$payments = Payment::all();
		$setting  = Setting::first();

		return view('front-client.bookings.index', compact('bookings', 'payments', 'setting'));
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
		$setting  = Setting::first();

		return view('front-client.bookings.create', compact('services', 'users', 'clients', 'setting'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$service = Service::where('id', $request['service_id'])->get();
		$client  = User::where('id', $request['client_id'])->get();

		$data = request()->validate([
				'booking_date' => '',
				'booking_time' => '',
				'quantity'     => '',
				'comment'      => '',
				'status'       => '',
				'client_id'    => '',
			]);
		$bookings = Booking::create([
				'booking_date' => $request['booking_date'],
				'booking_time' => $request['booking_time'],
				'quantity'     => $request['quantity'],
				'comment'      => $request['comment'],
				'status'       => 2,
				'user_id'      => Auth()->id(),
			]);

		$bookings->services()->attach($service);
		$bookings->clients()->attach($client);

		return redirect()->route('client-bookings.index')->with('toast_success', 'A new service has been added successfully');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Model\Booking  $booking
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Booking $booking) {
		$setting  = Setting::first();
		$services = Service::all();
		$users    = User::all();

		return view('front-client.bookings.edit', compact('booking', 'setting', 'services', 'users'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Model\Booking  $booking
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Booking $booking) {
		$service = Service::where('id', $request['service_id'])->get();
		$client  = User::where('id', $request['client_id'])->get();

		$data = request()->validate([
				'booking_date' => '',
				'booking_time' => '',
				'quantity'     => '',
				'comment'      => '',
				'status'       => '',
				'client_id'    => '',
			]);
		$booking->update([
				'booking_date' => $request['booking_date'],
				'booking_time' => $request['booking_time'],
				'quantity'     => $request['quantity'],
				'comment'      => $request['comment'],
				'status'       => 2,
				'user_id'      => Auth()->id(),
			]);

		$booking->services()->detach();
		$booking->clients()->detach();

		$booking->services()->attach($service);
		$booking->clients()->attach($client);

		return redirect()->route('client-bookings.index')->with('toast_success', 'A new service has been added successfully');
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
