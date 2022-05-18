<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  {!! Html::style('admin/css/bootstrap.min.css') !!}
  <!-- Font Awesome -->
  {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') !!}
  <!-- Ionicons -->
  {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') !!}
  <!-- Theme style -->
  {!! Html::style('admin/css/AdminLTE.min.css') !!}

  {!! Html::style('admin/css/_all-skins.min.css') !!}
  {!! Html::style('admin/css/_all-skins.min.css') !!}

  <!-- Font Awesome -->
  <!-- Ionicons -->
  <!-- Theme style -->
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <!-- Morris chart -->
  {!! Html::style('admin/bower_components/morris.js/morris.css') !!}
  <!-- jvectormap -->
  {!! Html::style('admin/bower_components/jvectormap/jquery-jvectormap.css') !!}
  <!-- Date Picker -->
  {!! Html::style('admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') !!}
  <!-- Daterange picker -->
  {!! Html::style('admin/bower_components/bootstrap-daterangepicker/daterangepicker.css') !!}
  <!-- bootstrap wysihtml5 - text editor -->
  {!! Html::style('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}

  <link rel="shortcut icon" type="{{URL::asset('front/images/assets/favicon.ico')}}" href="{{URL::asset('front/images/assets/favicon.png')}}" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> -->
                <p>
                  {{Auth::user()->name}}
                  <!-- <small>Member since Nov. 2012</small> -->
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="{{ url('/logout') }}" class="btn btn-default btn-flat"
                      onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                      Logout
                  </a>
                  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <br><!-- <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> -->
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      @if(Auth::user()->role_id == 1)
      <ul class="sidebar-menu">
        <li class="header">SETUP</li>
        <li class="treeview">
          <a href="{{URL::to('/category-news-feed/index')}}">
            <i class="fa fa-cogs"></i> <span>News Feed Category</span>
          </a>
        </li>
        <li class="treeview">
          <a href="{{URL::to('/category/index')}}">
            <i class="fa fa-cogs"></i> <span>Story Category</span>
          </a>
        </li>
        <li class="treeview">
          <a href="{{URL::to('/language/index')}}">
            <i class="fa fa-cogs"></i> <span>Story Languange</span>
          </a>
        </li>
        <li class="treeview">
          <a href="{{URL::to('/part_story_status/index')}}">
            <i class="fa fa-cogs"></i> <span>Status Posting</span>
          </a>
        </li>
      </ul>
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{URL::to('editprofil/index')}}"><i class="fa fa-circle-o"></i>List User</a></li>
            <li><a href="{{URL::to('userprofile/index')}}"><i class="fa fa-circle-o"></i>List User Profil</a></li>
            <li><a href="{{URL::to('/sliders/index')}}"><i class="fa fa-circle-o"></i>Slider</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-calendar"></i> <span>Event</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{URL::to('/event/index')}}"><i class="fa fa-circle-o"></i>Competition</a></li>
            <li><a href="{{URL::to('/inkubator/index')}}"><i class="fa fa-circle-o"></i>Inkubator</a></li>
            <li><a href="{{URL::to('/mentor/index')}}"><i class="fa fa-circle-o"></i>Mentor</a></li>
            <li><a href="{{URL::to('/part-writing-program/index')}}"><i class="fa fa-circle-o"></i>Part Writing Program</a></li>
            <li><a href="{{URL::to('/writing-program/index')}}"><i class="fa fa-circle-o"></i>Writing Program</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="{{URL::to('/newfeed/index')}}">
            <i class="fa fa-newspaper-o"></i> <span>News Feed</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Story</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{URL::to('/story/index')}}"><i class="fa fa-circle-o"></i>Story </a></li>
            <li><a href="{{URL::to('/story_rating/index')}}"><i class="fa fa-circle-o"></i>Story Rating</a></li>
            <!-- <li><a href="{{URL::to('/story_rating/index')}}"><i class="fa fa-circle-o"></i>Story Rating</a></li> -->
          </ul>
        </li>
      </ul>

      <ul class="sidebar-menu">
        <li class="header">PARTICIPANT</li>
        <li class="treeview">
          <a href="{{URL::to('/competition-participant/index')}}">
            <i class="fa fa-users"></i> <span>Competition</span>
          </a>
        </li>
        <li class="treeview">
          <a href="{{URL::to('/writing-program-participant/index')}}">
            <i class="fa fa-users"></i> <span>Writting Program</span>
          </a>
        </li>
        <li class="treeview">
          <a href="{{URL::to('/inkubasi-program-participant/index')}}">
            <i class="fa fa-users"></i> <span>Inkubasi</span>
          </a>
        </li>
      </ul>
      @endif
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @yield('content')

    <!-- Main content -->
  
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
{!! Html::script('admin/js/jquery-2.2.3.min.js') !!}
<!-- jQuery UI 1.11.4 -->
{!! Html::script('https://code.jquery.com/ui/1.11.4/jquery-ui.min.js') !!}
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
{!! Html::script('admin/js/bootstrap.min.js') !!}
<!-- Morris.js charts -->
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js') !!}
<!-- AdminLTE App -->
{!! Html::script('admin/js/app.min.js') !!}


{!! Html::script('admin/bower_components/morris.js/morris.min.js') !!}
<!-- Sparkline -->
{!! Html::script('admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') !!}
<!-- jvectormap -->
{!! Html::script('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}
{!! Html::script('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}
<!-- jQuery Knob Chart -->
{!! Html::script('admin/bower_components/jquery-knob/dist/jquery.knob.min.js') !!}
<!-- daterangepicker -->
{!! Html::script('admin/bower_components/moment/min/moment.min.js') !!}
{!! Html::script('admin/bower_components/bootstrap-daterangepicker/daterangepicker.js') !!}
<!-- datepicker -->
{!! Html::script('admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') !!}
<!-- Bootstrap WYSIHTML5 -->
{!! Html::script('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}
<!-- Slimscroll -->
{!! Html::script('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}
<!-- FastClick -->
{!! Html::script('admin/bower_components/fastclick/lib/fastclick.js') !!}
<!-- AdminLTE App -->
{!! Html::script('admin/dist/js/adminlte.min.js') !!}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{!! Html::script('admin/dist/js/pages/dashboard.js') !!}
<!-- AdminLTE for demo purposes -->
{!! Html::script('admin/dist/js/demo.js') !!}
</body>
</html>
