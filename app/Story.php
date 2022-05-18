<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
  protected $primaryKey = 'id_story';
  protected $fillable = ['id_story','title','description','id_language', 'id_category', 'id_user', 'viewer', 'rating', 'cover_photo'
    ];

    public function category()
	{
		return $this->belongsTo('App\Category', 'id_category', 'id_category');
	}

	public function user()
	{
		return $this->belongsTo('App\User', 'id_user', 'id');
	}

	public function partStory()
	{
		return $this->belongsTo('App\PartStory', 'id_story', 'id_story');
	}

	public function language()
	{
		return $this->belongsTo('App\Language', 'id_language', 'id_language');
	}

	public function comments()
	{
		return $this->hasMany('App\Comment', 'story_id', 'id_story');
	}

	public function commentLimits()
	{
		return $this->belongsTo('App\Comment', 'id_story', 'story_id')->orderBy('comments.created_at', 'desc')->limit(3);
	}

	public function partStories()
	{
		return $this->hasMany('App\PartStory', 'id_story', 'id_story');
	}
}
