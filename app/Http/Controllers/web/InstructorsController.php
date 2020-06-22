<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Model\Instructor;
use App\Model\Role;
use App\Model\Service;
use App\Model\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InstructorsController extends Controller {
	public function __construct() {
		$this->middleware(['auth', 'verified']);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$instructors = Instructor::paginate(10);
		$setting     = Setting::first();

		return view('instructors.index', compact('instructors', 'setting'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$setting = Setting::first();

		return view('instructors.create', compact('setting'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		request()->validate([
				'name'          => 'required',
				'email'         => 'required|unique:users',
				'password'      => 'required|min:8',
				'role_id'       => '',
				'profile_image' => 'sometimes|file|image|max:5000',
			]);
		$role = Role::find(4);
		$user = User::create([
				'name'     => $request['name'],
				'email'    => $request['email'],
				'password' => Hash::make($request['password']),
				'role_id'  => $role->id,
			]);

		request()->validate([
				'gender'        => '',
				'phone_number'  => 'required',
				'mobile_number' => '',
				'dob'           => '',
				'profile_image' => 'sometimes|file|image|max:5000',
				'user_id'       => '',
			]);

		$instructor = Instructor::create([
				'gender'        => $request['gender'],
				'phone_number'  => $request['phone_number'],
				'mobile_number' => $request['mobile_number'],
				'dob'           => $request['dob'],
				'user_id'       => $user->id,
			]);

		if (request()->has('profile_image')) {
			$instructor->update([
					'profile_image' => request()->profile_image->store('profiles', 'public'),
				]);
		}
		if (request()->has('profile_image')) {
			$user->update([
					'profile_image' => request()->profile_image->store('profiles', 'public'),
				]);
		}

		return redirect()->route('instructors.index')->with('toast_success', 'You have added a new instructor');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Model\Instructor  $instructor
	 * @return \Illuminate\Http\Response
	 */
	public function show(Instructor $instructor) {
		$services = Service::all();
		$setting  = Setting::first();

		return view('instructors.show', compact('instructor', 'services', 'setting'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Model\Instructor  $instructor
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Instructor $instructor) {
		// request()->validate([
		// 		'name'     => 'required',
		// 		'email'    => 'required|unique:users',
		// 		'password' => 'required|min:8'
		// 	]);
		// $user = User::create([
		// 		'name'     => $request['name'],
		// 		'email'    => $request['email'],
		// 		'password' => Hash::make($request['password']),
		// 	]);

		// $role = Role::find(4);

		request()->validate([
				'gender'        => '',
				'phone_number'  => 'required',
				'mobile_number' => '',
				'dob'           => '',
				'profile_image' => 'sometimes|file|image|max:5000',
			]);
		$user = new User();

		$instructor->update([
				'gender'        => $request['gender'],
				'phone_number'  => $request['phone_number'],
				'mobile_number' => $request['mobile_number'],
				'dob'           => $request['dob'],
			]);

		if (request()->has('profile_image')) {
			$instructor->update([
					'profile_image' => request()->profile_image->store('profiles', 'public'),
				]);
		}
		if (request()->has('profile_image')) {
			$user->update([
					'profile_image' => request()->profile_image->store('profiles', 'public'),
				]);
		}
		return redirect()->route('instructors.show', ['instructor' => $instructor])->with('toast_success', 'You have update instructor details');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Model\Instructor  $instructor
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Instructor $instructor) {
		$user = User::find('id');

		$instructor->delete();
		$instructor->user->delete();

		return redirect()->route('instructors.index')->with('message', $instructor->user->name.' has been delete');
	}
}
