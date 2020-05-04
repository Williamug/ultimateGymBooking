<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Model\EmailTemplate;
use Illuminate\Http\Request;

class EmailTemplatesController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

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
	 * @param  \App\Model\EmailTemplate  $emailTemplate
	 * @return \Illuminate\Http\Response
	 */
	public function show(EmailTemplate $emailTemplate) {
		return view('settings.emailTemplates.show', compact('emailTemplate'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Model\EmailTemplate  $emailTemplate
	 * @return \Illuminate\Http\Response
	 */
	public function edit(EmailTemplate $emailTemplate) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Model\EmailTemplate  $emailTemplate
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, EmailTemplate $emailTemplate) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Model\EmailTemplate  $emailTemplate
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(EmailTemplate $emailTemplate) {
		$emailTemplate->delete();
		return redirect('settings')->with('info-message', 'Email Template with has been deleted');
	}
}
