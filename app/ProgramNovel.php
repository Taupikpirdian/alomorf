<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramNovel extends Model
{
    public function participantProgramNovel()
	{
		return $this->belongsTo('App\WritingProgramParticipant', 'participant_id', 'id');
    }
    
    public function book()
	{
		return $this->belongsTo('App\Story', 'book_id', 'id_story');
	}
	
	public function category()
	{
		return $this->belongsTo('App\Category', 'category_id', 'id_category');
    }
    
    public function partStories()
	{
		return $this->hasMany('App\PartStory', 'id_story', 'book_id');
	}
}
