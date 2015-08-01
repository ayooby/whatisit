<?php

class Tagmap extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		 'title'	 =>  'required|between:3,60',
		 'body' 	 =>  'required|max:500',
		 'tagmap_id' 	 =>  'required'
		
	];

	// Define To what is table name
	protected $table = 'tagmap';

	// Don't forget to fill this array
	// protected $fillable = ['title','body' , 'tagmap_id'];

	public function questions()
	{
		return $this->hasMany('Question');
	}

	public function tags()
	{
		return $this->hasMany('Tag');
	}

}