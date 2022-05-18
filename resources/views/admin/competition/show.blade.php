@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
    Competition Participants
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('competition-participant/index')}}">List Competition Participants</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>Nama Akun</td>
            <td>
              {{{$competition_participant->user->name}}}
            </td>
          </tr>

          <tr>
            <td>Domisili</td>
            @if($competition_participant->user->userProfil)
            <td>
              {{{$competition_participant->user->userProfil->alamat}}}
            </td>
            @else
            <td style="color:#FF0000">
              Profil belum lengkap
            </td>
            @endif
          </tr>

          <tr>
            <td>Kontak</td>
            @if($competition_participant->user->userProfil)
            <td>
              {{{$competition_participant->user->userProfil->nomor_hp}}}
            </td>
            @else
            <td style="color:#FF0000">
              Profil belum lengkap
            </td>
            @endif
          </tr>

          <tr>
            <td>Judul Buku</td>
						 @if($competition_participant->book)
            <td>
              {{{$competition_participant->book->title}}}
            </td>
            @else
            <td style="color:#FF0000">
              Buku tidak ada
            </td>
            @endif
          </tr>

          <tr>
            <td>Deskripsi</td>
						 @if($competition_participant->book)
            <td>
              {{{$competition_participant->book->description}}}
            </td>
            @else
            <td style="color:#FF0000">
              Buku tidak ada
            </td>
            @endif
          </tr>

          <tr>
            <td>Cover</td>
						 @if($competition_participant->book)
            <td>
              <a class="img-responsive" target="_blank" href="#"> <img src="{{ asset('/images/story/'.$competition_participant->book->cover_photo)}}">
            </td>
            @else
            <td style="color:#FF0000">
              Buku tidak ada
            </td>
            @endif
          </tr>
 
        </table>

        <p align="center">
          <a href="{{URL::to('competition-participant/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection