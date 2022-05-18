@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Story Rating
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="{{URL::to('story_rating/index')}}">List Story Rating</a></li>
    </ol>
  </section></br></br>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
      	{!! Form::model($story_ratings,['method'=>'put','action'=>['admin\StoryRatingController@update',$story_ratings->id]]) !!}
          
          <div class='form-group clearfix'>
            {{ Form::label("rating", "Rating", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("rating", null ,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('rating')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("id_story", "Story", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("id_story", null ,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('id_story')}}</span>
              </div>
          </div>

           <div class='form-group clearfix'>
            {{ Form::label("id_user", "user", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("id_user", null ,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('id_user')}}</span>
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
@endsection