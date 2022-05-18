@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
    Content Part Writing Program
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('part-writing-program/index')}}">List Content Part Writing Program</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>Title</td>
            <td>
              {{{$part_writing_program->title}}}
            </td>
          </tr>

          <tr>
            <td>Description</td>
            <td>
              {{{$part_writing_program->desc}}}
            </td>
          </tr>

          <tr>
            <td>Stage</td>
            <td>
              {{{$part_writing_program->part}}}
            </td>
          </tr>

        </table>

        <p align="center">
          <a href="{{URL::to('part-writing-program/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection