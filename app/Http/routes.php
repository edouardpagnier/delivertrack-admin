<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'DashboardController@index')->name('dashboard');
Route::get('/map', 'MapController@index');

Route::get('/my-profile', 'UserController@showMyProfile');
Route::post('/my-profile', 'UserController@postMyProfile');
Route::post('/my-profile/change-password', 'UserController@postMyProfileChangePassword');

Route::get('/accounts', 'UserController@showAccounts')->name('accounts');
Route::get('/accounts/new', 'UserController@showAddUser');
Route::post('/accounts/new', 'UserController@postAddUser');
Route::get('/accounts/edit/{user_id}', 'UserController@showEditUser');
Route::post('/accounts/edit/{user_id}', 'UserController@postEditUser');
Route::post('/accounts/edit/change-password/{user_id}', 'UserController@postEditUserChangePassword');
Route::get('/accounts/delete/{user_id}', 'UserController@deleteUser');

Route::get('/drivers', 'DriverController@showDrivers');
Route::get('/drivers/active', 'DriverController@getActiveDriversNumber');
Route::get('/drivers/coordinates', 'DriverController@getDriversCoordinates');




Route::auth();

