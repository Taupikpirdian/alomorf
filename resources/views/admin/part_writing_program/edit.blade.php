@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Edit Part Writing Program
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="{{URL::to('part-writing-program/index')}}">List Part Writing Program</a></li>
    </ol>
  </section></br></br>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
      	{!! Form::model($part_writing_program,['method'=>'put','action'=>['admin\PartWritingProgramController@update',$part_writing_program->id]]) !!}
          
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
            {{ Form::label("part", "Stage", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("part", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('part')}}</span>
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