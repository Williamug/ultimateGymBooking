<?php

namespace App\Model;

use App\Model\NutritionalPost;
use App\User;
use Illuminate\Database\Eloquent\Model;

class NutritionalComment extends Model {
	protected $fillable = ['comment', 'nutritional_post_id', 'user_id'];
	public function user() {
		return $this->belongsTo(User::class );
	}

	public function nutritionalpost() {
		return $this->belongsTo(NutritionalPost::class );
	}
}
