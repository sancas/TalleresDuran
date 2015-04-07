<?php

class TrabajoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		return View::make('trabajo.index');
	}

	public function getCreate()
	{
		return View::make('trabajo.form');
	}

	public function show($id)
	{
		$trabajo = Trabajo::find($id);

		if (is_null($trabajo)) 
		{
			return 'No existe';
		}

		return View::make('trabajo/show', array('trabajo' => $trabajo));
	}

	public function edit($id)
	{
		$trabajo = Trabajo::find($id);

		if (is_null($trabajo)) 
		{
			return 'No existe';
		}

		return View::make('trabajo/edit', array('trabajo' => $trabajo));
	}

	public function update($id)
	{
		$input = Input::all();

		$trabajo = Trabajo::findOrFail($id);
		if (is_null($trabajo))
		{
			return 'No existe!';
		}
		if (!empty($input['tipo']))
		{
			$trabajo->tipo = $input['tipo'];	
		}
		if (!empty($input['descripcion']))
		{
			$trabajo->descripcion = $input['descripcion'];	
		}
		if (!empty($input['estado']))
		{
			$trabajo->estado = $input['estado'];
		}
		if (!empty($input['costo']))
		{
			$trabajo->costo = $input['costo'];
		}
		$trabajo->save();

		return Redirect::route('trabajo.show', array($trabajo->id));
	}

	public function postCreate()
	{
		$input = Input::all();

		$trabajo = new Trabajo();
		$trabajo->car_id = $input['car_id'];
		$trabajo->tipo = $input['tipo'];
		$trabajo->descripcion = $input['descripcion'];
		$trabajo->estado = $input['estado'];
		$trabajo->costo = $input['costo'];
		$trabajo->save();

		return Redirect::route('trabajo.show', array($trabajo->id));
	}

	public function destroy($id)
	{
		Trabajo::destroy($id);

		return Redirect::to('mechanic/jobs');
	}
}