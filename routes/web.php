<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Auth\LoginController@admin_login')->name('admin-login');

Route::get('admin', 'Auth\LoginController@admin_login')->name('admin-login');

Route::get('logout', function () {
    Auth::logout();
    return redirect('/admin');
});

Auth::routes();

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

// Resest Password 
Route::get('forgot-password', 'Auth\PasswordResetController@forgetPassword')->name('forgot-password');
Route::post('generate-reset-password-link', 'Auth\PasswordResetController@generateResetPaswordLink')->name('generate-reset-password-link');
Route::get('verify-reset-password-token/{token}', 'Auth\PasswordResetController@verifyResetPasswordToken')->name('verify-reset-password-token');
Route::post('reset-password', 'Auth\PasswordResetController@resetPassword')->name('reset-password');
Route::get('password-reset-thanks', 'Auth\PasswordResetController@passwordResetThanks')->name('password-reset-thanks');

// Users
Route::get('users', 'UsersController@index')->name('users-index');
Route::get('users/add', 'UsersController@add')->name('user-add');
Route::post('users/create', 'UsersController@create')->name('user-create');
Route::get('users/view/{id}', 'UsersController@view')->name('user-view');
Route::get('users/edit/{id}', 'UsersController@edit')->name('user-edit');
Route::post('users/update', 'UsersController@update')->name('user-update');
Route::post('users/status', 'UsersController@status')->name('user-status');
Route::post('users/delete', 'UsersController@delete')->name('user-delete');
Route::get('users/change-password/{id}', 'UsersController@changePassword')->name('user-change-password');
Route::post('users/update-password', 'UsersController@updatePassword')->name('user-update-password');
Route::post('users/verify', 'UsersController@verify')->name('user-verify');

// Recordings
Route::get('recordings', 'RecordingsController@index')->name('recordings-index');
Route::get('recordings/view/{id}', 'RecordingsController@view')->name('recording-view');
Route::get('recordings/edit/{id}', 'RecordingsController@edit')->name('recording-edit');
Route::post('recordings/update', 'RecordingsController@update')->name('recording-update');
Route::post('recordings/status', 'RecordingsController@status')->name('recording-status');
Route::post('recordings/delete', 'RecordingsController@delete')->name('recording-delete');

// Pages 
Route::get('pages', 'PagesController@index')->name('pages-index');
Route::get('pages/add', 'PagesController@add')->name('page-add');
Route::post('pages/create', 'PagesController@create')->name('page-create');
Route::get('pages/view/{id}', 'PagesController@view')->name('page-view');
Route::get('pages/edit/{id}', 'PagesController@edit')->name('page-edit');
Route::post('pages/update', 'PagesController@update')->name('page-update');
Route::post('pages/status', 'PagesController@status')->name('page-status');
Route::post('pages/delete', 'PagesController@delete')->name('page-delete');

// Settings 
Route::get('settings/profile', 'SettingsController@profile')->name('setting-profile');
Route::post('settings/update-profile', 'SettingsController@updateProfile')->name('setting-update-profile');
Route::get('settings/change-password', 'SettingsController@changePassword')->name('setting-change-password');
Route::post('settings/update-password', 'SettingsController@updatePassword')->name('setting-update-password');
