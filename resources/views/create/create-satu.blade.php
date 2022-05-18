@extends('layouts.app')

@section('content')

<section id=home-blog>
      <div id="creation-works-listing " class="container">
          <div class="row col-md-offset-2">
              <div class="col-md-9" align="center">
                  <header>
                      <div>
                          <h2>
                              <b>My Works</b>
                          </h2>
                          <br>
                      </div>
                  </header>
                  <div class="panel">
                      <div class="inner-post-1 col-md-12">
                      <center>
                        <img class="img-responsive" src="/front/images/buku-1.jpg">
                      </center>
                            <div class="no-works h3">
                                @if($count==0)
                                <div class="icon"><i class="fa fa-library" aria-hidden="true">Hi, {{ $user->name }}! You haven't written any stories yet.</i></div>
                                @else
                                @endif
                                <br>
                                
                                <div class="create-story">
                                  @if(Auth::user()->is_verified == 0)
                                  <a class="btn btn-danger" role="button">Email belum diverifikasi</a>
                                  @else
                                  <a href="{{ url('/create/create') }}" class="btn btn-primary" role="button" aria-label="Create a Story button.">+ Create a Story</a>
                                  @endif
                                </div>
                            </div>
                      </div>
                  </div>
              </div>
          </div><br>
          <div class="row col-md-offset-2">
            @foreach($story as $i=>$storys)
              <div class="col-md-9" style="padding-top:5px;">
                  <div class="course">
                    <div class="course-inner col-md-12 shadow" style="padding-top:15px;padding-bottom:15px;">
                      <div class="course-inner col-md-4">
                          <img src=/images/story/thumbs/{{$storys->cover_photo }} alt="" style="width:258px;height:210px;"">
                      </div>
                      <div class="course-inner col-md-8">
                        <span class="course-cat"><a href="#">KATEGORI {{ $storys->nama_category }}</a></span>  
                        <h3 class="course-title"><a href="{{ url('/book-id/'.$storys->id_story) }}">{{ $storys->title }}</a></h3>
                      <p>{!! str_limit($storys->description, 300) !!} </p>
                        <div class="course-author">
                          <!-- <a href="#"><img src="images/placeholder/user3.jpg" alt=""></a> -->
                          <!-- <span>by <a href="#">{{ $storys->nama_user }}</a></span> -->
                        </div><!-- .course-author -->
                        <div class="course-meta">
                          <ul>
                            <!-- <li>
                              <!-- <div class="star-rating">
                                <span style="width:80%"></span>
                              </div> -->
                            <!-- </li>
                            <li><i class="fa fa-users"></i> {{ $storys->viewer }}</li>
                            <li><a href="#"><i class="fa fa-comment"></i> 5</a></li> --> 
                          </ul>
                        </div><!-- .course-meta -->
                      </div><!-- .course-info -->
                    </div><!-- .course-inner -->
                  </div>
              </div> 
            @endforeach
          </div>
      </div>
</section>
@endsection