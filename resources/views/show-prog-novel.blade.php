@extends('layouts.app')
@section('content')
@if($errors->any())
<div class="alert alert-success alert-block">
	<button type="button" style="color:#fff;" class="close" data-dismiss="alert">x</button>
	<strong style="font-family: Palatino; font-size: 14px">{{$errors->first()}}</strong>
</div>
@endif

<div class="container">
    <div class="col-md-12 form-bag">
        <div class="text-center">
            <label>Writing Program Novel</label>
        </div>
        <div class="form-group">
            <label class="form-label form-label-w200">Judul</label> {{ $program_novel->title }}<br>
            <label class="form-label form-label-w200">Nama Akun</label> {{ $program_novel->participantProgramNovel->user->name }}<br>
            <label class="form-label form-label-w200">Genre</label> {{ $program_novel->category->name }}<br>
            <label class="form-label form-label-w200">Link Buku</label> http://alomorf.com/book-detail/{{ $program_novel->book_id }}
        </div>
    </div>

    <div class="col-md-12 form-bag">
        @if($part_writing_program_1)
        <div class="form-flow">
            <label>{{ $part_writing_program_1->title }}</label>
            <p>{{ $part_writing_program_1->desc }}</p>
            <p id="text" class="rasta">{{ $program_novel->stage_1 }}</p>
            <div class="text-right">
                <button class="btn btn-baca" type="submit" id="show">Tampilkan</button>
                <button class="btn btn-baca" id="hide">Sembunyikan</button>
            </div>
        </div>
        @endif
        @if($part_writing_program_2)
        <div class="form-flow">
            <label>{{ $part_writing_program_2->title }}</label>
            <p>{{ $part_writing_program_2->desc }}</p>
            <p id="text2" class="rasta">{{ $program_novel->stage_2 }}</p>
            <div class="text-right">
                <button class="btn btn-baca" type="submit" id="show2">Tampilkan</button>
                <button class="btn btn-baca" id="hide2">Sembunyikan</button>
            </div>
        </div>
        @endif
        @if($part_writing_program_3)
        <div class="form-flow">
            <label>{{ $part_writing_program_3->title }}</label>
            <p>{{ $part_writing_program_3->desc }}</p>
            <p id="text3" class="rasta">{{ $program_novel->stage_3 }}</p>
            <div class="text-right">
                <button class="btn btn-baca" type="submit" id="show3">Tampilkan</button>
                <button class="btn btn-baca" id="hide3">Sembunyikan</button>
            </div>
        </div>
        @endif
        @if($part_writing_program_4)
        <div class="form-flow">
            <label>{{ $part_writing_program_4->title }}</label>
            <p>{{ $part_writing_program_4->desc }}</p>
            <p id="text4" class="rasta">{{ $program_novel->stage_4 }}</p>
            <div class="text-right">
                <button class="btn btn-baca" type="submit" id="show4">Tampilkan</button>
                <button class="btn btn-baca" id="hide4">Sembunyikan</button>
            </div>
        </div>
        @endif
        @if($part_writing_program_5)
        <div class="form-flow">
            <label>{{ $part_writing_program_5->title }}</label>
            <p>{{ $part_writing_program_5->desc }}</p>
            <p id="text5" class="rasta">{{ $program_novel->stage_5 }}</p>
            <div class="text-right">
                <button class="btn btn-baca" type="submit" id="show5">Tampilkan</button>
                <button class="btn btn-baca" id="hide5">Sembunyikan</button>
            </div>
        </div>
        @endif
        @if($part_writing_program_6)
        <div class="form-flow">
            <label>{{ $part_writing_program_6->title }}</label>
            <p>{{ $part_writing_program_6->desc }}</p>
            <p id="text6" class="rasta">{{ $program_novel->stage_6 }}</p>
            <div class="text-right">
                <button class="btn btn-baca" type="submit" id="show6">Tampilkan</button>
                <button class="btn btn-baca" id="hide6">Sembunyikan</button>
            </div>
        </div>
        @endif
        @if($part_writing_program_7)
        <div class="form-flow">
            <label>{{ $part_writing_program_7->title }}</label>
            <p>{{ $part_writing_program_7->desc }}</p>
            <p id="text7" class="rasta">{{ $program_novel->stage_7 }}</p>
            <div class="text-right">
                <button class="btn btn-baca" type="submit" id="show7">Tampilkan</button>
                <button class="btn btn-baca" id="hide7">Sembunyikan</button>
            </div>
        </div>
        @endif
        @if($part_writing_program_8)
        <div class="form-flow">
            <label>{{ $part_writing_program_8->title }}</label>
            <p>{{ $part_writing_program_8->desc }}</p>
            <p id="text8" class="rasta">{{ $program_novel->stage_8 }}</p>
            <div class="text-right">
                <button class="btn btn-baca" type="submit" id="show8">Tampilkan</button>
                <button class="btn btn-baca" id="hide8">Sembunyikan</button>
            </div>
        </div>
        @endif
        @if($part_writing_program_9)
        <div class="form-flow">
            <label>{{ $part_writing_program_9->title }}</label>
            <p>{{ $part_writing_program_9->desc }}</p>
            <p id="text9" class="rasta">{{ $program_novel->stage_9 }}</p>
            <div class="text-right">
                <button class="btn btn-baca" type="submit" id="show9">Tampilkan</button>
                <button class="btn btn-baca" id="hide9">Sembunyikan</button>
            </div>
        </div>
        @endif
        @if($part_writing_program_10)
        <div class="form-flow">
            <label>{{ $part_writing_program_10->title }}</label>
            <p>{{ $part_writing_program_10->desc }}</p>
            <p id="text10" class="rasta">{{ $program_novel->stage_10 }}</p>
            <div class="text-right">
                <button class="btn btn-baca" type="submit" id="show10">Tampilkan</button>
                <button class="btn btn-baca" id="hide10">Sembunyikan</button>
            </div>
        </div>
        @endif
    </div>
    <div class="text-right">
        @if(Auth::check() && $user_writing)
        <a href="{{ url('/program-novel', Auth::user()->id) }}" class="btn btn-baca">Selesai</a>
        @else
        <a href="{{ url('/') }}" class="btn btn-baca">Home</a>
        @endif
    </div>
</div>

<!-- <section class="section-tab">
    <div class="container">
        <div class="container mt-3">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#home">Latest</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#menu1">Popular</a>
            </li>
          </ul>

          <div class="tab-content">
            <div id="home" class="tab-pane active"><br>
                <div class="pad-cnt">
                    <div class="box-coment">
                        <div class="user-comment">
                            <img src="front/images/assets/logo-small.png">
                            <span class="mr-20">Jack Marthin</span>
                            <div class="style-star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>

                        </div><br><br>
                        <div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elit <a href="">Read More</a></p>
                            <p>12-12-1009</p>
                        </div>
                    </div>
                    <div class="box-coment">
                        <div class="user-comment">
                            <img src="front/images/assets/logo-small.png">
                            <span class="mr-20">Jack Marthin</span>
                            <div class="style-star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>

                        </div><br><br>
                        <div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elit <a href="">Read More</a></p>
                            <p>12-12-1009</p>
                        </div>
                    </div>
                    <div class="box-coment">
                        <div class="user-comment">
                            <img src="front/images/assets/logo-small.png">
                            <span class="mr-20">Jack Marthin</span>
                            <div class="style-star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>

                        </div><br><br>
                        <div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elit <a href="">Read More</a></p>
                            <p>12-12-1009</p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="menu1" class="tab-pane fade"><br>
                <div id="home" class="container tab-pane active"><br>
                    <div class="pad-cnt">
                        <div class="box-coment">
                            <div class="user-comment">
                                <img src="front/images/assets/logo-small.png">
                                <span class="mr-20">Jack Marthin</span>
                                <div class="style-star">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>

                            </div><br><br>
                            <div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elit <a href="">Read More</a></p>
                                <p>12-12-1009</p>
                            </div>
                        </div>
                        <div class="box-coment">
                            <div class="user-comment">
                                <img src="front/images/assets/logo-small.png">
                                <span class="mr-20">Jack Marthin</span>
                                <div class="style-star">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>

                            </div><br><br>
                            <div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elit <a href="">Read More</a></p>
                                <p>12-12-1009</p>
                            </div>
                        </div>
                        <div class="box-coment">
                            <div class="user-comment">
                                <img src="front/images/assets/logo-small.png">
                                <span class="mr-20">Jack Marthin</span>
                                <div class="style-star">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>

                            </div><br><br>
                            <div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elit <a href="">Read More</a></p>
                                <p>12-12-1009</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <textarea class="form-control" rows="5">Komentar</textarea>
            </div>
          </div>
        </div>
        
    </div>
</section> -->

<section class="section-tab" id="prognov-komentar">
    <div class="container">
        <div class="container mt-3">
          <!-- Tab panes -->
          <div class="tab-content">
            <ul class="tabs">
                <li><a href="#reviews" class="active">Komentar </a></li>
            </ul>
            <div id="home" class="tab-pane active"><br>
                <div class="pad-cnt">
                  @foreach($comments as $key => $comment)
                    <div class="box-coment">
                        <div class="user-comment">
                            @if($comment->user->userProfil)
                            <img src="{{ asset('/images/foto_profile/'.$comment->user->userProfil->foto_profile)}}">
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
            {{ Form::open(array('url' => '/form-comment-program-novel', 'method' => 'post')) }}
            <div>
                <input type="hidden" name="program_id" value="{{ $program_novel->id }}">
                <textarea class="form-control" rows="5" name="text" placeholder="Tulis komentar di sini" required></textarea>
            </div>
            @if(Auth::check())
                <button class="btn btn-baca">Submit</button>
            @else
            @endif
            {!! Form::close() !!}
          </div>
        </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
$('.rasta').hide();

$(document).ready(function(){
  $("#hide").click(function(){
    $("#text").hide();
  });
  $("#show").click(function(){
    $("#text").show();
  });
});

$(document).ready(function(){
  $("#hide2").click(function(){
    $("#text2").hide();
  });
  $("#show2").click(function(){
    $("#text2").show();
  });
});

$(document).ready(function(){
  $("#hide3").click(function(){
    $("#text3").hide();
  });
  $("#show3").click(function(){
    $("#text3").show();
  });
});

$(document).ready(function(){
  $("#hide4").click(function(){
    $("#text4").hide();
  });
  $("#show4").click(function(){
    $("#text4").show();
  });
});

$(document).ready(function(){
  $("#hide5").click(function(){
    $("#text5").hide();
  });
  $("#show5").click(function(){
    $("#text5").show();
  });
});

$(document).ready(function(){
  $("#hide6").click(function(){
    $("#text6").hide();
  });
  $("#show6").click(function(){
    $("#text6").show();
  });
});

$(document).ready(function(){
  $("#hide7").click(function(){
    $("#text7").hide();
  });
  $("#show7").click(function(){
    $("#text7").show();
  });
});

$(document).ready(function(){
  $("#hide8").click(function(){
    $("#text8").hide();
  });
  $("#show8").click(function(){
    $("#text8").show();
  });
});

$(document).ready(function(){
  $("#hide9").click(function(){
    $("#text9").hide();
  });
  $("#show9").click(function(){
    $("#text9").show();
  });
});

$(document).ready(function(){
  $("#hide10").click(function(){
    $("#text10").hide();
  });
  $("#show10").click(function(){
    $("#text10").show();
  });
});
</script>
@endsection