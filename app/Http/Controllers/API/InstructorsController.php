<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\InstructorResource;
use App\Model\Instructor;

use Illuminate\Http\Request;

class InstructorsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return InstructorResource::collection(Instructor::paginate(10));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		$instructorInputs = Instructor::create([
				'first_name'    => $request['first_name'],
				'last_name'     => $request['last_name'],
				'phone_number'  => $request['phone_number'],
				'mobile_number' => $request['mobile_number'],
				'gender'        => $request['gender'],
				'dob'           => $request['dob'],
				'profile_image' => $request['profile_image'],
				'verified'      => $request['verified'],
				'roles_id'      => $request['roles_id'],
			]);
		return new InstructorResource($instructorInputs);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Model\Instructor  $instructor
	 * @return \Illuminate\Http\Response
	 */
	public function show(Instructor $instructor) {
		return new InstructorResource($instructor);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Model\Instructor  $instructor
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Instructor $instructor) {
		$instructorInput = $instructor->update([
				'first_name'    => $request['first_name'],
				'last_name'     => $request['last_name'],
				'phone_number'  => $request['phone_number'],
				'mobile_number' => $request['mobile_number'],
				'gender'        => $request['gender'],
				'dob'           => $request['dob'],
				'profile_image' => $request['profile_image'],
				'verified'      => $request['verified'],
				'roles_id'      => $request['roles_id'],
			]);

		return response()->json($instructorInput, 201);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Model\Instructor  $instructor
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Instructor $instructor) {
		return response()->json($instructor->delete(), 204);
	}
}
