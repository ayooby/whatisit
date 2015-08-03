<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Route::get('/admin', (['before' => 'basic.auth']) function()
// {
// 	return "View::make('hello')";
// });


Route::resource('/', 'AnswerController' , array('as' => 'answer') );

Route::resource('/admin', 'AdminController' );

Route::controller('/search', 'SearchController', 'search');

Route::controller('/user' , 'UsersController' );

Route::resource('/ask', 'QuestionController' , array('as' => 'question') );

Route::get('/test', function(){
	
	//print all tags for question 1:
	$q = Question::find(1);
	if($q){
		foreach ($q->tags as $tag) {
			echo $tag->title . '<bR>';
		}
	}



	//create new question with random tags:
	$new_question = new Question;
	$new_question->title 	= str_random(rand(5, 15));
	$new_question->body   	= str_random(rand(20, 100));
	$new_question->user_id	= 1;
	$new_question->save();

	//create temporary and sample Tags
	$tags_str = '' . str_random(rand(3, 10)) . ',' . str_random(rand(3, 10)) . ',php';
	$tags_arr = explode(',', $tags_str);
	
	foreach ($tags_arr as $tag_str) {
		$tag_obj = Tag::firstOrCreate(array('title' => $tag_str));

		//this line will attach a tag ( insert and save automatically )
		$new_question->tags()->attach($tag_obj->id);
	}


	//
});