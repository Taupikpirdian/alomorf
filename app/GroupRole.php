<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupRole extends Model
{
    protected $fillable = [
        'role_id', 'group_id',
    ];

	public function role()
  	{
    	return $this->belongsTo('App\Role');
  	}

  	public function group()
  	{
    	return $this->belongsTo('App\Group');
  	}
}
