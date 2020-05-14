<?php

namespace App\Model;

use App\Model\Role;
use App\Model\Service;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model {
	protected $fillable = [
		'first_name',
		'last_name',
		'phone_number',
		'mobile_number',
		'gender',
		'dob',
		'profile_image',
		'verified',
		'role_id',
		'user_id',
	];

	public function services() {
		return $this->belongsToMany(Service::class );
	}

	public function role() {
		return $this->belongsTo(Role::class );
	}

	public function user() {
		return $this->belongsTo(User::class );
	}
}
