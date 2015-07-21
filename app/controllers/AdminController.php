<?php

class AdminController extends \BaseController {


	public function __construct(){
		$this->beforeFilter('admin');
	}
	/**
	 * Display a listing of posts
	 *
	 * @return Response
	 */
	public function show()
	{
		$answers = Answer::all();

		return View::make('admin.index', compact('answers'));
	}

	public function index()
	{
		$answers = Answer::all();

		return View::make('admin.index', compact('answers'));
	}

	/**
	 * Show the form for creating a new post
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.create');
	}

	/**
	 * Store a newly created post in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validate = Validator::make(Input::all(), Answer::$rules);
		
		if ($validate->passes())
		{
			$audio = Input::file('audio');
			$name = time() . "-" . $audio->getClientOriginalName();
			$avatar = $audio->move("./answers/",$name);
			$answer= new answer;
			$answer->title=Input::get('title');
			$answer->info=Input::get('info');
			$answer->audio=$name;
			if (Auth::check()){
				$answer->user_id=Auth::id();
			}else{
				$answer->user_id=0;
			}
			$answer->save();
			return Redirect::route('answer.admin..index');
			$response = array(
				'status' => 'success',
				 'msg' => 'Setting created successfully',
			);
 			return Response::json( $response );

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
		// $answer= Answer::find($id);
		// return View::make('admin.edit', compact('answer'));
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
		Answer::destroy($id);
		return Redirect::back();
	}



	/*	end of controller */

}
