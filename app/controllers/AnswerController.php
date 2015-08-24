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

		// return View::make('audiopedia.index', compact('answers'));
	}

	public function getIndex()
	{
		$answers = Answer::all();

		// return View::make('audiopedia.index', compact('answers'));
	}

	/**
	 * Show the form for creating a new post
	 *
	 * @return Response
	 */
	public function getAnswer($id)
	{
		return View::make('audiopedia.create')->with('id' , $id);
	}

	/**
	 * Store a newly created post in storage.
	 *
	 * @return Response
	 */
	public function postAnswer($question_id)
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
		return View::make('audiopedia.create');
	}

	/**
	 * Update the specified post in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$validate = Validator::make(Input::all(), Answer::$rules);
		
		if ($validate->passes())
		{
				
			$audio = Input::file('audio');
			$name = time() . "-" . $audio->getClientOriginalName();
			$avatar = $audio->move("./answers/",$name);

			$answer= new answer;
			$answer->title 			=	Input::get('title');
			$answer->info 			=	Input::get('info');
			$answer->audio 			=	$name;
			if (Auth::check()){
				$answer->user_id	=	Auth::id();
			}else{
				$answer->user_id	=	0;
			}
			$answer->question_id	= $id;
			$answer->save();
			return Redirect::action('AnswerController@index');
			$response = array(
				'status' => 'success',
				 'msg' => 'Setting created successfully',
			);
			return Response::json( $response );

		}

		return Redirect::back()->withErrors($validate)->withInput();
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
