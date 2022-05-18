@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <h1>
      News Feed
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('newfeed/index')}}">List News Feed</a></li>
    </ol>
  </section></br></br>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-hover">
          
          <tr>
            <td>Title</td>
            <td>
              {{{$newfeed->title}}}
            </td>
          </tr>

          <tr>
            <td>Description</td>
            <td>
              {{{$newfeed->description}}}
            </td>
          </tr>

          <tr>
            <td>Category</td>
            <td>
              {{{$newfeed->category->name}}}
            </td>
          </tr>

          <tr>
            <td>Text</td>
            <td>
              {{{$newfeed->text}}}
            </td>
          </tr>

          <tr>
            <td>Id Status News Feed</td>
            <td>
              {{{$newfeed->status->name}}}
            </td>
          </tr>

          <tr>
            <td>Published</td>
            <td>
              {{ $newfeed->createdAtFormatIndo() }}
            </td>
          </tr>

          <tr>
            <td>Photo</td>
            <td>
            <a class="img-responsive" target="_blank" href="#"> <img src="{{ asset('/images/news-feed/'.$newfeed->photo)}}" style="width:50%;margin-top:10px;">
            </td>
          </tr>

        </table>

        <p align="center">
          <a href="{{URL::to('newfeed/index')}}" class="btn btn-primary" role="button">kembali</a>
        </p>
      
      </div>
    </div>
  </section>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script>
     var route_prefix = "{{ url(config('lfm.prefix')) }}";
    </script>

    <!-- CKEditor init -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
    <script>
      $('textarea[name=ce]').ckeditor({
        height: 100,
        filebrowserImageBrowseUrl: route_prefix + '?type=Images',
        filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
        filebrowserBrowseUrl: route_prefix + '?type=Files',
        filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
      });
    </script>

    <script>
      {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
    </script>
    <script>
      $('#lfm').filemanager('image', {prefix: route_prefix});
    </script>

@endsection