<?php

namespace App\Http\Requests;

use App\Models\ConfigMriMachine;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyConfigMriMachineRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('config_mri_machine_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:config_mri_machines,id',
        ];
    }
}
