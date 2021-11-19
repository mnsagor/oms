<?php

namespace App\Http\Requests;

use App\Models\ConfigDrMachine;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreConfigDrMachineRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('config_dr_machine_create');
    }

    public function rules()
    {
        return [
            'hospital_name' => [
                'string',
                'required',
                'unique:config_dr_machines',
            ],
            'machine_name' => [
                'string',
                'nullable',
            ],
            'ae_title' => [
                'string',
                'required',
                'unique:config_dr_machines',
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
