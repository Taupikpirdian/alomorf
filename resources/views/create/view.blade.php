@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <section id="home-blog">
    <div class="container">
          {!! Form::model($userprofile,['method'=>'put', 'files' => true,'action'=>['HomeController@updateView',$userprofile->id]]) !!}
        <div class="container">
          <div class="breadcrumb ">
              <div class="inner-post col-md-6 col-md-offset-3 shadow" align="center">
                @if($userprofile->foto_profile)
                <img data-reactroot="" id="profile-avatar" width="150px" src="/images/foto_profile/thumbs/{{$userprofile->foto_profile }}" aria-hidden="true">
                @else
                <img class="img-responsive" style="width:40%" src="/front/images/user-480.png">
                @endif
                <p style="color:#000">{{ $userprofile->name }}</p>
                <!-- <div style="color:#000" class="row header-metadata col-md-offset-2">
                  <div class="col-xs-3 " data-id="profile-works">
                    <p>0</p>
                    <p>Works</p>
                  </div>
                  <div class="col-xs-3 scroll-to-element" data-id="profile-lists">
                    <p>1</p>
                    <p>Reading List</p>
                  </div>
                  <div class="col-xs-3">
                    <p class="followers-count">0</p>
                    <p>Followers</p>
                  </div>
                </div> -->
              </div>
          </div><!-- .breadcrumb -->

        <div class="inner-post col-md-6 col-md-offset-3">
            <form class="form-horizontal" style="color:#000">
              <div class="form-group form-group">
                <label class="col-md-4 control-label" for="formGroupInputLarge">Foto</label>
                <div class="col-md-8">
                  <input type="file" id="inputgambar" name="foto_profile" class="validate"/ >
                  <span class="error">{{$errors->first('foto_profile')}}</span>
                  <div style="height:3px">
                  </div>
                </div>
              </div>

              <div class="form-group form-group">
                <label class="col-sm-4 control-label" for="formGroupInputLarge">Nama</label>
                <div class="col-md-8">
                  <input class="form-control" type="text" id="formGroupInputLarge" name="name" placeholder="Wajib Diisi" required value="{{ $userprofile->name }}">
                </div>
              </div>

              <div class="form-group form-group">
                <label class="col-md-4 control-label" for="formGroupInputLarge">Tempat Lahir</label>
                <div class="col-md-8">
                  <input class="form-control" type="text" id="formGroupInputLarge" name="tempat_lahir" required value="{{ $userprofile->tempat_lahir }}">
                </div>
              </div>

              <div class="form-group form-group">
                <label class="col-md-4 control-label" for="formGroupInputLarge">Tanggal Lahir</label>
                <div class="col-md-8">
                  {{ Form::text('tanggal_lahir', $userprofile->tanggal_lahir, ['id' => 'datepicker']) }}
                </div>
              </div>

              <div class="form-group form-group">
                <label class="col-md-4 control-label" for="formGroupInputLarge">Sekolah</label>
                <div class="col-md-8">
                  <input class="form-control" type="text" id="formGroupInputLarge" name="sekolah" required value="{{ $userprofile->sekolah }}">
                </div>
              </div>

              <div class="form-group form-group">
                <label class="col-md-4 control-label" for="formGroupInputLarge">Kota</label>
                <div class="col-md-8">
                  <input class="form-control" type="text" name="kota" id="formGroupInputLarge" required value="{{ $userprofile->kota }}">
                </div>
              </div>

              <div class="form-group form-group">
                <label class="col-md-4 control-label" for="formGroupInputLarge">Email</label>
                <div class="col-md-8">
                  <input class="form-control" type="text" id="formGroupInputLarge" name="email" value="{{ $userprofile->email }}" disabled>
                </div>
              </div>

              <div class="form-group form-group">
                <label class="col-md-4 control-label" for="formGroupInputLarge">No Telepon/HP</label>
                <div class="col-md-8">
                  <input class="form-control" type="text" id="formGroupInputLarge" name="nomor_hp" value="{{ $userprofile->nomor_hp }}">
                </div>
              </div>

              <div class="form-group form-group">
                <label class="col-md-4 control-label" for="formGroupInputLarge">Alamat/Domisili</label>
                <div class="col-md-8">
                <textarea rows="10" cols="65" type="text" class="form-control" name="alamat" placeholder="Alamat/Domisili">{{ $user->userProfil->alamat }}</textarea>
                </div>
              </div> 

              <div class="form-group form-group">
                <label class="col-md-4 control-label" for="formGroupInputLarge">Tentang</label>
                <div class="col-md-8">
                <textarea rows="10" cols="65" type="text" class="form-control" name="deskripsi" placeholder="Deskripsi data diri">{{ $user->userProfil->deskripsi }}</textarea>
                </div>
              </div> 

            </form>

              <div class="inner-post col-md-6 col-md-offset-3">
                <div class="form-group form-group" align="center">
                  <input class="button primary rounded" type="submit" value="SAVE">
                </div>
          </div>
        </div>  
        {!! Form::close() !!}
    </div><!-- .container -->
  </div>
  </section>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script>
  $(function() {
    $("#datepicker").datepicker({
      changeYear: true,
      changeMonth: true,
      dateFormat: "yy-mm-dd",
      forceParse: false
    });
  });
  </script>
@endsection