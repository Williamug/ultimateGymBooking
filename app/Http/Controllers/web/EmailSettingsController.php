<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Model\EmailSetting;
use Illuminate\Http\Request;

class EmailSettingsController extends Controller {
	public function __construct() {
		$this->middleware(['auth', 'verified']);
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Model\EmailSetting  $emailSetting
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, EmailSetting $emailSetting) {
		$data = request()->validate([
				'email_sent_from_name' => 'required',
				'email'                => 'required',
				'email_driver_id'      => 'numeric',
				'email_host'           => '',
				'email_port'           => '',
				'encryption_id'        => 'numeric',
				'password'             => '',
			]);
		$emailSetting->update($data);
		return redirect('settings')->with('message', 'Your information has been updated');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Model\EmailSetting  $emailSetting
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(EmailSetting $emailSetting) {
		//
	}
}
