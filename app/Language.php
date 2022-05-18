<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $primaryKey = 'id_language';
  	protected $fillable = ['id_language','name', 'short_name'
    ];
}
