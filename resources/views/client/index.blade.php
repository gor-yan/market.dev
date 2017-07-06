@extends('layouts.home')
@section('stylesheets')
    <link rel="stylesheet" href="{{asset('assets/css/client/settings.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
@endsection
@section('content')
    @include('client.header')
    {{--// Karas dnes div-i mej u stylener tas--}}
    <div class="container">

        <h1 class="text-center" style="padding: 40px; color: #a78300; min-height: 250px;">Under Construction</h1>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/js/client/settings.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
@endsection