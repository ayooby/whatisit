<?php

class UsersController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

/*	public function getIndex()
	{
	
		return View::make('user.index');
	}

	public function getUpdate(){
		return View::make('user.update');
	}

	public function postUpdate(){
		$user_id= Input::get('username');
		$user= User::find(4);
		echo "user is $user";
	}*/


	public function getLogin()
	{
		return View::make('audiopedia.login');
		
	}


	public function getLogout(){
		Auth::logout();
	}


	public function postLogin(){
		$credentials = array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
		 );
		if (Auth::attempt($credentials)){
			return "user is ok";
		}
		else{
		return Redirect::back()->with('message' , 'Email Or Password was incorrect!');
		}
	}
	

	public function postSignup()
	{
		$validate= Validator::make(Input::all(), User::$rules);
		
		if ($validate->passes()){
			$user= new User;
			$user->username= Input::get('username');
			$user->email= Input::get('email');
			$user->password= Hash::make(Input::get('password'));
			$user->save();
			return "tada";
		}else{
			return Redirect::back()->withErrors($validate)->withInput();
		}

	}
	public function getSignup()
	{
		return View::make('audiopedia.signup');
	}

/*	public function  getView(){
return View::make('user.view');	
}

	public function  postView(){
$users = DB::table('users')->where('real_name', '%sajad%')->first();
return View::make ('user.users' , compact('users'));
}

public function getDelete(){
	return View::make('user.delete');
}
public function postDelete(){
	$user_id= Input::get('user_id');
	$user= User::find($user_id);
	if (is_null($user)){
		echo "No user !!";
	}
	else{

	$user->delete();
	}
	
}*/
}
