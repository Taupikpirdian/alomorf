@extends('layouts.app')
<style>
p.padding {
    padding-bottom: 2cm;
}

p.padding2 {
    padding-bottom: 50%;
}
</style>
@section('content')

<section id="home-blog">
  <div class="container">
    @if($errors->any())
      <div class="alert alert-success">
        <button type="button" style="color:#fff;" class="close" data-dismiss="alert">x</button>
        <strong style="font-family: Palatino; font-size: 14px">{{$errors->first()}}</strong>
      </div>
    @endif
    <div class="col-lg-3 col-md-2 col-sm-12" id="picture-sidebar">
      <div class="image-placeholder new-image file-upload file-drop" data-file-upload="drop">
        <div class="image-placeholder">
          <a data-toggle="modal" data-target="#uploadCover" title="Ubah Cover" href="#" target="_blank">
            <img src="/images/story/{{$story->cover_photo}}" alt="Untitled Story" width="100%" height="256" class="cover cover-xlg edit-cover">
          </a>        
        </div>
        <br>
        <input class="btn btn-info" type="button" value="Copy Url" onclick="Copy();">
        <textarea id="url" rows="1" cols="30"></textarea>
        <!-- Upload Image -->
        <div class="modal fade" id="uploadCover" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            {!! Form::model($story,['files'=>true,'method'=>'post','action'=>['admin\StoryController@changeCover',$story->id_story]]) !!}
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Upload Cover</h5>
                </div>
                <div class="modal-body">
                  {{ csrf_field() }}
                  <label>Pilih file cover</label>
                  <div class="form-group">
                    <input type="file" name="cover_photo" required="required">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-default">Ubah</button>
                </div>
              </div>
            {!! Form::close() !!}
          </div>
        </div>
        <!-- End -->
        <div id="cover-uploader" class="button-group inline-block dropdown hidden">
          <div class="cover-edit-prompt">
            <div class="default-state">
                <span class="on-cover-edit hidden" data-toggle="dropdown">Edit your cover</span>
                <span data-toggle="dropdown"></span>
                <span class="fa fa-edit fa-wp-white on-cover-edit-icon" aria-hidden="true" style="font-size:16px;"></span>
                <div class="triangle">
                  <ul id="works-more-options-" class="dropdown-menu cover-edit-dropdown" role="menu">
                    <li>
                      <a class="file-select" role="button" href="#" data-toggle="modal" data-target="#worksDelete">
                        Upload Cover
                      </a>
                    </li>
                  </ul>
                </div>
            </div>
              <div class="drag-state">
                <span class="on-cover-edit hidden">Drop your cover</span>
                <span class="fa fa-plus fa-wp-white on-cover-edit-icon" aria-hidden="true" style="font-size:16px;"></span>
              </div>
          </div>
        </div>
        <span class="empty-warning hidden">Required</span>
        <input accept="image/jpeg, image/png, image/gif" type="file" name="file" style="position: absolute; right: 0px; top: 0px; opacity: 0; height: 0; width: 0" />
      </div>
    </div>
    <div class="col-lg-8 col-lg-offset-1 col-sm-12 col-md-9 col-md-offset-1" id="main-edit-container">
      <div class="row inner-post">
        <div class="tabs-container">
          <nav class="course-nav">
            <div class="container">
              <ul class="tabs">
                <li><a href="#storedetail">Decription</a></li>
                <li><a href="#tableofcontent">Table of content</a></li>
              </ul>
            </div>
          </nav>
          <!-- Form edit  -->
          <div id="storedetail" class="tab-content">
            {!! Form::model($story,['method'=>'put','action'=>['admin\StoryController@updateStory',$story->id_story]]) !!}
            <div class="form-group title-form">
              <label>Title</label>
              <span class="empty-warning hidden" id="title-warning">Required</span>
              <input class="form-control required" name="title" type="text" value="{{$story->title}}" required>
            </div>

            <div class="form-group description-form">
              <div class="form-wrapper">
                <label>Description</label>
                  <span data-toggle="popover" class="popover-icon" id="description-tooltip" title="" data-original-title="Add a story description"><span class="fa fa-info fa-wp-lightergrey " aria-hidden="true" style="font-size:16px;"></span></span>
                  <span class="empty-warning hidden" id="description-warning">Required</span>
              </div>
              <textarea class="form-control ckeditor required" id="ckeditor" name="description" type="text" required>{{$story->description}}</textarea>
            </div>

            <div class="form-group inline-form">
              <div class="form-wrapper">
                <label for="categoryselect">Category</label>
                <span data-toggle="popover" class="popover-icon" id="category-tooltip" title="" data-original-title="What genre is your story?">
                </span>
                {{ Form::select('id_category', $category, $story->id_category,['class' => 'form-control required', 'required' => 'required']) }}
                <span class="empty-warning hidden" id="category-empty-warning">Required</span>
              </div>
            </div>

            <div class="inline-form-wrapper">
              <div class="inline-form-row">
                  <div class="form-group inline-form">
                      <div class="form-wrapper">
                        <label>Language</label>
                        <span data-toggle="popover" class="popover-icon" id="language-tooltip" title="" data-original-title="What language is your story in?"><span class="fa fa-info fa-wp-lightergrey " aria-hidden="true" style="font-size:16px;"></span></span>
                          {{ Form::select('id_language', $language, $story->id_language,['class' => 'form-control required', 'required' => 'required']) }}
                      </div>
                  </div>
              </div>
            </div>

            <input class="button primary rounded col-md-offset-5" type="submit" name="save" id="save" value="EDIT STORY DETAILS">
            {!! Form::close() !!}
          </div>
          <!-- End Edit -->
          <div id="tableofcontent" class="tab-content">
            <div class="create-story">
              <a href="{{ url('/create/chapter/'.$story->id_story) }}" class="btn btn-info fa fa-plus-square" role="button" aria-label="Create a Story button.">New Part/Chapter</a>
            </div>
            <hr>
            <div class="content">
              <!-- <div class="courses nav-scroll"> -->
                <ol>
                @foreach($part_stories as $i=>$part_stori)
                  <li>
                    <a class="thumb" href="{{ url('/book-read/'.$part_stori->id_part_story) }}"></a>
                    <div class="info">
                      <div class="info-book-id">
                          <h4><a href="{{ url('book-read/'.$part_stori->id_part_story) }}">{{$part_stori->title}}</a></h4>
                      </div>
                      <div class="info-book-id">
                        <div class="info-book-span">
                          <a href="{{ url('part-story/edit/'.$part_stori->id_part_story) }}" ><i class="fa fa-edit"></i> Edit</a>
                        </div>
                        <div class="info-book-span">
                          <form id="delete_part_story{{$part_stori->id_part_story}}" action='{{URL::action("HomeController@destroyPartStory",array($part_stori->id_part_story))}}' method="POST">
                              <input type="hidden" name="_method" value="delete">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <a href="#" onclick="document.getElementById('delete_part_story{{$part_stori->id_part_story}}').submit();"><i class="fa fa-trash"></i> Hapus</a>
                          </form>
                        </div>
                      </div>
                    </div>
                  </li>
                <hr>
                @endforeach
                </ol>
              <!-- </div> -->
            </div> <!-- content tab -->
          </div>
        </div> 
      </div>
    </div>
  </div>         
</section>

<script type="text/javascript">
    function Copy() {
      var Url = document.getElementById("url");
      Url.innerHTML = window.location.href;
      console.log(Url.innerHTML)
      Url.select();
      document.execCommand("copy");
    }
</script>

  <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'ckeditor' );
    </script>
@endsection