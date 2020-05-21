<?php

namespace App\Model;

use App\Model\Currency;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model {
	protected $fillable = [
		'currency_id',
		'company_name',
		'address',
		'phone_number',
		'fax_number',
		'official_company_number',
		'email',
		'logo',
		'timezone',
		'company_website'
	];

	public function currency() {
		return $this->belongsTo(Currency::class );
	}

	public function user() {
		return $this->belongsTo(User::class );
	}
}
