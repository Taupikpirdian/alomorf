@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
    Content Inkubator
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('inkubator/index')}}">List Content Inkubator</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>Title</td>
            <td>
              {{{$inkubator->title}}}
            </td>
          </tr>

          <tr>
            <td>Description</td>
            <td>
              {{{$inkubator->desc}}}
            </td>
          </tr>

          <tr>
            <td>Order</td>
            <td>
              {{{$inkubator->order}}}
            </td>
          </tr>

          <tr>
            <td>Image</td>
            <td>
              <a class="img-responsive" target="_blank" href="#"> <img src="{{ asset('/images/content-inkubator/'.$inkubator->img)}}" style="max-height:300px;max-width:300px;margin-top:10px;">
            </td>
          </tr>

        </table>

        <p align="center">
          <a href="{{URL::to('inkubator/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection