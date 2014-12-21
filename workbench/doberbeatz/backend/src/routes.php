<?php

Route::group(
	[
		'prefix' => \Backend::getPrefix(),
		'namespace'=> 'Doberbeatz\Backend'
	],
	function() {
		Route::get(
			'/',
			[
				'as' => \Backend::getPrefix().'.main',
				'uses' => 'BackendController@index'
			]);
	});