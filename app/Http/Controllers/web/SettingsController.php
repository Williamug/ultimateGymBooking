<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
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
		$setting    = Setting::first();
		$currencies = Currency::all();

		return view('settings.index', compact('setting', 'currencies'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Model\Setting  $setting
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Setting $setting) {

		$data = request()->validate([
				'currency_id'             => '',
				'company_name'            => 'required',
				'address'                 => 'required',
				'phone_number'            => '',
				'official_company_number' => 'required',
				'email'                   => '',
				'website'                 => '',
				'logo'                    => '',
			]);
		$setting->update($data);
		return redirect('settings')->with('message', 'Your information has been updated');
	}

}
