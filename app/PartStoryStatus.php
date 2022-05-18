<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartStoryStatus extends Model
{
    protected $primaryKey = 'id';
  	protected $fillable = ['id','name'
    ];
}
