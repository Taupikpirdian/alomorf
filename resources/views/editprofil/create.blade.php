@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <section class="content-header">
    <h1>
      Edit Profil
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('editprofil/index')}}">Edit Profil</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        {!! Form::open(['action' => 'editprofil\EditProfilController@store', 'files' => true]) !!}
         
          <div class='form-group clearfix'>
            {{ Form::label("nama", "Nama", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("nama", '',['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('nama')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("tanggal_lahir", "Tanggal Lahir", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text('date', '', ['id' => 'datepicker']) }}
                <span class="error">{{$errors->first('tanggal_lahir')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("sekolah", "Sekolah", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("sekolah", '',['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('sekolah')}}</span>
              </div>
          </div>

          <!-- <div class='form-group clearfix'>
            {{ Form::label("sekolah", "Sekolah", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                  {{ Form::text('date', '', ['id' => 'datepicker']) }}
                <span class="error">{{$errors->first('tgl_msk')}}</span>
              </div>
          </div> -->

          <div class='form-group clearfix'>
            {{ Form::label("kota", "Kota", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("kota", '',['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('kota')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("email", "Email", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("email", '',['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('email')}}</span>
              </div>
          </div>
            
            <div class='form-group clearfix'>
            {{ Form::label("tentang", "Tentang", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::textarea("tentang", '',['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('tentang')}}</span>
              </div>
          </div>

          <div class='form-group'>
            <div class='col-md-4 col-md-offset-2'>
              <button class='btn btn-primary' type='submit' name='save' id='save'><span class='glyphicon glyphicon-save'></span> Save</button>
            </div>
          </div>
        {!! Form::close() !!}    
      </div>
    </div>
  </section>

   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script>
     var route_prefix = "{{ url(config('lfm.prefix')) }}";
    </script>

    <!-- CKEditor init -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
    <script>
      $('textarea[name=ce]').ckeditor({
        height: 100,
        filebrowserImageBrowseUrl: route_prefix + '?type=Images',
        filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
        filebrowserBrowseUrl: route_prefix + '?type=Files',
        filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
      });
    </script>

    <script>
      {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
    </script>
    <script>
      $('#lfm').filemanager('image', {prefix: route_prefix});
    </script>


    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script>
  $(function() {
    $("#datepicker").datepicker({
      dateFormat: "yy-mm-dd",
      forceParse: false
    });
  });
   $(function() {
    $("#datepicker2").datepicker({
      dateFormat: "yy-mm-dd",
      forceParse: false
    });
  });
  </script>
@endsection