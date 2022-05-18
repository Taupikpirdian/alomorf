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
	  	Writing Program Participants
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active"><a href="{{URL::to('writing-program-participant/index')}}">List Writing Program Participants</a></li>
	</ol>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'/searchwriting-program-participant','role'=>'search'])  !!}
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
			<div class="table-responsive pull-right" style="width: 100% !important">	
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>No.</th>
				       	<th><b>Nama Akun</b></th>
				       	<th><b>Domisili</b></th>
				       	<th><b>Kontak</b></th>
				       	<th><b>Pekerjaan</b></th>
				       	<th class='text-center' style='width:150px'>Actions</th>
					</tr>
				</thead>

				<tstatus>
				   @foreach($writing_participants as $i=>$writing_participant)
				     	<tr>
				     	 <td>{{$i+1}}</td>
				         <td> {{ $writing_participant->user->name }}</td>
						 @if($writing_participant->user->userProfil)
				         <td> {{ $writing_participant->user->userProfil->alamat }}</td>
				         <td> {{ $writing_participant->user->userProfil->nomor_hp }}</td>
						 @else
						 <td style="color:#FF0000">Profil belum lengkap</td>
						 <td style="color:#FF0000">Profil belum lengkap</td>
						 @endif
				         <td> {{ $writing_participant->pekerjaan }}</td>
						 <td>
                            @if ($writing_participant->verified == 0)
			                <a title="Verifikasi" class="btn btn-primary btn-sm" onclick="return confirm('Apakah anda yakin untuk memverifikasi cerita ini?');" href='{{URL::action("admin\WritingProgramParticipantController@verifikasi",array($writing_participant->id))}}'><i class="fa fa-check-circle-o" aria-hidden="true"></i></a>
			                @else
			                <a title="Hapus Verifikasi" class="btn btn-success btn-sm" onclick="return confirm('Apakah anda yakin untuk menghapus verifikasi cerita ini?');" href='{{URL::action("admin\WritingProgramParticipantController@notVerifikasi",array($writing_participant->id))}}'></i><i class="fa fa-times" aria-hidden="true"></i></a>
                            @endif
                            <a title="Detail" class="btn btn-info btn-sm" href='{{URL::action("admin\WritingProgramParticipantController@show",array($writing_participant->id))}}'><i class="fa fa-eye fa-xs"></i></a>
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