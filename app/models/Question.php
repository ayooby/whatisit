<?php

class Question extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		 'title'	 =>  'required|between:3,60',
		 'body' 	 =>  'required|max:500',
		 'tagmap_id' 	 =>  'required'
		
	];

	// Don't forget to fill this array
	// protected $fillable = ['title','body' , 'tagmap_id'];

	public function Answer(){
		return $this->hasMany('Answer');
	}

	public function User()
	{
		return $this->belongsTo('User');
	}

}