@extends('layouts.admin')
@section('content')

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <section class="content-header">
    <h1>
        Tambah News Feed
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      <li class="active"><a href="{{URL::to('newfeed/index')}}">List News Feed</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12"><br /><br />
        {!! Form::open(['action' => 'admin\NewFeedController@store', 'files' => true]) !!}
          
          <div class='form-group clearfix'>
            {{ Form::label("title", "Title", ['class' => 'col-md-2 control-label', 'required']) }}
              <div class='col-md-4'>
                {{ Form::text("title", '',['class' => 'form-control required', 'required']) }}
                <span class="error">{{$errors->first('title')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("description", "Description", ['class' => 'col-md-2 control-label', 'required']) }}
              <div class='col-md-4'>
                {{ Form::textarea("description", '',['class' => 'form-control required', 'required']) }}
                <span class="error">{{$errors->first('description')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("text", "Text", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-10'>
                {{ Form::textarea("text", '',['class' => 'col-md-12 ckeditor required', 'rows' => '60', 'required']) }}
                <span class="error">{{$errors->first('text')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("id_status_new_feed", "Status News Feed", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::select('id_status_new_feed', $status_news_feed, null,['class' => 'form-control required', 'placeholder' => 'Pilih Status News Feed', 'required']) }}
                <span class="error">{{$errors->first('id_status_new_feed')}}</span>
              </div>
          </div>          

          <div class='form-group clearfix'>
            {{ Form::label("id_category_news_feed", "Category News Feed", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::select('id_category_news_feed', $news_feed_categories, null,['class' => 'form-control required', 'placeholder' => 'Pilih Category News Feed', 'required']) }}
                <span class="error">{{$errors->first('id_category_news_feed')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("published_at", "Published", ['class' => 'col-md-2 control-label required']) }}
              <div class='col-md-4'>
                {{ Form::text('date', '', ['id' => 'datepicker', 'required']) }}
                <span class="error">{{$errors->first('published_at')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("photo", "photo", ['class' => 'col-md-2 control-label required']) }}
              <div class='col-md-4'>
                {{ Form::file('photo', ['class' => 'form-control required', 'required']) }}
                <span class="error">{{$errors->first('cover_photo')}}</span>
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
@endsection

