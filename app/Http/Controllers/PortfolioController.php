<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PortfolioRepository;

class PortfolioController extends Controller
{
    /**
     * @param PortfolioRepository $portfolioRepository
     * @return mixed
     */
    public function add(PortfolioRepository $portfolioRepository)
    {
        $validateStatus = $portfolioRepository->validate(request()->all(), true);
        if (!$validateStatus['status']) {
            return response()->json($validateStatus);
        }
        return response()->json($portfolioRepository->save(request()->all()));
    }

    /**
     * @param PortfolioRepository $portfolioRepository
     * @return mixed
     */
    public function edit(PortfolioRepository $portfolioRepository)
    {
        $validateStatus = $portfolioRepository->validate(request()->all(), false);
        if (!$validateStatus['status']) {
            return response()->json($validateStatus);
        }
        return response()->json($portfolioRepository->edit(request()->all()));
    }
}
