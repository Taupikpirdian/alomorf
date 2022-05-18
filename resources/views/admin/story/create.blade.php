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
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12"></br></br>
        {!! Form::open(['action' => 'admin\StoryController@store']) !!}
          
          <div class='form-group clearfix'>
            {{ Form::label("title", "Title", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("title", '',['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('title')}}</span>
              </div>
          </div>

           <div class='form-group clearfix'>
            {{ Form::label("description", "Description", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::textarea("description", '',['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('description')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("id_language", "id_language", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("id_language", '',['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('id_language')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("id_category", "id_category", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("id_category", '',['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('id_category')}}</span>
              </div>
          </div>

           <div class='form-group clearfix'>
            {{ Form::label("id_user", "user", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("id_user", '',['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('id_user')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("viewer", "Viewer", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("viewer", '',['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('viewer')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("rating", "Rating", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("rating", '',['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('rating')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("cover_photo", "Cover_photo", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("cover_photo", '',['class' => 'form-control required']) }}
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
@endsection