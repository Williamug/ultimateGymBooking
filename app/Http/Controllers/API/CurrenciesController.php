<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CurrencyResource;
use App\Model\Currency;
use Illuminate\Http\Request;

class CurrenciesController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return CurrencyResource::collection(Currency::all());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		// $this->currencyValidationRules();

		$currency = Currency::create([
				'currency'           => $request['currency'],
				'currency_symbol'    => $request['currency_symbol'],
				'currency_long_name' => $request['currency_long_name'],
			]);
		return new CurrencyResource($currency);
		// return response()->json($currency, 201);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Currency $currency) {
		return new CurrencyResource($currency);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Currency $currency) {
		// $this->currencyValidationRules();
		$currencyInputs = $currency->update([
				'currency'           => $request['currency'],
				'currency_symbol'    => $request['currency_symbol'],
				'currency_long_name' => $request['currency_long_name'],
			]);
		return response()->json($currencyInputs, 201);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Currency $currency) {
		$currency->delete();
		return response()->json('deleted', 204);
	}

	public function currencyValidationRules() {
		request()->validate([
				'currency'           => 'required',
				'currency_symbol'    => 'required',
				'currency_long_name' => 'required'
			]);
	}
}
