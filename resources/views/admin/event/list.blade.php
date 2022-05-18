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
	  	Event
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active"><a href="{{URL::to('event/index')}}">Event</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'/searchevent','role'=>'search'])  !!}
					<div class='form-group clearfix'>
						<div class='col-md-5'>
			                <div class="input-group custom-search-form">
			                  <input type="text" class="form-control" name="search" placeholder="Search...">
			                    <span class="input-group-btn">
			                    	<span class="input-group-btn">
				       					<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
				     				</span>
			                    </span>
			                </div>
			            </div>
			        </div>
          		{!! Form::close() !!}
			</div>
				
			<div class='pull-right'>
				<a title="create" href="{{URL::to('event/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i></a>
			</div><br>
			<div class="table-responsive pull-right"  style="width: 100% !important">	
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>No.</th>
					       	<th><b>Title</b></th>
					       	<th><b>Start</b></th>
					       	<th><b>End</b></th>
					       	<th><b>Address</b></th>
					       	<th><b>Theme</b></th>
					       	<th><b>Description</b></th>
					       	<th><b>Image</b></th>
					       	<th class='text-center' style='width:150px'>Actions</th>
						</tr>
					</thead>

					<tstatus>
					   @foreach($event as $i=>$events)
					     	<tr>
					     	 <td>{{$i+1}}</td>
					         <td> {{ $events->title }} </td>
					         <td> {{ Carbon\Carbon::parse($events->start)->formatLocalized('%d %B %Y')}}</td>
					         <td> {{ Carbon\Carbon::parse($events->end)->formatLocalized('%d %B %Y')}}</td>
					         <td> {{ str_limit($events->address, 80) }} </td>
					         <td> {{ $events->theme }} </td>
					         <td> {{ str_limit($events->description, 80) }}</td>
					         <td>
								<a class="img-responsive" target="_blank" href="#"> <img src="{{ asset('/images/event/'.$events->image)}}" style="max-height:100px;max-width:100px;margin-top:10px;">
							 </td>
					         <td>
								<a title="edit" class="btn btn-warning btn-sm btn-sm" href='{{URL::action("admin\EventController@edit",array($events->id))}}'><i class="fa fa-edit fa-xs" style="color: white"></i></a>
								<a title="detail" class="btn btn-info btn-sm" href='{{URL::action("admin\EventController@show",array($events->id))}}'><i class="fa fa-eye fa-xs"></i></a>
								<a class="btn btn-danger btn-sm" title="destroy" onclick="return myFunction();" href="{{route('event-destroy', $events->id)}}"><i class="fa fa-trash"></i></a>
							</td>	         
					     	</tr>
						   @endforeach
					</tstatus>
				</table>
			</div>
		</div>
	</div>
</section>

<script>
  function myFunction() {
      if(!confirm("Apakah anda yakin untuk menghapus event ini?"))
      event.preventDefault();
  }
 </script>
@endsection