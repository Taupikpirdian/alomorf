@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Masukan Mentor
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="{{URL::to('inkubasi-program-participant/index')}}">List Inkubator Participant</a></li>
    </ol>
  </section></br></br>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
      	{!! Form::model($inkubator_participant,['method'=>'put', 'files'=> 'true', 'action'=>['admin\InkubatorParticipantController@update',$inkubator_participant->id]]) !!}
          
          <div class='form-group clearfix'>
            {{ Form::label("pekerjaan", "Pekerjaan", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("pekerjaan", null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('pekerjaan')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("mentor_id", "Mentor", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::select("mentor_id", $mentor, null,['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('mentor_id')}}</span>
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