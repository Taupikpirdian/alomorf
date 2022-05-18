<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Category;
use View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $category = Category::orderBy('created_at', 'desc')->get();
        return view('admin.category.list',array('category'=>$category, 'user' => $user));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return View::make('admin.category.create',array('user' => $user));
    }

    public function store(Request $request)
    {
        // store
        $category = new Category;
        $category ->name        	= Input::get('name');
        $category ->save();
        
        // redirect
        return Redirect::action('admin\CategoryController@index')->with('flash-success','Data berhasil disimpan.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id_category)
    {
        $user = Auth::user();
        $category = Category::where('id_category', $id_category)->firstOrFail();   
        return view('admin.category.show', compact('category'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id_category)
    {
        $user = Auth::user();
        $category = Category::where('id_category', $id_category)->firstOrFail();   
        return view('admin.category.edit', compact('category'),array('user' => $user));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id_category)
    {
        $category = Category::findOrFail($id_category); 
        $category ->name        = Input::get('name');
        $category ->save();

        return Redirect::action('admin\CategoryController@index', compact('category'))->with('flash-success','Data berhasil diubah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id_category)
    {
        $category = Category::where('id_category', $id_category)->firstOrFail();
        $category->delete();
        return Redirect::action('admin\CategoryController@index')->with('flash-destroy','Data berhasil dihapus.');
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
        $category = Category::where('name','LIKE','%'.$search.'%')->paginate(10);
        return view('admin.category.list', compact('category'),array('user' => $user));
    }
}