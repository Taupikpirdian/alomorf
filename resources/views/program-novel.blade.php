@extends('layouts.app')
@section('content')

@if ($message = Session::get('flash-success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{ $message }}</strong>
</div>
@endif

@if($errors->any())
<div class="alert alert-danger alert-block">
	<button type="button" style="color:#fff;" class="close" data-dismiss="alert">x</button>
	<strong style="font-family: Palatino; font-size: 14px">{{$errors->first()}}</strong>
</div>
@endif

<div class="container-fluid sectionprofile">
    <div class="container">
        <div class="col-md-12">
            <div class="col-md-4">
                <img src="{{URL::asset('images/foto_profile/'.$user_writing->user->userProfil->foto_profile)}}" class="img-cover-story">
            </div>
            <div class="col-md-8">
                <div>
                    <label>Proyek</label>
                    @foreach($program_novel as $i=>$program_novel)
                    <div class="item-proyek">
                        <p>{{ $program_novel->title }}</p>
                        <form id="delete_program_novel{{$program_novel->id}}" action='{{URL::action("HomeController@destroyProgramNovel",array($program_novel->id))}}' method="POST">
                        <a class="update-project" title="update project" href='{{URL::action("HomeController@formulirProgramnovel",array($program_novel->id))}}'><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <input type="hidden" name="_method" value="delete">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <a title="delete project" href="#" onclick="document.getElementById('delete_program_novel{{$program_novel->id}}').submit();"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </form>
                    </div>
                    @endforeach
                </div>
                <a title="create project" href='{{URL::action("HomeController@createformulirProgramNovel",array($user_writing->id
                    ))}}'><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12 pad-cnt">
    <h4 class="title-catgrorie pad-20">Yang mengikuti event ini</h4>
    <div class="col-md-12 bag-styryv2">
    @foreach($program_novels as $i=>$program_novel)
        @if($program_novel->book_id)
        <div class="item-category new-styleevent">
            @if($program_novel->book->cover_photo)
            <a href="{{ url('/detail-program-novel', $program_novel->id) }}">
                <img src="{{URL::asset('images/story/'.$program_novel->book->cover_photo)}}" class="img-cover-novel">
            </a>
            @else
            <a href="{{ url('/detail-program-novel', $program_novel->id) }}">
                <img src="{{URL::asset('front/images/bookCover.jpg')}}" class="img-cover-novel">
            </a>
            @endif
            
            <div class="course-author">
                <a href="{{ url('/detail-program-novel', $program_novel->id) }}"><p class="title-style">{{ $program_novel->title }}</p></a>
                <h6>{{ $program_novel->participantProgramNovel->userProgramNovel->name }}</h6>
            </div>

            <div class="course-meta">
                <ul class="mon-black">
                    <i class="fa fa-eye" aria-hidden="true" style="margin-right: 15px;"> {{ $program_novel->book->viewer }}</i> 
                    <i class="fa fa-star" aria-hidden="true" style="margin-right: 15px;"> {{ $program_novel->book->rating }}</i> 
                    <i class="fa fa-th-list" aria-hidden="true"> {{$program_novel->partStories->count()}}</i>
                </ul>
            </div>
        </div>
        @endif
    @endforeach
    </div>
    {!! $program_novels->render() !!}
</div>

<div class="clearfix">
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
@endsection