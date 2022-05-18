@extends('layouts.app')
@section('content')

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
\
<section>
    <div class="container-fluid" style="margin: 20px 0px;">
        <div class="owl-slide-matp">
            @foreach($newsfeed_categories as $key => $newsfeed_category)
            <div class="item-slidemtp col-md-2 text-center">
                <a href='{{URL::action("HomeController@filterNewsFeed",array($newsfeed_category->id_category_news_feed))}}'>
                    <div class="bg-img-v2">
                         {{$newsfeed_category->name}}
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

 <section>
    <div class="container-fluid">
        <h4 class="title-catgrorie">Kreator</h4>
        @foreach($kreators as $key => $kreator)
        <div class="col-md-6 kreator-item">
           <div class="col-md-4 img-kreator">
                @if($kreator->photo)
                <img src="{{URL::asset('images/news-feed/'.$kreator->photo)}}">
                @else
                <img src="{{URL::asset('front/images/bookCover.jpg')}}" class="img-cover-story" style="width:90%;">
                @endif
           </div>
           <div class="col-md-8">
           		<div class="dest-kreator">
           			<label>{{ $kreator->title }}</label>
           			<p>{{ str_limit($kreator->description, 270) }}</p>
           		</div>
           		 <div class="text-left">
                    <a href="{{ url('/news-feeds/'.$kreator->id) }}" class="btn btn-learn">Selengkapnya</a>
                </div>
           </div>
        </div>
        @endforeach
    </div>
</section>

<section>
    <div class="container-fluid">
        <h4 class="title-catgrorie">Rekomendasi</h4>
        <div class="owl-kategori">
        @foreach($story_recomands as $key => $story_recomand)
            <div class="item-category">
                @if($story_recomand->cover_photo)
                <a href="#">
                    <img src="{{URL::asset('images/story/'.$story_recomand->cover_photo)}}" class="img-cover-story" style="width:90%;" data-toggle="modal" data-target="#{{{$story_recomand->id_story}}}">
                </a>
                @else
                <a href="{{ url('/book-detail/'.$story_recomand->id_story) }}">
                    <img src="{{URL::asset('front/images/bookCover.jpg')}}" class="img-cover-story" style="width:90%;" data-toggle="modal" data-target="#{{{$story_recomand->id_story}}}">
                </a>
                @endif
                <div class="course-author">
                    <a href="#"><p class="title-style" data-toggle="modal" data-target="#{{{$story_recomand->id_story}}}">{{ str_limit($story_recomand->title, 20) }}</p></a>
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
    <div class="container-fluid">
        <h4 class="title-catgrorie">Karya</h4>
        @foreach($karyas as $key => $karya)
        <div class="col-md-6 kreator-item">
           <div class="col-md-4 img-kreator">
                @if($karya->photo)
                <img src="{{URL::asset('images/news-feed/'.$karya->photo)}}">
                @else
                <img src="{{URL::asset('front/images/bookCover.jpg')}}" class="img-cover-story" style="width:90%;">
                @endif
           </div>
           <div class="col-md-8">
           		<div class="dest-kreator">
           			<label>{{ $karya->title }}</label>
           			<p>{{ str_limit($karya->description, 270) }}</p>
           		</div>
           		 <div class="text-left">
                    <a href="{{ url('/news-feeds/'.$karya->id) }}" class="btn btn-learn">Selengkapnya</a>
                </div>
           </div>
        </div>
        @endforeach
    </div>
</section>

<section>
    <div class="container-fluid">
        <h4 class="title-catgrorie">Kabar Terbaru</h4>
        @foreach($newsfeeds as $key => $newsfeed)
        <div class="col-md-6">
            <div class="content-news news-bg" style=" background: url({{URL::asset('images/news-feed/'.$newsfeed->photo)}}">
                <label class="meta-news-title">{{ $newsfeed->title }}</label>
                <div class="meta-desc-news">
                    <p>{{ str_limit($newsfeed->description, 270) }}</p>
                </div>
                <div class="text-right">
                    <a href="{{ url('/news-feeds/'.$newsfeed->id) }}" class="btn btn-learn">Learn More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>


 <section>
    <div class="container-fluid">
        <h4 class="title-catgrorie">Tips & Trick</h4>
        @foreach($tips_and_tricks as $key => $tips_and_trick)
        <div class="col-md-6 kreator-item">
           <div class="col-md-4 img-kreator">
                @if($tips_and_trick->photo)
                <img src="{{URL::asset('images/news-feed/'.$tips_and_trick->photo)}}">
                @else
                <img src="{{URL::asset('front/images/bookCover.jpg')}}" class="img-cover-story" style="width:90%;">
                @endif
           </div>
           <div class="col-md-8">
           		<div class="dest-kreator">
           			<label>{{ $tips_and_trick->title }}</label>
           			<p>{{ str_limit($tips_and_trick->description, 270) }}</p>
           		</div>
           		 <div class="text-left">
                    <a href="{{ url('/news-feeds/'.$tips_and_trick->id) }}" class="btn btn-learn">Selengkapnya</a>
                </div>
           </div>
        </div>
        @endforeach
    </div>
</section>

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
            <img src="{{URL::asset('images/story/'.$story_recomand->cover_photo)}}">
            @else
            <img src="{{URL::asset('front/images/bookCover.jpg')}}" class="img-cover-story-v3" style="width:90%;">
            @endif
            <a href="{{ url('/book-detail/'.$story_recomand->id_story) }}"><button class="btn btn-baca2" value="Baca">Lihat Detail</button></a>
        </div>
        <div class="col-md-8 data-book">
            <span>{{ str_limit($story_recomand->title, 20) }}</span>
            <p>{{ $story_recomand->user->name }}</p>
            <p class="category-x">{{ $story_recomand->category->name }}</p>
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
            @foreach($comments as $key => $comment)
                @if($comment->story_id == $story_recomand->id_story)
                @if($loop->index < 4)
                <div class="user-comment">
                @if($story_recomand->commentLimits->user->userProfil)
                    @if($story_recomand->commentLimits->user->userProfil->foto_profile)
                    <img src="{{ asset('/images/foto_profile/'.$story_recomand->commentLimits->user->userProfil->foto_profile)}}">
                    @else
                    <img src="front/images/assets/logo-small.png">
                    @endif
                @endif
                  <span class="mr-20">{{$comment->user->name}}</span>
                </div><br><br>
                <div>
                    <p>{{ str_limit($comment->text, 150) }} <a href="{{ url('/book-detail/'.$story_recomand->id_story) }}">Read More</a></p>
                    <p>{{ date_format($comment->created_at,"d-M-Y H:i:s")}}</p>
                </div>
                @endif
                @endif
            @endforeach
            {{ Form::open(array('url' => '/form-comment', 'method' => 'post')) }}
            @if(Auth::check())
            <div>
                <input type="hidden" name="id_story" value="{{$story_recomand->id_story}}">
                <textarea class="form-control" name="text" placeholder="Masukan komentar di sini"></textarea>
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
                slidesToShow: 3,
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