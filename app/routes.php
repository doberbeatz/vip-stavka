<?php

// Главная
Route::get('/', ['as'=>'index', 'uses'=>'IndexController@index']);