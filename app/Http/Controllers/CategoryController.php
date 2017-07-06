<?php

namespace App\Http\Controllers;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Get subCategories
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSubCategories()
    {
        $ids = request()->categories;
        if (is_array($ids)) {
            $subCategories = Category::whereIn('parent_id', $ids)->get();
        } elseif($ids != -1) {
            $subCategories = Category::where('parent_id', '=', $ids)->get();
        } else {
            $subCategories = [];
        }

        return response()->json($subCategories);
    }
}
