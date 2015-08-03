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



Route::resource('/', 'AnswerController' , array('as' => 'answer') ); //just for display questions in index

Route::resource('/ask', 'QuestionController' , array('as' => 'question') );

Route::resource('/admin', 'AdminController' );

Route::controller('/search', 'SearchController', 'search');

Route::controller('/user' , 'UsersController' );


