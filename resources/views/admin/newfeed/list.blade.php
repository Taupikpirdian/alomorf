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
	  	News Feed
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active"><a href="{{URL::to('newfeed/index')}}">News Feed</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
					{!! Form::open(['method'=>'GET','url'=>'/searchnewfeed','role'=>'search'])  !!}
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
					<a title="create" href="{{URL::to('newfeed/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i></a>
				</div><br>
				<div class="table-responsive pull-right" style="width: 100% !important">	
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>No.</th>
						       	<th><b>Title</b></th>
						       	<th><b>Category</b></th>
						       	<th><b>Created At</b></th>
						       	<th><b>Status News Feed</b></th>
						       	<th class='text-center' style='width:150px'>Actions</th>
							</tr>
						</thead>

						<tstatus>
						   @foreach($newfeed as $i=>$newfeeds)
						     	<tr>
						     		<td>{{$i+1}}</td>
						     			<td> {{ $newfeeds->title }} </td>
						     			<td> {{ $newfeeds->category->name }} </td>
											<td> {{ $newfeeds->createdAtFormatIndo() }} </td>
											@if ($newfeeds->id_status_new_feed == 2)
												<td> Draft </td>
											@else
												<td> Published </td>
											@endif
										<td>
											<a title="edit" class="btn btn-warning btn-sm btn-sm" href='{{URL::action("admin\NewFeedController@edit",array($newfeeds->id))}}'><i class="fa fa-edit fa-xs" style="color: white"></i></a>
											<a title="detail" class="btn btn-info btn-sm" href='{{URL::action("admin\NewFeedController@show",array($newfeeds->id))}}'><i class="fa fa-eye fa-xs"></i></a>
											<a class="btn btn-danger btn-sm" title="destroy" onclick="return myFunction();" href="{{route('newsfeed-destroy', $newfeeds->id)}}"><i class="fa fa-trash"></i></a>
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
      if(!confirm("Apakah anda yakin untuk menghapus artikel ini?"))
      event.preventDefault();
  }
 </script>
@endsection