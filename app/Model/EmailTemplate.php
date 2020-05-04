<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model {
	protected $fillable = ['title', 'message'];
}
