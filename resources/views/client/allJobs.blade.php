@extends('layouts.home')
@section('stylesheets')
    <link rel="stylesheet" href="{{asset('assets/css/client/settings.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
@endsection
@section('content')
    @include('client.header')
    <br />
    <div class="container all_jobs">
        <a class="btn btn-success add-job-button" href="{{url('/client/job/add')}}">Add new Job</a>
        <div>
            @include('client.subView.allJobs')
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/js/client/settings.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
@endsection