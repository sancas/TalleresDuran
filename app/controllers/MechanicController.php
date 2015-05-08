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
		$carro = Carro::Find($carroid);
		$customer = User::Find($customerid);
		$trabajos = $carro->trabajos;
		return View::make('mechanic.job', array('carro' => $carro, 'customer' => $customer, 'trabajos' => $trabajos));
	}

	public function carroListo($customerid, $carroid)
	{
		$customer = User::Find($customerid);
		$carro = Carro::Find($carroid);
		$trabajos = $carro->trabajos;
		if (is_null($carro))
		{
			return 'No existe!';
		}
		foreach($trabajos as $trabajo)
		{
			$trabajo->estado = 100;
			$trabajo->save();
		}
		$carro->listo = true;
		$carro->save();
		$carro = $customer->carros;
		return View::make('mechanic.customercars', array('carros' => $carro, 'customer' => $customer));
	}

	public function carroRecogido($customerid, $carroid)
	{
		$customer = User::Find($customerid);
		$carro = Carro::Find($carroid);
		if (is_null($carro))
		{
			return 'No existe!';
		}
		$carro->recogido = true;
		$carro->save();
		$carro = $customer->carros;
		return View::make('mechanic.customercars', array('carros' => $carro, 'customer' => $customer));
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

	public function getCarCreate($customerid)
	{
		return View::make('mechanic.carCreate', array('customerid' => $customerid));
	}

	public function getJobCreate($customerid, $carid)
	{
		return View::make('mechanic.jobCreate', array('customerid' => $customerid, 'carid' => $carid));
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

	public function postCarCreate($customerid)
	{
		$input = Input::all();
		$user = User::Find($customerid);
		$carro = new Carro();
		$carro->marca = $input['marca'];
		$carro->placa = $input['placa'];
		$carro->tarjetaCirculacion = $input['tarjetaCirculacion'];
		
		$user->carros()->save($carro);

		return Redirect::route('carro.show', array($carro->id));
	}

	public function postJobCreate($customerid, $carid)
	{
		$input = Input::all();
		$carro = Carro::Find($carid);
		$trabajo = new Trabajo();
		$trabajo->tipo = $input['tipo'];
		$trabajo->descripcion = $input['descripcion'];
		$trabajo->estado = $input['estado'];
		$trabajo->costo = $input['costo'];
		$carro->trabajos()->save($trabajo);

		return Redirect::route('trabajo.show', array($trabajo->id));
	}

	public function destroy($id)
	{
		User::destroy($id);

		return Redirect::to('owner/mechanic');
	}
}