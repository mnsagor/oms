<?php

namespace App\Http\Requests;

use App\Models\RadiologistFiveC;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRadiologistFiveCRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('radiologist_five_c_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'degree' => [
                'string',
                'nullable',
            ],
            'phone_number' => [
                'string',
                'required',
                'unique:radiologist_five_cs',
            ],
            'email' => [
                'required',
                'unique:radiologist_five_cs',
            ],
            'joining_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'reporting_price' => [
                'string',
                'required',
            ],
            'payment_method' => [
                'string',
                'nullable',
            ],
            'status' => [
                'required',
            ],
        ];
    }
}
