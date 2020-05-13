<?php

use Illuminate\Support\Facades\Route;

Route::get('/',

function () {
		return view('welcome');
	})->name('landing_page');

Auth::routes();

Route::patch('user/{user}', 'web\UsersController@update')->name('user.update');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('bookings', 'web\SettingsController@index')->name('bookings.index');
// Route::get('clients', 'web\SettingsController@index')->name('clients.index');
Route::get('reports', 'web\SettingsController@index')->name('reports.index');
Route::get('services', 'web\SettingsController@index')->name('services.index');

Route::get('instructor', 'web\SettingsController@index')->name('instructor.index');
Route::get('admin', 'web\SettingsController@index')->name('admin.index');

// email
Route::get('inbox', 'web\EmailInboxesController@index')->name('inbox.index');
Route::get('compose', 'web\SettingsController@index')->name('compose.index');
Route::get('read', 'web\SettingsController@index')->name('read.index');
// Route::post('settings', 'web\SettingsController@store');
// Route::put('settings/{setting}', 'web\SettingsController@update');
// Route::delete('settings/{setting}', 'web\SettingsController@destroy');

// // currencies
// Route::get('currencies', 'web\CurrenciesController@index');
// Route::post('currencies', 'web\CurrenciesController@store');
// Route::get('currencies/{currency}', 'web\CurrenciesController@show');
// Route::patch('currencies/{currency}', 'web\CurrenciesController@update');
// Route::delete('currencies/{currency}', 'web\CurrenciesController@destroy');

// // service
Route::get('services', 'web\ServicesController@index')->name('services.index');
Route::get('services/create', 'web\ServicesController@create')->name('services.create');
Route::post('services', 'web\ServicesController@store')->name('services.store');
Route::get('services/{service:title}', 'web\ServicesController@show')->name('services.show');
Route::get('services/{service:title}/edit', 'web\ServicesController@edit')->name('services.edit');
Route::patch('services/{service}', 'web\ServicesController@update')->name('services.update');
Route::delete('services/{service}', 'web\ServicesController@destroy')->name('services.destroy');

// // instructor
// Route::get('instructors', 'web\InstructorsController@index');
// Route::post('instructors', 'web\InstructorsController@store');
// Route::get('instructors/{instructor}', 'web\InstructorsController@show');
// Route::patch('instructors/{instructor}', 'web\InstructorsController@update');
// Route::delete('instructors/{instructor}', 'web\InstructorsController@destroy');

// // clients
Route::get('clients', 'web\ClientsController@index')->name('clients.index');
Route::get('clients/create', 'web\ClientsController@create')->name('clients.create');
Route::post('clients', 'web\ClientsController@store')->name('clients.store');
Route::get('clients/{client}', 'web\ClientsController@show')->name('clients.show');
Route::get('clients/{client}/edit', 'web\ClientsController@edit')->name('clients.edit');
Route::patch('clients/{client}', 'web\ClientsController@update')->name('clients.update');
Route::delete('clients/{client}', 'web\ClientsController@destroy')->name('clients.destroy');

// // admins
// Route::get('admins', 'web\AdminsController@index');
// Route::post('admins', 'web\AdminsController@store');
// Route::get('admins/{admin}', 'web\AdminsController@show');
// Route::patch('admins/{admin}', 'web\AdminsController@update');
// Route::delete('admins/{admin}', 'web\AdminsController@destroy');

// // bookings
Route::get('bookings', 'web\BookingsController@index')->name('bookings.index');
Route::get('bookings/create', 'web\BookingsController@create')->name('bookings.create');
Route::post('bookings', 'web\BookingsController@store')->name('bookings.store');
Route::get('bookings/{booking}', 'web\BookingsController@show')->name('bookings.show');
Route::get('bookings/{booking}/edit', 'web\BookingsController@edit')->name('bookings.edit');
Route::patch('bookings/{booking}', 'web\BookingsController@update')->name('bookings.update');
Route::delete('bookings/{booking}', 'web\BookingsController@destroy')->name('bookings.destroy');

// roles
Route::get('roles/{role}', 'web\RolesController@show');
Route::patch('roles/{role}', 'web\RolesController@update');
Route::delete('roles/{role}', 'web\RolesController@destroy');

// settings
Route::get('settings', 'web\SettingsController@index')->name('settings.index');
Route::patch('settings/{setting}', 'web\SettingsController@update')->name('settings.update');

// email settings
Route::patch('emailsettings/{emailSetting}', 'web\EmailSettingsController@update')->name('emailsettings.update');

// email template
Route::get('email-templates/{emailTemplate}', 'web\EmailTemplatesController@show')->name('email-template.show');
Route::delete('email-templates/{emailTemplate}', 'web\EmailTemplatesController@destroy')->name('email-template.destroy');