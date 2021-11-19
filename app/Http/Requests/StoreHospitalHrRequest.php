<?php

namespace App\Http\Requests;

use App\Models\HospitalHr;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreHospitalHrRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('hospital_hr_create');
    }

    public function rules()
    {
        return [
            'hopital_name' => [
                'string',
                'required',
                'unique:hospital_hrs',
            ],
            'chairman_name' => [
                'string',
                'nullable',
            ],
            'chairman_number' => [
                'string',
                'nullable',
            ],
            'md_name' => [
                'string',
                'nullable',
            ],
            'md_number' => [
                'string',
                'nullable',
            ],
            'director_name' => [
                'string',
                'nullable',
            ],
            'director_number' => [
                'string',
                'nullable',
            ],
            'manager_name' => [
                'string',
                'nullable',
            ],
            'manager_number' => [
                'string',
                'nullable',
            ],
            'am_name' => [
                'string',
                'nullable',
            ],
            'am_number' => [
                'string',
                'nullable',
            ],
            'accountant_name' => [
                'string',
                'nullable',
            ],
            'accountant_number' => [
                'string',
                'nullable',
            ],
            'mt_name_1' => [
                'string',
                'nullable',
            ],
            'mt_number_1' => [
                'string',
                'nullable',
            ],
            'mt_name_2' => [
                'string',
                'nullable',
            ],
            'mt_number_2' => [
                'string',
                'nullable',
            ],
            'mt_name_3' => [
                'string',
                'nullable',
            ],
            'mt_number_3' => [
                'string',
                'nullable',
            ],
            'mt_name_4' => [
                'string',
                'nullable',
            ],
            'mt_number_4' => [
                'string',
                'nullable',
            ],
            'mt_name_5' => [
                'string',
                'nullable',
            ],
            'mt_number_5' => [
                'string',
                'nullable',
            ],
            'ct_eng_name' => [
                'string',
                'nullable',
            ],
            'ct_eng_number' => [
                'string',
                'nullable',
            ],
            'it_person_name' => [
                'string',
                'nullable',
            ],
            'it_person_number' => [
                'string',
                'nullable',
            ],
        ];
    }
}
