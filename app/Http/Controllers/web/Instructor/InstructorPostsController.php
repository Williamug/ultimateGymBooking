<?php

namespace App\Http\Controllers\web\Instructor;

use App\Http\Controllers\Controller;
use App\Model\Client;

use App\Model\NutritionalPost;
use App\Model\Setting;
use Illuminate\Http\Request;

class InstructorPostsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$setting         = Setting::first();
		$nutritionalTips = NutritionalPost::where('user_id', auth()->id())->orderBy('id', 'desc')->paginate(3);
		return view('front-instructor.posts.index', compact('setting', 'nutritionalTips'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$setting = Setting::first();

		return view('front-instructor.posts.create', compact('setting'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		request()->validate([
				'post'  => 'required',
				'image' => 'sometimes|file|image|max:5000',
			]);

		$nutritionPost = NutritionalPost::create([
				'post'    => request('post'),
				'user_id' => Auth()->id(),
			]);
		if (request()->has('image')) {
			$nutritionPost->update([
					'image' => request()->image->store('posts', 'public'),
				]);
		}

		return redirect()->route('instructor-post.index')->with('toast_success', 'A new post has been added');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Model\NutritionalPost  $tip
	 * @return \Illuminate\Http\Response
	 */
	public function show(NutritionalPost $tip) {
		$clients = Client::all();
		$setting = Setting::first();
		return view('front-instructor.posts.show', compact('tip', 'setting', 'clients'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Model\NutritionalPost  $tip
	 * @return \Illuminate\Http\Response
	 */
	public function edit(NutritionalPost $tip) {
		$setting = Setting::first();

		return view('front-instructor.posts.edit', compact('tip', 'setting'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Model\NutritionalPost  $tip
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, NutritionalPost $tip) {
		request()->validate([
				'post'  => 'required',
				'image' => 'sometimes|file|image|max:5000',
			]);

		$tip->update([
				'post'    => request('post'),
				'user_id' => Auth()->id(),
			]);
		if (request()->has('image')) {
			$tip->update([
					'image' => request()->image->store('posts', 'public'),
				]);
		}

		return redirect()->route('instructor-post.show', ['tip' => $tip])->with('toast_success', 'Post updated');
	}
}
