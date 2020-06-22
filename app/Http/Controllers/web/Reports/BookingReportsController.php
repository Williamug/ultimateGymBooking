<?php

namespace App\Http\Controllers\web\Reports;

use App\Http\Controllers\Controller;
use App\Model\Booking;
use App\Model\Payment;
use App\Model\Setting;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class BookingReportsController extends Controller {
	public function __construct() {
		$this->middleware(['auth', 'verified']);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$setting       = Setting::first();
		$totalBooking  = Booking::all();
		$totalPayments = Payment::where('id', '>', 0)->sum('amount');

		$chart_sales_options1 = [
			'chart_title'     => 'Monthly sales overview',
			'report_type'     => 'group_by_date',
			'model'           => 'App\Model\Payment',
			'group_by_field'  => 'created_at',
			'group_by_period' => 'month',
			'chart_type'      => 'bar',
			'conditions'      => [
				['name'          => 'Monthly Income', 'color'          => '#000']
			],
		];

		$bookingChart = new LaravelChart($chart_sales_options1);

		return view('reports.booking-report.index', compact('setting', 'totalBooking', 'bookingChart'));
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
