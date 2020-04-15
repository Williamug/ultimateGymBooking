<?php

namespace App\Model;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model {
	protected $fillable = [
		'currency',
		'currency_symbol',
		'currency_long_name',
	];

	public function setting() {
		return $this->hasMany(Setting::class );
	}
}
