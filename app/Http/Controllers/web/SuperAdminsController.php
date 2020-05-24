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

		$role = Role::find(1);

		$user = User::create([
				'name'     => $request['name'],
				'email'    => $request['email'],
				'password' => Hash::make($request['password']),
				'role_id'  => $role->id,
			]);

		$admin = Admin::create([
				'user_id' => $user->id,
			]);

		return redirect()->route('super-dashboard');
	}
}
