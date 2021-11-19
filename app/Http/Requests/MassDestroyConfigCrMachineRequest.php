<?php

namespace App\Http\Requests;

use App\Models\ConfigCrMachine;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyConfigCrMachineRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('config_cr_machine_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:config_cr_machines,id',
        ];
    }
}
