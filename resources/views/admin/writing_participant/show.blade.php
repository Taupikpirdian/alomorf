@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
    Writing Program Participants
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('writing-program-participant/index')}}">List Writing Program Participants</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>Nama Akun</td>
            <td>
              {{{$writing_participant_participant->user->name}}}
            </td>
          </tr>

          <tr>
            <td>Pekerjaan</td>
            <td>
              {{{$writing_participant_participant->pekerjaan}}}
            </td>
          </tr>

          <tr>
            <td>Domisili</td>
            @if($writing_participant_participant->user->userProfil)
            <td>
              {{{$writing_participant_participant->user->userProfil->alamat}}}
            </td>
            @else
            <td style="color:#FF0000">
              Profil belum lengkap
            </td>
            @endif
          </tr>

          <tr>
            <td>Kontak</td>
            @if($writing_participant_participant->user->userProfil)
            <td>
              {{{$writing_participant_participant->user->userProfil->nomor_hp}}}
            </td>
            @else
            <td style="color:#FF0000">
              Profil belum lengkap
            </td>
            @endif
          </tr>

          <tr>
            <td>Judul Buku</td>
            @if($writing_participant_participant->book)
            <td>
              {{{$writing_participant_participant->book->title}}}
            </td>
            @else
            <td style="color:#FF0000">
              Buku belum ada
            </td>
            @endif
          </tr>

          <tr>
            <td>Deskripsi</td>
            @if($writing_participant_participant->book)
            <td>
              {{{$writing_participant_participant->book->description}}}
            </td>
            @else
            <td style="color:#FF0000">
              Buku belum ada
            </td>
            @endif
          </tr>

          <tr>
            <td>Cover</td>
            @if($writing_participant_participant->book)
            <td>
              <a class="img-responsive" target="_blank" href="#"> <img src="{{ asset('/images/story/'.$writing_participant_participant->book->cover_photo)}}">
            </td>
            @else
            <td style="color:#FF0000">
              Buku belum ada
            </td>
            @endif
          </tr>
 
        </table>

        <p align="center">
          <a href="{{URL::to('writing-program-participant/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection