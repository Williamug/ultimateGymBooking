<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\Client;
use App\Model\Role;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller {
	/*
	|--------------------------------------------------------------------------
	| Register Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users as well as their
	| validation and creation. By default this controller uses a trait to
	| provide this functionality without requiring any additional code.
	|
	 */

	use RegistersUsers;

	/**
	 * Where to redirect users after registration.
	 *
	 * @var string
	 */
	// protected $redirectTo = RouteServiceProvider::HOME;
	public function redirectTo() {
		// user roles
		$role = Auth::user()->role->role;

		// check user role
		switch ($role) {
			case 'Super Admin':
				return route('super-dashboard');
				break;
			case 'Admin':
				return route('home');
				break;
			case 'Accountant':
				return route('accounts-dashboard');
				break;
			case 'Instructor':
				return route('instructor-dashboard');
				break;
			case 'Client':
				return route('clients-dashboard');
				break;
			default:
				return '/login';
				break;
		}
	}

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('guest');
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data) {
		return Validator::make($data, [
				'name'     => ['required', 'string', 'max:255'],
				'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
				'password' => ['required', 'string', 'min:8', 'confirmed'],
			]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return \App\User
	 */
	protected function create(array $data) {
		$role = Role::find(5);
		$user = User::create([
				'name'     => $data['name'],
				'email'    => $data['email'],
				'password' => Hash::make($data['password']),
				'role_id'  => $role->id,
			]);

		$client = Client::create([
				'user_id' => $user->id,
			]);

		return $user;
	}
}
