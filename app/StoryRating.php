<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoryRating extends Model
{
    public function user()
	{
		return $this->belongsTo('App\User', 'id_user', 'id');
    }
    
    public function book()
	{
		return $this->hasMany('App\Story', 'id_story', 'id_story');
    }

    public function bookBelong()
	{
		return $this->belongsTo('App\Story', 'id_story', 'id_story');
    }
}
