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
	  	Story
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="{{URL::to('story/index')}}">List Story</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'/searchstory','role'=>'search'])  !!}
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
			<br>
			<div class="table-responsive pull-right" style="width: 100% !important">	
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>No.</th>
					       	<th><b>id story</b></th>
					       	<th><b>title</b></th>
					       	<th><b>description</b></th>
					       	<th><b>language</b></th>
					       	<th><b>category</b></th>
					       	<th><b>author</b></th>
					       	<th><b>viewer</b></th>
					       	<th><b>rating</b></th>
					       	<th><b>cover</b></th>
					       	<th class='text-center' style='width:200px'>Actions</th>
						</tr>
					</thead>

					<tstatus>
					   @foreach($stories as $i=>$story)
					     	<tr>
					     	 <td>{{$i+1}}</td>
					         <td> {{ $story->id_story }} </td>
					         <td> {{ $story->title }} </td>
					         <td> {!! str_limit($story->description, 80) !!} </td>
							 @if($story->language)
					         <td> {{ $story->language->name }} </td>
							 @else
							 <td>Data tidak ada</td>
							 @endif
							 @if($story->category)
					         <td> {{ $story->category->name }} </td>
							 @else
							 <td>Data tidak ada</td>
							 @endif
					         <td> {{ $story->user->name }} </td>
					         <td> {{ $story->viewer }} </td>
					         <td> {{ $story->rating }} </td>
					         <td>
								<a class="img-responsive" target="_blank" href="#"> <img src="{{ asset('/images/story/thumbs/'.$story->cover_photo)}}" style="max-height:100px;max-width:100px;margin-top:10px;">
							</td>
					         <td>
								<a title="edit" class="btn btn-warning btn-sm btn-sm" href='{{URL::action("admin\StoryController@edit",array($story->id_story))}}'><i class="fa fa-edit fa-xs" style="color: white"></i></a>
								<a title="detail" class="btn btn-info btn-sm" href='{{URL::action("admin\StoryController@show",array($story->id_story))}}'><i class="fa fa-eye fa-xs"></i></a>
								<a class="btn btn-danger btn-sm" title="destroy" onclick="return myFunction();" href="{{route('story-destroy', $story->id_story)}}"><i class="fa fa-trash"></i></a>
								@if ($story->status_recommendation == 0)
				                <a title="Rekomendasi" class="btn btn-primary btn-sm" onclick="return confirm('Apakah anda yakin untuk merekomendasikan cerita ini?');" href='{{URL::action("admin\StoryController@recommand",array($story->id_story))}}'><i class="fa fa-check-circle-o" aria-hidden="true"></i></a>
				                @else
				                <a title="Hapus rekomendasi" class="btn btn-success btn-sm" onclick="return confirm('Apakah anda yakin untuk tidak merekomendasikan cerita ini?');" href='{{URL::action("admin\StoryController@notRecommand",array($story->id_story))}}'></i><i class="fa fa-times" aria-hidden="true"></i></a>
				                @endif
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
      if(!confirm("Apakah anda yakin untuk menghapus cerita ini? Proses ini akan menghapus data yang terkait dengan story ini, seperti story rating, story part, event yang diikuti, program novel yang diikuti dan inkubasi"))
      event.preventDefault();
  }
 </script>
@endsection