@extends('layouts.app')
@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

<section id=home-blog>
      <div id="creation-works-listing " class="container">
          <div class="row col-md-offset-2">
              <div class="col-md-9" align="center">
                  <header>
                      <div>
                          <h2>
                              <b>My Profile</b>
                          </h2>
                          <br>
                      </div>
                  </header>
                        <div class="panel">
                            <div class="inner-post-1 col-md-12">

                          	@if($errors->any())
                              <div class="alert alert-success alert-block">
                                  <button type="button" style="color:#fff;" class="close" data-dismiss="alert">x</button>
                                  <strong style="font-family: Palatino; font-size: 14px">{{$errors->first()}}</strong>
                              </div>
                            @endif

                            {!! Form::model($user,['method'=>'put','action'=>['ProfilController@update',$user->id]]) !!}
                            <center>
                                <img class="img-responsive" style="width:40%" src="/front/images/user-480.png">
                            </center>
                            <br>
                              <div class="form-group">
                                  <label >Email address</label>
                                  <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" value="{{ $user->email }}" disabled>
                                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                              </div>

                              <div class="form-group">
                                  <label>Nama</label>
                                  <input type="text" class="form-control" name="name" placeholder="Nama Akun" value="{{ $user->name }}">
                              </div>

                              <div class="form-group">
                                  <label>Nomor Hp</label>
                                  <input type="text" class="form-control" name="nomor_hp" placeholder="Kontak" value="{{ $user->userProfil->nomor_hp }}">
                              </div>

                              <div class="form-group">
                                  <label>Deskripsi</label>
                                  <textarea type="text" class="form-control" name="deskripsi" placeholder="Deskripsi data diri">{{ $user->userProfil->deskripsi }}</textarea>
                              </div>

                              <div class="form-group">
                                  <label>Tempat Lahir</label>
                                  <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat lahir" value="{{ $user->userProfil->tempat_lahir }}">
                              </div>

                              <div class="form-group">
                                  <label>Tanggal Lahir</label>
                                  <input type="text" class="form-control" id="datepicker" name="tanggal_lahir" placeholder="Tanggal lahir" value="{{ $user->userProfil->tanggal_lahir }}">
                              </div>

                              <div class="form-group">
                                  <label>Alamat</label>
                                  <textarea type="text" class="form-control" name="alamat" placeholder="Deskripsi data diri">{{ $user->userProfil->alamat }}</textarea>
                              </div>

                              <div class="form-group">
                                  <label>Sekolah</label>
                                  <input type="text" class="form-control" name="sekolah" placeholder="Sekolah" value="{{ $user->userProfil->sekolah }}">
                              </div>

                              <div class="form-group">
                                  <label>Kota</label>
                                  <input type="text" class="form-control" name="kota" placeholder="Kota" value="{{ $user->userProfil->kota }}">
                              </div>

                              <button type="submit" class="btn btn-primary">Submit</button>

                            {!! Form::close() !!}
                        </div>
                      </div>
                  </div>
              </div>
          </div><br>
      </div>
</section>

<script type="text/javascript">
    $('#datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
     });
</script>
@endsection