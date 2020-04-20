<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;
use App\Model\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return ClientResource::collection(Client::paginate(15));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$clientInputs = Client::create([
				'first_name'    => $request['first_name'],
				'last_name'     => $request['last_name'],
				'phone_number'  => $request['phone_number'],
				'gender'        => $request['gender'],
				'dob'           => $request['dob'],
				'profile_image' => $request['profile_image'],
				'verified'      => $request['verified'],
				'user_id'       => $request['user_id'],
				'role_id'       => $request['role_id'],
			]);
		return new ClientResource($clientInputs);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Model\Client  $client
	 * @return \Illuminate\Http\Response
	 */
	public function show(Client $client) {
		return new ClientResource($client);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Model\Client  $client
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Client $client) {
		$clientInput = $client->update([
				'first_name'    => $request['first_name'],
				'last_name'     => $request['last_name'],
				'phone_number'  => $request['phone_number'],
				'gender'        => $request['gender'],
				'dob'           => $request['dob'],
				'profile_image' => $request['profile_image'],
				'verified'      => $request['verified'],
				'user_id'       => $request['user_id'],
				'role_id'       => $request['role_id'],
			]);
		return response()->json($clientInput, 201);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Model\Client  $client
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Client $client) {
		return response()->json($client->delete(), 204);
	}
}
