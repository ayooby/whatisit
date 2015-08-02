<?php

class QuestionController extends \BaseController {

	/**
	 * Display a listing of posts
	 *
	 * @return Response
	 */
	public function show()
	{
		$answers = Question::all();

		return View::make('audiopedia.index', compact('question'));
	}

	public function index()
	{
		$answers = Question::all();

		return View::make('audiopedia.index', compact('question'));
	}

	/**
	 * Show the form for creating a new post
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('user.question.askquestion');
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
			//saving Tags in Tag Table 

			$tags_array =  explode(",", Input::get('tag'));
			$tags_id = array(); 
			foreach ($tags_array as $tag) 
			{
				$createTag = Tag::firstOrCreate(array('title' => $tag)); //check for existing if not create a new Row
				$tags_id[] = $createTag->id; //return ids for saving in Tagmap table
			}
			// end of Tag saving

			//save a new Question

			$question = new Question;
			$question->title 	= Input::get('title');
			$question->body   	= Input::get('body');
			$question->user_id	=Auth::id();
			$question_id = $question->id;
			//preparing for Tagmap
			foreach ($tags_id as $id) 
			{
				$tagmap = new Tagmap;
				$tagmap->tag_id 	 = $id;
				$tagmap->question_id = $question_id;;
				$tagmap->save();
				$tagmap_id 			 = $tagmap->id;
			}
			$question->tagmap_id = $tagmap_id;
			$question->save();

			return "savlek";
			// return Redirect::action('AnswerController@index');
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
