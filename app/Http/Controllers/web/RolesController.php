<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Model\Role;
use App\Model\Setting;
use Illuminate\Http\Request;

class RolesController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Model\Role  $role
	 * @return \Illuminate\Http\Response
	 */
	public function show(Role $role) {
		$setting = Setting::first();
		return view('settings.roles.role', compact('role', 'setting'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Model\Role  $role
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Role $role) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Model\Role  $role
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Role $role) {
		$role->delete();
		return redirect('settings')->with('info-message', 'Email Template with has been deleted');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Model\Role  $role
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Role $role) {
		//
	}
}
