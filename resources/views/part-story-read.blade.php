@extends('layouts.app')

@section('content')
<div id="content" class="site-content">
    <section id="course-about" class="course-section">
        <div class="single-course-title" style="background-color: #fff;">
          <div class="container">
            <div class="row">

              <div id="sidebar" class="sidebar col-md-3">
                <img src="/images/story/{{$partstory->cover_photo }}" alt="">
                <div class="socials">
                    <h3>{{ $partstory->title_stories }}</h3>
                    <!-- <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-instagram "></i></a></li>  -->
                </div><!-- .thumb -->
                <br>
                <i class="fa fa-eye" aria-hidden="true">  {{ $partstory->viewer }}</i>
                <div class="row">
                </div>

                <!-- <div class="selectbox" >
                  <select>
                    <option>Select Chapter/Part</option>
                    @foreach($part_stories as $i=>$part_stori)
                    <option value="Business" href="{{ url('/book-read/'.$part_stori->id_part_story) }}">{!! $part_stori->title !!}</option>
                    @endforeach
                  </select>
                </div> -->
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
                    <!-- <div class="dropdown">
                      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                        Select Part/Chapter
                        <span class="caret"></span>
                      </button>
                      <div class="dropdown-menu">
                        <ul>
                          <li><a href="{{ url('/book-read/') }}">HTML</a></li>
                        </ul>
                      <div>
                    </div> -->
                    <br>
                    <br>
                    <h2 class="post-title" align="center">{!! $partstory->title_part_stories !!}</h2>
                    <div class="post-info">
                      <div class="post-desc">
                        <p>{!! $partstory->story !!}</p>
                      </div><!-- .post-desc -->

                      <div class="entry-footer">
                        <div class="row">
                          <div class="col-md-7 col-sm-7 col-xs-7">
                            <span class="tags-links">Categories:
                              <a rel="tag" href="#">business</a>, 
                              <a rel="tag" href="#">biological</a>, 
                              <a rel="tag" href="#">e-book</a>
                            </span>
                          </div>

                          <div class="col-md-5 col-sm-5 col-xs-5">
                            <div class="single-share">
                              <span>Share:</span>
                              <div class="socials">
                                <ul>
                                  <li><a href="#" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
                                  <li><a href="#" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
                                  <li><a href="#" target="_blank"><i class="fa fa-google-plus-square"></i></a></li>
                                </ul>
                              </div>
                            </div><!-- .single-share -->
                          </div>
                        </div><!-- .row -->
                      </div>
                      <div class="comments-area" id="comments">
                        <div class="comment-respond" id="respond">
                          <h3 class="comment-reply-title" id="reply-title">Leave a reply</h3>
                          <p class="must-log-in">You must be logged in to post a comment.</p>
                          <form novalidate="" class="comment-form" id="commentform" method="post" action="#">
                            <p class="comment-form-author">
                                            <label for="author">Your Name:</label>
                                            <input id="author" name="author" type="text" value="" size="30">
                                          </p>
                            <p class="comment-form-comment">
                              <label for="comment">Your Comment:</label>
                              <textarea id="comment" name="comment" cols="45" rows="2" aria-required="true"></textarea>
                            </p>
                            <p class="form-submit">
                              <label for="submit">Submit</label>
                              <input name="submit" type="submit" id="submit" class="button medium primary rounded" value="Submit">
                            </p>
                          </form>
                        </div> <!-- #respond -->

                        <h3 class="comments-title">2 Comments</h3>
                        <ol class="comment-list">
                          <li class="comment">
                            <div class="comment-body">
                              <div class="comment-avatar">
                                <img class="avatar" src="images/placeholder/user1.jpg" alt="">
                              </div><!-- .comment-avatar -->
                              <header class="comment-meta">
                                <cite class="comment-author"><a href="#">Julia Anna</a></cite>
                                <span class="comment-date">- Feb 25, 2016</span>
                              </header><!-- .comment-meta -->
                              <div class="comment-content comment">
                                <p>Nunc risus ex, tempus quis purus ac, tempor consequat ex. Vivamus sem magna, maximus at est id, maximus aliquet nunc.</p>
                              </div> <!-- .comment-content -->
                            </div><!-- .comment-body -->
                          </li><!-- .comment -->

                          <li class="comment">
                            <div class="comment-body">
                              <div class="comment-avatar">
                                <img class="avatar" src="images/placeholder/user2.jpg" alt="">
                              </div><!-- .comment-avatar -->
                              <header class="comment-meta">
                                <cite class="comment-author"><a href="#">John Doe</a></cite>
                                <span class="comment-date">- Feb 22, 2016</span>
                              </header><!-- .comment-meta -->
                              <div class="comment-content comment">
                                <p>Quisque rhoncus turpis sit amet turpis faucibus, at condimentum ipsum aliquam. Morbi pulvinar lorem vitae magna dapibus ultrices.</p>
                              </div> <!-- .comment-content -->
                            </div><!-- .comment-body -->
                          </li><!-- .comment -->
                        </ol><!-- .comment-list -->
                      </div><!-- .comments-area -->
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
