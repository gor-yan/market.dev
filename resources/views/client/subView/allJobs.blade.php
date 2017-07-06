
<h3 class="text-center">Jobs</h3>
<div class="all_jobs_content">
    <hr>
    <div class="col-sm-12">
        <table id="client_posted_jobs">
            <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Type</th>
                <th>Budget</th>
                <th>Status</th>
                <th>Proposals</th>
                <th>Closed At</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($jobs as $job)
                <tr>
                    <td> {{ str_limit($job->title, 30) }} </td>
                    <td> {{ str_limit($job->description, 60) }} </td>
                    <td>{{ $job->type }} {{ $job->hourly_limit }}</td>
                    <td>{{ $job->budget }}</td>
                    <td>{{ $job->status }}</td>
                    <td>{{ count($job->proposals) }}</td>
                    <td>{{ $job->open_untill }}</td>
                    <td>{{ $job->created_at }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Actions
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url("/job/details/$job->id")}}">Detailed View</a></li>
                                <li><a href="{{ url("/client/job/proposals/{$job->id}")}}">View Proposals</a></li>
                                <li><a href="#">Other Details</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @empty
            @endforelse
            </tbody>
        </table>
    </div>
</div>