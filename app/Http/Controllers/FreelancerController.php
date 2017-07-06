<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Proposal;
use App\Models\Skill;
use App\Repositories\JobRepository;
use App\Repositories\UserRepository;
use App\Models\Job;

class FreelancerController extends Controller
{

    public function __construct()
    {
        /*$this->middleware(['freelancer', 'auth']);*/
    }

    /**
     * @param JobRepository $jobRepository
     * @return mixed
     */
    public function index(JobRepository $jobRepository)
    {
        $name = request()->input('name');
        $cat = [];
        if (request()->input('categories') && request()->input('categories') != -1)
            $cat[] = request()->input('categories');

        if (request()->input('subcategories')) {
            $cat = array_merge(request()->input('subcategories'), $cat);
        }

        $jobs = $jobRepository->getJobsWithSearch($name, $cat);

        return view('freelancer.index')->with([
            'jobs' => $jobs->appends(request()->except('page')),
            'categories' => Category::where('parent_id', '=', null)->get()
        ]);
    }

    /**
     * Open Users Settings Page
     */
    public function settings()
    {

    }

    /**
     * Open Users Main Settings Page
     */
    public function mainSettings(UserRepository $userRepository)
    {
        if (request()->ajax())
            return response('Not allowed for ajax requests', 500);

        if (request()->isMethod('post')) {
            $validator = $userRepository->validateMainSettings(request()->all());
            if ($validator->fails()) {
                return redirect('/freelancer/settings/main')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $userRepository->updateMainFields(request()->all());
                return redirect('/freelancer/settings/main');
            }
        } else {
            return view('freelancer.mainSettings')->with(['activePage' => 'main']);
        }
    }

    /**
     * Open Users Main Settings Page
     */
    public function additionalSettings(UserRepository $userRepository)
    {
        if (request()->ajax())
            return response('Not allowed for ajax requests', 500);

        if (request()->isMethod('post')) {
            $validator = $userRepository->validateAdditionalInfo();
            if ($validator->fails()) {
                return redirect('/freelancer/settings/additional')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $userRepository->update(request()->all());
                return redirect('/freelancer/settings/additional');
            }
        } else {
            return view('freelancer.additionalSettings')->with([
                'activePage' => 'additional',
                'userEducations' => auth()->user()->educations,
                'userEmployments' => auth()->user()->employments,
                'userPortfolio' => auth()->user()->portfolio,
                'skills' => Skill::all(),
                'categories' => Category::where('parent_id',null)->get(),
                'sub_categories' => Category::where('parent_id', '!=', null)->get(),
                'userSkills' => $userRepository->getUserSkillIds(),
                'userCategories' => $userRepository->getUserCategoryIds(),
            ]);
        }
    }

    /**
     * Open Users Main Settings Page
     */
    public function paymentSettings()
    {
        if (request()->ajax())
            return response('Not allowed for ajax requests', 500);

        if (request()->isMethod('post')) {
            $validator = Validator::make(request()->all(), [
                'title' => 'required|unique:posts|max:255',
                'body' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect('post/create')
                    ->withErrors($validator)
                    ->withInput();
            }
        } else {
            return view('freelancer.paymentSettings')->with(['activePage' => 'payment']);
        }
    }

    /**
     * Freelancers History Page
    */
    public function proposalsHistory()
    {
        $proposals = Proposal::where('user_id', '=', auth()->user()->id)->paginate(15);
        return view('freelancer.proposalsHistory')->with([
            'proposals' => $proposals
        ]);
    }

}
























