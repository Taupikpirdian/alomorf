@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Edit Mentor
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="{{URL::to('mentor/index')}}">List Mentor</a></li>
    </ol>
  </section></br></br>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
      	{!! Form::model($mentor,['method'=>'put', 'files'=> 'true', 'action'=>['admin\MentorController@update',$mentor->id]]) !!}
          
        <div class='form-group clearfix'>
            {{ Form::label("name", "Name", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("name", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('name')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("biodata", "Biodata", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::textarea("biodata", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('biodata')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("status", "Status", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::select('status', $status, null,['class' => 'form-control' , 'required','value'=>'' ,'placeholder' => 'Masukan Status']) }}
                <span class="error">{{$errors->first('order')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("img", "Image", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::file("img") }}
                <span class="error">{{$errors->first('img')}}</span>
                <a class="img-responsive" target="_blank" href="#"> <img src="{{ asset('/images/mentors/'.$mentor->img)}}" style="max-height:300px;max-width:300px;margin-top:10px;">
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