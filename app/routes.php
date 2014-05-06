<?php
/**
 * Controllers and Resources Route
 * 
 * Route::resource
 * 		컨트롤러에 index메서드 호출
 * 
 * Route::controller
 * 		컨트롤러에 요청메서드 호출
 * 
 * Route::get
 * 		URI 라우트
 * 
 */

/***** /home *****/
Route::get('/', function()
{
	return Redirect::to('home');
});
Route::resource('home', 'HomeController');

/***** /bbs *****/
Route::get("bbs/{bbs_id}/{type?}", array('as' => 'act', 'uses' => 'BbsController@act'))
->where ( array (
		"bbs_id" => "[0-9]+",
		"type" => "[a-z]+"
) );
Route::controller('bbs', 'BbsController');
Route::resource('bbs', 'BbsController');

/***** /contact *****/
Route::resource('contact', 'ContactController');

Route::resource('jsonp', 'JsonpController');

Route::resource('json', 'JsonController');