<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Image;
use File;
use DB;
use App\User;
use App\UserProfile;

class ProfilController extends Controller
{
    public function update(Request $request, $id)
    {
        // Edit nama akun
        $akun = User::where('id', $id)->firstOrFail();
        $akun->name             = Input::get('name');

        // Edit profil akun
        $profil = UserProfile::where('id_user', $id)->firstOrFail();
        $profil->nomor_hp       = Input::get('nomor_hp');
        $profil->deskripsi      = Input::get('deskripsi');
        $profil->alamat         = Input::get('alamat');
        $profil->tempat_lahir   = Input::get('tempat_lahir');
        $profil->tanggal_lahir  = Input::get('tanggal_lahir');
        $profil->sekolah        = Input::get('sekolah');
        $profil->kota           = Input::get('kota');

        // Save
        $profil->save();
        $akun->save();
        return Redirect::back()->withErrors(['Profil Berhasil di Ubah', 'The Message']);
    }  
}
