<?php

class OwnerController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		return View::make('owner.index');
	}

	public function getMechanic()
	{
		$users = User::all();
		return View::make('owner.mechanic')->with('users', $users);
	}

}