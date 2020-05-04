<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EmailSetting extends Model {
	protected $fillable = [
		'email_sent_from_name',
		'email',
		'email_driver_id',
		'email_host',
		'email_port',
		'encryption_id',
		'password'
	];
}
