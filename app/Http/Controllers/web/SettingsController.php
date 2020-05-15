<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Model\Currency;
use App\Model\EmailSetting;
use App\Model\EmailTemplate;
use App\Model\Role;
use App\Model\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$setting        = Setting::first();
		$currencies     = Currency::all();
		$emailSetting   = EmailSetting::first();
		$emailtemplates = EmailTemplate::all();
		$roles          = Role::all();

		return view('settings.index', compact('setting', 'currencies', 'emailSetting', 'emailtemplates', 'roles'));
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
				'currency_id'             => 'numeric',
				'company_name'            => 'required',
				'address'                 => 'required',
				'phone_number'            => '',
				'official_company_number' => 'required',
				'email'                   => '',
				'website'                 => '',
				'logo'                    => 'sometimes|file|image|max:5000',
			]);
		$setting->update($data);

		if (request()->has('logo')) {
			$setting->update([
					'logo' => request()->logo->store('logo', 'public'),
				]);
		}
		return redirect('settings')->with('success-message', 'Your information has been updated');
	}
}
