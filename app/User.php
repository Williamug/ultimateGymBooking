<?php

namespace App;

use App\Model\Admin;
use App\Model\Booking;
use App\Model\Client;
use App\Model\Instructor;
use App\Model\NutritionalComment;
use App\Model\NutritionalPost;
use App\Model\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password', 'role_id', 'profile_image',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function role() {
		return $this->belongsTo(Role::class );
	}

	public function instructors() {
		return $this->belongsToMany(Instructor::class );
	}

	public function client() {
		return $this->hasOne(Client::class );
	}
	public function instructor() {
		return $this->hasOne(Instructor::class );
	}
	public function admin() {
		return $this->hasOne(Admin::class );
	}
	public function bookings() {
		return $this->hasMany(Booking::class );
	}

	public function nutritionalPosts() {
		return $this->hasMany(NutritionalPost::class );
	}
	public function nutritionalcomments() {
		return $this->hasMany(NutritionalComment::class );
	}
}
