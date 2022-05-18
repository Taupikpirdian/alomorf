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

<section>
    <div class="container-fluid" style="margin: 20px 0px;">
        <div class="col-md-11 col-md-offset-2">
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
        <h4 class="title-catgrorie">{{$category->name}}</h4>
        @foreach($newsfeeds as $key => $newsfeed)
        <div class="col-md-6 kreator-item">
           <div class="col-md-4 img-kreator">
                @if($newsfeed->photo)
                <img src="{{URL::asset('images/news-feed/'.$newsfeed->photo)}}">
                @else
                <img src="{{URL::asset('front/images/bookCover.jpg')}}" class="img-cover-story" style="width:90%;">
                @endif
           </div>
           <div class="col-md-8">
           		<div class="dest-kreator">
           			<label>{{ $newsfeed->title }}</label>
           			<p>{{ str_limit($newsfeed->description, 230) }}</p>
           		</div>
           		 <div class="text-left">
                    <a href="{{ url('/news-feeds/'.$newsfeed->id) }}" class="btn btn-learn">Selengkapnya</a>
                </div>
           </div>
        </div>
        @endforeach
    </div>
</section>

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
          ]
    });
</script>
@endsection
@endsection