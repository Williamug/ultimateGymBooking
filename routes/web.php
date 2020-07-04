<?php

use Illuminate\Support\Facades\Route;

// Route::get('/',

// function () {
// 		return view('welcome');
// 	})->name('landing_page');
Route::get('/', 'web\WelcomeController@index')->name('landing-page');

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
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/super-dashboard', 'web\SuperAdminDashboardController@index')->name('super-dashboard');

// register super admin
Route::get('super-admin', 'web\SuperAdminsController@create')->name('super-admin.create');
Route::post('super-admin', 'web\SuperAdminsController@store')->name('super-admin.store');

// users
Route::patch('user/{user}', 'web\UsersController@update')->name('user.update');

// reports
Route::get('income', 'web\Reports\IncomesController@index')->name('income.index');
Route::get('booking-report', 'web\Reports\BookingReportsController@index')->name('booking-report.index');
Route::get('client-report', 'web\Reports\ClientReportsController@index')->name('client-report.index');

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

// bookig payment
Route::get('booking-payment/create/{booking}', 'web\BookingPaymentController@create')->name('booking-payment.create');
Route::post('booking-payment/{booking}', 'web\BookingPaymentController@store')->name('booking-payment.store');

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
Route::get('clients-dashboard', 'web\ClientDashboardController@index')->name('clients-dashboard')->middleware('verified');

// service
Route::get('client/services', 'web\Client\ClientServicesController@index')->name('client-services.index');
Route::get('client/services/{service}', 'web\Client\ClientServicesController@show')->name('client-services.show');

// bookings
Route::get('client/bookings', 'web\Client\ClientBookingsController@index')->name('client-bookings.index');
Route::get('client/bookings/create', 'web\Client\ClientBookingsController@create')->name('client-bookings.create');
Route::post('client/bookings', 'web\Client\ClientBookingsController@store')->name('client-bookings.store');
Route::get('client/bookings/{booking}', 'web\Client\ClientBookingsController@edit')->name('client-bookings.edit');
Route::patch('client/bookings/{booking}', 'web\Client\ClientBookingsController@update')->name('client-bookings.update');

// instructor
Route::get('client/instructors', 'web\Client\ClientInstructorsController@index')->name('client-instructors.index');
Route::get('cleint/instructors/{instructor}', 'web\Client\ClientInstructorsController@show')->name('client-instructors.show');

// update user profile
Route::get('client/profile/{user}', 'web\Client\ClientProfilesController@show')->name('client-profile.show');
Route::patch('client/profile/{user}', 'web\Client\ClientProfilesController@update')->name('client-profile.update');

// nutrition tips and comments
Route::post('client/nutrition/{tip}/comments', 'web\Client\NutritionalCommentController@store')->name('nutrition-comment.store');

Route::get('client/nutrition/{tip}', 'web\ClientDashboardController@show')->name('nutrition-tip.show');

/*---------------------------------------------------------------------
|
| Instructor
|------------------------------------------------------------------------
 */
Route::get('instructor-dashboard', 'web\Instructor\InstructorDashboardController@index')->name('instructor-dashboard')->middleware('verified');

// service
Route::get('instructor/services', 'web\Instructor\InstructorServicesController@index')->name('instructor-services.index');
Route::get('instructor/services/{service}', 'web\Instructor\InstructorServicesController@show')->name('instructor-services.show');

// bookings
Route::get('instructor/bookings', 'web\Instructor\InstructorBookingsController@index')->name('instructor-bookings.index');
Route::get('instructor/bookings/{booking}', 'web\Instructor\InstructorBookingsController@show')->name('instructor-bookings.show');

// post/tip of the day
Route::get('instructor/posts', 'web\Instructor\InstructorPostsController@index')->name('instructor-post.index');
Route::get('instructor/posts/create', 'web\Instructor\InstructorPostsController@create')->name('instructor-post.create');
Route::post('instructor/posts', 'web\Instructor\InstructorPostsController@store')->name('instructor-post.store');
Route::get('instructor/posts/{tip}', 'web\Instructor\InstructorPostsController@show')->name('instructor-post.show');
Route::get('instructor/posts/{tip}/edit', 'web\Instructor\InstructorPostsController@edit')->name('instructor-post.edit');
Route::patch('instructor/posts/{tip}', 'web\Instructor\InstructorPostsController@update')->name('instructor-post.update');

// update user profile
Route::get('instructor/profile/{user}', 'web\Instructor\InstructorProfilesController@show')->name('instructor-profile.show');
Route::patch('instructor/profile/{user}', 'web\Instructor\InstructorProfilesController@update')->name('instructor-profile.update');