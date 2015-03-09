<?php

/** Фронтенд */
Route::group(['namespace' => 'App\\Blog\\Controllers'], function()
{
	Route::get('test', array("as"=>"test", 'uses'=>'Frontend\BlogController@index'));
});

/** Админка */
Route::group(
	[
		'prefix' => \Backend::getPathPrefix(),
		'namespace' => 'App\\Blog\\Controllers\\Backend',
		'before' => array('backend.auth')
	],
	function()
	{
		Route::get('blog/ajaxUpdate', array('as'=>\Backend::getPathPrefix().'.blog.ajaxUpdate',
											'uses'=>"BlogController@ajaxUpdate"));
		Route::resource('blog', "BlogController");

	});
