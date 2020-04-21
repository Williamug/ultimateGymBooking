<?php

namespace App\Http\Resources;

use App\Http\Resources\CurrencyResource;
use App\Http\Resources\PaymentResource;
use App\Model\Currency;
use App\Model\Payment;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource {
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
			'phone_number' => $this->phone_number,
			'booking_date' => $this->booking_date,
			'booking_time' => $this->booking_time,
			'quality'      => $this->quality,
			'comment'      => $this->comment,
			'status'       => $this->status,
			'payment'      => new PaymentResource(Payment::find($this->payment_id)),
			'currency'     => new CurrencyResource(Currency::find($this->currency_id)),
			'instructor'   => $this->instructors,
			'service'      => $this->services,
			'client'       => $this->clients,
			'created_at'   => $this->created_at,
			'updated_at'   => $this->updated_at,
		];
	}
}
