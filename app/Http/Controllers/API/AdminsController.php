<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdminResource;
use App\Model\Admin;
use App\Model\Role;
use Illuminate\Http\Request;

class AdminsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return AdminResource::collection(Admin::paginate(15));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$role = Role::find(2);
		// $admin = Admin::find()
		$adminInputs = Admin::create([
				'first_name'    => $request['first_name'],
				'last_name'     => $request['last_name'],
				'gender'        => $request['gender'],
				'phone_number'  => $request['phone_number'],
				'dob'           => $request['dob'],
				'profile_image' => $request['profile_image'],
				'verified'      => $request['verified'],
				'user_id'       => $request['user_id'],
			]);
		$adminInputs->roles()->attach($role);
		return new AdminResource($adminInputs);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Model\Admin  $admin
	 * @return \Illuminate\Http\Response
	 */
	public function show(Admin $admin) {
		return new AdminResource($admin);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Model\Admin  $admin
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Admin $admin) {
		$admin->update([
				'first_name'    => $request['first_name'],
				'last_name'     => $request['last_name'],
				'gender'        => $request['gender'],
				'phone_number'  => $request['phone_number'],
				'dob'           => $request['dob'],
				'profile_image' => $request['profile_image'],
				'verified'      => $request['verified'],
				'user_id'       => $request['user_id'],
			]);
		return new AdminResource($admin);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Model\Admin  $admin
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Admin $admin) {
		$role = Role::find(2);
		$admin->roles()->detach($role);
		return response()->json($admin->delete(), 204);

	}
}
