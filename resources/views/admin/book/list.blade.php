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
      Book
    </h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="{{URL::to('/user-groups/index')}}">List Book</a></li>
    </ol>
  </section>
	<section class="content">
	  <div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
					{!! Form::open(['method'=>'GET','url'=>'searchbook','role'=>'search'])  !!}
						<div class='form-group clearfix'>
							<div class='col-md-4'>
	                <div class="input-group custom-search-form">
	                  <input type="text" class="form-control" name="search" placeholder="Pencarian">
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
					<a href="{{URL::to('book/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> create</a>
				</div>
				<br>
				<div class="table-responsive pull-right"  style="width: 100% !important">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
							 <th>No</th>
				       <th><b>Judul</b></th>
				       <th><b>Pengarang</b></th>
				       <th><b>Genre</b></th>
				       <th><b>Foto</b></th>
				       <th class='text-center' style='width:70px'>Actions</th>
							</tr>
						</thead>
						<tstatus>
					   @foreach($books as $i=>$book)
				     <tr>
				     	 <td>{{$i+1}}</td>
				         <td> {{ $book->judul }} </td>	         
				         <td> {{ $book->pengarang }} </td>	         
				         <td> {{ $book->genre }} </td>
				         <td> {{ $book->foto }} </td>
				         <td> <img src="{{ $book->foto }}" width="100px"></td>  
				         <td> 
				         <a href='{{URL::action("book\BookController@edit",array($book->id))}}'>edit</a>
						<a href='{{URL::action("book\BookController@show",array($book->id
										))}}'>show</a>
							<form id="delete_book{{$book->id}}" action='{{URL::action("book\BookController@destroy",array($book->id))}}' method="POST">
							 <input type="hidden" name="_method" value="delete">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							 <a href="#" onclick="document.getElementById('delete_book{{$book->id}}').submit();">delete</a>
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