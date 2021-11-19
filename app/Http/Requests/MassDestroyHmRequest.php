<?php

namespace App\Http\Requests;

use App\Models\Hm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHmRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('hm_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:hms,id',
        ];
    }
}
