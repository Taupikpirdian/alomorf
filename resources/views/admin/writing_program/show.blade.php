@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
    Content Writing Program
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('writing-program/index')}}">List Content Writing Program</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>Title</td>
            <td>
              {{{$writing_program->title}}}
            </td>
          </tr>

          <tr>
            <td>Description</td>
            <td>
              {{{$writing_program->desc}}}
            </td>
          </tr>

          <tr>
            <td>Order</td>
            <td>
              {{{$writing_program->order}}}
            </td>
          </tr>

          <tr>
            <td>Image</td>
            <td>
              <a class="img-responsive" target="_blank" href="#"> <img src="{{ asset('/images/content-writing-program/'.$writing_program->img)}}" style="max-height:300px;max-width:300px;margin-top:10px;">
            </td>
          </tr>

        </table>

        <p align="center">
          <a href="{{URL::to('writing-program/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection