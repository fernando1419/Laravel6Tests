<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function ()
{
	return view('layout');
});

Route::get('/articles', 'ArticlesController@index')->name('articles.index');
Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');
