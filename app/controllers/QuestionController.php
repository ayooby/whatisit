<?php

class QuestionController extends \BaseController {

	/**
	 * Display a listing of posts
	 *
	 * @return Response
	 */
	public function show()
	{
		$questions = Question::all();

		return View::make('ask.index')->with(['questions' => $questions]);
	}

	public function index()
	{
		$questions = Question::all();

		return View::make('ask.index')->with(['questions' => $questions]);;
	}

	/**
	 * Show the form for creating a new post
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('ask.askquestion');
	}

	/**
	 * Store a newly created post in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validate = Validator::make(Input::all(), Question::$rules);
		
		if ($validate->passes())
		{	
			//save a new Question

			$question = new Question;
			$question->title 	= Input::get('title');
			$question->body   	= Input::get('body');
			$question->user_id	= Auth::id();
			$question->save();
			$question_id 		= $question->id;
			//saving Tags in Tag Table 

				/*	convert input to array 	*/
				$tags_arr = explode(',', Input::get('tag'));
				
				/*	
				save in Tag table and return object for saving in 
				Tagmap table
				*/
				foreach ($tags_arr as $tag_str) {
				$tag_obj = Tag::firstOrCreate(array('title' => $tag_str));

				//this line will attach a tag ( insert and save automatically )
				$new_question->tags()->attach($tag_obj->id);
			}

			

			return Redirect::action('QuestionController@index');
		}

		return Redirect::back()->withErrors($validate)->withInput();
	}

	/**
	 * Show the form for editing the specified post.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
	
	}

	/**
	 * Update the specified post in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		
	}

	/**
	 * Remove the specified post from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
	
	}



	/*	end of controller */

}
