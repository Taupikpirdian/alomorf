<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Event;
use View;
use File;
use Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class EventController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $event = Event::orderBy('created_at', 'desc')->get();
        return view('admin.event.list',array('event'=>$event, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.event.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $event = new Event;
        $event ->title        	      = Input::get('title');
        $start                        = date('Y-m-d', strtotime(Input::get('start')));
        $event ->start        	      = $start;
        $end                          = date('Y-m-d', strtotime(Input::get('end')));
        $event ->end                  = $end;
        $event ->address              = Input::get('address');
        $event ->theme                = Input::get('theme');
        $event ->description          = Input::get('description');
        $event ->text                 = Input::get('text');
        // addfoto
        $img = $request->file('image');
        if($img){
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/event/thumbs/');
            if(!File::exists($destinationPath)){
                if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }
            $image = Image::make($img->getRealPath());
            $image->fit(400, 400);
            $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/event/');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $event->image = $imageName;
        }

        $event ->save();
        // redirect
        return Redirect::action('admin\EventController@index')->with('flash-success','Data berhasil disimpan');
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
        $event = Event::where('id', $id)->firstOrFail();   
        return view('admin.event.show', compact('event'),array('user' => $user));
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
        $event = Event::where('id', $id)->firstOrFail();   
        return view('admin.event.edit', compact('event'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id); 
        // $newfeed ->name                = Input::get('name');
        $event ->title                = Input::get('title');
        $start                        = date('Y-m-d', strtotime(Input::get('start')));
        $event ->start        	      = $start;
        $end                          = date('Y-m-d', strtotime(Input::get('end')));
        $event ->end                  = $end;
        $event ->address              = Input::get('address');
        $event ->theme                = Input::get('theme');
        $event ->description          = Input::get('description');
        $event ->text                 = Input::get('text');

        // addfoto
        $img = $request->file('image');
        if($img){
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/event/thumbs/');
            if(!File::exists($destinationPath)){
                if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }
            $image = Image::make($img->getRealPath());
            $image->fit(400, 400);
            $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/event/');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $event->image = $imageName;
        }
        $event ->save();

        return Redirect::action('admin\EventController@index', compact('event'))->with('flash-update','Data berhasil diubah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $event = Event::where('id', $id)->firstOrFail();
        $event->delete();
        return Redirect::action('admin\EventController@index')->with('flash-destroy','Data berhasil dihapus.');
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
        $event = Event::where('title','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.event.list', compact('event'),array('user' => $user));
    }
}