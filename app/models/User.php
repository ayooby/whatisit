<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

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
	protected $hidden = array('password', 'remember_token');


/*
		Check for validate a input for users input

*/
		public static $rules = [
			'username'		 => 'required|unique:users,username|min:5',
			'email' 		 => 'required|email|unique:users,email',
			'password' 		 => 'required|min:4',
			'password-again' => 'same:password'

		];


		//define relationship with question model
		public function questions()
		{
			return $this->hasMany('Question');
		}

		public function answers()
		{
			return $this->hasMany('Answer');
		}
}
