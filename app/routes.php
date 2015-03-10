<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@getIndex');
Route::get('login', 'HomeController@getLogin');
Route::get('register', 'HomeController@getRegister');
Route::get('logout', 'HomeController@logout');

Route::post('register', 'HomeController@postRegister');
Route::post('login', 'HomeController@postLogin');

Route::get('password/reset', array(
  'uses' => 'PasswordController@remind',
  'as' => 'password.remind'
));

Route::post('password/reset', array(
  'uses' => 'PasswordController@request',
  'as' => 'password.request'
));

Route::get('password/reset/{token}', array(
  'uses' => 'PasswordController@reset',
  'as' => 'password.reset'
));

Route::post('password/reset/{token}', array(
  'uses' => 'PasswordController@update',
  'as' => 'password.update'
));

Route::group(array('before' => 'auth'), function(){

	Route::get('owner', 'OwnerController@getIndex');
  Route::get('owner/mechanic', 'OwnerController@getMechanic');
  Route::get('owner/customer', 'OwnerController@getCustomer');

});

Route::group(array('before' => 'auth'), function(){

	Route::get('mechanic', 'MechanicController@getIndex');
  Route::get('mechanic/create', 'MechanicController@getCreate');
  Route::get('mechanic/edit', 'MechanicController@edit');

  Route::post('mechanic/create', 'MechanicController@postCreate');
  Route::post('mechanic/edit', 'MechanicController@update');

});

Route::group(array('before' => 'auth'), function(){

	Route::get('customer', 'CustomerController@getIndex');
  Route::get('customer/create', 'CustomerController@getCreate');
  Route::get('customer/edit', 'CustomerController@edit');

  Route::post('customer/create', 'CustomerController@postCreate');
  Route::post('customer/edit', 'CustomerController@update');

});

Route::resource('mechanic', 'MechanicController');
Route::resource('customer', 'CustomerController');