<?php

namespace App\Http\Resources;

use App\Http\Resources\RoleResource;

use Illuminate\Http\Resources\Json\JsonResource;

class InstructorResource extends JsonResource {
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
			'phone_number'  => $this->phone_number,
			'mobile_number' => $this->mobile_number,
			'gender'        => $this->gender,
			'dob'           => $this->dob,
			'profile_image' => $this->profile_image,
			'verified'      => $this->verified,
			'roles'         => new RoleResource($this->roles),
			'users'         => $this->users,
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
