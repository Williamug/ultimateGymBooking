<?php

namespace App\Http\Controllers\web\Reports;

use App\Http\Controllers\Controller;
use App\Model\Client;
use App\Model\Payment;
use App\Model\Setting;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class ClientReportsController extends Controller {
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
		$clients       = Client::all();
		$totalPayments = Payment::where('id', '>', 0)->sum('amount');

		$chart_client_options = [
			'chart_title'     => 'Monthly sales overview',
			'report_type'     => 'group_by_date',
			'model'           => 'App\Model\Payment',
			'group_by_field'  => 'created_at',
			'group_by_period' => 'month',
			'chart_type'      => 'bar',
			'conditions'      => [
				['name'          => 'Monthly new clients', 'color'          => '#000']
			],
		];

		$clientChart = new LaravelChart($chart_client_options);

		return view('reports.client-report.index', compact('setting', 'totalPayments', 'clients', 'clientChart'));
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
	 * @param  \App\Model\Client  $client
	 * @return \Illuminate\Http\Response
	 */
	public function show(Client $client) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Model\Client  $client
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Client $client) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Model\Client  $client
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Client $client) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Model\Client  $client
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Client $client) {
		//
	}
}
