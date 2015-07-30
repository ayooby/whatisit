<?php

class Answer extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		 'title' => 'required|between:3,60|unique:answers,title',
		 'audio' => 'required|mimes:mpga,aac,ogg,mp3',
		 'info' => 'required|max:100'
		
	];

	// Don't forget to fill this array
	protected $fillable = ['title','audio'];

	public function Categorie(){
		return $this->belongsTo('Categorie');
	}

}