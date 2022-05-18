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
	  	Story Rating
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="{{URL::to('story_rating/index')}}">List Story Rating</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'/searchstory_rating','role'=>'search'])  !!}
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
				
			<!-- <div class='pull-right'>
				<a href="{{URL::to('story_rating/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i></a>
			</div><br> -->
			<div class="table-responsive pull-right" style="width: 100% !important">	
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
				       	<th><b>Story</b></th>
				       	<th><b>Rating</b></th>
				       	<th><b>User</b></th>
				       	<th class='text-center' style='width:50px'>Actions</th>
					</tr>
				</thead>

				<tstatus>
				   @foreach($story_ratings as $i=>$story_rating)
				     	<tr>
				     	 <td>{{$i+1}}</td>
						 <td>
							<a class="img-responsive" target="_blank" href="#"> <img src="{{ asset('/images/story/'.$story_rating->bookBelong->cover_photo)}}" style="max-height:100px;max-width:100px;margin-top:10px;">
					     </td>
				         <td>
						 	@if($story_rating->rating == 1)
							<label>
							<span style="color:#FFD700;" class="icon">★</span>
							<span style="color:#C0C0C0;" class="icon">★</span>
							<span style="color:#C0C0C0;" class="icon">★</span>
							<span style="color:#C0C0C0;" class="icon">★</span>
							<span style="color:#C0C0C0;" class="icon">★</span>
							</label>
							@endif
							@if($story_rating->rating == 2)
							<label>
							<span style="color:#FFD700;" class="icon">★</span>
							<span style="color:#FFD700;" class="icon">★</span>
							<span style="color:#C0C0C0;" class="icon">★</span>
							<span style="color:#C0C0C0;" class="icon">★</span>
							<span style="color:#C0C0C0;" class="icon">★</span>
							</label>
							@endif
							@if($story_rating->rating == 3)
							<label>
							<span style="color:#FFD700;" class="icon">★</span>
							<span style="color:#FFD700;" class="icon">★</span>
							<span style="color:#FFD700;" class="icon">★</span>
							<span style="color:#C0C0C0;" class="icon">★</span>
							<span style="color:#C0C0C0;" class="icon">★</span>
							</label>
							@endif
							@if($story_rating->rating == 4)
							<label>
							<span style="color:#FFD700;" class="icon">★</span>
							<span style="color:#FFD700;" class="icon">★</span>
							<span style="color:#FFD700;" class="icon">★</span>
							<span style="color:#FFD700;" class="icon">★</span>
							<span style="color:#C0C0C0;" class="icon">★</span>
							</label>
							@endif
							@if($story_rating->rating == 5)
							<label>
							<span style="color:#FFD700;" class="icon">★</span>
							<span style="color:#FFD700;" class="icon">★</span>
							<span style="color:#FFD700;" class="icon">★</span>
							<span style="color:#FFD700;" class="icon">★</span>
							<span style="color:#FFD700;" class="icon">★</span>
							</label>
							@endif
						 </td>
				         <td> {{ $story_rating->user->name }} </td>
				         <td>
							<!-- <a title="edit" class="btn btn-warning btn-sm btn-sm" href='{{URL::action("admin\StoryRatingController@edit",array($story_rating->id))}}'><i class="fa fa-edit fa-xs" style="color: white"></i></a> -->
							<!-- <a title="detail" class="btn btn-info btn-sm" href='{{URL::action("admin\StoryRatingController@show",array($story_rating->id))}}'><i class="fa fa-eye fa-xs"></i></a> -->
							<form class="btn btn-danger btn-sm" title="destroy" id="delete_storyrating{{$story_rating->id}}" action='{{URL::action("admin\StoryRatingController@destroy",array($story_rating->id))}}' method="POST">
							    <input type="hidden" name="_method" value="delete">
							    <input type="hidden" name="_token" value="{{ csrf_token() }}">
							    <a href="#" onclick="document.getElementById('delete_storyrating{{$story_rating->id}}').submit();"><i class="fa fa-trash fa-xs" style="color: white"></i></a>
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