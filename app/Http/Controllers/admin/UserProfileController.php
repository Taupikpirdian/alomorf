<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\UserProfile;
use App\User;
use View;
use File;
use Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class UserProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $userprofile = UserProfile::orderBy('user_profiles.created_at', 'desc')
        ->leftJoin('users', 'users.id', '=', 'user_profiles.id_user')
        ->select(
                    'user_profiles.id_user_profile',    
                    'user_profiles.nomor_hp',    
                    'user_profiles.deskripsi',    
                    'user_profiles.alamat',    
                    'user_profiles.tempat_lahir',    
                    'user_profiles.tanggal_lahir',    
                    'user_profiles.sekolah',    
                    'user_profiles.kota',    
                    'user_profiles.foto_profile',    
                    'users.name',
                    'users.id'
                    ) 
        ->get();

        return view('admin.user_profile.list',array('userprofile'=>$userprofile, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $users = User::pluck('name','id');
        return View::make('admin.user_profile.create',array('user' => $user, 'users' => $users));
    }

    public function store(Request $request)
    {
        
        // store
        $userprofile = new UserProfile;
        $userprofile ->id_user       = Input::get('id_user');
        $userprofile ->nomor_hp      = Input::get('nomor_hp');
        $userprofile ->deskripsi     = Input::get('deskripsi');
        $userprofile ->alamat        = Input::get('alamat');
        $userprofile ->tanggal_lahir = Input::get('date');
        $userprofile ->tempat_lahir  = Input::get('tempat_lahir');
        $userprofile ->sekolah       = Input::get('sekolah');
        $userprofile ->kota          = Input::get('kota');
        // addfoto
        $img = $request->file('foto_profile');
        if($img){
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/foto_profile/thumbs/');
            if(!File::exists($destinationPath)){
                if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }
            $image = Image::make($img->getRealPath());
            $image->fit(400, 400);
            $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/foto_profile/');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $userprofile->foto_profile = $imageName;
        }
        $userprofile ->save();
      
        return Redirect::action('admin\UserProfileController@index')->with('flash-success','Data berhasil disimpan.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id_user_profile)
    {
        $user = Auth::user();
        $userprofile = UserProfile::where('id_user_profile', $id_user_profile)->firstOrFail();  
        // echo "<pre>";
        // print_r($userprofile->user);
        // echo "</pre>";
        // exit();
        return view('admin.user_profile.show', compact('userprofile'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id_user_profile)
    {
        $user = Auth::user();
        $userprofile    = UserProfile::where('id_user_profile', $id_user_profile)
        ->leftJoin('users', 'users.id', '=', 'user_profiles.id_user')
        ->firstOrFail();
        return view('admin.user_profile.edit', compact('userprofile', 'account_user'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id_user_profile)
    {
        $userprofile = UserProfile::findOrFail($id_user_profile); 
        $userprofile ->nomor_hp      = Input::get('nomor_hp');
        $userprofile ->deskripsi     = Input::get('deskripsi');
        $userprofile ->alamat        = Input::get('alamat');
        $userprofile ->tanggal_lahir = Input::get('date');
        $userprofile ->tempat_lahir  = Input::get('tempat_lahir');
        $userprofile ->sekolah       = Input::get('sekolah');
        $userprofile ->kota          = Input::get('kota');
        // addfoto
        $img = $request->file('foto_profile');
        if($img){
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/foto_profile/thumbs/');
            if(!File::exists($destinationPath)){
                if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }
            $image = Image::make($img->getRealPath());
            $image->fit(400, 400);
            $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/foto_profile/');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $userprofile->foto_profile = $imageName;
        }
        $userprofile ->save();

        return Redirect::action('admin\UserProfileController@index', compact('userprofile'))->with('flash-update','Data berhasil diubah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id_user_profile)
    {
        $userprofile = UserProfile::where('id_user_profile', $id_user_profile)->firstOrFail();
        $userprofile->delete();
        return Redirect::action('admin\UserProfileController@index')->with('flash-destroy','Data berhasil dihapus.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request){
        $user = Auth::user();
        $search = $request->get('search');
        $userprofile =UserProfile::leftJoin('users', 'users.id', '=', 'user_profiles.id_user')
        ->where('users.name','LIKE','%'.$search.'%')
        ->paginate(10);
        return view('admin.user_profile.list', compact('userprofile'),array('user' => $user));
    }
}