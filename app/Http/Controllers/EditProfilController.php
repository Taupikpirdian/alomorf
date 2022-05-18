<?php

namespace App\Http\Controllers\editprofil;

use View;
use DB;
use Auth;
use App\EditProfil;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $editprofils = EditProfil::orderBy('created_at', 'desc')->get();
        return view('editprofil.list',array('editprofils'=>$editprofils, 'user' => $user));
    }   

    // // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function create()
    {
        return view('editprofil.list.create');
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
        $editprofil ->id            = Input::get('id');
        $editprofil ->nama          = Input::get('nama');
        $editprofil ->tanggal_lahir = Input::get('tanggal_lahir');
        $editprofil ->sekolah       = Input::get('sekolah');
        $editprofil ->kota          = Input::get('kota');
        $editprofil ->email         = Input::get('email');
        $editprofil ->tentang       = Input::get('tentang');
        $editprofil ->save();
        
        // redirect
        return Redirect::action('editprofil\EditProfilController@index')->with('flash-success','The user has been added.');
    }
  //   /**
  //    * Display the specified resource.
  //    *
  //    * @param  int  $id
  //    * @return \Illuminate\Http\Response
  //    */
    public function show($id)
    {
        $user = Auth::user();
        $editprofil = EditProfil::where('id', $id->firstOrFail();   
        return view('editprofil.list.show', compact('editprofils'),array('user' => $user));
    }
    
  //   /**
  //    * Show the form for editing the specified resource.
  //    *
     // * @param  int  $id
     // * @return \Illuminate\Http\Response
  //    */
    public function edit($id)
    {
        $user = Auth::user();
        $editprofil= EditProfil::where('id', $id)->firstOrFail();
         
        return view('editprofil.list.edit', compact('editprofils','editprofils'),array('user' => $user));
}
    public function update(Request $request, $id)
    {
            //update
        $editprofil = EditProfil::findOrFail($id); 
        $editprofil ->id            = Input::get('id');
        $editprofil ->nama          = Input::get('nama');
        $editprofil ->tanggal_lahir = Input::get('tanggal_lahir');
        $editprofil ->sekolah       = Input::get('sekolah');
        $editprofil ->kota          = Input::get('kota');
        $editprofil ->email         = Input::get('email');
        $editprofil ->tentang       = Input::get('tentang');
        $editprofil ->save();

        return Redirect::action('editprofil\EditProfilController@index', compact('editprofils'))->with('flash-success','The user has been added.');
    }
public function destroy($id)
    {
        $editprofil = EditProfil::where('id', $id);
        $editprofil->delete();
        return Redirect::action('editprofil\EditProfilController@index')->with('flash-success','The user has been added.');
    }
  //   /**
  //    * Remove the specified resource from storage.
  //    *
     // * @param  int  $id
     // * @return \Illuminate\Http\Response
  //    */
  //   public function destroy($id)
  //   {
  //       $test = TanggalTestMasuk::where('id', $id)->firstOrFail();
  //       $test->delete();
  //       return Redirect::action('admin\TanggalTestMasukController@index');
  //   }

    public function search(Request $request)
    {
        $user = Auth::user();
        $searcheditprofil = $request->get('search');
        $editprofil = EditProfil::where('id','LIKE','%'.$search.'%')->paginate(10);
            return view('editprofil.list', compact('test'),array('editprofil' => $editprofils));
    }
}