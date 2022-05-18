@extends('layouts.app')

@section('content')
<section id="home-blog">
	<div class="container">
  {{ Form::open(array('url' => '/create/chapter/.$story->id_story', 'method' => 'post')) }}
        <div class="collapse in">
            <div class="form-group title-form">
                <label>Title</label>
                    <span class="empty-warning hidden" id="title-warning">Required</span>
                <div contenteditable="false" class="story-title">
                <input class="input-text" type="text" name="title">
                </div>
            </div>
        </div>

        <div class="collapse in">
            <div class="form-group title-form">
                <label>Title</label>
                    <span class="empty-warning hidden" id="title-warning">Required</span>
                <div contenteditable="false" class="story-title">
                    <textarea cols="80" class="ckeditor" id="editeur" name="description" rows="60"></textarea>
                </div>
            </div>
        </div>
        
        <div class="form-group inline-form">
            <div class="form-wrapper">
              <label for="categoryselect">Part Story Status</label>
              <span data-toggle="popover" class="popover-icon" id="category-tooltip" title="" data-original-title="What genre is your story?"><!-- <span class="fa fa-info fa-wp-lightergrey " aria-hidden="true" style="font-size:16px;"></span> --></span>
              {{ Form::select('id', $part_story_status, null,['class' => 'form-control required', 'placeholder' => 'Pilih Part Story Status']) }}
              <span class="empty-warning hidden" id="category-empty-warning">Required</span>
            </div>
        </div>
        <input type="hidden" name="id_story" value="{{$story->id_story}}">
        <input type="hidden" name="tanggal_terbit" value="{{$today_now}}">
        <button type="submit" class="btn btn-primary pull-right">
            SAVE THE STORY
        </button>

    {!! Form::close() !!}
	</div>         
</section>
@endsection

<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
