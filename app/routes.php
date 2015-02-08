<?php

// Главная
	Route::get('/', ['as'=>'index', 'uses'=>'IndexController@index']);
// Цены
	Route::get('price', ['as'=>'price', function(){
		return View::make('price');
	}]);
// О нас
	Route::get('about', ['as'=>'about', function(){
		return View::make('about');
	}]);
// Контакты
	Route::get('contacts', ['as'=>'contacts', function(){
		return View::make('contacts');
	}]);