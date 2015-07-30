<?php

class AnswerController extends \BaseController {

	/**
	 * Display a listing of posts
	 *
	 * @return Response
	 */
	public function show()
	{
		$answers = Answer::all();

		return View::make('audiopedia.index', compact('answers'));
	}

	public function index()
	{
		$answers = Answer::all();

		return View::make('audiopedia.index', compact('answers'));
	}

	/**
	 * Show the form for creating a new post
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('audiopedia.create');
	}

	/**
	 * Store a newly created post in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validate = Validator::make(Input::all(), Answer::$rules);

		if ($validate->passes()){

			//get file from input
			$audio = Input::file('audio');

			//get file's temporary path in server
			$file_temporary_path = $audio->getPathname();

			//create MP3 Object
			$audio_file = new MP3( $file_temporary_path );

			$duration = $audio_file->getDuration();

			#Do same thing in 1 line:
			#$duration = with(new MP3($audio->getPathname()))->getDuration();

			//check if audio is less than/equal to 120 Seconds, then save it!
			if ($duration <= 120){ //seconds

				$name = time() . '-' . $audio->getClientOriginalName();
				
				//Move file from temporary folder to PUBLIC folder.
				//PUBLIC folder because we want user have access to this file later.
				$avatar = $audio->move( public_path() . '/answers/', $name);

				$answer= new Answer;
				$answer->title=Input::get('title');
				$answer->info=Input::get('info');
				$answer->audio = $name;
		
				if (Auth::check()){
					$answer->user_id=Auth::id();
				}else{
					$answer->user_id=0;
				}
		
				$answer->save();
			}

			return Redirect::action('AnswerController@index');
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
