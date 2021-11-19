<?php

namespace App\Http\Requests;

use App\Models\RadiologistMediscan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRadiologistMediscanRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('radiologist_mediscan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:radiologist_mediscans,id',
        ];
    }
}
