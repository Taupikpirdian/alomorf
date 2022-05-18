@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <section class="content-header">
    <h1>
      Edit News Feed
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
			<li class="active"><a href="{{URL::to('newfeed/index')}}">List News Feed</a></li>
    </ol>
  </section></br></br>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
      	{!! Form::model($newfeed,['method'=>'put', 'files' => 'true', 'action'=>['admin\NewFeedController@update',$newfeed->id]]) !!}

          <div class='form-group clearfix'>
            {{ Form::label("title", "Title", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("title", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('title')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("description", "Description", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::textarea("description", $newfeed->description,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('description')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("text", "Text", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-10'>
                {{ Form::textarea("text", $newfeed->text,['class' => 'col-md-12 ckeditor required', 'rows' => '60']) }}
                <span class="error">{{$errors->first('text')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("id_status_new_feed", "Status News Feed", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::select('id_status_new_feed', $status_news_feed, null,['class' => 'form-control required', 'placeholder' => 'Pilih Status News Feed']) }}
                <span class="error">{{$errors->first('id_status_new_feed')}}</span>
              </div>
          </div> 

          <div class='form-group clearfix'>
            {{ Form::label("id_category_news_feed", "Category News Feed", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::select('id_category_news_feed', $news_feed_categories, null,['class' => 'form-control required', 'placeholder' => 'Pilih Category News Feed']) }}
                <span class="error">{{$errors->first('id_category_news_feed')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("published_at", "Published", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text('date', $newfeed->published_at, ['id' => 'datepicker']) }}
                <span class="error">{{$errors->first('published_at')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("photo", "Current Photo", ['class' => 'col-md-2 control-label required']) }}
              <div class='col-md-4'>
                <img src="/images/news-feed/thumbs/{{$newfeed->photo}}" alt="$newfeed->title" width="100%" height="256" class="cover cover-xlg edit-cover">
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("photo", "photo", ['class' => 'col-md-2 control-label required']) }}
              <div class='col-md-4'>
                {{ Form::file('photo', ['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('cover_photo')}}</span>
              </div>
          </div>
              
        <div class='form-group'>
        	<div class='col-md-4 col-md-offset-2'>
            <button class='btn btn-primary' type='submit' name='save' id='save'><i class="fa fa-floppy-o"> Save</i></button>
          </div>
          <div class='col-md-4 col-md-offset-2'>
          	<a href="{{ url('newfeed/index') }}" class='btn btn-danger'><i class="fa fa-close"> Cancel</i></a>
        	</div>
      	</div>
      {!! Form::close() !!}
    	</div>
  	</div>
	</section>

  
  <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>


  <!-- CKEditor init -->
  <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script> -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>

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