<?php
class BbsContent extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'bbs_content';
	public $timestamps = false;
	
	public function list_delete($BbsIds) {
		$result = true;
		foreach ( $BbsIds as $bbs_id ) {
			$result = DB::table ( $this->table )
				->where ( "bbs_id", $bbs_id )
				->delete ();
			
			if ( ! $result ) {
				break;
			}
		}
		
		return $result;
	}
}