@extends('layouts.home')
@section('stylesheets')
    <link rel="stylesheet" href="{{asset('assets/css/client/settings.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
@endsection
@section('content')
    @include('client.header')
    <div class="container">
        <div class="see_proposals">
                <h3 class="text-center">All Proposals for Job N #{{$job->id}} # {{$job->title}}</h3>
                <div class="all_jobs_content job_proposals">
                    <table id="job_proposals">
                        <thead>
                        <tr>
                            <th>Freelancer Name</th>
                            <th>Rate</th>
                            <th>Estimation</th>
                            <th>Cover Letter</th>
                            <th>Submitted at</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($proposals as $item)
                            <tr>
                            {!!  !!}}
                                <td> {{ \App\Repositories\UserRepository::getProposalOwner($item->user_id) }} </td>
                                <td> {{ $item->rate }} </td>
                                <td> {{ $item->estimation }} </td>
                                <td> {{ str_limit($item->cover_letter, 200) }}</td>
                                <td> {{ $item->created_at }} </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Actions
                                            <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{url("/client/proposals/$item->id")}}">Detailed View</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/js/client/settings.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
@endsection