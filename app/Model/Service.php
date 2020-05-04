<?php

namespace App\Model;

use App\Model\Instructor;
use Illuminate\Database\Eloquent\Model;

class Service extends Model {
	protected $fillable = [
		'price',
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

	public function instructors() {
		return $this->belongsToMany(Instructor::class );
	}
}
