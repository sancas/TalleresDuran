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
Route::get('contact', 'HomeController@getContact');

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
  //Rutas para owners
  if (!is_null(Auth::user())) //Si existe algun usuario logeado
  {
    if (Auth::user()->hasRole('owner')) //Si el usuario logeado es un owner
    {
      //Hacer todas estas rutas validas
    	Route::get('owner', 'OwnerController@getIndex');
      Route::get('owner/mechanic', 'OwnerController@getMechanic');
      Route::get('owner/customer', 'OwnerController@getCustomer');
      Route::get('customer/create', 'CustomerController@getCreate');
      Route::get('customer/edit', 'CustomerController@edit');
      Route::post('customer/create', 'CustomerController@postCreate');
      Route::post('customer/edit', 'CustomerController@update');
      Route::get('mechanic/create', 'MechanicController@getCreate');
      Route::get('mechanic/edit', 'MechanicController@edit');
      Route::post('mechanic/create', 'MechanicController@postCreate');
      Route::post('mechanic/edit', 'MechanicController@update');

      Route::get('mechanic/customers', 'MechanicController@getCustomers');
      Route::get('mechanic/customers/{id}', 'MechanicController@getCarCustomer');
      Route::get('mechanic/customers/{customerid}/addcar', 'MechanicController@getCarCreate');
      Route::post('mechanic/customers/{customerid}/addcar', 'MechanicController@postCarCreate');
      Route::get('mechanic/customers/{customerid}/car/{carroid}', 'MechanicController@getJobs');
      Route::get('mechanic/customers/{customerid}/car/{carroid}/addjob', 'MechanicController@getJobCreate');
      Route::post('mechanic/customers/{customerid}/car/{carroid}/addjob', 'MechanicController@postJobCreate');
      Route::get('mechanic/customers/{customerid}/car/{carroid}/listo', 'MechanicController@carroListo');
      Route::get('mechanic/customers/{customerid}/car/{carroid}/recogido', 'MechanicController@carroRecogido');
      Route::get('trabajo/create', 'TrabajoController@getCreate');
      Route::get('trabajo/edit', 'TrabajoController@edit');
      Route::post('trabajo/create', 'TrabajoController@postCreate');
      Route::post('trabajo/edit', 'TrabajoController@update');
      Route::get('carro/create', 'CarroController@getCreate');
      Route::get('carro/edit', 'CarroController@edit');
      Route::post('carro/create', 'CarroController@postCreate');
      Route::post('carro/edit', 'CarroController@update');
      Route::get('customer/create', 'CustomerController@getCreate');
      Route::get('customer/edit', 'CustomerController@edit');
      Route::post('customer/create', 'CustomerController@postCreate');
      Route::post('customer/edit', 'CustomerController@update');

    }
    if (Auth::user()->hasRole('mechanic')) //Si el usuario logeado es un mecanico
    {
      //Hacer todas estas rutas validas
      Route::get('mechanic', 'MechanicController@getIndex');
      //Route::get('mechanic/jobs', 'MechanicController@getJobs');
      //Route::get('mechanic/cars', 'MechanicController@getCars');
      Route::get('mechanic/customers', 'MechanicController@getCustomers');
      Route::get('mechanic/customers/{id}', 'MechanicController@getCarCustomer');
      Route::get('mechanic/customers/{customerid}/addcar', 'MechanicController@getCarCreate');
      Route::post('mechanic/customers/{customerid}/addcar', 'MechanicController@postCarCreate');
      Route::get('mechanic/customers/{customerid}/car/{carroid}', 'MechanicController@getJobs');
      Route::get('mechanic/customers/{customerid}/car/{carroid}/addjob', 'MechanicController@getJobCreate');
      Route::post('mechanic/customers/{customerid}/car/{carroid}/addjob', 'MechanicController@postJobCreate');
      Route::get('mechanic/customers/{customerid}/car/{carroid}/listo', 'MechanicController@carroListo');
      Route::get('mechanic/customers/{customerid}/car/{carroid}/recogido', 'MechanicController@carroRecogido');
      Route::get('trabajo/create', 'TrabajoController@getCreate');
      Route::get('trabajo/edit', 'TrabajoController@edit');
      Route::post('trabajo/create', 'TrabajoController@postCreate');
      Route::post('trabajo/edit', 'TrabajoController@update');
      Route::get('carro/create', 'CarroController@getCreate');
      Route::get('carro/edit', 'CarroController@edit');
      Route::post('carro/create', 'CarroController@postCreate');
      Route::post('carro/edit', 'CarroController@update');
      Route::get('customer/create', 'CustomerController@getCreate');
      Route::get('customer/edit', 'CustomerController@edit');
      Route::post('customer/create', 'CustomerController@postCreate');
      Route::post('customer/edit', 'CustomerController@update');
    }

    if (Auth::user()->hasRole('customer')) //Si el usuario logeado es un cliente
    {
      //Hacer todas estas rutas validas
      Route::get('customer', 'CustomerController@getIndex');
      Route::get('customer/cars', 'CustomerController@getCars');
      Route::get('customer/cars/{id}', 'CarroController@estado');
    }
  }
});

Route::resource('mechanic', 'MechanicController');
Route::resource('customer', 'CustomerController');
Route::resource('trabajo', 'TrabajoController');
Route::resource('carro', 'CarroController');