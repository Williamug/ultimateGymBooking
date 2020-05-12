<?php

namespace App\Model;

use App\Model\Client;

use App\Model\Instructor;
use App\Model\Payment;
use App\Model\Service;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model {
	protected $fillable = [
		'phone_number',
		'booking_date',
		'booking_time',
		'quality',
		'comment',
		'status',
		'payment_id',
		'currency_id'
	];
	public function payments() {
		return $this->belongsTo(Payment::class );
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
