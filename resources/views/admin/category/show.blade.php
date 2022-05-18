@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Category
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('category/index')}}">List Category</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>Nama Category</td>
            <td>
              {{{$category->name}}}
            </td>
          </tr>
        </table>

        <p align="center">
          <a href="{{URL::to('category/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection