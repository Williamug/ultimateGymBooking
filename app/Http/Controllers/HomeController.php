<?php

namespace App\Http\Controllers;

use App\Model\Booking;
use App\Model\Client;
use App\Model\NutritionalPost;
use App\Model\Payment;
use App\Model\Setting;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

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
		// $clients          = Client::all()->take(3);
		$clients          = Client::where('id', '>', 0)->orderBy('created_at', 'desc')->paginate(4);
		$totalBooking     = Booking::all();
		$confirmedBooking = Booking::where('status', 1);
		$pendingBooking   = Booking::where('status', 2);
		$setting          = Setting::first();
		$nutritionalTips  = NutritionalPost::where('id', '>', 0)->orderBy('id', 'desc')->paginate(2);
		$totalPayments    = Payment::where('id', '>', 0)->sum('amount');

		$chart_booking_options = [
			'chart_title'     => 'Booking overview',
			'report_type'     => 'group_by_date',
			'model'           => 'App\Model\Booking',
			'group_by_field'  => 'created_at',
			'group_by_period' => 'month',
			'chart_type'      => 'bar',
			'conditions'      => [
				['name'          => 'Monthly bookings', 'color'          => 'red']
			],

			'filter_field'  => 'created_at',
			'filter_days'   => 30, // show only transactions for last 30 days
			'filter_period' => 'month', // show only transactions for this month
		];
		$bookingChart = new LaravelChart($chart_booking_options);

		$chart_sales_options1 = [
			'chart_title'     => 'Monthly sales overview',
			'report_type'     => 'group_by_date',
			'model'           => 'App\Model\Payment',
			'group_by_field'  => 'created_at',
			'group_by_period' => 'month',
			'chart_type'      => 'bar',
			'conditions'      => [
				['name'          => 'Monthly Sales', 'color'          => 'blue']
			],

		];

		$salesChart = new LaravelChart($chart_sales_options1);

		return view('home', compact('clients', 'totalBooking', 'pendingBooking', 'confirmedBooking', 'setting', 'nutritionalTips', 'totalPayments', 'bookingChart', 'salesChart'));
	}
}
