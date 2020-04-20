<?php

namespace App\Http\Resources;

use App\Http\Resources\RoleResource;
use App\Model\Role;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource {
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function toArray($request) {
		// return parent::toArray($request);
		return [
			'id'           => $this->id,
			'first_name'   => $this->first_name,
			'last_name'    => $this->last_name,
			'gender'       => $this->gender,
			'phone_number' => $this->phone_number,
			'user'         => $this->user,
			'role'         => new RoleResource(Role::find($this->roles)),
			'created_at'   => $this->created_at,
			'updated_at'   => $this->updated_at,
		];
	}

	public function with($request) {
		return [
			'version'       => '1.0.0',
			'author'        => 'Asaba William (williamDk)',
			'author_url'    => 'http://williamug.wordpress.com',
			'author_github' => 'http://github.com/williamug',
		];
	}
}
