<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
	protected $fillable = [
		'name',
		'email',
		'twitter',
	];

	protected $dates = [
		'created_at',
		'updated_at',
	];

	protected $appends = ['resource_url'];

	/* ************************ ACCESSOR ************************* */

	public function getResourceUrlAttribute()
	{
		return url('/admin/authors/' . $this->getKey());
	}

	/**
	 * RelationShip with Article
	 *
	 * @return void
	 */
	public function articles()
	{
		return $this->hasMany(Article::class);
	}
}
