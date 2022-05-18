@extends('layouts.admin')

@section('content')
@if ($message = Session::get('flash-success'))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{ $message }}</strong>
  </div>
@endif

@if ($message = Session::get('flash-update'))
  <div class="alert alert-info alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{ $message }}</strong>
  </div>
@endif

@if ($message = Session::get('flash-destroy'))
  <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{ $message }}</strong>
  </div>
@endif

<section class="content-header">
	<h1>
	  	Mentor
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="{{URL::to('mentor/index')}}">List Mentor</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
			<div class='pull-right'>
				<a title="create" href="{{URL::to('mentor/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i></a>
			</div><br>
			<div class="table-responsive pull-right" style="width: 100% !important">	
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>No.</th>
					       	<th><b>Nama</b></th>
					       	<th><b>Biodata</b></th>
					       	<th><b>Status</b></th>
					       	<th><b>Foto</b></th>
					       	<th class='text-center' style='width:150px'>Actions</th>
						</tr>
					</thead>

					<tstatus>
					   @foreach($mentors as $i=>$mentor)
					     	<tr>
					     	 <td>{{$i+1}}</td>
					         <td> {{ $mentor->name }} </td>
					         <td> {{ str_limit($mentor->biodata, 340) }}</td>
					         <td> {{ $mentor->status }} </td>
					         <td>
								<a class="img-responsive" target="_blank" href="#"> <img src="{{ asset('/images/mentors/'.$mentor->img)}}" style="max-height:100px;max-width:100px;margin-top:10px;">
							 </td>
					         <td>
								<a title="edit" class="btn btn-warning btn-sm btn-sm" href='{{URL::action("admin\MentorController@edit",array($mentor->id))}}'><i class="fa fa-edit fa-xs" style="color: white"></i></a>
								<a title="detail" class="btn btn-info btn-sm" href='{{URL::action("admin\MentorController@show",array($mentor->id))}}'><i class="fa fa-eye fa-xs"></i></a>
								<form class="btn btn-danger btn-sm" title="destroy" id="delete_mentor{{$mentor->id}}" action='{{URL::action("admin\MentorController@destroy",array($mentor->id))}}' method="POST">
								    <input type="hidden" name="_method" value="delete">
								    <input type="hidden" name="_token" value="{{ csrf_token() }}">
								    <a href="#" onclick="document.getElementById('delete_mentor{{$mentor->id}}').submit();"><i class="fa fa-trash fa-xs" style="color: white"></i></a>
								</form>
							</td>	         
					     	</tr>
						   @endforeach
					</tstatus>
				</table>
			</div>
		</div>
	</div>
</section>
@endsection