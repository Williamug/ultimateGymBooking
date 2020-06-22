<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Model\EmailInbox;
use App\Model\Setting;
use Illuminate\Http\Request;

class EmailInboxesController extends Controller {
	public function __construct() {
		$this->middleware(['auth', 'verified']);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$setting = Setting::first();

		return view('emailBox.index', compact('setting'));
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
	 * @param  \App\Model\EmailInbox  $emailInbox
	 * @return \Illuminate\Http\Response
	 */
	public function show(EmailInbox $emailInbox) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Model\EmailInbox  $emailInbox
	 * @return \Illuminate\Http\Response
	 */
	public function edit(EmailInbox $emailInbox) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Model\EmailInbox  $emailInbox
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, EmailInbox $emailInbox) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Model\EmailInbox  $emailInbox
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(EmailInbox $emailInbox) {
		//
	}
}
