@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Bahasa
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('story_rating/index')}}">List Bahasa</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>Rating</td>
            <td>
              {{{$story_ratings->rating}}}
            </td>
          </tr>

          <tr>
            <td>Story</td>
            <td>
              {{{$story_ratings->id_story}}}
            </td>
          </tr>

          <tr>
            <td>User</td>
            <td>
              {{{$story_ratings->id_user}}}
            </td>
          </tr>


        </table>

        <p align="center">
          <a href="{{URL::to('story_rating/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection