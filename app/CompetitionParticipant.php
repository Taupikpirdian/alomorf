<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompetitionParticipant extends Model
{
    public function user()
	{
		return $this->belongsTo('App\User', 'user_id', 'id');
    }
    
    public function book()
	{
		return $this->belongsTo('App\Story', 'book_id', 'id_story');
	}
}
