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
		'roles_id',
	];

	public function services() {
		return $this->belongsToMany(Service::class );
	}

	public function roles() {
		return $this->belongsTo(Role::class );
	}

	public function users() {
		return $this->belongsToMany(User::class )->withTimestamps();
	}
}
