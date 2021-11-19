<?php

namespace App\Http\Requests;

use App\Models\ConfigMammographyMachine;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyConfigMammographyMachineRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('config_mammography_machine_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:config_mammography_machines,id',
        ];
    }
}
