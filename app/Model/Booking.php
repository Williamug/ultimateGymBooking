<?php

namespace App\Model;

use App\Model\Client;
use App\Model\Instructor;
use App\Model\Payment;
use App\Model\Service;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model {
	protected $fillable = [
		'phone_number',
		'booking_date',
		'booking_time',
		'quantity',
		'comment',
		'status',
		'payment_id',
		'currency_id',
		'user_id'
	];
	public function payment() {
		return $this->belongsTo(Payment::class );
	}

	public function user() {
		return $this->belongsTo(User::class );
	}

	public function services() {
		return $this->belongsToMany(Service::class )->withTimestamps();
	}
	public function clients() {
		return $this->belongsToMany(Client::class )->withTimestamps();
	}
	public function instructors() {
		return $this->belongsToMany(Instructor::class )->withTimestamps();
	}
}
