<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartStory extends Model
{
    protected $primaryKey = 'id_part_story';
  	protected $fillable = ['id_part_story','id_story','id_part_story_status','title', 'story'
    ];

    public function partStory()
    { 
      return $this->belongsTo('App\Story', 'id_story', 'id_story');
    }
}
