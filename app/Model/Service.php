<?php

namespace App\Model;

use App\Model\Currency;
use Illuminate\Database\Eloquent\Model;

class Service extends Model {
	protected $fillable = [
		'currencies_id',
		'title',
		'service_duration',
		'available_seats',
		'description',
		'service_starts_at',
		'service_ends_at',
		'allow_booking_max_days_ago',
		'service_duration_type',
		'status',
		'days',
	];

	public function currencies() {
		return $this->belongsTo(Currency::class );
	}
}
