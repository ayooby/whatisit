<?php

class Categorie extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		 'title' => 'required|between:3,255',
		 'body' => 'required',
		 'user_id' => 'required',  
	];

	// Don't forget to fill this array
	protected $fillable = ['title'];
	
	public function Answer (){
		return $this->hasMany('Answer');
	}

}