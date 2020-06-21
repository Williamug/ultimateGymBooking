<?php

namespace App\Http\Controllers\web\Instructor;

use App\Http\Controllers\Controller;
use App\Model\Instructor;
use App\Model\Service;
use App\Model\Setting;

class InstructorServicesController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$services   = Service::where('id', '>', 0)->orderBy('id', 'desc')->paginate(10);
		$setting    = Setting::first();
		$instructor = Instructor::all();
		$service    = Service::first();
		return view('front-instructor.services.index', compact('services', 'setting', 'instructor', 'service'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Model\Service  $service
	 * @return \Illuminate\Http\Response
	 */
	public function show(Service $service) {
		$setting = Setting::first();

		return view('front-instructor.services.show', compact('service', 'setting'));
	}
}
