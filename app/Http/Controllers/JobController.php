<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Repositories\JobRepository;
use App\Models\Category;
use App\Models\Skill;
use App\Models\Job;
use App\Repositories\StorageRepo;

class JobController extends Controller
{
    /**
     * Add new Job
     * @param JobRepository $jobRepository
     */
    public function add(JobRepository $jobRepository)
    {
        if (request()->ajax())
            return response('Not allowed for ajax requests', 500);

        if (request()->isMethod('post')) {
            $validator = $jobRepository->validate(request()->all());
            //dd($validator->errors());
            if ($validator->fails()) {
                return redirect('/client/job/add')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $jobRepository->save(request()->all());
                return redirect('/client/jobs');
            }
        } else {
            return view('job.add')->with([
                'skills' => Skill::all(),
                'categories' => Category::where('parent_id',null)->get(),
                'sub_categories' => Category::where('parent_id', '!=', null)->get(),
                'jobSkills' => $jobRepository->getJobSkillIds(),
                'jobCategories' => $jobRepository->getJobCategoryIds(),
            ]);
        }
    }

    /**
     * Get Job Details Page
     *
     */
    public function details($id)
    {
        $header = auth()->user()->role.'.header';
        $job = Job::find($id);
        $proposals = $job->proposals;
        $submitted = false;
        if ($proposals) {
            foreach ($proposals as $item) {
                if($item->user_id == auth()->user()->id) {
                    $submitted = true;
                    break;
                }
            }
        }
        return view('job.details')->with([
            'header' => $header,
            'job' => $job,
            'submitted' => $submitted
        ]);
    }

    /**
     * Edit Job
     * @param bool|int $id
     * @param JobRepository $jobRepository
     */
    public function edit($id = false, JobRepository $jobRepository)
    {
        if (request()->ajax())
            return response('Not allowed for ajax requests', 500);

        if (request()->isMethod('post')) {
            $validator = $jobRepository->validate(request()->all());
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $jobRepository->update(request()->all());
                return redirect('/client/jobs');
            }
        } else {
            return view('job.edit')->with([
                'skills' => Skill::all(),
                'categories' => Category::where('parent_id',null)->get(),
                'sub_categories' => Category::where('parent_id', '!=', null)->get(),
                'jobSkills' => $jobRepository->getJobSkillIds($id),
                'jobCategories' => $jobRepository->getJobCategoryIds($id),
                'job' => Job::find($id)
            ]);
        }
    }

    /**
     * Download attached Files
     * @param string $file
     */
    public function download($file)
    {
        //PDF file is stored under project/public/download/info.pdf
        $file = StorageRepo::getFile($file, 'jobs');

        return \Response($file, 200)->header('Content-Type', 'application/pdf');
    }
}

























