<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;
use App\Model\Role;
use Illuminate\Http\Request;

class RolesController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return RoleResource::collection(Role::all());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$this->roleValidationRoles();
		$roleData = Role::create([
				'role' => $request['role'],
			]);

		return new RoleResource($roleData);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Role  $role
	 * @return \Illuminate\Http\Response
	 */
	public function show(Role $role) {
		return new RoleResource($role);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Role  $role
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Role $role) {
		$roleInput = $role->update([
				'role' => $request['role'],
			]);

		return response()->json($roleInput, 201);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Role  $role
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Role $role) {
		$role->delete();
		return response()->json('deleted', 204);
	}

	// validation rules
	public function roleValidationRoles() {
		request()->validate([
				'role' => 'required',
			]);

	}
}
