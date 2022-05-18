@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Book
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('book/index')}}">List Book</a></li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          <tr>
            <td>Id</td>
            <td>
              {{{$books->id}}}
            </td>
          </tr>
          <tr>
            <td width="200px">Judul</td>
            <td>
              {{{$books->judul}}}
            </td>
          </tr>
          <tr>
            <td width="200px">Pengarang</td>
            <td>
              {{{$books->pengarang}}}
            </td>
          </tr>
          <tr>
            <td width="200px">Genre</td>
            <td>
              {{{$books->genre}}}
            </td>
          </tr>
          <tr>
            <td width="200px">Foto</td>
            <td>
              <img src="{{ $books->foto }}" width="100px">
            </td>
          </tr>
        </table>
         <p align="center">
          <a href="{{URL::to('book/index')}}" class="btn btn-primary" role="button">kembali</a>
          </p>
      </div>
    </div>
  </section>
@endsection