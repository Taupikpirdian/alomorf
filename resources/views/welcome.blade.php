@extends('layouts.app')
@section('content')

<style>
    .checked {
      color: orange;
    }
</style>

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
        </div><!-- .slider -->
    </section>
    <br>

    <!-- Rekomendasi -->
    <section>
        <div class="container-fluid">
            <h4 class="title-catgrorie">Rekomendasi</h4>
            <div class="owl-kategori">
            @foreach($story_recomands as $key => $story_recomand)
                <div class="item-category">
                    @if($story_recomand->cover_photo)
                    <a href="#">
                        <img src="{{URL::asset('images/story/thumbs/'.$story_recomand->cover_photo)}}" class="img-cover-story" style="width:90%;" data-toggle="modal" data-target="#{{{$story_recomand->id_story}}}">
                    </a>
                    @else
                    <a href="#">
                        <img src="{{URL::asset('front/images/bookCover.jpg')}}" class="img-cover-story" style="width:90%;" data-toggle="modal" data-target="#{{{$story_recomand->id_story}}}">
                    </a>
                    @endif
                    <div class="course-author">
                        <a href="#"><p class="title-style" data-toggle="modal" data-target="#{{{$story_recomand->id_story}}}1">{{ str_limit($story_recomand->title, 20) }}</p></a>
                        <h6>{{ $story_recomand->user->name }}</h6>
                    </div>
                    <div class="course-meta">
                        <ul class="mon-black">
                            @if($story_recomand->viewer)
                            <i class="fa fa-eye" aria-hidden="true" style="margin-right: 15px;"> {{ $story_recomand->viewer }}</i>
                            @else
                            <i class="fa fa-eye" aria-hidden="true" style="margin-right: 15px;"> 0</i>
                            @endif 
                            <i class="fa fa-star" aria-hidden="true" style="margin-right: 15px;"> {{ $story_recomand->rating }}</i> 
                            <i class="fa fa-th-list" aria-hidden="true"> {{$story_recomand->partStories->count()}}</i>
                        </ul>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </section>

    <section>
        <div class="container-fluid" style="margin: 20px 0px;">
            <div class="owl-slide-matp">
        @foreach($list_categories as $key => $list_category)
                <div class="item-slidemtp col-md-2 text-center">
                    <a href='{{URL::action("HomeController@searchCategories",array($list_category->id_category))}}'>
                        <div class="bg-img">
                        {{ $list_category->name }}
                        </div>
                    </a>
                </div>
        @endforeach
            </div>
        </div>
    </section>

    <!-- Kategori -->
    @foreach($categories as $i=>$category)
        <section>
            <div class="container-fluid">
                <h4 class="title-catgrorie">{{ $category->name }}</h4>
                <div class="owl-kategori">
                @foreach($category->stories as $i=>$storys)
                    <div class="item-category">
                        @if($storys->cover_photo)
                        <a href="#">
                            <img src="{{URL::asset('images/story/thumbs/'.$storys->cover_photo)}}" class="img-cover-story" style="width:90%;" data-toggle="modal" data-target="#{{$storys->id_story}}">
                        </a>
                        @else
                        <a href="#">
                            <img src="{{URL::asset('front/images/bookCover.jpg')}}" class="img-cover-story" style="width:90%;" data-toggle="modal" data-target="#{{$storys->id_story}}">
                        </a>
                        @endif
                        <div class="course-author">
                            <a href="#"><p class="title-style" data-toggle="modal" data-target="#{{$storys->id_story}}">{{ str_limit($storys->title, 20) }}</p></a>
                            <h6>{{ $storys->user->name }}</h6>
                        </div>
                        <div class="course-meta">
                            <ul class="mon-black">
                                @if($storys->viewer)
                                <i class="fa fa-eye" aria-hidden="true" style="margin-right: 15px;"> {{ $storys->viewer }}</i>
                                @else
                                <i class="fa fa-eye" aria-hidden="true" style="margin-right: 15px;"> 0</i>
                                @endif 
                                <i class="fa fa-star" aria-hidden="true" style="margin-right: 15px;"> {{ $storys->rating }}</i> 
                                <i class="fa fa-th-list" aria-hidden="true"> {{$storys->partStories->count()}}</i>
                            </ul>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </section>
    @endforeach

    <!-- Kabar Terbaru -->
    <section>
        <div class="container-fluid">
            <h4 class="title-catgrorie">Kabar Terbaru</h4>
            @foreach($newfeed as $i=>$newfeeds)
            <div class="col-md-6">
                <div class="content-news news-bg" style=" background: url({{URL::asset('images/news-feed/'.$newfeeds->photo)}}">
                    <label class="meta-news-title">{{ str_limit($newfeeds->title, 370) }}</label>
                    <div class="meta-desc-news">
                        <p>{{ str_limit($newfeeds->description, 370) }}</p>
                    </div>
                    <div class="text-right">
                        <a href="{{ url('/news-feeds/'.$newfeeds->id) }}" class="btn btn-learn">Read</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Terbaru -->
    <section>
        <div class="container-fluid">
            <h4 class="title-catgrorie">Terbaru</h4>
            <div class="owl-kategori">
            @foreach($story as $i=>$storys)
                <div class="item-category">
                    @if($storys->cover_photo)
                    <a href="#">
                        <img src="{{URL::asset('images/story/thumbs/'.$storys->cover_photo)}}" class="img-cover-story" style="width:90%;" data-toggle="modal" data-target="#{{$storys->id_story}}">
                    </a>
                    @else
                    <a href="#">
                        <img src="{{URL::asset('front/images/bookCover.jpg')}}" class="img-cover-story" style="width:90%;" data-toggle="modal" data-target="#{{$storys->id_story}}">
                    </a>
                    @endif
                    <div class="course-author">
                        <a href="#"><p class="title-style" data-toggle="modal" data-target="#{{$storys->id_story}}">{{ str_limit($storys->title, 20) }}</p></a>
                        <h6>{{ $storys->user->name }}</h6>
                    </div>
                    <div class="course-meta">
                        <ul class="mon-black">
                            <a href="" style="margin-right: 15px;"><i class="fa fa-eye" aria-hidden="true"></i> {{ $storys->viewer }} </a>
                            <a href="" style="margin-right: 15px;"><i class="fa fa-star" aria-hidden="true"></i> {{ $storys->rating }} </a>
                            <a href=""><i class="fa fa-th-list" aria-hidden="true"></i> {{$storys->partStories->count()}}</a>
                        </ul>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </section>

    <!-- Event -->
    <section>
        <div class="container-fluid">
            <h4 class="title-catgrorie">Event</h4>
            @foreach($events as $key => $event)
            <div class="col-md-6">
                <div class="content-news news-bg"  style=" background: url({{URL::asset('images/event/'.$event->image)}}">
                    <label class="meta-news-title">{{ $event->title }}</label>
                    <div class="meta-desc-news">
                        <p>{{ str_limit($event->description, 270) }}</p>
                    </div>
                    <div class="text-right">
                        <a href="{{ url('/detail-event/'.$event->id) }}" class="btn btn-learn">Read</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Populer -->
    <section>
        <div class="container-fluid">
            <h4 class="title-catgrorie">Populer</h4>
            <div class="owl-kategori">
            @foreach($popular_stories as $key => $popular_story)
                <div class="item-category">
                    @if($popular_story->cover_photo)
                    <a href="#">
                        <img src="{{URL::asset('images/story/thumbs/'.$popular_story->cover_photo)}}" class="img-cover-story" style="width:90%;" data-toggle="modal" data-target="#{{{$popular_story->id_story}}}">
                    </a>
                    @else
                    <a href="#">
                        <img src="{{URL::asset('front/images/bookCover.jpg')}}" class="img-cover-story" style="width:90%;" data-toggle="modal" data-target="#{{{$popular_story->id_story}}}">
                    </a>
                    @endif
                    <div class="course-author">
                        <a href="#"><p class="title-style" data-toggle="modal" data-target="#{{{$popular_story->id_story}}}">{{ str_limit($popular_story->title, 20) }}</p></a>
                        <h6>{{ $popular_story->user->name }}</h6>
                    </div>
                    <div class="course-meta">
                        <ul class="mon-black">
                            <i class="fa fa-eye" aria-hidden="true" style="margin-right: 15px;"> {{ $popular_story->viewer }}</i> 
                            <i class="fa fa-star" aria-hidden="true" style="margin-right: 15px;"> {{ $popular_story->rating }}</i> 
                            <i class="fa fa-th-list" aria-hidden="true"> {{$popular_story->partStories->count()}}</i>
                        </ul>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </section>

    <div class="clearfix">
    </div>
    
    <!-- Modal Kategori -->
    @foreach($categories as $i=>$category)
        @foreach($category->stories as $i=>$storys)
            <div id="{{{$storys->id_story}}}" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"> &times; </button>
                        </div>
                        <div class="row modal-body">
                            <div class="col-md-4">
                                @if($storys->cover_photo)
                                <img src="{{URL::asset('images/story/thumbs/'.$storys->cover_photo)}}" class="img-cover-story-v3" style="width:100%;">
                                @else
                                <img src="{{URL::asset('front/images/bookCover.jpg')}}" class="img-cover-story-v3" style="width:100%;">
                                @endif
                                <a href="{{ url('/book-detail/'.$storys->id_story) }}"><button class="btn btn-baca2" value="Baca">Lihat Detail</button></a>
                            </div>
                            <div class="col-md-8 data-book">
                                <span>{{ str_limit($storys->title, 20) }}</span>
                                <p>{{ $storys->user->name }}</p>
                                @if($storys->category)
                                <p class="category-x">{{ $storys->category->name }}</p>
                                @endif
                                <div class="course-meta">
                                    <ul class="mon-black mon-big">
                                        @if($storys->viewer)
                                        <i class="fa fa-eye" aria-hidden="true" style="margin-right: 15px;"> {{ $storys->viewer }}</i>
                                        @else
                                        <i class="fa fa-eye" aria-hidden="true" style="margin-right: 15px;"> 0</i>
                                        @endif 
                                        <i class="fa fa-star" aria-hidden="true" style="margin-right: 15px;"> {{ $storys->rating }}</i> 
                                        <i class="fa fa-th-list" aria-hidden="true"> {{$storys->partStories->count()}}</i>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div>
                                    <label>Ulasan</label>
                                    <p>{!! str_limit($storys->description, 320) !!}</a></p>
                                </div>
                                    <div class="user-comment">
                                    @if($storys->commentLimits)
                                    @if($storys->commentLimits->user->userProfil)
                                        @if($storys->commentLimits->user->userProfil->foto_profile)
                                        <img src="{{ asset('/images/foto_profile/'.$storys->commentLimits->user->userProfil->foto_profile)}}">
                                        @else
                                        <img src="{{ asset('/front/images/assets/logo-small.png')}}">
                                        @endif
                                        <span class="mr-20">{{$storys->commentLimits->user->name}}</span>
                                    @endif
                                    @endif
                                    </div><br><br>
                                    @if($storys->commentLimits)
                                    <div>
                                        <p>{{ str_limit($storys->commentLimits->text, 150) }} <a href="{{ url('/book-detail/'.$storys->id_story) }}">Read More</a></p>
                                        <p>{{ date_format($storys->commentLimits->created_at,"d-M-Y H:i:s")}}</p>
                                    </div>
                                    @endif
                                {{ Form::open(array('url' => '/form-comment', 'method' => 'post')) }}
                                @if(Auth::check())
                                <div>
                                    <input type="hidden" name="id_story" value="{{$storys->id_story}}">
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
    @endforeach
    <!-- Modal Rekomendasi Story -->
    @foreach($story_recomands as $key => $story_recomand)
        <div id="{{{$story_recomand->id_story}}}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"> &times; </button>
                    </div>
                <div class="row modal-body">
                    <div class="col-md-4">
                        @if($story_recomand->cover_photo)
                        <img src="{{URL::asset('images/story/thumbs/'.$story_recomand->cover_photo)}}" class="img-cover-story-v3" style="width:100%;">
                        @else
                        <img src="{{URL::asset('front/images/bookCover.jpg')}}" class="img-cover-story-v3" style="width:100%;">
                        @endif
                        <a href="{{ url('/book-detail/'.$story_recomand->id_story) }}"><button class="btn btn-baca2" value="Baca">Lihat Detail</button></a>
                    </div>
                    <div class="col-md-8 data-book">
                        <span>{{ str_limit($story_recomand->title, 20) }}</span>
                        <p>{{ $story_recomand->user->name }}</p>
                        @if($story_recomand->category)
                        <p class="category-x">{{ $story_recomand->category->name }}</p>
                        @endif
                        <div class="course-meta">
                            <ul class="mon-black mon-big">
                                @if($story_recomand->viewer)
                                <i class="fa fa-eye" aria-hidden="true" style="margin-right: 15px;"> {{ $story_recomand->viewer }}</i>
                                @else
                                <i class="fa fa-eye" aria-hidden="true" style="margin-right: 15px;"> 0</i>
                                @endif 
                                <i class="fa fa-star" aria-hidden="true" style="margin-right: 15px;"> {{ $story_recomand->rating }}</i> 
                                <i class="fa fa-th-list" aria-hidden="true"> {{$story_recomand->partStories->count()}}</i>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div>
                            <label>Ulasan</label>
                            <p>{!! str_limit($story_recomand->description, 320) !!}</a></p>
                        </div>
                            <div class="user-comment">
                            @if($story_recomand->commentLimits)
                            @if($story_recomand->commentLimits->user->userProfil)
                                @if($story_recomand->commentLimits->user->userProfil->foto_profile)
                                <img src="{{ asset('/images/foto_profile/'.$story_recomand->commentLimits->user->userProfil->foto_profile)}}">
                                @else
                                <img src="{{ asset('/front/images/assets/logo-small.png')}}">
                                @endif
                                <span class="mr-20">{{$story_recomand->commentLimits->user->name}}</span>
                            @endif
                            @endif
                            </div><br><br>
                            @if($story_recomand->commentLimits)
                            <div>
                                <p>{{ str_limit($story_recomand->commentLimits->text, 150) }} <a href="{{ url('/book-detail/'.$story_recomand->id_story) }}">Read More</a></p>
                                <p>{{ date_format($story_recomand->commentLimits->created_at,"d-M-Y H:i:s")}}</p>
                            </div>
                            @endif
                        {{ Form::open(array('url' => '/form-comment', 'method' => 'post')) }}
                        @if(Auth::check())
                        <div>
                            <input type="hidden" name="id_story" value="{{$story_recomand->id_story}}">
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
    <!-- End Modal Rekomendasi Story -->

    <!-- Sebetulnya tidak harus membuat 3 modal, cukup dengan 1 modal itu sudah work, karena si valuenya sama, walau beda variable -->
    <!-- Modal 2 dibawah ini tidak akan terpakai, karena sblmnya sudah terbaca oleh modal yang di atas -->

    <!-- Modal Rekomendasi Kategori -->
    @foreach($story as $i=>$storys)
    <div id="{{{$storys->id_story}}}" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"> &times; </button>
            </div>
          <div class="row modal-body">
            <div class="col-md-4">
                @if($storys->cover_photo)
                <img src="{{URL::asset('images/story/thumbs/'.$storys->cover_photo)}}" class="img-cover-story-v3" style="width:100%;">
                @else
                <img src="{{URL::asset('front/images/bookCover.jpg')}}" class="img-cover-story-v3" style="width:100%;">
                @endif
                <a href="{{ url('/book-detail/'.$storys->id_story) }}"><button class="btn btn-baca2" value="Baca">Lihat Detail</button></a>
            </div>
            <div class="col-md-8 data-book">
                <span>{{ str_limit($storys->title, 20) }}</span>
                <p>{{ $storys->user->name }}</p>
                @if($storys->category)
                <p class="category-x">{{ $storys->category->name }}</p>
                @endif
                <div class="course-meta">
                    <ul class="mon-black mon-big">
                        @if($storys->viewer)
                        <i class="fa fa-eye" aria-hidden="true" style="margin-right: 15px;"> {{ $storys->viewer }}</i>
                        @else
                        <i class="fa fa-eye" aria-hidden="true" style="margin-right: 15px;"> 0</i>
                        @endif 
                        <i class="fa fa-star" aria-hidden="true" style="margin-right: 15px;"> {{ $storys->rating }}</i> 
                        <i class="fa fa-th-list" aria-hidden="true"> {{$storys->partStories->count()}}</i>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div>
                    <label>Ulasan</label>
                    <p>{!! str_limit($storys->description, 320) !!}</a></p>
                </div>
                    <div class="user-comment">
                    @if($storys->commentLimits)
                    @if($storys->commentLimits->user->userProfil)
                        @if($storys->commentLimits->user->userProfil->foto_profile)
                        <img src="{{ asset('/images/foto_profile/'.$storys->commentLimits->user->userProfil->foto_profile)}}">
                        @else
                        <img src="{{ asset('/front/images/assets/logo-small.png')}}">
                        @endif
                        <span class="mr-20">{{$storys->commentLimits->user->name}}</span>
                    @endif
                    @endif
                    </div><br><br>
                    @if($storys->commentLimits)
                    <div>
                        <p>{{ str_limit($storys->commentLimits->text, 150) }} <a href="{{ url('/book-detail/'.$storys->id_story) }}">Read More</a></p>
                        <p>{{ date_format($storys->commentLimits->created_at,"d-M-Y H:i:s")}}</p>
                    </div>
                    @endif
                {{ Form::open(array('url' => '/form-comment', 'method' => 'post')) }}
                @if(Auth::check())
                <div>
                    <input type="hidden" name="id_story" value="{{$storys->id_story}}">
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
    <!-- End Modal Rekomendasi Kategori -->

    <!-- Modal Rekomendasi Populer -->
    @foreach($popular_stories as $key => $popular_story)
    <div id="{{{$popular_story->id_story}}}" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"> &times; </button>
            </div>
          <div class="row modal-body">
            <div class="col-md-4">
                @if($storys->cover_photo)
                <img src="{{URL::asset('images/story/thumbs/'.$popular_story->cover_photo)}}" class="img-cover-story-v3" style="width:100%;">
                @else
                <img src="{{URL::asset('front/images/bookCover.jpg')}}" class="img-cover-story-v3" style="width:90%;">
                @endif
                <a href="{{ url('/book-detail/'.$popular_story->id_story) }}"><button class="btn btn-baca2" value="Baca">Lihat Detail</button></a>
            </div>
            <div class="col-md-8 data-book">
                <span>{{ str_limit($popular_story->title, 20) }}</span>
                <p>{{ $popular_story->user->name }}</p>
                @if($popular_story->category)
                <p class="category-x">{{ $popular_story->category->name }}</p>
                @endif
                <div class="course-meta">
                    <ul class="mon-black mon-big">
                        @if($popular_story->viewer)
                        <i class="fa fa-eye" aria-hidden="true" style="margin-right: 15px;"> {{ $popular_story->viewer }}</i>
                        @else
                        <i class="fa fa-eye" aria-hidden="true" style="margin-right: 15px;"> 0</i>
                        @endif 
                        <i class="fa fa-star" aria-hidden="true" style="margin-right: 15px;"> {{ $popular_story->rating }}</i> 
                        <i class="fa fa-th-list" aria-hidden="true"> {{$popular_story->partStories->count()}}</i>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div>
                    <label>Ulasan</label>
                    <p>{!! str_limit($popular_story->description, 320) !!}</a></p>
                </div>
                    <div class="user-comment">
                    @if($popular_story->commentLimits)
                    @if($popular_story->commentLimits->user->userProfil)
                        @if($popular_story->commentLimits->user->userProfil->foto_profile)
                        <img src="{{ asset('/images/foto_profile/'.$popular_story->commentLimits->user->userProfil->foto_profile)}}">
                        @else
                        <img src="{{ asset('/front/images/assets/logo-small.png')}}">
                        @endif
                        <span class="mr-20">{{$popular_story->commentLimits->user->name}}</span>
                    @endif
                    @endif
                    </div><br><br>
                    @if($popular_story->commentLimits)
                    <div>
                        <p>{{ str_limit($popular_story->commentLimits->text, 150) }} <a href="{{ url('/book-detail/'.$popular_story->id_story) }}">Read More</a></p>
                        <p>{{ date_format($popular_story->commentLimits->created_at,"d-M-Y H:i:s")}}</p>
                    </div>
                    @endif
                {{ Form::open(array('url' => '/form-comment', 'method' => 'post')) }}
                @if(Auth::check())
                <div>
                    <input type="hidden" name="id_story" value="{{$popular_story->id_story}}">
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
    <!-- End Modal Rekomendasi Populer -->
    
@endsection
@section('js')
    <script type="text/javascript">
        $('.owl-kategori').slick({
        dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 6,
            slidesToScroll: 3,
            responsive: [
                {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 6,
                    slidesToScroll: 3,
                    dots: true
                }
                },
                {
                breakpoint: 600,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 2
                }
                },
                {
                breakpoint: 480,
                settings: {
                    slidesToShow:3,
                    slidesToScroll: 1
                }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    </script>

@endsection