<?php

namespace App\Http\Controllers\admin;

use View;
use DB;
use Auth;
use File;
use Image;
use App\Slider;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $sliders = Slider::orderBy('sliders.order', 'asc')
                  ->join('users', 'users.id', '=', 'sliders.id_users')
                  ->select('sliders.id','sliders.judul','sliders.deskripsi','sliders.order','sliders.foto','users.name')
                  ->get();
        return view('admin.sliders.list',array('sliders'=>$sliders, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // store
        $sliders = new Slider();
        $sliders->judul = $request->judul;
        $sliders->deskripsi = $request->deskripsi;
        $sliders->id_users = Auth::user()->id;

        // addfoto
        $img = $request->file('foto');
        if($img){
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/slider/thumbs/');
            if(!File::exists($destinationPath)){
                if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }
            $image = Image::make($img->getRealPath());
            $image->fit(400, 400);
            $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/slider/');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $sliders->foto = $imageName;
        }

        $sliders->order = $request->order;
        $sliders->save();
       return Redirect::action('admin\SlidersController@index', compact('sliders'))->with('flash-success','Data berhasil disimpan.');
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
        $sliders = Slider::where('sliders.id', $id)
                  ->join('users', 'users.id', '=', 'sliders.id_users')
                  ->select('sliders.id','sliders.judul','sliders.deskripsi','sliders.order','sliders.foto','users.name')
                  ->firstOrFail();
        // print_r($sliders);
        // exit();
        return view('admin.sliders.show', compact('sliders'),array('user' => $user));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $sliders = Slider::where('sliders.id', $id)->firstOrFail();
        return view('admin.sliders.edit', compact('sliders','sliders'),array('user' => $user));
    }

    public function update(Request $request, $id)
    {
        //update
        $sliders = Slider::findOrFail($id); 
        $sliders ->judul      = Input::get('judul');
        $sliders ->deskripsi  = Input::get('deskripsi');
        $sliders ->id_users   = Auth::user()->id;
        // addfoto
        $img = $request->file('foto');
        if($img){
            $imageName = time().'.'.$img->getClientOriginalExtension();
            //thumbs
            $destinationPath = public_path('images/slider/thumbs/');
            if(!File::exists($destinationPath)){
                if(File::makeDirectory($destinationPath,0777,true)){
                    throw new \Exception("Unable to upload to invoices directory make sure it is read / writable.");  
                }
            }
            $image = Image::make($img->getRealPath());
            $image->fit(400, 400);
            $image->save($destinationPath.'/'.$imageName);
            //original
            $destinationPath = public_path('images/slider/');
            $img = Image::make($img)->encode('jpg', 50);
            $img->save($destinationPath.'/'.$imageName);
            //save data image to db
            $sliders->foto = $imageName;
        }
        $sliders ->order      = Input::get('order');
        $sliders ->save();

        return Redirect::action('admin\SlidersController@index', compact('sliders'))->with('flash-update','Data berhasil diubah.');
    }
    
    public function destroy($id)
    {
        $sliders = Slider::where('id', $id);
        $sliders->delete();
        return Redirect::action('admin\SlidersController@index')->with('flash-destroy','Data berhasil dihapus.');
    }

    public function search(Request $request){
        $user = Auth::user();
        $search = $request->get('search');
        $sliders = Slider::where('judul','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.sliders.list', compact('sliders'),array('user' => $user));
    }
}