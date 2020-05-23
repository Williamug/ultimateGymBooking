<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Model\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfilesController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function show(User $user) {
		$setting = Setting::first();

		return view('user-profile.show', compact('user', 'setting'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, User $user) {
		$data = request()->validate([
				'name' => 'required',
			]);
		$user->update($data);

		$req = request()->validate([
				'gender'        => '',
				'phone_number'  => '',
				'dob'           => '',
				'profile_image' => 'sometimes|file|image|max:5000',
			]);
		Auth::user()->admin->update($req);
		if (request()->has('profile_image')) {
			Auth::user()->admin->update([
					'profile_image' => request()->profile_image->store('profiles', 'public'),
				]);
		}
		return redirect()->route('user-profile.show', ['user' => Auth::user()])->with('toast_success', 'Your information has been updated');
	}

}
