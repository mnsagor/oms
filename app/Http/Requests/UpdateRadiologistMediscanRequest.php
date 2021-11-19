<?php

namespace App\Http\Requests;

use App\Models\RadiologistMediscan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRadiologistMediscanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('radiologist_mediscan_edit');
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
                'unique:radiologist_mediscans,phone_number,' . request()->route('radiologist_mediscan')->id,
            ],
            'email' => [
                'required',
                'unique:radiologist_mediscans,email,' . request()->route('radiologist_mediscan')->id,
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
