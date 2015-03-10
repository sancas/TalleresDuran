<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	/**
	 * Obtener los roles de los usuarios
	 *
	 */
	public function roles()
	{
		return $this->belongsToMany('Role', 'users_roles');
	}

	/**
	 * Encontrar si un usuario es un empleado, basado en si tiene algun rol
	 *
	 * @return boolean
	 */
	public function isEmployee()
	{
		$roles = $this->roles->toArray();
		return !empty($roles);
	}

	/**
	 * Encontrar si un usuario tiene un rol especifico
	 *
	 * @return boolean
	 */
	public function hasRole($check)
	{
		return in_array($check, array_fetch($this->roles->toArray(), 'name'));
	}

	/**
     * Get key in array with corresponding value
     *
     * @return int
     */
	private function getIdInArray($array, $term)
	{
		foreach ($array as $key => $value) {
			if ($value == $term)
			{
				return $key;
			}
		}
	}

	/**
     * Agregar roles a usuarios
     */
    public function makeEmployee($title)
    {
        $assigned_roles = array();
 
        $roles = array_fetch(Role::all()->toArray(), 'name');
 
        switch ($title) {
            case 'owner':
                $assigned_roles[] = $this->getIdInArray($roles, 'owner') + 1;
                break;
            case 'mechanic':
                $assigned_roles[] = $this->getIdInArray($roles, 'mechanic') + 1;
                break;
            case 'customer':
                $assigned_roles[] = $this->getIdInArray($roles, 'customer') + 1;
                break;
            default:
                throw new \Exception("The employee status entered does not exist");
        }
 
        $this->roles()->attach($assigned_roles);
    }
}