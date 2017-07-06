<?php

namespace App\Repositories;
use App\Models\Employment;
use Illuminate\Support\Facades\Validator;

class EmploymentRepository
{
    /**
     * @param $data
     * @return array
     */
    public function validate($data) {
        $validator = Validator::make($data, [
            'user_id' => 'nullable|integer',
            'office_name' => 'required|max:100',
            'position' => 'required|max:100',
            'description' => 'nullable',
            'from' => 'required|date',
            'to' => 'nullable|date|after:from',
            'id' => 'nullable|integer'
        ]);
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
        $edu = new Employment($data);
        if (auth()->user()->employments()->save($edu)) {
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
        if (auth()->user()->employments()->where('user_employment.id', $data['id'])->update($data)) {
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