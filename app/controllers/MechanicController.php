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

	public function create()
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

	public function editar($id)
	{
		$user = User::find($id);

		if (is_null($user))
		{
			return 'No existe';
		}

		return View::make('mechanic/edit')->with('user', $user);
	}
}