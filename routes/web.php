<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function ()
{
	return view('layout');
});

Route::get('/articles', 'ArticlesController@index')->name('articles.index');
Route::get('/articles/create', 'ArticlesController@create')->name('articles.create');
Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');
Route::post('/articles', 'ArticlesController@store')->name('articles.store');
Route::get('/articles/{article}/edit', 'ArticlesController@edit')->name('articles.edit');
Route::put('/articles/{article}', 'ArticlesController@update')->name('articles.update');
