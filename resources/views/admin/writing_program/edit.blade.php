@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Edit Content Writing Program
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="{{URL::to('writing-program/index')}}">List Content Writing Program</a></li>
    </ol>
  </section></br></br>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
      	{!! Form::model($writing_program,['method'=>'put', 'files'=> 'true', 'action'=>['admin\WritingProgramController@update',$writing_program->id]]) !!}
          
          <div class='form-group clearfix'>
            {{ Form::label("title", "Title", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("title", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('title')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("desc", "Description", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::textarea("desc", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('desc')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("order", "Order", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("order", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('order')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("img", "Image", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::file("img") }}
                <span class="error">{{$errors->first('img')}}</span>
                <a class="img-responsive" target="_blank" href="#"> <img src="{{ asset('/images/content-writing-program/'.$writing_program->img)}}" style="max-height:300px;max-width:300px;margin-top:10px;">
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