<?php

namespace App\Http\Requests;

use App\Models\ConfigCtMachine;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyConfigCtMachineRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('config_ct_machine_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:config_ct_machines,id',
        ];
    }
}
