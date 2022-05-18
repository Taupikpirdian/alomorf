<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\CategoryNewsFeed;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class CategoryNewsFeedController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $category_news_feed = CategoryNewsFeed::orderBy('id_category_news_feed', 'asc')->get();
        return view('admin.category_news_feed.list',array('category_news_feed'=>$category_news_feed, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.category_news_feed.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        
        // store
        $category_news_feed = new CategoryNewsFeed;
        $category_news_feed ->name        	= Input::get('name');
        $category_news_feed ->save();
        
        // redirect
        return Redirect::action('admin\CategoryNewsFeedController@index')->with('flash-success','Data berhasil disimpan.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id_category_news_feed)
    {
        $user = Auth::user();
        $category_news_feed = CategoryNewsFeed::where('id_category_news_feed', $id_category_news_feed)->firstOrFail();   
        return view('admin.category_news_feed.show', compact('category_news_feed'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id_category_news_feed)
    {
        $user = Auth::user();
        $category_news_feed = CategoryNewsFeed::where('id_category_news_feed', $id_category_news_feed)->firstOrFail();   
        return view('admin.category_news_feed.edit', compact('category_news_feed'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id_category_news_feed)
    {
        $category_news_feed = CategoryNewsFeed::findOrFail($id_category_news_feed); 
        $category_news_feed ->name        = Input::get('name');
        $category_news_feed ->save();

        return Redirect::action('admin\CategoryNewsFeedController@index', compact('category_news_feed'))->with('flash-update','Data berhasil diubah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id_category_news_feed)
    {
        $category_news_feed = CategoryNewsFeed::where('id_category_news_feed', $id_category_news_feed)->firstOrFail();
        $category_news_feed->delete();
        return Redirect::action('admin\CategoryNewsFeedController@index')->with('flash-destroy','Data berhasil dihapus.');
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
        $category_news_feed = CategoryNewsFeed::where('name','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.category_news_feed.list', compact('category_news_feed'),array('user' => $user));
    }
}