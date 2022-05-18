<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryNewsFeed extends Model
{
    protected $primaryKey = 'id_category_news_feed';
  	protected $fillable = ['id_category_news_feed','name'
    ];
}
