<?php

namespace App\Http\Controllers\web\Reports;

use App\Http\Controllers\Controller;
use App\Model\Payment;
use App\Model\Setting;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class IncomesController extends Controller {
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

		$salesChart = new LaravelChart($chart_sales_options1);

		return view('reports.income-report.index', compact('setting', 'totalPayments', 'salesChart'));
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
