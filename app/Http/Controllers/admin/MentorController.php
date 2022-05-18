<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Auth;
use View;
use File;
use Image;
use DateTime;
use App\Mentor;

class MentorController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $mentors = Mentor::orderBy('created_at', 'desc')->get();
        return view('admin.mentor.list', array('mentors'=>$mentors, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $status = array(
            'Aktif'          => 'Aktif',
            'Tidak Aktif'    => 'Tidak Aktif'
        );
        return View::make('admin.mentor.create', compact('status'), array('user' => $user));
    }

    public function store(Request $request)
    {
        $mentor = new Mentor;
        $mentor ->name                     = Input::get('name');
        $mentor ->biodata                  = Input::get('biodata');
        // addfoto
        $img = $request->file('img');
        if($img){
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/mentors/thumbs/');
            if(!File::exists($destinationPath)){
                if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }
            $image = Image::make($img->getRealPath());
            $image->fit(400, 400);
            $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/mentors/');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $mentor->img = $imageName;
        }
        $mentor ->status                  = Input::get('status');
        $mentor ->save();
        // redirect
        return Redirect::action('admin\MentorController@index')->with('flash-success','Data berhasil disimpan.');
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
        $mentor = Mentor::where('id', $id)->firstOrFail();   
        return view('admin.mentor.show', compact('mentor'),array('user' => $user));
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
        $mentor = Mentor::where('id', $id)->firstOrFail();
        $status = array(
            'Aktif'          => 'Aktif',
            'Tidak Aktif'    => 'Tidak Aktif'
        );
        return view('admin.mentor.edit', compact('status', 'mentor'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $mentor = Mentor::findOrFail($id); 
        $mentor ->name                     = Input::get('name');
        $mentor ->biodata                  = Input::get('biodata');
        // addfoto
        $img = $request->file('img');
        if($img){
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/mentors/thumbs/');
            if(!File::exists($destinationPath)){
                if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }
            $image = Image::make($img->getRealPath());
            $image->fit(400, 400);
            $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/mentors/');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $mentor->img = $imageName;
        }
        $mentor ->status                  = Input::get('status');
        $mentor ->save();

        return Redirect::action('admin\MentorController@index', compact('mentor'))->with('flash-update','Data berhasil diubah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $mentor = Mentor::where('id', $id)->firstOrFail();
        $mentor->delete();
        return Redirect::action('admin\MentorController@index')->with('flash-destroy','Data berhasil dihapus.');
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
        $mentor = Mentor::where('name','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.mentor.list', compact('mentor'),array('user' => $user));
    }
}
