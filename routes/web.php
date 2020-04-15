<?php

use Illuminate\Support\Facades\Route;

Route::get('/',

function () {
		return view('welcome');
	});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// settings
Route::get('settings', 'API\SettingsController@index');
Route::post('settings', 'API\SettingsController@store');
Route::put('settings/{setting}', 'API\SettingsController@update');
