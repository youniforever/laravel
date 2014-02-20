<?php
class BbsController extends \BaseController {

	protected $layout = "layouts.master";
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$bbs_list = Bbs::all();
		
		$bbs_info = array();
		$bbs_info['list'] = $bbs_list;
		$this->layout->content = View::make('bbs/list')->with("bbs_list", (object) $bbs_info);
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('bbs/write');
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

		if ( ! empty($getTitle) && ! empty($getContent) && ! empty($getWriter) ) {
			$sql = "INSERT INTO bbs (title, content, writer, update_date) VALUES (?, ?, ?, ?)";
			$result = DB::insert($sql, array($getTitle, $getContent, Crypt::encrypt($getWriter), time()));
			
			if ( $result ) {
				return Redirect::to('/bbs');
			}
		}
		else {
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

// class Libraries extends Controller {
// 	static function getData() {
// 		return 123;
// 	}
// }