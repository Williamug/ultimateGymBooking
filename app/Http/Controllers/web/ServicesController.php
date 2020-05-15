<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Model\Instructor;
use App\Model\Service;
use App\Model\Setting;
use Illuminate\Http\Request;

class ServicesController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$services = Service::where('id', '>', 0)->orderBy('id', 'desc')->paginate(10);
		$setting  = Setting::first();

		return view('services.index', compact('services', 'setting'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$instructors = Instructor::all();
		$setting     = Setting::first();

		return view('services.create', compact('instructors', 'setting'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		$instructor = Instructor::where('id', $request['instructor_id'])->get();

		if ($request->get('days')) {
			$weekDays = implode(',', $request->get('days'));
		} else {
			return redirect()->route('services.edit', ['service' => $service])->with('message', 'No day(s) selected, Please select at least one day');
		}
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
		$services = Service::create([
				'price'                      => $request['price'],
				'title'                      => $request['title'],
				'available_seats'            => $request['available_seats'],
				'description'                => $request['description'],
				'service_starts_at'          => $request['service_starts_at'],
				'service_ends_at'            => $request['service_ends_at'],
				'allow_booking_max_days_ago' => $request['allow_booking_max_days_ago'],
				'service_duration_type'      => $request['service_duration_type'],
				'status'                     => $request['status'],
				'days'                       => $weekDays,
			]);

		$services->instructors()->attach($instructor);
		return redirect()->route('services.index')->with('message', 'A new service has been added successfully');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Model\Service  $service
	 * @return \Illuminate\Http\Response
	 */
	public function show(Service $service) {
		$setting = Setting::first();

		return view('services.show', compact('service', 'setting'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Model\Service  $service
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Service $service) {
		$instructors = Instructor::all();
		$setting     = Setting::first();

		$weekDays = explode(',', $service->days);
		return view('services.edit', compact('service', 'instructors', 'weekDays', 'setting'));
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

		if ($request->get('days')) {
			$weekDays = implode(',', $request->get('days'));
		} else {
			return redirect()->route('services.edit', ['service' => $service])->with('message', 'No day(s) selected, Please select at least one day');
		}
		// $weekDays   = implode(",", $request->get('days'));
		$data = request()->validate([
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
		$service->update([
				'price'                      => $request['price'],
				'title'                      => $request['title'],
				'available_seats'            => $request['available_seats'],
				'description'                => $request['description'],
				'service_starts_at'          => $request['service_starts_at'],
				'service_ends_at'            => $request['service_ends_at'],
				'allow_booking_max_days_ago' => $request['allow_booking_max_days_ago'],
				'service_duration_type'      => $request['service_duration_type'],
				'status'                     => $request['status'],
				'days'                       => $weekDays,
			]);
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
