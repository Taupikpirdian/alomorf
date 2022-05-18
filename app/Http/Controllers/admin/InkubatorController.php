<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ContentInkubasi;
use Auth;
use Image;
use File;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class InkubatorController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $inkubators = ContentInkubasi::orderBy('created_at', 'desc')->get();
        return view('admin.inkubator.list',array('inkubators'=>$inkubators, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.inkubator.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $inkubator = new ContentInkubasi;
        $inkubator ->title        	= Input::get('title');
        $inkubator ->desc          	= Input::get('desc');
        $inkubator ->order        	= Input::get('order');
        // addfoto
        $img = $request->file('img');
        if($img){
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/content-inkubator/thumbs/');
            if(!File::exists($destinationPath)){
                if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }
            $image = Image::make($img->getRealPath());
            $image->fit(400, 400);
            $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/content-inkubator/');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $inkubator->img = $imageName;
        }
        $inkubator ->save();
        
        // redirect
        return Redirect::action('admin\InkubatorController@index')->with('flash-success','Data berhasil disimpan.');
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
        $inkubator = ContentInkubasi::where('id', $id)->firstOrFail();   
        return view('admin.inkubator.show', compact('inkubator'),array('user' => $user));
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
        $inkubator = ContentInkubasi::where('id', $id)->firstOrFail();   
        return view('admin.inkubator.edit', compact('inkubator'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $inkubator = ContentInkubasi::findOrFail($id); 
        $inkubator ->title        	= Input::get('title');
        $inkubator ->desc          	= Input::get('desc');
        $inkubator ->order        	= Input::get('order');
        // addfoto
        $img = $request->file('img');
        if($img){
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/content-inkubator/thumbs/');
            if(!File::exists($destinationPath)){
                if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }
            $image = Image::make($img->getRealPath());
            $image->fit(400, 400);
            $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/content-inkubator/');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $inkubator->img = $imageName;
        }
        $inkubator ->save();

        return Redirect::action('admin\InkubatorController@index', compact('inkubator'))->with('flash-success','Data berhasil diubah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $inkubator = ContentInkubasi::where('id', $id)->firstOrFail();
        $inkubator->delete();
        return Redirect::action('admin\InkubatorController@index')->with('flash-destroy','Data berhasil dihapus.');
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
        $inkubator = ContentInkubasi::where('name','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.inkubator.list', compact('inkubator'),array('user' => $user));
    }
}
