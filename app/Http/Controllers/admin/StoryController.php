<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Story;
use App\Language;
use App\Category;
use App\StoryRating;
use App\PartStory;
use App\CompetitionParticipant;
use App\ProgramNovel;
use View;
use Image;
use File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class StoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $stories = Story::orderBy('created_at', 'desc')->get();
        return view('admin.story.list',array('stories'=>$stories, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.story.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        
        // store
        $stories = new Story;
        $stories ->id_story        	         = Input::get('id_story');
        $stories ->title                     = Input::get('title');
        $stories ->description        	     = Input::get('description');
        $stories ->id_language               = Input::get('id_language');
        $stories ->id_category               = Input::get('id_category');
        $stories ->id_user                   = Input::get('id_user');
        $stories ->cover_photo               = Input::get('cover_photo');
        $stories ->save();
        // redirect
        return Redirect::action('admin\StoryController@index')->with('flash-success','Data berhasil disimpan.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id_story)
    {
        $user = Auth::user();
        $stories = Story::orderBy('created_at', 'desc')->where('id_story', $id_story)->firstOrFail();   
        return view('admin.story.show', compact('stories'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id_story)
    {
        $user = Auth::user();
        $stories = Story::where('id_story', $id_story)->firstOrFail();
        
        $languages=Language::pluck('name', 'id_language');
        $languages->prepend('Pilih Bahasa', '');
        $categories=Category::pluck('name', 'id_category');
        $categories->prepend('Pilih Kategori', '');
        return view('admin.story.edit', compact('stories', 'languages', 'categories'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function updateOnAdmin(Request $request, $id_story)
    {
        $stories = Story::findOrFail($id_story); 
        $stories ->title                     = Input::get('title');
        $stories ->description               = Input::get('description');
        $stories ->id_language               = Input::get('id_language');
        $stories ->id_category               = Input::get('id_category');
        // addfoto
        $img = $request->file('cover_photo');
        if($img){
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/story/thumbs');
            if(!File::exists($destinationPath)){
                if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }

            $image = Image::make($img->getRealPath());
            $image->fit(200, 200);
            $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/story');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $stories->cover_photo = $imageName;
        }

        $stories ->save();

        return Redirect::action('admin\StoryController@index', compact('stories'))->with('flash-update','Data berhasil diubah.');
    }

    public function updateStory(Request $request, $id_story)
    {
        $stories = Story::findOrFail($id_story); 
        $stories ->title                     = Input::get('title');
        $stories ->description               = Input::get('description');
        $stories ->id_language               = Input::get('id_language');
        $stories ->id_category               = Input::get('id_category');
        $stories ->save();

        return Redirect::back()->withErrors(['Story berhasil diubah', 'The Message']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id_story)
    {
        $stories = Story::where('id_story', $id_story)->firstOrFail();
        $stories->delete();
        $story_rating = StoryRating::where('id_story', $id_story)->delete();
        $story_part = PartStory::where('id_story', $id_story)->delete();
        $competition_participant = CompetitionParticipant::where('book_id', $id_story)->delete();
        $program_novel = ProgramNovel::where('book_id', $id_story)->delete();
        return Redirect::action('admin\StoryController@index')->with('flash-destroy','Data berhasil dihapus.');
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
        $stories = Story::where('title','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.story.list', compact('stories'),array('user' => $user));
    }

    public function recommand(Request $request, $id_story)
    {
        $stories = Story::findOrFail($id_story);
        $stories ->status_recommendation         = 1;
        $stories ->save();

        return Redirect::action('admin\StoryController@index', compact('stories'))->with('flash-success','Cerita berhasil direkomendasikan');
    }

    public function notRecommand(Request $request, $id_story)
    {
        $stories = Story::findOrFail($id_story); 
        $stories ->status_recommendation         = 0;
        $stories ->save();

        return Redirect::action('admin\StoryController@index', compact('stories'))->with('flash-success','Cerita berhasil tidak direkomendasikan');
    }

    public function changeCover(Request $request, $id_story)
    {
        $stories = Story::findOrFail($id_story); 
        // addfoto
        $img = $request->file('cover_photo');
        if($img){
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/story/thumbs');
            if(!File::exists($destinationPath)){
                if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }

            $image = Image::make($img->getRealPath());
            $image->resize(132, 187);
            $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/story');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $stories->cover_photo = $imageName;
        }
        $stories ->save();
        return Redirect::back()->withErrors(['Cover berhasil diubah', 'The Message']);
    }
}