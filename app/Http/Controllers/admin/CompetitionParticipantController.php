<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\CompetitionParticipant;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class CompetitionParticipantController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $competition_participants = CompetitionParticipant::orderBy('created_at', 'desc')->paginate(25);   
        return view('admin.competition.list', array('competition_participants'=>$competition_participants, 'user' => $user));
    }  

    public function verifikasi(Request $request, $id)
    {
        // verifikasi
        $verifikasi = CompetitionParticipant::where('id', $id)->firstOrFail();
        $verifikasi ->verified        	= 1;
        $verifikasi ->save();
        // redirect
        return Redirect::action('admin\CompetitionParticipantController@index')->with('flash-info','Data berhasil diverifikasi.');
    }

    public function notVerifikasi(Request $request, $id)
    {
        // verifikasi
        $verifikasi = CompetitionParticipant::where('id', $id)->firstOrFail();
        $verifikasi ->verified        	= 0;
        $verifikasi ->save();
        // redirect
        return Redirect::action('admin\CompetitionParticipantController@index')->with('flash-info','Verifikasi berhasil dihapus.');
    }

    public function search(Request $request){
        $user = Auth::user();
        $search = $request->get('search');
        $competition_participants = CompetitionParticipant::leftJoin('users', 'users.id', '=', 'competition_participants.user_id')
        ->where('name','LIKE','%'.$search.'%')
        ->paginate(10);

        return view('admin.competition.list', compact('competition_participants'),array('user' => $user));
    }

    public function show($id)
    {
        $user = Auth::user();
        $competition_participant = CompetitionParticipant::where('id', $id)->firstOrFail();   
        return view('admin.competition.show', compact('competition_participant'),array('user' => $user));
    }
}
