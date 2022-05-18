@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Story
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="{{URL::to('story/index')}}">List Story</a></li>
    </ol>
  </section></br></br>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        {!! Form::model($stories,['method'=>'put', 'files'=> 'true', 'action'=>['admin\StoryController@updateOnAdmin',$stories->id_story]]) !!}
          <div class='form-group clearfix'>
            {{ Form::label("title", "Title", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("title", null,['class' => 'form-control required', 'required' => 'required']) }}
                <span class="error">{{$errors->first('title')}}</span>
              </div>
          </div>

           <div class='form-group clearfix'>
            {{ Form::label("description", "Description", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::textarea("description", null,['class' => 'form-control required', 'required' => 'required']) }}
                <span class="error">{{$errors->first('description')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("id_language", "language", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::select("id_language", $languages, null,['class' => 'form-control required', 'required' => 'required']) }}
                <span class="error">{{$errors->first('id_language')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("id_category", "category", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::select("id_category", $categories, null,['class' => 'form-control required', 'required' => 'required']) }}
                <span class="error">{{$errors->first('id_category')}}</span>
              </div>
          </div>

          <div class="col-md-12 input-group mb-6">
            {{ Form::label("cover_photo", "Cover", ['class' => 'col-md-2 control-label']) }}
              {{ Form::file("cover_photo", ['class' => 'cover_photo']) }}
              <span>{{$errors->first('cover_photo')}}</span>
              <img src="{{ asset('/images/story/'.$stories->cover_photo)}}" style="max-height:100px;max-width:100px;margin-top:10px;">
          </div>
          <br>
              
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