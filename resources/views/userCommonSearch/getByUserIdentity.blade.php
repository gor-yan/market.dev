@extends('layouts.home')
@section('stylesheets')

@endsection
@section('content')
    @include('client.header')

    <div class="container">
        <div class="row">
            <div class="agile-heading margins">
                <h3> User</h3>
            </div>
            <div class="wthree-services-grid mb40  pd15">
            <div class="col-sm-12">
                <div class="row p10">

                    <div class="col-sm-3">
                        @if ($user->image)
                            <label style="cursor: pointer" for="image_input">
                                <img class="img-responsive img-circle"
                                     src="{{asset('storage/personal_img/'.Auth::user()->image)}}">
                            </label>
                        @else
                            <label style="cursor: pointer" for="image_input">
                                <img class="img-responsive"
                                     src="{{asset('assets/images/user-default.png')}}">
                            </label>
                        @endif
                    </div>
                    <div class="col-md-6 ">
                        <h3> {{ $user->name}}</h3>
                        <h4 class="text-center">{{$user->surname    }}</h4>
                        <div>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <h3>$35.00 /hr</h3>
                    </div>
                </div>
                <hr>
                <br>
                <hr>    {{--
                <p>{{$user}} </p>--}}

            </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection