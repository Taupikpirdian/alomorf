<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PartWritingProgram;
use Auth;
use View;

class PartWritingProgramController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $part_writing_programs = PartWritingProgram::orderBy('created_at', 'asc')->get();
        return view('admin.part_writing_program.list',array('part_writing_programs'=>$part_writing_programs, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.part_writing_program.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        
        // store
        $part_writing_program = new PartWritingProgram;
        $part_writing_program ->title        	= Input::get('title');
        $part_writing_program ->desc        	= Input::get('desc');
        $part_writing_program ->part        	= Input::get('part');
        $part_writing_program ->save();
        
        // redirect
        return Redirect::action('admin\PartWritingProgramController@index')->with('flash-success','Data berhasil disimpan.');
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
        $part_writing_program = PartWritingProgram::where('id', $id)->firstOrFail();   
        return view('admin.part_writing_program.show', compact('part_writing_program'),array('user' => $user));
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
        $part_writing_program = PartWritingProgram::where('id', $id)->firstOrFail();   
        return view('admin.part_writing_program.edit', compact('part_writing_program'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $part_writing_program = PartWritingProgram::findOrFail($id); 
        $part_writing_program ->title        	= Input::get('title');
        $part_writing_program ->desc        	= Input::get('desc');
        $part_writing_program ->part        	= Input::get('part');
        $part_writing_program ->save();

        return Redirect::action('admin\PartWritingProgramController@index', compact('part_writing_program'))->with('flash-update','Data berhasil diubah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $part_writing_program = PartWritingProgram::where('id', $id)->firstOrFail();
        $part_writing_program->delete();
        return Redirect::action('admin\PartWritingProgramController@index')->with('flash-destroy','Data berhasil dihapus.');
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
        $part_writing_program = PartWritingProgram::where('title','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.part_writing_program.list', compact('part_writing_program'),array('user' => $user));
    }
}
