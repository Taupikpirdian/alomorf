<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ALOMORF</title>
    <!-- SEO -->
    <meta name="keywords" content="Alomorf, Baca Novel, Novel Terbaru, Program menulis buku, Writting Program,
Karya Novel, Kreator Novel, Tips dan Trik Menulis Buku, Rekomendasi Buku, Kabar terbaru, Competition Writting" />
    <!-- Style CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="front/style.css"> -->
    {!! Html::style('front/css/style.css') !!}
    <!-- Responsive CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="front/css/responsive.css"> -->
    <!-- Favicon -->
    {!! Html::style('front/css/responsive.css') !!}
    <link rel="shortcut icon" type="{{URL::asset('front/images/assets/favicon.ico')}}" href="{{URL::asset('front/images/logo.png')}}" />
    <!-- Add the slick-theme.css if you want default styling -->
    <!-- <link rel="stylesheet" type="text/css" href="front/css/slick.css"/> -->
    {!! Html::style('front/css/slick.css') !!}
    <!-- Add the slick-theme.css if you want default styling -->
    <!-- <link rel="stylesheet" type="text/css" href="front/css/slick-theme.css"/> -->
    {!! Html::style('front/css/slick-theme.css') !!}
    {!! Html::style('front/css/animate.css') !!}
    {!! Html::style('front/css/vendor/owl.carousel.css') !!}
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-104892497-1', 'auto');
      ga('send', 'pageview');

    </script>
</head>

<body class="home1">
    <div id="pageloader">
        <div class="pageloader">
            <div class="wow bounceInUp" data-wow-duration="10s">
                <img src="{{URL::asset('front/images/logo.jpg')}}"  style="width: 100px">
            </div>
            <div class="textedit">
                <span class="site-name">ALOMORF</span>
                <span class="site-tagline"></span>
            </div>  
        </div> 
    </div> 
    <div id="wrapper">
        <header id="header" class="site-header">
            <div class="mid-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-sm-8 col-xs-9">
                            <div class="site-brand">
                                <a class="logo" href="{{ url('/') }}">
                                <img src="{{URL::asset('front/images/logoweb.jpg')}}" alt="">
                                <!-- <li style="padding-bottom: 20px";> -->
                                    <!-- <img src="front\images/logo.png" alt="Universum"> -->
                                    <!-- <img src="#" alt=""> -->
                                </a>
                            </div><!-- .site-brand -->
                        </div>

                        <div class="col-md-10 col-sm-2 col-xs-3">
                            <nav class="main-menu" style="background-color: :#ffff00">
                                <span class="mobile-btn"><i class="fa fa-bars"></i></span>
                                <ul style="margin-right: 10px">
                                    <li class="{{ Request::is('/') ? 'current-menu-item' : '' }}"><a href="{{ url('/') }}">Home</a>
                                    </li>
                                    <li class="{{ Request::is('all-event') ? 'current-menu-item' : '' }}"><a href="{{ url('/all-event') }}">Competition</a></li>
                                    <li class="{{ Request::is('news-feed') ? 'current-menu-item' : '' }}"><a href="{{ url('/news-feed') }}">NEWS FEED</a>
                                    </li>
                                    <li class="{{ Request::is('writing-program') ? 'current-menu-item' : '' }}"><a href="{{ url('/writing-program') }}">WritingProgram</a></li>
   
                                    <li>
                                    {{ Form::open(array('url' => '/search-story', 'method' => 'post')) }}
                                       <div class="searchbox bor-search">
                                                <label>
                                                    <span class="screen-reader-text">Search for:</span>
                                                    <input type="search" class="search-field" placeholder="Search" name="search">
                                                </label>
                                                <input type="submit" class="search-submit" value="Search">
                                        </div>
                                    {!! Form::close() !!}    
                                    </li>
                                    @if(Auth::check())
                                        <li><a href="#">{{ Auth::user()->name }}</a>
                                            <ul class="sub-menu">
                                                <li class="{{ Request::is('create/create-satu/'.Auth::user()->id) ? 'current-menu-item' : '' }}">
                                                    <a href="{{ url('/create/create-satu/'.Auth::user()->id) }}">My Books</a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('/profil/'.Auth::user()->id) }}">My Profile</a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('/message-chat') }}">Message</a>
                                                </li>
                                                <li><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                            </ul>
                                        </li>
                                        
                                        <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;"> {{ csrf_field() }}
                                        </form>
                                    @else
                                        <li class="{{ Request::is('login') ? 'current-menu-item' : '' }}"><a href="{{ url('/login') }}"><b>LOGIN</b></a></li>
                                        <li class="{{ Request::is('login/') ? 'current-menu-item' : '' }}"><a href="{{ url('/register') }}"><b>SIGNUP</b></a></li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div><!-- .row -->
                </div><!-- .container -->
            </div><!-- .mid-header -->
        </header><!-- .site-header -->
        <div id="content" class="site-content">
        @if ($message = Session::get('flash-success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
        
        @if ($message = Session::get('flash-error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif

        @yield('content')
        </div>

        <div id="bottom" class="">
            <div class="container-fluid-nopad">
                    <div class="col-md-6 col-sm-6 img-footer text-center">
                    <a href="#">
                        <img src="{{URL::asset('front/images/yt.png')}}">
                    </a>
                    <a href="https://www.instagram.com/_alomorf/">
                        <img src="{{URL::asset('front/images/ig.png')}}" style="width: 50px;">
                    </a>
                    </div>

                    <div class="col-md-6 col-sm-6 copyrght text-center">
                        <div class="metadesct-ftr">
                            <p>Jalan Caladi No 18,</p>
                            <p>Bandung,</p>
                            <p>Jawa Barat</p>
                            <label>© 2017 Alomorf</label>
                        </div>
                    </div>
                </div>
        </div>

    <!-- jQuery -->    
    <!-- <script src="front/js/jquery-1.11.3.js"></script> -->
    {!! Html::script('front/css/bower_components/wow/dist/wow.js') !!}
    {!! Html::script('front/js/jquery-1.11.3.js') !!}
    <!-- Boostrap -->
    <!-- <script src="front/js/vendor/bootstrap.min.js"></script> -->
    {!! Html::script('front/js/vendor/bootstrap.min.js') !!}
    <!-- Jquery Parallax -->
    <!-- <script src="front/js/vendor/parallax.min.js"></script> -->
    {!! Html::script('front/js/vendor/parallax.min.js') !!}
    <!-- jQuery UI -->
    <!-- <script src="front/js/vendor/jquery-ui.min.js"></script> -->
    {!! Html::script('front/js/vendor/jquery-ui.min.js') !!}
    <!-- jQuery Sticky -->
    <!-- <script src="front/js/vendor/jquery.sticky.js"></script> -->
    {!! Html::script('front/js/vendor/jquery.sticky.js') !!}
    <!-- OWL CAROUSEL Slider -->    
    <!-- <script src="front/js/vendor/owl.carousel.js"></script> -->
    {!! Html::script('front/js/vendor/owl.carousel.js') !!}
    <!-- PrettyPhoto -->   
    <!-- <script src="front/js/vendor/jquery.prettyPhoto.js"></script> -->
    {!! Html::script('front/js/vendor/jquery.prettyPhoto.js') !!}
    <!-- Jquery Isotope -->
    <!-- <script src="front/js/vendor/isotope.pkgd.min.js"></script> -->
    {!! Html::script('front/js/vendor/isotope.pkgd.min.js') !!}
    <!-- Main -->    
    <!-- <script src="front/js/main.js"></script> -->
    {!! Html::script('front/js/main.js') !!}
    {!! Html::script('front/js/slick.min.js') !!}

    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    @yield('js')

    <script type="text/javascript">
        $('.owl-slide-matp').slick({
          dots: true,
              infinite: false,
              speed: 300,
              slidesToShow: 6,
              slidesToScroll: 3,
                autoplay: true,
                autoplaySpeed: 9000,
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
                    slidesToShow: 2,
                    slidesToScroll: 2
                  }
                },
                {
                  breakpoint: 480,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
              ]
        });
    </script>
    <script>
        $(document).ready(function(){
            console.log("opik")
          $("#Program").click(function(){
            $("#inkubasi").hide();
            $("#prognov").show();
            $("#inkubasi-komentar").hide();
            $("#prognov-komentar").show();
          });
          $("#Inkubasi").click(function(){
            $("#inkubasi").show();
            $("#prognov").hide();
            $("#inkubasi-komentar").show();
            $("#prognov-komentar").hide();
          });
        });
        $(document).ready(function(){
          $('#Program').trigger('click');
        });
        $(document).ready(function(){
          $("#Program").click(function(){
            $(".Program").removeClass("btn-writing-v2");
            $(".Inkubasi").removeClass("btn-writing-v1");
            $(".Program").addClass("btn-writing-v1");
            $(".Inkubasi").addClass("btn-writing-v2");
          })
        });
        $(document).ready(function(){
          $("#Inkubasi").click(function(){
            $(".Program").removeClass("btn-writing-v1");
            $(".Inkubasi").removeClass("btn-writing-v2");
            $(".Program").addClass("btn-writing-v2");
            $(".Inkubasi").addClass("btn-writing-v1");
          })
        });
    </script>

    <script type="text/javascript">

     

    </script>

    
    <!-- <script type="text/javascript">
      $('textarea').keyup(function (event) {
       if (event.keyCode == 13 && event.shiftKey) {
                   var content = this.value;
                   var caret = getCaret(this);
                   this.value = content.substring(0,caret)+"\n"+content.substring(carent,content.length-1);
                   event.stopPropagation();
                   
              }else if(event.keyCode == 13)
              {
                  $('form').submit();
              }
        });
        function getCaret(el) { 
          if (el.selectionStart) { 
            return el.selectionStart; 
          } else if (document.selection) { 
            el.focus(); 

            var r = document.selection.createRange(); 
            if (r == null) { 
              return 0; 
            } 

            var re = el.createTextRange(), 
                rc = re.duplicate(); 
            re.moveToBookmark(r.getBookmark()); 
            rc.setEndPoint('EndToStart', re); 

            return rc.text.length; 
          }  
          return 0; 
        }
    </script> -->

    
    
    

</body>
</html>