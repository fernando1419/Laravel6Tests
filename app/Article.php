<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $fillable = ['title', 'description', 'published_at', 'author_id'];

	// protected $dates = ['published_at'];

	/**
	 * Getter getPublishedAtAttribute
	 *
	 * @param mixed $date
	 * @return void
	 */
	public function getPublishedAtAttribute($value)
	{
		return Carbon::parse($value)->format('Y-m-d');
	}

	/**
	 * Setter setPublishedAtAttribute
	 *
	 * @param mixed $date
	 * @return void
	 */
	public function setPublishedAtAttribute($date)
	{
		$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
	}

	/**
	 * belongs to many tags
	 *
	 * @return void
	 */
	public function tags()
	{
		return $this->belongsToMany('App\Tag')->withTimestamps();
	}
}
