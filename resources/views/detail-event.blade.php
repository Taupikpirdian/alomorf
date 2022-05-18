@extends('layouts.app')
@section('content')

    <style type="text/css">
        .course-author label{
            color: #43a8ff;
        }
    </style>

    @if($errors->any())
    <div class="alert alert-danger alert-block">
        <button type="button" style="color:#fff;" class="close" data-dismiss="alert">x</button>
        <strong style="font-family: Palatino; font-size: 14px">{{$errors->first()}}</strong>
    </div>
    @endif

    <section class="main-slider fullscreen slide400">
        <div class="slider" id="autoplay">
           @foreach($sliders as $key => $slider)
            <div class="item">
                <img src="{{ asset('/images/slider/'.$slider->foto)}}" alt="">
                <div class="container">
                    <div class="slider-content">
                        <div class="desc">
                            <h2>{{ $slider->judul }}</h2>
                            <p>{{ $slider->deskripsi }}</p>
                        </div>
                    </div><!-- .slider-content -->
                </div><!-- .container -->
            </div>
            @endforeach
        </div>
    </section>

     <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 detail-event-meta">
                    <div class="text-center">
                        <label>{{ $event->title }}</label>
                    </div>
                    <p>{!! $event->text !!}</p>
                    <div class="col-md-12 text-center">
                    @if(Auth::check())
                        <button class="btn btn-baca" data-toggle="modal" data-target="#folowEvent">Ikuti</button>
                    @else
                        <button class="btn btn-baca">Silahkan Login untuk Mengikuti</button>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="col-md-12 pad-cnt">
        <h4 class="title-catgrorie">Yang mengikuti event ini</h4>
        <div class="col-md-12 bag-styry">
        @foreach($competition_participants as $key => $competition_participant)
            <div class="item-category new-styleevent">
                @if($competition_participant->book)
                <a href="#">
                <img src="{{URL::asset('images/story/'.$competition_participant->book->cover_photo)}}" data-toggle="modal" data-target="#{{{$competition_participant->book->id_story}}}">
                </a>
                @else
                <a href="#">
                <img src="{{URL::asset('front/images/bookCover.jpg')}}" class="img-cover-story-v3">
                </a>
                @endif
                <div class="course-author">
                    @if($competition_participant->book)
                    <a href="#"><p class="title-style" data-toggle="modal" data-target="#{{{$competition_participant->book->id_story}}}">{{ str_limit($competition_participant->book->title, 20) }}</p></a>
                    @else
                    <label>Buku belum ada</label>
                    @endif
                    <h6>{{ $competition_participant->user->name }}</h6>
                </div>
                <div class="course-meta">
                    <ul class="mon-black">
                        @if($competition_participant->book->viewer)
                        <i class="fa fa-eye" aria-hidden="true" style="margin-right: 15px;"> {{ $competition_participant->book->viewer }}</i>
                        @else
                        <i class="fa fa-eye" aria-hidden="true" style="margin-right: 15px;"> 0</i>
                        @endif 
                        <i class="fa fa-star" aria-hidden="true" style="margin-right: 15px;"> {{ $competition_participant->book->rating }}</i> 
                        <i class="fa fa-th-list" aria-hidden="true"> {{$competition_participant->book->partStories->count()}}</i>
                    </ul>
                </div>
            </div>
        @endforeach
        </div>
        {!! $competition_participants->render() !!}

    </div>

    <div id="folowEvent" class="modal fade" role="dialog">
          <div class="modal-dialog modal-lg">
            {!! Form::open(['action' => 'HomeController@formCompetition']) !!}
            <!-- Modal content-->
            <div class="col-md-12 modal-content">
              <div class="row modal-body flow-event text-center">
                <label>Formulir Mengikuti Writing Contest</label>
                @if(Auth::check())
                <input type="text" name="user_id" class="form-control" value="{{Auth::user()->id}}" style="display:none">
                <input type="text" name="event_id" class="form-control" value="{{ $event->id }}" style="display:none">
                    @if($user->userProfil->nomor_hp && $user->userProfil->foto_profile && $user->userProfil->alamat)
                    <input type="text" class="form-control" value="{{$user->name}}" disabled>
                    <input type="text" class="form-control" value="{{$user->userProfil->nomor_hp}}" disabled>
                    <input type="text" class="form-control" value="{{$user->userProfil->alamat}}" disabled>
                    <input type="text" name="book_id" class="form-control" placeholder="Paste your link story">
                    <div class="col-md-12 text-right">
                        <button class="btn btn-baca" type="submit">Simpan</button>
                        <button class="btn btn-baca" data-dismiss="modal">Batal</button>
                    </div>
                    @else
                    <input type="text" name="book_id" class="form-control" placeholder="Silahkan Lengkapi Profil Anda Terlebih Dahulu" disabled>
                    @endif
                @endif
              </div>
            </div>
            {!! Form::close() !!}    
          </div>
        </div>

    @foreach($competition_participants as $key => $competition_participant)
    <div id="{{{$competition_participant->book->id_story}}}" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"> &times; </button>
            </div>
          <div class="row modal-body">
            <div class="col-md-4">
                @if($competition_participant->book->cover_photo)
                <img src="{{URL::asset('images/story/'.$competition_participant->book->cover_photo)}}">
                @else
                <img src="{{URL::asset('front/images/bookCover.jpg')}}" class="img-cover-story-v3" style="width:90%;">
                @endif
                <a href="{{ url('/book-detail/'.$competition_participant->book->id_story) }}"><button class="btn btn-baca2" value="Baca">Lihat Detail</button></a>
            </div>
            <div class="col-md-8 data-book">
                <span>{{ str_limit($competition_participant->title, 20) }}</span>
                <p>{{ $competition_participant->book->user->name }}</p>
                <p class="category-x">{{ $competition_participant->book->category->name }}</p>

                <div class="course-meta">
                    <ul class="mon-black">
                        @if($competition_participant->book->viewer)
                        <i class="fa fa-eye" aria-hidden="true" style="margin-right: 15px;"> {{ $competition_participant->book->viewer }}</i>
                        @else
                        <i class="fa fa-eye" aria-hidden="true" style="margin-right: 15px;"> 0</i>
                        @endif 
                        <i class="fa fa-star" aria-hidden="true" style="margin-right: 15px;"> {{ $competition_participant->book->rating }}</i> 
                        <i class="fa fa-th-list" aria-hidden="true"> {{$competition_participant->book->partStories->count()}}</i>
                    </ul>
                </div>

            </div>
            <div class="col-md-8">
                <div>
                    <label>Ulasan</label>
                    <p>{!! str_limit($competition_participant->book->description, 320) !!}</a></p>
                </div>
                @foreach($comments as $key => $comment)
                    @if($comment->story_id == $competition_participant->book->id_story)
                    <div class="user-comment">
                    @if(Auth::check())
                    @if($comment->user->userProfil)
                        @if($comment->user->userProfil->foto_profile)
                        <img src="{{ asset('/images/foto_profile/'.$comment->user->userProfil->foto_profile)}}">
                        @else
                        <img src="{{ asset('/front/images/assets/logo-small.png')}}">
                        @endif
                        <span class="mr-20">{{$comment->user->name}}</span>
                    @endif
                    @endif
                    </div><br><br>
                    <div>
                        <p>{{ str_limit($comment->text, 150) }} <a href="{{ url('/book-detail/'.$competition_participant->book->id_story) }}">Read More</a></p>
                        <p>{{ date_format($comment->created_at,"d-M-Y H:i:s")}}</p>
                    </div>
                    @endif
                @endforeach
                {{ Form::open(array('url' => '/form-comment', 'method' => 'post')) }}
                @if(Auth::check())
                <div>
                    <input type="hidden" name="id_story" value="{{$competition_participant->book->id_story}}">
                    <textarea class="form-control" name="text" placeholder="Masukan komentar di sini" required></textarea>
                </div>
                <button class="btn btn-baca">Submit</button>
                <button class="btn btn-baca" data-dismiss="modal">Close</button>
                @else
                @endif
                {!! Form::close() !!}
            </div>
          </div>
        </div>

      </div>
    </div>
    @endforeach
@endsection