@section('js')
<script type="text/javascript">

      function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showgambar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputgambar").change(function () {
        readURL(this);
    });

</script>

@stop
@extends('layouts.app')

@section('content')
<section id="home-blog">
  <div class="container">
  {{ Form::open(array('url' => '/create/create', 'files' => true, 'method' => 'post')) }}
    <div class="col-lg-3 col-md-2 col-sm-12" id="picture-sidebar">
      <div class="image-placeholder new-image file-upload file-drop" data-file-upload="drop">
        <div class="image-placeholder">
          <img src="{{URL::asset('front/images/bookCover.jpg')}}" alt="Untitled Story" width="100%" height="256" class="cover cover-xlg edit-cover">
        </div>
        <div id="cover-uploader" class="button-group inline-block dropdown hidden">
            <div class="cover-edit-prompt">
                <div class="drag-state">
                  <span class="on-cover-edit hidden">Drop your cover</span>
                  <span class="fa fa-plus fa-wp-white on-cover-edit-icon" aria-hidden="true" style="font-size:16px;"></span>
                </div>
            </div>
        </div>
        <span class="empty-warning hidden">Required</span>
        <input accept="image/jpeg, image/png, image/gif" type="file" name="file" style="position: absolute; right: 0px; top: 0px; opacity: 0; height: 0; width: 0">
        <div style="height:15px">
        </div>
          <div class="col-sm-6">
              <input type="file" id="inputgambar" name="file" class="validate"/ >
              <span class="error">{{$errors->first('file')}}</span>
          <div style="height:3px">
          </div>
          </div>

         </span>
      </div>
    </div>
    <div class="col-lg-8 col-lg-offset-1 col-sm-12 col-md-9 col-md-offset-1" id="main-edit-container">
      <div class="row inner-post">
        <form class="main-edit-form">
        <div class="required-form-wrapper">
            <div class="">
              <div class="works-edit-select">
                <nav class="course-nav">
                  <div class="container">
                    <ul class="nav-scroll">
                      <li><a type="button" class="on-switch-type" data-toggle="collapse" data-target="#stordetail" href="#course-about">Story Details</a></li>
                    </ul>
                  </div>
                </nav> <br>
              </div>
              <div class="collapse in">
                <div class="form-group title-form">
                    <label>Title</label>
                    <span class="empty-warning hidden" id="title-warning">Required</span>
                      <input class="input-text" type="text" name="title" required>
                    </div>
                <div class="form-group description-form">
                    <div class="form-wrapper">
                      <label>Description</label>
                        <span data-toggle="popover" class="popover-icon" id="description-tooltip" title="" data-original-title="Add a story description"><!-- <span class="fa fa-info fa-wp-lightergrey " aria-hidden="true" style="font-size:16px;"></span> --></span>
                        <span class="empty-warning hidden" id="description-warning">Required</span>
                    </div>
                    </textarea><textarea name="description" id="ckeditor" rows="10" cols="87" required></textarea>
                </div>
                <div class="form-group inline-form">
                    <div class="form-wrapper">
                      <label for="categoryselect">Category</label>
                      <span data-toggle="popover" class="popover-icon" id="category-tooltip" title="" data-original-title="What genre is your story?"><!-- <span class="fa fa-info fa-wp-lightergrey " aria-hidden="true" style="font-size:16px;"></span> --></span>
                      {{ Form::select('id_category', $category, null,['class' => 'form-control required', 'placeholder' => 'Pilih Category', 'required' => 'required']) }}
                      <span class="empty-warning hidden" id="category-empty-warning">Required</span>
                    </div>
                </div>
                <div class="inline-form-wrapper">
                  <div class="inline-form-row">
                      <div class="form-group inline-form">
                          <div class="form-wrapper">
                            <label>Language</label>
                            <span data-toggle="popover" class="popover-icon" id="language-tooltip" title="" data-original-title="What language is your story in?"><!-- <span class="fa fa-info fa-wp-lightergrey " aria-hidden="true" style="font-size:16px;"></span> --></span>
                            {{ Form::select('id_language', $language, null,['class' => 'form-control required', 'placeholder' => 'Pilih Bahasa', 'required' => 'required']) }}
                          </div>
                      </div>
                  </div>
                </div>
                <input class="button primary rounded col-md-offset-5" type="submit" value="SAVE">
              </div>
          </div>
        </div> 
      </div>
    </div>
   {!! Form::close() !!}    
  </div>         
</section>

<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'ckeditor' );
    </script>
@endsection