<?php

use Illuminate\Support\Facades\Route;

Route::get('/',

function () {
		return view('welcome');
	})->name('landing_page');

Auth::routes();

/**
|--------------------------------------
| home(Dashboards)
|-------------------------------------
| Super Admin
| Admin
| Accountant
| Clients
| Instructor
 */
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/super-dashboard', 'web\SuperAdminDashboardController@index')->name('super-dashboard');

// register super admin
Route::get('super-admin', 'web\SuperAdminsController@create')->name('super-admin.create');
Route::post('super-admin', 'web\SuperAdminsController@store')->name('super-admin.store');

// users
Route::patch('user/{user}', 'web\UsersController@update')->name('user.update');

// testing routes
Route::get('reports', 'web\SettingsController@index')->name('reports.index');

// email
Route::get('inbox', 'web\EmailInboxesController@index')->name('inbox.index');
Route::get('compose', 'web\SettingsController@index')->name('compose.index');
Route::get('read', 'web\SettingsController@index')->name('read.index');

// // currencies
// Route::get('currencies', 'web\CurrenciesController@index');
// Route::post('currencies', 'web\CurrenciesController@store');
// Route::get('currencies/{currency}', 'web\CurrenciesController@show');
// Route::patch('currencies/{currency}', 'web\CurrenciesController@update');
// Route::delete('currencies/{currency}', 'web\CurrenciesController@destroy');

// service
Route::get('services', 'web\ServicesController@index')->name('services.index');
Route::get('services/create', 'web\ServicesController@create')->name('services.create');
Route::post('services', 'web\ServicesController@store')->name('services.store');
Route::get('services/{service:title}', 'web\ServicesController@show')->name('services.show');
Route::get('services/{service:title}/edit', 'web\ServicesController@edit')->name('services.edit');
Route::patch('services/{service}', 'web\ServicesController@update')->name('services.update');
Route::delete('services/{service}', 'web\ServicesController@destroy')->name('services.destroy');

// instructor
Route::get('instructors', 'web\InstructorsController@index')->name('instructors.index');
Route::get('instructors/create', 'web\InstructorsController@create')->name('instructors.create');
Route::post('instructors', 'web\InstructorsController@store')->name('instructors.store');
Route::get('instructors/{instructor}', 'web\InstructorsController@show')->name('instructors.show');
Route::get('instructors/{instructor}/edit', 'web\InstructorsController@edit')->name('instructors.edit');
Route::patch('instructors/{instructor}', 'web\InstructorsController@update')->name('instructors.update');
Route::delete('instructors/{instructor}', 'web\InstructorsController@destroy')->name('instructors.destroy');

// // clients
Route::get('clients', 'web\ClientsController@index')->name('clients.index');
Route::get('clients/create', 'web\ClientsController@create')->name('clients.create');
Route::post('clients', 'web\ClientsController@store')->name('clients.store');
Route::get('clients/{client}', 'web\ClientsController@show')->name('clients.show');
Route::get('clients/{client}/edit', 'web\ClientsController@edit')->name('clients.edit');
Route::patch('clients/{client}', 'web\ClientsController@update')->name('clients.update');
Route::delete('clients/{client}', 'web\ClientsController@destroy')->name('clients.destroy');

// admins
Route::get('admins', 'web\AdminsController@index')->name('admins.index');
Route::get('admins/create', 'web\AdminsController@create')->name('admins.create');
Route::post('admins', 'web\AdminsController@store')->name('admins.store');
Route::get('admins/{admin}', 'web\AdminsController@show')->name('admins.show');
Route::get('admins/{admin}/edit', 'web\AdminsController@edit')->name('admins.edit');
Route::patch('admins/{admin}', 'web\AdminsController@update')->name('admins.update');
Route::delete('admins/{admin}', 'web\AdminsController@destroy')->name('admins.destroy');

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

// update user profile
Route::get('user-profile/{user}', 'web\UserProfilesController@show')->name('user-profile.show');
Route::patch('user-profile/{user}', 'web\UserProfilesController@update')->name('user-profile.update');

// change user password
Route::patch('change-password/{user}', 'web\ChangePasswordController@update')->name('change-password.update');

/*----------------------------------------------------------------------------------------------
|
| clients
|------------------------------------------------------------------------------------------------
 */
Route::get('clients-dashboard', 'web\ClientDashboardController@index')->name('clients-dashboard');

// service
Route::get('client/services', 'web\Client\ClientServicesController@index')->name('client-services.index');
Route::get('client/services/{service}', 'web\Client\ClientServicesController@show')->name('client-services.show');

// bookings
Route::get('client/bookings', 'web\Client\ClientBookingsController@index')->name('client-bookings.index');
Route::get('client/bookings/create', 'web\Client\ClientBookingsController@create')->name('client-bookings.create');
