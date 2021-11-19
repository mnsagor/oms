<?php

namespace App\Http\Requests;

use App\Models\ConfigCtMachine;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreConfigCtMachineRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('config_ct_machine_create');
    }

    public function rules()
    {
        return [
            'hospital_name' => [
                'string',
                'required',
                'unique:config_ct_machines',
            ],
            'machine_name' => [
                'string',
                'required',
            ],
            'ae_title' => [
                'string',
                'required',
                'unique:config_ct_machines',
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
