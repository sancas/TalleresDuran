<?php

class CarroController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function estado($carro_id)
	{
		return View::make('carro/estado', array('carro_id' => $carro_id));
	}
	
	public function getIndex()
	{
		return View::make('carro.index');
	}

	public function getCreate()
	{
		return View::make('carro.form');
	}

	public function show($id)
	{
		$carro = Carro::find($id);

		if (is_null($carro)) 
		{
			return 'No existe';
		}

		return View::make('carro/show', array('carro' => $carro));
	}

	public function edit($id)
	{
		$carro = Carro::find($id);

		if (is_null($carro))
		{
			return 'No existe';
		}

		return View::make('carro/edit', array('carro' => $carro));
	}

	public function update($id)
	{
		$input = Input::all();

		$carro = Trabajo::findOrFail($id);
		if (is_null($carro))
		{
			return 'No existe!';
		}
		if (!empty($input['marca']))
		{
			$carro->marca = $input['marca'];	
		}
		if (!empty($input['placa']))
		{
			$carro->placa = $input['placa'];	
		}
		if (!empty($input['tarjetaCirculacion']))
		{
			$carro->tarjetaCirculacion = $input['tarjetaCirculacion'];
		}
		$carro->save();

		return Redirect::route('carro.show', array($carro->id));
	}

	public function postCreate()
	{
		$input = Input::all();
		$carro = new Carro();
		$carro->user_id = $input['user_id'];
			$carro->marca = $input['marca'];
		$carro->placa = $input['placa'];
		$carro->tarjetaCirculacion = $input['tarjetaCirculacion'];
		$carro->save();

		return Redirect::route('carro.show', array($carro->id));
	}

	public function destroy($id)
	{
		Carro::destroy($id);

		return Redirect::to('mechanic/cars');
	}
}