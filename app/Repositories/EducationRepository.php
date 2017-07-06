<?php

namespace App\Repositories;
use App\Models\Education;
use Illuminate\Support\Facades\Validator;


class EducationRepository
{
    /**
     * @param $data
     * @return array
     */
    public function validate($data) {
        $validator = Validator::make($data, [
            'user_id' => 'nullable|integer',
            'university_name' => 'required|max:100',
            'degree' => 'required|max:100',
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
        $edu = new Education($data);
        if (auth()->user()->educations()->save($edu)) {
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
        if (auth()->user()->educations()->where('user_education.id', $data['id'])->update($data)) {
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