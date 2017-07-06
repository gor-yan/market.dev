@extends('layouts.home')
@section('stylesheets')
    <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}">
@endsection
@section('content')
    <!-- banner -->
    @include('common.header1')

    <div class="services" id="login">
        <div class="container">
            <div class="agile-heading">
                <h3>Log in and start your work</h3>
            </div>
            <div class="wthree-services-grids">
                <div class="col-sm-offset-3 col-sm-6 wthree-services">
                    <div class="wthree-services-grid">
                        <div class="wthree-services-info">
                            <form method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus placeholder="Username or Email">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-default">Log In</button>
                            </form>

                            <div class="form-group">
                                <a href="{{ url('/register-as') }}" id="sign_up">Sign Up</a>
                                <a href="{{ route('password.request') }}" id="forgot_password">
                                    Forgot Password ?
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection