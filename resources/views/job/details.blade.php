@extends('layouts.home')
@section('stylesheets')
    <link rel="stylesheet" href="{{asset('assets/css/jobdetails.css')}}">
@endsection
@section('content')
    @include($header)
        <div class="container job-details">
            <h3 class="text-center">Job Details</h3>
            @if(auth()->user()->isClient())
                <a class="btn btn-warning pull-right" href="{{url("/client/job/edit/$job->id")}}">Edit</a>
            @elseif(auth()->user()->isFreelancer())
                @if($submitted)
                    <a class="btn btn-default pull-right disabled" href="#">Already submitted</a>
                @else
                    <a class="btn btn-success pull-right" href="{{url("/freelancer/proposal/$job->id")}}">Proposal</a>
                @endif

            @endif
            <div class="one-job-details">
                <h4 class="text-center">{{$job->title}}</h4>
                <p class="job_desc">{{$job->description}}</p>
                <span>{{$job->type}} / {{$job->hourly_limit}} hr</span>
                <span class="pull-right">{{$job->budget}} $</span>
                <div class="text-center file-attached">
                    @if ($job->attached_files)
                        Attached Files
                        <a href="{{url("/job/download/$job->attached_files")}}">Download</a>
                    @else
                        <p>No Attached Files</p>
                    @endif
                </div>
                <span class="col-xs-4 text-center mt20"><strong>Job Status - </strong>{{$job->status}}</span>
                <span class="col-xs-4 text-center mt20"><strong>Deadline - </strong>{{$job->open_untill}}</span>
                <span class="col-xs-4 text-center mt20"><strong>Created - </strong>{{$job->created_at}}</span>
                <div class="categories_job"> Categories --
                    @forelse($job->categories as $cat)
                        <span>{{$cat->name}}</span>
                    @empty
                        No Categories
                    @endforelse
                </div>
                <div class="categories_job skill_job"> Skills --
                    @forelse($job->skills as $skill)
                       <span> {{$skill->name}}</span>
                    @empty
                        No Categories
                    @endforelse
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

@endsection
@section('scripts')
    <script src="{{asset('assets/js/jobdetails.js')}}"></script>
@endsection