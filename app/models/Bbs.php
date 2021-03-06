<?php
class Bbs extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'bbs';
	public $timestamps = false;
	
	private $pagination = 6;	// 페이지당 게시글 수
	
	private $title = "";
	private $writer = "";
	private $update_date = "";
	
	public function bbs_list()
	{
		$bbs_list = DB::table ( $this->table )
			->join ( 'bbs_content', 'bbs.id', '=', 'bbs_content.bbs_id' )
			->orderBy ( "update_date", "desc" )
			->paginate($this->pagination);
		
		foreach ( $bbs_list as $idx => $bbs ) {
			$bbs_list[$idx]->update_date = date("Y-m-d H:i:s", $bbs->update_date);
		}
		return $bbs_list;
	}
	
	public function bbs_list_row($bbs_id)
	{
		$bbs_list = DB::table ( $this->table )
		->where ( 'bbs.id', $bbs_id )
		->join ( 'bbs_content', 'bbs.id', '=', 'bbs_content.bbs_id' )
		->orderBy ( "id", "desc" )
		->get ();
		return $bbs_list;
	}
	
	public function save_ok($ins_bbs_data) {
		return DB::table ( $this->table )->insertGetId ( $ins_bbs_data );
	}
	
	public function modify_ok($ins_bbs_data) {
		return Bbs::where ( 'id', $ins_bbs_data['id'] )
				->update($ins_bbs_data);
	}
	
	public function list_delete($BbsIds)
	{
		$result = true;

		foreach ( $BbsIds as $bbs_id ) {
			$result = DB::table ( $this->table )
				->where ( "id", $bbs_id )
				->delete ();
			
			if ( ! $result ) {
				break;
			}
		}
		
		return $result;
	}
}