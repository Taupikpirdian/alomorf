@extends('layouts.admin')

@section('content')
<section class="content-header">
    <h1>
      SHOW SLIDER
    </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="{{URL::to('/group-sliders/index')}}">Daftar nama</a></li>
      </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          <tr>
            <td width="200px">UPLOAD BY</td>
              <td>
                {{{$sliders->name}}}
              </td>
          </tr>
             <td width="200px">JUDUL</td>
              <td>
                {{{$sliders->judul}}}
              </td>
          </tr>
          <td width="200px">DESKRIPSI</td>
              <td>
                {{{$sliders->deskripsi}}}
              </td>
          </tr>
          <td width="200px">FOTO</td>
              <td>
    					 	<a class="img-responsive" target="_blank" href="#"> <img src="{{ asset('/images/slider/'.$sliders->foto)}}" style="width:50%;margin-top:10px;">
              </td>
          </tr>
          <td width="200px">ORDER</td>
              <td>
                {{{$sliders->order}}}
              </td>
          </tr>
        </table>
        <p align="center">
          <a href="{{URL::to('sliders/index')}}" class="btn btn-primary" role="button">kembali</a>
          </p>
      </div>
    </div>
  </section>
@endsection