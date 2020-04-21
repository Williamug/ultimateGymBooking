<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookingResource;
use App\Model\Booking;
use App\Model\Client;
use App\Model\Instructor;
use App\Model\Service;
use Illuminate\Http\Request;

class BookingsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return BookingResource::collection(Booking::paginate(15));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$service      = Service::find(1);
		$client       = Client::find(1);
		$instructor   = Instructor::find(1);
		$bookingInput = Booking::create([
				'phone_number' => $request['phone_number'],
				'booking_date' => $request['booking_date'],
				'booking_time' => $request['booking_time'],
				'quality'      => $request['quality'],
				'comment'      => $request['comment'],
				'status'       => $request['status'],
				'payment_id'   => $request['payment_id'],
				'currency_id'  => $request['currency_id'],
			]);
		$bookingInput->services()->attach($service);
		$bookingInput->clients()->attach($client);
		$bookingInput->instructors()->attach($instructor);
		return new BookingResource($bookingInput);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Model\Booking  $booking
	 * @return \Illuminate\Http\Response
	 */
	public function show(Booking $booking) {
		return new BookingResource($booking);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Model\Booking  $booking
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Booking $booking) {
		$service    = Service::find(1);
		$client     = Client::find(1);
		$instructor = Instructor::find(1);
		$booking->update([
				'phone_number' => $request['phone_number'],
				'booking_date' => $request['booking_date'],
				'booking_time' => $request['booking_time'],
				'quality'      => $request['quality'],
				'comment'      => $request['comment'],
				'status'       => $request['status'],
				'payment_id'   => $request['payment_id'],
				'currency_id'  => $request['currency_id'],
			]);
		return new BookingResource($booking);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Model\Booking  $booking
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Booking $booking) {
		$service    = Service::find(1);
		$client     = Client::find(1);
		$instructor = Instructor::find(1);

		$booking->services()->detach($service);
		$booking->clients()->detach($client);
		$booking->instructors()->detach($instructor);

		return response()->json($booking->delete(), 204);
	}
}
