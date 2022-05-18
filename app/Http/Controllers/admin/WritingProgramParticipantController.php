<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\WritingProgramParticipant;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class WritingProgramParticipantController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $writing_participants = WritingProgramParticipant::orderBy('created_at', 'desc')->paginate(25);   
        return view('admin.writing_participant.list', array('writing_participants'=>$writing_participants, 'user' => $user));
    }  

    public function verifikasi(Request $request, $id)
    {
        // verifikasi
        $verifikasi = WritingProgramParticipant::where('id', $id)->firstOrFail();
        $verifikasi ->verified        	= 1;
        $verifikasi ->save();
        // redirect
        return Redirect::action('admin\WritingProgramParticipantController@index')->with('flash-info','Data berhasil diverifikasi.');
    }

    public function notVerifikasi(Request $request, $id)
    {
        // verifikasi
        $verifikasi = WritingProgramParticipant::where('id', $id)->firstOrFail();
        $verifikasi ->verified        	= 0;
        $verifikasi ->save();
        // redirect
        return Redirect::action('admin\WritingProgramParticipantController@index')->with('flash-info','Verifikasi berhasil dihapus.');
    }

    public function search(Request $request){
        $user = Auth::user();
        $search = $request->get('search');

        $writing_participants = WritingProgramParticipant::leftJoin('users', 'users.id', '=', 'writing_program_participants.user_id')
        ->where('name','LIKE','%'.$search.'%')
        ->paginate(10);

        return view('admin.writing_participant.list', compact('writing_participants'),array('user' => $user));
    }

    public function show($id)
    {
        $user = Auth::user();
        $writing_participant_participant = WritingProgramParticipant::where('id', $id)->firstOrFail();   
        return view('admin.writing_participant.show', compact('writing_participant_participant'),array('user' => $user));
    }
}
