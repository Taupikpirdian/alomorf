@extends('layouts.admin')
@section('content')

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

  <section class="content-header">
    <h1>
      Edit Event
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
			<li class="active"><a href="{{URL::to('event/index')}}">List Event</a></li>
    </ol>
  </section></br></br>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
      	{!! Form::model($event,['files' => true, 'method'=>'put','action'=>['admin\EventController@update',$event->id]]) !!}

          <div class='form-group clearfix'>
            {{ Form::label("title", "Title", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("title", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('title')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("start", "Start", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("start", null,['class' => 'form-control required', 'id' => 'datepicker']) }}
                <span class="error">{{$errors->first('start')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("end", "End", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("end", null,['class' => 'form-control required', 'id' => 'datepicker2']) }}
                <span class="error">{{$errors->first('end')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("address", "Address", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::textarea("address", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('address')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("theme", "Theme", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("theme", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('theme')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("description", "Description", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::textarea("description", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('description')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("text", "Detail", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-10'>
                {{ Form::textarea("text", null,['class' => 'form-control ckeditor required']) }}
                <span class="error">{{$errors->first('text')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("image", "Image", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::file("image") }}
                <span class="error">{{$errors->first('image')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
              <div class='col-md-4'>
                <img src="{{ asset('/images/event/'.$event->image)}}">
                <span class="error">{{$errors->first('image')}}</span>
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

  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
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

<script>
  $(function() {
    $("#datepicker2").datepicker({
      dateFormat: "yy-mm-dd",
      forceParse: false
    });
  });
  </script>
@endsection