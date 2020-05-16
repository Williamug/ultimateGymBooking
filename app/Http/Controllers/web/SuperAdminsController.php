<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Model\Admin;
use App\Model\Role;
use App\Model\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SuperAdminsController extends Controller {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$setting = Setting::first();

		return view('administration.superAdmin.create', compact('setting'));
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return \App\User
	 */
	protected function store(Request $request) {
		request()->validate([
				'name'     => ['required', 'string', 'max:255'],
				'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
				'password' => ['required', 'string', 'min:8', 'confirmed'],
			]);
		$user = User::create([
				'name'     => $request['name'],
				'email'    => $request['email'],
				'password' => Hash::make($request['password']),
			]);

		$role = Role::find(1);

		$admin = Admin::create([
				'user_id' => $user->id,
				'role_id' => $role->id,
			]);

		return redirect()->route('home');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function show(User $user) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function edit(User $user) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, User $user) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(User $user) {
		//
	}
}
