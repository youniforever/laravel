<?php
use Illuminate\Support\Facades\Redirect;
class BbsController extends \BaseController
{
	/**
	 * 기본 레이아웃을 정의합니다.
	 * @example
	 *    layouts 디렉토리 아래에 master.blade.php 파일이 기본 레이아웃인 경우,
	 *    layouts.master와 같이 정의합니다.
	 * @var String
	 */
	protected $layout = "layouts.master";

	/**
	 * URI가 기본 alias만 정의 된 경우 alias와 매핑된 Controller의 index메서드를 호출하게 됩니다.
	 */
	public function index()
	{
		$bbs = new Bbs();
		$bbs_list = $bbs->bbs_list ();
		
		$bbs_info = array ();
		$bbs_info ['links'] = $bbs_list->links();
		
		$this->layout->content = View::make ( 'bbs/list' )->with ( "bbs_list", ( object ) $bbs_info );
	}

	/**
	 * 글목록 데이터를 Ajax요청에 대한 응답을 처리합니다.
	 * @return Objects
	 */
	public function getBbsData()
	{
		$bbs = new Bbs();
		$bbs_list = $bbs->bbs_list ();
		
		$response = array();
		$response['list'] = $bbs_list->toArray();
		
		$bbs_list->setBaseUrl("#");
		$response['links'] = $bbs_list->links()->render();
		
		return Response::json ( $response );
	}
	
	/**
	 * 글쓰기뷰를 호출합니다.
	 */
	public function getWrite()
	{
		$this->layout->content = View::make ( 'bbs/write' );
	}
	
	public function act($bbs_id = null, $type = null)
	{
		$bbs_info = array();
		$bbs_info['bbs_id'] = $bbs_id;
		$bbs = new Bbs();
		$bbs_row = $bbs->bbs_list_row ( $bbs_id );
		$bbs_info['bbs_row'] = $bbs_row[0];
		$this->layout->content = View::make ( 'bbs/mod' )->with ("bbs_info", (object) $bbs_info);
	}
	
	/**
	 * 글쓰기뷰의 요청을 처리합니다.
	 * @return Redirect
	 */
	public function postWriteOk()
	{
		$getTitle = Input::get ( "title" );
		$getContent = Input::get ( "content" );
		$getWriter = Input::get ( "writer" );

		$bbs = new Bbs();
		$ins_bbs_data = array (
				"title" => $getTitle,
				"writer" => $getWriter,
				"update_date" => time () 
		);
		$bbs_id = $bbs->save_ok ( $ins_bbs_data );
		
		$bbs_content = new BbsContent ();
		$bbs_content->bbs_id = $bbs_id;
		$bbs_content->content = $getContent;
		$result = $bbs_content->save ();
		
		if ($result) {
			return Redirect::to ( '/bbs' );
		}
	}

	/**
	 * 리스트뷰의 삭제요청을 처리합니다.
	 * @return boolean
	 */
	public function postDelete()
	{
		$getBbsIds = Input::get ( "bbs_id" );
		
		$result = true;
		if (count ( $getBbsIds ) > 0) {
			DB::beginTransaction ();
			
			$bbs = new Bbs();
			$bbs_content = new BbsContent();
			$rs_bbs = $bbs->list_delete ( $getBbsIds );
			$rs_bbs_content = $bbs_content->list_delete ( $getBbsIds );
			
			if ( $rs_bbs && $rs_bbs_content ) {
				DB::commit();
			}
			else {
				DB::rollback();
			}
		}
		
		return Response::make ( json_encode ( $result ) );
	}
}