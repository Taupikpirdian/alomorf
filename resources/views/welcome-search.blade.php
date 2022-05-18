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
    <br>
    <section>
        <div class="container-fluid">
            <h4 class="title-catgrorie">Hasil pencarian: {{$search}}</h4>
            <div class="owl-kategori">
            @foreach($stories as $key => $story)
                <div class="item-category">
                    @if($story->cover_photo)
                    <a href="#">
                        <img src="{{URL::asset('images/story/'.$story->cover_photo)}}" class="img-cover-story" style="width:90%;" data-toggle="modal" data-target="#{{{$story->id_story}}}">
                    </a>
                    @else
                    <a href="#">
                        <img src="{{URL::asset('front/images/bookCover.jpg')}}" class="img-cover-story" style="width:90%;" data-toggle="modal" data-target="#{{{$story->id_story}}}">
                    </a>
                    @endif
                    <div class="course-author">
                        <a href="{{ url('/book-detail/'.$story->id_story) }}"><p class="title-style">{{ str_limit($story->title, 20) }}</p></a>
                        <h6>{{ $story->user->name }}</h6>
                    </div>
                    <div class="course-meta">
                        <ul class="mon-black">
                            @if($story->viewer)
                            <i class="fa fa-eye" aria-hidden="true" style="margin-right: 15px;"> {{ $story->viewer }}</i>
                            @else
                            <i class="fa fa-eye" aria-hidden="true" style="margin-right: 15px;"> 0</i>
                            @endif 
                            <i class="fa fa-star" aria-hidden="true" style="margin-right: 15px;"> {{ $story->rating }}</i> 
                            <i class="fa fa-th-list" aria-hidden="true"> {{$story->partStories->count()}}</i>
                        </ul>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </section>

    <div class="clearfix">
    </div>

    <!-- Modal Rekomendasi Search -->
    @foreach($stories as $key => $story)
    <div id="{{{$story->id_story}}}" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="row modal-body">
            <div class="col-md-4">
                @if($story->cover_photo)
                <img src="{{URL::asset('images/story/'.$story->cover_photo)}}">
                @else
                <img src="{{URL::asset('front/images/bookCover.jpg')}}" class="img-cover-story-v3" style="width:90%;">
                @endif
                <a href="{{ url('/book-detail/'.$story->id_story) }}"><button class="btn btn-baca2" value="Baca">Lihat Detail</button></a>
            </div>
            <div class="col-md-8 data-book">
                <span>{{ str_limit($story->title, 20) }}</span>
                <p>{{ $story->user->name }}</p>
                @if($story->category)
                <p class="category-x">{{ $story->category->name }}</p>
                @endif
                <div class="course-meta">
                    <ul class="mon-black">
                        @if($story->viewer)
                        <i class="fa fa-eye" aria-hidden="true" style="margin-right: 15px;"> {{ $story->viewer }}</i>
                        @else
                        <i class="fa fa-eye" aria-hidden="true" style="margin-right: 15px;"> 0</i>
                        @endif 
                        <i class="fa fa-star" aria-hidden="true" style="margin-right: 15px;"> {{ $story->rating }}</i> 
                        <i class="fa fa-th-list" aria-hidden="true"> {{$story->partStories->count()}}</i>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div>
                    <label>Ulasan</label>
                    <p>{!! str_limit($story->description, 320) !!}</a></p>
                </div>
                @foreach($comments as $key => $comment)
                @if($comment->story_id == $story->id_story)
                    @if($loop->index < 4)
                    <div class="user-comment">
                        <img src="front/images/assets/logo-small.png">
                        <span class="mr-20">{{$comment->user->name}}</span>
                    </div><br><br>
                    <div>
                        <p>{{ str_limit($comment->text, 150) }} <a href="{{ url('/book-detail/'.$story->id_story) }}">Read More</a></p>
                        <p>{{ date_format($comment->created_at,"d-M-Y H:i:s")}}</p>
                    </div>
                    @endif
                    @endif
                @endforeach
                {{ Form::open(array('url' => '/form-comment', 'method' => 'post')) }}
                <div>
                    <input type="hidden" name="id_story" value="{{$story->id_story}}">
                    <textarea class="form-control" name="text">Komentar</textarea>
                </div>
                @if(Auth::check())
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
                slidesToShow: 3,
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