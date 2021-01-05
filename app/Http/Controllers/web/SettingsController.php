<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Model\Currency;
use App\Model\EmailSetting;
use App\Model\EmailTemplate;
use App\Model\Role;
use App\Model\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth', 'verified']);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
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
	public function update(Request $request, Setting $setting)
	{

		$data = request()->validate([
			'currency_id'             => 'numeric',
			'company_name'            => 'required',
			'address'                 => 'required',
			'phone_number'            => '',
			'official_company_number' => 'required',
			'email'                   => '',
			'company_website'         => '',
			'logo'                    => 'sometimes|file|image|max:5000',
		]);
		// dd($data);
		$setting->update($data);

		if (request()->has('logo')) {
			$setting->update([
				'logo' => request()->logo->store('logo', 'public'),
			]);
		}
		if (request()->has('company_website')) {
			$setting->update([
				'company_website' => request()->company_website,
			]);
		}
		return redirect('settings')->with('toast_success', 'Settings have been saved');
	}
}
