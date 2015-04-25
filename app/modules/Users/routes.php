<?php

/** Фронтенд */
Route::group(['namespace' => 'App\\Users\\Controllers'], function()
{
	Route::get('profile', array("as"=>"test", 'uses'=>'Frontend\UsersController@show'));
});

/** Админка */
Route::group(
	[
		'prefix' => \Backend::getPathPrefix(),
		'namespace' => 'App\\Users\\Controllers\\Backend',
		'before' => array('backend.auth')
	],
	function()
	{
		Route::get('users/ajaxUpdate', array('as'=>\Backend::getPathPrefix().'.users.ajaxUpdate',
											'uses'=>"UsersController@ajaxUpdate"));
		Route::resource('users', "UsersController");

	});