<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
 	return View::make('layouts.master');
});


/**
 * Controllers and Resources Route
 */
// Route::get("bbs/{bbs_id}/mod", function($bbs_id) {
// 	return $bbs_id;
// });
Route::get("bbs/{bbs_id}/{type?}", array('as' => 'act', 'uses' => 'BbsController@act'))
->where ( array (
		"bbs_id" => "[0-9]+",
		"type" => "[a-z]+"
) );
Route::controller('bbs', 'BbsController');
Route::resource('bbs', 'BbsController');