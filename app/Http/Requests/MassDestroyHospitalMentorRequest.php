<?php

namespace App\Http\Requests;

use App\Models\HospitalMentor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHospitalMentorRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('hospital_mentor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:hospital_mentors,id',
        ];
    }
}
