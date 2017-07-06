<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProposalsRequest;
use App\Models\Proposal;
use App\Models\Job;
use App\User;
use Illuminate\View\View;

class ProposalsController extends Controller
{
    /**
     * Show current Proposal
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $proposal = Proposal::with('users')->find($id);
        if ($proposal) {
            return view('proposals.index')->with([
                'proposal' => $proposal,
                'owner' => User::find($proposal->user_id)
            ]);
        } else {
            abort(404);
        }

    }

    /**
     * Open a proposal view for current Job
     * @param integer $id (job id)
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function proposal($id)
    {
        $job = Job::find($id);
        return view('freelancer.proposal')->with([
            'job' => $job
        ]);
    }

    /**
     * Edit Proposal
     * @param int $id Proposal Id
     * @return View
     */
    public function edit($id)
    {
        $proposal = Proposal::find($id);
        $job = Job::find($proposal->job_id);
        return view('freelancer.proposal-edit')->with([
            'job' => $job,
            'proposal' => $proposal
        ]);
    }

    /**
     * Add new Proposal for job
     * @param ProposalsRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function submitProposal(ProposalsRequest $request)
    {
        $isExist = Proposal::where('job_id', '=', $request->job_id)->with('users')->get();

        if(empty($isExist)) {
            $proposal = new Proposal($request->all());
            auth()->user()->proposals()->save($proposal);
        } else {
            $proposal = Proposal::find($request->id);
            $proposal->update($request->all());
        }
        return redirect('/freelancer');
    }
}























