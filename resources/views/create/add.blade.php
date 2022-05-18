@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <section id="home-blog">
    <div class="container">
          {!! Form::model($user,['method'=>'put', 'files' => true,'action'=>['HomeController@createView',$user->id]]) !!}
        <div class="container">
          <div class="breadcrumb ">
              <div class="inner-post col-md-6 col-md-offset-3 shadow" align="center">
                <img class="img-responsive" style="width:40%" src="/front/images/user-480.png">
              </div>
          </div>

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
                  <input class="form-control" type="text" id="formGroupInputLarge" value="{{$user->name}}" name="name" placeholder="Wajib Diisi" required>
                </div>
              </div>

              <div class="form-group form-group">
                <label class="col-md-4 control-label" for="formGroupInputLarge">Tempat Lahir</label>
                <div class="col-md-8">
                  <input class="form-control" type="text" id="formGroupInputLarge" name="tempat_lahir" required>
                </div>
              </div>

              <div class="form-group form-group">
                <label class="col-md-4 control-label" for="formGroupInputLarge">Tanggal Lahir</label>
                <div class="col-md-8">
                  {{ Form::text('tanggal_lahir', '', ['id' => 'datepicker']) }}
                </div>
              </div>

              <div class="form-group form-group">
                <label class="col-md-4 control-label" for="formGroupInputLarge">Sekolah</label>
                <div class="col-md-8">
                  <input class="form-control" type="text" id="formGroupInputLarge" name="sekolah" required>
                </div>
              </div>

              <div class="form-group form-group">
                <label class="col-md-4 control-label" for="formGroupInputLarge">Kota</label>
                <div class="col-md-8">
                  <input class="form-control" type="text" name="kota" id="formGroupInputLarge" required>
                </div>
              </div>

              <div class="form-group form-group">
                <label class="col-md-4 control-label" for="formGroupInputLarge">Email</label>
                <div class="col-md-8">
                  <input class="form-control" type="text" value="{{$user->email}}" id="formGroupInputLarge" name="email" disabled>
                </div>
              </div>

              <div class="form-group form-group">
                <label class="col-md-4 control-label" for="formGroupInputLarge">No Telepon/HP</label>
                <div class="col-md-8">
                  <input class="form-control" type="text" id="formGroupInputLarge" name="nomor_hp">
                </div>
              </div>

              <div class="form-group form-group">
                <label class="col-md-4 control-label" for="formGroupInputLarge">Alamat/Domisili</label>
                <div class="col-md-8">
                <textarea rows="10" cols="65" type="text" class="form-control" name="alamat" placeholder="Alamat/Domisili"></textarea>
                </div>
              </div> 

              <div class="form-group form-group">
                <label class="col-md-4 control-label" for="formGroupInputLarge">Tentang</label>
                <div class="col-md-8">
                <textarea rows="10" cols="65" type="text" class="form-control" name="deskripsi" placeholder="Deskripsi data diri"></textarea>
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