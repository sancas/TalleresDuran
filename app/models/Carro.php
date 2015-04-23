<?php

class Carro extends Eloquent {

	protected $table = 'cars';

	public function trabajos()
	{
		return $this->hasMany('Trabajo');
	}
}