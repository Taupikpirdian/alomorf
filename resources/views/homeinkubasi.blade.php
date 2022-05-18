@extends('layouts.app')
@section('content')
<div class="container-fluid sectionprofile">
    <div class="container">
        @foreach($mentors as $key => $mentor)
        <div class="col-md-12">
            <div class="col-md-4">
                <img src="{{ asset('/images/mentors/'.$mentor->img)}}">
                <p>{{ $mentor->name }}</p>
            </div>
            <div class="col-md-8">
                <div>
                    <label>Biodata Mentor</label>
                    <p>{{ $mentor->biodata }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="col-md-12 pad-cnt">
    <h4 class="pad-20">Yang mengikuti inkubasi ini</h4>
    <div class="col-md-12">
        <div class="panel panel-default panel-head">
		  <div class="panel-heading panel-h">Kolom Chat (Komentar)</div>
		  <div class="panel-body panel-cnt">
          {!! $chats->render() !!}
            @foreach($chats as $key => $chat)
                @if($chat->user_id == Auth::user()->id)
                <div class="user-comment chat-box-cnt-chat-right">
                    <img src="{{ asset('/images/foto_profile/'.$chat->user->userProfil->foto_profile)}}">
                    <label>{{ $chat->user->name }}</label>
                    <p> {{ $chat->text }}</p>
                </div> 
                @else
                <div class="user-comment chat-box-cnt chat-left">
                    <img src="{{ asset('/images/foto_profile/'.$chat->user->userProfil->foto_profile)}}">
                    <label>{{ $chat->user->name }}</label>
                    <p> {{ $chat->text }}</p>
                </div>   
                @endif
            @endforeach
          </div>
		</div>
    </div>

</div>
<div class="col-md-12 pad-cnt">
	<div class="col-md-12">
	   {{ Form::open(array('url' => '/form-chat-inkubasi', 'method' => 'post')) }}
        @if(Auth::check())
        <input type="text" name="user_id" class="form-control" value="{{Auth::user()->id}}" style="display:none">
        @else
        @endif
	    <div>
	        <textarea class="form-control" rows="5" name="text" placeholder="Tulis untuk melakukan obrolan"></textarea>
	    </div>
	    @if(Auth::check())
	        <button class="btn btn-baca">Submit</button>
	    @else
	    @endif
	    {!! Form::close() !!}
	</div>
</div>

<div class="col-md-12 pad-cnt">
    <h4 class="title-catgrorie">Yang mengikuti event ini</h4>
    <div class="col-md-12 bag-styryv2	">
        @foreach($inkubasi_participants as $key => $inkubasi_participant)
        <div class="item-category new-styleevent">
            <a href="{{ url('/profil/'.$inkubasi_participant->user->id) }}">
                <img src="{{URL::asset('images/foto_profile/'.$inkubasi_participant->user->userProfil->foto_profile)}}" class="img-cover-novel">
            </a>
            
            <div class="course-author">
                <a href="{{ url('/profil/'.$inkubasi_participant->user->id) }}"><p class="title-style">{{ $inkubasi_participant->user->name }}</p></a>
            </div>
            <!-- <div class="course-meta">
                <ul class="mon-black">
                    <i class="fa fa-eye" aria-hidden="true" style="margin-right: 15px;"> 123</i> 
                    <i class="fa fa-star" aria-hidden="true" style="margin-right: 15px;"> 3K</i> 
                    <i class="fa fa-th-list" aria-hidden="true"> 45</i>
                </ul>
            </div> -->
        </div>
        @endforeach
    </div>
</div>




@endsection