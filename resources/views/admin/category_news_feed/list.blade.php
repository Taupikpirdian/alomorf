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
	  	Category News Feed
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="{{URL::to('category-news-feed/index')}}">List Category</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'/searchcategory-news-feed','role'=>'search'])  !!}
					<div class='form-group clearfix'>
						<div class='col-md-5'>
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
				<a title="create" href="{{URL::to('category-news-feed/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i></a>
			</div><br>
			<div class="table-responsive pull-right" style="width: 100% !important">	
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>No.</th>
					       	<th><b>Nama Category</b></th>
					       	<th class='text-center' style='width:150px'>Actions</th>
						</tr>
					</thead>

					<tstatus>
					   @foreach($category_news_feed as $i=>$category_news_feeds)
					     	<tr>
					     	 <td>{{$i+1}}</td>
					         <td> {{ $category_news_feeds->name }} </td>
					         <td>
								<a title="edit" class="btn btn-warning btn-sm btn-sm" href='{{URL::action("admin\CategoryNewsFeedController@edit",array($category_news_feeds->id_category_news_feed))}}'><i class="fa fa-edit fa-xs" style="color: white"></i></a>
								<form class="btn btn-danger btn-sm" title="destroy" id="delete_category{{$category_news_feeds->id_category_news_feed}}" action='{{URL::action("admin\CategoryNewsFeedController@destroy",array($category_news_feeds->id_category_news_feed))}}' method="POST">
								    <input type="hidden" name="_method" value="delete">
								    <input type="hidden" name="_token" value="{{ csrf_token() }}">
								    <a href="#" onclick="document.getElementById('delete_category{{$category_news_feeds->id_category_news_feed}}').submit();"><i class="fa fa-trash fa-xs" style="color: white"></i></a>
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