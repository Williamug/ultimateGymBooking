<?php

namespace App\Model;

use App\Model\NutritionalComment;
use App\User;
use Illuminate\Database\Eloquent\Model;

class NutritionalPost extends Model {
	protected $fillable = ['post', 'user_id', 'image'];
	public function user() {
		return $this->belongsTo(User::class );
	}

	public function nutritionalcomments() {
		return $this->hasMany(NutritionalComment::class );
	}
}
