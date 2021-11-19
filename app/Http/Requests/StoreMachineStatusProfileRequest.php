<?php

namespace App\Http\Requests;

use App\Models\MachineStatusProfile;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMachineStatusProfileRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('machine_status_profile_create');
    }

    public function rules()
    {
        return [
            'hospital_name' => [
                'string',
                'required',
                'unique:machine_status_profiles',
            ],
        ];
    }
}
