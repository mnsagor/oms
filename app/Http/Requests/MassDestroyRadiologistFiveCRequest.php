<?php

namespace App\Http\Requests;

use App\Models\RadiologistFiveC;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRadiologistFiveCRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('radiologist_five_c_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:radiologist_five_cs,id',
        ];
    }
}
