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
	  	User Profile
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active"><a href="{{URL::to('newfeed/index')}}">User Profile</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'/searchuserprofile','role'=>'search'])  !!}
					<div class='form-group clearfix'>
						<div class='col-md-4'>
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
				<a href="{{URL::to('userprofile/create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i></a>
			</div><br>
			<div class="table-responsive pull-right" style="width: 100% !important">	
			<table class="table table-striped table-hover">
				<thead>
					<tr>
					<th>No.</th>
						<th>Nama</th>
				       	<th><b>Nomor Hp</b></th>
				       	<th><b>Deskripsi</b></th>
				       	<th><b>Tempat, Tgl Lahir</b></th>
				       	<th><b>Sekolah</b></th>
				       	<th><b>Kota</b></th>
				       	<th><b>Photo Profile</b></th>
				       	<th class='text-center' style='width:150px'>Actions</th>
					</tr>
				</thead>

				<tstatus>
				   @foreach($userprofile as $i=>$userprofiles)
				     	<tr>
				     	 <td>{{$i+1}}</td>
				         <td> {{ $userprofiles->name }} </td>
				         <td> {{ $userprofiles->nomor_hp }} </td>
				         <td> {{ str_limit($userprofiles->deskripsi, 80) }} </td>
				         <td> {{ $userprofiles->tempat_lahir }}, {{ Carbon\Carbon::parse($userprofiles->tanggal_lahir)->formatLocalized('%d %B %Y')}}</td>
				         <td> {{ $userprofiles->sekolah }} </td>
				         <td> {{ $userprofiles->kota }} </td>
				         <td>
						 	<a class="img-responsive" target="_blank" href="#"> <img src="{{ asset('/images/foto_profile/'.$userprofiles->foto_profile)}}" style="max-height:100px;max-width:100px;margin-top:10px;">
						 </td>
				         <td>
							<a title="edit" class="btn btn-warning btn-sm btn-sm" href='{{URL::action("admin\UserProfileController@edit",array($userprofiles->id_user_profile))}}'><i class="fa fa-edit fa-xs" style="color: white"></i></a>
							<a title="detail" class="btn btn-info btn-sm" href='{{URL::action("admin\UserProfileController@show",array($userprofiles->id_user_profile))}}'><i class="fa fa-eye fa-xs"></i></a>
							<a class="btn btn-danger btn-sm" title="destroy" onclick="return myFunction();" href="{{route('destroy-userprofile', $userprofiles->id_user_profile)}}"><i class="fa fa-trash"></i></a>
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
      if(!confirm("Apakah anda yakin untuk menghapus data ini?"))
      event.preventDefault();
  }
 </script>
@endsection