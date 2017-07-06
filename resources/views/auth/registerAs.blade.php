@extends('layouts.home')
@section('stylesheets')
    <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}">
@endsection
@section('content')
    @include('common.header1')
    <div class="services" id="checkRole">
        <div class="container">
            <div class="agile-heading">
                <h3>Please Submit your User Role</h3>
            </div>
            <div class="wthree-services-grids">
                <div class="col-sm-offset-2 col-sm-4 wthree-services">
                    <div class="wthree-services-grid info-content">
                        <div class="wthree-services-info">
                            <h4><span class="text-uppercase">I </span>want hire a freelancer </h4>
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <a class="to-register" href="{{url('register-as/client')}}">Start</a>
                        </div>
                    </div>
                </div>
                <div class=" col-sm-4 wthree-services">
                    <div class="wthree-services-grid info-content">
                        <div class="wthree-services-info">
                            <h4> <span class="text-uppercase">I </span> want get remote job </h4>
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <a class="to-register"  href="{{url('register-as/freelancer')}}">Start</a>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection
