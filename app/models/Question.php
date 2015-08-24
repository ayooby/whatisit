<?php

class Question extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
			'title' =>  'required|between:3,60',
			'body'  =>  'required|max:500',
			'tag'   =>  'required'
		
	];

	// Don't forget to fill this array
	protected $fillable = ['title','body'];

	public function answers()
	{
		return $this->hasMany('Answer');
	}

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function tagmap()
	{
		return $this->hasMany('Tagmap');
	}

	#http://laravel.com/docs/4.2/eloquent#working-with-pivot-tables
	public function tags()
	{
		return $this->belongsToMany('Tag', 'Tagmap', 'question_id', 'tag_id');
	}
}