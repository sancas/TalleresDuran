<?php

class MechanicController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		return View::make('mechanic.index');
	}

	public function getJobs($customerid, $carroid)
	{
		$customer = User::Find($customerid);
		$carro = Carro::Find($carroid);
		var_dump($customer);
		var_dump($carro);
		$trabajos = $customer->$carro->trabajos;
		var_dump($trabajos);
		//return View::make('mechanic.job')->with('trabajos', $trabajos);
	}

	public function getCars()
	{
		$carros = Carro::all();
		return View::make('mechanic.car')->with('carros', $carros);
	}

	public function getCustomers()
	{
		$users = User::all();
		return View::make('mechanic.customer')->with('users', $users);
	}

	public function getCarCustomer($id)
	{
		$customer = User::Find($id);
		$carro = $customer->carros;
		return View::make('mechanic.customercars', array('carros' => $carro, 'customer' => $customer));
	}

	public function getCreate()
	{
		return View::make('mechanic.form');
	}

	public function show($id)
	{
		$user = User::find($id);

		if (is_null($user)) 
		{
			return 'No existe';
		}

		return View::make('mechanic/show', array('user' => $user));
	}

	public function edit($id)
	{
		$user = User::find($id);

		if (is_null($user))
		{
			return 'No existe';
		}

		return View::make('mechanic/edit', array('user' => $user));
	}

	public function update($id)
	{
		$input = Input::all();

		$user = User::findOrFail($id);
		if (is_null($user))
		{
			return 'No existe!';
		}

		$password = $input['password'];
		$password = Hash::make($password);
		if (!empty($input['username']))
		{
			$user->username = $input['username'];	
		}
		if (!empty($input['email']))
		{
			$user->email = $input['email'];	
		}
		if (!empty($input['name']))
		{
			$user->name = $input['name'];
		}
		if (!empty($input['lastname']))
		{
			$user->lastname = $input['lastname'];
		}
		if (!empty($input['password']))
		{
			$user->password = $password;
		}
		$user->save();

		return Redirect::route('mechanic.show', array($user->id));
	}

	public function postCreate()
	{

		$input = Input::all();

		$rules = array('username' => 'required|unique:users', 'email' => 'required|unique:users|email', 'name' => 'required', 'lastname' => 'required', 'password' => 'required|min:8');

		$v = Validator::make($input, $rules);

		if($v->passes())
		{
			$password = $input['password'];
			$password = Hash::make($password);

			$user = new User();
			$user->username = $input['username'];
			$user->email = $input['email'];
			$user->name = $input['name'];
			$user->lastname = $input['lastname'];
			$user->password = $password;
			$user->save();

			$user->makeEmployee('mechanic');

			return Redirect::route('mechanic.show', array($user->id));

		} else {

			return Redirect::to('mechanic/create')->withInput()->withErrors($v);

		}
	}

	public function destroy($id)
	{
		User::destroy($id);

		return Redirect::to('owner/mechanic');
	}
}