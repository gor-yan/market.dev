<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProposalsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'id' => 'nullable|integer',
            'job_id' => 'required|integer',
            'cover_letter' => 'required',
            'rate' => 'required',
            'estimation' => 'required|integer',
            'other_info' => 'nullable',
        ];

        return $rules;
    }
}
