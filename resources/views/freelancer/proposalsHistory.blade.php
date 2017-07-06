@extends('layouts.home')
@section('stylesheets')
    <link rel="stylesheet" href="{{asset('assets/css/freelancer/history.css')}}">
@endsection
@section('content')
    @include('freelancer.header')
    <div class="container">
        <div class="row">
            <div class="agile-heading margins">
                <h3>My Proposals</h3>
            </div>
            <div class="wthree-services-grid mb40">

                @forelse($proposals as $item)
                    <div class="col-sm-offset-2 col-sm-8 mt10" style="margin-bottom: 10px; box-shadow: 0 0 4px #a78300;">
                        <h3 class="proposal_name text-left" style="text-align: left">{{ $item->cover_letter }}</h3>
                        <div class="job-info-about">
                            <span>Rate {{ $item->rate }} $ ||</span> <span>Hours - {{ $item->estimation }}</span>
                        </div>

                        <div class="more-about">
                            <a href="{{url("/freelancer/proposals/$item->id")}}"> Read More </a>
                        </div>
                    </div>
                @empty
                    <p>No Proposals</p>
                @endforelse
                {{$proposals->links()}}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/js/freelancer/history.js')}}"></script>
@endsection