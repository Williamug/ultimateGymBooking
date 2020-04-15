<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use App\Model\Currency;
use App\Model\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return ServiceResource::collection(Service::all());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$currency = Currency::find(2);

		$this->serviceValidationRules();

		$serviceData = Service::create([
				'currencies_id'              => $currency->id,
				'title'                      => $request['title'],
				'service_duration'           => $request['service_duration'],
				'available_seats'            => $request['available_seats'],
				'description'                => $request['description'],
				'service_starts_at'          => $request['service_starts_at'],
				'service_ends_at'            => $request['service_ends_at'],
				'allow_booking_max_days_ago' => $request['allow_booking_max_days_ago'],
				'service_duration_type'      => $request['service_duration_type'],
				'status'                     => $request['status'],
				'days'                       => $request['days'],
			]);
		return new ServiceResource($serviceData);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Model\Service  $service
	 * @return \Illuminate\Http\Response
	 */
	public function show(Service $service) {
		return new ServiceResource($service);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Model\Service  $service
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Service $service) {
		$currency = Currency::find(2);

		$this->serviceValidationRules();

		$inputs = $service->update([
				'currencies_id'              => $currency->id,
				'title'                      => $request['title'],
				'service_duration'           => $request['service_duration'],
				'available_seats'            => $request['available_seats'],
				'description'                => $request['description'],
				'service_starts_at'          => $request['service_starts_at'],
				'service_ends_at'            => $request['service_ends_at'],
				'allow_booking_max_days_ago' => $request['allow_booking_max_days_ago'],
				'service_duration_type'      => $request['service_duration_type'],
				'status'                     => $request['status'],
				'days'                       => $request['days'],
			]);
		return response()->json($inputs, 201);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Model\Service  $service
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Service $service) {
		$service->delete();
		return response()->json('Deleted', 204);
	}

	// validation
	public function serviceValidationRules() {
		request()->validate([
				'currencies_id'              => 'required',
				'title'                      => 'required',
				'service_duration'           => 'required',
				'available_seats'            => 'required',
				'description'                => 'required',
				'service_starts_at'          => 'required',
				'service_ends_at'            => 'required',
				'allow_booking_max_days_ago' => 'required',
				'service_duration_type'      => 'required',
				'status'                     => 'required',
				'days'                       => 'required',
			]);

	}
}
