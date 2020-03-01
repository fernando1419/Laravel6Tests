<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker)
{
	return [
		'title'        => $faker->sentence(4),
		'description'  => $faker->text,
		'published_at' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
		'author_id'    => $faker->numberBetween(1, 50)
	];
});
