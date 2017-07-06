@extends('layouts.home')

@section('stylesheets')
@endsection

@section('content')

    <div class="banner" id="home">
        <div class="agileinfo-dot">
            <div class="header">
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="agileits-logo">
                            <h1><a href="{{ url('/') }}">Market Place</a></h1>
                        </div>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                        <nav>
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="#services" class="scroll">Categories</a></li>
                                <li><a href="#team" class="scroll">Freelancers</a></li>
                                <li><a href="#news" class="scroll">News</a></li>
                                <li><a href="#mail" class="scroll">Contact Us</a></li>
                                @if (Auth::guest())
                                    <li><a href="{{ route('login') }}">Log In</a></li>
                                    <li><a href="{{ url('register-as') }}" >Sign In</a></li>
                                @else
                                    <li>
                                        <a href="{{ url("/".Auth::user()->role) }}">My Account</a>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                    <!-- /.navbar-collapse -->
                </nav>
            </div>
            <div class="market-banner-info">
                <div class="container">
                    <div class="agileits-slider">
                        <div class="slider">
                            <div class="callbacks_container">
                                <ul class="rslides callbacks callbacks1" id="slider4">
                                    <li>
                                        <div class="agileits-banner-info">
                                            <h3>Designers & Developers</h3>
                                            <h6>What is Lorem Ipsum?</h6>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                Lorem Ipsum has been the industry's standard dummy text ever since the
                                                1500s, when an unknown printer took a galley of type and scrambled it
                                                to </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="agileits-banner-info">
                                            <h3>Virtual Assistants</h3>
                                            <h6>Why do we use it?</h6>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                Lorem Ipsum has been the industry's standard dummy text ever since the
                                                1500s, when an unknown printer took a galley of type and scrambled it
                                                to </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="agileits-banner-info">
                                            <h3>Sales Exaperts</h3>
                                            <h6>Where can I get some?</h6>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                Lorem Ipsum has been the industry's standard dummy text ever since the
                                                1500s, when an unknown printer took a galley of type and scrambled it
                                                to </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                            <!--banner Slider starts Here-->
                        </div>
                    </div>
                    <div class="mp-arrow bounce animated">
                        <a href="#services" class="scroll"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('home.services')
    @include('home.news')
    @include('home.contact_us')
@endsection

@section('scripts')
@endsection