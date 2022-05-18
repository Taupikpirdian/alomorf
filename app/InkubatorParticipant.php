<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InkubatorParticipant extends Model
{
    public function user()
	{
		return $this->belongsTo('App\User', 'user_id', 'id');
	}

	public function mentor()
	{
		return $this->hasMany('App\Mentor', 'id', 'mentor_id');
	}

	public function beMentor()
	{
		return $this->belongsTo('App\Mentor', 'mentor_id', 'id');
	}
}
