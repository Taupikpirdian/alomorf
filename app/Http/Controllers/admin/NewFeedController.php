<?php

namespace App\Http\Controllers\admin;

use Auth;
use View;
use File;
use Image;
use DateTime;
use App\NewFeed;
use App\CategoryNewsFeed;
use App\PartStoryStatus;
use App\Story;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class NewFeedController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $newfeed = NewFeed::orderBy('new_feeds.created_at', 'desc')->get();
        return view('admin.newfeed.list', array('newfeed'=>$newfeed, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $status_news_feed = PartStoryStatus::pluck('name','id');
        $news_feed_categories = CategoryNewsFeed::pluck('name','id_category_news_feed');
        return View::make('admin.newfeed.create', compact('news_feed_categories','status_news_feed'), array('user' => $user));
    }

    public function store(Request $request)
    {

        $user    = Auth::user();
        $newfeed = new NewFeed;
        $newfeed ->title                    = Input::get('title');
        $newfeed ->description              = Input::get('description');
        $newfeed ->text                     = Input::get('text');
        $newfeed ->id_status_new_feed       = Input::get('id_status_new_feed');
        $newfeed ->id_category_news_feed    = Input::get('id_category_news_feed');
        $newfeed ->published_at             = Input::get('date');
        // addfoto
        $img = $request->file('photo');
        $imageName = time().'.'.$img->getClientOriginalExtension();
        //thumbs
        $destinationPath = public_path('images/news-feed/thumbs');
        if(!File::exists($destinationPath)){
            if(File::makeDirectory($destinationPath,0777,true)){
                throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
            }
        }
        $image = Image::make($img->getRealPath());
        $image->fit(200, 200);
        $image->save($destinationPath.'/'.$imageName);

        //original
        $destinationPath = public_path('images/news-feed');
        if(!File::exists($destinationPath)){
            if(File::makeDirectory($destinationPath,0777,true)){
                throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
            }
        }
        $img = Image::make($img)->encode('jpg', 50);
        $img->save($destinationPath.'/'.$imageName);
        //save data image to db
        $newfeed ->photo                    = $imageName;
        $newfeed ->user_id                  = $user->id;
        $newfeed ->save();
        // redirect
        return Redirect::action('admin\NewFeedController@index')->with('flash-success','Data berhasil disimpan.');
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
        $newfeed = NewFeed::where('id', $id)->firstOrFail();   
        return view('admin.newfeed.show', compact('newfeed'),array('user' => $user));
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
        $status_news_feed = PartStoryStatus::pluck('name','id');
        $news_feed_categories = CategoryNewsFeed::pluck('name','id_category_news_feed');

        $newfeed = NewFeed::where('new_feeds.id', $id)->firstOrFail();
        return view('admin.newfeed.edit', compact('newfeed', 'news_feed_categories', 'status_news_feed'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $newfeed = NewFeed::findOrFail($id); 
        // $newfeed ->name                = Input::get('name');
        $newfeed ->title                    = Input::get('title');
        $newfeed ->description              = Input::get('description');
        $newfeed ->text                     = Input::get('text');
        $newfeed ->id_status_new_feed       = Input::get('id_status_new_feed');
        $newfeed ->id_category_news_feed    = Input::get('id_category_news_feed');
        $newfeed ->published_at             = Input::get('date');
        // addfoto
        $img = $request->file('photo');
        if($img){
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/news-feed/thumbs');
            if(!File::exists($destinationPath)){
                if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }
            $image = Image::make($img->getRealPath());
            $image->fit(200, 200);
            $image->save($destinationPath.'/'.$imageName);

            //original
            $destinationPath = public_path('images/news-feed');
            if(!File::exists($destinationPath)){
                if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $newfeed ->photo                    = $imageName;
        }
        $newfeed ->save();

        return Redirect::action('admin\NewFeedController@index', compact('newfeed'))->with('flash-update','Data berhasil diubah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $newfeed = NewFeed::where('id', $id)->firstOrFail();
        $newfeed->delete();
        return Redirect::action('admin\NewFeedController@index')->with('flash-destroy','Data berhasil dihapus.');
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
        $newfeed = NewFeed::where('title','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.newfeed.list', compact('newfeed'),array('user' => $user));
    }
}