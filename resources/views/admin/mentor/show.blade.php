@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
    Mentor
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('mentor/index')}}">List Mentor</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>Name</td>
            <td>
              {{{$mentor->name}}}
            </td>
          </tr>

          <tr>
            <td>Biodata</td>
            <td>
              {{{$mentor->biodata}}}
            </td>
          </tr>

          <tr>
            <td>Status</td>
            <td>
              {{{$mentor->status}}}
            </td>
          </tr>

          <tr>
            <td>Image</td>
            <td>
              <a class="img-responsive" target="_blank" href="#"> <img src="{{ asset('/images/mentors/'.$mentor->img)}}" style="max-height:300px;max-width:300px;margin-top:10px;">
            </td>
          </tr>

        </table>

        <p align="center">
          <a href="{{URL::to('mentor/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection