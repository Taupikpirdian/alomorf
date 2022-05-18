<?php

namespace App\Http\Controllers\editprofil;

use View;
use Auth;
use DB;
use App\EditProfil;
use App\User;
use App\Story;
use App\UserVerification;
use App\UserProfile;
use App\UserGroup;
use App\PartStory;
use App\StoryRating;
use App\ReplyComment;
use App\ProgramNovelComment;
// use Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class EditProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $editprofil = User::orderBy('role_id', 'asc')
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('editprofil.list',array('editprofil'=>$editprofil, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        return View::make('editprofil.create',array('user' => $user));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // store
        $editprofil = new EditProfil;
        $editprofil ->nama          = Input::get('nama');
        $editprofil ->tanggal_lahir = Input::get('date');
        $editprofil ->sekolah       = Input::get('sekolah');
        $editprofil ->kota          = Input::get('kota');
        $editprofil ->email         = Input::get('email');
        $editprofil ->tentang       = Input::get('tentang');
        $editprofil ->save();
        
        // redirect
        return Redirect::action('editprofil\EditProfilController@index')->with('flash-success','The user has been added.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    public function show($id)
    {
        $user = Auth::user();
        $editprofil = EditProfil::where('id', $id)->firstOrFail();   
        return view('editprofil.show', compact('editprofil'),array('user' => $user));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $editprofil = User::where('id', $id)->firstOrFail();   
        return view('editprofil.edit', compact('editprofil'),array('user' => $user));
    }

    public function update(Request $request, $id)
    {

        /*$editprofil = EditProfil::findOrFail($id);*/ 
        $editprofil = User::findOrFail($id);
        // $editprofil ->id        	= Input::get('id');
        $editprofil->name          = Input::get('name');
        $editprofil->email         = Input::get('email');
        if (!empty($request['new_password'])) {
          if ($request['new_password']!=$request['confirm_password']) {
            return Redirect('editprofil/edit/'.$id);
          }
          $editprofil->password    = bcrypt($request['new_password']);
        }
        $editprofil->save();

        return Redirect::action('editprofil\EditProfilController@index', compact('editprofil'))->with('flash-success','The user has been added.');
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    public function destroy($id)
    {
        $editprofil = EditProfil::where('id', $id)->delete();
        
        $stories = Story::where('id_user', $id)->get();
        
        foreach ($stories as $key => $story) {
            $part_stories = PartStory::where('id_story', $story->id)->delete();
            $story_rating = StoryRating::where('id_story', $story->id)->delete();
        }
        
        $stories = Story::where('id_user', $id)->delete();
        
        $story_rating = StoryRating::where('id_user', $id)->delete();
        
        $user_verification = UserVerification::where('user_id', $id)->delete();
        
        $reply_comment = ReplyComment::where('user_id', $id)->delete();
        
        $program_novel_comment = ProgramNovelComment::where('user_id', $id)->delete();
        
        $user_profile = UserProfile::where('id_user', $id)->delete();
        
        $user_group = UserGroup::where('user_id', $id)->delete();
        
        $user = User::where('id', $id)->delete();
        
        return Redirect::action('editprofil\EditProfilController@index')->with('flash-success','The user has been added.');
    }

    public function search(Request $request){
        $user = Auth::user();
        $search = $request->get('search');
        $editprofil = User::where('name','LIKE','%'.$search.'%')->paginate(10);
        return view('editprofil.list', compact('editprofil'),array('user' => $user));
    }
}