@extends('layouts.home')
@section('stylesheets')
    <link rel="stylesheet" href="{{asset('assets/css/freelancer/settings.css')}}">
@endsection
@section('content')
    @include('freelancer.header')
    @include('freelancer.settingsTabs')
    <div>
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="paymentSettings">Payment Settings</div>
        </div>

    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/js/freelancer/settings.js')}}"></script>
@endsection