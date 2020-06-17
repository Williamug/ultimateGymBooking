<?php

namespace App\Http\Controllers\web\Client;

use App\Http\Controllers\Controller;
use App\Model\Instructor;

use App\Model\Setting;

class ClientInstructorsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$instructors = Instructor::paginate(10);
		$setting     = Setting::first();
		return view('front-client.instructors.index', compact('instructors', 'setting'));
	}
}
