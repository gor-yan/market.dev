<?php

namespace App\Http\Controllers;

use App\Models\Job;

class ClientController extends Controller
{
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function index()
    {
        $jobs = auth()->user()->jobs;
        return view('client.index')->with(['jobs' => $jobs]);;
    }

    /**
     * @return mixed
     */
    public function allJobs()
    {
        $jobs = auth()->user()->jobs;
        return view('client.allJobs')->with(['jobs' => $jobs]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function allJobProposals($id) {
        $job = Job::find($id);
        $proposals = $job->proposals;
        return view('client.proposals')->with([
            'proposals' => $proposals,
            'job' => $job
        ]);
    }
}

























