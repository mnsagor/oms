<?php

namespace App\Http\Requests;

use App\Models\MachineStatusProfile;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMachineStatusProfileRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('machine_status_profile_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:machine_status_profiles,id',
        ];
    }
}
