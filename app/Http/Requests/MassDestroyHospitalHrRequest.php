<?php

namespace App\Http\Requests;

use App\Models\HospitalHr;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHospitalHrRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('hospital_hr_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:hospital_hrs,id',
        ];
    }
}
