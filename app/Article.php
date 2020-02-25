<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $fillable = ['title', 'description', 'published_at'];

	public function tags()
	{
		return $this->belongsToMany('App\Tag')->withTimestamps();
	}
}
