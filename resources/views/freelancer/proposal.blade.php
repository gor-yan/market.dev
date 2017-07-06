@extends('layouts.home')
@section('stylesheets')
    <link rel="stylesheet" href="{{asset('assets/css/freelancer/settings.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/freelancer/proposal.css')}}">
@endsection
@section('content')
    @include('freelancer.header')
    <div class="job_editing">
        <div class="container">
            <h3>Proposal for {{$job->title}}</h3>
            <div class="edit-job proposal-job">
                <form action="{{url('/freelancer/proposal/submit')}}" method="post" class="form-horizontal">
                    {{csrf_field()}}
                    <div class="col-sm-12">
                        <div class="col-sm-12">
                    <div class="form-group">
                        <textarea name="cover_letter" id="cover_letter" class="form-control {{ $errors->has('cover_letter') ? ' has-error' : '' }}" rows="10" placeholder="Cover Letter">{{ old('cover_letter') }}</textarea>
                    </div>
                        <div class="form-group">
                            @if($job->type == 'hourly')
                            Hourly Rate
                            @else
                                Fixed Rate
                            @endif
                            <input type="number" step="0.01" name="rate" class="{{ $errors->has('rate') ? ' has-error' : '' }} form-control" value="{{old('rate')}}"/>
                        </div>
                        </div>
                        </div>

                    <div class="col-sm-12">
                        <div class="col-sm-12">
                    <div class="form-group">
                        Estimation In Hours
                        <input type="number" name="estimation" class="{{ $errors->has('estimation') ? ' has-error' : '' }} form-control" value="{{old('fixed_rate')}}"/>
                    </div>
                    </div>
                    </div>
                    <input type="hidden" name="job_id" value="{{$job->id}}" />
                    <div class="text-center">

                    <button class="btn btn-info">Submit For Proposal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {{--<script src="{{asset('assets/js/freelancer/settings.js')}}"></script>--}}
@endsection