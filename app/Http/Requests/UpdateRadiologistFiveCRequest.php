<?php

namespace App\Http\Requests;

use App\Models\RadiologistFiveC;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRadiologistFiveCRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('radiologist_five_c_edit');
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
                'unique:radiologist_five_cs,phone_number,' . request()->route('radiologist_five_c')->id,
            ],
            'email' => [
                'required',
                'unique:radiologist_five_cs,email,' . request()->route('radiologist_five_c')->id,
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
