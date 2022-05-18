<?php

namespace App\Http\Controllers\book;

use View;
use DB;
use Auth;
use App\Book;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $books = Book::orderBy('created_at', 'desc')->get();
        return view('admin.book.list',array('books'=>$books, 'user' => $user));
    }   

    // // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function create()
    {
        return view('admin.book.create');
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
        $books = new Book;
        $books ->id_evn      = Input::get('id_evn');
        $books ->judul       = Input::get('judul');
        $books ->deskripsi   = Input::get('deskripsi');
        $books ->tgl_msk     = Input::get('date');
        $books ->tgl_akr     = Input::get('date');
        $books ->foto        = Input::get('foto');
        $books ->save();
        
        // redirect
        return Redirect::action('book\BookController@index')->with('flash-success','The user has been added.');
    }
  //   /**
  //    * Display the specified resource.
  //    *
  //    * @param  int  $id
  //    * @return \Illuminate\Http\Response
  //    */
    public function show($id_evn)
    {
        $user = Auth::user();
        $books = Book::where('id_evn', $id_evn)->firstOrFail();   
        return view('admin.book.show', compact('books'),array('user' => $user));
    }
    
  //   /**
  //    * Show the form for editing the specified resource.
  //    *
     // * @param  int  $id
     // * @return \Illuminate\Http\Response
  //    */
    public function edit($id_evn)
    {
        $user = Auth::user();
        $events = Book::where('id_evn', $id_evn)->firstOrFail();
         
        return view('admin.book.edit', compact('books','books'),array('user' => $user));
}
    public function update(Request $request, $id_evn)
    {
            //update
        $books = Book::findOrFail($id_evn); 
        $books ->id_evn      = Input::get('id_evn');
        $books ->judul       = Input::get('judul');
        $books ->deskripsi   = Input::get('deskripsi');
        $books ->tgl_msk     = Input::get('date');
        $books ->tgl_akr     = Input::get('date');
        $books ->foto        = Input::get('foto');
        $books ->save();

        return Redirect::action('book\BookController@index', compact('books'))->with('flash-success','The user has been added.');
    }
public function destroy($id_evn)
    {
        $books = Book::where('id_evn', $id_evn);
        $books->delete();
        return Redirect::action('book\BookController@index')->with('flash-success','The user has been added.');
    }
  //   /**
  //    * Remove the specified resource from storage.
  //    *
     // * @param  int  $id
     // * @return \Illuminate\Http\Response
  //    */
  //   public function destroy($id)
  //   {
  //       $test = TanggalTestMasuk::where('id', $id)->firstOrFail();
  //       $test->delete();
  //       return Redirect::action('admin\TanggalTestMasukController@index');
  //   }

    public function search(Request $request)
    {
        $user = Auth::user();
        $searchbook = $request->get('search');
        $books = Book::where('id_evn','LIKE','%'.$search.'%')->paginate(10);
            return view('admin.event.list', compact('test'),array('book' => $books));
    }
}