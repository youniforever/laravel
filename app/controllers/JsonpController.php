<?php

class JsonpController extends BaseController {
	public function index() {
		$callback = $_GET['callback'];
		$page = $_GET['page'];
		
		if ( $callback != "jsonpKey" ) {
			return "";
		}
		
		$ret = array();
		$ret["title"] = "제목입니다.";
		
		switch ( $page ) {
			case 1:
				$ret["list"] = array();
				array_push($ret["list"], "list4");
				array_push($ret["list"], "list3");
				break;
			case 2:
				$ret["list"] = array();
				array_push($ret["list"], "list2");
				array_push($ret["list"], "list1");
				break;
			default:
				$ret["list"] = array();
		}
		
		$ret_json = json_encode($ret);
		
		$response  = $callback . '(';
		$response .= $ret_json;
		$response .= ')';
		return $response;
	}
}