<?php

namespace App\Http\Controllers\web\Instructor;

use App\Http\Controllers\Controller;
use App\Model\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorProfilesController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}
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
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function show(User $user) {
		$setting = Setting::first();

		return view('front-instructor.user-profile.show', compact('user', 'setting'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function edit(User $user) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, User $user) {
		$data = request()->validate([
				'name' => 'required',
			]);
		$user->update($data);

		$req = request()->validate([
				'gender'        => '',
				'phone_number'  => '',
				'dob'           => '',
				'profile_image' => 'sometimes|file|image|max:5000',
			]);
		Auth::user()->instructor->update($req);
		if (request()->has('profile_image')) {
			Auth::user()->instructor->update([
					'profile_image' => request()->profile_image->store('profiles', 'public'),
				]);
			Auth::user()->update([
					'profile_image' => request()->profile_image->store('profiles', 'public'),
				]);
		}
		return redirect()->route('instructor-profile.show', ['user' => Auth::user()])->with('toast_success', 'Your information has been updated');
	}
}
