<?php

namespace App\Http\Resources;

use App\Http\Resources\RoleResource;
use App\Model\Role;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource {
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function toArray($request) {
		// return parent::toArray($request);
		return [
			'id'            => $this->id,
			'first_name'    => $this->first_name,
			'last_name'     => $this->last_name,
			'gender'        => $this->gender,
			'phone_number'  => $this->phone_number,
			'dob'           => $this->dob,
			'profile_image' => $this->profile_image,
			'verified'      => $this->verified,
			'role'          => new RoleResource(Role::find($this->id)),
			'user'          => $this->user,
		];
	}
}
