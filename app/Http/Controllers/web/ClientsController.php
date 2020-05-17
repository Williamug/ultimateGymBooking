<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Model\Booking;
use App\Model\Client;
use App\Model\Role;
use App\Model\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		// $clients = Client::paginate(5)->where('id', '>', 0)->orderBy('id', 'desc')->get();
		$clients = Client::where('id', '>', 0)->orderBy('id', 'desc')->paginate(10);
		$setting = Setting::first();

		return view('clients.index', compact('clients', 'setting'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$roles   = Role::all();
		$setting = Setting::first();

		return view('clients.create', compact('roles', 'setting'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$validation = request()->validate([
				'name'     => 'required',
				'email'    => 'required|unique:users',
				'password' => 'required|min:8'
			]);

		// if ($validation->fails()) {
		// 	return back() ->with('toast_error', 'Oops! An error occured please check your inputs and try again');
		// }

		$user = User::create([
				'name'     => $request['name'],
				'email'    => $request['email'],
				'password' => Hash::make($request['password']),
			]);
		request()->validate([
				'gender'        => '',
				'phone_number'  => '',
				'dob'           => '',
				'profile_image' => 'sometimes|file|image|max:5000',
				'role_id'       => '',
				'user_id'       => '',
			]);

		$client = Client::create([
				'gender'       => $request['gender'],
				'phone_number' => $request['phone_number'],
				'dob'          => $request['dob'],
				'role_id'      => $request['role_id'],
				'user_id'      => $user->id,
			]);

		if (request()->has('profile_image')) {
			$client->update([
					'profile_image' => request()->profile_image->store('profiles', 'public'),
				]);
		}
		return redirect()->route('clients.index')->with('toast_success', 'A new client has been added');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Model\Client  $client
	 * @return \Illuminate\Http\Response
	 */
	public function show(Client $client) {
		$roles    = Role::all();
		$bookings = Booking::all();
		$setting  = Setting::first();

		return view('clients.show', compact('client', 'roles', 'bookings', 'setting'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Model\Client  $client
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Client $client) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Model\Client  $client
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Client $client) {

		request()->validate([
				'gender'        => '',
				'phone_number'  => '',
				'dob'           => '',
				'profile_image' => 'sometimes|file|image|max:5000',
			]);

		$client->update([
				'gender'       => $request['gender'],
				'phone_number' => $request['phone_number'],
				'dob'          => $request['dob'],
			]);
		if (request()->has('profile_image')) {
			$client->update([
					'profile_image' => request()->profile_image->store('profiles', 'public'),
				]);
		}

		return redirect()->route('clients.show', ['client' => $client])->with('toast_success', 'You have updated client details');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Model\Client  $client
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Client $client) {
		$client->delete();
		return redirect()->route('clients.index')->with('message', 'Client with '.$client->id.'has been delete');
	}
}
