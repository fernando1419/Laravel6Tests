<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		Permission::truncate();
		Role::truncate();

		// create roles:
		$client = Role::create(['name' => 'client']);
		$reader = Role::create(['name' => 'reader']);

		// create permissions:
		$read = Permission::create(['name' => 'test.article.show']);
		$edit = Permission::create(['name' => 'test.article.edit']);

		// asign permissions to roles:
		$client->givePermissionTo([$read, $edit]);
		$reader->givePermissionTo($read);

		return view('home');
	}
}
