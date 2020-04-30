<?php

namespace App\Model;

use App\Model\Setting;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model {
	protected $fillable = [
		'currency',
		'currency_symbol',
		'currency_long_name',
	];

	public function settings() {
		return $this->hasMany(Setting::class );
	}
}
