<?php

namespace App\Http\Controllers\admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\InkubatorParticipant;
use App\Mentor;

class InkubatorParticipantController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $inkubator_participants = InkubatorParticipant::orderBy('inkubator_participants.created_at', 'desc')
        ->leftjoin('mentors','mentors.id', '=' ,'inkubator_participants.mentor_id')
        ->select(
            'inkubator_participants.*',
            'mentors.name as mentors')
        ->paginate(25);   

        // foreach ($inkubator_participants as $key => $inkubator_participant) {
        //     echo "<pre>";
        //     print_r($inkubator_participant->beMentor->name);
        //     echo "</pre>";
        //     exit();
        // }

        return view('admin.inkubator_participant.list', array('inkubator_participants'=>$inkubator_participants, 'user' => $user));
    }  

    public function search(Request $request){
        $user = Auth::user();
        $search = $request->get('search');

        $inkubator_participants = InkubatorParticipant::orderBy('inkubator_participants.created_at', 'desc')
        ->leftJoin('users', 'users.id', '=', 'inkubator_participants.user_id')
        ->leftjoin('mentors','mentors.id', '=' ,'inkubator_participants.mentor_id')
        ->select(
            'inkubator_participants.*',
            'mentors.name as mentors')
        ->where('users.name','LIKE','%'.$search.'%')
        ->paginate(25); 

        return view('admin.inkubator_participant.list', compact('inkubator_participants'),array('user' => $user));
    }

    public function edit($id)
    {
        $user = Auth::user();
        $inkubator_participant = InkubatorParticipant::where('id', $id)->firstOrFail();   
        $mentor=Mentor::pluck('name', 'id');
        return view('admin.inkubator_participant.edit', compact('inkubator_participant', 'mentor'),array('user' => $user));
    }

    public function update(Request $request, $id)
    {
        // Update
        $inkubator_participant = InkubatorParticipant::findOrFail($id); 
        $inkubator_participant->pekerjaan             = Input::get('pekerjaan');
        $inkubator_participant->mentor_id             = Input::get('mentor_id');
        $inkubator_participant->save();
        return Redirect::action('admin\InkubatorParticipantController@index',array($inkubator_participant->id))->with('flash-store','Data berhasil diubah.');
    }

}
