@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Groups
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('/groups/index')}}">List Groups</a></li>
    </ol>
  </section>
	<section class="content">
	  <div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'search-groups','role'=>'search'])  !!}
					<div class='form-group clearfix'>
						<div class='col-md-4'>
	             			<div class="input-group custom-search-form">
	                			<input type="text" class="form-control" name="search" placeholder="Search...">
	                  			<span class="input-group-btn">
	                  				<span class="input-group-btn">
					       				<button class="btn btn-default" type="submit"><i class="fa fa-search"></i> Search</button>
					     			</span>
	                  			</span>
	              			</div>
	            		</div>
	          		</div>
          		{!! Form::close() !!}
			</div>
			<div class='pull-right'>
				<a href="{{URL::to('/groups/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> create</a>
			</div>
			<br>
			<div class="table-responsive pull-right" style="width: 100% !important">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>No.</th>
			       			<th><b>Group</b></th>
			       			<th class='text-center' style='width:70px'>Actions</th>
						</tr>
					</thead>
					<tstatus>
				   		@foreach($groups as $i=>$group)
			     			<tr>
			     		 		<td>{{$i+1}}</td>
			         			<td> {{ $group->name }} </td>	         
			         			<td>
									<a href='{{URL::action("admin\GroupController@edit",array($group->id))}}'>edit</a>
									<a href='{{URL::action("admin\GroupController@show",array($group->id))}}'>show</a>
									<form id="delete_group{{$group->id}}" action='{{URL::action("admin\GroupController@destroy",array($group->id))}}' method="POST">
									    <input type="hidden" name="_method" value="delete">
									    <input type="hidden" name="_token" value="{{ csrf_token() }}">
									    <a href="#" onclick="document.getElementById('delete_group{{$group->id}}').submit();">delete</a>
									</form>
							  	</td>
			     			</tr>
				   		@endforeach
					</tstatus>
				</table>
				{!! $groups->render() !!}
			</div>
			</div>
		</div>
	</section>
@endsection
@section('js')
<script>
	$( document ).ready(function() {
		var message = '{{session('flash-error')}}';
		if(message!=''){
			alert('{{session('flash-error')}}');
		}
	})
</script>
@endsection