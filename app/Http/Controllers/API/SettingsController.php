<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\SettingResource;
use App\Model\Currency;
use App\Model\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		return SettingResource::collection(Setting::all());
		// $settings = Setting::all();
		// return response()->json($settings, 200);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$currency = Currency::find(2);
		// $this->validationRules();
		$setting = Setting::create([
				'currency_id'             => $currency->id,
				'company_name'            => $request['company_name'],
				'address'                 => $request['address'],
				'phone_number'            => $request['phone_number'],
				'official_company_number' => $request['official_company_number'],
				'email'                   => $request['email'],
				'logo'                    => $request['logo'],
			]);
		return response()->json($setting, 201);

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Setting $setting) {
		$currency = Currency::find(1);

		// $this->validationRules();
		$setting->update([
				'currency_id'             => $currency->id,
				'company_name'            => $request['company_name'],
				'address'                 => $request['address'],
				'phone_number'            => $request['phone_number'],
				'official_company_number' => $request['official_company_number'],
				'email'                   => $request['email'],
				'logo'                    => $request['logo'],
			]);
		return response()->json($setting, 201);
	}

	public function destroy(Setting $setting) {
		$setting->delete();
		return response()->json('Information has been deleted', 204);

	}

	// validation
	public function validationRules() {
		request()->validate([
				'company_name'             => 'required|max:25|min:3',
				'address'                  => 'required|min:3',
				'phone_number'             => 'required|min:10|numeric',
				'official_comapany_number' => 'required|min:10|numeric',
				'email'                    => 'email:rfc,dns',
				'logo'                     => 'image',
				'currencies_id'            => 'required'
			]);
	}
}
