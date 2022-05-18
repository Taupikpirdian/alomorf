@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Event
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('event/index')}}">List Event</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>Title</td>
            <td>
              {{{$event->title}}}
            </td>
          </tr>

          <tr>
            <td>Start</td>
            <td>
              {{ Carbon\Carbon::parse($event->start)->formatLocalized('%d %B %Y')}}
            </td>
          </tr>

          <tr>
            <td>End</td>
            <td>
              {{ Carbon\Carbon::parse($event->end)->formatLocalized('%d %B %Y')}}
            </td>
          </tr>

          <tr>
            <td>Address</td>
            <td>
              {{{$event->address}}}
            </td>
          </tr>

          <tr>
            <td>Description</td>
            <td>
              {{{$event->description}}}
            </td>
          </tr>

          <tr>
            <td>Detail</td>
            <td>
              {{{$event->text}}}
            </td>
          </tr>

          <tr>
            <td>Image</td>
            <td>
              <a class="img-responsive" target="_blank" href="#"> <img src="{{ asset('/images/event/'.$event->image)}}">
            </td>
          </tr>

        </table>

        <p align="center">
          <a href="{{URL::to('event/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection