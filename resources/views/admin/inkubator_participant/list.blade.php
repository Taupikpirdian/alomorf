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
	  	Inkubator Participants
	</h1>
</section>

<section class="content">
  	<div class="row">
	    <div class="col-md-12">
	    	<div class="pull-left">
				{!! Form::open(['method'=>'GET','url'=>'/searchinkubasi-program-participant','role'=>'search'])  !!}
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
					       	<th><b>Mentor</b></th>
					       	<th class='text-center' style='width:50px'>Actions</th>
						</tr>
					</thead>

					<tstatus>
					   @foreach($inkubator_participants as $i=>$inkubator_participant)
					     	<tr>
					     	 <td>{{$i+1}}</td>
					         <td> {{ $inkubator_participant->user->name }}</td>
							 @if($inkubator_participant->user->userProfil)
					         <td> {{ $inkubator_participant->user->userProfil->alamat }}</td>
					         <td> {{ $inkubator_participant->user->userProfil->nomor_hp }}</td>
							 @else
							 <td style="color:#FF0000">Profil belum lengkap</td>
							 <td style="color:#FF0000">Profil belum lengkap</td>
							 @endif
					         <td> {{ $inkubator_participant->pekerjaan }}</td>
					         <td> {{ $inkubator_participant->mentors }}</td>
							 <td>
	                            <a title="Masukan Mentor" class="btn btn-success btn-sm" href='{{URL::action("admin\InkubatorParticipantController@edit",array($inkubator_participant->id))}}'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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