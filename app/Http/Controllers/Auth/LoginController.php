<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
	/*
	|--------------------------------------------------------------------------
	| Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles authenticating users for the application and
	| redirecting them to your home screen. The controller uses a trait
	| to conveniently provide its functionality to your applications.
	|
	 */

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
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
		$this->middleware('guest')->except('logout');
	}
}
