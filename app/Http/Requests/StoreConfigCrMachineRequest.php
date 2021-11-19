<?php

namespace App\Http\Requests;

use App\Models\ConfigCrMachine;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreConfigCrMachineRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('config_cr_machine_create');
    }

    public function rules()
    {
        return [
            'hospital_name' => [
                'string',
                'required',
                'unique:config_cr_machines',
            ],
            'machine_name' => [
                'string',
                'nullable',
            ],
            'ae_title' => [
                'string',
                'required',
                'unique:config_cr_machines',
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
            'status' => [
                'required',
            ],
        ];
    }
}
