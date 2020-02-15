<?php

use Illuminate\Support\Facades\Route;

Route::get('/test', function ()
{
});

Route::get('/articles', 'ArticlesController@index');
