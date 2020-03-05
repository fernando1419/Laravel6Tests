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

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});