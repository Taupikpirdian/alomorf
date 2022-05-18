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
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<section class="content-header">
	<h1>
	  	User
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active"><a href="{{URL::to('editprofil/index')}}">User</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
			{!! Form::open(['method'=>'GET','url'=>'searcheditprofil','role'=>'search'])  !!}
				<div class='form-group clearfix'>
					<div class='col-md-4'>
	                <div class="input-group custom-search-form">
	                  <input type="text" class="form-control" name="search" placeholder="Pencarian">
	                    <span class="input-group-btn">
	                    	<span class="input-group-btn">
		       					<button class="btn btn-default" type="submit"><i class="fa fa-search"></i> </button>
		     				</span>
	                    </span>
	                </div>
	             </div>
	          </div>
          	{!! Form::close() !!}
			</div>
				
			<div class='pull-right'>
				<a href="{{URL::to('userprofile/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i></a>
			</div><br>
			<div class="table-responsive pull-right" style="width: 100% !important">	
			<table class="table table-striped table-hover">
				<thead>
					<tr>
				       <th><b>No</b></th>
				       <th><b>Nama</b></th>
				       <th><b>Email</b></th>
				       <th><b>Password</b></th>
				       <th><b>Action</b></th>
					</tr>
				</thead>

				<tstatus>
				@foreach($editprofil as $i=>$editprofil)
			    	<tr>
						<td> {{ $i+1 }} </td>	         
						<td> {{ $editprofil->name}} </td>	         
						<td> {{ $editprofil->email }} </td>
						<td> {{ $editprofil->password }} </td>
						<td>
							<a title="edit" class="btn btn-warning btn-sm btn-sm" href='{{URL::action("editprofil\EditProfilController@edit",array($editprofil->id))}}'><i class="fa fa-edit fa-xs" style="color: white"></i></a> 
							<form title="destroy" class="btn btn-danger btn-sm" id="delete_editprofil{{$editprofil->id}}" action='{{URL::action("editprofil\EditProfilController@destroy",array($editprofil->id))}}' method="POST">
								<input type="hidden" name="_method" value="delete">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<a href="#" onclick="document.getElementById('delete_editprofil{{$editprofil->id}}').submit();"><i class="fa fa-trash fa-xs" style="color: white"></i></a>
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