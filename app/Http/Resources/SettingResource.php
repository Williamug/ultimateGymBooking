<?php

namespace App\Http\Resources;

use App\Http\Resources\CurrencyResource;
use App\Model\Currency;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource {
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function toArray($request) {
		// return parent::toArray($request);
		return [
			'id'                      => $this->id,
			'company_name'            => $this->company_name,
			'address'                 => $this->address,
			'phone_number'            => $this->phone_number,
			'official_company_number' => $this->official_company_number,
			'email'                   => $this->email,
			'logo'                    => $this->logo,
			'currencies'              => new CurrencyResource(Currency::find(2)),
			// 'user'       => $this->user,
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
