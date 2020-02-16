<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function ()
{
	return view('layout');
});

Route::get('/articles', 'ArticlesController@index');
