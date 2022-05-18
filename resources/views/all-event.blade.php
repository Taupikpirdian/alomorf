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
     <section class="fak-coy">
        <div class="container-fluid">
            <div class="col-md-12">
                <h4 class="title-catgrorie">Event Writing Contest</h4>
            </div>
            @foreach($events as $key => $event)
            <div class="col-md-6">
                <div class="content-news news-bg"  style=" background: url({{URL::asset('images/event/'.$event->image)}}">
                    <label class="meta-news-title">{{ $event->title }}</label>
                    <div class="meta-desc-news">
                        <p>{{ str_limit($event->description, 300) }}</p>
                    </div>
                    <div class="text-right">
                        <a href="{{ url('/detail-event/'.$event->id) }}" class="btn btn-learn">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

@endsection