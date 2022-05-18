<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
	protected $primaryKey = 'id_user_profile';
    protected $fillable = ['id_user_profile','id_user', 'nomor_hp', 'deskripsi', 'alamat', 'tanggal_lahir', 'sekolah', 'kota', 'foto_profile'
    ];

    public function user()
	{
		return $this->belongsTo('App\User', 'id_user', 'id');
	}
}
