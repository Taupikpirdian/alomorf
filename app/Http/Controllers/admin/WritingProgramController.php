<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\ContentWritingProgram;
use View;
use File;
use Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class WritingProgramController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $writing_programs = ContentWritingProgram::orderBy('created_at', 'desc')->get();
        return view('admin.writing_program.list',array('writing_programs'=>$writing_programs, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.writing_program.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $writing_program = new ContentWritingProgram;
        $writing_program ->title        	= Input::get('title');
        $writing_program ->desc          	= Input::get('desc');
        $writing_program ->order        	= Input::get('order');
        // addfoto
        $img = $request->file('img');
        if($img){
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/content-writing-program/thumbs/');
            if(!File::exists($destinationPath)){
                if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }
            $image = Image::make($img->getRealPath());
            $image->fit(400, 400);
            $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/content-writing-program/');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $writing_program->img = $imageName;
        }
        $writing_program ->save();
        
        // redirect
        return Redirect::action('admin\WritingProgramController@index')->with('flash-success','Data berhasil disimpan.');
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
        $writing_program = ContentWritingProgram::where('id', $id)->firstOrFail();   
        return view('admin.writing_program.show', compact('writing_program'),array('user' => $user));
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
        $writing_program = ContentWritingProgram::where('id', $id)->firstOrFail();   
        return view('admin.writing_program.edit', compact('writing_program'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $writing_program = ContentWritingProgram::findOrFail($id); 
        $writing_program ->title        	= Input::get('title');
        $writing_program ->desc          	= Input::get('desc');
        $writing_program ->order        	= Input::get('order');
        // addfoto
        $img = $request->file('img');
        if($img){
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/content-writing-program/thumbs/');
            if(!File::exists($destinationPath)){
                if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }
            $image = Image::make($img->getRealPath());
            $image->fit(400, 400);
            $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/content-writing-program/');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $writing_program->img = $imageName;
        }
        $writing_program ->save();

        return Redirect::action('admin\WritingProgramController@index', compact('writing_program'))->with('flash-success','Data berhasil diubah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $writing_program = ContentWritingProgram::where('id', $id)->firstOrFail();
        $writing_program->delete();
        return Redirect::action('admin\WritingProgramController@index')->with('flash-destroy','Data berhasil dihapus.');
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
        $writing_program = ContentWritingProgram::where('name','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.writing_program.list', compact('writing_program'),array('user' => $user));
    }
}