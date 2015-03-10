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

	public function getCustomer()
	{
		$users = User::all();
		return View::make('owner.customer')->with('users', $users);
	}
}