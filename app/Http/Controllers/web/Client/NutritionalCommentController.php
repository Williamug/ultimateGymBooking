<?php

namespace App\Http\Controllers\web\Client;

use App\Http\Controllers\Controller;
use App\Model\NutritionalComment;
use App\Model\NutritionalPost;
use Illuminate\Http\Request;

class NutritionalCommentController extends Controller {
	public function __construct() {
		$this->middleware(['auth', 'verified']);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(NutritionalPost $tip) {
		$data = request()->validate([
				'comment' => 'required|max:40',
			]);

		$dd = NutritionalComment::create([
				'comment'             => request('comment'),
				'nutritional_post_id' => $tip->id,
				'user_id'             => Auth()->id(),
			]);

		return back()->with('toast_success', 'Comment posted');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Model\NutritionalComment  $nutritionalComment
	 * @return \Illuminate\Http\Response
	 */
	public function show(NutritionalComment $nutritionalComment) {

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Model\NutritionalComment  $nutritionalComment
	 * @return \Illuminate\Http\Response
	 */
	public function edit(NutritionalComment $nutritionalComment) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Model\NutritionalComment  $nutritionalComment
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, NutritionalComment $nutritionalComment) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Model\NutritionalComment  $nutritionalComment
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(NutritionalComment $nutritionalComment) {
		//
	}
}
