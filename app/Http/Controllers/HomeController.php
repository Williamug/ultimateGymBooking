<?php

namespace App\Http\Controllers;

use App\Charts\MonthlyBooking;
use App\Charts\MonthlySales;
use App\Model\Booking;
use App\Model\Client;
use App\Model\Setting;
use Carbon\Carbon;

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
		$clients          = Client::all();
		$totalBooking     = Booking::all();
		$confirmedBooking = Booking::where('status', 1);
		$pendingBooking   = Booking::where('status', 2);
		$setting          = Setting::first();

		$options = [
			'backgroundColor' => '#6cb2eb',
			'boardColor'      => '#6cb2eb'
			// 'fill' => false,
		];
		$salesOptions = [
			'backgroundColor' => '#6cb2eb',
			'boardColor'      => '#6cb2eb',
			'fill'            => false,
		];

		$bookingThisWeek = Booking::whereDate('created_at', Carbon::today())->count();
		$bookingLastWeek = Booking::whereDate('created_at', Carbon::today()->subDay())->count();

		$chart = new MonthlyBooking;
		$chart->labels(['Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat', 'Sun']);
		$chart->dataset('Last Week', 'bar', [$bookingLastWeek]);
		// $chart->dataset('This Week', 'bar', [1, 7, 13, 4, 33, 43, 12])->options($options);
		$chart->dataset('This Week', 'bar', [$bookingThisWeek])->options($options);
		$chart->height(200);
		$chart->width(445);

		$monthlySales = new MonthlySales;
		$monthlySales->labels(['Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat', 'Sun']);
		$monthlySales->dataset('Sales', 'line', [1, 7, 13, 4, 33, 43, 70])->options($salesOptions);
		$monthlySales->height(200);
		$monthlySales->width(445);

		return view('home', compact('clients', 'totalBooking', 'pendingBooking', 'confirmedBooking', 'setting', 'chart', 'monthlySales'));
	}
}
