<?php

namespace App\Repositories;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Validator;
use App\Repositories\StorageRepo;


class PortfolioRepository
{
    /**
     * @param $data
     * @param bool $requireImage
     * @return array
     */
    public function validate($data, $requireImage = false) {
        $rules = [
            'user_id' => 'nullable|integer',
            'id' => 'nullable|integer',
            'title' => 'required|max:100',
            'description' => 'nullable'
        ];
        if ($requireImage)
            $rules['image'] = 'required|image';
        else
            $rules['image'] = 'nullable|image';

        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return [
                'status' => !$validator->fails(),
                'errors' => $validator->messages()
            ];
        }
        return [
            'status' => !$validator->fails()
        ];
    }

    /**
     * @param $data
     * @return array
     */
    public function save($data) {

        $portfolio = new Portfolio($data);
        $portfolio['image'] = StorageRepo::upload(request()->file('image'), 'portfolio');
        if (auth()->user()->portfolio()->save($portfolio)) {
            return [
                'status' => true,
                'message' => 'Successfully Saved'
            ];
        }
        return [
            'status' => false,
            'message' => 'Not Saved'
        ];
    }

    /**
     * @param $data
     * @return array
     */
    public function edit($data) {

        $portfolio = Portfolio::find($data['id']);
        if (request()->file('image') && $portfolio->image) {
            StorageRepo::delete($portfolio->image, 'portfolio');
            $data['image'] = StorageRepo::upload(request()->file('image'), 'portfolio');
        }

        if (auth()->user()->portfolio()->where('user_portfolio.id', $data['id'])->update($data)) {
            return [
                'status' => true,
                'message' => 'Successfully Saved'
            ];
        }
        return [
            'status' => false,
            'message' => 'Not Saved'
        ];
    }
}