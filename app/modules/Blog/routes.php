<?php

/** Фронтенд */
Route::group(['namespace' => 'App\\Blog\\Controllers'], function()
{
	Route::get('test', array("as"=>"test", 'uses'=>'Frontend\BlogController@index'));
});

/** Админка */
Route::group(
	[
		'prefix' => \Backend::getPathPrefix().'/',
		'namespace' => 'App\\Blog\\Controllers\\Backend'
	],
	function()
	{
		Route::get(
			'blog',
			array(
				'as' => \Backend::getPathPrefix() . '.blog.index',
				'uses' => 'BlogController@index'
			));
	});
