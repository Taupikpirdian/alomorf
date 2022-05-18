@extends('layouts.app')
@section('content')

@if($errors->any())
<div class="alert alert-success alert-block">
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
                <button class="btn-writing-v1 Program" id="Program">Program Novel</button>
                <button class="btn-writing-v2 Inkubasi" id="Inkubasi">Inkubasi</button>
            </div>

            <div id="prognov">
                @if($writing_program_1)
                <div class="row section-inform-write">
                    <div class="col-md-5 desc-writ-prog">
                        <label>{{ $writing_program_1->title }}</label>
                        <p>{{$writing_program_1->desc}}</p>
                    </div>
                    <div class="col-md-7 img-writ-prog">
                        <img src="{{ asset('/images/content-writing-program/'.$writing_program_1->img)}}">
                    </div>
                </div>
                @endif

                @if($writing_program_2)
                <div class="row section-inform-write">
                    <div class="col-md-7 img-writ-prog">
                        <img src="{{ asset('/images/content-writing-program/'.$writing_program_2->img)}}">
                    </div>
                    <div class="col-md-5 desc-writ-prog">
                        <label>{{ $writing_program_2->title }}</label>
                        <p> {{ $writing_program_2->desc }}</p>
                    </div>
                </div>
                @endif

                @if($writing_program_3)
                <div class="row section-inform-write">
                    <div class="col-md-5 desc-writ-prog">
                        <label>{{ $writing_program_3->title }}</label>
                        <p> {{ $writing_program_3->desc }}</p>
                    </div>
                    <div class="col-md-7 img-writ-prog">
                        <img src="{{ asset('/images/content-writing-program/'.$writing_program_3->img)}}">
                    </div>
                </div>
                @endif
                @if(Auth::check())
                <div class="text-center">
                  @if(Auth::user()->is_verified == 0)
                    <a href="{{ url('/resend-verification-email') }}" class="btn btn-danger" role="button">Email belum diverifikasi</a>
                  @else
                      @if($user_writing)
                      <a class="btn btn-success" href='{{URL::action("HomeController@programNovel",array($user_writing->id
                      ))}}'>Masuk Program</a>
                      @else
                      <button class="btn btn-warning" data-toggle="modal" data-target="#followWriting">Bergabung</button>
                      @endif
                  @endif
                </div>
                @endif

                <!-- Jika ada yang daftar -->
                <div class="col-md-12 pad-cnt">
                    <h4 class="title-catgrorie">Yang mengikuti Writing Program Ini</h4>
                    <div class="col-md-12 bag-styry">
                    @foreach($program_novels as $key => $program_novel)
                        <div class="item-category new-styleevent">
                            @if($program_novel->book)
                            <img src="{{URL::asset('images/story/'.$program_novel->book->cover_photo)}}" class="img-cover-novel">
                            @else
                            <img src="{{URL::asset('front/images/bookCover.jpg')}}" class="img-cover-novel">
                            @endif
                            <div class="course-author">
                                <a href="{{ url('/detail-program-novel', $program_novel->id) }}"><p class="title-style">{{ $program_novel->title }}</p></a>
                                <h6>{{ $program_novel->participantProgramNovel->userProgramNovel->name }}</h6>
                            </div>
                            @if($program_novel->book)
                            <div class="course-meta">
                                <ul class="mon-black">
                                    <i class="fa fa-eye" aria-hidden="true" style="margin-right: 15px;"> {{ $program_novel->book->viewer }}</i> 
                                    <i class="fa fa-star" aria-hidden="true" style="margin-right: 15px;"> {{ $program_novel->book->rating }}</i> 
                                    <i class="fa fa-th-list" aria-hidden="true"> {{$program_novel->partStories->count()}}</i>
                                </ul>
                            </div>
                            @endif
                        </div>
                    @endforeach
                    </div>
                    {!! $program_novels->render() !!}
                </div>
            </div>

            <div id="inkubasi">
                @if($inkubasi_1)
                <div class="row section-inform-write">
                    <div class="col-md-5 desc-writ-prog">
                        <label>{{ $inkubasi_1->title }}</label>
                        <p>{{$inkubasi_1->desc}}</p>
                    </div>
                    <div class="col-md-7 img-writ-prog">
                        <img src="{{ asset('/images/content-inkubator/'.$inkubasi_1->img)}}">
                    </div>
                </div>
                @endif

                @if($inkubasi_2)
                <div class="row section-inform-write">
                    <div class="col-md-7 img-writ-prog">
                        <img src="{{ asset('/images/content-inkubator/'.$inkubasi_2->img)}}">
                    </div>
                    <div class="col-md-5 desc-writ-prog">
                        <label>{{ $inkubasi_2->title }}</label>
                        <p> {{ $inkubasi_2->desc }}</p>
                    </div>
                </div>
                @endif

                @if($inkubasi_3)
                <div class="row section-inform-write">
                    <div class="col-md-5 desc-writ-prog">
                        <label>{{ $inkubasi_3->title }}</label>
                        <p> {{ $inkubasi_3->desc }}</p>
                    </div>
                    <div class="col-md-7 img-writ-prog">
                        <img src="{{ asset('/images/content-inkubator/'.$inkubasi_3->img)}}">
                    </div>
                </div>
                @endif
                @if(Auth::check())
                <div class="text-center">
                  @if(Auth::user()->is_verified == 0)
                      <a class="btn btn-danger" role="button">Email belum diverifikasi</a>
                  @else
                      @if($user_inkubasi)
                      <a title="Inkubasi" href='{{URL::action("HomeController@homeInkubasi",array($user_inkubasi->id
									))}}' class="btn btn-info-pink"><i class="fa fa-unlock" aria-hidden="true"></i> Masuk Program</a>
                      @else
                      <button class="btn btn-warning" data-toggle="modal" data-target="#followInkubator">Bergabung</button>
                      @endif
                  @endif
                </div>
                @endif

                <div class="col-md-12 pad-cnt"  id="Inkubasi">
                    <h4 class="title-catgrorie">Yang mengikuti Inkubasi Ini</h4>
                    <div class="col-md-12 bag-styry">
                    @foreach($inkubasi_participants as $key => $inkubasi_participant)
                        <div class="item-category new-styleevent">
                        @if($inkubasi_participant->user->userProfil)
                          <a href="{{ url('/profil/'.$inkubasi_participant->user->id) }}">
                              <img src="{{URL::asset('images/foto_profile/'.$inkubasi_participant->user->userProfil->foto_profile)}}" class="img-cover-novel">
                          </a>
                        @endif
                            <br>
                            <div class="course-author">
                                <a href="{{ url('/profil/'.$inkubasi_participant->user->id) }}"><p class="title-style">{{ $inkubasi_participant->user->name }}</p></a>
                            </div>
                        </div>
                    @endforeach
                    </div>
                    {!! $writing_program_participants->render() !!}
                </div>  
            </div>
            </div>
        </div>
    </div>
</section>
<!-- Komentar Program Novel -->
<section class="" id="prognov-komentar">
    <div class="container">
        <div class="container mt-3">
          <!-- Tab panes -->
          <div class="">
            <ul class="tabs">
                <li><a href="#reviews" class="active">Komentar </a></li>
            </ul>
            <div id="home" class="tab-pane active"><br>
                <div class="pad-cnt">
                  @foreach($comments as $key => $comment)
                    <div class="box-coment">
                        <div class="user-comment">
                            @if($comment->user->userProfil)
                            <img src="{{ asset('/images/user-profile/'.$comment->user->userProfil->foto_profile)}}">
                            @else
                            <img src="{{ asset('/front/images/assets/logo-small.png')}}">
                            @endif
                            <span class="mr-20">{{$comment->user->name}}</span>
                        </div><br><br>
                        <div>
                            <p>{{ $comment->text }}</p>
                            <p>{{ date_format($comment->created_at,"d-M-Y H:i:s")}}</p>
                        </div>
                    </div>
                    @endforeach
                  {!! $comments->render() !!}
                </div>
            </div>
            {{ Form::open(array('url' => '/form-comment-writing-program', 'method' => 'post')) }}
            @if(Auth::check())
            <div>
                <textarea class="form-control" rows="5" name="text" placeholder="Masukan komentar di sini" required></textarea>
            </div>
                <button class="btn btn-baca">Submit</button>
            @else
            @endif
            {!! Form::close() !!}
          </div>
        </div>
    </div>
</section>
<!-- Komentar Inkubasi -->
<section class="" id="inkubasi-komentar">
    <div class="container">
        <div class="container mt-3">
          <!-- Tab panes -->
          <div class="">
            <ul class="tabs">
                <li><a href="#reviews" class="active">Komentar Inkubasi</a></li>
            </ul>
            <div id="home" class="tab-pane active"><br>
                <div class="pad-cnt">
                  @foreach($inkubasi_comments as $key => $inkubasi_comment)
                    <div class="box-coment">
                        <div class="user-comment">
                            @if($inkubasi_comment->user->userProfil)
                            <img src="{{ asset('/images/user-profile/'.$inkubasi_comment->user->userProfil->foto_profile)}}">
                            @else
                            <img src="{{ asset('/front/images/assets/logo-small.png')}}">
                            @endif
                            <span class="mr-20">{{$inkubasi_comment->user->name}}</span>
                        </div><br><br>
                        <div>
                            <p>{{ $inkubasi_comment->text }}</p>
                            <p>{{ date_format($inkubasi_comment->created_at,"d-M-Y H:i:s")}}</p>
                        </div>
                    </div>
                    @endforeach
                  {!! $inkubasi_comments->render() !!}
                </div>
            </div>
            {{ Form::open(array('url' => '/form-comment-inkubasi', 'method' => 'post')) }}
            @if(Auth::check())
            <div>
                <textarea class="form-control" rows="5" name="text" placeholder="Masukan komentar di sini" required></textarea>
            </div>
                <button class="btn btn-baca">Submit</button>
            @else
            @endif
            {!! Form::close() !!}
          </div>
        </div>
    </div>
</section>
<!-- Form Writing Program Novel-->
<div id="followWriting" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
  {!! Form::open(['action' => 'HomeController@formWritingProgram']) !!}
    <!-- Modal content-->
    <div class="col-md-12 modal-content">
      <div class="row modal-body flow-event text-center">
        <label>Formulir Mengikuti Program Novel</label>
        @if(Auth::check())
        <input type="text" name="user_id" class="form-control" value="{{Auth::user()->id}}" style="display:none">
        @else
        @endif

        @if(Auth::check())
        @if($user->userProfil)
            @if($user->userProfil->nomor_hp && $user->userProfil->alamat && $user->userProfil->foto_profile)
            <input type="text" class="form-control" value="{{$user->name}}" disabled>
            <input type="text" class="form-control" value="{{$user->userProfil->nomor_hp}}" disabled>
            <input type="text" class="form-control" value="{{$user->userProfil->alamat}}" disabled>
            <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan">
            <div class="col-md-12 text-right">
                <button class="btn btn-baca" type="submit">Daftar</button>
                <button class="btn btn-baca" data-dismiss="modal">Batal</button>
            </div>
            @else
            <input type="text" class="form-control" placeholder="Silahkan Lengkapi Profil Anda Terlebih Dahulu" disabled>
            @endif
        @else
        <input type="text" class="form-control" placeholder="Silahkan Lengkapi Profil Anda Terlebih Dahulu" disabled>
        @endif
        @endif
      </div>
    </div>
  {!! Form::close() !!}    
  </div>
</div>
<!-- Form Inkubator -->
<div id="followInkubator" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
  {!! Form::open(['action' => 'HomeController@formInkubasi']) !!}
    <!-- Modal content-->
    <div class="col-md-12 modal-content">
      <div class="row modal-body flow-event text-center">
        <label>Formulir Mengikuti Program Inkubator</label>
        @if(Auth::check())
        <input type="text" name="user_id" class="form-control" value="{{Auth::user()->id}}" style="display:none">
        @else
        @endif

        @if(Auth::check())
        @if($user->userProfil)
            @if($user->userProfil->nomor_hp && $user->userProfil->foto_profile)
            <input type="text" class="form-control" value="{{$user->name}}" disabled>
            <input type="text" class="form-control" value="{{$user->userProfil->nomor_hp}}" disabled>
            <input type="text" class="form-control" value="{{$user->userProfil->alamat}}" disabled>
            <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan">
            <div class="col-md-12 text-right">
                <button class="btn btn-baca" type="submit">Daftar</button>
                <button class="btn btn-baca" data-dismiss="modal">Batal</button>
            </div>
            @else
            <input type="text" class="form-control" placeholder="Silahkan Lengkapi Profil Anda Terlebih Dahulu" disabled>
            @endif
        @else
        <input type="text" class="form-control" placeholder="Silahkan Lengkapi Profil Anda Terlebih Dahulu" disabled>
        @endif
        @endif
      </div>
    </div>
  {!! Form::close() !!}    
  </div>
</div>
@endsection