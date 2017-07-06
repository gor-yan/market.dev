@extends('layouts.home')
@section('stylesheets')
    <link rel="stylesheet" href="{{asset('assets/css/proposals/proposals.css')}}">
@endsection
@section('content')
    @include(auth()->user()->role.'.header')

    <div class="container">
        @if (auth()->user()->isClient())
            <div class="agile-heading margins">
                <h3> Proposal</h3>
            </div>

            <div class="wthree-services-grid mb40  pd15">
            <div class="row">
                <div class="col-md-12 buttons-client text-center">
                    <a class="btn btn-info" href="{{url("freelancers/$owner->userIdentity")}}">Freelancer Account</a>
                    <a class="btn btn-primary disabled" href="#">Invite to chat</a>
                    <a class="btn btn-success disabled" href="#">Hire</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h3>CV - {{$proposal->cover_letter}}</h3>
                    <div class="job-info-about">
                        <span>Rate {{$proposal->rate}} $ || </span> <span> Hours -  {{$proposal->estimation}}</span>
                    </div>
                    <p>User - {{$owner->name}} </p>
                </div>
            </div>
            </div>
        @elseif(auth()->user()->isFreelancer())
            <div class="agile-heading margins">
                <h3> Proposal</h3>
            </div>
            <div class="wthree-services-grid mb40 pd15">

            <div class="row">
                <div class="col-md-12 buttons-client text-center">
                    <a class="btn btn-info" href="{{url("job/details/$proposal->job_id")}}">View Job</a>
                        {{--<a class="btn btn-danger" href="{{url("/freelancer/proposal/delete/$proposal->id")}}">Delete</a>--}}
                    <a class="btn btn-primary" href="{{url("/freelancer/proposal/edit/$proposal->id")}}">Edit</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h3>CV - {{$proposal->cover_letter}}</h3>
                    <div class="job-info-about">
                        <span>Rate {{$proposal->rate}} $ || </span> <span> Hours -  {{$proposal->estimation}}</span>
                    </div>
                </div>
            </div>
            </div>
        @endif
    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/js/proposals/proposals.js')}}"></script>
@endsection