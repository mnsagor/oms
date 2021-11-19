<?php

namespace App\Http\Requests;

use App\Models\MachineStatusProfile;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMachineStatusProfileRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('machine_status_profile_edit');
    }

    public function rules()
    {
        return [
            'hospital_name' => [
                'string',
                'required',
                'unique:machine_status_profiles,hospital_name,' . request()->route('machine_status_profile')->id,
            ],
        ];
    }
}
