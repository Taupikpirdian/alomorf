<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Language;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class LanguageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $language = Language::orderBy('created_at', 'desc')->get();
        return view('admin.language.list',array('language'=>$language, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.language.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        
        // store
        $language = new Language;
        $language ->name        	= Input::get('name');
        $language ->short_name        	= Input::get('short_name');
        $language ->save();
        // redirect
        return Redirect::action('admin\LanguageController@index')->with('flash-success','Data berhasil disimpan.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id_language)
    {
        $user = Auth::user();
        $language = Language::where('id_language', $id_language)->firstOrFail();   
        return view('admin.language.show', compact('language'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id_language)
    {
        $user = Auth::user();
        $language = Language::where('id_language', $id_language)->firstOrFail();   
        return view('admin.language.edit', compact('language'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id_language)
    {
        $language = Language::findOrFail($id_language); 
        $language ->name        = Input::get('name');
        $language ->short_name  = Input::get('short_name');
        $language ->save();

        return Redirect::action('admin\LanguageController@index', compact('language'))->with('flash-update','Data berhasil diubah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id_language)
    {
        $language = Language::where('id_language', $id_language)->firstOrFail();
        $language->delete();
        return Redirect::action('admin\LanguageController@index')->with('flash-destroy','Data berhasil dihapus.');
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
        $language = Language::where('name','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.language.list', compact('language'),array('user' => $user));
    }
}