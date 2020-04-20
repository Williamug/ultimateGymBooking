<?php

namespace App\Model;

use App\Model\Role;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model {
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

	public function roles() {
		return $this->belongsToMany(Role::class )->withTimestamps();
	}
}
