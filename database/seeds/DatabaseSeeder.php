<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		App\Author::truncate();
		App\Article::truncate();
		App\Tag::truncate();

		// $this->call(UsersTableSeeder::class);
		$this->call(AuthorsTableSeeder::class);
		$this->call(ArticlesTableSeeder::class);
		$this->call(TagsTableSeeder::class);
	}
}
