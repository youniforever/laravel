<?php
class BbsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$bbs_list = Bbs::all();
		return View::make('bbs/list')->with("bbs_list", $bbs_list);
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('bbs/write');
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$getTitle = Input::get("title");
		$getContent = Input::get("content");
		$getWriter = Input::get("writer");

		$sql = "INSERT INTO bbs (title, content, writer, update_date) VALUES (?, ?, ?, ?)";
		$result = DB::insert($sql, array($getTitle, $getContent, $getWriter, time()));
		
		if ( $result ) {
			return Redirect::to('/bbs');
		}
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
		echo "asdf";
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
		$getWriter = Input::get("writer");
		
		$sql = "INSERT INTO bbs (title, content, writer, update_date) VALUES (?, ?, ?, ?)";
		$result = DB::insert($sql, array($getTitle, $getContent, $getWriter, time()));
		
		if ( $result ) {
			return Redirect::to('/bbs');
		}
	}
}