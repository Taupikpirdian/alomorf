@extends('layouts.app')
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="/front/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> -->
@section('content')
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.10&appId=109842439694033";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="content" class="site-content">
  <section id="course-about" class="course-section">
    <div class="single-course-title" style="background-color: #fff;">
        <div class="container">
          <div class="row">
            <div id="sidebar" class="sidebar col-md-3">
                <img src="/images/story/{{$story->partStory->cover_photo }}" alt="">
                <div class="summary col-md-9">
                <br>
                  <h3 class="p-title">{{ $story->partStory->title }}</h3>
                  <div class="p-meta">
                    <span class="p-cat"><i class="fa fa-eye" aria-hidden="true"> {{ $story->partStory->viewer }}</i></span>  
                  </div>
                </div>

                <div class="row">
                </div>

            </div>
            <main id="main" class="site-main col-md-9">
              <div class="row">
                <article class="col-md-12 post">
                  <div class="inner-post">
                    <div class="panel v2">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#section6">Part Stories</a>
                        </h4>
                      </div>
                      <div id="section6" class="panel-collapse collapse">
                        <div id="reviews">
                            <ol class="comment-list2">
                              @foreach($part_stories as $key => $part_story)
                              <li class="comment">
                                <div class="comment-body">
                                  <div class="comment-content comment">
                                    <a href="{{ url('book-read/'.$part_story->id_part_story) }}">
                                      {{ $part_story->title }}
                                    </a>
                                  </div> <!-- .comment-content -->
                                </div><!-- .comment-body -->
                              </li><!-- .comment -->
                              @endforeach
                            </ol><!-- .comment-list -->
                        </div><!-- #reviews -->
                      </div>
                    </div>
                    
                    <br>
                    <br>
                    <h2 class="post-title" align="center">{!! $story->title_part_stories !!}</h2>
                    <div class="post-info">
                      <div class="post-desc">
                        <p>{!! $story->story !!}</p>
                      </div><!-- .post-desc -->

                      <div class="entry-footer">
                        <div class="row">
                          <div class="col-md-7 col-sm-7 col-xs-7">
                            <span class="tags-links">Category:
                              {{ $story->partStory->category->name }} 
                            </span>
                          </div>

                          <div class="col-md-5 col-sm-5 col-xs-5">
                            <div class="single-share">
                              <!-- <span>Share:</span>
                              <div class="socials">
                                <ul>
                                  <li><a href="#" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
                                  <li><a href="#" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
                                  <li><a href="#" target="_blank"><i class="fa fa-google-plus-square"></i></a></li>
                                </ul>
                              </div> -->
                            </div><!-- .single-share -->
                          </div>
                        </div><!-- .row -->
                      </div>
                      <div class="tabs-container">
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
                        </div>
                        {{ Form::open(array('url' => '/form-comment-part-story', 'method' => 'post')) }}
                        <div>
                            <input type="hidden" name="id_part_story" value="{{$part_story->id_part_story}}">
                            <textarea class="form-control" rows="5" name="text">Komentar</textarea>
                        </div>
                        @if(Auth::check())
                            <button class="btn btn-baca">Submit</button>
                        @else
                        @endif
                        {!! Form::close() !!}
                      </div><!-- .tabs-container -->
                    </div><!-- .post-info -->
                  </div><!-- .inner-post -->
                </article>
              </div>
            </main><!-- .site-main -->
          </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .single-course-title -->
  </section><!-- #course-about -->
</div><!-- .site-content -->

@endsection