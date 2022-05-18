@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <section class="content-header">
    <h1>
      Edit User Profile
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
			<li class="active"><a href="{{URL::to('userprofile/index')}}">List User Profile</a></li>
    </ol>
  </section></br></br>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
      	{!! Form::model($userprofile,['files' => true, 'method'=>'put','action'=>['admin\UserProfileController@update',$userprofile->id_user_profile]]) !!}

          <div class='form-group clearfix'>
            {{ Form::label("nama_user", "Nama User", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("nama_user", $userprofile->name,['class' => 'form-control', 'disabled']) }}
                <span class="error">{{$errors->first('id_user')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("nomor_hp", "Nomor Hp", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("nomor_hp", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('nomor_hp')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("deskripsi", "Deskripsi", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::textarea("deskripsi", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('deskripsi')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("alamat", "Alamat", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::textarea("alamat", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('alamat')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("tanggal_lahir", "Tanggal Lahir", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text('date', $userprofile->tanggal_lahir, ['id' => 'datepicker']) }}
                <span class="error">{{$errors->first('tanggal_lahir')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("tempat_lahir", "Tempat Lahir", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text('tempat_lahir', $userprofile->tempat_lahir, ['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('tempat_lahir')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("sekolah", "Sekolah", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("sekolah", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('sekolah')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("kota", "Kota", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("kota", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('kota')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("foto_profile", "Photo", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::file("foto_profile") }}
                <span class="error">{{$errors->first('foto_profile')}}</span>
              </div>
          </div>
              
        <div class='form-group'>
        	<div class='col-md-4 col-md-offset-2'>
          	<button class='btn btn-primary' type='submit' name='save' id='save'><span class='glyphicon glyphicon-save'></span>Save</button>
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
  </script>


@endsection