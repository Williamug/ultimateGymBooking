<?php

namespace App\Model;

use App\Model\Booking;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model {
	protected $fillable = ['payment_method_id', 'amount'];

	public function bookings() {
		return $this->hasOne(Booking::class );
	}
}
