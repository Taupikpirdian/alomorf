@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Edit Profil
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('editprofil/index')}}">Edit Profil</a></li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">

          <tr>
            <td width="200px">Nama</td>
            <td>
              {{{$editprofil->nama}}}
            </td>
          </tr>

          <tr>
            <td width="200px">Tanggal Lahir</td>
            <td>
              {{{$editprofil->tanggal_lahir}}}
            </td>
          </tr>

          <tr>
            <td width="200px">Sekolah</td>
            <td>
              {{{$editprofil->sekolah}}}
            </td>
          </tr>

          <tr>
            <td width="200px">Kota</td>
            <td>
              {{{$editprofil->kota}}}
            </td>
          </tr>

          <tr>
            <td width="200px">Email</td>
            <td>
              {{{$editprofil->email}}}
            </td>
          </tr>

        </table>
         <p align="center">
          <a href="{{URL::to('editprofil/index')}}" class="btn btn-primary" role="button">kembali</a>
          </p>
      </div>
    </div>
  </section>
@endsection