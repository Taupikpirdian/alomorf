@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      Story
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('story/index')}}">List Story</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>id story</td>
            <td>
              {{{$stories->id_story}}}
            </td>
          </tr>

          <tr>
            <td>title</td>
            <td>
              {{{$stories->title}}}
            </td>
          </tr>

          <tr>
            <td>description</td>
            <td>
              {!! $stories->description !!}
            </td>
          </tr>

          <tr>
            <td>language</td>
            @if($stories->language)
            <td>
              {{{$stories->language->name}}}
            </td>
            @else
            <td>
              Data tidak ada
            </td>
            @endif
          </tr>

          <tr>
            <td>category</td>
            @if($stories->category)
            <td>
              {{{$stories->category->name}}}
            </td>
            @else
            <td>
              Data tidak ada
            </td>
            @endif
          </tr>

          <tr>
            <td>user</td>
            <td>
              {{{$stories->user->name}}}
            </td>
          </tr>

          <tr>
            <td>viewer</td>
            <td>
              {{{$stories->viewer}}}
            </td>
          </tr>

          <tr>
            <td>rating</td>
            <td>
              {{{$stories->rating}}}
            </td>
          </tr>

          <tr>
            <td>cover</td>
            <td>
              <a class="img-responsive" target="_blank" href="#"> <img src="{{ asset('/images/story/'.$stories->cover_photo)}}" style="max-height:100px;max-width:100px;margin-top:10px;">
            </td>
          </tr>


        </table>

        <p align="center">
          <a href="{{URL::to('story/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>
@endsection