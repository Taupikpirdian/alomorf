@extends('layouts.app')

@section('content')
    <div id="content" class="site-content">
      <div class="container">
        <div class="row">
          <main id="main" class="site-main col-md-12">
            <div class="row">
            <div class="breadcrumb">
              <event class="col-md-12 post">
                <div class="inner-post">
                  <div class="post text-center">
                    <img src="/images/news-feed/{{$newfeed->photo}}" alt="" style="width: 28%;">
                  </div><!-- .post-thumb -->
                  <div class="post-info">
                    <h2 class="post-title">
                    {{ $newfeed->title }}
                    </h2>
                    <ul class="post-meta">
                      <li><a href="#"><i class="fa fa-clock-o"></i>{{ $newfeed->createdAtFormatIndo() }}</a></li>
                    </ul>
                    <div class="post-desc">
                    {!! $newfeed->text !!}
                    </div><!-- .post-desc -->
                  </div>
                </div>
              </article>
            </div>
          </main>
        </div>
      </div>
    </div>
@endsection