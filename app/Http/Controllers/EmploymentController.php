<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\EmploymentRepository;

class EmploymentController extends Controller
{
    /**
     * @param EmploymentRepository $employmentRepository
     * @return mixed
     */
    public function add(EmploymentRepository $employmentRepository)
    {
        $validateStatus = $employmentRepository->validate(request()->all());
        if (!$validateStatus['status']) {
            return response()->json($validateStatus);
        }
        return response()->json($employmentRepository->save(request()->all()));

    }

    /**
     * @param EmploymentRepository $employmentRepository
     * @return mixed
     */
    public function edit(EmploymentRepository $employmentRepository)
    {
        $validateStatus = $employmentRepository->validate(request()->all());
        if (!$validateStatus['status']) {
            return response()->json($validateStatus);
        }
        return response()->json($employmentRepository->edit(request()->all()));
    }
}
