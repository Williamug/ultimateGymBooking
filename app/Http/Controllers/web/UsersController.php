<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller {
	public function __construct() {
		$this->middleware(['auth', 'verified']);
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
				'name'                  => 'required',
				'current_password'      => 'required',
				'password'              => 'required',
				'password_confirmation' => 'required|confirmed'
			]);
	}
}
