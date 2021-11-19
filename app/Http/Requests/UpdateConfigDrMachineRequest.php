<?php

namespace App\Http\Requests;

use App\Models\ConfigDrMachine;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateConfigDrMachineRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('config_dr_machine_edit');
    }

    public function rules()
    {
        return [
            'hospital_name' => [
                'string',
                'required',
                'unique:config_dr_machines,hospital_name,' . request()->route('config_dr_machine')->id,
            ],
            'machine_name' => [
                'string',
                'nullable',
            ],
            'ae_title' => [
                'string',
                'required',
                'unique:config_dr_machines,ae_title,' . request()->route('config_dr_machine')->id,
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
