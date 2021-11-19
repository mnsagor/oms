<?php

namespace App\Http\Requests;

use App\Models\ConfigCtMachine;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateConfigCtMachineRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('config_ct_machine_edit');
    }

    public function rules()
    {
        return [
            'hospital_name' => [
                'string',
                'required',
                'unique:config_ct_machines,hospital_name,' . request()->route('config_ct_machine')->id,
            ],
            'machine_name' => [
                'string',
                'required',
            ],
            'ae_title' => [
                'string',
                'required',
                'unique:config_ct_machines,ae_title,' . request()->route('config_ct_machine')->id,
            ],
            'port_number' => [
                'string',
                'nullable',
            ],
            'main_ip' => [
                'string',
                'nullable',
            ],
            'configured_ip' => [
                'string',
                'nullable',
            ],
            'host_name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
