@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <section class="content-header">
    <h1>
      Book
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><a href="{{URL::to('book/index')}}">List Book</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        {!! Form::open(['action' => 'book\BookController@store']) !!}
         
          <div class='form-group clearfix'>
            {{ Form::label("judul", "Judul", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("judul", '',['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('judul')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("pengarang", "Pengarang", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("pengarang", '',['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('pengarang')}}</span>
              </div>
          </div>

          <div class='form-group clearfix'>
            {{ Form::label("genre", "Genre", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                {{ Form::text("genre", '',['class' => 'form-control required']) }}
                <span class="error">{{$errors->first('pengarang')}}</span>
              </div>
          </div>

<!--           <div class='form-group clearfix'>
            {{ Form::label("genre", "Genre", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                  {{ Form::text('date', '', ['id' => 'datepicker']) }}
                <span class="error">{{$errors->first('tgl_msk')}}</span>
              </div>
          </div> -->

<!--           <div class='form-group clearfix'>
            {{ Form::label("tgl_akr", "Tanggal Akhir", ['class' => 'col-md-2 control-label']) }}
              <div class='col-md-4'>
                  {{ Form::text('date', '', ['id' => 'datepicker2']) }}
                <span class="error">{{$errors->first('tgl_akr')}}</span>
              </div>
          </div> -->

          <div class='form-group clearfix'>
            {{ Form::label("foto", "Foto", ['class' => 'col-md-2 control-label']) }}
            <div class='col-md-4'>
                  <div class="input-group">
                    <span class="input-group-btn">
                      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                        <i class="fa fa-picture-o"></i> Choose
                      </a>
                    </span>
                    <input id="thumbnail" class="form-control" type="text" name="foto">
                  </div>
                  <img id="holder" style="margin-top:15px;max-height:100px;">
                </div>
            </div>
            
          <div class='form-group'>
            <div class='col-md-4 col-md-offset-2'>
              <button class='btn btn-primary' type='submit' name='save' id='save'><span class='glyphicon glyphicon-save'></span> Save</button>
            </div>
          </div>
        {!! Form::close() !!}    
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


    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script>
  $(function() {
    $("#datepicker").datepicker({
      dateFormat: "yy-mm-dd",
      forceParse: false
    });
  });
   $(function() {
    $("#datepicker2").datepicker({
      dateFormat: "yy-mm-dd",
      forceParse: false
    });
  });
  </script>
@endsection