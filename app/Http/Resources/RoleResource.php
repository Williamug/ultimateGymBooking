<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource {
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function toArray($request) {
		return parent::toArray($request);
	}

	// signatures
	public function with($request) {
		return [
			'version'       => '1.0.0',
			'author'        => 'Asaba William (williamDk)',
			'author_url'    => 'http://williamug.wordpress.com',
			'author_github' => 'http://github.com/williamug',
		];
	}
}
