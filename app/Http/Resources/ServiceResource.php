<?php

namespace App\Http\Resources;

use App\Http\Resources\InstructorResource;
use App\Http\Resources\ServiceResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource {
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function toArray($request) {
		// return parent::toArray($request);
		return [
			'id'                         => $this->id,
			'price'                      => $this->price,
			'title'                      => $this->title,
			'service_duration'           => $this->service_duration,
			'available_seats'            => $this->available_seats,
			'description'                => $this->description,
			'service_starts_at'          => $this->service_starts_at,
			'service_ends_at'            => $this->service_ends_at,
			'allow_booking_max_days_ago' => $this->allow_booking_max_days_ago,
			'service_duration_type'      => $this->service_duration_type,
			'status'                     => $this->status,
			'days'                       => $this->days,
			'instructors'                => new InstructorResource($this->instructor),
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