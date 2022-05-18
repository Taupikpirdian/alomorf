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
      SLIDER
    </h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="{{URL::to('/user-groups/index')}}">List User Groups</a></li>
    </ol>
  </section>
	<section class="content">
	  <div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'searchsliders','role'=>'search'])  !!}
				<div class='form-group clearfix'>
					<div class='col-md-4'>
	                <div class="input-group custom-search-form">
	                  <input type="text" class="form-control" name="search" placeholder="Search...">
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
					<a title="create" href="{{URL::to('/sliders/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> </a>
				</div>
				<br>
				<div class="table-responsive pull-right" style="width: 100% !important">
					<table class="table table-striped table-hover">
					<thead>
					   <tr>
					   <th>NO</th>
				       <th><b>TITLE</b></th>
				       <th><b>DESCRIPTION</b></th>
				       <th><b>UPLOAD BY</b></th>
				       <th><b>FOTO</b></th>
				       <th><b>ORDER</b></th>
				       <th class='text-center' style='width:150px'>ACTIONS</th>
					   </tr>
					</thead>
					<tstatus>
					   @foreach($sliders as $i=>$slider)
				     <tr>
				     	 <td>{{ $i+1 }}</td>
				         <td> {{ $slider->judul }} </td>	         
				         <td> {{ str_limit($slider->deskripsi, 80) }}</td>	         
				         <td> {{ $slider->name }} </td>	         
				         <td>
						 	<a class="img-responsive" target="_blank" href="#"> <img src="{{ asset('/images/slider/'.$slider->foto)}}" style="max-height:100px;max-width:100px;margin-top:10px;">
						 </td>	         
				         <td> {{ $slider->order }} </td>
				         <td> 
				         <a title="edit" class="btn btn-warning btn-sm btn-sm" href='{{URL::action("admin\SlidersController@edit",array($slider->id))}}'><i class="fa fa-edit fa-xs" style="color: white"></i></a>
						<a title="detail" class="btn btn-info btn-sm" href='{{URL::action("admin\SlidersController@show",array($slider->id))}}'><i class="fa fa-eye fa-xs"></i></a>
						<form class="btn btn-danger btn-sm" title="destroy" id="delete_slider{{$slider->id}}" action='{{URL::action("admin\SlidersController@destroy",array($slider->id))}}' method="POST">
						    <input type="hidden" name="_method" value="delete">
						    <input type="hidden" name="_token" value="{{ csrf_token() }}">
						    <a href="#" onclick="document.getElementById('delete_slider{{$slider->id}}').submit();"><i class="fa fa-trash fa-xs" style="color: white"></i></a>
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