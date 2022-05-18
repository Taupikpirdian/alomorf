@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      EDIT SLIDER
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="{{URL::to('group-sliders/index')}}">List</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
      	{!! Form::model($sliders,['files' => true, 'method'=>'put','action'=>['admin\SlidersController@update',$sliders->id]]) !!}
          <div class='form-group clearfix'>
            {{ Form::label("judul", "JUDUL", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("judul", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('judul')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("deskripsi", "DESKRIPSI", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::textarea("deskripsi", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('deskripsi')}}</span>
              </div>
          </div>

          <!-- <div class='form-group clearfix'>
            {{ Form::label("foto", "FOTO", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                  <div class="input-group">
                    <span class="input-group-btn">
                      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                        <i class="fa fa-picture-o"></i> Choose
                      </a>
                    </span>
                    <input id="thumbnail" class="form-control" type="text" name="foto">
                  </div>
                  <img id="holder" style="margin-top:15px;max-height:100px;">
                </div>
            </div> -->

          <div class='form-group clearfix'>
            {{ Form::label("foto", "Photo", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::file("foto") }}
                <span class="error">{{$errors->first('foto')}}</span>
              </div>
          </div>
            
          <div class='form-group clearfix'>
            {{ Form::label("order", "ORDER", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("order", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('order')}}</span>
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
@endsection