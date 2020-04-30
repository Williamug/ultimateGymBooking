<?php

use Illuminate\Support\Facades\Route;

Route::get('/',

function () {
		return view('welcome');
	});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// settings
Route::get('settings', 'web\SettingsController@index');
/*Route::post('settings', 'web\SettingsController@store');
Route::put('settings/{setting}', 'web\SettingsController@update');
Route::delete('settings/{setting}', 'web\SettingsController@destroy');

// currencies
Route::get('currencies', 'web\CurrenciesController@index');
Route::post('currencies', 'web\CurrenciesController@store');
Route::get('currencies/{currency}', 'web\CurrenciesController@show');
Route::patch('currencies/{currency}', 'web\CurrenciesController@update');
Route::delete('currencies/{currency}', 'web\CurrenciesController@destroy');

// roles
Route::get('roles', 'web\RolesController@index');
Route::post('roles', 'web\RolesController@store');
Route::get('roles/{role}', 'web\RolesController@show');
Route::patch('roles/{role}', 'web\RolesController@update');
Route::delete('roles/{role}', 'web\RolesController@destroy');

// service
Route::get('services', 'web\ServicesController@index');
Route::post('services', 'web\ServicesController@store');
Route::get('services/{service}', 'web\ServicesController@show');
Route::patch('services/{service}', 'web\ServicesController@update');
Route::delete('services/{service}', 'web\ServicesController@destroy');

// instructor
Route::get('instructors', 'web\InstructorsController@index');
Route::post('instructors', 'web\InstructorsController@store');
Route::get('instructors/{instructor}', 'web\InstructorsController@show');
Route::patch('instructors/{instructor}', 'web\InstructorsController@update');
Route::delete('instructors/{instructor}', 'web\InstructorsController@destroy');

// clients
Route::get('clients', 'web\ClientsController@index');
Route::post('clients', 'web\ClientsController@store');
Route::get('clients/{client}', 'web\ClientsController@show');
Route::patch('clients/{client}', 'web\ClientsController@update');
Route::delete('clients/{client}', 'web\ClientsController@destroy');

// admins
Route::get('admins', 'web\AdminsController@index');
Route::post('admins', 'web\AdminsController@store');
Route::get('admins/{admin}', 'web\AdminsController@show');
Route::patch('admins/{admin}', 'web\AdminsController@update');
Route::delete('admins/{admin}', 'web\AdminsController@destroy');

// bookings
Route::get('bookings', 'web\BookingsController@index');
Route::post('bookings', 'web\BookingsController@store');
Route::get('bookings/{booking}', 'web\BookingsController@show');
Route::patch('bookings/{booking}', 'web\BookingsController@update');
Route::delete('bookings/{booking}', 'web\BookingsController@destroy');*/
