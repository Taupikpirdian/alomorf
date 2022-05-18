<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function userOther()
	{
		return $this->belongsTo('App\User', 'user_other_id', 'id');
	}
	
	public function user()
	{
		return $this->belongsTo('App\User', 'user_id', 'id');
    }
    
    public function conversation()
	{
		return $this->hasMany('App\Conversation', 'message_id', 'id');
    }
    
    public function beConversation()
	{
		return $this->belongsTo('App\Conversation', 'id', 'message_id')->orderBy('conversations.created_at', 'desc');;
	}
}
