<?php

class Rate extends \Eloquent {

	public $timestamps  = false;
	protected $fillable = ['user_id' , 'question_id' , 'user_rate'];


	/*public function $user()
	{
		return $this->belongsTo('User');
	}

	public function $questions()
	{
		return $this->hasMany('Question');
	}
*/
}