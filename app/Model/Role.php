<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $fillable = ['role'];

	public function clients()
	{
		return $this->hasMany(Client::class);
	}
}
