<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Model\Admin;
use App\Model\Role;
use App\Model\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$admins  = Admin::where('id', '>', 0)->orderBy('id', 'desc')->paginate(10);
		$setting = Setting::first();

		return view('administration.index', compact('admins', 'setting'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$roles   = Role::whereBetween('id', [2, 3])->get();
		$setting = Setting::first();

		return view('administration.create', compact('roles', 'setting'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		request()->validate([
				'name'     => 'required',
				'email'    => 'required|unique:users',
				'password' => 'required|min:8'
			]);
		$user = User::create([
				'name'     => $request['name'],
				'email'    => $request['email'],
				'password' => Hash::make($request['password']),
			]);

		request()->validate([
				'gender'        => '',
				'phone_number'  => 'required',
				'dob'           => '',
				'profile_image' => 'sometimes|file|image|max:5000',
				'role_id'       => 'required|numeric',
				'user_id'       => '',
			]);

		$admin = Admin::create([
				'gender'       => $request['gender'],
				'phone_number' => $request['phone_number'],
				'dob'          => $request['dob'],
				'role_id'      => $request['role_id'],
				'user_id'      => $user->id,
			]);

		if (request()->has('profile_image')) {
			$admin->update([
					'profile_image' => request()->profile_image->store('profiles', 'public'),
				]);
		}
		return redirect()->route('admins.index')->with('toast_success', 'You have added a new Administrator');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Model\Admin  $admin
	 * @return \Illuminate\Http\Response
	 */
	public function show(Admin $admin) {
		$setting = Setting::first();

		return view('administration.show', compact('admin', 'setting'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Model\Admin  $admin
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Admin $admin) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Model\Admin  $admin
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Admin $admin) {
		request()->validate([
				'gender'        => '',
				'phone_number'  => 'required',
				'mobile_number' => '',
				'dob'           => '',
				'profile_image' => 'sometimes|file|image|max:5000',
			]);

		$admin->update([
				'gender'        => $request['gender'],
				'phone_number'  => $request['phone_number'],
				'mobile_number' => $request['mobile_number'],
				'dob'           => $request['dob'],
			]);

		if (request()->has('profile_image')) {
			$admin->update([
					'profile_image' => request()->profile_image->store('profiles', 'public'),
				]);
		}
		return redirect()->route('admins.show', ['admin' => $admin])->with('toast_success', 'You have update administrator\'s details');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Model\Admin  $admin
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Admin $admin) {
		$user = User::find('id');

		$admin->delete();
		$admin->user->delete();
	}
}
