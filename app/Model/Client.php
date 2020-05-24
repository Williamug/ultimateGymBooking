<?php

namespace App\Model;

use App\Model\Booking;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Client extends Model {
	protected $fillable = [
		'first_name',
		'last_name',
		'gender',
		'phone_number',
		'dob',
		'profile_image',
		'verified',
		'user_id',
		'role_id',
	];

	public function user() {
		return $this->belongsTo(User::class );
	}

	public function bookings() {
		return $this->belongsToMany(Booking::class );
	}
}
