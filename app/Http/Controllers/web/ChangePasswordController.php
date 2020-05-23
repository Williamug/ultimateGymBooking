<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, User $user) {
		$request->validate([
				'current_password'      => ['required', new MatchOldPassword],
				'password'              => ['required'],
				'password_confirmation' => ['same:password'],
			]);
		$user->update(['password'                             => Hash::make($request->password)]);
		return redirect()->route('user-profile.show', ['user' => $user])->with('toast_success', 'Your password has been change successfully');
	}
}
