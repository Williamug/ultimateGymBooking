<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Model\Booking;
use App\Model\Client;
use App\Model\NutritionalPost;
use App\Model\Payment;
use App\Model\Setting;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class SuperAdminDashboardController extends Controller {
	/**
	 * abort user access without login
	 * @return void
	 */
	public function __construct() {
		$this->middleware(['auth', 'verified']);
	}

	/**
	 * show super admin dashboard
	 *
	 * @return  \Illuminate\Contracts\Support\Renderable
	 */
	public function index() {
		$clients          = Client::all();
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
				['name'          => 'Monthly Income', 'color'          => 'red']
			],
		];

		$salesChart = new LaravelChart($chart_sales_options1);

		return view('home', compact('clients', 'totalBooking', 'pendingBooking', 'confirmedBooking', 'setting', 'nutritionalTips', 'totalPayments', 'bookingChart', 'salesChart'));
	}
}
