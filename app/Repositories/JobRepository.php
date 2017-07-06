<?php

namespace App\Repositories;
use App\Models\Job;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Repositories\StorageRepo;


class JobRepository
{
    public function validate($data)
    {
        return Validator::make($data, [
            'id' => 'nullable|integer',
            'title' => 'required|max:100',
            'description' => 'required',
            'attached_files' => 'nullable|file|mimetypes:application/pdf',
            'type' => [
                'required',
                Rule::in([Job::TYPE_FIXED, Job::TYPE_HOURLY])
            ],
            'hourly_limit' => 'nullable|integer',
            'budget' => 'required',
            'open_untill' => 'nullable|date|after:today',
            'categories' => 'required|array',
            'sub_categories' => 'required|array',
            'skills' => 'required|array',
        ]);
    }

    /**
     * Close Job and set status to closed
     * @param int $id
     */
    public function close($id) {

    }

    /**
     * Add new Job
     */
    public function save($data) {
        if (request()->file('attached_files')) {
            $data['attached_files'] = StorageRepo::upload(request()->file('attached_files'), 'jobs');
        }
        $data['user_id'] = auth()->user()->id;
        $newData = $data;
        unset($newData['categories']);
        unset($newData['sub_categories']);
        unset($newData['skills']);
        $job = new Job($newData);
        $job->save();
        $job->skills()->sync($data['skills']);
        $job->categories()->sync(array_merge($data['categories'], $data['sub_categories']));
    }

    /**
     * Edit Job
     */
    public function update($data) {

        $job = auth()->user()->jobs()->find($data['id']);
        if ($job) {
            if (request()->file('attached_files') && $job->attached_files) {
                StorageRepo::delete($job->attached_files, 'jobs');
                $data['attached_files'] = StorageRepo::upload(request()->file('attached_files'), 'personal');
            } else {
                $data['attached_files'] = null;
            }
            $job->title = $data['title'];
            $job->description = $data['description'];
            if( $data['attached_files']) {
                $job->attached_files = $data['attached_files'];
            };
            $job->type = $data['type'];
            $job->hourly_limit = $data['hourly_limit'];
            $job->budget = $data['budget'];
            $job->open_untill = $data['open_untill'];
            $job->save();
            $job->skills()->sync($data['skills']);
            $job->categories()->sync(array_merge($data['categories'], $data['sub_categories']));
        } else {
            about(404);
        }
    }

    /**
     * Return Job skill ids
     * @param int|bool $id
     * @return array
     */
    public function getJobSkillIds($id = false) {
        $job = Job::find($id);
        $arr = [];
        if($job) {
            foreach ($job->skills as $skill) {
                $arr[] = $skill->id;
            }
        }
        return $arr;
    }

    /**
     * Return Job category ids
     * @param int|bool $id
     * @return array
     */
    public function getJobCategoryIds($id = false) {
        $job = Job::find($id);
        $arr = [];
        if ($job) {
            foreach ($job->categories as $cat) {
                $arr[] = $cat->id;
            }
        }

        return $arr;
    }

    /**
     * Using DB because there will be many search conditions and Eloquent ORM will make query slower
     * @param $name string
     * @param $cat array
    */
    public function getJobsWithSearch($name, $cat) {
        $jobs = \DB::table('jobs');
        if (!empty($cat)) {
            $jobs->join('category_job', function ($join) use ($cat) {
                $join->on('jobs.id', '=', 'category_job.job_id')
                    ->whereIn('category_job.category_id', $cat);
            });
        }
        if ($name) {
            $jobs->where('title', 'like', "%$name%");
        }
        return $jobs->paginate(2);
    }
}



















