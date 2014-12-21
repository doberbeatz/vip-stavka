<?php

Route::group(
	[
		'namespace'=> 'Doberbeatz\Backend'
	],
	function() {
		Route::get(
			'admin',
			[
				'as' => 'backend.main',
				'uses' => 'BackendController@index'
			]);
	});