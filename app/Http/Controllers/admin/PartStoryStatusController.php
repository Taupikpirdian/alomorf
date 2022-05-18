<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\PartStoryStatus;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class PartStoryStatusController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $part_story_statuses = PartStoryStatus::orderBy('created_at', 'desc')->get();
        return view('admin.partstorystatus.list',array('part_story_statuses'=>$part_story_statuses, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.partstorystatus.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        
        // store
        $part_story_statuses = new PartStoryStatus;
        $part_story_statuses ->id             = Input::get('id');
        $part_story_statuses ->name        	    = Input::get('name');
        $part_story_statuses ->save();
        // redirect
        return Redirect::action('admin\PartStoryStatusController@index')->with('flash-success','Data berhasil disimpan.');
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
        $part_story_statuses = PartStoryStatus::where('id', $id)->firstOrFail();   
        return view('admin.partstorystatus.show', compact('part_story_statuses'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $user = Auth::user();
        $part_story_statuses = PartStoryStatus::where('id', $id)->firstOrFail();   
        return view('admin.partstorystatus.edit', compact('part_story_statuses'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $story_ratings = PartStoryStatus::findOrFail($id); 
        $story_ratings ->name             = Input::get('name');
        $story_ratings ->save();

        return Redirect::action('admin\PartStoryStatusController@index', compact('part_story_statuses'))->with('flash-update','Data berhasil diubah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $story_ratings = PartStoryStatus::where('id', $id)->firstOrFail();
        $story_ratings->delete();
        return Redirect::action('admin\PartStoryStatusController@index')->with('flash-destroy','Data berhasil dihapus.');
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
        $part_story_statuses = PartStoryStatus::where('name','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.partstorystatus.list', compact('part_story_statuses'),array('user' => $user));
    }
}