<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $fillable = [
		'title',
		'description',
		'published_at',
		'author_id',
	];

	protected $dates = [
		'published_at',
		'created_at',
		'updated_at',
    ];

    protected $with = ['author'];

	protected $appends = ['resource_url'];

	/* ************************ ACCESSOR ************************* */

	public function getResourceUrlAttribute()
	{
		return url('/admin/articles/' . $this->getKey());
	}

	/**
	 * RelationShip with author
	 *
	 * @return void
	 */
	public function author()
	{
		return $this->belongsTo(Author::class);
	}
}
