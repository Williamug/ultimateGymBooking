<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Model\Booking;
use App\Model\Payment;
use App\Model\PaymentMethod;
use App\Model\Setting;
use Illuminate\Http\Request;

class BookingPaymentController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Booking $booking) {
		$setting        = Setting::first();
		$paymentMethods = PaymentMethod::all();

		return view('bookings.payment.create', compact('booking', 'setting', 'paymentMethods'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Booking $booking) {
		$payment = Payment::create([
				'payment_method_id' => request('payment_method_id'),
				'amount'            => request('amount'),
			]);

		$booking->update([
				'payment_id' => $payment->id,
				'status'     => 1,
			]);

		return redirect()->route('bookings.index')->with('toast_success', 'Payment has been made');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Model\Payment  $payment
	 * @return \Illuminate\Http\Response
	 */
	public function show(Payment $payment) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Model\Payment  $payment
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Payment $payment) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Model\Payment  $payment
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Payment $payment) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Model\Payment  $payment
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Payment $payment) {
		//
	}
}
