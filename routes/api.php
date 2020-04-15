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

// service
Route::get('services', 'API\ServicesController@index');
Route::post('services', 'API\ServicesController@store');
Route::get('services/{service}', 'API\ServicesController@show');
Route::patch('services/{service}', 'API\ServicesController@update');
Route::delete('services/{service}', 'API\ServicesController@destroy');
