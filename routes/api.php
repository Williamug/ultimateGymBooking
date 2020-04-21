<?php

use Illuminate\Support\Facades\Route;

// Route::middleware('auth:api')->get('/user',

// function (Request $request) {
// 		// return $request->user();
// 	});

// settings
Route::get('settings', 'API\SettingsController@index');
Route::post('settings', 'API\SettingsController@store');
Route::put('settings/{setting}', 'API\SettingsController@update');
Route::delete('settings/{setting}', 'API\SettingsController@destroy');

// currencies
Route::get('currencies', 'API\CurrenciesController@index');
Route::post('currencies', 'API\CurrenciesController@store');
Route::get('currencies/{currency}', 'API\CurrenciesController@show');
Route::patch('currencies/{currency}', 'API\CurrenciesController@update');
Route::delete('currencies/{currency}', 'API\CurrenciesController@destroy');

// roles
Route::get('roles', 'API\RolesController@index');
Route::post('roles', 'API\RolesController@store');
Route::get('roles/{role}', 'API\RolesController@show');
Route::patch('roles/{role}', 'API\RolesController@update');
Route::delete('roles/{role}', 'API\RolesController@destroy');
// Route::apiResource('roles', 'API\RolesController');

// service
Route::get('services', 'API\ServicesController@index');
Route::post('services', 'API\ServicesController@store');
Route::get('services/{service}', 'API\ServicesController@show');
Route::patch('services/{service}', 'API\ServicesController@update');
Route::delete('services/{service}', 'API\ServicesController@destroy');

// instructor
Route::get('instructors', 'API\InstructorsController@index');
Route::post('instructors', 'API\InstructorsController@store');
Route::get('instructors/{instructor}', 'API\InstructorsController@show');
Route::patch('instructors/{instructor}', 'API\InstructorsController@update');
Route::delete('instructors/{instructor}', 'API\InstructorsController@destroy');

// clients
Route::get('clients', 'API\ClientsController@index');
Route::post('clients', 'API\ClientsController@store');
Route::get('clients/{client}', 'API\ClientsController@show');
Route::patch('clients/{client}', 'API\ClientsController@update');
Route::delete('clients/{client}', 'API\ClientsController@destroy');

// admins
Route::get('admins', 'API\AdminsController@index');
Route::post('admins', 'API\AdminsController@store');
Route::get('admins/{admin}', 'API\AdminsController@show');
Route::patch('admins/{admin}', 'API\AdminsController@update');
Route::delete('admins/{admin}', 'API\AdminsController@destroy');

// bookings
Route::get('bookings', 'API\BookingsController@index');
Route::post('bookings', 'API\BookingsController@store');
Route::get('bookings/{booking}', 'API\BookingsController@show');
Route::patch('bookings/{booking}', 'API\BookingsController@update');
Route::delete('bookings/{booking}', 'API\BookingsController@destroy');