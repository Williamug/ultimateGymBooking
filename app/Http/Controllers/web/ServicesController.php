<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Model\Instructor;
use App\Model\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$services = Service::where('id', '>', 0)->orderBy('id', 'desc')->paginate(10);
		return view('services.index', compact('services'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$instructors = Instructor::all();

		return view('services.create', compact('instructors'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		$instructor = Instructor::where('id', $request['instructor_id'])->get();

		$data = request()->validate([
				'price'                      => 'required',
				'title'                      => 'required|unique:App\Model\Service,title',
				'service_duration'           => '',
				'available_seats'            => 'required',
				'description'                => '',
				'service_starts_at'          => 'required',
				'service_ends_at'            => 'required',
				'allow_booking_max_days_ago' => '',
				'service_duration_type'      => '',
				'status'                     => '',
				'days'                       => '',
			]);
		$services = Service::create($data);

		$services->instructors()->attach($instructor);
		return redirect('services/create')->with('message', 'A new service has been added successfully');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Model\Service  $service
	 * @return \Illuminate\Http\Response
	 */
	public function show(Service $service) {

		return view('services.show', compact('service'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Model\Service  $service
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Service $service) {
		$instructors = Instructor::all();
		return view('services.edit', compact('service', 'instructors'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Model\Service  $service
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Service $service) {
		$instructor = Instructor::where('id', $request['instructor_id'])->get();
		$data       = request()->validate([
				'price'                      => 'required',
				'title'                      => 'required',
				'service_duration'           => '',
				'available_seats'            => 'required',
				'description'                => '',
				'service_starts_at'          => 'required',
				'service_ends_at'            => 'required',
				'allow_booking_max_days_ago' => '',
				'service_duration_type'      => '',
				'status'                     => '',
				'days'                       => '',
			]);
		$service->update($data);
		$service->instructors()->detach();
		$service->instructors()->attach($instructor);
		return redirect()->route('services.show', ['service' => $service])->with('message', 'Service has been updated');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Model\Service  $service
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Service $service) {
		$service->delete();
		$service->instructors()->detach();
		return redirect('services')->with('message', 'This service has been deleted permanently');
	}

	// validation
	public function serviceValidationRules() {
		request()->validate([
				'price'                      => 'required',
				'title'                      => 'required',
				'service_duration'           => '',
				'available_seats'            => 'required',
				'instructor_id'              => 'required',
				'description'                => '',
				'service_starts_at'          => 'required',
				'service_ends_at'            => 'required',
				'allow_booking_max_days_ago' => '',
				'service_duration_type'      => '',
				'status'                     => '',
				'days'                       => '',
			]);

	}
}
