
@extends('layouts.app')

@section('content')

        

<div id="content" class="site-content shop-content">
                <div class="container">
                    <div class="breadcrumb" align="center">
                        <div class="contact-form col-md-6 col-md-offset-3">
                            <h2 class="title">LOGIN</h2><br>
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                                <input id="email" type="email" class="input-text" placeholder="Your Email/Username" name="email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                <br>
                                <input id="password" type="password" class="input-text" placeholder="Password" name="password" required>
                                    @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                <div class="checkbox">
                                            <input id="send" type="checkbox" value="1">
                                            <label for="send">Remember me</label>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
                                    <a href="{{ url('/register') }}"><button type="button" class="btn btn-primary" a href="{{ url('/register') }}">
                                        Register
                                        </button>
                                    </a>
                                    <a href="{{ url('password/reset') }}"><button type="button" class="btn btn-primary" a href="{{ url('password/reset') }}">
                                        Reset Password
                                        </button>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div><!-- .breadcrumb -->
                </div><!-- .container --><br><br>
</div>

@endsection
