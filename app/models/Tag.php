<?php

class Tag extends \Eloquent {

	// Add your validation rules here
/*	public static $rules = [
		 'title'	 =>  'required|between:3,60',
		 'body' 	 =>  'required|max:500',
		 'tagmap_id' 	 =>  'required'
		
	];*/

	// Don't forget to fill this array
	protected $fillable = ['title'];

    public $timestamps = false;

	public function tagmaps(){
		return $this->hasMany('Tagmap');
	}

}