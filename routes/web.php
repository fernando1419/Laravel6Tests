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
Route::delete('/articles/{article}', 'ArticlesController@destroy')->name('articles.destroy');

Route::resource('tags', 'TagController');
Route::resource('articles.tags', 'ArticleTagController');

Route::get('/sancor', function ()
{
	// Sancor Webservice
	$wsdl = 'https://gestionpas.mercantilandina.com.ar/ws_COT05TST/services/cotizarAut/wsdl/cotizarAut.wsdl';

	$cliente = new \SoapClient($wsdl, [
				// 'login'    => 'usuario',
				// 'password' => 'contraseña',
				// 'encoding' => 'UTF-8',
				'trace'    => true
			]);

	dd($cliente->__getFunctions());
});

Route::get('/zurich', function ()
{
	$wsdl = 'http://200.5.95.75/preprod/wsintegracioncanales/ServiciosCanales.asmx?WSDL'; // testing (up)
	// $wsdl = 'https://www.servicioszurich.com.ar/WS/ServiciosCanales.asmx?WSDL'; // production (down)

	$cliente = new \SoapClient($wsdl, ['trace' => true]);

	dd($cliente->__getFunctions());
});
