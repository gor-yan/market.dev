<?php

namespace App\Http\Controllers;

use App\Repositories\EducationRepository;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * @param EducationRepository $educationRepository
     * @return mixed
     */
    public function add(EducationRepository $educationRepository)
    {
        $validateStatus = $educationRepository->validate(request()->all());
        if (!$validateStatus['status']) {
            return response()->json($validateStatus);
        }
        return response()->json($educationRepository->save(request()->all()));

    }

    /**
     * @param EducationRepository $educationRepository
     * @return mixed
     */
    public function edit(EducationRepository $educationRepository)
    {
        $validateStatus = $educationRepository->validate(request()->all());
        if (!$validateStatus['status']) {
            return response()->json($validateStatus);
        }
        return response()->json($educationRepository->edit(request()->all()));
    }
}
