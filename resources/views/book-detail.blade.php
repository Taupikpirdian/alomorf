 @extends('layouts.app')
@section('content')
  {!! Html::style('front/css/rating.css') !!}

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.10&appId=109842439694033";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

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


<div id="content" class="site-content shop-content desc-writ-prog">
	<div class="container">
		<div class="row">
			<main id="main" class="site-main col-md-12">
				<div class="product-detail row">
          <div class="images">
            <div id="p-preview">
              <div class="slider">
                <div class="item">
                  <a href="/images/story/{{$story->cover_photo }}" data-gal="prettyPhoto[p-gal1]">
                    <img src="/images/story/{{$story->cover_photo }}" alt="" style="width: 100%" />
                  </a>
                </div>

                <div class="item">
                  <a href="/images/story/{{$story->cover_photo }}" data-gal="prettyPhoto[p-gal1]">
                    <img src="/images/story/{{$story->cover_photo }}" alt="" style="width: 100%"/>
                  </a>
                </div>

                <div class="item">
                  <a href="/images/story/{{$story->cover_photo }}" data-gal="prettyPhoto[p-gal1]">
                    <img src="/images/story/{{$story->cover_photo }}" alt="" style="width: 100%"/>
                  </a>
                </div>

                <div class="item">
                  <a href="/images/story/{{$story->cover_photo }}" data-gal="prettyPhoto[p-gal1]">
                    <img src="/images/story/{{$story->cover_photo }}" alt="" style="width: 100%" />
                  </a>
                </div>
              </div><!-- .slider -->
            </div><!-- #p-preview -->
            <!-- Masih blm betul -->
            @if(Auth::check())
                @if(($rating))
                <br>
                <div style="line-height:12px;">
                  <center><b>Your review</b></center><br>
                </div>
                <div class="col-md-12 text-center">
                    @if($rating->rating == 1)
                    <label>
                      <span style="color:#FFD700;" class="icon">★</span>
                      <span style="color:#C0C0C0;" class="icon">★</span>
                      <span style="color:#C0C0C0;" class="icon">★</span>
                      <span style="color:#C0C0C0;" class="icon">★</span>
                      <span style="color:#C0C0C0;" class="icon">★</span>
                    </label>
                    @endif
                    @if($rating->rating == 2)
                    <label>
                      <span style="color:#FFD700;" class="icon">★</span>
                      <span style="color:#FFD700;" class="icon">★</span>
                      <span style="color:#C0C0C0;" class="icon">★</span>
                      <span style="color:#C0C0C0;" class="icon">★</span>
                      <span style="color:#C0C0C0;" class="icon">★</span>
                    </label>
                    @endif
                    @if($rating->rating == 3)
                    <label>
                      <span style="color:#FFD700;" class="icon">★</span>
                      <span style="color:#FFD700;" class="icon">★</span>
                      <span style="color:#FFD700;" class="icon">★</span>
                      <span style="color:#C0C0C0;" class="icon">★</span>
                      <span style="color:#C0C0C0;" class="icon">★</span>
                    </label>
                    @endif
                    @if($rating->rating == 4)
                    <label>
                      <span style="color:#FFD700;" class="icon">★</span>
                      <span style="color:#FFD700;" class="icon">★</span>
                      <span style="color:#FFD700;" class="icon">★</span>
                      <span style="color:#FFD700;" class="icon">★</span>
                      <span style="color:#C0C0C0;" class="icon">★</span>
                    </label>
                    @endif
                    @if($rating->rating == 5)
                    <label>
                      <span style="color:#FFD700;" class="icon">★</span>
                      <span style="color:#FFD700;" class="icon">★</span>
                      <span style="color:#FFD700;" class="icon">★</span>
                      <span style="color:#FFD700;" class="icon">★</span>
                      <span style="color:#FFD700;" class="icon">★</span>
                    </label>
                    @endif
                  <br>
                </div>
                @else
                <br>
                <div style="line-height:12px;">
                  <center><b>Rate this story</b></center><br>
                  <center>Tell others what you think</center>
                </div>
                <div class="col-md-12 text-center">
                  <form id="form" action=" {!! action('HomeController@rating',$story->id_story) !!}" method="POST">
                    {{ csrf_field() }}
                    <fieldset class="stars">
                      <input type="radio" name="stars" id="star1" value="5" ontouchstart="ontouchstart"/>
                      <label class="fa fa-star" for="star1"></label>
                      <input type="radio" name="stars" id="star2" value="4" ontouchstart="ontouchstart"/>
                      <label class="fa fa-star" for="star2"></label>
                      <input type="radio" name="stars" id="star3" value="3" ontouchstart="ontouchstart"/>
                      <label class="fa fa-star" for="star3"></label>
                      <input type="radio" name="stars" id="star4" value="2" ontouchstart="ontouchstart"/>
                      <label class="fa fa-star" for="star4"></label>
                      <input type="radio" name="stars" id="star5" value="1" ontouchstart="ontouchstart"/>
                      <label class="fa fa-star" for="star5"></label>
                      <input type="radio" name="stars" id="star-reset"/>
                      <!-- <label type="submit" class="reset" for="star-reset">reset</label> -->
                      <!-- <button class="reset">Submit Ratting</button> -->
                      <!-- <figure class="face"><i></i><i></i> -->
                        <!-- <u>
                          <div class="cover"></div>
                        </u>
                      </figure> -->
                    </fieldset>
                    <button class="btn btn-baca2" id="this-rating" style="position: absolute; top: 50px;">Submit Ratting</button>
                  </form>
                  <!-- {!! Form::model($story,['method'=>'post','action'=>['HomeController@rating',$story->id_story], 'class' => 'rating']) !!}
                    <label>
                      <input type="radio" name="stars" value="1" required/>
                      <span class="icon">★</span>
                    </label>
                    <label>
                      <input type="radio" name="stars" value="2" required/>
                      <span class="icon">★</span>
                      <span class="icon">★</span>
                    </label>
                    <label>
                      <input type="radio" name="stars" value="3" required/>
                      <span class="icon">★</span>
                      <span class="icon">★</span>
                      <span class="icon">★</span>   
                    </label>
                    <label>
                      <input type="radio" name="stars" value="4" required/>
                      <span class="icon">★</span>
                      <span class="icon">★</span>
                      <span class="icon">★</span>
                      <span class="icon">★</span>
                    </label>
                    <label>
                      <input type="radio" name="stars" value="5" required/>
                      <span class="icon">★</span>
                      <span class="icon">★</span>
                      <span class="icon">★</span>
                      <span class="icon">★</span>
                      <span class="icon">★</span>
                    </label>
                    <br>
                  <button class="btn btn-baca2" id="this-rating">Submit Ratting</button>
                  {!! Form::close() !!}   -->  
                </div>
                @endif
            @else
              @if(($rating))
                <br>

                @if($rating->rating > 1)
                <div style="line-height:12px;">
                  <center><b>Your review</b></center><br>
                </div>
                @else
                <div style="line-height:12px;">
                  <center><b>Tidak ada rating</b></center><br>
                </div>
                @endif
                <div class="col-md-12 text-center">
                  @if($rating->rating == 1)
                  <label>
                    <span style="color:#FFD700;" class="icon">★</span>
                    <span style="color:#C0C0C0;" class="icon">★</span>
                    <span style="color:#C0C0C0;" class="icon">★</span>
                    <span style="color:#C0C0C0;" class="icon">★</span>
                    <span style="color:#C0C0C0;" class="icon">★</span>
                  </label>
                  @endif
                  @if($rating->rating == 2)
                  <label>
                    <span style="color:#FFD700;" class="icon">★</span>
                    <span style="color:#FFD700;" class="icon">★</span>
                    <span style="color:#C0C0C0;" class="icon">★</span>
                    <span style="color:#C0C0C0;" class="icon">★</span>
                    <span style="color:#C0C0C0;" class="icon">★</span>
                  </label>
                  @endif
                  @if($rating->rating == 3)
                  <label>
                    <span style="color:#FFD700;" class="icon">★</span>
                    <span style="color:#FFD700;" class="icon">★</span>
                    <span style="color:#FFD700;" class="icon">★</span>
                    <span style="color:#C0C0C0;" class="icon">★</span>
                    <span style="color:#C0C0C0;" class="icon">★</span>
                  </label>
                  @endif
                  @if($rating->rating == 4)
                  <label>
                    <span style="color:#FFD700;" class="icon">★</span>
                    <span style="color:#FFD700;" class="icon">★</span>
                    <span style="color:#FFD700;" class="icon">★</span>
                    <span style="color:#FFD700;" class="icon">★</span>
                    <span style="color:#C0C0C0;" class="icon">★</span>
                  </label>
                  @endif
                  @if($rating->rating == 5)
                  <label>
                    <span style="color:#FFD700;" class="icon">★</span>
                    <span style="color:#FFD700;" class="icon">★</span>
                    <span style="color:#FFD700;" class="icon">★</span>
                    <span style="color:#FFD700;" class="icon">★</span>
                    <span style="color:#FFD700;" class="icon">★</span>
                  </label>
                  @endif
                <br>
                </div>
              @endif
            @endif
          </div><!-- .images -->

					<div class="summary col-md-9">
						<h1 class="p-title">{{ $story->title }}</h1>
						<div class="p-meta">
							<span class="p-cat">by <a href="#">{{ $story->user->name }}</a></span>	
						</div>
						<div class="p-desc">
						  <p>{!! $story->description !!} </p>
						</div><!-- .p-desc -->
            <div class="course-meta">
              <ul>
                <li>
                  <a href="#"><i class="fa fa-eye" aria-hidden="true"> {{ $story->viewer }}</i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-star" aria-hidden="true"> {{ $story->rating }}</i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-list" aria-hidden="true"> {{$story->partStories->count()}}</i></a>
                </li>
              </ul>
            </div><!-- .p-rating -->
            <br>
              @if($partstory)
                {{ Form::open(array('url' => '/view/story', 'method' => 'post')) }}
                  <input type="hidden" name="id_part_story" value="{{$partstory->id_part_story}}">
                  <input type="hidden" name="id_story" value="{{$story->id_story}}">
                  <input class="button rounded primary add-to-cart-button" type="submit" value="Baca"><i class="#"></i>
                {!! Form::close() !!}    
              @else
                <a class="button rounded primary add-to-cart-button" href=""><i class="#"></i> This story doesn't have part story</a>
              @endif
               

						<form class="cart" method="post" enctype="multipart/form-data">	 	
							<div class="product_meta">
								<!-- <span class="tags">Tags: <a href="#">business</a>, <a href="#">biological</a>, <a href="#">e-book</a></span> -->
								<!-- <span class="sku_wrapper">SKU: <span class="sku">B01</span></span> -->
							</div>
						</form>								
					</div>
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
                        @if($comment->user->userProfil->foto_profile)
                        <img src="{{ asset('/images/foto_profile/'.$comment->user->userProfil->foto_profile)}}">
                        @else
                        <img src="{{ asset('/front/images/assets/logo-small.png')}}">
                        @endif
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
        {{ Form::open(array('url' => '/form-comment-story-home', 'method' => 'post')) }}
        <div>
            <input type="hidden" name="id_story" value="{{$story->id_story}}">
            <textarea class="form-control" rows="5" name="text" placeholder="Tulis komentar disini"></textarea>
        </div>
        @if(Auth::check())
            <button class="btn btn-baca">Submit</button>
            <button class="btn btn-baca" data-dismiss="modal">Close</button>
        @else
        @endif
        {!! Form::close() !!}
			</main>
		</div>
	</div>
	<hr>

</div>

<script type="text/javascript">
    function Copy() {
      var Url = document.getElementById("url");
      Url.innerHTML = window.location.href;
      console.log(Url.innerHTML)
      Url.select();
      document.execCommand("copy");
    }
</script>

<script type="text/javascript">
    $(':radio').change(function() {
      console.log('New star rating: ' + this.value);
    });
</script>
<script type="text/javascript">
/*$(document).ready(function(){
    $("#submit-rating").on('click',function(){
       $('#this-rating').trigger("click");
    });
  });*/
  $(document).ready(function(){
   $('#submit-rating').click(function(e) {
      console.log("eheheh");
       /* $('.notifSalahEmail').hide();
        e.preventDefault();
        var email = $('.email').val();

        $.get('/cek-email-user?email='+email, function(data){
            console.log("ada email : "+data);
            if (data) {
                $(".login").submit();
            }else{
                $('.notifSalahEmail').show();
            }
        });*/

    });
</script>
@endsection
