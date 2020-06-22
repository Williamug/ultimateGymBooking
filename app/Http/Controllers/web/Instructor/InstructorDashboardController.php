<?php

namespace App\Http\Controllers\web\Instructor;

use App\Http\Controllers\Controller;
use App\Model\Booking;
use App\Model\Client;
use App\Model\Instructor;
use App\Model\NutritionalPost;
use App\Model\Setting;
use Illuminate\Http\Request;

class InstructorDashboardController extends Controller {
	public function __construct() {
		$this->middleware(['auth', 'verified']);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$clients          = Client::all();
		$totalBooking     = Booking::where('user_id', auth()->id());
		$confirmedBooking = Booking::where([
				['user_id', auth()->id()],
				['status', 1],
			]);
		$pendingBooking = Booking::where([
				['user_id', auth()->id()],
				['status', 2],
			]);
		$cancelBooking = Booking::where([
				['user_id', auth()->id()],
				['status', 3],
			]);
		$setting         = Setting::first();
		$nutritionalTips = NutritionalPost::where('id', '>', 0)->orderBy('id', 'desc')->paginate(3);

		return view('front-instructor.home', compact('clients', 'totalBooking', 'confirmedBooking', 'pendingBooking', 'cancelBooking', 'setting', 'nutritionalTips'));
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
	 * @param  \App\Model\Instructor  $instructor
	 * @return \Illuminate\Http\Response
	 */
	public function show(Instructor $instructor) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Model\Instructor  $instructor
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Instructor $instructor) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Model\Instructor  $instructor
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Instructor $instructor) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Model\Instructor  $instructor
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Instructor $instructor) {
		//
	}
}
