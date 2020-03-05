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

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function ()
{
	Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function ()
	{
		Route::prefix('admin-users')->name('admin-users/')->group(static function ()
		{
			Route::get('/', 'AdminUsersController@index')->name('index');
			Route::get('/create', 'AdminUsersController@create')->name('create');
			Route::post('/', 'AdminUsersController@store')->name('store');
			Route::get('/{adminUser}/impersonal-login', 'AdminUsersController@impersonalLogin')->name('impersonal-login');
			Route::get('/{adminUser}/edit', 'AdminUsersController@edit')->name('edit');
			Route::post('/{adminUser}', 'AdminUsersController@update')->name('update');
			Route::delete('/{adminUser}', 'AdminUsersController@destroy')->name('destroy');
			Route::get('/{adminUser}/resend-activation', 'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
		});
	});
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function ()
{
	Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function ()
	{
		Route::get('/profile', 'ProfileController@editProfile')->name('edit-profile');
		Route::post('/profile', 'ProfileController@updateProfile')->name('update-profile');
		Route::get('/password', 'ProfileController@editPassword')->name('edit-password');
		Route::post('/password', 'ProfileController@updatePassword')->name('update-password');
	});
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function ()
{
	Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function ()
	{
		Route::prefix('articles')->name('articles/')->group(static function ()
		{
			Route::get('/', 'ArticlesController@index')->name('index');
			Route::get('/create', 'ArticlesController@create')->name('create');
			Route::post('/', 'ArticlesController@store')->name('store');
			Route::get('/{article}/edit', 'ArticlesController@edit')->name('edit');
			Route::post('/bulk-destroy', 'ArticlesController@bulkDestroy')->name('bulk-destroy');
			Route::post('/{article}', 'ArticlesController@update')->name('update');
			Route::delete('/{article}', 'ArticlesController@destroy')->name('destroy');
		});
	});
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function ()
{
	Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function ()
	{
		Route::prefix('tags')->name('tags/')->group(static function ()
		{
			Route::get('/', 'TagsController@index')->name('index');
			Route::get('/create', 'TagsController@create')->name('create');
			Route::post('/', 'TagsController@store')->name('store');
			Route::get('/{tag}/edit', 'TagsController@edit')->name('edit');
			Route::post('/bulk-destroy', 'TagsController@bulkDestroy')->name('bulk-destroy');
			Route::post('/{tag}', 'TagsController@update')->name('update');
			Route::delete('/{tag}', 'TagsController@destroy')->name('destroy');
		});
	});
});
