@extends('layouts.app')
@section('content')

@if($errors->any())
<div class="alert alert-danger alert-block">
	<button type="button" style="color:#fff;" class="close" data-dismiss="alert">x</button>
	<strong style="font-family: Palatino; font-size: 14px">{{$errors->first()}}</strong>
</div>
@endif

<div class="container">
    <div class="col-md-12 form-bag">
        <div class="text-center">
            <label>Writing Program Novel</label>
        </div>
        {!! Form::model($program_novel,['files'=>true,'method'=>'post','action'=>['HomeController@updateformulirProgramNovel',$program_novel->id]]) !!}
        <div class="form-group">
            <label class="form-label">Judul</label>
            <input type="text" name="title" value="{{ $program_novel->title }}" class="form-control">
        </div>
        <div class="form-group">
            <label class="form-label">Genre</label>
            {{ Form::select('category_id',$genres, $program_novel->category_id,['class' => 'form-control']) }}
        </div>
    </div>

    <div class="col-md-12 form-bag">
        @if($part_writing_program_1)
        <div class="form-flow">
            <label>{{ $part_writing_program_1->title }}</label>
            <p>{{ $part_writing_program_1->desc }}</p>
            <textarea rows="4" cols="50" type="text" name="stage_1" class="form-control" placeholder="Kosongkan jika data belum ada">{{ $program_novel->stage_1 }}</textarea>
        </div>
        @endif
        <br>
        @if($part_writing_program_2)
        <div class="form-flow">
            <label>{{ $part_writing_program_2->title }}</label>
            <p>{{ $part_writing_program_2->desc }}</p>
            <textarea rows="4" cols="50" type="text" name="stage_2" class="form-control" placeholder="Kosongkan jika data belum ada">{{ $program_novel->stage_2 }}</textarea>
        </div>
        @endif
        <br>
        @if($part_writing_program_3)
        <div class="form-flow">
            <label>{{ $part_writing_program_3->title }}</label>
            <p>{{ $part_writing_program_3->desc }}</p>
            <textarea rows="4" cols="50" type="text" name="stage_3" class="form-control" placeholder="Kosongkan jika data belum ada">{{ $program_novel->stage_3 }}</textarea>
        </div>
        @endif
        <br>
        @if($part_writing_program_4)
        <div class="form-flow">
            <label>{{ $part_writing_program_4->title }}</label>
            <p>{{ $part_writing_program_4->desc }}</p>
            <textarea rows="4" cols="50" type="text" name="stage_4" class="form-control" placeholder="Kosongkan jika data belum ada">{{ $program_novel->stage_4 }}</textarea>
        </div>
        @endif
        <br>
        @if($part_writing_program_5)
        <div class="form-flow">
            <label>{{ $part_writing_program_5->title }}</label>
            <p>{{ $part_writing_program_5->desc }}</p>
            <textarea rows="4" cols="50" type="text" name="stage_5" class="form-control" placeholder="Kosongkan jika data belum ada">{{ $program_novel->stage_5 }}</textarea>
        </div>
        @endif
        <br>
        @if($part_writing_program_6)
        <div class="form-flow">
            <label>{{ $part_writing_program_6->title }}</label>
            <p>{{ $part_writing_program_6->desc }}</p>
            <textarea rows="4" cols="50" type="text" name="stage_6" class="form-control" placeholder="Kosongkan jika data belum ada">{{ $program_novel->stage_6 }}</textarea>
        </div>
        @endif
        <br>
        @if($part_writing_program_7)
        <div class="form-flow">
            <label>{{ $part_writing_program_7->title }}</label>
            <p>{{ $part_writing_program_7->desc }}</p>
            <textarea rows="4" cols="50" type="text" name="stage_7" class="form-control" placeholder="Kosongkan jika data belum ada">{{ $program_novel->stage_7 }}</textarea>
        </div>
        @endif
        <br>
        @if($part_writing_program_8)
        <div class="form-flow">
            <label>{{ $part_writing_program_8->title }}</label>
            <p>{{ $part_writing_program_8->desc }}</p>
            <textarea rows="4" cols="50" type="text" name="stage_8" class="form-control" placeholder="Kosongkan jika data belum ada">{{ $program_novel->stage_8 }}</textarea>
        </div>
        @endif
        <br>
        @if($part_writing_program_9)
        <div class="form-flow">
            <label>{{ $part_writing_program_9->title }}</label>
            <p>{{ $part_writing_program_9->desc }}</p>
            <textarea rows="4" cols="50" type="text" name="stage_9" class="form-control" placeholder="Kosongkan jika data belum ada">{{ $program_novel->stage_9 }}</textarea>
        </div>
        @endif
        <br>
        @if($part_writing_program_10)
        <div class="form-flow">
            <label>{{ $part_writing_program_10->title }}</label>
            <p>{{ $part_writing_program_10->desc }}</p>
            <textarea rows="4" cols="50" type="text" name="stage_10" class="form-control" placeholder="Kosongkan jika data belum ada">{{ $program_novel->stage_10 }}</textarea>
        </div>
        @endif
    </div>
    
    <div class="col-md-12 form-bag">
        <div class="form-flow">
            <label>Kerangka Tersebut Menjadi</label>
            <input type="text" name="book_id" class="form-control" placeholder="Paste link novel kamu hasil pengembangan dari kerangka di atas" value="{{ $program_novel->book_id }}">
            <p>(Diisi setelah menurut kamu kerangka yang dibuat matang)</p>
            <div class="text-right">
                <button class="btn btn-baca" type="submit">Simpan</button>
                <button class="btn btn-baca">Batal</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>

@endsection