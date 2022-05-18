<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\StoryRating;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class StoryRatingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $story_ratings = StoryRating::orderBy('created_at', 'desc')->get();
        return view('admin.storyrating.list',compact('story_ratings'), array('user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.storyrating.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        
        // store
        $story_ratings = new StoryRating;
        $story_ratings ->rating        	    = Input::get('rating');
        $story_ratings ->id_story           = Input::get('id_story');
        $story_ratings ->id_user        	= Input::get('id_user');
        $story_ratings ->save();
        // redirect
        return Redirect::action('admin\StoryRatingController@index')->with('flash-success','The user has been added.');
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
        $story_ratings = StoryRating::where('id', $id)->firstOrFail();   
        return view('admin.storyrating.show', compact('story_ratings'),array('user' => $user));
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
        $story_ratings = StoryRating::where('id', $id)->firstOrFail();   
        return view('admin.storyrating.edit', compact('story_ratings'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $story_ratings = StoryRating::findOrFail($id); 
        $story_ratings ->rating             = Input::get('rating');
        $story_ratings ->id_story           = Input::get('id_story');
        $story_ratings ->id_user            = Input::get('id_user');
        $story_ratings ->save();

        return Redirect::action('admin\StoryRatingController@index', compact('story_ratings'))->with('flash-success','The user has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $story_ratings = StoryRating::where('id', $id)->firstOrFail();
        $story_ratings->delete();
        return Redirect::action('admin\StoryRatingController@index');
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
        $story_ratings = StoryRating::leftjoin('stories', 'stories.id_story', '=', 'story_ratings.id_story')
        ->where('stories.title','LIKE','%'.$search.'%')
        ->paginate(10);
        return view('admin.storyrating.list', compact('story_ratings'),array('user' => $user));
    }
}