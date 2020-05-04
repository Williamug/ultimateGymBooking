<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\EmailTemplate;
use Illuminate\Http\Request;

class EmailTemplateController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		request()->validate([
				'title'   => 'required',
				'message' => 'required',
			]);
		$emailtemplate = EmailTemplate::create([
				'title'   => $request['title'],
				'message' => $request['message'],
			]);
		return response()->json($emailtemplate, 201);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Model\EmailTemplate  $emailTemplate
	 * @return \Illuminate\Http\Response
	 */
	public function show(EmailTemplate $emailTemplate) {
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
		//
	}
}
