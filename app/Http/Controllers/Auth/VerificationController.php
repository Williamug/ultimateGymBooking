<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller {
	/*
	|--------------------------------------------------------------------------
	| Email Verification Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling email verification for any
	| user that recently registered with the application. Emails may also
	| be re-sent if the user didn't receive the original email message.
	|
	 */

	use VerifiesEmails;

	/**
	 * Where to redirect users after verification.
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
		$this->middleware('auth');
		$this->middleware('signed')->only('verify');
		$this->middleware('throttle:6,1')->only('verify', 'resend');
	}
}
