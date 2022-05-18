<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewFeed extends Model
{
    // protected $primaryKey = 'id';
  	protected $fillable = ['id','title','text','id_status_new_feed','published_at','photo'
    ];

    protected $casts = [
        'id_category_news_feed' => 'integer',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function tanggal_indo($tanggal)
    {
        $bulan = array (1 =>   'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                );
        $split = explode('-', $tanggal);
        return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
    }

    public function createdAtFormatIndo()
    {
        $date = date('Y-m-d', strtotime($this->published_at));
        $date_indo = $this->tanggal_indo($date);
        // $title = $this->title;
        // $photo[] = $this->all();
        // $photo = $this->published_at;
        return $date_indo  ;
    }

    public function status()
	{
		return $this->belongsTo('App\PartStoryStatus', 'id_status_new_feed', 'id');
    }
    
    public function category()
	{
		return $this->belongsTo('App\CategoryNewsFeed', 'id_category_news_feed', 'id_category_news_feed');
    }
    
    public function user()
	{
		return $this->belongsTo('App\User', 'id', 'user_id');
	}
}
