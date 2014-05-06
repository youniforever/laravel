<?php

class JsonController extends BaseController {
	public function index() {
		$page = $_GET['page'];
		
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
		
		return json_encode($ret);
	}
}