<?php

namespace App\Http\Requests;

use App\Models\VisitedHospital;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVisitedHospitalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('visited_hospital_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'visited_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'visited_by' => [
                'string',
                'required',
            ],
            'other_company_name' => [
                'string',
                'nullable',
            ],
            'other_company_price' => [
                'string',
                'nullable',
            ],
            'dealing_tech' => [
                'string',
                'nullable',
            ],
            'dealing_tech_number' => [
                'string',
                'nullable',
            ],
        ];
    }
}
