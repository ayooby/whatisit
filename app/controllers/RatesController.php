<?php

class RatesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function getRate($question_id , $user_rate)
	{
		/*check for user_id if has rated we don't accept else continue
			other soloution is: on route we use auth filter but this is 
			just for beta using.
		*/
		if(Auth::check() == 1){
			$count = DB::table('rates')->where('question_id', $question_id)->where('user_id' , Auth::id())->count();
			if ($count == 0) {
				$newRate = new Rate;
				$newRate->question_id = $question_id;
				$newRate->user_id = Auth::id();
				$newRate->user_rate = $user_rate;
				$newRate->save();
				return Redirect::back();
			}
			else
				return "already Voted!";
		}
		else
			return "Only member can vote to audiopedias";
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
