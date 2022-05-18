<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function commentStory()
	{
		return $this->belongsTo('App\Story', 'story_id', 'id_story')->where('stories.id_story', 1);
    }
    
    public function user()
	{
		return $this->belongsTo('App\User', 'user_id', 'id');
	}
}
