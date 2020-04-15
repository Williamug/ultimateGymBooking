<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyDetails extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	// public function authorize() {
	// 	return true;
	// }

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'curencies_id'             => 'required',
			'company_name'             => 'required|max:25|min:3',
			'address'                  => 'required|min:3',
			'phone_number'             => 'required|min:10|numeric',
			'fax_number'               => 'required|min:10|numeric',
			'official_comapany_number' => 'required|min:10|numeric',
			'email'                    => 'email:rfc,dns',
			'logo'                     => 'image',
			'timezone'                 => '',
		];
	}
}

// $data = $request->validate([

// 				'company_name'             => 'required|max:25|min:3',
// 				'address'                  => 'required|min:3',
// 				'phone_number'             => 'required|min:10|numeric',
// 				'fax_number'               => 'required|min:10|numeric',
// 				'official_comapany_number' => 'required|min:10|numeric',
// 				'email'                    => 'email:rfc,dns',
// 				'logo'                     => 'image',
// 				'timezone'                 => '',
// 			]);
